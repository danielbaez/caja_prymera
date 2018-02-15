<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preaprobacion extends CI_Controller {
    
    private $varPagoTotal = null;
    private $varCuotaMensual = null;
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->helper("url");
        $this->load->helper("access_helper");
        is_logged();
        $this->array_datos = array(
            array(
                "plazo" => 12,
                "mont_min" => 10000,
                "mont_max" => 50000
            ),
            array(
                "plazo" => 24,
                "mont_min" => 50000,
                "mont_max" => 100000
            ),
            array(
                "plazo" => 36,
                "mont_min" => 100000,
                "mont_max" => 200000
            )
        );
        $this->minIniPorc  = 0.1;
        $this->maxIniPorc  = 0.5;
    }
    
    public function index() {
        $idPersona = _getSesion('idPersona');
        $datos = $this->M_usuario->getDatosById('solicitud', 'id', $idPersona);
        if($datos[0]->last_page != N_SIMULADOR) {
            redirect("/C_main", 'location');
        }
        $data['nombreDato']=':D';
        $data['nombre'] = ucfirst(_getSesion('nombre'));
        $data['email']  = _getSesion('email');
        $nombre   = $this->session->userdata('nombre');
        $data['tipo_producto'] = _getSesion("TIPO_PROD");
        $apellido = _getSesion('apellido');

        $arrayUpdt = array('last_page' => N_SIMULADOR, 'status_sol' => 5);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $idPersona , 'solicitud');

        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        $importeMaximo = _getSesion('importeMaximo');
        $importeMinimo = _getSesion('importeMinimo');
        $plazos        = _getSesion('plazos');
        if($plazos == null) {
           redirect("/Micash", 'location'); 
        }

        $plazos_explode = explode(';', $plazos);
        $minAuto = null;
        $maxAuto = null;
        $plazo   = null;
        $minPrestamo = null;
        $maxPrestamo = null;
        $valorAuto   = null;
        $minInicial  = null;
        $maxInicial  = null;
        $cantPago    = 100000;
        $minIniPorc  = $this->minIniPorc;
        $maxIniPorc  = $this->maxIniPorc;
        $arr = $this->array_datos;
        foreach ($arr as $row) {
            $plazo = $row['plazo'];
            $minPrestamo = $row['mont_min'];
            $maxPrestamo = $row['mont_max'];
            $minAuto = $minPrestamo/(1-$minIniPorc);
            $maxAuto = $maxPrestamo/(1-$maxIniPorc);
        }
        $valorAuto = ($minAuto+$maxAuto)/2;
        $minInicial = max($valorAuto-$maxPrestamo,$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$minPrestamo,$valorAuto*$maxIniPorc);
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades '.ucfirst($nombre).'!!! ' : $titulo = '';
        
        $data['tipo_product'] = $titulo;       
        
        $data['plazo_max']      = $plazos_explode[count($plazos_explode)-1];
        $data['plazo_min']      = $plazos_explode[0];

        $count = count($plazos_explode);
        if($count == 1){
            $data['plazo_max']      = $plazos_explode[0];
            $data['plazo_min']      = $plazos_explode[0];
            $data['plazo_step'] = 0;
        }
        if($count == 2){
            $data['plazo_step'] = $data['plazo_max']  - $data['plazo_min'];
        }
        elseif($count >= 3) {
            $data['plazo_step'] = $plazos_explode[1] - $plazos_explode[0];
        }
        $data['importeMaximo']      = $importeMaximo;
        $data['importeMinimo']      = $importeMinimo;
        try 
          {
           //resultado 1 -- ok
           //resultado 3: token
           //resultado 2: error del servidor
           //resultado 0 : rechazado
          $client = new SoapClient('http://ec2-54-173-105-111.compute-1.amazonaws.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

            $date = date("Y-m-d");
            $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
            $date = date("m/d/Y",$date);

           $params = array('token'=> 'E928EUXP',
                          'documento'=>_getSesion('dni'),
                          'Importe'=> $importeMaximo,
                          'plazo' => $data['plazo_max'],
                          'fecha' => $date//fecha por corregir
                        );
           
           if($params == null) {
                //redirect("/C_main", 'location');
            }
          $result = $client->GetDatosCreditoCash($params);
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = $data['cuotaMensual'];
            $this->varCuotaMensual = $data['cuotaMensual'];
            $data['pagoTotal'] = $data['cuotaMensual'] * $data['plazo_max'];

            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2);
            $this->varPagoTotal = $data['pagoTotal'];

            $datos_tea = $result->return->tea;
            $data['tea'] = round($datos_tea*10000)/100;
            $datos_tcea = $result->return->tcea;
            $data['tcea'] = round($datos_tcea*10000)/100;  
          }
          if($res == 0){
            //$response = array('status' => 0, 'url' => RUTA_CAJA.'c_losentimos');
          }
          if($res == 2){
            //$response = array('status' => 2);
          }

        }
        catch(Exception $e)
        {
           //$response = array('status' => 2);
        }
        $this->load->view('v_miCashSimulador', $data);
    }
    
    function changeValues() {

        try 
          {
            $cantidad = preg_replace("/[^0-9]/","",_post('cantidad'));
            $meses = preg_replace("/[^0-9]/","",_post('meses'));
            $periodo = _post('periodo');

            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://ec2-54-173-105-111.compute-1.amazonaws.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

          $date = date("Y-m-d");
            $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
            $date = date("m/d/Y",$date);

           $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'Importe'  => $cantidad,
                                  'plazo'    => $meses,
                                  'fecha' => $date
                    );

          $result = $client->GetDatosCreditoCash($params);
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = str_replace( ',', '', $data['cuotaMensual']);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2, '.','');
            $this->varCuotaMensual = $data['cuotaMensual'];

            $data['pagoTotal'] = $data['cuotaMensual'] * $meses;

            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2, '.','');
            $this->varPagoTotal = $data['pagoTotal'];

            $datos_tea = $result->return->tea;
            $data['tea'] = round($datos_tea*10000)/100;
            $datos_tcea = $result->return->tcea;
            $data['tcea'] = round($datos_tcea*10000)/100;  

            $data['importePrestamo'] = number_format(floatval($cantidad), 2); 

          }
          if($res == 0){
            //$response = array('status' => 0, 'url' => RUTA_CAJA.'c_losentimos');
          }
          if($res == 2){
            //$response = array('status' => 2);
          }

        }
        catch(Exception $e)
        {
           //$response = array('status' => 2);
        }

        echo json_encode($data);
    }
    
    function changeValuesVehiculo() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $cantPago    = null;
            $iniRango    = _post('cantidad');
            $meses       = _post('meses');
            $cuotaIni    = _post('cuota_inicial');
            $meses_pago  = null;
            $minAuto     = null;
            $maxAuto     = null;
            $nuevo       = null;
            $minPrestamo = null;
            $maxPrestamo = null;
            $valorAuto   = null;
            $minInicial  = null;
            $maxInicial  = null;
            $cuota_ini   = null;
            $minIniPorc  = $this->minIniPorc;
            $maxIniPorc  = $this->maxIniPorc;
            $arr         = $this->array_datos;
            $nuevo       = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$iniRango))));
            $cuota       = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$cuotaIni))));
            $meses_pago  = intval(str_replace(' ', '',str_replace('meses', '',$meses)));
            
            if($meses != null) {
                foreach ($arr as $row) {
                    if($meses_pago == $row['plazo']) {
                        $minPrestamo = $row['mont_min'];
                        $maxPrestamo = $row['mont_max'];
                        $minAuto = $minPrestamo/(1-$minIniPorc);
                        $maxAuto = $maxPrestamo/(1-$maxIniPorc);
                    }
                }
                $valorAuto = $nuevo;
                $minInicial = max($valorAuto-$maxPrestamo,$valorAuto*$minIniPorc);
                $maxInicial = min($valorAuto-$minPrestamo,$valorAuto*$maxIniPorc);
                $cuota_ini = round($minAuto/100)*100;
            }
            
            $data['cuota_ini']    = $nuevo-$cuota;
            $data['minAuto']      = round($minAuto/100)*100;
            $data['maxAuto']      = round($maxAuto/100)*100;
            $data['max_cuota']    = round($maxInicial/100)*100;
            $data['min_cuota']    = round($minInicial/100)*100;
            $data['cantPago']     = round($maxInicial/100)*100;
            $data['mensual']      = round($minInicial/100)*100;
            $data['error']        = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
    
    function changeImporte() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $cantPago    = null;
            $iniRango    = _post('cantidad');
            $meses       = _post('meses');
            $cuotaIni    = _post('cuota_inicial');
            $meses_pago  = null;
            $minAuto     = null;
            $maxAuto     = null;
            $nuevo       = null;
            $minPrestamo = null;
            $maxPrestamo = null;
            $valorAuto   = null;
            $minInicial  = null;
            $maxInicial  = null;
            $cuota_ini   = null;
            $minIniPorc  = $this->minIniPorc;
            $maxIniPorc  = $this->maxIniPorc;
            $arr         = $this->array_datos;
            $nuevo       = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$iniRango))));
            $cuota       = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$cuotaIni))));
            $meses_pago  = intval(str_replace(' ', '',str_replace('meses', '',$meses)));
            
            if($meses != null) {
                foreach ($arr as $row) {
                    if($meses_pago == $row['plazo']) {
                        $minPrestamo = $row['mont_min'];
                        $maxPrestamo = $row['mont_max'];
                        $minAuto = $minPrestamo/(1-$minIniPorc);
                        $maxAuto = $maxPrestamo/(1-$maxIniPorc);
                    }
                }
                $valorAuto = $nuevo;
            }
            
            $data['cuota_ini'] = $valorAuto-$cuota;
            $data['error']     = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
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
    
    function __buildDistrito($Provincia){
        $distrito = $this->M_preaprobacion->getDistrito($Provincia);
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
        echo json_encode(array_map('utf8_encode', $data));
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
        echo json_encode(array_map('utf8_encode', $data));
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

    function verificarNumero() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $salario = _post('salario');
            $nro_celular = _post('nro_celular');
            $empleador = _post('empleador');
            $direccion_empresa = _post('direccion_empresa');
            $Departamento = _post('Departamento');
            $Provincia = _post('Provincia');
            $Distrito = _post('Distrito');
            /*$pagoTot  = _post('pagotot');
            $cuotaMens  = _post('mensual');
            $meses  = _post('meses');
            $importe  = _post('cuotaIni');*/
            $numero  = _post('numero');
            /*$varTcea  = _post('pors_tcea');
            $varTea   = _post('pors_tea');*/
            $Agencia  = _post('Agencia');
            $concesionaria = _post('concesionaria');
            if($numero != _getSesion('codigo_ver')) {
                $data['mensaje'] = "El n&uacute;mero ingresado no es v&aacute;";
                $data['cambio'] = 1;
            }else {
                $session = array('salario'          => $salario,
                            'nro_celular'       => $nro_celular,
                            'empleador'         => $empleador,
                            'direccion_empresa' => $direccion_empresa,
                            'Departamento'      => $Departamento,
                            'Provincia'         => $Provincia,
                            'Distrito'          => $Distrito,
                            /*'pago_total'        => $pagoTot,
                            'cuota_mensual'     => $cuotaMens,
                            'TCEA'              => $varTcea,
                            'cant_meses'        => $meses,
                            'Importe'           => $importe,
                            'sess_tea'          => $varTea,*/
                            'Agencia'           => $Agencia,
                            'concesionaria'     => $concesionaria
                );
                $this->session->set_userdata($session);
                $data['cambio'] = 0;
            }

            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function enviarMail() {
        //twilio enviar msn
       $aleatorio = rand ( 100000 , 999999 );
        $numero = _post('nro_celular');
        $this->load->library('twilio');
        $from = '786-220-7333';
        $to = '+51 '.$numero;
        $message = 'Tu código de verificación es '.$aleatorio;
        $session = array('codigo_ver' => $aleatorio);
        $this->session->set_userdata($session);
        $response = $this->twilio->sms($from, $to, $message);
        print_r($response);
        if($response->IsError)
          exit('Error: ' . $response->ErrorMessage);
        else
          exit('Sent message to ' . $to);
    }

     function setearDatos() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $pagoTot  = preg_replace('/[^0-9.]/', "", _post('pagotot'));
            $marca    = _post('marca');
            $modelo   = _post('modelo');
            $periodo   = _post('periodo');
            $cuotaMens  = preg_replace('/[^0-9.]/', "", _post('mensual'));
            $meses  = preg_replace('/[^0-9.]/', "", _post('meses'));
            $importe  = preg_replace('/[^0-9.]/', "", _post('cuotaIni'));
            $monto  = preg_replace('/[^0-9.]/', "", _post('monto'));
            $numero  = _post('numero');
            $varTcea  = preg_replace('/[^0-9.]/', "", _post('pors_tcea'));
            $varTea   = preg_replace('/[^0-9.]/', "", _post('pors_tea'));
            $Agencia  = _post('Agencia');
            $seguro  = _post('seguro');
            $idPersona = _getSesion('idPersona');
            /*$session = array(
                             'pago_total'        => _post('pagotot'),
                             'cuota_mensual'     => _post('mensual'),
                             'TCEA'              => _post('pors_tcea'),
                             'tcea_sess'         => _post('pors_tcea'),
                             'cant_meses'        => _post('meses'),
                             'Importe'           => _post('cuotaIni'),
                             'sess_tea'          => _post('pors_tea'),
                             'periodo'           => $periodo 
                             );*/

            $session = array(
                             'pago_total'        => $cuotaMens*$meses,
                             'cuota_mensual'     => $cuotaMens,
                             'TCEA'              => $varTcea,
                             'tcea_sess'         => $varTcea,
                             'cant_meses'        => $meses,
                             'Importe'           => $importe,
                             'sess_tea'          => $varTea,
                             'periodo'           => $periodo 
                             );
            $this->session->set_userdata($session);
            $arrayUpdt = array(
                                'cuota_mensual' => $cuotaMens,
                                'tcea'          => $varTcea,
                                'plazo'         => $meses,
                                'monto'         => $importe,
                                'tea'           => $varTea,
                                'fec_estado'    => date("Y-m-d H:i:s"),
                                'ws2_timestamp' => date("Y-m-d H:i:s"),
                                'marca'         => $marca,
                                'modelo'        => $modelo,
                                'last_page'     => N_CONFIRMAR_DATOS,
                                'periodo_gracia'=> $periodo,
                                //'status_sol'    => 5                             
                                );
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            $data['cambio'] = 0;

            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
     }
}

