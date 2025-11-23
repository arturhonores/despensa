<?php
require_once '../config.php';
require_once '../utils.php';

/** @var PDO $conn */

header('Content-Type: application/json');

try {
    $sql = "SELECT id, producto, cantidad, importancia FROM productos ORDER BY id DESC";
    $stmt = $conn->query($sql);
    $productos = $stmt->fetchAll();  // ✅ PDO: fetchAll() en lugar de while + fetch_assoc()

    echo json_encode(['data' => $productos]);

} catch (Exception $e) {
    escribirEnLogs("❌ Error al listar productos: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['data' => []]);
}