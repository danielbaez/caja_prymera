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
	var salario     	  = $('#salario').val();
	var nro_celular 	  = $('#nro_celular').val();
	var empleador   	  = $('#empleador').val();
	var direccion_empresa = $('#direccion_empresa').val();
	var Departamento 	  = $('#Departamento').val();
	var Provincia 		  = $('#Provincia').val();
	var Distrito 		  = $('#Distrito').val();
	var Agencia 		  = $('#idagencia').val();
	var concesionaria	  = $('#concesionaria').val();
	var tipo_pago         = $('#tipoPago').val();
	var uno 			  = $('#uno').val();
	var dos 			  = $('#dos').val();
	var tres 			  = $('#tres').val();
	var cuatro 			  = $('#cuatro').val();
	var cinco 			  = $('#cinco').val();
	var seis 			  = $('#seis').val();
	var numero = uno+dos+tres+cuatro+cinco+seis;
	console.log(numero);
	var checkAutorizo     = $('#checkAutorizo').is(':checked');
    var pagotot = document.getElementById('cantTotPago').innerText;
    var mensual = document.getElementById('cantMensPago').innerText;
    var pors_tcea = document.getElementById('tcea').innerText;
    var meses = document.getElementById('slider-range-value-meses').innerText;
    var cuotaIni = document.getElementById('slider-range-value-dias').innerText;
    var pors_tea = document.getElementById('tea').innerText;
    if(uno == null && dos == null && tres == null && cuatro == null && cinco == null && seis == null) {
    	msj('error', 'Ingrese el codigo que se le envi&oacute; al celular');
		return;
    }
    if(tipo_pago == null) {
		msj('error', 'Seleccione un tipo de pago');
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
	if(checkAutorizo == false) {
		msj('error','Por favor acepte la autorizaci&oacute;n de datos');
		  return;
	}
	$.ajax({
		data  : { salario : salario,
				nro_celular : nro_celular,
				empleador : empleador,
				direccion_empresa : direccion_empresa,
			    Departamento : Departamento,
				Provincia : Provincia,
				Distrito : Distrito,
			    pagotot : pagotot,
			    mensual : mensual,
			    pors_tcea : pors_tcea,
			    meses : meses,
			    cuotaIni : cuotaIni,
			    pors_tea : pors_tea,
				Agencia : Agencia,
				concesionaria : concesionaria,
				numero : numero},
		url   : 'Preaprobacion/verificarNumero',
		type  : 'POST'
	}).done(function(data){
		try{
				data = JSON.parse(data);
				if(data.error == 0){
					if(data.cambio == 1){
						$('.ocultar').addClass( "hidden" );
						$('#idError').css('display','block');
						$('.otro').removeClass( "hidden" );
						$('#confirmar').css('display', 'none');
						$('#cambiar').css('display', 'block');
					}else {
						location.href = '/micash_resumen';
					}
				}else {
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

function ocultarAgencia() {
	var concesionaria = $('#concesionaria').val();
	if(concesionaria == null) {
		msj('error', 'Seleccione una concesionaria v&aacute;lida');
		return;
	}
	$.ajax({
		data  : { concesionaria : concesionaria},
		url   : 'Preaprobacion/ocultarAgencia',
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
}

function enviarMail() {
	var nro_celular = $('#nro_celular').val();
	$.ajax({
		data  : { nro_celular : nro_celular},
		url   : 'Preaprobacion/enviarMail',
		type  : 'POST'
	}).done(function(data){
		try{
		   	//data = JSON.parse(data);
		} catch (err){
			msj('error',err.message);
		}
	});
}
