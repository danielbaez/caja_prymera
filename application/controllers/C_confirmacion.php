<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_confirmacion extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['email']='jhiberico@hotmail.com';
        $this->load->view('v_confirmacion', $dato);
    }
    
    function enviarMail() {
        $to = "jhonatan.iberico@comparabien.com";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: jhonatan.iberico@comparabien.com" . "\r\n" .
                   "CC: jhonatan.iberico@comparabien.com";
        
        __enviarEmail($to,$subject,$txt);
    }
}

