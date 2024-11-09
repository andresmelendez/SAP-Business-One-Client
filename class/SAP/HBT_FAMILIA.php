<?php

class HBT_FAMILIA {
    private $code;
    private $name;
    private $uHbtGrupo;
    private $uHbtCategoria;
    private $uHbtPosicion = 'null'; // Por defecto es NULL

    // Constructor que acepta un array de datos o el código de la familia
    public function __construct($datos) {
        if ($datos != null) {
            if (is_array($datos)) {
                $this->code = $datos['Code'];
                $this->name = $datos['Name'];
                $this->uHbtGrupo = $datos['U_HBT_GRUPO'];
                $this->uHbtCategoria = $datos['U_HBT_CATEGORIA'];
            } else {
                // Consulta SQL para obtener datos de la base de datos
                $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_CATEGORIA\", \"U_HBT_POSICION\"
                              FROM \"SBOCASAANDINA\".\"@HBT_FAMILIA\" 
                              WHERE \"Code\" = '$datos'";
                $result = ConectorBD::ejecutarQuery($stringSQL);
                if (is_array($result) && count($result) > 0) {
                    $this->code = $result[0]['Code'];
                    $this->name = $result[0]['Name'];
                    $this->uHbtGrupo = $result[0]['U_HBT_GRUPO'];
                    $this->uHbtCategoria = $result[0]['U_HBT_CATEGORIA'];
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

    public function getUHbtCategoria() {
        return $this->uHbtCategoria;
    }

    public function setUHbtCategoria($uHbtCategoria) {
        $this->uHbtCategoria = $uHbtCategoria;
    }

    // Método para guardar una nueva familia en la base de datos
    public function guardar() {
        $stringSQL = "INSERT INTO \"SBOCASAANDINA\".\"@HBT_FAMILIA\" 
                      (\"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_CATEGORIA\", \"U_HBT_POSICION\") 
                      VALUES 
                      ('{$this->code}', '{$this->name}', '{$this->uHbtGrupo}', '{$this->uHbtCategoria}', {$this->uHbtPosicion})";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para modificar una familia existente
    public function modificar() {
        $stringSQL = "UPDATE \"SBOCASAANDINA\".\"@HBT_FAMILIA\" 
                      SET \"Name\"='{$this->name}', \"U_HBT_GRUPO\"='{$this->uHbtGrupo}', 
                          \"U_HBT_CATEGORIA\"='{$this->uHbtCategoria}', \"U_HBT_POSICION\"={$this->uHbtPosicion}
                      WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Método para eliminar una familia
    public function eliminar() {
        $stringSQL = "DELETE FROM \"SBOCASAANDINA\".\"@HBT_FAMILIA\" WHERE \"Code\"='{$this->code}'";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    // Métodos estáticos para obtener listas de familias
    public static function getLista($where = null, $order = null) {
        $order = $order != null ? " ORDER BY $order" : '';
        $where = $where != null ? " WHERE $where" : '';
        $stringSQL = "SELECT \"Code\", \"Name\", \"U_HBT_GRUPO\", \"U_HBT_CATEGORIA\", \"U_HBT_POSICION\" 
                      FROM \"SBOCASAANDINA\".\"@HBT_FAMILIA\" $where $order";
        return ConectorBD::ejecutarQuery($stringSQL);
    }

    public static function getListaEnObjetos($where = null, $order = null) {
        $objetos = [];
        $result = HBT_FAMILIA::getLista($where, $order);
        if (is_array($result) && count($result) > 0) {
            foreach ($result as $item) {
                $objeto = new HBT_FAMILIA($item);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public static function getListaEnOptions($where = null, $order = null, $selected = null)
    {
        $lista = "";
        $objetos = HBT_FAMILIA::getListaEnObjetos($where, $order);
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
