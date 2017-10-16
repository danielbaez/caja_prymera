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

    function obtenerHistorialSolicitud($filtros)
    {
        if($filtros['nro_solicitud'] == '' and $filtros['dni'] == ''  and $filtros['fecha'] == '' and $filtros['cliente'] != ''){
            $a = "apellido LIKE '%".$filtros['cliente']."%'";
            $d = array();
        }
        elseif($filtros['nro_solicitud'] == '' and $filtros['dni'] == '' and $filtros['fecha'] != '' and $filtros['cliente'] != ''){
            $a = "apellido LIKE '%".$filtros['cliente']."%' AND date(timestamp_final) = ?";
            $d = array($filtros['fecha']);
        }
        elseif($filtros['nro_solicitud'] == '' and $filtros['fecha'] == '' and $filtros['dni'] != '' and $filtros['cliente'] != ''){
            $a = "apellido LIKE '%".$filtros['cliente']."%' AND dni = ?";
            $d = array($filtros['dni']);
        }
        elseif($filtros['dni'] == '' and $filtros['fecha'] == '' and $filtros['nro_solicitud'] != '' and $filtros['cliente'] != ''){
            $a = "apellido LIKE '%".$filtros['cliente']."%' AND id = ?";
            $d = array($filtros['nro_solicitud']);
        }
        else{
            $a = "id = ? AND apellido LIKE '%".$filtros['cliente']."%' AND dni = ? AND date(timestamp_final) = ?";
            $d = array($filtros['nro_solicitud'], $filtros['dni'], $filtros['fecha']);
        }

        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido FROM solicitud WHERE $a";

        $result = $this->db->query($sql, $d);
       
        return $result->result();
    }

    function obtenerDetalleSolicitud($id)
    {
        $sql = "SELECT usuario.nombre as usuario_nombre, agencias.AGENCIA as agencia, solicitud.status_sol, solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre as nombre_titular, solicitud.apellido as apellido_titular, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, tipo_producto.id as id_producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE solicitud.id = ?";

        $result = $this->db->query($sql, array($id));
       
        return $result->result();        
    }

    function actualizarEstadoSolicitud($id, $status)
    {
        $sql = "UPDATE solicitud set status_sol = ? WHERE id = ?";

        $result = $this->db->query($sql, array($status, $id));

        if(!empty($result)){
            return true;
        }
        else
        {
            return false;
        }
    }

    function obtenerSolicitudRechazada($filtros)
    {
        if($filtros['agencia'] == '' and $filtros['fecha_desde'] == '' and $filtros['fecha_hasta'] == '' and $filtros['id_asesor'] != ''){
            $a = "solicitud.id_usuario = ?";
            $d = array($filtros['id_asesor']);
        }
        if($filtros['id_asesor'] == '' and $filtros['fecha_desde'] == '' and $filtros['fecha_hasta'] == '' and $filtros['agencia'] != ''){
            $a = "agencias.id = ?";
            $d = array($filtros['agencia']);
        }
        elseif($filtros['fecha_desde'] == '' and $filtros['fecha_hasta'] == '' and $filtros['id_asesor'] != '' and $filtros['agencia'] != ''){
            $a = "solicitud.id_usuario = ? AND agencias.id = ?";
            $d = array($filtros['id_asesor'], $filtros['agencia']);
        }
        elseif($filtros['fecha_desde'] != '' and $filtros['fecha_hasta'] != '' and $filtros['id_asesor'] != '' and $filtros['agencia'] == ''){
            $a = "solicitud.id_usuario = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }
        elseif($filtros['fecha_desde'] != '' and $filtros['fecha_hasta'] != '' and $filtros['agencia'] != '' and $filtros['id_asesor'] == ''){
            $a = "agencias.id = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['agencia'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }
        elseif($filtros['fecha_desde'] != '' and $filtros['fecha_hasta'] != '' and $filtros['id_asesor'] == '' and $filtros['agencia'] == ''){
            $a = "solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['fecha_desde'], $filtros['fecha_hasta']);
        }
        else{
            $a = "solicitud.id_usuario = ? AND agencias.id = ? AND solicitud.timestamp_final >= ? AND solicitud.timestamp_final <= ?";
            $d = array($filtros['id_asesor'], $filtros['agencia'], $filtros['fecha_desde'], $filtros['fecha_hasta']);
        }

        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA as agencia, tipo_producto.descripcion as producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $a AND ws_error = 0";

        $result = $this->db->query($sql, $d);
       
        return $result->result();
    }

    function obtenerAsesorAgenteCliente($filtros)
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

    function obtenerAsesorHistorialSolicitud($filtros)
    {
        if($filtros['nro_solicitud'] == '' and $filtros['dni'] == ''  and $filtros['fecha'] == '' and $filtros['cliente'] != ''){
            $a = "id_usuario = ? AND apellido LIKE '%".$filtros['cliente']."%'";
            $d = array($filtros['id_asesor']);
        }
        elseif($filtros['nro_solicitud'] == '' and $filtros['dni'] == '' and $filtros['fecha'] != '' and $filtros['cliente'] != ''){
            $a = "id_usuario = ? AND apellido LIKE '%".$filtros['cliente']."%' AND date(timestamp_final) = ?";
            $d = array($filtros['id_asesor'], $filtros['fecha']);
        }
        elseif($filtros['nro_solicitud'] == '' and $filtros['fecha'] == '' and $filtros['dni'] != '' and $filtros['cliente'] != ''){
            $a = "id_usuario = ? AND apellido LIKE '%".$filtros['cliente']."%' AND dni = ?";
            $d = array($filtros['id_asesor'], $filtros['dni']);
        }
        elseif($filtros['dni'] == '' and $filtros['fecha'] == '' and $filtros['nro_solicitud'] != '' and $filtros['cliente'] != ''){
            $a = "id_usuario = ? AND apellido LIKE '%".$filtros['cliente']."%' AND id = ?";
            $d = array($filtros['id_asesor'], $filtros['nro_solicitud']);
        }
        else{
            $a = "id_usuario = ? AND id = ? AND apellido LIKE '%".$filtros['cliente']."%' AND dni = ? AND date(timestamp_final) = ?";
            $d = array($filtros['id_asesor'], $filtros['nro_solicitud'], $filtros['dni'], $filtros['fecha']);
        }

        $sql = "SELECT solicitud.fec_estado as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido FROM solicitud WHERE $a";

        $result = $this->db->query($sql, $d);
       
        return $result->result();
    }

    function actualizarNotaSolicitud($id, $nota, $id_nota, $id_asesor)
    {
        $sql = "SELECT * FROM notas WHERE id = ?";
        $result = $this->db->query($sql, array($id_nota));
        
        if($result->num_rows() > 0){
            $sql = "UPDATE notas set nota = ? WHERE id = ?";
            $result = $this->db->query($sql, array($nota, $id_nota));
        }else{
            $input = array('nota'=>$nota, 'fecha'=>date('Y-m-d'));
            $this->db->insert('notas', $input);
            $insertId = $this->db->insert_id();
            $sql = "UPDATE solicitud set id_nota = ? WHERE id = ?";
            $result = $this->db->query($sql, array($insertId, $id));
        }        

        if(!empty($result)){
            return true;
        }
        else
        {
            return false;
        }
    }

    function obtenerAsesorDetalleSolicitud($id)
    {
        $sql = "SELECT solicitud.id_nota, notas.nota, usuario.nombre as usuario_nombre, agencias.AGENCIA as agencia, solicitud.status_sol, solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre as nombre_titular, solicitud.apellido as apellido_titular, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, tipo_producto.id as id_producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id LEFT JOIN notas ON solicitud.id_nota = notas.id WHERE solicitud.id = ?";

        $result = $this->db->query($sql, array($id));
       
        return $result->result();        
    }
}
    