<?php 

include'../../../autoload.php';
include'../../../session.php';

$id  = $_GET['id'];
$objeto =  new Orden_trabajo();


?>


<?php if (count($objeto->consulta($id,'id'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">ORDEN DE TRABAJO</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						<th class="text-center">MÁQUINA</th>
						<th class="text-center">SOLICITANTE</th>
						<th class="text-center">AUTORIZANTE</th>
						<th class="text-center">DESCRIPCIÓN</th>
					</tr>
				</thead>
				<tbody>
				<tr>
				<td class="text-center"><?php echo $objeto->consulta($id,'codigo_maquina'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'solicitante'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'autorizante'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'descripcion'); ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 