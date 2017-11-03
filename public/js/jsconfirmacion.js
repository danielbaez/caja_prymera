function confirmarDatos() {
	location.href = '/C_confirmacion';
}

var flg_active = 1; 
function addStyle() {
	if(flg_active == 1) {
		$('#titulo').html('Est&aacute;s a un paso de tu pr&eacute;stamo. Confirma tus datos');
		flg_active++;
	}else {
		$('#titulo').html('Felicidades!!! Tienes un pr&eacute;stamo pre aprobado');
		flg_active = 1;
	}
	$('#remove1').removeClass("active");
	$('#remove').removeClass("active");
	location.href = '/C_confirmacion';
}

function verificarNumero() {
	var salario     	  = $('#salario').val();
	var nro_celular 	  = $('#nro_celular').val();
	var empleador   	  = $('#empleador').val();
	var direccion_empresa = $('#direccion_empresa').val();
	var Departamento 	  = $('#Departamento').val();
	var Provincia 		  = $('#Provincia').val();
	var Distrito 		  = $('#Distrito').val();
	var Agencia 		  = $('#idagencia').val();
	var codigo 			  = $('#codigo').val();
	var nro_fijo     	  = $('#nro_fijo').val();
	var concesionaria	  = $('#concesionaria').val();
	var tipo_pago         = $('#tipoPago').val();
	var uno 			  = $('#uno').val();
	var dos 			  = $('#dos').val();
	var tres 			  = $('#tres').val();
	var cuatro 			  = $('#cuatro').val();
	var cinco 			  = $('#cinco').val();
	var seis 			  = $('#seis').val();
	var fijo			  = $('#nro_fijo').val();
	var estado_civil      = $('#estado_civil').val();
	var nombre_conyugue   = $('#nombre_conyugue').val();
	var dni_conyugue      = $('#dni_conyugue').val();
	var numero = uno+dos+tres+cuatro+cinco+seis;
	//var checkAutorizo     = $('#checkAutorizo').is(':checked');
    if(uno == null && dos == null && tres == null && cuatro == null && cinco == null && seis == null) {
    	msj('error', 'Ingrese el codigo que se le envi&oacute; al celular');
		return;
    }
	if(salario == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(nro_celular == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(nro_celular.length <9) {
		msj('error', 'Ingrese un celular de 9 d&iacute;gitos');
		return;
	}
	if(empleador == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(direccion_empresa == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(Departamento == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(Provincia == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	if(Distrito == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}
	/*if(checkAutorizo == false) {
		msj('error','Por favor acepte la autorizaci&oacute;n de datos');
		  return;
	}*/
	$('#confirmar').attr('disabled', true);
	$.ajax({
		data  : { salario : salario,
				nro_celular : nro_celular,
				empleador : empleador,
				direccion_empresa : direccion_empresa,
			    Departamento : Departamento,
				Provincia : Provincia,
				Distrito : Distrito,
				Agencia : Agencia,
				concesionaria : concesionaria,
				numero : numero,
				codigo : codigo,
				nro_fijo : nro_fijo,
			    estado_civil : estado_civil,
			    nombre_conyugue : nombre_conyugue,
				dni_conyugue : dni_conyugue},
		url   : 'C_confirmacion/verificarNumero',
		type  : 'POST'
	}).done(function(data){
		try{
				data = JSON.parse(data);
				if(data.error == 0){
					console.log(data.cambio);
					if(data.cambio == 1){
						$('.ocultar').addClass( "hidden" );
						$('#idError').css('display','block');
						$('.otro').removeClass( "hidden" );
						$('#confirmar').css('display', 'none');
						$('#cambiar').css('display', 'block');
					}else if(data.cambio == 0){
						location.href = '/Resumen';
					}
				}else {
					$('#confirmar').attr('disabled', false);
					msj('error', data.msj);
				}
			} catch (err){
				msj('error',err.message);
				$('#confirmar').attr('disabled', false);
			}
	});
}

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function getProvincia() {
	var departamento = $('#Departamento').val();
	if(departamento == null) {
		msj('error', 'Seleccione un departamento v&aacute;lido');
		return;
	}
	$.ajax({
		data  : { departamento : departamento},
		url   : 'C_confirmacion/getProvincia',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			$('#Provincia').html('');
			$('#Provincia').append('<option value="">Provincia</option>');
			$('#Provincia').append(data.comboProvincia);
			$('#codigo').html('');
			$('#codigo').append('<option value="">C&oacute;digo</option>');
			$('#codigo').append(data.comboCodigo);
			$('#Distrito').html('');
			$('#Distrito').append('<option value="">Distrito</option>');
		} catch (err){
			msj('error',err.message);
		}
	});
}

function getDistritos() {
	var Provincia = $('#Provincia').val();
	if(Provincia == null) {
		msj('error', 'Seleccione una Provincia v&aacute;lido');
		return;
	}
	$.ajax({
		data  : { Provincia : Provincia},
		url   : 'C_confirmacion/getDistrito',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			$('#Distrito').html('');
			$('#Distrito').append('<option value="">Distrito</option>');
			$('#Distrito').append(data.comboDistrito);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function getModelo() {
	var marca = $('#marca').val();
	if(Provincia == null) {
		msj('error', 'Seleccione una marca v&aacute;lida');
		return;
	}
	$.ajax({
		data  : { marca : marca},
		url   : 'C_confirmacion/getModelo',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			$('#modelo').html('');
			$('#modelo').append('<option value="">Modelo</option>');
			$('#modelo').append(data.comboModelo);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function ocultarAgencia() {
	var concesionaria = $('#concesionaria').val();
	if(concesionaria == null) {
		msj('error', 'Seleccione una concesionaria v&aacute;lida');
		return;
	}
	$.ajax({
		data  : { concesionaria : concesionaria},
		url   : 'C_confirmacion/ocultarAgencia',
		type  : 'POST'
	}).done(function(data){
		try{
				data = JSON.parse(data);
				if(data.ocultar == 1){
					$('#idagencia').css('display', 'none');
				}else {
				}
			} catch (err){
				msj('error',err.message);
			}
	});
}

function cambiarCelular() {
	$('.ocultar').removeClass("hidden");
	$('.otro').addClass("hidden");
	$('#confirmar').css('display', 'block');
	$('#cambiar').css('display', 'none');
	$('#uno').val('');
	$('#dos').val('');
	$('#tres').val('');
	$('#cuatro').val('');
	$('#cinco').val('');
	$('#seis').val('');
	$('#confirmar').attr('disabled', false);
}

function enviarMail() {
	$('#btnAceptar').attr('disabled', true);

	$('#myModaltelef').modal();

	var nro_celular = $('#nro_celular').val();
	$.ajax({
		data  : { nro_celular : nro_celular},
		url   : 'C_confirmacion/enviarMail',
		type  : 'POST'
	}).done(function(data){
		try{
		   	//data = JSON.parse(data);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function reenviarEmail() {
	var nro_celular = $('#nro_celular').val();
	$.ajax({
		data  : { nro_celular : nro_celular},
		url   : 'C_confirmacion/enviarMail',
		type  : 'POST'
	}).done(function(data){
		try{
		   	//data = JSON.parse(data);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function habilitarCampo() {
	var salario     	  = $('#salario').val();
	var nro_celular 	  = $('#nro_celular').val();
	var empleador   	  = $('#empleador').val();
	var direccion_empresa = $('#direccion_empresa').val();
	var Departamento 	  = $('#Departamento').val();
	var Provincia 		  = $('#Provincia').val();
	var Distrito 		  = $('#Distrito').val();
	var codigo  		  = $('#codigo').val();
	var codigo  		  = $('#codigo').val();
	var nro_fijo 		  = $('#nro_fijo').val();
	var Agencia 		  = $('#idagencia').val();
	var concesionaria	  = $('#concesionaria').val();
	var email 			  = $('#email').val();
	//var checkAutorizo     = $('#checkAutorizo').is(':checked');
	if(salario != null && nro_celular != '' && empleador != '' && direccion_empresa != '' && Departamento != '' 
		&& Provincia != '' && Distrito != '' && Agencia != '' && email != ''/* && nro_fijo != '' && codigo != ''*/ /*&& checkAutorizo != false*/) {
		$('#btnAceptar').removeAttr("disabled");
	}
}

function limpiarCampos() {
	$('#uno').val(null);
	$('#dos').val(null);
	$('#tres').val(null);
	$('#cuatro').val(null);
	$('#cinco').val(null);
	$('#seis').val(null);
	$('#btnAceptar').attr('disabled', false);
}

function mostrarEstadoCivil() {
	var estado_civil = $('#estado_civil').val();
	if(estado_civil == "casado") {
		$('.oculto').removeClass('hidden');
	}else {
		$('.oculto').addClass('hidden');
	}
}

function goToHome() {
	$.ajax({
		url   : '/C_confirmacion/goToHome',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	if(data.error == 0) {
		   		location.href = data.location;
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});
}

function cambiarTam() {
	var codigo = $('#codigo').val();
	if(codigo != '01') {
		$('#nro_fijo').val('');
		$('#nro_fijo').attr('maxlength', 6);
	}else {
		$('#nro_fijo').val('');
		$('#nro_fijo').attr('maxlength', 7);
	}
}


function verificarDatos(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		verificarCampos();
        }
}

function enterConfirmar(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		verificarNumero();
        }
}

function verificarCampos() {
	var salario     	  = $('#salario').val();
	var nro_celular 	  = $('#nro_celular').val();
	var empleador   	  = $('#empleador').val();
	var direccion_empresa = $('#direccion_empresa').val();
	var Departamento 	  = $('#Departamento').val();
	var Provincia 		  = $('#Provincia').val();
	var Distrito 		  = $('#Distrito').val();
	var Agencia 		  = $('#idagencia').val();
	var codigo 			  = $('#codigo').val();
	var nro_fijo     	  = $('#nro_fijo').val();
	var concesionaria	  = $('#concesionaria').val();
	var tipo_pago         = $('#tipoPago').val();
	var uno 			  = $('#uno').val();
	var dos 			  = $('#dos').val();
	var tres 			  = $('#tres').val();
	var cuatro 			  = $('#cuatro').val();
	var cinco 			  = $('#cinco').val();
	var seis 			  = $('#seis').val();
	var fijo			  = $('#nro_fijo').val();
	var estado_civil      = $('#estado_civil').val();
	var nombre_conyugue   = $('#nombre_conyugue').val();
	var dni_conyugue      = $('#dni_conyugue').val();


	var tipo_producto_hidden = $('input[name="tipo_producto_hidden"]').val();

	if(salario == null) {
		msj('error', 'Seleccione una salario v&aacute;lida');
		return;
	}else 
	if(empleador == null || empleador == '') {
		msj('error', 'Ingrese un empeador correctamente');
		return;
	}else
	if(direccion_empresa == null || direccion_empresa == '') {
		msj('error', 'Ingrese una direcci&oacute;n correctamente');
		return;
	}else
	if(Departamento == null || Departamento == '') {
		msj('error', 'Seleccione un departamento correctamente');
		return;
	}else
	if(Provincia == null || Provincia == '') {
		msj('error', 'Seleccione una Provincia correctamente');
		return;
	}else
	if(Distrito == null || Distrito == '') {
		msj('error', 'Seleccione un Distrito correctamente');
		return;
	}else
	if(nro_celular == null || nro_celular == '') {
		msj('error', 'Seleccione un n&uacute;mero de celular v&aacute;lido');
		return;
	}else
	if(nro_celular.length <9) {
		msj('error', 'Ingrese un celular de 9 d&iacute;gitos');
		return;
	}else
	if((concesionaria == null || concesionaria == '') && tipo_producto_hidden == 'vehicular') {
		msj('error', 'Seleccione una concesionaria');
		return;
	}else
	if(Agencia == null || Agencia == '') {
		msj('error', 'Ingrese una agencia');
		return;
	}

	enviarMail();
}