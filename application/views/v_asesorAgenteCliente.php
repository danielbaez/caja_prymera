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
            <h1 class="titulo-vista">Vista Reportes</h1>            
          </div>
          <div class="col-xs-12 col-sm-3 text-right">
            <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
          </div>

          <div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li class="active"><a href="/C_reporteAsesor/agenteCliente" class="nav-active-a">Agente - CLiente</a></li>
              <li><a href="/C_reporteAsesor/agenteHistorialSolicitud">Historial Solicitud</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">Reporte Consolidado Solicitudes por Asesor</h4>
              <form class="form-horizontal">
                <div class="col-xs-12 col-sm-4" style="margin-top: 30px">
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                 
                      <select name="tipo_credito" class="form-control" id="tipo_credito">
                        <option value="">Tipo de Crédito</option>
                        <option value="">Mi Cash</option>
                        <option value="">Vehicular</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                 
                      <select name="status" class="form-control" id="status">
                        <option value="">Status</option>
                        <option value="">Abierto</option>
                        <option value="">Cerrado</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Desde:</label>
                      <input type="date" name="fecha_desde" class="form-control" id="fecha_desde">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Hasta:</label>
                      <input type="date" name="fecha_desde" class="form-control" id="fecha_desde">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4" style="margin-top: 50px">
                  <div class="form-group"> 
                      <button type="submit" class="btn btn-primary btn-lg">Mostrar</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-xs-12 col-border-filtros-resultado-reporte">
              <div class="table-responsive tabla-reporte">
                <table class="table table-bordered">
                  <thead>
                    <tr class="tr-header-reporte">
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nro sol.</th>
                      <th class="text-center">Cliente</th>
                      <th class="text-center">Agencia</th>
                      <th class="text-center">Tipo</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Monto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>10/07/2017</td>
                      <td>300</td>
                      <td>jose perez</td>
                      <td>Snata anita</td>
                      <td>micash</td>
                      <td>Cerrada</td>
                      <td>S/ 30433</td>
                    </tr>
                    <tr>
                      <td>10/07/2017</td>
                      <td>300</td>
                      <td>jose perez</td>
                      <td>Snata anita</td>
                      <td>micash</td>
                      <td>Cerrada</td>
                      <td>S/ 30433</td>
                    </tr>
                    <tr>
                      <td>10/07/2017</td>
                      <td>300</td>
                      <td>jose perez</td>
                      <td>Snata anita</td>
                      <td>micash</td>
                      <td>Cerrada</td>
                      <td>S/ 30433</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <p class="text-right reporte-texto-total">Total de S/323</p>
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