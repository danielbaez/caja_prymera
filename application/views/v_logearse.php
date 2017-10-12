<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Caja prymera</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="refresh"          content="36000">
        <meta name="viewport"               content="width=device-width, initial-scale=1">
        <meta name="keywords"               content="A fast online advisory service for academical and professional targets">
        <meta name="robots"                 content="index,follow">
        <meta name="date"                   content="September 03, 2017">
        <meta name="author"                 content="softhy.pe">
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#FFFFFF">
        <meta name="description"            content="Koplan - Your way to success">
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
    	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto_new.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
        </style>  
    </head>
    <body>
    	<nav class="navbar navbar-inverse" style="background-color: transparent;border-color: transparent;">
          <div class="container-fluid">
            <div class="navbar-header">
            	<a class="navbar-brand" style="background-color: #0060aa;margin: -69px;padding-top: 1px;height: 120px;" href="#"><img class="img-responsive logo" style="max-width: 302px;" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
            </div>
            <ul class="nav navbar-nav">
            </ul>
          </div>
        </nav>
        <!-- <section id="principal">
            <div class="mdl-card mdl-card-login" style="margin-top: 120px;">
                <div class="mdl-card__title p-b-0" style="text-align: center">
                    <h3 style="color: #0060aa;font-size: 32px;font-family: quicksandbold">Bienvenido</h3>
                </div>
                <div class="mdl-card__supporting-text">
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="txtEmail" onkeyup="login()">
                            <label class="mdl-textfield__label" for="txtEmail style="font-family: quicksandbold">Usuario</label>
                        </div>
                    </div>  
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="txtPassword" onkeyup="login()">
                            <label class="mdl-textfield__label" for="txtPassword" style="font-family: quicksandbold">Contrase&ntilde;a</label>
                        </div>
                    </div>   
                    <div class="col-sm-12 m-t-15">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                        	<span class="mdl-checkbox__label" style="font-family: quicksandbold">Recordarme</span>
                            <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                        </label>
                    </div>
                    <div class="col-sm-12 m-t-20">
                        <div class="col-xs-12">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login" style="width: 100%;background: #007ac0;color: #fff;font-family: quicksandbold" onclick="logear()">Dashboard</button>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login" style="width: 125%;background: #007ac0;color: #fff;margin-top: 10px;margin-left: -14px;font-family: quicksandbold" onclick="goToVehicular(1)">Vehicular</button>
                            </div>
                            <div class="col-xs-6">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login" style="width: 118%;background: #007ac0;color: #fff;margin-top: 10px;margin-left: -1px;font-family: quicksandbold" onclick="goToMicash(2)">MiCash</button>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-12 m-t-20">
                    	<div class="col-xs-8 col-md-8">
                    		<p style="font-family: quicksandlight;font-size: 12px">Olvid&oacute; su contrase&ntilde;a?</p>
                    	</div>
                    	<div class="col-xs-4 col-md-4" style="padding: 3px;margin-left: -16px;margin-top: -2px;">
                    		<a href="" style="font-size: 12px; font-family: quicksandlight">Ingrese aqu&iacute;</a>
                    	</div>
                    </div>
                </div>
                <div class="mdl-card__actions">
                	<div class="col-md-6" style="padding:0">
                	</div>
                	<div class="col-md-6">
        			</div>
                </div>
            </div>
            <p class="text-center"></p>
        </section> -->

        <div class="container">
            <div class="row text-center">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <h1 style="font-size:25px;">Bienvenido Usuario</h1>
            <div class="panel panel-primary" style="rgba(255,255,255,0.6); border-radius:8px">
                <!-- <div class="panel-heading" style="background-color:#1C4485;border:0">
                  <h1 class="panel-title" style="font-size:25px;">Bienvenido Usuario</h1>
                </div> -->
                <div class="panel-body">
                  <form class="form-horizontal" action="logearse/login" method="post">
                    <br>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="email">Usuario:</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="usuario" id="email" placeholder="Enter email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="pwd">Contrase&ntilde;a:</label>
                      <div class="col-sm-9"> 
                        <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-center">
                        <button type="submit" class="btn btn-primary redirect" data-value="1">Dashboard</button>
                        <button type="submit" class="btn btn-primary redirect" data-value="2">Cash</button>
                        <button type="submit" class="btn btn-primary redirect" data-value="3">Vehicular</button>
                        <input type="hidden" name="redirect">
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-center">
                        Olvid&oacute; su contrase&ntilde;a? <a href="resetear_password.html">Ingrese aqu&iacute;</a>
                      </div>
                    </div>
                            
                        <?php
                        $error = $this->session->flashdata('error');
                        if(isset($error)) {
                        ?>
                        <div class="form-group"> 
                                <div class="alert alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
      	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jslogear.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    </body>
</html>
