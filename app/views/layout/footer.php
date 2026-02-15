</div> <!-- /.content-wrapper -->

<footer class="main-footer">
  <strong>Gestión Aulas</strong>
</footer>

</div> <!-- /.wrapper -->

<!-- ================= JS BASE ================= -->

<!-- jQuery -->
<script src="<?= BASE_URL ?>app/Plantilla/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= BASE_URL ?>app/Plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE -->
<script src="<?= BASE_URL ?>app/Plantilla/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="<?= BASE_URL ?>app/Plantilla/plugins/DataTables/datatables.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ================= ALERTAS GLOBALES ================= -->
<?php if (isset($_SESSION['success'])): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Correcto',
  text: '<?= $_SESSION['success'] ?>',
  confirmButtonColor: '#28a745'
});
</script>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Error',
  text: '<?= $_SESSION['error'] ?>',
  confirmButtonColor: '#d33'
});
</script>
<?php unset($_SESSION['error']); endif; ?>

<!-- ================= DATATABLES GLOBAL ================= -->
<script>
$(document).ready(function () {

  if ($('#tablaEstudiantes').length) {
    $('#tablaEstudiantes').DataTable({
      dom:
        "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      pageLength: 10,
      lengthMenu: [10, 20, 50],
      ordering: true,
      searching: true,
      language: {
        search: "Ingresar dato a buscar:",
        lengthMenu: "Show _MENU_ entries",
        info: "Showing _START_ to _END_ of _TOTAL_ students",
        zeroRecords: "No se encontraron estudiantes",
        infoEmpty: "No hay registros disponibles",
        paginate: {
          previous: "Previous",
          next: "Next"
        }
      }
    });
  }

  if ($('#tablaMaterias').length) {
    $('#tablaMaterias').DataTable({
      dom:
        "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      pageLength: 10,
      lengthMenu: [10, 20, 50],
      ordering: true,
      searching: true,
      language: {
        search: "Ingresar dato a buscar:",
        lengthMenu: "Show _MENU_ entries",
        info: "Showing _START_ to _END_ of _TOTAL_ materias",
        zeroRecords: "No se encontraron materias",
        infoEmpty: "No hay materias disponibles",
        paginate: {
          previous: "Previous",
          next: "Next"
        }
      }
    });
  }

});
</script>

</body>
</html>