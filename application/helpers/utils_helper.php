<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('_log')) {
    function _log($var) {
        $CI =& get_instance();
        /*$clase = $CI->router->fetch_class();
         $metodo = $CI->router->fetch_method();*/
        $dbgt = debug_backtrace();
        if(isset($dbgt[1]['class'])) {
            $class = $dbgt[1]['class'];
        } else {
            $ruta = explode(DIRECTORY_SEPARATOR, $dbgt[0]['file']);
            $class = end($ruta);
        }
        log_message('error', '( '.$class.' -> '.$dbgt[1]['function'].') (linea: '.$dbgt[0]['line'].') >> '.$var);
    }
}

if(!function_exists('_logLastQuery')) {
    /**
     * Valida si es entero
     * @param $input - valor a evaluar
     * @return bool true / false
     */
    function _logLastQuery($marca = null) {
        $CI =& get_instance();
        /*$clase = $CI->router->fetch_class();
         $metodo = $CI->router->fetch_method();*/
        $dbgt = debug_backtrace();
        log_message('error', '( '.$dbgt[1]['class'].' -> '.$dbgt[1]['function'].') (linea: '.$dbgt[0]['line'].') >> '.$marca.' - '.$CI->db->last_query());
    }
}

if(!function_exists('_fecha_tabla')) {
    /**
     * Transforma la fecha en el formato indicado para una tabla
     * @param date $fecha
     * @param string $formato d/m/Y, d/m/Y h:i:s A
     * @return fecha con formato
     */
    function _fecha_tabla($fecha, $formato) {
        return ($fecha == null) ? null : date($formato,strtotime($fecha));
    }
}

if(!function_exists('_getYear')) {
    /**
     * Retornar el año actual
     * @return integer - anio actual
     */
    function _getYear() {
        return date('Y');
    }
}

if(!function_exists('_encodeCI')) {
    /**
     * Encripta usando codeigniter encode
     * @param $toEncrypt variable que sera encriptada
     * @return variable encriptada
     */
    function _encodeCI($toEncrypt) {
        $CI =& get_instance();
        return $CI->encrypt->encode($toEncrypt);
    }
}

if(!function_exists('_decodeCI')) {
    /**
     * Desencripta usando codeigniter decode
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _decodeCI($toDecrypt) {
        $CI =& get_instance();
        return $CI->encrypt->decode($toDecrypt);
    }
}

if(!function_exists('_decodeCIURL')) {
    /**
     * Desencripta usando codeigniter decode pero si la variable viene de URL (get)
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _decodeCIURL($toDecrypt) {
        $CI =& get_instance();
        return $CI->encrypt->decode(str_replace(' ', '+', $toDecrypt));
    }
}

if(!function_exists('_simpleEncrypt')) {
    /**
     * Desencripta usando mcrypt_encrypt
     * @param $toDecrypt variable que sera desencriptada
     * @return variable encriptada
     */
    function _simple_encrypt($toEncrypt) {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, $toEncrypt, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
}

if(!function_exists('_simpleDecrypt')) {
    /**
     * Desencripta usando mcrypt_decrypt
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _simple_decrypt($toDecrypt) {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, base64_decode($toDecrypt), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

if(!function_exists('_simpleDecryptInt')) {
    /**
     * Desencripta usando mcrypt_decrypt para integer, retorna null si no desencripto bien
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function _simpleDecryptInt($toDecrypt) {
        $dec = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, CLAVE_ENCRYPT, base64_decode($toDecrypt), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        if(!is_numeric($dec)){
            $dec = null;
        }
        return $dec;
    }
}

if(!function_exists('_validateDate')) {
    /**
     * Esta funcion valida si una fecha tiene el formato correcto
     * @param $date fecha a validar
     * @param $format ejemplo: d/m/Y
     * @return boolean (TRUE OK / FALSE NO OK)
     */
    function _validateDate($date, $format = 'd/m/Y'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}

if(!function_exists('__validFecha')) {
    /**
     * Valida fecha en formato DD/MM/YYYY
     * @param  $fecha
     * @return boolean
     */
    function __validFecha($fecha){
        $test_arr  = explode('/', $fecha);
        if (count($test_arr) == 3) {
            if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {//MES / DIA / YEAR
                return true;
            }
            return false;
        }
        return false;
    }
}

if(!function_exists('__validFecha2')) {
    /**
     * Valida en formato YYYY-MM-DD
     * @param  $fecha
     * @return boolean
     */
    function __validFecha2($fecha){
        $test_arr  = explode('-', $fecha);
        if (count($test_arr) == 3) {
            if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {//YEAR / MES / DIA
                return true;
            }
            return false;
        }
        return false;
    }
}

if(!function_exists('_getFotoPerfil')) {
    /**
     * @param $usuario Array consulta BD tiene que traer foto_persona y google_foto
     * @return string ruta de la foto a mandar en sesion
     */
    function _getFotoPerfil($usuario) {
        $foto = null;
        if($usuario['foto_persona'] != null) {
            $foto = RUTA_SMILEDU.$usuario['foto_persona'];
        } else if($usuario['google_foto'] != null) {
            $foto = $usuario['google_foto'];
        } else if($usuario['foto_persona'] == null && $usuario['google_foto'] == null) {
            $foto = RUTA_SMILEDU.FOTO_DEFECTO;
        }
        return $foto;
    }
}

if(!function_exists('_validate_usuario_controlador')) {
    /** Valida la permanencia del usuario en el sistema
     */
    function _validate_usuario_controlador($idPermiso) {
        $CI =& get_instance();
        if(!isset($_COOKIE[$CI->config->item('sess_cookie_name')])) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
        $idPersona = $CI->session->userdata('nid_persona');
        if($idPersona == null) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
        if($CI->m_utils->validarPersonaPermiso($idPersona, $idPermiso) == false) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
    }
}

if(!function_exists('_validate_uso_controladorModulos')) {
    /** Valida la permanencia del usuario en el sistema
     */
    function _validate_uso_controladorModulos($idModulo, $idPermiso = null, $rolSessName) {
        $CI =& get_instance();
        $idRol     = $CI->session->userdata($rolSessName);
        if(!isset($_COOKIE[$CI->config->item('sess_cookie_name')])) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
        $idPersona = $CI->session->userdata('nid_persona');
        
        if($idPersona == null || $idRol == null) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
        $CI->load->model('../m_utils', 'utiles');
        //VALIDAR QUE EL ROL Y EL USUARIO TENGAN EL PERMISO
        if($idPermiso != null) {
            if($CI->utiles->checkIfRolHasPermiso($idRol, $idModulo, $idPermiso) == false) {
                if($CI->utiles->checkIfUserHasPermiso($idPersona, $idPermiso ) == false ) {
                    $CI->session->sess_destroy();
                    redirect('','refresh');
                }
            }
        }
        //VALIDAR QUE EL USUARIO TENGA EL ROL
        if($CI->utiles->checkIfUserHasRol($idPersona, $idRol) == false  && $idRol != ID_ROL_FAMILIA) {
            $CI->session->sess_destroy();
            redirect('','refresh');
        }
    }
}

if(!function_exists('_post')) {
    /**
     */
    function _post($postIndex) {
        $CI =& get_instance();
        return $CI->input->post($postIndex);
    }
}

if(!function_exists('_get')) {
    /**
     */
    function _get($getIndex) {
        $CI =& get_instance();
        return $CI->input->get($getIndex);
    }
}

if(!function_exists('_getSesion')) {
    /**
     */
    function _getSesion($sessionIndex) {
        $CI =& get_instance();
        return $CI->session->userdata($sessionIndex);
    }
}

if(!function_exists('_setSesion')) {
    /**
     */
    function _setSesion($sessionArray) {
        $CI =& get_instance();
        return $CI->session->set_userdata($sessionArray);
    }
}

if(!function_exists('_unsetSesion')) {
    /**
     */
    function _unsetSesion($sessionKey) {
        $CI =& get_instance();
        return $CI->session->unset_userdata($sessionKey);
    }
}

if(!function_exists('_ucwords')) {
    function _ucwords($palabra) {
        return mb_convert_case(mb_strtolower($palabra, 'iso-8859-1'), MB_CASE_TITLE, 'iso-8859-1');
    }
}

if(!function_exists('__mayusc')) {
    function __mayusc($palabra) {
        return mb_convert_case(mb_strtoupper($palabra, 'iso-8859-1'), MB_CASE_UPPER, 'iso-8859-1');
    }
}

if(!function_exists('__minusc')) {
    function __minusc($palabra) {
        return mb_convert_case(mb_strtolower($palabra, 'iso-8859-1'), MB_CASE_LOWER, 'iso-8859-1');
    }
}

if(!function_exists('_ucfirst')) {
    function _ucfirst($palabra) {
        $newStr = '';
        $match = 0;
        foreach(str_split($palabra) as $k=> $letter) {
            if($match == 0 && preg_match('/^\p{L}*$/', $letter)) {
                $newStr .= _ucwords($letter);
                break;
            }else{
                $newStr .= $letter;
            }
        }
        return $newStr.substr($palabra,$k+1);
    }
}

if(!function_exists('__getDescReduce')) {
    function __getDescReduce($desc, $length) {
        $lenghDesc  = strlen($desc);
        if($lenghDesc > $length) {
            $desc1 = substr($desc, - ($lenghDesc), $length);
            $desc  = $desc1."..";
        }
        return $desc;
    }
}

if(!function_exists('validar_decimales')) {
    function validar_decimales($num) {
        if (preg_match("/^[01.]*$/",$num)){
            return 1;
        } else {
            return 0;
        }
    }
}

if(!function_exists('__generateRandomString')) {
    function __generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = null;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

if(!function_exists('__enviarEmail')) {
    function __enviarEmail($correoDestino, $asunto, $body, $doc = null) {
        $CI =& get_instance();
        $CI->load->library('email');
        $configGmail = array(
            'protocol'  => PROTOCOL,
            'smtp_host' => SMTP_HOST,
            'smtp_port' => SMTP_PORT,
            'smtp_user' => CORREO_BASE,
            'smtp_pass' => PASSWORD_BASE,
            'mailtype'  => MAILTYPE,
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'starttls'  => TRUE);
        $CI->email->initialize($configGmail);
        $CI->email->from(CORREO_BASE);
        $CI->email->to($correoDestino);
        $CI->email->subject($asunto);
        $CI->email->message($body);
        if($doc != null){
            $CI->email->attach($doc);
        }
        if (!$CI->email->send()) {
            throw new Exception('Hubo un error al enviar el correo');
        }
        return array('error' => EXIT_SUCCESS, 'msj' => 'Se enviÃ³ el correo');
    }
}

if(!function_exists('__getArrayStringFromArray')) {
    /**
     * Desencripta usando mcrypt_decrypt
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function __getArrayStringFromArray($data, $decrypt = null) {
        $arrayIds = null;
        foreach ($data as $var){
            $id = null;
            if($decrypt == 1){
                $id = _simple_decrypt($var);
            }else{
                $id = _decodeCI($var);
            }
            if($id != null){
                $arrayIds .= $id.',';
            }
        }
        $arrayIds = substr($arrayIds,0,(strlen($arrayIds)-1));
        return $arrayIds;
    }
}

if(!function_exists('__getArrayObjectFromArray')) {
    /**
     * Desencripta usando mcrypt_decrypt
     * @param $toDecrypt variable que sera desencriptada
     * @return variable desencriptada
     */
    function __getArrayObjectFromArray($data, $decrypt = null) {
        $arrayIds = array();
        if(is_array($data)) {
            foreach ($data as $var){
                $id = null;
                if($decrypt == 1){
                    $id = _simple_decrypt($var);
                }else{
                    $id = _decodeCI($var);
                }
                if($id != null){
                    array_push($arrayIds, $id);
                }
            }
        }
        return $arrayIds;
    }
}

if(!function_exists('__only1whitespace')) {
    /**
     * Elimina los espacios en blanco multiples
     * @param $text variable que sera transformada
     * @return variable transformada
     */
    
    function __only1whitespace($text) {
        $text = preg_replace('!\s+!', ' ', $text);
        return trim($text);
    }
}

if(!function_exists('__getCookieName')) {
    /**
     * Obtener el nombre del cookie del proyecto
     * @return Nombre del cookie del proyecto
     */
    
    function __getCookieName() {
        $CI =& get_instance();
        return $CI->config->item('sess_cookie_name');
    }
}

if(!function_exists('__getPostMaxFileSize')) {
    /**
     * En bytes, tamano maximo del post
     * @return number
     */
    function __getPostMaxFileSize() {
        return (int)(str_replace('M', '', ini_get('post_max_size')) * 1024 * 1024);//bytes
    }
}

if(!function_exists('__getPostMaxFileSizeByUnidad')) {
    /**
     * Dependiente la unidad de medida retorna la capacidad MB = megabytes
     * @return number
     */
    function __getPostMaxFileSizeByUnidad($unidad = 'MB') {
        if($unidad == 'MB') {
            return str_replace('M', '', ini_get('post_max_size')).' MBs';
        }
        //Hacer logica para otras unidades de medida usando 2014
    }
}

if(!function_exists('__checkBase64_image')) {
    /**
     * Valida si un base64 es imagen o no
     * @return true => es imagen / false => no es imagen
     */
    function __checkBase64_image($img64) {
        $img64 = substr($img64, strpos($img64, ',')+1, strlen($img64));
        $img = imagecreatefromstring(base64_decode($img64));
        if (!$img) {
            return false;
        }
        imagepng($img, 'tmp.png');
        $info = getimagesize('tmp.png');
        unlink('tmp.png');
        if ($info[0] > 0 && $info[1] > 0 && $info['mime']) {
            return true;
        }
        return false;
    }
}

if(!function_exists('__checkPasswordStrength')) {
    function __checkPasswordStrength($clave) {
        $pattern = '/(?<=\d).*((?<=[a-z]).*[A-Z]|(?<=[A-Z]).*[a-z])|(?<=[a-z]).*((?<=[A-Z]).*\d|(?<=\d).*[A-Z])|(?<=[A-Z]).*((?<=[a-z]).*\d|(?<=\d).*[a-z])/';
        $clave = trim($clave);
        if (!empty($clave) && strlen($clave) >= CLAVE_CANT_CARACT && preg_match($pattern, $clave)) {//not empty, match ANY character after trimming the string 8 or more times
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('__validarNroDoc')) {
    function __validarNroDoc($tipDoc, $nroDoc) {
        $nroDoc = trim($nroDoc);
        if($tipDoc != TIPO_DOC_DNI && $tipDoc != TIPO_DOC_CARNET_EXTRANJERO) {
            throw new Exception('Tipo de documento incorrecto');
        }
        if($nroDoc == null || $nroDoc == '') {
            throw new Exception('Ingrese el nro. de documento');
        }
        if(!ctype_digit((string) $nroDoc)) {
            throw new Exception('Ingrese solo n&uacute;meros en nro. de documento');
        }
        $cantDigits = null;
        if($tipDoc == TIPO_DOC_DNI) {
            $cantDigits = 8;
        } else if($tipDoc == TIPO_DOC_CARNET_EXTRANJERO) {
            $cantDigits = 12;
        }
        if(strlen($nroDoc) != $cantDigits) {
            throw new Exception('El nro. de documento debe contener '.$cantDigits.' d&iacute;gitos');
        }
        return true;
    }
}

if(!function_exists('__getPadre')) {
    function __getPadre($orden) {
        $arr = explode('.', $orden);
        $padre = null;
        $pos = 0;
        $ln = 0;
        $cero = null;
        foreach ($arr as $var) {
            if($var != 0) {
                $padre .= $var;
                $ln = strlen($var);
                $pos = $pos + $ln;
            } else {
                $cero .= '0';
            }
        }
        $padre = substr_replace($padre, '0', $pos-$ln, $ln);
        return $padre.$cero;
    }
}

if(!function_exists('__unaccent')) {
    function __unaccent($str) {
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $str = strtr( $str, $unwanted_array );
        return $str;
    }
}

if(!function_exists('__getTinyUrl')) {
    function __getTinyUrl($longURL) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$longURL);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}

if(!function_exists('__generarQRLink')) {
    function __generarQRLink($rutaLink) {
        $cht = "qr";
        $chs = "250x250";
        $chl = urlencode($rutaLink);
        $choe = "UTF-8";
        $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
        return $qrcode;
    }
}

if(!function_exists('__buildSeriesByPromedioCursosEstudiante')) {
    function __buildSeriesByPromedioCursosEstudiante($idAnio, $idGrado, $idEstudiante, $idCicloAcad, $idAula, $tipo_programa,$idSede) {
        $CI =& get_instance();
        $CI->load->model('notas/m_tutoria');
        $cursos = $CI->m_tutoria->promedioCursos($idEstudiante, null, $tipo_programa, $idAnio, $idSede, $idGrado, $idAula, null, $idCicloAcad,1);
        $arrayPromedio = array();
        $arrayCursos   = array();
        foreach($cursos as $row){
            array_push($arrayPromedio , floatval($row->promedio));
            array_push($arrayCursos   , utf8_encode($row->desc_curso));
        }
        $data['arrayCate'] = json_encode($arrayCursos);
        $data['arrayProm'] = json_encode($arrayPromedio);
        return json_encode($data);
    }
}

if(!function_exists('__regexRemoveTag')) {
    /** quita las etiqueta html
     *  $replace => ''
     *  $html => <h1>hello</h1>
     *  return => hello
     */
    function __regexRemoveTag($replace, $html) {
        return preg_replace('/<[^>]*>/', $replace, $html);
    }
}

if(!function_exists('__getTextValue')) {
    /** Recibe la descripcion que se envia
     * Quita espacions a los costados y realiza utf8_decode
     */
    function __getTextValue($postIndex) {
        return trim(__regexRemoveTag('',__only1whitespace(utf8_decode(_post($postIndex)))));
    }
}

if(!function_exists('__cvf_convert_object_to_array')) {
    function __cvf_convert_object_to_array($data) {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        if (is_array($data)) {
            return array_map(__FUNCTION__, $data);
        } else {
            return $data;
        }
    }
}

if(!function_exists('__generateCorrelativo')) {
    function __generateCorrelativo($string , $cant){
        $lengthCorre = strlen($string);
        $newString   = null;
        for($i = $lengthCorre; $i < $cant; $i++){
            $newString.= '0';
        }
        $newString.= $string;
        return $newString;
    }
}

if(!function_exists('__cambiarFormatoFecha')) {
    function __cambiarFormatoFecha($fecha){
        $fechaNac  = array();
        $fechaNac= explode('/', $fecha);
        $fechaNac= array_reverse($fechaNac);
        $fecha= implode('-', $fechaNac);
        return $fecha;
    }
}

if(!function_exists('__formatoFecha')) {
    function __formatoFecha($fecha, $formato = 'Y-m-d'){
        $date = new DateTime($fecha);
        return $date->format($formato);
    }
}

/**
 * Encuentra un elemento en una array multidimensional
 * @param $elem (elemento a buscar), $array, $field (campo a comparar)
 */
if(!function_exists('_in_multiarray')) {
    function _in_multiarray($elem, $array, $field) {
        $top = sizeof($array) - 1;
        $bottom = 0;
        while($bottom <= $top) {
            if($array[$bottom][$field] == $elem)
                return true;
                else
                    if(is_array($array[$bottom][$field]))
                        if($this->in_multiarray($elem, ($array[$bottom][$field])))
                            return true;
                            $bottom++;
        }
        return false;
    }
}