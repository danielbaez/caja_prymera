<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_horario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_horario');
        $this->load->model('M_agencia');
        $this->load->helper("url");

        $this->load->helper("access_helper");
        is_logged();

    }

    public function index()
    {             
        $data['agencia_selected'] = '';

        $data['nombre'] = _getSesion("nombre");

        $data['agencias'] = $this->M_agencia->getAllAgencias();

        $data['horarios'] = false;

        $this->load->view('v_horarios', $data);
    }

    public function agencia()
    {
        $data['agencia_selected'] = $_GET['agencia'];

        $data['nombre'] = _getSesion("nombre");
        $data['agencias'] = $this->M_agencia->getAllAgencias();
        if($_GET['agencia'] != '')
        {            
            $data['horarios'] = $this->M_horario->getHorario($_GET['agencia']);
        }
        else
        {
            $data['horarios'] = false;
        }

        $this->load->view('v_horarios', $data);
    }

    public function save()
    {   
        $agencia = _post('agencia');
        $desde = _post('desde');
        $hasta = _post('hasta');
        //exit($agencia);
        $this->M_horario->setHorario($agencia, $desde, $hasta);
        $this->session->set_flashdata('msg', 'Se actualizo el horario correctamente');
        redirect('C_horario');
    }
    
}

