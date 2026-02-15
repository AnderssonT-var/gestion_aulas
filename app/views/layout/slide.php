<!-- ================= SIDEBAR ================= -->
<aside class="main-sidebar">
  <section class="sidebar">

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">GESTIÓN AULAS</li>

      <!-- Dashboard -->
      <li class="<?= ($_GET['c'] ?? '') == 'Dashboard' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Dashboard&m=index">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Espacios -->
      <li class="<?= ($_GET['c'] ?? '') == 'Espacios' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Espacios">
          <i class="fa fa-building"></i>
          <span>Espacios</span>
        </a>
      </li>

      <!-- Profesores -->
      <li class="<?= ($_GET['c'] ?? '') == 'Profesores' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Profesores">
          <i class="fa fa-user"></i>
          <span>Profesores</span>
        </a>
      </li>

      <!-- Materias -->
      <li class="<?= ($_GET['c'] ?? '') == 'Materias' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Materias">
          <i class="fa fa-book"></i>
          <span>Materias</span>
        </a>
      </li>

      <!-- Carreras -->
      <li class="<?= ($_GET['c'] ?? '') == 'Carreras' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Carreras">
          <i class="fa fa-graduation-cap"></i>
          <span>Carreras</span>
        </a>
      </li>

      <!-- Horarios -->
      <li class="<?= ($_GET['c'] ?? '') == 'Horarios' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Horarios">
          <i class="fa fa-clock-o"></i>
          <span>Horarios</span>
        </a>
      </li>

      <!-- Asignaciones -->
      <li class="<?= ($_GET['c'] ?? '') == 'Asignaciones' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Asignaciones">
          <i class="fa fa-calendar"></i>
          <span>Asignaciones</span>
        </a>
      </li>

      <!-- Reservas -->
      <li class="<?= ($_GET['c'] ?? '') == 'Reservas' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Reservas">
          <i class="fa fa-check-square-o"></i>
          <span>Reservas</span>
        </a>
      </li>

    </ul>

  </section>
</aside>