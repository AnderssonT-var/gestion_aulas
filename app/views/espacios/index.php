<div class="content-wrapper">

<section class="content-header">
  <h1>Gestión de Espacios</h1>
</section>

<section class="content">

<div class="box box-primary">

<div class="box-header with-border">
  <h3 class="box-title">Listado de Espacios</h3>

  <button class="btn btn-success pull-right"
          data-toggle="modal"
          data-target="#modalEspacio"
          onclick="nuevoEspacio()">
    <i class="fa fa-plus"></i> Nuevo Espacio
  </button>
</div>

<div class="box-body table-responsive">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Tipo</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>
<?php while ($e = $espacios->fetch_assoc()): ?>
<tr>
<td><?= $e['id'] ?></td>
<td><?= $e['nombre'] ?></td>
<td><?= $e['tipo'] ?></td>
<td>
<?= $e['estado']
    ? '<span class="label label-success">Activo</span>'
    : '<span class="label label-danger">Inactivo</span>' ?>
</td>
<td>
<button class="btn btn-warning btn-xs"
onclick="editarEspacio(
<?= $e['id'] ?>,
'<?= $e['nombre'] ?>',
'<?= $e['tipo'] ?>',
<?= $e['estado'] ?>
)">
<i class="fa fa-pencil"></i>
</button>

<button class="btn btn-danger btn-xs"
onclick="eliminarEspacio(<?= $e['id'] ?>)">
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
<div class="modal fade" id="modalEspacio">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="<?= BASE_URL ?>index.php?c=Espacios&m=guardar">

<div class="modal-header bg-green">
<h4 class="modal-title">Registro de Espacio</h4>
</div>

<div class="modal-body">

<input type="hidden" name="id" id="id">

<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control" required>
</div>

<div class="form-group">
<label>Tipo</label>
<select name="tipo" id="tipo" class="form-control" required>
<option value="AULA">AULA</option>
<option value="LABORATORIO">LABORATORIO</option>
</select>
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
function nuevoEspacio(){
id.value='';
nombre.value='';
tipo.value='AULA';
estado.value='1';
}

function editarEspacio(id_, nombre_, tipo_, estado_){
id.value=id_;
nombre.value=nombre_;
tipo.value=tipo_;
estado.value=estado_;
$('#modalEspacio').modal('show');
}

function eliminarEspacio(id){
if(confirm("¿Eliminar este espacio?")){
window.location.href='<?= BASE_URL ?>index.php?c=Espacios&m=eliminar&id='+id;
}
}
</script>