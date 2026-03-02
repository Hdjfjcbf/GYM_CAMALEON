<?php
// 1. Mostrar errores para poder arreglar cualquier detalle rápido
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Cargar la configuración y la base de datos
require_once '../config/config.php';

// 3. Iniciar la conexión
$database = new Database();
$db = $database->getConnection();

// 4. Lógica de Navegación (Router sencillo)
// Si no hay ninguna acción, por defecto mostramos el registro
$action = isset($_GET['action']) ? $_GET['action'] : 'registro';

if ($db) {
    switch ($action) {
        case 'registro':
            require_once '../app/views/registro.php';
            break;
        
        case 'login':
            // Aquí cargaremos el login después
            echo "<h1>Página de Login en construcción</h1>";
            break;

        default:
            require_once '../app/views/registro.php';
            break;
    }
} else {
    echo "<h1>Error: No se pudo conectar a la base de datos.</h1>";
}