<?php
class Database {
    private $host = 'localhost';
    private $db = 'mvc_api';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", 
                                  $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
        }
        return $this->conn;
    }
}

