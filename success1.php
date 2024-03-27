<?php
@include 'connect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$recipient = $_SESSION['umail'];
$mail = new PHPMailer(true);
try {
  // Server settings
  $mail->SMTPDebug = 0;                      // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host = 'smtp.gmail.com';                     // Set the SMTP server to send through
  $mail->SMTPAuth = true;                                   // Enable SMTP authentication
  $mail->Username = 'kanchipativarshith.21.cse@anits.edu.in';               // SMTP username
  $mail->Password = 'adnujbynsuzkaxsj';                        // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
  $mail->Port = 587;                                    // TCP port to connect to

  // Sender
  $mail->setFrom('kanchipativarshith.21.cse@anits.edu.in', 'Green Hostel');

  // Iterate through users and send email

  $to = $recipient;
  $mail->addAddress($to);     // Add a recipient

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = "Green Hostel OTP";
  $mail->Body = "Dear ".$_SESSION['uname'].",<br><br>Payment is Successful";
  $mail->AltBody ="Dear ".$_SESSION['uname'].",\n\nPayment is Successful";

  $mail->send();
  // unset($_SESSION['otp']);
  // echo "Email sent to: $to<br>";
  $mail->clearAddresses();
  
  $pay = date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d"))));
  $sql =  "UPDATE login set pay = ".$pay.", sent = Done where email = ".$_SESSION['umail'].""; 
  $result = mysqli_query($conn, $sql);
  header("Location: student.php");   // Clear all addresses and attachments for the next iteration
} catch (Exception $e) {
  echo "Mailer Error: {$mail->ErrorInfo}";
}
