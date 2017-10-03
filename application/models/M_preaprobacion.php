<?php

class M_preaprobacion extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatosCliente($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $pers = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "idPers" => $pers);
    }
    
    function updateDatosCliente($arrayData, $idCliente, $tabla){
        $this->db->where('id'  , $idCliente);
        $this->db->update($tabla, $arrayData);
        if ($this->db->affected_rows() != 1) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }
    
}
    