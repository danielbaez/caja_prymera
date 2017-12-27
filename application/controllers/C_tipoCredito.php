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

    function getTipoCredito() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $tipocredito = _post('tipoCred');
            $session = array('tipoCred' => $tipocredito);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
    
}

