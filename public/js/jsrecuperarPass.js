function recuperarPass() {
	var email = $('#email').val();
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
				}
			} catch (err){
				msj('error',err.message);
			}
		});
}