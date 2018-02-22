<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Cr&eacute;dito Auto de Prymera</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">    
  </head>
  <body onload="nobackbutton();">

  <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header-first"><a href="/Vehicular">Cr&eacute;dito Vehicular</a></h1>
          <h1 class="title-header-second"><a href="/Vehicular">Auto de Prymera</a></h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none"><a href="/Vehicular">Cr&eacute;dito Vehicular | Auto de Prymera</a></h1>
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
      <div class="row m-t-40">
        <div class="col-xs-12 col-sm-9 text-center">
          <h2 class="titulo-simulador font-bold"><?php echo $tipo_product;?><span>Tienes un pr&eacute;stamo pre-aprobado</span></h2>
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
        <div class="col-xs-12 m-t30">
          <form class="text-center form-horizontal">
            <div class="col-xs-12 col-md-7" style="padding-top: 55px;">
              <div class="col-xs-6">
                <select class="form-control" name="marca" title="Selec. Tipo de pago" id="marca" onchange="getModelo()">
                  <option value="">Marca</option>
                  <?php echo $comboMarca?>
                </select>
              </div>
              <div class="col-xs-6">
                <select class="form-control" name="modelo" title="Selec. Tipo de pago" id="modelo">
                  <option value="">Modelo</option>
                </select>
              </div>

              <div class="col-xs-12 margin-top"></div>

              <div class="col-xs-3">
                <p id="slider-range-value-plazo" class="slider-value"></p>
              </div>
              <div class="col-xs-9">
                <p class="text-left" style="font-size: 16px">Plazo de Pr&eacute;stamo <i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;En cuanto tiempo quieres pagar tu cr&eacute;dito?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                <div id="slider-range-plazo"></div>
                <br>
                <div class="col-xs-6 text-left padding-left">
                  <span style="font-size: 16px"><?php echo $plazo_min ?>m</span>
                </div>
                <div class="col-xs-6 text-right padding-right">
                  <span style="font-size: 16px"><?php echo $plazo_max ?>m</span>
                </div>
              </div>

              <div class="col-xs-12 margin-top"></div>

              <div class="col-xs-3">
                <p id="slider-range-value-monto" class="slider-value"></p>
              </div>
              <div class="col-xs-9">
                <p class="text-left" style="font-size: 16px">Valor del veh&iacute;culo <i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;Cu&aacute;l es el valor del veh&iacute;culo?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                <div id="slider-range-monto"></div>
                <br>
                <div class="col-xs-6 text-left padding-left">
                  <span id="sueldoMin" style="font-size: 16px">S/ <?php echo  $montoMinimo?></span>
                </div>
                <div class="col-xs-6 text-right padding-right">
                  <span id="sueldoMax" style="font-size: 16px">S/ <?php echo  $montoMaximo?></span>
                </div>
              </div>

              <div class="col-xs-12 margin-top"></div>

              <div class="col-xs-3">
                <p id="slider-range-value-cuota" class="slider-value"></p>
              </div>
              <div class="col-xs-9">
                <p class="text-left" style="font-size: 16px">Cuota inicial <i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;Cuanto ser&aacute; el monto inicial que dar&aacute;s para el pr&eacute;stamo?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                <div id="slider-range-cuota"></div>
                <br>
                <div class="col-xs-6 text-left padding-left">
                  <span id="minCuota" style="font-size: 16px">S/ <?php echo  $cuotaMinimo?></span>
                </div>
                <div class="col-xs-6 text-right padding-right">
                  <span id="maxCuota" style="font-size: 16px">S/ <?php echo  $cuotaMaximo?></span>
                </div>
              </div>

              <div class="col-xs-12 margin-top"></div>

              <div class="col-xs-3">                
              </div>
              <div class="col-xs-9">
                <p class="text-left" style="font-size: 16px">1era fecha de Pago <i class="fa fa-1x fa-info-circle icon-info" data-original-title="Fecha en que Ud. desearía que sea su primer pago." data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                <input type="text" class="form-control" id="periodo_gracia" name="periodo_gracia" onchange="cambiarFecha()" readonly='readonly' style="background: white">
              </div>

            </div>

            <div class="col-xs-12 visible-xs visible-sm margin-top"></div>
            
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-5 col-md-offset-0 text-center div-ajax">
              <div class="col-xs-12 col-md-10 col-md-offset-1 div-ajax-valores">
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">Importe del Pr&eacute;stamo</p>
                          <span class="valor-ajax-valores font-regular" id="importePrestamo">S/ 0</span>
                </div>
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">Pago total</p>
                          <span class="valor-ajax-valores font-regular" id="cantTotPago">S/ 0</span>
                </div>
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">Cuota Mensual</p>
                          <span class="valor-ajax-valores font-regular" id="cantMensPago">S/ 0</span>
                          <i class="fa fa-1x fa-info-circle icon-info" data-original-title="Cuota referencial sujeta a evaluación según fecha de primer pago seleccionada." data-toggle="tooltip" data-placement="bottom" aria-hidden="true" style="position: absolute;top: 6px;right: 77px;color: black;"></i>
                </div>
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">TEA</p>
                          <span class="valor-ajax-valores font-regular" id="tea">0%</span>
                </div>
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">TCEA</p>
                          <span class="valor-ajax-valores" id="tcea">0%</span>
                          <span style="display: none" id="tea"><?php echo $tea?>%</span>                          
                </div>
                <div class="col-md-12 margin-ajax-valores">
                  <p class="titulo-ajax-valores">Seguro del Auto</p>
                          <span class="valor-ajax-valores font-regular" id="seguroAuto">S/ 0 </span><i class="fa fa-1x fa-info-circle icon-info" data-original-title="Valor anual aproximado del seguro vehicular seg&uacute;n marca y modelo, el cual puede variar." data-toggle="tooltip" data-placement="bottom" aria-hidden="true" style="position: absolute;top: 5px;right: 75px;color: black;"></i>
                </div>
              </div>
              <div class="col-xs-6 text-center margin-top-btn">
                <button type="button" class="btn btn-lg btn-text-ampliar font-bold" data-toggle="modal" data-target="#myModal" id="generarCronograma">Deseo<br>ampliar</button>
              </div>
              <div class="col-xs-6 text-center margin-top-btn">
                <a onclick="addStyle()" class="btn btn-lg btn-text-siguiente font-bold">Siguiente</a>
              </div>       
            </div>
          </form>                  
        </div>
      </div>          
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-md centrar" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" style="" class="close btn-close" data-dismiss="modal" aria-label="Close"><span style="" aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" style="">Ampliaci&oacute;n de Cr&eacute;dito</h3>
            </div>
            <div class="modal-body preaprobacion-modal">
              <div class="bs-example">
                <div class="form-group" id="tablaCronograma" style="">
                  <p style="">Si Ud. desea ampliar su oferta de pr&eacute;stamo pre-aprobada, culmine el proceso de solicitud con el monto m&aacute;ximo permitido.</p>
                    <p style="">Al final se le enviar&aacute; un correo con los requisitos,</p>
                    <p style="">para que se acerque a la Agencia de Prymera m&aacute;s cercana.</p>
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
    
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" async src="<?php echo RUTA_JS?>jspreaprobacion.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
    (function($){
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        
        $('#periodo_gracia').datetimepicker({
          format: 'YYYY-MM-DD',
          minDate : new Date().setDate(new Date().getDate()+30),
          maxDate : new Date().setDate(new Date().getDate()+60),
          ignoreReadonly: true
        });
        /*var d = new Date();
        d.setMonth(1);
        d = d.toISOString().slice(0,10);
        $('#periodo_gracia').val(d);*/
        $('#periodo_gracia').on('dp.change', function(e){ 
            var fecha = $('#periodo_gracia').val();
            $('#fecha_change').html(fecha);

            meses_pago = $('#slider-range-value-plazo').html();
            monto   = $('#slider-range-value-monto').html();
            cuota   = $('#slider-range-value-cuota').html();
            marca   = $('#marca option:selected').val();
            modelo  = $('#modelo option:selected').val();
            periodo = $('#periodo_gracia').val();

            m = monto.replace(/[^0-9.]/g, "");
            c = cuota.replace(/[^0-9.]/g, "");
            if(modelo != ''){
              $.ajax({
                data  : { meses : meses_pago,
                        cuota   : cuota,
                        monto   : monto,
                        marca   : marca,
                        periodo : periodo,
                        modelo  : modelo
                      },
                url   : 'C_preaprobacion/changeValues',
                type  : 'POST',
                dataType: 'json'
              }).done(function(data){
                $('#importePrestamo').html('S/ '+currency(data.importeeeeee));
                $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
                $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
                $('#tcea').html(data.tcea+'%');
                $('#tea').html(data.tea+'%');
                $('#seguroAuto').html('S/ '+data.seguroAuto);
              });
            }
        })
    });
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
      periodo = $('#periodo_gracia').val();
      modelo= $('#modelo option:selected').val();

      m = monto.replace(/[^0-9.]/g, "");
      c = cuota.replace(/[^0-9.]/g, "");
        if(modelo != '') {
          rangeSliderCuota.removeAttribute('disabled');
          $.ajax({
            data  : { meses : meses_pago,
                    cuota   : cuota,
                    monto   : monto,
                    marca   : marca,
                    periodo : periodo,
                    modelo  : modelo,
                    action  : 'plazo'
                  },
            url   : 'C_preaprobacion/changeValues',
            type  : 'POST',
            dataType: 'json'
          }).done(function(data){
            $('#sueldoMin').html('S/ '+data.montoMinimo);
            $('#sueldoMax').html('S/ '+data.montoMaximo);

            $('#minCuota').html('S/ '+data.cuotaMinimo);
            $('#maxCuota').html('S/ '+data.cuotaMaximo);

            rangeSliderMonto.noUiSlider.updateOptions({
                range: {
                    'min': data.montoMinimo,
                    'max': data.montoMaximo
                },
                start: (data.montoMinimo+data.montoMaximo)/2
            });

            if(data.cuotaMinimo == data.cuotaMaximo){
              $('#slider-range-value-cuota').html('S/ '+data.cuotaMinimo)
              rangeSliderCuota.setAttribute('disabled', true);  
            }else{
              rangeSliderCuota.removeAttribute('disabled');

              rangeSliderCuota.noUiSlider.updateOptions({
                range: {
                    'min': data.cuotaMinimo,
                    'max': data.cuotaMaximo
                },
                start: data.cuotaMinimo
              });
            }

            $('#importePrestamo').html('S/ '+currency(data.importeeeeee));
            $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
            $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
            $('#tcea').html(data.tcea+'%');
            $('#tea').html(data.tea+'%');
            $('#seguroAuto').html('S/ '+data.seguroAuto); 
          });
        }
    });

    var rangeSliderMonto = document.getElementById('slider-range-monto');
      noUiSlider.create(rangeSliderMonto, {
        start: [ <?php echo  ($montoMinimo+$montoMaximo)/2?>],
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
      rangeSliderValueElementMonto.innerHTML = values[handle];
        
      meses   = $('#slider-range-value-plazo').html();
      monto   = values[handle];
      cuota   = $('#slider-range-value-cuota').html();
      marca   = $('#marca option:selected').val();
      modelo  = $('#modelo option:selected').val();
      periodo = $('#periodo_gracia').val();

      m = monto.replace(/[^0-9.]/g, "");
      c = cuota.replace(/[^0-9.]/g, "");
      if(modelo != ''){
        $.ajax({
          data  : { meses : meses,
                  cuota   : cuota,
                  monto   : monto,
                  marca   : marca,
                  periodo : periodo,
                  modelo  : modelo, action: 'monto'
                },
          url   : 'C_preaprobacion/changeValues',
          type  : 'POST',
          dataType: 'json'
        }).done(function(data){
          $('#minCuota').html('S/ '+data.cuotaMinimo);
          $('#maxCuota').html('S/ '+data.cuotaMaximo);

          if(data.cuotaMinimo == data.cuotaMaximo){
            $('#slider-range-value-cuota').html('S/ '+data.cuotaMinimo)
            rangeSliderCuota.setAttribute('disabled', true);  
          }else{
            rangeSliderCuota.removeAttribute('disabled');

            rangeSliderCuota.noUiSlider.updateOptions({
              range: {
                  'min': data.cuotaMinimo,
                  'max': data.cuotaMaximo
              },
              start: data.cuotaMinimo
            });
          }

          $('#importePrestamo').html('S/ '+currency(data.importeeeeee));
          $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
          $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
          $('#tcea').html(data.tcea+'%');
          $('#tea').html(data.tea+'%');
          $('#seguroAuto').html('S/ '+data.seguroAuto);
        });
      }  
    });

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

    if(<?php echo $cuotaMinimo ?> == <?php echo $cuotaMaximo ?>){
      rangeSliderCuota.setAttribute('disabled', true);
    }

    var rangeSliderValueElementCuotas = document.getElementById('slider-range-value-cuota');
    rangeSliderCuota.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementCuotas.innerHTML = values[handle];
        cuota_inicial = values[handle];
    });
    rangeSliderCuota.noUiSlider.on('change', function( values, handle ) {
    rangeSliderValueElementCuotas.innerHTML = values[handle];
      
    meses_pago = $('#slider-range-value-plazo').html();
    monto   = $('#slider-range-value-monto').html();
    cuota   = values[handle];
    marca   = $('#marca option:selected').val();
    modelo  = $('#modelo option:selected').val();
    periodo = $('#periodo_gracia').val();

    m = monto.replace(/[^0-9.]/g, "");
    c = cuota.replace(/[^0-9.]/g, "");
    if(modelo != ''){
      $.ajax({
        data  : { meses : meses_pago,
                cuota   : cuota,
                monto   : monto,
                marca   : marca,
                periodo : periodo,
                modelo  : modelo
              },
        url   : 'C_preaprobacion/changeValues',
        type  : 'POST',
        dataType: 'json'
      }).done(function(data){
        $('#importePrestamo').html('S/ '+currency(data.importeeeeee));
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

    $( "#generarCronograma" ).click(function() {
      var fecha_pago = $('#fechaPago').val();
      var tipoPago   = $('#tipoPago').val();
    });

    $('#modelo').on('change', function() {
      meses_pago = $('#slider-range-value-plazo').html();
      monto = $('#slider-range-value-monto').html();
      cuota = $('#slider-range-value-cuota').html();
      marca = $('#marca option:selected').val();
      modelo= $('#modelo option:selected').val();
      periodo = $('#periodo_gracia').val();

      $.ajax({
        data  : { meses    : meses_pago,
                cuota : cuota,
                monto: monto,
                marca: marca,
                modelo: modelo,
                periodo : periodo,
                action  : 'modelo'
              },
        url   : 'C_preaprobacion/changeValues',
        type  : 'POST',
        dataType: 'json'
      }).done(function(data){
        console.log(data)
        $('#sueldoMin').html('S/ '+data.montoMinimo);
        $('#sueldoMax').html('S/ '+data.montoMaximo);
        $('#minCuota').html('S/ '+data.cuotaMinimo);
        $('#maxCuota').html('S/ '+data.cuotaMaximo);
        rangeSliderMonto.noUiSlider.updateOptions({
            range: {
                'min': data.montoMinimo,
                'max': data.montoMaximo
            },
            start: (data.montoMinimo+data.montoMaximo)/2
        });

        if(data.cuotaMinimo == data.cuotaMaximo){
          $('#slider-range-value-cuota').html('S/ '+data.cuotaMinimo)
          rangeSliderCuota.setAttribute('disabled', true);  
        }else{
          rangeSliderCuota.removeAttribute('disabled');

          rangeSliderCuota.noUiSlider.updateOptions({
            range: {
                'min': data.cuotaMinimo,
                'max': data.cuotaMaximo
            },
            start: data.cuotaMinimo
          });
        }

        $('#importePrestamo').html('S/ '+currency(data.importeeeeee));
        $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
        $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
        $('#tcea').html(data.tcea+'%');
        $('#tea').html(data.tea+'%');
        $('#seguroAuto').html('S/ '+data.seguroAuto);
      });
  })

  $(document).keypress(function(e) {
    if(e.which == 13) {
        addStyle();
    }
  });

  })(jQuery);
  function nobackbutton(){
       window.location.hash="no-back-button";
       window.location.hash="Again-No-back-button" //chrome
       window.onhashchange=function(){window.location.hash="no-back-button";}
    }
  </script>
  </body>
</html>