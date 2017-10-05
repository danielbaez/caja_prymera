<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('M_preaprobacion');
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
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

          $result = $client->GetDatosCliente($params);
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $importeMinimo = $result->return->rango->importeMinimo;
            $importeMaximo = $result->return->rango->importeMaximo;
            $plazos = $result->return->rango->plazos;
            
            $response = array('status' => 1, 'documento' => $documento, 'rango' => $importeMinimo, 'importeMaximo' => $importeMaximo, 'url' => RUTA_CAJA.'Preaprobacion');

            $nombre        = __getTextValue('nombre');
            $apellido      = __getTextValue('apellido');
            $dni           = _post('dni');
            $email         = _post('email');
            $tipo_producto = PRODUCTO_MICASH;

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
            $arrayInsert = array('nombre' => $nombre,
                'apellido'  => $apellido,
                'email'  => $email,
                'dni'  => $dni
            );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'usuario');
            $this->session->set_userdata(array('idPersona' =>$datoInsert['idPers']));

          }
          if($res == 0){
            $response = array('status' => 0, 'url' => RUTA_CAJA.'Micash_losentimos');
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
