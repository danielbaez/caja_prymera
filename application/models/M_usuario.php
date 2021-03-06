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

    function getLoginById($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $result = $this->db->query($sql, array($id));
        return $result->result();
    }

    function verifyUserIPTime($usuario)
    {
        if($usuario->estado == 1)
        {
            //if($usuario->email == 'daniel.baez@comparabien.com')
            //{
                $rol = $usuario->rol;

                if($rol == 'asesor' || $rol == 'jefe_agencia' || $rol == 'asesor_externo')
                {
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { // IP compartido
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // IP Proxy
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR']; // IP Acceso
                    }

                    //$ip = '192.168.1.6';

                    $day= date("w");
                    switch($day)
                    {
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

                    /*$sql = "SELECT agencias.ip, GROUP_CONCAT($dia_db SEPARATOR '*') as nuevoa, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), 1, POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))-1) AS Desdeee, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))+1, length(GROUP_CONCAT($dia_db SEPARATOR '*'))) AS Hastaaa FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id INNER JOIN horarios ON agencias.id = horarios.id_agencia WHERE usuario.id = ?";

                    $result = $this->db->query($sql, array($usuario->id));*/

                    //if($rol == 'asesor' || $rol == 'asesor_externo')
                    if($rol == 'asesor' || $rol == 'asesor_externo' || $rol == 'jefe_agencia')
                    {

                        if(($rol == 'asesor' || $rol == 'asesor_externo'))
                        {
                            if($usuario->id_agencia == '')
                            {
                                return array('error' => 'Usuario sin agencia');
                            }
                            else
                            {
                                $acceso = $this->verifyAcceso($usuario->id_agencia);
                            }
                        }
                        if($rol == 'jefe_agencia')
                        {
                            $sss = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
                            $q = $this->db->query($sss, array($usuario->id)); 
                            if($q->num_rows() == 0)
                            {
                                return array('error' => 'Usuario sin agencia');
                            }
                            else
                            {
                                $dd = $q->result();
                                $acceso = $this->verifyAcceso($dd[0]->id);
                            }
                        }                       
                        
                        if($acceso[0]->ip == 1 || $acceso[0]->horario == 1)
                        {
                            /*$sql = "SELECT ip from agencias WHERE id = ?";
                            $result_ip = $this->db->query($sql, array($usuario->id_agencia));                
                            $result_ip = $result_ip->result();*/

                            if($rol != 'jefe_agencia')
                            {
                                $sql = "SELECT agencias.ip, GROUP_CONCAT($dia_db SEPARATOR '*') as nuevoa, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), 1, POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))-1) AS Desdeee, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))+1, length(GROUP_CONCAT($dia_db SEPARATOR '*'))) AS Hastaaa FROM agencias INNER JOIN horarios ON agencias.id = horarios.id_agencia where agencias.id = ? AND horarios.rol = ?";
                                $result = $this->db->query($sql, array($usuario->id_agencia, $rol));    
                            }
                            if($rol == 'jefe_agencia')
                            {                                    
                                
                                $sql = "SELECT agencias.ip, GROUP_CONCAT($dia_db SEPARATOR '*') as nuevoa, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), 1, POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))-1) AS Desdeee, SUBSTR(GROUP_CONCAT($dia_db SEPARATOR '*'), POSITION('*' IN GROUP_CONCAT($dia_db SEPARATOR '*'))+1, length(GROUP_CONCAT($dia_db SEPARATOR '*'))) AS Hastaaa FROM agencias INNER JOIN horarios ON agencias.id = horarios.id_agencia where agencias.id_sup_agencia = ? AND horarios.rol = ?";
                                $result = $this->db->query($sql, array($usuario->id, $rol));    
                            }
                            

                            if($result->num_rows() == 1)
                            {
                                $result = $result->result();
                                $desde = $result[0]->Desdeee;
                                $hasta = $result[0]->Hastaaa;
                                $ip_db = $result[0]->ip;

                                $now = date('H:i:s');

                                /*echo "desde:".$desde;
                                echo "<br>";
                                echo "ahora:".$now;
                                echo "<br>";
                                echo "hasta:".$hasta;
                                echo "<br>";
                                echo $ip;

                                exit();*/

                                //echo $ip_db; exit();

                                if($acceso[0]->ip == 1 && $acceso[0]->horario == 1)
                                {
                                    if($ip_db != $ip)
                                    {
                                        return array('error' => 'El usuario no corresponde al ip de esta agencia');
                                    }
                                    if($now < $desde || $now > $hasta)
                                    {
                                        return array('error' => 'No puede acceder a esta hora');
                                    }
                                    else
                                    {
                                        return array('error' => false);
                                    }
                                }
                                elseif($acceso[0]->ip == 1 && $acceso[0]->horario == 0)
                                {
                                    if($ip_db != $ip)
                                    {
                                        return array('error' => 'El usuario no corresponde al ip de esta agencia');
                                    }
                                    else
                                    {
                                        return array('error' => false);
                                    }
                                }
                                elseif($acceso[0]->ip == 0 && $acceso[0]->horario == 1)
                                {
                                    if($now < $desde || $now > $hasta)
                                    {
                                        return array('error' => 'No puede acceder a esta hora');
                                    }
                                    else
                                    {
                                        return array('error' => false);
                                    }
                                }                                                 
                            }
                        }
                        else
                        {
                            return array('error' => false);
                        }
                    }
                    /*elseif($rol == 'jefe_agencia')
                    {
                        $acceso = $this->verifyAcceso();

                        if($acceso[0]->ip == 1)
                        {
                            $sql = "SELECT agencias.ip FROM agencias where id_sup_agencia IN(?)";
                            $result = $this->db->query($sql, array($usuario->id));
                            $result = $result->result();
                            $ips = [];
                            foreach ($result as $key => $value) 
                            {
                                $ips[] = $value->ip;
                            }

                            if(!in_array($ip, $ips))
                            {
                                return array('error' => 'El usuario no corresponde al ip de esta agencia');
                            }
                            else
                            {
                                return array('error' => false);
                            }
                        }
                        else
                        {
                            return array('error' => false);
                        }
                    }*/
                    /*echo "ip1".$_SERVER['HTTP_CLIENT_IP'];
                    echo "<br>";
                    echo "ip2".$_SERVER['HTTP_X_FORWARDED_FOR'];
                    echo "<br>";
                    echo "ip3".$_SERVER['REMOTE_ADDR'];
                    echo "<br>";*/               
                }
                else
                {
                    return array('error' => false);
                }
            //}
            /*else
            {
                return array('error' => false);
            }*/
        }
        else
        {
            return array('error' => 'Usuario desactivado');
        }   
    }

    function verifyAcceso($id_agencia)
    {
        $sql = "SELECT * FROM acceso WHERE id_agencia = ?";
        $result = $this->db->query($sql, array($id_agencia));
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
    	$sql = "SELECT usuario.id, usuario.imagen, usuario.permiso, usuario.id_agencia, usuario.nombre, usuario.apellido, usuario.sexo, usuario.dni, DATE_FORMAT(usuario.fecha_nac,'%Y-%m-%d') as fecha_nac, DATE_FORMAT(usuario.fecha_ingreso,'%Y-%m-%d') as fecha_ingreso, usuario.email, usuario.celular, usuario.rol, usuario.estado FROM usuario LEFT JOIN agencias ON usuario.id_agencia = agencias.id WHERE usuario.id = ?";
    	$result = $this->db->query($sql, array($id));

    	$res = [];
        foreach ($result->result() as $key => $value) {
            if($value->rol == 'asesor' || $value->rol == 'asesor_externo')
            {
                $sql = "SELECT * FROM usuario WHERE id IN (SELECT agencias.id_sup_agencia as superior FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE agencias.id = ?)";
                $agencias = $this->db->query($sql, array($value->id_agencia));
                $a = $agencias->result();
                if($a)
                {
                    $value->rol_superior = $a[0]->id;    
                }
                else
                {
                    $value->rol_superior = '';
                }
                
                
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
                 WHERE (nombre LIKE '%$asesor%' OR apellido LIKE '%$asesor%') AND rol IN('asesor', 'asesor_externo')";
            $result = $this->db->query($sql);
        }
        if($rol == 'jefe_agencia'){
            $sql = "SELECT usuario.id as id, usuario.nombre, usuario.apellido FROM usuario INNER JOIN agencias ON usuario.id_agencia = agencias.id WHERE agencias.id_sup_agencia = ? AND (usuario.nombre LIKE '%$asesor%' OR usuario.apellido LIKE '%$asesor%') AND usuario.rol IN('asesor', 'asesor_externo')";
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

            /*if($arrayUpdate['estado'] == 1){
                $sql = "UPDATE agencias set id_sup_agencia = ? WHERE id = ?";
                $result = $this->db->query($sql, array($id_usuario, $agencias));
            }*/           

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
                  FROM usuario u
             LEFT JOIN agencias a ON a.id = u.id_agencia
                  WHERE u.rol LIKE '%asesor%'
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

    function getJefeAgencia() {
        $sql = "SELECT *
                  FROM usuario
                 WHERE estado = 1
                   AND rol LIKE '%jefe_agencia%'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getCountAgencia($idagencia) {
        $sql = "SELECT COUNT(u.id) AS cantidad
                  FROM usuario u,
                       agencias a
                 WHERE a.id = u.id_agencia
                   AND a.id = ?";
        $result = $this->db->query($sql, array($idagencia));
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

    function getDatosByIdCorreo($tabla, $columna, $id) {
        $sql = "SELECT GROUP_CONCAT(CORREO SEPARATOR  ' , ') AS correos
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

    function updateDatosAcceso($arrayData, $idAsesor, $tabla){
        $this->db->where_in('id_agencia'  , $idAsesor);
        $this->db->update($tabla, $arrayData);  
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

    function updateDatosCorreos($arrayData, $nombre, $correo, $tabla){
        $this->db->where('AGENCIA'  , $nombre);
        $this->db->where('CORREO'  , $correo);
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
                  FROM usuario u
             LEFT JOIN agencias a ON a.id = u.id_agencia
                 WHERE u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND u.id_agencia != ?";
        $result = $this->db->query($sql, array($agencia));
        $r1 = $result->result();
        //return $r1;

        $sql2 = "SELECT u.*, '' AS agencia
                  FROM usuario u
                  WHERE u.estado = 1
                   AND u.rol LIKE '%asesor%'
                   AND u.id_agencia is NULL";
        $result2 = $this->db->query($sql2, array());
        $r2 = $result2->result();

        return array_merge($r1, $r2);

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
                   $addWhere";
        $result = $this->db->query($sql, array());

        $sql2 = "SELECT dni 
                  FROM usuario
                 WHERE dni LIKE '%".$dni."%'
                   $addWhere";
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

    function getDatosAgencia() {
        /*$sql = "SELECT a.id,
                       a.AGENCIA,
                       CONCAT(u.nombre, ' ', u.apellido) AS nombre
                  FROM agencias a,
                       usuario u
                 WHERE a.id_sup_agencia = u.id
                   AND u.rol LIKE 'jefe_agencia'";*/

        $sql = "SELECT agencias.id, agencias.AGENCIA, CONCAT(usuario.nombre, ' ', usuario.apellido) as nombre FROM agencias left join usuario on agencias.id_sup_agencia = usuario.id";    
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function deleteAgencia($id_agencia){
        $rpt['error']    = EXIT_ERROR;
        $rpt['msj']      = MSJ_ERROR;
        try{
            $this->db->where('id', $id_agencia);
            $this->db->delete('agencias');
            if($this->db->trans_status() == false){
                throw new Exception('No se pudo eliminar');
            }
            $rpt['error']    = EXIT_SUCCESS;
            $rpt['msj']      = MSJ_INSERT_SUCCESS;
        }catch(Exception $e){
            $rpt['msj'] = $e->getMessage();
        }
        return $rpt;
    }

    function deleteCorreoAgencia($agencia){
        $sql = "DELETE FROM correos WHERE AGENCIA = ?";
        $result = $this->db->query($sql, array($agencia));
        return $result;
    }

    function deleteAccesoAgencia($idagencia){
        $sql = "DELETE FROM acceso WHERE id_agencia = ?";
        $result = $this->db->query($sql, array($idagencia));
        return $result;
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $pers = $this->db->insert_id();
        if($this->db->trans_status() == false) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "idPers" => $pers);
    }

    function actualizarPermisoAgentesByJefe($arrayUpdate, $tabla, $id_usuario)
    {
        $sql = "SELECT * FROM agencias WHERE id_sup_agencia = ?";
        $result = $this->db->query($sql, array($id_usuario));
        if($result->num_rows() > 0)
        {
            $r = $result->result();
            $this->db->where_in('id_agencia', $r[0]->id);
            $this->db->update($tabla, $arrayUpdate);             
        }

    }
}
    