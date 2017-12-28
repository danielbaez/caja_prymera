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


function getModelo() {
	var marca = $('#marca').val();
	if(marca == null) {
		msj('error', 'Seleccione una marca v&aacute;lida');
		return;
	}
	$.ajax({
		data  : { marca : marca},
		url   : 'C_campaign/getModelo',
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

function goToHome() {
	location.href = '/C_campaign';
}

function verificarCamp() {
	var ingreso_bruto    = $('#ingreso_bruto').val();
  	var condicion        = $('#condicion').val();
  	var nivel_educativo  = $('#nivel_educativo').val();
  	var profesion 		 = $('#profesion').val();
  	var distrito       	 = $('#distrito').val();
  	var marca      		 = $('#marca').val();
  	var modelo        	 = $('#modelo').val();
  	var plazo        	 = $('#plazo').val();
  	var valor_inicial = document.getElementById('slider-range-value-Inicial').innerText;
  	var valor_vehiculo = document.getElementById('slider-range-value-Valor').innerText;
  	var edad = document.getElementById('slider-range-value-edad').innerText;
  	var primera_fecha    = $('#primera_fecha').val();

  	var someDate = new Date();
	someDate.setDate(someDate.getDate() + 30);
	var dateMin = someDate.toISOString().substr(0,10);

	var someFecha = new Date();
	someFecha.setDate(someFecha.getDate() + 60);
	var dateMax = someFecha.toISOString().substr(0,10);

  	if(primera_fecha == null || primera_fecha == '' || primera_fecha == undefined) {

  	}else {
    	if(dateMin <= primera_fecha && primera_fecha <= dateMax) {
		}else {
			msj('error', 'Seleccione una fecha mayor de 30 d&iacute;as como m&iacute;nimo o 60 d&iacute;as como m&aacute;ximo');
			return;
		}
    }
	$.ajax({
		data  : { ingreso_bruto   : ingreso_bruto,
				  condicion 	  : condicion,
				  nivel_educativo : nivel_educativo,
				  profesion 	  : profesion,
				  edad 			  : edad,
				  distrito 		  : distrito,
				  marca 		  : marca,
				  modelo 		  : modelo,
			      plazo 		  : plazo,
			      valor_vehiculo  : valor_vehiculo,
			      valor_inicial   : valor_inicial,
			      primera_fecha   : primera_fecha},
		url   : 'C_campaign/changeValues',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			console.log(data.error);
			if(data.error == 0){
				if(data.ws_error == 1) {
					location.href = '/Resumen_Vehicular';
				}else if(data.ws_error == 0) {
					location.href = '/C_losentimos';
				}else if(data.ws_error == 2) {
					msj('error', 'Error de servidor');
					return;
				}
				//modal('myModaltelef');
			}else {
				msj('error', data.mensaje);
				return;
			}
		} catch (err){
			msj('error',err.message);
		}
	});
}