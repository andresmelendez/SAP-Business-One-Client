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
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="imagenes/SAP-Business-One-Client.png" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span style="white-space: normal">
                        <?= $usuario->getUserCode() ?>
                        <span class="user-level"><?= $usuario->getName() ?></span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="principal.php?CONTENIDO=app/perfil/perfil/perfil.php">
                                <span class="link-collapse">Mi perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="principal.php?CONTENIDO=app/perfil/cambiarClave/cambiarClave.php">
                                <span class="link-collapse">Cambiar clave</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Configuracion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav nav-primary">
            <li class="nav-item">
                <a href="principal.php?CONTENIDO=app/dashboard/dashboard.php">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Modulos</h4>
            </li>
            <li class="nav-item">
                <a data-toggle="collapse" href="#inventario">
                    <i class="fas fa-th-list"></i>
                    <p>Inventario</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="inventario">
                    <ul class="nav nav-collapse">
                        <li>
                            <a data-toggle="collapse" href="#subnavProductos">
                                <span class="sub-item">Datos maestros de articulos</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnavProductos">
                                <ul class="nav nav-collapse subnav">
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/productos/listar.php">
                                            <span class="sub-item">Listar Productos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/productos/productos.php">
                                            <span class="sub-item">Datos maestros de articulos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="principal.php?CONTENIDO=app/inventario/inventario/inventario.php">
                                <span class="sub-item">Inventario</span>
                            </a>
                        </li>

                        <li>
                            <a href="principal.php?CONTENIDO=app/inventario/marca/marca.php">
                                <span class="sub-item">Marcas</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="collapse" href="#subnavEspecialidades">
                                <span class="sub-item">Especialidades</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnavEspecialidades">
                                <ul class="nav nav-collapse subnav">
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/especialidades/especialidad/especialidad.php">
                                            <span class="sub-item">Especialidad</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/especialidades/portafolio/portafolio.php">
                                            <span class="sub-item">Portafolio</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/especialidades/detallePortafolio/detallePortafolio.php">
                                            <span class="sub-item">Detalle Portafolio</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li>
                            <a data-toggle="collapse" href="#subnavCategorias">
                                <span class="sub-item">Categorías</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="subnavCategorias">
                                <ul class="nav nav-collapse subnav">
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/categorias/linea/linea.php">
                                            <span class="sub-item">Línea</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/categorias/grupo/grupo.php">
                                            <span class="sub-item">Grupo</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/categorias/categoria/categoria.php">
                                            <span class="sub-item">Categoría</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="principal.php?CONTENIDO=app/inventario/categorias/familia/familia.php">
                                            <span class="sub-item">Familia</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="principal.php?CONTENIDO=app/upload/upload.php">
                    <i class="fas fa-cloud-upload-alt"></i> <!-- Cambié el ícono aquí -->
                    <p>Carga Múltiple</p>
                </a>
            </li>

        </ul>
    </div>
</div>