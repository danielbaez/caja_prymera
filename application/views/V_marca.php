<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pre aprobaci&oacute;n</title>

    <!-- Latest compiled and minified CSS -->
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-marca.css?v=<?php echo time();?>">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/css/bootstrap-slider.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.css">

  <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- <link href="css/agency.min.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <a class="navbar-brand" href="#">Caja Prymera</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>  -->
            <ul class="dropdown-menu">
            <!--  <li><a href="http://localhost:8080/caja_prymera">Logout</a></li>  -->
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  	<div class="container-fluid">
  		<div class="row row1">
  			<div class="container">
  				<div class="row">
  					<h2>Felicitaciones <?php echo $nombre?>! Tienes un pr&eacute;stamos pre-aprobado</h2>
  				</div>
  			</div>
  			
  		</div>
  	</div>

    <div class="container">
    	<!-- <div class="col-sm-12 col-md-4 col-md-offset-4"> -->
    	<div class="row" style="margin-top:30px">
    		<div class="col-xs-12">
		    	<form class="text-center form-horizontal" action="C_preaprobacion" method="POST">
            <div class="col-xs-12 col-md-6" style="color:black;font-size:16px;display:none">
              <!-- <p id="val-monto">Monto S/ 10,000</p>
              <span style="padding-right:10px">S/ 1,000</span>
              <input id="slider-monto" type="text" data-slider-min="1000" data-slider-max="15000" data-slider-step="1000" data-slider-value="8000"/>                     
              <span style="padding-left:10px">S/15,000</span> -->

                

                <div class="hidden-xs col-sm-3 text-center">
                  <span id="sueldoMin">S/ <?php echo  $sueldoMin?></span>
                </div>
                <div class="visible-xs col-xs-6 text-left">
                  <span >S/ <?php echo  $sueldoMin?></span>
                </div>
                <div class="visible-xs col-sm-6 text-right">
                  <span>S/ <?php echo  $sueldoMax?></span>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div id="slider-range"></div>
                    <p id="slider-range-value" style="margin-top:10px; margin-bottom:0"></p>
                </div>
                <div class="hidden-xs col-sm-3 text-center">
                  <span>S/ <?php echo  $sueldoMax?></span>
                </div>
            
            </div>

            <div class="col-xs-12" style="height:20px">
            
            	<div class="col-md-6" style="background-color: #9a9aa7;padding:20px 0;font-weight:bold;font-size:17px;border-bottom-right-radius: 50px;border-top-left-radius: 50px;">
                    <div class="col-xs-15 visible-xs visible-md" style="height:20px"></div>
                      <div class="col-xs-16 col-md-10" style="color:black;font-size:16px;">
                      <label class="control-label col-xs-9 col-md-9" for="email">Marca:</label>
                      <div class="col-xs-18 col-md-18">
                        <select class="form-control" style="position:relative;left: 40px;border-color: black;" name="marca" title="Selec. Tipo de pago" id="tipoPago">
                          <option value="">Selec. Marca</option>
                          <option value="Susuki">Susuki</option>
                          <option value="Honda">Honda</option>
                          <option value="Kia">Kia</option>
                          <option value="Audi">Audi</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-xs-15 visible-xs visible-md" style="height:20px"></div>
                    <div class="col-xs-16 col-md-10" style="color:black;font-size:16px;">
                      <label class="control-label col-xs-9 col-md-9" for="email">Modelo:</label>
                      <div class="col-xs-18 col-md-18">
                        <select class="form-control" style="position:relative;left: 40px;border-color: black;" name="marca" title="Selec. Tipo de pago" id="tipoPago">
                          <option value="">Selec. Modelo</option>
                          <option value="1">Simple</option>
                          <option value="2">Doble</option>
                        </select>
                      </div>
                    </div>
                </div>
            	
            </div>
            
            <div class="col-xs-12 col-md-12" style="color:black;font-size:16px;padding:50px 0">
              <!-- <p id="val-meses">Plazo 12 meses</p>
              <span style="padding-right:10px">12m</span>
              <input id="slider-plazo" type="text" data-slider-min="6" data-slider-max="60" data-slider-step="1" data-slider-value="12"/>                     
              <span style="padding-left:10px">60m</span> -->

              <div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: 80px;">
                  <span>S/ 15,000</span>
                </div>
                <div class="visible-xs col-xs-6 text-left">
                  <span>S/ 15,000</span>
                </div>
                <div class="visible-xs col-sm-6 text-right">
                  <span>S/ 150,000</span>
                </div>
                <div class="col-xs-12 col-sm-6">
                	<label for="slider-range-meses">Costo Auto</label>
                    <div id="slider-range-meses"></div>
                    <p id="slider-range-value-meses" style="margin-top:10px; margin-bottom:0"></p>
                </div>
                <div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: -80px;">
                  <span>S/ 150,000</span>
                </div>
            
            </div>

            <div class="col-xs-12" style="height:20px"></div>

            <div class="col-xs-12">
              <div class="col-xs-14 text-center">
                <button class="btn btn-warning btn-lg">Aceptar</button>
              </div>
              
            </div>

            <div class="col-xs-12" style="height:20px"></div>

            <!--  -->

          </form>
		    </div>
	    </div>

    </div>



    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="terminosYcondiciones" style="color:#EF484E">Cronograma</h3>
        </div>
        <div class="modal-body">
          <div class="bs-example">
            <div class="table-responsive" id="tablaCronograma">
          
        </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
        </div>
      </div>
  </div>
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
	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jspreaprobacion.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>


  <script>

	(function($){

    var rangeSlider = document.getElementById('slider-range');
    var monto      = null;
    var meses_pago = null;

    noUiSlider.create(rangeSlider, {
      start: [ <?php echo  $iniRango?> ],
      step: 1000,
      range: {
        'min': [  <?php echo  $sueldoMin?> ],
        'max': [ <?php echo  $sueldoMax?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' S/',
      })
    });

    var rangeSliderValueElement = document.getElementById('slider-range-value');

    rangeSlider.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElement.innerHTML = values[handle];
      monto = values[handle];
      $.ajax({
    		data  : { cantidad : values[handle],
    			      meses    : meses_pago},
    		url   : 'C_preaprobacion/changeValues',
    		type  : 'POST'
    	}).done(function(data){
    		try{
    			data = JSON.parse(data);
    			if(data.error == 0){
					  $('#cantTotPago').html('S/. '+data.cantPago);	
					  $('#cantMensPago').html('S/. '+data.mensual);	

    			}else {
    				return;
    			}
    		} catch (err){
    			//msj('error',err.message);
    		}
    	});
    });

    //////////

    var rangeSliderMeses = document.getElementById('slider-range-meses');

    noUiSlider.create(rangeSliderMeses, {
      start: [ 30000 ],
      step: 100,
      range: {
        'min': [  15000 ],
        'max': [ 150000 ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: ' soles',
      })
    });

    var rangeSliderValueElementMeses = document.getElementById('slider-range-value-meses');

    rangeSliderMeses.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementMeses.innerHTML = values[handle];
      meses_pago = values[handle];
      $.ajax({
    		data  : { meses    : values[handle],
    			      cantidad : monto},
    		url   : 'C_preaprobacion/changeValues',
    		type  : 'POST'
    	}).done(function(data){
    		try{
    			data = JSON.parse(data);
    			if(data.error == 0){
  					  $('#cantTotPago').html('S/. '+data.cantPago);	
  					  $('#cantMensPago').html('S/. '+data.mensual);	

    			}else {
    				return;
    			}
    		} catch (err){
    			msj('error',err.message);
    		}
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

// 		$("#slider-range").slider();
// 		$("#slider-range").on("slide", function(slideEvt) {
// 			//$("#ex6SliderVal").text('S/ '+slideEvt.value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
// 			$("#slider-range-value").text('Monto S/ '+currency(slideEvt.value));
// 			console.log($("#slider-range-value").text('Monto S/ '+currency(slideEvt.value)));
// 		});

//     $("#slider-plazo").slider();
//     $("#slider-plazo").on("slide", function(slideEvt) {
//       //$("#ex6SliderVal").text('S/ '+slideEvt.value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
//       $("#val-meses").text('Plazo '+currency(slideEvt.value+' meses'));
//     });

		$( "#generarCronograma" ).click(function() {
			var fecha_pago = $('#fechaPago').val();
			var tipoPago   = $('#tipoPago').val();
			$.ajax({
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
    		});
		});

	})(jQuery);

  </script>
  </body>
</html>