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
                        <label for="Linea">Linea <span class="required-label">*</span></label>
                        <select class="custom-select d-block w-100" id="U_HBT_CODIGO" placeholder="" name="U_HBT_CODIGO" required></select>
                    </div>
                    <div class="form-group">
                        <label for="Linea">Grupo <span class="required-label">*</span></label>
                        <select class="custom-select d-block w-100" id="U_HBT_GRUPO" placeholder="" name="Code" required></select>
                    </div>
                    <div class="form-group">
                        <label for="Linea">Categoria <span class="required-label">*</span></label>
                        <select class="custom-select d-block w-100" id="U_HBT_CATEGORIA" placeholder="" name="Code" required></select>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Codigo Familia</label>
                        <input type="text" class="form-control" id="Code" placeholder="" name="Code" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Familia</label>
                        <input type="text" class="form-control" id="Name" placeholder="" name="Name" required>
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
        <h4 class="page-title">Gestión de familias</h4>
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
                <a href="#">Familias</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table mr-1"></i>
                        Familias
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
                                    <th>Familia</th>
                                    <th>Codigo Categoria</th>
                                    <th>Categoria</th>
                                    <th>Codigo Grupo</th>
                                    <th>Grupo</th>
                                    <th>Codigo Linea</th>
                                    <th>Linea</th>
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
        url: "app/inventario/categorias/familia/familiaAcciones.php",
        data: {
            accion: 'Linea'
        },
        dataType: "json", // Espera una respuesta en formato JSON
        success: function(response) {
            // Asegúrate de que 'response' tenga la estructura esperada
            if (response.status === 'success') { // Verifica si la respuesta es exitosa
                $('#U_HBT_CODIGO').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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

    function cargarGrupo(grupo = null, categoria = null) {
        $.ajax({
            type: "POST",
            url: "app/inventario/categorias/familia/familiaAcciones.php",
            data: {
                accion: 'Grupo',
                Code: $('#U_HBT_CODIGO').val(),
                Default: grupo
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_GRUPO').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                    cargarCategoria(grupo, categoria);
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

    function cargarCategoria(grupo = null, categoria = null) {
        grupo = grupo !== null ? grupo : $('#U_HBT_GRUPO').val();
        $.ajax({
            type: "POST",
            url: "app/inventario/categorias/familia/familiaAcciones.php",
            data: {
                accion: 'Categoria',
                Code: grupo,
                Default: categoria
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                console.log(response);
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_CATEGORIA').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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
                "url": "app/inventario/categorias/familia/familiaAcciones.php",
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
                    "data": "6"
                },
                {
                    "data": "7"
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
                url: "app/inventario/categorias/familia/familiaAcciones.php",
                type: "POST",
                data: {
                    Code: $('#Code').val(),
                    Name: $('#Name').val(),
                    U_HBT_GRUPO: $('#U_HBT_GRUPO').val(),
                    U_HBT_CATEGORIA: $('#U_HBT_CATEGORIA').val(),
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
            cargarGrupo();
            
        });

        $(document).on("change", "#U_HBT_CODIGO", function() {
            cargarGrupo();
        });

        $(document).on("change", "#U_HBT_GRUPO", function() {
            cargarCategoria();
        });

        $(document).on("click", ".btnEditar", function() {
            accion = 'Modificar';
            Code = $(this).closest("tr").find('td:eq(0)').text();
            Name = $(this).closest("tr").find('td:eq(1)').text();
            U_HBT_CATEGORIA = $(this).closest("tr").find('td:eq(2)').text();
            U_HBT_GRUPO = $(this).closest("tr").find('td:eq(4)').text();
            U_HBT_CODIGO = $(this).closest("tr").find('td:eq(6)').text();
            $("#Code").val(Code);
            $("#Name").val(Name);
            $("#U_HBT_CODIGO").val(U_HBT_CODIGO);
            cargarGrupo(U_HBT_GRUPO, U_HBT_CATEGORIA);
            $(".modal-header").css("background-color", "#007bff");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("MODIFICAR");
            $("#btnGuardar").text("Modificar");
            $('#modalCRUD').modal('show');
        });

        $(document).on("click", ".btnBorrar", function() {
            Code = $(this).closest('tr').find('td:eq(0)').text();
            accion = 'Eliminar';
            var respuesta = confirm("¿Está seguro de borrar el registro con ID " + Code + "?");
            if (respuesta) {
                $.ajax({
                    url: "app/inventario/categorias/familia/familiaAcciones.php",
                    type: "POST",
                    data: {
                        accion: accion,
                        Code: Code
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