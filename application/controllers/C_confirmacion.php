<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_confirmacion extends CI_Controller {
    
    private $sueldo = null;
    private $varPagoTotal = null;
    private $varCuotaMensual = null;
    private $glob_tea = null;
    private $glob_tcea = null;
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
        $this->load->model('M_preaprobacion');
        $this->sueldo = 18750;
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
    
    public function index()
    {
        $data['nombreDato']=':D';
        $data['nombre'] = _getSesion('nombre');
        $data['email']  = _getSesion('email');
        $data['tipo_producto'] = _getSesion("TIPO_PROD");
        $nombre   = $this->session->userdata('nombre');
        $apellido = _getSesion('apellido');

        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades '.$nombre.'!!! Tienes un pr&eacute;stamo pre aprobado' : $titulo = '';
        
        $data['tipo_product'] = $titulo; 
       /*$importeMaximo = _getSesion('importeMaximo');
        $importeMinimo = _getSesion('importeMinimo');
        $plazos = _getSesion('plazos');

        $plazos_explode = explode(',', $plazos);


        $sueldo = $this->sueldo;
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
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades '.$nombre.'!!! Tienes un pr&eacute;stamo pre aprobado' : $titulo = '';
        
        $data['tipo_product'] = $titulo;       
        
        $data['plazo_max']      = $plazos_explode[count($plazos_explode)-1];
        $data['plazo_min']      = $plazos_explode[0];

        $count = count($plazos_explode);
        if($count == 2){
            $data['plazo_step'] = $data['plazo_max']  - $data['plazo_min'];
        }
        elseif($count >= 3) {
            $data['plazo_step'] = $plazos_explode[1] - $plazos_explode[0];
        }

        $data['importeMaximo']      = $importeMaximo;
        $data['importeMinimo']      = $importeMinimo;*/


        /*try 
          {
            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

           $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'Importe'=> $importeMaximo,
                                  'plazo' => $data['plazo_max']
                    );

          $result = $client->GetDatosCreditoCash($params);
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = str_replace( ',', '', $data['cuotaMensual']);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2);
            $this->varCuotaMensual = $data['cuotaMensual'];

            $data['pagoTotal'] = $data['cuotaMensual'] * $data['plazo_max'];
            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2);
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
        }*/


        $this->load->view('v_confirmacion', $data);
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
        _logLastQuery();
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
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
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
            $pagoTot  = _post('pagotot');
            $cuotaMens  = _post('mensual');
            $meses  = _post('meses');
            $importe  = _post('cuotaIni');
            $numero  = _post('numero');
            $monto  = _post('monto');
            //$varTea  = 
            $varTcea  = _getSesion('TCEA');
            $varTea   = _post('sess_tea');
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
                            'Agencia'           => $Agencia,
                            'concesionaria'     => $concesionaria,
                            'monto'             => $monto
                );
                $this->session->set_userdata($session);
                $data['cambio'] = 0;
                //$this->sendMailGmail();
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
        _log($aleatorio);
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

    /*function sendMailGmail()
    {
       //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       // 'smtp_host' => 'ssl://smtp.gmail.com',
       // 'smtp_port' => 465,
       // 'smtp_user' => 'daniel.baez@comparabien.com',
       // 'smtp_pass' => 'compara@daniel',
       'smtp_host' => 'smtp.pepipost.com',
       'smtp_port' => 25,
       'smtp_user' => 'comparabien',
       'smtp_pass' => 'Compara123',
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('daniel.baez@comparabien.com');
       $this->email->to(_getSesion('email'));
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $nombre = _getSesion('nombre');
       $this->email->message('
        <h1><strong>Mi Cash</strong></h1>
        <h4>'.$nombre.' Te damos la bienvenida a Prymera!</h4>
        <h4>A continuaci&oacute;n detallamos las condiciones del cr&eacute;dito “MI CASH” </h4>
        <h4>que solicitaste:</h4>

        <p>Monto: '._getSesion('pago_total').' </p>
        <p>Plazo: '._getSesion('cant_meses').'</p>
        <p>Cuota: '._getSesion('cuota_mensual').'</p>
        <p>TEA: '._getSesion('sess_tea').'</p>
        <p>TCEA: '._getSesion('TCEA').'</p>

        <h1><strong>Quiero desembolsar mi cr&eacute;dito pre aprobado &iquest;Qu&eacute; debo hacer?</strong></h1>
        <p>Acércate a la agencia: “'._getSesion('Agencia').'” ubicada en '.$ubicacion.'.</p>

        <h3><strong>&iquest;Qu&eacute; debo presentar?</strong></h3>
        <p>- Tu DNI vigente </p>
        <p>- Un recibo de servicio (m&aacute;ximo 2 meses de antigüedad).</p>

        <h3><strong>¡M&aacute;s Beneficios para ti!</strong></h3>
        <p>Si deseas un cr&eacute;dito con un monto mayor al pre-aprobado, debes llevar tu &uacute;ltima boleta de </p>
        <p>pago para que podamos evaluarte.</p>

        <p>¡No pierdas la oportunidad de cumplir tus sueños, te esperamos!</p>

        <p>T&eacute;rminos y condiciones:” Seg&uacute;n lo especificado por legal”</p>
        ');
       $this->email->send();
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
     }*/
}

