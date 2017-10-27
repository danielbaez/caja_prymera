var glob_personalAsignado = null;

function agregarPersonal() {
	var dato = "";
	var nombre = "";
	var apellido = "";
	var rol = "";
	var agencia = "";
	//var arrayDatos [''];
	var supervisor = $('#supervisor').val();
	if(supervisor == null || supervisor == '' || supervisor == undefined) {
		msj('error', 'Ingrese un supervisor');
		return;
	}
	//$('#personalAsignado').html('');
	$('input[type=checkbox]').each(function () {
	    if(this.checked == true) {
	    	dato = $(this).val();
	    	nombre = $(this).attr('data-nombre');
	    	apellido = $(this).attr('data-apellido');
	    	rol = $(this).attr('data-rol');
	    	agencia = $(this).attr('data-agencia');
	    	glob_personalAsignado += '-'+$(this).val();
	    	$('#personalAsignado').append("<p id='id_nombre_pers_"+dato+"' data-id="+dato+">"+nombre+" "+apellido+"<i class='fa fa-minus-circle fa-1x' data-nombres="+nombre+" data-apellido="+apellido+" data-rol="+rol+" data-id_user="+dato+" data-agencias='"+agencia+"' aria-hidden='true' onclick='borrarAsignados("+$(this).val()+", this)'></i></p>");
        $('#check_'+dato).addClass('hidden');
        $('#check_'+dato).remove();
	    }
	    //console.log(glob_personalAsignado);
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
	//console.log(ids_user);
	$.ajax({
		data  : { personalAsignado : ids_user,
		 		  agencia : agencia},
		url   : '/C_usuario/guardarPersonalAsignado',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
				$('#supervisor').val('');
				$('.agregar').html('');
            	$('.agregar').append(data.html);
            	$('#agencias').html('');
            	$('#agencias').append('<option value="">Agencias</option>');
            	$('#personalAsignado').html('');
			}
			msj('success', data.msj);
		} catch (err){
			msj('error',err.message);
		}
	});
}

function borrarAsignados(id_pers, element) {
  var obj = $('#personalAsignado').children();
  var ids_user = null;
	var nombre = $(element).attr('data-nombres');
	var apellido = $(element).attr('data-apellido');
	var rol = $(element).attr('data-rol');
	var agencia = $(element).attr('data-agencias');
	$('#id_nombre_pers_'+id_pers).remove();
  $(obj).each(function( i ) {
      id = $(this).attr('data-id');
      ids_user += '-'+id;
    });
  console.log(ids_user);
	/*$('.agregar').append('<tr id="check_'+id_pers+'">'+
                                    '<td>'+
                                       '<input type="checkbox" data-nombre="'+nombre+'" data-apellido="'+apellido+'" data-rol="'+rol+'" data-agencia="'+agencia+'" name="id_asesor[]" value="'+id_pers+'">'+
                                    '</td>'+                    
                                    '<td>'+nombre+' '+apellido+'</td>'+
                                    '<td>'+rol+'</td>'+
                                    '<td>'+agencia+'</td>'+
                                  '</tr>');*/
	$.ajax({
		data  : { id_asesor : ids_user,
              id_pers : id_pers},
		url   : '/C_usuario/borrarAsignados',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
        $('.table-responsive').html('');
        $('.table-responsive').append(data.html);
        paginacion();
			}
		} catch (err){
			msj('error',err.message);
		}
	});
}

function getAsesoresByAgencia() {
	var agencia = $('#agencias').val();
	if(agencia == null) {
		msj('error', 'Seleccione una agencia');
	}
	$.ajax({
		data  : { agencia : agencia},
		url   : '/C_usuario/getAsesoresByAgencia',
		type  : 'POST'
	}).done(function(data){
		try{
			data = JSON.parse(data);
			if(data.error == 0) {
				$('.table-responsive').html('');
            	$('.table-responsive').append(data.html);
            	paginacion();
            }
		} catch (err){
			msj('error',err.message);
		}
	});
}

function paginacion() {
	var table = $('#tabla-personal').DataTable( {

    //columnDefs: [ { orderable: false, targets: [0]}],
    "columnDefs": [ {
      "targets": 0,
      "searchable": false
    } ],

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf',
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Busqueda Solicitud - Filtros',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            filename: 'reporte',
            customize: function (doc) {
              doc.content[1].table.widths = 
                  Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Busqueda Solicitud - Filtros',
            titleAttr: 'Excel',
            title: '',
            filename: 'reporte',
            header: true,
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                //$('row c[r^="A"]', sheet).attr( 's', '2');
            }
        },
      ],
      "language": {
        "search": "Buscar:",
        "emptyTable": "No hay registros disponibles",
        "paginate": {
            "first":        "Primero",
            "previous":     "Anterior",
            "next":         "Siguiente",
            "last":         "Ultimo"
        },
        "info":             "_START_ a _END_ de _TOTAL_ entradas",


        "infoEmpty":        "0 de 0 of 0 entradas",
        "infoFiltered":     "(filtrados de un total _MAX_ entradas)",
        "zeroRecords":      "No se encontraron registros",
      },
      "bInfo" : false,
      "pageLength": 10,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ],
      "dom": 'rtp'
  } );
        
        var options = {

          url: function() {
            return "/C_usuario/autocompleteGetJefe";
          },

          getValue: function(element) {
            return element.nombre+' '+element.apellido;
          },

          ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.supervisor = $("#supervisor").val();
            return data;
          },

          list: {
            onClickEvent: function(data) {

              var value = $("#supervisor").getSelectedItemData();

              //var value = $("#supervisor").val();
              //console.log(value);
              $.ajax({
                data  : { id  : value.id},
                url   : '/C_usuario/actualizarTabla',
                type  : 'POST'
              }).done(function(data){
                try{
                  data = JSON.parse(data);
                  if(data.error == 0){
                    $('#agencias').html('');
                    $('#agencias').append('<option value="">Agencias</option>');
                    $('#agencias').append(data.comboAgencias);
                    /*$('.agregar').html('');
                    $('.agregar').append(data.html);*/
                  }else {
                    return;
                  }
                } catch (err){
                  msj('error',err.message);
                }
              });
            } 
          },

          requestDelay: 400
        };

        $("#supervisor").easyAutocomplete(options);
}