function enviarMail() {
	$.ajax({
//		data  : { cantidad : values[handle],
//			      meses    : meses_pago},
		url   : 'C_confirmacion/enviarMail',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0){
				  $('#cantTotPago').html('S/. '+data.cantPago);	
				  $('#cantMensPago').html('S/. '+data.mensual);	

			}else {
				return;
			}
		} catch (err){
			//msj('error',err.message);
		}
	});
}


function verificarNumero() {
	location.href = 'http://localhost:8080/caja_prymera/C_resumen';
}