<?php

class M_horario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getHorario($agencia, $rol)
    {
        if($agencia)
        {
            $sql = "SELECT * FROM horarios WHERE id_agencia = ? AND rol = ?";
            $result = $this->db->query($sql, array($agencia, $rol));    
            return $result->result();
        }
        else
        {
            return [];
        }
           	
    }

    function setHorario($agencia, $desde, $hasta, $rol)
    {
        if($agencia)
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

            $sql = "SELECT * FROM horarios WHERE id_agencia = ? AND rol = ?";
            $result = $this->db->query($sql, array($agencia, $rol));

            if($result->num_rows() == 2)
            {
                $this->db->where('id_agencia', $agencia);
                $this->db->where('rol', $rol);
                $this->db->where('turno', 'desde');
                $this->db->update('horarios', $data_desde);

                $this->db->where('id_agencia', $agencia);
                $this->db->where('rol', $rol);
                $this->db->where('turno', 'hasta');
                $this->db->update('horarios', $data_hasta);
            }
            else
            {
                $data_desde['id_agencia'] = $agencia;
                $data_desde['rol'] = $rol;
                $data_desde['turno'] = 'desde';            
                $this->db->insert('horarios', $data_desde);

                $data_hasta['id_agencia'] = $agencia;
                $data_hasta['rol'] = $rol;
                $data_hasta['turno'] = 'hasta';            
                $this->db->insert('horarios', $data_hasta);
            }  	    	
        }    	
    }
}