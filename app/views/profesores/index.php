<div class="content-wrapper">

<section class="content-header">
  <h1>Gestión de Profesores</h1>
</section>

<section class="content">

<div class="box box-primary">

<div class="box-header with-border">
  <h3 class="box-title">Listado de Profesores</h3>

  <button class="btn btn-success pull-right"
          data-toggle="modal"
          data-target="#modalProfesor"
          onclick="nuevoProfesor()">
    <i class="fa fa-plus"></i> Nuevo Profesor
  </button>
</div>

<div class="box-body table-responsive">
<table id="tablaProfesores" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Nombre Completo</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>
<?php while ($p = $profesores->fetch_assoc()): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= $p['nombre'].' '.$p['apellido'] ?></td>
<td>
<?= $p['estado']
    ? '<span class="label label-success">Activo</span>'
    : '<span class="label label-danger">Inactivo</span>' ?>
</td>
<td>
<button class="btn btn-warning btn-xs"
onclick="editarProfesor(
<?= $p['id'] ?>,
'<?= $p['nombre'] ?>',
'<?= $p['apellido'] ?>',
<?= $p['estado'] ?>
)">
<i class="fa fa-pencil"></i>
</button>

<button class="btn btn-danger btn-xs"
onclick="eliminarProfesor(<?= $p['id'] ?>)">
<i class="fa fa-trash"></i>
</button>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

</div>
</section>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalProfesor">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="<?= BASE_URL ?>index.php?c=Profesores&m=guardar">

<div class="modal-header bg-green">
<h4 class="modal-title">Registro de Profesor</h4>
</div>

<div class="modal-body">

<input type="hidden" name="id" id="id">

<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control" required>
</div>

<div class="form-group">
<label>Apellido</label>
<input type="text" name="apellido" id="apellido" class="form-control" required>
</div>

<div class="form-group">
<label>Estado</label>
<select name="estado" id="estado" class="form-control">
<option value="1">Activo</option>
<option value="0">Inactivo</option>
</select>
</div>

</div>

<div class="modal-footer">
<button type="submit" class="btn btn-success">
<i class="fa fa-save"></i> Guardar
</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>

</form>

</div>
</div>
</div>

<script>
function nuevoProfesor(){
id.value='';
nombre.value='';
apellido.value='';
estado.value='1';
}

function editarProfesor(id_, nombre_, apellido_, estado_){
id.value=id_;
nombre.value=nombre_;
apellido.value=apellido_;
estado.value=estado_;
$('#modalProfesor').modal('show');
}

function eliminarProfesor(id){
if(confirm("¿Eliminar este profesor?")){
window.location.href='<?= BASE_URL ?>index.php?c=Profesores&m=eliminar&id='+id;
}
}
</script>