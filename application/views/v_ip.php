<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Caja prymera</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">		
		<link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">		
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">

        <link href="https://unpkg.com/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">

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
            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
            <li><a href="/C_horario">Horarios</a></li>
            <li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
            <li><a href="/C_crearAgencia" class="navegacion-a">Administrar Agencia</a></li>
        <?php }
        	 elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
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
			<h1 class="titulo-vista">Bienvenido(a) <?php echo $nombre ?></h1>            
		  </div>
		  <div class="hidden-xs col-sm-3 text-right">
            <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">                    
                          <?php if(_getSesion('rol') == 'administrador'){ ?>
                          	<li><a href="/C_main">Editar Perfil</a></li>
                            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
                            <li><a href="/C_horario">Horarios</a></li>
	                    	<li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
                        <li><a href="/C_crearAgencia" class="navegacion-a">Administrar Agencia</a></li>
                          <?php }
                             elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
                            <li><a href="/C_reporte/solicitudes">Ver Reportes</a></li>
                          <?php } ?>
                          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                      </li>
                  </ul>
            </div>

		    <?php
            $msg = $this->session->flashdata('msg');
            if(isset($msg)) {
            ?>
              <div class="col-xs-12">
	            <div class="alert alert-success" style="font-size: 16px; padding: 10px 20px; margin-bottom: 0px; margin-top: 10px;">
	                <?php echo $msg; ?>
	            </div>
	          </div>
            <?php
            }
            ?>
            
		  
		  <div class="col-xs-12 col-md-12 col-seccion">
			<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 div-seccion">
			<form class="form" action="/C_ip/save" method="POST" id="form-ip">
        <h4>Asignar IP</h4>
        <p><input id="switch-state" type="checkbox" data-on-text="SI" data-off-text="NO" <?php echo $acceso[0]->ip == 1 ? 'checked="checked"' : ''; ?>" name="acceso"></p>
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabla-agencias">
				  <thead>
					<tr class="tr-header-reporte">
				      <th class="text-center">Agencias</th>
					  <th class="text-center">IP</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
					$count = 0;
					 foreach($agencias as $agencia){
					 	$count++;
					 	$variable = 'desde[]';
					 	if($count == 2){
					 		$variable = 'hasta[]';
					 	}
					  ?>
					  	<tr>
					  	<td><?php echo $agencia->AGENCIA ?></td>
						<td><input name="agencia[<?php echo $agencia->id ?>]" style="width: 85%; margin:auto" type="text" value="<?php echo $agencia->ip ?>" class="form-control" id="ip"></td>
					    </tr>
					  <?php                 
					  	}
					  ?>               
				  </tbody>
				</table>
			  </div>
			  <div class="col-xs-12" style="padding-bottom: 10px">
				<input type="submit" class="btn btn-lg" name="" value="Guardar" style="color:white">
			  </div>
			</form>
			</div>			  
		  </div>
	  </div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
	  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>

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


<script src="<?php echo RUTA_JS?>highlight.js"></script>
<script src="https://unpkg.com/bootstrap-switch"></script>

<script>

$(document).ready(function() {

  window.hljs.initHighlightingOnLoad();

  $('input[type="checkbox"], input[type="radio"]')
    .not('[data-switch-no-init]')
    .bootstrapSwitch()

  $('input[name="acceso"]').on('switchChange.bootstrapSwitch', function(event, state) {
    console.log(this); // DOM element
    console.log(event); // jQuery event
    console.log(state); // true | false

  });

	var table = $('#tabla-agencias').DataTable( {

      lengthChange: false,

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
      "pageLength": 5,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ],
      "dom": 'rtp'
  	} );


   $('#form-ip').on('submit', function(e){
      var form = this;
      var params = table.$('input,select,textarea').serializeArray();
      $.each(params, function(){     
        if(!$.contains(document, form[this.name])){
            $(form).append(
               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', this.name)
                  .val(this.value)
        	);
        } 
      });    
   });      

});
	  </script>
	</body>
</html>