<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Detalles de Orden de trabajo');
$assets   ->sweetalert();
$assets   ->datatables();
$assets   ->selectize();
$html->header();
$carpeta = "orden_trabajo_detalle";


$codigo  =  ((!isset($_GET['codigo'])) ? 0 : strlen(trim($_GET['codigo']))>0) ? 1 : 0 ;

if ($codigo==0) {
	
	header('Location: '.PATH.'pages/orden_trabajo');
}
include'../vista/modal/'.$carpeta.'/agregar1.php';
include'../vista/modal/'.$carpeta.'/agregar.php';
include'../vista/modal/'.$carpeta.'/agregar2.php';
include'../vista/modal/'.$carpeta.'/agregar3.php';
include'../vista/modal/'.$carpeta.'/eliminar.php';
include'../vista/modal/'.$carpeta.'/eliminar1.php';
include'../vista/modal/'.$carpeta.'/eliminar2.php';
include'../vista/modal/'.$carpeta.'/eliminar3.php';
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
 

<div id="mensaje1"></div><!-- Datos ajax Final -->
<div id="tabla1"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>

<script>loadTabla(1,<?php echo $_GET['codigo']; ?>)</script>
<script>loadTabla1(1,<?php echo $_GET['codigo']; ?>)</script>
<script>loadTabla2(1,<?php echo $_GET['codigo']; ?>)</script>
<script>loadTabla3(1,<?php echo $_GET['codigo']; ?>)</script>
<script>loadCab(1,<?php echo $_GET['codigo']; ?>)</script>
<?php $html -> footer(); ?>


