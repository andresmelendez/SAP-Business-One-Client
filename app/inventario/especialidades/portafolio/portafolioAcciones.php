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

date_default_timezone_set('America/Bogota');

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new HBT_ESPECIALIDADENC($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new HBT_ESPECIALIDADENC($_POST);
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new HBT_ESPECIALIDADENC(null);
            $objeto->setCode($_POST['Code']);
            $objeto->eliminar();
            break;
        case 'Especialidad':
            $lista = HBT_ESPECIALIDADES::getListaEnOptions();
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."@HBT_ESPECIALIDADES" T0 JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADENC" T1 ON T1."U_HBT_ESPECIALIDAD" = T0."Code"';

            $primaryKey = 'T1."Code"';

            $columns = array(
                array('db' => 'T1."Code" AS "codigoPortafolio"', 'dt' => 0, 'field' => 'T1."Code"', 'as' => 'codigoPortafolio'),
                array('db' => 'T1."Name" AS "portafolio"', 'dt' => 1, 'field' => 'T1."Name"', 'as' => 'portafolio'),
                array('db' => 'T0."Code" AS "codigoEspecialidad"', 'dt' => 2, 'field' => 'T0."Code"', 'as' => 'codigoEspecialidad'),
                array('db' => 'T0."Name" AS "especialidad"', 'dt' => 3, 'field' => 'T0."Name"', 'as' => 'especialidad'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        default:
            break;
    }
}
