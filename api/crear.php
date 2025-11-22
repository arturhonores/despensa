<?php
require_once '../config.php';
require_once '../utils.php';

/** @var mysqli $conn */

header('Content-Type: application/json');

// Solo aceptar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

try {
    // Obtener datos del POST
    $producto = $_POST['producto'] ?? '';
    $cantidad = $_POST['cantidad'] ?? 0;
    $importancia = $_POST['importancia'] ?? 3;

    // Validaciones básicas
    if (empty($producto)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'El nombre del producto es obligatorio']);
        exit;
    }

    // Preparar consulta
    $stmt = $conn->prepare("INSERT INTO productos (producto, cantidad, importancia) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $producto, $cantidad, $importancia);

    // Ejecutar
    if ($stmt->execute()) {
        escribirEnLogs("✅ Producto creado: $producto");
        echo json_encode([
            'success' => true,
            'message' => 'Producto creado exitosamente',
            'id' => $conn->insert_id
        ]);
    } else {
        throw new Exception("Error al insertar producto");
    }

    $stmt->close();

} catch (Exception $e) {
    escribirEnLogs("❌ Error al crear producto: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al crear producto']);
}
