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
<!-- Modal para CRUD -->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formulario">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombreCategoria">Codigo</label>
                        <input type="text" class="form-control" id="FirmCode" placeholder="" name="FirmCode" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre</label>
                        <input type="text" class="form-control" id="FirmName" placeholder="" name="FirmName" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Contenido de la página -->
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestión de Productos</h4>
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
                <a href="#">Productos</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table mr-1"></i>
                        Productos
                        <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCRUD">
                            Adicionar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form id="motorDeBusqueda">
                        <div class="form-group">
                            <div class="card mt-4">
                                <h5 class="card-header text-center">
                                    <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" aria-controls="collapse-example" id="heading-example" class="d-block">
                                        <i class="fa fa-chevron-down pull-right"></i>
                                        MOTOR DE BUSQUEDA
                                    </a>
                                </h5>
                                <div id="collapse-example" class="collapse" aria-labelledby="heading-example">
                                    <div class="card-body">
                                        <div class="form-row justify-content-center">
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_Especialidad">Especialidad</label>
                                                <select class="custom-select d-block w-100" id="U_HBT_Especialidad" placeholder="" name="U_HBT_Especialidad" required="">
                                                    <option value="">Todas</option>
                                                    <option value="ESP ACABADOS">101 - ESP ACABADOS</option>
                                                    <option value="ESP ACEROS Y TREFILADOS">102 - ESP ACEROS Y TREFILADOS</option>
                                                    <option value="ESP CARPINTERIA">103 - ESP CARPINTERIA</option>
                                                    <option value="ESP CONDUCCION DE AGUA">104 - ESP CONDUCCION DE AGUA</option>
                                                    <option value="ESP ELECTRICOS">105 - ESP ELECTRICOS</option>
                                                    <option value="ESP FERRETERIA AGRICOLA">106 - ESP FERRETERIA AGRICOLA</option>
                                                    <option value="ESP GEOSISTEMAS">107 - ESP GEOSISTEMAS</option>
                                                    <option value="ESP PATIO CONSTRUCTOR">108 - ESP PATIO CONSTRUCTOR</option>
                                                    <option value="ESP PINTURAS">109 - ESP PINTURAS</option>
                                                    <option value="ESP QUIMICOS CONSTRUCCION">110 - ESP QUIMICOS CONSTRUCCION</option>
                                                    <option value="ESP SISTEMA LIVIANO">111 - ESP SISTEMA LIVIANO</option>
                                                    <option value="ESP TALLER INDUSTRIA">112 - ESP TALLER INDUSTRIA</option>
                                                    <option value="ESP SIN PORTAFOLIO">999 - ESP SIN PORTAFOLIO</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="frozenFor">Inactivo</label>
                                                <select id="frozenFor" name="frozenFor" class="form-control">
                                                    <option value="N">No</option>
                                                    <option value="Y">Si</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_ACTMAGENTO">Activo Magento</label>
                                                <select id="U_HBT_ACTMAGENTO" name="U_HBT_ACTMAGENTO" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_ACTMAGENTOB2B">Activo Magento B&B</label>
                                                <select id="U_HBT_ACTMAGENTOB2B" name="U_HBT_ACTMAGENTOB2B" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_ACTMAGENTOB2C">Activo Magento B&C</label>
                                                <select id="U_HBT_ACTMAGENTOB2C" name="U_HBT_ACTMAGENTOB2C" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_ROL">Rol</label>
                                                <select name="U_HBT_ROL" id="U_HBT_ROL" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="Infaltable">Infaltable</option>
                                                    <option value="Rutuna">Rutuna</option>
                                                    <option value="Promocional">Promocional</option>
                                                    <option value="Conveniencia">Conveniencia</option>
                                                    <option value="Apuesta">Apuesta</option>
                                                    <option value="Ocasional">Ocasional</option>
                                                    <option value="Salida">Salida</option>
                                                    <option value="No Aplica">No Aplica</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="U_HBT_ROTACION">Rotacion</label>
                                                <select name="U_HBT_ROTACION" id="U_HBT_ROTACION" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="N">N</option>
                                                    <option value="F">F</option>
                                                    <option value="R">R</option>
                                                    <option value="H">H</option>
                                                    <option value="BR">BR</option>
                                                    <option value="CR">CR</option>
                                                    <option value="N/A">N/A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-center">
                                            <input type="submit" name="buscar" id="buscar" class="btn btn-outline-primary" value="Consultar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped small" id="tablaProductos" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Inactivo</th>
                                    <th>Fecha Creacion</th>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Especialidad</th>
                                    <th>Marca</th>
                                    <th>Rotacion</th>
                                    <th>Rol</th>
                                    <th>Activo Magento</th>
                                    <th>Activo Magento B&B</th>
                                    <th>Activo Magento B&C</th>
                                    <th>Despacho por servicios de envios</th>
                                    <th>Transporte Nacional</th>
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
        tabla = $('#tablaProductos').DataTable({
            "bDeferRender": true,
            "responsive": true,
            "stateSave": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "app/inventario/productos/productosAcciones.php",
                "type": "POST",
                "data": {
                    "accion": 'Listar'
                },
                "error": function(jqXHR, textStatus, errorThrown) {
                    console.error("Error en la petición AJAX: ", textStatus, errorThrown);
                    console.error("Respuesta del servidor:", jqXHR.responseText);
                    alert("Ocurrió un error al intentar cargar los datos. Por favor, inténtelo nuevamente.");
                }
            },
            "columns": [{
                    "data": null,
                    "className": "text-center",
                    "targets": -1,
                    "render": function(data, type, row) {
                        return "<a class='btnEditar' href='principal.php?CONTENIDO=app/inventario/productos/productos.php&item=" + row[2] + "'><img src='imagenes/ModificarP.png'></a>";
                    }
                },
                {
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
                },
                {
                    "data": "8"
                },
                {
                    "data": "9"
                },
                {
                    "data": "10"
                },
                {
                    "data": "11"
                },
                {
                    "data": "12"
                }
            ],
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50],
                [10, 25, 50]
            ],
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            "language": {
                "url": "assets/ferrecol/json/Spanish.json"
            }
        });

        tabla.column(1).search($('#frozenFor').val()).draw();

        $('#buscar').on('click', function(e) {
            e.preventDefault();
            frozenFor = $('#frozenFor').val();
            U_HBT_Especialidad = $('#U_HBT_Especialidad').val();
            U_HBT_ACTMAGENTO = $('#U_HBT_ACTMAGENTO').val();
            U_HBT_ACTMAGENTOB2B = $('#U_HBT_ACTMAGENTOB2B').val();
            U_HBT_ACTMAGENTOB2C = $('#U_HBT_ACTMAGENTOB2C').val();
            U_HBT_ROL = $('#U_HBT_ROL').val();
            U_HBT_ROTACION = $('#U_HBT_ROTACION').val();

            tabla.column(1).search(frozenFor).draw();
            tabla.column(5).search(U_HBT_Especialidad).draw();
            tabla.column(7).search(U_HBT_ROTACION).draw();
            tabla.column(8).search(U_HBT_ROL).draw();
            tabla.column(9).search(U_HBT_ACTMAGENTO).draw();
            tabla.column(10).search(U_HBT_ACTMAGENTOB2B).draw();
            tabla.column(11).search(U_HBT_ACTMAGENTOB2C).draw();
        });
    });
</script>