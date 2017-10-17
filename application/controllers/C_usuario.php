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
            if($nombre == null) {
                throw new Exception("Ingrese el nombre", 1);
            }
            $id    = $this->M_usuario->getIdUsuarioByNombre($nombre);
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
            $data['html'] = $html;
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
            $asesores = explode("-", $datos);
            foreach ($asesores as $key) {
                if($key != "null") {
                    _log($key);
                }
            }
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode(array_map('utf8_encode', $data));
    }
}

