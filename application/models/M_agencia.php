<?php

class M_agencia extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAgencias($action = false) {
        $rol = _getSesion('rol');
        $id = _getSesion('id_usuario');
        if($rol == 'administrador'){
            if($action == 'reporte'){
                $sql = "SELECT * FROM agencias";
            }else{
                $sql = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL";    
            }
            
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

    // function getAgencias()
    // {
    //     $sql = "SELECT * FROM agencias";
    //     $result = $this->db->query($sql, array());
    //     return $result->result();
    // }

    function getAgenciasBySup($id, $action)
    {   
        if($action == 'asesor')
        {
            $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
            $result = $this->db->query($sql, array($id));    
        }
        elseif($action == 'jefe')
        {
            $sql = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL";
            $result = $this->db->query($sql, array());    
        }
        return $result->result();
    }

    function getAgenciasDefault()
    {  
        $sql = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL";
        $result = $this->db->query($sql, array());    
        return $result->result();
    }

    
}