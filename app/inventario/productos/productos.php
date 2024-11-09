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
<!-- Contenido de la página -->
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Gestión de articulos</h4>
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
                <a href="#">Datos maestros de articulo</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-trophy mr-1"></i>
                        Articulos
                        <button id="btnNuevo" type="button" class="btn btn-outline-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCRUD">
                            Nuevo Articulo
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formulario">
                        <!-- Campos por fuera del tab -->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="Cliente">Código de Artículo</label>
                                        <ul class="list-group list-group-bordered list">
                                            <div class="nav-item dropdown">
                                                <div class="input-group">
                                                    <input type="search" class="form-control" id="ItemCode" name="ItemCode" placeholder="Código de Artículo" autocomplete="off">
                                                </div>
                                                <div id="listaProductos">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" id="ItemName" name="ItemName" placeholder="Descripción">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="descripcion">Nombre Extranjero</label>
                                        <input type="text" class="form-control" id="FrgnName" name="FrgnName" placeholder="Nombre Extranjero">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="codigoBarras">Código de Barras</label>
                                        <input type="text" class="form-control" id="CodeBars" name="CodeBars" placeholder="Código de Barras">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <!-- Checkboxes -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" name="InvntItem" id="InvntItem">
                                        <span class="form-check-sign">Artículo de Inventario</span>
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" name="SellItem" id="SellItem">
                                        <span class="form-check-sign">Artículo de Venta</span>
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" name="PrchseItem" id="PrchseItem">
                                        <span class="form-check-sign">Artículo de Compra</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <div class="nav-scroller">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-compras-tab" data-toggle="tab" href="#datos-compras" role="tab">Datos de Compras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-ventas-tab" data-toggle="tab" href="#datos-ventas" role="tab">Datos de Ventas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-inventario-tab" data-toggle="tab" href="#datos-inventario" role="tab">Datos de Inventario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="datos-planificacion-tab" data-toggle="tab" href="#datos-planificacion" role="tab">Datos de Planificacion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="propiedades-tab" data-toggle="tab" href="#propiedades" role="tab">Propiedades</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="comentarios-tab" data-toggle="tab" href="#comentarios" role="tab">Comentarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="precios-tab" data-toggle="tab" href="#precios" role="tab">Precios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="organizacion-tab" data-toggle="tab" href="#organizacion" role="tab">Organización</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="campos-usuario-tab" data-toggle="tab" href="#campos_usuario" role="tab">Campos de usuario</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- Tab General -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="col-md-12">
                                    <!-- Checkboxes -->
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="WTLiable" id="WTLiable" checked>
                                            <span class="form-check-sign">Sujeto a retencion de impuesto</span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="IndirctTax" id="IndirctTax" checked>
                                            <span class="form-check-sign">Impuesto indirecto</span>
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" name="NoDiscount" id="NoDiscount">
                                            <span class="form-check-sign">No Aplicar grupo de descuento</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Linea <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100" id="U_HBT_LINEA" placeholder="" name="U_HBT_LINEA" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Grupo <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100 select2" id="ItmsGrpCod" placeholder="" name="ItmsGrpCod" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Categoria <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100 select2" id="U_HBT_CATEGORIA" placeholder="" name="U_HBT_CATEGORIA" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Familia <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100 select2" id="U_HBT_FAMILIA" placeholder="" name="U_HBT_FAMILIA" required></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Fabricante <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100" id="FirmCode" placeholder="" name="FirmCode" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Especialidad <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100" id="U_HBT_Especialidad" placeholder="" name="U_HBT_Especialidad" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Portafolio <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100 select2" id="U_HBT_PORTAFOLIO" placeholder="" name="U_HBT_PORTAFOLIO" required></select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Linea">Detalle Portafolio <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100 select2" id="U_HBT_CODIGODET" placeholder="" name="U_HBT_CODIGODET" required></select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Alineación Proveedor</label>
                                        <input type="text" class="form-control" id="U_HBT_Alineaprov" name="U_HBT_Alineaprov" placeholder="Alineacion proveedor">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="familia">Marquilla</label>
                                        <input type="text" class="form-control" id="U_HBT_Marquilla" name="U_HBT_Marquilla" placeholder="Marquilla">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Linea">Estado <span class="required-label">*</span></label>
                                        <select class="custom-select d-block w-100" id="frozenFor" placeholder="" name="frozenFor" required>
                                            <option value="N">Activo</option>
                                            <option value="Y">Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="SWW">Id Adicional</label>
                                        <input type="text" class="form-control" id="SWW" name="SWW" placeholder="Marquilla">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ShipType">Forma de envio</label>
                                        <select class="custom-select d-block w-100" id="ShipType" placeholder="" name="ShipType" required>
                                            <option value="1">TERRESTRE</option>
                                            <option value="2">AEREO</option>
                                            <option value="3">MARITIMO</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="datos-compras" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label for="CardCode" class="col-sm-6 col-form-label">Proveedor predeterminado</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="CardCode" name="CardCode">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SuppCatNum" class="col-sm-6 col-form-label">Numero de catalogo de fabricante</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SuppCatNum" name="SuppCatNum">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="BuyUnitMsr" class="col-sm-6 col-form-label">Nombre unidad de medida compras</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="BuyUnitMsr" name="BuyUnitMsr">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="NumInBuy" class="col-sm-6 col-form-label">Articulos por unidad de compras</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="NumInBuy" name="NumInBuy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="PurPackMsr" class="col-sm-6 col-form-label">Nombre unidad de medida embalaje</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="PurPackMsr" name="PurPackMsr">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="PurPackUn" class="col-sm-6 col-form-label">Cantidad por empaque</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="PurPackUn" name="PurPackUn">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="TaxCodeAR" class="col-sm-6 col-form-label">Indicador impuestos acreedores</label>
                                            <div class="col-sm-6">
                                                <select name="TaxCodeAP" id="TaxCodeAP" class="form-control">
                                                    <option value="IVA_HBT">IVA_HBT - IVA Tarifa cero</option>
                                                    <option value="IVAD00">IVAD00 - IVA DESCONTABLE EN COMPRAS TARIFA CERO</option>
                                                    <option value="IVAD01">IVAD01 - IVA DESCONTABLE EN COMPRAS 16%</option>
                                                    <option value="IVAD02">IVAD02 - IVA DESCONTABLE EN IMPORTACIONES 16%</option>
                                                    <option value="IVAD03">IVAD03 - IVA DESCONTABLE EN GASTOS CTA. PUENTE 16%</option>
                                                    <option value="IVAD04">IVAD04 - IVA DESCONTABLE EN COMPRAS REG. SIMPLIFICADO 2,4%</option>
                                                    <option value="IVAD05">IVAD05 - IVA DESCONTABLE EN COMPRAS 5%</option>
                                                    <option value="IVAD06">IVAD06 - IVA DESCONTABLE EN DEVOLUCIONES EN COMPRAS 16%</option>
                                                    <option value="IVAD07">IVAD07 - IVA DESCONTABLE EN DEVOLUCIONES EN COMPRAS 5%</option>
                                                    <option value="IVAD08">IVAD08 - IVA DESCONTABLE EN GASTOS</option>
                                                    <option value="IVAD09">IVAD09 - GASTOS NO SUJETOS A IMPUESTOS</option>
                                                    <option value="IVAD10" selected>IVAD10 - IVA DESCONTABLE EN COMPRAS 19%</option>
                                                    <option value="IVAD11">IVAD11 - IVA DESCONTABLE EN IMPORTACIONES 19%</option>
                                                    <option value="IVAD12">IVAD12 - IVA DESCONTABLE EN GASTOS CTA. PUENTE 19%</option>
                                                    <option value="IVAD14">IVAD14 - IVA DESCONTABLE EN DEVOLUCIONES EN COMPRAS 19%</option>
                                                    <option value="IVAD18">IVAD18 - IVA DESCONTABLE EN DEVOLUCIONES EN COMPRAS 0%</option>
                                                    <option value="IVAMVA">IVAMVA - IVA MAYOR VALOR ACTIVO FIJO</option>
                                                    <option value="IVARS">IVARS - IVA DESCONTABLE EN COMPRAS NO RESPONSABLE DE IVA</option>
                                                    <option value="IVD09">IVD09 - IVA DESCONTABLE EN COMPRAS EXENTO</option>
                                                    <option value="IVD10">IVD10 - IVA DESCONTABLE EN GASTOS CTA. PUENTE 0%</option>
                                                    <option value="IVD11">IVD11 - IVA DESCONTABLE EN GASTOS REG.SIMPLIFICADO 2.4%</option>
                                                    <option value="IVD12">IVD12 - IVA DESCONTBLE EN GASTOS CTA. PUENTE 5%</option>
                                                    <option value="IVD13">IVD13 - IVA DESCONTABLE EN IMPORTACIONES 0%</option>
                                                    <option value="PIVA1">PIVA1 - PAGO DE IMPUESTOS</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="U_HBT_PROVCORONA" class="col-sm-6 col-form-label">Proveedor Corona</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PROVCORONA" id="U_HBT_PROVCORONA" class="form-control">
                                                    <option value="NA">NA - NO APLICA</option>
                                                    <option value="7705361000012">7705361000012 - COLCERAMICA</option>
                                                    <option value="7707181798681">7707181798681 - SUMICOL</option>
                                                    <option value="7709997641151">7709997641151 - CORLANC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Longitud</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="BLength1" name="BLength1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Ancho</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="BWidth1" name="BWidth1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Altura</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="BHeight1" name="BHeight1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Volumen</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="BVolume" name="BVolume">
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="BVolUnit" id="BVolUnit" class="form-control">
                                                    <option value="2">cc</option>
                                                    <option value="5">ci</option>
                                                    <option value="4">cm</option>
                                                    <option value="1">cmm</option>
                                                    <option value="3">dm3</option>
                                                    <option value="6">vgl</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Peso</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="BWeight1" name="BWeight1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="datos-ventas" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label for="TaxCodeAR" class="col-sm-6 col-form-label">Indicador de IVA</label>
                                            <div class="col-sm-6">
                                                <select name="TaxCodeAR" id="TaxCodeAR" class="form-control">
                                                    <option value="INC00">INC00 - IMPOCONSUMO BOLSAS PLASTICAS $20</option>
                                                    <option value="IVA_HBT">IVA_HBT - IVA Tarifa cero</option>
                                                    <option value="IVAD03">IVAD03 - IVA DESCONTABLE EN GASTOS CTA. PUENTE 16%</option>
                                                    <option value="IVAG00">IVAG00 - IVA EXENTO EN VENTAS 0%</option>
                                                    <option value="IVAG01">IVAG01 - IMPUESTO A LAS VENTAS GENERADO TARIFA 16%</option>
                                                    <option value="IVAG02">IVAG02 - IMPUESTO A LAS VENTAS GENERADO TARIFA 5%</option>
                                                    <option value="IVAG03">IVAG03 - I.V.A. INTERESES RECIBIDOS</option>
                                                    <option value="IVAG04">IVAG04 - IVA GENERADO EN DEVOLUCIONES EN VENTAS 16%</option>
                                                    <option value="IVAG05">IVAG05 - IVA GENERADO EN DEVOLUCIONES EN VENTAS 5%</option>
                                                    <option value="IVAG06" selected>IVAG06 - IVA GENERADO EN VENTAS 19%</option>
                                                    <option value="IVAG07">IVAG07 - IVA INTERESES RECIBIDOS 19%</option>
                                                    <option value="IVAG08">IVAG08 - IVA GENERADO EN DEVOLUCIONES EN VENTAS 19%</option>
                                                    <option value="IVAG09">IVAG09 - IVA GENERADO EN VENTAS 0% DECRETO 731-5.V.17 PTMAYO</option>
                                                    <option value="IVAG10">IVAG10 - IVA GENERADO EN DEVOLUCIONES VENTAS 0%</option>
                                                    <option value="IVAG11">IVAG11 - IVA GENERADO EN DEV. VENTAS 0% DECRETO 731-5.V.17 PTMAYO</option>
                                                    <option value="IVAG12">IVAG12 - IVA GENERADO OTROS ING.GRAVADOS 19%</option>
                                                    <option value="IVAG13">IVAG13 - IVA GENERADO OTROS INGRESOS NO GRAVADOS</option>
                                                    <option value="IVAGDD">IVAGDD - IVA GENERADO EN DEV. EN VENTAS DIA SIN IVA 0%</option>
                                                    <option value="IVAGDS">IVAGDS - IVA GENERADO EN VENTAS DIA SIN IVA 0%</option>
                                                    <option value="IVD10">IVD10 - IVA DESCONTABLE EN GASTOS CTA. PUENTE 0%</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="SalUnitMsr" class="col-sm-6 col-form-label">Nombre unidad de medida ventas</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SalUnitMsr" name="SalUnitMsr">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="NumInSale" class="col-sm-6 col-form-label">Articulos por unidad de ventas</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="NumInSale" name="NumInSale">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SalPackMsr" class="col-sm-6 col-form-label">Nombre unidad de medida embalaje</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SalPackMsr" name="SalPackMsr">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SalPackUn" class="col-sm-6 col-form-label">Cantidad por empaque</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SalPackUn" name="SalPackUn">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Longitud</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SLength1" name="SLength1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Ancho</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SWidth1" name="SWidth1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Altura</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SHeight1" name="SHeight1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Volumen</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="SVolume" name="SVolume">
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="SVolUnit" id="SVolUnit" class="form-control">
                                                    <option value="2">cc</option>
                                                    <option value="5">ci</option>
                                                    <option value="4">cm</option>
                                                    <option value="1">cmm</option>
                                                    <option value="3">dm3</option>
                                                    <option value="6">vgl</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-6 col-form-label">Peso</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="SWeight1" name="SWeight1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="datos-inventario" role="tabpanel">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="ByWh" name="ByWh" value="">
                                        <span class="form-check-sign">Gestion de stocks por almacen</span>
                                    </label>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>Codigo de almacen</td>
                                                <td>Almacan</td>
                                                <td>Stock</td>
                                                <td>Comprometido</td>
                                                <td>Pedido</td>
                                                <td>Disponible</td>
                                                <td>Costo de articulo</td>
                                            </tr>
                                        </thead>
                                        <tbody id="inventory">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="datos-planificacion" role="tabpanel">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="SuppCatNum" class="col-sm-6 col-form-label">Metodo de planificacion</label>
                                            <div class="col-sm-6">
                                                <select class="custom-select d-block w-100" id="PlaningSys" placeholder="" name="PlaningSys" required>
                                                    <option value="M">PNM</option>
                                                    <option value="N">Ning.</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="PrcrmntMtd" class="col-sm-6 col-form-label">Metodo de reaprovisionamiento</label>
                                            <div class="col-sm-6">
                                                <select class="custom-select d-block w-100" id="PrcrmntMtd" placeholder="" name="PrcrmntMtd" required>
                                                    <option value="B">Comprar</option>
                                                    <option value="M">Efectuar</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="OrdrIntrvl" class="col-sm-6 col-form-label">Intervalo de pedido</label>
                                            <div class="col-sm-6">
                                                <select class="custom-select d-block w-100" id="OrdrIntrvl" placeholder="" name="OrdrIntrvl">
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">Cada 15 dias</option>
                                                    <option value="3">Cada 30 dias</option>
                                                    <option value="4">Cada 4 dias</option>
                                                    <option value="5" selected>Cada 7 dias</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="OrdrIntrvl" class="col-sm-6 col-form-label">Pedido multiple</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="OrdrMulti" name="OrdrMulti" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="MinOrdrQty" class="col-sm-6 col-form-label">Cantidad de pedido minima</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="MinOrdrQty" name="MinOrdrQty" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="MinOrdrQty" class="col-sm-6 col-form-label">LeadTime</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="LeadTime" name="LeadTime" value="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="MinOrdrQty" class="col-sm-6 col-form-label">Dias de tolerancia</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="ToleranDay" name="ToleranDay" value="0">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="propiedades" role="tabpanel">
                                <div class="table-responsive mt-4">
                                    <table class="table-sm table-striped table-hover" style="width: 100%;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre de la propiedad</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>SANDRA PEREZ</td>
                                                <td><input type="checkbox" id="QryGroup1" name="QryGroup1"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>GERMAN ROJAS</td>
                                                <td><input type="checkbox" id="QryGroup2" name="QryGroup2"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>OSCAR GUERRERO</td>
                                                <td><input type="checkbox" id="QryGroup3" name="QryGroup3"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>RUBY RAMIREZ</td>
                                                <td><input type="checkbox" id="QryGroup4" name="QryGroup4"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>LUIS ROMO</td>
                                                <td><input type="checkbox" id="QryGroup5" name="QryGroup5"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>JORGE RODRIGUEZ</td>
                                                <td><input type="checkbox" id="QryGroup6" name="QryGroup6"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>OTRO COMPRADOR</td>
                                                <td><input type="checkbox" id="QryGroup7" name="QryGroup7"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>PICKING Y EXHIBICION 1010</td>
                                                <td><input type="checkbox" id="QryGroup8" name="QryGroup8"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>PRODUCTO E-COMMERCE</td>
                                                <td><input type="checkbox" id="QryGroup9" name="QryGroup9"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>ROTACION A (Alta Rotación)</td>
                                                <td><input type="checkbox" id="QryGroup10" name="QryGroup10"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>ROTACION B (Servicio)</td>
                                                <td><input type="checkbox" id="QryGroup11" name="QryGroup11"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>ROTACION C (Sobre Pedido)</td>
                                                <td><input type="checkbox" id="QryGroup12" name="QryGroup12"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>ROTACION D (Descontinuados)</td>
                                                <td><input type="checkbox" id="QryGroup13" name="QryGroup13"></td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>ROTACION N (Nuevos)</td>
                                                <td><input type="checkbox" id="QryGroup14" name="QryGroup14"></td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>ROTACION F (Und, Empaque y Apuestas)</td>
                                                <td><input type="checkbox" id="QryGroup15" name="QryGroup15"></td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>ROTACION R (Revisión)</td>
                                                <td><input type="checkbox" id="QryGroup16" name="QryGroup16"></td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>ROTACION H (Consumo-Ytas,AS,NO CATALOG)</td>
                                                <td><input type="checkbox" id="QryGroup17" name="QryGroup17"></td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>ROTACION RR (R Revisado)</td>
                                                <td><input type="checkbox" id="QryGroup18" name="QryGroup18"></td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>ROTACION CR (C Revisado)</td>
                                                <td><input type="checkbox" id="QryGroup19" name="QryGroup19"></td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>PROPIEDAD 20</td>
                                                <td><input type="checkbox" id="QryGroup20" name="QryGroup20"></td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>PROPIEDAD 21</td>
                                                <td><input type="checkbox" id="QryGroup21" name="QryGroup21"></td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>PROPIEDAD 22</td>
                                                <td><input type="checkbox" id="QryGroup22" name="QryGroup22"></td>
                                            </tr>
                                            <tr>
                                                <td>23</td>
                                                <td>PROPIEDAD 23</td>
                                                <td><input type="checkbox" id="QryGroup23" name="QryGroup23"></td>
                                            </tr>
                                            <tr>
                                                <td>24</td>
                                                <td>PROPIEDAD 24</td>
                                                <td><input type="checkbox" id="QryGroup24" name="QryGroup24"></td>
                                            </tr>
                                            <tr>
                                                <td>25</td>
                                                <td>PROPIEDAD 25</td>
                                                <td><input type="checkbox" id="QryGroup25" name="QryGroup25"></td>
                                            </tr>
                                            <tr>
                                                <td>26</td>
                                                <td>PROPIEDAD 26</td>
                                                <td><input type="checkbox" id="QryGroup26" name="QryGroup26"></td>
                                            </tr>
                                            <tr>
                                                <td>27</td>
                                                <td>PROPIEDAD 27</td>
                                                <td><input type="checkbox" id="QryGroup27" name="QryGroup27"></td>
                                            </tr>
                                            <tr>
                                                <td>28</td>
                                                <td>PROPIEDAD 28</td>
                                                <td><input type="checkbox" id="QryGroup28" name="QryGroup28"></td>
                                            </tr>
                                            <tr>
                                                <td>29</td>
                                                <td>PROPIEDAD 29</td>
                                                <td><input type="checkbox" id="QryGroup29" name="QryGroup29"></td>
                                            </tr>
                                            <tr>
                                                <td>30</td>
                                                <td>PROPIEDAD 30</td>
                                                <td><input type="checkbox" id="QryGroup30" name="QryGroup30"></td>
                                            </tr>
                                            <tr>
                                                <td>31</td>
                                                <td>PROPIEDAD 31</td>
                                                <td><input type="checkbox" id="QryGroup31" name="QryGroup31"></td>
                                            </tr>
                                            <tr>
                                                <td>32</td>
                                                <td>PROPIEDAD 32</td>
                                                <td><input type="checkbox" id="QryGroup32" name="QryGroup32"></td>
                                            </tr>
                                            <tr>
                                                <td>33</td>
                                                <td>PICKING Y EXHIBICION 1000</td>
                                                <td><input type="checkbox" id="QryGroup33" name="QryGroup33"></td>
                                            </tr>
                                            <tr>
                                                <td>34</td>
                                                <td>PICKING Y EXHIBICION 1020</td>
                                                <td><input type="checkbox" id="QryGroup34" name="QryGroup34"></td>
                                            </tr>
                                            <tr>
                                                <td>35</td>
                                                <td>PICKING Y EXHIBICION 2000</td>
                                                <td><input type="checkbox" id="QryGroup35" name="QryGroup35"></td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td>PICKING Y EXHIBICION 2020</td>
                                                <td><input type="checkbox" id="QryGroup36" name="QryGroup36"></td>
                                            </tr>
                                            <tr>
                                                <td>37</td>
                                                <td>PICKING Y EXHIBICION 3000</td>
                                                <td><input type="checkbox" id="QryGroup37" name="QryGroup37"></td>
                                            </tr>
                                            <tr>
                                                <td>38</td>
                                                <td>PICKING Y EXHIBICION 3020</td>
                                                <td><input type="checkbox" id="QryGroup38" name="QryGroup38"></td>
                                            </tr>
                                            <tr>
                                                <td>39</td>
                                                <td>PICKING Y EXHIBICION 4000</td>
                                                <td><input type="checkbox" id="QryGroup39" name="QryGroup39"></td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>PICKING Y EXHIBICION 4020</td>
                                                <td><input type="checkbox" id="QryGroup40" name="QryGroup40"></td>
                                            </tr>
                                            <tr>
                                                <td>41</td>
                                                <td>PROPIEDAD 41</td>
                                                <td><input type="checkbox" id="QryGroup41" name="QryGroup41"></td>
                                            </tr>
                                            <tr>
                                                <td>42</td>
                                                <td>PICKING Y EXHIBICION 4010</td>
                                                <td><input type="checkbox" id="QryGroup42" name="QryGroup42"></td>
                                            </tr>
                                            <tr>
                                                <td>43</td>
                                                <td>DISTRIBUCION CA</td>
                                                <td><input type="checkbox" id="QryGroup43" name="QryGroup43"></td>
                                            </tr>
                                            <tr>
                                                <td>44</td>
                                                <td>DISTRIBUCION FE</td>
                                                <td><input type="checkbox" id="QryGroup44" name="QryGroup44"></td>
                                            </tr>
                                            <tr>
                                                <td>45</td>
                                                <td>BANDA VALORIZADO</td>
                                                <td><input type="checkbox" id="QryGroup45" name="QryGroup45"></td>
                                            </tr>
                                            <tr>
                                                <td>46</td>
                                                <td>BANDA COMPETITIVO</td>
                                                <td><input type="checkbox" id="QryGroup46" name="QryGroup46"></td>
                                            </tr>
                                            <tr>
                                                <td>47</td>
                                                <td>BANDA OPENPRICE</td>
                                                <td><input type="checkbox" id="QryGroup47" name="QryGroup47"></td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>BANDA NOAPLICA</td>
                                                <td><input type="checkbox" id="QryGroup48" name="QryGroup48"></td>
                                            </tr>
                                            <tr>
                                                <td>49</td>
                                                <td>BANDA POPULAR</td>
                                                <td><input type="checkbox" id="QryGroup49" name="QryGroup49"></td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td>ARTICULOS DE INVENTARIOS DIARIO</td>
                                                <td><input type="checkbox" id="QryGroup50" name="QryGroup50"></td>
                                            </tr>
                                            <tr>
                                                <td>51</td>
                                                <td>ARTICULO SIN COD. DE BARRAS PROVEEDOR</td>
                                                <td><input type="checkbox" id="QryGroup51" name="QryGroup51"></td>
                                            </tr>
                                            <tr>
                                                <td>52</td>
                                                <td>ENTREGA POR BODEGA</td>
                                                <td><input type="checkbox" id="QryGroup52" name="QryGroup52"></td>
                                            </tr>
                                            <tr>
                                                <td>53</td>
                                                <td>PROPIEDAD 53</td>
                                                <td><input type="checkbox" id="QryGroup53" name="QryGroup53"></td>
                                            </tr>
                                            <tr>
                                                <td>54</td>
                                                <td>PROPIEDAD 54</td>
                                                <td><input type="checkbox" id="QryGroup54" name="QryGroup54"></td>
                                            </tr>
                                            <tr>
                                                <td>55</td>
                                                <td>MERCANCIA EN CONSIGNACION</td>
                                                <td><input type="checkbox" id="QryGroup55" name="QryGroup55"></td>
                                            </tr>
                                            <tr>
                                                <td>56</td>
                                                <td>BAJA ROT.ESP.PINTURAS</td>
                                                <td><input type="checkbox" id="QryGroup56" name="QryGroup56"></td>
                                            </tr>
                                            <tr>
                                                <td>57</td>
                                                <td>BAJA ROT.ESP.ACABADOS</td>
                                                <td><input type="checkbox" id="QryGroup57" name="QryGroup57"></td>
                                            </tr>
                                            <tr>
                                                <td>58</td>
                                                <td>BAJA ROT.ESP.CARPINTERIA</td>
                                                <td><input type="checkbox" id="QryGroup58" name="QryGroup58"></td>
                                            </tr>
                                            <tr>
                                                <td>59</td>
                                                <td>PROPIEDAD 59</td>
                                                <td><input type="checkbox" id="QryGroup59" name="QryGroup59"></td>
                                            </tr>
                                            <tr>
                                                <td>60</td>
                                                <td>IMPORTADOS NUEVOS</td>
                                                <td><input type="checkbox" id="QryGroup60" name="QryGroup60"></td>
                                            </tr>
                                            <tr>
                                                <td>61</td>
                                                <td>PTO. TECNICO POPULAR</td>
                                                <td><input type="checkbox" id="QryGroup61" name="QryGroup61"></td>
                                            </tr>
                                            <tr>
                                                <td>62</td>
                                                <td>PTO. TECNICO ESP</td>
                                                <td><input type="checkbox" id="QryGroup62" name="QryGroup62"></td>
                                            </tr>
                                            <tr>
                                                <td>63</td>
                                                <td>PROPIEDAD 63</td>
                                                <td><input type="checkbox" id="QryGroup63" name="QryGroup63"></td>
                                            </tr>
                                            <tr>
                                                <td>64</td>
                                                <td>PROPIEDAD 64</td>
                                                <td><input type="checkbox" id="QryGroup64" name="QryGroup64"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="comentarios" role="tabpanel">
                                <div class="row mt-4">
                                    <div class="col-md-5">
                                        <p id="dimension"></p>
                                        <img class="img-fluid" id="imgPicturName" src="app/inventario/productos/imagenes.php" alt="">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Imagen Producto</label>
                                            <input type="file" class="form-control-file" id="PicturName" name="PicturName">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="UserText" id="UserText" rows="20"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="precios" role="tabpanel">
                                <div class="row my-4">
                                    <div class="col-md-6">
                                        <h5>Tabla Descuento</h5>
                                        <div class="form-group">
                                            <label>Tabla Descuento</label>
                                            <input type="text" class="form-control" placeholder="571" name="U_HBT_CODIGOTAB" id="U_HBT_CODIGOTAB">
                                        </div>
                                        <div class="form-group">
                                            <label>TIPO_LISTA</label>
                                            <input type="text" class="form-control" placeholder="LISTA PUBLICO" name="U_HBT_TIPOLISTA" id="U_HBT_TIPOLISTA" value="LISTA PUBLICO">
                                        </div>
                                        <div class="form-group">
                                            <label>Precio de Lista</label>
                                            <input type="text" class="form-control" placeholder="3,032.00" name="U_HBT_PREBASE" id="U_HBT_PREBASE">
                                        </div>
                                        <div class="form-group">
                                            <label>DTO PROVEEDOR</label>
                                            <input type="text" class="form-control" placeholder="60.5000" name="U_HBT_DTOPROV" id="U_HBT_DTOPROV">
                                        </div>
                                        <div class="form-group">
                                            <label>Costo</label>
                                            <input type="text" class="form-control" placeholder="1,197.64" name="U_HBT_COSBASE" id="U_HBT_COSBASE">
                                        </div>
                                        <div class="form-group">
                                            <label>Dto Adicional Proveedor</label>
                                            <input type="text" class="form-control" placeholder="0.0000" name="U_HBT_DTOADIPROV" id="U_HBT_DTOADIPROV">
                                        </div>
                                        <div class="form-group">
                                            <label>Costo Producto</label>
                                            <input type="text" class="form-control" placeholder="1,197.64" name="U_HBT_COSTOPRODUCTO" id="U_HBT_COSTOPRODUCTO">
                                        </div>
                                        <div class="form-group">
                                            <label>PORCENTAJE GASTOS</label>
                                            <input type="text" class="form-control" placeholder="0.0000" name="U_HBT_PORGASTOS" id="U_HBT_PORGASTOS">
                                        </div>
                                        <div class="form-group">
                                            <label>Costo Estimado</label>
                                            <input type="text" class="form-control" placeholder="1,197.64" name="U_HBT_COSESTIMADO" id="U_HBT_COSESTIMADO">
                                        </div>
                                        <div class="form-group">
                                            <label>Margen Minimo</label>
                                            <input type="text" class="form-control" placeholder="15.0000" name="U_HBT_MARGENMIN" id="U_HBT_MARGENMIN">
                                        </div>
                                        <div class="form-group">
                                            <label>Margen Utilidad</label>
                                            <input type="text" class="form-control" placeholder="60.5000" name="U_HBT_MUTIL" id="U_HBT_MUTIL">
                                        </div>
                                        <div class="form-group">
                                            <label>Porcentaje Incremento</label>
                                            <input type="text" class="form-control" placeholder="0.0000" name="U_HBT_PORINCRE" id="U_HBT_PORINCRE">
                                        </div>
                                        <div class="form-group">
                                            <label>Dto Max Cliente</label>
                                            <input type="text" class="form-control" placeholder="53.5290" name="U_HBT_DTOMAX" id="U_HBT_DTOMAX">
                                        </div>
                                        <div class="form-group">
                                            <label>P.V.M.P</label>
                                            <input type="text" class="form-control" placeholder="3,032.00" name="U_HBT_PVMP" id="U_HBT_PVMP">
                                        </div>
                                        <div class="form-group">
                                            <label>p.v.m.c</label>
                                            <input type="text" class="form-control" placeholder="1,408.99" name="U_HBT_pvmc" id="U_HBT_pvmc">
                                        </div>
                                        <div class="form-group">
                                            <label>Tabla Dto Adicional</label>
                                            <input type="text" class="form-control" placeholder="1" name="U_HBT_TABDTOADI" id="U_HBT_TABDTOADI">
                                        </div>
                                        <div class="form-group">
                                            <label>% Dto Adicional</label>
                                            <input type="text" class="form-control" placeholder="1" name="U_HBT_DtoAdicional" id="U_HBT_DtoAdicional" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label>Aplica Fletes</label>
                                            <select class="form-control" name="U_HBT_FLETES" id="U_HBT_FLETES">
                                                <option value="S">SI</option>
                                                <option value="N" selected>NO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Precio Por M2</label>
                                            <select class="form-control" name="U_HBT_PRECIOXM2" id="U_HBT_PRECIOXM2">
                                                <option value="S">SI</option>
                                                <option value="N" selected>NO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Artículo Tipo Pintura</label>
                                            <select class="form-control" name="U_HBT_PREPARACION" id="U_HBT_PREPARACION">
                                                <option value="Y">SI</option>
                                                <option value="N" selected>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Tabla Dtos Grupos</h5>
                                        <div class="form-group">
                                            <label>Tabla Dtos Grupos</label>
                                            <input type="text" class="form-control" placeholder="571" name="U_U_HBT_TABDTOGRU" id="U_U_HBT_TABDTOGRU">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha Vigencia</label>
                                            <input type="date" class="form-control" name="U_HBT_FECDTOADIPRO" id="U_HBT_FECDTOADIPRO">
                                        </div>
                                        <div class="form-group">
                                            <label>Valor Gastos</label>
                                            <input type="text" class="form-control" placeholder="0.00" name="U_HBT_VRGASTOS" id="U_HBT_VRGASTOS">
                                        </div>
                                        <div class="form-group">
                                            <label>Costo Promedio SAP</label>
                                            <input type="text" class="form-control" placeholder="1,208.92" name="U_U_HBT_COSPROM" id="U_U_HBT_COSPROM">
                                        </div>
                                        <div class="form-group">
                                            <label>Margen Util CosProm/PVMP</label>
                                            <input type="text" class="form-control" placeholder="60.1300" name="U_HBT_MUPVMP" id="U_HBT_MUPVMP">
                                        </div>
                                        <div class="form-group">
                                            <label>Margen Utilidad CosProm/pvmc</label>
                                            <input type="text" class="form-control" placeholder="14.2000" name="U_HBT_MUpvmc" id="U_HBT_MUpvmc">
                                        </div>
                                        <div class="form-group">
                                            <label>Usar Costo Prom. Para Calculos</label>
                                            <select class="form-control" name="U_HBT_USOCOSPROM" id="U_HBT_USOCOSPROM">
                                                <option value="Y">SI</option>
                                                <option value="N" selected>NO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Dto. Desde Fecha</label>
                                            <input type="date" class="form-control" name="U_HBT_FecIniDto" id="U_HBT_FecIniDto">
                                        </div>
                                        <div class="form-group">
                                            <label>Dto. Hasta Fecha</label>
                                            <input type="date" class="form-control" name="U_HBT_FecFinDto" id="U_HBT_FecFinDto">
                                        </div>
                                        <div class="form-group">
                                            <label>Nuevo Dto Max Cliente</label>
                                            <input type="text" class="form-control" placeholder="53.530" name="U_HBT_NDTOMAX" id="U_HBT_NDTOMAX">
                                        </div>
                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea class="form-control" rows="4" name="U_HBT_MENSAJEMP" id="U_HBT_MENSAJEMP"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="organizacion" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label for="U_HBT_PlanoIntroSV" class="col-sm-6 col-form-label">Planograma de introduccion SV</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PlanoIntroSV" id="U_HBT_PlanoIntroSV" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_PlanoIntroDist" class="col-sm-6 col-form-label">Planograma de introduccion Dist</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PlanoIntroDist" id="U_HBT_PlanoIntroDist" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_PlanoIntroConst" class="col-sm-6 col-form-label">Planograma de introduccion Const</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PlanoIntroConst" id="U_HBT_PlanoIntroConst" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_PlanoIntroInfra" class="col-sm-6 col-form-label">Planograma de introduccion Infra</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PlanoIntroInfra" id="U_HBT_PlanoIntroInfra" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_PlanoIntroDistFE" class="col-sm-6 col-form-label">Planograma de introduccion Dist. FE</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_PlanoIntroDistFE" id="U_HBT_PlanoIntroDistFE" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="U_HBT_UsuarioP1" class="col-sm-6 col-form-label">Usuario articulo 1</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="U_HBT_UsuarioP1" name="U_HBT_UsuarioP1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_UsuarioP2" class="col-sm-6 col-form-label">Usuario articulo 2</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="U_HBT_UsuarioP2" name="U_HBT_UsuarioP2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_UsuarioP3" class="col-sm-6 col-form-label">Usuario articulo 3</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="U_HBT_UsuarioP3" name="U_HBT_UsuarioP3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_LAYOUT" class="col-sm-6 col-form-label">Layout</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="U_HBT_LAYOUT" name="U_HBT_LAYOUT">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_ROL" class="col-sm-6 col-form-label">Rol</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_ROL" id="U_HBT_ROL" class="form-control">
                                                    <option value="1">Infaltable</option>
                                                    <option value="2">Rutuna</option>
                                                    <option value="3">Promocional</option>
                                                    <option value="4">Conveniencia</option>
                                                    <option value="5">Apuesta</option>
                                                    <option value="6">Ocasional</option>
                                                    <option value="7">Salida</option>
                                                    <option value="8">No Aplica</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="campos_usuario" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-7">

                                        <div class="form-group row">
                                            <label for="U_HBT_FSMIN" class="col-sm-6 col-form-label">Factor Minimo</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="U_HBT_FSMIN" id="U_HBT_FSMIN" value="1.5">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="U_HBT_FSMAX" class="col-sm-6 col-form-label">Factor Maximo</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="U_HBT_FSMAX" id="U_HBT_FSMAX" value="4">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="U_HBT_NomPlanograma" class="col-sm-6 col-form-label">Nombre Planograma</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="U_HBT_NomPlanograma" id="U_HBT_NomPlanograma">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="U_HBT_ACTMAGENTO" class="col-sm-6 col-form-label">Activo sincronizacion magento</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_ACTMAGENTO" id="U_HBT_ACTMAGENTO" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_ACTMAGENTOB2B" class="col-sm-6 col-form-label">Activo sincronizacion magento B2B</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_ACTMAGENTOB2B" id="U_HBT_ACTMAGENTOB2B" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_ACTMAGENTOB2C" class="col-sm-6 col-form-label">Activo sincronizacion magento B2C</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_ACTMAGENTOB2C" id="U_HBT_ACTMAGENTOB2C" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_ACTTRANSNAC" class="col-sm-6 col-form-label">Producto activo para transporte nacional</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_ACTTRANSNAC" id="U_HBT_ACTTRANSNAC" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="U_HBT_SERENVIOS" class="col-sm-6 col-form-label">Despacho por servicio de envios</label>
                                            <div class="col-sm-6">
                                                <select name="U_HBT_SERENVIOS" id="U_HBT_SERENVIOS" class="form-control">
                                                    <option value="Y">Si</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="U_HBT_DESCCOMART" class="col-sm-6 col-form-label">Descripcion comercial articulo</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="U_HBT_DESCCOMART" id="U_HBT_DESCCOMART">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" name="accion" id="accion" value="Modificar">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const item = new URLSearchParams(window.location.search).get('item');

    //filtros
    $.ajax({
        type: "POST",
        url: "app/inventario/productos/productosAcciones.php",
        data: {
            accion: 'Marca'
        },
        dataType: "json", // Espera una respuesta en formato JSON
        success: function(response) {
            // Asegúrate de que 'response' tenga la estructura esperada
            if (response.status === 'success') { // Verifica si la respuesta es exitosa
                $('#FirmCode').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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

    $.ajax({
        type: "POST",
        url: "app/inventario/productos/productosAcciones.php",
        data: {
            accion: 'Linea'
        },
        dataType: "json", // Espera una respuesta en formato JSON
        success: function(response) {
            // Asegúrate de que 'response' tenga la estructura esperada
            if (response.status === 'success') { // Verifica si la respuesta es exitosa
                $('#U_HBT_LINEA').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                if (item !== '' && item !== null) {
                    $('#ItemCode').val(item);
                    cargarProducto();
                } else {
                    cargarGrupo();
                    cargarPortafolio();
                }
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

    function cargarGrupo(grupo = null, categoria = null, familia = null) {
        $.ajax({
            type: "POST",
            url: "app/inventario/productos/productosAcciones.php",
            data: {
                accion: 'Grupo',
                Code: $('#U_HBT_LINEA').val(),
                Default: grupo
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#ItmsGrpCod').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                    cargarCategoria(grupo, categoria, familia);
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

    function cargarCategoria(grupo = null, categoria = null, familia = null) {
        grupo = grupo !== null ? grupo : $('#ItmsGrpCod').val();
        $.ajax({
            type: "POST",
            url: "app/inventario/productos/productosAcciones.php",
            data: {
                accion: 'Categoria',
                Code: grupo,
                Default: categoria
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_CATEGORIA').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                    cargarFamilia(categoria, familia);
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

    function cargarFamilia(categoria = null, familia = null) {
        categoria = categoria !== null ? categoria : $('#U_HBT_CATEGORIA').val();
        $.ajax({
            type: "POST",
            url: "app/inventario/productos/productosAcciones.php",
            data: {
                accion: 'Familia',
                Code: categoria,
                Default: familia
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_FAMILIA').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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

    $.ajax({
        type: "POST",
        url: "app/inventario/productos/productosAcciones.php",
        data: {
            accion: 'Especialidad'
        },
        dataType: "json", // Espera una respuesta en formato JSON
        success: function(response) {
            // Asegúrate de que 'response' tenga la estructura esperada
            if (response.status === 'success') { // Verifica si la respuesta es exitosa
                $('#U_HBT_Especialidad').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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

    function cargarPortafolio(portafolio = null, detallePortafolio = null) {
        $.ajax({
            type: "POST",
            url: "app/inventario/productos/productosAcciones.php",
            data: {
                accion: 'Portafolio',
                Code: $('#U_HBT_Especialidad').val(),
                Default: portafolio
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_PORTAFOLIO').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
                    cargarDetallePortafolio(portafolio, detallePortafolio);
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

    function cargarDetallePortafolio(portafolio = null, detallePortafolio = null) {
        portafolio = portafolio !== null ? portafolio : $('#U_HBT_PORTAFOLIO').val();
        $.ajax({
            type: "POST",
            url: "app/inventario/productos/productosAcciones.php",
            data: {
                accion: 'DetallePortafolio',
                Code: portafolio,
                Default: detallePortafolio
            },
            dataType: "json", // Espera una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que 'response' tenga la estructura esperada
                if (response.status === 'success') { // Verifica si la respuesta es exitosa
                    $('#U_HBT_CODIGODET').html(response.lista).fadeIn(); // Asumiendo que 'data' es el HTML o datos necesarios
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

    function cargarProducto() {

        $('.loading-mask').removeClass('d-none');

        // Supongamos que el código de la fila se obtiene de la primera celda
        ItemCode = $('#ItemCode').val();

        $.ajax({
            url: "app/inventario/productos/productosAcciones.php", // Coloca la URL de tu archivo PHP
            type: "POST", // Usamos POST para enviar los datos
            dataType: "json", // Esperamos recibir un JSON
            data: {
                accion: 'Mostrar', // Indica la acción que deseas realizar
                ItemCode: ItemCode // Aquí puedes pasar el ID que necesites para la consulta
            },
            success: function(datos) {
                //console.log(datos);
                // Llenar los campos del formulario con los datos recibidos
                $("#ItemName").val(datos.ItemName);
                $("#FrgnName").val(datos.FrgnName);
                $("#CodeBars").val(datos.CodeBars);
                $("#FirmCode").val(datos.FirmCode);
                $("#U_HBT_LINEA").val(datos.U_HBT_LINEA);
                cargarGrupo(datos.ItmsGrpCod, datos.U_HBT_CATEGORIA, datos.U_HBT_FAMILIA);
                $("#U_HBT_Especialidad").val(datos.U_HBT_Especialidad);
                cargarPortafolio(datos.U_HBT_PORTAFOLIO, datos.U_HBT_CODIGODET);
                $("#U_HBT_Alineaprov").val(datos.U_HBT_Alineaprov);
                $("#U_HBT_Marquilla").val(datos.U_HBT_Marquilla);
                $("#frozenFor").val(datos.frozenFor);
                $("#CardCode").val(datos.CardCode);
                $("#SuppCatNum").val(datos.SuppCatNum);
                $("#BuyUnitMsr").val(datos.BuyUnitMsr);
                $("#NumInBuy").val(datos.NumInBuy);
                $("#PurPackMsr").val(datos.PurPackMsr);
                $("#PurPackUn").val(datos.PurPackUn);
                $("#ByWh").prop('checked', datos.ByWh === "Y");
                $("#InvntItem").prop('checked', datos.InvntItem === "Y");
                $("#NumInSale").val(datos.NumInSale);
                $("#PrchseItem").prop('checked', datos.PrchseItem === "Y");
                // Itera sobre los grupos y marca el checkbox si el valor es "Y"
                $('[id^=QryGroup]').each((i, el) => $(el).prop('checked', datos[$(el).attr('id')] === "Y"));
                $("#SalPackMsr").val(datos.SalPackMsr);
                $("#SalPackUn").val(datos.SalPackUn);
                $("#SalUnitMsr").val(datos.SalUnitMsr);
                $("#SellItem").prop('checked', datos.SellItem === "Y");
                $("#SVolume").val(datos.SVolume);
                $("#U_HBT_ACTMAGENTO").val(datos.U_HBT_ACTMAGENTO);
                $("#U_HBT_ACTMAGENTOB2B").val(datos.U_HBT_ACTMAGENTOB2B);
                $("#U_HBT_ACTMAGENTOB2C").val(datos.U_HBT_ACTMAGENTOB2C);
                $("#U_HBT_ACTTRANSNAC").val(datos.U_HBT_ACTTRANSNAC);
                $("#U_HBT_DESCCOMART").val(datos.U_HBT_DESCCOMART);
                $("#U_HBT_LAYOUT").val(datos.U_HBT_LAYOUT);
                $("#U_HBT_PlanoIntroConst").val(datos.U_HBT_PlanoIntroConst);
                $("#U_HBT_PlanoIntroDist").val(datos.U_HBT_PlanoIntroDist);
                $("#U_HBT_PlanoIntroDistFE").val(datos.U_HBT_PlanoIntroDistFE);
                $("#U_HBT_PlanoIntroInfra").val(datos.U_HBT_PlanoIntroInfra);
                $("#U_HBT_PlanoIntroSV").val(datos.U_HBT_PlanoIntroSV);
                $("#U_HBT_PROVCORONA").val(datos.U_HBT_PROVCORONA);
                $("#U_HBT_ROL").val(datos.U_HBT_ROL);
                $("#U_HBT_SERENVIOS").val(datos.U_HBT_SERENVIOS);
                $("#U_HBT_UsuarioP1").val(datos.U_HBT_UsuarioP1);
                $("#U_HBT_UsuarioP2").val(datos.U_HBT_UsuarioP2);
                $("#U_HBT_UsuarioP3").val(datos.U_HBT_UsuarioP3);
                $("#UserText").text(datos.UserText);
                $("#inventory").html(datos.inventory);
                $("#BWeight1").val(datos.BWeight1);
                $("#BLength1").val(datos.BLength1);
                $("#BWidth1").val(datos.BWidth1);
                $("#BHeight1").val(datos.BHeight1);
                $("#BVolume").val(datos.BVolume);
                $("#SWeight1").val(datos.SWeight1);
                $("#SLength1").val(datos.SLength1);
                $("#SWidth1").val(datos.SWidth1);
                $("#SHeight1").val(datos.SHeight1);
                $("#SVolume").val(datos.SVolume);
                $("#BVolUnit").val(datos.BVolUnit);
                $("#SVolUnit").val(datos.SVolUnit);
                $("#SWW").val(datos.SWW);
                $("#ShipType").val(datos.ShipType);
                $("#WTLiable").prop('checked', datos.WTLiable === "Y");
                $("#IndirctTax").prop('checked', datos.IndirctTax === "Y");
                $("#NoDiscount").prop('checked', datos.NoDiscount === "Y");
                $("#PlaningSys").val(datos.PlaningSys);
                $("#OrdrIntrvl").val(datos.OrdrIntrvl);
                $("#OrdrMulti").val(datos.OrdrMulti);
                $("#MinOrdrQty").val(datos.MinOrdrQty);
                $("#LeadTime").val(datos.LeadTime);
                $("#LeadTime").val(datos.LeadTime);
                $("#TaxCodeAR").val(datos.TaxCodeAR);
                $("#TaxCodeAP").val(datos.TaxCodeAP);
                $("#ToleranDay").val(datos.ToleranDay);
                $("#U_HBT_PRECIOXM2").val(datos.U_HBT_PRECIOXM2);
                $("#U_HBT_TIPOLISTA").val(datos.U_HBT_TIPOLISTA);
                $("#U_HBT_CODIGOTAB").val(datos.U_HBT_CODIGOTAB);
                $("#U_U_HBT_TABDTOGRU").val(datos.U_U_HBT_TABDTOGRU);
                $("#U_HBT_PREBASE").val(datos.U_HBT_PREBASE);
                $("#U_HBT_DTOPROV").val(datos.U_HBT_DTOPROV);
                $("#U_HBT_COSBASE").val(datos.U_HBT_COSBASE);
                $("#U_HBT_COSESTIMADO").val(datos.U_HBT_COSESTIMADO);
                $("#U_HBT_MARGENMIN").val(datos.U_HBT_MARGENMIN);
                $("#U_HBT_PORINCRE").val(datos.U_HBT_PORINCRE);
                $("#U_HBT_MUTIL").val(datos.U_HBT_MUTIL);
                $("#U_HBT_DTOMAX").val(datos.U_HBT_DTOMAX);
                $("#U_HBT_pvmc").val(datos.U_HBT_pvmc);
                $("#U_HBT_PVMP").val(datos.U_HBT_PVMP);
                $("#U_HBT_MUPVMP").val(datos.U_HBT_MUPVMP);
                $("#U_HBT_MUpvmc").val(datos.U_HBT_MUpvmc);
                $("#U_U_HBT_COSPROM").val(datos.U_U_HBT_COSPROM);
                $("#U_HBT_FLETES").val(datos.U_HBT_FLETES);
                $("#U_HBT_VRGASTOS").val(datos.U_HBT_VRGASTOS);
                $("#U_HBT_TABDTOADI").val(datos.U_HBT_TABDTOADI);
                $("#U_HBT_FSMIN").val(datos.U_HBT_FSMIN);
                $("#U_HBT_FSMAX").val(datos.U_HBT_FSMAX);
                $("#U_HBT_USOCOSPROM").val(datos.U_HBT_USOCOSPROM);
                $("#U_HBT_FecIniDto").val(datos.U_HBT_FecIniDto);
                $("#U_HBT_FecFinDto").val(datos.U_HBT_FecFinDto);
                $("#U_HBT_NDTOMAX").val(datos.U_HBT_NDTOMAX);
                $("#U_HBT_MENSAJEMP").val(datos.U_HBT_MENSAJEMP);
                $("#U_HBT_NomPlanograma").val(datos.U_HBT_NomPlanograma);
                $("#U_HBT_DtoAdicional").val(datos.U_HBT_DtoAdicional);
                $("#U_HBT_DTOADIPROV").val(datos.U_HBT_DTOADIPROV);
                $("#U_HBT_FECDTOADIPRO").val(datos.U_HBT_FECDTOADIPRO);
                $("#U_HBT_COSTOPRODUCTO").val(datos.U_HBT_COSTOPRODUCTO);
                $("#U_HBT_PORGASTOS").val(datos.U_HBT_PORGASTOS);
                $("#U_HBT_PREPARACION").val(datos.U_HBT_PREPARACION);

                $('#PicturName').val('');
                $('#imgPicturName').attr('src', 'app/inventario/productos/imagenes.php?item=' + datos.PicturName);

                $('#imgPicturName').on('load', function() {
                    var img = $(this);
                    $('#dimension').html(`Ancho: ${img[0].naturalWidth} px - Alto: ${img[0].naturalHeight} px`);
                });

                $('.loading-mask').addClass('d-none');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores en la solicitud AJAX
                console.error("Error en la solicitud:", textStatus, errorThrown);
                alert("Ocurrió un error al realizar la solicitud. Por favor, inténtalo de nuevo.");
            }
        });

    }

    var Code, accion;

    $(document).ready(function() {

        $('#formulario').submit(function(e) {
            e.preventDefault();

            // Crear un objeto FormData
            var formData = new FormData();

            // Asignar los valores de los campos del formulario al FormData
            formData.append("accion", $("#accion").val());
            formData.append("ItemCode", $("#ItemCode").val());
            formData.append("FrgnName", $("#FrgnName").val());
            formData.append("ItemName", $("#ItemName").val());
            formData.append("CodeBars", $("#CodeBars").val());
            formData.append("FirmCode", $("#FirmCode").val());
            formData.append("U_HBT_LINEA", $("#U_HBT_LINEA").val());
            formData.append("ItmsGrpCod", $("#ItmsGrpCod").val());
            formData.append("U_HBT_CATEGORIA", $("#U_HBT_CATEGORIA").val());
            formData.append("U_HBT_FAMILIA", $("#U_HBT_FAMILIA").val());
            formData.append("U_HBT_Especialidad", $("#U_HBT_Especialidad").val());
            formData.append("U_HBT_PORTAFOLIO", $("#U_HBT_PORTAFOLIO").val());
            formData.append("U_HBT_CODIGODET", $("#U_HBT_CODIGODET").val());
            formData.append("U_HBT_Alineaprov", $("#U_HBT_Alineaprov").val());
            formData.append("U_HBT_Marquilla", $("#U_HBT_Marquilla").val());
            formData.append("frozenFor", $("#frozenFor").val());
            formData.append("CardCode", $("#CardCode").val());
            formData.append("SuppCatNum", $("#SuppCatNum").val());
            formData.append("BuyUnitMsr", $("#BuyUnitMsr").val());
            formData.append("NumInBuy", $("#NumInBuy").val());
            formData.append("PurPackMsr", $("#PurPackMsr").val());
            formData.append("PurPackUn", $("#PurPackUn").val());
            formData.append("ByWh", $("#ByWh").prop('checked') ? "Y" : "N");
            formData.append("InvntItem", $("#InvntItem").prop('checked') ? "Y" : "N");
            formData.append("NumInSale", $("#NumInSale").val());
            formData.append("PrchseItem", $("#PrchseItem").prop('checked') ? "Y" : "N");

            // Iterar sobre los grupos de checkboxes dinámicos
            $('[id^=QryGroup]').each(function() {
                formData.append($(this).attr('id'), $(this).prop('checked') ? "Y" : "N");
            });

            formData.append("SalPackMsr", $("#SalPackMsr").val());
            formData.append("SalPackUn", $("#SalPackUn").val());
            formData.append("SalUnitMsr", $("#SalUnitMsr").val());
            formData.append("SellItem", $("#SellItem").prop('checked') ? "Y" : "N");
            formData.append("U_HBT_ACTMAGENTO", $("#U_HBT_ACTMAGENTO").val());
            formData.append("U_HBT_ACTMAGENTOB2B", $("#U_HBT_ACTMAGENTOB2B").val());
            formData.append("U_HBT_ACTMAGENTOB2C", $("#U_HBT_ACTMAGENTOB2C").val());
            formData.append("U_HBT_ACTTRANSNAC", $("#U_HBT_ACTTRANSNAC").val());
            formData.append("U_HBT_DESCCOMART", $("#U_HBT_DESCCOMART").val());
            formData.append("U_HBT_LAYOUT", $("#U_HBT_LAYOUT").val());
            formData.append("U_HBT_PlanoIntroConst", $("#U_HBT_PlanoIntroConst").val());
            formData.append("U_HBT_PlanoIntroDist", $("#U_HBT_PlanoIntroDist").val());
            formData.append("U_HBT_PlanoIntroDistFE", $("#U_HBT_PlanoIntroDistFE").val());
            formData.append("U_HBT_PlanoIntroInfra", $("#U_HBT_PlanoIntroInfra").val());
            formData.append("U_HBT_PlanoIntroSV", $("#U_HBT_PlanoIntroSV").val());
            formData.append("U_HBT_PROVCORONA", $("#U_HBT_PROVCORONA").val());
            formData.append("U_HBT_ROL", $("#U_HBT_ROL").val());
            formData.append("U_HBT_SERENVIOS", $("#U_HBT_SERENVIOS").val());
            formData.append("U_HBT_UsuarioP1", $("#U_HBT_UsuarioP1").val());
            formData.append("U_HBT_UsuarioP2", $("#U_HBT_UsuarioP2").val());
            formData.append("U_HBT_UsuarioP3", $("#U_HBT_UsuarioP3").val());
            formData.append("UserText", $("#UserText").val());
            formData.append("BWeight1", $("#BWeight1").val());
            formData.append("BLength1", $("#BLength1").val());
            formData.append("BWidth1", $("#BWidth1").val());
            formData.append("BHeight1", $("#BHeight1").val());
            formData.append("BVolume", $("#BVolume").val());
            formData.append("BVolUnit", $("#BVolUnit").val());
            formData.append("SWeight1", $("#SWeight1").val());
            formData.append("SLength1", $("#SLength1").val());
            formData.append("SWidth1", $("#SWidth1").val());
            formData.append("SHeight1", $("#SHeight1").val());
            formData.append("SVolume", $("#SVolume").val());
            formData.append("SVolUnit", $("#SVolUnit").val());
            formData.append("SWW", $("#SWW").val());
            formData.append("ShipType", $("#ShipType").val());
            formData.append("WTLiable", $("#WTLiable").prop('checked') ? "Y" : "N");
            formData.append("IndirctTax", $("#IndirctTax").prop('checked') ? "Y" : "N");
            formData.append("NoDiscount", $("#NoDiscount").prop('checked') ? "Y" : "N");
            formData.append("PlaningSys", $("#PlaningSys").val());
            formData.append("OrdrIntrvl", $("#OrdrIntrvl").val());
            formData.append("OrdrMulti", $("#OrdrMulti").val());
            formData.append("MinOrdrQty", $("#MinOrdrQty").val());
            formData.append("LeadTime", $("#LeadTime").val());
            formData.append("TaxCodeAR", $("#TaxCodeAR").val());
            formData.append("TaxCodeAP", $("#TaxCodeAP").val());
            formData.append("ToleranDay", $("#ToleranDay").val());
            formData.append("U_HBT_PRECIOXM2", $("#U_HBT_PRECIOXM2").val());
            formData.append("U_HBT_TIPOLISTA", $("#U_HBT_TIPOLISTA").val());
            formData.append("U_HBT_CODIGOTAB", $("#U_HBT_CODIGOTAB").val());
            formData.append("U_U_HBT_TABDTOGRU", $("#U_U_HBT_TABDTOGRU").val());
            formData.append("U_HBT_PREBASE", $("#U_HBT_PREBASE").val());
            formData.append("U_HBT_DTOPROV", $("#U_HBT_DTOPROV").val());
            formData.append("U_HBT_COSBASE", $("#U_HBT_COSBASE").val());
            formData.append("U_HBT_COSESTIMADO", $("#U_HBT_COSESTIMADO").val());
            formData.append("U_HBT_MARGENMIN", $("#U_HBT_MARGENMIN").val());
            formData.append("U_HBT_PORINCRE", $("#U_HBT_PORINCRE").val());
            formData.append("U_HBT_MUTIL", $("#U_HBT_MUTIL").val());
            formData.append("U_HBT_DTOMAX", $("#U_HBT_DTOMAX").val());
            formData.append("U_HBT_pvmc", $("#U_HBT_pvmc").val());
            formData.append("U_HBT_PVMP", $("#U_HBT_PVMP").val());
            formData.append("U_HBT_MUPVMP", $("#U_HBT_MUPVMP").val());
            formData.append("U_HBT_MUpvmc", $("#U_HBT_MUpvmc").val());
            formData.append("U_U_HBT_COSPROM", $("#U_U_HBT_COSPROM").val());
            formData.append("U_HBT_FLETES", $("#U_HBT_FLETES").val());
            formData.append("U_HBT_VRGASTOS", $("#U_HBT_VRGASTOS").val());
            formData.append("U_HBT_TABDTOADI", $("#U_HBT_TABDTOADI").val());
            formData.append("U_HBT_FSMIN", $("#U_HBT_FSMIN").val());
            formData.append("U_HBT_FSMAX", $("#U_HBT_FSMAX").val());
            formData.append("U_HBT_USOCOSPROM", $("#U_HBT_USOCOSPROM").val());
            formData.append("U_HBT_FecIniDto", $("#U_HBT_FecIniDto").val());
            formData.append("U_HBT_FecFinDto", $("#U_HBT_FecFinDto").val());
            formData.append("U_HBT_NDTOMAX", $("#U_HBT_NDTOMAX").val());
            formData.append("U_HBT_MENSAJEMP", $("#U_HBT_MENSAJEMP").val());
            formData.append("U_HBT_NomPlanograma", $("#U_HBT_NomPlanograma").val());
            formData.append("U_HBT_DtoAdicional", $("#U_HBT_DtoAdicional").val());
            formData.append("U_HBT_DTOADIPROV", $("#U_HBT_DTOADIPROV").val());
            formData.append("U_HBT_FECDTOADIPRO", $("#U_HBT_FECDTOADIPRO").val());
            formData.append("U_HBT_COSTOPRODUCTO", $("#U_HBT_COSTOPRODUCTO").val());
            formData.append("U_HBT_PORGASTOS", $("#U_HBT_PORGASTOS").val());
            formData.append("U_HBT_PREPARACION", $("#U_HBT_PREPARACION").val());

            // Cargar la imagen en FormData (asegúrate de que el input de imagen tenga el atributo `name="picturename"`)
            var pictureFile = $('#PicturName')[0].files[0]; // Obtener el archivo de la imagen
            if (pictureFile) {
                formData.append("PicturName", pictureFile); // Añadir la imagen a FormData
            }

            // Enviar la solicitud AJAX con los datos y la imagen
            $.ajax({
                url: "app/inventario/productos/productosAcciones.php",
                type: "POST",
                data: formData,
                processData: false, // Evitar que jQuery procese los datos
                contentType: false, // Evitar que jQuery establezca un content-type incorrecto
                dataType: "json", // Esperamos recibir un JSON
                success: function(response) {
                    console.log(response);
                    // Manejar la respuesta del servidor
                    if (response.status === "success") {
                        alert(response.message); // Mostrar mensaje de éxito
                    } else {
                        alert("Error: " + response.message); // Mostrar mensaje de error
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejo de errores en la solicitud AJAX
                    console.error("Error en la solicitud:", textStatus, errorThrown);
                    alert("Ocurrió un error al realizar la solicitud. Por favor, inténtalo de nuevo.");
                }
            });
        });

        $(document).on("change", "#U_HBT_LINEA", function() {
            cargarGrupo();
        });

        $(document).on("change", "#ItmsGrpCod", function() {
            cargarCategoria();
        });

        $(document).on("change", "#U_HBT_CATEGORIA", function() {
            cargarFamilia();
        });

        $(document).on("change", "#U_HBT_Especialidad", function() {
            cargarPortafolio();
        });

        $(document).on("change", "#U_HBT_PORTAFOLIO", function() {
            cargarDetallePortafolio();
        });

        $('#PicturName').on('change', function(event) {
            // Obtener el archivo seleccionado
            const file = event.target.files[0];

            // Verificar si se ha seleccionado un archivo
            if (file) {
                // Validar el tipo de archivo
                const fileType = file.type;
                const validTypes = ['image/png', 'image/jpeg'];

                if (validTypes.includes(fileType)) {
                    // Crear una URL para el archivo seleccionado
                    const imageUrl = URL.createObjectURL(file);

                    // Actualizar el src del img para mostrar la imagen
                    $('#imgPicturName').attr('src', imageUrl);
                } else {
                    alert('Por favor, selecciona una imagen en formato PNG o JPG.');
                    // Limpiar el campo de entrada si el tipo no es válido
                    $('#PicturName').val('');
                    // También podrías resetear la imagen mostrada
                    $('#imgPicturName').attr('src', 'app/inventario/productos/imagenes.php'); // URL por defecto
                }
            }
        });

        $('#ItemCode').on('keyup', function() {
            const ItemCode = $('#ItemCode').val().trim(); // Usar trim() para evitar espacios innecesarios

            if (ItemCode === '') {
                $('#listaProductos').fadeOut(); // Ocultar la lista si el input está vacío
                return; // Salir de la función
            }

            $.ajax({
                type: "POST",
                url: "app/inventario/productos/productosAcciones.php",
                data: {
                    accion: 'LoadProduct',
                    ItemCode: ItemCode
                },
                dataType: "json", // Esperamos recibir un JSON
                success: function(data) {
                    if (data.status === 'success' && data.data.length > 0) {
                        // Construir la lista de productos
                        let listaHtml = `
                    <div class="dropdown-menu show" aria-labelledby="navbarDropdown" style="display: block; width: 100%; max-height:300px; overflow-y: scroll; border-radius: 10px; scroll-behavior: smooth;">
                `;

                        data.data.forEach(item => {
                            listaHtml += `
                        <a class='dropdown-item' style='white-space: normal' data='${item.itemCode}' id='${item.itemCode}'>
                            ${item.displayText}
                        </a>
                        <div class='dropdown-divider'></div>
                    `;
                        });

                        listaHtml += '</div>';
                        $('#listaProductos').fadeIn(1000).html(listaHtml);

                        // Asignar evento de clic a los elementos de la lista
                        $('.dropdown-item').on('click', function() {
                            const selectedItemCode = $(this).attr('data'); // Obtener el código del item seleccionado
                            $('#ItemCode').val(selectedItemCode); // Establecer el valor del campo de entrada
                            $('#listaProductos').fadeOut(); // Ocultar la lista

                            // Actualizar la URL manualmente
                            const currentUrl = window.location.href.split('&item=')[0]; // Obtener la URL sin el parámetro item
                            const newUrl = `${currentUrl}&item=${selectedItemCode}`; // Crear la nueva URL
                            window.history.pushState({
                                path: newUrl
                            }, '', newUrl); // Actualizar la URL

                            cargarProducto(); // Llama a la función para cargar el producto
                        });
                    } else {
                        $('#listaProductos').fadeOut(); // Si no hay productos, ocultar la lista
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la petición: ", error); // Manejo de errores
                    $('#listaProductos').fadeOut(); // Ocultar la lista en caso de error
                }
            });
        });

    });
</script>