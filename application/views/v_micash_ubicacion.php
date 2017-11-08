<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;dito Auto de Prymera</title>
    <?php } else { ?>
        <title>Cr&eacute;dito Mi Cash</title>
    <?php } ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">

    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
  
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
            <h1 class="title-header-first"><a href="/Vehicular">Cr&eacute;dito Vehicular</a></h1>
            <h1 class="title-header-second"><a href="/Vehicular">Auto de Prymera</a></h1>
            <?php } else { ?>
            <h1 class="title-header-first"><a href="/Micash">Cr&eacute;dito consumo</a></h1>
            <h1 class="title-header-second"><a href="/Micash">Mi Cash</a></h1>
          <?php } ?>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
            <h1 style="display: none"><a href="/Vehicular">Cr&eacute;dito Vehicular | Auto de Prymera</a></h1>
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

    <div class="row m-t-40 m-b-20 hidden-xs">
      <div class="col-xs-12 col-sm-9 text-center">
        
      </div>
      <div class="hidden-xs col-sm-3 button-login text-right">
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

    <div class="row m-t-40">         
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="col-xs-12 div-ubicacion">
          <h1 class="p-0 m-0 negrita" ><b><?php echo $nombre ?>, Gracias por confiar en Prymera.</b></h1>
          <h1 class="ajustar negrita" ><b>Solicitaste un cr&eacute;dito de <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>  <?php echo 'S/ '.$Importe?> <?php }else{ ?> <?php echo $Importe.'.00' ?> <?php }?> a <?php echo $cant_meses ?> con una cuota de <?php echo $cuota_mensual ?></b></h1><br />
          <h1 class="p-0 m-0 light" >Para gestionar tu pr&eacute;stamo, te esperamos en nuestra agencia de <?php echo $Agencia ?> con tu <span class="negrita"> DNI </span><span class="negrita"> y un recibo de servicio</span> (luz, agua, tel&eacute;fono) con antiguedad no mayor a dos meses.</br>
          Si deseas un monto mayor al pre-aprobado adicional, debes proporcionarnos tu &uacute;ltima boleta de pago.<?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?></br> Un representante de Prymera se contactar&aacute; contigo para indicarte el proceso a seguir para la toma de firmas, el dep&oacute;sito del porcentaje de la inicial y el desembolso de tu cr&eacute;dito. <?php } ?> <?php if ($tipo_producto == PRODUCTO_MICASH) { ?>  </br><span class="negrita">¡No dejes pasar la oportunidad de cumplir tus sue&ntilde;os!</span><?php } ?></h1>
          <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?><h1 class="light p-b-15">Si deseas un monto mayor al pre-aprobado, adicional, debes proporcionarnos los estados de cuenta de tus cr&eacute;ditos o tarjetas de cr&eacute;dito vigentes para que el &aacute;rea de riesgos te pueda evaluar.</br></br><span class="negrita"> ¡No dejes pasar la oportunidad de cumplir tus sue&ntilde;os!</span></h1><?php } ?>
          <div class="mdl-card__supporting-text br-b" style="width: 100%;">
              <small class="m-t-100" style="font-size: 15px; display:block;" id="subtituloEvaluacion1">
              <div id="map_div" class="chart_new" style="display:block"></div>
              <h5 style="color:black;text-align: center;font-size: 15px;font-family: quicksandregular;">Agencias <?php echo $Agencia ?>: <?php echo $concesionaria ?></h5>
              <h5 style="color:black;text-align: center;margin: -5px;font-size: 14px;font-family: quicksandregular;"><?php echo $ubicacion ?> Tel&eacute;fono: <?php echo $telefono ?></h5>
          </div>
        </div>                                        
      </div>        
    </div>
  </div>

  <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>

  <script src="<?php echo RUTA_PLUGINS?>google_chart/loader.js?v=<?php echo time();?>"></script>
  
  
  <script>

  google.charts.load('current', {'packages':['map'],
     'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'});
        $(window).load(function() {
          google.charts.setOnLoadCallback(drawMap);
          function drawMap() {
            var data = new google.visualization.DataTable();
              data.addColumn('string', 'Address');
              data.addColumn('string', 'Location');
              data.addRows([
                ["<?php echo $ubicacion ?>", "<?php echo $ubicacion ?>"]
              ]);

              var options = {
                        mapType: 'styledMap',
                        zoomLevel: 18,
                        showTooltip: true,
                        showInfoWindow: true,
                        useMapTypeControl: true,
                        maps: {
                          // Your custom mapTypeId holding custom map styles.
                          styledMap: {
                            name: 'Styled Map', // This name will be displayed in the map type control.
                            styles: [
                              {featureType: 'poi.attraction',
                               stylers: [{color: '#fce8b2'}]
                              },
                              {featureType: 'road.highway',
                               stylers: [{hue: '#0277bd'}, {saturation: -50}]
                              },
                              {featureType: 'road.highway',
                               elementType: 'labels.icon',
                               stylers: [{hue: '#000'}, {saturation: 100}, {lightness: 50}]
                              },
                              {featureType: 'landscape',
                               stylers: [{hue: '#259b24'}, {saturation: 10}, {lightness: -22}]
                              }
                        ]}}
                      };

            var map = new google.visualization.Map(document.getElementById('map_div'));

            map.draw(data, options);
          };
          
        });

  </script>
  </body>
</html>