<?php
require 'utils.php';
require __DIR__ . '/vendor/autoload.php';

//cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuración de la base de datos
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

// Habilitar excepciones de mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Crear conexión
try {
    $conn = new mysqli($host, $username, $password, $database);
    $conn->set_charset("utf8mb4");
//    escribirEnLogs("✅ ¡Conectado exitosamente a producción! 🔥");
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}