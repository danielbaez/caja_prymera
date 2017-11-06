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
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->model('M_preaprobacion');

        $this->load->helper("access_helper");
        is_logged();
        
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
        if (! isset($_COOKIE[__getCookieName()])) {
            redirect("/", 'location');
        }
    }
    
    public function index()
    {
        if(_getSesion("usuario") == null && _getSesion("nombre") == null || _getSesion('conectado') == 0 || _getSesion('conectado') == 0) {
            ////redirect("/C_main", 'location');
        }
        $data['nombreDato']=':D';
        $data['nombre'] = _getSesion('nombre');
        $data['email']  = _getSesion('email');
        $data['tipo_producto'] = _getSesion("tipo_producto");
        $nombre   = $this->session->userdata('nombre');
        $apellido = _getSesion('apellido');

        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Est&aacute;s a un paso de tu pr&eacute;stamo.' : $titulo = '';
        
        $data['tipo_product'] = $titulo; 
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
            $codigo = _post('codigo');
            $nro_fijo = _post('nro_fijo');
            $telefono = '0'.$codigo.$nro_fijo;
            $pagoTot  = _post('pagotot');
            $cuotaMens  = _post('mensual');
            $meses  = _post('meses');
            $importe  = _post('cuotaIni');
            $numero  = _post('numero');
            $monto  = _post('monto');
            $tipo_product = _getSesion("tipo_producto");
            $idPersona  = _getSesion('idPersona');
            $varTcea  = _getSesion('TCEA');
            $varTea   = _post('sess_tea');
            $estado_civil   = _post('estado_civil');
            $nombre_conyugue   = _post('nombre_conyugue');
            $dni_conyugue   = _post('dni_conyugue');
            $concesionaria = null;
            $Agencia  = _post('Agencia');
            if($tipo_product == PRODUCTO_VEHICULAR) {
                $concesionaria = _post('concesionaria');
                if($concesionaria == null) {
                    throw new Exception("Ingrese una concesionaria", 1);
                    
                }
                $concecionaria = $this->M_preaprobacion->getConcecionariaId($concesionaria);
                $concesionaria = $concecionaria[0]->id;
            }
            if($numero != _getSesion('codigo_ver')) {
                $data['mensaje'] = "El n&uacute;mero ingresado no es v&aacute;";
                $data['cambio'] = 1;
                $arrayUpdt = array('validar_celular' => 0);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            }else {
                $session = array('salario'      => $salario,
                            'nro_celular'       => $nro_celular,
                            'empleador'         => $empleador,
                            'direccion_empresa' => $direccion_empresa,
                            'Departamento'      => $Departamento,
                            'Provincia'         => $Provincia,
                            'Distrito'          => $Distrito,
                            'Agencia'           => $Agencia,
                            'monto'             => $monto,
                            'estado_civil'      => $estado_civil
                );
                $this->session->set_userdata($session);
                $data['cambio'] = 0;
            }
            $agencia = $this->M_preaprobacion->getAgenciasId($Agencia);
            $arrayUpdt = array('salario'        => $salario,
                            'celular'           => $nro_celular,
                            'empleador'         => $empleador,
                            'dir_empleador'     => $direccion_empresa,
                            'departamento'      => $Departamento,
                            'provincia'         => $Provincia,
                            'distrito'          => $Distrito,
                            'nro_fijo'          => $telefono,
                            'cod_concecionaria' => $concesionaria,
                            'agencia_desembolso' => $agencia[0]->id,
                            'validar_celular'   => 1,
                            'fec_estado' => date("Y-m-d H:i:s"),
                            'estado_civil'      => $estado_civil,
                            'nombre_conyugue'   => $nombre_conyugue,
                            'dni_conyugue'      => $dni_conyugue,
                            'status_sol'        => 0
                );
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function enviarMail() {
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
            //twilio enviar msn
        $aleatorio = rand ( 100000 , 999999 );

        $data['nro']   = $aleatorio;

        $numero = _post('nro_celular');
        _log($aleatorio);
        $this->load->library('twilio');
        $from = '786-220-7333';
        $to = '+51 '.$numero;
        $message = 'Tu código de verificación es '.$aleatorio;
        $session = array('codigo_ver' => $aleatorio,
                         'nro_celular' => $to);
        $this->session->set_userdata($session);
        $response = $this->twilio->sms($from, $to, $message);
        if($response->IsError) {
          $data['error'] = EXIT_ERROR;
        }
        else {
        }
        }catch (Exception $e){
            $data['error'] = EXIT_ERROR;
        }
        echo json_encode(array_map('utf8_encode', $data));
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

     function goToHome() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            if(_getSesion('TIPO_PROD') == PRODUCTO_MICASH) {
                  $data['location']  = '/Micash';
            }else {
                $data['location']  = '/C_login';
            }
        $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
     }
}


