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
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-micash.css?v=<?php echo time();?>">
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
                                            <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -2px;" data-toggle="modal" data-target="#myModal">t&eacute;rminos y condiciones</button>
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
                <div class="row-fluid" style="position: relative;width: 107%;right: 0;top:-49px;">
                <div class="col-xs-12 col-md-12 hidden" id="ocultarCaract" style="background-color: #fff;display:block;">
                    <div class="container-fluid contenedor" style="">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#homes">Caracter&iacute;sticas</a></li>
                            <li><a data-toggle="tab" href="#menus1">Requisitos</a></li>
                            <li><a data-toggle="tab" href="#menus2">Documentos</a></li>
                            <li><a data-toggle="tab" href="#menus3">Preguntas frecuentes</a></li>
                            <li><a data-toggle="tab" href="#menus3">Seguros</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="homes" class="tab-pane fade in active">
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>PORCENTAJE INICIAL: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>M&iacute;nimo 10% y M&aacute;ximo 50% del valor del veh&iacute;culo.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>MONTO A FINANCIAR: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>M&iacute;nimo 10,000 Soles y M&aacute;ximo 150,000 Soles.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>PLAZOS: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>M&iacute;nimo 12 meses y M&aacute;ximo 60 meses.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>TEA: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>M&iacute;nimo 12% - M&aacute;ximo 20%.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>PERIODO DE GRACIA: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>Hasta 60 d&iacute;as.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>PERICIDAD DE PAGO: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>Mensual.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>DESTINO DE CR&Eacute;DITO: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>Compra de auto nuevo.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <div class="col-xs-2">
                                            <i class="mdi mdi-keyboard_arrow_right"></i>
                                        </div>
                                        <div class="col-xs-10">
                                            <p><strong>MODALIDAD: </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <p>Convencional - Compra inteligente.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menus1" class="tab-pane fade">
                            <h3>Requisitos m&iacute;nimos que debe tener un cliente:</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Personas dependientes (m&iacute;nimo 1 a&ntilde;o de antiguedad laboral).</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Ingresos m&iacute;nimo: 2,000 soles.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Edad: M&iacute;nimo 23 a&ntilde;os y M&aacute;ximo 70 a&ntilde;os.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Calificaci&oacute;n Normal (RCC) en los &uacute;ltimos 6 meses o score de aprobaci&oacute;n seg&uacute;n la evaluaci&oacute;n del &aacute;rea de Riesgos.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Persona con nacionalidad peruana.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Cliente nuevo y/o recurrente de Prymera; si es cliente recurrente y tiene un crédito vigente, se considera como un crédito paralelo.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>No deben registrar cr&eacute;ditos vencidos, en cobranza judicial y/o castigada en los &uacute;ltimos 24 meses.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>El n&uacute;mero m&aacute;ximo de entidades de endeudamiento es de 4 entidades, incluyendo Caja Prymera.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>No deben encontrarse registrados en la base de alertas del sistema Microbank.</p>
                                </div>
                            </div>
                            <h3><strong>Sobre la Tasaci&oacute;n:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Aplica para vehículos nuevos (la tasación se actualiza cada año, luego del primer año). Costo es asumido por el cliente.</p>
                                </div>
                            </div>
                            <h3><strong>Sobre la Garantía Vehicular:</strong></h3>
                               <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>El vehículo a adquirir debe constituirse como garantía a favor de Prymera
                                        El Costo del servicio de toma de firmas y/o recojo de documentos es asumido por el cliente, lo cual incluye los gastos notariales y registrales, según valor del vehiculo
                                        Documentación:
                                        Contrato de Garantía firmado por representante legal de Prymera y cliente.
                                        Carta de Características del Vehículo proporcionada por el cliente</p>
                                </div>
                            </div>                     </div>
                        <div id="menus2" class="tab-pane fade">
                            <h3><strong>El cliente debe proporcionar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificación: copia de DNI vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de último recibo de servicios (luz / Agua) del titular (máximo antigüedad de 2 meses)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 3 últimas boletas de pago, si el cliente cuenta con ingresos variables y 2 últimas boletas, si el cliente cuenta con ingresos fijos (sólo en caso solicite un monto mayor al pre-aprobado).</p>
                                </div>
                            </div>
                            <h3><strong>El expediente debe considerar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Solicitud del Crédito Vehicular firmada por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resumen del Crédito </p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resolución del Crédito </p>
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
                                    <p>Contrato del Crédito firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Contrato de Garantía firmado por el cliente</p>
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
                                    <p>Pagaré  firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Póliza de Seguro (en caso el cliente endose seguro a favor de Prymera)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificación: copia de DNI vigente o Ficha RENIEC o Carné de Extranjería vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de último recibo de servicios (luz / Agua) del titular (máximo antigüedad de 2 meses)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Impresión de las centrales de riesgo de la SBS (RCC) y de las centrales privadas de acuerdo a normativa vigente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 3 últimas boletas de pago, si el cliente cuenta con ingresos variables y 2 últimas boletas, si el cliente cuenta con ingresos fijos.</p>
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
                                    <p>Cotización del vehículo a adquirirse con una antigüedad no mayor de 15 días de la fecha de evaluación.</p>
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
                            <h3>¿Puedo realizar pagos anticipados o adelantar cuotas de mi crédito?</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Si, usted podrá hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</p>
                                </div>

                                <h3>¿Cuál el procedimiento de pagos anticipados o adelantos de cuotas?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Si usted opta por esta opción, una vez realizado el pago deberá comunicar inmediatamente por escrito a Prymera sobre la elección que usted ha tomado y que podría ser:</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Pago Total del Crédito: amortiza el total de la deuda con reducción de comisiones e intereses al día de pago.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Prepago con Reducción del Plazo: amortiza capital, reduce intereses, comisiones y gastos al día de pago, el monto de las cuotas se mantiene y reduce el plazo del </p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Prepago con Reducción de Cuota: amortiza capital, reduce intereses, comisiones y gastos al día de pago, reduciendo el monto de la cuota del mes y manteniendo el plazo del crédito.</p>
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
                                <h3>¿Qué pasa si realizo el pago anticipado y no comunico sobre mi elección?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerará como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elección o un tercero realice dicho pago por Usted, Prymera reducirá el número de cuotas, dentro de los quince (15) días de realizado el pago. 
                                        En cualquiera de los casos y a su solicitud, Prymera le hará entrega del cronograma de pagos modificado dentro de los 7 días calendarios posteriores a la presentación de su solicitud.</p>
                                    </div>
                                </div>
                                <h3>Qué sucede si me atraso en pagar las cuotas?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Si el Cliente incumpliera con el pago oportuno de una o más de las cuotas previstas en el cronograma de pagos, se devengarán automáticamente sobre las cuotas vencidas, en forma adicional a los intereses compensatorios, los intereses moratorios a la tasa que figura en la Hoja Resumen Informativa. La constitución en mora será automática. Asimismo, se procederá a realizar el reporte correspondiente a las Centrales de Riesgo.</p>
                                    </div>
                                </div>
                                <h3>Si he otorgado una garantía a Prymera, ¿qué trámites tengo que realizar una vez cancele mi crédito?</h3>
                                <div class="col-xs-12">
                                    <div class="col-xs-2">
                                        <i class="mdi mdi-keyboard_arrow_right"></i>
                                    </div>
                                    <div class="col-xs-10">
                                        <p>Deberás acercarte a cualquier de nuestras Agencias portando tu documento de identidad y presentar los siguientes documentos:
                                        - Solicitud de liberación de la garantía (hipotecaria y/o mobiliaria).
                                        - Copia del documento de identidad del solicitante (titular de crédito y/o propietario).
                                        - Copia del Testimonio de constitución de garantía.
                                        - Copia literal actualizada y/o certificado de gravamen actualizado (no mayor de 30 días de emitido)
                                        Este trámite no está sujeto al pago de comisión.</p>
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
            <h3 class="modal-title" id="terminosYcondiciones" style="color:#1C4485">T&eacute;rminos y Condiciones</h3>
          </div>
          <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut purus odio. Donec nec vehicula est. Duis aliquet lorem sed fermentum elementum. Cras luctus nec ante nec sodales. Morbi feugiat eget erat consectetur egestas. Donec tempus, est vitae fermentum cursus, tortor ligula maximus enim, vel mattis nulla ante vel augue. Aliquam tincidunt suscipit nisi nec mattis. Pellentesque ac semper velit.

            Etiam et ligula egestas, accumsan purus ut, pellentesque augue. Aenean vulputate accumsan tortor, quis egestas quam tempor eu. Maecenas volutpat turpis a nisi placerat, id volutpat velit fringilla. Sed scelerisque quis ante sed mattis. Cras lacus libero, varius ut consequat ut, mollis sed odio. Donec quis dignissim dui. Maecenas ac rutrum nunc. Phasellus elementum nunc quis mi laoreet mattis.

            Proin efficitur, turpis eu malesuada aliquam, odio lacus tempor odio, non vehicula turpis enim sed justo. Vestibulum maximus euismod lectus, quis pulvinar dolor euismod eget. Praesent condimentum commodo dolor, ut accumsan risus consectetur et. Curabitur elementum, odio pharetra pulvinar hendrerit, metus diam ullamcorper purus, a scelerisque risus leo nec urna. Integer lobortis purus ac sodales suscipit. Ut lacus urna, consectetur in mi eget, commodo sagittis dui. Donec ac aliquet leo, tempor cursus ligula. Curabitur ut enim purus. Nunc at lacinia ligula. Quisque dictum tempor lacus tempus sodales. Proin quis risus ipsum. Integer a nisi eget quam pulvinar cursus. Nulla sollicitudin posuere tortor, sed placerat diam pharetra non. Curabitur volutpat commodo tempor.

            Phasellus sodales accumsan finibus. Duis nisi urna, euismod vel quam vitae, faucibus gravida elit. Aliquam id ornare nibh. Nullam in dignissim quam. Mauris sed venenatis arcu. Fusce quis arcu massa. Proin finibus metus at nunc accumsan sodales. Duis eu eros urna. Praesent pellentesque lobortis dolor sit amet placerat. Vivamus euismod nisi vel condimentum auctor.
            
            Quisque consequat ac purus eu rhoncus. Phasellus ullamcorper vel lectus non imperdiet. Cras ut purus blandit, pulvinar est ut, aliquam tellus. Donec in augue sit amet risus vehicula convallis. Fusce iaculis magna sed est tincidunt, gravida varius quam lacinia. Quisque congue sagittis est, et dictum nibh. Etiam pretium dapibus diam vel lacinia. Proin pretium libero in nunc fermentum, a porta neque sollicitudin. Morbi felis felis, laoreet vitae leo nec, gravida ultricies urna.
            
            Donec id bibendum libero. Vestibulum in porta lacus. Sed sit amet fringilla orci. In malesuada tellus libero. Etiam sagittis justo et imperdiet eleifend. Fusce nec eros purus. Vestibulum varius interdum dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc aliquet nunc sit amet ligula egestas sodales.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
          </div>
        </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jslogin.js?v=<?php echo time();?>"></script>
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