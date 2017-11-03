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
        $this->load->helper("url");

    }

    public function index()
    {             
        $data['nombre'] = _getSesion("nombre");

        $data['horarios'] = $this->M_horario->getHorario();

        $this->load->view('v_horarios', $data);
    }

    public function save()
    {             
        $desde = _post('desde');
        $hasta = _post('hasta');
        $this->M_horario->setHorario($desde, $hasta);
        $this->session->set_flashdata('msg', 'Se actualizo el horario correctamente');
        redirect('C_horario');
    }
    
}

