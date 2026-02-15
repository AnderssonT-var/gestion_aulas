<!-- ================= CONTENT WRAPPER ================= -->
<div class="content-wrapper">

  <!-- ================= CONTENT HEADER ================= -->
  <section class="content-header">
    <h1>
      Gestión de Usuarios
      <small>Administración</small>
    </h1>
  </section>

  <!-- ================= CONTENT ================= -->
  <section class="content">

    <div class="box box-primary">

      <!-- HEADER -->
      <div class="box-header with-border">
        <h3 class="box-title">Listado de usuarios</h3>

        <button class="btn btn-success pull-right"
                data-toggle="modal"
                data-target="#modalUsuario"
                onclick="nuevoUsuario()">
          <i class="fa fa-plus"></i> Nuevo Usuario
        </button>
      </div>

      <!-- BODY -->
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre completo</th>
              <th>Usuario</th>
              <th>Teléfono</th>
              <th>Cédula</th>
              <th>Sexo</th>
              <th>Estado</th>
              <th style="width:90px">Acciones</th>
            </tr>
          </thead>

          <tbody>
          <?php while ($u = $usuarios->fetch_assoc()): ?>
            <tr>
              <td><?= $u['id_usuario'] ?></td>
              <td><?= $u['nombre'].' '.$u['apellido'] ?></td>
              <td><?= $u['usuario'] ?></td>
              <td><?= $u['telefono'] ?: '-' ?></td>
              <td><?= $u['cedula'] ?: '-' ?></td>
              <td><?= $u['sexo'] == 'M' ? 'Masculino' : 'Femenino' ?></td>
              <td>
                <?= $u['estado']
                  ? '<span class="label label-success">Activo</span>'
                  : '<span class="label label-danger">Inactivo</span>' ?>
              </td>

              <td class="text-center">

                <!-- EDITAR -->
                <button class="btn btn-warning btn-xs"
                  onclick="editarUsuario(
                    <?= $u['id_usuario'] ?>,
                    '<?= $u['nombre'] ?>',
                    '<?= $u['apellido'] ?>',
                    '<?= $u['usuario'] ?>',
                    '<?= $u['telefono'] ?>',
                    '<?= $u['cedula'] ?>',
                    '<?= $u['sexo'] ?>',
                    <?= $u['estado'] ?>
                  )">
                  <i class="fa fa-pencil"></i>
                </button>

                <!-- ELIMINAR -->
                <button class="btn btn-danger btn-xs"
                        onclick="confirmarEliminar(<?= $u['id_usuario'] ?>)">
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
<!-- ================= END CONTENT WRAPPER ================= -->

<!-- ================= MODAL USUARIO ================= -->
<div class="modal fade" id="modalUsuario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="<?= BASE_URL ?>index.php?c=Usuarios&m=guardar">

        <div class="modal-header bg-green">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-user"></i> Registro de Usuario
          </h4>
        </div>

        <div class="modal-body">

          <input type="hidden" name="id_usuario" id="id_usuario">

          <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
          </div>

          <div class="form-group">
            <label>Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control">
          </div>

          <div class="form-group">
            <label>Sexo</label>
            <select name="sexo" id="sexo" class="form-control">
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
            </select>
          </div>

          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="text-muted">Dejar vacío para no cambiar</small>
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
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cerrar
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- ================= JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function nuevoUsuario() {
  id_usuario.value = '';
  nombre.value = '';
  apellido.value = '';
  usuario.value = '';
  telefono.value = '';
  cedula.value = '';
  sexo.value = 'M';
  estado.value = '1';
  password.value = '';
}

function editarUsuario(id, nombre_, apellido_, usuario_, telefono_, cedula_, sexo_, estado_) {
  id_usuario.value = id;
  nombre.value = nombre_;
  apellido.value = apellido_;
  usuario.value = usuario_;
  telefono.value = telefono_;
  cedula.value = cedula_;
  sexo.value = sexo_;
  estado.value = estado_;
  password.value = '';
  $('#modalUsuario').modal('show');
}

function confirmarEliminar(id) {
  Swal.fire({
    title: '¿Eliminar usuario?',
    text: 'Esta acción no se puede deshacer',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        '<?= BASE_URL ?>index.php?c=Usuarios&m=eliminar&id=' + id;
    }
  });
}
</script>