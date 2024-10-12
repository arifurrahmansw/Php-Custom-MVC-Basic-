<?php

if (!function_exists('dd')) {
    function dd(...$data) {
        echo '<pre style="background-color: #f8f9fa; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">';
        foreach ($data as $value) {
            print_r($value);
            echo "\n";
        }
        echo '</pre>';
        die();
    }
}

function view($view, $data = []) {
    extract($data);
    $viewPath = "../app/views/$view.php";
    $layoutPath = "../app/views/layouts/app.php";
    if (!file_exists($viewPath)) {
        throw new Exception("View file not found: $viewPath");
    }
    ob_start();
    require $viewPath;
    $content = ob_get_clean();
    if (!file_exists($layoutPath)) {
        throw new Exception("Layout file not found: $layoutPath");
    }
    require $layoutPath;
}

function logMessage($message)
{
    $logFile = __DIR__ . '/../storage/logs.txt';
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[$timestamp] $message" . PHP_EOL;
    if (!file_exists(dirname($logFile))) {
        mkdir(dirname($logFile), 0777, true);
    }
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
