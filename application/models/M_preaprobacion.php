<?php

class M_preaprobacion extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatosCliente($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $pers = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "idPers" => $pers);
    }

    function insertPrueba() {
        $sql = "INSERT INTO prueba(nombre) VALUES ('ss')";
        $result = $this->db->query($sql);
        return true;
    }
    
    function updateDatosCliente($arrayData, $idCliente, $tabla){
        $this->db->where('id'  , $idCliente);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }
    
    function getConcecionaria() {
        $sql = "SELECT *
                  FROM concesionaria";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getAgencias() {
        $sql = "SELECT agencia,
                       UBICACION,
                       TELEFONO
                  FROM agencias";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getCod_telefono($departamento) {
        if($departamento == 'LIMA') {
            $sql = "SELECT * 
                    FROM cod_telefono";
        }ELSE {
            $sql = "SELECT *
                      FROM cod_telefono";
        }
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getDepartamento() {
        $sql = "SELECT DESC_DPTO
                  FROM ubigeo 
              GROUP BY DESC_DPTO";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getProvincia($departamento) {
        $sql = "SELECT DESC_PROV 
                 FROM ubigeo 
                WHERE DESC_DPTO LIKE ? 
             GROUP BY DESC_PROV";
        $result = $this->db->query($sql, array($departamento));
        return $result->result();
    }
    
    function getDistrito($Provincia) {
        $sql = "SELECT DESC_DISTRITO
                  FROM ubigeo 
                 WHERE DESC_PROV LIKE ?
              GROUP BY DESC_DISTRITO";
        $result = $this->db->query($sql, array($Provincia));
        return $result->result();
    }

    function getDistritoLima() {
        $sql = "SELECT DESC_DISTRITO
                  FROM ubigeo 
                 WHERE DESC_PROV LIKE 'LIMA'
              GROUP BY DESC_DISTRITO";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getMarca() {
        $sql = "SELECT MARCA
                  FROM marca_modelo
              GROUP BY MARCA";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
    
    function getModelo($marca) {
        $sql = "SELECT MODELO
                  FROM marca_modelo
                 WHERE MARCA LIKE ?
                GROUP BY MODELO";
        $result = $this->db->query($sql, array($marca));
        return $result->result();
    }

    function getDireccionAgencia($agencia) {
      $sql = "SELECT *
                  FROM agencias
                 WHERE AGENCIA LIKE ?
                 GROUP BY AGENCIA";
        $result = $this->db->query($sql, array($agencia));
        return $result->result();
    }

    function getCorreoByAgencia($agencia) {
      $sql = "SELECT CORREO
                  FROM correos
                 WHERE AGENCIA LIKE ?";
        $result = $this->db->query($sql, array($agencia));
        return $result->result();
    }

    function verificarDatos() {
        $sql = "SELECT email,
                       password,
                       rol,
                       CONCAT(nombre, ' ', apellido) AS nombres
                  FROM usuario 
                 WHERE rol 
                  LIKE '%administrador%'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getAgenciasId($agencia) {
        $sql = "SELECT *
                FROM agencias
               WHERE AGENCIA LIKE ?";
        $result = $this->db->query($sql, array($agencia));
        return $result->result();
    }

    function getConcecionariaId($concecionaria) {
      $sql = "SELECT *
                FROM concesionaria
               WHERE DESC_CONCESIONARIA LIKE ?";
        $result = $this->db->query($sql, array($concecionaria));
        return $result->result();
    }

    function getDatosPersByRol($rol, $nombre, $agencia) {
      if($rol == 'administrador') {
        $sql = "SELECT u.nombre, 
                     DATE_FORMAT(u.fecha_nac, '%m/%d/%Y') AS fecha_nac,
                     u.rol, 
                     u.apellido, 
                     DATE_FORMAT(u.fecha_ingreso, '%m/%d/%Y') AS fecha_ingreso, 
                     u.sexo, 
                     u.celular, 
                     u.dni, 
                     u.permiso,
                     u.email,
                     u.id,
                     u.rol
                FROM usuario u,
                     agencias a
               WHERE u.id = a.id
                 AND rol LIKE '%".$rol."%' 
                 AND u.nombre LIKE '%".$nombre."%'";
      }else {
          $sql = "SELECT u.nombre, 
                     DATE_FORMAT(u.fecha_nac, '%m/%d/%Y') AS fecha_nac,
                     u.rol, 
                     u.apellido, 
                     DATE_FORMAT(u.fecha_ingreso, '%m/%d/%Y') AS fecha_ingreso, 
                     u.sexo, 
                     u.celular, 
                     u.dni, 
                     u.permiso,
                     u.email,
                     u.id,
                     u.rol
                FROM usuario u,
                     agencias a
               WHERE u.id = a.id
                 AND rol LIKE '%".$rol."%' 
                 AND u.nombre LIKE '%".$nombre."%'
                 AND id_agencia = ".$agencia."";
      }
      
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getidByAgencia($agencia) {
      if($agencia == "Miraflores") {
        $sql = "SELECT id
              FROM agencias
             WHERE AGENCIA LIKE '".$agencia."'";
      }
      $sql = "SELECT id
              FROM agencias
             WHERE AGENCIA LIKE '%".$agencia."%'";
        $result = $this->db->query($sql, array());
        //_logLastQuery();
        return $result->result();
    }

    function getAgencia($id) {
      $sql = "SELECT * 
              FROM usuario 
             WHERE id = ?";
        $result = $this->db->query($sql, array($id));
        //_logLastQuery();
        return $result->result();
    }

    function getDireccionByAgencia($agencia) {
        $sql = "SELECT * 
              FROM agencias 
             WHERE AGENCIA LIKE ?";
        $result = $this->db->query($sql, array($agencia));
        return $result->result();
    }
}
    