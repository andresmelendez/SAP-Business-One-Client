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
<a href="#" class="close-quick-sidebar">
    <i class="flaticon-cross"></i>
</a>
<div class="quick-sidebar-wrapper">
    <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Mensajes</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Actividades</a> </li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
            <div class="messages-contact">
                <div class="quick-wrapper">
                    <div class="quick-scroll scrollbar-outer">
                        <div class="quick-content contact-content">
                            <span class="category-title mt-0">Contactos</span>
                            <span class="category-title">Recientes</span>
                            <div class="contact-list contact-list-recent">
                                <div class="user">
                                    <a href="#">
                                        <div class="avatar avatar-online">
                                            <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="user-data">
                                            <span class="name">Andres Ortega</span>
                                            <span class="message">Pedido realizado?</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <span class="category-title">Otros contactos</span>
                            <div class="contact-list">
                                <div class="user">
                                    <a href="#">
                                        <div class="avatar avatar-online">
                                            <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="user-data2">
                                            <span class="name">Victor cordoba</span>
                                            <span class="status">Reunion dia viernes</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="messages-wrapper">
                <div class="messages-title">
                    <div class="user">
                        <div class="avatar avatar-offline float-right ml-2">
                            <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                        </div>
                        <span class="name">Chad</span>
                        <span class="last-active">Active 2h ago</span>
                    </div>
                    <button class="return">
                        <i class="flaticon-left-arrow-3"></i>
                    </button>
                </div>
                <div class="messages-body messages-scroll scrollbar-outer">
                    <div class="message-content-wrapper">
                        <div class="message message-in">
                            <div class="avatar avatar-sm">
                                <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                            </div>
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="name">Chad</div>
                                    <div class="content">Hello, Rian</div>
                                </div>
                                <div class="date">12.31</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-content-wrapper">
                        <div class="message message-out">
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="content">
                                        Hello, Chad
                                    </div>
                                </div>
                                <div class="message-content">
                                    <div class="content">
                                        What's up?
                                    </div>
                                </div>
                                <div class="date">12.35</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-content-wrapper">
                        <div class="message message-in">
                            <div class="avatar avatar-sm">
                                <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                            </div>
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="name">Andres</div>
                                    <div class="content">
                                        Realizar pedido
                                    </div>
                                </div>
                                <div class="message-content">
                                    <div class="content">
                                        When is the deadline of the project we are working on ?
                                    </div>
                                </div>
                                <div class="date">13.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-content-wrapper">
                        <div class="message message-out">
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="content">
                                        The deadline is about 2 months away
                                    </div>
                                </div>
                                <div class="date">13.10</div>
                            </div>
                        </div>
                    </div>
                    <div class="message-content-wrapper">
                        <div class="message message-in">
                            <div class="avatar avatar-sm">
                                <img src="imagenes/ferrecol.png" alt="..." class="avatar-img rounded-circle border border-white">
                            </div>
                            <div class="message-body">
                                <div class="message-content">
                                    <div class="name">Chad</div>
                                    <div class="content">
                                        Ok, Thanks !
                                    </div>
                                </div>
                                <div class="date">13.15</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="messages-form">
                    <div class="messages-form-control">
                        <input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
                    </div>
                    <div class="messages-form-tool">
                        <a href="#" class="attachment">
                            <i class="flaticon-file"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tasks" role="tabpanel">
            <div class="quick-wrapper tasks-wrapper">
                <div class="tasks-scroll scrollbar-outer">
                    <div class="tasks-content">
                        <span class="category-title mt-0">Tareas</span>
                        <ul class="tasks-list">
                            <li>
                                <label class="custom-checkbox custom-control checkbox-secondary">
                                    <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planificación de la nueva estructura del proyecto</span>
                                    <span class="task-action">
                                        <a href="#" class="link text-danger">
                                            <i class="flaticon-interface-5"></i>
                                        </a>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label class="custom-checkbox custom-control checkbox-secondary">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Mirar formula para calcular el precio							</span>
                                    <span class="task-action">
                                        <a href="#" class="link text-danger">
                                            <i class="flaticon-interface-5"></i>
                                        </a>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label class="custom-checkbox custom-control checkbox-secondary">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Revisar estructura de la nueva especialidad</span>
                                    <span class="task-action">
                                        <a href="#" class="link text-danger">
                                            <i class="flaticon-interface-5"></i>
                                        </a>
                                    </span>
                                </label>
                            </li>
                        </ul>
                        <div class="mt-3">
                            <div class="btn btn-primary btn-rounded btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Agregar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>