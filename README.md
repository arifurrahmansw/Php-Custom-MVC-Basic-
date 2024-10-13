# PHP MVC Application

## Description

This PHP MVC (Model-View-Controller) application is a simple web application that demonstrates the use of MVC architecture in PHP. The application features a contact form that allows users to send messages, which are then processed and sent via email using PHPMailer. The application also implements CSRF protection for form submissions and error handling.

## Features

- **Contact Form**: Users can fill out and submit a contact form.
- **PHPMailer Integration**: Emails are sent securely using PHPMailer.
- **CSRF Protection**: Implements CSRF token verification for form submissions.
- **Error Logging**: Logs error messages to a file in the `storage` directory.
- **Responsive Design**: Uses Bootstrap for styling.

## Requirements

- PHP 7.3 or higher
- Composer
- A local or remote SMTP server for sending emails

## Installation

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/arifurrahmansw/mvc.git
Custom PHP MVC Framework Documentation
1. System Requirements
Before installing the custom PHP MVC framework, ensure that your system meets the following requirements:

PHP version 7.4 or higher.
Composer installed for dependency management.
XAMPP/WAMP or any local web server setup with Apache.
MySQL (optional, if using database features).
2. Installation Instructions
a. Download & Setup
Download the repository: Download the MVC framework from the provided source or clone it from your version control system (e.g., GitHub).

Example:

bash
Copy code
git clone https://github.com/username/custom-mvc.git
Install dependencies using Composer:

bash
Copy code
composer install
This will install the necessary PHP packages, such as PHPMailer, into the vendor/ directory.

b. Directory Setup
Make sure your project is stored in the htdocs directory of XAMPP (or equivalent for WAMP). Example:

makefile
Copy code
C:\xampp\htdocs\mvc-app
Set the correct permissions for the storage folder to allow logging:

bash
Copy code
chmod -R 775 storage/
3. Configuration
a. Environment Configuration
To configure the environment settings, edit the config/env.php file. This file defines several environment variables required by the application.

Sample env.php file:

php
Copy code
define('ENV', [
    'DEVELOPMENT' => true, // Change to false in production
    'BASE_PATH' => '/mvc-app/',
    'CONTACT_EMAIL' => 'your-email@example.com',
    'OPENWEATHER_API_KEY' => 'your-api-key-here',
    'MAIL_MAILER' => 'smtp',
    'SMTP_HOST' => 'smtp.mailtrap.io',
    'SMTP_USERNAME' => 'your-username',
    'SMTP_PASSWORD' => 'your-password',
    'SMTP_PORT' => 2525,
    'MAIL_ENCRYPTION' => PHPMailer::ENCRYPTION_STARTTLS,
]);
DEVELOPMENT: Set this to true to show detailed error messages during development.
BASE_PATH: The base URL of the application.
CONTACT_EMAIL: Email address where contact form submissions will be sent.
OPENWEATHER_API_KEY: API key for accessing OpenWeather data (if needed).
MAIL Configuration: SMTP settings for sending emails via PHPMailer.
b. Email Configuration
To send emails, ensure you have the correct SMTP settings in the environment file. If you are using Mailtrap or any SMTP service, configure the following:

php
Copy code
'SMTP_HOST' => 'smtp.mailtrap.io',
'SMTP_USERNAME' => 'your-username',
'SMTP_PASSWORD' => 'your-password',
'SMTP_PORT' => 2525,
'MAIL_ENCRYPTION' => PHPMailer::ENCRYPTION_STARTTLS,
4. Folder Structure
Below is an overview of the directory structure of the project:

arduino
Copy code
mvc-app/
├── app/
│   ├── Controllers/
│   ├── Exceptions/
│   ├── Models/
│   └── Helpers/ Helpers.php
├── config/
│   └── env.php
├── core/
│   ├── Controller.php
│   ├── Model.php
│   └── DD.php
├── public/
│   ├── css/
│   ├── images/
│   ├── js/
├── resources/
│   ├── view/
├── routes/
│   └── web.php
├── storage/
│   └── logs/
├── vendor/
├── index.php
├── .htaccess
├── bootstrap.php
└── composer.json
This README provides an installation guide, configuration steps, and an overview of the folder structure to help you get started with your custom PHP MVC framework.