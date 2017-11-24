<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_horario extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_horario');
        $this->load->model('M_agencia');
        $this->load->model('M_acceso');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();

    }

    public function index()
    {             
        $data['agencia_selected'] = '';
        $data['rol_selected'] = '';

        $data['nombre'] = _getSesion("nombre");

        $data['agencias'] = $this->M_agencia->getAllAgencias();

        $data['horarios'] = false;

        $data['acceso'] = $this->M_acceso->getAcceso();

        $this->load->view('v_horarios', $data);
    }

    public function agencia()
    {
        $data['agencia_selected'] = $_GET['agencia'];
        $data['rol_selected'] = $_GET['rol'];

        $data['nombre'] = _getSesion("nombre");
        $data['agencias'] = $this->M_agencia->getAllAgencias();
        if($_GET['agencia'] != '' && $_GET['rol'] != '')
        {            
            $data['horarios'] = $this->M_horario->getHorario($_GET['agencia'], $_GET['rol']);
        }
        else
        {
            $data['horarios'] = false;
        }

        $data['acceso'] = $this->M_acceso->getAcceso();

        $this->load->view('v_horarios', $data);
    }

    public function save()
    {
        $acceso = _post('acceso') == 'on' ? 1 : 0;
        $agencia = _post('agencia');
        $rol = _post('rol');
        if($agencia != '' && $rol != '')
        {
            $desde = _post('desde');
            $hasta = _post('hasta');    
        }
        else
        {
            $agencia = false;
            $desde = false;
            $hasta = false;
        }
        
        //exit($agencia);
        $this->M_horario->setHorario($agencia, $desde, $hasta, $rol);
        $this->M_acceso->setAcceso($acceso, 'horario');
        $this->session->set_flashdata('msg', 'Se actualizo el horario correctamente');
        redirect('C_horario');
    }
    
}

