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
          <li><a href="/C_ip">Asignar IP</a></li>
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
                            <li><a href="/C_ip">Asignar IP</a></li>
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
              <li class="active"><a href="/C_reporte/solicitudes" class="nav-active-a">Solicitudes</a></li>
              <li><a href="/C_reporte/agenteCliente">Agente - Cliente</a></li>
              <li><a href="/C_reporte/historialSolicitud">Historial Solicitud</a></li>
              <li><a href="/C_reporte/solicitudRechazada">Solicitudes Rechazadas</a></li>
              <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                <li><a href="/C_reporte/solicitudesTotales">Consultas DNI por agente</a></li>
              <?php } ?>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">Reporte Solicitudes de Clientes</h4>
              <form class="form-horizontal" method="POST" action="/C_reporte/solicitudes">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                    <label for="agencia">* Agencia:</label>                
                      <select name="agencia" class="form-control" id="agencia">
                        <option value="">Agencia</option>
                        <?php foreach ($agencias as $agencia) {
                          if(isset($id_agencia)){
                            if($id_agencia == $agencia->id){
                          ?>
                          <option selected value="<?php echo $agencia->id ?>"><?php echo $agencia->AGENCIA ?></option>
                          <?php
                            }
                            else{
                            ?>
                            <option value="<?php echo $agencia->id ?>"><?php echo $agencia->AGENCIA ?></option>
                            <?php
                            }
                          }
                          else
                          {
                          ?>
                            <option value="<?php echo $agencia->id ?>"><?php echo $agencia->AGENCIA ?></option>
                          <?php
                          }   
                        } ?>
                      </select>
                    </div>  
                  </div>
                  <div class="form-group"> 
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                    <label for="agencia">Tipo de Cr&eacute;dito:</label>                 
                      <select name="tipo_credito" class="form-control" id="tipo_credito">
                        <option value="">Tipo de Cr&eacute;dito</option>
                        <?php foreach ($productos as $producto) {
                          if(isset($id_tipo_credito)){
                            if($id_tipo_credito == $producto->id){
                          ?>
                          <option selected value="<?php echo $producto->id ?>"><?php echo $producto->descripcion ?></option>
                          <?php
                            }
                            else{
                            ?>
                            <option value="<?php echo $producto->id ?>"><?php echo $producto->descripcion ?></option>
                            <?php
                            }
                          }
                          else
                          {
                          ?>
                            <option value="<?php echo $producto->id ?>"><?php echo $producto->descripcion ?></option>
                          <?php
                          }   
                        } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">* Desde:</label>
                        <?php if(isset($desde)){ ?>
                          <input type="text" name="fecha_desde" id="desde" class="form-control" value="<?php echo $desde ?>" id="fecha_desde">
                        <?php }
                        else{
                        ?>
                        <input type="text" name="fecha_desde" id="desde" class="form-control" id="fecha_desde">
                        <?php
                        }
                        ?>                      
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">* Hasta:</label>
                      <?php if(isset($hasta)){ ?>
                          <input type="text" name="fecha_hasta" id="hasta" class="form-control" value="<?php echo $hasta ?>" id="fecha_hasta">
                        <?php }
                        else{
                        ?>
                        <input type="text" name="fecha_hasta" id="hasta" class="form-control" id="fecha_hasta">
                        <?php
                        }
                        ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 text-left" style="margin-top: 87px">
                  <div class="form-group">
                      <input type="hidden" name="action" value="obtenerSolicitudes"> 
                      <input type="hidden" name="reporte" value=""> 
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
                      <th class="text-center r">Nro sol.</th>
                      <th class="text-center r">Cliente</th>
                      <th class="text-center r">DNI</th>
                      <th class="text-center r">Agencia</th>
                      <th class="text-center r">Agencia de Tramitaci&oacute;n</th>
                      <th class="text-center r">Tipo Crédito</th>
                      <th class="text-center r">Agente</th>
                      <th class="text-center r">Status</th>
                      <th class="text-center r">Monto</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <?php if(isset($solicitudes) and count($solicitudes)){
                $total = 0;
                foreach ($solicitudes as $solicitud) {
                  
                  $total += (float)$solicitud->monto;
                }
                ?>
                  <p class="text-right reporte-texto-total">Total de S/ <?php echo $total ?></p>
                <?php
                }
                ?>
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

  $('#desde').datetimepicker({
    format: 'YYYY-MM-DD'
  });
  $('#hasta').datetimepicker({
    format: 'YYYY-MM-DD'
  });

  jQuery.fn.DataTable.Api.register( 'buttons.exportData()', function ( options ) {

            if ( this.context.length ) {
                var jsonResult = $.ajax({
                    url: '/C_reporte/ajaxSolicitudes',
                    type: 'GET',
                    data: {
                      action: 'print',
                      agencia: '<?php echo isset($_REQUEST["agencia"]) ? $_REQUEST["agencia"] : "" ?>',
                      tipo_credito: '<?php echo isset($_REQUEST["tipo_credito"]) ? $_REQUEST["tipo_credito"] : "" ?>',
                      fecha_desde: '<?php echo isset($_REQUEST["fecha_desde"]) ? $_REQUEST["fecha_desde"] : "" ?>',
                      fecha_hasta: '<?php echo isset($_REQUEST["fecha_hasta"]) ? $_REQUEST["fecha_hasta"] : "" ?>'
                    },
                    dataType: "json",
                    success: function (result) {
                        //console.log(result)
                    },
                    async: false
                });

                //console.log(jsonResult);
                //console.log(jsonResult.responseJSON.data);

                jsonResult.responseJSON.data.forEach(function(part, index, theArray) {
                  if(part[8] == 0){
                    aa = 'Abierto';
                  }else if(part[8] == 1){
                    aa = 'Cerrado';
                  }else if(part[8] == 2){
                    aa = 'Rechazado';
                  }else if(part[8] == 3){
                    aa = 'Anulado';
                  }else if(part[8] == 4){
                    aa = 'Caducado';
                  }else if(part[8] == 5){
                    aa = 'Incompleto';
                  }
                  theArray[index][8] = aa;
                });

                return {body: jsonResult.responseJSON.data, header: $("#tabla-solicitudes thead tr th.r").map(function() { return this.innerHTML; }).get()};
            }
        } );
  

  var table = $('#tabla-solicitudes').DataTable( {
    "processing": true,
    "serverSide" : true,
    "ajax": {
     "url": '/C_reporte/ajaxSolicitudes',
     "type": 'GET',
     "data": {
      action: 'obtenerSolicitudes',
      agencia: '<?php echo isset($_REQUEST["agencia"]) ? $_REQUEST["agencia"] : "" ?>',
      tipo_credito: '<?php echo isset($_REQUEST["tipo_credito"]) ? $_REQUEST["tipo_credito"] : "" ?>',
      fecha_desde: '<?php echo isset($_REQUEST["fecha_desde"]) ? $_REQUEST["fecha_desde"] : "" ?>',
      fecha_hasta: '<?php echo isset($_REQUEST["fecha_hasta"]) ? $_REQUEST["fecha_hasta"] : "" ?>'
      }
    },
    "columns": [
      {data: 'fecha_default'}, //oculto
      {data: 'fecha_solicitud'},
      {data: 'id_solicitud'},
      {data: 'nombre'},
      {data: 'dni'},
      {data: 'agencia'},
      {data: 'agencia_desembolso'},
      {data: 'descripcion'},
      {data: 'asesor'},
      {data: 'status_sol'},
      {data: 'monto'}
     ],

    "createdRow": function ( row, data, index ) {
      console.log(row)
      if(data.status_sol == 0){
        data.status_sol = 'Abierto';
      }else if(data.status_sol == 1){
        data.status_sol = 'Cerrado';
      }else if(data.status_sol == 2){
        data.status_sol = 'Rechazado';
      }else if(data.status_sol == 3){
        data.status_sol = 'Anulado';
      }else if(data.status_sol == 4){
        data.status_sol = 'Caducado';
      }else if(data.status_sol == 5){
        data.status_sol = 'Incompleto';
      }

      //$('td', row).eq(9).addClass('highlight');
      $('td', row).eq(9).html(data.status_sol);

      $(row).addClass('tr-cursor-pointer tr-ver-info-solicitud');
      $(row).attr("data-idsolicitud", data.id_solicitud);
    },

    "order": [[ 1, 'desc' ]], //defecto ordenar por columna 5 nro solicitud

     "columnDefs": [
     { className: "hide_column", "targets": [0] },
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
            title: 'Reporte Solicitudes de Clientes',
            orientation: 'landscape',
            pageSize: 'A4',
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
            messageTop: 'Reporte Solicitudes de Clientes',
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

} );
</script>
    </body>
</html>