<?php
require_once ROOT_PATH . 'app/models/Conexion.php';

class MateriaModel {

    private $db;

    public function __construct() {
        $this->db = (new Conexion())->conectar();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM materias ORDER BY id DESC");
    }

    public function crear($data) {

        $stmt = $this->db->prepare("INSERT INTO materias (nombre, estado) VALUES (?, ?)");
        $stmt->bind_param("si",
            $data['nombre'],
            $data['estado']
        );

        return $stmt->execute();
    }

    public function actualizar($id, $data) {

        $stmt = $this->db->prepare("UPDATE materias SET nombre=?, estado=? WHERE id=?");
        $stmt->bind_param("sii",
            $data['nombre'],
            $data['estado'],
            $id
        );

        return $stmt->execute();
    }

    public function eliminar($id) {
        return $this->db->query("DELETE FROM materias WHERE id = $id");
    }
}