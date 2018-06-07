<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$movalmcab_salida =  new Comovc();

?>


<?php if (count($movalmcab_salida->consulta($numero,'numero','OC'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">ORDENES COMPRA</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						
						<td>NUMERO</td>
						<td>USUARIO</td>			
						<td>PROVEEDOR</td>
						<td>CENTRO COSTO</td>
						<td>AREA</td>
					</tr>
				</thead>
				<tbody>
				<tr>
				<td><?php echo $movalmcab_salida->consulta($numero,'numero','OC'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'usuario','OC'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'proveedor','OC'); ?></td>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'centro_costo','OC'); ?></td>
	
			

				<td><?php echo $movalmcab_salida->consulta($numero,'area','OC'); ?></td>
			
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 