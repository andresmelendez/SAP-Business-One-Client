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
<!-- Contenido de la página -->
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestión de inventario</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Inventario</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">inventario</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table mr-1"></i>
                        Inventario
                        <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCRUD">
                            Adicionar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablaMarcas" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo Productos</th>
                                    <th>Productos</th>
                                    <th>Almacen</th>
                                    <th>Stock</th>
                                    <th>Comprometido</th>
                                    <th>Pedido</th>
                                    <th>Disponible</th>
                                    <th>Costo del articulo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí se cargarán los datos de la tabla -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        tabla = $('#tablaMarcas').DataTable({
            "bDeferRender": true,
            "stateSave": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "app/inventario/inventario/inventarioAcciones.php",
                "type": "POST",
                "data": {
                    "accion": 'Listar'
                }
            },
            "columns": [{
                    "data": "0"
                },
                {
                    "data": "1"
                },
                {
                    "data": "2"
                },
                {
                    "data": "3"
                },
                {
                    "data": "4"
                },
                {
                    "data": "5"
                },
                {
                    "data": "6"
                },
                {
                    "data": "7"
                }
            ],
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"]
            ],
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            "language": {
                "url": "assets/ferrecol/json/Spanish.json"
            }
        });

    });
</script>