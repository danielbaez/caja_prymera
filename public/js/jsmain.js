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
}
var flg_updt = 1;
function setearCampos() {
  var rol = document.getElementById('rol_pers').innerText;
  var nombre = document.getElementById('nombre_pers').innerText;
  var agencia = document.getElementById('agencia_pers').innerText;
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
          $('.oculto').addClass('hidden');
          $('.aparece').removeClass('hidden');
          $('.disabled').removeAttr("disabled");
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
    });
}

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

$("#imgInp").change(function(){
    readURL(this);
});

function actualizarDatos() {

}