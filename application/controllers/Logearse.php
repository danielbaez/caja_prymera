<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logearse extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');

        $this->load->helper("access_helper");
        //access_helper::is_logged_in();
        //checkIfLoggedIn($this->session->userdata('logged'));
        is_logged();
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_logearse', $dato);
    }
    
    function login()
    {
        $usuario = _post('usuario');
        $password = _post('password');
        $redirect = _post('redirect');

        if($usuario != '' and $password != '')
        {
            $datos = $this->M_usuario->login($usuario);
            if(count($datos))
            {
                if($this->validate_pass($datos[0]->password, $password))
                {
                    $rr = $this->M_usuario->verifyUserIPTime($datos[0]);
                    if(!$rr['error'])
                    {
                        $productos = explode(',', $datos[0]->permiso);
                        $this->session->set_userdata(array('usuario'          => $usuario,
                                                            'rol'             => $datos[0]->rol,
                                                            'id_usuario'      =>$datos[0]->id,
                                                            'nombre'          =>$datos[0]->nombre,
                                                            'nombreCompleto'          =>$datos[0]->nombre.' '.$datos[0]->apellido,
                                                            'id_agencia'          =>$datos[0]->id_agencia,
                                                            'permiso'          =>$productos,
                                                            'logged' => true
                                                            ));
                                                                          
                        if(in_array($redirect, $productos))
                        {
                            if($redirect == PERMISO_ADMINISTRADOR)
                            {
                                if($datos[0]->rol == 'administrador')
                                {
                                    redirect('C_main');    
                                }
                                elseif($datos[0]->rol == 'jefe_agencia')
                                {
                                    redirect('C_reporte/solicitudes');    
                                }
                                elseif($datos[0]->rol == 'asesor')
                                {
                                    redirect('C_reporteAsesor/agenteCliente');    
                                }
                                
                            }
                            else if($redirect == PERMISO_MICASH)
                            {
                                if($datos[0]->rol == 'administrador')
                                {
                                    redirect('C_main');    
                                }
                                elseif($datos[0]->rol == 'jefe_agencia')
                                {
                                    redirect('C_reporte/solicitudes');    
                                }
                                elseif($datos[0]->rol == 'asesor' || $datos[0]->rol == 'asesor_externo')
                                {
                                    $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_MICASH,
                                                                   'permiso_prod' => PERMISO_MICASH,
                                                                    'conectado'   => 1));
                                    redirect('Micash');   
                                }                               
                                
                            }
                            else if($redirect == PERMISO_VEHICULAR)
                            {
                                if($datos[0]->rol == 'administrador')
                                {
                                    redirect('C_main');    
                                }
                                elseif($datos[0]->rol == 'jefe_agencia')
                                {
                                    redirect('C_reporte/solicitudes');    
                                }
                                elseif($datos[0]->rol == 'asesor' || $datos[0]->rol == 'asesor_externo')
                                {
                                    $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_VEHICULAR,
                                                                   'permiso_prod' => PERMISO_VEHICULAR,
                                                                    'conectado'   => 1));
                                    redirect('Vehicular');   
                                }
                            }
                        }
                        else
                        {
                            if($datos[0]->rol == 'administrador')
                            {
                                redirect('C_main');    
                            }
                            elseif($datos[0]->rol == 'jefe_agencia')
                            {
                                redirect('C_reporte/solicitudes');    
                            }
                            elseif($datos[0]->rol == 'asesor')
                            {
                                //redirect('C_reporteAsesor/agenteCliente');
                                redirect('C_usuario/nuevaSolicitud');     
                            }
                            elseif($datos[0]->rol == 'asesor_externo')
                            {
                                redirect('C_usuario/nuevaSolicitud');    
                            }
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('error', $rr['error']);
                        redirect('/');
                    }                            
                }
                else
                {
                    $this->session->set_flashdata('error', 'Datos inv&aacute;lidos');
                    redirect('/');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Datos inv&aacute;lidos');
                redirect('/');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Ingresa tus datos');
                redirect('/');
        }
       
    }

    function get_hash($password, $cost = 11) {
        // Genera sal de forma aleatoria
        $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
        // reemplaza caracteres no permitidos
        $salt=str_replace("+",".",$salt);
        // genera una cadena con la configuración del algoritmo
        $param='$'.implode('$',array(
                "2y", // versión más segura de blowfish (>=PHP 5.3.7)
                str_pad($cost,2,"0",STR_PAD_LEFT), // costo del algoritmo
                $salt // añade la sal
        ));
       
        // obtiene el hash de la contraseña
        return crypt($password,$param);
    }

    function validate_pass($hash, $pass) {
        // verifica la contraseña con el hash
        return crypt($pass, $hash) == $hash;
    }

    function olvidoPassword(){

        $this->load->view('v_recuperarPassword', []);
    }

    function recuperarPass() {
        $data['error'] = EXIT_ERROR;
        $data['msj'] = "";
        try{
            $email = _post('email');
            if($email == null) {
                throw new Exception("Ingrese su correo electr&oacute;nico", 1);
            }
            $id_pers = $this->M_usuario->getIdRecuperarPassword($email);
            if($id_pers == null || $id_pers == '') {
                throw new Exception("No se encontr&oacute; su usuario o correo electr&oacute;nico", 1);
                
            }
            $session = array('id_pers_recuperar' => $id_pers[0]->id,
                             'fecha_recupear' => date("Y-m-d"),
                             'estado_recuperar' => 1);
            $this->session->set_userdata($session);
            $arrayUpdt = array('estado_recuperar' => 1,
                                'fecha_recuperar' => date("Y-m-d"));
            $this->M_usuario->updateDatosAsesor($arrayUpdt,$id_pers[0]->id , 'usuario');
            $id_encrypt = base64_encode($id_pers[0]->id);
            $validacion = $this->sendMailGmail($email, $id_encrypt);
            $data['error'] = EXIT_SUCCESS;
        }  catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function encrypt($text) 
        { 
            return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
        } 

    function sendMailGmail($email, $id_encrypt){
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
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $this->email->from('userauto@prymera.com');
       $this->email->to($email);
       $this->email->subject('Bienvenido/a a Caja Prymera-Restaurar Contraseña');
       $this->email->message('
        <h1><strong>Restaurar Contrase&ntilde;a</strong></h1>
        <h4>Te damos la bienvenida a Prymera!</h4>
        <h4>A continuaci&oacute;n te enviamos un enlace para que puedas cambiar tu contrase&ntilde;a</h4>

        <p>'._getSesion('nombreCompleto').': <a href="http://prymeracreditos-env.efwrzdgyhk.us-east-1.elasticbeanstalk.com/C_cambiarPassword/?a='.$id_encrypt.'">cambia tu contrase&ntilde;a aqu&iacute;</a></p>
        ');
       $this->email->send();
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            //$data['msj'] = $e->getMessage();
            //return json_encode(array_map('utf8_encode', array(1)));
      }
      return json_encode(array_map('utf8_encode', $data));
     }
}

