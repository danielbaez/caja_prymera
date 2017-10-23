<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="refresh"          content="36000">
        <meta name="viewport"               content="width=device-width, initial-scale=1">
        <meta name="keywords"               content="Moviliario,modell,escritorio,sillas,muebles,carpetas">
        <meta name="robots"                 content="index,follow">
        <meta name="date"                   content="April 05, 2017">
        <meta name="author"                 content="webking.pe">
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#FFFFFF">
        <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
          <title>Cr&eacute;dito Mi Auto</title>
        <?php } else { ?>
            <title>Cr&eacute;dito Mi Cash</title>
        <?php } ?>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">

        <link type="text/css"       rel="stylesheet"    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-micash.css?v=<?php echo time();?>">

        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos.css?v=<?php echo time();?>">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="contenido-header">
                        <h1 class="title-header">&iexcl;Te financiamos hasta el 100% de tu auto!* </h1>
                    </div>
                    <div class="imagen-header">
                        <img alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
                    </div>
                </div>
            </div>
        </nav>
        <div class="container fondo">
            <div class="row row-top">
                <div class="col-md-6 text-left">
                    <div class="panel panel-primary formulario-1" style="border:none;background: rgba(255,255,255,0.6);max-width: 461px;">
                        <div class="panel-heading" style="background-color: #fff;border: 0px;color: #00519D;text-align: center;">
                            <h1 class="panel-title" style="font-size:40px;margin-top: 19px;">Consulta aqu&iacute;</h1>
                        </div>
                        <div class="panel-body" style="background-color: #fff;">
                            <form class="text-center">
                                <p style="margin-top: -15px;font-size:15px;color: #a3a4a6;">Cr&eacute;dito Mi Auto de Prymera</p>
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
                                            <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -2px;" data-toggle="modal" data-target="#myModal">Uso de datos personales</button>
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
                                <p style="font-size: 12px;color: #9fa9a3;margin-top:10px;">*El cr&eacute;dito vehicular "Auto de Prymera" est&aacute; sujeto a evaluaci&oacute;n</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <label class="" style="color: #fff">M&aacute;s caracter&iacute;sticas</label>
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="moreText()">
                            <i class="mdi mdi-play_circle_filled" style="color: #fff"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 button-login text-center">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect hidden" style="font-weight: bold;" onclick="goToLogin()">Log in<i style="color: #4e82bb" class="mdi mdi-person"></i></button>
                    <img class="imagen-fondo" alt="" src="<?php echo RUTA_IMG?>fondos/Credito-Vehicular.png"> 
                </div>
                
                <div class="col-xs-12 col-md-12 hidden" id="ocultarCaract" style="background-color: #fff;display:block;">
                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#homes">Caracter&iacute;sticas</a></li>
                        <li><a data-toggle="tab" href="#menus1">Requisitos</a></li>
                        <li><a data-toggle="tab" href="#menus2">Documentos</a></li>
                        <li><a data-toggle="tab" href="#menus3">Preguntas frecuentes</a></li>
                        <li><a data-toggle="tab" href="#menus3">Seguros</a></li>
                    </ul>
                    
                    <div class="tab-content" style="margin-top: 15px">
                        <div id="homes" class="tab-pane fade in active">                            
                            
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>PORCENTAJE INICIAL:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>M&iacute;nimo 10% y M&aacute;ximo 50% del valor del veh&iacute;culo.</p>
                            </div>
                            
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>MONTO A FINANCIAR:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>M&iacute;nimo 10,000 Soles y M&aacute;ximo 150,000 Soles.</p>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>PLAZOS:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>M&iacute;nimo 12 meses y M&aacute;ximo 60 meses.</p>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>TEA:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>M&iacute;nimo 12% - M&aacute;ximo 20%.</p>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>PERIODO DE GRACIA:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>Hasta 60 d&iacute;as.</p>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>PERICIDAD DE PAGO:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>Mensual</p>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>DESTINO DE CR&Eacute;DITO:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>Compra de auto nuevo.</p>
                            </div>

                            <div class="col-xs-6 col-sm-3 text-left">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span><strong>MODALIDAD:</strong></span>
                            </div>
                            <div class="col-xs-6 col-sm-9 text-left">
                                <p>Convencional - Compra inteligente.</p>
                            </div>                           
                        </div>

                        <div id="menus1" class="tab-pane fade">
                            <div class="col-xs-12">
                                <span><strong>Requisitos m&iacute;nimos que debe tener un cliente:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Personas dependientes (m&iacute;nimo 1 a&ntilde;o de antiguedad laboral).</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Ingresos m&iacute;nimo: 2,000 soles.</span>
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
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Cliente nuevo y/o recurrente de Prymera; si es cliente recurrente y tiene un cr�dito vigente, se considera como un cr�dito paralelo.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben registrar cr&eacute;ditos vencidos, en cobranza judicial y/o castigada en los &uacute;ltimos 24 meses.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>El n&uacute;mero m&aacute;ximo de entidades de endeudamiento es de 4 entidades, incluyendo Caja Prymera.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>No deben encontrarse registrados en la base de alertas del sistema Microbank.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span><strong>Sobre la Tasaci&oacute;n:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>Aplica para veh�culos nuevos (la tasaci�n se actualiza cada a�o, luego del primer a�o). Costo es asumido por el cliente.</span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <span><strong>Sobre la Garant�a Vehicular:</strong></span>
                            </div>
                            <div class="col-xs-12 espacio-top-bottom">
                                <i class="fa fa-chevron-right flecha-caracteristicas" aria-hidden="true"></i> <span>El veh�culo a adquirir debe constituirse como garant�a a favor de Prymera
                                        El Costo del servicio de toma de firmas y/o recojo de documentos es asumido por el cliente, lo cual incluye los gastos notariales y registrales, seg�n valor del vehiculo
                                        Documentaci�n:
                                        Contrato de Garant�a firmado por representante legal de Prymera y cliente.
                                        Carta de Caracter�sticas del Veh�culo proporcionada por el cliente</span>
                            </div>
                        </div>
                        <div id="menus2" class="tab-pane fade">
                            <h3><strong>El cliente debe proporcionar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificaci�n: copia de DNI vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de �ltimo recibo de servicios (luz / Agua) del titular (m�ximo antig�edad de 2 meses)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 3 �ltimas boletas de pago, si el cliente cuenta con ingresos variables y 2 �ltimas boletas, si el cliente cuenta con ingresos fijos (s�lo en caso solicite un monto mayor al pre-aprobado).</p>
                                </div>
                            </div>
                            <h3><strong>El expediente debe considerar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Solicitud del Cr�dito Vehicular firmada por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resumen del Cr�dito </p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resoluci�n del Cr�dito </p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Orden de Desembolso firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Contrato del Cr�dito firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Contrato de Garant�a firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Hoja Resumen firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Pagar�  firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>P�liza de Seguro (en caso el cliente endose seguro a favor de Prymera)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificaci�n: copia de DNI vigente o Ficha RENIEC o Carn� de Extranjer�a vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de �ltimo recibo de servicios (luz / Agua) del titular (m�ximo antig�edad de 2 meses)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Impresi�n de las centrales de riesgo de la SBS (RCC) y de las centrales privadas de acuerdo a normativa vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 3 �ltimas boletas de pago, si el cliente cuenta con ingresos variables y 2 �ltimas boletas, si el cliente cuenta con ingresos fijos.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Reporte ESSSALUD</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Cotizaci�n del veh�culo a adquirirse con una antig�edad no mayor de 15 d�as de la fecha de evaluaci�n.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Constancia del abono de la cuota inicial.</p>
                                </div>
                            </div>
                        </div>
                        <div id="menus3" class="tab-pane fade">
                            <h3>El producto "Auto de Prymera" esta afecto el seguro desgravamen y seguro vehicular</br></br>
                                -Certificado de Seguro Vehicular; cliente puede contratar un seguro particular, debi�ndolo endosar a favor de Prymera.</br>
                                -Seguro Desgravamen o Seguro de Vida endosado a favor de Prymera</h3>
                            <h3>�Qu� es el seguro de desgravamen?</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Es un seguro de vida de car�cter obligatorio que adquiere cuando solicita su cr�dito y cubre fallecimiento por muerte natural o consecuencia de un accidente o invalidez total permanente por accidente. En caso de fallecimiento o invalidez por accidente, el seguro de desgravamen aplica s�lo si el siniestro es notificado antes de cumplirse los seis meses de su ocurrencia. El familiar del cliente deber� presentar los documentos requeridos en cualquiera de nuestra red de agencias.</p>
                                </div>

                                <h3>�Es obligatorio contratar el(los) seguro(s) ofrecido(s) por Prymera para obtener un cr�dito?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>No, el cliente tiene derecho a elegir entre la contrataci�n del seguro ofrecido por Prymera o un seguro contratado directamente por el cliente, siempre que cumpla previamente con las siguientes condiciones:</br>
                                        a. Acreditar haber contratado por su cuenta un seguro que brinde cobertura similar o mayor al seguro ofrecido por Prymera y por los plazos iguales o mayores, para ello deber� adjuntar copia de la p�liza del seguro.</br>
                                        b. Endosar las p�lizas a favor de Prymera en un plazo no mayor al d�a h�bil de suscrito el  Contrato. En el endoso deber� constar la declaraci�n de la Compa��a de Seguros en el sentido que, Prymera es el �nico beneficiario de la indemnizaci�n hasta por el monto pendiente del pago total del cr�dito. Adjuntar copia de la factura y/o comprobante de pago de la prima respectiva debidamente cancelada. En caso el cliente no cumpliera con contratar las referidas p�lizas y/o sus respectivas renovaciones a su vencimiento y/o reajustar la suma asegurada cuando Prymera se lo requiera, o con ampliar los riesgos y efectuar el endoso correspondiente a favor Prymera, �ste queda facultado para hacerlo por cuenta y costo del cliente e incluir las primas del seguro en las cuotas del Pr�stamo, m�s los intereses compensatorios y moratorios que corresponda, de conformidad con lo expuesto en la Hoja Resumen. El no ejercicio de la facultad otorgada a Prymera antes se�alada, no generar� para �l responsabilidad alguna.</p>
                                    </div>
                                </div>
                                <h3>En caso siniestro del titular del cr�dito, �Qu� deber� presentar el apoderado?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>- Copias certificadas de Partida y Certificado de Defunci�n.</br>
                                            - Atestado policial, protocolo de necropsia, an�lisis toxicol�gico y de alcoholemia en caso de muerte por accidente.</br>
                                            - Copia del Documento de Identidad del asegurado fallecido.</br>
                                            - Informe completo y detallado del m�dico tratante que sustente el estado del paciente e indique la fecha de inicio de la Invalidez, en caso de Invalidez total y permanente.</br>
                                            - El tiempo l�mite m�ximo para declarar el fallecimiento o la invalidez total y permanente es de 180 d�as posteriores a la ocurrencia</br>
                                            - Mayor informaci�n en caso la Compa��a de Seguro lo requiera.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p></p>
                                    </div>
                                </div>
                                 <h3>En caso siniestro del titular del cr�dito, �Qu� deber� presentar el apoderado?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>La aseguradora tiene un plazo m�ximo de 30 d�as h�biles para enviarte una respuesta.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Adelanto de Cuotas: realiza pagos que se aplican a cuotas inmediatamente posteriores a la exigible. No reduce intereses, comisiones ni gastos.</p>
                                    </div>
                                </div>
                                <h3>�Qu� pasa si realizo el pago anticipado y no comunico sobre mi elecci�n?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerar� como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elecci�n o un tercero realice dicho pago por Usted, Prymera reducir� el n�mero de cuotas, dentro de los quince (15) d�as de realizado el pago. 
                                        En cualquiera de los casos y a su solicitud, Prymera le har� entrega del cronograma de pagos modificado dentro de los 7 d�as calendarios posteriores a la presentaci�n de su solicitud.</p>
                                    </div>
                                </div>
                                <h3>Qu� sucede si me atraso en pagar las cuotas?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Si el Cliente incumpliera con el pago oportuno de una o m�s de las cuotas previstas en el cronograma de pagos, se devengar�n autom�ticamente sobre las cuotas vencidas, en forma adicional a los intereses compensatorios, los intereses moratorios a la tasa que figura en la Hoja Resumen Informativa. La constituci�n en mora ser� autom�tica. Asimismo, se proceder� a realizar el reporte correspondiente a las Centrales de Riesgo.</p>
                                    </div>
                                </div>
                                <h3>Si he otorgado una garant�a a Prymera, �qu� tr�mites tengo que realizar una vez cancele mi cr�dito?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Deber�s acercarte a cualquier de nuestras Agencias portando tu documento de identidad y presentar los siguientes documentos:
                                        - Solicitud de liberaci�n de la garant�a (hipotecaria y/o mobiliaria).
                                        - Copia del documento de identidad del solicitante (titular de cr�dito y/o propietario).
                                        - Copia del Testimonio de constituci�n de garant�a.
                                        - Copia literal actualizada y/o certificado de gravamen actualizado (no mayor de 30 d�as de emitido)
                                        Este tr�mite no est� sujeto al pago de comisi�n.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="terminosYcondiciones" style="color:#1C4485">Uso de datos personales</h3>
          </div>
          <div class="modal-body">
            <p class="tipo_letra">
               �El cliente autoriza y otorga a CRAC PRYMERA SA. (PRYMERA) por tiempo indefinido, su consentimiento libre, previo, expreso, inequ�voco e informado para que (por s� mismo o a trav�s de terceros) recopile, registre, organice, almacene, conserve, elabore, modifique, bloquee, suprima, extraiga, consulte, utilice, transfiera, exporte, importe o procese (trate) de cualquier otra forma sus datos personales, conforme a Ley, pudiendo elaborar Bases de Datos (Bancos de Datos) con su informaci�n tanto proporcionada, como recopilada a trav�s de terceros o generada por PRYMERA como consecuencia del cumplimiento de las relaciones contractuales y/o comerciales que mantenga con el cliente, con la finalidad de:<br><br> 
            </p>

            <p class="tipo_letra">
            (i) Otorgarle el producto y/o servicio solicitado; enviarle informaci�n ofertas comerciales y publicidad relacionada al producto y/o servicio; y/o<br> 
            </p>

            <p class="tipo_letra">
               (ii) Ofrecerle otros productos y/o servicios y/o ofertas, y/o publicidad e informaci�n en general, entre otros, de PRYMERA y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo econ�mico al que pertenece PRYMERA, domiciliada o no en el pa�s, (directamente y/o a trav�s de terceras vinculadas o no vinculadas); y/o<br> 
            </p>

            <p class="tipo_letra">
               (iii) Evaluar su calidad crediticia y capacidad de pago, as� como de ser el caso, efectuar las gestiones de recuperaci�n o cobranza; y/o<br> 
            </p>

            <p class="tipo_letra">
              (iv) Evaluar cualquier solicitud que efect�e en el presente y/o futuro y/o;<br>  
            </p>

            <p class="tipo_letra">
               (v) Almacenar y tratar sus datos personales, con fines estad�sticos y/o hist�ricos para PRYMERA o terceras vinculadas o no vinculadas y/o cualquier otra empresa que pertenezca o que pueda pertenecer en el futuro al Grupo econ�mico que pertenece PRYMERA.<br> 
            </p>

            <p class="tipo_letra">
              Esta autorizaci�n es por tiempo indefinido y estar� vigente inclusive despu�s del vencimiento de las operaciones, y/o de las relaciones contractuales y/o comerciales que el Cliente mantenga o pudiera mantener con PRYMERA. El Cliente, declara haber sido informado de que en caso no otorgue este consentimiento, su informaci�n solo ser� utilizada (tratada) para la ejecuci�n (desarrollo) y cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA.<br>  
            </p>

            <p class="tipo_letra">
              PRYMERA se reserva el derecho de poder compartir y/o usar y/o almacenar y/o transferir la informaci�n a terceras personas vinculadas o no a PRYMERA, sean estos socios comerciales o no de PRYMERA, nacionales o extranjeros, p�blicos o privados, con el objeto de realizar actividades relacionadas al cumplimiento de las finalidades indicadas anteriormente.<br>
            </p>
             
            <p class="tipo_letra">
               El Cliente declara que ha sido informado(a) que podr� revocar en cualquier momento su consentimiento, comunicando su decisi�n por escrito en cualquiera de las Agencias de PRYMERA, la cual no afectar� el uso de sus datos ni el contenido de las Bases de Datos (Banco de Datos) para la ejecuci�n y/o cumplimiento de las relaciones contractuales y/o comerciales que mantenga con PRYMERA, adicional a ello, PRYMERA podr� informarle a trav�s de su p�gina web u otros medios de comunicaci�n, sobre otros canales para que el Cliente pueda hacer efectiva su revocatoria.<br> 
            </p>

            <p class="tipo_letra">
               Asimismo, el Cliente declara que ha sido informado que podr� ejercer sus derechos de informaci�n, acceso, rectificaci�n, cancelaci�n y oposici�n de acuerdo a lo dispuesto por la Ley de Protecci�n de Datos Personales vigente y su Reglamento. PRYMERA podr� informarle a trav�s de su p�gina web u otros medios de comunicaci�n, sobre otros canales para que el Cliente pueda hacer efectivo el ejercicio de sus derechos.<br><br> 
            </p>

            <p class="tipo_letra">
               PRYMERA es titular y responsable de las Bases de Datos (Bancos de Datos) originadas por el tratamiento de los datos personales que recopile y/o trate y declara que ha adoptado los niveles de seguridad apropiados para el resguardo de la informaci�n, de acuerdo a Ley. Asimismo, declara que respeta los principios de legalidad, consentimiento, finalidad, proporcionalidad, calidad, disposici�n de recurso, nivel de protecci�n adecuado, conforme a las disposiciones de la Ley de Protecci�n de Datos vigente en Per�.�<br><br> 
            </p>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
          </div>
        </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" async src="<?php echo RUTA_JS?>jslogin.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script type="text/javascript">
//     var onloadCallback = function() {
//         grecaptcha.render('html_element', {
//           'sitekey' : '6Lf-jgQTAAAAAGgYwYOOjGAQRFQKqTx_6FCcUYM_'
//         });
//       };
    </script>
  </body>
</html>