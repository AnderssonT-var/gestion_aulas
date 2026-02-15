<?php
require_once ROOT_PATH . 'app/models/UsuarioModel.php';

class PerfilController {

    public function actualizar() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar sesión
        if (!isset($_SESSION['S_IDUSUARIO'])) {
            header("Location: " . BASE_URL . "index.php?c=Login&m=index");
            exit;
        }

        $modelo = new UsuarioModel();
        $usuarioActual = $modelo->obtener($_SESSION['S_IDUSUARIO']);

        // Recibir datos
        $usuarioNuevo      = trim($_POST['usuario'] ?? '');
        $passwordActual    = trim($_POST['password_actual'] ?? '');
        $passwordNueva     = trim($_POST['password_nueva'] ?? '');
        $passwordConfirmar = trim($_POST['password_confirmar'] ?? '');

        /* ===============================
           VALIDAR CAMPOS VACÍOS
        =============================== */
        if (
            empty($usuarioNuevo) ||
            empty($passwordActual) ||
            empty($passwordNueva) ||
            empty($passwordConfirmar)
        ) {
            $_SESSION['form_error'] = "Todos los campos son obligatorios";
            header("Location: " . BASE_URL . "index.php?c=Dashboard&m=index");
            exit;
        }

        /* ===============================
           VALIDAR CONTRASEÑA ACTUAL
        =============================== */
        if (!password_verify($passwordActual, $usuarioActual['password'])) {
            $_SESSION['form_error'] = "La contraseña actual es incorrecta";
            header("Location: " . BASE_URL . "index.php?c=Dashboard&m=index");
            exit;
        }

        /* ===============================
           VALIDAR CONFIRMACIÓN
        =============================== */
        if ($passwordNueva !== $passwordConfirmar) {
            $_SESSION['form_error'] = "Las nuevas contraseñas no coinciden";
            header("Location: " . BASE_URL . "index.php?c=Dashboard&m=index");
            exit;
        }

        /* ===============================
           ACTUALIZAR USUARIO + PASSWORD
        =============================== */
        $modelo->actualizarPerfil(
            $_SESSION['S_IDUSUARIO'],
            $usuarioNuevo,
            $passwordNueva
        );

        $_SESSION['success'] = "Datos actualizados correctamente";

        // Cerrar sesión por seguridad
        session_destroy();
        header("Location: " . BASE_URL . "index.php?c=Login&m=index");
        exit;
    }
}