<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$orden_trabajo =  new Orden_trabajo();
$tareas_ejecutar =  new Tareas_ejecutar();
$materiales = new Materiales_utilizados();
$personal = new Personal_trabajos();
$control = new Control_ot();
$folder  =  "orden_trabajo_detalle";
 ?>

<?php if (count($orden_trabajo->consulta($numero,'numero'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro: TAREAS A EJECUTAR</a>
</div>

<?php endif ?>



 <?php if (count($tareas_ejecutar->lista($numero))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">TAREAS A EJECUTAR</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr class="info">
          <th>ITEM</th>
          <th>NÚMERO</th> 
          <th>DESCRIPCIÓN</th>
          <th>TIEMPO ESTIMADO</th>
          <th>TIEMPO REAL</th>
          <th>SOLUCIÓN</th>
          <th>ACCIONES</th>
 
        </tr>
      </thead>
      <tbody>

      <?php
      $item=1;
       foreach ($tareas_ejecutar->lista($numero) as $key => $value): ?>
      <tr>
      <td><?php echo $item++; ?></td>
      <td><?php echo $value['numero']; ?></td>
      <td><?php echo $value['descripcion']; ?></td>
      <td><?php echo $value['estimado']; ?></td>
      <td><?php echo $value['t_real']; ?></td>
      <td><?php echo $value['solucionado']; ?></td>
      <td>
      <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>




<!--  materiales utilizados -->


<?php if (count($orden_trabajo->consulta($numero,'numero'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal1" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro: MATERIALES UTILIZADOS</a>
</div>

<?php endif ?>
 


 <?php if (count($materiales->lista($numero))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">MATERIALES UTILIZADOS</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr class="info">
          <th>ITEM</th>
          <th>NÚMERO</th> 
          <th>DESCRIPCIÓN</th>
          <th>CÓDIGO</th>
          <th>REQUERIDA</th>
          <th>UTILIZADA</th>
          <th>UNID. DE MEDIDA</th>
          <th>ACCIONES</th>
 
        </tr>
      </thead>
      <tbody>

      <?php
      $item=1;
       foreach ($materiales->lista($numero) as $key => $value): ?>
      <tr>
      <td><?php echo $item++; ?></td>
      <td><?php echo $value['numero']; ?></td>
      <td><?php echo $value['descripcion']; ?></td>
      <td><?php echo $value['codigo']; ?></td>
      <td><?php echo round($value['requerida'],2); ?></td>
      <td><?php echo round($value['utilizada'],2); ?></td>
      <td><?php echo $value['unidad_medida']; ?></td>

      <td>
      <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit1 btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete1" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
    $(".btn-edit1").click(function(){
      id = $(this).data("id");
      $.get("../vista/modal/<?php echo $folder; ?>/actualizar1.php","id="+id,function(data){
        $("#form-edit1").html(data);
      });
      $('#editModal1').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar1</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit1"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->
 <?php else: ?>
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>




<div class="row">
<div class="col-md-6">
<div class="form-group">

 <!--  personal trabajos -->

 <?php if (count($orden_trabajo->consulta($numero,'numero'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal2" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro: PERSONAL PARA EJECUCIÓN DE LOS TRABAJOS</a>
</div>

<?php endif ?>



 <?php if (count($personal->lista($numero))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">PERSONAL PARA EJECUCIÓN DE TRABAJOS</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr class="info">
          <th>ITEM</th>
          <th>NÚMERO</th> 
          <th>CATEGORIA</th>
          <th>NOMBRE</th>
          <th>ACCIONES</th>
 
        </tr>
      </thead>
      <tbody>

      <?php
      $item=1;
       foreach ($personal->lista($numero) as $key => $value): ?>
      <tr>
      <td><?php echo $item++; ?></td>
      <td><?php echo $value['numero']; ?></td>
      <td><?php echo $value['categoria']; ?></td>
      <td><?php echo $value['nombre']; ?></td>
   
      <td>
      <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit2 btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete2" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
    $(".btn-edit2").click(function(){
      id = $(this).data("id");
      $.get("../vista/modal/<?php echo $folder; ?>/actualizar2.php","id="+id,function(data){
        $("#form-edit").html(data);
      });
      $('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal2" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>

</div>
</div>



<div class="col-md-6">
<div class="form-group">


 <!--  control orden trabajo -->

 <?php if (count($orden_trabajo->consulta($numero,'numero'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal3" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro: CONTROL DE OT</a>
</div>

<?php endif ?>



 <?php if (count($control->lista($numero))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">CONTROL DE ORDEN DE TRABAJO</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr class="info">
          <th>ITEM</th>
          <th>NÚMERO</th> 
          <th>KILOMETRAJE</th>
          <th>HOROMETRO</th>
          <th>FECHA</th>
          <th>TIPO</th>
          <th>ACCIONES</th>
 
        </tr>
      </thead>
      <tbody>

      <?php
      $item=1;
       foreach ($control->lista($numero) as $key => $value): ?>
      <tr>
      <td><?php echo $item++; ?></td>
      <td><?php echo $value['numero']; ?></td>
      <td><?php echo round($value['kilometraje'],3); ?></td>
      <td><?php echo round($value['horometro'],3); ?></td>
      <td><?php echo $value['fecha']; ?></td>
      <td><?php echo $value['tipo']; ?></td>
      <td>
      <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit3 btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete3" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
    $(".btn-edit3").click(function(){
      id = $(this).data("id");
      $.get("../vista/modal/<?php echo $folder; ?>/actualizar3.php","id="+id,function(data){
        $("#form-edit").html(data);
      });
      $('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>

 </div>
</div>
</div>