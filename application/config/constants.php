<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//RECURSOS PUBLICOS
defined('RUTA_CSS')     OR define('RUTA_CSS'    , 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/css/');
defined('RUTA_FILES')   OR define('RUTA_FILES'  , 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/files/');
defined('RUTA_FONTS')   OR define('RUTA_FONTS'  , 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/fonts/');
defined('RUTA_IMG')     OR define('RUTA_IMG'    , 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/img/');
defined('RUTA_JS')      OR define('RUTA_JS'     , 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/js/');
defined('RUTA_PLUGINS') OR define('RUTA_PLUGINS', 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/caja_prymera/public/plugins/');

defined('CHARSET_ISO_8859_1') OR define('CHARSET_ISO_8859_1', 'Content-Type: text/html; charset=ISO-8859-1');
defined('PROYECTO_NAME')      OR define('PROYECTO_NAME','caja_prymera');
defined('RUTA_CAJA') OR define('RUTA_CAJA', 'http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null).'/'.PROYECTO_NAME.'/');

defined('PRODUCTO_MICASH')   OR define('PRODUCTO_MICASH'  ,'mi_cash');
defined('PRODUCTO_VEHICULAR')   OR define('PRODUCTO_VEHICULAR'  ,'vehicular');

//MENSAJES DE ERROR,CONFIRMACION Y EDICION
defined('MSJ_INS') OR define('MSJ_INS', 'Se Registr&oacute; Correctamente');
defined('MSJ_UPT') OR define('MSJ_UPT', 'Se Edit&oacute; Correctamente');
defined('MSJ_DEL') OR define('MSJ_DEL', 'Se Elimin&oacute; Correctamente');
defined('MSJ_ANL') OR define('MSJ_ANL', 'Se Anul&oacute; Correctamente');
defined('MSJ_GEN') OR define('MSJ_GEN', 'Se Gener&oacute; Correctamente');
defined('MSJ_INSERT_ERROR')   OR define('MSJ_INSERT_ERROR', 'Se ha insertado incorrectamente');
defined('MSJ_INSERT_SUCCESS') OR define('MSJ_INSERT_SUCCESS', 'Se ha insertado correctamente');
defined('MSJ_DELETE_ERROR')   OR define('MSJ_DELETE_ERROR', 'Se ha eliminado incorrectamente');
defined('MSJ_DELETE_SUCCESS') OR define('MSJ_DELETE_SUCCESS', 'Se ha eliminado correctamente');