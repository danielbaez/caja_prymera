function guardarDatos() {
	var nro_cel = $('#nro_cel').val();
	var nro_fijo = $('#nro_fijo').val();
	if(nro_cel == null || nro_cel == '') {
		msj('error', 'Ingrese su n&uacute;mero de celular');
		return;
	}
	/*if(nro_fijo == null || nro_fijo == '') {
		msj('error', 'Ingrese su n&uacute;mero de tel&eacute;fono fijo');
		return;
	}*/
	$('.btn-aceptar').attr('disabled', true);
	$.ajax({
			data  : { nro_cel  : nro_cel,
					  nro_fijo  : nro_fijo},
			url   : 'C_losentimos/guardarDatos',
			type  : 'POST'
		}).done(function(data){
			try{
				data = JSON.parse(data);
				if(data.error == 0){
					location.href = '/C_mensaje';
				}else {
					$('.btn-aceptar').attr('disabled', false);
					return;
				}
				//msj('error', data.mensaje);
			} catch (err){
				msj('error',err.message);
			}
		});
}

function goToHome() {
	$.ajax({
		url   : '/C_losentimos/goToHome',
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

 function verificarDatos(e) {
	if(e.keyCode === 13) {
		e.preventDefault();
		guardarDatos();
    }
}