<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function login($usuario) {
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $result = $this->db->query($sql, array($usuario));
        return $result->result();
    }

    function verifyUserIPTime($usuario)
    {

        $sql = "SELECT ip from agencias WHERE id = ?";
        $result_ip = $this->db->query($sql, array($usuario->id_agencia));
        $result_ip = $result_ip->result();

        //print_r($result_ip[0]->ip); exit();

        $day= date("w");
        switch($day) {
        case 0: 
        $dia = "domingo";
        break;
        case 1: 
        $dia = "lunes";
        break;
        case 2: 
        $dia = "martes";
        break;
        case 3: 
        $dia = "miercoles";
        break;
        case 4: 
        $dia = "jueves";
        break;
        case 5: 
        $dia = "viernes";
        break;
        case 6: 
        $dia = "sabado";
        break;
        }

        $dia_db = 'horarios.'.$dia;

        $sql = "SELECT *, GROUP_CONCAT($dia_db SEPARATOR '*') as nuevoa, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), 1, POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))-1) AS Desdeee, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))+1, length(GROUP_CONCAT($dia_db SEPARATOR '*'))) AS Hastaaa FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id INNER JOIN horarios ON agencias.id = horarios.id_agencia WHERE usuario.id = ?";

        $result = $this->db->query($sql, array($usuario->id));

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { // IP compartido
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // IP Proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR']; // IP Acceso
        }

        echo "ip1".$_SERVER['HTTP_CLIENT_IP'];
        echo "<br>";
        echo "ip2".$_SERVER['HTTP_X_FORWARDED_FOR'];
        echo "<br>";
        echo "ip3".$_SERVER['REMOTE_ADDR'];
        echo "<br>";

        //$ip = '192.168.1.5';

        if($result->num_rows() == 1)
        {
            $result = $result->result();
            $desde = $result[0]->Desdeee;
            $hasta = $result[0]->Hastaaa;
            $ip_db = $result[0]->ip;

            $now = date('H:m:s');

            echo "desde:".$desde;
            echo "<br>";
            echo "ahora:".$now;
            echo "<br>";
            echo "hasta:".$hasta;
            echo "<br>";
            echo $ip;

            exit();

            //echo $ip_db; exit();

            if($ip_db != $ip)
            {
                return array('error' => 'No esta conectado a una ip especifica');
            }
            elseif($now > $desde && $now < $hasta)
            {
                return array('error' => false);
            }
            else
            {
                return array('error' => 'No puede acceder a esta hora');
            }
            
        }
        //return $result->result();   
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
                    $sql = "SELECT GROUP_CONCAT(AGENCIA SEPARATOR ', ') as agencia FROM agencias where id_sup_agencia = $value->id GROUP BY id_sup_agencia";
                    $agencias = $this->db->query($sql, array());
                    $a = $agencias->result();
                    if($a){
                        $value->AGENCIA = $a[0]->agencia;    
                    }
                    else
                    {
                        $value->AGENCIA = '';
                    }                   
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
            if($value->rol == 'asesor' || $value->rol == 'asesor_externo')
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
                //$value->id_agencia = $a[0]->agencias;
                if($a){
                    $value->id_agencia = $a[0]->agencias;    
                }
                else
                {
                    $value->id_agencia = '';
                }
            }
            $res[] = $value;              
        }

            if($res[0]->rol == 'jefe_agencia')
            { 
                $sqlAg = "SELECT * FROM agencias WHERE id_sup_agencia IS NULL OR id_sup_agencia = ?";
                $rrr = $this->db->query($sqlAg, array($res[0]->id));
                $res[0]->cargarAgencias =  $rrr->result();
            }
            elseif($res[0]->rol == 'asesor' || $res[0]->rol == 'asesor_externo')
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
            $sql = "SELECT usuario.id as id, usuario.nombre, usuario.apellido 
                  FROM usuario 
                 WHERE (nombre LIKE '%$asesor%' OR apellido LIKE '%$asesor%') AND rol = 'asesor'";
            $result = $this->db->query($sql);
        }
        if($rol == 'jefe_agencia'){
            $sql = "SELECT usuario.id as id, usuario.nombre, usuario.apellido FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE agencias.id_sup_agencia = ? AND (usuario.nombre LIKE '%$asesor%' OR usuario.apellido LIKE '%$asesor%') AND usuario.rol = 'asesor'";
            $result = $this->db->query($sql, array($id));
        }    
        
        return $result->result();
    }

    function getAgenciaByAsesor($id_asesor)
    {
        $rol = _getSesion('rol');
        $id = _getSesion('id_usuario');
        if($id_asesor)
        {
            $sql = "SELECT usuario.id_agencia as id, agencias.AGENCIA FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE usuario.id = ?";
            $result = $this->db->query($sql, array($id_asesor));
        }
        else
        {
            if($rol == 'administrador')
            {
                $sql = "SELECT * FROM agencias";
                $result = $this->db->query($sql);           
            }
            if($rol == 'jefe_agencia')
            {
                $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
                $result = $this->db->query($sql, array($id));
            } 
        }
        
            
        
        return $result->result();
    }

    function getSuperiores()
    {
    	$sql = "SELECT * FROM usuario WHERE rol = 'jefe_agencia' AND estado = 1";
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

        if(count($arrayUpdate))
        {
            $this->db->where('id', $id_usuario);
            $this->db->update($tabla, $arrayUpdate);
        }

        if($agencias != false)
        {
            $sql = "UPDATE agencias set id_sup_agencia = NULL WHERE id_sup_agencia = ?";
            $result = $this->db->query($sql, array($id_usuario));

            if($arrayUpdate['estado'] == 1){
                $sql = "UPDATE agencias set id_sup_agencia = ? WHERE id IN ?";
                $result = $this->db->query($sql, array($id_usuario, $agencias));
            }           

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
                   AND (nombre LIKE '%".$nombre."%' OR apellido LIKE '%".$nombre."%')";
        $result = $this->db->query($sql, array());

        return $result->result();
    }

    function getDatosTablaAsesor() {
        $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosNuevosTablaAsesor($array) {
        $sql = '';
        if(count($array) == 1) {
           $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'"; 
        }else if(count($array) > 1) {
            $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND u.id NOT IN ?";
        }
        $result = $this->db->query($sql, array($array));
        return $result->result();
    }

    function getDatosInTablaAsesor($array) {
        $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND u.id IN ?";
        $result = $this->db->query($sql, array($array));
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

    function getAgenciasSupervisor($id) {
        $sql = "SELECT a.*
                  FROM usuario u,
                       agencias a
                 WHERE a.id_sup_agencia = u.id
                   AND u.id = ?";
        $result = $this->db->query($sql, array($id));
        return $result->result();
    }

    function getIdByNombre($tabla, $columna, $nombre) {
        $sql = "SELECT id
                  FROM ".$tabla."
                 WHERE ".$columna." LIKE '".$nombre."'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosById($tabla, $columna, $id) {
        $sql = "SELECT *
                  FROM ".$tabla."
                 WHERE ".$columna." = '".$id."'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }


    function updateDatosAsesor($arrayData, $idAsesor, $tabla){
        $this->db->where_in('id'  , $idAsesor);
        $this->db->update($tabla, $arrayData);  
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

    function getIdRecuperarPassword($email) {
        $sql = "SELECT id
                  FROM usuario
                 WHERE estado = 1
                   AND email LIKE '%".$email."%'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosAsesoresByAgencia($agencia) {
        $sql = "SELECT u.*, a.AGENCIA AS agencia
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND u.id_agencia != ?";
        $result = $this->db->query($sql, array($agencia));
        return $result->result();
    }

    function verifyEmailAndDNI($dni, $email, $id_usuario, $action) {

        $addWhere = '';
        if($action == 'update')
        {
            $addWhere = "AND id <> $id_usuario";
        }
        $sql = "SELECT email 
                  FROM usuario
                 WHERE email LIKE '%".$email."%'
                   AND estado = 1 $addWhere";
        $result = $this->db->query($sql, array());

        $sql2 = "SELECT dni 
                  FROM usuario
                 WHERE dni LIKE '%".$dni."%'
                   AND estado = 1 $addWhere";
        $result2 = $this->db->query($sql2, array());

        if($result->num_rows() == 1 && $result2->num_rows() == 1)
        {
            return ['success' => true, 'msg' => 'El email y dni ya existen'];
        }
        else if($result->num_rows() == 1)
        {
            return ['success' => true, 'msg' => 'El email ya existe'];
        }
        else if($result2->num_rows() == 1)
        {
            return ['success' => true, 'msg' => 'El dni ya existe'];
        }
        else
        {
            return ['success' => false];
        }        
    }
}
    