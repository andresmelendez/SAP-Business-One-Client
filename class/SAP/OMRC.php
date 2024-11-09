<?php

class OMRC {
    
    private $FirmCode;
    private $FirmName;
    private $DataSource = 'I';
    private $UserSign = '1';
    private $U_HBT_DTOADICIONAL = 'N';

    // Constructor que acepta un array de datos o un código de firma
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->FirmCode = $datos['FirmCode'];
                $this->FirmName = $datos['FirmName'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"FirmCode\", \"FirmName\", \"DataSource\", \"UserSign\", \"U_HBT_DTOADICIONAL\" FROM \"SBOCASAANDINA\".\"OMRC\" WHERE \"FirmCode\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->FirmCode = $result[0]['FirmCode'];
                    $this->FirmName = $result[0]['FirmName'];
                }
            }
        }
    }

    // Getters y setters para cada propiedad
    public function getFirmCode() {
        return $this->FirmCode;
    }

    public function setFirmCode($FirmCode) {
        $this->FirmCode = $FirmCode;
    }

    public function getFirmName() {
        return $this->FirmName;
    }

    public function setFirmName($FirmName) {
        $this->FirmName = $FirmName;
    }

    // Método para guardar un nuevo registro en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"OMRC\" (\"FirmCode\", \"FirmName\", \"DataSource\", \"UserSign\", \"U_HBT_DTOADICIONAL\") VALUES ('{$this->FirmCode}', '{$this->FirmName}', '{$this->DataSource}', '{$this->UserSign}', '{$this->U_HBT_DTOADICIONAL}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar los datos de un registro existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"OMRC\" SET \"FirmName\"='{$this->FirmName}', \"DataSource\"='{$this->DataSource}', \"UserSign\"='{$this->UserSign}', \"U_HBT_DTOADICIONAL\"='{$this->U_HBT_DTOADICIONAL}' WHERE \"FirmCode\"='{$this->FirmCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar un registro
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"OMRC\" WHERE \"FirmCode\"='{$this->FirmCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de registros
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : 'ORDER BY "FirmName"';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"FirmCode\", \"FirmName\", \"DataSource\", \"UserSign\", \"U_HBT_DTOADICIONAL\" FROM \"SBOCASAANDINA\".\"OMRC\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = OMRC::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new OMRC($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = OMRC::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getFirmCode()) ? "selected" : '';
                $lista .= "<option value='{$objeto->getFirmCode()}' $auxiliar>{$objeto->getFirmName()}</option>";
            }
        }
        return $lista;
    }
}
