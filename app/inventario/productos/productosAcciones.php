<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../database/DataTable.php';
require_once '../../../database/ConectorBD.php';
require_once '../../../class/SAP/OITM.php';
require_once '../../../class/SAP/HBT_ESPECIALIDADES.php';
require_once '../../../class/SAP/HBT_ESPECIALIDADENC.php';
require_once '../../../class/SAP/HBT_ESPECIALIDADDET.php';
require_once '../../../class/SAP/OITB.php';
require_once '../../../class/SAP/HBT_LINEA.php';
require_once '../../../class/SAP/HBT_CATEGORIA.php';
require_once '../../../class/SAP/HBT_FAMILIA.php';
require_once '../../../class/SAP/OMRC.php';

date_default_timezone_set('America/Bogota');

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Adicionar':
            $objeto = new OITM($_POST);
            $objeto->guardar();
            break;
        case 'Modificar':
            $objeto = new OITM($_POST);
            if (isset($_FILES['PicturName']['name'])) {
                $extension = substr($_FILES['PicturName']['name'], strripos($_FILES['PicturName']['name'], '.'));
                if ($extension != null) {
                    $imagen = $_POST['ItemCode'] . '_1' . $extension;
                    $objeto->setPicturName($imagen);
                    // Guardar la imagen directamente en Z:\
                    move_uploaded_file($_FILES['PicturName']['tmp_name'], 'Z:\\' . $imagen);
                } else {
                    $objeto->setPicturName($objeto->getPicturName());
                }
            }
            $objeto->modificar();
            break;
        case 'Eliminar':
            $objeto = new OITM(null);
            $objeto->setItemCode($_POST['ItemCode']);
            $objeto->eliminar();
            break;
        case 'Mostrar':
            $ItemCode = isset($_POST['ItemCode']) && !empty($_POST['ItemCode']) ? $_POST['ItemCode'] : null;
            $objeto = new OITM($ItemCode);

            $array = array(
                "ItemCode" => $objeto->getItemCode(),
                "ItemName" => $objeto->getItemName(),
                "FrgnName" => $objeto->getFrgnName(),
                "CodeBars" => $objeto->getCodeBars(),
                "FirmCode" => $objeto->getFirmCode(),
                "U_HBT_LINEA" => $objeto->getU_HBT_LINEA(),
                "U_HBT_CATEGORIA" => $objeto->getU_HBT_CATEGORIA(),
                "U_HBT_FAMILIA" => $objeto->getU_HBT_FAMILIA(),
                "U_HBT_Especialidad" => $objeto->getU_HBT_Especialidad(),
                "U_HBT_PORTAFOLIO" => $objeto->getU_HBT_PORTAFOLIO(),
                "U_HBT_CODIGODET" => $objeto->getU_HBT_CODIGODET(),
                "U_HBT_Alineaprov" => $objeto->getU_HBT_Alineaprov(),
                "U_HBT_Marquilla" => $objeto->getU_HBT_Marquilla(),
                "frozenFor" => $objeto->getFrozenFor(),
                "CardCode" => $objeto->getCardCode(),
                "SuppCatNum" => $objeto->getSuppCatNum(),
                "BuyUnitMsr" => $objeto->getBuyUnitMsr(),
                "NumInBuy" => $objeto->getNumInBuy(),
                "PurPackMsr" => $objeto->getPurPackMsr(),
                "PurPackUn" => $objeto->getPurPackUn(),
                "ByWh" => $objeto->getByWh(),
                "InvntItem" => $objeto->getInvntItem(),
                "ItmsGrpCod" => $objeto->getItmsGrpCod(),
                "NumInSale" => $objeto->getNumInSale(),
                "PicturName" => $objeto->getPicturName(),
                "PrchseItem" => $objeto->getPrchseItem(),
                "QryGroup1" => $objeto->getQryGroup1(),
                "QryGroup10" => $objeto->getQryGroup10(),
                "QryGroup11" => $objeto->getQryGroup11(),
                "QryGroup12" => $objeto->getQryGroup12(),
                "QryGroup13" => $objeto->getQryGroup13(),
                "QryGroup14" => $objeto->getQryGroup14(),
                "QryGroup15" => $objeto->getQryGroup15(),
                "QryGroup16" => $objeto->getQryGroup16(),
                "QryGroup17" => $objeto->getQryGroup17(),
                "QryGroup18" => $objeto->getQryGroup18(),
                "QryGroup19" => $objeto->getQryGroup19(),
                "QryGroup2" => $objeto->getQryGroup2(),
                "QryGroup20" => $objeto->getQryGroup20(),
                "QryGroup21" => $objeto->getQryGroup21(),
                "QryGroup22" => $objeto->getQryGroup22(),
                "QryGroup23" => $objeto->getQryGroup23(),
                "QryGroup24" => $objeto->getQryGroup24(),
                "QryGroup25" => $objeto->getQryGroup25(),
                "QryGroup26" => $objeto->getQryGroup26(),
                "QryGroup27" => $objeto->getQryGroup27(),
                "QryGroup28" => $objeto->getQryGroup28(),
                "QryGroup29" => $objeto->getQryGroup29(),
                "QryGroup3" => $objeto->getQryGroup3(),
                "QryGroup30" => $objeto->getQryGroup30(),
                "QryGroup31" => $objeto->getQryGroup31(),
                "QryGroup32" => $objeto->getQryGroup32(),
                "QryGroup33" => $objeto->getQryGroup33(),
                "QryGroup34" => $objeto->getQryGroup34(),
                "QryGroup35" => $objeto->getQryGroup35(),
                "QryGroup36" => $objeto->getQryGroup36(),
                "QryGroup37" => $objeto->getQryGroup37(),
                "QryGroup38" => $objeto->getQryGroup38(),
                "QryGroup39" => $objeto->getQryGroup39(),
                "QryGroup4" => $objeto->getQryGroup4(),
                "QryGroup40" => $objeto->getQryGroup40(),
                "QryGroup41" => $objeto->getQryGroup41(),
                "QryGroup42" => $objeto->getQryGroup42(),
                "QryGroup43" => $objeto->getQryGroup43(),
                "QryGroup44" => $objeto->getQryGroup44(),
                "QryGroup45" => $objeto->getQryGroup45(),
                "QryGroup46" => $objeto->getQryGroup46(),
                "QryGroup47" => $objeto->getQryGroup47(),
                "QryGroup48" => $objeto->getQryGroup48(),
                "QryGroup49" => $objeto->getQryGroup49(),
                "QryGroup5" => $objeto->getQryGroup5(),
                "QryGroup50" => $objeto->getQryGroup50(),
                "QryGroup51" => $objeto->getQryGroup51(),
                "QryGroup52" => $objeto->getQryGroup52(),
                "QryGroup53" => $objeto->getQryGroup53(),
                "QryGroup54" => $objeto->getQryGroup54(),
                "QryGroup55" => $objeto->getQryGroup55(),
                "QryGroup56" => $objeto->getQryGroup56(),
                "QryGroup57" => $objeto->getQryGroup57(),
                "QryGroup58" => $objeto->getQryGroup58(),
                "QryGroup59" => $objeto->getQryGroup59(),
                "QryGroup6" => $objeto->getQryGroup6(),
                "QryGroup60" => $objeto->getQryGroup60(),
                "QryGroup61" => $objeto->getQryGroup61(),
                "QryGroup62" => $objeto->getQryGroup62(),
                "QryGroup63" => $objeto->getQryGroup63(),
                "QryGroup64" => $objeto->getQryGroup64(),
                "QryGroup7" => $objeto->getQryGroup7(),
                "QryGroup8" => $objeto->getQryGroup8(),
                "QryGroup9" => $objeto->getQryGroup9(),
                "SalPackMsr" => $objeto->getSalPackMsr(),
                "SalPackUn" => $objeto->getSalPackUn(),
                "SalUnitMsr" => $objeto->getSalUnitMsr(),
                "SellItem" => $objeto->getSellItem(),
                "SVolume" => $objeto->getSVolume(),
                "U_HBT_ACTMAGENTO" => $objeto->getU_HBT_ACTMAGENTO(),
                "U_HBT_ACTMAGENTOB2B" => $objeto->getU_HBT_ACTMAGENTOB2B(),
                "U_HBT_ACTMAGENTOB2C" => $objeto->getU_HBT_ACTMAGENTOB2C(),
                "U_HBT_ACTTRANSNAC" => $objeto->getU_HBT_ACTTRANSNAC(),
                "U_HBT_DESCCOMART" => $objeto->getU_HBT_DESCCOMART(),
                "U_HBT_LAYOUT" => $objeto->getU_HBT_LAYOUT(),
                "U_HBT_PlanoIntroConst" => $objeto->getU_HBT_PlanoIntroConst(),
                "U_HBT_PlanoIntroDist" => $objeto->getU_HBT_PlanoIntroDist(),
                "U_HBT_PlanoIntroDistFE" => $objeto->getU_HBT_PlanoIntroDistFE(),
                "U_HBT_PlanoIntroInfra" => $objeto->getU_HBT_PlanoIntroInfra(),
                "U_HBT_PlanoIntroSV" => $objeto->getU_HBT_PlanoIntroSV(),
                "U_HBT_PROVCORONA" => $objeto->getU_HBT_PROVCORONA(),
                "U_HBT_ROL" => $objeto->getU_HBT_ROL(),
                "U_HBT_SERENVIOS" => $objeto->getU_HBT_SERENVIOS(),
                "U_HBT_UsuarioP1" => $objeto->getU_HBT_UsuarioP1(),
                "U_HBT_UsuarioP2" => $objeto->getU_HBT_UsuarioP2(),
                "U_HBT_UsuarioP3" => $objeto->getU_HBT_UsuarioP3(),
                "UserText" => $objeto->getUserText(),
                "inventory" => $objeto->getInventory(),
                "BWeight1" => $objeto->getBWeight1(),
                "BLength1" => $objeto->getBLength1(),
                "BWidth1" => $objeto->getBWeight1(),
                "BHeight1" => $objeto->getBHeight1(),
                "BVolume" => $objeto->getBVolume(),
                "BVolUnit" => $objeto->getBVolUnit(),
                "SWeight1" => $objeto->getSWeight1(),
                "SLength1" => $objeto->getSLength1(),
                "SWidth1" => $objeto->getSWeight1(),
                "SHeight1" => $objeto->getSHeight1(),
                "SVolume" => $objeto->getSVolume(),
                "SVolUnit" => $objeto->getSVolUnit(),
                "SWW" => $objeto->getSWW(),
                "ShipType" => $objeto->getShipType(),
                "WTLiable" => $objeto->getWTLiable(),
                "IndirctTax" => $objeto->getIndirctTax(),
                "NoDiscount" => $objeto->getNoDiscount(),
                "PlaningSys" => $objeto->getPlaningSys(),
                "OrdrIntrvl" => $objeto->getOrdrIntrvl(),
                "OrdrMulti" => $objeto->getOrdrMulti(),
                "MinOrdrQty" => $objeto->getMinOrdrQty(),
                "LeadTime" => $objeto->getLeadTimeItem(),
                "TaxCodeAR" => $objeto->getTaxCodeAR(),
                "TaxCodeAP" => $objeto->getTaxCodeAP(),
                "ToleranDay" => $objeto->getToleranDay(),
                "U_HBT_PRECIOXM2" => $objeto->getU_HBT_PRECIOXM2(),
                "U_HBT_TIPOLISTA" => $objeto->getU_HBT_TIPOLISTA(),
                "U_HBT_CODIGOTAB" => $objeto->getU_HBT_CODIGOTAB(),
                "U_U_HBT_TABDTOGRU" => $objeto->getU_U_HBT_TABDTOGRU(),
                "U_HBT_PREBASE" => $objeto->getU_HBT_PREBASE(),
                "U_HBT_DTOPROV" => $objeto->getU_HBT_DTOPROV(),
                "U_HBT_COSBASE" => $objeto->getU_HBT_COSBASE(),
                "U_HBT_COSESTIMADO" => $objeto->getU_HBT_COSESTIMADO(),
                "U_HBT_MARGENMIN" => $objeto->getU_HBT_MARGENMIN(),
                "U_HBT_PORINCRE" => $objeto->getU_HBT_PORINCRE(),
                "U_HBT_MUTIL" => $objeto->getU_HBT_MUTIL(),
                "U_HBT_DTOMAX" => $objeto->getU_HBT_DTOMAX(),
                "U_HBT_pvmc" => $objeto->getU_HBT_pvmc(),
                "U_HBT_PVMP" => $objeto->getU_HBT_PVMP(),
                "U_HBT_MUPVMP" => $objeto->getU_HBT_MUPVMP(),
                "U_HBT_MUpvmc" => $objeto->getU_HBT_MUpvmc(),
                "U_U_HBT_COSPROM" => $objeto->getU_U_HBT_COSPROM(),
                "U_HBT_FLETES" => $objeto->getU_HBT_FLETES(),
                "U_HBT_VRGASTOS" => $objeto->getU_HBT_VRGASTOS(),
                "U_HBT_TABDTOADI" => $objeto->getU_HBT_TABDTOADI(),
                "U_HBT_FSMIN" => $objeto->getU_HBT_FSMIN(),
                "U_HBT_FSMAX" => $objeto->getU_HBT_FSMAX(),
                "U_HBT_USOCOSPROM" => $objeto->getU_HBT_USOCOSPROM(),
                "U_HBT_FecIniDto" => $objeto->getU_HBT_FecIniDto(),
                "U_HBT_FecFinDto" => $objeto->getU_HBT_FecFinDto(),
                "U_HBT_NDTOMAX" => $objeto->getU_HBT_NDTOMAX(),
                "U_HBT_MENSAJEMP" => $objeto->getU_HBT_MENSAJEMP(),
                "U_HBT_NomPlanograma" => $objeto->getU_HBT_NomPlanograma(),
                "U_HBT_DtoAdicional" => $objeto->getU_HBT_DtoAdicional(),
                "U_HBT_DTOADIPROV" => $objeto->getU_HBT_DTOADIPROV(),
                "U_HBT_FECDTOADIPRO" => $objeto->getU_HBT_FECDTOADIPRO(),
                "U_HBT_COSTOPRODUCTO" => $objeto->getU_HBT_COSTOPRODUCTO(),
                "U_HBT_PORGASTOS" => $objeto->getU_HBT_PORGASTOS(),
                "U_HBT_PREPARACION" => $objeto->getU_HBT_PREPARACION(),
            );

            echo json_encode($array);
            break;
        case 'Marca':
            $lista = OMRC::getListaEnOptions();
            echo json_encode(array('status' => 'success', 'lista' => $lista));
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
        case 'Familia':
            $U_HBT_CATEGORIA = isset($_POST['Code']) && !empty($_POST['Code']) ? $_POST['Code'] : null;
            $default = isset($_POST['Default']) && !empty($_POST['Default']) ? $_POST['Default'] : null;
            $lista = HBT_FAMILIA::getListaEnOptions("U_HBT_CATEGORIA = '{$_POST['Code']}'", null, $default);
            echo json_encode(array('status' => 'success', 'lista' => $lista));
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
        case 'DetallePortafolio':
            $Code = isset($_POST['Code']) && !empty($_POST['Code']) ? $_POST['Code'] : null;
            $default = isset($_POST['Default']) && !empty($_POST['Default']) ? $_POST['Default'] : null;
            $lista = HBT_ESPECIALIDADDET::getListaEnOptions("\"Code\" = '{$Code}'", null, $default);
            echo json_encode(array('status' => 'success', 'lista' => $lista));
            break;
        case 'Listar':
            $table = '"SBOCASAANDINA"."OITM" T0 INNER JOIN "SBOCASAANDINA"."OMRC" T5 ON T0."FirmCode" = T5."FirmCode" AND T0."ItemType" = \'I\' LEFT JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADENC" T8 ON T0."U_HBT_PORTAFOLIO" = T8."Code" LEFT JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADDET" T9 ON T0."U_HBT_CODIGODET" = T9."U_HBT_CODIGODET" LEFT JOIN "SBOCASAANDINA"."@HBT_ESPECIALIDADES" T10 ON T0."U_HBT_Especialidad" = T10."Code"';

            $primaryKey = 'T0."ItemCode"';

            $columns = array(
                array('db' => 'T0."frozenFor"', 'dt' => 0, 'field' => 'T0."frozenFor"', 'as' => 'frozenFor'),
                array(
                    'db'        => 'T0."CreateDate"',
                    'dt'        => 1,
                    'formatter' => function ($d, $row) {
                        return date('Y-m-d', strtotime($d));
                    },
                    'field' => 'T0."CreateDate"',
                    'as' => 'CreateDate'
                ),
                //array('db' => 'CAST(T0."CreateDate" AS DATE) AS "CreateDate"', 'dt' => 1, 'field' => 'T0."CreateDate"', 'as' => 'CreateDate'),
                array('db' => 'T0."ItemCode"', 'dt' => 2, 'field' => 'T0."ItemCode"', 'as' => 'ItemCode'),
                array('db' => 'T0."ItemName"', 'dt' => 3, 'field' => 'T0."ItemName"', 'as' => 'ItemName'),
                array('db' => 'T10."Name" AS "Especialidad"', 'dt' => 4, 'field' => 'T10."Name"', 'as' => 'Especialidad'),
                array('db' => 'T5."FirmName"', 'dt' => 5, 'field' => 'T5."FirmName"', 'as' => 'FirmName'),
                array('db' => 'CASE WHEN T0."QryGroup10" = \'Y\' THEN \'A\' WHEN T0."QryGroup11" = \'Y\' THEN \'B\' WHEN T0."QryGroup12" = \'Y\' THEN \'C\' WHEN T0."QryGroup13" = \'Y\' THEN \'D\' WHEN T0."QryGroup14" = \'Y\' THEN \'N\' WHEN T0."QryGroup15" = \'Y\' THEN \'F\' WHEN T0."QryGroup16" = \'Y\' THEN \'R\' WHEN T0."QryGroup17" = \'Y\' THEN \'H\' WHEN T0."QryGroup18" = \'Y\' THEN \'BR\' WHEN T0."QryGroup19" = \'Y\' THEN \'CR\' ELSE \'N/A\' END AS "Rotacion"', 'dt' => 6, 'field' => 'CASE WHEN T0."QryGroup10" = \'Y\' THEN \'A\' WHEN T0."QryGroup11" = \'Y\' THEN \'B\' WHEN T0."QryGroup12" = \'Y\' THEN \'C\' WHEN T0."QryGroup13" = \'Y\' THEN \'D\' WHEN T0."QryGroup14" = \'Y\' THEN \'N\' WHEN T0."QryGroup15" = \'Y\' THEN \'F\' WHEN T0."QryGroup16" = \'Y\' THEN \'R\' WHEN T0."QryGroup17" = \'Y\' THEN \'H\' WHEN T0."QryGroup18" = \'Y\' THEN \'BR\' WHEN T0."QryGroup19" = \'Y\' THEN \'CR\' ELSE \'N/A\' END', 'as' => 'Rotacion'),
                array('db' => 'CASE WHEN T0."U_HBT_ROL" =\'1\' THEN \'Infaltable\' WHEN T0."U_HBT_ROL" =\'2\' THEN \'Rutina\' WHEN T0."U_HBT_ROL" =\'3\' THEN \'Promocional\' WHEN T0."U_HBT_ROL" =\'4\' THEN \'Conveniencia\' WHEN T0."U_HBT_ROL" =\'5\' THEN \'Apuesta\' WHEN T0."U_HBT_ROL" =\'6\' THEN \'Ocasional\' WHEN T0."U_HBT_ROL" =\'7\' THEN \'Salida\' ELSE \'No Aplica\' END AS "Rol"', 'dt' => 7, 'field' => 'CASE WHEN T0."U_HBT_ROL" =\'1\' THEN \'Infaltable\' WHEN T0."U_HBT_ROL" =\'2\' THEN \'Rutina\' WHEN T0."U_HBT_ROL" =\'3\' THEN \'Promocional\' WHEN T0."U_HBT_ROL" =\'4\' THEN \'Conveniencia\' WHEN T0."U_HBT_ROL" =\'5\' THEN \'Apuesta\' WHEN T0."U_HBT_ROL" =\'6\' THEN \'Ocasional\' WHEN T0."U_HBT_ROL" =\'7\' THEN \'Salida\' ELSE \'No Aplica\' END', 'as' => 'Rol'),
                array('db' => 'T0."U_HBT_ACTMAGENTO"', 'dt' => 8, 'field' => 'T0."U_HBT_ACTMAGENTO"', 'as' => 'U_HBT_ACTMAGENTO'),
                array('db' => 'T0."U_HBT_ACTMAGENTOB2B"', 'dt' => 9, 'field' => 'T0."U_HBT_ACTMAGENTOB2B"', 'as' => 'U_HBT_ACTMAGENTOB2B'),
                array('db' => 'T0."U_HBT_ACTMAGENTOB2C"', 'dt' => 10, 'field' => 'T0."U_HBT_ACTMAGENTOB2C"', 'as' => 'U_HBT_ACTMAGENTOB2C'),
                array('db' => 'T0."U_HBT_SERENVIOS"', 'dt' => 11, 'field' => 'T0."U_HBT_SERENVIOS"', 'as' => 'U_HBT_SERENVIOS'),
                array('db' => 'T0."U_HBT_ACTTRANSNAC"', 'dt' => 12, 'field' => 'T0."U_HBT_ACTTRANSNAC"', 'as' => 'U_HBT_ACTTRANSNAC'),
            );

            echo json_encode(DataTable::simple($_POST, $table, $primaryKey, $columns));
            break;
        case 'LoadProduct':

            $filtro = isset($_POST['ItemCode']) ? str_replace(" ", "%", $_POST['ItemCode']) : '';
            $whereClause = "LOWER(\"ItemCode\") LIKE LOWER('%$filtro%') OR LOWER(\"ItemName\") LIKE LOWER('%$filtro%')";

            // Obtener la lista de productos
            $objeto = OITM::getLista($whereClause, '"ItemCode" LIMIT 10');

            // Inicializar respuesta
            $response = [];

            if ($objeto && count($objeto) > 0) {
                $response['status'] = 'success';
                foreach ($objeto as $item) {
                    $response['data'][] = [
                        'itemCode' => $item['ItemCode'],
                        'itemName' => utf8_encode($item['ItemName']),
                        'displayText' => utf8_encode($item['ItemName']) . " ({$item['ItemCode']})"
                    ];
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'No se encontraron productos.';
            }

            // Enviar respuesta en formato JSON
            echo json_encode($response);
            break;
        default:
            break;
    }
}
