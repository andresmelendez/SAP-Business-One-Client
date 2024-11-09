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
                        <label for="Linea">Especialidad <span class="required-label">*</span></label>
                        <select class="custom-select d-block w-100" id="U_HBT_ESPECIALIDAD" placeholder="" name="U_HBT_ESPECIALIDAD" required></select>
                    </div>
                    <div class="form-group">
                        <label for="Linea">Portafolio <span class="required-label">*</span></label>
                        <select class="custom-select d-block w-100" id="Code" placeholder="" name="Code" required></select>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Codigo detalle portafolio</label>
                        <input type="text" class="form-control" id="U_HBT_CODIGODET" placeholder="" name="U_HBT_CODIGODET" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Detalle Portafolio</label>
                        <input type="text" class="form-control" id="U_HBT_NOMDETALLE" placeholder="" name="U_HBT_NOMDETALLE" required>
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
        <h4 class="page-title">Gestión de detalle portafolio</h4>
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
                <a href="#">Detalle Portafolio</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table mr-1"></i>
                        Detalle Portafolio
                        <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCRUD">
                            Adicionar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablaDetallePortafolio" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Detalle Portafolio</th>
                                    <th>Codigo Portafolio</th>
                                    <th>Portafolio</th>
                                    <th>Codigo Especialidad</th>
                                    <th>Especialidad</th>
                                    <th>Acciones</th>
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
    //filtros
    $.ajax({
        type: "POST",
        url: "app/inventario/especialidades/detallePortafolio/detallePortafolioAcciones.php",
        data: {
            accion: 'Especialidad'
        },
        dataType: "json", // Espera una respuesta en formato JSON
        success: function(response) {
            // Asegúrate de que 'response' tenga la estructura esperada
            if (response.status === 'success') { // Verifica si la respuesta es exitosa
                $('#U_HBT_ESPECIALIDAD').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
            } else {
                console.error("Error en la respuesta:", response.message || "Respuesta no válida"); // Manejo de errores
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Manejo de errores en la solicitud AJAX
            console.error("Error en la solicitud:", textStatus, errorThrown);
            alert("Ocurrió un error al realizar la solicitud. Por favor, inténtalo de nuevo.");
        }
    });

    function cargarPortafolio(portafolio = null) {
        $.ajax({
            type: "POST",
            url: "app/inventario/especialidades/detallePortafolio/detallePortafolioAcciones.php",
            data: {
                accion: 'Portafolio',
                Code: $('#U_HBT_ESPECIALIDAD').val(),
                Default: portafolio
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#Code').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                } else {
                    console.error("Error en la respuesta:", response.message || "Respuesta no válida"); // Manejo de errores
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores en la solicitud AJAX
                console.error("Error en la solicitud:", textStatus, errorThrown);
                alert("Ocurrió un error al realizar la solicitud. Por favor, inténtalo de nuevo.");
            }
        });
    }

    //filtros

    var Code, accion;

    $(document).ready(function() {
        tabla = $('#tablaDetallePortafolio').DataTable({
            "bDeferRender": true,
            "stateSave": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "app/inventario/especialidades/detallePortafolio/detallePortafolioAcciones.php",
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
                    "data": null,
                    "className": "text-right",
                    "targets": -1,
                    "defaultContent": "<a class='btnEditar'><img src='imagenes/ModificarP.png'></a><a class='btnBorrar'><img src='imagenes/EliminarP.png' title='Eliminar'></a>"
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

        $('#formulario').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "app/inventario/especialidades/detallePortafolio/detallePortafolioAcciones.php",
                type: "POST",
                data: {
                    U_HBT_CODIGODET: $('#U_HBT_CODIGODET').val(),
                    U_HBT_NOMDETALLE: $('#U_HBT_NOMDETALLE').val(),
                    Code: $('#Code').val(),
                    accion: $('#btnGuardar').text()
                },
                dataType: 'json',
                success: function(response) {
                    // Manejar la respuesta del servidor
                    if (response.status === "success") {
                        // Operación exitosa
                        alert(response.message); // Mostramos mensaje de éxito
                        tabla.ajax.reload(null, false);
                    } else {
                        // Ocurrió algún error
                        alert("Error: " + response.message); // Mostramos mensaje de error
                    }
                },
                error: function(xhr, status, error) {
                    // Si ocurre un error en la petición AJAX (problema de red, servidor, etc.)
                    console.error("Error en la petición: ", error);
                    alert("Error al realizar la petición.");
                }
            });
            $('#modalCRUD').modal('hide');
        });

        $("#btnNuevo").click(function() {
            accion = 'Adicionar';
            $("#formulario").trigger("reset");
            $(".modal-header").css("background-color", "#17a2b8");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("ADICIONAR");
            $("#btnGuardar").text("Adicionar");
            $('#modalCRUD').modal('show');
            cargarPortafolio();
        });

        $(document).on("change", "#U_HBT_ESPECIALIDAD", function() {
            cargarPortafolio();
        });

        $(document).on("click", ".btnEditar", function() {
            accion = 'Modificar';
            U_HBT_CODIGODET = $(this).closest("tr").find('td:eq(0)').text();
            U_HBT_NOMDETALLE = $(this).closest("tr").find('td:eq(1)').text();
            U_HBT_ESPECIALIDAD = $(this).closest("tr").find('td:eq(4)').text();
            Code = $(this).closest("tr").find('td:eq(2)').text();
            $("#U_HBT_CODIGODET").val(U_HBT_CODIGODET);
            $("#U_HBT_NOMDETALLE").val(U_HBT_NOMDETALLE);
            $("#U_HBT_ESPECIALIDAD").val(U_HBT_ESPECIALIDAD);
            cargarPortafolio(Code);
            $(".modal-header").css("background-color", "#007bff");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("MODIFICAR");
            $("#btnGuardar").text("Modificar");
            $('#modalCRUD').modal('show');
        });

        $(document).on("click", ".btnBorrar", function() {
            U_HBT_CODIGODET = $(this).closest('tr').find('td:eq(0)').text();
            accion = 'Eliminar';
            var respuesta = confirm("¿Está seguro de borrar el registro con ID " + U_HBT_CODIGODET + "?");
            if (respuesta) {
                $.ajax({
                    url: "app/inventario/especialidades/detallePortafolio/detallePortafolioAcciones.php",
                    type: "POST",
                    data: {
                        accion: accion,
                        U_HBT_CODIGODET: U_HBT_CODIGODET
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        if (response.status === "success") {
                            // Operación exitosa
                            alert(response.message); // Mostramos mensaje de éxito
                            tabla.ajax.reload(null, false);
                        } else {
                            // Ocurrió algún error
                            alert("Error: " + response.message); // Mostramos mensaje de error
                        }
                    },
                    error: function(xhr, status, error) {
                        // Si ocurre un error en la petición AJAX (problema de red, servidor, etc.)
                        console.error("Error en la petición: ", error);
                        alert("Error al realizar la petición." + error);
                    }
                });
            }
        });
    });
</script>