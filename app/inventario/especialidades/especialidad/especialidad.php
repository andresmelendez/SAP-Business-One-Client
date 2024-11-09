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
                        <input type="text" class="form-control" id="Code" placeholder="" name="Code" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre</label>
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
        <h4 class="page-title">Gestión de especialidades</h4>
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
                <a href="#">Especialidad</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-table mr-1"></i>
                        Especialidad
                        <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCRUD">
                            Adicionar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablaPortafolio" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
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
    var Code, accion;

    $(document).ready(function() {
        tabla = $('#tablaPortafolio').DataTable({
            "bDeferRender": true,
            "stateSave": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "app/inventario/especialidades/especialidad/especialidadAcciones.php",
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
                url: "app/inventario/especialidades/especialidad/especialidadAcciones.php",
                type: "POST",
                data: {
                    Code: $('#Code').val(),
                    Name: $('#Name').val(),
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
        });

        $(document).on("click", ".btnEditar", function() {
            accion = 'Modificar';
            Code = $(this).closest("tr").find('td:eq(0)').text();
            Name = $(this).closest("tr").find('td:eq(1)').text();
            $("#Code").val(Code);
            $("#Name").val(Name);
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
                    url: "app/inventario/especialidades/especialidad/especialidadAcciones.php",
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