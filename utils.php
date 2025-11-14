<?php
function escribirEnLogs($mensaje){
    $rutaLog = __DIR__ . '/logs/logs.log';
    return error_log(date('Y-m-d H:i:s') . ' - ' . $mensaje . PHP_EOL, 3, $rutaLog);
}