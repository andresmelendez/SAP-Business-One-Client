/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('#formulario').submit(function (e) {
        e.preventDefault(); // Evitar recarga del formulario

        // Obtener los valores de los campos y eliminamos espacios en blanco
        var usuario = $.trim($("#usuario").val());
        var clave = $.trim($("#clave").val());

        // Realizar la solicitud AJAX
        $.ajax({
            url: "app/auth/login.php",
            type: "POST",
            data: { usuario: usuario, clave: clave },
            dataType: "json", // Especificar que esperamos una respuesta JSON
            success: function (response) {
                console.log(response); // Log para depurar la respuesta

                // Verificar el status de la respuesta
                if (response.status === 'success') {
                    // Redirigir a la URL proporcionada en la respuesta
                    window.location.href = response.data.redirect;
                } else {
                    // Mostrar mensaje de error en caso de fallo
                    $('#mensaje').html(response.message).css('color', 'red');
                }
            }
        });
    });
});