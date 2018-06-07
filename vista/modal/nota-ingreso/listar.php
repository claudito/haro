<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Movalmcab_salida();
$titulo   =  "NOTA DE INGRESO";
$folder   =  "nota-ingreso";

 ?>

 <?php if ( count($objeto->lista('NI')) > 0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>#</th>
				<th>ALMACÉN</th>
				<th>TIPO</th>
				<th>TIPO DE TRANSACCIÓN</th>
				<th>TIPO DE DOCUMENTO</th>
				<th>NUMERO DE REFERENCIA</th>
				<th>USUARIO</th>
				<th>PROVEEDOR</th>
				<th>FECHA DE SALIDA</th>
		
				<th>CENTRO DE COSTO</th>
		
				<th>AREA</th>
				
				
				<th>MONEDA</th>
				<th>ACCIONES</th>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista('NI') as $key => $value): ?>
		<tr>
		<td><?php echo $value['numero']; ?>        </td>
		<td><?php echo $value['alm']; ?> </td>
		<td><?php echo $value['tipo']; ?> </td>
		<td><?php echo $value['tipo_transaccion']; ?> </td>
		<td><?php echo $value['tipo_documento']; ?> </td>
		<td><?php echo $value['num_ref']; ?> </td>
		<td><?php echo $value['usuario']; ?> </td>
		<td><?php echo $value['proveedor']; ?> </td>
		<td><?php echo $value['fecha_inicio']; ?> </td>
		
		
		<td><?php echo $value['codigo_cc']; ?> </td>
	
		<td><?php echo $value['area']; ?> </td>
		
	
		<td><?php echo $value['moneda']; ?> </td>
		<td>
		<a href="nota-ingreso-detalle?codigo=<?php echo $value['numero'];?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-list"></i></a>
		 <a data-id="<?php echo $value['numero'];?>" id=""  class="btn btn-edit btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i></a>
		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['numero']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
		<a href="<?php echo PATH; ?>docs/pdf/reporte/ni?id=<?php echo $value['numero']; ?>" class="btn btn-warning btn-xs" target="_blank" title="Imprimir"><i class="glyphicon glyphicon-print"></i></a>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	
    </div>


	</div>
</div>

  <!-- Modal  Actualizar-->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->

<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
</script>
 <?php else: ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">
	<p class="alert alert-warning">No existen Registros.</p>
	</div>
</div>
 <?php endif ?>

