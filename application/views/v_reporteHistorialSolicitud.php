<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Caja prymera</title>
    <meta charset="utf-8">    
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">   
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <style>
    .hide_column {
      display : none;
    }
    </style>    
  </head>
  <body>

      <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header">Dashboard</h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none">Dashboard</h1>
        </div>
      </div>    
    </div>            
  </div>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed btn-collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>    
    <div class="collapse navbar-collapse custom-menu-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(_getSesion('rol') == 'administrador'){ ?>
          <li><a href="/C_crearAgencia">Administrar Agencia</a></li>
          <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
          <!--<li><a href="/C_ip">Asignar IP</a></li>-->
          <li><a href="/C_main">Editar Perfil</a></li>
          <li><a href="/C_horario">Horarios</a></li>
        <?php }
           elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
          <li><a href="/C_main">Editar Perfil</a></li>
        <?php } ?>
        <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
      <div class="row text-center">
        <div class="col-xs-12 m-t-20 m-b-20">
          <div class="hidden-xs col-sm-3"></div>
          <div class="col-xs-12 col-sm-6">
            <h1 class="titulo-vista">Reportes</h1>            
          </div>
          <div class="hidden-xs col-sm-3 text-right">
            <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">                    
                          <?php if(_getSesion('rol') == 'administrador'){ ?>
                            <li><a href="/C_crearAgencia">Administrar Agencia</a></li>
                            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
                            <!--<li><a href="/C_ip">Asignar IP</a></li>-->
                            <li><a href="/C_main">Editar Perfil</a></li>
                            <li><a href="/C_horario">Horarios</a></li>
                          <?php }
                             elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
                            <li><a href="/C_main">Editar Perfil</a></li>
                          <?php } ?>
                          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                      </li>
                  </ul>
            </div>

          <div class="col-xs-12">
            <ul class="nav nav-tabs">
              <li><a href="/C_reporte/solicitudes">Solicitudes</a></li>
              <li><a href="/C_reporte/agenteCliente">Agente - Cliente</a></li>
              <li class="active"><a href="/C_reporte/historialSolicitud" class="nav-active-a">Historial Solicitud</a></li>
              <li><a href="/C_reporte/solicitudRechazada">Solicitudes Rechazadas</a></li>
              <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                <li><a href="/C_reporte/solicitudesTotales">Consultas DNI por agente</a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
               <div class="alert alert-msg" style="display:none; font-size: 16px; padding: 10px 20px; margin-bottom: 10px; margin-top: 10px;"></div>
              <h4 class="titulo-vista">Reporte Historial Solicitud</h4>
              <form class="form-horizontal" method="POST" action="/C_reporte/historialSolicitud">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="cliente">Nro. Solicitud:</label>                
                      <input type="text" class="form-control" name="nro_solicitud" value="<?php echo isset($nro_solicitud) ? $nro_solicitud : '' ?>" id="nro_solicitud" placeholder="Nro. Solicitud">
                    </div>  
                  </div>
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                    <label for="cliente">Nombre Cliente:</label>                 
                      <input type="text" class="form-control" name="cliente" value="<?php echo isset($cliente) ? $cliente : '' ?>" id="cliente" placeholder="Nombre Cliente">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="fecha">Fecha Solicitud:</label>
                      <?php if(isset($fecha)){ ?>
                        <input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $fecha ?>" id="fecha">
                      <?php }
                      else{
                      ?>
                      <input type="text" id="fecha" name="fecha" class="form-control" id="fecha">
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="dni">DNI:</label>
                      <input type="text" class="form-control" name="dni" value="<?php echo isset($dni) ? $dni : '' ?>" id="dni" placeholder="DNI Cliente">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 text-left" style="margin-top: 87px">
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
                      <th class="text-center hide_column">Fecha default</th>
                      <th class="text-center r">Fecha Creación</th>
                      <th class="text-center r">Cliente</th>
                      <th class="text-center hide_column r">DNI</th>
                      <th class="text-center hide_column">Edad</th>
                      <th class="text-center hide_column r">Nro Cel</th>
                      <th class="text-center hide_column r">Fijo</th>
                      <th class="text-center hide_column r">Importe Préstamo</th>
                      <th class="text-center hide_column r">Plazo</th>
                      <th class="text-center hide_column r">Cuota Mensual</th>
                      <th class="text-center hide_column r">Cuota Inicial</th>
                      <th class="text-center hide_column r">Total Préstamo</th>
                      <th class="text-center hide_column r">TEA</th>
                      <th class="text-center hide_column r">TCEA</th>
                      <th class="text-center hide_column">Empresa</th>
                      <th class="text-center hide_column">Ingreso Mensual</th>
                      <th class="text-center hide_column">Dirección</th>
                      <th class="text-center hide_column">Distrito</th>
                      <th class="text-center hide_column">Provincia</th>
                      <th class="text-center hide_column">Departamento</th>
                      <th class="text-center hide_column r">Nro Solicitud</th>
                      <th class="text-center hide_column">Fecha Creación</th>
                      <th class="text-center hide_column">Hora Creación</th>
                      <th class="text-center hide_column">Fecha Cierre</th>
                      <th class="text-center hide_column">Hora Cierre</th>
                      <th class="text-center hide_column r">Agencia</th>
                      <th class="text-center hide_column">Desembolso</th>
                      <th class="text-center hide_column r">Agente</th>
                      <th class="text-center">Tipo Crédito</th>
                      <th class="text-center">Nro sol.</th>
                    </tr>
                  </thead>
                  
                </table>
              </div>
              <?php
                  //if(isset($solicitudes) and count($solicitudes)){ ?>
                <div class="col-xs-12 text-right buttons-export" style="margin-top: 20px; margin-bottom: 15px">
                </div>
                <?php //} ?>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>

    <div class="modal fade" id="modalInformacionSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="margin-top: 114px;">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                  <div class="col-xs-12 p-t-15">
                    <button type="button" class="btn btn-primary btn-actualizar-estado">Actualizar</button>
                  </div>
                </div>             
             
              </div>
              <!-- <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary btn-actualizar-estado">Actualizar</button>
              </div> -->
            </div>
      </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>   

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">

$(document).ready(function() {

  $('#fecha').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  jQuery.fn.DataTable.Api.register( 'buttons.exportData()', function ( options ) {

            if ( this.context.length ) {
                var jsonResult = $.ajax({
                    url: '/C_reporte/ajaxHistorialSolicitud',
                    type: 'GET',
                    data: {
                      action: 'print',
                      nro_solicitud: '<?php echo isset($_REQUEST["nro_solicitud"]) ? $_REQUEST["nro_solicitud"] : "" ?>',
                      cliente: '<?php echo isset($_REQUEST["cliente"]) ? $_REQUEST["cliente"] : "" ?>',
                      dni: '<?php echo isset($_REQUEST["dni"]) ? $_REQUEST["dni"] : "" ?>',
                      fecha: '<?php echo isset($_REQUEST["fecha"]) ? $_REQUEST["fecha"] : "" ?>'
                    },
                    dataType: "json",
                    success: function (result) {
                        //console.log(result)
                    },
                    async: false
                });

                /*console.log(jsonResult);
                console.log(jsonResult.responseJSON.data);*/

                //return {body: jsonResult.responseJSON.data, header: $("#tabla-solicitudes thead tr th").map(function() { return this.innerHTML; }).get()};
                return {body: jsonResult.responseJSON.data, header: $("#tabla-solicitudes thead tr th.r").map(function() { return this.innerHTML; }).get()};
            }
        } );


  var table = $('#tabla-solicitudes').DataTable( {
    "processing": true,
    "serverSide" : true,
    "ajax": {
     "url": '/C_reporte/ajaxHistorialSolicitud',
     "type": 'GET',
     "data": {
      action: 'obtenerHistorialSolicitud',
      nro_solicitud: '<?php echo isset($_REQUEST["nro_solicitud"]) ? $_REQUEST["nro_solicitud"] : "" ?>',
      cliente: '<?php echo isset($_REQUEST["cliente"]) ? $_REQUEST["cliente"] : "" ?>',
      dni: '<?php echo isset($_REQUEST["dni"]) ? $_REQUEST["dni"] : "" ?>',
      fecha: '<?php echo isset($_REQUEST["fecha"]) ? $_REQUEST["fecha"] : "" ?>'
      }
    },
    "columns": [
      {data: 'fecha_default'}, //oculto
      {data: 'fecha_solicitud'},
      {data: 'nombre'},
      {data: 'producto'},
      {data: 'id_solicitud'},
      {data: 'a'},
      {data: 'b'},
      {data: 'c'},
      {data: 'd'},
      {data: 'e'},
      {data: 'f'},
      {data: 'g'},
      {data: 'h'},
      {data: 'i'},
      {data: 'j'},
      {data: 'k'},
      {data: 'l'},
      {data: 'm'},
      {data: 'n'},
      {data: 'o'},
      {data: 'p'},
      {data: 'q'},
      {data: 'r'},
      {data: 's'},
      {data: 't'},
      {data: 'u'},
      {data: 'v'},
      {data: 'w'},
      {data: 'x'},
      {data: 'y'}
     ],

    "createdRow": function ( row, data, index ) {
      //console.log(data)
      $(row).addClass('tr-cursor-pointer tr-ver-info-solicitud');
      $(row).attr("data-idsolicitud", data.id_solicitud);
    },

    "order": [[ 4, 'desc' ]], //defecto ordenar por columna 5 nro solicitud

     "columnDefs": [
     { className: "hide_column", "targets": [0, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27] },
        /*{
            "targets": [ 0 ],
            "visible": false,
            //"searchable": false
        },*/
        { targets: 1, orderData: 0}
      ],

      dom: 'Bfrtip',
        /*buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/

        /*buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],*/

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf', //pdfHtml5
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Reporte Historial Solicitud',
            orientation: 'landscape',
            pageSize: 'A3',
            filename: 'reporte',
            customize: function (doc) {
              doc.content.forEach(function(item) {
                item.alignment = 'center';
                })              
            },

            exportOptions: {
                 //columns: [ 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 20, 25, 27],
                 //columns: [0, 1, 2, 3, 4],
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Reporte Historial Solicitud',
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
              //columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28]
              //columns: [0, 1, 2, 3, 4],
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
      "bInfo" : false,
      //"searching": false,
      "pageLength": 10,
      /*lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ]*/
  } );

  table.buttons().container()
  //.appendTo( '#tabla-solicitudes_wrapper .col-sm-6:eq(0)' );
  .appendTo( '.buttons-export' );

  //$('#tabla-solicitudes tbody').on('click', 'tr', function () {
  $('body').on('click', '#tabla-solicitudes tbody tr', function(e) {
        //var data = table.row( this ).data();
      //  alert( 'You clicked on '+data[0]+'\'s row' );
    //} );
    $.ajax({
      data:  {id: $(this).attr('data-idsolicitud')},
      url:   '/C_reporte/modalInformacionSolicitud',
      type:  'post',
      dataType: 'json',
      success:  function (response) {
        //console.log(response)

        var detalle = response.detalle[0];
        var asignar = response.asignar;
        var producto = '';
        var texto   = '';
        if(detalle.id_producto == 1){
          producto = 'Mi Cash';
        }
        else if(detalle.id_producto == 2){
          producto = 'Auto Campaña';
        }
        else if(detalle.id_producto == 3){
          producto = 'Auto Evaluación';
        }

        $('.modal-title').html('Resumen Solicitud - '+producto);

        $('#modalInformacionSolicitud').modal('show');
        
        if(detalle.tipoCred == 2 || detalle.tipoCred == 1) {

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

          var dPrestamo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Pr&eacute;stamo</h4>';
          if(detalle.id_producto == 1){
            dPrestamo += '<p><span>Importe Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
            dPrestamo += '<p><span>Cuota:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>Total de Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>TCEA:</span> '+detalle.tcea+'%</p>';
          }
          if(detalle.id_producto == 2){
            if(detalle.primer_pago == null) {
              texto = '-';
            }else {
              texto = detalle.primer_pago.split("-").reverse().join("/");
            }
            dPrestamo += '<p><span>Auto:</span> '+detalle.marca+'</p>';
            dPrestamo += '<p><span>Modelo:</span> '+detalle.modelo+'</p>';
            dPrestamo += '<p><span>Importe Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
            dPrestamo += '<p><span>Cuota:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>Total de Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>TCEA:</span> '+detalle.tcea+'%</p>';  
            dPrestamo += '<p><span>1era Fecha de Pago:</span> '+texto+'</p>';
          }
        
          console.log(detalle.id_producto)

          $('.div-datos-prestamo').html(dPrestamo);

          var dEmpleo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Empleo</h4>';
        
          dEmpleo += '<p><span>Empresa:</span> '+detalle.empleador+'</p>';
          dEmpleo += '<p><span>Ingreso Mensual:</span> S/ '+detalle.salario+'</p>';
          dEmpleo += '<p><span>Direcci&oacute;n:</span> '+detalle.dir_empleador+'</p>';
          dEmpleo += '<p><span>Distrito:</span> '+detalle.distrito+'</p>';
          dEmpleo += '<p><span>Provincia:</span> '+detalle.provincia+'</p>';
          dEmpleo += '<p><span>Departamento:</span> '+detalle.departamento+'</p>';
          
          $('.div-datos-empleo').html(dEmpleo);

          var dSolicitud = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>';
          dSolicitud += '<p><span>Nro. Solicitud:</span> '+detalle.id_solicitud+'</p>';
          dSolicitud += '<p><span>Fecha Creación:</span> '+detalle.fecha_solicitud+'</p>';
          dSolicitud += '<p><span>Hora Creación:</span> '+detalle.hora_solicitud+'</p>';
          dSolicitud += '<p><span>Fecha Cierre:</span> '+detalle.fecha_cierre+'</p>';
          dSolicitud += '<p><span>Hora Cierre:</span> '+detalle.hora_cierre+'</p>';
          
          dSolicitud += '<p><span>Agencia:</span> '+detalle.agencia+'</p>';
          dSolicitud += '<p><span>Agencia Tramitaci&oacute;n:</span> '+detalle.agencia_desembolso+'</p>';
          dSolicitud += '<p><span>Agente:</span> '+detalle.usuario_nombre+' '+detalle.usuario_apellido+'</p>';

          if("<?php echo _getSesion('rol') ?>" == 'jefe_agencia'){
            
            var disabled = 'disabled';
            if(detalle.status_sol == 0){
              disabled = '';
              $('.btn-actualizar-estado').show();
            }
            if(detalle.status_sol == 1){
              $('.btn-actualizar-estado').hide();
            }

              dSolicitud += '<select name="status" '+disabled+' class="form-control" id="status">';
            dSolicitud += '<option value="">Status</option>';
            if(detalle.status_sol == 0){
              dSolicitud += '<option selected value="0">Abierto</option>';
              dSolicitud += '<option value="1">Cerrada</option>';
            }
            if(detalle.status_sol == 1){
              dSolicitud += '<option value="0">Abierto</option>';
              dSolicitud += '<option selected value="1">Cerrada</option>';
            }
            
            dSolicitud += '</select>';


            dSolicitud += '<select '+disabled+' style="margin-top:15px" name="id_asesor" class="form-control" id="asesor">';
            dSolicitud += '<option value="">Asignar nuevo Agente</option>';
            console.log(asignar)
            for (var j = 0; j < asignar.length; j++) {
              dSolicitud += '<option value="'+asignar[j].asignar_id+'">'+asignar[j].asignar_nombre+' '+asignar[j].asignar_apellido+'</option>';
            }                    
            dSolicitud += '</select>';

          }
          else
          {
            $('.btn-actualizar-estado').hide();
          }

        

          $('.div-datos-solicitud').html(dSolicitud);

          $('.btn-actualizar-estado').attr('data-idsolicitud', detalle.id_solicitud);

        }else if(detalle.tipoCred == 3) {
          //EVALUACIÓN
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
          if(detalle.edad == null) {
            dCliente += '<p><span>Edad:</span> '+'-'+'</p>';
          }else {
            dCliente += '<p><span>Edad:</span> '+detalle.edad+'</p>';
          }
          if(detalle.profesion == null) {
            dCliente += '<p><span>Profesión:</span> '+'-'+'</p>';
          }else {
            dCliente += '<p><span>Profesión:</span> '+detalle.profesion+'</p>';
          }
          if(detalle.nivel_educativo == null) {
            dCliente += '<p><span>Nivel Educativo:</span> '+'-'+'</p>';
          }else {
            dCliente += '<p><span>Nivel Educativo:</span> '+detalle.nivel_educativo+'</p>';
          }
          if(detalle.condicion_laboral == null) {
            dCliente += '<p><span>Condición Laboral:</span> '+'-'+'</p>';
          }else {
            dCliente += '<p><span>Condición Laboral:</span> '+detalle.condicion_laboral+'</p>';
          }

          $('.div-datos-cliente').html(dCliente);

          var dPrestamo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Pr&eacute;stamo</h4>';
                   
          if(detalle.primer_pago == null) {
            texto = '-';
          }else {
            texto = detalle.primer_pago.split("-").reverse().join("/");
          }
          dPrestamo += '<p><span>Auto:</span> '+detalle.marca+'</p>';
          dPrestamo += '<p><span>Modelo:</span> '+detalle.modelo+'</p>';
          //dPrestamo += '<p><span>Importe Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
          dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
          dPrestamo += '<p><span>Cuota:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+'</p>';
          dPrestamo += '<p><span>Total de Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
       
          dPrestamo += '<p><span>TCEA:</span> '+(detalle.tcea*100).toFixed(2)+'%</p>';  
          dPrestamo += '<p><span>TEA:</span> '+(detalle.tea*100).toFixed(2)+'%</p>';
          dPrestamo += '<p><span>1era Fecha de Pago:</span> '+texto+'</p>';
          
        
          $('.div-datos-prestamo').html(dPrestamo);

          var dEmpleo = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Empleo</h4>';
        
          dEmpleo += '<p><span>Empresa:</span> '+detalle.empleador+'</p>';
          dEmpleo += '<p><span>Ingreso Mensual:</span> S/ '+detalle.salario+'</p>';
          dEmpleo += '<p><span>Direcci&oacute;n:</span> '+detalle.dir_empleador+'</p>';
          dEmpleo += '<p><span>Distrito:</span> '+detalle.distrito+'</p>';
          dEmpleo += '<p><span>Provincia:</span> '+detalle.provincia+'</p>';
          dEmpleo += '<p><span>Departamento:</span> '+detalle.departamento+'</p>';
        
          $('.div-datos-empleo').html(dEmpleo);

          var dSolicitud = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>';
          dSolicitud += '<p><span>Nro. Solicitud:</span> '+detalle.id_solicitud+'</p>';
          dSolicitud += '<p><span>Fecha Creación:</span> '+detalle.fecha_solicitud+'</p>';
          dSolicitud += '<p><span>Hora Creación:</span> '+detalle.hora_solicitud+'</p>';
          dSolicitud += '<p><span>Fecha Cierre:</span> '+detalle.fecha_cierre+'</p>';
          dSolicitud += '<p><span>Hora Cierre:</span> '+detalle.hora_cierre+'</p>';
          
          dSolicitud += '<p><span>Agencia:</span> '+detalle.agencia+'</p>';
          dSolicitud += '<p><span>Agencia Tramitaci&oacute;n:</span> '+detalle.agencia_desembolso+'</p>';
          dSolicitud += '<p><span>Agente:</span> '+detalle.usuario_nombre+' '+detalle.usuario_apellido+'</p>';

          if("<?php echo _getSesion('rol') ?>" == 'jefe_agencia'){
            
            var disabled = 'disabled';
            if(detalle.status_sol == 0){
              disabled = '';
              $('.btn-actualizar-estado').show();
            }
            if(detalle.status_sol == 1){
              $('.btn-actualizar-estado').hide();
            }

              dSolicitud += '<select name="status" '+disabled+' class="form-control" id="status">';
            dSolicitud += '<option value="">Status</option>';
            if(detalle.status_sol == 0){
              dSolicitud += '<option selected value="0">Abierto</option>';
              dSolicitud += '<option value="1">Cerrada</option>';
            }
            if(detalle.status_sol == 1){
              dSolicitud += '<option value="0">Abierto</option>';
              dSolicitud += '<option selected value="1">Cerrada</option>';
            }
            
            dSolicitud += '</select>';


            dSolicitud += '<select '+disabled+' style="margin-top:15px" name="id_asesor" class="form-control" id="asesor">';
            dSolicitud += '<option value="">Asignar nuevo Agente</option>';
            console.log(asignar)
            for (var j = 0; j < asignar.length; j++) {
              dSolicitud += '<option value="'+asignar[j].asignar_id+'">'+asignar[j].asignar_nombre+' '+asignar[j].asignar_apellido+'</option>';
            }                    
            dSolicitud += '</select>';

          }
          else
          {
            $('.btn-actualizar-estado').hide();
          }

          $('.div-datos-solicitud').html(dSolicitud);

          $('.btn-actualizar-estado').attr('data-idsolicitud', detalle.id_solicitud);

        //FIN DE EVALUACIÓN
        }
      }
    });       
  });

  $(".btn-actualizar-estado").click(function() {
    var status = $('#status option:selected').val();
    if(status !== ''){
      $.ajax({
        data:  {status: status, id: $(this).attr('data-idsolicitud'), id_asignar: $("#asesor option:selected").val()},
        url:   '/C_reporte/actualizarEstadoSolicitud',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
          $('.alert-msg').removeClass('alert-success');
          $('.alert-msg').removeClass('alert-danger');

          $('#modalInformacionSolicitud').modal('hide');
          if(response.response){            
            $('.alert-msg').addClass('alert-success').html('La solicitud ha sido actualizada correctamente').show();

          }else{
            $('.alert-msg').addClass('alert-danger').html('La solicitud no ha sido actualizada correctamente').show();
          }
          $('html').animate({scrollTop:0},500);
        }
      });
    }else{
      alert('Por favor elige un estado')
    }
  });
  // data-dismiss="modal"


} );
          

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