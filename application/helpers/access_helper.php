<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		if(_getSesion('logged'))
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
		} 
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