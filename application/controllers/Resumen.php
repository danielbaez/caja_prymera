<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resumen extends CI_Controller {
    
    function __construct() {
        ob_start();
        parent::__construct();

        $this->load->helper("url");
        $this->load->model('M_preaprobacion');
        $this->load->model('M_usuario');
        $this->load->helper("access_helper");
        is_logged();
    }

    public function index() {
        $datos_page = $this->M_usuario->getDatosById('solicitud', 'id', _getSesion('idPersona'));
        if($datos_page[0]->last_page != N_RESUMEN) {
            redirect("/C_main", 'location');
        }
        $arrayUpdt = array('last_page' => N_RESUMEN);
        $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        $dato['tipo_producto'] = _getSesion("tipo_producto");
        $dato['pago_total']    = _getSesion('pago_total');
        $dato['nombre']        = ucfirst(_getSesion('nombre'));
        $dato['cuota_mensual'] = _getSesion('cuota_mensual');
        $dato['marca']         = _getSesion('marca');
        $dato['modelo']        = _getSesion('modelo');
        $dato['valor_auto']    = _getSesion('valor_auto');
        $dato['tcea']          = _getSesion('tcea_sess');
        $dato['cant_meses']    = _getSesion('cant_meses');
        $dato['Importe']       = _getSesion('Importe');
        $dato['cuota_inicial'] = _getSesion('cuota_inicial');
        $dato['tea']           = _getSesion('sess_tea');
        $dato['Agencia']       = _getSesion('Agencia');
        $dato['comboAgencias'] = $this->__buildComboAgencias();
        $this->load->view('v_simuladorResumen', $dato);
    }

    function __buildComboAgencias(){
        $agencias = $this->M_preaprobacion->getAgencias();
        $opt      = null;
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
            $agencia      = _post('agencia');
            $idPersona    = _getSesion('idPersona');
            $gmailAgencia = null;
            if($agencia != null) {
                $session = array('Agencia' => $agencia);
                $this->session->set_userdata($session);
                $agencia   = $this->M_preaprobacion->getAgenciasId($agencia);
                $arrayUpdt = array('agencia_desembolso' => $agencia[0]->id,
                                   'timestamp_final'    => date("Y-m-d H:i:s"),
                                   'fec_estado'         => date("Y-m-d H:i:s"),
                                   'last_page'          => N_INTRO_MAPA);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $idPersona, 'solicitud');
            }else{
              $arrayUpdt = array('timestamp_final' => date("Y-m-d H:i:s"),
                                 'fec_estado'      => date("Y-m-d H:i:s"),
                                 'last_page'       => N_INTRO_MAPA);
              
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $idPersona, 'solicitud');
            }
            $validacion   = $this->sendMailGmail();
            $gmailAgencia = $this->sendMailGmailAgencia();
            //$celular = $this->enviarMail();
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function sendMailGmail() {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
        $datos_bd  = $this->M_preaprobacion->getDireccionByAgencia(_getSesion('Agencia'));
        $direccion = $datos_bd[0]->UBICACION;
        //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'miauto@prymera.pe',
                            'smtp_pass' => '8hUpuv6da_@v',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       $poliza = null;
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $direccion = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion = $direccion[0]->UBICACION;
       $this->email->from('userauto@prymera.com');
       $this->email->to(_getSesion('email'));
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $texto                = null;
       $nombre               = _getSesion('nombre');
       $tipo_cred            = null;
       $imagen               = null;
       $credito              = null;
       $nuevo_texto          = null;
       $texto_credito        = null;
       $importe              = null;
       $terminos_condiciones = null;
       $texto_beneficios     = null;
       $texto_hacer          = null;
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $importe = _getSesion('Importe') : $importe = 'S/ '._getSesion('Importe');
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $texto_hacer = '<p style="color: #fff;margin-left: 40px;">Acércate a la agencia de '._getSesion('Agencia').', ubicada en '.$ubicacion.' </br> En el horario de atención: Lunes a Viernes de 9:00am a 6:00pm.</br>y sábados de 8:00am a 1:00pm.</p>' : $texto_hacer = '<p style="color: #fff;margin-left: 40px;">No te preocupes, un agente de la agencia Independencia ubicada en C.C. Plaza Norte, Av. Alfredo Mendiola 1400. 1er Nivel se contactará a la brevedad para confirmar tus datos  y coordinar la firma y/o recojo de documentos.
         </br>
         Si tienes alguna duda y prefieres ir a la agencia '._getSesion('Agencia').' puedes dirigirte a '.$ubicacion.' en el horario de atención: Lunes a viernes de 09:00 a.m. a 6:00 p.m. </br>Sábados de 09:00 a.m. a 1:00 p.m.</p>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $texto_beneficios = '<p style="color: #fff;margin-left: 40px;">Si deseas un '.$credito.' '.$nuevo_texto.' con un monto mayor al pre-aprobado, debes llevar tu última boleta de pago para que podamos evaluarte.</p>' : $texto_beneficios = '<p style="color: #fff;margin-left: 40px;">Si deseas un '.$credito.' '.$nuevo_texto.' con un monto mayor al pre-aprobado, debes llevar las 3 últimas boletas de pago(ingreso fijo o variable) y el estado de cuenta vigente de tarjetas de crédito u otros créditos que poseas, para que podamos evaluarte.</p>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $texto_presentar = '<p style="color: #fff;margin-left: 40px;">. Tu DNI vigente</p>
                        <p style="color: #fff;margin-left: 40px;padding: 0px;margin: -11px 40px;">. Un recibo de un servicio (máximo 2 meses de antigüedad)</p>
                        <p style="color: #fff;margin-left: 40px;">. Las 2 últimas boletas de pago si tus ingresos son fijos</p>
                        <p style="color: #fff;margin-left: 40px;padding: 0px;margin: -11px 40px;">. Las 3 últimas boletas de pago si tus ingresos son variables</p>' : $texto_presentar = '<p style="color: #fff;margin-left: 40px;padding: 0px;margin: -11px 40px;">Tu DNI vigente y  un recibo de un servicio </br> (máximo 2 meses de antigüedad).</p>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $credito = 'Cr&eacute;dito Consumo' : $credito = 'Cr&eacute;dito Vehicular';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $nuevo_texto = '"Mi Cash"' : $nuevo_texto = '"Auto de Prymera"';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $tipo_cred = 'Cr&eacute;dito Mi Cash' : $tipo_cred = 'Cr&eacute;dito Vehicular Auto de Prymera';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $poliza = '' : $poliza = '<p>Seguro: '._getSesion('seguro').'</p>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $texto_credito = '<h1 style="color: #fff;margin-left: 40px;padding-top: 40px;">Desembolsar tu crédito </br> pre-aprobado es fácil</h1>' : $texto_credito = '<h1 style="color: #fff;margin-left: 40px;padding-top: 40px;">Quiero desembolsar </br>mi crédito pre-aprobado</h1>';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $imagen = 'IMG-Consumo1.png' : $imagen = 'IMG-Vehicular1.png';
       _getSesion('tipo_producto') == PRODUCTO_MICASH ? $terminos_condiciones = '“La oferta pre-aprobada cumplirá las siguientes condiciones: CRÉDITO CONSUMO MI CASH, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO CONSUMO MI CASH, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.

Mayor información y costos (Tasas de interés, comisiones y gastos) están disponibles en nuestro tarifario vigente publicado en nuestras oficinas y página web www.prymera.com.pe. Todas las operaciones relacionadas están afectas al ITF 0.005%. La empresa tiene la obligación de difundir información de conformidad con la Ley N° 28587 y sus modificatorias, el Reglamento de Transparencia de Información y Disposiciones Aplicables a la Contratación con Usuarios del Sistema Financiero, aprobado mediante resolución SBS 8181 – 2012. * Ejemplo: Si retiras S/ 2,000 a 36 meses, pagarás lo siguiente: 36 cuotas mensuales de S/ 111.22, total de intereses S/ 1,935.63, monto total de seguro S/ 68.87, TCEA 65.8%. La cuota es referencial pudiendo variar según la fecha de desembolso del crédito y sujeto a variación por cargos, comisiones y seguros.”' : $terminos_condiciones = '“La oferta pre-aprobada cumplirá las siguientes condiciones: CRÉDITO AUTO DE PRYMERA, este producto es ofertado a los clientes que estén en la base de datos de Prymera, previamente evaluados y con condición de pre-aprobados. Los clientes que no estén en la base de datos de Prymera y estén interesados en el producto, estarán sujetos a evaluación crediticia. Los clientes pre-aprobados de la base de datos de Prymera, serán contactados por el Personal de Prymera y deberán acercarse a cualquier agencia de Prymera con la documentación requerida para obtener su CRÉDITO AUTO DE PRYMERA, debiendo hacerlo dentro del plazo de oferta que se le indique, siendo que, si se acerca a agencia fuera del plazo indicado, podrá estar sujeto a pasar una nueva evaluación crediticia por la variación de su calificación en la central de riesgos.

Financiamiento Regular: Valido sólo para personas naturales con edad Min. 24 años y Max. 70 años, sujeto a condición de la vigencia Max. del seguro de desgravamen, y con condición de Trabajadores Dependientes con Min. 12 meses de antigüedad laboral. El cliente debe tener la condición de calificación NORMAL (RCC) en la Central de Riesgos en los últimos 12 meses. El cliente no debe registrar créditos vencidos, en cobranza judicial y/o castigada en los últimos 24 meses. Se financia hasta el 90% del valor del vehículo, Financiamiento Min S/10,000 o USD $ 4,500 y Max. S/ 150,000 o USD $ 45,000. El desembolso del crédito se abona directamente al concesionario o proveedor. Crédito otorgado en moneda nacional. Financiamiento entre 12 y Máx. a 60 cuotas mensuales. Periodo de gracia según calificación: Máx. 60 días calendario. El crédito puede ser solicitado solo en las Agencias de Plaza Norte, Mall del Sur y Miraflores de Prymera.';
       $texto = '<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <meta charset="utf-8">
                      <meta http-equiv="X-UA-Compatible" content="IE=edge">
                      <meta name="viewport" content="width=device-width, initial-scale=1">
                      <style type="text/css">
                        @media (min-width: 850px) and (max-width: 1028px) { 
                          .logo-img {
                            max-width: 250px !important;
                          }
                          .img-credit {
                            margin-left: 70px !important;
                          }
                          .container-tabla {
                            width: 55% !important;
                            z-index: 1000;
                          }
                      }
                      @media (min-width: 550px) and (max-width: 850px) { 
                          .logo-img {
                            max-width: 200px !important;
                            margin-top: -80px !important;
                          }
                          .img-credit {
                                top: 148px;
                              max-width: 450px;
                              margin-left: 45px !important;
                          }
                          .container-tabla {
                          width: 65% !important;
                          z-index: 1000;
                          }
                      }
                      @media (min-width: 1028px) and (max-width: 1250px) { 
                          .img-credit {
                            margin-left: 70px !important;
                          }
                          .container-tabla {
                            width: 48% !important;
                            z-index: 1000;
                          }
                      }
                      @media (min-width: 300px) and (max-width: 550px) { 
                        .img-credit {
                                top: 148px;
                              max-width: 300px !important;
                              margin-left: 10px !important;
                          }
                          .container-tabla {
                            width: 85% !important;
                            z-index: 1000;
                          }
                      }
                      }
                      @media (min-width: 1250px) and (max-width: 1350px) { 
                        .container-tabla {
                            /*width: 35% !important;*/
                          }
                      }
                      </style>
                  </head>
                  <body>
                    <div style="    margin: auto;width: 100%;max-width: 600px;height: 2000px;">
                      <div class="container-fluid" style="max-width: 600px;background-color: #0060aa;border-top-left-radius: 40px;">
                        <div class="container" style="width: 600px; max-width: 100%; margin: 0 auto; background-color: #0060aa;padding-bottom: 30px;">
                           <div class="row padding-div-row-header" style="display: flex;
                         align-items: center;">
                             <div class="col-xs-6 col-title-header-padding" style="max-width: 50%; width: 50%; padding-left: 10px;padding-top: 19px;">
                               <h1 class="title-header-first" style="    color: #FFFFFF;
                         font-size: 16px;
                         margin-bottom: 0;"><span>'.$credito.'</span></h1>
                               <h1 class="title-header-second" style="color: #FFFFFF;
                         font-size: 32px;
                         margin-top: 0;"><span>'.$nuevo_texto.'</span></h1>
                             </div>
                             <div class="col-xs-6 div-logo" style="max-width: 50%; width: 50%; padding-right: 10px;padding-top: 13px;">
                               <a href="http://www.prymera.com.pe/" target="_blank"><img alt="" class="img-responsive pull-right img-header" src="'.RUTA_IMG.'/fondos/Logo-Prymera-Blanco.png" style="width: 300px; display: block;
                         max-width: 100%;
                         height: auto;"></a>
                               <h1 style="display: none">Dashboard</h1>
                             </div>
                           </div>    
                         </div>
                  <!--<div class="container-header" style="background-color: #0060aa;height: 115px;">
                        <h3 style="font-size: 16px;color: #fff;font-weight: lighter;margin-left: 40px;margin: 0 35px;padding-top: 35px;">'.$credito.'</h3>
                        <h1 style="font-size: 25px;color: #fff;margin-left: 40px;margin-top: 1px;">'.$nuevo_texto.' <img class="logo-img" src="'.RUTA_IMG.'/fondos/Logo-Prymera-Blanco.png" style="width: 300px;float: right; padding: 0px 20px;margin: -42px 0px;"></h1>
                      </div>-->
                      <div class="container-body" style="text-align: center;margin-top: -20px;">
                        <!--<img src="'.RUTA_IMG.'/fondos/Background.jpg" style="width: 100%;height: 500px;">-->
                        <img class="img-credit" src="'.RUTA_IMG.'/fondos/'.$imagen.'" style="max-width: 600px;margin: auto;">
                      </div>
                      <div class="containet-text" style="width: 100%;height: 360px;background-color: #f1f1f1;margin-top: -30px;font-weight: bold;">
                        <h1 class="title-container" style="color: #378fb7;padding: 30px 40px 0;"> ¡'.$nombre.' </br> te damos la bienvenida!</h1>
                        <h3 class="text-container" style="color: #378fb7;font-weight: lighter;margin-left: 40px;position: relative;margin-bottom: 30px;">A continuación detallamos las condiciones </br> del '.$tipo_cred.' que solicitaste.</h3>
                        <div class="container-tabla" style="width: 90%;z-index: 1000;height: 220px;background-color: #fff;border-bottom-right-radius: 40px;border-top-left-radius: 40px;border: 1px solid #378fb7;position: relative;margin: 0 auto;margin-top: 5px;">
                          <div class="contenido" style="border: 1px solid #dadada;border-left: transparent;border-top: transparent;border-right: transparent;width: 80%;margin: 0 35px;">
                            <h3 style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;margin: 10px 0;">Importe: </h3>
                            <p style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;text-align: right;margin: 10px 0;"> '.$importe.'</p>
                          </div>
                          <div class="contenido" style="border: 1px solid #dadada;border-left: transparent;border-top: transparent;border-right: transparent;width: 80%;margin: 0 35px;">
                            <h3 style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;margin: 10px 0;">Plazo: </h3>
                            <p style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;text-align: right;margin: 10px 0;"> '._getSesion('cant_meses').'</p>
                          </div>
                          <div class="contenido" style="border: 1px solid #dadada;border-left: transparent;border-top: transparent;border-right: transparent;width: 80%;margin: 0 35px;">
                            <h3 style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;margin: 10px 0;">Cuota: </h3>
                            <p style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;text-align: right;margin: 10px 0;"> '._getSesion('cuota_mensual').'</p>
                          </div>
                          <div class="contenido" style="border: 1px solid #dadada;border-left: transparent;border-top: transparent;border-right: transparent;width: 80%;margin: 0 35px;">
                            <h3 style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;margin: 10px 0;">TEA: </h3>
                            <p style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;text-align: right;margin: 10px 0;"> '._getSesion('sess_tea').'</p>
                          </div>
                          <div class="contenido" style="border-left: transparent;border-top: transparent;border-right: transparent;width: 80%;margin-left: 40px;margin-top: -10px;">
                            <h3 style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;margin: 10px -5px;">TCEA: </h3>
                            <p style="color: #378fb7;font-weight: lighter;width: 48%;display: inline-block;text-align: right;margin: 10px 5px;"> '._getSesion('tcea_sess').'</p>
                          </div>
                        </div>
                        <div style="background-color: #378fb7;height: 520px;margin: -172px 0px;border-bottom-right-radius: 40px;">
                        '.$texto_credito.'
                        <p style="color: #fff;top: 153px;margin-left: 40px;font-size: 18px;">¿Qué debo hacer?</p>
                        '.$texto_hacer.'
                        <p style="color: #fff;margin-left: 40px;font-size: 18px;">¿Qué debo presentar?</p>
                        '.$texto_presentar.'
                        <p style="color: #fff;top: 153px;margin-left: 40px;font-size: 18px;">¡Más beneficios para ti!</p>
                        '.$texto_beneficios.'
                        </br>
                        <p style="color: #fff;margin-left: 40px;font-size: 18px;">¡No pierdas la oportunidad de cumplir tus sueños, te esperamos!</p>
                        </div>
                        </br>
                        <div style="height: 350px;padding-top: 40px;">
                          <div style="padding: 20px;border: 1px solid;height: 115px;font-size: 8px;">
                            '.$terminos_condiciones.'
                          </div>
                        </div>
                    </div>
                  </body>
                  </html>';
       $this->email->message($texto);
       $this->email->send();
       $arrayUpdt = array('envio_email' => 1,);
       $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            $arrayUpdt = array('envio_email' => 2);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
      }
      return json_encode(array_map('utf8_encode', $data));
     }

     function enviarMail() {
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
          $tipo_cred   = null;
          $mensaje     = null;
          $texto_envio = null;
          $fecha       = explode('-', date("Y-m-d"));
          $fecha_new   = $fecha[1].'-'.($fecha[2]+10);
          $newDate     = date("d-m-Y", strtotime($this->_data_last_month_day()));
          _getSesion("tipo_producto") == PRODUCTO_MICASH ? $tipo_cred = 'Mi Cash' : $tipo_cred = 'Vehicular';
          _getSesion("tipo_producto") == PRODUCTO_MICASH ? $mensaje = _getSesion('Importe') : $mensaje = 'S/ '._getSesion('Importe');
          _getSesion("tipo_producto") == PRODUCTO_MICASH ? $texto_envio = _getSesion('nombre').' ven a Prymera por tus '._getSesion('Importe').' hasta '.$newDate.'. TCEA '._getSesion('tcea_sess').' a '._getSesion('cant_meses').'. Cond. al 243-4800' : $texto_envio = _getSesion('nombre').' ven por tu Auto de Prymera S/'._getSesion('Importe').' hasta '.$fecha_new.'. TCEA '._getSesion('tcea_sess').' a '._getSesion('cant_meses').'. Cond. al 243-4800';
          //twilio enviar msn
          $this->load->library('twilio');
          $from = '786-220-7333';
          $to = '+51 '._getSesion('nro_celular');
          $message = $texto_envio;
          $response = $this->twilio->sms($from, $to, $message);
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

     function sendMailGmailAgencia(){
      $data['error'] = EXIT_ERROR;
        $data['msj'] = null;
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
       $poliza        = null;
       $data_correo   = $this->M_preaprobacion->getCorreoByAgencia(_getSesion('Agencia'));
        $arrayCorreos = array();
        foreach ($data_correo as $key) {
          array_push($arrayCorreos, $key->CORREO);
        }
        $correos = implode(',', $arrayCorreos);//estos correos se envian

       //cargamos la configuración para enviar con gmail6
       $this->email->initialize($configGmail);
       $direccion   = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $data_correo = $this->M_preaprobacion->getDireccionAgencia(_getSesion('Agencia'));
       $ubicacion   = $direccion[0]->UBICACION;
       $correo      = $data_correo[0]->CORREO;
       $this->email->from('userauto@prymera.com');
       $this->email->to('jsociety.pe@gmail.com');
       $this->email->subject('Bienvenido/a a Caja Prymera');
       $texto     = null;
       $nombre    = _getSesion('nombre');
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
       $arrayUpdt = array('envio_email' => 1,);
       $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
            $arrayUpdt = array('envio_email' => 2);
            $this->M_preaprobacion->updateDatosCliente($arrayUpdt,_getSesion('idPersona') , 'solicitud');
      }
      return json_encode(array_map('utf8_encode', $data));
     }

    function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
    }
}

