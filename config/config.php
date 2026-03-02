<?php
// 1. La URL base (Actualizada para Vercel)
// Vercel usará automáticamente tu dominio HTTPS, así que esto suele ser relativo o HTTPS
define('URL_BASE', 'https://gym-camaleon.vercel.app/');

// 2. Datos de la BD (Actualizados para TiDB Cloud)
define('DB_HOST', 'gateway01.us-east-1.prod.aws.tidbcloud.com');
define('DB_NAME', 'gym_upa'); // Nombre de la BD que creamos en el SQL Editor
define('DB_USER', '3SieYje7GssaPHQ.root'); // Usuario de TiDB
define('DB_PASS', 'Zw2ydUncgV1ECIiX'); // <--- TU CONTRASEÑA GENERADA
define('DB_PORT', '4000'); // Puerto de TiDB

// 3. Credenciales de Correo (Se mantienen igual)
define('MAIL_USER', 'gymupacamaleones@gmail.com');
define('MAIL_PASS', 'itho vlol emqv gjnh'); 

class Database {
    public $conn;
    public function getConnection() {
        $this->conn = null;
        try {
            // Se añadió el puerto a la cadena de conexión PDO
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}