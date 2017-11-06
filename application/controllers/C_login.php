<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');

        $this->load->helper("access_helper");
        is_logged();
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_login', $dato);
    }
    
    public function solicitar() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $json_service  = '{"tipo": "A","Nombre": "juan","cantidad_max": 3000}';
            $nombre        = _post('nombre');
            $apellido      = _post('apellido');
            $dni           = _post('dni');
            $email         = _post('email');
            $newdata       = array();
            $tipo_producto = PRODUCTO_MICASH;
            if($dni == null || $dni == '') {
                throw new Exception('Ingrese su DNI');
            }
            if(strlen($dni) != 8) {
                throw new Exception('El DNI debe contener 8 caracteres');
            }
            $json = json_decode($json_service);
            $session = array('nombre'            => $nombre,
                             'apellido'          => $apellido,
                             'dni'               => $dni,
                             'email'             => $email,
                             'tipo_solicitud'    => $json->tipo,
                             'cantidad'          => $json->cantidad_max,
                             'tipo_producto'     => $tipo_producto
            );
            $this->session->set_userdata($session);
            if($dni == null) {
                throw new Exception('Ingrese su DNI');
            }else {
                if($json->tipo == 'A') {
                    if($tipo_producto == PRODUCTO_MICASH) {
                        $data['url'] = RUTA_CAJA.'c_preaprobacion';
                    }else {
                        $data['url'] = RUTA_CAJA.'c_marca';
                    }
                }else if($json->tipo == 'B') {
                    $data['url'] = RUTA_CAJA.'c_losentimos';
                }else if($json->tipo == 'C') {
                    $data['url'] = RUTA_CAJA.'c_noencontrado';
                }
            }
            $arrayInsert = array('id_usuario' => _getSesion('id_usuario'),
                                'nombre' => $nombre,
                                'apellido'  => $apellido,
                                'email'  => $email,
                                'dni'  => $dni,
                                'id_tipo_prod' => _getSesion('permiso_prod'),
                                'fec_estado' => date("Y-m-d H:i:s"),
                                'check_autorizo'    => $check,
                                'ws_error'          => $res,
                                'ws_resultado'      => json_encode($result),
                                'ws_timestamp'        => date("Y-m-d H:i:s"),
                                'cod_agencia'        => $agencia_user[0]->id_agencia
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}
