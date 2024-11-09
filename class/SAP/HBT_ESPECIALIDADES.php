<?php

class HBT_ESPECIALIDADES {
    private $code;
    private $name;

    // Constructor que acepta un array de datos o un código
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->name = $datos['Name'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"Code\", \"Name\" FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADES\" WHERE \"Code\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->code = $result[0]['Code'];
                    $this->name = $result[0]['Name'];
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

    // Método para guardar un nuevo registro en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADES\" (\"Code\", \"Name\") VALUES ('{$this->code}', '{$this->name}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar los datos de un registro existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADES\" SET \"Name\"='{$this->name}' WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar un registro
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADES\" WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de registros
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"Name\" FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADES\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = HBT_ESPECIALIDADES::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new HBT_ESPECIALIDADES($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = HBT_ESPECIALIDADES::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getCode()) ? "selected" : '';
                $nameSpecialty = "{$objeto->getCode()} - {$objeto->getName()}";
                $lista .= "<option value='{$objeto->getCode()}' $auxiliar>$nameSpecialty</option>";
            }
        }
        return $lista;
    }
}
