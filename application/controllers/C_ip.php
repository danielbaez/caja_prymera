<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ip extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_agencia');
        $this->load->model('M_acceso');
        $this->load->helper("url");

        $this->load->helper("access_helper");
        is_logged();

    }

    public function index()
    {             
        $data['nombre'] = _getSesion("nombre");

        $data['agencias'] = $this->M_agencia->getAllAgencias();

        $data['acceso'] = $this->M_acceso->getAcceso();

        $this->load->view('v_ip', $data);
    }

    public function save()
    {             
        $acceso = _post('acceso') == 'on' ? 1 : 0;
        $agencias = _post('agencia');
        $this->M_agencia->setIP($agencias);
        $this->M_acceso->setAcceso($acceso, 'ip');
        $this->session->set_flashdata('msg', "Se actualizo los IP's correctamente");
        redirect('C_ip');
    }
    
}

