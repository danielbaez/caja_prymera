<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash_resumen extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
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
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = _getSesion('nombre');
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['tea'] = _getSesion('sess_tea');
        _log(_getSesion('sess_tea'));
        $dato['Agencia'] = _getSesion('Agencia');
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
            if($agencia != null) {
                $session = array('Agencia' => $agencia);
                $this->session->set_userdata($session);
            }
            $this->sendMailGmail();
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function sendMailGmail(){
       //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       // 'smtp_host' => 'ssl://smtp.gmail.com',
       // 'smtp_port' => 465,
       // 'smtp_user' => 'daniel.baez@comparabien.com',
       // 'smtp_pass' => 'compara@daniel',
       'smtp_host' => 'smtp.pepipost.com',
       'smtp_port' => 25,
       'smtp_user' => 'comparabien',
       'smtp_pass' => 'Compara123',
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('daniel.baez@comparabien.com');
       $this->email->to(_getSesion('email'));
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $nombre = _getSesion('nombre');
       $this->email->message('
        <h1><strong>Mi Cash</strong></h1>
        <h4>'.$nombre.' Te damos la bienvenida a Prymera!</h4>
        <h4>A continuaci&oacute;n detallamos las condiciones del cr&eacute;dito “MI CASH” </h4>
        <h4>que solicitaste:</h4>

        <p>Monto: '._getSesion('pago_total').' </p>
        <p>Plazo: '._getSesion('cant_meses').'</p>
        <p>Cuota: '._getSesion('cuota_mensual').'</p>
        <p>TEA: '._getSesion('sess_tea').'</p>
        <p>TCEA: '._getSesion('TCEA').'</p>

        <h1><strong>Quiero desembolsar mi cr&eacute;dito pre aprobado &iquest;Qu&eacute; debo hacer?</strong></h1>
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
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
     }
}
