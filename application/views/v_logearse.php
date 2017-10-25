<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Caja prymera</title>
        <meta charset="ISO-8859-1">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta http-equiv="refresh"          content="36000">
        <meta name="viewport"               content="width=device-width, initial-scale=1">
        <meta name="keywords"               content="A fast online advisory service for academical and professional targets">
        <meta name="robots"                 content="index,follow">
        <meta name="date"                   content="September 03, 2017">
        <meta name="author"                 content="softhy.pe">
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#FFFFFF">
        <meta name="description"            content="Koplan - Your way to success">
        <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
    	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto_new.css?v=<?php echo time();?>">  
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
        
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <style>
        </style>  
    </head>
    <body>
    	<!-- <nav class="navbar navbar-inverse" style="background-color: transparent;border-color: transparent;">
          <div class="container-fluid">
            <div class="navbar-header">
            	<a class="navbar-brand" style="background-color: #0060aa;margin: -69px;padding-top: 10px;height: 128px;" href="#"><img class="img-responsive logo" style="max-width: 302px;float: right;margin-right: 182px" alt="" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
            </div>
            <ul class="nav navbar-nav">
                <h3 style="position: absolute;top: -45px;left: 119px;color: #fff;font-family: 'quicksandregular';">Sistema de cr&eacute;ditos Web</h3>
            </ul>
          </div>
        </nav> -->

        <div class="container-header">
            <div class="container">
                <div class="row padding-div-row-header">
                    <div class="col-xs-6 col-title-header-padding">
                        <h1 class="title-header-one-line">Sistema de cr&eacute;ditos Web</h1>
                    </div>
                    <div class="col-xs-6 div-logo">
                        <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
                        <h1 style="display: none">Sistema de cr&eacute;ditos Web</h1>
                    </div>
                </div>    
            </div>            
        </div>


        <div class="container">
            <div class="row text-center">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <h1 class="titulo-vista">Bienvenido Usuario</h1>
            <div class="panel panel-primary" style="border-bottom-right-radius: 40px;border-top-left-radius: 40px;border: 1px solid #337ab7;border-bottom-left-radius: 0px;border-top-right-radius: 0px;padding: 20px">
                <!-- <div class="panel-heading" style="background-color:#1C4485;border:0">
                  <h1 class="panel-title" style="font-size:25px;">Bienvenido Usuario</h1>
                </div> -->
                <div class="panel-body">
                  <form class="form-horizontal" action="/logearse/login" method="post">
                    <br>
                    <div class="form-group">
                      <label class="control-label col-sm-3 tipo_letra_gruesa" for="email">Usuario:</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control tipo_letra_delgada" style="width: 80%;" name="usuario" id="email" placeholder="Enter email">
                      </div>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                      <label class="control-label col-sm-3 tipo_letra_gruesa" for="pwd">Contrase&ntilde;a:</label>
                      <div class="col-sm-9"> 
                        <input type="password" class="form-control tipo_letra_delgada" style="width: 80%;" name="password" id="pwd" placeholder="Enter password">
                      </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <div class="form-group"> 
                              <div class="col-center" style="">
                                <button type="submit" class="btn btn-primary redirect tipo_letra_gruesa" data-value="2" style="width: 60%;margin-left: 115px;">Mi Cash</button>
                                <input type="hidden" name="redirect">
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group"> 
                              <div class="col-center" style="">
                                <button type="submit" class="btn btn-primary redirect tipo_letra_gruesa" data-value="3" style="margin-left: -25px;">Auto de Prymera</button>
                                <input type="hidden" name="redirect">
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                            <div class="form-group"> 
                              <div class="col-center" style="">
                                <button type="submit" class="btn btn-primary redirect tipo_letra_gruesa" data-value="1" style="width: 58%;margin-left: 66px;">Dashboard</button>
                                <input type="hidden" name="redirect">
                              </div>
                            </div>
                        </div>
                    <div class="form-group"> 
                      <div class="col-center">
                        <small class="tipo_letra_delgada" style="font-size: 14px;">Olvid&oacute; su contrase&ntilde;a?</small> <a href="/Logearse/olvidoPassword" class="tipo_letra_delgada">Ingrese aqu&iacute;</a>
                      </div>
                    </div>
                            
                        <?php
                        $error = $this->session->flashdata('error');
                        if(isset($error)) {
                        ?>
                        <div class="form-group"> 
                                <div class="alert alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
      	<script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    	<script type="text/javascript" async src="<?php echo RUTA_JS?>jslogear.js?v=<?php echo time();?>"></script>
    	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>

        <script type="text/javascript">
            
            /*var a = "<?php echo $this->session->flashdata('error'); ?>";

                if(a){
                    msj("error", a);
                }*/

        </script>
    </body>
</html>
