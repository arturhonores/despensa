<?php
require_once '../config.php';

/** @var PDO $conn */

header('Content-Type: application/json');

try {
    if (!isset($_POST['id']) || !isset($_POST['cantidad']) || !isset($_POST['importancia'])) {
        throw new Exception("Faltan datos requeridos");
    }

    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);
    $importancia = intval($_POST['importancia']);
    $producto = isset($_POST['producto']) ? $_POST['producto'] : 'N/A';

    // PDO: prepare y execute en un solo paso
    $sql = "UPDATE productos SET cantidad = ?, importancia = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cantidad, $importancia, $id]);

    $affected = $stmt->rowCount();

    escribirEnLogs("✅ Producto actualizado (PDO): $producto (ID: $id) - Affected: $affected");

    echo json_encode([
        'success' => true,
        'message' => 'Producto actualizado exitosamente',
        'affected_rows' => $affected
    ]);

} catch (Exception $e) {
    escribirEnLogs("❌ Error PDO: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
