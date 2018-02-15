function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
	if(checkAutorizo == false) {
		msj('error', 'Autorice los t&eacute;rminos y condiciones');
		return;
	}
	$('.btn-resumen').attr('disabled', true);
	var agencia = $('#Agencia').val();
		$.ajax({
			data  : { agencia : agencia},
			url   : 'Resumen/setearAgencia',
			type  : 'POST',
			dataType: 'json'
		}).done(function(data){
			console.log(data);
			if(data.error == 0 && data.sendMailGmail.send && data.sendMailGmailAgencia.send) {
				//console.log('pasoo')
				location.href = '/Ubicacion';
			}else {
				msj('error', 'Hubo un error, no se puede enviar correo');
				$('.btn-resumen').attr('disabled', false);
			}
		});
}

function abrirModal() {
	modal('myModal2');
}

function enterIrAUbicacion(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		irAUbicacion()
    }
}

function redirect() {
	$.ajax({
		url   : 'Resumen/Redireccionar',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	console.log(data);
		   	if(data.error == 0) {
		   		location.href = data.location;
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});
}
