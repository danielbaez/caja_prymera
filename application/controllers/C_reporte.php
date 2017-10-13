<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_reporte extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_agencia');
        $this->load->model('M_producto');
        $this->load->model('M_solicitud');
        $this->load->model('M_usuario');

    }
    
    public function solicitudes()
    {             
        $data['agencias'] = $this->M_agencia->getAgencias();
        $data['productos'] = $this->M_producto->getProductos();

        $action = _post('action');
        if(isset($action) and  $action == 'obtenerSolicitudes') {
            $agencia = _post('agencia');
            $tipo_credito = _post('tipo_credito');
            $fecha_desde = _post('fecha_desde');
            $fecha_hasta = _post('fecha_hasta');
            $filtros = array(
                        'agencia' => $agencia,
                        'tipo_credito' => $tipo_credito,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerSolicitudes($filtros);

            $data['id_agencia'] = $agencia;
            $data['id_tipo_credito'] = $tipo_credito;
            $data['desde'] = $fecha_desde;
            $data['hasta'] = $fecha_hasta;

            $this->load->view('v_reporteSolicitud', $data);
        }
        else
        {
            $this->load->view('v_reporteSolicitud', $data);
        }
    }

    public function agenteCliente()
    {
        $data['productos'] = $this->M_producto->getProductos();

        $action = _post('action');
        if(isset($action) and  $action == 'obtenerAgenteCliente') {
            $id_asesor = _post('id_asesor');
            $asesor = _post('asesor');
            $tipo_credito = _post('tipo_credito');
            $status = _post('status');
            $fecha_desde = _post('fecha_desde');
            $fecha_hasta = _post('fecha_hasta');
            $filtros = array(
                        'id_asesor' => $id_asesor,
                        'tipo_credito' => $tipo_credito,
                        'status' => $status,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerAgenteCliente($filtros);

            $data['id_asesor'] = $id_asesor;
            $data['asesor'] = $asesor;
            $data['id_tipo_credito'] = $tipo_credito;
            $data['status'] = $status;
            $data['desde'] = $fecha_desde;
            $data['hasta'] = $fecha_hasta;

            $this->load->view('v_reporteAgenteCliente', $data);
        }
        else
        {        
            $this->load->view('v_reporteAgenteCliente', $data);
        }
    }

    public function autocompleteGetAsesor()
    {
        $asesores = $this->M_usuario->buscarAsesor(_post('asesor'));
        echo json_encode($asesores);
        //echo '[{"name": "Afghanistan", "code": "AF"}]';
    }

    public function historialSolicitud()
    {
        $this->load->view('v_reporteHistorialSolicitud', []);
    }

    public function solicitudRechazada()
    {
        $this->load->view('v_reporteSolicitudRechazada', []);
    }
    
}

