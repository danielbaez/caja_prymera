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
            } else if($user == 'usuario' && $password == '123' || $user == 'administrador' && $password == '123'){
                //$ingreso = $this->M_usuario->getIngreso((trim($user)), $password);
                if($user == 'usuario' && $password == '123') {
                    $nombre     = 'Jhonatan iberico';
                    $rol        = 'Usuario';
                    $nombreComp = 'Jhonatan iberico';
                    $data['url'] = RUTA_CAJA.'C_main';
                }else if($user == 'administrador' && $password == '123') {
                    $nombre     = 'Administrador';
                    $nombreComp = 'Administrador';
                    $rol        = 'Administrador';
                    $data['url'] = RUTA_CAJA.'C_main';
                }
                $this->session->set_userdata(array('usuario'           => $user,
                                                    'password'          => '123',
                                                    'nombre_abvr'       => $nombre,
                                                    'nombre_completo'   => $nombreComp,
                                                    'flg_clave'         => 1,
                                                    'roles'             => $rol));
                $data['remember'] = $check;
                $data['error'] = EXIT_SUCCESS;
            }else if($user != 'usuario' && $password != '123' || $user != 'administrador' && $password != '123') {
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
}

