function guardarDatos() {
	var nro_cel = $('#nro_cel').val();
	var nro_fijo = $('#nro_fijo').val();
	console.log(nro_fijo);
	if(nro_cel == null) {
		msj('error', 'Ingrese su n&uacute;,mero de celular');
		return;
	}
	if(nro_fijo == null) {
		msj('error', 'Ingrese su n&uacute;,mero fijo');
		return;
	}
	$.ajax({
			data  : { nro_cel  : nro_cel,
					  nro_fijo  : nro_fijo},
			url   : 'C_losentimos/guardarDatos',
			type  : 'POST'
		}).done(function(data){
			try{
				data = JSON.parse(data);
				console.log(data);
				if(data.error == 0){
					location.href = '/C_mensaje';
				}else {
					return;
				}
			} catch (err){
				msj('error',err.message);
			}
		});
}