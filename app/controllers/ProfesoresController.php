<?php
require_once ROOT_PATH . 'app/models/ProfesorModel.php';

class ProfesoresController {

    public function index() {

        $modelo = new ProfesorModel();
        $profesores = $modelo->listar();

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/profesores/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }

    public function guardar() {

        $modelo = new ProfesorModel();

        if (!empty($_POST['id'])) {
            $modelo->actualizar($_POST['id'], $_POST);
            $_SESSION['success'] = "Profesor actualizado correctamente";
        } else {
            $modelo->crear($_POST);
            $_SESSION['success'] = "Profesor creado correctamente";
        }

        header("Location: " . BASE_URL . "index.php?c=Profesores");
        exit;
    }

    public function eliminar() {

        $modelo = new ProfesorModel();
        $modelo->eliminar($_GET['id']);

        $_SESSION['success'] = "Profesor eliminado correctamente";

        header("Location: " . BASE_URL . "index.php?c=Profesores");
        exit;
    }
}