<?php 

include'../../autoload.php';
include'../../session.php';

$message        =  new Message();

$comovd         = new Comovd();
  

if (isset($_POST['idnumero']) AND isset($_POST['numero_oc']) AND isset($_POST['numero_detalle']) AND isset($_POST['saldo']) AND isset($_POST['saldo2']) )
{


 
$numero          =  $_POST['idnumero'];
$numero_oc       =  $_POST['numero_oc'];
$numero_detalle  =  $_POST['numero_detalle']; 
$tipo            =  "NI";
$item            =  0;
$saldo           =  $_POST['saldo'] ;
$tipo2           = 'OC';
$saldo2 =    $_POST['saldo2']- $_POST['saldo'];  


if (strlen($numero)>0 AND strlen($numero_oc)>0 AND strlen($numero_detalle)>0 AND strlen($saldo)>0 AND strlen($saldo2)>0 ) 
{


$movaldet = new Movalmdet_salida('',$numero,'',$item,'','','','','','','',$tipo);


$valor = $comovd->actualizar_saldo($numero_oc,$numero_detalle,$saldo2,$tipo2);
$valor = $movaldet->transferir_oc($numero_oc,$numero_detalle,$saldo);



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