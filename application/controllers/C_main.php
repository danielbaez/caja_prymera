<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->model('M_agencia');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();
    }
    
    public function index()
    {
        $data['nombre']         = _getSesion("nombre");
        $data['comboAgencias']  = $this->__buildComboAgencias();
        $id                     = _getSesion('id_usuario');
        $rol                    = _getSesion('rol');
        $data['personales']     = $this->M_usuario->getPersonal($id, $rol);
        $data['superiores']     = $this->M_usuario->getSuperiores();
        $data['agencias']       = $this->M_agencia->getAgencias();
        $this->load->view('v_editarPerfiles', $data);
    }

    function registrar() {

        $action           = _post('action');
        $nombres          = _post('nombres');
        $apellidos        = _post('apellidos');
        $sexo             = _post('sexo');
        $fecha_nacimiento = _post('fecha_nacimiento');
        $dni              = _post('dni');
        $fecha_ingreso    = _post('fecha_ingreso');
        $celular          = _post('celular');
        $email            = _post('email');
        $rol              = _post('rol');
        $rol_superior     = _post('rol_superior');
        $checkPermiso     = _post('permiso');
        $estado     = _post('estado');
        //$agencia          = _post('agencia');
        
        /*$datos_agencia = $this->M_usuario->getDatosById('agencias', 'id_sup_agencia', $rol_superior);
        
        $agencia = $datos_agencia[0]->id;*/
        /*_log(print_r($agencia, true));
        return;*/
        if($_FILES["imagen"]["name"]){
            $img_file   = $_FILES["imagen"]["name"];
            $folderName = "public/img/usuarios/";

            $array = explode('.', $_FILES['imagen']['name']);
            $ext   = end($array);
            // Generate a unique name for the image 
            // to prevent overwriting the existing image
            $name_image = rand(10000, 990000). '_'. time().'.'.$ext;
            $filePath = $folderName.$name_image;
            if ( move_uploaded_file( $_FILES["imagen"]["tmp_name"], $filePath)) {
            } else {
            }
        }
        else
        {
            $name_image = '';
        }
        if($action == 'save')
        {
            $permiso = implode(",",$checkPermiso);
            if($rol == 'jefe_agencia')
            {
                $arrayInsert = array('nombre' => $nombres,
                                     'apellido'  => $apellidos,
                                     'email'  => $email,
                                     'password' => $this->get_hash($dni),
                                     'dni'  => $dni,
                                     'sexo' => $sexo,
                                     'fecha_nac' => $fecha_nacimiento,
                                     'fecha_ingreso'    => $fecha_ingreso,
                                     'celular'          => $celular,
                                     'rol'              => $rol,
                                     'permiso'          => $permiso,
                                     'estado'           => $estado,
                                     'imagen'           => $name_image
                                    );
              $this->M_usuario->crearUsuario($arrayInsert, 'usuario', false);  
            }
            elseif($rol == 'asesor' || $rol == 'asesor_externo')
            {
                $arrayInsert = array('nombre' => $nombres,
                                     'apellido'  => $apellidos,
                                     'email'  => $email,
                                     'password' => $this->get_hash($dni),
                                     'dni'  => $dni,
                                     'sexo' => $sexo,
                                     'fecha_nac' => $fecha_nacimiento,
                                     'fecha_ingreso'    => $fecha_ingreso,
                                     'celular'          => $celular,
                                     'rol'              => $rol,
                                     //'permiso'          => $permiso,
                                     'estado'           => $estado,
                                     'imagen'           => $name_image,
                                     //'id_agencia' => $agencia
                                    );
              $this->M_usuario->crearUsuario($arrayInsert, 'usuario', false);  
            }
            $this->session->set_flashdata('msg', 'Se creo el usuario correctamente');
        }

        if($action == 'update')
        {
            $password  = trim(_post('password'));
            $rol_user  = _post('rol_user');
            $id_usuario = _post('id_usuario');
            if($rol_user == 'administrador')
            {
                if(!$rol) { //administrador
                    $arrayUpdate = array('nombre'        => $nombres,
                                         'apellido'      => $apellidos,
                                         'email'         => $email,
                                         'password'      => $this->get_hash($password),
                                         'dni'           => $dni,
                                         'sexo'          => $sexo,
                                         'fecha_nac'     => $fecha_nacimiento,
                                         'fecha_ingreso' => $fecha_ingreso,
                                         'celular'       => $celular,
                                         'imagen'        => $name_image,
                                         'estado'        => $estado
                                        );    
                    if($name_image == '') {
                        unset($arrayUpdate['imagen']);
                    }
                    if($password == '') {
                        unset($arrayUpdate['password']);
                    }
                    $this->M_usuario->actualizarUsuario($arrayUpdate, 'usuario', false, $id_usuario);  
                }
                elseif($rol == 'jefe_agencia') {
                    $permiso     = implode(",",$checkPermiso);
                    $userr = $this->M_usuario->getLoginById($id_usuario);
                    if($userr[0]->rol == 'asesor' || $userr[0]->rol == 'asesor_externo')
                    {
                        $arrayUpdate = array('nombre'        => $nombres,
                                         'apellido'      => $apellidos,
                                         'email'         => $email,
                                         'password'      => $this->get_hash($password),
                                         'dni'           => $dni,
                                         'sexo'          => $sexo,
                                         'fecha_nac'     => $fecha_nacimiento,
                                         'fecha_ingreso' => $fecha_ingreso,
                                         'celular'       => $celular,
                                         'rol'           => $rol,
                                         'permiso'       => $permiso,
                                         'estado'        => $estado,
                                         'imagen'        => $name_image,
                                         'id_agencia'    => NULL
                                        );
                    }
                    elseif($userr[0]->rol == 'jefe_agencia')
                    {
                        $arrayUpdate = array('nombre'        => $nombres,
                                         'apellido'      => $apellidos,
                                         'email'         => $email,
                                         'password'      => $this->get_hash($password),
                                         'dni'           => $dni,
                                         'sexo'          => $sexo,
                                         'fecha_nac'     => $fecha_nacimiento,
                                         'fecha_ingreso' => $fecha_ingreso,
                                         'celular'       => $celular,
                                         'rol'           => $rol,
                                         'permiso'       => $permiso,
                                         'estado'        => $estado,
                                         'imagen'        => $name_image,
                                         'id_agencia'    => NULL
                                        );
                        $per = array('permiso' => $permiso);

                        $this->M_usuario->actualizarPermisoAgentesByJefe($per, 'usuario', $id_usuario);
                    }
                      
                    if($name_image == '') {
                        unset($arrayUpdate['imagen']);
                    }
                    if($password == '') {
                        unset($arrayUpdate['password']);
                    }
                    $this->M_usuario->actualizarUsuario($arrayUpdate, 'usuario', false, $id_usuario);  
                }
                elseif($rol == 'asesor' || $rol == 'asesor_externo') {


                    $userr = $this->M_usuario->getLoginById($id_usuario);
                    if($userr[0]->rol == 'asesor' || $userr[0]->rol == 'asesor_externo')
                    {
                        $permiso = implode(",",$checkPermiso);
                        $arrayUpdate = array('nombre'        => $nombres,
                                         'apellido'      => $apellidos,
                                         'email'         => $email,
                                         'password'      => $this->get_hash($password),
                                         'dni'           => $dni,
                                         'sexo'          => $sexo,
                                         'fecha_nac'     => $fecha_nacimiento,
                                         'fecha_ingreso' => $fecha_ingreso,
                                         'celular'       => $celular,
                                         'rol'           => $rol,                                      
                                         'estado'        => $estado,
                                         'imagen'        => $name_image
                                        );
                    }
                    elseif($userr[0]->rol == 'jefe_agencia')
                    {
                        $permiso = implode(",",$checkPermiso);
                        $arrayUpdate = array('nombre'        => $nombres,
                                         'apellido'      => $apellidos,
                                         'email'         => $email,
                                         'password'      => $this->get_hash($password),
                                         'dni'           => $dni,
                                         'sexo'          => $sexo,
                                         'fecha_nac'     => $fecha_nacimiento,
                                         'fecha_ingreso' => $fecha_ingreso,
                                         'celular'       => $celular,
                                         'rol'           => $rol,
                                         'permiso'       => NULL,                                         
                                         'estado'        => $estado,
                                         'imagen'        => $name_image,
                                         'id_agencia'    => NULL
                                        );
                    }

                    
                    if($name_image == '') {
                        unset($arrayUpdate['imagen']);
                    }
                    if($password == '') {
                        unset($arrayUpdate['password']);
                    }
                    $this->M_usuario->actualizarUsuario($arrayUpdate, 'usuario', false, $id_usuario); 
                }
            }
            if($rol_user == 'jefe_agencia') {
                $arrayUpdate = array('password' => $this->get_hash($password));
                if($password == '') {
                    unset($arrayUpdate['password']);
                }
                $this->M_usuario->actualizarUsuario($arrayUpdate, 'usuario', false, $id_usuario);
            }
            $this->session->set_flashdata('msg', 'Se actualizo el usuario correctamente');
        }
        redirect('/C_main');
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

    function getDatosPers() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $rol     = _post('rol');
            $nombre  = _post('nombre');
            $agencia = _post('agencia');
            if($rol == 'administrador') {
                $datos = $this->M_preaprobacion->getDatosPersByRol($rol, $nombre, null);
            }
            $id_agencia            = $this->M_preaprobacion->getidByAgencia($agencia);
            _log(print_r($id_agencia, true));
            return;
            $datos                 = $this->M_preaprobacion->getDatosPersByRol($rol, $nombre, $id_agencia[0]->id);
            $data['dni']           = $datos[0]->dni;
            $data['nombre']        = $datos[0]->nombre;
            $data['fecha_nac']     = $datos[0]->fecha_nac;
            $data['sexo']          = $datos[0]->sexo;
            $data['fecha_ingreso'] = $datos[0]->fecha_ingreso;
            $data['celular']       = $datos[0]->celular;
            $data['email']         = $datos[0]->email;
            $data['apellido']      = $datos[0]->apellido;
            $data['rol']           = $datos[0]->rol;
            $data['error']         = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt      = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->agencia));
            $opt .= '<option data-tokens="'.$agen.'"> '.$agen.'</option>';
        }
        return $opt;
    }

    function verificarRol() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $rol   = _post('rol');
            $datos = $this->M_preaprobacion->verificarDatos($rol);
            $data['nombre_complet'] = $datos['0']->nombres;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function updateDatos() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $rol   = _post('rol');
            $datos = $this->M_preaprobacion->verificarDatos($rol);
            $data['nombre_complet'] = $datos['0']->nombres;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function actualizarDatos() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $nombres          = _post('nombres');
            $apellidos        = _post('apellidos');
            $sexo             = _post('sexo');
            $fecha_nacimiento = _post('fecha_nacimiento');
            $dni              = _post('dni');
            $fecha_ingreso    = _post('fecha_ingreso');
            $celular          = _post('celular');
            $email            = _post('email');
            $rol              = _post('rol');
            $rol_superior     = _post('rol_superior');
            $agencia          = _post('agencia');
            $nombre_img       = _post('nombre_img');
            $id = $this->M_preaprobacion->getDatosPersByRol($rol, $nombres, null);
            $arrayUpdt = array('celular'       => $celular,
                               'nombre'        => $nombres,
                               'sexo'          => $sexo,
                               'fecha_nac'     => $fecha_nacimiento,
                               'dni'           => $dni,
                               'fecha_ingreso' => $fecha_ingreso,
                               'email'         => $email,
                               'usuario'       => $email,
                               'rol'           => $rol,
                               'imagen'        => $nombre_img,
                               'apellido'      => $apellidos);
         $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$id[0]->id , 'usuario');
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }   

    function getAgencias() {
        $id     = _post('id');
        $action = _post('action');
        $this->load->model('M_agencia');
        $agencias = $this->M_agencia->getAgenciasBySup($id, $action);
        echo json_encode($agencias);
    }

    function getDefaultAgencias() {
        $this->load->model('M_agencia');
        $agencias = $this->M_agencia->getAgenciasDefault();
        echo json_encode($agencias);
    } 
}

