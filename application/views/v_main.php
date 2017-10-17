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
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
			<h1 class="titulo-vista">Bienvenido <?php echo $nombre ?></h1>            
		  </div>
		  <div class="col-xs-12 col-sm-3 text-right">
			

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
		  
		  <div class="col-xs-12 col-md-6 col-seccion">
			<div class="col-xs-12 div-seccion">
			  <h4>Personal</h4>
			  <div class="table-responsive" style="height: 250px; overflow: scroll;">
				<table class="table table-bordered">
				  <thead>
					<tr>
					  <th class="text-center">Nombres</th>
					  <th class="text-center">Rol</th>
					  <th class="text-center">Agencia</th>
					</tr>
				  </thead>
				  <!-- <tbody>
					<?php foreach($personales as $personal){
					  ?>
					<tr>
					  <td onclick="setearCampos(this, <?php echo $personal->id ?>)" id="nombre_pers_<?php echo $personal->id ?>"><?php echo $personal->nombre ?></td>
					  <td id="rol_pers_<?php echo $personal->id ?>"><?php echo $personal->rol ?></td>
					  <td id="agencia_pers_<?php echo $personal->id ?>"><?php echo $personal->AGENCIA ?></td>
					</tr>
				  <?php                 
				  } ?>                
					 
				  </tbody> -->

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
				  <div class="form-group">
					<img id="blah" src="<?php echo RUTA_IMG?>fondos/user.png" width="100" height="100" />
					<input type='file' id="imgInp" name="imagen" class="hidden"/>
				  </div>
				  <div class="form-group div-sexo">
					<select class="form-control" id="sexo" name="sexo">
					  <option value="">Sexo</option>
					  <option value="Masculino">Masculino</option>
					  <option value="Femenino">Femenino</option>
					</select>
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" onkeypress="return valida(event)" maxlength="8">
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a (dni)" disabled>
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control" id="celular" name="celular" placeholder="Nro Cel" onkeypress="return valida(event)" maxlength="9">
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Usuario (email)" disabled>
				  </div>
				  <div class="form-group div-rol">
					<!-- <select class="form-control" id="rol" name="rol" onchange="verificarRol()"> -->
                    <select class="form-control cambio-rol" id="rol" name="rol">
					  <option value="">Rol</option>
					  <option value="jefe_agencia">Jefe de agencia</option>
					  <option value="asesor">asesor</option>
					</select>
				  </div>
				  <div class="form-group div-rol-superior">
					<select class="form-control ocultar" id="rol_superior" name="rol_superior">
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
				  <div class="form-group">
					<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" onkeypress="return soloLetras(event)" maxlength="50">
				  </div>
				  <div class="form-group">
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
				  <div class="form-group">
					<input type="text" class="form-control" id="email" name="email" placeholder="Correo" onchange="validaCorreo()">
				  </div>
				  <div class="form-group">
					<input type="text" class="form-control hidden" id="nombre_img" name="nombre_img">
				  </div>
				  
				  <div class="form-group text-left div-permisos">
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
					<input type="submit" name="" class="btn btn-primary oculto" value="Guardar">
					<input type="hidden" name="action" value="save">
					<input type="hidden" name="id_usuario" value="">
					<input type="hidden" name="rol_db" value="">
					<input type="button" name="" class="btn btn-primary aparece hidden" onclick="actualizarDatos()" value="Actualizar">
				  </div>
				</div>
			  </form>
		  </div>  

		</div>
	  </div>
	  <br>
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
	  <script>

	  	$('.limpiar-form').click(function() {
	  		$('input[type="submit"]').val('Guardar');
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
				}
			});


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

		$(".detalle-usuario").click(function() {
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


					$('input[type="submit"]').val('Actualizar');

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
                    }

					if(response[0].rol == 'administrador'){
						$('.div-rol').hide();
						$('.div-rol-superior').hide();
						$('.div-agencias').hide();
						$('.div-permisos').hide();
					}
					else if(response[0].rol == 'jefe_agencia'){
						$('.div-agencias').show();
					  $('.div-rol').show();
					  $('.div-permisos').show();
						$('#rol').val(response[0].rol);
						$('.div-rol-superior').hide();
						$('#rol_superior').val(response[0].rol_superior);

                        $("#agencias").val(response[0].id_agencia.split(','));

                            /*$("#multipleSelect :selected").map(function(i, el) {
    return $(el).val();
});*/

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
						
					}

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
	  </script>
	</body>
</html>