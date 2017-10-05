<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_marca extends CI_Controller {
    
    private $sueldo = null;
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('session');
        $this->load->library('table');
        $this->sueldo = 5000;
        
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['nombre'] = 'Jhonatan' /*_getSesion('nombre')*/;
        //_log(_getSesion('nombre'));
        //_log(_getSesion('dni'));
        $sueldo = $this->sueldo;
        $minPrestamo = null;
        $maxPrestamo = null;
        $iniRango    = null;
        $cantPago    = null;
        $sueldo != null ? $minPrestamo = $sueldo*0.4 : $minPrestamo = 5000;
        $sueldo != null ? $maxPrestamo = 2*($minPrestamo) : $minPrestamo = 2*($minPrestamo);
        $sueldo != null ? $iniRango = ($maxPrestamo+$minPrestamo)/2 : ($maxPrestamo+$minPrestamo)/2;
        $cantPago = $iniRango+$iniRango*0.3;
        
        $dato['iniRango'] = $iniRango;
        $dato['sueldoMin'] = $minPrestamo;
        $dato['sueldoMax'] = $maxPrestamo;
        $dato['cantPago']  = $cantPago;
        $dato['mensual']   = $iniRango*0.3;
        
        $this->load->view('V_marca', $dato);
    }
}

