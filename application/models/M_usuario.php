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
                 WHERE estado = ?";
        $result = $this->db->query($sql, array(1));
        return $result->result();
    }
}
    