<?php

class M_horario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getHorario()
    {
    	$sql = "SELECT * FROM horarios";
    	$result = $this->db->query($sql, array());
    	return $result->result();
    }

    function setHorario($desde, $hasta)
    {
    	$data_desde['lunes'] = $desde[0];
    	$data_desde['martes'] = $desde[1];
    	$data_desde['miercoles'] = $desde[2];
    	$data_desde['jueves'] = $desde[3];
    	$data_desde['viernes'] = $desde[4];
    	$data_desde['sabado'] = $desde[5];
    	$data_desde['domingo'] = $desde[6];

    	$data_hasta['lunes'] = $hasta[0];
    	$data_hasta['martes'] = $hasta[1];
    	$data_hasta['miercoles'] = $hasta[2];
    	$data_hasta['jueves'] = $hasta[3];
    	$data_hasta['viernes'] = $hasta[4];
    	$data_hasta['sabado'] = $hasta[5];
    	$data_hasta['domingo'] = $hasta[6];

    	
    	$this->db->where('id', 1);
        $this->db->update('horarios', $data_desde);

        $this->db->where('id', 2);
        $this->db->update('horarios', $data_hasta);
    }

}