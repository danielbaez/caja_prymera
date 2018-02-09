<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ip extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_agencia');
        $this->load->model('M_acceso');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();

    }

    public function index()
    {             
        $data['nombre'] = _getSesion("nombre");

        $data['agencias'] = $this->M_agencia->getAllAgenciasIPPPPP();

        $data['acceso'] = $this->M_acceso->getAcceso();

        $this->load->view('v_ip', $data);
    }

    public function save()
    {
        //print_r($_REQUEST);exit();             
        $acceso = _post('acceso') == 'on' ? 1 : 0;
        $agencias = _post('agencia');
        $ips = is_array(_post('ips')) ? _post('ips') : [];
        $this->M_agencia->setIP($agencias);
        $this->M_acceso->setIps($agencias, $ips, 'ip');
        $this->session->set_flashdata('msg', "Se actualizo los IP's correctamente");
        redirect('C_ip');
    }
    
}

