<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash_resumen extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        _log(print_r(_getSesion('pago_total'), true));
        $this->load->view('v_micash_resumen', $dato);
    }
}

