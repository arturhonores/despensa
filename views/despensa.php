<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Despensa</title>
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css"/>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">La Despensa LVM</h1>
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
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        readonly>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Cantidad</label>
                <input type="number" id="edit_cantidad" name="cantidad"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required min="0">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Importancia</label> <select id="edit_importancia" name="importancia"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="1">Baja (1)</option>
                    <option value="2">Media (2)</option>
                    <option value="3">Alta (3)</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition">
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
<script>
    let table;

    $(document).ready(function () {
        table = $('#myTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "../api/listar.php",
                    type: "GET",
                    dataSrc: function (json) {
                        return json.data;
                    },
                },
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                },
                columns: [
                    {data: "producto", title: "Producto"},
                    {data: "cantidad", title: "Nº"},
                    {data: "importancia", title: "Prio"},
                    {
                        data: null,
                        title: "Acciones",
                        orderable: false,
                        render: function (data, type, row) {
                            return `<button class="btn-editar bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition"
                                        data-id="${row.id}"
                                        data-producto="${row.producto}"
                                        data-cantidad="${row.cantidad}"
                                        data-importancia="${row.importancia}">Editar
                                </button>`;
                        }
                    }
                ]
            }
        );
    });

    // Abrir modal al hacer click en Editar
    $('#myTable').on('click', '.btn-editar', function () {
        const id = $(this).data('id');
        const producto = $(this).data('producto');
        const cantidad = $(this).data('cantidad');
        const importancia = $(this).data('importancia');

        // Llenar el formulario
        $('#edit_id').val(id);
        $('#edit_producto').val(producto);
        $('#edit_cantidad').val(cantidad);
        $('#edit_importancia').val(importancia);

        // Mostrar modal
        $('#modalEditar').removeClass('hidden');
    });

    // Cerrar modal
    $('#closeModal, #cancelModal').on('click', function () {
        $('#modalEditar').addClass('hidden');
    });

    // Cerrar modal al hacer click fuera de él
    $('#modalEditar').on('click', function (e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });

    $('#formEditar').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '../api/actualizar.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Producto actualizado correctamente');
                    $('#modalEditar').addClass('hidden');
                    table.ajax.reload(null, false); // Recargar tabla sin perder paginación
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function () {
                alert('Error al actualizar el producto');
            }
        });
    });
</script>
</body>
</html>