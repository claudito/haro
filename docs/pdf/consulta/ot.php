<?php 
$orden_trabajo = new Orden_trabajo();
$tareas_ejecutar = new Tareas_ejecutar();
$materiales_utilizados = new Materiales_utilizados();
$personal_trabajos = new Personal_trabajos();
$control_ot = new Control_ot();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Orden de trabajo Nº <?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></title>

	<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-ot.css">

</head>
<body>

	<table class="cabecera">
		<tr>
			<td><img src="../img/logo-pdf.jpg" alt="" width="300"></td>
			<td></td>
			<td></td>
<td></td>
<td></td>
<td></td>
<td></td>





			<td><h1 align="center">ORDEN DE TRABAJO Nº <?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></h1></td>
		</tr>
	</table>
	<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>

<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>

<table class="cabecera">
<tr >
<td><strong>CODIGO MAQUINA:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'codigo'); ?></td>
</tr>
<tr>
<td><strong>DESCRIPCIÓN MAQUINA:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'nombre'); ?></td>
</tr>
<tr>
<td><strong>USUARIO:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'usuario'); ?></td>
</tr>

<tr>
<td><strong>OBSERVACIONES:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'observaciones'); ?></td>
</tr>
<tr>
<td><strong>FECHA DE FINALIZACIÓN:</strong></td>
<td><?php echo date_format(date_create($orden_trabajo->consulta($_GET['id'],'fecha_finalizacion')),'d/m/Y') ?></td>
</tr>
<tr>
<td><strong>HORA FINALIZACIÓN:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'hora_finalizacion'); ?></td>
</tr>
<tr>
<td><strong>DESCRIPCIÓN:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'descripcion'); ?></td>
</tr>

<tr>
<td><strong>RESPONSABLE FINALIZACIÓN:</strong></td>
<td><?php echo $orden_trabajo->consulta($_GET['id'],'responsable_finalizacion'); ?></td>
</tr>


</table>



<table class="detalle">

<thead>
	<tr>
		
		<th colspan="5" style="background-color:#210BA9 ;color: white;">TAREAS A EJECUTAR</th>
	</tr>
<tr>

<th class="detalle-th center">ITEM</th>
<th class="detalle-th cebter">DESCRIPCIÓN</th>
<th class="detalle-th cebter">T. ESTIMADO</th>
<th class="detalle-th center">T. REAL</th>
<th class="detalle-th center">SOLUCIONADO</th>

</tr>
</thead>
<tbody align="center">


<?php 
$cont =1;

foreach ($tareas_ejecutar->lista($_GET['id']) as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $cont++; ?></td>
<td class="detalle-td center"><?php echo $value['descripcion']; ?></td>
<td class="detalle-td center"><?php echo $value['estimado']; ?></td>
<td class="detalle-td center"><?php echo $value['t_real']; ?></td>
<td class="detalle-td center"><?php echo $value['solucionado']; ?></td>

</tr>

<?php endforeach ?>
</tbody>

</table >

<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>

<table class="detalle">

<thead>
	<tr>
		
		<th colspan="6" style="background-color:#210BA9 ;color: white;">MATERIALES UTILIZADOS</th>
	</tr>
<tr>

<th class="detalle-th center">ITEM</th>
<th class="detalle-th cebter">CODIGO</th>
<th class="detalle-th cebter">DESCRIPCIÓN</th>
<th class="detalle-th center">CANT. REQUERIDA</th>
<th class="detalle-th center">CANT. UTILIZADA</th>
<th class="detalle-th center">UNIDAD DE MEDIDA</th>
</tr>
</thead>
<tbody align="center">


<?php 
$cont =1;

foreach ($materiales_utilizados->lista($_GET['id']) as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $cont++; ?></td>
<td class="detalle-td center"><?php echo $value['codigo']; ?></td>
<td class="detalle-td center"><?php echo $value['descripcion']; ?></td>
<td class="detalle-td center"><?php echo round($value['requerida'],3); ?></td>
<td class="detalle-td center"><?php echo round($value['utilizada'],3); ?></td>
<td class="detalle-td center"><?php echo $value['unidad_medida']; ?></td>

</tr>

<?php endforeach ?>
</tbody>

</table >

<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>

<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table class="detalle">

<thead>
	<tr>
		
		<th colspan="3" style="background-color:#210BA9 ;color: white;">PERSONAL PARA EJECUCIÓN DE TRABAJOS</th>
	</tr>
<tr>

<th class="detalle-th center">ITEM</th>
<th class="detalle-th cebter">CATEGORIA</th>
<th class="detalle-th cebter">NOMBRE</th>
</tr>
</thead>
<tbody align="center">


<?php 
$cont =1;

foreach ($personal_trabajos->lista($_GET['id']) as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $cont++; ?></td>
<td class="detalle-td center"><?php echo $value['categoria']; ?></td>
<td class="detalle-td center"><?php echo $value['nombre']; ?></td>


</tr>

<?php endforeach ?>
</tbody>

</table >
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table>
<tr>
	<th colspan="5">       </th>

</tr>
</table>
<table class="detalle">

<thead>
	<tr>
		
		<th colspan="5" style="background-color:#210BA9 ;color: white;">CONTROL DE OT</th>
	</tr>
<tr>

<th class="detalle-th center">ITEM</th>
<th class="detalle-th cebter">KILOMETRAJE</th>
<th class="detalle-th cebter">HOROMETRO</th>
<th class="detalle-th cebter">FECHA</th>
<th class="detalle-th cebter">TIPO</th>
</tr>
</thead>
<tbody align="center">


<?php 
$cont =1;

foreach ($control_ot->lista($_GET['id']) as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $cont++; ?></td>
<td class="detalle-td center"><?php echo round($value['kilometraje'],3); ?></td>
<td class="detalle-td center"><?php echo round($value['horometro'],3); ?></td>
<td class="detalle-td center"><?php echo $value['fecha']; ?></td>
<td class="detalle-td center"><?php echo $value['tipo']; ?></td>


</tr>


<?php endforeach ?>
</tbody>



<div id="piedepagina">
<table width="80%">
	<tr class="firmas">
<td class="center" style="font-size: 14px; text-decoration: overline;">Firma Responsable</td>

</tr>
</table>
</div>

</table >


</body>
</html>