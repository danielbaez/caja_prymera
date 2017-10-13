<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function obtenerSolicitudes($filtros)
    {
        // $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM usuario INNER JOIN solicitud ON usuario.id = solicitud.id_usuario INNER JOIN agencias ON agencias.id = usuario.id_agencia INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE usuario.id_agencia = ? AND solicitud.id_tipo_prod = ? AND solicitud.fec_estado >= ? AND solicitud.fec_estado <= ?";
        // $result = $this->db->query($sql, array($filtros['agencia'], $filtros['tipo_credito'], $filtros['fecha_desde'], $filtros['fecha_hasta']));

        if($filtros['tipo_credito'] == ''){
            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE solicitud.cod_agencia = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $result = $this->db->query($sql, array($filtros['agencia'], $filtros['fecha_desde'], $filtros['fecha_hasta']));
        }else{
            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE solicitud.cod_agencia = ? AND solicitud.id_tipo_prod = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $result = $this->db->query($sql, array($filtros['agencia'], $filtros['tipo_credito'], $filtros['fecha_desde'], $filtros['fecha_hasta']));
        }

        return $result->result();
    }

    function obtenerAgenteCliente($filtros)
    {
        //$sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM usuario INNER JOIN solicitud ON usuario.id = solicitud.id_usuario INNER JOIN agencias ON agencias.id = usuario.id_agencia INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE usuario.id = ? AND solicitud.id_tipo_prod = ? AND solicitud.status_sol = ? AND solicitud.fec_estado >= ? AND solicitud.fec_estado <= ?";

        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE solicitud.id_usuario = ? AND solicitud.id_tipo_prod = ? AND solicitud.status_sol = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";

        $result = $this->db->query($sql, array($filtros['id_asesor'], $filtros['tipo_credito'], $filtros['status'], $filtros['fecha_desde'], $filtros['fecha_hasta']));
        return $result->result();
    }
}
    