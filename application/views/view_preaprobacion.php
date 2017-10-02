<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Caja Prymera</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.carousel.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>OwlCarousel/css/owl.theme.default.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
	<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>"> 
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">
    <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>micash-preaprobacion.css?v=<?php echo time();?>">

  <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
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
        <h6>Cr&eacute;dito consumo</h6>
        <h3>Mi Cash</h3>
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

	<div class="container-fluid">
		<div class="row" style="background-color: #fff;color: #1C4485;padding:5px 15px;">
  			<div class="container">
  				<div class="row">
  				<?php if($tipo_product == '') {?>
  					<h2>Completa los datos:</h2>
  				<?php  } else {?>
  				<div class="col-xs-12 text-center">
  					<h2 class="title-prestamo"><?php echo $tipo_product;?></h2>
  				</div>
  				<div class="col-xs-12">
					<div class="container max-width-950">
                  		<ul class="nav nav-pills">
                    		<li class="active"></li>
                        	<li></li>
  					  	</ul>
                  		<div class="tab-content">
                    		<div id="home" class="tab-pane fade in active">
                      			<div class="row" style="margin-top:30px">
                    				<div class="col-xs-12">
                		    			<form class="text-center form-horizontal">
                            				<div class="col-xs-12 col-md-6" style="color:black;font-size:16px;position: relative;top: 30px;">
                                            	<div class="col-md-12">
                                            		<div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: 40px;">
                                                  		<span>12m</span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                  		<span>12m</span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                  		<span>36m</span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                    	<label for="slider-range-meses">Plazo de pr&eacute;stamo</label>
                                                    	<button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="top: -26px;left: -107px;" data-toggle="tooltip" data-placement="bottom" data-original-title="M&aacute;ximo de meses para pagar"><i class="mdi mdi-info"></i></button>
                                                        <div id="slider-range-meses"></div>
                                                        <p id="slider-range-value-meses" style="margin-top:10px; margin-bottom:0"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: -40px;">
                                                  		<span>36m</span>
                                                    </div>
                                            	</div>
                                            	<div class="col-md-12 hidden">
                                            		<div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: 40px;">
                                                  		<span id="sueldoMin">S/ <?php echo  $minAuto?></span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                  		<span >S/ <?php echo  $minAuto?></span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                  		<span>S/ <?php echo  $maxAuto?></span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                    	<label for="slider-range">Monto del veh&iacute;culo</label>
                                                        <div id="slider-range"></div>
                                                        <p id="slider-range-value" style="margin-top:10px; margin-bottom:0"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: -40px;">
                                                  		<span id="sueldoMax">S/ <?php echo  $maxAuto?></span>
                                                    </div>
                                            	</div>
                                            	<div class="col-md-12">
                                            		<div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: 40px;">
                                                  		<span id="minCuota">S/ <?php echo  $min_cuota?></span>
                                                    </div>
                                                    <div class="visible-xs col-xs-6 text-left">
                                                  		<span>S/ <?php echo  $min_cuota?></span>
                                                    </div>
                                                    <div class="visible-xs col-sm-6 text-right">
                                                  		<span>S/ <?php echo  $max_cuota?></span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                    	<label for="slider-range-dias">Cuota inicial</label>
                                                    	<button class="mdl-button mdl-js-button mdl-button--icon mdl-chip__action" style="top: -5px;left: -160px;" data-toggle="tooltip" data-placement="bottom" data-original-title="Primera inicial para el pr&eacute;stamo"><i class="mdi mdi-info"></i></button>
                                                        <div id="slider-range-dias"></div>
                                                        <p id="slider-range-value-dias" style="margin-top:10px; margin-bottom:0"></p>
                                                    </div>
                                                    <div class="hidden-xs col-sm-3 text-center" style="padding: 25px; position: relative;left: -40px;">
                                                  		<span id="maxCuota">S/ <?php echo  $max_cuota?></span>
                                                    </div>
                                            	</div>
                                            	<div class="col-md-12" style="color:black;font-size:16px;position: relative; left: -27px">
                                                    <label class="control-label col-xs-5 col-sm-5" for="email">Tipo de pago:</label>
                                                    <div class="col-xs-7 col-md-5">
                                                        <select class="form-control" name="marca" title="Selec. Tipo de pago" id="tipoPago">
                                                            <option value="">Tipo de pago</option>
                                                            <option value="1">Simple</option>
                                                            <option value="2" disabled>Doble</option>
                                                        </select>
                                                    </div>
                                            	</div>
                            				</div>
                                            <div class="col-xs-12 col-md-6 text-center" style="color: black;font-size:16px;position: relative;left: 100px;width: 35%;">
                                				<div class="col-md-12" style="border: 1px solid #1C4485;border-bottom-right-radius: 50px;border-top-left-radius: 50px;border-width: 2px;">
                                					<div class="col-md-12" style="margin: 10px">
                                						<p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">Pago total</p>
                                                		<span style="color:#1C4485;font-size: 20px" id="cantTotPago">S/ <?php echo $cantPago?></span>
                                					</div>
                                					<div class="col-md-12" style="margin: 10px">
                                						<p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">Cuota Mensual*</p>
                                                		<span style="color:#1C4485;font-size: 20px" id="cantMensPago">S/ <?php echo $mensual?></span>
                                					</div>
                                					<div class="col-md-12" style="margin: 10px">
                                						<p style="color:#1C4485;font-size: 18px;padding: 0px;margin: 5px;">TCEA</p>
                                                		<span style="color:#1C4485;font-size: 20px" id="cantMensPago">7%</span>
                                                		<p style="color:#A9A9A9;font-size:13px">*Cuota aproximada sujeta a evaluación</p>
                                					</div>
                                				</div>
                                				<div class="col-md-6" style="position: relative;top: 15px;">
                                					<div class="col-xs-6 text-center">
                                                        <button type="button" class="btn btn-lg" style="background-color: #bdbebf;color: #fff" data-toggle="modal" data-target="#myModal" id="generarCronograma">Desea Ampliar</button>
                                                    </div>
                                				</div>
                                				<div class="col-md-6" style="position: relative;top: 15px;">
                                					<div class="col-xs-6 text-center">
                                						<div class="container" style="position: relative;top: 30px;">
                                      						<ul class="nav nav-pills">
                                								<li><a data-toggle="tab" style="background-color: #1C4485; color: #fff;position: relative;top: -30px;" href="#menu1" onclick="addStyle()">Siguiente</a></li>
                                							</ul>
                                						</div>
                                                    </div>
                                				</div>            
                                            </div>
                            				<div class="col-xs-12" style="height:20px"></div>
                            				<div class="col-xs-12 visible-xs" style="height:20px"></div>
                            				<div class="col-xs-12 col-md-6" style="color:black;font-size:16px;"></div>
                          				</form>
            		    			</div>
	    						</div>
                    		</div>
                            <div id="menu1" class="tab-pane fade">
                            	<div class="col-xs-12 text-center">
                    		    	<div class="panel panel-primary" style="border:none; background: rgba(255,255,255,0.6); border-radius:10px">
                    			    	<div class="panel-body" style="margin-bottom:25px">
                                      		<div class="row text-center">
                                        		<form class="text-center" action="C_resumen" method="POST">
    	                                    		<div class="row-fluid">
                                            			<div class="col-md-12 card-border">
                                                			<div class="col-xs-12 col-sm-8">  
                                                  				<p style="font-weight: bold;font-size:20px;color:#1C4485;border-radius:10px"><strong>Datos laborales</strong></p>
                                                  			    <div class="col-xs-12 p-0">
                                                  			    	<div class="col-sm-6">
                                                          				<div class="form-group">
                                                                			<select class="form-control"  name="salario">
                                                                              <option value="">Salario</option>
                                                                              <option value="">Hasta 1,000 soles</option>
                                                                              <option value="">De 1,000 a 2,000 soles</option>
                                                                              <option value="">De 2,000 a 3,000 soles</option>
                                                                              <option value="">De 3,000 a 4,000 soles</option>
                                                                              <option value="">De 4,000 a 5,000 soles</option>
                                                                              <option value="">De 5,000 a 6,000 soles</option>
                                                                              <option value="">De 6,000 a más</option>
                                                            				</select>
                                                          				</div>
                                                          			</div>
                                                          			<div class="col-sm-6">
                                                                  		<div class="form-group">
                                                                    		<input type="text" class="form-control" id="nro_celular" name="nro_celular" placeholder="Nro. Celular">
                                                                  		</div>
                                                                  	</div>
                                                  			    </div>
                                                  			    <div class="col-xs-12">
                                                  			    	<div class="form-group">
                                                            			<input type="search" class="form-control" id="empleador" name="empleador" placeholder="Empleador" max-lenght="50">
                                                          			</div>
                                                  			    </div>
                                                  			    <div class="col-xs-12">
                                                  			    	<div class="form-group">
                                                            			<input type="text" class="form-control" id="direccion_empresa" name="direccion_empresa" max-lenght="50" placeholder="Direcci&oacute;n empresa">
                                                          			</div>
                                                  			    </div>
                                                  			    <div class="col-xs-12">
                                                      				<div class="form-group">
                                                            			<select class="form-control" id="Departamento" name="Departamento">
                                                                      		<option value="">Departamento</option>
                                                            			</select>
                                                          			</div>
                                                  			    </div>
                                                  			    <div class="col-xs-12 p-0">
                                          			    			<div class="col-sm-6">
                                                          				<div class="form-group">
                                                                			<select class="form-control" id="Provincia" name="Provincia">
                                                                          		<option value="">Provincia</option>
                                                                              	<option value="">Surco</option>
                                                                              	<option value="">Miraflores</option>
                                                                              	<option value="">Surquillo</option>
                                                                              	<option value="">Lima</option>
                                                                              	<option value="">San miguel</option>
                                                                              	<option value="">Villa el salvador</option>
                                                                			</select>
                                                              			</div>
                                                          			</div>
                                                          			<div class="col-sm-6">
                                                          				<div class="form-group">
                                                                			<select class="form-control" id="Distrito" name="Distrito">
                                                                              	<option value="">Distrito</option>
                                                                              	<option value="">Surco</option>
                                                                              	<option value="">Miraflores</option>
                                                                              	<option value="">Surquillo</option>
                                                                              	<option value="">Lima</option>
                                                                              	<option value="">San miguel</option>
                                                                              	<option value="">Villa el salvador</option>
                                                                			</select>
                                                              			</div>
                                                          			</div>
                                                  			    </div>
                                                  			    <div class="col-xs-12 text-left">
                                                  			    	<div class="checkbox">
                                                                      	<label>
                                                                        	<input type="checkbox" name="autorizacion"> Autorizo que usen mis datos para esta oferta
                                                                      	</label>
                                                                    </div>
                                                  			    </div>
                                                  			</div>
                                                  			<div class="col-xs-12 col-sm-4">
                                                              	<p><strong>Datos del contacto</strong></p>
                                                              	<div class="col-xs-12 p-0">
                                                          			<div class="col-sm-6">
                                                          				<div class="form-group">
                                                                    		<select class="form-control" name="agencias">
                                                                		  		<option value="">C&oacute;digo</option>
                                                                    		</select>
                                                                  		</div>
                                                          			</div>
                                                          			<div class="col-sm-6">
                                                          				<div class="form-group">
                                                                    		<input type="text" class="form-control" id="nro_fijo" name="nro_fijo" placeholder="Nro. Fijo">
                                                                  		</div>
                                                          			</div>
                                                          		</div>
                                                          		<div class="col-xs-12">
                                                      				<div class="form-group">
                                                                		<select class="form-control" name="agencias">
                                                                		  <option value="">Agencias</option>
                                                                          <option value="">Oficina Principal - Agencia Miraflores</option>
                                                                          <option value="">Agencia Huacho</option>
                                                                          <option value="">Agencia Barranca</option>
                                                                          <option value="">Agencia Huaral</option>
                                                                          <option value="">Agencia Plaza Norte (*)</option>
                                                                          <option value="">Agencia Comas</option>
                                                                          <option value="">Agencia Gran Chimú</option>
                                                                          <option value="">Agencia Puente Piedra</option>
                                                                          <option value="">Agencia San Juan de Miraflores</option>
                                                                          <option value="">Agencia Villa El Salvador</option>
                                                                          <option value="">Agencia Villa Maria del Triunfo</option>
                                                                          <option value="">Agencia Ceres</option>
                                                                		</select>
                                                                  	</div>
                                                          		</div>
                                                              	<div class="col-xs-12">
                                                              		<div class="form-group">
                                                                		<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email?>">
                                                              		</div>
                                                              	</div>	
                                                              	<div class="col-xs-12 m-t-50 text-right">
                                                              		<div class="container" style="position: relative;top: 30px;">
                                                  						<ul class="nav nav-pills">
                                            								<li id="remove" class="remove"><a data-toggle="tab" style="background-color: #005aa6; color: #fff;position: relative;top: 15px;" href="#home" onclick="addStyle()">Regresar</a></li>
                                            							</ul>
                                            						</div>
                                                              		<button type="button" data-toggle="modal" data-target="#myModaltelef" class="btn btn-primary btn-lg selector" onclick="enviarMail()">Aceptar</button>
                                                              	</div>
															</div>
                                                		</div>
													</div>
                                        		</form>
                                      		</div>
                    	    	  		</div>
                    	    		</div>
                            	</div>
							</div>
						</div>
                 	</div>
				</div>
  				<?php  }?>
  				</div>
  			</div>
  		</div>
  	</div>

    <div class="container">
    	<!-- <div class="col-sm-12 col-md-4 col-md-offset-4"> -->

    </div>



    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" aria-label="Close"><span style="color:#fff" aria-hidden="true">&times;</span></button>
          <p style="text-align: center;font-size: 16px;">Aplicacion de credito</p>
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
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" style="margin-top: -6px;border: 1px solid #fff;background-color: black;border-radius: 50%;width: 3%;top: 0px;" class="close" data-dismiss="modal" aria-label="Close"><span style="color:#fff" aria-hidden="true">&times;</span></button>
              <p style="text-align: center;font-size: 18px">Validar celular</p>
            </div>
            <div class="modal-body">
              <div class="bs-example">
                <div class="table-responsive" id="tablaCronograma">
                	<p style="margin-bottom: 0;font-size: 19px;color:#808080">Para poder terminar con la solicitud </p>	
              		<p style="margin-bottom: 11px;font-size: 19px;color:#808080">Por favor ingrese el c&oacute;digo de seguridad que ha sido enviado a su celular: </p>
              		<div class="center">
              			<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  		<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  		<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  		<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  		<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
                  		<input style="width: 50px;" type="text" placeholder="" size="4" maxlength="1">
              		</div>	
              		<br>
              		<div class="col-xs-12">
                    	<a href="" style="color: #0060aa;font-size: 15px;margin: -15px;">Enviar otro c&oacute;digo</a>
                    </div>
            </div>
        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" aria-label="Close" onclick="verificarNumero()">Confirmar</button>
            </div>
          </div>
      </div>
    </div>



    

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.1/bootstrap-slider.min.js"></script>-->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
  	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
    <script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_JS?>jquery-1.12.1.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>OwlCarousel/js/owl.carousel.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" src="<?php echo RUTA_PLUGINS?>noUiSlider/nouislider.min.js?v=<?php echo time();?>"></script>
	<script charset="UTF-8" type="text/javascript" async src="<?php echo RUTA_JS?>jspreaprobacion_m.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bTable/bootstrap-table-es-MX.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script>
	(function($){
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
    var rangeSlider = document.getElementById('slider-range');
    var monto      = null;
    var meses_pago = null;
    var cuota_ini  = null;
    var cuota_inicial  = null;

    noUiSlider.create(rangeSlider, {
      start: [ <?php echo  $iniRango?> ],
      step: 100,
      range: {
        'min': [  <?php echo  $minAuto?> ],
        'max': [ <?php echo  $maxAuto?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' S/ ',
      })
    });

    var rangeSliderValueElement = document.getElementById('slider-range-value');

    rangeSlider.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElement.innerHTML = values[handle];
      monto = values[handle];
      $.ajax({
    		data  : { cantidad : values[handle],
    			      meses    : meses_pago,
    			      cuota_inicial : cuota_inicial},
    		url   : 'preaprobacion/changeValuesVehiculo',
    		type  : 'POST'
    	}).done(function(data){
    		try{
    			data = JSON.parse(data);
    			if(data.error == 0){
					  $('#minCuota').html('S/ '+data.min_cuota);	
					  $('#maxCuota').html('S/ '+data.max_cuota);	
					  $('#importe').html('S/ '+data.cuota_ini);
					  $('#sueldoMin').html('S/ '+data.minAuto);
					  $('#sueldoMax').html('S/ '+data.maxAuto);
					  $('#cantTotPago').html('S/ '+data.cantPago);	
  					  $('#cantMensPago').html('S/ '+data.mensual);

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
      start: [ 36 ],
      step: 12,
      range: {
        'min': [  12 ],
        'max': [ 36 ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        postfix: ' meses',
      })
    });

    var rangeSliderValueElementMeses = document.getElementById('slider-range-value-meses');

    rangeSliderMeses.noUiSlider.on('update', function( values, handle ) {
      rangeSliderValueElementMeses.innerHTML = values[handle];
      meses_pago = values[handle];
      $.ajax({
    		data  : { meses    : values[handle],
    			      cantidad : monto,
    			      cuota_inicial : cuota_inicial},
    		url   : 'preaprobacion/changeValues',
    		type  : 'POST'
    	}).done(function(data){
    		try{
    			data = JSON.parse(data);
    			if(data.error == 0){
    				cuota_ini = data.min_cuota;
        			  $('#sueldoMin').html('S/ '+data.minAuto);
        			  $('#sueldoMax').html('S/ '+data.maxAuto);
        			  $('#minCuota').html('S/ '+data.min_cuota);
        			  $('#maxCuota').html('S/ '+data.max_cuota);
        			  $('#slider-range-value').html('S/ '+data.valor_auto);
        			  $('#slider-range-value-dias').html('S/ '+data.min_cuota);
  					  $('#cantTotPago').html('S/ '+data.cantPago);	
  					  $('#cantMensPago').html('S/ '+data.mensual);	

    			}else {
    				return;
    			}
    		} catch (err){
    			msj('error',err.message);
    		}
    	});
    });


    //dias
    var rangeSliderDias = document.getElementById('slider-range-dias');

    noUiSlider.create(rangeSliderDias, {
      start: [ <?php echo  $min_cuota?>],
      step: 100,
      range: {
        'min': [  <?php echo  $min_cuota?> ],
        'max': [ <?php echo  $max_cuota?> ]
      },
      connect: "lower",
      format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' S/ ',
      })
    });

    var rangeSliderValueElementDias = document.getElementById('slider-range-value-dias');

    rangeSliderDias.noUiSlider.on('update', function( values, handle ) {
    	rangeSliderValueElementDias.innerHTML = values[handle];
      	cuota_inicial = values[handle];
      $.ajax({
    		data  : { meses    : meses_pago,
    			      cantidad : monto,
    			      cuota_inicial : cuota_inicial},
    		url   : 'preaprobacion/changeImporte',
    		type  : 'POST'
    	}).done(function(data){
    		try{
    			data = JSON.parse(data);
    			if(data.error == 0){
    				$('#importe').html('S/ '+data.cuota_ini);
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
			/*$.ajax({
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
    		});*/
		});

	})(jQuery);

  </script>
  </body>
</html>