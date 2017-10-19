<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logearse extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
    }
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_logearse', $dato);
    }
    
    function logear() {
        $data['error'] = EXIT_ERROR;
        try{
            $user        = __getTextValue('user');
            $password    = json_decode(__getTextValue('pass'));
            $remember    = json_decode(_post('check'));
            $check       = null;
            $nombre      = null;
            $nombreComp  = null;
            $rol         = null;
            ($remember == '0' ? $check = '0' : $check = '1');
            $datos = $this->M_preaprobacion->verificarDatos();
            if($user == null && $password == null) {
                $data['error'] = '<p style="font-size: 12px;color:#f44336;margin-right:-8px">
            				          <label style="float:left">Ingrese usuario y/o contrase&ntilde;a</label>
            				      </p>';
                $data['sw'] = 1;
            } else if($password == null) {
                $data['error']    = '<p style="font-size: 12px;color:#f44336;margin-right:-8px">
            				             <label style="float:left">Una contrase&ntilde;a es requerida</label>
            				         </p>';
                $data['sw'] = 2;
            } else if($user == $datos[0]->email && $password == $datos[0]->clave || $user == $datos[0]->rol && $password == $datos[0]->clave){
                //$ingreso = $this->M_usuario->getIngreso((trim($user)), $password);
                if($user == $datos[0]->email && $password == $datos[0]->clave) {
                    $nombre     = 'Jhonatan iberico';
                    $rol        = 'Usuario';
                    $nombreComp = 'Jhonatan iberico';
                    $data['url'] = '/C_main';
                }else if($user == $datos[0]->email && $password == $datos[0]->clave) {
                    $nombre     = 'Administrador';
                    $nombreComp = 'Administrador';
                    $rol        = 'Administrador';
                    $data['url'] = '/C_main';
                }
                $this->session->set_userdata(array('usuario'           => $user,
                                                    'password'          => '123',
                                                    'nombre_abvr'       => $nombre,
                                                    'nombre_completo'   => $nombreComp,
                                                    'flg_clave'         => 1,
                                                    'roles'             => $rol));
                $data['remember'] = $check;
                $data['error'] = EXIT_SUCCESS;
            }else if($user != $datos[0]->email && $password != $datos[0]->clave || $user != $datos[0]->rol && $password != $datos[0]->clave) {
                return;
            }
        }  catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function goToVehicular() {
        $data['error'] = EXIT_ERROR;
        try{
            $user        = __getTextValue('user');
            $password    = json_decode(__getTextValue('pass'));
            $remember    = json_decode(_post('check'));
            $session = array('user'            => $user,
                             'password'          => $password,
                             'TIPO_PROD'        =>PRODUCTO_VEHICULAR
                            );
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }  catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function goToMicash() {
        $data['error'] = EXIT_ERROR;
        try{
            $user     = __getTextValue('user');
            $password = json_decode(__getTextValue('pass'));
            $remember = json_decode(_post('check'));
            $session  = array('user'   => $user,
                             'password'=> $password,
                             'TIPO_PROD' =>PRODUCTO_MICASH
                             );
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }  catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function login()
    {
        $usuario = _post('usuario');
        $password = _post('password');
        $redirect = _post('redirect');

        if($usuario != '' and $password != '')
        {
            $datos = $this->M_usuario->login($usuario);
            if(count($datos)){
                if($datos[0]->estado == 1)
                {
                    if($this->validate_pass($datos[0]->password, $password))
                    {
                        $productos = explode(',', $datos[0]->permiso);
                        $this->session->set_userdata(array('usuario'          => $usuario,
                                                            'rol'             => $datos[0]->rol,
                                                            'id_usuario'      =>$datos[0]->id,
                                                            'nombre'          =>$datos[0]->nombre,
                                                            'nombreCompleto'          =>$datos[0]->nombre.' '.$datos[0]->apellido,
                                                            'id_agencia'          =>$datos[0]->id_agencia
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
                                $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_MICASH,
                                                                   'permiso_prod' => PERMISO_MICASH));
                                redirect('Micash');
                            }
                            else if($redirect == PERMISO_VEHICULAR)
                            {
                                $this->session->set_userdata(array('TIPO_PROD' =>PRODUCTO_VEHICULAR,
                                                                   'permiso_prod' => PERMISO_VEHICULAR));
                                redirect('Login');
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
                                redirect('C_reporteAsesor/agenteCliente');    
                            }
                        }
                            
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('error', 'Datos invalidos');
                        redirect('/');

                    }
                }
                else
                {
                        
                    $this->session->set_flashdata('error', 'Usuario desactivado');
                    redirect('/');

                }
            }
            else
            {
                    
                $this->session->set_flashdata('error', 'Datos invalidos');
                redirect('/');

            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Ingrese sus datos');
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
}

