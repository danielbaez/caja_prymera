<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_preaprobacion');
        $this->load->helper("url");
//         if (! isset($_COOKIE[__getCookieName()])) {
//             header("Location: ".RUTA_KOPLAN, true, 301);
//             //redirect(RUTA_VEHIKMANT, 'location');
//         }
    }
    
    public function index()
    {
        $this->load->model('M_usuario');

        $data['nombre'] = _getSesion("nombre");
        $data['comboAgencias']      = $this->__buildComboAgencias();
        
        $data['personales'] = $this->M_usuario->getPersonal();

        //_log(print_r($this->session->all_userdata('deliverdata') , true));
//         if(_getSesion("nombre") == null && _getSesion("email") == null) {
//             header("Location: ".RUTA_KOPLAN, true, 301);
//         }
        $this->load->view('v_main', $data);
    }

    function registrar() {
        $nombres   = __getTextValue('nombres');
        $apellidos = __getTextValue('apellidos');
        $sexo      = _post('sexo');
        $fecha_nacimiento = _post('fecha_nacimiento');
        $dni           = _post('dni');
        $fecha_ingreso = _post('fecha_ingreso');
        $celular      = _post('celular');
        $email        = _post('email');
        $rol          = _post('rol');
        $rol_superior = _post('rol_superior');
        $checkPermiso = _post('permiso');
        $agencia      = _post('agencia');
        $nombre_img      = _post('nombre_img');
        $permiso = implode(",",$checkPermiso);
        $arrayInsert = array('nombre' => $nombres,
                            'apellido'  => $apellidos,
                            'email'  => $email,
                            'usuario' => $email,
                            'password' => $this->get_hash($dni),
                            'dni'  => $dni,
                            'sexo' => $sexo,
                            'fecha_nac' => $fecha_nacimiento,
                            'fecha_ingreso'    => $fecha_ingreso,
                            'celular'          => $celular,
                            'rol'              => $rol,
                            'usuario'          => $rol_superior,
                            'permiso'          => $permiso,
                            'estado'           => 1,
                            'imagen'           => $nombre_img
                            );
        $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'usuario');
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
            $rol = _post('rol');
            $nombre = _post('nombre');
            $agencia = _post('agencia');
            $id_agencia = $this->M_preaprobacion->getidByAgencia($agencia);
            //_log(print_r($id_agencia, true));
            $datos = $this->M_preaprobacion->getDatosPersByRol($rol, $nombre, $id_agencia[0]->id);
            //_logLastQuery();
            $data['dni'] = $datos[0]->dni;
            $data['nombre'] = $datos[0]->nombre;
            $data['fecha_nac'] = $datos[0]->fecha_nac;
            $data['sexo'] = $datos[0]->sexo;
            $data['fecha_ingreso'] = $datos[0]->fecha_ingreso;
            $data['celular'] = $datos[0]->celular;
            $data['email'] = $datos[0]->email;
            $data['apellido'] = $datos[0]->apellido;
            $data['rol'] = $datos[0]->rol;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt = null;
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
            $rol = _post('rol');
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
            $rol = _post('rol');
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
            $nombres   = __getTextValue('nombres');
            $apellidos = __getTextValue('apellidos');
            $sexo      = _post('sexo');
            $fecha_nacimiento = _post('fecha_nacimiento');
            $dni           = _post('dni');
            $fecha_ingreso = _post('fecha_ingreso');
            $celular      = _post('celular');
            $email        = _post('email');
            $rol          = _post('rol');
            $rol_superior = _post('rol_superior');
            //$checkPermiso = _post('permiso');
            //_log(print_r($checkPermiso, true));
            $agencia      = _post('agencia');
            //$permiso = implode(",",$checkPermiso);
            $nombre_img      = _post('nombre_img');
            $id = $this->M_preaprobacion->getDatosPersByRol($rol, $nombres, null);
            $arrayUpdt = array('celular' => $celular,
                                'nombre' => $nombres,
                                'sexo' => $sexo,
                                'fecha_nac' => $fecha_nacimiento,
                                'dni' => $dni,
                                'fecha_ingreso' => $fecha_ingreso,
                                'email' => $email,
                                'usuario' => $email,
                                'rol' => $rol,
                                'imagen' => $nombre_img,
                                'apellido' => $apellidos);
         $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$id[0]->id , 'usuario');
         $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }    
}

