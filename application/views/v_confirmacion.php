<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Confirmaci&oacute;n de datos</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-confirmacion.css?v=<?php echo time();?>">
  </head>
    <body style="background-image:url(https://ugc.kn3.net/i/origin/http://ist1-2.filesor.com/pimpandhost.com/5/7/0/3/57039/G/j/G/7/GjG7/al_atardecer-1600x1200.jpg);background-size: cover;background-repeat: no-repeat;
    background-attachment: fixed; background-position: center; padding-top: 70px;">
    


    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Caja Prymera</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <ul class="dropdown-menu">
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container">
    	<div class="row" style="margin-top:30px">
    		<div class="col-sm-12 col-md-8 col-md-offset-2">
		    	<div class="panel panel-primary" style="border:none; background: rgba(255,255,255,0.6); border-radius:10px">
		    		<div class="panel-heading" style="background-color:#1C4485;border:0; padding-top: 15px;
                         padding-bottom: 15px">
		    			<h1 class="panel-title" style="font-size:25px;">Est&aacute;s a un paso de tu pr&eacute;stamo
              			<br>Cofirrma tus datos</h1>
		    		</div>
			    	<div class="panel-body" style="margin-bottom:25px">
              		<div class="row text-center">
                		<form class="text-center" action="C_resumen" method="POST">
                  			<div class="col-xs-12 col-sm-6">                  
                      			<div class="form-group">
                      			<p style="font-weight: bold;font-size:20px;color:#1C4485;border-radius:10px"><strong>Datos laborales</strong></p>
                        			<select class="form-control" name="salario">
                                      <option value="">Salario</option>
                                      <option value="">S/ 1000</option>
                                      <option value="">S/ 2000</option>
                                      <option value="">S/ 3000</option>
                                      <option value="">S/ 4000</option>
                                      <option value="">S/ 5000</option>
                                      <option value="">Otro</option>
                        			</select>
                      			</div>
                      			<div class="form-group">
                        			<input type="search" class="form-control" id="empleador" name="empleador" placeholder="Empleador" max-lenght="50" style="border-left:5px solid #EC971F">
                      			</div>
                      			<div class="form-group">
                        			<input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" max-lenght="50" placeholder="Direcci&oacute;n empresa" style="border-left:5px solid #EC971F">
                      			</div>
                      			<div class="form-group">
                        			<select class="form-control" id="Distrito" name="Distrito">
                                      <option value="">Distrito</option>
                                      <option value="">Surco</option>
                                      <option value="">Miraflores</option>
                                      <option value="">Surquillo</option>
                                      <option value="">Lima</option>
                                      <option value="">San miguel</option>
                                      <option value="">Villa el salvador</option>
                        			</select>
                      			</div>
                      			<div class="form-group">
                        			<select class="form-control" id="Departamento" name="Departamento">
                                      <option value="">Departamento</option>
                                      <option value="">Surco</option>
                                      <option value="">Miraflores</option>
                                      <option value="">Surquillo</option>
                                      <option value="">Lima</option>
                                      <option value="">San miguel</option>
                                      <option value="">Villa el salvador</option>
                        			</select>
                      			</div>
                      			<div class="form-group">
                        			<select class="form-control" id="Provincia" name="Provincia">
                                      <option value="">Provincia</option>
                                      <option value="">Surco</option>
                                      <option value="">Miraflores</option>
                                      <option value="">Surquillo</option>
                                      <option value="">Lima</option>
                                      <option value="">San miguel</option>
                                      <option value="">Villa el salvador</option>
                        			</select>
                      			</div>
                  			</div>
                  <div class="col-xs-12 col-sm-6">
                  	<p style="position: relative;left: -31px;font-weight: bold;font-size:20px;color:#1C4485;border-radius:10px"><strong>Datos del contacto</strong></p>
                    	<form class="text-center">
                      		<div class="form-group">
                        		<input type="text" class="form-control" id="email" name="email" placeholder="Email" style="border-left:5px solid #EC971F" value="<?php echo $email?>">
                      		</div>
                      		<div class="form-group">
                        		<input type="text" class="form-control" id="nro_celular" name="nro_celular" placeholder="Nro. Celular" style="border-left:5px solid #EC971F">
                      		</div>
                      		<div class="form-group">
                        		<input type="text" class="form-control" id="nro_fijo" name="nro_fijo" placeholder="Nro. Fijo" style="border-left:5px solid #EC971F">
                      		</div>
                      		<div class="form-group">
                        		<select class="form-control" name="concesionaria">
                                  <option value="">Concesionaria</option>
                                  <option value="">Divermotor</option>
                                  <option value="">Volvo</option>
                                  <option value="">Scania</option>
                        		</select>
                      	</div>
                      	</form>
                  </div>
                  <div class="col-xs-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="autorizacion"> Autorizo que usen mis datos para esta oferta
                      </label>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-lg selector" style="width:40%; font-weight:bold" onclick="enviarMail()">Aceptar</button>
                  </div>
                </form>
              </div>
	    	  </div>
	    	</div>
	    </div>
    </div>
    </div>


	<div class="modal fade" aria-label="Close" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="terminosYcondiciones" style="color:#EF484E">Verifica tu n&uacute;mero</h3>
            </div>
            <div class="modal-body">
              <div class="bs-example">
                <div class="table-responsive" id="tablaCronograma">
                	<p style="margin-bottom: 0">Para poder terminar con la solicitud </p>	
              		<p>Por favor ingrese el c&oacute;digo de seguridad que ha sido enviado a su celular: </p>	
              		<input type="text" placeholder="" size="4">
              		<input type="text" placeholder="" size="4">
              		<input type="text" placeholder="" size="4">
              		<input type="text" placeholder="" size="4">
            </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" aria-label="Close" onclick="verificarNumero()">Confirmar</button>
            </div>
          </div>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
  	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsconfirmacion.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	
	<script type="text/javascript">
	(function($){
			$( ".selector" ).dialog({ closeOnEscape: false });

			$(document).keypress(function(e) { 
			    if (e.keyCode == 27) { 
			        $("#myModal").fadeOut(500);
			        //or
			        window.close();
			    } 
			});

			// Add hidden event of the modal 
			$('#myModal').on('hidden.bs.modal', function (e) {
			    cancelModal(); // Call the function to cancel the modal after hiding of the modal
			})

			// Cancel the modal
			function cancelModal() {
			   // Re-generate content with default values
			}
	})(jQuery);
	</script>
  </body>
</html>