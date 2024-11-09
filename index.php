<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
session_unset();
session_destroy();
$mensaje = '';
if (isset($_REQUEST['mensaje'])) $mensaje = $_REQUEST['mensaje'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="imagenes/SAP-Business-One-Client.ico" type="image/x-icon" />

    <script src="assets/ferrecol/js/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/ferrecol/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="assets/ferrecol/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/ferrecol/css/atlantis.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Iniciar Sesion</h3>
            <form name="formulario" id="formulario" action="" method="post">
                <font color="red">
                    <p class="text-center" id="mensaje"><?= $mensaje ?></p>
                </font>
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input name="usuario" id="usuario" type="text" class="form-control input-border-bottom" pattern="[A-Za-z0-9]{1,12}" required>
                        <label for="username" class="placeholder">Usuario</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input name="clave" id="clave" type="password" class="form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Contraseña</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <a href="#" class="link float-right" id="show-signup">Contraseña olvidada?</a>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Iniciar sesion</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container container-signup animated fadeIn">
            <form name="formularioRecuperarClave" id="formularioRecuperarClave" action="" method="post">
                <h3 class="text-center">Recuperar contraseÃ±a</h3>
                <div class="login-form">
                    <div class="small mb-3 text-muted text-center">Ingrese su identificacion y le enviaremos un enlace para restablecer su contraseÃ±a al correo electronico.</div>
                    <div class="small text-danger">
                        <p class="text-center" id="mensajeClave"></p>
                    </div>
                    <div class="form-group form-floating-label">
                        <input name="identificacion" id="identificacion" type="text" class="form-control input-border-bottom" pattern="[A-Za-z0-9]{1,12}" required>
                        <label for="identificacion" class="placeholder">Usuario</label>
                    </div>
                    <div class="form-action">
                        <a href="#" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Cancelar</a>
                        <input type="submit" class="btn btn-primary btn-rounded btn-login" value="Restablecer">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/ferrecol/js/jquery-3.5.1.min.js"></script>
    <script src="assets/ferrecol/js/jquery-ui.min.js"></script>
    <script src="assets/ferrecol/js/popper.min.js"></script>
    <script src="assets/ferrecol/js/bootstrap.min.js"></script>
    <script src="assets/ferrecol/js/atlantis.min.js"></script>
    <script src="assets/ferrecol/js/login.js"></script>
</body>

</html>