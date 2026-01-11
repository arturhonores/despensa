<?php
require_once '../config.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../index.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css"/>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <!--otros scripts-->
    <script src="../assets/js/navbar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="../assets/output.css">
</head>
<body>
<div class="max-w-7xl mx-auto p-6">
    <?php
    include_once "components/navbar.php";
    ?>
    <h1 class="text-3xl font-bold my-6 text-gray-800 text-left">Hola, Familia</h1>
    <p class="text-primary-oscuro mb-3">Aquí tienes el estado actual de tu despensa</p>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Stat 1 -->
        <div class="flex flex-col justify-between gap-2 rounded-xl p-6 bg-white shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <p class="text-[#618968] text-sm font-bold uppercase tracking-wide">Total Productos</p>
                <span class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-md">inventory</span>
            </div>
            <div>
                <p class="text-[#111812] text-3xl font-black leading-tight" id="total-productos"></p>
                <p class="text-primary font-medium mt-1 flex items-center gap-1 flex-wrap">
                    <span class="material-symbols-outlined-xs">priority_high</span><span id="total-prioritarios"></span>Prod. prioritarios
                </p>
            </div>
        </div>
        <!-- Stat 2 -->
        <div class="flex flex-col justify-between gap-2 rounded-xl p-6 bg-white shadow-sm border border-gray-100">
            <div class="flex justify-between items-start">
                <p class="text-[#618968] text-sm font-bold uppercase tracking-wide">Agotados</p>
                <span class="material-symbols-outlined text-orange-500 bg-orange-500/10 p-1 rounded-md">production_quantity_limits</span>
            </div>
            <div>
                <p class="text-[#111812] text-3xl font-black leading-tight" id="agotados"></p>
                <p class="text-orange-500 font-medium mt-1 flex items-center gap-1 flex-wrap">
                    Prod. prioritarios sin stock
                </p>
            </div>
        </div>
    </div>
