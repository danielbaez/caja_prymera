function irAUbicacion() {
	var check = $("#checkAutorizo").is(':checked');
	if(check == false) {
		msj('error', 'Por favor seleccione los terminos y condiciones');
	}else {
		location.href = '/C_ubicacion';
	}
}