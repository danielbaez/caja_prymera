<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('M_producto');
        $this->load->model('M_preaprobacion');
    }

    public function index()
    {             
    }    

    function verificarEstado() {
        $datos = $this->M_producto->getSolicitudes();
        if($datos == null) {
            return;
        }else {
            foreach ($datos as $key) {
                $arrayUpdt = array('status_sol' => 4);
                $this->M_preaprobacion->updateDatosCliente($arrayUpdt, $key->id , 'solicitud');
            }
        }
    }
}

/*$host = 'prymera.cj5fulkdhm3j.us-east-1.rds.amazonaws.com';
$user = 'prymera';
$pass = 'prymera123';
$database = 'caja_prymera';
$link = mysqli_connect($host,  $user,  $pass,$database);
$link->set_charset("utf8");
$query = "SELECT * 
                  FROM solicitud
                 WHERE status_sol = 0
                   AND  DATE_ADD(timestamp_final, INTERVAL 2 month)  <= curdate() ";
$result = mysqli_query( $link ,  $query);

while($r = mysqli_fetch_object($result)){
    $query = 'UPDATE solicitud SET status_sol = 4 WHERE id = "'.$r->id.'";';
    $resultado = mysqli_query( $link ,  $query);
}
mysqli_close($link);*/

?>