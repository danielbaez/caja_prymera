<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
          <title>Cr&eacute;dito Mi Auto</title>
        <?php } else { ?>
            <title>Cr&eacute;dito Mi Cash</title>
        <?php } ?>
        
        
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">

        <link type="text/css"       rel="stylesheet"    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
          
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-micash.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">

    </head>
    <body>

        <!-- <div class="container-header">
            <div class="container">
                <div class="row padding-div-row-header">
                    <div class="col-xs-6 col-title-header-padding">
                        <h1 class="title-header">&iexcl;Te prestamos hasta<br>S/ 15,000 f&aacute;cil y r&aacute;pido!*</h1>
                    </div>
                    <div class="col-xs-6 div-logo">
                        <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
                        <h1 style="display: none">&iexcl;Te prestamos hasta S/ 15,000 f&aacute;cil y r&aacute;pido!*</h1>
                    </div>
                </div>    
            </div>            
        </div> -->


          <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header">&iexcl;Te prestamos hasta<br>S/ 15,000 f&aacute;cil y r&aacute;pido!*</h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none">&iexcl;Te prestamos hasta S/ 15,000 f&aacute;cil y r&aacute;pido!*</h1>
        </div>
      </div>    
    </div>            
  </div>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed btn-collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>    
    <div class="collapse navbar-collapse custom-menu-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a><?php echo _getSesion('nombreCompleto') ?></a></li>
        <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
          <li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
        <?php } ?>
        <?php if(_getSesion('rol') == 'asesor'){ ?>
          <li><a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a></li>
        <?php } ?>
        <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
      </ul>
    </div>
  </div>
</nav>

        <div class="container fondo">
            <div class="row">                
                <div class="col-xs-12 hidden-xs visible-sm hidden-md text-right div-navegacion">

                    <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li>
                                <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                                <a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a>
                                <?php } ?>
                            </li>
                            <li>
                                <?php if(_getSesion('rol') == 'asesor'){ ?>
                                <a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a>
                                <?php } ?>
                            </li>
                            <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                          </ul>
                        </li>
                    </ul>
                    <!-- <span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span><br>
                    <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                    <a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a><br>
                    <?php } ?>
                    <?php if(_getSesion('rol') == 'asesor'){ ?>
                    <a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a><br>
                    <?php } ?>
                    <a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a><br> -->                
                </div>
            </div>



            <!-- <div class="row row-top"> -->
            <div class="row row-form-img">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 text-left">
                    <div class="panel panel-primary formulario-1" style="border:none;background: rgba(255,255,255,0.6);max-width: 461px;">
                        <div class="panel-heading" style="background-color: #fff;border: 0px;color: #00519D;text-align: center;">
                            <h1 class="panel-title" style="font-size:40px;margin-top: 19px;font-weight: bold;">Consulta aqu&iacute;</h1>
                        </div>
                        <div class="panel-body" style="background-color: #fff;">
                            <form class="text-center">
                                <p style="margin-top: -30px;font-size:15px;color: #a3a4a6;">Cr&eacute;dito Consumo "Mi Cash"</p>
                                <p class="datos">Ingresa tus datos</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" style="" maxlength="50" onkeypress="return soloLetras(event)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Apellido" placeholder="Apellido" style="" maxlength="100" onkeypress="return soloLetras(event)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="dni" placeholder="DNI" style="" maxlength="8" onkeypress="return valida(event)">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" style="margin-left: 10px;width: 93%;height: 50px;" class="form-control" id="email" placeholder="Email" style="" maxlength="50">
                                    </div>
                                </div>
                            </form>
                            <form class="text-center">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="checkbox" style="position: absolute;top: 6px;transform: scale(1.5);" id="acepto"> Acepto 
                                            <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -1px;" data-toggle="modal" data-target="#myModal">Uso de datos personales</button>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="col-xs-12" style="padding: 0;">
                                <div class="col-xs-6 col-md-8 robot">
                                    <div class="checkbox" style="border: 1px solid #ccc;background: #f0f0f0;margin: 0px;padding: 20px;">
                                        <label>
                                            <input type="checkbox" style="transform: scale(1.5);"> No soy un robot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 consultar">
                                    <button type="button" class="btn btn-lg" style="width:100%;font-weight:bold;color: #fff;background-color: #007ac0;height: 65px;" onclick="solicitarPrestamo()">Consultar</button>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p style="font-size: 12px;color: #9fa9a3;margin-top:10px;">*El cr&eacute;dito Consumo "Mi Cash" est&aacute; sujeto a evaluaci&oacute;n</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 mas-caracteristicas">
                        <div class="col-xs-7" style="background-color: #fff;width: 183px;margin-left: -15px;">
                            <div class="col-xs-8">
                                <label class="" style="color: #00519D;margin: 5px;">Caracter&iacute;sticas</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" style="margin-left: 19px;" onclick="moreText()">
                                    <i class="mdi mdi-keyboard_arrow_down" style="color: #00519D;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-xs hidden-sm col-md-6 button-login text-right img-form-cash">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li>
                                <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                                <a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a>
                                <?php } ?>
                            </li>
                            <li>
                                <?php if(_getSesion('rol') == 'asesor'){ ?>
                                <a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a>
                                <?php } ?>
                            </li>
                            <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                          </ul>
                        </li>
                    </ul>

    
                    <!-- <span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span><br>
                    <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                    <a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a><br>
                    <?php } ?>
                    <?php if(_getSesion('rol') == 'asesor'){ ?>
                    <a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a><br>
                    <?php } ?>
                    <a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a><br>  -->



                </div>
          
                <div class="col-xs-12 col-md-12 hidden" id="ocultarCaract" style="margin-bottom: 20px; font-family: 'quicksand'; padding-bottom: 10px;">
                    
                    <ul class="nav nav-tabs responsive" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#homes">Caracter&iacute;sticas</a></li>
                        <li><a data-toggle="tab" href="#menus1">Requisitos</a></li>
                        <li><a data-toggle="tab" href="#menus2">Documentos</a></li>
                        <li><a data-toggle="tab" href="#menus3">Preguntas frecuentes</a></li>
                        <li><a data-toggle="tab" href="#menus4">Seguros</a></li>
                    </ul>
                    <!-- <div class="col-xs-12" style="background: white"> -->
                    <div class="tab-content responsive" style="display: flex; background: white; padding-top: 10px;
    padding-bottom: 10px;">
                        <div id="homes" class="tab-pane active">
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Monto a financiar:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 1,000 Soles y M&aacute;ximo 15,000 Soles.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Moneda:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Soles</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>TEA:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 25% - m&aacute;ximo 63%.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Periodo de gracia:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Hasta 60 d&iacute;as.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Periodicidad de pago:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Mensual.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Destino de cr&eacute;dito:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Libre disponibilidad.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Garant&iacute;a:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Ninguna.</span>
                            </div>
                        </div>
                        <div id="menus1" class="tab-pane">
                            <div class="col-xs-12 font-bold">
                                <span><strong>Requisitos m&iacute;nimos que debe tener un cliente:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Personas dependientes (m&iacute;nimo 6 meses de antig&uring;edad laboral).</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Ingresos m&iacute;nimo: 1,000 soles.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Edad: M&iacute;nimo 23 a&ntilde;os y M&aacute;ximo 70 a&ntilde;os.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Calificaci&oacute;n Normal (RCC) en los &uacute;ltimos 6 meses o score de aprobaci&oacute;n seg&uacute;n la evaluaci&oacute;n del &aacute;rea de Riesgos.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Persona con nacionalidad peruana.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Puede ser cliente nuevo y cliente recurrente de Prymera; en este &uacute;ltimo caso, cuando se tenga cr&eacute;dito vigente, se tramitar&aacute; ampliaci&oacute;n de cr&eacute;dito, siempre que cuente con 03 cuotas pagadas como m&iacute;nimo y que no tenga d&iacute;as de atrazo en ninguna cuota.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben registrar cr&eacute;ditos vencidos, en cobranza judicial y/o castigada en los &uacute;ltimos 24 meses.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>El n&uacute;mero m&aacute;ximo de entidades de endeudamiento es de 4 entidades, incluyendo a Prymera.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>En caso de tener c&oacute;nyuge se registra sus datos (nombres, apellidos y DNI)</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben ser clientes vinculados, familiares del personal de la Caja (1&deg; y 2&deg; grado) y no deben pertenecer a la base de alertas.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben ser clientes que se han registrado en la base de datos INDECOPI (No Molestar); aplica para el personal de Telemarketing.</span>
                            </div>
                        </div>
                        <div id="menus2" class="tab-pane">
                            <div class="col-xs-12 font-bold">
                                <span><strong>El cliente debe proporcionar los siguientes documentos:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Documentos de identificaci&oacute;n: copia de DNI vigente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Copia de &uacute;ltimo recibo de servicios del titular (m&aacute;ximo antig&uring;edad de 2 meses)</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Sustento de ingresos: 3 &uacute;ltimas boletas de pago, si el cliente cuenta con ingresos variables y 1 &uacute;ltima boleta, si el cliente cuenta con ingresos fijos (s&oacute;lo en caso solicite un monto mayor al pre-aprobado)</span>
                            </div>
                            <div class="col-xs-12 font-bold espacio-top-bottom">
                                <span><strong>El expediente debe considerar los siguientes documentos:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Resumen del Cr&eacute;dito firmada por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Resoluci&oacute;n del Cr&eacute;dito firmado por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Orden de Desembolso firmado por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Contrato del Cr&eacute;dito firmado por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Hoja Resumen firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Pagar&eacute;  firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Documentos de identificaci&oacute;n: copia de DNI o Ficha RENIEC</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Copia de &uacute;ltimo recibo de servicios (m&aacute;ximo antig&uring;edad de 2 meses).</span>
                            </div>
                            <div class="col-xs-12 font-bold espacio-top-bottom">
                                <span><strong>Adicional, para cr&eacute;ditos mayores al monto pre-aprobado se debe adjuntar:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Sustento de ingresos: 1 &uacute;ltima boletas de pago; si el colaborador cuenta con ingresos variables se solicitara las 3 &uacute;ltimas boletas de pago y se utilizar&aacute; del ingreso promedio de estas 3 boletas para la evaluación del cr&eacute;dito.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Reporte ESSSALUD.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Correo electr&oacute;nico impreso de la respuesta del &aacute;rea de Riesgos (en caso el monto desembolsado haya sido mayor al pre-aprobado).</span>
                            </div>
                        </div>
                        <div id="menus3" class="tab-pane">
                            <div class="col-xs-12 font-bold">
                                <span><strong>Preguntas Frecuentes</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span> <small style="font-family: arial;font-weight: bold;">&iquest; </small>Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Si, usted podrá hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Cu&aacute;l es el procedimiento de pagos anticipados o adelantos de cuotas?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Si usted opta por esta opci&oacute;n, una vez realizado el pago deber&aacute; comunicar inmediatamente por escrito a Prymera sobre la elecci&oacute;n que usted ha tomado y que podr&iacute;a ser:
                                    <br>- Pago Total del Cr&eacute;dito: amortiza el total de la deuda con reducci&oacute;n de comisiones e intereses al d&iacute;a de pago.
                                    <br>- Prepago con Reducci&oacute;n del Plazo: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, el monto de las cuotas se mantiene y reduce el plazo del cr&eacute;dito.
                                    <br>- Prepago con Reducci&oacute;n de Cuota: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, reduciendo el monto de la cuota del mes y manteniendo el plazo del cr&eacute;dito.
                                    <br>- Adelanto de Cuotas: realiza pagos que se aplican a cuotas inmediatamente posteriores a la exigible. No reduce intereses, comisiones ni gastos.
                                </span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; pasa si realizo el pago anticipado y no comunico sobre mi elecci&oacute;n?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerar&aacute; como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elecci&oacute;n o un tercero realice dicho pago por Usted, Prymera reducir&aacute; el n&uacute;mero de cuotas, dentro de los quince (15) días de realizado el pago. 
                                    En cualquiera de los casos y a su solicitud, Prymera le har&aacute; entrega del cronograma de pagos modificado dentro de los 7 d&iacute;as calendarios posteriores a la presentaci&oacute;n de su solicitud.
                                </span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; sucede si me atraso en pagar las cuotas?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Si el Cliente incumpliera con el pago oportuno de una o m&aacute;s de las cuotas previstas en el cronograma de pagos, se devengar&aacute;n autom&aacute;ticamente sobre las cuotas vencidas, en forma adicional a los intereses compensatorios, los intereses moratorios a la tasa que figura en la Hoja Resumen Informativa. La constituci&oacute;n en mora ser&aacute; autom&aacute;tica. Asimismo, se proceder&aacute; a realizar el reporte correspondiente a las Centrales de Riesgo.
                                </span>
                            </div>
                        </div>
                        <div id="menus4" class="tab-pane">
                            <div class="col-xs-12 font-bold">
                                <span><strong>El producto "MI CASH" esta afecto el seguro desgravamen</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; es el seguro de desgravamen?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Es un seguro de vida de car&aacute;cter obligatorio que adquiere cuando solicita su crédito y cubre fallecimiento por muerte natural o consecuencia de un accidente o invalidez total permanente por accidente. En caso de fallecimiento o invalidez por accidente, el seguro de desgravamen aplica sólo si el siniestro es notificado antes de cumplirse los seis meses de su ocurrencia. El familiar del cliente deberá presentar los documentos requeridos en cualquiera de nuestra red de agencias.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>En caso siniestro del titular del crédito, <small style="font-family: arial;font-weight: bold;">&iquest; </small>Qué deberá presentar el apoderado?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>-Copias certificadas de Partida y Certificado de Defunción.<br>
                                    -Atestado policial, protocolo de necropsia, análisis toxicológico y de alcoholemia en caso de muerte por accidente.<br>
                                    -Copia del Documento de Identidad del asegurado fallecido.<br>
                                    -Informe completo y detallado del médico tratante que sustente el estado del paciente e indique la fecha de inicio de la Invalidez, en caso de Invalidez total y permanente.<br>
                                    -El tiempo límite máximo para declarar el fallecimiento o la invalidez total y permanente es de 180 días posteriores a la ocurrencia.<br>
                                    -Mayor información en caso la Compañía de Seguro lo requiera.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>En cuántos días obtendré respuesta de la aseguradora ante un siniestro?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>La aseguradora tiene un plazo máximo de 30 días hábiles para enviarte una respuesta.</span>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg centrar_logo" role="document">
    <div class="modal-content" style="">
          <div class="modal-header">
            <button type="button" style="" class="close btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" class="alinear"" id="terminosYcondiciones" style="">Uso de Datos Personales</h3>
          </div>
          <div class="modal-body resumen" style="">
            <p class="tipo_letra">
               “El cliente autoriza y otorga a CRAC PRYMERA SA. (PRYMERA) por tiempo indefinido, su consentimiento libre, previo, expreso, inequívoco e informado para que (por sí mismo o a través de terceros) recopile, registre, organice, almacene, conserve, elabore, modifique, bloquee, suprima, extraiga, consulte, utilice, transfiera, exporte, importe o procese (trate) de cualquier otra forma sus datos personales, conforme a Ley, pudiendo elaborar Bases de Datos (Bancos de Datos) con su información tanto proporcionada, como recopilada a través de terceros o generada por PRYMERA como consecuencia del cumplimiento de las relaciones contractuales y/o comerciales que mantenga con el cliente, con la finalidad de:<br><br> 
            </p>

            <p class="tipo_letra">
            (i) Otorgarle el producto y/o servicio solicitado; enviarle información ofertas comerciales y publicidad relacionada al producto y/o servicio; y/o<br> 
            </p>

            <p class="tipo_letra">
               (ii) Ofrecerle otros productos y/o servicios y/o ofertas, y/o publicidad e información en general, entre otros, de PRYMERA y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo económico al que pertenece PRYMERA, domiciliada o no en el país, (directamente y/o a través de terceras vinculadas o no vinculadas); y/o<br> 
            </p>

            <p class="tipo_letra">
               (iii) Evaluar su calidad crediticia y capacidad de pago, así como de ser el caso, efectuar las gestiones de recuperación o cobranza; y/o<br> 
            </p>

            <p class="tipo_letra">
              (iv) Evaluar cualquier solicitud que efectúe en el presente y/o futuro y/o;<br>  
            </p>

            <p class="tipo_letra">
               (v) Almacenar y tratar sus datos personales, con fines estadísticos y/o históricos para PRYMERA o terceras vinculadas o no vinculadas y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo económico que pertenece PRYMERA.<br> 
            </p>

            <p class="tipo_letra">
              Esta autorización es por tiempo indefinido y estará vigente inclusive después del vencimiento de las operaciones, y/o de las relaciones contractuales y/o comerciales que el Cliente mantenga o pudiera mantener con PRYMERA. El Cliente, declara haber sido informado de que en caso no otorgue este consentimiento, su información solo será utilizada (tratada) para la ejecución (desarrollo) y cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA.<br>  
            </p>

            <p class="tipo_letra">
              PRYMERA se reserva el derecho de poder compartir y/o usar y/o almacenar y/o transferir la información a terceras personas vinculadas o no a PRYMERA, sean estos socios comerciales o no de PRYMERA, nacionales o extranjeros, públicos o privados, con el objeto de realizar actividades relacionadas al cumplimiento de las finalidades indicadas anteriormente.<br>
            </p>
             
            <p class="tipo_letra">
               El Cliente declara que ha sido informado(a) que podrá revocar en cualquier momento su consentimiento, comunicando su decisión por escrito en cualquiera de las Agencias de PRYMERA, la cual no afectará el uso de sus datos ni el contenido de las Bases de Datos (Banco de Datos) para la ejecución y/o cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA, adicional a ello, PRYMERA podrá informarle a través de su página web u otros medios de comunicación, sobre otros canales para que el Cliente pueda hacer efectiva su revocatoria.<br> 
            </p>

            <p class="tipo_letra">
               Asimismo, el Cliente declara que ha sido informado que podrá ejercer sus derechos de información, acceso, rectificación, cancelación y oposición de acuerdo a lo dispuesto por la Ley de Protección de Datos Personales vigente y su Reglamento. PRYMERA podrá informarle a través de su página web u otros medios de comunicación, sobre otros canales para que el Cliente pueda hacer efectivo el ejercicio de sus derechos.<br><br> 
            </p>

            <p class="tipo_letra">
               PRYMERA es titular y responsable de las Bases de Datos (Bancos de Datos) originadas por el tratamiento de los datos personales que recopile y/o trate y declara que ha adoptado los niveles de seguridad apropiados para el resguardo de la información, de acuerdo a Ley. Asimismo, declara que respeta los principios de legalidad, consentimiento, finalidad, proporcionalidad, calidad, disposición de recurso, nivel de protección adecuado, conforme a las disposiciones de la Ley de Protección de Datos vigente en Perú.”<br><br> 
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
          </div>
        </div>
  </div>
</div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="https://openam.github.io/bootstrap-responsive-tabs/js/responsive-tabs.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>

    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" async src="<?php echo RUTA_JS?>jsmicash.js?v=<?php echo time();?>"></script>
    
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script type="text/javascript">
//     var onloadCallback = function() {
//         grecaptcha.render('html_element', {
//           'sitekey' : '6Lf-jgQTAAAAAGgYwYOOjGAQRFQKqTx_6FCcUYM_'
//         });
//       };

(function($) {
      fakewaffle.responsiveTabs(['xs']);
  })(jQuery);
    </script>
  </body>
</html>