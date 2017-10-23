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
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-ubicacion.css?v=<?php echo time();?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.css">

  <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <style>
            .chart_new {
                width:100%;
                min-height:280px;
            	  margin: auto;
            }
            
            svg:first-child > g > text[text-anchor~=middle]{
                font-size:12px;
            }
            
            #modalNuevosRatxSede .table-responsive{
            	overflow-y: hidden;
            }
    	</style>
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
          <h3>Auto de Prymera</h3>
        <?php } else { ?>
            <h6 style="color: #fff;font-size: 16px;margin: 23px;text-align: center;position: relative;top: 10px;left: 87px;font-family: 'quicksandlight';">Cr&eacute;dito Consumo</h6>
            <h3 style="color: #fff;font-size: 36px;margin: 12px;text-align: center;position: relative;left: 81px;font-family: 'quicksandlight';">Mi Cash</h3>
        <?php } ?>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <img class="logo" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png">
            <ul class="dropdown-menu">
            <!--  <li><a href="">Logout</a></li>  -->
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    <div class="container">
        <section>
            <div class="mdl-content-cards">
                <div class="mdl-card cuadro" style="">
			        <div class="mdl-card__title">
                    </div>
                    <div>
                    	<h1 class="p-0 m-0" ><b><?php echo $nombre ?>, Gracias por confiar en Prymera.</b></h1>
                        <h1 class="ajustar" ><b>Solicitaste un cr&eacute;dito de <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>S/ <?php } ?> <?php echo $Importe ?> soles a <?php echo $cant_meses ?> con una cuota de <?php echo $cuota_mensual ?> soles</b></h1><br />
                        <h1 class="p-0 m-0" >Para gestionar tu pr&eacute;stamo, te esperamos en nuestra agencia de <?php echo $Agencia ?></h1>
                        <h1 class="m-t-0">con tu <span class="negrita"> DNI </span><span class="negrita"> y un recibo de servicio</span>(luz, agua, tel&eacute;fono) con antiguedad</h1>
                        <h1 class="p-0 m-t-23">no mayor a dos meses.
                         Si deseas un monto mayor al pre-aprobado adicional, debes proporcionarnos tu &uacute;ltima boleta de pago.<?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?> Un representante de Prymera se contactar&aacute; con Ud. para indicarle el proceso a seguir para la toma de firmas, el dep&oacute;sito del porcentaje de la inicial y el desembolso de su c&eacute;dito. <?php } ?> <?php if ($tipo_producto == PRODUCTO_MICASH) { ?>  </br>&#33;No deje pasar la oportunidad de cumplir sus sue&ntilde;os!<?php } ?></h1>
                         <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?><h1 class="p-0 m-t-23">Si desea un monto mayor al pre aprobado, adicional, debe proporcionarnos los estados de cuenta de sus cr&eacute;ditos o tarjetas de cr&eacute;dito vigentes para que el &aacute;rea de riesgos lo pueda evaluar.</br> &#33;No deje pasar la oportunidad de cumplir sus sue&ntilde;os!</h1><?php } ?>
                    </div>
                    <div class="mdl-card__supporting-text br-b" style="width: 100%;">
                        <small class="m-t-100" style="font-size: 15px; display:block;" id="subtituloEvaluacion1">
                        <div id="map_div" class="chart_new" style="display:block"></div>
                        <h5 style="color:#a3a4a6;text-align: center;font-size: 15px;font-family: quicksandlight;">Agencias <?php echo $Agencia ?>: <?php echo $concesionaria ?></h5>
                        <h5 style="color:#a3a4a6;text-align: center;margin: -5px;font-size: 14px;font-family: quicksandlight;">Av. Los Lirios con Av. Pedro Miota. S&oacute;tano Tel&eacute;fono 2767658</h5>
                    </div>
				</div>
            </div>
        </section>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.min.js"></script>-->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
  	<script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" async src="<?php echo RUTA_JS?>jsubicacion.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>google_chart/loader.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>


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