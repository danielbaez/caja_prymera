<?php

class M_acceso extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getAcceso()
    {
        $sql = "SELECT * FROM acceso";
        $result = $this->db->query($sql, array());
        return $result->result();
    }      

    function setAcceso($acceso, $column)
    {
        $this->db->where('id', 1);
        $this->db->update('acceso', [$column => $acceso]);
    }

}	