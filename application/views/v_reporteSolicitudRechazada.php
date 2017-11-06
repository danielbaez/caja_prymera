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
          <li><a href="/C_IP">Asignar IP</a></li>
          <li><a href="/C_main">Editar Perfil</a></li>
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
                            <li><a href="/C_IP">Asignar IP</a></li>
                            <li><a href="/C_main">Editar Perfil</a></li>
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
              <li class="active"><a href="/C_reporte/solicitudRechazada" class="nav-active-a">Solicitudes Rechazadas</a></li>
            </ul>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-12 col-border-filtros-reporte">
              <h4 class="titulo-vista">B&uacute;squeda Consolidado - Total Solicitudes Rechazadas</h4>
              <form class="form-horizontal" method="POST" action="/C_reporte/solicitudRechazada">
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="asesor">Agente:</label>                
                      <input type="text" class="form-control" name="asesor" value="<?php echo isset($asesor) ? $asesor : '' ?>" id="asesor" placeholder="Nombre Agente">
                      <input type="hidden" class="form-control" name="id_asesor" value="<?php echo isset($id_asesor) ? $id_asesor : '' ?>">
                    </div>  
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                      <label for="desde">Desde:</label>
                        <?php if(isset($desde)){ ?>
                          <input type="date" name="fecha_desde" class="form-control" value="<?php echo $desde ?>" id="fecha_desde">
                        <?php }
                        else{
                        ?>
                        <input type="date" name="fecha_desde" class="form-control" id="fecha_desde">
                        <?php
                        }
                        ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-left">
                    <label for="agencia">Agencia:</label>                
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
                      <label for="hasta">Hasta:</label>
                      <?php if(isset($hasta)){ ?>
                          <input type="date" name="fecha_hasta" class="form-control" value="<?php echo $hasta ?>" id="fecha_hasta">
                        <?php }
                        else{
                        ?>
                        <input type="date" name="fecha_hasta" class="form-control" id="fecha_hasta">
                        <?php
                        }
                        ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-2 text-left" style="margin-top: 87px">
                  <div class="form-group"> 
                    <input type="hidden" name="action" value="obtenerSolicitudRechazada">
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
                      <th class="text-center" style="display: none">Nro Cel</th>
                      <th class="text-center" style="display: none">Fijo</th>
                      <th class="text-center" style="display: none">Nro Solicitud</th>
                      <th class="text-center">Agencia</th>
                      <th class="text-center">Tipo Crédito</th>
                      <th class="text-center">Status</th>
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
                        <td style="display: none"><?php echo $solicitud->celular_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->nro_fijo_titular ?></td>
                        <td style="display: none"><?php echo $solicitud->id_solicitud ?></td>
                        <td><?php echo $solicitud->agencia ?></td>
                        <td><?php echo $solicitud->producto ?></td>
                        <td>Rechazado</td>
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
                  
                  <div class="col-xs-12 col-sm-4 col-sm-offset-2 text-left div-datos-solicitud">
                  </div>
                </div>             
             
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
            title: 'Busqueda Consolidado - Total Solicitudes Rechazadas',
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
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Busqueda Consolidado - Total Solicitudes Rechazadas',
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
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
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

        $.ajax({
          data:  {id_asesor: value.id},
          url:   '/C_reporte/getAgenciaByAsesor',
          type:  'post',
          dataType: 'json',
          success:  function (response) {
            $('#agencia').html('').append('<option value="">Agencia</option><option selected value="'+response[0].id+'">'+response[0].AGENCIA+'</option>')
          }
        });

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

  $('#agencia').change(function() {
    if($(this).val() == '' && $('#asesor').val() != ''){
      $('#asesor').val('');
      $('input[name="id_asesor"]').val('');

      $.ajax({
        data:  {},
        url:   '/C_reporte/getAgenciaByAsesor',
        type:  'post',
        dataType: 'json',
        success:  function (response) {
          var opt = '<option value="">Agencia</option>';
          for(var i = 0; i<response.length; i++){
            opt += '<option value="'+response[i].id+'">'+response[i].AGENCIA+'</option>';
          }
          $('#agencia').html('').append(opt)
        }
      });

    }
  })

  $('#tabla-solicitudes tbody').on('click', 'tr', function () {
  //$(".tr-ver-info-solicitud").click(function() {
      $.ajax({
          data:  {id: $(this).attr('data-idSolicitud'), action:'rechazados'},
          url:   '/C_reporte/modalInformacionSolicitud',
          type:  'post',
          dataType: 'json',
          success:  function (response) {

            var detalle = response.detalle[0];

            var producto = '';
          if(detalle.id_producto == 1){
            producto = 'Mi Cash';
          }
          else if(detalle.id_producto == 2){
            producto = 'Auto de Prymera';
          }
          $('.modal-title').html('Resumen Solicitud - '+producto);

            $('#modalInformacionSolicitud').modal('show');
            console.log(detalle)
            var dCliente = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos del Cliente</h4>';
            dCliente += '<p><span>Titular:</span> '+detalle.nombre_titular+' '+detalle.apellido_titular+'</p>';
            dCliente += '<p><span>DNI Titular:</span> '+detalle.dni_titular+'</p>';
            dCliente += '<p><span>E-mail:</span> '+detalle.email_titular+'</p>';
            dCliente += '<p><span>Nro. Cel:</span> '+detalle.celular_titular+'</p>';
            dCliente += '<p><span>Fijo:</span> '+detalle.nro_fijo_titular+'</p>';
            $('.div-datos-cliente').html(dCliente);

            var dSolicitud = '<h4 class="modal-reporte-informacion-solicitud-titulo">Datos de Solicitud</h4>';
            dSolicitud += '<p><span>Nro. Solicitud:</span> '+detalle.id_solicitud+'</p>';
            dSolicitud += '<p><span>Fecha Solicitud:</span> '+detalle.fecha_solicitud+'</p>';
            dSolicitud += '<p><span>Hora:</span> '+detalle.hora_solicitud+'</p>';
            dSolicitud += '<p><span>Agencia:</span> '+detalle.agencia+'</p>';
            dSolicitud += '<p><span>Agente:</span> '+detalle.usuario_nombre+' '+detalle.usuario_apellido+'</p>';

            $('.div-datos-solicitud').html(dSolicitud);

          }
      });
       
  });

  $('.export-excel').click(function(){

    $('#tabla-solicitudes thead').prepend('<tr class="text-right"><td colspan="5">Búsqueda Consolidado - Total Solicitudes Rechazadas</td></tr>').find('tr:first').hide();

    $("#tabla-solicitudes").table2excel({
        filename: "reporte.xls"
    });
    /*$('input[name="reporte"]').val('excel');
    $('form').submit();*/
  })
  
} );

</script>
    </body>
</html>