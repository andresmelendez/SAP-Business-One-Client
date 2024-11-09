<?php

class OITB {
    private $itmsGrpCod;
    private $itmsGrpNam;
    private $locked = "N";
    private $dataSource = "N";
    private $userSign = 1;
    private $alert = "N";
    private $invntSys = "A";
    private $planingSys = "N";
    private $prcrmntMtd = "B";
    private $ordrMulti = 0;
    private $minOrdrQty = 0;
    private $object = 52;
    private $createDate;
    private $userSign2 = 1;
    private $updateDate;
    private $itemClass = 2;
    private $oSvcCode = -1;
    private $iSvcCode = -1;
    private $serviceGrp = -1;
    private $ncmCode = -1;
    private $matType = 1;
    private $matGrp = -1;
    private $productSrc = 0;
    private $compoWH = "B";
    private $rawMtrl = "N";
    private $uHbtCodigo;
    private $uHbtObligaDif = "NO";
    private $uHbtManejaVig = "NO";

    // Constructor que acepta un array de datos o el código del grupo de ítems
    public function __construct($datos = null) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->itmsGrpCod = $datos['ItmsGrpCod'];
                $this->itmsGrpNam = $datos['ItmsGrpNam'];
                $this->uHbtCodigo = $datos['U_HBT_CODIGO'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"ItmsGrpCod\", \"ItmsGrpNam\", \"U_HBT_CODIGO\", \"createDate\", \"updateDate\"
                              FROM \"SBOCASAANDINA\".\"OITB\"
                              WHERE \"ItmsGrpCod\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->itmsGrpCod = $result[0]['ItmsGrpCod'];
                    $this->itmsGrpNam = $result[0]['ItmsGrpNam'];
                    $this->uHbtCodigo = $result[0]['U_HBT_CODIGO'];
                }
            }
        }
    }

    // Getters y setters para cada propiedad
    public function getItmsGrpCod() {
        return $this->itmsGrpCod;
    }

    public function setItmsGrpCod($itmsGrpCod) {
        $this->itmsGrpCod = $itmsGrpCod;
    }

    public function getItmsGrpNam() {
        return $this->itmsGrpNam;
    }

    public function setItmsGrpNam($itmsGrpNam) {
        $this->itmsGrpNam = $itmsGrpNam;
    }

    public function getUHbtCodigo() {
        return $this->uHbtCodigo;
    }

    public function setUHbtCodigo($uHbtCodigo) {
        $this->uHbtCodigo = $uHbtCodigo;
    }

    // Método para guardar un nuevo registro en la base de datos
    public function guardar() {
        $this->createDate = date('Ymd'); // Fecha de creación

        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"OITB\" 
                      (\"ItmsGrpCod\", \"ItmsGrpNam\", \"Locked\", \"DataSource\", \"UserSign\", \"Alert\", \"InvntSys\", \"PlaningSys\", 
                       \"PrcrmntMtd\", \"OrdrMulti\", \"MinOrdrQty\", \"Object\", \"createDate\", \"userSign2\", \"ItemClass\", 
                       \"OSvcCode\", \"ISvcCode\", \"ServiceGrp\", \"NCMCode\", \"MatType\", \"MatGrp\", \"ProductSrc\", 
                       \"CompoWH\", \"RawMtrl\", \"U_HBT_CODIGO\", \"U_HBT_ObligaDif\", \"U_HBT_ManejaVig\") 
                      VALUES 
                      ('{$this->itmsGrpCod}', '{$this->itmsGrpNam}', '{$this->locked}', '{$this->dataSource}', '{$this->userSign}', 
                       '{$this->alert}', '{$this->invntSys}', '{$this->planingSys}', '{$this->prcrmntMtd}', '{$this->ordrMulti}', 
                       '{$this->minOrdrQty}', '{$this->object}', '{$this->createDate}', '{$this->userSign2}', '{$this->itemClass}', 
                       '{$this->oSvcCode}', '{$this->iSvcCode}', '{$this->serviceGrp}', '{$this->ncmCode}', '{$this->matType}', 
                       '{$this->matGrp}', '{$this->productSrc}', '{$this->compoWH}', '{$this->rawMtrl}', '{$this->uHbtCodigo}', 
                       '{$this->uHbtObligaDif}', '{$this->uHbtManejaVig}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar un registro existente
    public function modificar() {
        $this->updateDate = date('Ymd'); // Fecha de modificación

        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"OITB\" 
                      SET \"ItmsGrpNam\" = '{$this->itmsGrpNam}', \"updateDate\" = '{$this->updateDate}', 
                          \"U_HBT_CODIGO\" = '{$this->uHbtCodigo}', \"U_HBT_ObligaDif\" = '{$this->uHbtObligaDif}', 
                          \"U_HBT_ManejaVig\" = '{$this->uHbtManejaVig}' 
                      WHERE \"ItmsGrpCod\" = '{$this->itmsGrpCod}'";

        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar un registro
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"OITB\" WHERE \"ItmsGrpCod\" = '{$this->itmsGrpCod}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de registros
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"ItmsGrpCod\", \"ItmsGrpNam\", \"createDate\", \"updateDate\", \"U_HBT_CODIGO\" 
                      FROM \"SBOCASAANDINA\".\"OITB\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = OITB::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new OITB($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = OITB::getListaEnObjetos($where, $order);
        $encontrado = false; // Variable para rastrear si encontramos el "selected"

        // Generar las opciones de los objetos
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getItmsGrpCod()) ? "selected" : '';
                if ($auxiliar) {
                    $encontrado = true; // Marcar como encontrado si el valor coincide
                }
                $ItmsGrpName = utf8_encode("{$objeto->getItmsGrpCod()} - {$objeto->getItmsGrpNam()}");
                $lista .= "<option value='{$objeto->getItmsGrpCod()}' $auxiliar>$ItmsGrpName</option>";
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
