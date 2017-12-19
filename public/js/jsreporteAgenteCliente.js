function cambiarEstado(dato) {
    console.log(dato);
    $.ajax({
		data  : { dato : dato},
		url   : '/C_reporte/cambiarEstado',
		type  : 'POST',
		dataType : 'json'
	}).done(function(data){
		try{
			$('#status'+dato).html('Anulado');
			$('#accion'+dato).html('');
		} catch (err){
			msj('error',err.message);
		}
	});
  }