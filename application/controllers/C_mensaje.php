<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mensaje extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_mensaje', $dato);
    }
}

