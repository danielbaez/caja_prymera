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

    function getSolicitudes() {
        $sql = "SELECT * 
				  FROM solicitud
				 WHERE status_sol = 0
				   AND  DATE_ADD('2017-11-15', INTERVAL 2 month)  >= curdate() ";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

}
    