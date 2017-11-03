<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cambiarPassword extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
    }
    
    public function index()
    {
    	$id =  str_replace("/?a=","",base64_decode($_GET['a']));
    	$dato['encrypt'] = $_GET['a'];
        $dato['nombreDato']=':D';
        $estado_recuperar = $this->M_usuario->getDatosById('usuario', 'id', _getSesion('id_pers_recuperar'));
        if($estado_recuperar[0]->estado_recuperar != 1 && _getSesion("fecha_recupear") != date("Y-m-d") || $id == null) {
	        redirect("/", 'location');
	    }
        $this->load->view('v_cambiarPassword', $dato);
    }

    function cambiarPass() {
    	$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
        	$email = _post('email');
        	$password = _post('password');
        	$idPersona =  str_replace("/?a=","",base64_decode(_post('encrypt')));
        	$idPersona = _getSesion('id_pers_recuperar');
            $arrayUpdt = array('email' => $email,
            					'password' => $this->get_hash($password),
            					'estado_recuperar' => 0);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'usuario');
            $session = array('estado_recuperar' => 0);
            $this->session->set_userdata($session);
            $data['msj']   = "Se actualizaron sus datos correctamente";
        	$data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['error'] = EXIT_ERROR;
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

     function get_hash($password, $cost = 11) {
        // Genera sal de forma aleatoria
        $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
        // reemplaza caracteres no permitidos
        $salt=str_replace("+",".",$salt);
        // genera una cadena con la configuración del algoritmo
        $param='$'.implode('$',array(
                "2y", // versión más segura de blowfish (>=PHP 5.3.7)
                str_pad($cost,2,"0",STR_PAD_LEFT), // costo del algoritmo
                $salt // añade la sal
        ));
       
        // obtiene el hash de la contraseña
        return crypt($password,$param);
    }
}

