<?php

class M_agencia extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAgencias($action = false, $id_agencia = false) {
        $rol = _getSesion('rol');
        $id = _getSesion('id_usuario');

        if($action == 'agenciaByAgente')
        {
            if($id_agencia)
            {
                $sql = "SELECT * FROM agencias WHERE id = ?";
                $result = $this->db->query($sql, array($id_agencia)); 
            }
            else
            {
                if($rol == 'administrador')
                {
                    $sql = "SELECT * FROM agencias";
                    $result = $this->db->query($sql);
                }
                if($rol == 'jefe_agencia')
                {
                    $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
                    $result = $this->db->query($sql, array($id));
                }
            }            
        }
        else
        {
            if($rol == 'administrador')
            {
                if($action == 'reporte')
                {
                    $sql = "SELECT * FROM agencias";
                    $result = $this->db->query($sql);
                }
                else
                {
                    $sql = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL";
                    $result = $this->db->query($sql, array($id));    
                }            
                
            }
            if($rol == 'jefe_agencia')
            {
                $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
                $result = $this->db->query($sql, array($id));
            }
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

    function getAllAgencias()
    {
        $sql = "SELECT * FROM agencias";
        $result = $this->db->query($sql, array());    
        return $result->result();
    }

    function getAllAgenciasIPPPPP()
    {
        $sql = "SELECT agencias.*, acceso.ip as id_access FROM agencias LEFT JOIN acceso ON agencias.id = acceso.id_agencia";
        $result = $this->db->query($sql, array());    
        return $result->result();
    }

    function setIP($agencias)
    {
        foreach ($agencias as $key => $value) {
            $this->db->where('id', $key);
            $this->db->update('agencias', ['ip' => $value]);
        }        
    }
    
}