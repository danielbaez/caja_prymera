<?php
require('../config/database.php');
/*defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    
    function __construct() {
        echo '123';
        parent::__construct();
        $this->load->model('M_producto');
        $this->load->model('M_preaprobacion');
       $this->M_preaprobacion->insertPrueba();
    }

    public function index()
    {             
        $data['nombre'] = '';
    }
    

    function verificarEstado() {
        $datos = $this->M_producto->getSolicitudes();
        if($datos == null) {
            return;
        }else {
            foreach ($datos as $key) {
                $arrayUpdt = array('status_sol' => 4);
                //$this->M_preaprobacion->updateDatosCliente($arrayUpdt, $key->id , 'solicitud');
            }
        }
    }
}*/

$host = $db['default']['hostname'];
$user = $db['default']['username'];
$pass = $db['default']['password'];
$database = $db['default']['database'];
$link = mysqli_connect($host,  $user,  $pass,$database);
$link->set_charset("utf8");
$query = "SELECT * 
                  FROM solicitud
                 WHERE status_sol = 0
                   AND  DATE_ADD(timestamp_final, INTERVAL 2 month)  >= curdate() ";
$result = mysqli_query( $link ,  $query);
//print_r(mysqli_fetch_object($result));
$rows = array();
while($r = mysqli_fetch_object($result)){
//$rows[] = array('id'=>$r->codigo,'label'=>$r->codigo .' - '.$r->estado.' - '.$r->ciudad,'value'=>$r->codigo);
    $query = 'UPDATE solicitud SET status_sol = 4 WHERE id = "'.$r->id.'";';
    $resultado = mysqli_query( $link ,  $query);
}
mysqli_close($link);
//print json_encode($rows);

?>