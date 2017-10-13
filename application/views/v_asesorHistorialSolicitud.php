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
              <li><a href="/C_reporteAsesor/agenteCliente">Agente - CLiente</a></li>
              <li class="active"><a href="/C_reporteAsesor/agenteHistorialSolicitud" class="nav-active-a">Historial Solicitud</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">B&uacute;squeda Solicitud - Filtros</h4>
              <form class="form-horizontal">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group" style="margin-top: 25px">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                
                      <input type="text" class="form-control" name="nro_solicitud" placeholder="Nro. Solicitud">
                    </div>  
                  </div>
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                 
                      <input type="text" class="form-control" name="cliente" placeholder="Nombre Cliente">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Fecha Solicitud:</label>
                      <input type="date" name="fecha_desde" class="form-control" id="fecha_desde">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <input type="text" class="form-control" name="dni" placeholder="DNI Cliente">
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
                      <th class="text-center">Cliente</th>
                      <th class="text-center">Nro sol.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="tr-cursor-pointer" data-toggle="modal" data-target="#modalInformacionSolicitud">
                      <td>10/07/2017</td>
                      <td>jose perez</td>
                      <td>300</td>                      
                    </tr>
                    <tr class="tr-cursor-pointer" data-toggle="modal" data-target="#modalInformacionSolicitud">
                      <td>10/07/2017</td>
                      <td>jose perez</td>
                      <td>300</td>                      
                    </tr>
                    <tr class="tr-cursor-pointer" data-toggle="modal" data-target="#modalInformacionSolicitud">
                      <td>10/07/2017</td>
                      <td>jose perez</td>
                      <td>300</td>                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>

    <div class="modal fade" id="modalInformacionSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title modal-recuperar-password-titulo">Resumen Solicitud</h3>
              </div>
              <div class="modal-body text-center modal-reporte-informacion-solicitud">
                <div class="row">
                  <div class="col-xs-12 col-sm-4 col-sm-offset-1 text-left">
                    <h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Cliente</h4>
                    <p><span>Titular:</span> fefe bnaez</p>
                    <p><span>Conyuge:</span> fefe fef</p>
                    <p><span>DNI Titular:</span> 323223</p>
                    <p><span>DNI Conyuge:</span> 432333</p>
                    <p><span>e-mail:</span> dad@dewde.dd</p>
                    <p><span>Nro Cel:</span> 323232</p>
                    <p><span>Fijo:</span> 5344334</p>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-2 text-left">
                    <h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Prestamo</h4>
                    <p><span>Auto:</span> Susuki</p>
                    <p><span>Modelo:</span> wre</p>
                    <p><span>Importe:</span> S/ 40.000</p>
                    <p><span>Plazo:</span> 60 meses</p>
                    <p><span>Cuota:</span> S/4343</p>
                    <p><span>Días de Gracia:</span> 23</p>
                    <p><span>Total de Prestamo:</span> S/ 434</p>
                    <p><span>TCEA:</span> 21%</p>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-1 text-left">
                    <h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Empleo</h4>
                    <p><span>Empresa:</span> Nextel del peru</p>
                    <p><span>Ingreso Mensual:</span> S/ 5.800</p>
                    <p><span>Direccion:</span> defef ewf wefewfewfef</p>
                    <textarea name="nota" class="form-control" placeholder="ingrese una nota"></textarea>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-2 text-left">
                    <h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>
                    <p><span>Nro Solicitud:</span> 323</p>
                    <p><span>Fecha Solicitud:</span> 12/12/2121</p>
                    <p><span>Hora:</span> 3:</span>00 pm</p>
                    <p><span>Agencia:</span> Mall de Sur</p>
                    <p><span>Asesor:</span> fewf ewfw</p>
                    
                  </div>
                </div>             
             
              </div>
              <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
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