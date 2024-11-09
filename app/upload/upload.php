<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?mensaje=Acceso no autorizado");
}
?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Carga Múltiple</h4>
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
                <a href="#">Formularios</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Carga Múltiple</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <i class="fas fa-table mr-1"></i>
                Carga de imagenes
                <button id="uploadFiles" type="button" class="btn btn-outline-primary btn-round ml-auto">
                    Subir Archivos
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="dropzone" id="myDropzone">
                <div class="dz-message" data-dz-message>
                    <div class="icon">
                        <i class="flaticon-file"></i>
                    </div>
                    <h4 class="message">Arrastra y Suelta archivos aquí</h4>
                    <div class="note">Puedes arrastrar y soltar archivos aquí para subirlos. Asegúrate de que sean imágenes en formato PNG o JPG.</div>
                </div>
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/ferrecol/js/dropzone.min.js"></script>
<script>
    // Configuración de Dropzone
    Dropzone.options.myDropzone = {
        url: '/upload-url', // Proporciona una URL ficticia para evitar el error
        acceptedFiles: "image/png,image/jpeg", // Acepta solo PNG y JPG
        autoProcessQueue: false, // Deshabilita la subida automática
        maxFiles: 100, // Límite máximo de archivos permitidos
        addRemoveLinks: true,
        init: function() {
            var myDropzone = this; // Guarda el contexto de Dropzone

            // Evento al añadir un archivo a la cola
            myDropzone.on("addedfile", function(file) {
                // Verifica el número total de archivos en la cola
                if (myDropzone.files.length > 100) {
                    this.removeFile(file); // Remueve el archivo añadido si supera el límite
                    Swal.fire({
                        icon: 'warning',
                        title: 'Límite de archivos excedido',
                        text: 'No puedes subir más de 100 archivos.'
                    });
                }
            });

            // Evento al hacer clic en el botón de subir
            $('#uploadFiles').on('click', function() {
                // Verificar si hay archivos en la cola
                if (myDropzone.files.length > 0) {
                    var formData = new FormData();
                    formData.append('accion', 'Actualizar');

                    // Añadir archivos al FormData
                    $.each(myDropzone.files, function(i, file) {
                        formData.append('file[]', file);
                    });

                    Swal.fire({
                        title: 'Cargando...',
                        text: 'Por favor, espera mientras se suben los archivos.',
                        allowOutsideClick: false, // No permite cerrar el modal al hacer clic fuera
                        showConfirmButton: false
                    });

                    // Realiza la petición AJAX
                    $.ajax({
                        url: 'app/upload/uploadAcciones.php', // Cambia esta URL según tu necesidad
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            //console.log(response); // Maneja la respuesta del servidor
                            myDropzone.removeAllFiles(); // Limpiar la cola después de la subida

                            // Cierra el modal de carga
                            Swal.close();

                            // Muestra un mensaje de éxito
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: 'Los archivos se han subido correctamente.'
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus, errorThrown); // Manejo de errores

                            // Cierra el modal de carga
                            Swal.close();

                            // Muestra un mensaje de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Ocurrió un error al subir los archivos. Inténtalo de nuevo.'
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: 'No hay archivos para subir.'
                    });
                }
            });

        }
    };
</script>