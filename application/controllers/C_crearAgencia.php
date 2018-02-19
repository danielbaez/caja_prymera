<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_crearAgencia extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->model('M_agencia');
        $this->load->helper("url");
    }
    
    public function index()
    {
        $data['acceso']         = 1;
        $data['nombre']         = _getSesion("nombre");
        $data['comboAgencias']  = $this->__buildComboAgencias();
        $id                     = _getSesion('id_usuario');
        $rol                    = _getSesion('rol');
        $data['allAgencias']    = $this->M_usuario->getDatosAgencia();
        $data['jefe_agencia']   = $this->M_usuario->getJefeAgencia();
        //$data['agencias']       = $this->M_agencia->getAgencias();
        $this->load->view('v_crearAgencia', $data);
    }

    /*function registrar() {

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
        $agencia          = _post('agencia');
        
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
                                     'estado'           => 1,
                                     'imagen'           => $name_image
                                    );
              $this->M_usuario->crearUsuario($arrayInsert, 'usuario', $agencia);  
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
                                     'permiso'          => $permiso,
                                     'estado'           => 1,
                                     'imagen'           => $name_image,
                                     'id_agencia' => $agencia[0]
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
                                         'imagen'        => $name_image
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
                                         'estado'        => in_array(0, $checkPermiso) ? 0 : 1,
                                         'imagen'        => $name_image,
                                         'id_agencia'    => NULL
                                        );  
                    if($name_image == '') {
                        unset($arrayUpdate['imagen']);
                    }
                    if($password == '') {
                        unset($arrayUpdate['password']);
                    }
                    $this->M_usuario->actualizarUsuario($arrayUpdate, 'usuario', $agencia, $id_usuario);  
                }
                elseif($rol == 'asesor' || $rol == 'asesor_externo') {
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
                                         'permiso'       => $permiso,
                                         'estado'        => in_array(0, $checkPermiso) ? 0 : 1,
                                         'imagen'        => $name_image,
                                         'id_agencia'    => $agencia[0]
                                        );
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
    }*/

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

    function setearDatos() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id      = _post('id');
            $agencia = _post('agencia');
            $correo  = "";
            $html = "";
            $text = "";
            $i = 1;
            $x = 1;
            $datos   = $this->M_usuario->getDatosById('agencias', 'id', $id);
            $ip   = $this->M_usuario->getDatosById('acceso', 'id_agencia', $id);
            //_log(print_r($ip[0]->ip, true));
            $data['direccion'] = $datos[0]->UBICACION;
            $data['id_sup']    = $datos[0]->id_sup_agencia;
            $data['ip']        = $datos[0]->ip;
            $data['switch']    = $ip[0]->ip;
            foreach (explode(',', $datos[0]->TELEFONO) as $row) {
                if($x == 1) {
                    $data['telef_val'] = $row;
                }else if($x > 1) {
                    if($row != null || $row != '') {
                         $text .= '</br><div class="form-group">'.
                        '<input type="text" class="form-control remove" value="'.$row.'" onkeypress="return valida(event)" id="telefonos'.$x.'" name="telefonos[]" maxlength="7" placeholder="Teléfono"/>'.
                        '</div>';
                    }
                }
                $x++; 
                //_log($x);
            }
            $correos = $this->M_usuario->getDatosByIdCorreo('correos', 'AGENCIA', $agencia);
            foreach ($correos as $key) {
                $data['data_correos'] = $key->correos;
                foreach (explode(' , ', $key->correos) as $values) {
                    if($i == 1) {
                        $data['correo_val'] = $values;
                    }else if($i > 1) {
                        $html .= '</br><div class="form-group">'.
                        '<input type="text" class="form-control remove" value="'.$values.'" id="correos'.$i.'" name="correos[]" placeholder="Correo de la agencia" onkeypress="" maxlength="200">'.
                        '</div>';
                    }
                    $i++;
                }
            }
            $data['telefonos'] = $text;
            $data['correos']   = $html;
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function eliminarAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia = _post('agencia');
            $id      = $this->M_usuario->getIdByNombre('agencias', 'AGENCIA', $agencia);
            $datos   = $this->M_usuario->getCountAgencia($id[0]->id);
            if($datos[0]->cantidad == 0) {
                $data['error'] = EXIT_SUCCESS;
                $data['msj'] = 'Se eliminó correctamente';
                $datos = $this->M_usuario->deleteAgencia($id[0]->id);
                $this->M_usuario->deleteCorreoAgencia($agencia);
                $this->M_usuario->deleteAccesoAgencia($id[0]->id);
            }else {
                
            }
            $this->session->set_flashdata('msg', 'Se elimino la agencia correctamente');
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function guardarAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia          = _post('agencia');
            $direccion        = _post('direccion');
            $telefono         = _post('telefono');
            $ip               = _post('ip');
            $jefe_agencia     = _post('jefe_agencia');
            $toggle           = _post('toggle');
            $correos          = _post('correos');
            $correo           = _post('correo');
            $telefonos        = _post('telefonos');
            $data_telef       = _post('data_telef');
            $data_email       = _post('data_email');
            if($telefonos == null) {
                $telefonos = $telefono;
            }
            if($toggle == 'true') {
                $toggle = IP_ON;
            }else if($toggle == 'false') {
                $toggle = IP_OFF;
            }
            //CORREO
            foreach (explode(',', $data_email) as $key) {
                if($key != null || $key != '') {
                    $arrayInsertCorreos = array('AGENCIA' => $agencia,
                                 'NOMBRE'  => '',
                                 'CORREO'  => $key);
                     $this->M_usuario->insertarDatos($arrayInsertCorreos, 'correos');
                }
            }
            //AGENCIA
            $arrayInsertAgencias = array('AGENCIA'        => $agencia,
                                 'UBICACION'      => $direccion,
                                 'TELEFONO'       => $data_telef,
                                 'ip'             => $ip,
                                 'id_sup_agencia' => $jefe_agencia);
            $this->M_usuario->insertarDatos($arrayInsertAgencias, 'agencias'); 
            //ACCESO
            $id = $this->M_usuario->getIdByNombre('agencias', 'AGENCIA', $agencia);
            $arrayInsert = array('ip' => $toggle,
                                 'horario' => 0,
                                 'id_agencia' =>$id[0]->id);
            $this->M_usuario->insertarDatos($arrayInsert, 'acceso'); 

            $this->session->set_flashdata('msg', 'Se agrego la agencia correctamente');
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    } 

    function actualizarAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia          = _post('agencia');
            $global_agencia   = _post('global_agencia');
            $direccion        = _post('direccion');
            $telefono         = _post('telefono');
            $ip               = _post('ip');
            $jefe_agencia     = _post('jefe_agencia');
            $toggle           = _post('toggle');
            $correos          = _post('correos');
            $correo           = _post('correo');
            $telefonos        = _post('telefonos');
            $data_telef       = _post('data_telef');
            $data_email       = _post('data_email');
            $global_correos   = _post('global_correos');
            
            if($telefonos == null) {
                $telefonos = $telefono;
            }
            if($toggle == 'true') {
                $toggle = IP_ON;
            }else if($toggle == 'false') {
                $toggle = IP_OFF;
            }
            //CORREO
            $this->M_usuario->deleteCorreoAgencia($global_agencia);
            foreach (explode(',', $data_email) as $key) {
                if($key != null || $key != '') {
                    $arrayInsertCorreos = array('AGENCIA' => $agencia,
                                 'NOMBRE'  => '',
                                 'CORREO'  => $key);
                     $this->M_usuario->insertarDatos($arrayInsertCorreos, 'correos');
                }
            }
            //AGENCIA
            $id = $this->M_usuario->getIdByNombre('agencias', 'AGENCIA', $global_agencia);
            $arrayUpdateAgencias = array('AGENCIA'        => $agencia,
                                 'UBICACION'      => $direccion,
                                 'TELEFONO'       => $data_telef,
                                 'ip'             => $ip,
                                 'id_sup_agencia' => $jefe_agencia);
            $this->M_usuario->updateDatosAsesor($arrayUpdateAgencias, $id[0]->id, 'agencias'); 
            //ACCESO
            $arrayUpdate = array('ip' => $toggle);
            $this->M_usuario->updateDatosAcceso($arrayUpdate,$id[0]->id, 'acceso'); 
         $data['error'] = EXIT_SUCCESS;

         $this->session->set_flashdata('msg', 'Se actualizo la agencia correctamente');

        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    } 
}

