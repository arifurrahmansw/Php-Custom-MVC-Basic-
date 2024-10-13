<?php

class ExceptionHandler {
    public static function handleException($exception) {
        error_log($exception);
        http_response_code(500);
        echo "<h1>Oops! Something went wrong.</h1>";
        echo "<p>We're sorry for the inconvenience. Please try again later.</p>";
        if (defined('DEVELOPMENT') && DEVELOPMENT) {
            echo "<pre>" . $exception . "</pre>";
        }
        exit();
    }
}
