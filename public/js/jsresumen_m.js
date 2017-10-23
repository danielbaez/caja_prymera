function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
	if(checkAutorizo == false) {
		msj('error', 'Autorize el uso de datos personales');
		return;
	}
	var agencia = $('#Agencia').val();
		$.ajax({
			data  : { agencia : agencia},
			url   : 'Micash_resumen/setearAgencia',
			type  : 'POST'
		}).done(function(data){
			console.log(data);
			location.href = '/micash_ubicacion';
		});
}

function abrirModal() {
	modal('myModal2');
}