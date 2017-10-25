<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;dito Mi Auto</title>
    <?php } else { ?>
        <title>Cr&eacute;dito Mi Cash</title>
    <?php } ?>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos.css?v=<?php echo time();?>">

  <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>"> 
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-resumen.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
  </head>
  <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <body style="padding: 0px;background-image:url(../public/img/fondos/Car-Sunset.jpg);">
    <?php } else { ?>
        <body style="padding: 0px;background-image:url(../public/img/fondos/Credito-Consumo-image.jpg);">
    <?php } ?>


  <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">

          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
          <h1 class="title-header-first">Cr&eacute;dito Vehicular</h1>
          <h1 class="title-header-second">Auto de Prymera</h1>
          <?php } else { ?>
            <h1 class="title-header-first">Cr&eacute;dito consumo</h1>
            <h1 class="title-header-second">Mi Cash</h1>
          <?php } ?>
          
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
            <h1 style="display: none">Cr&eacute;dito Vehicular | Auto de Prymera</h1>
          <?php } else { ?>
            <h1 style="display: none">Cr&eacute;dito consumo | Mi Cash</h1>
          <?php } ?>
        </div>
      </div>    
    </div>            
  </div>

    <div class="container">
    	<div class="row" style="margin-top:50px">
    		<div class="col-sm-12 col-md-4">
		    	<div class="panel panel-primary" style="">
		    		<div class="panel-heading" style="background-color: #fff;font-weight: bold;padding: 23px;">
		    			<div class="col-xs-12">
		    				<h1 class="panel-title" style="font-weight: bold;">Resumen Solicitud</h1>
		    			</div>
		    		</div>
			    	<div class="panel-body">
			    		<form class="text-center" action="losentimos.html" method="POST">
                <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                  <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $valor_auto?></span>
                        <div class="col-xs-7">
                          <span style="">Valor Veh&iacute;culo: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $marca?></span>
                        <div class="col-xs-7">
                          <span style="">Marca: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $modelo?></span>
                        <div class="col-xs-7">
                          <span style="">Modelo: </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
			    		  <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>S/ <?php } ?><?php echo $Importe?></span>
					          	  <div class="col-xs-7">
					          	  	<span style="">Importe Pr&eacute;stamo: </span>
					          	  </div>
					          </div>
					      </div>
                <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $cuota_inicial?></span>
                        <div class="col-xs-7">
                          <span style="">Cuota Inicial: </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $cant_meses?></span>
					          	  <div class="col-xs-7">
					          	  	<span style="">Plazo: </span>
					          	  </div>
					          </div>
					      </div>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $cuota_mensual?></span>
					          	  <div class="col-xs-7">
					          	  	<span style="">Cuota Mensual: </span>
					          	  </div>
					          </div>
					      </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $pago_total?></span>
                        <div class="col-xs-7">
                          <span style="">Pago Total: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $tea?></span>
                        <div class="col-xs-7">
                          <span style="">TEA: </span>
                        </div>
                    </div>
                </div>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $tcea?></span>
					          	  <div class="col-xs-7">
					          	  	<span style="">TCEA: </span>
					          	  </div>
					          </div>
					      </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $Agencia?></span>
                        <div class="col-xs-4">
                          <span style="">Agencia: </span>
                        </div>
                    </div>
                </div>
                <form class="text-center">
                  <div class="form-group">
                      <div class="checkbox" style="margin-left: 24px">
                          <label>
                              <input type="checkbox" class="checkbox" style="position: absolute;top: 6px;transform: scale(1.5);" id="acepto"> Acepto 
                              <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -1px;" onclick="abrirModal()">T&eacute;rminos y Condiciones</button>
                          </label>
                      </div>
                  </div>
                  <div class="col-xs-4 padding">
                      <select class="form-control" id="Agencia" name="Agencia" style="font-family: 'quicksandlight';">
                              <option value="">Cambiar Agencia</option>
                              <?php echo $comboAgencias?>
                      </select>
                </div>
              </form>
						  <div class="col-xs-12">
                <div class="col-xs-8 text-right">
                	<button type="button" class="btn btn-lg" style="font-family: 'quicksandlight';margin-left: 230px;margin-top: -65px;" onclick="irAUbicacion()">Aceptar</button>
                </div>
						  </div>
						  	<div class="col-xs-12 color-info" style="margin-top: -20px">
      		    		<p>* La solicitud de tu cr&eacute;dito vehicular ha sido enviada al correo electr&oacute;nico y al n&uacute;mero de celular que  proporcion&oacute; indicando las instrucciones  a seguir para el desembolso</p>
      		   		</div>
						</form>
			    	</div>
		    	</div>
		    </div>
		    <div class="col-md-8 info">
		    	<p style="font-size:35px;font-weight: bold;">Felicidades <?php echo $nombre ?>!</p>
		    	<p class="info2">tu pr&eacute;stamo ha sido</p>
		    	<p class="info2">pre aprobado, ya est&aacute;s cerca</p>
		    	<p class="info2">de cumplir tus sue&ntilde;os</p>
		    </div>
	    </div>
    </div>
    
	<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title class="alinear"" id="terminosYcondiciones" style="color:#0152aa;text-align: center;font-size: 15px; margin-left: 0;font-family: 'quicksandbold'">T&eacute;rminos y Condiciones</h3>
          </div>
          <div class="modal-body">
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
            <strong>Financiamiento Regular</strong>. Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia hasta el 90% del valor del vehículo, Financiamiento Min S/10,000 o USD $ 4,500 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Financiamiento entre 12 y Máx. a 60 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo, No aplica para financiar cuatrimotos, motos lineales o acuáticas o mototaxis (afines). <br> 
            </p>

            <p class="tipo_letra">
            <strong>Financiamiento Compra Inteligente</strong>. Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia en 36 cuotas mensuales hasta el 100% del valor del vehículo, donde el 60% del valor se reparten en 35 cuotas mensuales de igual monto y el 40% en la última cuota (36) incluyendo los intereses correspondientes, con la opción de poder pagar la última cuota (40%) o pagar el saldo del crédito a 24 cuotas adicionales, según lo acordado en el crédito vehicular. Monto del crédito Min S/75,000 o USD $ 25,000 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo y sólo de gama media – alta.<br> 

            <p class="tipo_letra">
            Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. El monto del seguro vehicular es referencial dependerá de la marca y modelo que el cliente elija, pudiendo variar en caso el cliente opte por un seguro vehicular particular y no el de Prymera.  La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si se desembolsa S/ xx,000 a xx meses, pagarás lo siguiente: xx cuotas mensuales de S/ xxxxxx, total de intereses S/ xxxxxxxx, monto total de seguro desgravamen xxxxx, y monto total de seguro xxxxx TCEA xxxxx% La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros. “<br> 
            </p>
            <?php } ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
          </div>
        </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" async src="<?php echo RUTA_JS?>jsresumen_m.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>