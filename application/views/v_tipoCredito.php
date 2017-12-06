<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Caja prymera</title>
    <meta charset="utf-8">    
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">   
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
    <style>
    </style>    
  </head>
  <body>

      <div class="container-header">
    <div class="container">
      <div class="row padding-div-row-header">
        <div class="col-xs-6 col-title-header-padding">
          <h1 class="title-header">Dashboard</h1>
        </div>
        <div class="col-xs-6 div-logo">
          <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="<?php echo RUTA_IMG?>fondos/Logo-Prymera-Blanco.png"></a>
          <h1 style="display: none">Dashboard</h1>
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
        <?php if(_getSesion('rol') == 'asesor'){ ?>
            <li><a href="/C_reporteAsesor/agenteCliente">Ver Reportes</a></li>
        <?php } ?>
          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>        
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
      <div class="row text-center">
        <div class="col-xs-12 m-t-20 m-b-20">
          <div class="hidden-xs col-sm-3"></div>
          <div class="col-xs-12 col-sm-6">
                    <h1 class="titulo-vista">Seleccionar Tipo de Crédito</h1>            
                  </div>
                  <div class="hidden-xs col-sm-3 text-right">
                    <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">                   
                                  <?php if(_getSesion('rol') == 'asesor'){ ?>
                                      <li><a href="/C_reporteAsesor/agenteCliente">Ver Reportes</a></li>
                                  <?php } ?>
                                    <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                                </ul>
                              </li>
                          </ul>
                    </div>


                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                      <div class="panel panel-primary" style="border: 1px solid #337ab7;border-top-right-radius: 0px;border-top-left-radius: 40px;border-bottom-left-radius: 0px;border-bottom-right-radius: 40px;"><br>
                        <div class="panel-body" style="margin-top: 15px; margin-bottom: 20px">
                          <!-- <div class="col-xs-12 col-sm-6">
                            <a href="/Vehicular" style="color:black"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a><br>
                            <h5>Auto de Prymera</h5>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <a href="/Micash" style="color:black"><i class="fa fa-money fa-5x" aria-hidden="true"></i></a><br>
                            <h5>Mi Cash</h5>
                          </div> -->

                            <?php if(in_array(2, _getSesion('permiso')) && in_array(3, _getSesion('permiso'))){ ?>
                              <div class="col-xs-12 col-sm-6">
                                <a href="/C_campaign" style="color:black"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a><br>
                                <h5><i class="fa fa-star-o" aria-hidden="true"></i>Auto de Prymera - Campañas</h5>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <a href="/Vehicular" style="color:black"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a><br>
                                <h5><i class="fa fa-heart-o" aria-hidden="true"></i>Auto de Prymera - Evaluación</h5>
                              </div>
                            <?php } elseif(in_array(2, _getSesion('permiso'))){ ?>
                                <div class="col-xs-12">
                                    <a href="/Micash" style="color:black"><i class="fa fa-money fa-5x" aria-hidden="true"></i></a><br>
                                    <h5>Mi Cash</h5>
                                </div>
                            <?php } elseif(in_array(3, _getSesion('permiso'))){ ?>
                                <div class="col-xs-12">
                                    <a href="/Vehicular" style="color:black"><i class="fa fa-car fa-5x" aria-hidden="true"></i></a><br>
                                    <h5>Auto de Prymera</h5>
                              </div>
                            <?php } ?>

                        </div>


                      </div>
                    </div>

                </div>
          </div>
        <br>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    </body>
</html>
