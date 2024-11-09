<?php

class HBT_ESPECIALIDADENC {
    private $code;
    private $name;
    private $docEntry;
    private $canceled = "N";
    private $object = "HBT_ESPECIALIDADES";
    private $logInst = null;
    private $userSign = 1;
    private $transfered = "N";
    private $createDate;
    private $createTime;
    private $updateDate;
    private $updateTime;
    private $dataSource = "I";
    private $uHbtEspecialidad;

    // Constructor que acepta un array de datos o el código de la especialidad
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->name = $datos['Name'];
                $this->uHbtEspecialidad = $datos['U_HBT_ESPECIALIDAD'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"Code\", \"Name\", \"DocEntry\", \"U_HBT_ESPECIALIDAD\", \"CreateDate\", \"CreateTime\", \"UpdateDate\", \"UpdateTime\" 
                              FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\" 
                              WHERE \"Code\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->code = $result[0]['Code'];
                    $this->name = $result[0]['Name'];
                    $this->uHbtEspecialidad = $result[0]['U_HBT_ESPECIALIDAD'];
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

    public function getUHbtEspecialidad() {
        return $this->uHbtEspecialidad;
    }

    public function setUHbtEspecialidad($uHbtEspecialidad) {
        $this->uHbtEspecialidad = $uHbtEspecialidad;
    }

    // Método para guardar una nueva especialidad en la base de datos
    public function guardar() {
        $this->docEntry = "(SELECT MAX(\"DocEntry\") + 1 FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\")";

        // Obtener la fecha actual en formato YYYYMMDD
        $this->createDate = date('Ymd');

        // Obtener la hora actual en formato SMALLINT (HHMM)
        $this->createTime = intval(date('Hi'));

        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\" 
                      (\"Code\", \"Name\", \"DocEntry\", \"Canceled\", \"Object\", \"LogInst\", \"UserSign\", \"Transfered\", \"CreateDate\", \"CreateTime\", \"DataSource\", \"U_HBT_ESPECIALIDAD\") 
                      VALUES 
                      ('{$this->code}', '{$this->name}', {$this->docEntry}, '{$this->canceled}', '{$this->object}', NULL, '{$this->userSign}', '{$this->transfered}', '{$this->createDate}', '{$this->createTime}', '{$this->dataSource}', '{$this->uHbtEspecialidad}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar una especialidad existente
    public function modificar() {
        // Obtener la fecha actual en formato YYYYMMDD para la fecha de actualización
        $this->updateDate = date('Ymd');

        // Obtener la hora actual en formato SMALLINT (HHMM)
        $this->updateTime = intval(date('Hi'));

        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\" 
                      SET \"Name\"='{$this->name}', \"UpdateDate\"='{$this->updateDate}', \"UpdateTime\"='{$this->updateTime}', \"U_HBT_ESPECIALIDAD\"='{$this->uHbtEspecialidad}' 
                      WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar una especialidad
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\" WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de especialidades
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"Name\", \"DocEntry\", \"CreateDate\", \"CreateTime\", \"UpdateDate\", \"UpdateTime\", \"U_HBT_ESPECIALIDAD\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_ESPECIALIDADENC\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = HBT_ESPECIALIDADENC::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new HBT_ESPECIALIDADENC($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = HBT_ESPECIALIDADENC::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getCode()) ? "selected" : '';
                $lista .= "<option value='{$objeto->getCode()}' $auxiliar>{$objeto->getCode()} - {$objeto->getName()}</option>";
            }
        }
        return $lista;
    }
}
?>
