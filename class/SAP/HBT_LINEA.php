<?php

class HBT_LINEA {
    private $code;
    private $name;
    private $uHbtPosicion = "null"; // Por defecto null
    private $uHbtEcommerce = "N"; // Por defecto "N"

    // Constructor que acepta un array de datos o el código de la línea
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->name = $datos['Name'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_POSICION\", \"U_HBT_ecommerce\" 
                              FROM \"SBOCASAANDINA\".\"@HBT_LINEA\" 
                              WHERE \"Code\" = '$datos'";
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

    // Método para guardar una nueva línea en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_LINEA\" 
                      (\"Code\", \"Name\", \"U_HBT_POSICION\", \"U_HBT_ecommerce\") 
                      VALUES 
                      ('{$this->code}', '{$this->name}', {$this->uHbtPosicion}, '{$this->uHbtEcommerce}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar una línea existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_LINEA\" 
                      SET \"Name\"='{$this->name}' 
                      WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar una línea
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_LINEA\" WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de líneas
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : " ORDER BY \"Code\"";
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_POSICION\", \"U_HBT_ecommerce\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_LINEA\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = self::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new self($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = self::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getCode()) ? "selected" : '';
                $nameLinea = "{$objeto->getCode()} - {$objeto->getName()}";
                $lista .= "<option value='{$objeto->getCode()}' $auxiliar>$nameLinea</option>";
            }
        }
        return $lista;
    }
}
?>
