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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, solicitud.dni, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor_nombre, usuario.apellido as asesor_apellido, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00'";

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

    function ajaxObtenerSolicitudes($filtros, $print)
    {
        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;

        $data = [];
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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $columns = array(
                0 => 'fecha_default',   
                2 => 'id_solicitud', 
                3=> 'CONCAT(solicitud.nombre, " ", solicitud.apellido)',
                4=>'solicitud.dni',
                5=>'agencias.AGENCIA',
                6=>'solicitud.agencia_desembolso',
                7=>'tipo_producto.descripcion',
                8 => 'CONCAT(asesor_nombre, " ", asesor_apellido)',
                9 => 'solicitud.status_sol',
                10 => 'solicitud.monto'
            );

                  
            $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
            $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

            if(!empty($_REQUEST['search']['value'])) {
                $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR CONCAT(usuario.nombre, ' ', usuario.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.dni LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.monto LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.id LIKE '%".$_REQUEST['search']['value']."%')";
            }

            $sql_total = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, solicitud.dni, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor_nombre, usuario.apellido as asesor_apellido, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {

                   if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }

                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->id_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->dni,
                        $value->AGENCIA,
                        $value->agencia_desembolso,
                        $value->descripcion,
                        $value->asesor_nombre.' '.$value->asesor_apellido,
                        $value->status_sol,
                        $value->monto
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, solicitud.dni, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor_nombre, usuario.apellido as asesor_apellido, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";

            $result = $this->db->query($sql, $filtros);

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
                    //$res[] = $value;
                    $data[] = array(
                        'fecha_default' => $value->fecha_default,
                        'fecha_solicitud' => $value->fecha_solicitud,
                        'id_solicitud' => $value->id_solicitud,
                        'nombre' => $value->nombre.' '.$value->apellido,
                        'dni' => $value->dni,
                        'agencia' => $value->AGENCIA,
                        'agencia_desembolso' => $value->agencia_desembolso,
                        'descripcion' => $value->descripcion,
                        'asesor' => $value->asesor_nombre.' '.$value->asesor_apellido,
                        'status_sol' => $value->status_sol,
                        'monto' => $value->monto        
                   );
                }
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $result_total->num_rows(),
                "recordsFiltered" => $totalFiltered,
                "data" => $data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => $data
            );
        }

        return json_encode($output);

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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00'";

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

    function ajaxObtenerAgenteCliente($filtros, $print)
    {
        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;

        $data = [];
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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $columns = array(
                0 => 'fecha_default',   
                2 => 'id_solicitud', 
                3=> 'CONCAT(solicitud.nombre, " ", solicitud.apellido)',
                4=>'agencias.AGENCIA',
                5=>'solicitud.agencia_desembolso',
                6=>'tipo_producto.descripcion',
                7 => 'solicitud.status_sol',
                8 => 'solicitud.monto'
            );

                  
            $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
            $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

            if(!empty($_REQUEST['search']['value'])) {
                $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR agencias.AGENCIA LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.monto LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.id LIKE '%".$_REQUEST['search']['value']."%')";
            }

            $sql_total = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {

                   if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }

                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->id_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->AGENCIA,
                        $value->agencia_desembolso,
                        $value->descripcion,
                        $value->status_sol,
                        $value->monto
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.agencia_desembolso, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";

            $result = $this->db->query($sql, $filtros);

            //echo $this->db->last_query();

            //$res = [];
            if($result->result())
            {
                //print_r($result->result());
                foreach ($result->result() as $key => $value)
                {
                    if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }
                    //$res[] = $value;
                    $data[] = array(
                        'fecha_default' => $value->fecha_default,
                        'fecha_solicitud' => $value->fecha_solicitud,
                        'id_solicitud' => $value->id_solicitud,
                        'nombre' => $value->nombre.' '.$value->apellido,
                        'agencia' => $value->AGENCIA,
                        'agencia_desembolso' => $value->agencia_desembolso,
                        'descripcion' => $value->descripcion,
                        'status_sol' => $value->status_sol,
                        'monto' => $value->monto,
                        'accion' => ''        
                   );              
                }
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $result_total->num_rows(),
                "recordsFiltered" => $totalFiltered,
                "data" => $data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => $data
            );
        }

        return json_encode($output);

    }

    function obtenerHistorialSolicitud($filtros)
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
                    $a = "solicitud.id = ?";
                    break;
                case 'cliente':
                    $a = "(solicitud.nombre LIKE '%".$filtros['cliente']."%' OR solicitud.apellido LIKE '%".$filtros['cliente']."%')";
                    unset($filtros['cliente']);
                    break;
                case 'dni':
                    $a = "solicitud.dni = ?";
                    break;                    
                case 'fecha':
                    $a = "date(solicitud.timestamp_final) = ?";
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

        if($where == ''){
            $where = 'solicitud.ws_error = 1 AND solicitud.timestamp_final <> "00:00:00"';
        }else{
            $where .= ' AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> "00:00:00"';
        }

        $rol = _getSesion('rol');
        $id_usuario = _getSesion('id_usuario');
        if($rol == 'administrador')
        {
            //$sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto FROM solicitud INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id WHERE $where";  


            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion, solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where";  
        }
        elseif($rol == 'jefe_agencia')
        {
            //$sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto FROM solicitud INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id WHERE $where AND cod_agencia = (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion,  solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND cod_agencia = (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";
        }            

        $result = $this->db->query($sql, $filtros);

        $res = [];

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

        return $res;
    }

    function obtenerDetalleSolicitud($id, $action)
    {
        $id_usuario = _getSesion('id_usuario');
        $rol = _getSesion('rol');

        $ac = "DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud";

        if($action == 'rechazados')
        {
            $ac = "DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud,  DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud";
        }

        $sql = "SELECT usuario.id as id_usuario, solicitud.departamento, solicitud.profesion , solicitud.id_tipo_prod as tipoCred, solicitud.condicion_laboral, solicitud.nivel_educativo, solicitud.profesion, solicitud.edad, solicitud.cuota_inicial, solicitud.tea, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, $ac, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre as nombre_titular, solicitud.apellido as apellido_titular, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, tipo_producto.id as id_producto,solicitud.periodo_gracia as primer_pago, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE solicitud.id = ?";

        $result = $this->db->query($sql, array($id));
        $result = $result->result();

        if($result[0]->agencia_desembolso != '')
        {
            $sql_des = "SELECT AGENCIA FROM agencias WHERE id = ?";
            $result_des = $this->db->query($sql_des, array($result[0]->agencia_desembolso));
            $result_des = $result_des->result();
            $result[0]->agencia_desembolso = $result_des[0]->AGENCIA;
        }
        
        if($rol == 'jefe_agencia')
        {
            $sql2 = "SELECT id as asignar_id, nombre as asignar_nombre, apellido as asignar_apellido FROM usuario WHERE id_agencia IN (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = ?) AND id <> ?";
            $result2 = $this->db->query($sql2, array($id_usuario, $result[0]->id_usuario));

            if($result2->result())
            {
                $result2 = $result2->result(); 
            }
            else
            {
                $result2 = [];
            }  
        }
        else
        {
            $result2 = [];
        }  

        //$a = $result->result()->$result2;
        return ['detalle' => $result, 'asignar' => $result2]; 
    }

    function actualizarEstadoSolicitud($id, $status, $id_asignar)
    {
        $id_usuario = _getSesion('id_usuario');

        if($id_asignar != '')
        {
            $sql = "SELECT usuario.nombre, usuario.apellido, usuario.id FROM usuario INNER JOIN solicitud on usuario.id = solicitud.id_usuario WHERE solicitud.id = ?";
            $result1 = $this->db->query($sql, array($id));
            $result1 = $result1->result();    

            $sql = "INSERT INTO historial_solicitud (id_solicitud, id_usuario, nombre) VALUES(?, ?, ?)"; 
            //$result = $this->db->query($sql, array($id, $id_asignar, $nombre_asignar));  
            $result2 = $this->db->query($sql, array($id, $result1[0]->id, $result1[0]->nombre.' '.$result1[0]->apellido));  

            $sql = "UPDATE solicitud set id_usuario = ?, status_sol = ?, id_usuario_sol = ?, timestamp_sol = ? WHERE id = ?"; 
            $result = $this->db->query($sql, array($id_asignar, $status, $id_usuario, date('Y-m-d H:i:s'), $id));
        }
        else
        {
            $sql = "UPDATE solicitud set status_sol = ?, id_usuario_sol = ?, timestamp_sol = ? WHERE id = ?";
            $result = $this->db->query($sql, array($status, $id_usuario, date('Y-m-d H:i:s'), $id));
        }        

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
                    $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') >= ?";
                    break;
                case 'fecha_hasta':
                    $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') <= ?";
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
            $where .= " AND status_sol = 2";    
        }
        else
        {
            if($rol == 'administrador')
            {
                $where .= "status_sol = 2";
            }
            elseif($rol == 'jefe_agencia')
            {
                $where .= "status_sol = 2 AND solicitud.cod_agencia IN (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";
            }
            
        }
        

        //$sql = "SELECT DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA as agencia, tipo_producto.descripcion as producto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where";


        $sql = "SELECT DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.id_tipo_prod as tipoCred FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where";


        $result = $this->db->query($sql, $filtros);

        return $result->result();
    }

    function ajaxObtenerSolicitudRechazada($filtros, $print)
    {
        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;
        $data = [];

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
                    $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') >= ?";
                    break;
                case 'fecha_hasta':
                    $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') <= ?";
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
            $where .= " AND status_sol = 2";    
        }
        else
        {
            if($rol == 'administrador')
            {
                $where .= "status_sol = 2";
            }
            elseif($rol == 'jefe_agencia')
            {
                $where .= "status_sol = 2 AND solicitud.cod_agencia IN (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario)";
            }
            
        }


        $columns = array(
                0 => 'fecha_default',   
                2=> 'CONCAT(solicitud.nombre, " ", solicitud.apellido)',
                7=>'agencia',
                8=>'tipo_producto.descripcion',
                9 => 'solicitud.status_sol'
            );

                  
        $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
        $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

        if(!empty($_REQUEST['search']['value'])) {
            $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
            $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
            $where .= " OR agencia LIKE '%".$_REQUEST['search']['value']."%')";
        }

        $sql_total = "SELECT DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.id_tipo_prod as tipoCred FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY fecha_default DESC";

        $result_total = $this->db->query($sql_total, $filtros);     

        $totalFiltered = $result_total->num_rows();

        if($print)
        {
            $data = [];
            foreach($result_total->result() as $key => $value) {
                $data[] = array(
                    $value->fecha_solicitud,                    
                    $value->nombre.' '.$value->apellido,
                    $value->dni_titular,
                    $value->celular_titular,
                    $value->nro_fijo_titular,
                    $value->id_solicitud,
                    $value->agencia,
                    $value->producto,
                    'Rechazado'
               );
            } 

            $output = array(
                 "data" => $data
            );

            return json_encode($output);

        }

        $sql = "SELECT DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.id_tipo_prod as tipoCred FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";


        $result = $this->db->query($sql, $filtros);

        if($result->result())
        {
            //print_r($result->result());
            foreach ($result->result() as $key => $value)
            {
                $data[] = array(
                    'fecha_default' => $value->fecha_default,
                    'fecha_solicitud' => $value->fecha_solicitud,                    
                    'nombre' => $value->nombre.' '.$value->apellido,
                    'dni' => $value->dni_titular,
                    'celular' => $value->celular_titular,
                    'fijo' => $value->nro_fijo_titular,
                    'id_solicitud' => $value->id_solicitud,
                    'agencia' => $value->agencia,
                    'descripcion' => $value->producto,
                    'status_sol' => 'Rechazado'
               );              
            }
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $result_total->num_rows(),
            "recordsFiltered" => $totalFiltered,
            "data" => $data
        );

        return json_encode($output);
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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $sql = "SELECT  DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00'";

            $result = $this->db->query($sql, $filtros);
           
            return $result->result();
        }
        else
        {
            return [];
        }
    }

    function ajaxObtenerAsesorAgenteCliente($filtros, $print)
    {
        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;

        $data = [];
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
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.timestamp_final, '%Y-%m-%d') <= ?";
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

            $columns = array(
                0 => 'fecha_default',   
                2 => 'id_solicitud', 
                3=> 'CONCAT(solicitud.nombre, " ", solicitud.apellido)',
                4=>'agencias.AGENCIA',
                5=>'solicitud.agencia_desembolso',
                6=>'tipo_producto.descripcion',
                7 => 'solicitud.status_sol',
                8 => 'solicitud.monto'
            );

                  
            $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
            $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

            if(!empty($_REQUEST['search']['value'])) {
                $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR agencias.AGENCIA LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.monto LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.id LIKE '%".$_REQUEST['search']['value']."%')";
            }

            $sql_total = "SELECT  DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, solicitud.agencia_desembolso, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {
                    if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }
                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->id_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->AGENCIA,
                        $value->agencia_desembolso,
                        $value->descripcion,
                        $value->status_sol,
                        $value->monto
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }

            $sql = "SELECT  DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, agencias.AGENCIA, solicitud.agencia_desembolso, tipo_producto.descripcion, usuario.nombre as asesor, solicitud.status_sol, solicitud.monto FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN usuario ON usuario.id = solicitud.id_usuario INNER JOIN tipo_producto ON tipo_producto.id = solicitud.id_tipo_prod WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00' ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";

            $result = $this->db->query($sql, $filtros);

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
                    $data[] = array(
                        'fecha_default' => $value->fecha_default,
                        'fecha_solicitud' => $value->fecha_solicitud,
                        'id_solicitud' => $value->id_solicitud,
                        'nombre' => $value->nombre.' '.$value->apellido,
                        'agencia' => $value->AGENCIA,
                        'agencia_desembolso' => $value->agencia_desembolso,
                        'descripcion' => $value->descripcion,
                        'status_sol' => $value->status_sol,
                        'monto' => $value->monto      
                   );              
                }
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $result_total->num_rows(),
                "recordsFiltered" => $totalFiltered,
                "data" => $data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => $data
            );
        }
        return json_encode($output);
    }

    function obtenerAsesorHistorialSolicitud($filtros)
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
                case 'nro_solicitud':
                    $a = "solicitud.id = ?";
                    break;
                case 'cliente':
                    $a = "(solicitud.nombre LIKE '%".$filtros['cliente']."%' OR solicitud.apellido LIKE '%".$filtros['cliente']."%')";
                    unset($filtros['cliente']);
                    break;
                case 'dni':
                    $a = "solicitud.dni = ?";
                    break;                    
                case 'fecha':
                    $a = "date(solicitud.timestamp_final) = ?";
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

        //$sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido FROM solicitud WHERE $where AND solicitud.ws_error = 1";

        $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> '00:00:00'";

        $result = $this->db->query($sql, $filtros);

        $res = [];

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

        return $res;

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
        //$id_usuario = _getSesion('id_usuario');
        //$rol = _getSesion('rol');

        $sql = "SELECT solicitud.id_nota, notas.nota, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tcea,solicitud.tea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre as nombre_titular, solicitud.apellido as apellido_titular, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, tipo_producto.id as id_producto, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id LEFT JOIN notas ON solicitud.id_nota = notas.id WHERE solicitud.id = ?";


        $result = $this->db->query($sql, array($id));
        $result = $result->result();

        if($result[0]->agencia_desembolso != '')
        {
            $sql_des = "SELECT AGENCIA FROM agencias WHERE id = ?";
            $result_des = $this->db->query($sql_des, array($result[0]->agencia_desembolso));
            $result_des = $result_des->result();
            $result[0]->agencia_desembolso = $result_des[0]->AGENCIA;
        }

        
       
        return $result;        
    }

    function obtenerSolicitudesTotales($filtros)
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
                    /*case 'dni':
                        $a = "solicitud.dni = ?";                    
                        break;*/
                    case 'id_asesor':
                        $a = "solicitud.id_usuario = ?";                    
                        break;
                    case 'fecha_desde':
                        $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') <= ?";
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
            if($where == '')
            {
                $where .= " 1";    
            }
            /*if($where != '')
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
            }*/
            /*if(_getSesion('rol') == 'jefe_agencia') {

            }*/
            $sql = "SELECT solicitud.last_page, solicitud.ws_error, DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d') as fecha_final,  DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular,agencias.ip as ip_agencia, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where";

            $result = $this->db->query($sql, $filtros);
            return $result->result();
        }
        else
        {
            return [];
        }
    }

    function ajaxObtenerSolicitudesTotales($filtros, $print)
    {
        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;

        $data = [];

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
                    /*case 'dni':
                        $a = "solicitud.dni = ?";                    
                        break;*/
                    case 'id_asesor':
                        $a = "solicitud.id_usuario = ?";                    
                        break;
                    case 'fecha_desde':
                        $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') >= ?";
                        break;
                    case 'fecha_hasta':
                        $a = "DATE_FORMAT(solicitud.fec_estado, '%Y-%m-%d') <= ?";
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
            if($where == '')
            {
                $where .= " 1";    
            }

            $columns = array(
                0 => 'fecha_default',   
                2=> 'CONCAT(solicitud.nombre, " ", solicitud.apellido)',
                3=>'dni_titular',
                4=>'producto',
                5 => 'solicitud.status_sol',
                6 => 'solicitud.last_page',
                7 => 'id_solicitud'
            );

                  
            $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
            $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

            if(!empty($_REQUEST['search']['value'])) {
                $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.dni LIKE '%".$_REQUEST['search']['value']."%'";
                $where .= " OR solicitud.id LIKE '%".$_REQUEST['search']['value']."%')";
            }

            $sql_total = "SELECT solicitud.last_page, solicitud.ws_error, DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_final,  DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular,agencias.ip as ip_agencia, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {
                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->dni_titular,
                        $value->producto,
                        $value->status_sol,
                        $value->last_page,
                        $value->id_solicitud,                       
                        $value->ip_agencia
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }


            $sql = "SELECT solicitud.last_page, solicitud.ws_error, DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_final,  DATE_FORMAT(solicitud.fec_estado,'%Y-%m-%d') as fecha_default, DATE_FORMAT(solicitud.fec_estado,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.fec_estado,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.id as id_solicitud, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular,agencias.ip as ip_agencia, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";

            $result = $this->db->query($sql, $filtros);
            if($result->result())
            {
                foreach ($result->result() as $key => $value)
                {
                    $data[] = array(
                        'fecha_default' => $value->fecha_default,
                        'fecha_solicitud' => $value->fecha_solicitud,
                        'nombre' => $value->nombre.' '.$value->apellido,
                        'dni' => $value->dni_titular,
                        'producto' => $value->producto,
                        'status_sol' => $value->status_sol,
                        'last_page' => $value->last_page,
                        'id_solicitud' => $value->id_solicitud,                       
                        'ip' => $value->ip_agencia      
                   );              
                }
            }
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $result_total->num_rows(),
                "recordsFiltered" => $totalFiltered,
                "data" => $data
            );
        }
        else
        {
            $output = array(
                "draw" => $draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => $data
            );
        }
        return json_encode($output);
    }

    //****************************************

    function ajaxObtenerHistorialSolicitud($filtros, $print)
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
                    $a = "solicitud.id = ?";
                    break;
                case 'cliente':
                    $a = "(solicitud.nombre LIKE '%".$filtros['cliente']."%' OR solicitud.apellido LIKE '%".$filtros['cliente']."%')";
                    unset($filtros['cliente']);
                    break;
                case 'dni':
                    $a = "solicitud.dni = ?";
                    break;                    
                case 'fecha':
                    $a = "date(solicitud.timestamp_final) = ?";
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

        if($where == ''){
            $where = 'solicitud.ws_error = 1 AND solicitud.timestamp_final <> "00:00:00"';
        }else{
            $where .= ' AND solicitud.ws_error = 1 AND solicitud.timestamp_final <> "00:00:00"';
        }

        $rol = _getSesion('rol');
        $id_usuario = _getSesion('id_usuario');
        
        $columns = array(
            0 => 'fecha_default',   
            2 => 'CONCAT(solicitud.nombre, " ", solicitud.apellido)', 
            4 => 'id_solicitud',
            28 => 'producto',
            29 => 'id_solicitud'
        );

        $draw = isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 1;
        $start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : 0;
        $length = isset($_REQUEST["length"]) ? $_REQUEST["length"] : 10;      
        $orderBy = isset($_REQUEST['order'][0]['column']) ? $columns[$_REQUEST['order'][0]['column']] : null;
        $orderAscDesc = isset($_REQUEST['order'][0]['dir']) ? $_REQUEST['order'][0]['dir'] : null;

        if(!empty($_REQUEST['search']['value'])) {
            $where .= " AND (CONCAT(solicitud.nombre, ' ', solicitud.apellido) LIKE '%".$_REQUEST['search']['value']."%'";
            $where .= " OR tipo_producto.descripcion LIKE '%".$_REQUEST['search']['value']."%'";
            $where .= " OR solicitud.id LIKE '%".$_REQUEST['search']['value']."%')";
        }

        if($rol == 'administrador')
        {

            $sql_total = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion, solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {

                   if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }

                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->dni_titular,
                        $value->celular_titular,
                        $value->nro_fijo_titular,
                        $value->monto,
                        $value->plazo,
                        $value->cuota_mensual,
                        $value->cuota_inicial,
                        $value->plazo*$value->cuota_mensual,
                        $value->tea,
                        $value->tcea,
                        $value->id_solicitud,
                        $value->agencia,
                        $value->usuario_nombre.' '.$value->usuario_apellido
                   );
                } 

                $output = array(
                     "data" => $data
                     /*"data" => array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge(array_merge($data, $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data), $data)*/
                     /*"data" => [
                            ["John Doe", 0, 0, "0.00", 0],
                            ["John Doe", 0, 0, "0.00", 0]
                            ]*/
                );

                return json_encode($output);

            }


            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion, solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";

        }
        elseif($rol == 'jefe_agencia')
        {
            $sql_total = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion,  solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND cod_agencia = (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario) ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {

                   if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }

                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->dni_titular,
                        $value->celular_titular,
                        $value->nro_fijo_titular,
                        $value->monto,
                        $value->plazo,
                        $value->cuota_mensual,
                        $value->cuota_inicial,
                        $value->plazo*$value->cuota_mensual,
                        $value->tea,
                        $value->tcea,
                        $value->id_solicitud,
                        $value->agencia,
                        $value->usuario_nombre.' '.$value->usuario_apellido
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion,  solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND cod_agencia = (SELECT GROUP_CONCAT(id) FROM agencias WHERE id_sup_agencia = $id_usuario) ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";
        }
        else
        {
            $sql_total = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion,  solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND solicitud.id_usuario = $id_usuario ORDER BY fecha_default DESC";

            $result_total = $this->db->query($sql_total, $filtros);

            $totalFiltered = $result_total->num_rows();

            if($print)
            {
                $data = [];
                foreach($result_total->result() as $key => $value) {

                   if($value->agencia_desembolso != '')
                    {
                        $sql = "SELECT AGENCIA FROM agencias where id = ?";
                        $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                        $a = $agencias->result();
                        $value->agencia_desembolso = $a[0]->AGENCIA;                    
                    }

                    $data[] = array(
                        $value->fecha_solicitud,
                        $value->nombre.' '.$value->apellido,
                        $value->dni_titular,
                        $value->celular_titular,
                        $value->nro_fijo_titular,
                        $value->monto,
                        $value->plazo,
                        $value->cuota_mensual,
                        $value->cuota_inicial,
                        $value->plazo*$value->cuota_mensual,
                        $value->tea,
                        $value->tcea,
                        $value->id_solicitud,
                        $value->agencia,
                        $value->usuario_nombre.' '.$value->usuario_apellido
                   );
                } 

                $output = array(
                     "data" => $data
                );

                return json_encode($output);

            }

            $sql = "SELECT DATE_FORMAT(solicitud.timestamp_final,'%Y-%m-%d %H:%i:%s') as fecha_default, DATE_FORMAT(solicitud.timestamp_final,'%d-%m-%Y') as fecha_solicitud, solicitud.id as id_solicitud, solicitud.id_tipo_prod as tipoCred, solicitud.edad, solicitud.nivel_educativo, solicitud.profesion,  solicitud.condicion_laboral, solicitud.nombre, solicitud.apellido, tipo_producto.descripcion as producto, solicitud.departamento, solicitud.provincia, solicitud.distrito, usuario.nombre as usuario_nombre, usuario.apellido as usuario_apellido, agencias.AGENCIA as agencia, solicitud.status_sol, DATE_FORMAT(solicitud.timestamp_final,'%H:%i:%S') as hora_solicitud, DATE_FORMAT(solicitud.timestamp_sol,'%d-%m-%Y') as fecha_cierre, DATE_FORMAT(solicitud.timestamp_sol,'%H:%i:%S') as hora_cierre, solicitud.marca, solicitud.modelo, solicitud.valor_auto, solicitud.plazo, solicitud.cuota_mensual, solicitud.tea, solicitud.tcea, solicitud.monto, solicitud.salario, solicitud.empleador, solicitud.dir_empleador, solicitud.nombre_conyugue, solicitud.dni as dni_titular, solicitud.dni_conyugue, solicitud.email as email_titular, solicitud.celular as celular_titular, solicitud.nro_fijo as nro_fijo_titular, solicitud.cuota_inicial, solicitud.agencia_desembolso as agencia_desembolso FROM solicitud INNER JOIN agencias ON solicitud.cod_agencia = agencias.id INNER JOIN tipo_producto ON solicitud.id_tipo_prod = tipo_producto.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE $where AND solicitud.id_usuario = $id_usuario ORDER BY $orderBy $orderAscDesc LIMIT $start, $length";
        }            

        $result = $this->db->query($sql, $filtros);

        $res = [];

        $data = [];

        //////
        foreach($result->result() as $key => $value) {
           if($value->agencia_desembolso != '')
            {
                $sql = "SELECT AGENCIA FROM agencias where id = ?";
                $agencias = $this->db->query($sql, array($value->agencia_desembolso));
                $a = $agencias->result();
                $value->agencia_desembolso = $a[0]->AGENCIA;                    
            }
            //$res[] = $value; 
            $data[] = array(
                'fecha_default' => $value->fecha_default,
                'fecha_solicitud' => $value->fecha_solicitud,
                'nombre' => $value->nombre.' '.$value->apellido,
                'producto' => $value->producto,
                'id_solicitud' => $value->id_solicitud,
                'a' => $value->fecha_default,
                'b' => $value->fecha_solicitud,
                'c' => $value->nombre.' '.$value->apellido,
                'd' => $value->producto,
                'e' => $value->id_solicitud,
                'f' => $value->fecha_default,
                'g' => $value->fecha_solicitud,
                'h' => $value->nombre.' '.$value->apellido,
                'i' => $value->producto,
                'j' => $value->id_solicitud,
                'k' => $value->fecha_default,
                'l' => $value->fecha_solicitud,
                'm' => $value->nombre.' '.$value->apellido,
                'n' => $value->producto,
                'o' => $value->id_solicitud,
                'p' => $value->fecha_default,
                'q' => $value->fecha_solicitud,
                'r' => $value->nombre.' '.$value->apellido,
                's' => $value->producto,
                't' => $value->id_solicitud,
                'u' => $value->fecha_default,
                'v' => $value->fecha_solicitud,
                'w' => $value->nombre.' '.$value->apellido,
                'x' => $value->producto,
                'y' => $value->id_solicitud             
           );
        }          

        $output = array(
           "draw" => $draw,
             "recordsTotal" => $result_total->num_rows(),
             "recordsFiltered" => $totalFiltered,
             "data" => $data
        );
          
        ///////

        return json_encode($output);

    }


}
    