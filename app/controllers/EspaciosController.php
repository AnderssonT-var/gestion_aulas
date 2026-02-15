<?php
require_once ROOT_PATH . 'app/models/EspacioModel.php';

class EspaciosController {

    public function index() {

        $modelo = new EspacioModel();
        $espacios = $modelo->listar();

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/espacios/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }

    public function guardar() {

        $modelo = new EspacioModel();

        if (!empty($_POST['id'])) {
            $modelo->actualizar($_POST['id'], $_POST);
            $_SESSION['success'] = "Espacio actualizado correctamente";
        } else {
            $modelo->crear($_POST);
            $_SESSION['success'] = "Espacio creado correctamente";
        }

        header("Location: " . BASE_URL . "index.php?c=Espacios");
        exit;
    }

    public function eliminar() {

        $modelo = new EspacioModel();
        $modelo->eliminar($_GET['id']);

        $_SESSION['success'] = "Espacio eliminado correctamente";

        header("Location: " . BASE_URL . "index.php?c=Espacios");
        exit;
    }
}