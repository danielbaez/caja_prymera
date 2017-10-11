<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
//         if (! isset($_COOKIE[__getCookieName()])) {
//             header("Location: ".RUTA_KOPLAN, true, 301);
//             //redirect(RUTA_VEHIKMANT, 'location');
//         }
    }
    
    public function index()
    {
        $this->load->model('M_usuario');

        $data['nombre'] = _getSesion("nombre");

        
        $data['personales'] = $this->M_usuario->getPersonal();

        _log(print_r($this->session->all_userdata('deliverdata') , true));
//         if(_getSesion("nombre") == null && _getSesion("email") == null) {
//             header("Location: ".RUTA_KOPLAN, true, 301);
//         }
        $this->load->view('v_main', $data);
    }
}

