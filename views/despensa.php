<?php
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
    <title>Despensa</title>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css"/>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <!--otros scripts-->
    <script src="../assets/js/navbar.js"></script>
    <script src="../assets/js/despensa.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="../assets/output.css">
</head>
<body class="bg-light">
<div class="max-w-7xl mx-auto p-6">
    <?php
    include_once "components/navbar.php";
    ?>
    <h1 class="text-3xl font-bold my-6 text-gray-800 text-center">Stock</h1>
    <div class="bg-white rounded-lg md:shadow-lg p-1 md:p-6">
        <table id="myTable" class="display w-full">
            <thead>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Tailwind -->
<div id="modalEditar" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Editar Producto</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <form id="formEditar">
            <input type="hidden" id="edit_id" name="id">

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Producto</label>
                <input type="text" id="edit_producto" name="producto"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Cantidad</label>
                <input type="number" id="edit_cantidad" name="cantidad"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        required min="0">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Importancia</label> <select id="edit_importancia" name="importancia"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        required>
                    <option value="1">Baja (1)</option>
                    <option value="2">Media (2)</option>
                    <option value="3">Alta (3)</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="flex-1 bg-primary hover:bg-primary-hover text-white font-semibold py-2 px-4 rounded-lg transition">
                    Guardar
                </button>
                <button type="button" id="cancelModal"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>