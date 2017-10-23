<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_reporteAsesor extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_producto');
        $this->load->model('M_solicitud');

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

    public function agenteHistorialSolicitud()
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

