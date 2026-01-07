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
                {
                    data: "cantidad",
                    title: "Nº",
                    className: "dt-center",
                    render: function (data, type, row) {
                        if (data === 0) {
                            return `<span class="text-red-500">${data}</span>`
                        }
                        return data;
                    }
                },
                {
                    data: "importancia",
                    title: "Prio",
                    className: "dt-center",
                    render: function (data, type, row) {
                        const prioridad = {
                            1: 'Baja',
                            2: 'Media',
                            3: 'Alta'
                        };
                        return prioridad[data] || data;
                    }
                },
                {
                    data: null,
                    title: "Editar",
                    orderable: false,
                    className: "dt-center",
                    render: function (data, type, row) {
                        return `<button class="btn-editar bg-primary hover:bg-primary-hover text-white px-2 py-2 rounded-lg transition inline-flex items-center justify-center"
                                        data-id="${row.id}"
                                        data-producto="${row.producto}"
                                        data-cantidad="${row.cantidad}"
                                        data-importancia="${row.importancia}"><span class="material-symbols-outlined text-xl">edit</span>
                                </button>`;
                    }
                }
            ]
        }
    );


// Abrir modal al hacer click en Editar
    $('#myTable').on('click', '.btn-editar', function () {
        console.log("se hace click");
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
});