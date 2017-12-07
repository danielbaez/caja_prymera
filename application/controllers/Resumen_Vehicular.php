<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumen_Vehicular extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        /*$this->load->helper("access_helper");
        is_logged();*/
    }

    public function index() {
       /* $datos_page = $this->M_usuario->getDatosById('solicitud', 'id', _getSesion('idPersona'));
        if($datos_page[0]->last_page != N_RESUMEN) {
            redirect("/C_main", 'location');
        }*/
        $arrayUpdt = array('last_page' => N_RESUMEN);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['pago_total']    = _getSesion('pago_total');
        $dato['nombre']        = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $fecha = new DateTime(_getSesion('periodo_gracia'));
        $fecha_d_m_y = $fecha->format('d/m/Y');
        $dato['fecha_periodo'] = $fecha_d_m_y;
        $dato['marca']         = _getSesion('marca');
        $dato['modelo']        = _getSesion('modelo');
        $dato['valor_auto']    = _getSesion('valor_auto');
        $dato['tcea']          = _getSesion('tcea_sess');
        $dato['cant_meses']    = _getSesion('cant_meses');
        $dato['Importe']       = _getSesion('Importe');
        $dato['cuota_inicial'] = _getSesion('cuota_inicial');
        $dato['tea']           = _getSesion('sess_tea');
        $dato['Agencia']       = _getSesion('Agencia');
        $dato['comboAgencias'] = $this->__buildComboAgencias();
        $this->load->view('v_ResumenVehicular', $dato);
    }

    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt      = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->agencia));
            $opt .= '<option value="'.$agen.'"> '.$agen.'</option>';
        }
        return $opt;
    }
}

