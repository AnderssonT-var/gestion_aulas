<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['S_IDUSUARIO'])) {
    header('Location: index.php?c=Login&m=index');
    exit;
}

$errorActivo = isset($_SESSION['form_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión Aulas</title>

  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>app/Plantilla/plugins/DataTables/datatables.min.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<header class="main-header">

  <a href="<?= BASE_URL ?>index.php?c=Dashboard&m=index" class="logo">
    <span class="logo-mini"><b>GA</b></span>
    <span class="logo-lg"><b>Gestión</b>Aulas</span>
  </a>

  <nav class="navbar navbar-static-top">

    <a href="#" class="sidebar-toggle" data-toggle="push-menu">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu <?= $errorActivo ? 'open' : '' ?>">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <span class="hidden-xs">
              <?= $_SESSION['S_USER'] ?>
              <i class="caret"></i>
            </span>
          </a>

          <ul class="dropdown-menu" style="width:350px; padding:15px;">

            <!-- AVATAR -->
            <li class="user-header text-center" style="background:#f4f4f4; padding:15px;">
              <img src="<?= BASE_URL ?>app/Plantilla/dist/img/user2-160x160.jpg"
                   class="img-circle"
                   alt="User Image"
                   style="width:120px; height:120px; margin-bottom:10px;">
              <p style="margin:0;">
                <strong><?= $_SESSION['S_USER'] ?></strong>
              </p>
            </li>

            <!-- MENSAJE DE ERROR -->
            <?php if ($errorActivo): ?>
              <li style="padding:10px;">
                <div style="color:red; font-weight:bold; text-align:center;">
                  <?= $_SESSION['form_error']; ?>
                </div>
              </li>
            <?php unset($_SESSION['form_error']); endif; ?>

            <!-- FORMULARIO -->
            <li>
              <form method="POST" action="<?= BASE_URL ?>index.php?c=Perfil&m=actualizar">

                <div class="form-group">
                  <input type="text"
                         name="usuario"
                         class="form-control"
                         value="<?= $_SESSION['S_USER'] ?>"
                         required>
                </div>

                <hr>

                <div class="form-group">
                  <input type="password"
                         name="password_actual"
                         class="form-control"
                         placeholder="Contraseña actual"
                         required>
                </div>

                <div class="form-group">
                  <input type="password"
                         name="password_nueva"
                         class="form-control"
                         placeholder="Nueva contraseña"
                         required>
                </div>

                <div class="form-group">
                  <input type="password"
                         name="password_confirmar"
                         class="form-control"
                         placeholder="Confirmar nueva contraseña"
                         required>
                </div>

                <button type="submit"
                        class="btn btn-success btn-block btn-flat">
                  <i class="fa fa-save"></i> Actualizar
                </button>

              </form>

              <hr>

              <a href="<?= BASE_URL ?>index.php?c=Login&m=logout"
                 class="btn btn-danger btn-block btn-flat">
                <i class="fa fa-sign-out"></i> Cerrar sesión
              </a>

            </li>

          </ul>

        </li>

      </ul>
    </div>

  </nav>

</header>

<?php if ($errorActivo): ?>
<script>
  $(document).ready(function(){
    $('.user-menu').addClass('open');
  });
</script>
<?php endif; ?>