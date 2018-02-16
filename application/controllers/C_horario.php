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
            $accesoHorario = $this->M_horario->getAccesoHorarioAgencia($_GET['agencia']);
            $data['accesoHorario'] = $accesoHorario;
            $data['horarios'] = $this->M_horario->getHorario($_GET['agencia'], $_GET['rol']);
        }
        elseif($_GET['agencia'] != '')
        {
            $accesoHorario = $this->M_horario->getAccesoHorarioAgencia($_GET['agencia']);
            $data['accesoHorario'] = $accesoHorario;
            $data['horarios'] = false;
        }
        else
        {
            $data['horarios'] = false;
        }

        //$data['acceso'] = $this->M_acceso->getAcceso();

        $this->load->view('v_horarios', $data);
    }

    public function save()
    {
        $acceso = _post('acceso') == 'on' ? 1 : 0;
        $agencia = _post('agencia');
        $name = _post('name');
        $rol = _post('rol');
        $ins = false;

        if($agencia != '')
        {
            $this->M_acceso->setHorarioAgencia($agencia, $acceso, 'horario');            
            $this->session->set_flashdata('msg', "Se actualizo el horario de la agencia {$name} correctamente");
        }

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

        if(!$agencia)
        {
            redirect('C_horario');
        }
        
        //exit($agencia);
        $this->M_horario->setHorario($agencia, $desde, $hasta, $rol);
       
        redirect('C_horario');
    }
    
}

