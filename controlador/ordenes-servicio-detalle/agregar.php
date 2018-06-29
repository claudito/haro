<?php 

include'../../autoload.php';
include'../../session.php';

$message        =  new Message();

if (isset($_POST['cantidad']) AND isset($_POST['numero_rs']) AND isset($_POST['id_detalle']) AND isset($_POST['idnumero']) )
{

$saldo       =  $_POST['cantidad'];
 $rq             =  "RS";
$tipo           =  "OS";

 $numero_rq         =  $_POST['numero_rs'];//numero del requerimiento 
 
 $id_detalle        =  $_POST['id_detalle'];//detalles del requerimiento
 
 $id_numero         =  $_POST['idnumero'];//correlativo 



$requisc  = new Requisc();
$comovd   =  new Comovd();
$requisd = new Requisd();
 

$valor    =  $comovd->transferir($tipo,$rq,$numero_rq,$id_numero,$id_detalle,$saldo);

$requisc->actualizar_rq($numero_rq,$rq);
$requisd->actualizar_rq1($numero_rq,$rq,$id_detalle,$saldo);

$requisd->actualizar_estado_detalle($numero_rq,$rq,$id_detalle);


if (strlen($saldo)>0 AND strlen($numero_rq)>0 AND strlen($id_detalle)>0 AND strlen($id_numero)>0 ) 
{




switch ($valor) {
	case 'ok':
echo $message->mensaje('Buen Trabajo','success','Información Transferida',2);
		break;
	default:
echo $message->mensaje('Error','error','Consulte al área de Soporte',2);
	break;
}


} 


else 
{
echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}




 

} else {
echo  $message->mensaje("El saldo llego a 0","warning","Pase a la siguiente O/C",2);
}


 ?>