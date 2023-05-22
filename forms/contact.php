<?php
  // Include the php-email-form.php file
  require_once('php-email-form.php');

  // Set the receiving email address
  $receiving_email_address = 'suya@payapcorp.com';

  // Create an instance of PHP_Email_Form
  $contact = new PHP_Email_Form();

  // Set the email properties
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Add form data to the email body
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Send the email and get the response
  $response = $contact->send();

  // Handle the response
  if ($response) {
    // Email sent successfully
    echo "Email sent successfully.";
  } else {
    // Error sending email
    echo "Error sending email.";
  }
?>
