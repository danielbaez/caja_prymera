<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function login($usuario) {
        $sql = "SELECT * FROM usuario WHERE usuario = ?";
        $result = $this->db->query($sql, array($usuario));
        return $result->result();
    }

    function getPersonal() {
        $sql = "SELECT * 
                  FROM usuario 
                 WHERE estado = 1";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function buscarAsesor($asesor) {
        $rol = _getSesion('rol');
        $id = _getSesion('id_usuario');
        if($rol == 'administrador'){
            $sql = "SELECT usuario.id as id, usuario.nombre as nombre 
                  FROM usuario 
                 WHERE nombre LIKE '%$asesor%' AND rol = 'asesor'";
            $result = $this->db->query($sql);
        }
        if($rol == 'jefe_agencia'){
            $sql = "SELECT usuario.id as id, usuario.nombre as nombre FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE agencias.id_sup_agencia = ? AND usuario.nombre LIKE '%$asesor%' AND usuario.rol = 'asesor'";
            $result = $this->db->query($sql, array($id));
        }    
        
        return $result->result();
    }
}
    