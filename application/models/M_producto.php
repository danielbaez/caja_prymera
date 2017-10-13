<?php

class M_producto extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getProductos() {
        $sql = "SELECT * FROM tipo_producto";
        $result = $this->db->query($sql, array());

        return $result->result();
    }

}
    