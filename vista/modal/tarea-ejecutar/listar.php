<?php 

include'../../../autoload.php';
include'../../../session.php';

$codigo               =  $_GET['codigo'];
$orden_trabajo        =  new Orden_trabajo();
$tarea_ejecutar       =  new Tarea_ejecutar();

$folder               =  "tarea-ejecutar";
 ?>

<?php if (count($orden_trabajo->consulta($codigo,'codigo_maquina'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Detalle</a>
</div>

<?php endif ?>



 <?php if (count($orden_trabajo->lista($codigo))>0): ?>

 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">DETALLE DE ORDEN DE TRABAJO</h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-condensed table-bordered">
 			<thead>
 				<tr class="info">
 				  <th>DESCRIPCION</th>
          <th class="text-center">TIEMPO ESTIMADO</th>
          <th class="text-center">TIEMPO REAL</th>
          <th class="text-center">SOLUCIONADO</th>
 					<th class="text-center">ACCIONES</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php foreach ($tarea_ejecutar->lista() as $key => $value): ?>
			<tr>
			<td><?php echo $value['descripcion']; ?></td>
      <td class="text-center"><?php echo date_format(date_create($value['t_estimado']),'H:i'); ?></td>
      <td class="text-center"><?php echo date_format(date_create($value['t_real']),'H:i'); ?></td>
			<td class="text-center"><?php echo ($value['solucion']=='S') ? "SI" : "NO" ; ?> </td>
			<td class="text-center">
			 <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit btn-sm btn-info" title="Actualizar"><i class="glyphicon glyphicon-edit"></i></a>
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
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
 <?php else: ?>
 <div class="panel panel-info">
   <div class="panel-heading">
     <h3 class="panel-title">DETALLE DE ORDEN  TRABAJO</h3>
   </div>
   <div class="panel-body">
    <p class="alert alert-warning">No hay registros Disponibles.</p>
   </div>
 </div>
 <?php endif ?>

<!-- MATERIAL UTILIZADO -->

<?php 

$orden_trabajo      = new Orden_trabajo(); 
$material_utilizado = new Material_utilizado();

 ?>

<?php if (count($orden_trabajo->consulta($codigo,'codigo_maquina'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal1" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Detalle</a>
</div>

<?php endif ?>

<?php if (count($material_utilizado->lista_mu($id))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">DETALLE DE MATERIAL UTILIZADO</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr class="info">
          <th>CÓDIGO DE ARTICULO</th>
          <th>CANTIDAD REQUERIDA</th>
          <th>CANTIDAD UTILIZADA</th>
          <th>UNIDAD</th>
          <th class="text-center">ACCIONES</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($material_utilizado->lista_mu($id) as $key => $value): ?>
      <tr>
      <td><?php echo $value['codigo_articulo'] ?></td>
      <td><?php echo $value['c_requerida'] ?></td>
      <td><?php echo $value['c_utilizada'] ?></td>
      <td><?php echo $value['codigo_unidad'] ?></td>
      <td class="text-center">
       <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit btn-sm btn-info" title="Actualizar"><i class="glyphicon glyphicon-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash" title="Eliminar"></i></button>
      </td>
      </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  </div>
 </div>

<?php else: ?>
 <div class="panel panel-info">
   <div class="panel-heading">
     <h3 class="panel-title">DETALLE DE MATERIAL UTILIZADO</h3>
   </div>
   <div class="panel-body">
    <p class="alert alert-warning">No hay registros Disponibles.</p>
   </div>
 </div> 
<?php endif ?>