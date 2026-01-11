<?php
require 'utils.php';
require __DIR__ . '/vendor/autoload.php';

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
//configuración para incluir subdirectorio del proyecto
define('BASE_PATH', $_ENV['BASE_PATH'] ?? '');
// Configuración de la base de datos
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_DATABASE']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASS', $_ENV['DB_PASSWORD']);

// Crear conexión con PDO
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    $conn = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => true,  // ✅ Esto soluciona el bug
        PDO::ATTR_STRINGIFY_FETCHES => false
    ]);

    // escribirEnLogs("✅ Conectado con PDO");

} catch (PDOException $e) {
    require_once __DIR__ . '/utils.php';
    escribirEnLogs("❌ Error de conexión PDO: " . $e->getMessage());
    die("Error de conexión a la base de datos");
}