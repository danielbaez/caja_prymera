<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller {
    
	function __construct() {
        ob_start();
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->helper("access_helper");
        is_logged();
    }

    public function index()
    {
        $datos = $this->M_usuario->getDatosById('solicitud', 'id', _getSesion('idPersona'));
        if($datos[0]->last_page != N_INTRO_MAPA) {
            redirect("/C_main", 'location');
        }
        $dato['pago_total']    = _getSesion('pago_total');
        $dato['nombre']        = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['tcea']          = _getSesion('TCEA');
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['cant_meses']    = _getSesion('cant_meses');
        $dato['Importe']       = _getSesion('Importe');
        $dato['tea']           = _getSesion('sess_tea');
        $dato['Agencia']       = _getSesion('Agencia');
        $dato['concesionaria'] = _getSesion('concesionaria');
        $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
        $dato['ubicacion']     = $direccion[0]->UBICACION;
        $dato['telefono']      = $direccion[0]->TELEFONO;
        $idPersona             = _getSesion('idPersona');
        $arrayUpdt             = array('last_page' => N_INTRO_MAPA,
                                       'status_sol'     => 0/*abierto*/);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
        $this->load->view('v_simuladorUbicacion', $dato);
    }
}

