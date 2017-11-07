<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_logged'))
{
    /*function checkIfLoggedIn($session_loggedIn)
    {
        $loggedIn = $session_loggedIn;
        if($loggedIn == false)
        {
            redirect('/');
        }
    }*/

    //function is_logged($methods)
    function is_logged()
    {
    	$CI =& get_instance();
    	$is_logged = _getSesion('logged');
    	$controller = $CI->uri->segment(1);
    	//echo $is_logged;
    	//print_r($CI->router->fetch_method());
    	
    	if (!$is_logged)
	    { 
	        $public = permissions($controller);
	        $public = $public['public'];

	        //exit($CI->router->fetch_method());
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
	    	$rol = _getSesion('rol');
	    	$redirect = roles($rol);

	    	$controller = $CI->uri->segment(1);
	    	//echo $controller;
			/*$method = $CI->uri->segment(2);
			$uri = $controller.'/'.$method;*/

			$method = $CI->router->fetch_method();
			//echo $method; exit();

			//if(!in_array($controller, rolPermissions($rol)))
			$perm_method = rolPermissions($rol);
	
			if(is_array($perm_method) && !in_array($method, $perm_method[$controller]))
			{
				if($controller != $redirect)//solo si el controller es diferente 
				{
					//exit();
					redirect('/'.$redirect);
				}
			}			
	    }
    }

}

function permissions($controller)
{
	//$controller = strtolower($controller);

	$p = ['' => ['public' => ['index']],
		  'Logearse' => ['public' => ['index', 'login', 'olvidoPassword', 'recuperarPass']],
		  'C_cambiarPassword' => ['public' => ['index', 'cambiarPass']]
		  //'C_main' => ['public' => []]
	];
	if(array_key_exists($controller, $p))
	{
		return $p[$controller];
	}
	return ['public' => []];
}

function roles($rol)
{
	switch ($rol) {
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
	/*$permission = ['administrador' => ['C_main', 'C_usuario', 'C_horario', 'C_IP', 'C_reporte'],
				   'asesor' => ['C_reporteAsesor', 'C_usuario'],
	];*/

	$permission = [
					'administrador' => [
						'C_main' => ['index', 'registrar'],
					   	'C_usuario' => ['detalleUsuario', 'verifyEmailAndDNI', 'asignarSupervisor', 'autocompleteGetJefe', 'actualizarTabla', 'getAsesoresByAgencia', 'guardarPersonalAsignado', 'logout'],
					   	'C_horario' => ['index', 'save'],
					   	'C_ippp' => ['index', 'save'],
					   	'C_reporte' => ['solicitudes', 'agenteCliente', 'historialSolicitud', 'solicitudRechazada', 'autocompleteGetAsesor', 'modalInformacionSolicitud']
					],
					'jefe_agencia' => [
						'C_main' => ['index', 'registrar'],
						'C_usuario' => ['detalleUsuario', 'logout'],
						'C_reporte' => ['solicitudes', 'agenteCliente', 'historialSolicitud', 'solicitudRechazada', 'autocompleteGetAsesor', 'modalInformacionSolicitud', 'actualizarEstadoSolicitud']
					],
				    'asesor' => [
				   		'C_reporteAsesor' => ['agenteCliente', 'agenteHistorialSolicitud', 'modalInformacionSolicitud', 'actualizarNotaSolicitud'],
				   		'C_usuario' => ['nuevaSolicitud', 'logout'],
				   		'C_login' => ['index', 'solicitar'],
				   		'Micash' => ['index', 'solicitar'],
				   		'C_losentimos' => ['index'],
				   		'C_preaprobacion' => ['index', 'getModelo', 'guardarMarca', 'changeValues'],
				   		'C_confirmacion' => ['index', 'getProvincia', 'getDistrito', 'ocultarAgencia', 'enviarMail', 'verificarNumero'],
				   		'Resumen' => ['index', 'setearAgencia'],
				   		'Ubicacion' => ['index']
				   	],
				   	'asesor_externo' => [
				   		'C_usuario' => ['nuevaSolicitud', 'logout'],
				   		'C_login' => ['index', 'solicitar'],
				   		'Micash' => ['index', 'solicitar'],
				   		'C_losentimos' => ['index'],
				   		'C_preaprobacion' => ['index', 'getModelo', 'guardarMarca', 'changeValues'],
				   		'C_confirmacion' => ['index', 'getProvincia', 'getDistrito', 'ocultarAgencia', 'enviarMail', 'verificarNumero'],
				   		'Resumen' => ['index', 'setearAgencia'],
				   		'Ubicacion' => ['index']
				   	]
				  ];

	return $permission[$rol];
}


 class access_helper {
 	function __construct() {
 		//parent::__construct();
 		$CI =& get_instance();
 		$this->load->helper("url");
 		$contorller = $this->uri->segment(1);
 		$action = $this->uri->segment(2);
 	}
	public static function is_logged_in()
	{
		$CI =& get_instance();
		$is_logged = _getSesion('logged');
		
		if($is_logged){

		}

		/*if($is_logged)
		{
			$controller = $CI->uri->segment(1);
			$method = $CI->uri->segment(2);
			$uri = $controller.'/'.$method;

			echo $uri;

			$permisos = _getSesion('permiso');

			//redirect('/C_main', 'refresh');
		}
		else
		{
			$controller = $CI->uri->segment(1);
			$method = $CI->uri->segment(2);
			$uri = $controller.'/'.$method;

			if($controller == '' || strtolower($uri) == 'logearse/index')
			{
				
			}
			else
			{
				//redirect('/');
			}	
		}*/
	}
 }

/*function aa(){

	$CI =& get_instance();
     $CI->load->library('email');

if(_getSesion('logged'))
{
	redirect('/C_main', 'refresh');
}
else
{
	
}
}*/