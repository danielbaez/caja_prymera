<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_preaprobacion extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->helper("access_helper");
        is_logged();
        $this->minIniPorc  = 0.1;
        $this->maxIniPorc  = 0.5;
    }
    
    public function index()
    {
        $datos = $this->M_usuario->getDatosById('solicitud', 'id', _getSesion('idPersona'));
        if($datos[0]->last_page != N_SIMULADOR) {
            redirect("/C_main", 'location');
        }
        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        $data['comboMarca']         = $this->__buildMarca();

        $idPersona = _getSesion('idPersona');
        $arrayUpdt = array('last_page' => N_SIMULADOR);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $idPersona , 'solicitud');
        $data['nombre'] = ucfirst(_getSesion('nombre'));
        $data['email']=_getSesion('email');
        $nombre = $this->session->userdata('nombre');
        $data['tipo_producto'] = _getSesion("TIPO_PROD");
        $importeMaximo = _getSesion('importeMaximo');
        $importeMinimo = _getSesion('importeMinimo');
        $plazos = _getSesion('plazos');
        $apellido           = _getSesion('apellido');
        $nombre             = ucfirst($this->session->userdata('nombre'));
        $minAuto            = null;
        $maxAuto            = null;
        $plazo              = null;
        $minPrestamo        = null;
        $maxPrestamo        = null;
        $valorAuto          = null;
        $minInicial         = null;
        $maxInicial         = null;
        $cantPago           = 100000;
        $minIniPorc         = $this->minIniPorc;
        $maxIniPorc         = $this->maxIniPorc;

        $array_datos = _getSesion('arrDatos');
        if($array_datos == null) {
            //redirect("/C_main", 'location');
        }

        $plazos = [];
        foreach ($array_datos as $key => $value) {
            
            $plazos = array_merge($plazos, (array)$value['plazo']);

        }
        $plazos = array_unique($plazos);
        $arr_end = [];
        foreach ($plazos as $key => $value) {
            $arr_end[$value] = [];
            $mmax = [];
            $mmin = [];
            foreach ($array_datos as $key2 => $value2) {
                if(in_array($value, $value2['plazo'])){
                     array_push($mmin, $value2['importeMinimo']);
                     array_push($mmax, $value2['importeMaximo']);
                }
            }
            $arr_end[$value] = array('importeMinimo' => min($mmin), 'importeMaximo' => max($mmax));
        }
        $plazo_max = max($plazos);
        $arr_max = $arr_end[$plazo_max];

        $this->session->set_userdata(array('arr_end' => $arr_end));

        $minAuto = $arr_max['importeMinimo']/(1-$minIniPorc);      
        $maxAuto = $arr_max['importeMaximo']/(1-$maxIniPorc);

        $data['montoMaximo']      = round($maxAuto/100)*100;
        $data['montoMinimo']      = round($minAuto/100)*100;


        $valorAuto = ($data['montoMaximo']+$data['montoMinimo'])/2;
        $valorAuto = round($valorAuto/100)*100;

        $minInicial = max($valorAuto-$arr_max['importeMaximo'],$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$arr_max['importeMinimo'],$valorAuto*$maxIniPorc);
       
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades '.ucfirst($nombre).'!!! ' : $titulo = '';
        
        $data['tipo_product'] = $titulo;

        $count = count($plazos);
        if($count == 1){
            $data['plazo_max']      = $plazos[0];
            $data['plazo_min']      = $plazos[0];
            $data['plazo_step'] = 0;
        }
        if($count == 2){
            $data['plazo_max']      = $plazos[count($plazos)-1];
            $data['plazo_min']      = $plazos[0];
            $data['plazo_step'] = $data['plazo_max']  - $data['plazo_min'];
        }
        elseif($count >= 3) {
            $data['plazo_max']      = $plazos[count($plazos)-1];
            $data['plazo_min']      = $plazos[0];
            $data['plazo_step'] = $plazos[1] - $plazos[0];
        }
        $data['cuotaMaximo']      = round($maxInicial/100)*100;
        $data['cuotaMinimo']      = round($minInicial/100)*100;

        $this->load->view('v_vehicularSimulador', $data);
    }
    
    function changeValues() {
        $minIniPorc         = $this->minIniPorc;
        $maxIniPorc         = $this->maxIniPorc;

        $meses = preg_replace("/[^0-9]/","",_post('meses'));
        $arr_max = _getSesion('arr_end');
        $arr_max = $arr_max[$meses];

        $minAuto = $arr_max['importeMinimo']/(1-$minIniPorc);      
        $maxAuto = $arr_max['importeMaximo']/(1-$maxIniPorc);
        
        $monto = preg_replace("/[^0-9]/","",_post('monto'));

        $data['montoMaximo']      = round($maxAuto/100)*100;
        $data['montoMinimo']      = round($minAuto/100)*100;

        if(_post('action') == 'plazo')
        {
            $valorAuto = round((($data['montoMinimo']+$data['montoMaximo'])/2)/100)*100;
        }else{
            $valorAuto = $monto;
        }

        $minInicial = max($valorAuto-$arr_max['importeMaximo'],$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$arr_max['importeMinimo'],$valorAuto*$maxIniPorc);      

        $data['cuotaMaximo']      = round($maxInicial/100)*100;
        $data['cuotaMinimo']      = round($minInicial/100)*100;

        try 
          {
            $meses = preg_replace("/[^0-9]/","",_post('meses'));
            $cuota = preg_replace("/[^0-9]/","",_post('cuota'));
            $marca = _post('marca');
            $modelo = _post('modelo');
            $periodo = _post('periodo');

          //resultado 1 -- ok
          //resultado 3: token
          //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://ec2-54-173-46-98.compute-1.amazonaws.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

          if(_post('action') == 'plazo')
          {
                $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $valorAuto,
                                  'plazo' => $meses,
                                  'cuotaInicial' => $data['cuotaMinimo'],
                                  'marca' => $marca,
                                  'modelo' => $modelo/*,
                                  'periodo_gracia' => $periodo*/
                                );
          }

          elseif(_post('action') == 'monto')
          {
                $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $monto,
                                  'plazo' => $meses,
                                  'cuotaInicial' => $data['cuotaMinimo'],
                                  'marca' => $marca,
                                  'modelo' => $modelo/*,
                                  'periodo_gracia' => $periodo*/
                                );
          }
          else{
                $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $monto,
                                  'plazo' => $meses,
                                  'cuotaInicial' => $cuota,
                                  'marca' => $marca,
                                  'modelo' => $modelo/*,
                                  'periodo_gracia' => $periodo*/
                                );
          }

          $result = $client->GetDatosCreditoVehicular($params);
          
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = str_replace( ',', '', $data['cuotaMensual']);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2, '.','');

            $data['params'] = $params;
            $data['rrr'] = $result->return->cuotaMensual;

            $data['pagoTotal'] = $data['cuotaMensual'] * $meses;
            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2, '.','');

            $datos_tea = $result->return->tea;
            $data['tea'] = number_format(round($datos_tea*10000)/100, 2);
            $datos_tcea = $result->return->tcea;
            $data['tcea'] = number_format(round($datos_tcea*10000)/100, 2);  

            $data['seguroAuto'] = $result->return->seguroAuto;
            $data['seguroAuto'] = str_replace( ',', '', $data['seguroAuto']);
            $data['seguroAuto'] = number_format($data['seguroAuto'], 2);

            $data['status'] = 1;

            if(_post('action') == 'plazo' or _post('action') == 'monto') {
                $data['importeeeeee'] = number_format($valorAuto - $data['cuotaMinimo'], true).'0';      
            }
            else {
                $data['importeeeeee'] = number_format($valorAuto - $cuota, 2);     
            }
          }
          if($res == 0){
            $data['status'] = 0;
            //$response = array('status' => 0, 'url' => RUTA_CAJA.'c_losentimos');
          }
          if($res == 2){
            $data['status'] = 2;
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
                        $minPrestamo = $row['importeMinimo'];
                        $maxPrestamo = $row['importeMaximo'];
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
                    $minPrestamo = $row['importeMinimo'];
                    $maxPrestamo = $row['importeMaximo'];
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
    
    function enviarEmail() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $salario           = _post('salario');
            $nro_celular       = _post('nro_celular');
            $empleador         = _post('empleador');
            $direccion_empresa = _post('direccion_empresa');
            $Departamento      = _post('Departamento');
            $Provincia         = _post('Provincia');
            $Distrito          = _post('Distrito');
            $email             = _post('email');
            $agencia           = _post('agencia');
            $codigo            = _post('codigo');
            $nro_fijo          = _post('nro_fijo');
            $idPersona         = _getSesion('idPersona');
            
            $session = array('salario'            => $salario,
                             'nro_celular'        => $nro_celular,
                             'empleador'          => $empleador,
                             'direccion'          => $direccion_empresa,
                             'departamento'       => $Departamento,
                             'cantidad'           => $Provincia,
                             'agencia'            => $agencia,
                             'codigo'             => $codigo
                             );
            $this->session->set_userdata($session);
            $arrayUpdt = array('nro_celular' => $nro_celular);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'usuario');
            $data['error'] = EXIT_SUCCESS;
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
            $periodo = _post('periodo');
            $idPersona = _getSesion('idPersona');
            $pagoTot  = preg_replace('/[^0-9.]/', "", _post('pagotot'));
            $cuotaMens  = preg_replace('/[^0-9.]/', "", _post('mensual'));
            $meses  = preg_replace('/[^0-9.]/', "", _post('meses'));
            $importe  = preg_replace('/[^0-9.]/', "", _post('cuotaIni'));
            $numero  = _post('numero');
            $varTcea  = preg_replace('/[^0-9.]/', "", _post('pors_tcea'));
            $varTea   = preg_replace('/[^0-9.]/', "", _post('pors_tea'));
            $Agencia  = _post('Agencia');
            $seguro   = preg_replace('/[^0-9.]/', "", _post('seguro'));
            $monto = preg_replace('/[^0-9.]/', "", _post('monto'));
            $monto_vehic = _post('monto');
            $importe_auto = $monto-$importe;
            $concesionaria = _post('concesionaria');
            
            $session = array(
                             'pago_total'        => _post('pagotot'),
                             'cuota_mensual'     => _post('mensual'),
                             'TCEA'              => _post('pors_tcea'),
                             'tcea_sess'         => _post('pors_tcea'),
                             'cant_meses'        => _post('meses'),
                             'Importe'           => number_format($importe_auto,2,".",","),
                             'cuota_inicial'     => 'S/ '.number_format($importe,2,".",","),
                             'sess_tea'          => _post('pors_tea'),
                             'seguro'            => _post('seguro'),
                             'valor_auto'        => $monto_vehic.'.00',
                             'marca'             => $marca,
                             'modelo'            => $modelo,
                             'periodo_gracia'    => $periodo
                            );
            $this->session->set_userdata($session);
            $arrayUpdt = array(
                               'cuota_mensual'  => $cuotaMens,
                               'tcea'           => $varTcea,
                               'plazo'          => $meses,
                               'monto'          => $importe_auto,
                               'tea'            => $varTea,
                               'ws2_timestamp'  => date("Y-m-d H:i:s"),
                               'fec_estado'     => date("Y-m-d H:i:s"),
                               'marca'          => $marca,
                               'modelo'         => $modelo,
                               'costo_seguro'   => $seguro,
                               'cuota_inicial'  => $importe,
                               'valor_auto'     => $monto,
                               'last_page'      => N_CONFIRMAR_DATOS,
                               'periodo_gracia' => $periodo
                              );
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}

