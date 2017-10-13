<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function obtenerSolicitudes($filtros) {
        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM usuario INNER JOIN solicitud ON usuario.id = solicitud.id_usuario INNER JOIN agencias ON agencias.id = usuario.id_agencia INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE usuario.id_agencia = ?
AND solicitud.id_tipo_prod = ? AND solicitud.fec_estado >= ? AND solicitud.fec_estado <= ?";
        $result = $this->db->query($sql, array($filtros['agencia'], $filtros['tipo_credito'], $filtros['fecha_desde'], $filtros['fecha_hasta']));
        return $result->result();
    }
}
    