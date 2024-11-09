<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../../database/DataTable.php';
require_once '../../../../database/ConectorBD.php';
require_once '../../../../class/SAP/HBT_ESPECIALIDADES.php';
require_once '../../../../class/SAP/HBT_ESPECIALIDADENC.php';
require_once '../../../../class/SAP/HBT_ESPECIALIDADDET.php';

date_default_timezone_set('America/Bogota');

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new HBT_ESPECIALIDADDET($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new HBT_ESPECIALIDADDET($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new HBT_ESPECIALIDADDET(null);
            $objeto->setUHbtCodigoDet($_POST['U_HBT_CODIGODET']);
            $objeto->eliminar();
            break;
        case 'Especialidad':
            $lista = HBT_ESPECIALIDADES::getListaEnOptions();
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Portafolio':
            $U_HBT_ESPECIALIDAD = isset($_POST['Code']) && !empty($_POST['Code']) ? "U_HBT_ESPECIALIDAD = '{$_POST['Code']}'" : null;
            $default = isset($_POST['Default']) && !empty($_POST['Default']) ? $_POST['Default'] : null;
            $lista = HBT_ESPECIALIDADENC::getListaEnOptions($U_HBT_ESPECIALIDAD, null, $default);
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."@HBT_ESPECIALIDADES" T0 JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADENC" T1 ON T1."U_HBT_ESPECIALIDAD" = T0."Code" JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADDET" T2 ON T2."Code" = T1."Code"';

            $primaryKey = 'T1."Code"';

            $columns = array(
                array('db' => 'T2."U_HBT_CODIGODET" AS "codigoDetallePortafolio"', 'dt' => 0, 'field' => 'T2."U_HBT_CODIGODET"', 'as' => 'codigoDetallePortafolio'),
                array('db' => 'T2."U_HBT_NOMDETALLE" AS "detallePortafolio"', 'dt' => 1, 'field' => 'T2."U_HBT_NOMDETALLE"', 'as' => 'detallePortafolio'),
                array('db' => 'T1."Code" AS "codigoPortafolio"', 'dt' => 2, 'field' => 'T1."Code"', 'as' => 'codigoPortafolio'),
                array('db' => 'T1."Name" AS "portafolio"', 'dt' => 3, 'field' => 'T1."Name"', 'as' => 'portafolio'),
                array('db' => 'T0."Code" AS "codigoEspecialidad"', 'dt' => 4, 'field' => 'T0."Code"', 'as' => 'codigoEspecialidad'),
                array('db' => 'T0."Name" AS "especialidad"', 'dt' => 5, 'field' => 'T0."Name"', 'as' => 'especialidad'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
