<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pre aprobaci&oacute;n</title>

    <!-- Latest compiled and minified CSS -->
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_azul.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-ubicacion.css?v=<?php echo time();?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.css">
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
        <h6>Cr&eacute;dito vehicular</h6>
        <h3>Auto de Caja Prymera</h3>
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

    <div class="container">
        <section>
            <div class="mdl-content-cards">
                <div class="mdl-card cuadro">
			        <div class="mdl-card__title">
                    </div>
                    <div>
                    	<h2 class="mdl-card__title-text" ><strong><?php echo $nombre?>, Gracias por confiar en Prymera.</strong></h2>
                        <h2 class="mdl-card__title-text" ><strong>Solitaste un cr&eacute;dito de S/. 40,000 s&oacute;les a 60 meses con una cuota de S/. 895 s&oacute;les</strong></h2><br />
                        <h2 class="mdl-card__title-text" >Para proceder al desembolso de tu pr&eacute;stamo deber&aacute;s acercarte a nuestra agencia de San Juan de</h2>
                        <h2 class="mdl-card__title-text">Miraflores junto con tus<strong> 2 &uacute;ltimas boletas de pago </strong> y <strong> el recibo de servicio</strong>(luz, agua, tel&eacute;fono) con antiguedad</h2>
                        <h2 class="mdl-card__title-text">no mayor a dos meses, para proceder a la firma del expediente y el desembolso de tu pr&eacute;stamo.</h2>
                    </div>
                    <div class="mdl-card__supporting-text br-b">
                        <small class="m-t-100" style="font-size: 15px; display:block;" id="subtituloEvaluacion1">
                        <div id="map_div" class="chart_new" style="display:block"></div>
                        <h6 style="color:black">Agencias San Juan de Miraflores: C.C Mall del Sur.</h6>
                        <h6 style="color:black">Av. Los Lirios con Av. Pedro Miota. S&oacute;tano Tel&eacute;fono 2767658</h6>
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
  	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jsubicacion.js?v=<?php echo time();?>"></script>
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
      	        ['Parque kennedy, Lima', 'Parque kennedy']
      	      ]);

        	    var options = {
            	          mapType: 'styledMap',
            	          zoomLevel: 12,
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