<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

          <title>Cr&eacute;dito Auto de Prymera</title>
        
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-micash.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    </head>
    <body>


    <div class="container-header">
        <div class="container">
          <div class="row padding-div-row-header">
            <div class="col-xs-6 col-title-header-padding">
              <h1 class="title-header"><a href="/Vehicular">&iexcl;Te financiamos hasta el<br>90% de tu auto!</a></h1>
            </div>
            <div class="col-xs-6 div-logo">
              <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
              <h1 style="display: none"><a href="/Vehicular">&iexcl;Te financiamos hasta el 90% de tu auto!</a></h1>
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
                        <li class="dropdown dropdown-menu-user">
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
                </div>
            </div>
            
            <div class="row row-form-img">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 text-left">
                    <div class="panel panel-primary formulario-1" style="border:none;background: rgba(255,255,255,0.6);max-width: 461px;">
                        <div class="panel-heading" style="background-color: #fff;border: 0px;color: #00519D;text-align: center; padding-bottom: 0">
                            <h1 class="panel-title" style="font-size:32px;margin-top: 0px;font-weight: bold;">Consulta aqu&iacute;</h1>
                        </div>
                        <div class="panel-body" style="background-color: #fff; padding-top: 5px; padding-bottom: 10px;">
                            <form class="text-center">
                                <p style="font-size:15px;color: #a3a4a6; margin-bottom: 5px; ">Cr&eacute;dito Auto de Prymera - <?php if(_getSesion('tipoCred') == 3){ echo 'Evaluación'; } else { echo 'Campaña'; } ?></p>
                                <p class="datos" style="margin-bottom: 10px">Ingresa tus datos</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Nombre" placeholder="Nombre" style="" maxlength="50" onkeypress="return soloLetras(event)" onkeyup="verificarDatos(event);">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Apellido" placeholder="Apellido" style="" maxlength="100" onkeypress="return soloLetras(event)" onkeyup="verificarDatos(event);">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="dni" placeholder="DNI" style="" maxlength="8" onkeypress="return valida(event)" onkeyup="verificarDatos(event);">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email" style="" maxlength="50" onkeyup="verificarDatos(event);">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="checkbox" style="zoom: 1.5;" id="acepto" onkeyup="verificarDatos(event);"> Acepto 
                                            <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -2px;" data-toggle="modal" data-target="#myModal">Uso de datos personales</button>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="col-xs-12" style="padding: 0;">
                                <div class="col-xs-6 col-md-8 robot">
                                    <div class="checkbox" style="border: 1px solid #ccc;background: #f0f0f0;margin: 0px;padding: 20px;" onkeyup="verificarDatos(event);">
                                        <label>
                                            <input type="checkbox" style="zoom: 1.5;margin-top: 1px;"> No soy un robot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 consultar">
                                    <button type="button" class="btn btn-lg btn-consultar" style="width:100%;font-weight:bold;color: #fff;background-color: #007ac0;height: 65px;" onclick="solicitarPrestamo()">Consultar</button>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p style="font-size: 12px;color: #9fa9a3;margin-top:10px; margin-bottom: 0">*El cr&eacute;dito vehicular "Auto de Prymera" est&aacute; sujeto a evaluaci&oacute;n</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 mas-caracteristicas" style="padding-left: 0">
                        <span onclick="moreText()" style="color: #00519D;padding: 10px 15px; background-color: #fff; cursor: pointer;">Caracter&iacute;sticas <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="hidden-xs hidden-sm col-md-6 button-login text-right img-form-vehicular">
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
                </div>
               
                <div class="col-xs-12 col-md-12 hidden" id="ocultarCaract">
                    
                    <ul class="nav nav-tabs responsive" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#homes">Caracter&iacute;sticas</a></li>
                        <li><a data-toggle="tab" href="#menus1">Requisitos</a></li>
                        <li><a data-toggle="tab" href="#menus2">Documentos</a></li>
                        <li><a data-toggle="tab" href="#menus3">Preguntas frecuentes</a></li>
                        <li><a data-toggle="tab" href="#menus4">Seguros</a></li>
                    </ul>
                    <div class="tab-content responsive" style="display: flex; background: white; padding-top: 10px;
                        padding-bottom: 10px;">
                        <div id="homes" class="tab-pane active">                            
                            
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Porcentaje inicial:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 10% y M&aacute;ximo 50% del valor del veh&iacute;culo.</span>
                            </div>
                            <div class="col-xs-12"></div>                            
                            <div class="col-xs-6 col-sm-3 text-left font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Monto a financiar:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 15,000 Soles y M&aacute;ximo 150,000 Soles.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Plazos:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 12 meses y M&aacute;ximo 60 meses.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>TEA:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>M&iacute;nimo 11% - M&aacute;ximo 19%.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left font-bold">
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
                                <span>Mensual</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Destino de cr&eacute;dito:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Compra de auto nuevo.</span>
                            </div>
                            <div class="col-xs-12"></div>
                            <div class="col-xs-6 col-sm-3 text-left espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>Modalidad:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left espacio-top-bottom">
                                <span>Convencional - Compra inteligente.</span>
                            </div>                           
                        </div>

                        <div id="menus1" class="tab-pane">
                            <div class="col-xs-12 font-bold">
                                <span><strong>Requisitos m&iacute;nimos que debe tener un cliente:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Personas dependientes (m&iacute;nimo 1 a&ntilde;o de antiguedad laboral).</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Ingresos m&iacute;nimo: 2,000 soles.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Edad: M&iacute;nimo 24 a&ntilde;os y M&aacute;ximo 70 a&ntilde;os.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Calificaci&oacute;n Normal (RCC) en los &uacute;ltimos 6 meses o score de aprobaci&oacute;n seg&uacute;n la evaluaci&oacute;n del &aacute;rea de Riesgos.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Persona con nacionalidad peruana.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Cliente nuevo y/o recurrente de Prymera; si es cliente recurrente y tiene un cr&eacute;dito vigente, se considera como un cr&eacute;dito paralelo.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben registrar cr&eacute;ditos vencidos, en cobranza judicial y/o castigada en los &uacute;ltimos 24 meses.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>El n&uacute;mero m&aacute;ximo de entidades de endeudamiento es de 4 entidades, incluyendo a Prymera.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben encontrarse registrados en la base de alertas del sistema Microbank.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <span><strong>Sobre la Tasaci&oacute;n:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Aplica para veh&iacute;culos nuevos (la tasaci&oacute;n se actualiza cada a&ntilde;o, luego del primer a&ntilde;o). Costo es asumido por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <span><strong>Sobre la Garant&iacute;a Vehicular:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>El veh&iacute;culo a adquirir debe constituirse como garant&iacute;a a favor de Prymera
                                        El Costo del servicio de toma de firmas y/o recojo de documentos es asumido por el cliente, lo cual incluye los gastos notariales y registrales, seg&uacute;n valor del vehiculo
                                        Documentaci&oacute;n:
                                        Contrato de Garant&iacute;a firmado por representante legal de Prymera y cliente.
                                        Carta de Caracter&iacute;sticas del Veh&iacute;culo proporcionada por el cliente</span>
                            </div>
                        </div>
                        <div id="menus2" class="tab-pane">

                            <div class="col-xs-12 font-bold">
                                <span><strong>El cliente debe proporcionar los siguientes documentos:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Documentos de identificaci&oacute;n: copia de DNI vigente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Copia de &uacute;ltimo recibo de servicios (luz / Agua) del titular (m&aacute;ximo antiguedad de 2 meses)</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Sustento de ingresos: 3 &uacute;ltimas boletas de pago, si el cliente cuenta con ingresos variables y 2 &uacute;ltimas boletas, si el cliente cuenta con ingresos fijos (s&oacute;lo en caso solicite un monto mayor al pre-aprobado).</span>
                            </div>

                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <span><strong>El expediente debe considerar los siguientes documentos:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Solicitud del Cr&eacute;dito Vehicular firmada por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Resumen del Cr&eacute;dito</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Resoluci&oacute;n del Cr&eacute;dito</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Orden de Desembolso firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Contrato del Cr&eacute;dito firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Contrato de Garant&iacute;a firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Hoja Resumen firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Pagar&eacute;  firmado por el cliente</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>P&oacute;liza de Seguro (en caso el cliente endose seguro a favor de Prymera)</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Documentos de identificaci&oacute;n: copia de DNI vigente o Ficha RENIEC o Carn&eacute; de Extranjer&iacute;a vigente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Copia de &uacute;ltimo recibo de servicios (luz / Agua) del titular (m&aacute;ximo antiguedad de 2 meses)</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Impresi&oacute;n de las centrales de riesgo de la SBS (RCC) y de las centrales privadas de acuerdo a normativa vigente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Sustento de ingresos: 3 &uacute;ltimas boletas de pago, si el cliente cuenta con ingresos variables y 2 &uacute;ltimas boletas, si el cliente cuenta con ingresos fijos.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Reporte ESSSALUD</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Cotizaci&oacute;n del veh&iacute;culo a adquirirse con una antiguedad no mayor de 15 d&iacute;as de la fecha de evaluaci&oacute;n.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Constancia del abono de la cuota inicial.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Constancia del abono de la cuota inicial.</span>
                            </div>

                        </div>
                        <div id="menus3" class="tab-pane">
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Si, usted podr&aacute; hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Cu&aacute;l el procedimiento de pagos anticipados o adelantos de cuotas?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Si usted opta por esta opci&oacute;n, una vez realizado el pago deber&aacute; comunicar inmediatamente por escrito a Prymera sobre la elecci&oacute;n que usted ha tomado y que podr&iacute;a ser:<br>
                                - Pago Total del Cr&eacute;dito: amortiza el total de la deuda con reducci&oacute;n de comisiones e intereses al d&iacute;a de pago.<br>
                            - Prepago con Reducci&oacute;n del Plazo: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, el monto de las cuotas se mantiene y reduce el plazo del cr&eacute;dito.<br>
                            - Prepago con Reducci&oacute;n de Cuota: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, reduciendo el monto de la cuota del mes y manteniendo el plazo del cr&eacute;dito.<br>
                            - Adelanto de Cuotas: realiza pagos que se aplican a cuotas inmediatamente posteriores a la exigible. No reduce intereses, comisiones ni gastos.
                                </span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; pasa si realizo el pago anticipado y no comunico sobre mi elecci&oacute;n?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerar&aacute; como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elecci&oacute;n o un tercero realice dicho pago por Usted, Prymera reducir&aacute; el n&uacute;mero de cuotas, dentro de los quince (15) d&iacute;as de realizado el pago. 
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
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Si he otorgado una garant&iacute;a a Prymera, <small style="font-family: arial;font-weight: bold;">&iquest; </small>qu&eacute; tr&aacute;mites tengo que realizar una vez cancele mi cr&eacute;dito?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Deber&aacute;s acercarte a cualquier de nuestras Agencias portando tu documento de identidad y presentar los siguientes documentos:<br>- Solicitud de liberaci&oacute;n de la garant&iacute;a (hipotecaria y/o mobiliaria).<br>
                                - Copia del documento de identidad del solicitante (titular de cr&eacute;dito y/o propietario).<br>
                                - Copia del Testimonio de constituci&oacute;n de garant&iacute;a.<br>
                                - Copia literal actualizada y/o certificado de gravamen actualizado (no mayor de 30 d&iacute;as de emitido)<br>
                                Este tr&aacute;mite no est&aacute; sujeto al pago de comisi&oacute;n.

                                </span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Cu&aacute;nto tiempo demora el tr&aacute;mite de levantamiento de garant&iacute;a?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Una vez recibida su solicitud de liberaci&oacute;n de garant&iacute;a, Prymera proceder&aacute; con la evaluaci&oacute;n de su solicitud y de ser procedente, le entregar&aacute; la minuta de levantamiento de garant&iacute;a respectiva. El plazo para realizar esta gesti&oacute;n es de hasta 30 d&iacute;as calendario desde que se recibe la solicitud hasta la entrega de la minuta de levantamiento solicitada.

                                </span>
                            </div>
                        </div>
                        <div id="menus4" class="tab-pane">

                            <div class="col-xs-12 font-bold">
                                <span>El producto "Auto de Prymera" esta afecto el seguro desgravamen y seguro vehicular</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Certificado de Seguro Vehicular; cliente puede contratar un seguro particular, debi&eacute;ndolo endosar a favor de Prymera.</br></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>
                                Seguro Desgravamen o Seguro de Vida endosado a favor de Prymera</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; es el seguro de desgravamen?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>Es un seguro de vida de car&aacute;cter obligatorio que adquiere cuando solicita su cr&eacute;dito y cubre fallecimiento por muerte natural o consecuencia de un accidente o invalidez total permanente por accidente. En caso de fallecimiento o invalidez por accidente, el seguro de desgravamen aplica s&oacute;lo si el siniestro es notificado antes de cumplirse los seis meses de su ocurrencia. El familiar del cliente deber&aacute; presentar los documentos requeridos en cualquiera de nuestra red de agencias.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>Es obligatorio contratar el(los) seguro(s) ofrecido(s) por Prymera para obtener un cr&eacute;dito?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>No, el cliente tiene derecho a elegir entre la contrataci&oacute;n del seguro ofrecido por Prymera o un seguro contratado directamente por el cliente, siempre que cumpla previamente con las siguientes condiciones:</br>
                                        a. Acreditar haber contratado por su cuenta un seguro que brinde cobertura similar o mayor al seguro ofrecido por Prymera y por los plazos iguales o mayores, para ello deber&aacute; adjuntar copia de la p&oacute;liza del seguro.</br>
                                        b. Endosar las p&oacute;lizas a favor de Prymera en un plazo no mayor al d&iacute;a h&aacute;bil de suscrito el  Contrato. En el endoso deber&aacute; constar la declaraci&oacute;n de la Compa&ntilde;&iacute;a de Seguros en el sentido que, Prymera es el &uacute;nico beneficiario de la indemnizaci&oacute;n hasta por el monto pendiente del pago total del cr&eacute;dito. Adjuntar copia de la factura y/o comprobante de pago de la prima respectiva debidamente cancelada. En caso el cliente no cumpliera con contratar las referidas p&oacute;lizas y/o sus respectivas renovaciones a su vencimiento y/o reajustar la suma asegurada cuando Prymera se lo requiera, o con ampliar los riesgos y efectuar el endoso correspondiente a favor Prymera, &eacute;ste queda facultado para hacerlo por cuenta y costo del cliente e incluir las primas del seguro en las cuotas del Pr&eacute;stamo, m&aacute;s los intereses compensatorios y moratorios que corresponda, de conformidad con lo expuesto en la Hoja Resumen. El no ejercicio de la facultad otorgada a Prymera antes se&ntilde;alada, no generar&aacute; para &eacute;l responsabilidad alguna.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>En caso siniestro del titular del cr&eacute;dito, <small style="font-family: arial;font-weight: bold;">&iquest; </small>Qu&eacute; deber&aacute; presentar el apoderado?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>- Copias certificadas de Partida y Certificado de Defunci&oacute;n.</br>
                                            - Atestado policial, protocolo de necropsia, an&aacute;lisis toxicol&oacute;gico y de alcoholemia en caso de muerte por accidente.</br>
                                            - Copia del Documento de Identidad del asegurado fallecido.</br>
                                            - Informe completo y detallado del m&eacute;dico tratante que sustente el estado del paciente e indique la fecha de inicio de la Invalidez, en caso de Invalidez total y permanente.</br>
                                            - El tiempo l&iacute;mite m&aacute;ximo para declarar el fallecimiento o la invalidez total y permanente es de 180 d&iacute;as posteriores a la ocurrencia</br>
                                            - Mayor informaci&oacute;n en caso la Compa&ntilde;&iacute;a de Seguro lo requiera.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom font-bold">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><small style="font-family: arial;font-weight: bold;">&iquest; </small>En cu&aacute;ntos d&iacute;as obtendr&eacute; respuesta de la aseguradora ante un siniestro?</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span>La aseguradora tiene un plazo m&aacute;ximo de 30 d&iacute;as h&aacute;biles para enviarte una respuesta.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg centrar_logo" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="terminosYcondiciones" style="color:#1C4485">Uso de datos personales</h3>
          </div>
          <div class="modal-body resumen">
            <p class="tipo_letra">
               &quot;El Cliente autoriza y otorga a CRAC PRYMERA SA. (PRYMERA) por tiempo indefinido, su consentimiento libre, previo, expreso, inequ&iacute;voco e informado para que (por s&iacute; mismo o a trav&eacute;s de terceros) recopile, registre, organice, almacene, conserve, elabore, modifique, bloquee, suprima, extraiga, consulte, utilice, transfiera, exporte, importe o procese (trate) de cualquier otra forma sus datos personales, conforme a Ley, pudiendo elaborar Bases de Datos (Bancos de Datos) con su informaci&oacute;n tanto proporcionada, como recopilada a trav&eacute;s de terceros o generada por PRYMERA como consecuencia del cumplimiento de las relaciones contractuales y/o comerciales que mantenga con el cliente, con la finalidad de:<br><br> 
            </p>

            <p class="tipo_letra">
            (i) Otorgarle el producto y/o servicio solicitado; enviarle informaci&oacute;n ofertas comerciales y publicidad relacionada al producto y/o servicio; y/o<br> 
            </p>

            <p class="tipo_letra">
               (ii) Ofrecerle otros productos y/o servicios y/o ofertas, y/o publicidad e informaci&oacute;n en general, entre otros, de PRYMERA y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo econ&oacute;mico al que pertenece PRYMERA, domiciliada o no en el pa&iacute;s, (directamente y/o a trav&eacute;s de terceras vinculadas o no vinculadas); y/o<br> 
            </p>

            <p class="tipo_letra">
               (iii) Evaluar su calidad crediticia y capacidad de pago, as&iacute; como de ser el caso, efectuar las gestiones de recuperaci&oacute;n o cobranza; y/o<br> 
            </p>

            <p class="tipo_letra">
              (iv) Evaluar cualquier solicitud que efect&uacute;e en el presente y/o futuro y/o;<br>  
            </p>

            <p class="tipo_letra">
               (v) Almacenar y tratar sus datos personales, con fines estad&iacute;sticos y/o hist&oacute;ricos para PRYMERA o terceras vinculadas o no vinculadas y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo econ&oacute;mico que pertenece PRYMERA.<br> 
            </p>

            <p class="tipo_letra">
              Esta autorizaci&oacute;n es por tiempo indefinido y estar&aacute; vigente inclusive despu&eacute;s del vencimiento de las operaciones, y/o de las relaciones contractuales y/o comerciales que el Cliente mantenga o pudiera mantener con PRYMERA. El Cliente, declara haber sido informado de que en caso no otorgue este consentimiento, su informaci&oacute;n solo ser&aacute; utilizada (tratada) para la ejecuci&oacute;n (desarrollo) y cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA.<br>  
            </p>

            <p class="tipo_letra">
              PRYMERA se reserva el derecho de poder compartir y/o usar y/o almacenar y/o transferir la informaci&oacute;n a terceras personas vinculadas o no a PRYMERA, sean estos socios comerciales o no de PRYMERA, nacionales o extranjeros, p&uacute;blicos o privados, con el objeto de realizar actividades relacionadas al cumplimiento de las finalidades indicadas anteriormente.<br>
            </p>
             
            <p class="tipo_letra">
               El Cliente declara que ha sido informado(a) que podr&aacute; revocar en cualquier momento su consentimiento, comunicando su decisi&oacute;n por escrito en cualquiera de las Agencias de PRYMERA, la cual no afectar&aacute; el uso de sus datos ni el contenido de las Bases de Datos (Banco de Datos) para la ejecuci&oacute;n y/o cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA, adicional a ello, PRYMERA podr&aacute; informarle a trav&eacute;s de su p&aacute;gina web u otros medios de comunicaci&oacute;n, sobre otros canales para que el Cliente pueda hacer efectiva su revocatoria.<br> 
            </p>

            <p class="tipo_letra">
               Asimismo, el Cliente declara que ha sido informado que podr&aacute; ejercer sus derechos de informaci&oacute;n, acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n de acuerdo a lo dispuesto por la Ley de Protecci&oacute;n de Datos Personales vigente y su Reglamento. PRYMERA podr&aacute; informarle a trav&eacute;s de su p&aacute;gina web u otros medios de comunicaci&oacute;n, sobre otros canales para que el Cliente pueda hacer efectivo el ejercicio de sus derechos.<br><br> 
            </p>

            <p class="tipo_letra">
               PRYMERA es titular y responsable de las Bases de Datos (Bancos de Datos) originadas por el tratamiento de los datos personales que recopile y/o trate y declara que ha adoptado los niveles de seguridad apropiados para el resguardo de la informaci&oacute;n, de acuerdo a Ley. Asimismo, declara que respeta los principios de legalidad, consentimiento, finalidad, proporcionalidad, calidad, disposici&oacute;n de recurso, nivel de protecci&oacute;n adecuado, conforme a las disposiciones de la Ley de Protecci&oacute;n de Datos vigente en Per&uacute;.&quot;<br><br> 
            </p>    
          </div>
          <div class="modal-footer">
          </div>
        </div>
  </div>
</div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="https://openam.github.io/bootstrap-responsive-tabs/js/responsive-tabs.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" async src="<?php echo RUTA_JS?>jslogin.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
    (function($) {
          fakewaffle.responsiveTabs(['xs','sm']);
      })(jQuery);
    </script>
  </body>
</html>