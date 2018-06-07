<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$movalmcab_salida =  new Orden_trabajo();

?>


<?php if (count($movalmcab_salida->consulta($numero,'numero'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">ORDEN DE TRABAJO</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						
						<td>#</td>
						
						<td>USUARIO</td>
						<td>DSC. MAQUINA</td>	
						<td>NOMBRE</td>				
						<td>FECHA</td>
						<td>HORA</td>
					
						<td>RESPONSABLE</td>
						
					</tr>
				</thead>
				<tbody>
				<tr>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'numero'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'usuario'); ?></td>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'descripcion'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'nombre'); ?></td>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'fecha_finalizacion'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'hora_finalizacion'); ?></td>

				<td><?php echo $movalmcab_salida->consulta($numero,'responsable_finalizacion'); ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 