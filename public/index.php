<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once '../app/Exceptions/Handler.php';
require_once '../core/DD.php';
require_once '../config/env.php';
require_once '../app/Helpers/Helpers.php';
require_once '../routes/web.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';
set_exception_handler(['ExceptionHandler', 'handleException']);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (strpos($uri, ENV['BASE_PATH']) === 0) {
    $uri = substr($uri, strlen(ENV['BASE_PATH']));
}
if ($uri === '' || $uri === false) {
    $uri = '/';
} else {
    if ($uri[0] !== '/') {
        $uri = '/' . $uri;
    }
}
// Debugging: Print available routes
// echo "<h3>Available routes:</h3>";
// foreach ($routes as $route => $controllerMethod) {
//     echo htmlspecialchars($route) . " => " . htmlspecialchars($controllerMethod) . "<br>";
// }
// Match the final URI to the routes
if (isset($routes[$uri])) {
    $route = explode('@', $routes[$uri]);
    $controllerName = $route[0];
    $methodName = $route[1];

    // Debugging: Output the controller and method
    // echo "Controller: " . htmlspecialchars($controllerName) . "<br>";
    // echo "Method: " . htmlspecialchars($methodName) . "<br>";
    require_once "../app/Controllers/$controllerName.php";
    // Check if the controller class exists
    if (!class_exists($controllerName)) {
        throw new Exception("Controller class not found: " . htmlspecialchars($controllerName));
    }
    $controller = new $controllerName();
    if (!method_exists($controller, $methodName)) {
        throw new Exception("Method not found in controller: " . htmlspecialchars($methodName));
    }
    $controller->$methodName();
} else {
    // throw new Exception("Route not found for URI: " . htmlspecialchars($uri));
    // Render the 404 page using the ErrorController
    require_once "../app/Controllers/ErrorController.php";
    $errorController = new ErrorController();
    $errorController->error404();
}
