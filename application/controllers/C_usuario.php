<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->output->set_header(CHARSET_ISO_8859_1);
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
            $nombre = __getTextValue('nombre');
            $session = array('nombre_jefe'  => $nombre);
            $this->session->set_userdata($session);
            if($nombre == null) {
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
            $data['comboAgencias'] = $this->__buildComboAgencias($nombre);
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
                if($key != 'null') {
                    array_push($array_asesores, $key);
                }
            }
            $datosAsesor = $this->M_usuario->getDatosTablaAsesor();
            foreach ($datosAsesor as $key) {
                        $html .= '<tr>
                                    <td>
                                       <input type="checkbox" id="check_'.$key->id.'" name="id_asesor[]" value="'.$key->nombre.'">
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


    function __buildComboAgencias($nombre){
        $agencias = $this->M_usuario->getAgenciasSupervisor($nombre);
        $opt = null;
        foreach($agencias as $age){
            $agen = str_replace(')', '',str_replace('(', '', $age->AGENCIA));
            $opt .= '<option value="'.$age->id.'"> '.$agen.'</option>';
        }
        return $opt;
    }

    function borrarAsignados() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id_asesor = _post('id_asesor');
            $nombres = _post('personalAsignado');
            $asesores = explode("-", $nombres);
            $array_glob = array();
            $html = "";
            $p = "";
            foreach ($asesores as $key) {
                if($key != 'null' && $key != $id_asesor) {
                    array_push($array_glob, $key);
                }
            }
            $datosAsesor = $this->M_usuario->getDatosNuevosTablaAsesor($array_glob);
            foreach ($datosAsesor as $key) {
                        $html .= '<tr>
                                    <td>
                                       <input type="checkbox" id="check_'.$key->id.'" name="id_asesor[]" value="'.$key->nombre.'">
                                    </td>                    
                                    <td>'.$key->nombre.'</td>
                                    <td>'.$key->rol.'</td>
                                    <td>'.$key->agencia.'</td>
                                  </tr>';
            }
            $datosAsesor = $this->M_usuario->getDatosInTablaAsesor($array_glob);
            foreach ($datosAsesor as $row) {
                $p .= '<p id="id_nombre_pers">'.$row->nombre.' <i class="fa fa-minus-circle fa-1x" data-nombres='.$row->nombre.' aria-hidden="true" onclick="borrarAsignados('.$row->id.',this)"></i></p>';
            }
            _log(count($array_glob));
            if(count($array_glob) == 1) {
                $data['p'] = '';
            }
            $data['p'] = $p;
            $data['html'] = $html;
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }

    function actualizarTablas() {
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
                        $html .= '<tr>
                                    <td>
                                       <input type="checkbox" id="check_'.$key->id.'" name="id_asesor[]" value="'.$key->nombre.'">
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
    }
}

