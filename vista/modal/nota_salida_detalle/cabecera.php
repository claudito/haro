<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$movalmcab_salida =  new Movalmcab_salida();

?>


<?php if (count($movalmcab_salida->consulta($numero,'numero','NS'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">NOTA DE INGRESO</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						<td>#</td>
						<td>ALMACÉN</td>
						<td>TIPO DE TRANSACCIÓN</td>
					
						<td>USUARIO</td>
			
						<td>FECHA DE SALIDA</td>
						
						<td>COMENTARIO</td>
						<td>CENTRO DE COSTO</td>
					
						<td>AREA</td>
						<td>ESTADO</td>
					</tr>
				</thead>
				<tbody>
				<tr>
				<td><?php echo $movalmcab_salida->consulta($numero,'numero','NS'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'alm','NS'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'tipo_transaccion','NS'); ?></td>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'usuario','NS'); ?></td>
		
				<td><?php echo date_format(date_create($movalmcab_salida->consulta($numero,'fecha_inicio','NS')),'Y/m/d'); ?></td>
			

				<td><?php echo $movalmcab_salida->consulta($numero,'comentario','NS'); ?></td>
				<td><?php echo $movalmcab_salida->consulta($numero,'codigo_cc','NS'); ?></td>
				
				<td><?php echo $movalmcab_salida->consulta($numero,'area','NS'); ?></td>
				<td><?php if ($movalmcab_salida->consulta($numero,'estado','NS')=='V') {
					echo "ACTIVO";
				} else {
					echo "INACTIVO";
				}
				; ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 