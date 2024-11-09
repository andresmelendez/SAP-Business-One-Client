<?php

class HBT_ESPECIALIDADDET {
    private $code;
    private $lineId;
    private $object = "HBT_ESPECIALIDADES";
    private $logInst = 'null';
    private $uHbtCodigoDet;
    private $uHbtNomDetalle;

    // Constructor que acepta un array de datos o el código de la especialidad
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->uHbtCodigoDet = $datos['U_HBT_CODIGODET'];
                $this->uHbtNomDetalle = $datos['U_HBT_NOMDETALLE'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"Code\", \"LineId\", \"U_HBT_CODIGODET\", \"U_HBT_NOMDETALLE\" 
                              FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" 
                              WHERE \"Code\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->code = $result[0]['Code'];
                    $this->uHbtCodigoDet = $result[0]['U_HBT_CODIGODET'];
                    $this->uHbtNomDetalle = $result[0]['U_HBT_NOMDETALLE'];
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

    public function getUHbtCodigoDet() {
        return $this->uHbtCodigoDet;
    }

    public function setUHbtCodigoDet($uHbtCodigoDet) {
        $this->uHbtCodigoDet = $uHbtCodigoDet;
    }

    public function getUHbtNomDetalle() {
        return $this->uHbtNomDetalle;
    }

    public function setUHbtNomDetalle($uHbtNomDetalle) {
        $this->uHbtNomDetalle = $uHbtNomDetalle;
    }

    // Método para obtener el máximo LineId para el Code
    private function getMaxLineId() {
        $stringSQL = "SELECT MAX(\"LineId\") + 1 AS \"MaxLineId\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" 
                      WHERE \"Code\" = '{$this->code}'";
        $result = ConectorBD::ejecutarQuery($stringSQL);
        return isset($result[0]['MaxLineId']) ? $result[0]['MaxLineId'] : 1; // Devuelve 1 si no hay registros
    }

    // Método para guardar un nuevo detalle en la base de datos
    public function guardar() {
        // Obtener el próximo LineId basado en el Code
        //$maxLineId = $this->getMaxLineId();

        $maxLineId = intval(substr($this->uHbtCodigoDet, -3));
        
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" 
                      (\"Code\", \"LineId\", \"Object\", \"LogInst\", \"U_HBT_CODIGODET\", \"U_HBT_NOMDETALLE\") 
                      VALUES 
                      ('{$this->code}', '{$maxLineId}', '{$this->object}', {$this->logInst}, '{$this->uHbtCodigoDet}', '{$this->uHbtNomDetalle}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar un detalle existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" 
                      SET \"U_HBT_CODIGODET\"='{$this->uHbtCodigoDet}', \"U_HBT_NOMDETALLE\"='{$this->uHbtNomDetalle}', \"Code\"='{$this->code}' 
                      WHERE \"U_HBT_CODIGODET\"='{$this->uHbtCodigoDet}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar un detalle
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" WHERE \"U_HBT_CODIGODET\"='{$this->uHbtCodigoDet}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de detalles
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"LineId\", \"U_HBT_CODIGODET\", \"U_HBT_NOMDETALLE\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADDET\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = HBT_ESPECIALIDADDET::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new HBT_ESPECIALIDADDET($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = HBT_ESPECIALIDADDET::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getUHbtCodigoDet()) ? "selected" : '';
                $detalle = utf8_encode("{$objeto->getUHbtCodigoDet()} - {$objeto->getUHbtNomDetalle()}");
                $lista .= "<option value='{$objeto->getUHbtCodigoDet()}' $auxiliar>{$detalle}</option>";
            }
        }
        return $lista;
    }
}
?>
