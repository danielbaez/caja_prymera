<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_losentimos extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_losentimos', $dato);
    }
    
}
