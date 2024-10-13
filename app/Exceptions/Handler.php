<?php

class ExceptionHandler {
    public static function handle($exception) {
        error_log($exception->getMessage());
        error_log($exception->getTraceAsString());
        http_response_code(500);
        echo "<h1>Oops! Something went wrong.</h1>";
        echo "<p>We're sorry for the inconvenience. Please try again later.</p>";
        if (defined('ENV') && ENV['DEVELOPMENT']) {
            echo "<h3>Exception Details:</h3>";
            echo "<p><strong>Message:</strong> " . htmlspecialchars($exception->getMessage()) . "</p>";
            echo "<p><strong>File:</strong> " . htmlspecialchars($exception->getFile()) . "</p>";
            echo "<p><strong>Line:</strong> " . htmlspecialchars($exception->getLine()) . "</p>";
            echo "<h4>Stack Trace:</h4>";
            echo "<pre>" . htmlspecialchars($exception->getTraceAsString()) . "</pre>";
        }
        exit();
    }
}
