<?php
// 1. La URL base (Actualizada para Vercel)
define('URL_BASE', 'https://gym-camaleon.vercel.app/');

// 2. Datos de la BD (Actualizados para TiDB Cloud)
define('DB_HOST', 'gateway01.us-east-1.prod.aws.tidbcloud.com');
define('DB_NAME', 'gym_upa');
define('DB_USER', '3SieYje7GssaPHQ.root');
define('DB_PASS', 'Zw2ydUncgV1ECIiX'); // <--- TU CONTRASEÑA GENERADA
define('DB_PORT', '4000');

// 3. Credenciales de Correo (Se mantienen igual)
define('MAIL_USER', 'gymupacamaleones@gmail.com');
define('MAIL_PASS', 'itho vlol emqv gjnh'); 

// 4. Clase de Conexión PDO con SSL para TiDB Cloud
class Database {
    public $conn;
    public function getConnection() {
        $this->conn = null;
        try {
            // --- CAMBIO IMPORTANTE: Configuración SSL para TiDB ---
            // Asegúrate de tener el archivo cacert.pem en la misma carpeta
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => __DIR__ . '/cacert.pem',                
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
            $this->conn = new PDO($dsn, DB_USER, DB_PASS, $options);
            // ----------------------------------------------------

        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>