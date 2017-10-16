<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function obtenerSolicitudes($filtros)
    {
        if($filtros['tipo_credito'] == ''){
            $a = "solicitud.cod_agencia = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['agencia'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }else{
            $a = "solicitud.cod_agencia = ? AND solicitud.id_tipo_prod = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['agencia'], $filtros['tipo_credito'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }

        /*if($filtros['tipo_credito'] == ''){
            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE solicitud.cod_agencia = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $result = $this->db->query($sql, array($filtros['agencia'], $filtros['fecha_desde'], $filtros['fecha_hasta']));
        }else{
            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE solicitud.cod_agencia = ? AND solicitud.id_tipo_prod = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $result = $this->db->query($sql, $d);
        }*/

        $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $a";

            $result = $this->db->query($sql, $d);

        return $result->result();
    }

    function obtenerAgenteCliente($filtros)
    {
        if($filtros['tipo_credito'] == '' and $filtros['status'] == ''){
            $a = "solicitud.id_usuario = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }
        else if($filtros['tipo_credito'] == ''){
            $a = "solicitud.id_usuario = ? AND solicitud.status_sol = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['status'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }
        elseif($filtros['status'] == ''){
            $a = "solicitud.id_usuario = ? AND solicitud.id_tipo_prod = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['tipo_credito'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }else{
            $a = "solicitud.id_usuario = ? AND solicitud.id_tipo_prod = ? AND solicitud.status_sol = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['tipo_credito'], $filtros['status'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }

        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $a";

        $result = $this->db->query($sql, $d);
       
        return $result->result();
    }
}
    