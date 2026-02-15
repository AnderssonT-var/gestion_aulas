<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión | Gestión Aulas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ================= CSS ADMINLTE ================= -->

  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/dist/css/AdminLTE.min.css">

  <!-- ================= ESTILOS LOGIN ================= -->
  <style>
    body.login-page {
      background: linear-gradient(135deg, #58cfc7, #3bb3a9);
    }
    .login-box {
      margin-top: 7%;
    }
    .login-logo b {
      color: #2c3e50;
    }
    .login-box-body {
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0,0,0,.15);
    }
    .btn-primary {
      background-color: #58cfc7;
      border-color: #58cfc7;
      font-weight: bold;
    }
    .btn-primary:hover {
      background-color: #46b5ad;
      border-color: #46b5ad;
    }
  </style>
</head>

<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <i class="fa fa-user-circle fa-2x"></i><br>
    <b>Gestión</b>Aulas
    <p style="font-size:14px;color:#7f8c8d;">Sistema de gestión de aulas</p>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesión</p>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>index.php?c=Login&m=validar" method="POST">

      <div class="form-group has-feedback">
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">
            INGRESAR
          </button>
        </div>
      </div>

    </form>
  </div>
</div>

<!-- ================= JS ADMINLTE ================= -->

<script src="<?= BASE_URL ?>app/Plantilla/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL ?>app/Plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>app/Plantilla/dist/js/adminlte.min.js"></script>

</body>
</html>