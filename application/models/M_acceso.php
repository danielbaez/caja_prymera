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

    function setIps($agencias, $acceso_ips, $column)
    {
        foreach ($agencias as $key => $value) {
            $ip = 0;
            if(isset($acceso_ips[$key]))
            {   
                $ip = $acceso_ips[$key] == 'on' ? 1 : 0;
            }
            $sql = "SELECT * FROM acceso WHERE id_agencia = ?";
            $result = $this->db->query($sql, array($key));
            if($result->num_rows() == 1)
            {
                $this->db->where('id_agencia', $key);
                $this->db->update('acceso', [$column => $ip]);    
            }
            else
            {
                $data['ip'] = $ip;
                $data['horario'] = 0;
                $data['id_agencia'] = $key;            
                $this->db->insert('acceso', $data);
            }            
        }
        
    }

    function setHorarioAgencia($agencia, $horario, $column)
    {
        if($agencia)
        {
            $sql = "SELECT * FROM acceso WHERE id_agencia = ?";
            $result = $this->db->query($sql, array($agencia));
            if($result->num_rows() == 1)
            {
                $this->db->where('id_agencia', $agencia);
                $this->db->update('acceso', [$column => $horario]);    
            }
            else
            {
                $data['ip'] = 0;
                $data['horario'] = $horario;
                $data['id_agencia'] = $agencia;            
                $this->db->insert('acceso', $data);
            }
        }
    }

}	