<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tipoCredito extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_horario');
        $this->load->model('M_agencia');
        $this->load->model('M_acceso');
        $this->load->helper("url");
    }

    public function index()
    {             
        $data['nombre'] = '';
        $this->load->view('v_tipoCredito', $data);
    }
    
}

