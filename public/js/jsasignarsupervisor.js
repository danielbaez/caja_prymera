var glob_personalAsignado = null;

function agregarPersonal() {
	var dato = "";
	var supervisor = $('#supervisor').val();
	if(supervisor == null || supervisor == '' || supervisor == undefined) {
		msj('error', 'Ingrese un supervisor');
		return;
	}
	$('#personalAsignado').html('');
	$('input[type=checkbox]').each(function () {
	    if(this.checked == true) {
	    	dato = $(this).val();
	    	glob_personalAsignado += '-'+$(this).val();
	    	$('#personalAsignado').append('<p>'+dato+' <i class="fa fa-minus-circle fa-1x" aria-hidden="true"></i></p>')
	    }
	});
	//console.log(dato);
}

function guardatAsesoresAsignados() {
	//console.log();
	if(glob_personalAsignado == null || glob_personalAsignado == '' || glob_personalAsignado == undefined) {
		msj('error', 'Asigne agentes a un jefe de agencia');
		return;
	}
	$.ajax({
		data  : { personalAsignado : glob_personalAsignado},
		url   : '/C_usuario/guardarPersonalAsignado',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			/*if(data.ocultar == 1){
				$('#idagencia').css('display', 'none');
			}else {
			}*/
		} catch (err){
			msj('error',err.message);
		}
	});
}