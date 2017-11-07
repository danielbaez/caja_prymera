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

      <div class="row">                
                <div class="col-xs-12 hidden-xs visible-sm visible-md visible-lg text-right div-navegacion">

                    <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                        <li class="dropdown dropdown-menu-user">
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

      <div class="row p-t-20">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="panel panel-primary" style="padding-bottom: 35px">
            <div class="panel-heading text-center" style="background-color: #fff;border:0;padding-top: 15px;padding-bottom: 15px;color: #1C4485;">
              <h1 class="panel-title" style="font-size:24px;color: #005aa6;">Lo sentimos, en estos momentos no contamos con una</h1>
              <h1 style="font-size:24px;color:#005aa6;margin:0px;">oferta que se ajuste a tus necesidades <strong>y nos gustar&iacute;a</strong></h1>
              <h1 style="font-size:24px;color:#005aa6;margin:0px;text-align: center"><strong>ponernos en contacto contigo</strong></h1>
            </div>
            
            <div class="panel-body" style="padding-bottom:25px;border: 1px solid #1C4485;border-top-left-radius: 40px; width: 60%; margin:0 auto">
              <div class="row text-center" style="color:#EF484E;padding: 0px;margin: 0px;">
                <h1 style="margin:8px 0 15px 0;text-align: center;font-size: 20px;color: #808080;font-family: 'quicksandlight';">Confirma tus datos</h1>
                <div class="col-md-12">
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                          <input class="form-control" type="text" id="nro_cel" placeholder="*N&uacute;mero Celular" maxlength="9" style="font-family: 'quicksandlight';" onkeypress="return valida(event)" onkeyup="verificarDatos(event);">
                        </div>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                          <input type="text" class="form-control" id="nro_fijo" placeholder="N&uacute;mero Fijo" maxlength="7" style="font-family: 'quicksandlight';" onkeypress="return valida(event)" onkeyup="verificarDatos(event);">
                        </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn-lg btn-aceptar" style="font-weight: lighter;background-color: #005aa6;color: #fff;font-family: 'quicksandbold';width: 160px;margin-top: 5px;" onclick="guardarDatos()">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- <span class="usuario-logueado"><?php  ?></span><br>-->
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>


	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jslosentimos.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  <script type="text/javascript">
</script>
  </body>
</html>