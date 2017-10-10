<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_preaprobacion extends CI_Controller {
    
    private $sueldo = null;
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_preaprobacion');
        $this->sueldo = 18750;
        // $this->array_datos = array(
        //                             array(
        //                                 "plazo" => 12,
        //                                 "importeMinimo" => 10000,
        //                                 "importeMaximo" => 50000
        //                             ),
        //                             array(
        //                                 "plazo" => 24,
        //                                 "importeMinimo" => 50000,
        //                                 "importeMaximo" => 100000
        //                             ),
        //                             array(
        //                                 "plazo" => 36,
        //                                 "importeMinimo" => 100000,
        //                                 "importeMaximo" => 200000
        //                             )
        //                         );



        $this->minIniPorc  = 0.1;
        $this->maxIniPorc  = 0.5;
        if (! isset($_COOKIE[__getCookieName()])) {
            header("Location: ".RUTA_CAJA, true, 301);
        }
        
    }
    
    public function index()
    {

        if(_getSesion("nombre") == null && _getSesion("email") == null) {
            header("Location: ".RUTA_CAJA, true, 301);
        }
        $data['comboConcecionaria'] = $this->__buildComboConcecionaria();
        $data['comboAgencias']      = $this->__buildComboAgencias();
        $data['comboDepa']          = $this->__buildDepartamento();
        $data['comboMarca']         = $this->__buildMarca();
        
        $data['nombreDato']=':D';
        $data['nombre'] = _getSesion('nombre');
        $data['email']=_getSesion('email');
        $nombre = $this->session->userdata('nombre');

        $importeMaximo = _getSesion('importeMaximo');
        $importeMinimo = _getSesion('importeMinimo');
        $plazos = _getSesion('plazos');

        $apellido           = _getSesion('apellido');
        $nombre             = $this->session->userdata('nombre');
        $sueldo             = $this->sueldo;
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
        //$arr                = $this->array_datos;

        /*foreach ($arr as $row) {
            print_r($row);
             $plazo = $row['plazo'];
             $minPrestamo = $row['importeMinimo'];
             $maxPrestamo = $row['importeMaximo'];
             $minAuto = $minPrestamo/(1-$minIniPorc);
             $maxAuto = $maxPrestamo/(1-$maxIniPorc);
        }*/
        
        
        /*$array_datos = array(
                            array(
                                "plazo" => array(12,24,36),
                                "importeMinimo" => 1000,
                                "importeMaximo" => 5000
                            ),
                            array(
                                "plazo" => array(12,24),
                                "importeMinimo" => 5000,
                                "importeMaximo" => 10000
                            ),
                            array(
                                "plazo" => array(36),
                                "importeMinimo" => 10000,
                                "importeMaximo" => 15000
                            )
                        );*/

        $array_datos = _getSesion('arrDatos');

        //print_r($array_datos);

        $plazos = [];
        foreach ($array_datos as $key => $value) {
            print_r($value);
            
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

        /*print_r($arr_end);
        exit();*/

        $plazo_max = max($plazos);
        $arr_max = $arr_end[$plazo_max];

        //$this->session->set_userdata(array('plazosss' => $plazos, 'arr_end' => $arr_end));


        $this->session->set_userdata(array('arr_end' => $arr_end));

        //print_r($arr_max);  

        $minAuto = $arr_max['importeMinimo']/(1-$minIniPorc);      
        $maxAuto = $arr_max['importeMaximo']/(1-$maxIniPorc);
        

        $valorAuto = ($minAuto+$maxAuto)/2;
        /*$maxInicial = max($valorAuto-$arr_max['importeMaximo'],$valorAuto*$minIniPorc);
        $minInicial = min($valorAuto-$arr_max['importeMinimo'],$valorAuto*$maxIniPorc);*/

        $minInicial = max($valorAuto-$arr_max['importeMaximo'],$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$arr_max['importeMinimo'],$valorAuto*$maxIniPorc);
       

        /*$minInicial = max($valorAuto-$maxPrestamo,$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$minPrestamo,$valorAuto*$maxIniPorc);*/
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades '.$nombre.'!!! Tienes un pr&eacute;stamo pre aprobado' : $titulo = '';
        
        $data['tipo_product'] = $titulo;

        $data['plazo_max']      = $plazos[count($plazos)-1];
        $data['plazo_min']      = $plazos[0];
        $count = count($plazos);
        if($count == 2){
            $data['plazo_step'] = $data['plazo_max']  - $data['plazo_min'];
        }
        elseif($count >= 3) {
            $data['plazo_step'] = $plazos[1] - $plazos[0];
        }

        $data['montoMaximo']      = round($maxAuto/100)*100;
        $data['montoMinimo']      = round($minAuto/100)*100;

        $data['cuotaMaximo']      = round($maxInicial/100)*100;
        $data['cuotaMinimo']      = round($minInicial/100)*100;

        /*try 
          {
            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

           $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $importeMaximo,
                                  'plazo' => $data['plazo_max'],
                                  'cuotaInicial' => 62400,
                                  'marca' => 'Audi',
                                  'modelo' => '80 2.0 E'
                    );

           print_r($params);

          $result = $client->GetDatosCreditoVehicular($params);         

          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = str_replace( ',', '', $data['cuotaMensual']);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2);


            $data['pagoTotal'] = $data['cuotaMensual'] * $data['plazo_max'];
            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2);

            $data['seguroAuto'] = $result->return->seguroAuto;
            $data['seguroAuto'] = str_replace( ',', '', $data['seguroAuto']);
            $data['seguroAuto'] = number_format($data['seguroAuto'], 2);

            $data['tea'] = $result->return->tea;
            $data['tcea'] = $result->return->tea;

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

        //print_r($data);
        //exit();

        $this->load->view('v_preaprobacion', $data);
    }
    
    function changeValues() {

        $minIniPorc         = $this->minIniPorc;
        $maxIniPorc         = $this->maxIniPorc;

        $meses = preg_replace("/[^0-9]/","",_post('meses'));

        $arr_max = _getSesion('arr_end');

        $arr_max = $arr_max[$meses];
        //print_r($arr_max);

        $minAuto = $arr_max['importeMinimo']/(1-$minIniPorc);      
        $maxAuto = $arr_max['importeMaximo']/(1-$maxIniPorc);
        
        $monto = preg_replace("/[^0-9]/","",_post('monto'));

        if(_post('action') == 'plazo')
        {
            $valorAuto = ($minAuto+$maxAuto)/2;
        }else{
            $valorAuto = $monto;
        }


        $minInicial = max($valorAuto-$arr_max['importeMaximo'],$valorAuto*$minIniPorc);
        $maxInicial = min($valorAuto-$arr_max['importeMinimo'],$valorAuto*$maxIniPorc);
       
        $data['montoMaximo']      = round($maxAuto/100)*100;
        $data['montoMinimo']      = round($minAuto/100)*100;

        $data['cuotaMaximo']      = round($maxInicial/100)*100;
        $data['cuotaMinimo']      = round($minInicial/100)*100;

        /*echo json_encode($data);
        exit();*/

        try 
          {
            
            $meses = preg_replace("/[^0-9]/","",_post('meses'));
            $cuota = preg_replace("/[^0-9]/","",_post('cuota'));
            $marca = _post('marca');
            $modelo = _post('modelo');

            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

          if(_post('action') == 'plazo')
          {
                $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $data['montoMaximo']/2,
                                  'plazo' => $meses,
                                  'cuotaInicial' => $data['cuotaMinimo'],
                                  'marca' => $marca,
                                  'modelo' => $modelo
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
                                  'modelo' => $modelo
                    );
          }
          else{
                $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'importeAuto'=> $monto,
                                  'plazo' => $meses,
                                  'cuotaInicial' => $cuota,
                                  'marca' => $marca,
                                  'modelo' => $modelo
                    );
          }

           //print_r($params);


          $result = $client->GetDatosCreditoVehicular($params);
   
          $res = $result->return->resultado;
          if($res == 1){


            // print_r($result);
            // exit();

            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['cuotaMensual'] = str_replace( ',', '', $data['cuotaMensual']);
            $data['cuotaMensual'] = number_format($data['cuotaMensual'], 2, '.','');

            $data['pagoTotal'] = $data['cuotaMensual'] * $meses;
            $data['pagoTotal'] = str_replace( ',', '', $data['pagoTotal']);
            $data['pagoTotal'] = number_format($data['pagoTotal'], 2, '.','');

            $datos_tea = $result->return->tea;
            _log($datos_tea);
            $data['tea'] = round($datos_tea*10000)/100;
            $datos_tcea = $result->return->tcea;
            _log($datos_tcea);
            $data['tcea'] = round($datos_tcea*10000)/100;  

            $data['seguroAuto'] = $result->return->seguroAuto;
            $data['seguroAuto'] = str_replace( ',', '', $data['seguroAuto']);
            $data['seguroAuto'] = number_format($data['seguroAuto'], 2);

            $data['status'] = 1;            


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

        /*$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $cantPago    = null;
            $iniRango    = _post('cantidad');
            $meses       = _post('meses');
            $meses_pago  = null;
            $nuevo       = null;
            $minAuto     = null;
            $maxAuto     = null;
            $plazo       = null;
            $minPrestamo = null;
            $maxPrestamo = null;
            $valorAuto   = null;
            $minInicial  = null;
            $maxInicial  = null;
            $minIniPorc  = $this->minIniPorc;
            $maxIniPorc  = $this->maxIniPorc;
            $arr         = $this->array_datos;
            $nuevo       = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$iniRango))));
            
            if($meses != null) {
                $meses_pago = intval(str_replace(' ', '',str_replace('meses', '',$meses)));
                foreach ($arr as $row) {
                    if($meses_pago == $row['plazo']) {
                        $minPrestamo = $row['importeMinimo'];
                        $maxPrestamo = $row['importeMaximo'];
                        $minAuto = $minPrestamo/(1-$minIniPorc);
                        $maxAuto = $maxPrestamo/(1-$maxIniPorc);
                    }
                }
                $valorAuto = ($minAuto+$maxAuto)/2;
                $minInicial = max($valorAuto-$maxPrestamo,$valorAuto*$minIniPorc);
                $maxInicial = min($valorAuto-$minPrestamo,$valorAuto*$maxIniPorc);
            }
            
            $data['cuota_ini']   = $nuevo-round($minAuto/100)*100;
            $data['minAuto']      = round($minAuto/100)*100;
            $data['maxAuto']      = round($maxAuto/100)*100;
            $data['max_cuota']    = round($maxInicial/100)*100;
            $data['min_cuota']    = round($minInicial/100)*100;
            $data['valor_auto']   = round($valorAuto/100)*100;
            $data['cantPago']     = round($maxInicial/100)*100;
            $data['mensual']      = round($minInicial/100)*100;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));*/
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
    
    function generarCronograma() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $iniRango = _post('cantidad');
            $meses    = _post('meses');
            $fecha    = _post('fecha');
            $tipoPago = _post('tipoPago');
            $fecha != null ? $fecha = _post('fecha') : $fecha = '2017-01-01';
            $cantPago    = null;
            $meses_pago  = null;
            $int_gracia  = 115;
            if($meses != null) {
                $meses_pago = intval(str_replace(' ', '',str_replace('meses', '',$meses)));
            }
            $nuevo = intval(str_replace(',', '',str_replace(' ', '',str_replace('S/', '',$iniRango))));
            $nuevo != null ? $cantPago    = ($nuevo+$nuevo*0.3)+(($nuevo*0.3)/$meses_pago) : '';
            if($tipoPago != null) {
                $tipoPago == TIPO_PAGO_SIMPLE ? $nuevo = $nuevo/1 : $nuevo = $nuevo/2;
                $tipoPago == TIPO_PAGO_SIMPLE ? $int_gracia = $int_gracia/1 : $int_gracia = $int_gracia/2;
            }
            $monto = number_format(floatval($nuevo*0.3+(($nuevo*0.3)/$meses_pago)), 2, ',', ' ');
            $tabla = $this->__buildTablaCronograma($monto, $fecha, $int_gracia);
            $data['tabla'] = $tabla;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
    
    
    function __buildTablaCronograma($cantidad, $fecha, $int_gracia) {
        $tmpl = array('table_open'  => '<table data-toggle="table" class="table borderless" data-toolbar="#custom-toolbar"
                                               data-pagination="true" data-page-list="[5, 10, 15, 20, 25, 30, 35, 40, 45, 50]"
                                               data-show-columns="false" data-search="true" id="tb_cronograma">','table_close' => '</table>');
        $this->table->set_template($tmpl);
        $head_1 = array('data' => '#', 'class' => 'text-center color-value');
        $head_2 = array('data' => 'Fecha Pago'  , 'class' => 'text-center color-value');
        $head_3 = array('data' => 'Valor cuota'  , 'class' => 'text-center color-value');
        $head_4 = array('data' => 'TEA'  , 'class' => 'text-center color-value');
        $head_5 = array('data' => 'TCEA'  , 'class' => 'text-center color-value');
        $head_6 = array('data' => 'Desgravamen'  , 'class' => 'text-center color-value');
        $head_7 = array('data' => 'Int. Gracia'  , 'class' => 'text-center color-value');
        $this->table->set_heading($head_1,$head_2, $head_3, $head_4, $head_5, $head_6, $head_7);
//         foreach ($datos as $row) {
            $row_cell_1 = array('data' => "1"       , 'class' => 'text-center');
            $row_cell_2 = array('data' => $fecha       , 'class' => 'text-center');
            $row_cell_3 = array('data' => "S/. ".$cantidad       , 'class' => 'text-center');
            $row_cell_4 = array('data' => "30%"       , 'class' => 'text-center color-data');
            $row_cell_5 = array('data' => "34.5%"       , 'class' => 'text-center');
            $row_cell_6 = array('data' => "0.045%"       , 'class' => 'text-center');
            $row_cell_7 = array('data' => "S/. ".$int_gracia       , 'class' => 'text-center');
            $this->table->add_row($row_cell_1,$row_cell_2,$row_cell_3,$row_cell_4, $row_cell_5, $row_cell_6, $row_cell_7);
//         }
            $tabla = $this->table->generate();
        return $tabla;
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
            _log('123');
            $marca = _post('marca');
            $modelo = _post('modelo');
            $idPersona = _getSesion('idPersona');
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
            $varTcea  = _post('pors_tcea');
            $varTea   = _post('pors_tea');
            $Agencia  = _post('Agencia');
            $concesionaria = _post('concesionaria');
            $session = array(
                        'pago_total'        => $pagoTot,
                        'cuota_mensual'     => $cuotaMens,
                        'TCEA'              => $varTcea,
                        'cant_meses'        => $meses,
                        'Importe'           => $importe,
                        'sess_tea'          => $varTea,
                        'marca'            => $marca,
                        'modelo'          => $modelo
                            );
            $this->session->set_userdata($session);
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}
