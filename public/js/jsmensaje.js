function goToHome(dato) {
	if(dato == 1) {
		location.href = "/Micash";
	}
	if(dato == 2) {
		location.href = "/Vehicular";
	}
}

function goToHomeMensaje() {
	$.ajax({
		url   : '/C_mensaje/goToHome',
		type  : 'POST'
	}).done(function(data){
		try{
		   	data = JSON.parse(data);
		   	if(data.error == 0) {
		   		location.href = data.location;
		   	}
		} catch (err){
			msj('error',err.message);
		}
	});
}