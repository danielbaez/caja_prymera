function getTipoCredito(dato) {
	$.ajax({
	    data  : { tipoCred : dato},
	    url   : 'C_tipoCredito/getTipoCredito',
	    type  : 'POST'
	  }).done(function(data){
	      try{
	        data = JSON.parse(data);
	        if(data.error == 0){
	            location.href = '/Vehicular';
	        }else {
	        	return;
	        }
	      } catch (err){
	        msj('error',err.message);
	      }
	    });
}