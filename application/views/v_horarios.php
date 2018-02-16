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
            <li><a href="/C_crearAgencia" class="navegacion-a">Administrar Agencia</a></li>
            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
        	<li><a href="/C_main">Editar Perfil</a></li>
            <li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
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
	                    	<li><a href="/C_crearAgencia" class="navegacion-a">Administrar Agencia</a></li>
                            <li><a href="/C_usuario/asignarSupervisor">Asignar Asesores</a></li>
                          	<li><a href="/C_main">Editar Perfil</a></li>
	                    	<li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
	                    	<li><a href="/C_ip">Asignar IP</a></li>
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
			<div class="col-xs-12 div-seccion">
				<form class="form" action="/C_horario/save" method="POST">
					<input type="hidden" name="name">
				  <h4>Horario</h4>
				  
				  <p><input id="switch-state" type="checkbox" data-on-text="SI" data-off-text="NO" 
				  	<?php 
				  	if(isset($accesoHorario)) {
				  		echo $accesoHorario[0]->horario == 1 ? 'checked="checked"' : ''; 
				  	}
			  		?>
				  	name="acceso"></p>
				  <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3" style="margin-bottom: 15px">
				  	<select style="" id="agencia" name="agencia" class="form-control">
				  	<option value="">Seleccione una agencia</option>
				  	<?php foreach ($agencias as $agencia): ?>
				  		<option <?php if($agencia_selected == $agencia->id){ echo 'selected'; } ?> value="<?php echo $agencia->id ?>"><?php echo $agencia->AGENCIA ?></option>
				  	<?php endforeach ?>
				  </select>	
				  </div>
				  <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3" style="margin-bottom: 15px">
				      <select style="" id="rol" name="rol" class="form-control">
				      <option value="">Seleccione un rol</option>
				      <option value="jefe_agencia" <?php if($rol_selected == "jefe_agencia"){ echo 'selected'; } ?>>Jefe</option>
					  <option value="asesor" <?php if($rol_selected == "asesor"){ echo 'selected'; } ?>>Agente</option>
					  <option value="asesor_externo" <?php if($rol_selected == "asesor_externo"){ echo 'selected'; } ?>>Agente Externo</option>
				      </select>
				  </div>
				  <?php if(is_array($horarios)){ ?>
				  <div class="col-xs-12">				  	
				  	<div class="table-responsive">
					<table class="table table-bordered" id="tabla-usuarios">
					  <thead>
						<tr class="tr-header-reporte">
					      <th class="text-center">Hora</th>
						  <th class="text-center">Lunes</th>
						  <th class="text-center">Martes</th>
						  <th class="text-center">Miercoles</th>
						  <th class="text-center">Jueves</th>
						  <th class="text-center">Viernes</th>
						  <th class="text-center">Sabado</th>
						  <th class="text-center">Domingo</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
						if(is_array($horarios) && count($horarios))
						{
						$count = 0;
						 foreach($horarios as $horario){
						 	$count++;
						 	$variable = 'desde[]';
						 	if($count == 2){
						 		$variable = 'hasta[]';
						 	}
						  ?>
						  	<tr>
						  	<td><?php if($count == 1){ echo "Desde"; } else { echo "hasta"; }  ?></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->lunes ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->martes ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->miercoles ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->jueves ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->viernes ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->sabado ?>" class="form-control" id="time"></td>
							<td><input name="<?php echo $variable ?>" style="width: 95%; margin:auto" type="time" value="<?php echo $horario->domingo ?>" class="form-control" id="time"></td>
						    </tr>
						  <?php                 
						  	}
						}
						else
						{
						?>
							<tr>
								<td>Desde</td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="desde[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
							</tr>
							<tr>
								<td>Hasta</td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
								<td><input name="hasta[]" style="width: 100%; margin:auto" type="time" value="" class="form-control" id="time"></td></td>
							</tr>
						<?php
						}
						?>               
					  </tbody>
					</table>
				  	</div>
				  </div>	
				  <?php } ?>  
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

	  		$('#agencia').on('change', function() {
			  //alert( this.value );
			  var rol = $('#rol option:selected').val();
			  //if(rol != '' && this.value != '') {
			  	window.location.href = '/C_horario/agencia?agencia='+this.value+'&rol='+rol;	
			  //}
			  
			})

			$('#rol').on('change', function() {
			  //alert( this.value );
			  var agencia = $('#agencia option:selected').val();
			  window.location.href = '/C_horario/agencia?agencia='+agencia+'&rol='+this.value;
			})

			$('form').on('submit', function(){
				var n = $('#agencia option:selected').text();
			  	$('input[name="name"]').val(n);
			});
});


	  </script>
	</body>
</html>