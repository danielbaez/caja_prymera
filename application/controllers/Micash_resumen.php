<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class micash_resumen extends CI_Controller {
    
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
        $this->load->view('v_micash_resumen', $dato);
    }
}

