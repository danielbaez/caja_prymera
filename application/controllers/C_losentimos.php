<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_losentimos extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_losentimos', $dato);
    }
    
}
