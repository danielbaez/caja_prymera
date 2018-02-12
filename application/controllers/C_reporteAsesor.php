<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_reporteAsesor extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_producto');
        $this->load->model('M_solicitud');
        $this->load->helper('url');
        $this->load->helper("access_helper");
        is_logged();

    }
    
    public function agenteCliente()
    {      

        $data['productos'] = $this->M_producto->getProductos();

        $action = _post('action');
        if(isset($action) and  $action == 'obtenerAgenteCliente') {

            $tipo_credito = _post('tipo_credito');
            $status = _post('status');
            $fecha_desde = _post('fecha_desde');
            $fecha_hasta = _post('fecha_hasta');

            $id_asesor = _getSesion('id_usuario');
            $filtros = array(
                        'id_asesor' => $id_asesor,
                        'tipo_credito' => $tipo_credito,
                        'status' => $status,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerAsesorAgenteCliente($filtros);

            $data['id_tipo_credito'] = $tipo_credito;
            $data['status'] = $status;
            $data['desde'] = $fecha_desde;
            $data['hasta'] = $fecha_hasta;

            $this->load->view('v_asesorAgenteCliente', $data);
        }
        else
        {        
            $this->load->view('v_asesorAgenteCliente', $data);
        }
    }

    /*public function agenteHistorialSolicitud()
    {
        $action = _post('action');
        if(isset($action) and  $action == 'obtenerHistorialSolicitud') {
            $nro_solicitud = _post('nro_solicitud');
            $cliente = _post('cliente');
            $dni = _post('dni');
            $fecha = _post('fecha');
            $id_asesor = _getSesion('id_usuario');
            $filtros = array(
                        'id_asesor' => $id_asesor,
                        'nro_solicitud' => $nro_solicitud,
                        'cliente' => $cliente,
                        'dni' => $dni,
                        'fecha' => $fecha
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerAsesorHistorialSolicitud($filtros);

            $data['nro_solicitud'] = $nro_solicitud;
            $data['cliente'] = $cliente;
            $data['dni'] = $dni;
            $data['fecha'] = $fecha;

            $this->load->view('v_asesorHistorialSolicitud', $data);
        }
        else
        {        
            $this->load->view('v_asesorHistorialSolicitud', []);
        }
    }*/

    public function agenteHistorialSolicitud()
    {   
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
        if($action and  $action == 'obtenerHistorialSolicitud') {
            $nro_solicitud = $_REQUEST['nro_solicitud'];
            $cliente = $_REQUEST['cliente'];
            $dni = $_REQUEST['dni'];
            $fecha = $_REQUEST['fecha'];
            $data['nro_solicitud'] = $nro_solicitud;
            $data['cliente'] = $cliente;
            $data['dni'] = $dni;
            $data['fecha'] = $fecha;
            $this->load->view('v_asesorHistorialSolicitud', $data);
        }
        else
        {
            $this->load->view('v_asesorHistorialSolicitud', []);    
        }
        
    }

    public function ajaxAgenteHistorialSolicitud()
    {
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
        if($action and  $action == 'obtenerHistorialSolicitud') {
            $nro_solicitud = $_REQUEST['nro_solicitud'];
            $cliente = $_REQUEST['cliente'];
            $dni = $_REQUEST['dni'];
            $fecha = $_REQUEST['fecha'];
            $filtros = array(
                'nro_solicitud' => $nro_solicitud,
                'cliente' => $cliente,
                'dni' => $dni,
                'fecha' => $fecha
            );

            $data['nro_solicitud'] = $nro_solicitud;
            $data['cliente'] = $cliente;
            $data['dni'] = $dni;
            $data['fecha'] = $fecha;

            echo $this->M_solicitud->ajaxObtenerHistorialSolicitud($filtros, false);
        }
        elseif($action and  $action == 'print') {
            $nro_solicitud = $_REQUEST['nro_solicitud'];
            $cliente = $_REQUEST['cliente'];
            $dni = $_REQUEST['dni'];
            $fecha = $_REQUEST['fecha'];
            $filtros = array(
                'nro_solicitud' => $nro_solicitud,
                'cliente' => $cliente,
                'dni' => $dni,
                'fecha' => $fecha
            );

            $data['nro_solicitud'] = $nro_solicitud;
            $data['cliente'] = $cliente;
            $data['dni'] = $dni;
            $data['fecha'] = $fecha;

            echo $this->M_solicitud->ajaxObtenerHistorialSolicitud($filtros, true);
        }
    }

    public function modalInformacionSolicitud()
    {
        $id = _post('id');
        $detalle = $this->M_solicitud->obtenerAsesorDetalleSolicitud($id);
        echo json_encode($detalle);
    }

    public function actualizarNotaSolicitud()
    {
        $id = _post('id');
        $nota = _post('nota');
        $id_nota = _post('id_nota');
        $id_asesor = _getSesion('id_usuario');
        $response = $this->M_solicitud->actualizarNotaSolicitud($id, $nota, $id_nota, $id_asesor);
        echo json_encode(array('response'=>$response));
    }
    
}

