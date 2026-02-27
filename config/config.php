<?php
// 1. La URL base (Asegúrate de que termine en /)
define('URL_BASE', 'http://localhost/GYM_UPA/');

// 2. Datos de la BD
define('DB_HOST', 'localhost');
define('DB_NAME', 'GYM_UPA');
define('DB_USER', 'root');
define('DB_PASS', ''); 

// 3. Credenciales de Correo
define('MAIL_USER', 'gymupacamaleones@gmail.com');
define('MAIL_PASS', 'itho vlol emqv gjnh'); 

class Database {
    public $conn;
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}