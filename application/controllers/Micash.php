<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('M_preaprobacion');
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_micash', $dato);
    }
    
    public function solicitar() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;


        try 
          {
            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

           $params = array('token'=> 'E928EUXP',
                                  'documento'=>_post('dni'),
                                  'producto'=>'01'
                    );

          $nombre        = __getTextValue('nombre');
            $apellido      = __getTextValue('apellido');
            $dni           = _post('dni');
            $email         = _post('email');
            $agencia_user  = $this->M_preaprobacion->getAgencia(_getSesion('id_usuario'));
            $tipo_producto = PRODUCTO_MICASH;
            $check = _post('check');
           if($check == true) {
              $check = 1;//aceptó
           }else {
              $check = 2;//no aceptó
           }
          $result = $client->GetDatosCliente($params);
          //_log(print_r($result, true));
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $importeMinimo = $result->return->rango->importeMinimo;
            $importeMaximo = $result->return->rango->importeMaximo;
            $plazos = $result->return->rango->plazos;
            
            $response = array('status' => 1, 'documento' => $documento, 'rango' => $importeMinimo, 'importeMaximo' => $importeMaximo, 'url' => RUTA_CAJA.'Preaprobacion');

          $session = array('nombre'  => $nombre,
                'apellido'          => $apellido,
                'dni'               => $dni,
                'email'             => $email,
                'tipo_solicitud'    => $res,
                'importeMaximo'     => $importeMaximo,
                'importeMinimo'     => $importeMinimo,
                'tipo_producto'     => $tipo_producto,
                'plazos'            => $plazos
            );
            $this->session->set_userdata($session);
            //$agencia = $this->M_preaprobacion->getAgenciaPersonal(_getSesion('id_usuario'));
            $arrayInsert = array('id_usuario' => _getSesion('id_usuario'),
                                'nombre' => $nombre,
                                'apellido'  => $apellido,
                                'email'  => $email,
                                'dni'  => $dni,
                                'id_tipo_prod' => 1,
                                'fec_estado' => date("Y-m-d H:i:s"),
                                'check_autorizo'    => $check,
                                'ws_error'          => $res,
                                'ws_resultado'      => json_encode($result),
                                'ws_timestamp'        => date("Y-m-d H:i:s"),
                                'cod_agencia' => $agencia_user[0]->id_agencia
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');
            $this->session->set_userdata(array('idPersona' =>$datoInsert['idPers']));

          }
          if($res == 0){
            $session = array('nombre'  => $nombre,
                'apellido'          => $apellido,
                'dni'               => $dni,
                'email'             => $email,
                'tipo_solicitud'    => $res,
                'tipo_producto'     => $tipo_producto
            );
            $this->session->set_userdata($session);
            //$agencia = $this->M_preaprobacion->getAgenciaPersonal(_getSesion('id_usuario'));
            $arrayInsert = array('id_usuario' => _getSesion('id_usuario'),
                                'nombre' => $nombre,
                                'apellido'  => $apellido,
                                'email'  => $email,
                                'dni'  => $dni,
                                'id_tipo_prod' => 1,
                                'fec_estado' => date("Y-m-d H:i:s"),
                                'check_autorizo'    => $check,
                                'ws_error'          => $res,
                                'ws_resultado'      => json_encode($result),
                                'ws_timestamp'        => date("Y-m-d H:i:s"),
                                'cod_agencia'        => $agencia_user[0]->id_agencia
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');
            $this->session->set_userdata(array('idPersona' =>$datoInsert['idPers']));
            $response = array('status' => 0, 'url' => RUTA_CAJA.'C_losentimos');
          }
          if($res == 2){
            $response = array('status' => 2);
          }

        }
        catch(Exception $e)
        {
           $response = array('status' => 2);
        }
        echo json_encode($response);
    }
}
