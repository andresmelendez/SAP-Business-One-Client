<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../../database/DataTable.php';
require_once '../../../../database/ConectorBD.php';
require_once '../../../../class/SAP/HBT_ESPECIALIDADES.php';
require_once '../../../../class/SAP/OITB.php';
require_once '../../../../class/SAP/HBT_LINEA.php';
require_once '../../../../class/SAP/HBT_CATEGORIA.php';
require_once '../../../../class/SAP/HBT_FAMILIA.php';

date_default_timezone_set('America/Bogota');

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new HBT_FAMILIA($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new HBT_FAMILIA($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new HBT_FAMILIA(null);
            $objeto->setCode($_POST['Code']);
            $objeto->eliminar();
            break;
        case 'Linea':
            $lista = HBT_LINEA::getListaEnOptions();
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Grupo':
            $U_HBT_CODIGO = isset($_POST['Code']) && !empty($_POST['Code']) ? "U_HBT_CODIGO = '{$_POST['Code']}'" : null;
            $default = isset($_POST['Default']) && !empty($_POST['Default']) ? $_POST['Default'] : null;
            $lista = OITB::getListaEnOptions($U_HBT_CODIGO, null, $default);
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Categoria':
            $U_HBT_GRUPO = isset($_POST['Code']) && !empty($_POST['Code']) ? $_POST['Code'] : null;
            $default = isset($_POST['Default']) && !empty($_POST['Default']) ? $_POST['Default'] : null;
            $lista = HBT_CATEGORIA::getListaEnOptions("U_HBT_GRUPO = '{$_POST['Code']}'", null, $default);
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."@HBT_FAMILIA" T3 LEFT JOIN "SBOCASAANDINA"."@HBT_CATEGORIA" T2 ON T2."Code" = T3."U_HBT_CATEGORIA" LEFT JOIN "SBOCASAANDINA"."OITB" T1 ON T2."U_HBT_GRUPO" = T1."ItmsGrpCod" LEFT JOIN "SBOCASAANDINA"."@HBT_LINEA" T0 ON T1."U_HBT_CODIGO" = T0."Code"';

            $primaryKey = 'T3."Code"';

            $columns = array(
                array('db' => 'T3."Code" AS "codigoFamilia"', 'dt' => 0, 'field' => 'T3."Code"', 'as' => 'codigoFamilia'),
                array('db' => 'T3."Name" AS "familia"', 'dt' => 1, 'field' => 'T3."Name"', 'as' => 'familia'),
                array('db' => 'T2."Code" AS "codigoCategoria"', 'dt' => 2, 'field' => 'T2."Code"', 'as' => 'codigoCategoria'),
                array('db' => 'T2."Name" AS "categoria"', 'dt' => 3, 'field' => 'T2."Name"', 'as' => 'categoria'),
                array('db' => 'T1."ItmsGrpCod" AS "codigoGrupo"', 'dt' => 4, 'field' => 'T1."ItmsGrpCod"', 'as' => 'codigoGrupo'),
                array('db' => 'T1."ItmsGrpNam" AS "grupo"', 'dt' => 5, 'field' => 'T1."ItmsGrpNam"', 'as' => 'grupo'),
                array('db' => 'T0."Code" AS "codigoLinea"', 'dt' => 6, 'field' => 'T0."Code"', 'as' => 'codigoLinea'),
                array('db' => 'T0."Name" AS "linea"', 'dt' => 7, 'field' => 'T0."Name"', 'as' => 'linea'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
