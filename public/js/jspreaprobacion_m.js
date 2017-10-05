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
}

function verificarNumero() {
	location.href = '/micash_resumen';
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
		url   : 'Preaprobacion/getProvincia',
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
		url   : 'Preaprobacion/getDistrito',
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
		url   : 'Preaprobacion/getModelo',
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
