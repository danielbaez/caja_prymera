<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_producto');
        $this->load->model('M_preaprobacion');
       /* $this->load->helper("url");*/
    }

    public function index()
    {             
        $data['nombre'] = '';
    }
    

    function verificarEstado() {
        $datos = $this->M_producto->getSolicitudes();
        if($datos == null) {
            return;
        }else {
            foreach ($datos as $key) {
                $arrayUpdt = array('status_sol' => 4);
                //$this->M_preaprobacion->updateDatosCliente($arrayUpdt, $key->id , 'solicitud');
            }
        }
    }
}

