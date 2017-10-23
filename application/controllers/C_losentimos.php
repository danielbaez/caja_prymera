<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_losentimos extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_preaprobacion');
        $this->load->helper("url");
    }

    public function index()
    {
        $dato['nombreDato']=':D';
        //_log(print_r($this->session->all_userdata(), true));
        $dato['nombreCompleto'] = _getSesion('nombreCompleto');
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_losentimos', $dato);
    }
    
    function guardarDatos() {
    	$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $nro_cel = _post('nro_cel');
            $nro_fijo = _post('nro_fijo');
            $idPersona  = _getSesion('idPersona');
            
            $arrayUpdt = array('celular'        => $nro_cel,
                               'nro_fijo'          => $nro_fijo
                             );
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        _log(print_r($data, true));
        echo json_encode(array_map('utf8_encode', $data));
    }
}
