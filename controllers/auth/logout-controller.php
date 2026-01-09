<?php
if($_SERVER['REQUEST_METHOD']!== 'POST'){
    header('Location:/index.php');
    exit();
};

session_start();
//Limpia las variables (vacía $_SESSION)
session_unset();

session_destroy();

header('location: ../../index.php');