function confirmarDatos() {
	location.href = 'http://localhost:8080/caja_prymera/C_confirmacion';
}

var flg_active = 1; 
function addStyle() {
	if(flg_active == 1) {
		$('#titulo').html('Est&aacute;s a un paso de tu pr&eacute;stamo. Confirma tus datos');
		flg_active++;
	}else {
		$('#titulo').html('Felicidades!!! Tienes un pr&eacute;stamo pre aprobado');
		flg_active = 1;
	}
	$('#remove1').removeClass("active");
	$('#remove').removeClass("active");
}

function verificarNumero() {
	location.href = 'http://localhost:8080/caja_prymera/C_resumen';
}
