function irAUbicacion() {
	$.ajax({
		url   : 'Resumen_Vehicular/Redireccionar',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	console.log(data);
		   	if(data.error == 0) {
		   		location.href = '/C_confirmacion';
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});
}

function enterIrAUbicacion(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		irAUbicacion()
    }
}

function redirect() {
	$.ajax({
		url   : 'Resumen/Regresar',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	//console.log(data);
		   	if(data.error == 0) {
		   		location.href = '/C_campaign';
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});
}
