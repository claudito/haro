<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('OT','numero')+1;

 ?>

 Numero de Orden de Trabajo # <?php echo $numero; ?>