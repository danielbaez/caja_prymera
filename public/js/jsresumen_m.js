function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
	var agencia = $('#Agencia').val();
		$.ajax({
			data  : { agencia : agencia},
			url   : 'Micash_resumen/setearAgencia',
			type  : 'POST',
			dataType : 'json'
		}).done(function(data){
			try{
				location.href = '/micash_ubicacion';
			} catch (err){
				msj('error',err.message);
			}
		});
}