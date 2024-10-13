<?php
require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
// Define the environment configuration for the application
define('ENV', [
    // Enable development mode for detailed error messages
    'DEVELOPMENT' => true,
    // Application name
    'SYS_NAME' => 'Custom MVC',

    // OpenWeather API key (leave blank if not using)
    'OPENWEATHER_API_KEY' => '',

    // Base path for the application, used in routing
    'BASE_PATH' => '/Interview/mvc-app/',

    // Mail configuration settings
    'MAIL_MAILER' => 'smtp',  // Specify the mailer type
    'SMTP_HOST' => 'sandbox.smtp.mailtrap.io',  // SMTP server host
    'SMTP_USERNAME' => '',  // Username for SMTP authentication
    'SMTP_PASSWORD' => '',  // Password for SMTP authentication
    'SMTP_PORT' => 2525,  // SMTP port (typically 587 for TLS, 465 for SSL, or 25)
    'MAIL_FROM_ADDRESS' => 'no-reply@gmail.com',  // Default "from" email address
    'MAIL_FROM_NAME' => 'Custom MVC',  // Default "from" name
    'MAIL_TO_ADDRESS' => 'support@example.com',  // Email address for receiving contact form submissions
    'MAIL_ENCRYPTION' => PHPMailer::ENCRYPTION_STARTTLS,  // Encryption method for secure email sending

    // Database configuration settings (leave blank if not using a database)
    'DB_NAME' => '',  // Name of the database
    'DB_USER' => 'root',  // Database username
    'DB_PASSWORD' => '',  // Database password
    'DB_HOST' => 'localhost',  // Database host (usually 'localhost')
    'DB_PORT' => '3306',  // Database port (default for MySQL)
    
    // Default locale for the application
    'DEFAULT_LOCALE' => 'en',  // Set the default language for the application
]);

// Instructions:
// 1. Ensure you have PHPMailer installed via Composer. Run the following command:
//    composer require phpmailer/phpmailer
//
// 2. Update the configuration values above as necessary:
//    - Set your OpenWeather API key if using weather features.
//    - Adjust the mail settings (SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD, etc.) for your email service provider.
//    - Configure the database connection settings if your application requires database access.
// 
// 3. For development, ensure 'DEVELOPMENT' is set to true to show detailed error messages.
//    Remember to set it to false in a production environment for security purposes.
