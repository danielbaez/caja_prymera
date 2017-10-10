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
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap_select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
  <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-preaprobacion.css?v=<?php echo time();?>">

  <!-- Custom fonts for this template -->
  </head>
    <body style="padding-top: 70px;" >
    


    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="text-left">
          <h6>Cr&eacute;dito Vehicular</h6>
        </div>
        <div class="text-left">
          <h1>Auto de Caja Prymera</h1>
        </div>
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
            <h1 class="title-prestamo" id="titulo"><?php echo $tipo_product;?></h1>
          </div>
          <div class="col-xs-12">
          <div class="container max-width-950">
                      <ul class="nav nav-pills">
                        <li class="active"></li>
                          <li></li>
                </ul>
                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="row" style="margin-top:30px">
                            <div class="col-xs-12">
                              <form class="text-center form-horizontal">
                                    <div class="col-xs-12 col-md-6 m-t-30" style="color:black;font-size:16px;">
                                              <div class="col-md-6">
                                                <select class="form-control" style="position:relative;left: 40px;top: -18px;font-family: 'quicksandlight';" name="marca" title="Selec. Tipo de pago" id="marca" onchange="getModelo()">
                                                        <option value="">Marca</option>
                                                        <?php echo $comboMarca?>
                                                  </select>
                                              </div>
                                              <div class="col-md-6">
                                                <select class="form-control" style="position:relative;left: 40px;top: -18px;font-family: 'quicksandlight';" name="modelo" title="Selec. Tipo de pago" id="modelo">
                                                        <option value="">Modelo</option>
                                                  </select>
                                              </div>
                                              <div class="col-md-12 m-l-62 m-t-15">
                                                <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;left: 78px;top: 45px;">
                                                      <span><?php echo $plazo_min ?>m</span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                      <span><?php echo  $plazo_min?>m</span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                      <span><?php echo $plazo_max ?>m</span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 ">
                                                        <label for="slider-range-plazo" style="position: relative;top: 4px;">Plazo de pr&eacute;stamo</label>
                                                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="top: -26px;left: 87px;" data-toggle="tooltip" data-placement="bottom" data-original-title="&iquest;Cuanto tiempo quieres pagar tu cr&eacute;dito?"><i class="mdi mdi-info"></i></button>
                                                        <div id="slider-range-plazo"></div>
                                                        <p id="slider-range-value-plazo" style="margin-top:10px;margin-bottom:0;position: relative;right: 135px;top: -41px;border: 1px solid #ececec;width: 112px;height: 52px;padding: 13px;font-family: 'quicksandlight'"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;left: 9px;top: 45px;">
                                                      <span><?php echo $plazo_max ?>m</span>
                                                    </div>
                                              </div>
                                              <div class="col-md-12 m-l-62">
                                                <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;left: 78px;top: 45px;">
                                                      <span id="sueldoMin">S/ <?php echo  $montoMinimo?></span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                      <span >S/ <?php echo  $montoMinimo?></span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                      <span>S/ <?php echo  $montoMaximo?></span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <label for="slider-range-monto" style="position: relative;top: 4px;">Monto del veh&iacute;culo</label>
                                                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="top: -26px;left: 87px;" data-toggle="tooltip" data-placement="bottom" data-original-title="&iquest;Cual precio del veh&iacute;culo?"><i class="mdi mdi-info"></i></button>
                                                        <div id="slider-range-monto"></div>
                                                        <p id="slider-range-value-monto" style="margin-top:10px;margin-bottom:0;position: relative;right: 135px;top: -41px;border: 1px solid #ececec;width: 112px;height: 52px;padding: 13px;font-family: 'quicksandlight'"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;left: 0px;top: 45px;">
                                                      <span id="sueldoMax">S/ <?php echo  $montoMaximo?></span>
                                                    </div>
                                              </div>
                                              <div class="col-md-12 m-l-62 p-t-17">
                                                <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;top: 67px;left: 70px">
                                                      <span id="minCuota">S/ <?php echo  $cuotaMinimo?></span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                      <span>S/ <?php echo  $cuotaMinimo?></span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                      <span>S/ <?php echo  $cuotaMaximo?></span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                      <label for="slider-range-cuota" class="m-16" style="position: relative;left: -33px;top: 15px;">Cuota inicial</label>
                                                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="top: -28px;left: 33px;" data-toggle="tooltip" data-placement="bottom" data-original-title="&iquest;Cuanto ser&aacute; el monto inicial que dar&aacute;s para el pr&eacute;stamo?"><i class="mdi mdi-info"></i></button>
                                                        <div id="slider-range-cuota"></div>
                                                        <p id="slider-range-value-cuota" style="margin-top:10px;margin-bottom:0;position: relative;right: 135px;top: -41px;border: 1px solid #ececec;width: 112px;height: 52px;padding: 13px;font-family: 'quicksandlight'"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px;position: relative;left: 0px;top: 67px;">
                                                      <span id="maxCuota">S/ <?php echo  $cuotaMaximo?></span>
                                                    </div>
                                              </div>
                                              <div class="col-md-12" style="color:black;font-size:16px;position: relative; left: -27px">
                                                    <label class="control-label col-xs-5 col-sm-5 hidden" for="email">Tipo de pago:</label>
                                                    <div class="col-xs-7 col-md-5 hidden">
                                                        <select class="form-control" name="marca" title="Selec. Tipo de pago" id="tipoPago">
                                                            <option value="">Tipo de pago</option>
                                                            <option value="1">Simple</option>
                                                            <option value="2" disabled>Doble</option>
                                                        </select>
                                                    </div>
                                              </div>
                                    </div>
                                            <div class="col-xs-12 col-md-6 text-center" style="color: black;font-size:16px;position: relative;left: 100px;width: 35%;">
                                        <div class="col-md-12" style="border: 1px solid #1C4485;border-bottom-right-radius: 50px;border-top-left-radius: 50px;border-width: 2px;">
                                          <div class="col-md-12" style="margin: 10px">
                                            <p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">Pago total</p>
                                                    <span style="color:#1C4485;font-size: 20px" id="cantTotPago">S/ 0</span>
                                          </div>
                                          <div class="col-md-12" style="margin: 10px">
                                            <p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">Cuota Mensual*</p>
                                                    <span style="color:#1C4485;font-size: 20px" id="cantMensPago">S/ 0</span>
                                          </div>
                                          <div class="col-md-12" style="margin: 10px">
                                            <p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">TCEA</p>
                                                    <span style="color:#1C4485;font-size: 20px" id="tcea">0%</span>
                                                    <span style="display: none" id="tea">0%</span>
                                          </div>
                                          <div class="col-md-12" style="margin: 10px">
                                            <p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">Seguro de Auto</p>
                                                    <span style="color:#1C4485;font-size: 20px" id="seguroAuto">S/ 0</span>
                                                    <p style="color:#A9A9A9;font-size:11px">*Cuota aproximada sujeta a evaluación</p>
                                          </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top: 15px;margin-left: -28px;">
                                          <div class="col-xs-6 text-center">
                                                        <button type="button" class="btn btn-lg" style="background-color: #bdbebf;color: #fff;font-size: 15px;width: 125px;height: 51px;font-family: 'quicksandbold';padding: 1px;" data-toggle="modal" data-target="#myModal" id="generarCronograma">Deseo<br>Ampliar</button>
                                                    </div>
                                        </div>
                                        <div class="col-md-6" style="position: relative;top: 15px;">
                                          <div class="col-xs-6 text-center">
                                            <div class="container" style="position: relative;top: 30px;">
                                                  <ul class="nav nav-pills">
                                                <li id="remove1" class="remove1"><a data-toggle="tab" style="background-color: #1C4485;color: #fff;position: relative;top: -30px;height: 50px;width: 116px;font-family: 'quicksandbold';" onclick="addStyle()">Siguiente</a></li>
                                              </ul>
                                            </div>
                                                    </div>
                                        </div>            
                                            </div>
                                    <div class="col-xs-12" style="height:20px"></div>
                                    <div class="col-xs-12 visible-xs" style="height:20px"></div>
                                    <div class="col-xs-12 col-md-6" style="color:black;font-size:16px;"></div>
                                  </form>
                          </div>
                  </div>
                        </div>
                            <div id="menu1" class="tab-pane fade">
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
                                                                      <select class="form-control"  name="salario" id="salario">
                                                                              <option value="">Salario</option>
                                                                              <option value="1000">Hasta 1,000 soles</option>
                                                                              <option value="De 1,000 a 2,000 soles">De 1,000 a 2,000 soles</option>
                                                                              <option value="De 2,000 a 3,000 soles">De 2,000 a 3,000 soles</option>
                                                                              <option value="De 3,000 a 4,000 soles">De 3,000 a 4,000 soles</option>
                                                                              <option value="De 4,000 a 5,000 soles">De 4,000 a 5,000 soles</option>
                                                                              <option value="De 5,000 a 6,000 soles">De 5,000 a 6,000 soles</option>
                                                                              <option value="De 6,000 a más">De 6,000 a más</option>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <input type="search" class="form-control" id="empleador" name="empleador" placeholder="Empleador" maxlength="50" onkeypress="return soloLetras(event)">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" maxlength="50" placeholder="Direcci&oacute;n empresa">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <div class="form-group">
                                                                  <select class="form-control" id="Departamento" name="Departamento" onchange="getProvincia()">
                                                                          <option value="">Departamento</option>
                                                                          <?php echo $comboDepa;?>
                                                                  </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 p-0">
                                                                <div class="col-sm-6 col-md-6 mdl-input-group">
                                                         <div class="form-group">
                                                                 <select class="form-control" id="Provincia" name="Provincia" onchange="getDistritos()">
                                                                 <option value="">Provincia</option>
                                                                  </select>
                                                             </div>
                                                     </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                      <select class="form-control" id="Distrito" name="Distrito">
                                                                                <option value="">Distrito</option>
                                                                      </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 text-left">
                                                              <div class="checkbox">
                                                                        <label>
                                                                          <input type="checkbox" name="autorizacion" id="checkAutorizacion"> Autorizo que usen mis datos para esta oferta
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4">
                                                                <p style="font-size: 19px;"><strong>Datos del contacto</strong></p>
                                                                <div class="col-xs-12 p-0">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                      <input type="text" class="form-control" id="nro_celular" name="nro_celular" placeholder="Nro. Celular" maxlength="9" onkeypress="return valida(event)">
                                                                    </div>
                                                                  </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                        <select class="form-control" name="codigo" id="codigo">
                                                                          <option value="">C&oacute;digo</option>
                                                                        </select>
                                                                      </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                        <input type="text" class="form-control" id="nro_fijo" name="nro_fijo" placeholder="Nro. Fijo" maxlength="7" onkeypress="return valida(event)">
                                                                      </div>
                                                                </div>
                                                              </div>
                                                              <div class="col-xs-12">
                                                              <div class="form-group">
                                                                    <select class="form-control" name="agencias">
                                                                      <option value="">Concesionaria</option>
                                                                      <?php echo $comboConcecionaria?>
                                                                    </select>
                                                                    </div>
                                                              </div>
                                                              <div class="col-xs-12">
                                                              <div class="form-group">
                                                                    <select class="form-control" name="agencias">
                                                                      <option value="">Agencias</option>
                                                                          <?php echo $comboAgencias?>
                                                                    </select>
                                                                    </div>
                                                              </div>
                                                                <div class="col-xs-12">
                                                                  <div class="form-group">
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email?>">
                                                                  </div>
                                                                </div>  
                                                                <div class="col-xs-12 m-t-50 text-right">
                                                                  <div class="container" style="position: relative;top: 30px;">
                                                              <ul class="nav nav-pills">
                                                            <li id="remove" class="remove"><a data-toggle="tab" style="background-color: #005aa6; color: #fff;position: relative;top: 15px;" href="#home" onclick="addStyle()">Regresar</a></li>
                                                          </ul>
                                                        </div>
                                                                  <button type="button" style="background-color: #0060aa;color:#fff;font-weight: normal;" class="btn btn-lg selector" onclick="enviarMail()">Aceptar</button>
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
            <div class="modal-header">
              <button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" aria-label="Close"><span style="color:#fff" aria-hidden="true">&times;</span></button>
              <p style="text-align: center;font-size: 18px">Validar celular</p>
            </div>
            <div class="modal-body">
              <div class="bs-example">
                <div class="table-responsive" id="tablaCronograma">
                  <p style="margin-bottom: 0;font-size: 19px;color:#808080">Para poder terminar con la solicitud </p> 
                  <p style="margin-bottom: 11px;font-size: 19px;color:#808080">Por favor ingrese el c&oacute;digo de seguridad que ha sido enviado a su celular: </p>
                  <div class="center">
                    <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                      <input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  </div>  
                  <br>
                  <div class="col-xs-12">
                      <a href="" style="color: #0060aa;font-size: 15px;margin: -15px;">Enviar otro c&oacute;digo</a>
                    </div>
            </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" aria-label="Close" onclick="verificarNumero()">Confirmar</button>
            </div>
          </div>
      </div>
    </div>



    
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap_select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
  <script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jspreaprobacion.js?v=<?php echo time();?>"></script>
   <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    


  <script>
  (function($){
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();  
  });
    
    //////////

    var rangeSliderPlazo = document.getElementById('slider-range-plazo');

    noUiSlider.create(rangeSliderPlazo, {
      start: [ <?php echo $plazo_max ?> ],
      step: <?php echo $plazo_step?>,
      range: {
        'min': [  <?php echo $plazo_min ?> ],
        'max': [ <?php echo $plazo_max ?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: ' meses',
      })
    });

    if(<?php echo $plazo_min ?> == <?php echo $plazo_max ?>){
      rangeSliderPlazo.setAttribute('disabled', true);
    }

    var rangeSliderValueElementPlazos = document.getElementById('slider-range-value-plazo');

    rangeSliderPlazo.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementPlazos.innerHTML = values[handle];
      meses_pago = values[handle];
    });

    rangeSliderPlazo.noUiSlider.on('change', function( values, handle ) {
      rangeSliderValueElementPlazos.innerHTML = values[handle];
      meses_pago = values[handle];
      monto = $('#slider-range-value-monto').html();
      cuota = $('#slider-range-value-cuota').html();
      marca = $('#marca option:selected').val();
      modelo= $('#modelo option:selected').val();

      m = monto.replace(/[^0-9.]/g, "");
      c = cuota.replace(/[^0-9.]/g, "");

      /*if(parseFloat(m) < parseFloat(c)){
        alert('El monto no puede ser menor que la cuota inicial')
      }else{*/
        if(modelo != ''){
          rangeSliderCuota.removeAttribute('disabled');
          $.ajax({
            data  : { meses    : meses_pago,
                    cuota : cuota,
                    monto: monto,
                    marca: marca,
                    modelo: modelo,
                    action: 'plazo'
                  },
            url   : 'C_preaprobacion/changeValues',
            type  : 'POST',
            dataType: 'json'
          }).done(function(data){
            console.log(data);

            $('#sueldoMin').html('S/ '+data.montoMinimo);
            $('#sueldoMax').html('S/ '+data.montoMaximo);

            $('#minCuota').html('S/ '+data.cuotaMinimo);
            $('#maxCuota').html('S/ '+data.cuotaMaximo);

            rangeSliderMonto.noUiSlider.updateOptions({
                range: {
                    'min': data.montoMinimo,
                    'max': data.montoMaximo
                },
                start: data.montoMaximo/2
            });

            rangeSliderCuota.noUiSlider.updateOptions({
                range: {
                    'min': data.cuotaMinimo,
                    'max': data.cuotaMaximo
                },
                start: data.cuotaMinimo
            });

            $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
            $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
            $('#tcea').html(data.tcea+'%');
            $('#tea').html(data.tea+'%');
            $('#seguroAuto').html('S/ '+data.seguroAuto); 
          });
        }
      //}
    });


    //

    var rangeSliderMonto = document.getElementById('slider-range-monto');

      noUiSlider.create(rangeSliderMonto, {
        start: [ <?php echo  $montoMaximo/2?>],
        step: 100,
        range: {
          'min': [  <?php echo  $montoMinimo?> ],
          'max': [ <?php echo  $montoMaximo?> ]
        },
        connect: "lower",
        format: wNumb({
          decimals: 0,
          thousand: ',',
          prefix: ' S/ ',
        })
      });

    var rangeSliderValueElementMonto = document.getElementById('slider-range-value-monto');

    rangeSliderMonto.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementMonto.innerHTML = values[handle];
      meses_pago = values[handle];
    });

    rangeSliderMonto.noUiSlider.on('change', function( values, handle ) {

      console.log(values)
      rangeSliderValueElementMonto.innerHTML = values[handle];
      
      meses = $('#slider-range-value-plazo').html();
      monto = values[handle];
      cuota = $('#slider-range-value-cuota').html();
      marca = $('#marca option:selected').val();
      modelo= $('#modelo option:selected').val();

      m = monto.replace(/[^0-9.]/g, "");
      c = cuota.replace(/[^0-9.]/g, "");

      /*if(parseFloat(m) < parseFloat(c)){
        alert('El monto no puede ser menor que la cuota inicial');
        rangeSliderMonto.noUiSlider.set(100000);
        monto = 'S/ 100000';
      }*/
      if(modelo != ''){
        $.ajax({
          data  : { meses    : meses,
                  cuota : cuota,
                  monto: monto,
                  marca: marca,
                  modelo: modelo, action: 'monto'
                },
          url   : 'C_preaprobacion/changeValues',
          type  : 'POST',
          dataType: 'json'
        }).done(function(data){
          console.log(data);

          $('#minCuota').html('S/ '+data.cuotaMinimo);
          $('#maxCuota').html('S/ '+data.cuotaMaximo);

          if(data.cuotaMinimo == data.cuotaMaximo){
            $('#slider-range-value-cuota').html('S/ '+data.cuotaMinimo)
            rangeSliderCuota.setAttribute('disabled', true);  
          }else{
            rangeSliderCuota.removeAttribute('disabled');
          }

          rangeSliderCuota.noUiSlider.updateOptions({
              range: {
                  'min': data.cuotaMinimo,
                  'max': data.cuotaMaximo
              },
              start: data.cuotaMinimo
          });



          

          $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
          $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
          $('#tcea').html(data.tcea+'%');
          $('#tea').html(data.tea+'%');
          $('#seguroAuto').html('S/ '+data.seguroAuto);
        });
      }
      
    });

    //


    //dias
    var rangeSliderCuota = document.getElementById('slider-range-cuota');

    noUiSlider.create(rangeSliderCuota, {
      start: [ <?php echo  $cuotaMinimo?>],
      step: 100,
      range: {
        'min': [  <?php echo  $cuotaMinimo?> ],
        'max': [ <?php echo  $cuotaMaximo?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' S/ ',
      })
    });

    var rangeSliderValueElementCuotas = document.getElementById('slider-range-value-cuota');

    rangeSliderCuota.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementCuotas.innerHTML = values[handle];
        cuota_inicial = values[handle];
    });

    rangeSliderCuota.noUiSlider.on('change', function( values, handle ) {
      console.log(values)
      rangeSliderValueElementCuotas.innerHTML = values[handle];
      
      meses_pago = $('#slider-range-value-plazo').html();
      monto = $('#slider-range-value-monto').html();
      cuota = values[handle];
      marca = $('#marca option:selected').val();
      modelo= $('#modelo option:selected').val();

      m = monto.replace(/[^0-9.]/g, "");
      c = cuota.replace(/[^0-9.]/g, "");

      /*if(parseFloat(m) < parseFloat(c)){
        alert('El monto no puede ser menor que la cuota inicial');
        rangeSliderMonto.noUiSlider.set(100000);
        monto = 'S/ 100000';
      }*/
      if(modelo != ''){
        //alert($('#slider-range-value-plazo').html())
        //alert(meses_pago)
        $.ajax({
          data  : { meses    : meses_pago,
                  cuota : cuota,
                  monto: monto,
                  marca: marca,
                  modelo: modelo
                },
          url   : 'C_preaprobacion/changeValues',
          type  : 'POST',
          dataType: 'json'
        }).done(function(data){
          console.log(data);
          $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
          $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
          $('#tcea').html(data.tcea+'%');
          $('#tea').html(data.tea+'%');
          $('#seguroAuto').html('S/ '+data.seguroAuto);
        });
      }
      
    });
    

    function currency(n,sep) {
      var sRegExp = new RegExp("(-?[0-9]+)([0-9]{3})"),
      sValue=n+"";
      if (sep === undefined) {sep=",";}
      while(sRegExp.test(sValue)) {
        sValue = sValue.replace(sRegExp, "$1"+sep+"$2");
      }
      return sValue;
    }

//    $("#slider-range").slider();
//    $("#slider-range").on("slide", function(slideEvt) {
//      //$("#ex6SliderVal").text('S/ '+slideEvt.value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
//      $("#slider-range-value").text('Monto S/ '+currency(slideEvt.value));
//      console.log($("#slider-range-value").text('Monto S/ '+currency(slideEvt.value)));
//    });

//     $("#slider-plazo").slider();
//     $("#slider-plazo").on("slide", function(slideEvt) {
//       //$("#ex6SliderVal").text('S/ '+slideEvt.value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
//       $("#val-meses").text('Plazo '+currency(slideEvt.value+' meses'));
//     });

    $( "#generarCronograma" ).click(function() {
      var fecha_pago = $('#fechaPago').val();
      var tipoPago   = $('#tipoPago').val();
      /*$.ajax({
      data  : { cuota : monto,
              meses    : meses_pago,
              fecha    : fecha_pago,
              tipoPago : tipoPago },
      url   : 'C_preaprobacion/generarCronograma',
      type  : 'POST'
        }).done(function(data){
          try{
            data = JSON.parse(data);
            if(data.error == 0){
                $('#tablaCronograma').html(data.tabla); 
                $('#tb_cronograma').bootstrapTable({ });
                tableEventsUpgradeMdlComponentsMDL('tb_cronograma');
                initSearchTableNew();
            }else {
              return;
            }
          } catch (err){
            msj('error',err.message);
          }
        });*/
    });

    $('#modelo').on('change', function() {
      //alert( $(this).find(":selected").val() );

      meses_pago = $('#slider-range-value-plazo').html();
      monto = $('#slider-range-value-monto').html();
      cuota = $('#slider-range-value-cuota').html();
      marca = $('#marca option:selected').val();
      modelo= $('#modelo option:selected').val();
      $.ajax({
        data  : { meses    : meses_pago,
                cuota : cuota,
                monto: monto,
                marca: marca,
                modelo: modelo
              },
        url   : 'C_preaprobacion/changeValues',
        type  : 'POST',
        dataType: 'json'
      }).done(function(data){
        console.log(data);
        $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
        $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
        $('#tcea').html(data.tcea+'%');
        $('#tea').html(data.tea+'%');
        $('#seguroAuto').html('S/ '+data.seguroAuto);
      });

  })


  })(jQuery);

  </script>
  </body>
</html>