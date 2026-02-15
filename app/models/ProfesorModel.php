<?php
require_once ROOT_PATH . 'app/models/Conexion.php';

class ProfesorModel {

    private $db;

    public function __construct() {
        $this->db = (new Conexion())->conectar();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM profesores ORDER BY id DESC");
    }

    public function crear($data) {

        $stmt = $this->db->prepare("INSERT INTO profesores (nombre, apellido, estado) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi",
            $data['nombre'],
            $data['apellido'],
            $data['estado']
        );

        return $stmt->execute();
    }

    public function actualizar($id, $data) {

        $stmt = $this->db->prepare("UPDATE profesores SET nombre=?, apellido=?, estado=? WHERE id=?");
        $stmt->bind_param("ssii",
            $data['nombre'],
            $data['apellido'],
            $data['estado'],
            $id
        );

        return $stmt->execute();
    }

    public function eliminar($id) {
        return $this->db->query("DELETE FROM profesores WHERE id = $id");
    }
}