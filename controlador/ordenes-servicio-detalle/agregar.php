<?php 

include'../../autoload.php';
include'../../session.php';

$message        =  new Message();


 $rq             =  "RS";
$tipo           =  "OS";

 $numero_rq         =  $_POST['numero_rs'];//numero del requerimiento 
 
 $id_detalle        =  $_POST['id_detalle'];//detalles del requerimiento
 
 $id_numero         =  $_POST['idnumero'];//correlativo orden de compra



$requisc  = new Requisc();
$comovd   =  new Comovd();
$requisd = new Requisd();
 

$valor    =  $comovd->transferir($tipo,$rq,$numero_rq,$id_numero,$id_detalle);

$requisc->actualizar_rq($numero_rq,$rq);
$requisd->actualizar_rq1($numero_rq,$rq,$id_detalle);

$requisd->actualizar_estado_detalle($numero_rq,$rq,$id_detalle);


switch ($valor) {
	case 'ok':
echo $message->mensaje('Buen Trabajo','success','Información Transferida',2);
		break;
	default:
echo $message->mensaje('Error','error','Consulte al área de Soporte',2);
		break;

		
}

 ?>