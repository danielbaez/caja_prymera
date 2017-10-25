<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller {
    
	//construct : $this->load->model('M_preaprobacion');
	function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        if (! isset($_COOKIE[__getCookieName()])) {
            redirect("/", 'location');
        }
    }

    public function index()
    {
         if(_getSesion("usuario") == null && _getSesion("nombre") == null || _getSesion('conectado') == 0) {
            //redirect("/C_main", 'location');
        }
        $this->session->set_userdata(array('conectado' => 0));
        $dato['nombreDato']=':D';
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['tea'] = _getSesion('sess_tea');
        $dato['Agencia'] = _getSesion('Agencia');
        //$datos_bd = $this->M_preaprobacion->getDireccionByAgencia(_getSesion('Agencia'));
        //$dato['direccion'] = $datos_bd[0]->UBICACION;
        $dato['concesionaria'] = _getSesion('concesionaria');
        $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
        $dato['ubicacion'] = $direccion[0]->UBICACION;
        $dato['telefono'] = $direccion[0]->TELEFONO;
        $this->load->view('v_micash_ubicacion', $dato);
    }

    function goToHome() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            if(_getSesion('TIPO_PROD') == PRODUCTO_MICASH) {
                  $data['location']  = '/Micash';
            }else {
                $data['location']  = '/C_login';
            }
        $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
     }
}

