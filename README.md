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
