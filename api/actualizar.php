<?php
require_once '../config.php';
require_once '../utils.php';

/** @var mysqli $conn */

header('Content-Type: application/json');

try {
    if (!isset($_POST['id']) || !isset($_POST['cantidad']) || !isset($_POST['importancia'])) {
        throw new Exception("Faltan datos requeridos");
    }

    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);
    $importancia = intval($_POST['importancia']);
    $producto = isset($_POST['producto']) ? $_POST['producto'] : 'N/A';

    // Intentar con prepared statement
    $stmt = $conn->prepare("UPDATE productos SET cantidad = ?, importancia = ? WHERE id = ?");

    if (!$stmt) {
        throw new Exception("Error en prepare: " . $conn->error);
    }

    $stmt->bind_param("iii", $cantidad, $importancia, $id);

    if (!$stmt->execute()) {
        throw new Exception("Error en execute: " . $stmt->error);
    }

    $affected = $stmt->affected_rows;
    escribirEnLogs("✅ Producto actualizado (prepared): $producto (ID: $id)");

    $stmt->close();

    echo json_encode([
        'success' => true,
        'message' => 'Producto actualizado exitosamente',
        'affected_rows' => $affected
    ]);

} catch (Exception $e) {
    escribirEnLogs("❌ Error prepared statement: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
