var glob_personalAsignado = null;

function agregarPersonal() {
	var dato = "";
	var nombre = "";
	var supervisor = $('#supervisor').val();
	if(supervisor == null || supervisor == '' || supervisor == undefined) {
		msj('error', 'Ingrese un supervisor');
		return;
	}
	$('#personalAsignado').html('');
	$('input[type=checkbox]').each(function () {
	    if(this.checked == true) {
	    	dato = $(this).val();
	    	nombre = $(this).attr('data-nombre');
	    	console.log(nombre)
	    	glob_personalAsignado += '-'+$(this).val();
	    	$('#personalAsignado').append('<p>'+nombre+' <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>')
	    }
	});
	//console.log(dato);
}

function guardatAsesoresAsignados() {
	var agencia = $('#agencias').val();
	if(glob_personalAsignado == null || glob_personalAsignado == '' || glob_personalAsignado == undefined) {
		msj('error', 'Asigne agentes a un jefe de agencia');
		return;
	}
	if(agencia == null || agencia == '' || agencia == undefined) {
		msj('error', 'Seleccione una agencia');
		return;
	}
	$.ajax({
		data  : { personalAsignado : glob_personalAsignado,
		 		  agencia : agencia},
		url   : '/C_usuario/guardarPersonalAsignado',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
				$('.agregar').html('');
            	$('.agregar').append(data.html);
			}
			msj('success', data.msj);
		} catch (err){
			msj('error',err.message);
		}
	});
}