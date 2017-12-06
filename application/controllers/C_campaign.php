<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_campaign extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');    }
    
    public function index()
    {
        $idPersona  = _getSesion('idPersona');
        $arrayUpdt  = array('last_page' => N_CONFIRMAR_DATOS);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');

        $data['nombre'] = _getSesion('nombre');
        $data['email']  = _getSesion('email');
        $data['tipo_producto'] = _getSesion("tipo_producto");
        $nombre   = $this->session->userdata('nombre');
        $apellido = _getSesion('apellido');

        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        $data['comboMarca']         = $this->__buildMarca();
        $data['comboDistrito']      = $this->__buildDistrito();
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Est&aacute;s a un paso de tu pr&eacute;stamo.' : $titulo = '';
        
        $data['tipo_product'] = $titulo; 
        $this->load->view('v_campania', $data);
    }

    function __buildComboConcecionaria(){
        $concecionaria = $this->M_preaprobacion->getConcecionaria();
        $opt = null;
        foreach($concecionaria as $cons){
            $conse = str_replace(')', '',str_replace('(', '', $cons->DESC_CONCESIONARIA));
            $opt .= '<option value="'.$conse.'"> '.$conse.'</option>';
        }
        return $opt;
    }
    
    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->agencia));
            $opt .= '<option value="'.$agen.'"> '.$agen.'</option>';
        }
        return $opt;
    }
    
    function __buildCodTelefono($departamento){
        $codtel = $this->M_preaprobacion->getCod_telefono($departamento);
        $opt = null;
        foreach($codtel as $cod){
            $codi = $cod->CODIGO;
            $opt .= '<option value="'.$codi.'"> '.$cod->CODIGO.'</option>';
        }
        return $opt;
    }
    
    function __buildDepartamento(){
        $dpto = $this->M_preaprobacion->getDepartamento();
        $opt = null;
        foreach($dpto as $ubi){
            $codi = $ubi->DESC_DPTO;
            $opt .= '<option value="'.$codi.'"> '.$ubi->DESC_DPTO.'</option>';
        }
        return $opt;
    }
    
    function __buildProvincia($departamento){
        $provincia = $this->M_preaprobacion->getProvincia($departamento);
        $opt = null;
        foreach($provincia as $ubi){
            $codi = $ubi->DESC_PROV;
            $opt .= '<option value="'.$codi.'"> '.$ubi->DESC_PROV.'</option>';
        }
        return $opt;
    }
    
    function __buildDistrito(){
        $distrito = $this->M_preaprobacion->getDistritoLima();
        $opt = null;
        foreach($distrito as $ubi){
            $codi = $ubi->DESC_DISTRITO;
            $opt .= '<option value="'.$codi.'"> '.$ubi->DESC_DISTRITO.'</option>';
        }
        return $opt;
    }
    
    function __buildMarca(){
        $marca = $this->M_preaprobacion->getMarca();
        $opt = null;
        foreach($marca as $ubi){
            $codi = $ubi->MARCA;
            $opt .= '<option value="'.$codi.'"> '.$ubi->MARCA.'</option>';
        }
        return $opt;
    }
    
    function __buildModelo($marca){
        $modelo = $this->M_preaprobacion->getModelo($marca);
        $opt = null;
        foreach($modelo as $ubi){
            $codi = $ubi->MODELO;
            $opt .= '<option value="'.$codi.'"> '.$ubi->MODELO.'</option>';
        }
        return $opt;
    }
    
    function getProvincia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $departamento = _post('departamento');
            $data['comboProvincia'] = $this->__buildProvincia($departamento);
            $data['comboCodigo']    = $this->__buildCodTelefono($departamento);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    
    function getDistrito() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $Provincia = _post('Provincia');
            $data['comboDistrito'] = $this->__buildDistrito($Provincia);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    
    function getModelo() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $marca = _post('marca');
            $data['comboModelo'] = $this->__buildModelo($marca);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
    
    function guardarMarca() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $marca = _post('marca');
            $modelo = _post('modelo');
            $idPersona = _getSesion('idPersona');
            $session = array('marca'            => $marca,
                             'modelo'          => $modelo);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function ocultarAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $concesionaria = _post('concesionaria');
            if($concesionaria == 'Plaza Motors S.A.C') {
                $data['ocultar'] = 1;
            }
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function verificarCamp() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $ingreso_bruto   = _post('ingreso_bruto');
            $condicion       = _post('condicion');
            $nivel_educativo = _post('nivel_educativo');
            $profesion       = _post('profesion');
            $edad            = _post('edad');
            $distrito        = _post('distrito');
            $marca           = _post('marca');
            $modelo          = _post('modelo');
            $plazo           = _post('plazo');
            $valor_vehiculo  = _post('valor_vehiculo');
            $valor_inicial   = _post('valor_inicial');
            $primera_fecha   = _post('primera_fecha');

            /*$arrayInsert = array('id_usuario'     => _getSesion('id_usuario'),
                                 'nombre'         => $nombre,
                                 'apellido'       => $apellido,
                                 'email'          => $email,
                                 'dni'            => $dni,
                                 'id_tipo_prod'   => 1,
                                 'fec_estado'     => date("Y-m-d H:i:s"),
                                 'check_autorizo' => $check,
                                 'ws_error'       => $res,
                                 'ws_resultado'   => json_encode($result),
                                 'ws_timestamp'   => date("Y-m-d H:i:s"),
                                 'cod_agencia'    => $agencia_user[0]->id_agencia,
                                 'last_page'      => N_SIMULADOR
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');*/
            $data['error']   = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function changeValues() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $edad            = _post('edad');
            $ingreso_bruto   = _post('ingreso_bruto');
            $condicion       = _post('condicion');
            $nivel_educativo = _post('nivel_educativo');
            $profesion       = _post('profesion');
            $edad            = _post('edad');
            $distrito        = _post('distrito');
            $marca           = _post('marca');
            $modelo          = _post('modelo');
            $plazo           = _post('plazo');
            $valor_vehiculo  = _post('valor_vehiculo');
            $valor_inicial   = _post('valor_inicial');
            $primera_fecha   = _post('primera_fecha');
            
            if($ingreso_bruto != '' && $condicion != '' && $nivel_educativo != '' && $edad != '' && $distrito != '' && $marca != '' && $modelo != '' && $valor_vehiculo != '' && $plazo != '' && $valor_inicial != '' && $primera_fecha != '') {
                $arrayInsert = array('condicion_laboral' => $condicion,
                                 'nivel_educativo'       => $nombre,
                                 'profesion'             => $profesion,
                                 'email'          => $email,
                                 'dni'            => $dni,
                                 'id_tipo_prod'   => 1,
                                 'fec_estado'     => date("Y-m-d H:i:s"),
                                 'check_autorizo' => $check,
                                 'ws_error'       => $res,
                                 'ws_resultado'   => json_encode($result),
                                 'ws_timestamp'   => date("Y-m-d H:i:s"),
                                 'cod_agencia'    => $agencia_user[0]->id_agencia,
                                 'last_page'      => N_SIMULADOR
                                );
            $datoInsert = $this->M_preaprobacion->insertarDatosCliente($arrayInsert, 'solicitud');*/
            $data['error'] = EXIT_SUCCESS;
            }
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}




