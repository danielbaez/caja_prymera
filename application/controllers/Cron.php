<?php
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

$host = 'aa9l2j7sx52ixf.cj5fulkdhm3j.us-east-1.rds.amazonaws.com';
$user = 'prymera';
$pass = 'prymera123';
$db = 'caja_prymera';
$link = mysqli_connect($host,  $user,  $pass,$db);
$link->set_charset("utf8");
$query = "SELECT * 
                  FROM solicitud
                 WHERE status_sol = 0
                   AND  DATE_ADD('2017-11-15', INTERVAL 2 month)  >= curdate() ";
$result = mysqli_query( $link ,  $query);
//print_r($result);
$rows = array();
while($r = mysqli_fetch_object($result)){
//$rows[] = array('id'=>$r->codigo,'label'=>$r->codigo .' - '.$r->estado.' - '.$r->ciudad,'value'=>$r->codigo);
    //print_r($r);
    
}
$query = "INSERT INTO prueba(nombre) VALUES ('lll')";
$resultado = mysqli_query( $link ,  $query);
/*mysqli_close($link);
print json_encode($rows);*/

?>