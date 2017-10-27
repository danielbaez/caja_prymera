function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
	if(checkAutorizo == false) {
		msj('error', 'Autorice los t&eacute;rminos y condiciones');
		return;
	}
	var agencia = $('#Agencia').val();
		$.ajax({
			data  : { agencia : agencia},
			url   : 'Resumen/setearAgencia',
			type  : 'POST'
		}).done(function(data){
			console.log(data);
			//return;
			location.href = '/Ubicacion';
		});
}

function abrirModal() {
	modal('myModal2');
}

function goToHome() {
	$.ajax({
		url   : '/Resumen/goToHome',
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