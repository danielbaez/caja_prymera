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
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap_select/css/bootstrap-select.min.css?v=<?php echo time();?>">
	  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
	  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto_new.css?v=<?php echo time();?>">  
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<div class="col-xs-12" style="margin-bottom: 10px">
		  <div class="col-xs-12 col-sm-3"></div>
		  <div class="col-xs-12 col-sm-6">
			<h1 class="titulo-vista">Bienvenido <?php echo $nombre ?></h1>            
		  </div>
		  <div class="col-xs-12 col-sm-3 text-right">
			
		  	<span class="usuario-logueado"><?php echo _getSesion('nombreCompleto') ?></span><br>
			<?php if(_getSesion('rol') == 'administrador'){ ?>
				<a href="/C_usuario/asignarSupervisor">Asignar Supervisor</a><br>
			<a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
			<a href="/C_reporte/solicitudes">Ver Reportes</a><br>
			  <?php }
				  elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
				  <a href="/C_usuario/nuevaSolicitud">Nueva Solicitud</a><br>
				  <a href="/C_reporte/solicitudes">Ver Reportes</a><br>
			  <?php } ?>

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
            
		  
		  <div class="col-xs-12 col-md-6 col-seccion">
			<div class="col-xs-12 div-seccion">
			  <h4>Personal</h4>
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabla-usuarios">
				  <thead>
					<tr class="tr-header-reporte">
					  <th class="text-center">Nombres</th>
					  <th class="text-center">Rol</th>
					  <th class="text-center">Agencia</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($personales as $personal){
					  ?>
					<tr class="detalle-usuario" data-idUsuario="<?php echo $personal->id ?>">
					  <td><?php echo $personal->nombre.' '.$personal->apellido ?></td>
					  <td><?php echo $personal->rol ?></td>
					  <td><?php echo $personal->AGENCIA ?></td>
					</tr>
				  <?php                 
				  } ?>                
					 
				  </tbody>
				</table>
			  </div>
			</div>  
		  </div>

		  <div class="col-xs-12 col-md-6 col-seccion">
			<div class="col-xs-12 div-seccion">
			  <h4>Administrar Perfiles</h4>
			  <form class="text-center" action="C_main/registrar" method="POST" enctype="multipart/form-data">
				<div class="col-xs-12 col-sm-6">
				  <div class="">
					<img id="blah" src="<?php echo RUTA_IMG?>fondos/user.png" width="100" height="100" />
					<input type='file' id="imgInp" name="imagen" class="hidden"/>
				  </div>
				  <div class="form-group div-sexo text-left">
				  	<label class="form-label">Sexo</label>
					<select class="form-control" id="sexo" name="sexo">
					  <option value="">Sexo</option>
					  <option value="Masculino">Masculino</option>
					  <option value="Femenino">Femenino</option>
					</select>
				  </div>
				  
				  <div class="form-group text-left">
				  	<label class="form-label">DNI</label>
					<input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" onkeypress="return valida(event)" maxlength="8">
				  </div>
				  <div class="form-group div-usuario-as-email">
					<input type="text" class="form-control" placeholder="Usuario (email)" disabled>
				  </div>
				  <div class="form-group text-left">
				  	<label class="form-label">Password</label>
					<input type="text" class="form-control input-password-as-dni" placeholder="Contrase&ntilde;a (dni)" disabled>
					<input type="text" class="form-control" style="display: none" id="password" name="password">
				  </div>

				  <div class="form-group text-left">
				  	<label class="form-label">Celular</label>
					<input type="text" class="form-control" id="celular" name="celular" placeholder="Nro Cel" onkeypress="return valida(event)" maxlength="9">
				  </div>
				  
				  <div class="form-group div-rol text-left">
				  	<label class="form-label">Rol</label>
					<!-- <select class="form-control" id="rol" name="rol" onchange="verificarRol()"> -->
                    <select class="form-control cambio-rol" id="rol" name="rol">
					  <option value="">Rol</option>
					  <option value="jefe_agencia">Jefe de agencia</option>
					  <option value="asesor">asesor</option>
					</select>
				  </div>
				  <div class="form-group div-rol-superior text-left">
				  	<label class="form-label">Superior</label>
					<select disabled class="form-control ocultar" id="rol_superior" name="rol_superior">
					  <option value="">Rol Superior</option>
					  <?php   foreach ($superiores as $key => $value) {
						?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre.' '.$value->apellido ?></option>
						<?php
					  } ?>
					</select>
				  </div>

				</div>
				<div class="col-xs-12 col-sm-6">
				  <div class="form-group text-left">
				  	<label class="form-label">Nombres</label>
					<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" onkeypress="return soloLetras(event)" maxlength="50">
				  </div>
				  <div class="form-group text-left">
				  	<label class="form-label">Apellidos</label>
					<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" onkeypress="return soloLetras(event)" maxlength="100">
				  </div>
				  <div class="form-group text-left">
					<label class="form-label">Fecha de Nacimiento</label>
					<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
				  </div>
				  <div class="form-group text-left">
					<label class="form-label">Fecha de Ingreso</label>
					<input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
				  </div>
				  <div class="form-group text-left">
				  	<label class="form-label">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Correo" onchange="validaCorreo()">
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control hidden" id="nombre_img" name="nombre_img">
				  </div>
				  
				  <div class="form-group text-left div-permisos">
				  	<label class="form-label">Permisos</label>
					<div class="checkbox">

					  <label><input type="checkbox" value="2" name="permiso[]" id="permiso">Mi Cash</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" value="3" name="permiso[]" id="permiso">Vehicular</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" class="inactivo" value="0" name="permiso[]" disabled>Inactivo</label>
					</div>
				  </div>
				  <div class="form-group text-left div-agencias">
					<!-- <select class="selectpicker" data-live-search="true" title="Agencia" id="agencia" name="agencia[]" multiple> 
					  <?php //echo $comboAgencias?>
					</select>-->
					<label class="form-label">Agencias</label>
					<select multiple="" name="agencia[]" class="form-control" id="agencias" disabled>
    			     <?php foreach ($agencias as $key => $value) {
                        ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->AGENCIA ?></option>
                        <?php
                      } ?>
	               </select>
				  </div>
                </div>
				<div class="col-xs-12">
				  <div class="form-group col-xs-6 text-left">
					<a onclick="limpiar()" class="limpiar-form">Limpiar pantalla</a>
				  </div>
				  <div class="form-group col-xs-6 text-right">
					
					<input type="hidden" name="action" value="save">
					<input type="hidden" name="id_usuario" value="">
					<input type="hidden" name="rol_db" value="">
					<input type="hidden" name="rol_user" value="<?php echo _getSesion('rol') ?>">
					<?php if(_getSesion('rol') == 'administrador'){ ?>
						<input type="submit" name="" class="btn btn-primary btn-action" value="Guardar">
					<?php } ?>
				<?php if(_getSesion('rol') == 'jefe_agencia'){ ?>
						<input type="submit" name="" class="btn btn-primary btn-only-upd" value="Actualizar" style="display: none">
					<?php } ?>
					<!-- <input type="button" name="" class="btn btn-primary aparece hidden" onclick="actualizarDatos()" value="Actualizar"> -->
				  </div>
				</div>
			  </form>
		  </div>  
		</div>
	  </div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
	  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap_select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
		<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	  <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsmain.js?v=<?php echo time();?>"></script>
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

	  <script>

	  	$(document).ready(function() {

  var table = $('#tabla-usuarios').DataTable( {

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
      "pageLength": 15,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ],
      "dom": 'rtp'
  } );

  		var rol_user = $('input[name="rol_user"]').val();

	  	if(rol_user == 'jefe_agencia'){

	  		$("#blah").off('click');

	  		$('#nombres').attr('disabled', true)
            $('#sexo').attr('disabled', true)
            $('#apellidos').attr('disabled', true)
            $('#fecha_ingreso').attr('disabled', true)
            $('#fecha_nacimiento').attr('disabled', true)
            $('#dni').attr('disabled', true)
            $('#email').attr('disabled', true)
            $('#celular').attr('disabled', true)
            $('#rol').attr('disabled', true)
            $('#rol_superior').attr('disabled', true)
            $('#agencias').attr('disabled', true)
            $('input[name="permiso[]"]').attr('disabled', true)
	  	}	  					

	  	$('.limpiar-form').click(function() {

	  		var rol_user = $('input[name="rol_user"]').val();


            if(rol_user == 'jefe_agencia'){
            	$('.btn-only-upd').hide();

            	$("#blah").off('click');

            	//$("#blah").bind('click', alert(1));
            	
            	$('#nombres').attr('disabled', true)
	            $('#sexo').attr('disabled', true)
	            $('#apellidos').attr('disabled', true)
	            $('#fecha_ingreso').attr('disabled', true)
	            $('#fecha_nacimiento').attr('disabled', true)
	            $('#dni').attr('disabled', true)
	            $('#email').attr('disabled', true)
	            $('#celular').attr('disabled', true)
	            $('#rol').attr('disabled', true)
	            $('#rol_superior').attr('disabled', true)
	            $('#agencias').attr('disabled', true)
	            $('input[name="permiso[]"]').attr('disabled', true)
            }
            else
            {
            	$('#blah').on('click', function () {
				    $( "#imgInp" ).trigger( "click" );
				});
				
            	$('#rol_superior').attr('disabled', true)
            	$('.div-permisos').show();
            	$('.div-rol').show();
            	$('.div-agencias').show();
            	$('.div-usuario-as-email').show();
						$('.input-password-as-dni').show();
						$('input[name="password"]').hide();

		  		//$('input[type="submit"]').val('Guardar');
		  		$('.btn-action').val('Guardar');
		  		$("input[name='permiso[]']").prop("checked", false);
		  		$('.div-rol-superior').show();

		  		$.ajax({
					data:  {},
					url:   '/C_main/getDefaultAgencias',
					type:  'post',
					dataType: 'json',
					success:  function (response) {
						var append = '';
						for(var i = 0; i<response.length; i++){
							append +="<option value="+response[i].id+">"+response[i].AGENCIA+"</option>";
						}

						$('#agencias').html(append);

						$('#agencias').attr('multiple','multiple');
						$('#agencias').attr('disabled', true)
						$('input[name="action"]').val('save');
					}
				});
	  		}

	  		$('input:checkbox[name="permiso[]"][value="2"]').prop('disabled', false).prop('checked', false);
	  		$('input:checkbox[name="permiso[]"][value="3"]').prop('disabled', false).prop('checked', false);
	  		$('input:checkbox[name="permiso[]"][value="0"]').prop('disabled', true).prop('checked', false);

	  		$('#blah').attr('src', '/public/img/fondos/user.png');


	  	});

        $(".cambio-rol").change(function() {

        	$('#rol_superior').attr('disabled', false)
            if($(this).val() == 'jefe_agencia'){
                $('.div-rol-superior').hide();
                

                $.ajax({
				data:  {id: $(this).val(), action: 'jefe'},
				url:   '/C_main/getAgencias',
				type:  'post',
				dataType: 'json',
				success:  function (response) {
					console.log(response)
					var append = '';
					for(var i = 0; i<response.length; i++){
						append +="<option value="+response[i].id+">"+response[i].AGENCIA+"</option>";
					}

					$('#agencias').html(append);

					$('#agencias').attr('multiple','multiple');



					$('#agencias').attr('disabled', false)

				}
				})

            }
            else if($(this).val() == 'asesor'){
                $('.div-rol-superior').show();
                $('#agencias').attr('disabled', true)

            }
            else{
            	$('#agencias').attr('disabled', true)
            	$('#rol_superior').attr('disabled', true)
            }
        });


        $("#rol_superior").change(function() {
            if($(this).val() != "" && $('#rol').val() != ""){
            	//alert($(this).val())
            	$.ajax({
				data:  {id: $(this).val(), action: 'asesor'},
				url:   '/C_main/getAgencias',
				type:  'post',
				dataType: 'json',
				success:  function (response) {
					console.log(response)
					var append = '';
					for(var i = 0; i<response.length; i++){
						append +="<option value="+response[i].id+">"+response[i].AGENCIA+"</option>";
					}

					$('#agencias').html(append);
					$("#agencias").removeAttr('multiple');

					$('#agencias').attr('disabled', false)

				}
				})

            }else{
            	$('#agencias').html('');

            }
        });

        $('#tabla-usuarios tbody').on('click', 'tr', function () {
		//$(".detalle-usuario").click(function() {
			$.ajax({
				data:  {id: $(this).attr('data-idUsuario')},
				url:   '/C_usuario/detalleUsuario',
				type:  'post',
				dataType: 'json',
				success:  function (response) {
					
					console.log(response)

					$('.inactivo').attr('disabled', false)

					$('input[name="action"]').val('update');
					$('input[name="id_usuario"]').val(response[0].id);
					$('input[name="rol_db"]').val(response[0].rol);


					//$('input[type="submit"]').val('Actualizar');
					$('.btn-action').val('Actualizar');

					var cargarAgencias = response[0].cargarAgencias;
					var append = '';
					for(var i = 0; i<cargarAgencias.length; i++){
						append +="<option value="+cargarAgencias[i].id+">"+cargarAgencias[i].AGENCIA+"</option>";
					}

					$('#agencias').html(append);

					$('#agencias').attr('disabled', false)
					$('#agencias').attr('multiple','multiple');

					$('#nombres').val(response[0].nombre);
					$('#apellidos').val(response[0].apellido);
					$('#sexo').val(response[0].sexo);
					$('#dni').val(response[0].dni);
					$('#fecha_nacimiento').val(response[0].fecha_nac);
					$('#fecha_ingreso').val(response[0].fecha_ingreso);
					$('#email').val(response[0].email);
					$('#celular').val(response[0].celular);

                    if(response[0].imagen){
                        $('#blah').attr('src', '/public/img/usuarios/'+response[0].imagen);
                    }else{
                    	$('#blah').attr('src', '/public/img/fondos/user.png');
                    }

                    var rol_user = $('input[name="rol_user"]').val();


                    if(rol_user == 'jefe_agencia'){
                    	$('.btn-only-upd').show();
                    }

					if(rol_user == 'administrador' && response[0].rol == 'administrador'){
						$("#rol option[value='']").attr("selected", "selected");
						$('.div-rol').hide();
						$('.div-rol-superior').hide();
						$('.div-agencias').hide();
						$('.div-permisos').hide();

						$('.div-usuario-as-email').hide();
						$('.input-password-as-dni').hide();
						$('input[name="password"]').show();

					}


					else if(rol_user == 'administrador' && response[0].rol == 'jefe_agencia'){

						$('.div-usuario-as-email').hide();
						$('.input-password-as-dni').hide();
						$('input[name="password"]').show();


						$('.div-agencias').show();
						$('.div-rol').show();
						$('.div-permisos').show();
						$('#rol').val(response[0].rol);
						$('.div-rol-superior').hide();
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val(response[0].id_agencia.split(','));

					}

					else if(rol_user == 'administrador' && response[0].rol == 'asesor'){

						$('.div-usuario-as-email').hide();
						$('.input-password-as-dni').hide();
						$('input[name="password"]').show();

                        $('.div-agencias').show();
						  $('.div-rol').show();
						  $('.div-permisos').show();
						  $('.div-rol-superior').show();
						$('#rol').val(response[0].rol);
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val([response[0].id_agencia]);

                        $("#agencias").removeAttr('multiple');

					}

					else if(rol_user == 'jefe_agencia' && response[0].rol == 'asesor'){

						//$("#blah").unbind("click")
						$("#blah").off('click');

						$('.div-usuario-as-email').hide();
						$('.input-password-as-dni').hide();
						$('input[name="password"]').show();

                        $('.div-agencias').show();
						  $('.div-rol').show();
						  $('.div-permisos').show();
						  $('.div-rol-superior').show();
						$('#rol').val(response[0].rol);
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val([response[0].id_agencia]);

                        $("#agencias").removeAttr('multiple');


                        $('#nombres').attr('disabled', true)
                        $('#sexo').attr('disabled', true)
                        $('#apellidos').attr('disabled', true)
                        $('#fecha_ingreso').attr('disabled', true)
                        $('#fecha_nacimiento').attr('disabled', true)
                        $('#dni').attr('disabled', true)
                        $('#email').attr('disabled', true)
                        $('#celular').attr('disabled', true)
                        $('#rol').attr('disabled', true)
                        $('#rol_superior').attr('disabled', true)
                        $('#agencias').attr('disabled', true)
                        $('input[name="permiso[]"]').attr('disabled', true)


					}


					/*else if(response[0].rol == 'jefe_agencia'){
						$('.div-agencias').show();
					  $('.div-rol').show();
					  $('.div-permisos').show();
						$('#rol').val(response[0].rol);
						$('.div-rol-superior').hide();
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val(response[0].id_agencia.split(','));

					}
					else if(response[0].rol == 'asesor'){
						$('.div-agencias').show();
						  $('.div-rol').show();
						  $('.div-permisos').show();
						  $('.div-rol-superior').show();
						$('#rol').val(response[0].rol);
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val([response[0].id_agencia]);

                        $("#agencias").removeAttr('multiple');
						
					}*/

					console.log(response[0].permiso)

                    var per = response[0].permiso.split(',');

                    $('input[name="permiso[]"]').each(function() {
   
					    $(this).prop('checked', false);
					  });

                    for(var c= 0; c<per.length; c++){
                    	$("input[name='permiso[]'][value='"+per[c]+"']").prop("checked", true);
                    }
					
				}
			  });
		  });

	var a = "<?php echo $this->session->flashdata('msg'); ?>";

	if(a){
		//msj("success", a);
	}


	$('input[name="permiso[]"]').change(function() {
		
        if($(this).is(":checked")) {
        	if($(this).val() == 0){
        		$('input:checkbox[name="permiso[]"][value="2"]').prop('disabled', true).prop('checked', false);
        		$('input:checkbox[name="permiso[]"][value="3"]').prop('disabled', true).prop('checked', false);
        	}
        }else{
        	$('input:checkbox[name="permiso[]"][value="2"]').prop('disabled', false).prop('checked', false);
    		$('input:checkbox[name="permiso[]"][value="3"]').prop('disabled', false).prop('checked', false);
        }
        
    });



});

	  	

	  </script>
	</body>
</html>