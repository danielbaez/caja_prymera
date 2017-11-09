<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
  <!-- <body style="background-image:url(img/header-bg.jpg);background-size: cover;background-repeat: no-repeat;
    background-attachment: fixed; background-position: center; min-height: 2000px; padding-top: 70px;"> -->
    <body style="background-image:url(https://ugc.kn3.net/i/origin/http://ist1-2.filesor.com/pimpandhost.com/5/7/0/3/57039/G/j/G/7/GjG7/al_atardecer-1600x1200.jpg);background-size: cover;background-repeat: no-repeat;
    background-attachment: fixed; background-position: center; padding-top: 70px;">
    


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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  	<div class="container-fluid">
  		<div class="row" style="background-color:#1C4485;color:white; padding:5px 15px">
  			<div class="container">
  				<div class="row">
  					<h1>¡Felicitaciones Claudia!</h1>
  					<h2>Tenemos un préstamos Pre Aprobado para ti</h2>
  				</div>
  			</div>
  			
  		</div>
  	</div>

    <div class="container">
    	<!-- <div class="col-sm-12 col-md-4 col-md-offset-4"> -->
    	<div class="row" style="margin-top:30px">
    		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
		    	<div class="panel panel-primary" style="border:none; background: rgba(255,255,255,0.6); border-radius:10px">
		    		<div class="panel-heading" style="background-color:#1C4485;border:0; padding-top: 15px;
    padding-bottom: 15px">
		    			<h1 class="panel-title text-center" style="font-size:25px;">Por favor selecciona las características de tu auto</h1>
		    		</div>
			    	<div class="panel-body" style="margin-bottom:25px">
              <div class="row text-center" style="color:#EF484E">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                  <form class="text-center" action="pantalla2.html" method="POST">
                    <div class="form-group col-xs-12 col-sm-6 col-sm-offset-3">
                      <select class="form-control" name="marca">
          					    <option>Seleccione la marca</option>
          					    <option>Ford</option>
          					    <option>Zuzuki</option>
          					    <option>Chevrolet</option>
          					  </select>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-sm-offset-3">
                      <select class="form-control" name="modelo">
          					    <option>Seleccione el modelo</option>
          					    <option>Swift</option>
          					    <option>Aveo</option>
          					  </select>
                    </div>
                    
                    <div class="col-xs-12"></div>

                    <!-- <div class="form-group col-xs-12" style="color:black;font-size:16px;"> -->
                      <div class="hidden-xs col-sm-3 text-right" style="color:black;font-size:16px;">
                        <span style="padding-right:10px">S/ 15,000</span>
                      </div>
                      <div class="visible-xs col-xs-6 text-left" style="color:black;font-size:16px;">
                        <span>S/ 15,000</span>
                      </div>
                      <div class="visible-xs col-sm-6 text-right" style="color:black;font-size:16px;">
                        <span>S/150,000</span>
                      </div>
                      <div class="col-xs-12 col-sm-6" style="color:black;font-size:16px;">
                          <div id="slider-range"></div>
                          <p id="slider-range-value" style="margin-top:10px; margin-bottom:0"></p>
                      </div>
                      <div class="hidden-xs col-sm-3 text-left" style="color:black;font-size:16px;">
                        <span style="padding-left:10px;">S/150,000</span>
                      </div>
                    <!-- </div> -->

                    <!-- <div class="form-group col-xs-12" style="color:black;font-size:16px;">
                    	<span style="padding-right:10px">S/ 15,000</span>
                    	<input id="ex6" type="text" data-slider-min="15000" data-slider-max="150000" data-slider-step="1000" data-slider-value="100000"/>	                   	
          						
          						
          						<p id="ex6SliderVal" style="margin-top:10px">S/ 10,000</p>

                    </div> -->
                    <div class="col-xs-12" style="height:20px"></div>
                    <button type="submit" class="btn btn-warning btn-lg" style="width:40%; font-weight:bold">Ingresar</button>
                  </form>
                </div>
              </div>
			    	</div>
		    	</div>
		    </div>
	    </div>

    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>


  <script>

	(function($){

    var rangeSlider = document.getElementById('slider-range');

    noUiSlider.create(rangeSlider, {
      start: [ 100000 ],
      step: 1000,
      range: {
        'min': [  15000 ],
        'max': [ 150000 ]
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

		/*$("#ex6").slider();
		$("#ex6").on("slide", function(slideEvt) {
			//$("#ex6SliderVal").text('S/ '+slideEvt.value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
			$("#ex6SliderVal").text('S/ '+currency(slideEvt.value));
		});*/


	})(jQuery);

  </script>
  </body>
</html>