var global_img = null;
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

$( document ).ready(function() {
    limpiar();
});
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
function validaCorreo() {
    var email = $('#email').val();
    if (validateEmail(email)) {
    } else {
          msj('error',email+' no es valido');
          return;
    }
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function limpiar() {
  $('#agencia').val(null);
  $('#direccion').val(null);
  $('#txtelefono').val(null);
  $('#correo').val(null);
  $('#celular').val(null);
  $('#rol_superior').val(null);
  $('#btnGuardar').css('display', 'block');
  $('#btnEditar').css('display', 'none');
  $("#cont_correo").find('input:text, input:password, input:file, select, textarea')
  .each(function() {
      $(this).val('');
  });
  $("#cont_telef").find('input:text, input:password, input:file, select, textarea')
  .each(function() {
      $(this).val('');
  });
}

/*function verificarRol() {
  var rol = $('#rol').val();
  if(rol == "jefe_agencia") {
    $( ".ocultar" ).addClass("hidden");
  }else {
    $(".ocultar").removeClass("hidden");
  }
  $.ajax({
    data  : { rol : rol},
    url   : 'C_main/verificarRol',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
            if(rol == "asesor") {
              $('#rol_superior').html('');
              $('#rol_superior').append('<option value="">Rol Superior</option>');
              $('#rol_superior').append('<option value="'+data.nombre_complet+'">'+data.nombre_complet+'</option>');
            }
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
    });
}*/

/*var flg_updt = 1;
function setearCampos(dato, contador) {
  var id = dato.id;
  var rol = document.getElementById('rol_pers_'+contador).innerText;
  var nombre = document.getElementById(id).innerText;
  var agencia = document.getElementById('agencia_pers_'+contador).innerText;
  console.log(agencia);
  $.ajax({
    data  : { rol : rol,
              nombre : nombre,
              agencia : agencia},
    url   : 'C_main/getDatosPers',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#nombres').val(data.nombre);
          $('#dni').val(data.dni);
          $('#apellidos').val(data.apellido);
          $('#fecha_nacimiento').html(data.fecha_nac);
          $('#celular').val(data.celular);
          $('#email').val(data.email);
          $('#rol').html(null);
          $('#rol').append('<option value="'+data.rol+'">'+data.rol+'</option>');
          $('.oculto').addClass('hidden');
          $('.aparece').removeClass('hidden');
          $('.disabled').removeAttr("disabled");
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
    });
}*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        var name_file = input.files[0].name;
        $('#nombre_img').val(name_file);
        reader.readAsDataURL(input.files[0]);
    }
}

var global_agencia = '';
var global_correos = '';
function setearDatos(dato, agencia, nombre) {
  $('#correos'+num).remove();
  console.log(num);
  console.log($('#toggle_button').bootstrapSwitch('state'));
  //$('input[name="toggle_button"]').bootstrapSwitch('state', true, true);
 $('#agencia').val(agencia);
 $("#cont_correo").find('input:text, input:password, input:file, select, textarea')
  .each(function() {
      //$(this).val('');
      $('.remove').remove();
      $('br').remove();
  });
  $("#cont_telef").find('input:text, input:password, input:file, select, textarea')
  .each(function() {
      //$(this).val('');
      $('.remove').remove();
      $('br').remove();
  });
 global_agencia = agencia;
 $.ajax({
    data  : { id      : dato,
              agencia : agencia},
    url   : 'C_crearAgencia/setearDatos',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
            if(data.telefonos == null || data.data_correos == null) {
              //msj('error', 'No existen datos para esta agencia');
              return;
            }else {
              $('#direccion').val(data.direccion);
              $('#txtelefono').val(data.telef_val);
              $('#cont_telef').append(data.telefonos);
              $('#celular').val(data.ip);
              global_correos = data.data_correos;
              $('#correo').val(data.correo_val);
              $('#cont_correo').append(data.correos);
              $("#rol_superior").val(data.id_sup).change();
              $('#btnGuardar').css('display', 'none');
              $('#btnEditar').css('display', 'block');
              if(data.switch == 1) {
                console.log('entra');
                  $('input[name="toggle_button"]').bootstrapSwitch('state', !true, false);
                  $('input[name="toggle_button"]').bootstrapSwitch('toggleState', true, false);
              }else {
                  $('input[name="toggle_button"]').bootstrapSwitch('state', !false, false);
                  $('input[name="toggle_button"]').bootstrapSwitch('toggleState', true, false);
              }
            }
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
  });
}

function eliminar() {
  var agencia = $('#agencia').val();
  if(agencia == null || agencia == '' || agencia == undefined) {
    msj('error', 'Seleccione una agencia');
    return;
  }
  $.ajax({
    data  : { agencia : agencia},
    url   : 'C_crearAgencia/eliminarAgencia',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
           location.reload();
        }else {
          modal('myModal');
        }
      } catch (err){
        msj('error',err.message);
      }
  });
}

var i = 1;
function agregarTelefono() {
  if(i == 1) {
    $('#cont_telef').append('</br><div class="form-group">'+
      '<input type="text" class="form-control" onkeypress="return valida(event)" id="telefonos'+i+'" name="telefonos[]" maxlength="7" placeholder="Teléfono"/>'+
      '<button type="button" class="btn btn-default" aria-label="Close" id="btnT'+i+'" onclick="limpiarInputsTelefonos('+x+')" style="background-color: transparent !important;border: transparent;float:  right;margin-right: -50px;margin-top: -33px;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>'+
    '</div>');
    i++;
  }else {
    $('#cont_telef').append('<div class="form-group">'+
      '<input type="text" class="form-control" onkeypress="return valida(event)" id="telefonos'+i+'" name="telefonos[]" maxlength="7" placeholder="Teléfono"/>'+
      '<button type="button" class="btn btn-default" aria-label="Close" id="btnT'+i+'" onclick="limpiarInputsTelefonos('+i+')" style="background-color: transparent !important;border: transparent;float:  right;margin-right: -50px;margin-top: -33px;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>'+
    '</div>');
    i++;
  }
}

var x = 1;
var num = null;
function agregarCorreo() {
  if(x == 1) {
    $('#cont_correo').append('</br><div class="form-group">'+
    '<input type="text" class="form-control" id="correos'+x+'" name="correos[]" placeholder="Correo de la agencia" onkeypress="" maxlength="200">'+
    '<button type="button" class="btn btn-default" aria-label="Close" id="btn'+x+'" onclick="limpiarInputsCorreo('+x+')" style="background-color: transparent !important;border: transparent;float:  right;margin-right: -50px;margin-top: -33px;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>'+
    '</div>');
    num = x;
    x++;
  }else {
    $('#cont_correo').append('<div class="form-group">'+
    '<input type="text" class="form-control" id="correos'+x+'" name="correos[]" placeholder="Correo de la agencia" onkeypress="" maxlength="200">'+
    '<button type="button" class="btn btn-default" aria-label="Close" id="btn'+x+'" onclick="limpiarInputsCorreo('+x+')" style="background-color: transparent !important;border: transparent;float:  right;margin-right: -50px;margin-top: -33px;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>'+
    '</div>');
    num = x;
    x++;
  }
  console.log(num);
}

var contador = 1;
function guardarAgencia() {
  if(contador == 1) {
    var id;
    var id_email;
    var data_telef = '';
    var data_email = '';
    var counter = 1;
    var conta = 1;
    $("input[name='telefonos[]']").each(function(e){ 
      id = this.id;
      //console.log("#"+id);
      if(counter <= i) {
        data_telef += this.value+',';
      }else {
        data_telef += this.value;
      }
      counter++;
    });
    $("input[name='correos[]']").each(function(e){ 
      id_email = this.id;
      //console.log("#"+id);
      if(conta <= x) {
        data_email += this.value+',';
      }else {
        data_email += this.value;
      }
      conta++;
    });
    var correos      = '';
    var telefonos    = '';
    var agencia      = $('#agencia').val();
    var direccion    = $('#direccion').val();
    var telefono     = $('#txtelefono').val();
    var tarea_tele   = $('#telefonos').val();
    var correo       = $('#correo').val();
    var tarea_correo = $('#correos').val();
    var ip           = $('#celular').val();
    var jefe_agencia = $('#rol_superior').val();
    var toggle       = $('#toggle_button').prop('checked');
    contador++;
    if(agencia == null || agencia == '') {
      msj('error', 'Ingrese una agencia');
      return;
    }
    if(direccion == null || direccion == '') {
      msj('error', 'Ingrese una dirección');
      return;
    }
    if(telefono == null || telefono == '') {
      msj('error', 'Ingrese un teléfono');
      return;
    }
    if(correo == null || correo == '') {
      msj('error', 'Ingrese un correo');
      return;
    }
    if (validateEmail(correo)) {
    } else {
        msj('error',correo+' no es valido');
        return;
    }
    if(jefe_agencia == null || jefe_agencia == '') {
      msj('error', 'Seleccione un Jefe de agencia');
      return;
    }
    $.ajax({
      data  : { agencia      : agencia,
                direccion    : direccion,
                telefono     : telefono,
                correo       : correo,
                ip           : ip,
                jefe_agencia : jefe_agencia,
                toggle       : toggle,
                correos      : correos,
                telefonos    : telefonos,
                data_telef   : data_telef,
                data_email   : data_email},
      url   : 'C_crearAgencia/guardarAgencia',
      type  : 'POST'
    }).done(function(data){
        try{
          data = JSON.parse(data);
          if(data.error == 0){
            location.reload();
          }else {
          }
        } catch (err){
          msj('error',err.message);
        }
    });
  }
}

/*$( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  guardarAgencia($( this ).serializeArray());
});*/

var cont_actu = 1;
function actualizarAgencia() {
  if(cont_actu == 1) {
    var id;
    var id_email;
    var data_telef = '';
    var data_email = '';
    var counter = 1;
    var conta = 1;
    $("input[name='telefonos[]']").each(function(e){ 
      id = this.id;
      //console.log("#"+id);
      data_telef += this.value+',';
      counter++;
    });
    $("input[name='correos[]']").each(function(e){ 
      id_email = this.id;
      data_email += this.value+',';
      conta++;
    });
    var correos      = '';
    var telefonos    = '';
    var agencia      = $('#agencia').val();
    var direccion    = $('#direccion').val();
    var telefono     = $('#txtelefono').val();
    var tarea_tele   = $('#tarea_tele').val();
    var correo       = $('#correo').val();
    var tarea_correo = $('#correos').val();
    var ip           = $('#celular').val();
    var jefe_agencia = $('#rol_superior').val();
    var toggle       = $('#toggle_button').prop('checked');

    contador++;
    if(tarea_correo == '' || tarea_correo == null || tarea_correo == undefined) {
      
    }else {
      correos = correo+','+tarea_correo;
    }
    if(tarea_tele != null || tarea_tele != '' || tarea_tele != undefined) {
      
    }else {
      telefonos = telefono+','+tarea_tele;
    }
    if(agencia == null || agencia == '') {
      msj('error', 'Ingrese una agencia');
      return;
    }
    if(direccion == null || direccion == '') {
      msj('error', 'Ingrese una dirección');
      return;
    }
    if(telefono == null || telefono == '') {
      msj('error', 'Ingrese un teléfono');
      return;
    }
    if(correo == null || correo == '') {
      msj('error', 'Ingrese un correo');
      return;
    }
    if (validateEmail(correo)) {
    } else {
        msj('error',correo+' no es valido');
        return;
    }
    if(jefe_agencia == null || jefe_agencia == '') {
      msj('error', 'Seleccione un Jefe de agencia');
      return;
    }
    $.ajax({
      data  : { agencia      : agencia,
                global_agencia : global_agencia,
                direccion    : direccion,
                telefono     : telefono,
                correo       : correo,
                ip           : ip,
                jefe_agencia : jefe_agencia,
                toggle       : toggle,
                correos      : correos,
                telefonos    : telefonos,
                data_telef   : data_telef,
                data_email   : data_email,
                global_correos : global_correos},
      url   : 'C_crearAgencia/actualizarAgencia',
      type  : 'POST'
    }).done(function(data){
        try{
          data = JSON.parse(data);
          if(data.error == 0){
            location.reload();
          }else {
          }
        } catch (err){
          msj('error',err.message);
        }
    });
  }
}

function limpiarInputsCorreo(dato) {
  $('#btn'+dato).remove();
  $('#correos'+dato).remove();
  $('#correos'+dato).val('');
}

function limpiarInputsTelefonos(datoT) {
  $('#btnT'+datoT).remove();
  $('#telefonos'+datoT).remove();
  $('#telefonos'+datoT).val('');
}