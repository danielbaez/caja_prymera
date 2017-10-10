<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash_ubicacion extends CI_Controller {
    
	//construct : $this->load->model('M_preaprobacion');
	function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
        $this->load->model('M_preaprobacion');
    }

    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = _getSesion('nombre');
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['tea'] = _getSesion('sess_tea');
        $dato['Agencia'] = _getSesion('Agencia');
        $dato['concesionaria'] = _getSesion('concesionaria');
        $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
        $dato['ubicacion'] = $direccion[0]->UBICACION;
        $this->load->view('v_micash_ubicacion', $dato);
    }
}

