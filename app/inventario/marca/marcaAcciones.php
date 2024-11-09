<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../database/DataTable.php';
require_once '../../../database/ConectorBD.php';
require_once '../../../class/SAP/OMRC.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new OMRC($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new OMRC($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new OMRC(null);
            $objeto->setFirmCode($_POST['FirmCode']);
            $objeto->eliminar();
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."OMRC"';

            $primaryKey = '"FirmCode"';

            $columns = array(
                array('db' => '"FirmCode"', 'dt' => 0, 'field' => '"FirmCode"', 'as' => 'FirmCode'),
                array('db' => '"FirmName"', 'dt' => 1, 'field' => '"FirmName"', 'as' => 'FirmName'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
