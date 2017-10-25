
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
     
    <!-- <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>"> -->
    <!-- <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-preaprobacion.css?v=<?php echo time();?>"> -->

    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">

  <!-- Custom fonts for this template -->
  </head>
    <body>
    


    <!-- <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h6 style="color: #fff;font-family: quicksandlight;margin-left: 100px;margin-top: 35px;">Cr&eacute;dito consumo</h6>
        <h3 style="color: #fff;font-family: quicksandlight;margin-left: 100px;font-size: 30px;margin-top: -10px;">Mi Cash</h3>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <img class="logo" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png" onclick="_goToHomeMicash();">
            <ul class="dropdown-menu">
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header-first">Cr&eacute;dito consumo</h1>
          <h1 class="title-header-second">Mi Cash</h1>
        </div>
        <div class="col-xs-6 div-logo">
          <img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
          <h1 style="display: none">Cr&eacute;dito consumo | Mi Cash</h1>
        </div>
      </div>    
    </div>            
  </div>

  <div class="container container-simulador">
    <div class="row">
      <?php if($tipo_product == '') {?>
        <h2>Completa los datos:</h2>
      <?php  } else {?>
      <div class="col-xs-12 text-center">
        <h2 class="titulo-simulador font-bold"><?php echo $tipo_product;?></h2>
      </div>
      <div class="col-xs-12">
        <form class="text-center form-horizontal">
          <div class="col-xs-12 col-md-7">
            <div class="col-xs-3">
              <p id="slider-range-value-dias" class="slider-value"></p>
            </div>
            <div class="col-xs-9">
              <p class="text-left">Monto <button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="" data-toggle="tooltip" data-placement="bottom" data-original-title="Importe del pr&eacute;stamo a solicitar"><i class="mdi mdi-info"></i></button></p>
              <div id="slider-range-dias"></div>
              <br>
              <div class="col-xs-6 text-left padding-left">
                <span id="minCuota">S/ <?php echo  $importeMinimo?></span>
              </div>
              <div class="col-xs-6 text-right padding-right">
                <span id="maxCuota">S/ <?php echo  $importeMaximo?></span>
              </div>
            </div>
            <div class="col-xs-12 margin-top"></div>

            <div class="col-xs-3">
              <p id="slider-range-value-meses" class="slider-value"></p>
            </div>
            <div class="col-xs-9">
              <p class="text-left">Plazo de Pr&eacute;stamo <button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" data-toggle="tooltip" data-placement="bottom" data-original-title="M&aacute;ximo de meses para pagar"><i class="mdi mdi-info"></i></button></p>
              <div id="slider-range-meses"></div>
              <br>
              <div class="col-xs-6 text-left padding-left">
                <span><?php echo $plazo_min ?>m</span>
              </div>
              <div class="col-xs-6 text-right padding-right">
                <span><?php echo $plazo_max ?>m</span>
              </div>
            </div>
          </div>

          <div class="col-xs-12 visible-xs visible-sm margin-top"></div>
          
          <div class="col-xs-12 col-md-5 text-center">
            <div class="col-xs-12 col-md-10 col-md-offset-1 div-ajax-valores">
              <div class="col-md-12 margin-ajax-valores">
                <p class="titulo-ajax-valores font-bold">Importe del Pr&eacute;stamo</p>
                        <span class="valor-ajax-valores" id="importePrestamo">S/ <?php echo number_format(str_replace( ',', '', $importeMaximo), 0); ?></span>
              </div>
              <div class="col-md-12 margin-ajax-valores">
                <p class="titulo-ajax-valores font-bold">Pago total</p>
                        <span class="valor-ajax-valores" id="cantTotPago">S/ <?php echo $pagoTotal?></span>
              </div>
              <div class="col-md-12 margin-ajax-valores">
                <p class="titulo-ajax-valores font-bold">Cuota Mensual*</p>
                        <span class="valor-ajax-valores" id="cantMensPago">S/ <?php echo $cuotaMensual?></span>
              </div>
              <div class="col-md-12 margin-ajax-valores">
                <p class="titulo-ajax-valores font-bold">TEA</p>
                        <span class="valor-ajax-valores" id="tea"><?php echo $tea?>%</span>
              </div>
              <div class="col-md-12 margin-ajax-valores">
                <p class="titulo-ajax-valores font-bold">TCEA</p>
                        <span class="valor-ajax-valores" id="tcea"><?php echo $tcea?>%</span>
                        <span style="display: none" id="tea"><?php echo $tea?>%</span>
                        <p class="letra-chica font-bold">*Cuota aproximada sujeta a evaluaci&oacute;n</p>
              </div>
            </div>
            <div class="col-xs-6 text-center margin-top-btn">
              <button type="button" class="btn btn-lg btn-text-ampliar font-bold" data-toggle="modal" data-target="#myModal" id="generarCronograma">Deseo<br>Ampliar</button>
            </div>
            <div class="col-xs-6 text-center margin-top-btn">
              <a onclick="addStyle()" class="btn btn-l btn-text-siguiente font-bold">Siguiente</a>
            </div>       
          </div>
        </form>                  
      </div>
    </div>          
    <?php  }?>
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
              <p style="color:#808080">Si Ud. desea ampliar su oferta de pr&eacute;stamo pre-aprobada,</p>
                <p style="color:#808080">culmine el proceso de solicitud con el monto m&aacute;ximo permitido.</p>
                <p style="color:#808080">Al final se le enviar&aacute; un correo con los requisitos,</p>
                <p style="color:#808080">para que se acerque a la Agencia de Prymera m&aacute;s cercana.</p>
          </div>
      </div>
        </div>
        <div class="modal-footer" style="text-align: center;">
        </div>
      </div>
  </div>
</div>    

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jspreaprobacion_m.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script>
  (function($){
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
      var glob_pagoTotal = null;
      var glob_cuotaMensual = null;
      var glob_tcea = null;
  });

    var meses_pago = null;
    var cuota_inicial = null;
    var glob_pagoTotal = null;
    var glob_cuotaMensual = null;
    var glob_tcea = null;

    //////////

    var rangeSliderMeses = document.getElementById('slider-range-meses');

    noUiSlider.create(rangeSliderMeses, {
      start: [ <?php echo $plazo_max ?> ],
      step: <?php echo $plazo_step  ?>,
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
      rangeSliderMeses.setAttribute('disabled', true);
    }

    var rangeSliderValueElementMeses = document.getElementById('slider-range-value-meses');

    rangeSliderMeses.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementMeses.innerHTML = values[handle];
      meses_pago = values[handle];
    });

    rangeSliderMeses.noUiSlider.on('change', function( values, handle ) {
      console.log(values)
      rangeSliderValueElementMeses.innerHTML = values[handle];
      meses_pago = values[handle];
      monto = $('#slider-range-value-dias').html();
      $.ajax({
        data  : { meses    : meses_pago,
                  cantidad : monto},
        url   : 'preaprobacion/changeValues',
        type  : 'POST',
        dataType: 'json'
      }).done(function(data){
        console.log(data);
        $('#importePrestamo').html('S/ '+currency(data.importePrestamo));  
        $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
        $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
        $('#tcea').html(data.tcea+'%'); 
        glob_pagoTotal = data.pagoTotal;
        glob_cuotaMensual = data.cuotaMensual;
        glob_tcea = data.tcea;
      });
    });


    //dias
    var rangeSliderDias = document.getElementById('slider-range-dias');

    noUiSlider.create(rangeSliderDias, {
      start: [ <?php echo  $importeMaximo?>],
      step: 100,
      range: {
        'min': [  <?php echo  $importeMinimo?> ],
        'max': [ <?php echo  $importeMaximo?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' S/ ',
      })
    });

    var rangeSliderValueElementDias = document.getElementById('slider-range-value-dias');

    rangeSliderDias.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementDias.innerHTML = values[handle];
        cuota_inicial = values[handle];
    });

    rangeSliderDias.noUiSlider.on('change', function( values, handle ) {
      console.log(values)
      rangeSliderValueElementDias.innerHTML = values[handle];
      monto = values[handle];
      meses_pago = $('#slider-range-value-meses').html();
      $.ajax({
        data  : { meses    : meses_pago,
                cantidad : monto},
        url   : 'preaprobacion/changeValues',
        type  : 'POST',
        dataType: 'json'
      }).done(function(data){
        console.log(data);
        $('#importePrestamo').html('S/ '+currency(data.importePrestamo));
        $('#cantTotPago').html('S/ '+currency(data.pagoTotal));  
        $('#cantMensPago').html('S/ '+currency(data.cuotaMensual)); 
        $('#tcea').html(data.tcea+'%');
        glob_pagoTotal = data.pagoTotal;
        glob_cuotaMensual = data.cuotaMensual;
        glob_tcea = data.tcea;
      });
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
      data  : { cantidad : monto,
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

  })(jQuery);

  </script>
  </body>
</html>