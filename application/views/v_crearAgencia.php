<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Caja prymera</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">		
		<link type="image/x-icon"   rel="shortcut icon" href="<?php echo RUTA_IMG?>fondos/favicom_blanco.jpg">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>quicksand.css?v=<?php echo time();?>">
		<<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome/css/font-awesome.min.css?v=<?php echo time();?>">
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.css?v=<?php echo time();?>">		
		<link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>global.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>header.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_CSS?>dashboard.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap_toggle/css/bootstrap-toggle.min.css?v=<?php echo time();?>">
        <link type="text/css"       rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
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
        <?php if(_getSesion('rol') == 'administrador'){ ?>
            <li><a href="/C_usuario/asignarSupervisor">Asignar Agentes</a></li>
            <li><a href="/C_horario">Horarios</a></li>
            <li><a href="/C_ip">Asignar IP</a></li>
            <li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
        <?php }
        	 elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
        	<li><a href="/C_reporte/solicitudes">Ver Reportes</a></li>
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
			<h1 class="titulo-vista">Crear Agencias</h1>            
		  </div>
		  <div class="hidden-xs col-sm-3 text-right">
            <ul class="nav navbar-nav navbar-right dropdown-menu-user">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="usuario-logueado font-bold"><?php echo _getSesion('nombreCompleto') ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">                    
                          <?php if(_getSesion('rol') == 'administrador'){ ?>
                            <li><a href="/C_usuario/asignarSupervisor">Asignar Agentes</a></li>
                            <li><a href="/C_horario">Horarios</a></li>
                            <li><a href="/C_ip">Asignar IP</a></li>
	                    	<li><a href="/C_reporte/solicitudes" class="navegacion-a">Ver Reportes</a></li>
                          <?php }
                             elseif(_getSesion('rol') == 'jefe_agencia'){ ?>
                            <li><a href="/C_reporte/solicitudes">Ver Reportes</a></li>
                          <?php } ?>
                          <li><a href="/C_usuario/logout" class="navegacion-a">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                      </li>
                  </ul>
            </div>

		    <?php
            $msg = $this->session->flashdata('msg');
            if(isset($msg)) {
            ?>
              <div class="col-xs-12">
	            <div class="alert alert-success" style="font-size: 16px; padding: 10px 20px; margin-bottom: 0px; margin-top: 10px;">
	                <?php echo $msg; ?>
	            </div>
	          </div>
            <?php
            }
            ?>
            
		  
		  <div class="col-xs-12 col-md-6 col-seccion">
			<div class="col-xs-12 div-seccion">
			  <h4>Agencia</h4>
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabla-usuarios">
				  <thead>
					<tr class="tr-header-reporte">
					  <th class="text-center">Nro</th>
					  <th class="text-center">Agencia</th>
					  <th class="text-center">Jefe</th>
					</tr>
				  </thead>
				  <tbody>
					<?php foreach($allAgencias as $allAgencias){
					  ?>
					<tr class="detalle-usuario" onclick='setearDatos(<?php echo $allAgencias->id ?>, "<?php echo $allAgencias->AGENCIA ?>", "<?php echo $allAgencias->nombre ?>")' >
					  <td><?php echo $allAgencias->id ?></td>
					  <td><?php echo ucfirst($allAgencias->AGENCIA) ?></td>
					  <td><?php echo $allAgencias->nombre ?></td>
					</tr>
				  <?php                 
				  } ?>                
					 
				  </tbody>
				</table>
			  </div>
			</div>  
		  </div>

		  <div class="col-xs-12 col-md-6 col-seccion">
			<div class="col-xs-12 div-seccion">
			  <h4>Editar Agencia</h4>
			  <div class="alert alert-danger alert-form" style="font-size: 16px; padding: 10px 20px; margin-bottom: 10px; margin-top: 10px; display: none">
	            </div>
			  <form class="text-center" id="form-create-edit-user" method="POST" enctype="multipart/form-data" autocomplete="false">
				<div class="col-xs-12 col-sm-12">
				  <div class="form-group div-sexo text-left">
				  	<div class="col-xs-10">
				  		<label class="form-label">Nombre</label>
						<input type="text" class="form-control" id="agencia" name="agencia" placeholder="Nombre" onkeypress="return soloLetras(event)" onchange="habilitarCampo()" maxlength="50">
				  	</div>
				  </div>
				 
				  <div class="form-group text-left">
				  	<div class="col-xs-10">
				  		<label class="form-label p-t-15">Dirección</label>
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" onchange="habilitarCampo()" onkeypress="" maxlength="100">
				  	</div>
				  </div>

				 <div class="form-group text-left">
				 	<div class="col-xs-12 p-0">
					  	<div class="col-xs-10" id="cont_telef">
					  		<label class="form-label p-t-15">Teléfono</label>
							<input type="text" class="form-control" onkeypress="return valida(event)" name="telefonos[]" maxlength="7" onchange="habilitarCampo()" id="txtelefono" placeholder="Teléfono"/>
					  	</div>
					  	<div class="col-xs-2 p-t-45">
					  		<button type="button" class="btn btn-default" aria-label="Close" onclick="agregarTelefono()" id="btnTelefono" style="background-color: transparent !important; border: transparent; margin-left: -15px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
					  	</div>
					</div>
				 </div>				  
				  
				  <div class="form-group text-left">
					  <div class="col-xs-12 p-0">
					  	<div class="col-xs-10" id="cont_correo">
					  		<label class="form-label p-t-15">Correo</label>
							<input type="text" class="form-control" id="correo" name="correos[]" placeholder="Correo de la agencia" onchange="habilitarCampo()" onkeypress="" maxlength="200">
					  	</div>
					  	<div class="col-xs-2 p-t-45">
					  		<button type="button" class="btn btn-default" aria-label="Close" onclick="agregarCorreo()" id="btnCorreo" style="background-color: transparent !important; border: transparent; margin-left: -15px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
					  	</div>
					  </div>
				  </div>
				  <div class="form-group div-rol-superior text-left">
				  	<div class="col-xs-10">
				  		<label class="form-label p-t-15">Jefe</label>
						<select class="form-control" onchange="habilitarCampo()" id="rol_superior" name="rol_superior">
						  <option value="">Jefe de Agencia</option>
						  <?php   foreach ($jefe_agencia as $key => $value) {
							?>
								<option value="<?php echo $value->id ?>"><?php echo $value->nombre.' '.$value->apellido ?></option>
							<?php
						  } ?>
						</select>
				  	</div>
				  </div>
				  <div class="col-xs-12 p-l-0">
				  	<div class="form-group text-left">
					  	<div class="col-xs-10">
					  		<label class="form-label p-t-15">IP</label>
					  		<input type="text" class="form-control" onchange="habilitarCampo()" id="celular" name="celular" placeholder="N&uacute;mero de IP" onkeypress="" maxlength="15">
					  	</div>
					  	<div class="col-xs-2 p-t40">
					  		<input type="checkbox" id="toggle_button" data-toggle="toggle" data-on="Sí" data-off="No">
					  	</div>
					  </div>
				  </div>

				</div>
				<div class="col-xs-12 p-t-20">
				  <div class="form-group col-xs-6 text-left">
				  	<a onclick="eliminar()" class="limpiar-form">Eliminar</a>
					<a onclick="limpiar()" class="limpiar-form">Limpiar</a>
				  </div>
				  <div class="form-group col-xs-6 text-right">
					
					<input type="hidden" name="action" value="save">
					<input type="hidden" name="id_usuario" value="">
					<input type="hidden" name="rol_db" value="">
					<input type="hidden" name="rol_user" value="<?php echo _getSesion('rol') ?>">
					<?php if(_getSesion('rol') == 'administrador'){ ?>
						<input type="button" id="btnGuardar" name="" class="btn btn-primary btn-action" value="Guardar" style="display: block" onclick="guardarAgencia()" disabled="">
						<input type="button" id="btnEditar" name="" class="btn btn-primary btn-only-upd" value="Actualizar" onclick="actualizarAgencia()" style="display: none">
					<?php } ?>
				<?php if(_getSesion('rol') == 'jefe_agencia'){ ?>
						<input type="button" name="" class="btn btn-primary btn-only-upd" value="Actualizar" style="display: none">
					<?php } ?>
					<!-- <input type="button" name="" class="btn btn-primary aparece hidden" onclick="actualizarDatos()" value="Actualizar"> -->
				  </div>
				</div>
			  </form>
		  </div>  
		</div>
	  </div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg centrar_logo" role="document">
    <div class="modal-content" style="">
          <div class="modal-header">
            <button type="button" style="" class="close btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" class="alinear"" id="terminosYcondiciones" style="">Eliminar Agencia</h3>
          </div>
          <div class="modal-body otros" style="">
            <p class="text-center" style="font-size: 25px;padding-top: 40px;margin-left: 90px;">
               Para poder eliminar esta agencia debes cambiar los agentes y supervisoresa otra agencia
            </p>
          </div>
          <div class="modal-footer">
          </div>
        </div>
  </div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	  
	  <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	  <script type="text/javascript" async src="<?php echo RUTA_JS?>jscrearagencia.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	  <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>


	  <script type="text/javascript" src="https:cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>bootstrap_toggle/js/bootstrap-toggle.min.js?v=<?php echo time();?>"></script>

	  <script>

	  	 $(function() {
		    $('#toggle-two').bootstrapToggle({
		      on: 'Sí',
		      off: 'No'
		    });
		  })

	  	$(document).ready(function() {

	  		var msgForm = "Debe completar todos los campos";
	  		var msgEmail = "El email ya existe, eija otro";

  var table = $('#tabla-usuarios').DataTable( {

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf',
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Busqueda Solicitud - Filtros',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            filename: 'reporte',
            customize: function (doc) {
              doc.content[1].table.widths = 
                  Array(doc.content[1].table.body[0].length + 1).join('*').split('');
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Busqueda Solicitud - Filtros',
            titleAttr: 'Excel',
            title: '',
            filename: 'reporte',
            header: true,
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                //$('row c[r^="A"]', sheet).attr( 's', '2');
            }
        },
      ],
      "language": {
        "search": "Buscar:",
        "emptyTable": "No hay registros disponibles",
        "paginate": {
            "first":        "Primero",
            "previous":     "Anterior",
            "next":         "Siguiente",
            "last":         "Ultimo"
        },
        "info":             "_START_ a _END_ de _TOTAL_ entradas",


        "infoEmpty":        "0 de 0 of 0 entradas",
        "infoFiltered":     "(filtrados de un total _MAX_ entradas)",
        "zeroRecords":      "No se encontraron registros",
      },
      "bInfo" : false,
      "pageLength": 15,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ],
      "dom": 'rtp'
  } );

});
	  	function habilitarCampo() {
	      var agencia         = $('#agencia').val();
	      var direccion     = $('#direccion').val();
	      var txtelefono       = $('#txtelefono').val();
	      var correo         = $('#correo').val();
	      var rol_superior    = $('#rol_superior').val();
	      var celular       = $('#celular').val();

	      if(agencia != null && direccion != '' && txtelefono != '' && correo != '' && rol_superior != '') {
	        $('#btnGuardar').removeAttr("disabled");
	      }
    }
	  	

	  </script>
	</body>
</html>