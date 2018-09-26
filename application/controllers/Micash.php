<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Micash extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();

        $this->load->model('M_preaprobacion');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();
    }
    
    public function index() {

      $this->session->unset_userdata('nombre');
      $this->session->unset_userdata('apellido');
      $this->session->unset_userdata('dni');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('idPersona');
      $this->session->unset_userdata('importeMaximo');
      $this->session->unset_userdata('importeMinimo');
      $this->session->unset_userdata('plazos');
      $this->session->unset_userdata('pago_total');
      $this->session->unset_userdata('cuota_mensual');
      $this->session->unset_userdata('TCEA');
      $this->session->unset_userdata('tcea_sess');
      $this->session->unset_userdata('cant_meses');
      $this->session->unset_userdata('Importe');
      $this->session->unset_userdata('sess_tea');
      $this->session->unset_userdata('periodo');
      $this->session->unset_userdata('codigo_ver');
      $this->session->unset_userdata('salario');
      $this->session->unset_userdata('nro_celular');
      $this->session->unset_userdata('empleador');
      $this->session->unset_userdata('direccion_empresa');
      $this->session->unset_userdata('Departamento');
      $this->session->unset_userdata('Provincia');
      $this->session->unset_userdata('Distrito');
      $this->session->unset_userdata('Agencia');
      $this->session->unset_userdata('estado_civil');
      $this->session->unset_userdata('tipoCred'); //no borrar en vehicular

      //print_r($this->session->all_userdata());exit();

      $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_MICASH));
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = PRODUCTO_MICASH;
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
          $client = new SoapClient('http://52.204.72.89:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

           $params = array('token'     => 'E928EUXP',
                           'documento' =>_post('dni'),
                           'producto'  =>'01'
                           );

           //verificar la estructura
            $nombre        = _post('nombre');
            $apellido      = _post('apellido');
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

          $session = array('nombre'         => $nombre,
                           'apellido'       => $apellido,
                           'dni'            => $dni,
                           'email'          => $email,
                           'tipo_solicitud' => $res,
                           'importeMaximo'  => $importeMaximo,
                           'importeMinimo'  => $importeMinimo,
                           'tipo_producto'  => $tipo_producto,
                           'plazos'         => $plazos
                           );
            $this->session->set_userdata($session);
            //$agencia = $this->M_preaprobacion->getAgenciaPersonal(_getSesion('id_usuario'));
            $arrayInsert = array('id_usuario'     => _getSesion('id_usuario'),
                                 'nombre'         => $nombre,
                                 'apellido'       => $apellido,
                                 'email'          => $email,
                                 'dni'            => $dni,
                                 'id_tipo_prod'   => 1,
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
            //$agencia = $this->M_preaprobacion->getAgenciaPersonal(_getSesion('id_usuario'));
            $arrayInsert = array('id_usuario'    => _getSesion('id_usuario'),
                                'nombre'         => $nombre,
                                'apellido'       => $apellido,
                                'email'          => $email,
                                'dni'            => $dni,
                                'id_tipo_prod'   => 1,
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
          if($res == 2) {
            $response = array('status' => 2);
          }
        }
        catch(Exception $e) {
           $response = array('status' => 2);
        }
        echo json_encode($response);
    }
}
