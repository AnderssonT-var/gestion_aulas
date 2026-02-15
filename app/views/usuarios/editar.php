<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Usuario</h3>
    </div>

    <form action="<?= BASE_URL ?>index.php?c=Usuarios&m=actualizar" method="POST">
      <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

      <div class="box-body">

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control"
                 value="<?= $usuario['nombre'] ?>" required>
        </div>

        <div class="form-group">
          <label>Apellido</label>
          <input type="text" name="apellido" class="form-control"
                 value="<?= $usuario['apellido'] ?>" required>
        </div>

        <div class="form-group">
          <label>Usuario</label>
          <input type="text" name="usuario" class="form-control"
                 value="<?= $usuario['usuario'] ?>" required>
        </div>

        <div class="form-group">
          <label>Teléfono</label>
          <input type="text" name="telefono" class="form-control"
                 value="<?= $usuario['telefono'] ?>">
        </div>

        <div class="form-group">
          <label>Sexo</label>
          <select name="sexo" class="form-control">
            <option value="M" <?= $usuario['sexo']=='M'?'selected':'' ?>>Masculino</option>
            <option value="F" <?= $usuario['sexo']=='F'?'selected':'' ?>>Femenino</option>
          </select>
        </div>

        <div class="form-group">
          <label>Estado</label>
          <select name="estado" class="form-control">
            <option value="1" <?= $usuario['estado']==1?'selected':'' ?>>Activo</option>
            <option value="0" <?= $usuario['estado']==0?'selected':'' ?>>Inactivo</option>
          </select>
        </div>

      </div>

      <div class="box-footer">
        <button class="btn btn-warning">Actualizar</button>
        <a href="<?= BASE_URL ?>index.php?c=Usuarios" class="btn btn-default">Cancelar</a>
      </div>
    </form>
  </div>
</section>