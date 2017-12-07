function irAUbicacion() {
	location.href = '/Ubicacion';
}

function enterIrAUbicacion(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		irAUbicacion()
    }
}

function redirect() {
	/*$.ajax({
		url   : 'Resumen/Redireccionar',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	console.log(data);
		   	if(data.error == 0) {
		   		location.href = data.location;
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});*/
	location.href = '/C_campaign';
}
