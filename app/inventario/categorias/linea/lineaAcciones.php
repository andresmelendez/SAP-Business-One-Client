<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../../database/DataTable.php';
require_once '../../../../database/ConectorBD.php';
require_once '../../../../class/SAP/HBT_LINEA.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new HBT_LINEA($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new HBT_LINEA($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new HBT_LINEA(null);
            $objeto->setCode($_POST['Code']);
            $objeto->eliminar();
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."@HBT_LINEA"';

            $primaryKey = '"Code"';

            $columns = array(
                array('db' => '"Code"', 'dt' => 0, 'field' => '"Code"', 'as' => 'Code'),
                array('db' => '"Name"', 'dt' => 1, 'field' => '"Name"', 'as' => 'Name'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
