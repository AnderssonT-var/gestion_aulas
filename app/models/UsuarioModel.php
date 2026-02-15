<?php
require_once ROOT_PATH . 'app/models/Conexion.php';

class UsuarioModel {

    private $db;

    public function __construct() {
        $this->db = (new Conexion())->conectar();
    }

    /* ===============================
       OBTENER POR ID
    =============================== */
    public function obtener($id) {

        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    /* ===============================
       ACTUALIZAR PERFIL SEGURO
    =============================== */
    public function actualizarPerfil($id, $usuario, $passwordNueva = null) {

        if ($passwordNueva) {

            $passwordHash = password_hash($passwordNueva, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare(
                "UPDATE usuarios SET usuario = ?, password = ? WHERE id = ?"
            );

            $stmt->bind_param("ssi", $usuario, $passwordHash, $id);

        } else {

            $stmt = $this->db->prepare(
                "UPDATE usuarios SET usuario = ? WHERE id = ?"
            );

            $stmt->bind_param("si", $usuario, $id);
        }

        return $stmt->execute();
    }
}