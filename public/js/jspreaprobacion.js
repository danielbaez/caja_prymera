function confirmarDatos() {
	location.href = 'http://localhost:8080/caja_prymera/C_confirmacion';
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
}

function verificarNumero() {
	location.href = 'http://localhost:8080/caja_prymera/C_resumen';
}

function enviarMail() {
	var salario     	  = $('#salario').val();
	var nro_celular 	  = $('#nro_celular').val();
	var empleador   	  = $('#empleador').val();
	var direccion_empresa = $('#direccion_empresa').val();
	var Departamento	  = $('#Departamento').val();
	var Distrito 		  = $('#Distrito').val();
	var Provincia 		  = $('#Provincia').val();
	var email 		      = $('#email').val();
	var agencia 		  = $('#agencia').val();
	var check             = $('#checkAutorizacion').is(':checked');
	if(salario == null || salario == '') {
		msj('error', 'Seleccione el salario');
		return;
	}
	if(nro_celular == null || nro_celular == '') {
		msj('error', 'Llene un n&uacute;mero de celular');
		return;
	}
	if(empleador == null || empleador == '') {
		msj('error', 'Llene el nombre del empleador');
		return;
	}
	if(direccion_empresa == null || direccion_empresa == '') {
		msj('error', 'Llene la direcci&oacute;n de la empresa');
		return;
	}
	if(Departamento == null || Departamento == '') {
		msj('error', 'Llene el departamento en el que vive');
		return;
	}
	if(Provincia == null || Provincia == '') {
		msj('error', 'Llene la provincia donde vive');
		return;
	}
	if(Distrito == null || Distrito == '') {
		msj('error', 'Llene el distrito donde vive');
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
		msj('error','Por favor acepte la autorizaci&oacute; de datos');
		  return;
	}
	if(agencia == null || agencia == '') {
		msj('error', 'Llene la agencia donde solicitar&aacute; el pr&eacute;stamo');
		return;
	}
	$.ajax({
		data  : { salario  	: salario,
			      nro_celular  : nro_celular,
			      empleador       : empleador,
			      direccion_empresa     : direccion_empresa,
				  Departamento : Departamento,
				  Provincia : Provincia,
				  Distrito : Distrito,
				  email : email,
				  agencia : agencia},
		url   : 'C_preaprobacion/enviarEmail',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0){
				//location.href = data.url;
				modal('myModaltelef');
			}else {
				return;
			}
		} catch (err){
			msj('error',err.message);
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