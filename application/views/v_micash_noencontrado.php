<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Caja Prymera</title>
	<link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-noencontrado.css?v=<?php echo time();?>">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />

    <body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h6>Cr&eacute;dito Consumo</h6>
        <h3>Mi Cash</h3>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <img class="logo" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
            <ul class="dropdown-menu">
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container">
    	<div class="row" style="margin-top:30px">
    		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="position: relative;top: 50px;">
		    	<div class="panel panel-primary" style="">
		    		<div class="panel-heading text-center" style="background-color: #fff;border:0;padding-top: 15px;padding-bottom: 15px;color: #1C4485;">
		    			<h1 class="panel-title" style="font-size:25px;color: #005aa6;"><strong>Lo sentimos, en estos momentos no contamos con una</strong></h1>
		    			<h1 style="font-size:25px;color:#005aa6;margin:0px;margin-left: 27px;"><strong>oferta que se ajuste a tus necesidades</strong> y nos gustar&iacute;a</h1>
		    			<h1 style="font-size:25px;color:#005aa6;margin:0px;text-align: center">ponernos en contacto contigo</h1>
		    		</div>
			    	<div class="panel-body" style="padding-bottom:25px;border: 1px solid #1C4485;border-top-left-radius: 40px;width: 60%;position: relative;left: 132px;">
              <div class="row text-center" style="color:#EF484E">
                <h2 style="margin:8px 0 15px 0;text-align: center;font-size: 26px;color: #808080;">Confirma tus datos:</h2>
                <div class="col-md-12">
              		<div class="col-md-6">
              			<div class="form-group">
                          <input class="form-control" type="text" id="nro_cel" placeholder="N&uacute;mero Celular" maxlength="9" style="">
                        </div>
              		</div>
              		<div class="col-md-6">
              			<div class="form-group">
                          <input type="text" class="form-control" id="nro_fijo" placeholder="N&uacute;mero Fijo" maxlength="6" style="">
                        </div>
              		</div>
              	</div>
              	<div class="col-md-12">
              		<div class="col-md-2">
              			<div class="checkbox" style="margin-left: 83px;margin-top: 3px;">
                  			<input type="checkbox">
                  		</div>
              		</div>
              		<div class="col-md-10">
              			<p style="color:#808080">Autorizo que usen mis datos para contactarme</p>
              		</div>
              	</div>
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                  <form class="text-center" action="/c_mensaje" type="POST">
                    <button type="submit" class="btn btn-lg" style="width:40%;font-weight:bold;background-color: #005aa6;width: 60%;color: #fff;">Aceptar</button>
                  </form>
                </div>
              </div>
			    	</div>
		    	</div>
		    </div>
	    </div>
    </div>

    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  </body>
</html>