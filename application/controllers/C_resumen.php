<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_resumen extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        if (! isset($_COOKIE[__getCookieName()])) {
            header("Location: ".RUTA_CAJA, true, 301);
        }
    }
    
    public function index()
    {   
        if(_getSesion("nombre") == null && _getSesion("email") == null) {
            header("Location: ".RUTA_CAJA, true, 301);
        }
        $dato['nombreDato']=':D';
        $dato['nombre'] = _getSesion('nombre');
        $this->load->view('v_resumen', $dato);
    }
}

