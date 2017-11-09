<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;dito Auto de Prymera</title>
    <?php } else { ?>
        <title>Cr&eacute;dito Mi Cash</title>
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-resumen.css?v=<?php echo time();?>">
  </head>
  <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <body style="padding: 0px;">
    <?php } else { ?>
        <body style="padding: 0px;">
    <?php } ?>
    <div class="container-header">
      <div class="container">
        <div class="row padding-div-row-header">
          <div class="col-xs-6 col-title-header-padding">
            <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
              <h1 class="title-header-first"><a href="/Vehicular">Cr&eacute;dito Vehicular</a></h1>
              <h1 class="title-header-second"><a href="/Vehicular">Auto de Prymera</a></h1>
              <?php } else { ?>
              <h1 class="title-header-first"><a href="/Micash">Cr&eacute;dito consumo</a></h1>
              <h1 class="title-header-second"><a href="/Micash">Mi Cash</a></h1>
            <?php } ?>
          </div>
          <div class="col-xs-6 div-logo">
            <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
            <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
              <h1 style="display: none"><a href="/Vehicular">Cr&eacute;dito Vehicular | Auto de Prymera</a></h1>
              <?php } else { ?>
              <h1 style="display: none"><a href="/Micash">Cr&eacute;dito consumo | Mi Cash</a></h1>
            <?php } ?>
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

    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
    <div class="container-fluid" style="background-image:url(../public/img/fondos/Car-Sunset.jpg);background-size: cover;background-repeat: no-repeat;background-attachment: scroll; background-position: center;">
    <?php } else { ?>
      <div class="container-fluid" style="background-image:url(../public/img/fondos/Credito-Consumo-image.jpg);background-size: cover;background-repeat: no-repeat;background-attachment: scroll; background-position: center;">
    <?php } ?>
        <div class="container container-simulador" style="">

        <div class="row m-t-40 row-container-resumen">
          <div class="col-xs-12 col-sm-9 text-center">
            
          </div>
          <div class="hidden-xs hidden-xs col-sm-3 button-login text-right">
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
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-push-6 info">
              <h3 class="title-general">Felicidades <?php echo $nombre ?>!</h3>
              <p class="info2">tu pr&eacute;stamo ha sido</p>
              <p class="info2">pre-aprobado, ya est&aacute;s cerca</p>
              <p class="info2">de cumplir tus sue&ntilde;os</p>
            </div>

            <div class="col-xs-12 col-md-6 col-md-pull-6 col-md-offset-0">
              <div class="panel panel-primary" style="">
                <div class="panel-heading" style="background-color: #fff;font-weight: bold;padding: 23px;">
                  <div class="col-xs-12">
                    <h1 class="panel-title subtitle" style="">Resumen Solicitud</h1>
                  </div>
                </div>
                <div class="panel-body">
                  <form class="text-center" action="losentimos.html" method="POST">
                    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Valor Veh&iacute;culo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $valor_auto?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Marca: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $marca?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Modelo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $modelo?></span>
                          </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Importe Pr&eacute;stamo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?><?php echo 'S/ '.$Importe?><?php }else{ ?><?php echo $Importe.'.00'?><?php } ?></span>
                          </div>
                        </div>
                    </div>
                    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Cuota Inicial: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $cuota_inicial?></span>
                          </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Plazo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $cant_meses?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Cuota Mensual: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $cuota_mensual?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Pago Total: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $pago_total?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">TEA: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $tea?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">TCEA: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $tcea?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Agencia: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $Agencia?></span>
                          </div>
                        </div>
                    </div>
                    <form class="text-center">
                      <div class="form-group" style="padding-bottom: 0">
                          <div class="checkbox" style="margin-left: 24px">
                              <label>
                                  <input onkeyup="enterIrAUbicacion(event);" autofocus type="checkbox" class="checkbox" id="acepto" style="zoom:1.5">  
                                  Acepto <a class="btn btn-link" onclick="abrirModal()" style="padding-top: 3px;padding-left: 0px;">T&eacute;rminos y Condiciones</a>
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 padding">
                          <select onkeyup="enterIrAUbicacion(event);" class="form-control" id="Agencia" name="Agencia" style="font-family: 'quicksandlight'; margin-top:5px">
                                  <option value="">Cambiar Agencia</option>
                                  <?php echo $comboAgencias?>
                          </select>
                    </div>
                    <div class="col-xs-12 visible-xs p-t-15"></div>
                    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                      <button type="button" class="btn btn-lg m-b-10 btn-resumen" style="font-family: 'quicksandlight';" onclick="irAUbicacion()">Aceptar</button>
                    </div>
                  </form>
                  <div class="col-xs-12">
                  </div>
                    <div class="col-xs-12 color-info">
                      <p>* La solicitud de tu <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>Cr&eacute;dito Auto de Prymera <?php }else { ?> Cr&eacute;dito Mi Cash <?php } ?>ha sido enviada a tu correo electr&oacute;nico y al n&uacute;mero de celular que proporcionaste, indicando las instrucciones a seguir para <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?> la gesti&oacute;n de tu cr&eacute;dito <?php }else { ?>el desembolso<?php } ?></p>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
	<!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg medio" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title alinear" id="terminosYcondiciones" style="">T&eacute;rminos y Condiciones</h3>
              </div>
              <div class="modal-body resumen">
              <?php if ($tipo_producto == PRODUCTO_MICASH) { ?>
                <p class="tipo_letra">
                   “La oferta pre-aprobada cumplirá las siguientes condiciones:
                    CRÉDITO CONSUMO MI CASH, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO CONSUMO MI CASH, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.<br><br> 
                </p>

                <p class="tipo_letra">
                Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web <a href="http://www.prymera.com.pe">www.prymera.com.pe</a>. Todas las operaciones relacionadas están afectas al ITF 0.005%. La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si retiras S/ 2,000 a 36 meses, pagarás lo siguiente: 36 cuotas mensuales de S/ 111.22, total de intereses S/ 1,935.63, monto total de seguro S/ 68.87, TCEA 65.8%. La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros.”<br> 
                </p>
                <?php } ?>
                <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                <p class="tipo_letra">
                   “La oferta pre-aprobada cumplirá las siguientes condiciones:
                    CRÉDITO AUTO DE PRYMERA, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO AUTO DE PRYMERA, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.<br><br> 
                </p>

                <p class="tipo_letra">
                <strong>Financiamiento Regular</strong>: Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia hasta el 90% del valor del vehículo, Financiamiento Min S/10,000 o USD $ 4,500 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Financiamiento entre 12 y Máx. a 60 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo, No aplica para financiar cuatrimotos, motos lineales o acuáticas o mototaxis (afines). <br> 
                </p>

                <p class="tipo_letra">
                <strong>Financiamiento Compra Inteligente</strong>: Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia en 36 cuotas mensuales hasta el 100% del valor del vehículo, donde el 60% del valor se reparten en 35 cuotas mensuales de igual monto y el 40% en la última cuota (36) incluyendo los intereses correspondientes, con la opción de poder pagar la última cuota (40%) o pagar el saldo del crédito a 24 cuotas adicionales, según lo acordado en el crédito auto de prymera. Monto del crédito Min S/75,000 o USD $ 25,000 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo y sólo de gama media – alta.<br> 

                <p class="tipo_letra">
                Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. El monto del seguro vehicular es referencial dependerá de la marca y modelo que el cliente elija, pudiendo variar en caso el cliente opte por un seguro vehicular particular y no el de Prymera.  La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si se desembolsa S/ xx,000 a xx meses, pagarás lo siguiente: xx cuotas mensuales de S/ xxxxxx, total de intereses S/ xxxxxxxx, monto total de seguro desgravamen xxxxx, y monto total de seguro xxxxx TCEA xxxxx% La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros. “<br> 
                </p>
                <?php } ?>
              </div>
              <div class="modal-footer">
              </div>
            </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	  <script type="text/javascript" async src="<?php echo RUTA_JS?>jsresumen_m.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  </body>
</html>