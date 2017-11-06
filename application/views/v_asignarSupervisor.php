<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Caja prymera</title>
    <meta charset="utf-8">    
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">   
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
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
          <li><a href="/C_main">Editar Perfil</a></li>
          <li><a href="/C_horario">Horarios</a></li>
          <li><a href="/C_IP">Asignar IP</a></li>
          <li><a href="/C_reporte/solicitudes">Ver Reportes</a></li>
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
            <h1 class="titulo-vista">Asignaci&oacute;n de Asesores</h1>            
          </div>
          <div class="hidden-xs col-sm-3 text-right">
            <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">                    
                          <?php if(_getSesion('rol') == 'administrador'){ ?>
                            <li><a href="/C_main">Editar Perfil</a></li>
                            <li><a href="/C_horario">Horarios</a></li>
                            <li><a href="/C_IP">Asignar IP</a></li>
                            <li><a href="/C_reporte/solicitudes">Ver Reportes</a></li>
                          <?php } ?>
                          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                      </li>
                  </ul>
            </div>
          
          <div class="col-xs-12 col-md-6 col-seccion">
            <div class="col-xs-12 div-seccion">
              <h4>Personal</h4>
              <br>
              <div class="agregar_tabla">
                <div class="table-responsive">
                
                <table id="tabla-personal" class="table table-bordered">
                  <thead>
                    <tr class="tr-header-reporte">
                      <th class="text-center widht-opt-select">Opt</th>
                      <th class="text-center">Nombres</th>
                      <th class="text-center">Rol</th>
                      <th class="text-center">Agencia</th>
                    </tr>
                  </thead>
                  <tbody class="agregar">
                    <?php foreach($personales as $personal){
                      ?>
                    <tr id="check_<?php echo $personal->id ?>">
                      <td>
                        <input type="checkbox" data-nombre="<?php echo $personal->nombre ?>" data-apellido="<?php echo $personal->apellido ?>" data-rol="<?php echo $personal->rol ?>" data-agencia="<?php echo $personal->agencia ?>" name="id_asesor[]" value="<?php echo $personal->id ?>">
                      </td>                    
                      <td><?php echo $personal->nombre.' '.$personal->apellido ?></td>
                      <td><?php echo ucfirst($personal->rol) ?></td>
                      <td><?php echo $personal->agencia ?></td>
                    </tr>
                  <?php } ?>                
                  </tbody>
                </table>
              </div>
              </div>
              <div class="text-right div-agregar-personal-link hidden">
                <a onclick="agregarPersonal()">Agregar ></a>  
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 col-seccion">
            <div class="col-xs-12 div-seccion">
              <form class="form-horizontal form-asignar-supervisor">
                <div class="form-group">
                  <label class="control-label col-sm-4" for="supervisor">Jefe de Agencia:</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="supervisor" id="supervisor">
                  </div>
                  <div class="col-sm-6" style="margin-left: 178px;margin-top: 12px;">
                    <select class="form-control cambio-rol" id="agencias" name="agencias" onchange="getAsesoresByAgencia()">
                      <option value="">Agencias</option>
                    </select>
                  </div>
                </div>
                 <!-- <div class="form-group">
                  <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <textarea class="form-control" name="personal" id="personal"></textarea>
                  </div>
                </div> -->
                
                <div class="form-group div-personales-agregados" style="margin-left: 12px;">
                  <label class="control-label col-sm-4" for="supervisor">Personal Asignado:</label>
                  <div class="col-sm-offset-3 col-sm-6 col-personales-agregados" style="background: #dadada;margin-left: -2px;" id="personalAsignado">
                  </div>
                </div>
                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="button" style="margin-left: -68px;" class="btn btn-primary" onclick="guardatAsesoresAsignados()">Asignar</button>
                  </div>
                </div>
              </form>
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
<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
<script type="text/javascript" async src="<?php echo RUTA_JS?>jsasignarsupervisor.js?v=<?php echo time();?>"></script>
<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>

      <script type="text/javascript">

  $(document).ready(function() {

  var table = $('#tabla-personal').DataTable( {

    //columnDefs: [ { orderable: false, targets: [0]}],
    "columnDefs": [ {
      "targets": 0,
      "searchable": false
    } ],

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf',
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Busqueda Solicitud - Filtros',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            filename: 'reporte',
            customize: function (doc) {
              doc.content[1].table.widths = 
                  Array(doc.content[1].table.body[0].length + 1).join('*').split('');
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
 
                //$('row c[r^="A"]', sheet).attr( 's', '2');
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
      ],
      "dom": 'rtp'
  } );
        
        var options = {

          url: function() {
            return "/C_usuario/autocompleteGetJefe";
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
            data.supervisor = $("#supervisor").val();
            return data;
          },

          list: {
            onClickEvent: function(data) {
              var value = $("#supervisor").getSelectedItemData();
              return;
              //var value = $("#supervisor").val();
              //console.log(value);
              $.ajax({
                data  : { id  : value.id},
                url   : '/C_usuario/actualizarTabla',
                type  : 'POST'
              }).done(function(data){
                try{
                  data = JSON.parse(data);
                  if(data.error == 0){
                    $('#agencias').html('');
                    $('#agencias').append('<option value="">Agencias</option>');
                    $('#agencias').append(data.comboAgencias);
                    /*$('.agregar').html('');
                    $('.agregar').append(data.html);*/
                  }else {
                    return;
                  }
                } catch (err){
                  msj('error',err.message);
                }
              });
            },
            onKeyEnterEvent: function(data) {
              console.log('entra');
              alert('123');
              return;
            }
          },

          requestDelay: 400
        };

        $("#supervisor").easyAutocomplete(options);

      });

      </script>
    </body>
</html>