<?php

$file = $_SERVER['DOCUMENT_ROOT'] . '/datatables/pdo.php';
if (is_file($file)) {
    include( $file );
}

class DataTable {

    static function data_output($columns, $data) {
        $out = array();

        for ($i = 0, $ien = count($data); $i < $ien; $i++) {
            $row = array();

            for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
                $column = $columns[$j];

                // Is there a formatter?
                if (isset($column['formatter'])) {
                    if (empty($column['as'])) {
                        $row[$column['dt']] = $column['formatter']($data[$i]);
                    } else {
                        $row[$column['dt']] = $column['formatter']($data[$i][$column['as']], $data[$i]);
                    }
                } else {
                    if (!empty($column['as'])) {
                        $row[$column['dt']] = utf8_encode($data[$i][$columns[$j]['as']]);
                    } else {
                        $row[$column['dt']] = "";
                    }
                }
            }

            $out[] = $row;
        }

        return $out;
    }

    static function limit($request, $columns) {
        $limit = '';

        if (isset($request['start']) && $request['length'] != -1) {
            $limit = "LIMIT " . intval($request['length']) . " OFFSET " . intval($request['start']);
        }

        return $limit;
    }

    static function order($request, $columns) {
        $order = '';

        if (isset($request['order']) && count($request['order'])) {
            $orderBy = array();
            $dtColumns = self::pluck($columns, 'dt');

            for ($i = 0, $ien = count($request['order']); $i < $ien; $i++) {
                // Convert the column index into the column data property
                $columnIdx = intval($request['order'][$i]['column']);
                $requestColumn = $request['columns'][$columnIdx];

                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                if ($requestColumn['orderable'] == 'true') {
                    $dir = $request['order'][$i]['dir'] === 'asc' ?
                            'ASC' :
                            'DESC';

                    $orderBy[] = '' . $column['field'] . ' ' . $dir;
                }
            }

            if (count($orderBy)) {
                $order = 'ORDER BY ' . implode(', ', $orderBy);
            }
        }

        return $order;
    }

    static function filter($request, $columns, &$bindings) {
        $globalSearch = array();
        $columnSearch = array();
        $dtColumns = self::pluck($columns, 'dt');

        if (isset($request['search']) && $request['search']['value'] != '') {
            $str = str_replace(" ", "%", $request['search']['value']);

            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                if ($requestColumn['searchable'] == 'true') {
                    if (!empty($column['field'])) {
                        $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
                        $globalSearch[] = "LOWER(" . $column['field'] . ") LIKE LOWER(" . $binding . ')';
                    }
                }
            }
        }

        if (isset($request['columns'])) {
            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                $str = str_replace(" ", "%", $requestColumn['search']['value']);

                if ($requestColumn['searchable'] == 'true' &&
                        $str != '') {
                    if (!empty($column['field'])) {
                        $binding = self::bind($bindings, '%' . $str . '%', PDO::PARAM_STR);
                        $columnSearch[] = "" . $column['field'] . " LIKE " . $binding;
                    }
                }
            }
        }

        $where = '';

        if (count($globalSearch)) {
            $where = '(' . implode(' OR ', $globalSearch) . ')';
        }

        if (count($columnSearch)) {
            $where = $where === '' ?
                    implode(' AND ', $columnSearch) :
                    $where . ' AND ' . implode(' AND ', $columnSearch);
        }

        if ($where !== '') {
            $where = 'WHERE ' . $where;
        }

        return $where;
    }

    static function simple($request, $table, $primaryKey, $columns) {
        $bindings = array();
        $db = self::sql_connect();

        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns);
        $where = self::filter($request, $columns, $bindings);

        $data = self::sql_exec($db, $bindings, "SELECT " . implode(", ", self::pluck($columns, 'db')) . "
			 FROM $table
			 $where
			 $order
			 $limit"
        );

        $resFilterLength = self::sql_exec($db, $bindings, "SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
        );
        $recordsFiltered = $resFilterLength[0][0];

        $resTotalLength = self::sql_exec($db, "SELECT COUNT({$primaryKey})
			 FROM   $table"
        );
        $recordsTotal = $resTotalLength[0][0];

        return array(
            "draw" => isset($request['draw']) ?
            intval($request['draw']) :
            0,
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => self::data_output($columns, $data)
        );
    }

    static function complex($request, $table, $primaryKey, $columns, $whereResult = null, $whereAll = null) {
        $bindings = array();
        $db = self::sql_connect();
        $localWhereResult = array();
        $localWhereAll = array();
        $whereAllSql = '';

        // Build the SQL query string from the request
        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns);
        $where = self::filter($request, $columns, $bindings);

        $whereResult = self::_flatten($whereResult);
        $whereAll = self::_flatten($whereAll);

        if ($whereResult) {
            $where = $where ?
                    $where . ' AND ' . $whereResult :
                    'WHERE ' . $whereResult;
        }

        if ($whereAll) {
            $where = $where ?
                    $where . ' AND ' . $whereAll :
                    'WHERE ' . $whereAll;

            $whereAllSql = 'WHERE ' . $whereAll;
        }

        $data = self::sql_exec($db, $bindings, "SELECT " . implode(", ", self::pluck($columns, 'db')) . "
			 FROM $table
			 $where
			 $order
			 $limit"
        );

        $resFilterLength = self::sql_exec($db, $bindings, "SELECT COUNT({$primaryKey})
			 FROM   $table
			 $where"
        );
        $recordsFiltered = $resFilterLength[0][0];

        $resTotalLength = self::sql_exec($db, $bindings, "SELECT COUNT({$primaryKey})
			 FROM   $table " .
                        $whereAllSql
        );
        $recordsTotal = $resTotalLength[0][0];

        return array(
            "draw" => isset($request['draw']) ?
            intval($request['draw']) :
            0,
            "recordsTotal" => intval($recordsTotal),
            "recordsFiltered" => intval($recordsFiltered),
            "data" => self::data_output($columns, $data)
        );
    }

    static function sql_connect() {
        try {
            $archivo= dirname(__FILE__) . '/../configuracion.ini';
            if(file_exists($archivo)){
                $datos= parse_ini_file($archivo);
                $opciones = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ];
                $db = @new PDO(
                        "odbc:{$datos['servidor']}", $datos['usuario'], $datos['clave'], $opciones
                );
            }else echo ' No se encontro el archivo de la configuracion ';
        } catch (PDOException $e) {
            self::fatal(
                    "An error occurred while connecting to the database. " .
                    "The error reported by the server was: " . $e->getMessage()
            );
        }

        return $db;
    }

    static function sql_exec($db, $bindings, $sql = null) {
        if ($sql === null) {
            $sql = $bindings;
        }

        $stmt = $db->prepare($sql);
        if (is_array($bindings)) {
            for ($i = 0, $ien = count($bindings); $i < $ien; $i++) {
                $binding = $bindings[$i];
                $stmt->bindValue($binding['key'], $binding['val'], $binding['type']);
            }
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            self::fatal("An SQL error occurred: " . $e->getMessage());
        }

        return $stmt->fetchAll(PDO::FETCH_BOTH);
    }

    static function fatal($msg) {
        echo json_encode(array(
            "error" => $msg
        ));

        exit(0);
    }

    static function bind(&$a, $val, $type) {
        $key = ':binding_' . count($a);

        $a[] = array(
            'key' => $key,
            'val' => $val,
            'type' => $type
        );

        return $key;
    }

    static function pluck($a, $prop) {
        $out = array();

        for ($i = 0, $len = count($a); $i < $len; $i++) {
            if (empty($a[$i][$prop]) && $a[$i][$prop] !== 0) {
                continue;
            }

            $out[$i] = $a[$i][$prop];
        }

        return $out;
    }

    static function _flatten($a, $join = ' AND ') {
        if (!$a) {
            return '';
        } else if ($a && is_array($a)) {
            return implode($join, $a);
        }
        return $a;
    }

}
