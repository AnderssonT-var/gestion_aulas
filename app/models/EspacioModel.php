<?php
require_once ROOT_PATH . 'app/models/Conexion.php';

class EspacioModel {

    private $db;

    public function __construct() {
        $this->db = (new Conexion())->conectar();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM espacios ORDER BY id DESC");
    }

    public function crear($data) {

        $stmt = $this->db->prepare("INSERT INTO espacios (nombre, tipo, estado) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi",
            $data['nombre'],
            $data['tipo'],
            $data['estado']
        );

        return $stmt->execute();
    }

    public function actualizar($id, $data) {

        $stmt = $this->db->prepare("UPDATE espacios SET nombre=?, tipo=?, estado=? WHERE id=?");
        $stmt->bind_param("ssii",
            $data['nombre'],
            $data['tipo'],
            $data['estado'],
            $id
        );

        return $stmt->execute();
    }

    public function eliminar($id) {
        return $this->db->query("DELETE FROM espacios WHERE id = $id");
    }
}