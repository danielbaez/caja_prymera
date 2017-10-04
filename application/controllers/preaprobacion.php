<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class preaprobacion extends CI_Controller {
    
    private $sueldo = null;
    
    function __construct() {
        ob_start();
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('table');
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
        $data['email']='jhiberico@hotmail.com';
        $nombre = $this->session->userdata('nombre');

        $importeMaximo = _getSesion('importeMaximo');
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
        'mi_cash' == PRODUCTO_MICASH  ? $titulo = 'Felicidades!!! Tienes un pr&eacute;stamo pre aprobado' : $titulo = '';
        
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
        $data['importeMinimo']      = $importeMinimo;


        try 
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
            $data['tea'] = $result->return->tea;
            $data['tcea'] = $result->return->tea;
            $data['pagoTotal'] = $data['cuotaMensual'] * $data['plazo_max'];

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


        $this->load->view('view_preaprobacion', $data);
    }
    
    function changeValues() {

        try 
          {
            $cantidad = preg_replace("/[^0-9]/","",_post('cantidad'));
            $meses = preg_replace("/[^0-9]/","",_post('meses'));

            //resultado 1 -- ok
          //resultado 3: token
            //resultado 2: error del servidor
          //resultado 0 : rechazado
          $client = new SoapClient('http://li880-20.members.linode.com:8080/PrymeraScoringWS/services/GetDatosCreditoVehicular?wsdl');

           $params = array('token'=> 'E928EUXP',
                                  'documento'=>_getSesion('dni'),
                                  'Importe'=> $cantidad,
                                  'plazo' => $meses
                    );

          $result = $client->GetDatosCreditoCash($params);
          $res = $result->return->resultado;
          if($res == 1){
            $documento = $result->return->documento;
            $data['cuotaMensual'] = $result->return->cuotaMensual;
            $data['tea'] = $result->return->tea;
            $data['tcea'] = $result->return->tea;
            $data['pagoTotal'] = $data['cuotaMensual'] * $meses;

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
                        $minPrestamo = $row['mont_min'];
                        $maxPrestamo = $row['mont_max'];
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
}

