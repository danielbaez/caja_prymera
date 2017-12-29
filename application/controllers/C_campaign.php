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
        //_log(print_r($this->session->all_userdata(), true));
        $data['tipoCred'] = _getSesion('tipoCred');
        $idPersona  = _getSesion('idPersona');
        $arrayUpdt  = array('last_page' => N_SIMULADOR_EVA,
                            'status_sol' => 5/*inconcluso*/);
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

    function changeValues() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $edad            = _post('edad');
            $ingreso_bruto   = _post('ingreso_bruto');
            $condicion       = _post('condicion');
            $nivel_educativo = _post('nivel_educativo');
            $profesion       = _post('profesion');
            $distrito        = _post('distrito');
            $marca           = _post('marca');
            $modelo          = _post('modelo');
            $plazo           = _post('plazo');
            $valor_vehiculo  = _post('valor_vehiculo');
            $valor_inicial   = _post('valor_inicial');
            $primera_fecha   = _post('primera_fecha');
            $idPersona         = _getSesion('idPersona');
            $valorVehiculo = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$valor_vehiculo))));
            $valorInicial = str_replace('%', '',$valor_inicial);

            $valInicial = $valorVehiculo*($valorInicial/100);

            $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

            $params = array('token'=> 'E928EUXP',
                            'documento'=> _getSesion('dni'),
                                  'importeAuto'=> $valorVehiculo,
                                  'cuotaInicial' => $valInicial,
                                  'plazo' => $plazo,
                                  'renta' => floatval($ingreso_bruto),
                                  'marca' => $marca,
                                  'modelo' => $modelo,
                                  'condicionLaboral' => $condicion,
                                  'distrito' => $distrito,
                                  'profesion' => $profesion,
                                  'nivelEducativo' => $nivel_educativo,
                                  'edad' => $edad,
                                  'fechaPrimerPago' => date("m/d/Y", strtotime($primera_fecha))
                                );

            $result = $client->GetDatosCreditoVehicularOnline($params);
            //_log(print_r($result, true));
            $res = $result->return->resultado;
            _log(print_r($res, true));
            if($res == 1){ 

                $documento = $result->return->documento;
                $cuotaMensual = $result->return->cuotaMensual;
                $cuotaMensual = str_replace( ',', '', $cuotaMensual);
                $cuotaMensual = number_format($cuotaMensual, 2, '.','');

                $datos_tea = $result->return->tea;

                $datos_tcea = $result->return->tcea;

                $seguroAuto = $result->return->seguroAuto;

                $pagoTot = $cuotaMensual*$plazo;

                $importe = $valorVehiculo-$valInicial;
                if($importe > 150000 || $importe < 15000) {
                    $data['mensaje'] = 'El importe del pr&eacute;stamo debe ser mayor que 15000 y menor que 150000';
                }else {
                    if($ingreso_bruto != '' && $condicion != '' && $nivel_educativo != '' && $edad != '' && $distrito != '' && $marca != '' && $modelo != '' && $valor_vehiculo != '' && $plazo != '' && $valor_inicial != '' && $primera_fecha != '') {
                        $arrayUpdt = array('condicion_laboral'   => $condicion,
                                         'nivel_educativo'       => $nivel_educativo,
                                         'profesion'             => $profesion,
                                         'salario'               => $ingreso_bruto,
                                         'edad'                  => $edad,
                                         'distrito'              => $distrito,
                                         'provincia'             => 'LIMA',
                                         'departamento'          => 'LIMA',
                                         'marca'                 => $marca,
                                         'modelo'                => $modelo,
                                         'plazo'                 => $plazo,
                                         'valor_auto'            => $valor_vehiculo,
                                         'cuota_inicial'         => $valor_inicial,
                                         'ws2_timestamp'         => date("Y-m-d H:i:s"),
                                         'fec_estado'            => date("Y-m-d H:i:s"),
                                         'last_page'             => N_CONFIRMAR_DATOS,
                                         'cuota_inicial'         => $valInicial,
                                         'cuota_mensual'         => $cuotaMensual,
                                         'tea'                   => $datos_tea,
                                         'tcea'                  => $datos_tcea
                                        );
                    $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');

                    $session = array(
                                     'marca'       => $marca,
                                     'modelo'      => $modelo,
                                     'valor_auto'  => 'S/ '.$valorVehiculo,
                                     'periodo'     => $plazo.' meses',
                                     'Importe'     => $importe,
                                     'cuota_inicial' => 'S/ '.$valInicial,
                                     'pagoTotal' => 'S/ '.$pagoTot,
                                     'cuota_mensual' => 'S/ '.$cuotaMensual,
                                     'seguroAuto' => 'S/ '.$seguroAuto,
                                     'sess_tea' => $datos_tea.'%',
                                     'tcea_sess' => $datos_tcea.'%'
                                     );
                    $this->session->set_userdata($session);
                    $data['ws_error'] = 1;
                    $data['error'] = EXIT_SUCCESS;
                    }
                }
            }else if($res == 0) {
                $data['error'] = EXIT_SUCCESS;
                $data['ws_error'] = 0;
            }else if($res == 3) {
                $data['mensaje'] = 'Error del servidor';
                $data['ws_error'] = 2;
            }
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}




