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

        $this->load->helper("access_helper");
        is_logged();
    }

    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['nombreCompleto'] = _getSesion('nombreCompleto');
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $this->load->view('v_losentimos', $dato);
    }
    
    function guardarDatos() {
    	$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $nro_cel = _post('nro_cel');
            $nro_fijo = _post('nro_fijo');
            if($nro_cel == '' || $nro_cel == null) {
                throw new Exception("Ingrese un n&uacute;mero de celular", 1);
                
            }
            /*if($nro_fijo == '') {
                throw new Exception("Ingrese un n&uacute;mero de tel&eacute;fono fijo", 1);
                
            }*/
            $idPersona  = _getSesion('idPersona');
            
            $arrayUpdt = array('celular'        => $nro_cel,
                               'nro_fijo'          => $nro_fijo
                             );
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
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
