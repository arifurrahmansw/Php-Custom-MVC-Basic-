<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
// Define constants
define('ENV', [
  'DEVELOPMENT' => true,
  'CONTACT_EMAIL' => 'arifurrahman01710@gmail.com',
  'BASE_PATH' => '/Interview/mvc-app/public/',
  'MAIL_MAILER' => 'smtp',
  'SMTP_HOST' => 'sandbox.smtp.mailtrap.io',
  'SMTP_USERNAME' => 'd1249e05285021',
  'SMTP_PASSWORD' => 'a5ec5607a174a6',
  'SMTP_PORT' => 2525, // Usually 587 for TLS
  'MAIL_ENCRYPTION' => PHPMailer::ENCRYPTION_STARTTLS,
]);

// function loadEnv($file)
// {
//     if (!file_exists($file)) {
//         return;
//     }
//     $lines = file($file);
//     foreach ($lines as $line) {
//         $line = trim($line);
//         if (empty($line) || $line[0] === '#') {
//             continue;
//         }
//         list($key, $value) = explode('=', $line, 2);
//         putenv("$key=$value");
//         define($key, $value);
//     }
// }
// loadEnv(__DIR__ . '/../.env');
