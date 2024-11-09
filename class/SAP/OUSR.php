<?php

class OUSR {
    private $userCode;
    private $name;

    // Constructor que acepta un array de datos o un código de usuario
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->userCode = $datos['USER_CODE'];
                $this->name = $datos['U_NAME'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"USER_CODE\", \"U_NAME\" FROM \"SBOCASAANDINA\".\"OUSR\" WHERE \"USER_CODE\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->userCode = $result[0]['USER_CODE'];
                    $this->name = $result[0]['U_NAME'];
                }
            }
        }
    }

    // Getters y setters para cada propiedad
    public function getUserCode() {
        return $this->userCode;
    }

    public function setUserCode($userCode) {
        $this->userCode = $userCode;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Método para guardar un nuevo usuario en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"OUSR\" (\"USER_CODE\", \"U_NAME\") VALUES ('{$this->userCode}', '{$this->name}')";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar los datos de un usuario existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"OUSR\" SET \"U_NAME\"='{$this->name}' WHERE \"USER_CODE\"='{$this->userCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar un usuario
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"OUSR\" WHERE \"USER_CODE\"='{$this->userCode}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de usuarios
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"USER_CODE\", \"U_NAME\" FROM \"SBOCASAANDINA\".\"OUSR\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = OUSR::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new OUSR($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null) {
        $lista = "";
        $objetos = OUSR::getListaEnObjetos($where, $order);
        if ($objetos != null) {
            foreach ($objetos as $objeto) {
                $auxiliar = ($selected === $objeto->getUserCode()) ? "selected" : '';
                $lista .= "<option value='{$objeto->getUserCode()}' $auxiliar>{$objeto->getUserCode()} - {$objeto->getName()}</option>";
            }
        }
        return $lista;
    }

    // Método para validar el usuario con USER_CODE y clave
    public static function validar($userCode, $clave) {
        // Asumiendo que la clave también está en la tabla OUSR
        $personas = OUSR::getListaEnObjetos("\"USER_CODE\"='$userCode'", null);
        if (is_array($personas) && count($personas) > 0) {
            return $personas[0]; // Retorna el objeto del usuario validado
        } else {
            return null; // Retorna null si no se encuentra el usuario
        }
    }
}
