<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Requisc();
$titulo   =  "REQUERIMIENTO DE SERVICIO";
$folder   =  "rq-servicio";

 ?>

 <?php if ( count($objeto->lista('RS')) > 0): ?>
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
				<th>USUARIO</th>
				<th>FECHA DE INICIO</th>
				<th>FECHA DE FIN</th>
				<th>COMENTARIO</th>
				<th>CENTRO DE COSTO</th>
				
				<th>ÁREA</th>
				<th>ESTADO</th>
				<th>PRIORIDAD</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista('RS') as $key => $value): ?>
		<tr>
		<td><?php echo $value['numero']; ?>        </td>
		<td><?php echo $value['usuario']; ?> </td>
		<td><?php echo $value['fecha_inicio']; ?> </td>
		<td><?php echo $value['fecha_fin']; ?> </td>
		<td><?php echo $value['comentario']; ?> </td>
		<td><?php echo $value['centro_costo']; ?> </td>
	
		<td><?php echo $value['area']; ?> </td>
		<td><?php  switch ($value['estado']) {
			case 'P':
				echo "EMITIDO";
				break;

			case 'A':
				echo "APROBADO";
				break;
			
			case 'AT':
				echo "ATENDIDO";
				break;

			default:
				echo "ERROR";
				break;
		}  ?> </td>
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
		<td>
		
		<a href="rq-servicio-detalle?codigo=<?php echo $value['numero'];?>" class="btn btn-primary btn-xs" title="Detalles"><i class="glyphicon glyphicon-list"></i></a>
		 <a data-id="<?php echo $value['numero'];?>" id=""  class="btn btn-edit btn-xs btn-info" title="Actualizar"><i class="glyphicon glyphicon-edit"></i></a>
		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['numero']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
		<a href="<?php echo PATH; ?>docs/pdf/reporte/rs?id=<?php echo $value['numero']; ?>" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-print" title="Imprimir"></i></a>
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
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h3 class="panel-title"><?php echo $titulo; ?></h3>
 	</div>
 	<div class="panel-body">
 		<p class="alert alert-warning">No existen Registros.</p>
 	</div>
 </div>
 <?php endif ?>

