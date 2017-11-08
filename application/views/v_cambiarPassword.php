<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Caja Prymera</title>
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">


    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    

    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">

        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">

  </head>
    <body>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />

    <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header-one-line">Sistema de Cr&eacute;ditos Web</h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header-no-navbar" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none">Sistema de Cr&eacute;ditos Web</h1>
        </div>
      </div>    
    </div>            
  </div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 m-t-20 m-b-20">
          <div class="panel panel-primary" style="border: none">
            <div class="panel-heading text-center" style="background-color: #fff;border:0;padding-top: 15px;padding-bottom: 15px;color: #1C4485;">
              <h1 class="titulo-vista"><strong>Cambiar Contrase&ntilde;a</strong></h1>
            </div>
            <div class="panel-body" style="padding-bottom:25px;border: 1px solid #1C4485;border-top-left-radius: 40px; border-bottom-right-radius: 40px;">
              <div class="row text-center" style="color:#EF484E">
                <h1 style="margin:8px 0 15px 0;text-align: center;font-size: 20px;color: #808080;font-family: 'quicksandlight';">Ingrese su nueva contrase&ntilde;a</h1>
                <!-- <div class="col-md-12">
                  <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                          <input class="form-control" type="text" id="email" placeholder="Usuario o correo electr&oacute;nico" maxlength="50" style="">
                        </div>
                  </div>
                </div> -->
                <div class="col-md-12">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                          <input type="password" class="form-control" id="password" placeholder="Contrase&ntilde;a" maxlength="50" style="">
                        </div>
                        <input type="text" class="hidden" name="encrypt" id="encrypt" value="<?php echo $encrypt;?>">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn-lg" style="background-color: #005aa6;color: #fff;font-family: 'quicksandbold';" onclick="cambiarPass()">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- <span class="usuario-logueado"><?php  ?></span><br>-->
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jscambiarPass.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  <script>
  </script>
  </body>
</html>