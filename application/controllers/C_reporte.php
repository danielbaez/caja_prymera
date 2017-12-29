<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_reporte extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_agencia');
        $this->load->model('M_producto');
        $this->load->model('M_solicitud');
        $this->load->model('M_usuario');
        $this->load->model('M_preaprobacion');
        $this->load->helper('url');        
        $this->load->helper("access_helper");
        is_logged();

    }

    public function ExportFile($records) {

      $heading = false;
      if(!empty($records))
        foreach($records as $row) {
        $row = (array) $row;
        if(!$heading) {
          // display field/column names as a first row
          echo implode("\t", array_keys($row)) . "\n";
          $heading = true;
        }
        echo implode("\t", array_values($row)) . "\n";
        }
      exit;
    }
    
    public function solicitudes()
    {             
        $data['agencias'] = $this->M_agencia->getAgencias('reporte');
        $data['productos'] = $this->M_producto->getProductos();

        $action = _post('action');
        $reporte = _post('reporte');
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

            if($reporte == 'excel')
            {
                $filename = "reporte.xls";     
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
                $this->ExportFile($data['solicitudes']);
                $this->load->view('v_reporteSolicitud', $data);
            }

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
            $asesor = _post('asesor');
            $id_asesor = _post('id_asesor');    
            if($asesor == ''){
                $id_asesor = '';
            }

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

    public function getAgenciaByAsesor()
    {
        $asesores = $this->M_usuario->getAgenciaByAsesor(_post('id_asesor'));
        echo json_encode($asesores);
    }

    public function historialSolicitud()
    {
        $action = _post('action');
        if(isset($action) and  $action == 'obtenerHistorialSolicitud') {
            $nro_solicitud = _post('nro_solicitud');
            $cliente = _post('cliente');
            $dni = _post('dni');
            $fecha = _post('fecha');
            $filtros = array(
                        'nro_solicitud' => $nro_solicitud,
                        'cliente' => $cliente,
                        'dni' => $dni,
                        'fecha' => $fecha
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerHistorialSolicitud($filtros);

            $data['nro_solicitud'] = $nro_solicitud;
            $data['cliente'] = $cliente;
            $data['dni'] = $dni;
            $data['fecha'] = $fecha;

            $this->load->view('v_reporteHistorialSolicitud', $data);
        }
        else
        {        
            $this->load->view('v_reporteHistorialSolicitud', []);
        }
    }

    public function modalInformacionSolicitud()
    {
        $id = _post('id');
        $action = _post('action');
        $detalle = $this->M_solicitud->obtenerDetalleSolicitud($id, $action);
        echo json_encode($detalle);
    }

    public function actualizarEstadoSolicitud()
    {
        $id = _post('id');
        $status = _post('status');
        $id_asignar = _post('id_asignar');
        $response = $this->M_solicitud->actualizarEstadoSolicitud($id, $status, $id_asignar);
        echo json_encode(array('response'=>$response));
    }

    public function solicitudRechazada()
    {

        //print_r($this->sendMailGmail());
        //exit();

        

        $action = _post('action');
        if(isset($action) and  $action == 'obtenerSolicitudRechazada') {
            $asesor = _post('asesor');
            $id_asesor = _post('id_asesor');    
            if($asesor == ''){
                $id_asesor = '';
            }           
            
            $agencia = _post('agencia');
            $fecha_desde = _post('fecha_desde');
            $fecha_hasta = _post('fecha_hasta');
            $filtros = array(
                        'id_asesor' => $id_asesor,
                        'agencia' => $agencia,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerSolicitudRechazada($filtros);
            _logLastQuery();

            $data['id_asesor'] = $id_asesor;
            $data['asesor'] = $asesor;
            $data['id_agencia'] = $agencia;
            $data['desde'] = $fecha_desde;
            $data['hasta'] = $fecha_hasta;

            if($id_asesor == '' and $agencia == '')
            {
                $data['agencias'] = $this->M_agencia->getAgencias('reporte');
            }
            elseif($id_asesor == '' and $agencia != '')
            {
                $data['agencias'] = $this->M_agencia->getAgencias('agenciaByAgente', false);
            }
            else
            {
                $data['agencias'] = $this->M_agencia->getAgencias('agenciaByAgente', $agencia);
            }            

            $this->load->view('v_reporteSolicitudRechazada', $data);
        }
        else
        {        
            $data['agencias'] = $this->M_agencia->getAgencias('reporte');
            $this->load->view('v_reporteSolicitudRechazada', $data);
        }
    }

    public function solicitudesTotales()
    {
        $action = _post('action');
        if(isset($action) and  $action == 'obtenerSolicitudesTotales') {
            $asesor = _post('asesor');
            $id_asesor = _post('id_asesor');    
            if($asesor == ''){
                $id_asesor = '';
            }
            //$dni = _post('dni');
            $fecha_desde = _post('fecha_desde');
            $fecha_hasta = _post('fecha_hasta');
            $filtros = array(
                        //'dni' => $dni,
                        'id_asesor' => $id_asesor,
                        'fecha_desde' => $fecha_desde,
                        'fecha_hasta' => $fecha_hasta
                    );

            $data['solicitudes'] = $this->M_solicitud->obtenerSolicitudesTotales($filtros);
            //_log(print_r($data['solicitudes'], true));
            $data['id_asesor'] = $id_asesor;
            $data['asesor'] = $asesor;
            //$data['dni'] = $dni;
            $data['desde'] = $fecha_desde;
            $data['hasta'] = $fecha_hasta;

            $this->load->view('v_reporteSolicitudesTotales', $data);
        }
        else
        {        
            $this->load->view('v_reporteSolicitudesTotales', []);
        }
    }

    public function sendMailGmail()
    {
       //cargamos la libreria email de ci
       $this->load->library("email");
       
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465,
       'smtp_user' => 'miauto@prymera.pe',
       'smtp_pass' => '8hUpuv6da_@v',
       /*'smtp_host' => 'smtp.pepipost.com',
       'smtp_port' => 25,
       'smtp_user' => 'comparabien',
       'smtp_pass' => 'Compara123',*/
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       
       $this->email->from('danielestiphenbaezgaray@gmail.com');
       $this->email->to("daniel_bg19@hotmail.com");
       $this->email->subject('Bienvenido/a a uno-de-piera.com');
       $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
       $this->email->send();
       //con esto podemos ver el resultado
       var_dump($this->email->print_debugger());
     }

     function cambiarEstado() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $dato   = _post('dato');
            $arrayUpdt = array('status_sol' => 3);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $dato , 'solicitud');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
     }
    
}

