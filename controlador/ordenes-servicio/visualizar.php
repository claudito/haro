<?php 

include'../../autoload.php';
include'../../session.php';

$message        =  new Message();

$numero         =  $_POST['requerimiento'];
$rq             =  "RS";
$tipo           =  "OS";
$orden          =  $_POST['orden'];
$saldo2          =  $_POST['saldo']-$_POST['saldo'];

$comovd   =  new Comovd();
$comovc   =  new Comovc(); 
$requisc  = new Requisc();
$requisd = new Requisd();
$comovc->actualizar_rq($orden,$tipo,$numero);

$valor    =  $comovd->transferir($tipo,$rq,$numero,$orden);
$requisc->actualizar_rq($numero,$rq);

 

$requisd->actualizar_rq($saldo2,$numero,$rq);
$requisd->actualizar_estado($numero,$rq);

switch ($valor) {
	case 'ok':
echo $message->mensaje('Buen Trabajo','success','Información Transferida',2);
		break;
	default:
echo $message->mensaje('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>