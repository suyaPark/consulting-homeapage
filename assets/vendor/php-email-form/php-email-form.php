<?php

class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $ajax;
  public $message;

  // Constructor
  public function __construct() {
    $this->to = '';
    $this->from_name = '';
    $this->from_email = '';
    $this->subject = '';
    $this->ajax = false;
    $this->message = '';
  }

  // Add a message to the email body
  public function add_message($content, $label = '') {
    $this->message .= ($label ? $label . ": " : "") . $content . "\n";
  }

  // Send the email
  public function send() {
    $headers = 'From: ' . $this->from_name . ' <' . $this->from_email . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $this->from_email . "\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";

    if ($this->ajax) {
      $response = [];

      if (mail($this->to, $this->subject, $this->message, $headers)) {
        $response['status'] = 'success';
        $response['message'] = 'Email sent successfully.';
      } else {
        $response['status'] = 'error';
        $response['message'] = 'Error sending email.';
      }

      return json_encode($response);
    } else {
      return mail($this->to, $this->subject, $this->message, $headers);
    }
  }
}

?>
