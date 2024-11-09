<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?mensaje=Acceso no autorizado");
}
?>
<style>
    .table-responsive {
        max-height: 410px;
        overflow-y: auto;
    }

    /* Estilos para la barra de desplazamiento */
    .table-responsive::-webkit-scrollbar {
        width: 8px;
        /* Ancho de la barra de desplazamiento */
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        /* Color de la parte deslizante */
        border-radius: 5px;
        /* Bordes redondeados */
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Color de la parte deslizante al pasar el mouse */
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
        /* Color del fondo de la barra de desplazamiento */
        border-radius: 5px;
        /* Bordes redondeados */
    }
</style>

</style>
<script src="assets/ferrecol/js/chart.js"></script>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left flex-column">
            <h2 class="pb-2 fw-bold text-light">Dashboard</h2>
            <div class="nav d-flex">
                <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                    <a class="nav-link active text-light" href="#">Informe de ventas<span class="badge badge-info ml-2">8</span></a>
                    <a class="nav-link text-light" href="#">Processed</a>
                    <a class="nav-link text-light" href="#">Cancelled<span class="badge badge-danger ml-2">2</span></a>
                </div>
                <div class="d-flex d-md-inline ml-md-auto py-2 py-md-0">
                    <div class="dropdown d-inline mr-3 mr-md-2">
                        <button class="btn btn-info btn-round dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <a href="#" class="btn btn-info btn-border btn-round"> <span class="btn-label"> <i class="fa fa-plus"></i></span> Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-chart-pie text-warning"></i>
                            </div>
                        </div>
                        <div class="col-8 col-stats">
                            <div class="numbers">
                                <p class="card-category">Total ventas</p>
                                <h5 id="totalVentas">0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-big text-center">
                                <i class="flaticon-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-8 col-stats">
                            <div class="numbers">
                                <p class="card-category">Utilidad</p>
                                <h5 id="totalUtilidad">0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon-big text-center">
                                <i class="flaticon-error text-danger"></i>
                            </div>
                        </div>
                        <div class="col-8 col-stats">
                            <div class="numbers">
                                <p class="card-category">Margen</p>
                                <h5 id="margen">0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <p class="card-category">Mes</p>
                                <select name="monthFilter" id="monthFilter" class="form-control">
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">Venta diaria</div>
                    <div class="card-category">
                        <div class="table-responsive">
                            <table class="table table-striped text-light">
                                <thead>
                                    <tr>
                                        <th>Dia</th>
                                        <th>Venta</th>
                                    </tr>
                                </thead>
                                <tbody id="ventaDiaria">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Total Ventas</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                        <canvas id="myChartSalesMonth"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Comparativo de Ventas</div>
                    </div>
                    <p class="card-category">
                        Gráfica comparativa de ventas mensuales entre el año actual y el anterior.
                    </p>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 300px">
                        <canvas id="myComparativeSales"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Acumulado de Ventas</div>
                    </div>
                    <p class="card-category">
                        Gráfica acumulada de ventas mensuales entre el año actual y el anterior.
                    </p>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 300px">
                        <canvas id="myAcumulateSales"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let mesActual = new Date().getMonth() + 1;
    $('#monthFilter').val(mesActual);

    $(document).ready(function() {
        // Función que realiza la solicitud AJAX
        function cargarInformeVentas() {
            $.ajax({
                url: 'app/dashboard/dashboardAcciones.php', // Cambia esto a la URL de tu archivo PHP
                type: 'POST',
                data: {
                    accion: 'InformeVentas',
                    monthFilter: $('#monthFilter').val(),
                },
                dataType: 'json',
                success: function(response) {
                    // Inserta la tabla HTML en el div con id `tablaVentas`
                    $('#ventaDiaria').html(response.tablaHTML);

                    // Inserta los totales y margen de utilidad en etiquetas específicas
                    $('#totalVentas').text(response.totalVentas);
                    $('#totalUtilidad').text(response.totalUtilidad);
                    $('#margen').text(response.margenUtilidad);

                    actualizarGrafico('myChartSalesMonth', response.ventaMes, 'bar');
                    actualizarGrafico('myComparativeSales', response.ventaComparativo, 'line');
                    actualizarGrafico('myAcumulateSales', response.ventaAcumulada, 'line');
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud:", error);
                }
            });
        }

        function actualizarGrafico(graphicId, data, type) {
            // Verifica si ya existe un gráfico en el canvas
            if (window[graphicId] instanceof Chart) {
                window[graphicId].destroy(); // Destruir el gráfico existente
            }

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    y: { // Cambiar 'yAxes' a 'y' para versiones 3.x y superiores
                        ticks: {
                            display: true, // Muestra las etiquetas en el eje Y
                            callback: function(value) {
                                return value / 1000000 + 'M'; // Formatea el valor a miles
                            }
                        },
                        grid: {
                            drawBorder: false,
                            display: false
                        }
                    },
                    x: { // Cambiar 'xAxes' a 'x'
                        grid: {
                            drawBorder: false,
                            display: false
                        }
                    }
                },
            };

            // Crear el gráfico y almacenarlo en la ventana
            window[graphicId] = new Chart(document.getElementById(graphicId), {
                type: type,
                data: data,
                options: chartOptions
            });
        }

        // Llama a la función cuando necesites cargar el informe
        cargarInformeVentas();

        // Actualiza el informe cada 5 segundos
        setInterval(cargarInformeVentas, 30000);

        $(document).on("change", "#monthFilter", function() {
            cargarInformeVentas();
        });

    });
</script>