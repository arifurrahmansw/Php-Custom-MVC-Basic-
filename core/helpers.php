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
    extract($data); // Extract data to variables

    $viewPath = "../app/views/$view.php";
    $layoutPath = "../app/views/layouts/app.php";

    if (!file_exists($viewPath)) {
        throw new Exception("View file not found: $viewPath");
    }

    ob_start(); // Start output buffering
    require $viewPath; // Require the view file
    $content = ob_get_clean(); // Get the output and clean the buffer

    if (!file_exists($layoutPath)) {
        throw new Exception("Layout file not found: $layoutPath");
    }

    // Load the layout
    require $layoutPath; // Include the layout
}
