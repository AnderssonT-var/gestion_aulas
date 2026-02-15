<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once ROOT_PATH . 'app/models/LoginModel.php';

class LoginController {

    public function index() {
        require_once ROOT_PATH . 'app/views/auth/login.php';
    }

    public function validar() {

        $usuario  = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($usuario === '' || $password === '') {
            $_SESSION['error'] = "Complete todos los campos";
            header("Location: " . BASE_URL . "index.php?c=Login&m=index");
            exit;
        }

        $model = new LoginModel();
        $data  = $model->login($usuario, $password);

        if ($data) {

            // 🔥 adaptado a tu tabla real
            $_SESSION['S_IDUSUARIO'] = $data['id'];
            $_SESSION['S_USER']      = $data['usuario'];
            $_SESSION['S_USUARIO']   = $data['usuario'];

            header("Location: " . BASE_URL . "index.php?c=Dashboard&m=index");
            exit;
        }

        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: " . BASE_URL . "index.php?c=Login&m=index");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "index.php?c=Login&m=index");
        exit;
    }
}