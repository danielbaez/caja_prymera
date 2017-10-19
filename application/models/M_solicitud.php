<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function obtenerSolicitudes($filtros)
    {

        if($filtros['agencia'] != '' and $filtros['fecha_desde'] != '' and $filtros['fecha_hasta'] != '')
        {
            foreach($filtros as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($filtros[$key]);
            }

            $where = '';
            $cont = 0;
            foreach($filtros as $key=>$value)
            {
                $cont++;
                switch ($key) {

                    case 'agencia':
                        $a = "solicitud.cod_agencia = ?";                    
                        break;
                    case 'tipo_credito':
                        $a = "solicitud.id_tipo_prod = ?";
                        break;
                    case 'fecha_desde':
                        $a = "solicitud.timestamp_final >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "solicitud.timestamp_final <= ?";
                        break;
                    
                    default:
                        # code...
                        break;
                }

                if($cont == 1)
                {
                    $where .= $a;
                }
                elseif($cont > 1)
                {
                    $where .= " AND ".$a;
                }
            }

            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1";

            $result = $this->db->query($sql, $filtros);

            $res = [];
            if($result->result())
            {
                foreach ($result->result() as $key => $value)
                {
                    if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }
                    $res[] = $value;              
                }
            }
            return $res;
        }
        else
        {
            return [];
        }

        //return $result->result();
        //return $result->result_array();
    }

    function obtenerAgenteCliente($filtros)
    {
        if($filtros['id_asesor'] != '')
        {
            foreach($filtros as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($filtros[$key]);
            }

            $where = '';
            $cont = 0;
            foreach($filtros as $key=>$value)
            {
                $cont++;
                switch ($key) {

                    case 'id_asesor':
                        $a = "solicitud.id_usuario = ?";                    
                        break;
                    case 'tipo_credito':
                        $a = "solicitud.id_tipo_prod = ?";
                        break;
                    case 'status':
                        $a = "solicitud.status_sol = ?";
                        break;
                    case 'fecha_desde':
                        $a = "solicitud.timestamp_final >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "solicitud.timestamp_final <= ?";
                        break;
                    
                    default:
                        # code...
                        break;
                }

                if($cont == 1)
                {
                    $where .= $a;
                }
                elseif($cont > 1)
                {
                    $where .= " AND ".$a;
                }
            }

            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1";

            $result = $this->db->query($sql, $filtros);

            $res = [];
            if($result->result())
            {
                foreach ($result->result() as $key => $value)
                {
                    if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }
                    $res[] = $value;              
                }
            }
            return $res;
        }
        else
        {
            return [];
        }      
    }

    function obtenerHistorialSolicitud($filtros)
    {
        if($filtros['cliente'] != '')
        {
            foreach($filtros as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($filtros[$key]);
            }


            $where = '';
            $cont = 0;
            foreach($filtros as $key=>$value)
            {
                $cont++;
                switch ($key) {
                    case 'nro_solicitud':
                        $a = "id = ?";
                        break;
                    case 'cliente':
                        $a = "(nombre LIKE '%".$filtros['cliente']."%' OR apellido LIKE '%".$filtros['cliente']."%')";
                        unset($filtros['cliente']);
                        break;
                    case 'dni':
                        $a = "dni = ?";
                        break;                    
                    case 'fecha':
                        $a = "date(timestamp_final) = ?";
                        break;                    
                    default:
                        # code...
                        break;
                }

                if($cont == 1)
                {
                    $where .= $a;
                }
                elseif($cont > 1)
                {
                    $where .= " AND ".$a;
                }
            }

            $rol = _getSesion('rol');
            $id_usuario = _getSesion('id_usuario');
            if($rol == 'administrador')
            {
                $sql = "SELECT timestamp_final as fecha_solicitud, id as id_solicitud, nombre, apellido FROM solicitud WHERE $where";    
            }
            elseif($rol == 'jefe_agencia')
            {
                $sql = "SELECT timestamp_final as fecha_solicitud, id as id_solicitud, nombre, apellido FROM solicitud WHERE $where AND cod_agencia = (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";    
            }            

            $result = $this->db->query($sql, $filtros);

            return $result->result();
        }
        else
        {
            return [];
        }
    }

    function obtenerDetalleSolicitud($id)
    {
        $sql = "SELECT usuario.nombre as usuario_nombre, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_solicitud, DATE_FORMAT(solicitud.timestamp_final,'%h:%i:%S') as hora_solicitud, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre as nombre_titular, solicitud.apellido as apellido_titular, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, tipo_producto.id as id_producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE solicitud.id = ?";

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
        foreach($filtros as $key=>$value)
        {
            if(is_null($value) || $value == '')
                unset($filtros[$key]);
        }

        $where = '';
        $cont = 0;
        foreach($filtros as $key=>$value)
        {
            $cont++;
            switch ($key) {

                case 'id_asesor':
                    $a = "solicitud.id_usuario = ?";                    
                    break;
                case 'agencia':
                    $a = "solicitud.cod_agencia = ?";
                    break;
                case 'fecha_desde':
                    $a = "solicitud.timestamp_final >= ?";
                    break;
                case 'fecha_hasta':
                    $a = "solicitud.timestamp_final <= ?";
                    break;
                
                default:
                    # code...
                    break;
            }

            if($cont == 1)
            {
                $where .= $a;
            }
            elseif($cont > 1)
            {
                $where .= " AND ".$a;
            }
        }

        $rol = _getSesion('rol');
        $id_usuario = _getSesion('id_usuario');
        if($where != '')
        {
            $where .= " AND ws_error = 0";    
        }
        else
        {
            if($rol == 'administrador')
            {
                $where .= "ws_error = 0";
            }
            elseif($rol == 'jefe_agencia')
            {
                $where .= "ws_error = 0 AND solicitud.cod_agencia IN (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";
            }
            
        }
        

        $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA as agencia, tipo_producto.descripcion as producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where";

        $result = $this->db->query($sql, $filtros);

        return $result->result();
    }

    function obtenerAsesorAgenteCliente($filtros)
    {
        if($filtros['id_asesor'] != '')
        {
            foreach($filtros as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($filtros[$key]);
            }

            $where = '';
            $cont = 0;
            foreach($filtros as $key=>$value)
            {
                $cont++;
                switch ($key) {

                    case 'id_asesor':
                        $a = "solicitud.id_usuario = ?";                    
                        break;
                    case 'tipo_credito':
                        $a = "solicitud.id_tipo_prod = ?";
                        break;
                    case 'status':
                        $a = "solicitud.status_sol = ?";
                        break;
                    case 'fecha_desde':
                        $a = "solicitud.timestamp_final >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "solicitud.timestamp_final <= ?";
                        break;
                    
                    default:
                        # code...
                        break;
                }

                if($cont == 1)
                {
                    $where .= $a;
                }
                elseif($cont > 1)
                {
                    $where .= " AND ".$a;
                }
            }

            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1";

            $result = $this->db->query($sql, $filtros);
           
            return $result->result();
        }
        else
        {
            return [];
        }
    }

    function obtenerAsesorHistorialSolicitud($filtros)
    {
        if($filtros['cliente'] != '')
        {
            foreach($filtros as $key=>$value)
            {
                if(is_null($value) || $value == '')
                    unset($filtros[$key]);
            }


            $where = '';
            $cont = 0;
            foreach($filtros as $key=>$value)
            {
                $cont++;
                switch ($key) {
                    case 'id_asesor':
                        $a = "id_usuario = ?";
                        break;
                    case 'nro_solicitud':
                        $a = "id = ?";
                        break;
                    case 'cliente':
                        $a = "(nombre LIKE '%".$filtros['cliente']."%' OR apellido LIKE '%".$filtros['cliente']."%')";
                        unset($filtros['cliente']);
                        break;
                    case 'dni':
                        $a = "dni = ?";
                        break;                    
                    case 'fecha':
                        $a = "date(timestamp_final) = ?";
                        break;                    
                    default:
                        # code...
                        break;
                }

                if($cont == 1)
                {
                    $where .= $a;
                }
                elseif($cont > 1)
                {
                    $where .= " AND ".$a;
                }
            }

            $sql = "SELECT solicitud.timestamp_final as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido FROM solicitud WHERE $where AND solicitud.ws_error = 1";

            $result = $this->db->query($sql, $filtros);
           
            return $result->result();
        }
        else
        {
            return [];
        }
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
    