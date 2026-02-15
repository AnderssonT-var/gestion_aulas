<?php
require_once ROOT_PATH . 'app/models/Conexion.php';

class LoginModel {

    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    public function login($usuario, $password) {

        $sql = "SELECT * FROM usuarios 
                WHERE usuario = ? 
                AND estado = 1 
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $data = $result->fetch_assoc();

            if (password_verify($password, $data['password'])) {
                return $data;
            }
        }

        return false;
    }
}