<?php
require_once ROOT_PATH . 'app/models/MateriaModel.php';

class MateriasController {

    public function index() {

        $modelo = new MateriaModel();
        $materias = $modelo->listar();

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/materias/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }

    public function guardar() {

        $modelo = new MateriaModel();

        if (!empty($_POST['id'])) {
            $modelo->actualizar($_POST['id'], $_POST);
            $_SESSION['success'] = "Materia actualizada correctamente";
        } else {
            $modelo->crear($_POST);
            $_SESSION['success'] = "Materia creada correctamente";
        }

        header("Location: " . BASE_URL . "index.php?c=Materias");
        exit;
    }

    public function eliminar() {

        $modelo = new MateriaModel();
        $modelo->eliminar($_GET['id']);

        $_SESSION['success'] = "Materia eliminada correctamente";

        header("Location: " . BASE_URL . "index.php?c=Materias");
        exit;
    }
}