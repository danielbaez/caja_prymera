var id_sol_global = null;

function cambiarEstado(dato) {
	id_sol_global = dato;
	modal('myModaltelef');
  }

  function cambiarStatus() {
  	$.ajax({
		data  : { dato : id_sol_global},
		url   : '/C_reporte/cambiarEstado',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			if(data.error == 0) {
				modal('myModaltelef');
				$('#status'+id_sol_global).html('Anulado');
				$('#accion'+id_sol_global).html('');
			}else {
				msj('error', 'No se pudieron guardar los cambios');
			}
		} catch (err){
			msj('error',err.message);
		}
	});
  }