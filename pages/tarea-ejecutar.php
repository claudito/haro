<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Detalle de Orden de Trabajo');
$assets   ->sweetalert();
$assets   ->datatables();
$assets   ->selectize();
$html->header();
$carpeta = "tarea-ejecutar";
$carpeta_mu = "material-utilizado";


$id  =  ((!isset($_GET['id'])) ? 0 : strlen(trim($_GET['id']))>0) ? 1 : 0 ;

if ($id==0) {
	
	header('Location: '.PATH.'pages/orden-trabajo');
}

include'../vista/modal/'.$carpeta.'/agregar.php';
include'../vista/modal/'.$carpeta.'/eliminar.php';

include'../vista/modal/'.$carpeta_mu.'/agregar_mu.php';
#include'../vista/modal/'.$carpeta_mu.'/agregar_mu.php';


 ?>

 <style>
 table{font-size: 12px;}
 </style>

<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">

<div id="loaderCab" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensajeCab"></div><!-- Datos ajax Final -->
<div id="tablaCab"></div><!-- Datos ajax Final -->

</div>
</div>

 
<div class="row">
<div class="col-md-12">

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script>loadTabla1(1,<?php echo $_GET['id']; ?>)</script>
<script>loadTabla(1,<?php echo $_GET['id']; ?>)</script>
<script>loadCab(1,<?php echo $_GET['id']; ?>)</script>
<?php $html -> footer(); ?>


