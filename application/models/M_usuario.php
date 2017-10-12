<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getPersonal() {
        $sql = "SELECT * 
                  FROM usuario 
                 WHERE activo = ?";
        $result = $this->db->query($sql, array(1));
        return $result->result();
    }
}
    