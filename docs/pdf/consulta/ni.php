
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nota de Ingreso</title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-oc.css">

<?php 

$objeto_cab  =  new Movalmcab();
$cabecera  =  new Movalmcab_salida();
$detalles = new Movalmdet_salida();
 ?>

</head>
<body>

<div class="right"><span class="pagenum"></span></div>

<div class="imagen-logo">
<img src="../img/logo-pdf.jpg" alt="" width="300">
</div>

<ul>
<li><?php echo EMPRESA; ?></li>
<li><?php echo RUC; ?></li>
<li><?php echo DIRECCION; ?></li>
<li><?php echo TELEFONO; ?></li>
<li><?php echo EMAIL; ?></li>

</ul>

<table align="center" class="table-cabecera" >
<tr>
<td class="name-documento"> NOTA DE INGRESO</td>
<td class="name-documento"><?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></td>
</tr>
</table>


<table class="cabecera">
<tr>
<td class="cabecera-td">ALMACEN</td>
<td class="cabecera-td"><?php echo '01' ?></td>
<td class="cabecera-td">TRANSACCIÓN</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'transaccion','NI'); ?></td>
</tr>
<tr>
<td class="cabecera-td">FECHA DOC</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'fecha_inicio','NI'); ?></td>
<td class="cabecera-td"></td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">PROVEEDOR</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'proveedor','NI'); ?></td>
<td class="cabecera-td"></td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">ORDEN DE COMPRA</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'doc_oc','NI'); ?></td>
<td class="cabecera-td">AUTORIZADO</td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">N° DOC. REF.</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'tipo_documento','NI'); ?></td>
<td class="cabecera-td">CENTRO DE COSTO</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'centro_costo','NI'); ?></td>
</tr>
<tr>
<td class="cabecera-td">COMENTARIO</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'comentario','NI'); ?></td>
<td class="cabecera-td">MONEDA</td>
<td class="cabecera-td"><?php echo $cabecera->consulta($_GET['id'],'moneda','NI'); ?></td>
</tr>

</table>

<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">ITEM</th>
<th class="detalle-th left">CÓDIGO</th>
<th class="detalle-th left">DESCRIPCIÓN</th>
<th class="detalle-th center">UNIDAD</th>
<th class="detalle-th center">C.COSTO</th>
<th class="detalle-th center">CANT</th>
<th class="detalle-th center">COSTO</th>
<th class="detalle-th right">TOTAL</th>
</tr>
</thead>
<tbody>


<?php 
$total =0;
$cantidades =0;
foreach ($detalles->lista($_GET['id'],'NI') as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $value['item']; ?></td>
<td class="detalle-td center"><?php echo $value['codigo_articulo']; ?></td>
<td class="detalle-td center"><?php echo $value['descripcion_articulo']; ?></td>
<td class="detalle-td center"><?php echo $value['unidad']; ?></td>
<td class="detalle-td center"><?php echo $cabecera->consulta($_GET['id'],'codigo_cc','NI'); ?></td>
<td class="detalle-td center"><?php echo $value['cantidad']; ?></td>
<td class="detalle-td center"><?php echo $value['costo']; ?></td>
<td class="detalle-td" align="right"><?php echo $value['costo']*$value['cantidad']; ?></td>
<?php

 $total = ($value['cantidad']*$value['costo']) + $total;
$cantidades = $cantidades+$value['cantidad'] ;
 ?>
</tr>
<?php endforeach ?>
</tbody>

</table >
<table class="operacion">
	

	<tr class="operacion-td">
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td  class="operacion-td"> </td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>

	
	
	</tr>
	<tr  class="operacion-td">
	
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"> </td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		
		<td class="operacion-td right" >TOTAL GENERAL:</td>

		<td  class="operacion-td" align="right" ><?php echo $cantidades; ?></td>
	    <td class="operacion-td"></td>
<td  class="operacion-td"> </td>
		<td class="operacion-td"></td>
		<td class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td  class="operacion-td"></td>
		<td class="operacion-td" ></td>
	<td class="operacion-td" ></td>
		<td class="operacion-td" ></td>
		
		<td class="detalle-td " align="right" ><?php echo $total; ?></td>
	</tr>
	
	
</table>
<div id="piedepagina">
<table width="80%">
	<tr class="firmas">
<td class="center" style="font-size: 14px; text-decoration: overline;">Autorizado</td>
<td class="center" style="font-size: 14px; text-decoration: overline;">Despacho</td>
<td class="center" style="font-size: 14px; text-decoration: overline;">V.B. </td>
</tr>
</table>
</div>


</body>
</html>