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
        <title>Caja Prymera</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
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
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="contenido-header">
                        <h1 class="title-header">&iexcl;Te prestamos hasta S/ 15,000 f&aacute;cil y r&aacute;pido!* </h1>
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
                                <p style="font-size: 12px;color: #9fa9a3;margin-top:10px;">*El cr&eacute;dito Consumo "Mi Cash" est&aacute; sujeto a evaluaci&oacute;n</p>
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
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" style="font-weight: bold;" onclick="goToLogin()">Log in<i style="color: #4e82bb" class="mdi mdi-person"></i></button>
                    <img class="imagen-fondo" alt="" src="<?php echo RUTA_IMG?>fondos/Credito-Consumo.png"> 
                </div>
                <div class="row-fluid" style="position: relative;width: 107%;right: 0;top:-49px;">
                <div class="col-xs-12 col-md-12 hidden" id="ocultarCaract" style="background-color: #fff;display:block;">
                    <div class="container-fluid contenedor" style="">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#homes">Caracter&iacute;sticas</a></li>
                            <li><a data-toggle="tab" href="#menus1">Requisitos</a></li>
                            <li><a data-toggle="tab" href="#menus2">Documentos</a></li>
                            <li><a data-toggle="tab" href="#menus3">Preguntas frecuentes</a></li>
                            <li><a data-toggle="tab" href="#menus4">Documentos</a></li>
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
                                        <p>M&iacute;nimo 12 meses y M&aacute;ximo 60 meses.</p>
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
                                    <p>Ingresos m&iacute;nimo: 1,000 soles.</p>
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
                                    <p>Puede ser cliente nuevo y cliente recurrente de Prymera; en este &uacute;ltimo caso, cuando se tenga cr&eacute;dito vigente, se tramitar&aacute; ampliaci&oacute;n de cr&eacute;dito, siempre que cuente con 03 cuotas pagadas como m&iacute;nimo.</p>
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
                                    <p>En caso de tener conyugue se registra sus datos (nombres, apellidos y DNI)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>No deben ser clientes vinculados, familiares del personal de la Caja (1&deg; y 2&deg; grado) y no deben pertenecer a la base de alertas.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>No deben ser clientes que se han registrado en la base de datos INDECOPI (No Molestar); aplica para el personal de Telemarketing.</p>
                                </div>
                            </div>
                        </div>
                        <div id="menus2" class="tab-pane fade">
                            <h3><strong>El cliente debe proporcionar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificaci&oacute;n: copia de DNI vigente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de &uacute;ltimo recibo de servicios del titular (m&aacute;ximo antig&uring;edad de 2 meses)</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 3 &uacute;ltimas boletas de pago, si el cliente cuenta con ingresos variables y 1 &uacute;ltima boleta, si el cliente cuenta con ingresos fijos (s&oacute;lo en caso solicite un monto mayor al pre-aprobado)</p>
                                </div>
                            </div><br>
                            <h3><strong>El expediente debe considerar los siguientes documentos:</strong></h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resumen del Cr&eacute;dito firmada por el cliente.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Resoluci&oacute;n del Cr&eacute;dito firmado por el cliente</p>
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
                                    <p>Contrato del Cr&eacute;dito firmado por el cliente</p>
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
                                    <p>Pagar&eacute;  firmado por el cliente</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Documentos de identificaci&oacute;n: copia de DNI o Ficha RENIEC</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Copia de &uacute;ltimo recibo de servicios (m&aacute;ximo antig&uring;edad de 2 meses).</p>
                                </div>
                            </div><br>
                            <h3>Adicional, para cr&eacute;ditos mayores al monto pre-aprobado se debe adjuntar:</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Sustento de ingresos: 1 &uacute;ltima boletas de pago; si el colaborador cuenta con ingresos variables se solicitara las 3 &uacute;ltimas boletas de pago y se utilizar&aacute; del ingreso promedio de estas 3 boletas para la evaluación del cr&eacute;dito.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Reporte ESSSALUD.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>Correo electr&oacute;nico impreso de la respuesta del &aacute;rea de Riesgos (en caso el monto desembolsado haya sido mayor al aprobado).</p>
                                </div>
                            </div>
                        </div>
                        <div id="menus3" class="tab-pane fade">
                            <h3>Preguntas Frecuentes/h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</p>
                                    <p>Si, usted podrá hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</p>
                                    <p>Si, usted podr&aacute; hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Cu&aacute;l el procedimiento de pagos anticipados o adelantos de cuotas?</p>
                                    <p>Si usted opta por esta opci&oacute;n, una vez realizado el pago deber&aacute; comunicar inmediatamente por escrito a Prymera sobre la elecci&oacute;n que usted ha tomado y que podr&iacute;a ser:</p><br>
                                    <p>- Pago Total del Cr&eacute;dito: amortiza el total de la deuda con reducci&oacute;n de comisiones e intereses al d&iacute;a de pago.</p>
                                    <p>- Prepago con Reducci&oacute;n del Plazo: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, el monto de las cuotas se mantiene y reduce el plazo del cr&eacute;dito.</p>
                                    <p>- Prepago con Reducci&oacute;n de Cuota: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, reduciendo el monto de la cuota del mes y manteniendo el plazo del cr&eacute;dito.</p>
                                    <p>- Adelanto de Cuotas: realiza pagos que se aplican a cuotas inmediatamente posteriores a la exigible. No reduce intereses, comisiones ni gastos.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Qu&eacute; pasa si realizo el pago anticipado y no comunico sobre mi elecci&oacute;n?</p>
                                    <p>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerar&aacute; como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elecci&oacute;n o un tercero realice dicho pago por Usted, Prymera reducir&aacute; el n&uacute;mero de cuotas, dentro de los quince (15) días de realizado el pago. 
                                    En cualquiera de los casos y a su solicitud, Prymera le har&aacute; entrega del cronograma de pagos modificado dentro de los 7 d&iacute;as calendarios posteriores a la presentaci&oacute;n de su solicitud.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Qu&eacute; sucede si me atraso en pagar las cuotas?</p>
                                    <p>Si el Cliente incumpliera con el pago oportuno de una o m&aacute;s de las cuotas previstas en el cronograma de pagos, se devengar&aacute;n autom&aacute;ticamente sobre las cuotas vencidas, en forma adicional a los intereses compensatorios, los intereses moratorios a la tasa que figura en la Hoja Resumen Informativa. La constituci&oacute;n en mora ser&aacute; autom&aacute;tica. Asimismo, se proceder&aacute; a realizar el reporte correspondiente a las Centrales de Riesgo.</p>
                                </div>
                            </div>
                        </div>
                        <div id="menus4" class="tab-pane fade">
                            <h3>El cliente debe proporcionar los siguientes documentos:/h3>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</p>
                                    <p>Si, usted podrá hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Puedo realizar pagos anticipados o adelantar cuotas de mi cr&eacute;dito?</p>
                                    <p>Si, usted podr&aacute; hacerlo en cualquier momento y sin que ello implique el pago de penalidades y/o comisiones.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Cu&aacute;l el procedimiento de pagos anticipados o adelantos de cuotas?</p>
                                    <p>Si usted opta por esta opci&oacute;n, una vez realizado el pago deber&aacute; comunicar inmediatamente por escrito a Prymera sobre la elecci&oacute;n que usted ha tomado y que podr&iacute;a ser:</p><br>
                                    <p>- Pago Total del Cr&eacute;dito: amortiza el total de la deuda con reducci&oacute;n de comisiones e intereses al d&iacute;a de pago.</p>
                                    <p>- Prepago con Reducci&oacute;n del Plazo: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, el monto de las cuotas se mantiene y reduce el plazo del cr&eacute;dito.</p>
                                    <p>- Prepago con Reducci&oacute;n de Cuota: amortiza capital, reduce intereses, comisiones y gastos al d&iacute;a de pago, reduciendo el monto de la cuota del mes y manteniendo el plazo del cr&eacute;dito.</p>
                                    <p>- Adelanto de Cuotas: realiza pagos que se aplican a cuotas inmediatamente posteriores a la exigible. No reduce intereses, comisiones ni gastos.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Qu&eacute; pasa si realizo el pago anticipado y no comunico sobre mi elecci&oacute;n?</p>
                                    <p>En caso usted realice el pago de un monto menor o igual a dos cuotas, se considerar&aacute; como un Adelanto de cuotas. Si el monto pagado es mayor a dos cuotas (incluida la exigible en el periodo de pago) y no se cuente con dicha elecci&oacute;n o un tercero realice dicho pago por Usted, Prymera reducir&aacute; el n&uacute;mero de cuotas, dentro de los quince (15) días de realizado el pago. 
                                    En cualquiera de los casos y a su solicitud, Prymera le har&aacute; entrega del cronograma de pagos modificado dentro de los 7 d&iacute;as calendarios posteriores a la presentaci&oacute;n de su solicitud.</p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-2">
                                    <i class="mdi mdi-keyboard_arrow_right"></i>
                                </div>
                                <div class="col-xs-10">
                                    <p>&iquest;Qu&eacute; sucede si me atraso en pagar las cuotas?</p>
                                    <p>Si el Cliente incumpliera con el pago oportuno de una o m&aacute;s de las cuotas previstas en el cronograma de pagos, se devengar&aacute;n autom&aacute;ticamente sobre las cuotas vencidas, en forma adicional a los intereses compensatorios, los intereses moratorios a la tasa que figura en la Hoja Resumen Informativa. La constituci&oacute;n en mora ser&aacute; autom&aacute;tica. Asimismo, se proceder&aacute; a realizar el reporte correspondiente a las Centrales de Riesgo.</p>
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
    <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsmicash.js?v=<?php echo time();?>"></script>
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