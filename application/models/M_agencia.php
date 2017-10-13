<?php

class M_agencia extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAgencias() {
        $rol = _getSesion('rol');
        $id = _getSesion('id_usuario');
        if($rol == 'administrador'){
            $sql = "SELECT * FROM agencias";
            $result = $this->db->query($sql, array($id));
        }
        if($rol == 'jefe_agencia'){
            $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
            $result = $this->db->query($sql, array($id));
        }        
        return $result->result();
    }

    function getPersonal() {
        $sql = "SELECT * 
                  FROM usuario 
                 WHERE estado = ?";
        $result = $this->db->query($sql, array(1));
        return $result->result();
    }
}
    