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
<div class="container-fluid">
    <nav class="pull-left">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ayuda
                </a>
            </li>
        </ul>
    </nav>
    <div class="copyright ml-auto">
        FERRETERIAS DE COLOMBIA <i class="fa fa-heart heart text-danger"></i> <a href="#"> FERRECOL </a>
    </div>				
</div>