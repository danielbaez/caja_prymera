var glob_personalAsignado = null;

function agregarPersonal() {
	var dato = "";
	var nombre = "";
	var rol = "";
	var agencia = "";
	var supervisor = $('#supervisor').val();
	if(supervisor == null || supervisor == '' || supervisor == undefined) {
		msj('error', 'Ingrese un supervisor');
		return;
	}
	$('#personalAsignado').html('');
	$('input[type=checkbox]').each(function () {
	    if(this.checked == true) {
	    	dato = $(this).val();
	    	nombre = $(this).attr('data-nombre');
	    	rol = $(this).attr('data-rol');
	    	agencia = $(this).attr('data-agencia');
	    	glob_personalAsignado += '-'+$(this).val();
	    	$('#personalAsignado').append("<p id='id_nombre_pers_"+dato+"' data-id="+dato+">"+nombre+" <i class='fa fa-minus-circle fa-1x' data-nombres="+nombre+" data-rol="+rol+" data-id_user="+dato+" data-agencias='"+agencia+"' aria-hidden='true' onclick='borrarAsignados("+$(this).val()+", this)'></i></p>");
	    	$('#check_'+dato).remove();
	    }
	});
}

function guardatAsesoresAsignados() {
	var agencia = $('#agencias').val();
	var obj = $('#personalAsignado').children();
	var id = '';
	var ids_user = '';
	$(obj).each(function( i ) {
	    id = $(this).attr('data-id');
	    ids_user += '-'+id;
	  });
	if(ids_user == null || ids_user == '' || ids_user == undefined) {
		msj('error', 'Asigne agentes a un jefe de agencia');
		return;
	}
	if(agencia == null || agencia == '' || agencia == undefined) {
		msj('error', 'Seleccione una agencia');
		return;
	}
	$.ajax({
		data  : { personalAsignado : ids_user,
		 		  agencia : agencia},
		url   : '/C_usuario/guardarPersonalAsignado',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
				$('.agregar').html('');
            	$('.agregar').append(data.html);
            	$('#personalAsignado').html('');
			}
			msj('success', data.msj);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function borrarAsignados(id_pers, element) {
	var nombre = $(element).attr('data-nombres');
	var rol = $(element).attr('data-rol');
	var agencia = $(element).attr('data-agencias');
	$('#id_nombre_pers_'+id_pers).remove();
	$('.agregar').append('<tr id="check_'+id_pers+'">'+
                                    '<td>'+
                                       '<input type="checkbox" data-nombre="'+nombre+'" data-rol="'+rol+'" data-agencia="'+agencia+'" name="id_asesor[]" value="'+id_pers+'">'+
                                    '</td>'+                    
                                    '<td>'+nombre+'</td>'+
                                    '<td>'+rol+'</td>'+
                                    '<td>'+agencia+'</td>'+
                                  '</tr>');
	/*$.ajax({
		data  : { id_asesor : id_pers,
				  personalAsignado : glob_personalAsignado},
		url   : '/C_usuario/borrarAsignados',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
				$('#personalAsignado').html('');
				$('#personalAsignado').append(data.p);
				$('.agregar').html('');
            	$('.agregar').append(data.html);
			}
			//msj('success', data.msj);
		} catch (err){
			msj('error',err.message);
		}
	});*/
}