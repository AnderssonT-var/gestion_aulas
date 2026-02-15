<?php
require_once ROOT_PATH . 'app/models/CarreraModel.php';

class CarrerasController {

    public function index() {

        $modelo = new CarreraModel();
        $carreras = $modelo->listar();

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/carreras/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }

    public function guardar() {

        $modelo = new CarreraModel();

        if (!empty($_POST['id'])) {
            $modelo->actualizar($_POST['id'], $_POST);
            $_SESSION['success'] = "Carrera actualizada correctamente";
        } else {
            $modelo->crear($_POST);
            $_SESSION['success'] = "Carrera creada correctamente";
        }

        header("Location: " . BASE_URL . "index.php?c=Carreras");
        exit;
    }

    public function eliminar() {

        $modelo = new CarreraModel();
        $modelo->eliminar($_GET['id']);

        $_SESSION['success'] = "Carrera eliminada correctamente";

        header("Location: " . BASE_URL . "index.php?c=Carreras");
        exit;
    }
}