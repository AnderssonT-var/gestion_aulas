<div class="content-wrapper">

<section class="content-header">
  <h1>Gestión de Carreras</h1>
</section>

<section class="content">

<div class="box box-primary">

<div class="box-header with-border">
  <h3 class="box-title">Listado de Carreras</h3>

  <button class="btn btn-success pull-right"
          data-toggle="modal"
          data-target="#modalCarrera"
          onclick="nuevaCarrera()">
    <i class="fa fa-plus"></i> Nueva Carrera
  </button>
</div>

<div class="box-body table-responsive">
<table id="tablaCarreras" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>
<?php while ($c = $carreras->fetch_assoc()): ?>
<tr>
<td><?= $c['id'] ?></td>
<td><?= $c['nombre'] ?></td>
<td>
<?= $c['estado']
    ? '<span class="label label-success">Activa</span>'
    : '<span class="label label-danger">Inactiva</span>' ?>
</td>
<td>
<button class="btn btn-warning btn-xs"
onclick="editarCarrera(
<?= $c['id'] ?>,
'<?= $c['nombre'] ?>',
<?= $c['estado'] ?>
)">
<i class="fa fa-pencil"></i>
</button>

<button class="btn btn-danger btn-xs"
onclick="eliminarCarrera(<?= $c['id'] ?>)">
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
<div class="modal fade" id="modalCarrera">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="<?= BASE_URL ?>index.php?c=Carreras&m=guardar">

<div class="modal-header bg-green">
<h4 class="modal-title">Registro de Carrera</h4>
</div>

<div class="modal-body">

<input type="hidden" name="id" id="id">

<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control" required>
</div>

<div class="form-group">
<label>Estado</label>
<select name="estado" id="estado" class="form-control">
<option value="1">Activa</option>
<option value="0">Inactiva</option>
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
function nuevaCarrera(){
id.value='';
nombre.value='';
estado.value='1';
}

function editarCarrera(id_, nombre_, estado_){
id.value=id_;
nombre.value=nombre_;
estado.value=estado_;
$('#modalCarrera').modal('show');
}

function eliminarCarrera(id){
if(confirm("¿Eliminar esta carrera?")){
window.location.href='<?= BASE_URL ?>index.php?c=Carreras&m=eliminar&id='+id;
}
}
</script>