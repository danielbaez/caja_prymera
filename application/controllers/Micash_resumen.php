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
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = _getSesion('nombre');
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['tea'] = _getSesion('sess_tea');
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
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}

