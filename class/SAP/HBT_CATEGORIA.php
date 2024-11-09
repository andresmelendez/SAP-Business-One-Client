<?php

class HBT_CATEGORIA {
    private $code;
    private $name;
    private $uHbtGrupo;
    private $uHbtPosicion = 'null';

    // Constructor que acepta un array de datos o el código de la categoría
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->name = $datos['Name'];
                $this->uHbtGrupo = $datos['U_HBT_GRUPO'];
            } else {
                // Consulta SQL para obtener datos de la base de datos por código
                $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_POSICION\" 
                              FROM \"SBOCASAANDINA\".\"@HBT_CATEGORIA\" 
                              WHERE \"Code\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->code = $result[0]['Code'];
                    $this->name = $result[0]['Name'];
                    $this->uHbtGrupo = $result[0]['U_HBT_GRUPO'];
                }
            }
        }
    }

    // Getters y setters para cada propiedad
    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getUHbtGrupo() {
        return $this->uHbtGrupo;
    }

    public function setUHbtGrupo($uHbtGrupo) {
        $this->uHbtGrupo = $uHbtGrupo;
    }

    // Método para guardar una nueva categoría en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_CATEGORIA\" 
                      (\"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_POSICION\") 
                      VALUES 
                      ('{$this->code}', '{$this->name}', '{$this->uHbtGrupo}', {$this->uHbtPosicion})";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar una categoría existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_CATEGORIA\" 
                      SET \"Name\"='{$this->name}', \"U_HBT_GRUPO\"='{$this->uHbtGrupo}', \"U_HBT_POSICION\" = {$this->uHbtPosicion} 
                      WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar una categoría
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_CATEGORIA\" WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de categorías
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_POSICION\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_CATEGORIA\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = HBT_CATEGORIA::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new HBT_CATEGORIA($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = HBT_CATEGORIA::getListaEnObjetos($where, $order);
        $encontrado = false; // Variable para rastrear si encontramos el "selected"

        // Generar las opciones de los objetos
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getCode()) ? "selected" : '';
                if ($auxiliar) {
                    $encontrado = true; // Marcar como encontrado si el valor coincide
                }
                $familia = utf8_encode("{$objeto->getCode()} - {$objeto->getName()}");
                $lista .= "<option value='{$objeto->getCode()}' $auxiliar>{$familia}</option>";
            }
        }

        // Si no se encontró el valor seleccionado, agregar opción "Seleccionar" por defecto
        if (!$encontrado && $selected !== null) {
            $lista = "<option value='' selected>Seleccionar</option>" . $lista;
        }

        return $lista;
    }
}

?>
