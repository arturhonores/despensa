<?php
require_once '../config.php';
require_once '../utils.php';

/** @var mysqli $conn */

header('Content-Type: application/json');


try {
    $sql = "SELECT id, producto, cantidad, importancia FROM productos ORDER BY id DESC";
    $result = $conn->query($sql);
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    echo json_encode(['data' => $productos]);

} catch (Exception $e) {
    escribirEnLogs("Error al listar productos: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['data' => []]);
}