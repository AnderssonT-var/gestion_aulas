<?php
session_start();

function isLogin() {
    return isset($_SESSION['S_IDUSUARIO']);
}

function requireLogin() {
    if (!isLogin()) {
        header("Location: " . BASE_URL . "index.php?c=Login&m=index");
        exit;
    }
}