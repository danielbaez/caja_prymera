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
            <h1 class="titulo-vista">Asignacion de Asesores</h1>            
          </div>
          <div class="col-xs-12 col-sm-3 text-right">
            <a href="/C_main">Ver Usuarios</a><br>
            <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
            <a href="/C_reporte/index">Ver Reportes</a><br>
          </div>
          
          <div class="col-xs-12 col-md-6 col-seccion">
            <div class="col-xs-12 div-seccion">
              <h4>Personal</h4>
              <br>
              <div class="table-responsive tabla-personal">
                
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center widht-opt-select">Opt</th>
                      <th class="text-center">Nombres</th>
                      <th class="text-center">Rol</th>
                      <th class="text-center">Agencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($personales as $personal){
                      ?>
                    <tr>
                      <td>
                        <input type="checkbox" value="">
                      </td>                    
                      <td><?php echo $personal->nombre ?></td>
                      <td><?php echo $personal->rol ?></td>
                      <td>Miraflores</td>
                    </tr>
                  <?php                 
                  } ?>                
                     
                  </tbody>
                </table>
              </div>
              <div class="text-right div-agregar-personal-link">
                <a href="" >Agregar ></a>  
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 col-seccion">
            <div class="col-xs-12 div-seccion">
              <form class="form-horizontal form-asignar-supervisor">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="supervisor">Supervisor:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="supervisor" id="supervisor">
                  </div>
                </div>
                 <!-- <div class="form-group">
                  <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <textarea class="form-control" name="personal" id="personal"></textarea>
                  </div>
                </div> -->
                
                <div class="form-group div-personales-agregados">
                  <div class="col-sm-offset-3 col-sm-6 col-personales-agregados">
                    <p>adadas <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>
                    <p>adadas <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>
                    <p>adadas <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>
                    <p>adadas <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>
                    <p>adadas <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>
                  </div>
                </div>
                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                  </div>
                </div>
              </form>
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