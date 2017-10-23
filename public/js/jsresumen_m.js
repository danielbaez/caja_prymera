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
			location.href = '/Ubicacion';
		});
}

function abrirModal() {
	modal('myModal2');
}