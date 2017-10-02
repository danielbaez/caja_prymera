<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logearse extends CI_Controller {
    
    public function index()
    {
        $dato['nombreDato']=':D';
        $this->load->view('v_login', $dato);
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
}

