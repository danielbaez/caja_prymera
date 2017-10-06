function irAUbicacion() {
	var checkAutorizo     = $('#acepto').is(':checked');
	var agencia = $('#Agencia').val();
	if(checkAutorizo == true) {
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
	}else {
		msj('error','Por favor acepte los t&eacute;rminos y condiciones');
		return;
	}
}