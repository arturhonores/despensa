<?php
session_start();
header('Content-Type: application/json');

if(!isset($_SESSION['id'])){
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit; //importante
}

include_once '../config.php';

//Total productos
/** @var PDO $conn */
$stmt = $conn->query("SELECT COUNT(*) AS total_productos FROM productos");
$totalProductos= $stmt->fetch()['total_productos'];

//Total productos prioritarios
$stmt = $conn->query("SELECT COUNT(*) AS total_prioritarios FROM productos WHERE importancia = 3");
$totalPrioritarios = $stmt->fetch()['total_prioritarios'];

//productos agotados
$stmt = $conn->query("SELECT COUNT(*) AS agotados FROM productos WHERE importancia=3 AND cantidad=0");
$agotados = $stmt->fetch()['agotados'];

$stats = [
    'totalProductos' => $totalProductos,
    'totalPrioritarios' => $totalPrioritarios,
    'agotados' => $agotados
];


echo json_encode(['data' => $stats]);