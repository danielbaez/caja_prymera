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
            <?php if(_getSesion('rol') == 'administrador'){ ?>
              <a href="/C_usuario/asignarSupervisor">Asignar Supervisor</a><br>
              <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
              <a href="/C_main">Ver Usuarios</a><br>
            <?php }
                elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
                <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
                <a href="/C_main">Ver Usuarios</a><br>
            <?php } ?>
          </div>

          <div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li><a href="/C_reporte/solicitudes">Solicitudes</a></li>
              <li><a href="/C_reporte/agenteCliente">Agente - CLiente</a></li>
              <li class="active"><a href="/C_reporte/historialSolicitud" class="nav-active-a">Historial Solicitud</a></li>
              <li><a href="/C_reporte/solicitudRechazada">Solicitudes Rechazadas</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">B&uacute;squeda Solicitud - Filtros</h4>
              <form class="form-horizontal" method="POST" action="/C_reporte/historialSolicitud">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group" style="margin-top: 25px">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                
                      <input type="text" class="form-control" name="nro_solicitud" value="<?php echo isset($nro_solicitud) ? $nro_solicitud : '' ?>" id="nro_solicitud" placeholder="Nro. Solicitud">
                    </div>  
                  </div>
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">                 
                      <input type="text" class="form-control" name="cliente" value="<?php echo isset($cliente) ? $cliente : '' ?>" id="cliente" placeholder="Nombre Cliente">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Fecha Solicitud:</label>
                      <?php if(isset($fecha)){ ?>
                        <input type="date" name="fecha" class="form-control" value="<?php echo $fecha ?>" id="fecha">
                      <?php }
                      else{
                      ?>
                      <input type="date" name="fecha" class="form-control" id="fecha">
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <input type="text" class="form-control" name="dni" value="<?php echo isset($dni) ? $dni : '' ?>" id="dni" placeholder="DNI Cliente">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4" style="margin-top: 50px">
                  <div class="form-group"> 
                      <input type="hidden" name="action" value="obtenerHistorialSolicitud">
                      <button type="submit" class="btn btn-primary btn-lg">Mostrar</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-xs-12 col-border-filtros-resultado-reporte">
              <div class="table-responsive tabla-reporte">
                <table id="tabla-solicitudes" class="table table-bordered">
                  <thead>
                    <tr class="tr-header-reporte">
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Cliente</th>
                      <th class="text-center">Nro sol.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($solicitudes) and count($solicitudes)){
                      foreach ($solicitudes as $solicitud) {
                      ?>
                      <!-- <tr class="tr-cursor-pointer tr-ver-info-solicitud" data-toggle="modal" data-target="#modalInformacionSolicitud"> -->
                      <tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="<?php echo $solicitud->id_solicitud ?>">
                        <td><?php echo $solicitud->fecha_solicitud ?></td>                        
                        <td><?php echo $solicitud->nombre.' '.$solicitud->apellido ?></td>
                        <td><?php echo $solicitud->id_solicitud ?></td>
                      </tr>
                      <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <?php
                  if(isset($solicitudes) and count($solicitudes)){ ?>
                <div class="col-xs-12 text-right" style="margin-top: 20px; margin-bottom: 15px">
                  <a style="color:black"><i class="fa fa-print fa-3x" aria-hidden="true"></i></a> 
                  <a class="export-excel" style="color:green; margin-left: 20px"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>    
                </div>
                <?php } ?>
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
                  <div class="col-xs-12 col-sm-4 col-sm-offset-1 text-left div-datos-cliente">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-2 text-left div-datos-prestamo">
                  </div>
                  <div class="col-xs-12"></div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-1 text-left div-datos-empleo">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-sm-offset-2 text-left div-datos-solicitud">
                  </div>
                </div>             
             
              </div>
              <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary btn-actualizar-estado">Actualizar</button>
              </div>
            </div>
      </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>
        
      <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
      <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
      <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
      <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>

      <script src="<?php echo RUTA_PLUGINS?>table2excel/table2excel.js"></script>

      <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jslogear.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
      <script type="text/javascript">
          

        $(".tr-ver-info-solicitud").click(function() {
            $.ajax({
                data:  {id: $(this).attr('data-idSolicitud')},
                url:   '/C_reporte/modalInformacionSolicitud',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                  $('#modalInformacionSolicitud').modal('show');
                  console.log(response[0])
                  var dCliente = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Cliente</h4>';
                  dCliente += '<p><span>Titular:</span> '+response[0].nombre_titular+' '+response[0].apellido_titular+'</p>';
                  dCliente += '<p><span>Conyuge:</span> '+response[0].nombre_conyugue+'</p>';
                  dCliente += '<p><span>DNI Titular:</span> '+response[0].dni_titular+'</p>';
                  dCliente += '<p><span>DNI Conyuge:</span> '+response[0].dni_conyugue+'</p>';
                  dCliente += '<p><span>e-mail:</span> '+response[0].email_titular+'</p>';
                  dCliente += '<p><span>Nro Cel:</span> '+response[0].celular_titular+'</p>';
                  dCliente += '<p><span>Fijo:</span> '+response[0].nro_fijo_titular+'</p>';
                  $('.div-datos-cliente').html(dCliente);


                  var dPrestamo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Prestamo</h4>';
                  if(response[0].id_producto == 1){
                    dPrestamo += '<p><span>Monto:</span> '+response[0].monto+'</p>';
                    dPrestamo += '<p><span>Plazo:</span> '+response[0].plazo+'</p>';
                    dPrestamo += '<p><span>Cuota:</span> '+response[0].cuota_mensual+'</p>';
                    dPrestamo += '<p><span>Total de Prestamo:</span> '+(response[0].cuota_mensual*response[0].plazo)+'</p>';
                    dPrestamo += '<p><span>TCEA:</span> '+response[0].tcea+'</p>';
                  }
                  if(response[0].id_producto == 2){
                    dPrestamo += '<p><span>Auto:</span> '+response[0].marca+'</p>';
                    dPrestamo += '<p><span>Modelo:</span> '+response[0].modelo+'</p>';
                    dPrestamo += '<p><span>Importe:</span> '+response[0].valor_auto+'</p>';
                    dPrestamo += '<p><span>Plazo:</span> '+response[0].plazo+'</p>';
                    dPrestamo += '<p><span>Cuota:</span> '+response[0].cuota_mensual+'</p>';
                    dPrestamo += '<p><span>Total de Prestamo:</span> '+(response[0].cuota_mensual*response[0].plazo)+'</p>';
                    dPrestamo += '<p><span>TCEA:</span> '+response[0].tcea+'</p>';  
                  }
                  
                  $('.div-datos-prestamo').html(dPrestamo);

                  var dEmpleo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Empleo</h4>';
                  
                  dEmpleo += '<p><span>Empresa:</span> '+response[0].empleador+'</p>';
                  dEmpleo += '<p><span>Ingreso Mensual:</span> '+response[0].salario+'</p>';
                  dEmpleo += '<p><span>Direccion:</span> '+response[0].dir_empleador+'</p>';
                  
                  $('.div-datos-empleo').html(dEmpleo);

                  var dSolicitud = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>';
                  dSolicitud += '<p><span>Nro Solicitud:</span> '+response[0].id_solicitud+'</p>';
                  dSolicitud += '<p><span>Fecha Solicitud:</span> '+response[0].fecha_solicitud+'</p>';
                  dSolicitud += '<p><span>Hora:</span> '+response[0].hora_solicitud+'</p>';
                  dSolicitud += '<p><span>Agencia:</span> '+response[0].agencia+'</p>';
                  dSolicitud += '<p><span>Asesor:</span> '+response[0].usuario_nombre+'</p>';

                  

                  dSolicitud += '<select name="status" class="form-control" id="status">';
                  dSolicitud += '<option value="">Status</option>';
                  if(response[0].status_sol == 0){
                    dSolicitud += '<option selected value="0">Abierto</option>';
                    dSolicitud += '<option value="1">Cerrada</option>';
                  }
                  if(response[0].status_sol == 1){
                    dSolicitud += '<option value="0">Abierto</option>';
                    dSolicitud += '<option selected value="1">Cerrada</option>';
                  }
                  
                  dSolicitud += '</select>';
                  $('.div-datos-solicitud').html(dSolicitud);

                  $('.btn-actualizar-estado').attr('data-idSolicitud', response[0].id_solicitud);

                }
            });
             
        });

        $(".btn-actualizar-estado").click(function() {
          var status = $('#status option:selected').val();
          if(status !== ''){
            $.ajax({
              data:  {status: status, id: $(this).attr('data-idSolicitud')},
              url:   '/C_reporte/actualizarEstadoSolicitud',
              type:  'post',
              dataType: 'json',
              success:  function (response) {
                console.log(response)
                if(response.response){
                  $('#modalInformacionSolicitud').modal('hide');
                }else{
                  alert('Hubo un problema, no se pudo actualizar el estado.')
                }
              }
            });
          }else{
            alert('Por favor elige un estado')
          }
        });
        // data-dismiss="modal"

        $('.export-excel').click(function(){

          /*$('#tabla-solicitudes tbody').append('<tr class="text-right"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>dwdw</td></tr>');


          $('#tabla-solicitudes').find('tr:last').hide();*/

          $("#tabla-solicitudes").table2excel({
              filename: "reporte.xls"
          });
          /*$('input[name="reporte"]').val('excel');
          $('form').submit();*/
        })


      </script>
    </body>
</html>