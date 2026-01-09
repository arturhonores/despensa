<?php
session_start();
include_once '../../config.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($email) || empty($password)) {
    header('location:../../views/login.php');
    exit;
}

try {
    $sql = 'SELECT id,email,nombre,rol,password_hash, activo FROM usuarios WHERE email = ? AND activo=1';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //verificar si existe el usuario
    if (!$usuario) {
        escribirEnLogs("no existe el mail: $email");
        header('location:../../views/login.php?error=credenciales_invalidas');
        exit;
    }

    //verificar si la contraseña es correcta
    if (password_verify($password, $usuario['password_hash'])) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];
    } else {
        escribirEnLogs("contraseña incorrecta");
        header('location:../../views/login.php?error=credenciales_invalidas');
        exit;
    }

    //actualizar el campo ultimo_acceso de la tabla usuarios
    $sqlUltimoacceso = 'UPDATE usuarios SET ultimo_acceso = NOW() WHERE id=?';
    $stmtUltimoacceso = $conn->prepare($sqlUltimoacceso);
    $stmtUltimoacceso->execute([$usuario['id']]);

    header('location:../../views/dashboard.php');
    exit;


} catch (PDOException $e) {
    escribirEnLogs("❌ Error al comprobar usuario: " . $e->getMessage());
    die;
}
