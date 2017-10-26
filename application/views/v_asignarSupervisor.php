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
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
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
        
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css">

        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
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
            <span class="usuario-logueado"><?php echo _getSesion('nombreCompleto') ?></span><br>
            <a href="/C_main">Editar Perfil</a><br>
            <a href="/C_usuario/nuevaSolicitud">Crear Solicitud</a><br>
            <a href="/C_reporte/solicitudes">Ver Reportes</a><br>
            <a href="/C_usuario/logout">Cerrar Sesi&oacute;n</a><br>
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
                      <td><?php echo $personal->rol ?></td>
                      <td><?php echo $personal->agencia ?></td>
                    </tr>
                  <?php } ?>                
                  </tbody>
                </table>
              </div>
              </div>
              <div class="text-right div-agregar-personal-link">
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
                
                <div class="form-group div-personales-agregados">
                  <div class="col-sm-offset-3 col-sm-6 col-personales-agregados" style="background: #dadada;" id="personalAsignado">
                  </div>
                </div>
                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-8">
                    <button type="button" class="btn btn-primary" onclick="guardatAsesoresAsignados()">Asignar</button>
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

      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
      <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
      <script type="text/javascript" async src="<?php echo RUTA_JS?>jsasignarsupervisor.js?v=<?php echo time();?>"></script>
      <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>

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
            } 
          },

          requestDelay: 400
        };

        $("#supervisor").easyAutocomplete(options);

      });

      </script>
    </body>
</html>