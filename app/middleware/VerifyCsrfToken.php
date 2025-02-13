<?php

class VerifyCsrfToken
{
    public function handle($request, callable $next)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['_csrf_token'] ?? '';
            if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
                http_response_code(403);
                die('CSRF token mismatch.');
            }
        }
        return $next($request);
    }
    public static function generateCsrfToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}
