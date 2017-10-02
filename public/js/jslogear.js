function logear() {
	var email = $('#txtEmail').val();
	var pass  = $('#txtPassword').val();
	if(email == null || email == '') {
		
	}
}

function logear() {
	var email = $('#txtEmail').val();
	var pass  = $('#txtPassword').val();
	var check = '0';
	if ($('#checkbox-2').is(":checked") == true) {
		check = '1';
	}
	if(email.length == 0) {
		$("#incUser").text("Tu usuario y/o contrase&ntilde;a son incorrectas");
		return;
	}
	if(pass.length == 0) {
		$("#incPass").text("Tu usuario y/o contrase&ntilde;a son incorrectas");
		return;
	}
	if(email.length != 0 && pass != 0) {
		$.ajax({
			data  : { user  : email,
					  pass  : JSON.stringify(pass),
					  check : JSON.stringify(check)},
			url   : 'login/logear',
			type  : 'POST'
		}).done(function(data){
			try{
				data = JSON.parse(data);
				if(data.error == 0){
					location.href = data.url;
					if(data.remember == 0) {
						setearInput('txtEmail', null);
						setearInput('txtPassword', null);
						$('#checkbox-2').removeClass('is-checked');
					}
				}else {
					return;
				}
			} catch (err){
				msj('error',err.message);
			}
		});
	}
}

function login() {
	if(event.keyCode == 13){
		logear();
	}
}