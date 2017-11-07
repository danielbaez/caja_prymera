function solicitarPrestamo() {
	var nombre   = $('#Nombre').val();
	var apellido = $('#Apellido').val();
	var dni      = $('#dni').val();
	var email    = $('#email').val();
	var check    = $('#acepto').is(':checked');
	if(nombre == '' || nombre == null || nombre == undefined) {
		msj('error','Ingrese su Nombre');
		return;
	}
	if(apellido == '' || apellido == null || apellido == undefined) {
		msj('error','Ingrese su Apellido');
		return;
	}
	if(dni == '' || dni == null || dni == undefined) {
		msj('error','Ingrese su DNI');
		return;
	}
	if(dni.length != 8) {
		msj('error','El DNI debe contener 8 caracteres');
		return;
	}
	if(isNaN(dni) == true) {
		msj('error','Ingrese s&oacute;lo n&uacute;meros por favor');
		return;
	}
	if(email == '' || email == null || email == undefined) {
		msj('error','Ingrese su correo electr&oacute;nico');
		return;
	}
	if (validateEmail(email)) {
	} else {
		  msj('error',email+' no es valido');
		  return;
	}
	if(check == false) {
		msj('error','Por favor acepte el uso de datos personales');
		  return;
	}
	$('.btn-consultar').attr('disabled', true);
	$.ajax({
		data  : { nombre  	: nombre,
				  apellido  : apellido,
				  dni       : dni,
				  email     : email,
				  check     : check},
		url   : 'C_login/solicitar',
		type  : 'POST',
		dataType: 'json',
	}).done(function(data){
		if(data.status == 0){
			location.href = data.url;
		}
		if(data.status == 1){
			location.href = data.url;
		}
		if(data.status == 2){
			$('.btn-consultar').attr('disabled', false);
			msj("error", "Hubo un problema en el servidor, vuelva a intertarlo");
		}
		/*try{
			data = JSON.parse(data);
			if(data.error == 0){
				location.href = data.url;
			}else {
				return;
			}
		} catch (err){
			msj('error',err.message);
		}*/
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

function moreText() {
	$( "#ocultarCaract" ).removeClass( "hidden" );
	$( "#ocultarCaract" ).css('margin-top','-38px');
	$('.mas-caracteristicas').hide();

	$('html').animate({scrollTop:$(document).height()},500);
}

function goToLogin() {
	location.href = "/Login";
}

function verificarDatos(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		solicitarPrestamo();
    }
}