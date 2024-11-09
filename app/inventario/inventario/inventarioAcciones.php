<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../database/DataTable.php';
require_once '../../../database/ConectorBD.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Listar':
            $table = '"SBOCASAANDINA"."OITM" T0  INNER JOIN "SBOCASAANDINA"."OITW" T1 ON T0."ItemCode" = T1."ItemCode"';

            $primaryKey = 'T0."ItemCode"';

            $columns = array(
                array('db' => 'T0."ItemCode"', 'dt' => 0, 'field' => 'T0."ItemCode"', 'as' => 'ItemCode'),
                array('db' => 'T0."ItemName"', 'dt' => 1, 'field' => 'T0."ItemName"', 'as' => 'ItemName'),
                array('db' => 'T1."WhsCode"', 'dt' => 2, 'field' => 'T1."WhsCode"', 'as' => 'WhsCode'),
                array('db' => 'T1."OnHand"', 'dt' => 3, 'field' => 'T1."OnHand"', 'as' => 'OnHand'),
                array('db' => 'T1."IsCommited"', 'dt' => 4, 'field' => 'T1."IsCommited"', 'as' => 'IsCommited'),
                array('db' => 'T1."OnOrder"', 'dt' => 5, 'field' => 'T1."OnOrder"', 'as' => 'OnOrder'),
                array('db' => 'T1."OnHand" - T1."IsCommited" + T1."OnOrder" AS "Available"', 'dt' => 6, 'field' => 'T1."OnHand" - T1."IsCommited" + T1."OnOrder"', 'as' => 'Available'),
                array('db' => 'T1."AvgPrice"', 'dt' => 7, 'field' => 'T1."AvgPrice"', 'as' => 'AvgPrice'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
