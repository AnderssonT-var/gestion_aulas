<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Nuevo Usuario</h3>
    </div>

    <form action="<?= BASE_URL ?>index.php?c=Usuarios&m=guardar" method="POST">
      <div class="box-body">

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Apellido</label>
          <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Usuario</label>
          <input type="text" name="usuario" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Contraseña</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Teléfono</label>
          <input type="text" name="telefono" class="form-control">
        </div>

        <div class="form-group">
          <label>Sexo</label>
          <select name="sexo" class="form-control">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
        </div>

        <div class="form-group">
          <label>Estado</label>
          <select name="estado" class="form-control">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select>
        </div>

      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?= BASE_URL ?>index.php?c=Usuarios" class="btn btn-default">Cancelar</a>
      </div>
    </form>
  </div>
</section>