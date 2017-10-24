<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumen extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
        $this->load->model('M_preaprobacion');
    }

    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['marca'] = _getSesion('marca');
        $dato['modelo'] = _getSesion('modelo');
        $dato['valor_auto'] = _getSesion('valor_auto');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['cuota_inicial'] = _getSesion('cuota_inicial');
        $dato['tea'] = _getSesion('sess_tea');
        $dato['Agencia'] = _getSesion('Agencia');
        _log(_getSesion('Agencia'));
        $dato['comboAgencias'] = $this->__buildComboAgencias();
        $this->load->view('v_micash_resumen', $dato);
    }

    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->agencia));
            $opt .= '<option value="'.$agen.'"> '.$agen.'</option>';
        }
        return $opt;
    }

    function setearAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia = _post('agencia');
            $idPersona  = _getSesion('idPersona');
            if($agencia != null) {
                $session = array('Agencia' => $agencia);
                $this->session->set_userdata($session);
                $agencia = $this->M_preaprobacion->getAgenciasId($agencia);
                $arrayUpdt = array('agencia_desembolso' => $agencia[0]->id);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            }
            $validacion = $this->sendMailGmail();
            $celular = $this->enviarMail();
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function sendMailGmail(){
      $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
      try {  
          //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465,
       'smtp_user' => 'miauto@prymera.pe',
       'smtp_pass' => '8hUpuv6da_@v',
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       $poliza = null;
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('userauto@prymera.com');
       $this->email->to(_getSesion('email'));
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $nombre = _getSesion('nombre');
       $tipo_cred = null;
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Cr&eacute;dito Mi Cash' : $tipo_cred = 'Cr&eacute;dito Vehicular Auto de Prymera';
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $poliza = '' : $poliza = '<p>Seguro: '._getSesion('seguro').'</p>';
       $this->email->message('
        <h1><strong>'.$tipo_cred.'</strong></h1>
        <h4>'.ucfirst($nombre).' Te damos la bienvenida a Prymera!</h4>
        <h4>A continuaci&oacute;n detallamos las condiciones del '.$tipo_cred.' que solicitaste:</h4>

        <p>Importe del pr&eacute;stamo: '._getSesion('Importe').' </p>
        <p>Plazo: '._getSesion('cant_meses').'</p>
        <p>Cuota: '._getSesion('cuota_mensual').'</p>
        <p>TEA: '._getSesion('sess_tea').'</p>
        <p>TCEA: '._getSesion('TCEA').'</p>
        '.$poliza.'

        <h3><strong>Quiero gestionar mi cr&eacute;dito pre aprobado &iquest;Qu&eacute; debo hacer?</strong></h3>
        <p>Acércate a la agencia: “'._getSesion('Agencia').'” ubicada en '.$ubicacion.'.</p>

        <h3><strong>&iquest;Qu&eacute; debo presentar?</strong></h3>
        <p>- Tu DNI vigente </p>
        <p>- Un recibo de servicio (m&aacute;ximo 2 meses de antigüedad).</p>

        <h3><strong>¡M&aacute;s Beneficios para ti!</strong></h3>
        <p>Si deseas un cr&eacute;dito con un monto mayor al pre-aprobado, debes llevar tu &uacute;ltima boleta de </p>
        <p>pago para que podamos evaluarte.</p>

        <p>¡No pierdas la oportunidad de cumplir tus sueños, te esperamos!</p>

        <p>T&eacute;rminos y condiciones:” Seg&uacute;n lo especificado por legal”</p>
        ');
       $this->email->send();
       
      //_log(print_r($this->email->print_debugger(), true));
       $arrayUpdt = array('envio_email' => 1,);
       $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            $arrayUpdt = array('envio_email' => 2);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
            //$data['msj'] = $e->getMessage();
            //return json_encode(array_map('utf8_encode', array(1)));
      }
      return json_encode(array_map('utf8_encode', $data));
     }

     function enviarMail() {
      //_log('456');
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
          $tipo_cred = null;
        _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Mi Cash' : $tipo_cred = 'Vehicular';
          //twilio enviar msn
        $this->load->library('twilio');
        $from = '786-220-7333';
        $to = '+51 '._getSesion('nro_celular');
        $message = 'Su credito: '.$tipo_cred.' por '._getSesion('Importe').' a '._getSesion('cant_meses').'.Su cuota es '._getSesion('cuota_mensual').' Revise correo con condiciones';
        $response = $this->twilio->sms($from, $to, $message);
        _log(print_r($response, true));
        if($response->IsError) {
          $arrayUpdt = array('envio_sms' => 2);
          $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        }
        else {
              $arrayUpdt = array('envio_sms' => 1);
              $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
              $data['error'] = EXIT_ERROR;
            }    
        }catch (Exception $e){
          $data['error'] = EXIT_ERROR;
        }
      return json_encode(array_map('utf8_encode', $data));
    }
}

