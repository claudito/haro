<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Comovc();
$titulo   =  "ORDENES DE COMPRA";
$folder   =  "ordenes-compra";

 ?>

 <?php if ( count($objeto->lista('OC')) > 0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed" style="font-size: 12px">
		<thead>
			<tr class="active">
				<th>OC</th>
			
				<th>USUARIO</th>
				<th>PROVEEDOR</th>
				<th>FECHA DE INICIO</th>
				<th>FECHA DE FIN</th>
				<th>CENTRO DE COSTO</th>
				
				<th>ÁREA</th>
				<th>ESTADO</th>
				<th>PRIORIDAD</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista('OC') as $key => $value): ?>
		<tr>
		<td><?php echo str_pad($value['numero'], 10,'0',STR_PAD_LEFT); ?> </td>
		
		<td><?php echo $value['usuario']; ?></td>
		<td><?php echo $value['proveedor']; ?></td>
		<td><?php echo date_format(date_create($value['fecha_inicio']),'d/m/Y'); ?></td>
		<td><?php echo date_format(date_create($value['fecha_fin']),'d/m/Y'); ?></td>
		<td><?php echo $value['nombr']; ?></td>
		
		<td><?php echo $value['area']; ?></td>
		<td><?php 
		if ($value['estado']==00) 
			{
			echo "EMITIDO";
			}
			elseif ($value['estado']==01) 
			{
			echo "APROBADO";
			}
			elseif ($value['estado']==02) 
			{
			echo "PARCIAL";
			}
			elseif ($value['estado']==03) 
			{
			echo "TOTAL";
			}
			elseif ($value['estado']==04) 
			{
			echo "ANULADO";
			}
			elseif ($value['estado']==05) 
			{
			echo "LIQUIDADO";
			}
		 else {
			echo "ERROR";
		}
		 ?> </td>
		<td><?php  switch ($value['prioridad']) {
			case '1':
				echo "BAJA";
				break;

			case '2':
				echo "MEDIA";
				break;
			
			case '3':
				echo "ALTA";
				break;

			default:
				echo "ERROR";
				break;
		}  ?> </td>
		<td style="text-align: center;">
		 

		<!-- <a data-id="<?php /* echo $value['numero'];*/?>" id=""  class="btn btn-rq btn-xs btn-primary" title="Detalles"><i class="glyphicon glyphicon-list"></i></a>-->

		<a href="ordenes-compra-detalle?codigo=<?php echo $value['numero'];?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-list"></i></a>

		 <a data-id="<?php echo $value['numero'];?>" id=""  class="btn btn-edit btn-xs btn-info"><i class="glyphicon glyphicon-edit" title="Actualizar"></i></a>
		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['numero']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>

		<a href="<?php echo PATH; ?>docs/pdf/reporte/oc?id=<?php echo $value['numero']; ?>" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-print" title="Imprimir"></i></a>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	
    </div>


	</div>
</div>

<!-- Modal  Visualizar-->
  <script>
  	$(".btn-rq").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/visualizar.php","id="+id,function(data){
  			$("#form-rq").html(data);
  		});
  		$('#modal-visualizar').modal('show');
  	});
  </script>
<div class="modal fade" id="modal-visualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div id="form-rq"></div>
</div>
</div>
</div>
<!-- Fin Modal  Visualizar-->

 <!-- /.modal  Actualizar-->
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

      </div>
    </div>
  </div>
  <!-- /.Fin Modal  Actualizar-->

<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
</script>
 <?php else: ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">
		 <p class="alert alert-warning">No existen Registros.</p>
	</div>
</div>
 <?php endif ?>

