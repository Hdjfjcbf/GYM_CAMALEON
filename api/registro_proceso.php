<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();

    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (!empty($nombre) && !empty($correo) && !empty($pass)) {
        $password_hash = password_hash($pass, PASSWORD_BCRYPT);

        try {
            $query = "INSERT INTO usuarios (nombre, correo, password) VALUES (:nom, :corr, :pass)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':corr', $correo);
            $stmt->bindParam(':pass', $password_hash);

            if ($stmt->execute()) {
                // Registro exitoso -> Al login
                header("Location: ../app/views/login.php?success=1");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>