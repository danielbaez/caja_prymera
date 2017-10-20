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
      <body style="padding: 0px;background-image:url(../public/img/fondos/Credito-Vehicular-2.jpg);">
    <?php } else { ?>
        <body style="padding: 0px;background-image:url(../public/img/fondos/Credito-Consumo-2.jpg);">
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
          <h3>Auto de Caja Prymera</h3>
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
			    		  <div class="col-xs-12">
					          <div class="form-group" style="">
					          	  <span><?php echo $Importe?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">Importe: </span>
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
					          	  <span><?php echo $tcea?></span>
					          	  <div class="col-xs-6">
					          	  	<span style="">TCEA: </span>
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
                        <span><?php echo $Agencia?></span>
                        <div class="col-xs-6">
                          <span style="">Agencia: </span>
                        </div>
                    </div>
                </div>
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
            		    		<p>* La informaci&oacute;n de tu pr&eacute;stamo ha sido enviada a tu correo y a celular v&iacute;a SMS, con las instrucciones del desembolso en Agencia. </p>
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
    	      </div>
    	    </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsresumen_m.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>