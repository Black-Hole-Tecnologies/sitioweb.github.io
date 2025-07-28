<?php
require_once './config/database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function insert($nombre, $apellido, $email, $contrasena) {
        $sql = "INSERT INTO users (nombre, apellido, email, contrasena) 
                VALUES (:nombre, :apellido, :email, :contrasena)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'contrasena' => password_hash($contrasena, PASSWORD_DEFAULT)
        ]);
    }
}
