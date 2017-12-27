<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicular extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->helper("access_helper");
        is_logged();
    }
    
    public function index() {
      _log(_getSesion('tipoCred'));
        $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_VEHICULAR));
        $dato['tipo_producto'] = PRODUCTO_VEHICULAR;
        $this->load->view('v_vehicular', $dato);
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

           $params = array('token'     => 'E928EUXP',
                           'documento' =>_post('dni'),
                           'producto'  =>'02'
                          );
            $nombre        = _post('nombre');
            $apellido      = _post('apellido');
            $dni           = _post('dni');
            $email         = _post('email');
            $tipo_producto = PRODUCTO_VEHICULAR;
            $agencia_user  = $this->M_preaprobacion->getAgencia(_getSesion('id_usuario'));
            $check = _post('check');
           if($check == true) {
              $check = 1;//aceptó
           }else {
              $check = 2;//no aceptó
           }
          $result = $client->GetDatosCliente($params);
          $res = $result->return->resultado;
          if($res == 1) {
            $documento = $result->return->documento;
            $importeMinimo = $result->return->rango->importeMinimo;
            $importeMaximo = $result->return->rango->importeMaximo;
            $arr = (array)$result->return;
            $arrDatos = [];
            foreach ($arr as $key => $value) {
              if($key == 'rango'){
                $value->plazos = explode(';', $value->plazos); 
                $arrDatos[] = array('importeMinimo' => $value->importeMinimo, 'importeMaximo' => $value->importeMaximo, 'plazo' => $value->plazos);
              }
            }
            $plazos = $result->return->rango->plazos;
            if(_getSesion('tipoCred') == 'camp') {
              $response = array('status' => 1, 'documento' => $documento, 'rango' => $importeMinimo, 'importeMaximo' => $importeMaximo, 'url' => RUTA_CAJA.'C_preaprobacion');
            }else if(_getSesion('tipoCred') == 'eva'){
              $response = array('status' => 1, 'documento' => $documento, 'rango' => $importeMinimo, 'importeMaximo' => $importeMaximo, 'url' => RUTA_CAJA.'C_campaign');
            }
          $session = array('nombre'         => $nombre,
                           'apellido'       => $apellido,
                           'dni'            => $dni,
                           'email'          => $email,
                           'tipo_solicitud' => $res,
                           'importeMaximo'  => $importeMaximo,
                           'importeMinimo'  => $importeMinimo,
                           'tipo_producto'  => $tipo_producto,
                           'plazos'         => $plazos,
                           'arrDatos'       => $arrDatos
                          );
            $this->session->set_userdata($session);
            $arrayInsert = array('id_usuario'     => _getSesion('id_usuario'),
                                 'nombre'         => $nombre,
                                 'apellido'       => $apellido,
                                 'email'          => $email,
                                 'dni'            => $dni,
                                 'id_tipo_prod'   => 2,
                                 'fec_estado'     => date("Y-m-d H:i:s"),
                                 'check_autorizo' => $check,
                                 'ws_error'       => $res,
                                 'ws_resultado'   => json_encode($result),
                                 'ws_timestamp'   => date("Y-m-d H:i:s"),
                                 'cod_agencia'    => $agencia_user[0]->id_agencia,
                                 'last_page'      => N_SIMULADOR,
                                 'status_sol'     => 5//incompleto
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');
            $this->session->set_userdata(array('idPersona' =>$datoInsert['idPers']));
          }
          if($res == 0) {
            $session = array('nombre'         => $nombre,
                             'apellido'       => $apellido,
                             'dni'            => $dni,
                             'email'          => $email,
                             'tipo_solicitud' => $res,
                             'tipo_producto'  => $tipo_producto
                            );
            $this->session->set_userdata($session);
            $arrayInsert = array('id_usuario'     => _getSesion('id_usuario'),
                                 'nombre'         => $nombre,
                                 'apellido'       => $apellido,
                                 'email'          => $email,
                                 'dni'            => $dni,
                                 'id_tipo_prod'   => 2,
                                 'fec_estado'     => date("Y-m-d H:i:s"),
                                 'check_autorizo' => $check,
                                 'ws_error'       => $res,
                                 'ws_resultado'   => json_encode($result),
                                 'ws_timestamp'   => date("Y-m-d H:i:s"),
                                 'cod_agencia'    => $agencia_user[0]->id_agencia,
                                 'last_page'      => N_INGRESO_DATOS_RECHAZADO,
                                 'status_sol'      => 2//RECHAZADO
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
