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
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
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

        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                  <div class="col-xs-12 col-sm-3"></div>
                  <div class="col-xs-12 col-sm-6">
                    <h1 class="titulo-vista">Seleccionar Solicitud</h1>            
                  </div>
                  <div class="col-xs-12 col-sm-3 text-right">
                    <a href="/C_main">Ver Usuarios</a><br>
                    <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
                    <a href="/C_reporte/index">Ver Reportes</a><br>
                  </div>


                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                      <div class="panel panel-primary panel-login-recuperar-password-solicitud"><br>
                        <div class="panel-body" style="margin-top: 15px; margin-bottom: 20px">
                          <div class="col-xs-12 col-sm-6">
                            <a href="/miCash" style="color:black"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a><br>
                            <h5>Vehicular</h5>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <a href="/C_login" style="color:black"><i class="fa fa-money fa-5x" aria-hidden="true"></i></a><br>
                            <h5>Mi Cash</h5>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
          </div>
        <br>
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
