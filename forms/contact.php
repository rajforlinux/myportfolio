<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'rajghimirey26@gmail.com';

  require 'vendor/autoload.php';

  // Use PHPMailer instead of PHP Email Form
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $mail = new PHPMailer(true); // Enable exceptions

  try {
    // Set SMTP details
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rajghimirey640@gmail.com';
    $mail->Password = 'nassjezvdyyupgdf';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set recipient and sender information
    $mail->addAddress($receiving_email_address);
    $mail->setFrom($_POST['email'], $_POST['name']);

    // Set message subject and body
    $mail->Subject = $_POST['subject'];
    $mail->Body = "From: {$_POST['name']} ({$_POST['email']})\n\n{$_POST['message']}";

    // Send the email
    $mail->send();

    // Success message
    echo 'Your message has been sent successfully!';
  } catch (Exception $e) {
    // Error message
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
  }
?>
