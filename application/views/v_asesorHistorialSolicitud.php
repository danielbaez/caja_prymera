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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto_new.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
            <span class="usuario-logueado"><?php echo _getSesion('nombreCompleto') ?></span><br>
            <a href="/C_usuario/nuevaSolicitud">Crear Solicitud</a><br>
            <a href="/C_usuario/logout">Cerrar Sesi&oacute;n</a><br>  
          </div>

          <div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li><a href="/C_reporteAsesor/agenteCliente">Agente - Cliente</a></li>
              <li class="active"><a href="/C_reporteAsesor/agenteHistorialSolicitud" class="nav-active-a">Historial Solicitud</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">B&uacute;squeda Solicitud - Filtros</h4>
              <form class="form-horizontal" method="POST" action="/C_reporteAsesor/agenteHistorialSolicitud">
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
              <div class="table-responsive">
                <table id="tabla-solicitudes" class="table table-bordered">
                  <thead>
                    <tr class="tr-header-reporte">
                      <th class="text-center" style="display: none">Fecha default</th>
                      <th class="text-center">Fecha Creación</th>
                      <th class="text-center">Cliente</th>
                      <th class="text-center" style="display: none">DNI</th>
                      <th class="text-center" style="display: none">Email</th>
                      <th class="text-center" style="display: none">Nro Cel</th>
                      <th class="text-center" style="display: none">Fijo</th>
                      <th class="text-center" style="display: none">Importe Préstamo</th>
                      <th class="text-center" style="display: none">Plazo</th>
                      <th class="text-center" style="display: none">Cuota Mensual</th>
                      <th class="text-center" style="display: none">Cuota Inicial</th>
                      <th class="text-center" style="display: none">Total Préstamo</th>
                      <th class="text-center" style="display: none">TEA</th>
                      <th class="text-center" style="display: none">TCEA</th>

                      <th class="text-center" style="display: none">Empresa</th>
                      <th class="text-center" style="display: none">Ingreso Mensual</th>
                      <th class="text-center" style="display: none">Dirección</th>
                      <th class="text-center" style="display: none">Distrito</th>
                      <th class="text-center" style="display: none">Provincia</th>
                      <th class="text-center" style="display: none">Departamento</th>


                      <th class="text-center" style="display: none">Nro Solicitud</th>
                      <th class="text-center" style="display: none">Fecha Creación</th>
                      <th class="text-center" style="display: none">Hora Creación</th>
                      <th class="text-center" style="display: none">Fecha Cierre</th>
                      <th class="text-center" style="display: none">Hora Cierre</th>
                      <th class="text-center" style="display: none">Agencia</th>
                      <th class="text-center" style="display: none">Desembolso</th>
                      <th class="text-center" style="display: none">Agente</th>
                      <th class="text-center">Tipo Crédito</th>
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
                        <td style="display: none"><?php echo $solicitud->fecha_default ?></td>
                        <td><?php echo $solicitud->fecha_solicitud ?></td>                        
                        <td><?php echo $solicitud->nombre.' '.$solicitud->apellido ?></td>
                        
                        <td style="display: none"><?php echo $solicitud->dni_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->email_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->celular_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->nro_fijo_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->monto ?></td>
                        <td style="display: none"><?php echo $solicitud->plazo ?></td>
                        <td style="display: none"><?php echo $solicitud->cuota_mensual ?></td>
                        <td style="display: none"><?php echo $solicitud->cuota_inicial ?></td>
                        <td style="display: none"><?php echo $solicitud->plazo*$solicitud->cuota_mensual ?></td>
                        <td style="display: none"><?php echo $solicitud->tea ?></td>
                        <td style="display: none"><?php echo $solicitud->tcea ?></td>
                        <td style="display: none"><?php echo $solicitud->empleador ?></td>
                        <td style="display: none"><?php echo $solicitud->salario ?></td>
                        <td style="display: none"><?php echo $solicitud->dir_empleador ?></td>
                        <td style="display: none"><?php echo $solicitud->distrito ?></td>
                        <td style="display: none"><?php echo $solicitud->provincia ?></td>
                        <td style="display: none"><?php echo $solicitud->departamento ?></td>
                        <td style="display: none"><?php echo $solicitud->id_solicitud ?></td>
                        <td style="display: none"><?php echo $solicitud->fecha_solicitud ?></td>
                        <td style="display: none"><?php echo $solicitud->hora_solicitud ?></td>
                        <td style="display: none"><?php echo $solicitud->fecha_cierre ?></td>
                        <td style="display: none"><?php echo $solicitud->hora_cierre ?></td>
                        <td style="display: none"><?php echo $solicitud->agencia ?></td>
                        <td style="display: none"><?php echo $solicitud->agencia_desembolso ?></td>
                        <td style="display: none"><?php echo $solicitud->usuario_nombre.' '.$solicitud->usuario_apellido ?></td>

                        <td><?php echo $solicitud->producto ?></td>
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
                <div class="col-xs-12 text-right buttons-export" style="margin-top: 20px; margin-bottom: 15px">
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
      
      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>

<script type="text/javascript" src="https:cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>


      <script type="text/javascript">

      $(document).ready(function() {

        var table = $('#tabla-solicitudes').DataTable( {

          "order": [[ 0, 'asc' ]], //defecto ordenar por columna 0 (oculta) fecha asc

      columnDefs: [
         { targets: 1, orderData: 0},   //cuando ordena por la columna 1(fecha), ordenene con los datos de la columna 0(oculta) 
     ],

            lengthChange: false,
            buttons: [
              {
                  extend:    'pdf',
                  text:      '<i class="fa fa-print fa-3x"></i>',
                  titleAttr: 'PDF',
                  title: 'Busqueda Solicitud - Filtros',
                  orientation: 'landscape',
                  pageSize: 'A4',
                  filename: 'reporte',
                  customize: function (doc) {
           
                  doc.content.forEach(function(item) {

                    item.alignment = 'center';
                    })              
                  },
                  exportOptions: {
                      columns: [ 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 20, 25, 27],
                  }
              },
              {
                  extend:    'excel',
                  text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
                  messageTop: 'Busqueda Solicitud - Filtros',
                  titleAttr: 'Excel',
                  title: '',
                  filename: 'reporte',
                  header: true,
                  customize: function( xlsx ) {
                      var sheet = xlsx.xl.worksheets['sheet1.xml'];

                      var clRow = $('row', sheet);
                      $('row c ', sheet).each(function () {
                          $(this).attr('s', '51');
                      });
                  },
                  exportOptions: {
                      columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28]
                  }
              },
            ],
            "language": {
              "search": "Buscar:",
              "emptyTable": "No hay registros disponibles",
              "paginate": {
                  "first":        "Primero",
                  "previous":     "Anterior",
                  "next":         "Siguiente",
                  "last":         "Ultimo"
              },
              "info":             "_START_ a _END_ de _TOTAL_ entradas",

              "infoEmpty":        "0 de 0 of 0 entradas",
              "infoFiltered":     "(filtrados de un total _MAX_ entradas)",
              "zeroRecords":      "No se encontraron registros",
            },
            "pageLength": 5,
            lengthMenu: [
                [ 5, 15, 25, 50, -1 ],
                [ '5', '15', '25', '50', 'Total' ]
            ]
        } );
     
        table.buttons().container()
        //.appendTo( '#tabla-solicitudes_wrapper .col-sm-6:eq(0)' );
        .appendTo( '.buttons-export' );


} );
          

        $(".tr-ver-info-solicitud").click(function() {
            $.ajax({
                data:  {id: $(this).attr('data-idSolicitud')},
                url:   '/C_reporteAsesor/modalInformacionSolicitud',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                  var detalle = response[0];
                  var producto = '';
                  if(detalle.id_producto == 1){
                    producto = 'Mi Cash';
                  }
                  else if(detalle.id_producto == 2){
                    producto = 'Vehicular';
                  }
                  $('.modal-title').html('Resumen Solicitud - '+producto);

                  $('#modalInformacionSolicitud').modal('show');
                  console.log(detalle)

                  var dCliente = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Cliente</h4>';
                  dCliente += '<p><span>Titular:</span> '+detalle.nombre_titular+' '+detalle.apellido_titular+'</p>';
                  if(detalle.id_producto == 2){
                    dCliente += '<p><span>Conyuge:</span> '+detalle.nombre_conyugue+'</p>';  
                  }          
                  dCliente += '<p><span>DNI Titular:</span> '+detalle.dni_titular+'</p>';
                  if(detalle.id_producto == 2){
                    dCliente += '<p><span>DNI Conyuge:</span> '+detalle.dni_conyugue+'</p>'; 
                  }
                  dCliente += '<p><span>e-mail:</span> '+detalle.email_titular+'</p>';
                  dCliente += '<p><span>Nro Cel:</span> '+detalle.celular_titular+'</p>';
                  dCliente += '<p><span>Fijo:</span> '+detalle.nro_fijo_titular+'</p>';
                  $('.div-datos-cliente').html(dCliente);

                  var dPrestamo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Prestamo</h4>';
                  if(detalle.id_producto == 1){
                    dPrestamo += '<p><span>Importe Prestamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
                    dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
                    dPrestamo += '<p><span>Cuota:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+'</p>';
                    dPrestamo += '<p><span>Total de Prestamo:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
                    dPrestamo += '<p><span>TCEA:</span> '+detalle.tcea+'%</p>';
                  }
                  if(detalle.id_producto == 2){
                    dPrestamo += '<p><span>Auto:</span> '+detalle.marca+'</p>';
                    dPrestamo += '<p><span>Modelo:</span> '+detalle.modelo+'</p>';
                    dPrestamo += '<p><span>Importe Prestamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
                    dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
                    dPrestamo += '<p><span>Cuota:</span> '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+' Meses</p>';
                    dPrestamo += '<p><span>Total de Prestamo:</span> s/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
                    dPrestamo += '<p><span>TCEA:</span> '+detalle.tcea+'%</p>';  
                  }

                  $('.div-datos-prestamo').html(dPrestamo);

                  var dEmpleo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Empleo</h4>';
                  
                  dEmpleo += '<p><span>Empresa:</span> '+detalle.empleador+'</p>';
                  dEmpleo += '<p><span>Ingreso Mensual:</span> S/ '+detalle.salario+'</p>';
                  dEmpleo += '<p><span>Direccion:</span> '+detalle.dir_empleador+'</p>';
                  dEmpleo += '<p><span>distrito:</span> '+detalle.distrito+'</p>';
                  dEmpleo += '<p><span>Provincia:</span> '+detalle.provincia+'</p>';
                  dEmpleo += '<p><span>Departamento:</span> '+detalle.departamento+'</p>';

                  if(detalle.nota == null){
                    dEmpleo += '<textarea name="nota" class="form-control" placeholder="Nota"></textarea>'  
                  }else{
                    dEmpleo += '<textarea name="nota" class="form-control" placeholder="Nota">'+detalle.nota+'</textarea>'
                  }                  
                  
                  $('.div-datos-empleo').html(dEmpleo);

                  var dSolicitud = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>';
                  dSolicitud += '<p><span>Nro Solicitud:</span> '+detalle.id_solicitud+'</p>';
                  dSolicitud += '<p><span>Fecha Creación:</span> '+detalle.fecha_solicitud+'</p>';
                  dSolicitud += '<p><span>Hora Creación:</span> '+detalle.hora_solicitud+'</p>';
                  dSolicitud += '<p><span>Fecha Cierre:</span> '+detalle.fecha_cierre+'</p>';
                  dSolicitud += '<p><span>Hora Cierre:</span> '+detalle.hora_cierre+'</p>';
                  dSolicitud += '<p><span>Agencia:</span> '+detalle.agencia+'</p>';
                  dSolicitud += '<p><span>Agencia Tramitación:</span> '+detalle.agencia_desembolso+'</p>';
                  dSolicitud += '<p><span>Agente:</span> '+detalle.usuario_nombre+' '+detalle.usuario_apellido+'</p>';

                  $('.div-datos-solicitud').html(dSolicitud);

                  $('.btn-actualizar-estado').attr('data-idSolicitud', detalle.id_solicitud);

                  $('.btn-actualizar-estado').attr('data-idNota', detalle.id_nota);

                }
            });
             
        });

        $(".btn-actualizar-estado").click(function() {
          var nota = $('textarea[name="nota"]').val();
          $.ajax({
            data:  {nota: nota, id: $(this).attr('data-idSolicitud'), id_nota: $(this).attr('data-idNota')},
            url:   '/C_reporteAsesor/actualizarNotaSolicitud',
            type:  'post',
            dataType: 'json',
            success:  function (response) {
              console.log(response)
              if(response.response){
                $('#modalInformacionSolicitud').modal('hide');
              }else{
                alert('Hubo un problema, no se pudo actualizar la nota.')
              }
            }
          });
        });
        // data-dismiss="modal"

        $('.export-excel').click(function(){

          $('#tabla-solicitudes thead').prepend('<tr class="text-right"><td colspan="3">Búsqueda Solicitud - Filtros</td></tr>').find('tr:first').hide();

          $("#tabla-solicitudes").table2excel({
              filename: "reporte.xls"
          });
          /*$('input[name="reporte"]').val('excel');
          $('form').submit();*/
        })

        function currency(n,sep) {
      var sRegExp = new RegExp("(-?[0-9]+)([0-9]{3})"),
      sValue=n+"";
      if (sep === undefined) {sep=",";}
      while(sRegExp.test(sValue)) {
        sValue = sValue.replace(sRegExp, "$1"+sep+"$2");
      }
      return sValue;
    }


      </script>
    </body>
</html>