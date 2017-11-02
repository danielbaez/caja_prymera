function recuperarPass() {
	var email = $('#email').val();
	if (validateEmail(email)) {
	} else {
		  msj('error',email+' no es valido');
		  return;
	}
	$.ajax({
		data  : { email : email},
		url   : '/Logearse/recuperarPass',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0){
				modal('myModal');
				$('#correo_cambio').html(email);
			}else {
				msj('error', data.msj);
			}
		} catch (err){
			msj('error',err.message);
		}
	});
}

function verificarDatos(e) {
	if(e.keyCode === 13){
		e.preventDefault();
		recuperarPass();
    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
