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

    function getPersonal($id, $rol) {

        if($rol == 'administrador')
        {

            $sql = "SELECT usuario.id as id, agencias.id as id_agencia, usuario.nombre, usuario.apellido, agencias.AGENCIA, usuario.rol FROM usuario LEFT JOIN agencias ON usuario.id_agencia = agencias.id";

            $result = $this->db->query($sql, array());

            $res = [];
            foreach ($result->result() as $key => $value) {
                if($value->rol == 'jefe_agencia')
                {
                    $sql = "SELECT GROUP_CONCAT(AGENCIA) as agencia FROM agencias where id_sup_agencia = $value->id GROUP BY id_sup_agencia";
                    $agencias = $this->db->query($sql, array());
                    $a = $agencias->result();
                    $value->AGENCIA = $a[0]->agencia;
                    
                }
                elseif($value->rol == 'administrador')
                {
                	$value->AGENCIA = 'Todos';
                }
                $res[] = $value;              
            }

            return $res;

        } 
        elseif ($rol == 'jefe_agencia')
        {
            $sql = "SELECT GROUP_CONCAT(id) as cant FROM agencias WHERE id_sup_agencia = ? ";
            $result = $this->db->query($sql, array(_getSesion('id_usuario')));

            $res = [];
            foreach ($result->result() as $key => $value) {
                $agencias = $value->cant;
            }

            //echo $agencias;exit();
            $agencias = explode(',', $agencias);
            /*print_r($agencias);
            exit();*/
 
            $sql = "SELECT usuario.id as id, agencias.id as id_agencia, usuario.nombre, usuario.apellido, agencias.AGENCIA, usuario.rol FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE usuario.id_agencia IN ?";

            $result = $this->db->query($sql, array($agencias));

            return $result->result();
        }  
    }

    function detalleUsuario($id)
    {
    	$sql = "SELECT usuario.id, usuario.imagen, usuario.permiso, usuario.id_agencia, usuario.nombre, usuario.apellido, usuario.sexo, usuario.dni, DATE_FORMAT(usuario.fecha_nac,'%Y-%m-%d') as fecha_nac, DATE_FORMAT(usuario.fecha_ingreso,'%Y-%m-%d') as fecha_ingreso, usuario.email, usuario.celular, usuario.rol FROM usuario LEFT JOIN agencias ON usuario.id_agencia = agencias.id WHERE usuario.id = ?";
    	$result = $this->db->query($sql, array($id));

    	$res = [];
        foreach ($result->result() as $key => $value) {
            if($value->rol == 'asesor')
            {
                $sql = "SELECT * FROM usuario WHERE id IN (SELECT agencias.id_sup_agencia as superior FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE agencias.id = ?)";
                $agencias = $this->db->query($sql, array($value->id_agencia));
                $a = $agencias->result();
                $value->rol_superior = $a[0]->id;
                
            }
            elseif($value->rol == 'jefe_agencia')
            {
               
                $sql = "SELECT GROUP_CONCAT(id) as agencias FROM agencias where id_sup_agencia = ? GROUP BY id_sup_agencia";
                $agencias = $this->db->query($sql, array($value->id));
                $a = $agencias->result();
                $value->id_agencia = $a[0]->agencias;
            }
            $res[] = $value;              
        }

            if($res[0]->rol == 'jefe_agencia')
            { 
                $sqlAg = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL OR id_sup_agencia = ?";
                $rrr = $this->db->query($sqlAg, array($res[0]->id));
                $res[0]->cargarAgencias =  $rrr->result();
            }
            elseif($res[0]->rol == 'asesor')
            { 
                //$sqlAg = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL OR id = ?";
                /*$sqlAg = "SELECT * FROM agencias WHERE id = ?";
                $rrr = $this->db->query($sqlAg, array($res[0]->id_agencia));
                $res[0]->cargarAgencias =  $rrr->result();*/


                $sqlAg = "SELECT * FROM agencias WHERE id_sup_agencia IN(SELECT id_sup_agencia FROM agencias WHERE id = ?)";
                $rrr = $this->db->query($sqlAg, array($res[0]->id_agencia));

                $res[0]->cargarAgencias =  $rrr->result();



            }
            else
            {
                $res[0]->cargarAgencias =  [];
            }            

            

        return $res;

        //return $result->result();
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

    function getSuperiores()
    {
    	$sql = "SELECT * FROM usuario WHERE rol = 'jefe_agencia'";
    	$result = $this->db->query($sql, array());
    	return $result->result();
    }


    function crearUsuario($arrayInsert, $tabla, $agencias){
        $this->db->insert($tabla, $arrayInsert);
        $pers = $this->db->insert_id();
        
        if($agencias != false)
        {
        	$sql = "UPDATE agencias set id_sup_agencia = ? WHERE id IN ?";
        	$result = $this->db->query($sql, array($pers, $agencias));	

        	if(!empty($result)){
	            return true;
	        }
	        else
	        {
	            return false;
	        }
        }
        return true;
    	
    }

    function actualizarUsuario($arrayUpdate, $tabla, $agencias, $id_usuario){
        $this->db->where('id', $id_usuario);
        $this->db->update($tabla, $arrayUpdate); 

        if($agencias != false)
        {
            $sql = "UPDATE agencias set id_sup_agencia = NULL WHERE id_sup_agencia = ?";
            $result = $this->db->query($sql, array($id_usuario));
            $sql = "UPDATE agencias set id_sup_agencia = ? WHERE id IN ?";
            $result = $this->db->query($sql, array($id_usuario, $agencias));

            if(!empty($result)){
                return true;
            }
            else
            {
                return false;
            }
        }
        return true;
        
    }

    function getPersonalByRol() {
        $sql = "SELECT u.* , a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.rol LIKE '%asesor%'
                   AND u.estado = 1";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function buscarSupervisor($nombre) {
        $sql = "SELECT *
                  FROM usuario
                 WHERE estado = 1
                   AND rol LIKE '%jefe_agencia%'
                   AND nombre LIKE '%".$nombre."%'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosTablaAsesor($id_agencia) {
        $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND a.id_sup_agencia = ?";
        $result = $this->db->query($sql, array($id_agencia));
        return $result->result();
    }

    function getIdUsuarioByNombre($nombre) {
        $sql = "SELECT id 
                  FROM usuario
                 WHERE nombre LIKE '%".$nombre."%'
                   AND estado = 1
                   AND rol LIKE 'jefe_agencia'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
}
    