<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash_ubicacion extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_micash_ubicacion', $dato);
    }
}

