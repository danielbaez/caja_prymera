<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mensaje extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_usuario');
        $this->load->model('M_preaprobacion');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();
    
    }

    public function index() {
        $idPersona = _getSesion('idPersona');
        $arrayUpdt = array('last_page' => N_MENSAJE_RECHAZADO);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $idPersona , 'solicitud');
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $this->load->view('v_nosPondremosEnContacto', $dato);
    }

    function goToHome() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            if(_getSesion('TIPO_PROD') == PRODUCTO_MICASH) {
                  $data['location']  = '/Micash';
            }else {
                $data['location']  = '/Vehicular';
            }
        $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
     }
}

