<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cr&eacute;dito Auto de Prymera - Campañas</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand"/>
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>simuladores.css?v=<?php echo time();?>">
  </head>
  <body onload="nobackbutton();">

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

  <div class="container container-simulador">
    <div class="row m-t-40 m-b-20">
      <div class="col-xs-12 col-sm-9 text-center">
        <h2 class="titulo-simulador font-bold">Hola <?php echo _getSesion('nombre'); ?><span>, confirma los siguientes datos</span></h2>
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
          <?php if($tipo_product == '') {?>
            <h2>Completa los datos:</h2>
          <?php  } else {?>
          <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="col-xs-12 card-border">
                  <form class="text-center" action="C_resumen" method="POST">
                    <div class="col-xs-12 col-sm-6 linea">  
                        <p class="sub-title"><strong>Datos Personales</strong></p>
                          <div class="col-xs-6 p-0">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input type="search" class="form-control" id="ingreso_bruto" name="ingreso_bruto" maxlength="10" placeholder="* Ingreso Bruto" onchange="habilitarCampo()" onkeypress="return valida(event)">
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <div class="form-group">
                                  <select onkeyup="verificarDatos(event);" class="form-control" id="condicion"  name="condicion" onchange="habilitarCampo()">
                                          <option value="">* Condición Laboral</option>
                                          <option value="Dependiente">Dependiente</option>
                                          <option value="Independiente">Independiente</option>
                                </select>
                              </div>
                          </div>
                          <div class="col-xs-12 p-0">
                            <div class="col-xs-6">
                            <div class="form-group">
                                  <select onkeyup="verificarDatos(event);" class="form-control" id="nivel_educativo"  name="nivel_educativo" onchange="habilitarCampo()">
                                          <option value="">* Nivel Educativo</option>
                                          <option value="Primaria completa">Primaria completa</option>
                                          <option value="Secundaria completa">Secundaria completa</option>
                                          <option value="Superior Completa">Superior Completa</option>
                                </select>
                              </div>
                          </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select onkeyup="verificarDatos(event);" class="selectpicker form-control" id="profesion" name="profesion" data-live-search="true" onchange="habilitarCampo()">
                                          <option value="">Profesión</option>
                                          <option value="Abogado">Abogado</option>
                                          <option value="Cosmetólogo">Cosmetólogo</option>
                                          <option value="Peluquero">Peluquero</option>
                                          <option value="Barbero">Barbero</option>
                                          <option value="Carpintero">Carpintero</option>
                                          <option value="Sociólogo">Sociólogo</option>
                                          <option value="Contador">Contador</option>
                                          <option value="Decorador">Decorador</option>
                                          <option value="Dibujante">Dibujante</option>
                                          <option value="Diseñador">Diseñador</option>
                                          <option value="Director de Empresas">Director de Empresas</option>
                                          <option value="Atleta Profesional">Atleta Profesional</option>
                                          <option value="Escultor">Escultor</option>
                                          <option value="Entrenador Deportivo">Entrenador Deportivo</option>
                                          <option value="abogado">Comerciante</option>
                                          <option value="Ejecutivo">Ejecutivo</option>
                                          <option value="Enfermero">Enfermero</option>
                                          <option value="Estudiante">Estudiante</option>
                                          <option value="Empleado">Empleado</option>
                                          <option value="Enfermero">Enfermero</option>
                                          <option value="Especialista en tratamiento de Belleza">Especialista en tratamiento de Belleza</option>
                                          <option value="Electricista (técnico)">Electricista (técnico)</option>
                                          <option value="Farmacéutico">Farmacéutico</option>
                                          <option value="Tapicero">Tapicero</option>
                                          <option value="Economista">Economista</option>
                                          <option value="Gasfitero">Gasfitero</option>
                                          <option value="Veterinario">Veterinario</option>
                                          <option value="Geógrafo">Geógrafo</option>
                                          <option value="Ingeniería Administrativa">Ingeniería Administrativa</option>
                                          <option value="Indepediente">Indepediente</option>
                                          <option value="Intérprete">Intérprete</option>
                                          <option value="Traductor">Traductor</option>
                                          <option value="Filósofo">Filósofo</option>
                                          <option value="Laboratorista (técnico)">Laboratorista (técnico)</option>
                                          <option value="Autor">Autor</option>
                                          <option value="Literato">Literato</option>
                                          <option value="Crítico">Crítico</option>
                                          <option value="Escritor">Escritor</option>
                                          <option value="Locutor">Locutor de radio, TV</option>
                                          <option value="Mecánico de Naves">Mecánico Motores de Aviones y Naves Marinas</option>
                                          <option value="Modelo">Modelo</option>
                                          <option value="Músico">Músico</option>
                                          <option value="Mecánico">Mecánico de vehículos de motor</option>
                                          <option value="Ingeniero">Ingeniero</option>
                                          <option value="Médico">Médico y Cirujano</option>
                                          <option value="Nutricionista">Nutricionista</option>
                                          <option value="Obstetriz">Obstetriz</option>
                                          <option value="Odontólogo">Odontólogo</option>
                                          <option value="Abogado">Abogado</option>
                                          <option value="Licenciado">Licenciado</option>
                                          <option value="Artesano Textil">Artesano Textil</option>
                                          <option value="Gestor de Negocios">Gestor de Negocios</option>
                                          <option value="Piloto de Aeronaves">Piloto de Aeronaves</option>
                                          <option value="Otros">Otros</option>
                                          <option value="Químico">Químico</option>
                                          <option value="Médico">Médico</option>
                                          <option value="Radio Técnico">Radio Técnico</option>
                                          <option value="Regidor Municipalidades">Regidor Municipalidades</option>
                                          <option value="Sastre">Sastre</option>
                                          <option value="Sindico">Sindico</option>
                                          <option value="Tecnólogo Médico">Tecnólogo Médico</option>
                                          <option value="Obrero">Obrero</option>
                                          <option value="Psicólogo">Psicólogo</option>
                                          <option value="Técnico, Tecnólogo">Técnico, Tecnólogo</option>
                                          <option value="Periodista">Periodista</option>
                                          <option value="Vendedor">Vendedor</option>
                                          <option value="Administrador de Empresa">Administrador de Empresa</option>
                                          <option value="Chofer">Chofer</option>
                                          <option value="Secretaria">Secretaria</option>
                                          <option value="auxiliar">auxiliar</option>
                                          <option value="Antropólogo, Arqueólogo y Etnólogo">Antropólogo, Arqueólogo y Etnólogo</option>
                                          <option value="Ama de casa">Ama de casa</option>
                                          <option value="Actor, Artista y Director de espectáculos">Actor, Artista y Director de espectáculos</option>
                                          <option value="Administrador">Administrador</option>
                                          <option value="Agrónomo">Agrónomo</option>
                                          <option value="Agrimensor y topógrafo">Agrimensor y topógrafo</option>
                                          <option value="Albañil">Albañil</option>
                                          <option value="Arquitecto">Arquitecto</option>
                                          <option value="Analista de Sistemas y Computación">Analista de Sistemas y Computación</option>
                                          <option value="Pintor">Pintor</option>
                                          <option value="Publicista">Publicista</option>
                                          <option value="Biólogo">Biólogo</option>
                                          <option value="Relacionista Público e Industrial">Relacionista Público e Industrial</option>
                                          <option value="Fotógrafo y Operador de Cámara, Cine y TV">Fotógrafo y Operador de Cámara, Cine y TV</option>
                                          <option value="Oficial de Fuerzas Armadas">Oficial de Fuerzas Armadas</option>
                                          <option value="Operador">Operador</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="col-xs-3">
                                <p id="slider-range-value-edad" class="slider-value"></p>
                              </div>
                              <div class="col-xs-9">
                                <p class="text-left" style="font-size: 16px">* Edad<i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;Cu&aacute;l es tu edad?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                                <div id="slider-range-edad"></div>
                                <br>
                                <div class="col-xs-6 text-left padding-left">
                                  <span id="edadMin" style="font-size: 16px">24</span>
                                </div>
                                <div class="col-xs-6 text-right padding-right">
                                  <span id="edadMax" style="font-size: 16px">70</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6 p-t-10">
                              <div class="form-group">
                                  <select onkeyup="verificarDatos(event);" class="form-control" id="distrito" name="distrito" onchange="habilitarCampo()">
                                          <option value="">* Distrito</option>
                                          <?php echo $comboDistrito; ?>
                                  </select>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                              <p class="sub-title"><strong>Datos de tu Préstamo</strong></p>
                              <div class="col-xs-12 p-0">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <select class="form-control" name="marca" title="Selec. Tipo de pago" id="marca" onchange="getModelo()">
                                      <option value="">* Marca</option>
                                      <?php echo $comboMarca?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <select class="form-control" name="modelo" title="Selec. Tipo de pago" id="modelo">
                                      <option value="">* Modelo</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="col-xs-3">
                                    <p id="slider-range-value-Valor" class="slider-value"></p>
                                  </div>
                                  <div class="col-xs-9">
                                    <p class="text-left" style="font-size: 16px">* Valor del Vehículo <i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;Cu&aacute;l es el valor del veh&iacute;culo?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                                    <div id="slider-range-valor"></div>
                                    <br>
                                    <div class="col-xs-6 text-left padding-left">
                                      <span id="valorMin" style="font-size: 16px">S/. 10,000</span>
                                    </div>
                                    <div class="col-xs-6 text-right padding-right">
                                      <span id="valorMax" style="font-size: 16px">S/. 150,000</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-xs-12 p-t-10">
                                    <div class="col-xs-6">
                                      <label class="m-l-110">* Plazo <i class="fa fa-1x fa-info-circle icon-info" style="margin-left: 25px;margin-top: -20px;" data-original-title="&iquest;En cuanto tiempo quieres pagar tu cr&eacute;dito?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                          <select class="form-control" name="plazo" title="Selec. Plazo" id="plazo">
                                          <option value="12">12 Meses</option>
                                          <option value="24">24 Meses</option>
                                          <option value="36">36 Meses</option>
                                          <option value="48">48 Meses</option>
                                          <option value="60">60 Meses</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                              </div>
                                <div class="col-xs-12">
                                  <div class="col-xs-3">
                                    <p id="slider-range-value-Inicial" class="slider-value"></p>
                                  </div>
                                  <div class="col-xs-9">
                                    <p class="text-left" style="font-size: 16px">* Cuota Inicial <i class="fa fa-1x fa-info-circle icon-info" data-original-title="&iquest;Cuanto ser&aacute; el monto inicial que dar&aacute;s para el pr&eacute;stamo?" data-toggle="tooltip" data-placement="bottom" aria-hidden="true"></i></p>
                                    <div id="slider-range-inicial"></div>
                                    <br>
                                    <div class="col-xs-6 text-left padding-left">
                                      <span id="inicialMin" style="font-size: 16px">10%</span>
                                    </div>
                                    <div class="col-xs-6 text-right padding-right">
                                      <span id="inicialMax" style="font-size: 16px">50%</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-xs-12 p-t-10">
                                    <div class="col-xs-6">
                                        <label class="m-l-30">1era Fecha de Pago</label>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="date" class="form-control" onchange="habilitarCampo()" id="primera_fecha" name="primera_fecha" placeholder="1era fecha de pago" onkeypress="return valida(event)" onkeyup="verificarDatos(event);" maxlength="7">
                                      </div>
                                    </div>
                                </div>
                      </div>
                      <div class="col-xs-12 m-t-0">
                        <a id="remove" class="link" onclick="redirect();" style="margin: 10px 20px;float: left;">Regresar</a>
                      </div>
                      <div class="col-xs-6 col-md-offset-6">
                        <button type="button" style="margin-right: 32px !important;margin-top: -40px !important;" class="btn btn-lg btn-aceptar selector mousehover" id="btnAceptar" onclick="verificarCamp()" disabled>Siguiente</button>
                      </div>
                  </form>
                </div>                                        
        </div>
          <?php  }?>
      </div>
    </div>
    <div class="container">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" aria-label="Close"><span style="color:#fff" aria-hidden="true">&times;</span></button>
              <p style="text-align: center;font-size: 16px;">Desea ampliar?</p>
            </div>
            <div class="modal-body">
              <div class="bs-example">
                <div class="form-group" id="tablaCronograma" style="margin-left: 55px;">
                  <p style="color:#808080">Para ampliar su oferta, complete la solicitud con el valor</p>
                    <p style="color:#808080">m&aacute;ximo permitido, luego dirijase a la agencia para</p>
                    <p style="color:#808080">evaluar su solicitud en Riesgos y proceder a la firma del</p>
                    <p style="color:#808080">Expediente</p>
              </div>
          </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
            </div>
          </div>
      </div>
    </div>

    <div class="modal fade" aria-label="Close" id="myModaltelef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg centrar" role="document">
        <div class="modal-content">
          <div class="modal-header"><button type="button" style="" class="close btn-close" data-dismiss="modal" onclick="limpiarCampos()"><span style="" aria-hidden="true">&times;</span></button>
            <p style="text-align: center;font-size: 18px;color: #0060aa;font-weight: bold !important;font-family: quicksandbold !important;">Validar Celular</p>
          </div>
          <div class="modal-body modal-celular">
            <div class="row">
              <div class="col-xs-12 modal-div-text ocultar" id="tablaCronograma" style="">
                <p style="">Para poder terminar con la solicitud, Por favor ingrese el c&oacute;digo de seguridad <br>que ha sido enviado a su celular: </p>
                <div class="col-xs-12 text-center modal-div-numbers">
                  <input type="text" placeholder="" size="4" maxlength="1" id="uno" onkeyup="enterConfirmar(event);">
                  <input type="text" placeholder="" size="4" maxlength="1" id="dos" onkeyup="enterConfirmar(event);">
                  <input type="text" placeholder="" size="4" maxlength="1" id="tres" onkeyup="enterConfirmar(event);">
                  <input type="text" placeholder="" size="4" maxlength="1" id="cuatro" onkeyup="enterConfirmar(event);">
                  <input type="text" placeholder="" size="4" maxlength="1" id="cinco" onkeyup="enterConfirmar(event);">
                  <input type="text" placeholder="" size="4" maxlength="1" id="seis" onkeyup="enterConfirmar(event);">
                </div>
              </div>
              <div class="col-xs-12 text-center">
                <a style="color: #0060aa;font-size: 15px" onclick="enviarMail()">Enviar otro c&oacute;digo</a><br>
                <a href="" style="color: #0060aa;font-size: 15px" data-dismiss="modal" onclick="limpiarCampos()">Cambiar Celular</a>
              </div>
              <div class="col-xs-12 otro" id="idError" style="display: none;">
                  <br>
                  <p style="margin-bottom: 0;font-size: 22px;margin-top: 25px;color:#808080;text-align: center;">El n&uacute;mero ingresado no es v&aacute;lido</p> 
              </div>
            </div>              
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-xs-12">
                <button type="button confirmar" class="btn btn-lg botones" id="confirmar" aria-label="Close" style="display: block; margin: 0 auto" onclick="verificarNumero()">Confirmar</button>
                <button type="button cambiar" class="btn btn-lg botones-codigo" id="cambiar" aria-label="Close" style="display: none; margin: 0 auto" onclick="cambiarCelular()">Cambiar C&oacute;digo</button>  
              </div>                
            </div>
          </div>
        </div>
      </div>
    </div>

  <script type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
  <script type="text/javascript" async src="<?php echo RUTA_JS?>jscampania.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
  <script type="text/javascript">

  $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#periodo_gracia').datetimepicker({
          format: 'YYYY-MM-DD'
        }); 
    });

      var valor_inicial = '';
      var edad = '';
      var valor_vehiculo = '';
      function habilitarCampo() {
      var ingreso_bruto   = $('#ingreso_bruto').val();
      var condicion       = $('#condicion').val();
      var nivel_educativo = $('#nivel_educativo').val();
      var profesion       = $('#profesion').val();
      var edad            = $('#edad').val();
      var distrito        = $('#distrito').val();
      var marca           = $('#marca').val();
      var modelo          = $('#modelo').val();
      var plazo           = $('#plazo').val();
      var valor_vehiculo  = $('#valor_vehiculo').val();
      var valor_inicial   = $('#valor_inicial').val();
      var primera_fecha   = $('#primera_fecha').val();
      if(ingreso_bruto != null && condicion != '' && nivel_educativo != '' && profesion != '' && edad != '' 
        && distrito != '' && marca != '' && modelo != '' && plazo != '' && valor_vehiculo != '' && valor_inicial != '' && primera_fecha != '') {
        $('#btnAceptar').removeAttr("disabled");
      }
    }
    
    function nobackbutton(){
       window.location.hash="no-back-button";
       window.location.hash="Again-No-back-button" //chrome
       window.onhashchange=function(){window.location.hash="no-back-button";}
    }

    //INICIO DE SLIDER EDAD
    var rangeSliderEdad = document.getElementById('slider-range-edad');
      noUiSlider.create(rangeSliderEdad, {
        start: [ 25],
        step: 1,
        range: {
          'min': [  24 ],
          'max': [ 70 ]
        },
        connect: "lower",
        format: wNumb({
          decimals: 0,
          thousand: ',',
          /*prefix: ' S/ ',*/
        })
      });

    var rangeSliderValueElementEdad = document.getElementById('slider-range-value-edad');
    rangeSliderEdad.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementEdad.innerHTML = values[handle];
    });
    rangeSliderEdad.noUiSlider.on('change', function( values, handle ) {
    rangeSliderValueElementEdad.innerHTML = values[handle];
    edad = values[handle];
    });
    //FIN DE SLIDER EDAD
    //INICIO DE SLIDER VALOR DEL VEHÍCULO
    var rangeSliderValor = document.getElementById('slider-range-valor');
      noUiSlider.create(rangeSliderValor, {
        start: [ 20000],
        step: 1000,
        range: {
          'min': [  10000 ],
          'max': [ 150000 ]
        },
        connect: "lower",
        format: wNumb({
          decimals: 0,
          thousand: ',',
          prefix: ' S/ ',
        })
      });

    var rangeSliderValueElementValor = document.getElementById('slider-range-value-Valor');
    rangeSliderValor.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementValor.innerHTML = values[handle];
    });
    rangeSliderValor.noUiSlider.on('change', function( values, handle ) {
    rangeSliderValueElementValor.innerHTML = values[handle];
    valor_vehiculo = values[handle];
    });
    //FIN DE SLIDER VALOR DEL VEHÍCULO

    //INICIO DE SLIDER VALOR DEL INICIAL
    var rangeSliderInicial = document.getElementById('slider-range-inicial');
      noUiSlider.create(rangeSliderInicial, {
        start: [ 20],
        step: 1,
        range: {
          'min': [  10 ],
          'max': [ 50 ]
        },
        connect: "lower",
        format: wNumb({
          decimals: 0,
          thousand: ',',
          postfix: '%',
        })
      });

    var rangeSliderValueElementInicial = document.getElementById('slider-range-value-Inicial');
    rangeSliderInicial.noUiSlider.on('update', function( values, handle ) {

      rangeSliderValueElementInicial.innerHTML = values[handle];
    });
    rangeSliderInicial.noUiSlider.on('change', function( values, handle ) {
    rangeSliderValueElementInicial.innerHTML = values[handle];
    valor_inicial = values[handle];
    });
    //FIN DE SLIDER VALOR DE LA INICIAL
  </script>
  </body>
</html>