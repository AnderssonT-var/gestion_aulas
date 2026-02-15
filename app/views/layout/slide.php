<!-- ================= SIDEBAR ================= -->
<aside class="main-sidebar">
  <section class="sidebar">

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ PRINCIPAL</li>

      <!-- Dashboard -->
      <li class="<?= ($_GET['c'] ?? '') == 'Dashboard' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Dashboard&m=index">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Usuarios -->
      <li class="<?= ($_GET['c'] ?? '') == 'Usuarios' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Usuarios&m=index">
          <i class="fa fa-users"></i>
          <span>Usuarios</span>
        </a>
      </li>

      <!-- Estudiantes -->
      <li class="<?= ($_GET['c'] ?? '') == 'Estudiante' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Estudiante">
          <i class="fa fa-graduation-cap"></i>
          <span>Estudiantes</span>
        </a>
      </li>

      <!-- Semestres -->
      <li class="<?= ($_GET['c'] ?? '') == 'Semestre' ? 'active' : '' ?>">
        <a href="<?= BASE_URL ?>index.php?c=Semestre">
          <i class="fa fa-calendar"></i>
          <span>Semestres</span>
        </a>
      </li>

      <!-- Materias -->
      <li class="treeview <?= in_array(($_GET['c'] ?? ''), ['Materia','MateriaSemestre']) ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Materias</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li class="<?= ($_GET['c'] ?? '') == 'Materia' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>index.php?c=Materia">
              <i class="fa fa-circle-o"></i> Materias
            </a>
          </li>

          <li class="<?= ($_GET['c'] ?? '') == 'MateriaSemestre' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>index.php?c=MateriaSemestre">
              <i class="fa fa-circle-o"></i> Asignación por semestre
            </a>
          </li>
        </ul>
      </li>

      <!-- ================= ESTADO ACADÉMICO ================= -->
      <li class="treeview <?= in_array(($_GET['c'] ?? ''), ['EstadoAcademico','EstadoSemestre']) ? 'active' : '' ?>">
        <a href="#">
          <i class="fa fa-line-chart"></i>
          <span>Estado Académico</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          <!-- Estado por Estudiantes -->
          <li class="<?= ($_GET['c'] ?? '') == 'EstadoAcademico' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>index.php?c=EstadoAcademico">
              <i class="fa fa-circle-o"></i> Estado estudiantes
            </a>
          </li>

          <!-- Estado por Semestre -->
          <li class="<?= ($_GET['c'] ?? '') == 'EstadoSemestre' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>index.php?c=EstadoSemestre">
              <i class="fa fa-circle-o"></i> Estado semestre
            </a>
          </li>

        </ul>
      </li>

    </ul>

  </section>
</aside>