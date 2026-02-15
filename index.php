<?php
// ===================================================
// RUTA RAÍZ DEL PROYECTO (LO PRIMERO DE TODO)
// ===================================================
define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);

// Mostrar errores (solo desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración y sesión
require_once ROOT_PATH . 'app/config/config.php';
require_once ROOT_PATH . 'app/config/session.php';

// Controlador y método por defecto
$controller = $_GET['c'] ?? 'Login';
$method     = $_GET['m'] ?? 'index';

// Ruta del controlador
$controllerFile = ROOT_PATH . 'app/controllers/' . $controller . 'Controller.php';

// Validaciones
if (!file_exists($controllerFile)) {
    die("Controlador no encontrado: " . $controllerFile);
}

require_once $controllerFile;

$controllerClass = $controller . 'Controller';

if (!class_exists($controllerClass)) {
    die("Clase no encontrada: " . $controllerClass);
}

$controllerObject = new $controllerClass();

if (!method_exists($controllerObject, $method)) {
    die("Método no encontrado: " . $method);
}

// Ejecutar
$controllerObject->$method();