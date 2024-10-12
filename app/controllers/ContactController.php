<?php
require_once __DIR__ . '/../requests/ContactFormRequest.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
  public function form()
  {
    $this->view('contact/index');
  }

  public function submit()
  {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      $this->view(header('Location: ' . ENV['BASE_PATH'] . 'contact'), [
        'error' => 'Invalid CSRF token.',
        'request' => $_POST,
        'errors' => []
      ]);
      return;
    }
    $formData = [
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? '',
      'message' => $_POST['message'] ?? ''
    ];
    $errors = [];
    if (empty($formData['name'])) {
      $errors['name'] = 'Name is required.';
    }
    if (empty($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'A valid email address is required.';
    }
    if (empty($formData['message'])) {
      $errors['message'] = 'Message is required.';
    }
    if (!empty($errors)) {
      logMessage('Email sending failed: ' . $errors);
      $_SESSION['form_errors'] = $errors;
      $_SESSION['form_data'] = $formData;
      header('Location: ' . ENV['BASE_PATH'] . 'contact');
      exit;
    }
    try {
      if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['form_errors'] = ['general' => 'Please provide a valid email address.'];
        $_SESSION['form_data'] = $formData;
        header('Location: ' . ENV['BASE_PATH'] . 'contact');
        exit;
      }
      if (empty(ENV['CONTACT_EMAIL'])) {
        throw new Exception('The contact email address is not set in the environment variables.');
      }
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = ENV['SMTP_HOST'];
      $mail->SMTPAuth = true;
      $mail->Username = ENV['SMTP_USERNAME'];
      $mail->Password = ENV['SMTP_PASSWORD'];
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = ENV['SMTP_PORT'];
      $mail->isHTML(true);
      $mail->setFrom($formData['email'], $formData['name']);
      $mail->addAddress(ENV['CONTACT_EMAIL']);
      $mail->Subject = 'Contact form submission';
      $mail->Body = "Name: {$formData['name']}<br>Email: {$formData['email']}<br>Message: {$formData['message']}";
      if ($mail->send()) {
        $_SESSION['success_message'] = 'Your message has been sent successfully!';
        header('Location: ' . ENV['BASE_PATH'] . 'contact');
        exit;
      }
    } catch (Exception $e) {
      error_log($e->getMessage());
      logMessage('Email sending failed: ' . $e->getMessage());
      $_SESSION['form_errors'] = ['general' => 'An error occurred while sending the email: ' . htmlspecialchars($e->getMessage())];
      $_SESSION['form_data'] = $formData;
      header('Location: ' . ENV['BASE_PATH'] . 'contact');
      exit;
    }
  }
}
