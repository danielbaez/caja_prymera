<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <title>Cr&eacute;dito Mi Auto</title>
    <?php } else { ?>
        <title>Cr&eacute;dito Mi Cash</title>
    <?php } ?>
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
  <!-- <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>"> -->
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">  
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>estilos-micash.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
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

    <div class="container">

      <div class="row m-t-40 row-container-resumen">
      <div class="col-xs-12 col-sm-9 text-center">
        
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
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="position: relative;top: 50px;">
          <div class="panel panel-primary" style="">
            <div class="panel-heading text-center" style="background-color: #fff;border:0;padding-top: 15px;padding-bottom: 15px;color: #1C4485;">
              <div class="col-xs-12" style="margin-top: 30px;">
                    <h1 class="panel-title" style="font-size:25px;position: relative; top: 8px;bottom: 98px;left: 17px;"><strong>Eres importante para nosotros!!!</strong></h1><br>
                </div>
                <div>
                    <br>
                    <h1>Gracias por confiar en Prymera, en breve un agente de servicio se pondr&aacute; en contacto contigo.</h1>
                </div>
            </div>
            <div class="panel-body" style="width: 60%;position: relative;left: 132px;">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jsmensaje.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  </body>
</html>