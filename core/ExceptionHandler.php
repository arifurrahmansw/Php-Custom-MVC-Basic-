<?php

class ExceptionHandler {
    public static function handleException($exception) {
        // Log the exception details (you can log it to a file or send it to an external service)
        error_log($exception);

        // Display a user-friendly message
        http_response_code(500); // Set HTTP status code to 500
        echo "<h1>Oops! Something went wrong.</h1>";
        echo "<p>We're sorry for the inconvenience. Please try again later.</p>";
        // Optionally, you can show the exception message in development mode
        if (defined('DEVELOPMENT') && DEVELOPMENT) {
            echo "<pre>" . $exception . "</pre>";
        }

        // Stop script execution
        exit();
    }
}
