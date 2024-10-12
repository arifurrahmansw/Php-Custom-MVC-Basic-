<?php

class ContactFormRequest
{
    public $name;
    public $email;
    public $message;
    public $errors = [];

    public function __construct($data)
    {
        $this->name = $data['name'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->message = $data['message'] ?? '';
    }

    public function validate()
    {
        // Clear previous errors
        $this->errors = [];

        // Debugging: Log input values
        error_log("Name: {$this->name}, Email: {$this->email}, Message: {$this->message}");

        // Validate name
        if (empty($this->name)) {
            $this->errors['name'] = 'Name is required.';
        }

        // Validate email
        if (!$this->isValidEmail($this->email)) {
            $this->errors['email'] = 'A valid email address is required.';
        }

        // Validate message
        if (empty($this->message)) {
            $this->errors['message'] = 'Message is required.';
        }

        // Log errors
        error_log(print_r($this->errors, true));

        // Return true if there are no errors
        return empty($this->errors);
    }

    private function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
