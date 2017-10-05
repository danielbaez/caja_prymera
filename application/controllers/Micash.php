<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_micash', $dato);
    }
    
    function solicitar(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $json_service  = '{"tipo": "A","Nombre": "juan","cantidad_max": 3000}';
            $nombre        = __getTextValue('nombre');
            $apellido      = __getTextValue('apellido');
            $dni           = _post('dni');
            $email         = _post('email');
            $newdata       = array();
            $tipo_producto = PRODUCTO_MICASH;
            if($dni == null || $dni == '') {
                throw new Exception('Ingrese su DNI');
            }
            if(strlen($dni) != 8) {
                throw new Exception('El DNI debe contener 8 caracteres');
            }
            $json = json_decode($json_service);
            $session = array('nombre'            => $nombre,
                'apellido'          => $apellido,
                'dni'               => $dni,
                'email'             => $email,
                'tipo_solicitud'    => $json->tipo,
                'cantidad'          => $json->cantidad_max,
                'tipo_producto'     => $tipo_producto
            );
            
            $this->session->set_userdata($session);
            //             _log(_getSesion('nombre'));
            if($dni == null) {
                throw new Exception('Ingrese su DNI');
            }else {
                if($json->tipo == 'A') {
                    if($tipo_producto == PRODUCTO_MICASH) {
                        $data['url'] = RUTA_CAJA.'preaprobacion';
                    }else {
                        //$data['url'] = RUTA_CAJA.'c_marca';
                    }
                }else if($json->tipo == 'B') {
                    $data['url'] = RUTA_CAJA.'micash_losentimos';
                }else if($json->tipo == 'C') {
                    $data['url'] = RUTA_CAJA.'micash_noencontrado';
                }
            }
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}
