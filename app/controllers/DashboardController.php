<?php

class DashboardController {

    public function index() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Protección: si no hay sesión, vuelve al login
        if (!isset($_SESSION['S_IDUSUARIO'])) {
            header("Location: " . BASE_URL . "index.php?c=Login&m=index");
            exit;
        }

        require_once ROOT_PATH . 'app/views/layout/header.php';
        require_once ROOT_PATH . 'app/views/layout/slide.php';
        require_once ROOT_PATH . 'app/views/dashboard/index.php';
        require_once ROOT_PATH . 'app/views/layout/footer.php';
    }
}