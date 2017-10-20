function cambiarPass() {
	var email = $('#email').val();
	var password = $('#password').val();
	var encrypt = $('#encrypt').val();
	if(email == null || email == '') {
		msj('error', 'Ingrese su email correctamente');
		return;
	}
	if(password == null || password == '') {
		msj('error', 'Ingrese su email correctamente');
		return;
	}
	$.ajax({
		data  : { email : email,
				  password : password,
				  encrypt : encrypt},
		url   : '/C_cambiarPassword/cambiarPass',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0){
				setTimeout(function(){ location.href = '/'; }, 1000);
			}else {
			}
			msj('error',data.msj);
		} catch (err){
			msj('error',err.message);
		}
	});
}