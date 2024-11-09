<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start();

require_once 'database/ConectorBD.php';
require_once 'class/SAP/OUSR.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?mensaje=Acceso no autorizado");
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SAP Business One</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <link rel="icon" href="imagenes/SAP-Business-One-Client.ico" type="image/x-icon" />

    <script src="assets/ferrecol/js/jquery-3.5.1.min.js"></script>
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
    <link rel="stylesheet" href="assets/ferrecol/css/demo.css">
    <link rel="stylesheet" href="assets/ferrecol/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/ferrecol/css/styles.css">
    <script src="assets/ferrecol/js/sweetalert2@11.js"></script>

    <style>
        body>.loading-mask {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999999;
            background-color: rgba(0, 0, 0, 0.8);
            background-image: url(imagenes/loader.svg);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50px;
        }
    </style>
</head>

<body>
    <div class="loading-mask d-none"></div>
    <div class="wrapper">
        <div class="main-header">
            <?php require_once './extensiones/header.php'; ?>
        </div>
        <div class="sidebar sidebar-style-2">
            <?php require_once './extensiones/menu.php'; ?>
        </div>
        <div class="main-panel">
            <div class="container">
                <?php
                if (isset($_GET['CONTENIDO'])) {
                    if (file_exists($_GET['CONTENIDO'])) {
                        require_once $_GET['CONTENIDO'];
                    } else {
                        echo '<div class="page-not-found"><div class="wrapper not-found"><h1 class="animated fadeIn">404</h1><div class="desc animated fadeIn"><span>OOPS!</span><br/>La pagina no esta disponible</div></div></div>';
                    }
                }
                ?>
            </div>
            <footer class="footer">
                <?php require_once './extensiones/footer.php'; ?>
            </footer>
        </div>
        <div class="custom-template">
            <?php require_once './extensiones/colores.php'; ?>
        </div>
    </div>
    <script src="assets/ferrecol/js/popper.min.js"></script>
    <script src="assets/ferrecol/js/bootstrap.min.js"></script>
    <script src="assets/ferrecol/js/jquery-ui.min.js"></script>
    <script src="assets/ferrecol/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/ferrecol/js/bootstrap-toggle.min.js"></script>
    <script src="assets/ferrecol/js/jquery.scrollbar.min.js"></script>
    <script src="assets/ferrecol/js/datatables.min.js"></script>
    <script src="assets/ferrecol/js/dataTables.responsive.min.js"></script>
    <script src="assets/ferrecol/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/ferrecol/buttons/buttons.html5.min.js"></script>
    <script src="assets/ferrecol/buttons/buttons.print.min.js"></script>
    <script src="assets/ferrecol/buttons/jszip.min.js"></script>
    <script src="assets/ferrecol/js/select2.full.min.js"></script>
    <script src="assets/ferrecol/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/ferrecol/js/atlantis.min.js"></script>
    <script src="assets/ferrecol/js/setting-demo2.js"></script>
    <script>
        $('.select2').select2({
            theme: "bootstrap",
            width: '100%'
        });
    </script>
</body>

</html>