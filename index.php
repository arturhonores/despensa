<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La despensa</title>
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css"/>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>La despensa LVM</h1>
    <table id="myTable" class="display">
        <thead>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
    $('#myTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "api/listar.php",
                type: "GET",
                dataSrc: function(json) {
                    // Si tu API devuelve el formato esperado por DataTables, usa esto:
                    return json.data;
                },
            },
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        },
            columns: [
                {data: "producto", title: "Producto"},
                {data: "cantidad", title: "Cantidad"},
                {data: "importancia", title: "Importancia"}
            ]
        }
    );
});
</script>
</body>
</html>