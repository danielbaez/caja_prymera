<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cr&eacute;dito Auto de Prymera - Campañas</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-resumen.css?v=<?php echo time();?>">
    <style type="text/css">
      .btn-link:focus, .btn-link:hover {
          color: #337ab7 !important;
      }
    </style>
  </head>
  <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
      <body style="padding: 0px;" onload="nobackbutton();">
    <?php } else { ?>
        <body style="padding: 0px;" onload="nobackbutton();">
    <?php } ?>
    <div class="container-header">
      <div class="container">
        <div class="row padding-div-row-header">
          <div class="col-xs-6 col-title-header-padding">
              <h1 class="title-header-first"><a href="/Vehicular">Cr&eacute;dito Vehicular</a></h1>
          <h1 class="title-header-second"><a href="/Vehicular">Auto de Prymera</a></h1>
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

    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
    <div class="container-fluid" style="/*background-image:url(../public/img/fondos/Car-Sunset.jpg);*/background-size: cover;background-repeat: no-repeat;background-attachment: scroll; background-position: center;">
    <?php } else { ?>
      <div class="container-fluid" style="/*background-image:url(../public/img/fondos/Credito-Consumo-image.jpg);*/background-size: cover;background-repeat: no-repeat;background-attachment: scroll; background-position: center;">
    <?php } ?>
        <div class="container container-simulador" style="">

        <div class="row m-t-40 row-container-resumen">
          <div class="col-xs-12 col-sm-9 text-center">
              <h3 class="title-general" style="margin-top: -20px">Felicidades <?php echo $nombre ?>!<span style="font-size: 23px;"> Tienes un préstamo pre-aprobado</span></h3>
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
            <div class="col-xs-12 col-md-6 col-md-push-6 info">
              <!--<h3 class="title-general">Felicidades <?php echo $nombre ?>!</h3>
              <p class="info2">tu pr&eacute;stamo ha sido</p>
              <p class="info2">pre-aprobado, ya est&aacute;s cerca</p>
              <p class="info2">de cumplir tus sue&ntilde;os</p>-->
            </div>

            <div class="col-xs-12 col-md-6 col-md-pull-3 col-md-offset-0" style="padding-top: 20px;">
              <div class="panel panel-primary" style="border: 1px solid !important;">
                <div class="panel-heading" style="background-color: #fff;font-weight: bold;padding: 23px;border-color: none;">
                  <div class="col-xs-12">
                    <h1 class="panel-title subtitle" style="font-weight: bold;">Datos de oferta pre-aprobada</h1>
                  </div>
                </div>
                <div class="panel-body">
                  <form class="text-center" action="losentimos.html" method="POST">
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Marca: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $marca?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Modelo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $modelo?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                          <span style="">Valor Veh&iacute;culo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $valor_auto?></span>
                          </div>
                        </div>
                    </div>

                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Importe Pr&eacute;stamo: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?><?php echo 'S/ '.$Importe?><?php }else{ ?><?php echo $Importe.'.00'?><?php } ?></span>
                          </div>
                        </div>
                    </div>
                    <?php if ($tipo_producto == PRODUCTO_VEHICULAR) { ?>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Cuota Inicial: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $cuota_inicial?></span>
                          </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Pago Total: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $pago_total?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Cuota Mensual: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $cuota_mensual?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">Seguro Auto: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $seguro?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">TEA: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $tea?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12 border-resumen-bottom">
                        <div class="form-group" style="">                
                          <div class="col-xs-6">
                            <span style="">TCEA: </span>
                          </div>
                          <div class="col-xs-6">
                            <span><?php echo $tcea?></span>
                          </div>
                        </div>
                    </div>
                    <form class="text-center">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">
                      <div class="col-xs-6">
                        <a id="remove" class="link" onclick="redirect();" style="margin: 30px 0px;float: left;font-size: 20px;">Regresar</a>
                      </div>
                      <div class="col-xs-6" style="padding-top: 20px;">
                          <button type="button" class="btn btn-lg m-b-10 btn-resumen" style="font-family: 'quicksandlight';" onclick="irAUbicacion()">Aceptar</button>
                      </div>
                    </div>
                  </form>   
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	  <script type="text/javascript" async src="<?php echo RUTA_JS?>jsresumen_c.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
        function nobackbutton(){
         window.location.hash="no-back-button";
         window.location.hash="Again-No-back-button" //chrome
         window.onhashchange=function(){ window.location.hash="no-back-button";}
      }
    </script>
  </body>
</html>