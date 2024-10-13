<?php
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
    // CSRF Token validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      $this->view(header('Location: ' . ENV['BASE_PATH'] . 'contact'), [
        'error' => 'Invalid CSRF token.',
        'request' => $_POST,
        'errors' => []
      ]);
      return;
    }

    // Collect form data
    $formData = [
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? '',
      'message' => $_POST['message'] ?? ''
    ];
    $errors = [];

    // Validation
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
      logMessage('Email sending failed: ' . json_encode($errors));
      $_SESSION['form_errors'] = $errors;
      $_SESSION['form_data'] = $formData;
      header('Location: ' . ENV['BASE_PATH'] . 'contact');
      exit;
    }

    try {
      // Email sending logic
      if (empty(ENV['MAIL_TO_ADDRESS'])) {
        throw new Exception('The contact email address is not set in the environment variables.');
      }
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = ENV['SMTP_HOST'];
      $mail->SMTPAuth = true;
      $mail->Username = ENV['SMTP_USERNAME'];
      $mail->Password = ENV['SMTP_PASSWORD'];
      $mail->SMTPSecure = ENV['MAIL_ENCRYPTION'];
      $mail->Port = ENV['SMTP_PORT'];
      // Set from email address and name
      $mail->setFrom(ENV['MAIL_FROM_ADDRESS'], ENV['MAIL_FROM_NAME']);
      // Add recipient
      $mail->addAddress(ENV['MAIL_TO_ADDRESS']);
      // Set email content
      $mail->isHTML(true);
      $mail->Subject = 'Contact form submission';
      // Start output buffering to capture the email template
      ob_start();
      // Pass the $formData array to the template
      include 'resources/views/emails/email_template.php';  // Ensure this path is correct
      $emailBody = ob_get_clean();

      $mail->Body = $emailBody;

      // Send email
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
