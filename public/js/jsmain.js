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
  $('#rol').html('');
  $('#rol').append('<option value="">Rol</option>');
  $('#rol').append('<option value="jefe_agencia">Jefe de Agencia</option>');
  $('#rol').append('<option value="asesor">Asesor</option>');
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
  var nombres = $('#nombres').val();
  var apellidos = $('#apellidos').val();
  var sexo = $('#sexo').val();
  var fecha_nacimiento = $('#fecha_nacimiento').val();
  var dni = $('#dni').val();
  var fecha_ingreso = $('#fecha_ingreso').val();
  var celular = $('#celular').val();
  var email = $('#email').val();
  var rol = $('#rol').val();
  var rol_superior = $('#rol_superior').val();
  var nombre_img = $('#nombre_img').val();
  $.ajax({
    data  : { rol : rol,
              nombres : nombres,
              apellidos : apellidos,
              sexo : sexo,
              fecha_nacimiento : fecha_nacimiento,
              dni : dni,
              fecha_ingreso : fecha_ingreso,
              celular : celular,
              email : email,
              rol : rol,
              rol_superior : rol_superior,
              nombre_img : nombre_img},
    url   : 'C_main/actualizarDatos',
    type  : 'POST'
  }).done(function(data){
      try{
        data = JSON.parse(data);
        if(data.error == 0){
            msj('error', 'Se actualizaron sus datos');
            setTimeout(function(){ location.reload(); }, 1000);
        }else {
        }
      } catch (err){
        msj('error',err.message);
      }
    });
}

$('#blah').on('click', function () {
    $( "#imgInp" ).trigger( "click" );
});