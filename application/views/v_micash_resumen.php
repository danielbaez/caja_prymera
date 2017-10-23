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
  </head>
  <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <body style="padding: 0px;background-image:url(../public/img/fondos/Car-Sunset.jpg);">
    <?php } else { ?>
        <body style="padding: 0px;background-image:url(../public/img/fondos/Credito-Consumo-image.jpg);">
    <?php } ?>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
        <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
          <h6>Cr&eacute;dito vehicular</h6>
          <h3>Auto de Prymera</h3>
        <?php } else { ?>
            <h6 style="color: #fff;font-size: 16px;margin: 23px;text-align: center;position: relative;top: 10px;left: 87px;font-family: 'quicksandlight';">Cr&eacute;dito Consumo</h6>
            <h3 style="color: #fff;font-size: 36px;margin: 12px;text-align: center;position: relative;left: 81px;font-family: 'quicksandlight';">Mi Cash</h3>
        <?php } ?>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <img class="logo" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>   -->
            <ul class="dropdown-menu">
            <!--  <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>  -->
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <div class="container">
    	<div class="row" style="margin-top:100px">
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
                        <div class="col-xs-6">
                          <span style="">Valor Veh&iacute;culo: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $marca?></span>
                        <div class="col-xs-6">
                          <span style="">Marca: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $modelo?></span>
                        <div class="col-xs-6">
                          <span style="">Modelo: </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
			    		  <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span>S/ <?php echo number_format($Importe, 2)?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">Importe: </span>
					          	  </div>
					          </div>
					      </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $cuota_inicial?></span>
                        <div class="col-xs-6">
                          <span style="">Cuota Inicial: </span>
                        </div>
                    </div>
                </div>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $cant_meses?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">Plazo: </span>
					          	  </div>
					          </div>
					      </div>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $cuota_mensual?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">Cuota Mensual: </span>
					          	  </div>
					          </div>
					      </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $pago_total?></span>
                        <div class="col-xs-6">
                          <span style="">Pago Total: </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $tea?></span>
                        <div class="col-xs-6">
                          <span style="">TEA: </span>
                        </div>
                    </div>
                </div>
					      <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $tcea?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">TCEA: </span>
					          	  </div>
					          </div>
					      </div>
                <div class="col-xs-12">
                    <div class="form-group" style="">
                        <span><?php echo $Agencia?></span>
                        <div class="col-xs-6">
                          <span style="">Agencia: </span>
                        </div>
                    </div>
                </div>
                <form class="text-center">
                  <div class="form-group">
                      <div class="checkbox" style="margin-left: 24px">
                          <label>
                              <input type="checkbox" class="checkbox" style="position: absolute;top: 6px;transform: scale(1.5);" id="acepto"> Acepto 
                              <button type="button" class="btn btn-link" style="position: relative;left: -11px;top: -1px;" onclick="abrirModal()">Consideraciones</button>
                          </label>
                      </div>
                  </div>
              </form>
						  <div class="col-xs-12 text-left">
						  </div>
						  <div class="col-xs-12">
			          <div class="col-xs-4 padding">
                  <select class="form-control" id="Agencia" name="Agencia">
                      <option value="" style="font-family: 'quicksandlight';">Cambiar Agencia</option>
                      <?php echo $comboAgencias?>
                    </select>
                </div>
                <div class="col-xs-8 text-right">
                	<button type="button" class="btn btn-lg" style="font-family: 'quicksandlight';" onclick="irAUbicacion()">Aceptar</button>
                </div>
						  </div>
						  	<div class="col-xs-12 color-info">
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
            <h3 class="modal-title class="alinear"" id="terminosYcondiciones" style="color:#1C4485;text-align: center;font-size: 15px; margin-left: -315px;font-family: 'quicksandbold'">Consideraciones</h3>
          </div>
          <div class="modal-body">
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

            <p class="tipo_letra">
               Para pantalla final de resumen de crédito agregarle la aceptación de “Términos y Condiciones” y debe mostrar el siguiente texto:<br> 
            </p>

             <p class="tipo_letra">
                “La oferta pre-aprobada cumplirá las siguientes condiciones:
                CRÉDITO CONSUMO MI CASH, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO CONSUMO MI CASH, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.
                Valido sólo para personas naturales con edad Min. 23 años y Max. 70 años con condición de Trabajadores Dependientes con Min. 6 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 6 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Monto Mín. del crédito: S/ 1000 y Máx. S/ 15000. No aplica para compra de deuda. Crédito otorgado sólo en moneda nacional. Financiamiento entre 06 y Máx. a 36 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado en cualquiera de las agencias de Prymera.<br>
                Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si retiras S/ 2,000 a 36 meses, pagarás lo siguiente: 36 cuotas mensuales de S/ 111.22, total de intereses S/ 1,935.63, monto total de seguro S/ 68.87, TCEA 65.8%. La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros.”<br> 
             </p>
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