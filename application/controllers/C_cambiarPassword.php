<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cambiarPassword extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->helper("access_helper");
        is_logged();
    }
    
    public function index()
    {
    	$id =  str_replace("/?a=","",base64_decode($_GET['a']));
    	$dato['encrypt'] = $_GET['a'];
        $dato['nombreDato']=':D';
        $idPersona =  str_replace("/?a=","",base64_decode($_GET['a']));
        $estado_recuperar = $this->M_usuario->getDatosById('usuario', 'id', $idPersona);
        if($estado_recuperar[0]->estado_recuperar != 1 && $estado_recuperar[0]->fecha_recuperar != date("Y-m-d") || $id == null) {
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
            $arrayUpdt = array(
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

