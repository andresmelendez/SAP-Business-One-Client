<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../../database/DataTable.php';
require_once '../../../../database/ConectorBD.php';
require_once '../../../../class/SAP/OITB.php';
require_once '../../../../class/SAP/HBT_LINEA.php';

date_default_timezone_set('America/Bogota');

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new OITB($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new OITB($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new OITB(null);
            $objeto->setItmsGrpCod($_POST['ItmsGrpCod']);
            $objeto->eliminar();
            break;
        case 'Linea':
            $lista = HBT_LINEA::getListaEnOptions();
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."OITB" T1 LEFT JOIN "SBOCASAANDINA"."@HBT_LINEA" T0 ON T1."U_HBT_CODIGO" = T0."Code"';

            $primaryKey = 'T1."ItmsGrpCod"';

            $columns = array(
                array('db' => 'T1."ItmsGrpCod" AS "codigoGrupo"', 'dt' => 0, 'field' => 'T1."ItmsGrpCod"', 'as' => 'codigoGrupo'),
                array('db' => 'T1."ItmsGrpNam" AS "grupo"', 'dt' => 1, 'field' => 'T1."ItmsGrpNam"', 'as' => 'grupo'),
                array('db' => 'T0."Code" AS "codigoLinea"', 'dt' => 2, 'field' => 'T0."Code"', 'as' => 'codigoLinea'),
                array('db' => 'T0."Name" AS "linea"', 'dt' => 3, 'field' => 'T0."Name"', 'as' => 'linea'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
