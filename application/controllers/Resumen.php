<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumen extends CI_Controller {
    
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
        if (! isset($_COOKIE[__getCookieName()])) {
            redirect("/", 'location');
        }
    }

    public function index()
    {
      //_log(print_r($this->session->userdata(), true));
        if(_getSesion("usuario") == null && _getSesion("nombre") == null || _getSesion('conectado') == 0) {
            //redirect("/C_main", 'location');
        }
        $dato['nombreDato']=':D';
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['pago_total'] = _getSesion('pago_total');
        $dato['nombre'] = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['marca'] = _getSesion('marca');
        $dato['modelo'] = _getSesion('modelo');
        $dato['valor_auto'] = _getSesion('valor_auto');
        $dato['tcea'] = _getSesion('TCEA');
        $dato['cant_meses'] = _getSesion('cant_meses');
        $dato['Importe'] = _getSesion('Importe');
        $dato['cuota_inicial'] = _getSesion('cuota_inicial');
        $dato['tea'] = _getSesion('sess_tea');
        $dato['Agencia'] = _getSesion('Agencia');
        $dato['comboAgencias'] = $this->__buildComboAgencias();
        $this->load->view('v_micash_resumen', $dato);
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

    function setearAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia = _post('agencia');
            $idPersona  = _getSesion('idPersona');
            $gmailAgencia = null;
            if($agencia != null) {
                $session = array('Agencia' => $agencia);
                $this->session->set_userdata($session);
                $agencia = $this->M_preaprobacion->getAgenciasId($agencia);
                $arrayUpdt = array('agencia_desembolso' => $agencia[0]->id,
                                'timestamp_final'   => date("Y-m-d H:i:s"),
                                'fec_estado' => date("Y-m-d H:i:s"));
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            }else if(_getSesion('Agencia') != null) {
              $arrayUpdt = array('agencia_desembolso' => _getSesion('Agencia'),
                                'timestamp_final'   => date("Y-m-d H:i:s"),
                                'fec_estado' => date("Y-m-d H:i:s"));
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,$idPersona , 'solicitud');
            }
            $validacion = $this->sendMailGmail();
            $gmailAgencia = $this->sendMailGmailAgencia();
            $celular = $this->enviarMail();
//             $datoInsert = $this->M_preaprobacion->insertarDatosCliente($session, 'tipo_producto');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function sendMailGmail(){
      $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
      try {  
          //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465,
       'smtp_user' => 'miauto@prymera.pe',
       'smtp_pass' => '8hUpuv6da_@v',
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       $poliza = null;
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('userauto@prymera.com');
       $this->email->to(_getSesion('email'));
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $texto = null;
       $nombre = _getSesion('nombre');
       $tipo_cred = null;
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Cr&eacute;dito Mi Cash' : $tipo_cred = 'Cr&eacute;dito Vehicular Auto de Prymera';
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $poliza = '' : $poliza = '<p>Seguro: '._getSesion('seguro').'</p>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $texto = '<p style="font-size: 10px;margin-left: 120px">“La oferta pre-aprobada cumplirá las siguientes condiciones:
CRÉDITO CONSUMO MI CASH, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO CONSUMO MI CASH, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.
Valido sólo para personas naturales con edad Min. 23 años y Max. 70 años con condición de Trabajadores Dependientes con Min. 6 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 6 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Monto Mín. del crédito: S/ 1000 y Máx. S/ 15000. No aplica para compra de deuda. Crédito otorgado sólo en moneda nacional. Financiamiento entre 06 y Máx. a 36 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado en cualquiera de las agencias de Prymera.
Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si retiras S/ 2,000 a 36 meses, pagarás lo siguiente: 36 cuotas mensuales de S/ 111.22, total de intereses S/ 1,935.63, monto total de seguro S/ 68.87, TCEA 65.8%. La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros.”</p>' : $texto = '“La oferta pre-aprobada cumplirá las siguientes condiciones:
CRÉDITO AUTO DE PRYMERA, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO AUTO DE PRYMERA, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.
Financiamiento Regular. Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia hasta el 90% del valor del vehículo, Financiamiento Min S/10,000 o USD $ 4,500 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Financiamiento entre 12 y Máx. a 60 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo, No aplica para financiar cuatrimotos, motos lineales o acuáticas o mototaxis (afines). 
Financiamiento Compra Inteligente. Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia en 36 cuotas mensuales hasta el 100% del valor del vehículo, donde el 60% del valor se reparten en 35 cuotas mensuales de igual monto y el 40% en la última cuota (36) incluyendo los intereses correspondientes, con la opción de poder pagar la última cuota (40%) o pagar el saldo del crédito a 24 cuotas adicionales, según lo acordado en el crédito vehicular. Monto del crédito Min S/75,000 o USD $ 25,000 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera. Se financia adquisición de vehículo de 4 ruedas nuevo y sólo de gama media – alta.
Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. El monto del seguro vehicular es referencial dependerá de la marca y modelo que el cliente elija, pudiendo variar en caso el cliente opte por un seguro vehicular particular y no el de Prymera.  La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si se desembolsa S/ xx,000 a xx meses, pagarás lo siguiente: xx cuotas mensuales de S/ xxxxxx, total de intereses S/ xxxxxxxx, monto total de seguro desgravamen xxxxx, y monto total de seguro xxxxx TCEA xxxxx% La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros. “';
       $this->email->message('<h1 style="text-align: center;"><strong>'.$tipo_cred.'</strong></h1>
<h4 style="text-align: center;">'.ucfirst($nombre).' Te damos la bienvenida a Prymera!</h4>
<h4 style="margin-left: 100px;">A continuaci&oacute;n detallamos las condiciones del '.$tipo_cred.' que solicitaste:</h4>

<p style="margin-left: 120px;">Importe del pr&eacute;stamo: '._getSesion('Importe').' </p>
<p style="margin-left: 120px;">Plazo: '._getSesion('cant_meses').'</p>
<p style="margin-left: 120px;">Cuota: '._getSesion('cuota_mensual').'</p>
<p style="margin-left: 120px;">TEA: '._getSesion('sess_tea').'</p>
<p style="margin-left: 120px;">TCEA: '._getSesion('TCEA').'</p>
'.$poliza.'

<h3 style="margin-left: 100px;"><strong>Quiero gestionar mi cr&eacute;dito pre aprobado &iquest;Qu&eacute; debo hacer?</strong></h3>
<p style="margin-left: 120px;">Acércate a la agencia: “'._getSesion('Agencia').'” ubicada en '.$ubicacion.'.</p>

<h3 style="margin-left: 100px;"><strong>&iquest;Qu&eacute; debo presentar?</strong></h3>
<p style="margin-left: 120px;">- Tu DNI vigente </p>
<p style="margin-left: 120px;">- Un recibo de servicio (m&aacute;ximo 2 meses de antigüedad).</p>

<h3 style="margin-left: 100px;"><strong>¡M&aacute;s Beneficios para ti!</strong></h3>
<p style="margin-left: 120px;">Si deseas un cr&eacute;dito con un monto mayor al pre-aprobado, debes llevar tu &uacute;ltima boleta de </p>
<p style="margin-left: 120px;">pago para que podamos evaluarte.</p>

<p style="margin-left: 120px;">¡No pierdas la oportunidad de cumplir tus sueños, te esperamos!</p>
'.$texto.'');
       $this->email->send();
       
      //_log(print_r($this->email->print_debugger(), true));
       $arrayUpdt = array('envio_email' => 1,);
       $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            $arrayUpdt = array('envio_email' => 2);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
            //$data['msj'] = $e->getMessage();
            //return json_encode(array_map('utf8_encode', array(1)));
      }
      return json_encode(array_map('utf8_encode', $data));
     }

     function enviarMail() {
      //_log('456');
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
          $tipo_cred = null;
        _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Mi Cash' : $tipo_cred = 'Vehicular';
          //twilio enviar msn
        $this->load->library('twilio');
        $from = '786-220-7333';
        $to = '+51 '._getSesion('nro_celular');
        $message = 'Su credito: '.$tipo_cred.' por '._getSesion('Importe').' a '._getSesion('cant_meses').'. Su cuota es '._getSesion('cuota_mensual').' Condiciones al 243-4800';
        $response = $this->twilio->sms($from, $to, $message);
        //_log(print_r($response, true));
        if($response->IsError) {
          $arrayUpdt = array('envio_sms' => 2);
          $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        }
        else {
              $arrayUpdt = array('envio_sms' => 1);
              $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
              $data['error'] = EXIT_ERROR;
            }    
        }catch (Exception $e){
          $data['error'] = EXIT_ERROR;
        }
      return json_encode(array_map('utf8_encode', $data));
    }

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

     function sendMailGmailAgencia(){
      $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
      try {  
          //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465,
       'smtp_user' => 'miauto@prymera.pe',
       'smtp_pass' => '8hUpuv6da_@v',
       'mailtype' => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n"
       );    
       $poliza = null;
       
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('userauto@prymera.com');
       $this->email->to('jsociety.pe@gmail.com');
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $texto = null;
       $nombre = _getSesion('nombre');
       $tipo_cred = null;
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Cr&eacute;dito Mi Cash' : $tipo_cred = 'Cr&eacute;dito Vehicular Auto de Prymera';
       _getSesion("tipo_producto") == PRODUCTO_MICASH ? $poliza = '' : $poliza = '<p>Seguro: '._getSesion('seguro').'</p>';
       $this->email->message('<body>
                                  <h2 style="text-align: center;color: #0152aa;">Estimado Colaborador:</h2>

                                  <p style="text-align: center;color: black;">Es un gusto saludarlo e informarle que el siguiente cliente ha solicitado un cr&eacute;dito &quot;'.$tipo_cred.'&quot;. Por favor cont&aacute;ctelo a la brevedad y realice el seguimiento respectivo hasta el desembolso de su cr&eacute;dito.</p>

                                  <p style="margin-left: 30px;color: black;">Agradecemos de antemano su colaboraci&oacute;n.</p>
                                   
                                  <h3 style="margin-left: 30px;color: #0152aa;">Datos del cliente:</h3>
                                  <p style="margin-left: 30px;color: black;"></p>
                                  <p>Nombres: '.ucfirst($nombre).'</p>
                                  <p>Apellidos: '.ucfirst(_getSesion('apellido')).'</p>
                                  <p>DNI: '._getSesion('dni').'</p>
                                  <p>Tel&eacute;fono: '._getSesion('nro_celular').'</p>
                                  <p>Correo electr&oacute;nico: '._getSesion('email').'</p>
                                  <p>Agencia seleccionada: '._getSesion('Agencia').'</p>
                                   
                                   
                                  <h3 style="margin-left: 30px;color: #0152aa;">Datos del Crédito:</h3>
                                  <p style="margin-left: 30px;color: black;"></p>
                                  <p>Nro. Solicitud:</p>
                                  <p>Importe: '._getSesion('Importe').'</p>
                                  <p>Plazo: '._getSesion('cant_meses').'</p>
                                  <p>Cuota: '._getSesion('cuota_mensual').'</p>
                                  <p>TEA: '._getSesion('sess_tea').'</p>
                                  <p>TCEA: '._getSesion('TCEA').'</p>
                                </body>');
       $this->email->send();
       
      //_log(print_r($this->email->print_debugger(), true));
       $arrayUpdt = array('envio_email' => 1,);
       $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
       //con esto podemos ver el resultado
       //var_dump($this->email->print_debugger());
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            $arrayUpdt = array('envio_email' => 2);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
            //$data['msj'] = $e->getMessage();
            //return json_encode(array_map('utf8_encode', array(1)));
      }
      return json_encode(array_map('utf8_encode', $data));
     }
}

