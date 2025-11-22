<?php
require_once '../config.php';
require_once '../utils.php';

/** @var mysqli $conn */

header('Content-Type: application/json');

try {
    if (!isset($_POST['id']) || !isset($_POST['cantidad']) || !isset($_POST['importancia'])) {
        throw new Exception("Faltan datos requeridos");
    }

    // Convertir y validar
    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);
    $importancia = intval($_POST['importancia']);
    $producto = isset($_POST['producto']) ? $conn->real_escape_string($_POST['producto']) : 'N/A';

    if ($id <= 0) {
        throw new Exception("ID inválido");
    }

    // Query directa (los enteros ya están validados con intval)
    $query = "UPDATE productos SET cantidad = $cantidad, importancia = $importancia WHERE id = $id";

    if (!$conn->query($query)) {
        throw new Exception("Error en UPDATE: " . $conn->error);
    }

    $affected = $conn->affected_rows;
    escribirEnLogs("✅ Producto actualizado: $producto (ID: $id) - Cantidad: $cantidad, Importancia: $importancia");

    echo json_encode([
        'success' => true,
        'message' => 'Producto actualizado exitosamente',
        'affected_rows' => $affected
    ]);

} catch (Exception $e) {
    escribirEnLogs("❌ Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

cerrarConexion();