<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('__compararFechas')) {
    /**
     * Comparar fechas en formato DD/MM/YYYY
     * @param  $fecInicio, $fecFin, $texto
     * @return Exception
     */
    /** @author Frank
     */
    function __compararFechas($fecInicio,$fecFin, $texto){
        $fechaIni  = array();
        $fechaFin  = array();
        $fechaIni = explode('/', $fecInicio);
        $fechaFin = explode('/', $fecFin);
        $fechaIni = array_reverse($fechaIni);
        $fechaFin = array_reverse($fechaFin);
        $fechaInicio = implode('-', $fechaIni);
        $fechaFinal  = implode('-', $fechaFin);
        if($fechaInicio > $fechaFinal){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validar_fecha')) {
    /**
     * Valida fecha en formato DD/MM/YYYY
     * @param  $fecha, $texto
     * @return Exception
     */
    /** @author Frank
     */
    function __validar_fecha($fecha, $texto) {
        $test_arr  = explode('/', $fecha);
        if(count($test_arr) != 3) {
            throw new Exception($texto);
        }
        if (!checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {//MES / DIA / YEAR
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validar_fecha2')) {
    /**
     * Valida fecha en formato YYYY-MM-DD
     * @param  $fecha, $texto
     * @return Exception
     */
    /** @author Frank
     */
    function __validar_fecha2($fecha, $texto) {
        $test_arr  = explode('-', $fecha);
        if(count($test_arr) != 3) {
            throw new Exception($texto);
        }
        if (!checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {//MES / DIA / YEAR
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__soloLetras')) {
    /** @author Frank
     */
    function __soloLetras($palabras, $texto){
        $pattern = '/^[a-zA-Z_áéíóúñÁÉÍÓÚÑ\s]*$/';
        if (filter_var($palabras, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$pattern))) == null) {
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__empty')) {
    /** @author Frank
     */
    function __empty($in, $texto){
        $in = trim($in);
        if(empty($in)){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__positivo')) {
    /** @author Frank
     */
    function __positivo($in, $texto){
        if($in <= 0){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__numero_decimal')) {
    /** @author Frank
     */
    function __numero_decimal($in, $texto){
        if(filter_var($in, FILTER_VALIDATE_FLOAT) === FALSE) {
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__expresiones_regulares')) {
    /** @author Frank
     */
    function __expresiones_regulares($in, $texto, $regexp){
        if(filter_var($in, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regexp))) === FALSE){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validate_url')) {
    /** @author Frank
     */
    function __validate_url($in, $texto){
        if(filter_var($in, FILTER_VALIDATE_URL) === FALSE){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__numero_entero')) {
    /** @author Frank
     */
    function __numero_entero($in, $texto){
        if (filter_var($in, FILTER_VALIDATE_INT) === FALSE){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validar_email')) {
    /** @author Frank
     */
    function __validar_email($in, $texto){
        if (filter_var($in, FILTER_VALIDATE_EMAIL) === FALSE){
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__is_null')) {
    /** @author Frank
     */
    function __is_null($in){
        $in = trim($in);
        if($in == null){
            throw new Exception(ANP);
        }
    }
}

if(!function_exists('__validateYearOfDate')) {
    /** Valida la el año de la fecha
     * Quita espacions a los costados y realiza utf8_decode
     * @author cvillarreal
     */
    function __validateYearOfDate($date , $year , $msj) {
        $fechaIni = explode('/', $date);
        if($fechaIni[2] <> $year){
            throw new Exception($msj);
        }
    }
}

if(!function_exists('__validarSizeCampo')) {
    /** Valida el tamanio de un campo
     * @author Sebastian
     */
    function __validarSizeCampo($valor , $size , $msj) {
        if(strlen($valor) > $size) {
            throw new Exception($msj);
        }
    }
}

if(!function_exists('__validarSizeCampo2')) {
    /** Valida el tamanio de un campo
     * @author Sebastian
     */
    function __validarSizeCampo2($valor , $size , $msj) {
        if(strlen($valor) != $size) {
            throw new Exception($msj);
        }
    }
}

if(!function_exists('__validarLetrasyNumeros')) {
    /** Valida letras y numeros
     * @author Sebastian
     */
    function __validarLetrasyNumeros($palabras, $texto){
        $pattern = '/^[ a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ.\s]*$/';
        if (filter_var($palabras, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$pattern))) == null) {
            throw new Exception($texto.'**');
        }
    }
}

if(!function_exists('__validarMayorQue')) {
    /** Valida que el primer valor no sea mayor al segundo
     * @author Sebastian
     */
    function __validarMayorQue($valor, $aComparar, $texto){
        if ($valor > $aComparar) {
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validarMenorQue')) {
    /** Valida que el primer valor no sea mayor al segundo
     * @author Frank
     */
    function __validarMenorQue($valor, $aComparar, $texto){
        if ($valor < $aComparar) {
            throw new Exception($texto);
        }
    }
}

if(!function_exists('__validarMenorIgualQue')) {
    /** Valida que el primer valor no sea mayor al segundo
     * @author Frank
     */
    function __validarMenorIgualQue($valor, $aComparar, $texto){
        if ($valor <= $aComparar) {
            throw new Exception($texto);
        }
    }
}