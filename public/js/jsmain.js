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

flg = 1;
$(function() {
    $('#nombres').keyup(function() {
        if(flg == 1) {
            this.value = this.value.toUpperCase();
            flg++;
        }
    });
});

flg2 = 1;
$(function() {
    $('#apellidos').keyup(function() {
        if(flg2 == 1) {
            this.value = this.value.toUpperCase();
            flg2++;
        }
    });
});

function limpiar() {
  $('#nombres').val(null);
  $('#apellidos').val(null);
  $('#sexo').val(null);
  $('#fecha_nacimiento').val(null);
  $('#dni').val(null);
  $('#fecha_ingreso').val(null);
  $('#celular').val(null);
  $('#email').val(null);
  $('#rol').val(null);
  $('#rol_superior').val(null);
}

function verificarRol() {
  var rol = $('#rol').val();
  if(rol == "jefe_agencia") {
    $( ".ocultar" ).addClass("hidden");
  }else {
    $(".ocultar").removeClass("hidden");
  }
}

function setearCampos() {
  var rol = document.getElementById('rol_pers').innerText;
  $.ajax({
    data  : { rol : rol},
    url   : 'C_main/getDatosPers',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#nombres').val(data.nombre);
          $('#dni').val(data.dni);
          $('#apellidos').val("administrador");
          $('#fecha_nacimiento').val(data.fecha_nac);
          $('#celular').val(data.celular);
          $('#email').val();
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
    });
}