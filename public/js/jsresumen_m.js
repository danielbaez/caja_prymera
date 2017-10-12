function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
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