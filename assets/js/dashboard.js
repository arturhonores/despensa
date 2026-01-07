$(document).ready(function () {
 // Cargar estadísticas del dashboard
    $.ajax({
        url: '../api/get_stats.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Actualizar el número total de productos
            $('#total-productos').text(response.data.totalProductos);
            // Actualizar el número total de productos prioritarios
            $('#total-prioritarios').text(response.data.totalPrioritarios);
            // Actualizar el número de productos agotados
            $('#agotados').text(response.data.agotados);
        },
        error: function(xhr, status, error) {
            console.error('Error cargando estadísticas:', error);
            $('#total-productos').text('--');
            $('#total-prioritarios').text('--');
            $('#agotados').text('--');
        }
    });
});