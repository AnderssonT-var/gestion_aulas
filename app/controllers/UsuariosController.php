<?php
require_once ROOT_PATH . 'app/models/UsuarioModel.php';

class UsuariosController {

    public function index() {
        $modelo = new UsuarioModel();
        $usuarios = $modelo->listar();

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/usuarios/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }

    public function guardar() {
        $modelo = new UsuarioModel();

        if (!empty($_POST['id'])) {
            // ✏️ ACTUALIZAR
            $modelo->actualizar($_POST['id'], $_POST);
        } else {
            // ➕ CREAR
            $modelo->crear($_POST);
        }

        header("Location: " . BASE_URL . "index.php?c=Usuarios");
        exit;
    }

    public function eliminar() {
        $modelo = new UsuarioModel();
        $modelo->eliminar($_GET['id']);

        header("Location: " . BASE_URL . "index.php?c=Usuarios");
        exit;
    }
}