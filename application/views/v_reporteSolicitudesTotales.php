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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <style>
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
          <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
          <li><a href="/C_horario">Horarios</a></li>
          <li><a href="/C_main">Editar Perfil</a></li>
          <li><a href="/C_crearAgencia">Crear Agencia</a></li>
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
                            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
                            <li><a href="/C_horario">Horarios</a></li>
                            <li><a href="/C_main">Editar Perfil</a></li>
                            <li><a href="/C_crearAgencia">Crear Agencia</a></li>
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
              <li><a href="/C_reporte/historialSolicitud">Historial Solicitud</a></li>
              <li><a href="/C_reporte/solicitudRechazada">Solicitudes Rechazadas</a></li>
              <li class="active"><a href="/C_reporte/solicitudesTotales" class="nav-active-a">Consultas DNI por agente</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
               <div class="alert alert-msg" style="display:none; font-size: 16px; padding: 10px 20px; margin-bottom: 10px; margin-top: 10px;"></div>
              <h4 class="titulo-vista">Reporte Consultas DNI por agente</h4>
              <form class="form-horizontal" method="POST" action="/C_reporte/solicitudesTotales">
                <div class="col-xs-12 col-sm-4">
                  <!-- <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="dni">DNI:</label>
                      <input type="text" class="form-control" name="dni" value="<?php echo isset($dni) ? $dni : '' ?>" id="dni" placeholder="DNI Cliente">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">* Agente:</label>                
                      <input type="text" class="form-control" name="asesor" value="<?php echo isset($asesor) ? $asesor : '' ?>" id="asesor" placeholder="Agente">
                      <input type="hidden" class="form-control" name="id_asesor" value="<?php echo isset($id_asesor) ? $id_asesor : '' ?>">
                    </div>  
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Desde:</label>
                        <?php if(isset($desde)){ ?>
                          <input type="text" id="desde" name="fecha_desde" class="form-control" value="<?php echo $desde ?>" id="fecha_desde">
                        <?php }
                        else{
                        ?>
                        <input type="text" id="desde" name="fecha_desde" class="form-control" id="fecha_desde">
                        <?php
                        }
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="email">Hasta:</label>
                      <?php if(isset($hasta)){ ?>
                          <input type="text" id="hasta" name="fecha_hasta" class="form-control" value="<?php echo $hasta ?>" id="fecha_hasta">
                        <?php }
                        else{
                        ?>
                        <input type="text" id="hasta" name="fecha_hasta" class="form-control" id="fecha_hasta">
                        <?php
                        }
                        ?>
                    </div>
                  </div>                  
                </div>
                <div class="col-xs-12 col-sm-2 text-left" style="margin-top: 87px">
                  <div class="form-group"> 
                      <input type="hidden" name="action" value="obtenerSolicitudesTotales">
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
                      <th class="text-center">DNI</th>
                      <!-- <th class="text-center" style="display: none">Email</th>
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
                      <th class="text-center" style="display: none">Agente</th> -->
                      <th class="text-center">Tipo Crédito</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Página</th>
                      <th class="text-center">Nro sol.</th>
                      <th class="text-center">IP de Acceso</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($solicitudes) and count($solicitudes)){
                      foreach ($solicitudes as $solicitud) {
                      ?>
                      <!-- <tr class="tr-cursor-pointer tr-ver-info-solicitud" data-toggle="modal" data-target="#modalInformacionSolicitud"> -->
                      <tr class="tr-ver-info-solicitud" data-idSolicitud="<?php echo $solicitud->id_solicitud ?>">
                        <td style="display: none"><?php echo $solicitud->fecha_default ?></td>
                        <td><?php echo $solicitud->fecha_solicitud ?></td>                        
                        <td><?php echo $solicitud->nombre.' '.$solicitud->apellido ?></td>
                        
                        <td><?php echo $solicitud->dni_titular ?></td>
                        <!-- <td style="display: none"><?php echo $solicitud->email_titular ?></td>
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
                        <td style="display: none"><?php echo $solicitud->usuario_nombre.' '.$solicitud->usuario_apellido ?></td> -->

                        <td><?php echo $solicitud->producto ?></td>
                        <td>
                        <?php
                          if($solicitud->ws_error == 1 && $solicitud->fecha_final != '0000-00-00')
                          {
                            if($solicitud->status_sol == 1)
                            {
                              echo "Cerrado";
                            }
                            else
                            {
                              echo "Abierto";
                            }
                          }
                          elseif($solicitud->ws_error == 1 && $solicitud->fecha_final == '0000-00-00')
                          {
                          ?>
                          Inconcluso
                          <?php
                          }
                          else
                          {
                          ?>
                          Rechazado
                          <?php
                          } 
                          ?>
                        </td>
                        <td>
                          <?php
                          if($solicitud->last_page == 0)
                          {
                            echo "Lo sentimos";
                          }
                          elseif($solicitud->last_page == 1)
                          {
                            echo "Te contactamos";
                          }
                          elseif($solicitud->last_page == 2)
                          {
                            echo "Simulador";
                          }
                          elseif($solicitud->last_page == 3)
                          {
                            echo "Confirmar Datos";
                          }
                          elseif($solicitud->last_page == 4)
                          {
                            echo "Resumen Solicitud";
                          }
                          elseif($solicitud->last_page == 5)
                          {
                            echo "Info y Mapa";
                          }
                            ?>
                          </td>
                          <td><?php echo $solicitud->id_solicitud ?></td>
                          <td><?php echo $solicitud->ip_agencia ?></td>
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

    <!-- <div class="modal fade" id="modalInformacionSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            </div>
      </div>
    </div> -->


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

  var table = $('#tabla-solicitudes').DataTable( {

    "order": [[ 0, 'asc' ]], //defecto ordenar por columna 0 (oculta) fecha asc

      columnDefs: [
         { targets: 1, orderData: 0},   //cuando ordena por la columna 1(fecha), ordenene con los datos de la columna 0(oculta) 
     ],

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf', //pdfHtml5
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Reporte Consultas DNI por agente',
            orientation: 'landscape',
            pageSize: 'A4',
            filename: 'reporte',
            customize: function (doc) {
              doc.content[1].table.widths = 
                  Array(doc.content[1].table.body[0].length + 1).join('*').split('');

                  doc.content.forEach(function(item) {
                    item.alignment = 'center';
                  }) 

            },
            exportOptions: {
                 columns: [1, 2, 3, 4, 5, 6, 7, 8],
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Reporte Consultas DNI por agente',
            titleAttr: 'Excel',
            title: '',
            filename: 'reporte',
            header: true,
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                var clRow = $('row', sheet);
                $('row c ', sheet).each(function () {
                    $(this).attr('s', '51');
                    //$(this).attr('s', '2');
                });

            },
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 8]
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
      "pageLength": 10,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ]
  } );

  table.buttons().container()
  //.appendTo( '#tabla-solicitudes_wrapper .col-sm-6:eq(0)' );
  .appendTo( '.buttons-export' );


  var options = {

    url: function() {
      return "/C_reporte/autocompleteGetAsesor";
    },

    getValue: function(element) {
      return element.nombre+' '+element.apellido;
    },

    ajaxSettings: {
      dataType: "json",
      method: "POST",
      data: {
        dataType: "json"
      }
    },

    preparePostData: function(data) {
      data.asesor = $("#asesor").val();
      return data;
    },

    list: {
      onClickEvent: function(data) {
        var value = $("#asesor").getSelectedItemData();
        console.log(value)
        $('input[name="id_asesor"]').val(value.id);
      } 
      /*onSelectItemEvent: function() {
        var value = $("#asesor").getSelectedItemData()
        alert(1)
        console.log(value)
      }*/
    },

    requestDelay: 400
  };

  $("#asesor").easyAutocomplete(options);


  /*$('#tabla-solicitudes tbody').on('click', 'tr', function () {

    $.ajax({
        data:  {id: $(this).attr('data-idSolicitud')},
        url:   '/C_reporte/modalInformacionSolicitud',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
          console.log(response)

          var detalle = response.detalle[0];
          var asignar = response.asignar;
          var producto = '';
          if(detalle.id_producto == 1){
            producto = 'Mi Cash';
          }
          else if(detalle.id_producto == 2){
            producto = 'Auto de Prymera';
          }
          $('.modal-title').html('Resumen Solicitud - '+producto);

          $('#modalInformacionSolicitud').modal('show');
          
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
            dPrestamo += '<p><span>Auto:</span> '+detalle.marca+'</p>';
            dPrestamo += '<p><span>Modelo:</span> '+detalle.modelo+'</p>';
            dPrestamo += '<p><span>Importe Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.monto.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>Plazo:</span> '+detalle.plazo+' Meses</p>';
            dPrestamo += '<p><span>Cuota:</span> '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")).toFixed(2))+' Meses</p>';
            dPrestamo += '<p><span>Total de Pr&eacute;stamo:</span> S/ '+currency(parseFloat(detalle.cuota_mensual.replace(",", ".")*detalle.plazo.replace(",", ".")).toFixed(2))+'</p>';
            dPrestamo += '<p><span>TCEA:</span> '+detalle.tcea+'%</p>';  
          }
          
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

          $('.btn-actualizar-estado').attr('data-idSolicitud', detalle.id_solicitud);

        }
    });
       
  });*/

  /*$(".btn-actualizar-estado").click(function() {
    var status = $('#status option:selected').val();
    if(status !== ''){
      $.ajax({
        data:  {status: status, id: $(this).attr('data-idSolicitud'), id_asignar: $("#asesor option:selected").val()},
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
  });*/

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