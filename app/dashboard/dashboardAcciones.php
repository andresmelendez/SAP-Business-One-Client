<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../database/ConectorBD.php';
require_once '../../class/SAP/Functions.php';

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'InformeVentas':
            $monthFilter = $_POST['monthFilter'] ?? null;

            $objeto = new Functions();
            $data = $objeto->getVentas($monthFilter);

            // Variables para almacenar totales
            $totalVentas = 0;
            $totalUtilidad = 0;
            $tablaHTML = '';

            foreach ($data as $fila) {
                $dia = $fila['Dia'];
                $ventasDiarias = number_format($fila['Total_Ventas_Diaria'], 0);

                // Suma acumulativa de ventas y utilidad
                $totalVentas += $fila['Total_Ventas_Diaria'];
                $totalUtilidad += $fila['Utilidad_Diaria'];

                // Fila de datos
                $tablaHTML .= "<tr><td>$dia</td><td>$ventasDiarias</td></tr>";
            }

            $data1 = $objeto->getVentasXMes();

            // Datos para el gráfico de Vendedores
            $ventaMes = array(
                'labels' => array_values(array_map(function ($datos) {
                    return round($datos['MES'], 0);
                }, $data1)),
                'datasets' => array(
                    array(
                        'label' => 'Ventas Totales',
                        'data' => array_values(array_map(function ($datos) {
                            return round($datos['Total_Ventas_Anio_Actual'], 0);
                        }, $data1)),
                        'borderWidth' => 1
                    )
                )
            );

            // Procesar datos para Chart.js
            $ventaComparativo = array(
                'labels' => array_values(array_map(function ($datos) {
                    return round($datos['MES'], 0);
                }, $data1)),
                'datasets' => array(
                    array(
                        'label' => 'Ventas Año Actual',
                        'borderColor' => '#1d7af3',
                        'pointBorderColor' => '#FFF',
                        'pointBackgroundColor' => '#1d7af3',
                        'pointBorderWidth' => 2,
                        'pointHoverRadius' => 4,
                        'pointHoverBorderWidth' => 1,
                        'pointRadius' => 4,
                        'backgroundColor' => 'transparent',
                        'fill' => true,
                        'borderWidth' => 2,
                        'data' => array_values(array_map(function ($datos) {
                            return round($datos['Total_Ventas_Anio_Actual'], 0);
                        }, $data1))
                    ),
                    array(
                        'label' => 'Ventas Año Anterior',
                        'borderColor' => '#59d05d',
                        'pointBorderColor' => '#FFF',
                        'pointBackgroundColor' => '#59d05d',
                        'pointBorderWidth' => 2,
                        'pointHoverRadius' => 4,
                        'pointHoverBorderWidth' => 1,
                        'pointRadius' => 4,
                        'backgroundColor' => 'transparent',
                        'fill' => true,
                        'borderWidth' => 2,
                        'data' => array_values(array_map(function ($datos) {
                            return round($datos['Total_Ventas_Anio_Anterior'], 0);
                        }, $data1))
                    )
                )
            );

            // Procesar datos para Chart.js
            $ventaAcumulada = array(
                'labels' => array_values(array_map(function ($datos) {
                    return round($datos['MES'], 0);
                }, $data1)),
                'datasets' => array(
                    array(
                        'label' => 'Acumulado Año Actual',
                        'borderColor' => '#1d7af3',
                        'pointBorderColor' => '#FFF',
                        'pointBackgroundColor' => '#1d7af3',
                        'pointBorderWidth' => 2,
                        'pointHoverRadius' => 4,
                        'pointHoverBorderWidth' => 1,
                        'pointRadius' => 4,
                        'backgroundColor' => 'transparent',
                        'fill' => true,
                        'borderWidth' => 2,
                        'data' => array_values(array_map(function ($datos) {
                            return round($datos['Acumulado_Anio_Actual'], 0);
                        }, $data1))
                    ),
                    array(
                        'label' => 'Acumulado Año Anterior',
                        'borderColor' => '#59d05d',
                        'pointBorderColor' => '#FFF',
                        'pointBackgroundColor' => '#59d05d',
                        'pointBorderWidth' => 2,
                        'pointHoverRadius' => 4,
                        'pointHoverBorderWidth' => 1,
                        'pointRadius' => 4,
                        'backgroundColor' => 'transparent',
                        'fill' => true,
                        'borderWidth' => 2,
                        'data' => array_values(array_map(function ($datos) {
                            return round($datos['Acumulado_Anio_Anterior'], 0);
                        }, $data1))
                    )
                )
            );

            // Cálculo del margen de utilidad
            $margenUtilidad = ($totalVentas > 0) ? ($totalUtilidad / $totalVentas) * 100 : 0;

            // Estructura JSON con la tabla y totales
            $response = [
                "tablaHTML" => $tablaHTML,
                "totalVentas" => number_format($totalVentas, 0),
                "totalUtilidad" => number_format($totalUtilidad, 0),
                "margenUtilidad" => number_format($margenUtilidad, 2) . "%",
                "ventaMes" => $ventaMes,
                "ventaComparativo" => $ventaComparativo,
                "ventaAcumulada" => $ventaAcumulada
            ];

            // Enviar respuesta en formato JSON
            echo json_encode($response);
            break;

        default:
            break;
    }
}
