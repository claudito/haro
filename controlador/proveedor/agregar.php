<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['codigo']) AND isset($_POST['contacto']) AND isset($_POST['cuenta_soles']) AND isset($_POST['cuenta_dolares']) AND isset($_POST['razon_social']) AND isset($_POST['ruc']) AND isset($_POST['dni']) AND isset($_POST['direccion1']) AND isset($_POST['direccion2']) AND isset($_POST['telefono']) AND isset($_POST['correo']) AND isset($_POST['comentario'])) 
{
	$codigo      	=  $funciones->validar_xss($_POST['codigo']);
	$contacto 		=  $funciones->validar_xss($_POST['contacto']);
	$cuenta_soles 	=  $funciones->validar_xss($_POST['cuenta_soles']);
	$cuenta_dolares =  $funciones->validar_xss($_POST['cuenta_dolares']);
	$razon_social 	=  $funciones->validar_xss($_POST['razon_social']);
	$ruc 			=  $funciones->validar_xss($_POST['ruc']);
	$dni 			=  $funciones->validar_xss($_POST['dni']);
	$direccion1 	=  $funciones->validar_xss($_POST['direccion1']);
	$direccion2 	=  $funciones->validar_xss($_POST['direccion2']);
	$telefono 		=  $funciones->validar_xss($_POST['telefono']);
	$correo 		=  $funciones->validar_xss($_POST['correo']);
	$comentario 	=  $funciones->validar_xss($_POST['comentario']);

	if (strlen($codigo)>0 AND strlen($contacto)>0 AND strlen($cuenta_soles)>0 AND strlen($cuenta_dolares)>0 AND strlen($razon_social)>0 AND strlen($ruc)>0 AND strlen($dni)>0 AND strlen($direccion1)>0 AND strlen($direccion2)>0 AND strlen($telefono)>0 AND strlen($correo)>0 AND strlen($comentario)>0) 
	{
		
		$objeto      =  new Proveedor($codigo,$contacto,$cuenta_soles,$cuenta_dolares,$razon_social,$ruc,$dni,$direccion1,$direccion2,$telefono,$correo,$comentario);
		$valor       =  $objeto->agregar();
		
		if ($valor=='existe') 
		{
		  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
		} 
		else if($valor=='ok')
		{
		  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		}
		else
		{
		  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
		}
	} 
	else 
	{
	echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
	}
	
} 
else 
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}


/*
$codigo      	=  $funciones->validar_xss($_POST['codigo']);
$contacto 		=  $funciones->validar_xss($_POST['contacto']);
$razon_social 	=  $funciones->validar_xss($_POST['razon_social']);
$ruc 			=  $funciones->validar_xss($_POST['ruc']);
$dni 			=  $funciones->validar_xss($_POST['dni']);
$direccion1 	=  $funciones->validar_xss($_POST['direccion1']);
$direccion2 	=  $funciones->validar_xss($_POST['direccion2']);
$telefono 		=  $funciones->validar_xss($_POST['telefono']);
$correo 		=  $funciones->validar_xss($_POST['correo']);

$objeto      =  new Proveedor($codigo,$contacto,$razon_social,$ruc,$dni,$direccion1,$direccion2,$telefono,$correo);
$valor       =  $objeto->agregar();



if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
}
else
{
  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
}

*/
 ?>