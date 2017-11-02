<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->helper('cookie');
        $this->load->model('M_usuario');
        $this->load->model('M_preaprobacion');

    }
    
    public function asignarSupervisor()
    {       
        if(_getSesion('query') == 1) {

        }
        $this->session->set_userdata(array('query' => 0));
        $data['personales'] = $this->M_usuario->getPersonalByRol();
        $this->load->view('v_asignarSupervisor', $data);
    }

    public function nuevaSolicitud()
    {       
        $this->load->view('v_nuevaSolicitud', []);
    }

    public function detalleUsuario()
    {
        $id = _post('id');
        $detalle = $this->M_usuario->detalleUsuario($id);
        echo json_encode($detalle);
    }

    public function autocompleteGetJefe()
    {
        $asesores = $this->M_usuario->buscarSupervisor(_post('supervisor'));
        echo json_encode($asesores);
        //echo '[{"name": "Afghanistan", "code": "AF"}]';
    }

    function actualizarTabla() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html = null;
            $id = _post('id');
            //$session = array('nombre_jefe'  => $nombre);
            //$this->session->set_userdata($session);
            if($id == null) {
                throw new Exception("Ingrese el nombre", 1);
            }
            /*$id    = $this->M_usuario->getIdUsuarioByNombre($nombre);
            $datos = $this->M_usuario->getDatosTablaAsesor($id[0]->id);
            foreach ($datos as $key) {
                $html .= '<tr>
                            <td>
                               <input type="checkbox" id="check_'.$key->id.'" name="id_asesor[]" value="'.$key->nombre.'">
                            </td>                    
                            <td>'.$key->nombre.'</td>
                            <td>'.$key->rol.'</td>
                            <td>'.$key->agencia.'</td>
                          </tr>';
            }
            $data['html'] = $html;*/
            $data['comboAgencias'] = $this->__buildComboAgencias($id);
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function guardarPersonalAsignado() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $datos = _post('personalAsignado');
            $agencia = _post('agencia');
            $array_asesores = array();
            $asesores = explode("-", $datos);
            $html = null;
            foreach ($asesores as $key) {
                if($key != null || $key != '') {
                    array_push($array_asesores, $key);
                }
            }
            $datosAsesor = $this->M_usuario->getDatosTablaAsesor();
            foreach ($datosAsesor as $key) {
                        $html .= '<tr id="check_'.$key->id.'">
                                    <td>
                                       <input type="checkbox" data-nombre="'.$key->nombre.'" data-rol="'.$key->rol.'" data-agencia="'.$key->agencia.'" name="id_asesor[]" value="'.$key->nombre.'">
                                    </td>                    
                                    <td>'.$key->nombre.'</td>
                                    <td>'.$key->rol.'</td>
                                    <td>'.$key->agencia.'</td>
                                  </tr>';
            }
            $arrayUpdt = array('id_agencia' => $agencia);
            $mensajes = $this->M_usuario->updateDatosAsesor($arrayUpdt,$array_asesores , 'usuario');
            $data['html'] = $html;
            $data['msj'] = $mensajes['msj'];
            $data['error'] = $mensajes['error'];
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }


    function __buildComboAgencias($id){
        $agencias = $this->M_usuario->getAgenciasSupervisor($id);
        $opt = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->AGENCIA));
            $opt .= '<option value="'.$age->id.'"> '.$agen.'</option>';
        }
        return $opt;
    }

    function logout()
    {
        $this->load->helper("url");
        $this->session->sess_destroy();
        redirect('/');  
    }

    function borrarAsignados() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id_asesor = _post('id_asesor');
            $id_pers = _post('id_pers');
            //_log(print_r($id_asesor, true));
            $asesores = explode("-", $id_asesor);
            $array_glob = array();
            $html = "";
            $p = "";
            $cabecera = "";
            _log(COUNT($asesores));
            foreach ($asesores as $key) {
                if(COUNT($asesores) == 2) {
                    if($key != 'null') {
                        array_push($array_glob, $key);
                    }
                }else {
                    if($key != 'null' && $key != $id_pers) {
                        array_push($array_glob, $key);
                    }
                }
            }
            $datosAsesor = $this->M_usuario->getDatosNuevosTablaAsesor($array_glob);
            foreach ($datosAsesor as $key) {
                _log(print_r($key, true));
                        $html .= '<tr id="check_'.$key->id.'">
                                    <td>
                                       <input type="checkbox" data-nombre="'.$key->nombre.'" data-apellido="'.$key->apellido.'" data-rol="'.$key->rol.'" data-agencia="'.$key->agencia.'" name="id_asesor[]" value="'.$key->id.'">
                                    </td>                    
                                    <td>'.$key->nombre.' '.$key->apellido.'</td>
                                    <td>'.$key->rol.'</td>
                                    <td>'.$key->agencia.'</td>
                                  </tr>';
                      $cabecera = '<div class="table-responsive">
                                    <table id="tabla-personal" class="table table-bordered">
                                      <thead>
                                        <tr class="tr-header-reporte">
                                          <th class="text-center widht-opt-select">Opt</th>
                                          <th class="text-center">Nombres</th>
                                          <th class="text-center">Rol</th>
                                          <th class="text-center">Agencia</th>
                                        </tr>
                                      </thead>
                                      <tbody class="agregar">
                                             '.$html.'            
                                      </tbody>
                                    </table>
                                </div>';
            }
            $data['html'] = $cabecera;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    /*function actualizarTablas() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $nombres = _post('personalAsignado');
            $asesores = explode("-", $nombres);
            $array_glob = array();
            $html = "";
            foreach ($asesores as $key) {
                if($key != 'null') {
                    array_push($array_glob, $key);
                }
            }
            $datosAsesor = $this->M_usuario->getDatosNuevosTablaAsesor($array_glob);
            foreach ($datosAsesor as $key) {
                        $html .= '<tr id="check_'.$key->id.'">
                                    <td>
                                       <input type="checkbox" data-nombre="'.$key->nombre.'" data-rol="'.$key->rol.'" data-agencia="'.$key->agencia.'" name="id_asesor[]" value="'.$key->nombre.'">
                                    </td>                    
                                    <td>'.$key->nombre.'</td>
                                    <td>'.$key->rol.'</td>
                                    <td>'.$key->agencia.'</td>
                                  </tr>';
            }
            $data['html'] = $html;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }*/

    function getAsesoresByAgencia() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $agencia = _post('agencia');
            $html = null;
            $cabecera = null;
            if($agencia == null) {
                throw new Exception("Seleccione una agencia", 1);
                
            }
            $datosAsesor = $this->M_usuario->getDatosAsesoresByAgencia($agencia);
            foreach ($datosAsesor as $key) {
                        $html .= '<tr id="check_'.$key->id.'">
                                    <td>
                                       <input type="checkbox" data-nombre="'.$key->nombre.'" data-apellido="'.$key->apellido.'" data-rol="'.$key->rol.'" data-agencia="'.$key->agencia.'" name="id_asesor[]" value="'.$key->id.'">
                                    </td>                    
                                    <td>'.$key->nombre.' '.$key->apellido.'</td>
                                    <td>'.$key->rol.'</td>
                                    <td>'.$key->agencia.'</td>
                                  </tr>';
                        $cabecera = '<div class="table-responsive">
                                        <table id="tabla-personal" class="table table-bordered">
                                          <thead>
                                            <tr class="tr-header-reporte">
                                              <th class="text-center widht-opt-select">Opt</th>
                                              <th class="text-center">Nombres</th>
                                              <th class="text-center">Rol</th>
                                              <th class="text-center">Agencia</th>
                                            </tr>
                                          </thead>
                                          <tbody class="agregar">
                                                 '.$html.'            
                                          </tbody>
                                        </table>
                                    </div>';
            }
            $data['html'] = $cabecera;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function verifyEmailAndDNI()
    {
        $dni = _post('dni');
        $email = _post('email');
        $id_usuario = _post('id_usuario');
        $action = _post('action');
        $response = $this->M_usuario->verifyEmailAndDNI($dni, $email, $id_usuario, $action);

        echo json_encode($response);
    }
}

