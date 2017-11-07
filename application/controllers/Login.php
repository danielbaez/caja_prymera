<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
    }

    public function sendMailGmail()
    {
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
       
       $this->email->from('daniel.baez@comparabien.com');
       $this->email->to("daniel_bg19@hotmail.com");
       $this->email->subject('Bienvenido/a a uno-de-piera.com');
       $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
       $this->email->send();
       //con esto podemos ver el resultado
       var_dump($this->email->print_debugger());
     }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("TIPO_PROD");
        $this->load->view('v_login', $dato);


        //$this->sendMailGmail(); 

        //twilio enviar msn
        /*$this->load->library('twilio');
        $from = '786-220-7333';
        $to = '+51 968 820 382';
        $message = 'This is a testdqwdqwd qwdqw...';
        $response = $this->twilio->sms($from, $to, $message);
        print_r($response);
        if($response->IsError)
          exit('Error: ' . $response->ErrorMessage);
        else
          exit('Sent message to ' . $to);*/

    }
    
}
