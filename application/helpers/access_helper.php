<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_logged'))
{
    function is_logged()
    {
    	$CI = & get_instance();
    	$is_logged = _getSesion('logged');
    	$controller = $CI->uri->segment(1);
    	$method = $CI->router->fetch_method();
    	
    	if (!$is_logged)
	    { 
	        $public = permissions_public($controller);

	        if(!in_array($CI->router->fetch_method(), $public))
	        {
	        	if($controller != '')// controller "" es que esta en el login, solo redirecciona al login si no esta ahi.
				{
					redirect('/');
				}	            
	        }
	    }
	    else
	    {
	    	$CI->load->model('M_usuario');
	    	$datos = $CI->M_usuario->getLoginById(_getSesion('id_usuario'));
	    	$access = $CI->M_usuario->verifyUserIPTime($datos[0]);

	    	if(!$access['error'])
	    	{
		    	$rol = _getSesion('rol');
		    	$redirect = roles($rol);				

				$perm_method = rolPermissions($rol);
		
				if(is_array($perm_method) && !in_array($method, $perm_method[$controller]))
				{
					if($controller != $redirect)//solo si el controller es diferente 
					{
						redirect('/'.$redirect);
					}
				}
			}
			else
			{
				$CI->session->set_userdata('logged', false);
				$CI->session->set_flashdata('error', $access['error']);
        		redirect('/', 'refresh');
			}
	    }
    }
}

function permissions_public($controller)
{
	$p = ['' => ['index'],
		  'Logearse' => ['index', 'login', 'olvidoPassword', 'recuperarPass'],
		  'C_cambiarPassword' => ['index', 'cambiarPass']
	];
	if(array_key_exists($controller, $p))
	{
		return $p[$controller];
	}
	return ['public' => []];
}

function roles($rol)
{
	switch ($rol)
	{
		case 'administrador':
			$redirect = 'C_main';
			break;
		case 'jefe_agencia':
			$redirect = 'C_reporte/solicitudes';
			break;
		case 'asesor':
			$redirect = 'C_usuario/nuevaSolicitud';
			break;
		case 'asesor_externo':
			$redirect = 'C_usuario/nuevaSolicitud';
			break;
	}
	return $redirect;
}

function rolPermissions($rol)
{
	$permission = [
					'administrador' => [
						'C_main' => ['index', 'registrar'],
					   	'C_usuario' => ['detalleUsuario', 'verifyEmailAndDNI', 'asignarSupervisor', 'autocompleteGetJefe', 'actualizarTabla', 'getAsesoresByAgencia', 'borrarAsignados', 'guardarPersonalAsignado', 'logout'],
					   	'C_horario' => ['index', 'agencia', 'save'],
					   	'C_ip' => ['index', 'save'],
					   	'C_reporte' => ['solicitudes', 'agenteCliente', 'historialSolicitud', 'solicitudRechazada', 'autocompleteGetAsesor', 'modalInformacionSolicitud', 'solicitudesTotales', 'cambiarEstado']
					],
					'jefe_agencia' => [
						'C_main' => ['index', 'registrar'],
						'C_usuario' => ['detalleUsuario', 'logout'],
						'C_reporte' => ['solicitudes', 'agenteCliente', 'historialSolicitud', 'solicitudRechazada', 'autocompleteGetAsesor', 'modalInformacionSolicitud', 'actualizarEstadoSolicitud', 'solicitudesTotales', 'cambiarEstado']
					],
				    'asesor' => [
				   		'C_reporteAsesor' => ['agenteCliente', 'agenteHistorialSolicitud', 'modalInformacionSolicitud', 'actualizarNotaSolicitud'],
				   		'C_usuario' => ['nuevaSolicitud', 'logout'],
				   		'Vehicular' => ['index', 'solicitar'],
				   		'Micash' => ['index', 'solicitar'],
				   		'Preaprobacion' => ['index', 'changeValues', 'setearDatos'],
				   		'C_losentimos' => ['index', 'guardarDatos'],
				   		'C_mensaje' => ['index'],
				   		'C_preaprobacion' => ['index', 'getModelo', 'guardarMarca', 'changeValues'],
				   		'C_confirmacion' => ['index', 'getProvincia', 'getDistrito', 'ocultarAgencia', 'enviarMail', 'verificarNumero', 'Redireccionar'],
				   		'Resumen' => ['index', 'setearAgencia','Redireccionar'],
				   		'Ubicacion' => ['index']
				   	],
				   	'asesor_externo' => [
				   		'C_usuario' => ['nuevaSolicitud', 'logout'],
				   		'Vehicular' => ['index', 'solicitar'],
				   		'Micash' => ['index', 'solicitar'],
				   		'Preaprobacion' => ['index', 'changeValues', 'setearDatos'],
				   		'C_losentimos' => ['index', 'guardarDatos'],
				   		'C_mensaje' => ['index'],
				   		'C_preaprobacion' => ['index', 'getModelo', 'guardarMarca', 'changeValues'],
				   		'C_confirmacion' => ['index', 'getProvincia', 'getDistrito', 'ocultarAgencia', 'enviarMail', 'verificarNumero', 'Redireccionar'],
				   		'Resumen' => ['index', 'setearAgencia', 'Redireccionar'],
				   		'Ubicacion' => ['index']
				   	]
				  ];

	return $permission[$rol];
}