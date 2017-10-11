
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;digo Mi Auto</title>
    <?php } else { ?>
        <title>Cr&eacute;digo Mi Cash</title>
    <?php } ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>"> 
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-preaprobacion.css?v=<?php echo time();?>">

  <!-- Custom fonts for this template -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  </head>
    <body style="" >
    


    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
          <h6>Cr&eacute;dito vehicular</h6>
          <h3>Auto de Caja Prymera</h3>
        <?php } else { ?>
            <h6 style="color: #fff;font-size: 16px;margin: 23px;text-align: center;position: relative;top: 10px;left: 95px;">Cr&eacute;dito Consumo</h6>
            <h3 style="color: #fff;font-size: 30px;margin: 12px;text-align: center;position: relative;left: 81px;">Mi Cash</h3>
        <?php } ?>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <img class="logo" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
            <ul class="dropdown-menu">
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row" style="background-color: #fff;color: #1C4485;padding:5px 15px;">
        <div class="container">
          <div class="row">
          <?php if($tipo_product == '') {?>
            <h2>Completa los datos:</h2>
          <?php  } else {?>
          <div class="col-xs-12 text-center">
            <h2 class="title-prestamo" id="titulo"><?php echo $tipo_product;?></h2>
          </div>
          <div class="col-xs-12">
          <div class="container max-width-950">
                      <ul class="nav nav-pills">
                        <li class="active"></li>
                          <li></li>
                </ul>
                      <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                              <div class="col-xs-12 text-center">
                              <div class="panel panel-primary" style="border:none; background: rgba(255,255,255,0.6); border-radius:10px">
                                <div class="panel-body" style="margin-bottom:25px">
                                          <div class="row text-center">
                                            <form class="text-center" action="C_resumen" method="POST">
                                              <div class="row-fluid">
                                                  <div class="col-md-12 card-border">
                                                      <div class="col-xs-12 col-sm-8">  
                                                          <p style="font-weight: bold;font-size:20px;color:#1C4485;border-radius:10px"><strong>Datos laborales</strong></p>
                                                            <div class="col-xs-12 p-0">
                                                              <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                      <select class="form-control" id="salario"  name="salario" onchange="habilitarCampo()">
                                                                              <option value="">Salario</option>
                                                                              <option value="">Hasta 1,000 soles</option>
                                                                              <option value="">De 1,000 a 2,000 soles</option>
                                                                              <option value="">De 2,000 a 3,000 soles</option>
                                                                              <option value="">De 3,000 a 4,000 soles</option>
                                                                              <option value="">De 4,000 a 5,000 soles</option>
                                                                              <option value="">De 5,000 a 6,000 soles</option>
                                                                              <option value="">De 6,000 a más</option>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <input type="search" class="form-control" id="empleador" name="empleador" placeholder="Empleador" onchange="habilitarCampo()" maxlenght="50" onkeypress="return soloLetras(event)">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" maxlenght="50" onchange="habilitarCampo()" placeholder="Direcci&oacute;n empresa">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <select class="form-control" id="Departamento" name="Departamento" onchange="getProvincia();habilitarCampo()">
                                                                          <option value="">Departamento</option>
                                                                          <?php echo $comboDepa;?>
                                                                  </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 p-0">
                                                          <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                      <select class="form-control" id="Provincia" name="Provincia" onchange="getDistritos();habilitarCampo()">
                                                                              <option value="">Provincia</option>
                                                                      </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                      <select class="form-control" id="Distrito" name="Distrito" onchange="habilitarCampo()">
                                                                                <option value="">Distrito</option>
                                                                      </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 text-left">
                                                              <div class="checkbox">
                                                                        <label>
                                                                          <input type="checkbox" id="checkAutorizo" onchange="habilitarCampo()" name="autorizacion"> Autorizo que usen mis datos para esta oferta
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                                <p><strong class="size">Datos del contacto</strong></p>
                                                                <div class="col-xs-12 p-0">
                                                                <div class="col-sm-12">
                                                                      <div class="form-group">
                                                                        <input type="text" class="form-control" id="nro_celular" name="nro_celular" placeholder="Nro. Celular" onkeypress="return valida(event)" onchange="habilitarCampo()" maxlength="9">
                                                                      </div>
                                                                    </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                        <select class="form-control" onchange="habilitarCampo()" name="codigo" id="codigo">
                                                                          <option value="">C&oacute;digo</option>
                                                                        </select>
                                                                      </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                        <input type="text" class="form-control" onchange="habilitarCampo()" id="nro_fijo" name="nro_fijo" placeholder="Nro. Fijo" onkeypress="return valida(event)" maxlength="7">
                                                                      </div>
                                                                </div>
                                                              </div>
                                                              <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                                                                <div class="col-xs-12">
                                                                  <div class="form-group">
                                                                        <select class="form-control" id="concesionaria" name="agencias" onchange="ocultarAgencia();habilitarCampo()">
                                                                          <option value="">Concesionaria</option>
                                                                          <?php echo $comboConcecionaria?>
                                                                        </select>
                                                                        </div>
                                                                  </div>
                                                              <?php } else { ?>
                                                                  <div class="col-xs-12 hidden">
                                                                  <div class="form-group">
                                                                        <select class="form-control" id="concesionaria" name="agencias" onchange="ocultarAgencia();habilitarCampo()">
                                                                          <option value="">Concesionaria</option>
                                                                          <?php echo $comboConcecionaria?>
                                                                        </select>
                                                                        </div>
                                                                  </div>
                                                              <?php } ?>
                                                              <div class="col-xs-12">
                                                              <div class="form-group">
                                                                    <select class="form-control" id="idagencia" name="agencias" onchange="habilitarCampo()">
                                                                      <option value="">Agencias</option>
                                                                         <?php echo $comboAgencias?>
                                                                    </select>
                                                                    </div>
                                                              </div>
                                                                <div class="col-xs-12">
                                                                  <div class="form-group">
                                                                    <input type="text" class="form-control" id="email" onchange="habilitarCampo()" name="email" placeholder="Email" value="<?php echo $email?>">
                                                                  </div>
                                                                </div>  
                                                                <div class="col-xs-12 m-t-50 text-right">
                                                                  <div class="container" style="position: relative;top: -53px;left: -10px;">
                                                              <ul class="nav nav-pills">
                                                            <li id="remove" class="remove"><a style="background-color: #005aa6;color: #fff;position: relative;top: 17px;font-family: 'quicksandlight';font-size: 15px;border-radius: 7px;" href="http://localhost:8080/C_preaprobacion">Regresar</a></li>
                                                          </ul>
                                                        </div>
                                                                  <button type="button" style="background-color: #005aa6;color: #fff;font-weight: lighter;font-size: 16px;position: relative;top: -81px;font-family: 'quicksandlight'" data-toggle="modal" data-target="#myModaltelef" class="btn btn-lg selector" id="btnAceptar" onclick="enviarMail()" disabled>Aceptar</button>
                                                                </div>
                              </div>
                                                    </div>
                          </div>
                                            </form>
                                          </div>
                                  </div>
                              </div>
                              </div>
              </div>
            </div>
                  </div>
        </div>
          <?php  }?>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- <div class="col-sm-12 col-md-4 col-md-offset-4"> -->

    </div>



    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" aria-label="Close"><span style="color:#fff" aria-hidden="true">&times;</span></button>
          <p style="text-align: center;font-size: 16px;">Desea ampliar?</p>
        </div>
        <div class="modal-body">
          <div class="bs-example">
            <div class="form-group" id="tablaCronograma" style="margin-left: 55px;">
              <p style="color:#808080">Para ampliar su oferta, complete la solicitud con el valor</p>
                <p style="color:#808080">m&aacute;ximo permitido, luego dirijase a la agencia para</p>
                <p style="color:#808080">evaluar su solicitud en Riesgos y proceder a la firma del</p>
                <p style="color:#808080">Expediente</p>
          </div>
      </div>
        </div>
        <div class="modal-footer" style="text-align: center;">
        </div>
      </div>
  </div>
</div>

<div class="modal fade" aria-label="Close" id="myModaltelef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" onclick="limpiarCampos()"><span style="color:#fff" aria-hidden="true">&times;</span></button>
              <p style="text-align: center;font-size: 18px">Validar celular</p>
            </div>
            <div class="modal-body">
              <div class="bs-example">
                <div class="table-responsive ocultar" id="tablaCronograma" style="display: block;">
                  <p style="margin-bottom: 0;font-size: 19px;color:#808080">Para poder terminar con la solicitud </p> 
                  <p style="margin-bottom: 11px;font-size: 19px;color:#808080">Por favor ingrese el c&oacute;digo de seguridad que ha sido enviado a su celular: </p>
                  <div class="center">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="uno">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="dos">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="tres">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="cuatro">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="cinco">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1" id="seis">
                  </div>  
                  <br>
                  <div class="col-xs-12">
                    <a href="" style="color: #0060aa;font-size: 15px;margin: -15px;" onclick="reenviarEmail()">Enviar otro c&oacute;digo</a><br>
                    <a href="" style="color: #0060aa;font-size: 15px;margin: -15px;" data-dismiss="modal" onclick="limpiarCampos()">Cambiar celular</a>
                  </div>
            </div>
            <div class="table-responsive otro" id="idError" style="display: none;">
                <br>
                <br>
                <p style="margin-bottom: 0;font-size: 19px;color:#808080">El n&uacute;mero ingresado no es v&aacute;lido</p> 
                <br>
                <br>
            </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button confirmar" class="btn btn-primary" id="confirmar" aria-label="Close" style="display: block;" onclick="verificarNumero()">Confirmar</button>
              <button type="button cambiar" class="btn btn-primary" id="cambiar" aria-label="Close" style="display: none;" onclick="cambiarCelular()">Cambiar C&oacute;digo</button>
            </div>
          </div>
      </div>
    </div>



    

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsconfirmacion.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#uno').keypress(function() {
        $(this).next(':input').focus();
      });
      $('#dos').keypress(function() {
        $(this).next(':input').focus();
      });
      $('#tres').keypress(function() {
        $(this).next(':input').focus();
      });
      $('#cuatro').keypress(function() {
        $(this).next(':input').focus();
      });
      $('#cinco').keypress(function() {
        $(this).next(':input').focus();
      });
    });
  </script>
  </body>
</html>