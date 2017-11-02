<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;dito Mi Auto</title>
    <?php } else { ?>
        <title>Cr&eacute;dito Mi Cash</title>
    <?php } ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">

    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">
    

  </head>
    <body>
    

  <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
            <h1 class="title-header-first"><a href="/C_login">Cr&eacute;dito Vehicular</a></h1>
            <h1 class="title-header-second"><a href="/C_login">Auto de Prymera</a></h1>
            <?php } else { ?>
            <h1 class="title-header-first"><a href="/Micash">Cr&eacute;dito consumo</a></h1>
            <h1 class="title-header-second"><a href="/Micash">Mi Cash</a></h1>
          <?php } ?>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
            <h1 style="display: none"><a href="/C_login">Cr&eacute;dito Vehicular | Auto de Prymera</a></h1>
            <?php } else { ?>
            <h1 style="display: none"><a href="/Micash">Cr&eacute;dito consumo | Mi Cash</a></h1>
          <?php } ?>
        </div>
      </div>    
    </div>            
  </div>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed btn-collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>    
    <div class="collapse navbar-collapse custom-menu-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a><?php echo _getSesion('nombreCompleto') ?></a></li>
        <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
          <li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
        <?php } ?>
        <?php if(_getSesion('rol') == 'asesor'){ ?>
          <li><a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a></li>
        <?php } ?>
        <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="container container-simulador">

    <div class="row m-t-40 m-b-20">
      <div class="col-xs-12 col-sm-9 text-center">
        <h2 class="titulo-simulador font-bold"><?php echo $tipo_product;?><span> Confirma tus datos</span></h2>
      </div>
      <div class="hidden-xs hidden-xs col-sm-3 button-login text-right">
        <ul class="nav navbar-nav navbar-right dropdown-menu-user">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                    <?php if(_getSesion('rol') == 'administrador' || _getSesion('rol') == 'jefe_agencia'){ ?>
                    <a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a>
                    <?php } ?>
                </li>
                <li>
                    <?php if(_getSesion('rol') == 'asesor'){ ?>
                    <a href="/C_reporteAsesor/agenteCliente" class="navegacion-a">Ver Reportes</a>
                    <?php } ?>
                </li>
                <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
              </ul>
            </li>
        </ul>            
      </div>
    </div>

    <div class="row">
          <?php if($tipo_product == '') {?>
            <h2>Completa los datos:</h2>
          <?php  } else {?>
          
          <div class="col-xs-12 col-md-10 col-md-offset-1">
              
                <div class="col-xs-12 card-border">
                  <form class="text-center" action="C_resumen" method="POST">
                    <div class="col-xs-12 col-sm-8">  
                        <p class="sub-title"><strong>Datos laborales</strong></p>
                          <div class="col-xs-12 p-0">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <select class="form-control" id="salario"  name="salario" onchange="habilitarCampo()">
                                          <option value="">* Ingreso Mensual</option>
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
                                <input type="search" class="form-control" id="empleador" name="empleador" maxlength="50" placeholder="* Empleador" onchange="habilitarCampo()" onkeyup="verificarDatos(event);">
                              </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" maxlength="50" onchange="habilitarCampo()" onkeyup="verificarDatos(event);" placeholder="* Direcci&oacute;n de Empresa">
                              </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                                <select class="form-control" id="Departamento" name="Departamento" onchange="getProvincia();habilitarCampo()">
                                        <option value="">* Departamento</option>
                                        <?php echo $comboDepa;?>
                                </select>
                              </div>
                          </div>
                          <div class="col-xs-12 p-0">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select class="form-control" id="Provincia" name="Provincia" onchange="getDistritos();habilitarCampo()">
                                          <option value="">* Provincia</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select class="form-control" id="Distrito" name="Distrito" onchange="habilitarCampo()">
                                            <option value="">* Distrito</option>
                                  </select>
                                </div>
                            </div>
                          </div>
                    <!--      <div class="col-xs-12 text-left">
                            <div class="checkbox">
                                      <label>
                                        <input type="checkbox" id="checkAutorizo" onchange="habilitarCampo()" name="autorizacion"> Autorizo que usen mis datos para esta oferta
                                      </label>
                                  </div>
                          </div>-->
                      </div>
                      <div class="col-xs-12 col-sm-4 linea">
                              <p class="sub-title"><strong>Datos del contacto</strong></p>
                              <div class="col-xs-12 p-0">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="nro_celular" name="nro_celular" placeholder="* N&uacute;mero Celular" onkeypress="return valida(event)" onkeyup="verificarDatos(event);" onchange="habilitarCampo()" maxlength="9">
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-group">
                                    <select class="form-control" onchange="habilitarCampo();cambiarTam();" name="codigo" id="codigo">
                                      <option value="">C&oacute;d,</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-7">
                                  <div class="form-group">
                                      <input type="text" class="form-control" onchange="habilitarCampo()" id="nro_fijo" name="nro_fijo" placeholder="Telefono Fijo" onkeypress="return valida(event)" onkeyup="verificarDatos(event);" maxlength="7">
                                  </div>
                                </div>
                              </div>
                            <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <select class="form-control" id="concesionaria" name="agencias" onchange="ocultarAgencia();habilitarCampo()">
                                    <option value="">* Concesionario</option>
                                    <?php echo $comboConcecionaria?>
                                  </select>
                                </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-xs-12 hidden">
                                  <div class="form-group">
                                    <select class="form-control" id="concesionaria" name="agencias" onchange="ocultarAgencia();habilitarCampo()">
                                      <option value="">* Concesionaria</option>
                                        <?php echo $comboConcecionaria?>
                                    </select>
                                  </div>
                                </div>
                            <?php } ?>
                            <div class="col-xs-12">
                              <div class="form-group">
                                <select class="form-control" id="idagencia" name="agencias" onchange="habilitarCampo()">
                                  <option value="">* Agencias</option>
                                       <?php echo $comboAgencias?>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12">
                              <div class="form-group">
                                <input type="text" class="form-control" id="email" onchange="habilitarCampo()" name="email" placeholder="Email" onkeyup="verificarDatos(event);" value="<?php echo $email?>">
                              </div>
                            </div>
                            <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                            <div class="col-xs-12">
                             <div class="form-group">
                                <select class="form-control" id="estado_civil" name="estado_civil" onchange="mostrarEstadoCivil()">
                                  <option value="">Estado Civil</option>
                                  <option value="soltero">Soltero</option>
                                  <option value="casado">Casado</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12 oculto hidden">
                              <div class="form-group">
                                <input type="text" class="form-control" id="nombre_conyugue" name="nombre_conyugue" placeholder="Nombre del Conyugue" maxlength="50" onkeypress="return soloLetras(event)">
                              </div>
                            </div>
                            <div class="col-xs-12 oculto hidden">
                              <div class="form-group">
                                <input type="text" class="form-control" id="dni_conyugue" name="dni_conyugue" placeholder="DNI del Conyugue" maxlength="8" onkeypress="return valida(event)">
                              </div>
                            </div>
                            <?php } ?>
                      </div>
                      <div class="col-xs-12 m-t-50">
                        <a id="remove" class="link" href="/Preaprobacion">Regresar</a>
                      </div>
                      <button type="button" style="" data-toggle="modal" data-target="#myModaltelef" class="btn btn-lg btn-aceptar selector mousehover" id="btnAceptar" onclick="enviarMail()" disabled>Aceptar</button>
                  </form>
                </div>                                        
        </div>
          <?php  }?>
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
  <div class="modal-dialog modal-lg centrar" role="document">
    <div class="modal-content">
      <div class="modal-header"><button type="button" style="" class="close btn-close" data-dismiss="modal" onclick="limpiarCampos()"><span style="" aria-hidden="true">&times;</span></button>
        <p style="text-align: center;font-size: 18px;color: #0060aa;font-weight: bold !important;font-family: quicksandbold !important;">Validar Celular</p>
      </div>
      <div class="modal-body modal-celular">
        <div class="row">
          <div class="col-xs-12 modal-div-text ocultar" id="tablaCronograma" style="">
            <p style="">Para poder terminar con la solicitud, Por favor ingrese el c&oacute;digo de seguridad <br>que ha sido enviado a su celular: </p>
            <div class="col-xs-12 text-center modal-div-numbers">
              <input type="text" placeholder="" size="4" maxlength="1" id="uno">
              <input type="text" placeholder="" size="4" maxlength="1" id="dos">
              <input type="text" placeholder="" size="4" maxlength="1" id="tres">
              <input type="text" placeholder="" size="4" maxlength="1" id="cuatro">
              <input type="text" placeholder="" size="4" maxlength="1" id="cinco">
              <input type="text" placeholder="" size="4" maxlength="1" id="seis">
            </div>
          </div>
          <div class="col-xs-12 text-center">
            <a style="color: #0060aa;font-size: 15px" onclick="enviarMail()">Enviar otro c&oacute;digo</a><br>
            <a href="" style="color: #0060aa;font-size: 15px" data-dismiss="modal" onclick="limpiarCampos()">Cambiar Celular</a>
          </div>
          <div class="col-xs-12 otro" id="idError" style="display: none;">
              <br>
              <p style="margin-bottom: 0;font-size: 22px;margin-top: 25px;color:#808080;text-align: center;">El n&uacute;mero ingresado no es v&aacute;lido</p> 
              
          </div>
        </div>              
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-xs-12">
            <button type="button confirmar" class="btn btn-lg botones" id="confirmar" aria-label="Close" style="display: block; margin: 0 auto" onclick="verificarNumero()">Confirmar</button>
            <button type="button cambiar" class="btn btn-lg botones-codigo" id="cambiar" aria-label="Close" style="display: none; margin: 0 auto" onclick="cambiarCelular()">Cambiar C&oacute;digo</button>  
          </div>                
        </div>
      </div>
    </div>
  </div>
</div>



    

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jsconfirmacion.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>

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