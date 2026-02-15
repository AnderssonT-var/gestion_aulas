<?php

class Conexion {

    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(
            'localhost',
            'root',
            '',
            'gestion_aulas'
        );

        if ($this->conexion->connect_error) {
            die('Error de conexión: ' . $this->conexion->connect_error);
        }
    }

    public function conectar() {
        return $this->conexion;
    }
}