<?php
@include 'connect.php';
$currentDate = date("Y-m-d");
// echo $currentDate;
$flag = 0;
$sql = 'SELECT * from date1';
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
if($rows['date'] != $currentDate){
  $sql = 'UPDATE laundry set occup = 0';
  $result = mysqli_query($conn, $sql);
  $sql = "UPDATE date1 set date = '$currentDate'";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['cellValue'])) {
    $res = $_POST['cellValue'];
    // echo $res;
    $sql = "SELECT * from laundry where sno = '$res'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($row['occup'] == 1) {
        echo "Room Already Booked";
      } else {
        echo "Booking Successfull!!";
        $sql = "UPDATE laundry 
        SET occup = 1
        WHERE sno = '$res'";
        $result = mysqli_query($conn, $sql);

      }
    }
    exit();
  } else {
    echo "No cell value received";
    exit();
  }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Laundry</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>

<body>
  <div class="l-con">
    <div class="cell" id='1'>8:00AM-9:00AM</div>
    <div class="cell" id='2'>9:00AM-10:00AM</div>
    <div class="cell" id='3'>10:00AM-11:00AM</div>
    <div class="cell" id='4'>11:00AM-12:00AM</div>
    <div class="cell" id='5'>12:00AM-1:00PM</div>
    <div class="cell" id='6'>1:00PM-2:00PM</div>
    <div class="cell" id='7'>2:00PM-3:00PM</div>
    <div class="cell" id='8'>3:00PM-4:00PM</div>
    <div class="cell" id='9'>4:00PM-5:00PM</div>
    <div class="cell" id='10'>5:00PM-6:00PM</div>
  </div>

  <script>
    <?php
     
    $sql = 'SELECT * from laundry';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "cells = document.querySelectorAll('.cell');
              cells.forEach(cell => {
                  if(cell.id == '" . $row['sno'] . "') {
                    if(" . $row['occup'] . "){

                      cell.classList.add('Red');
                    }
                    else{
                      cell.classList.add('Green');

                    }
                      console.log('Done');
                  }
              });";
      }
    }
    ?>
    document.addEventListener('DOMContentLoaded', function () {
      let cells = document.querySelectorAll('.cell');
      cells.forEach(cell => {
        cell.addEventListener('click', e => {
          let cellValue = e.target.id;
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
              alert(this.responseText);
            }
          };
          xhttp.open('POST', 'laundry.php', true);
          xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhttp.send('cellValue=' + encodeURIComponent(cellValue));
        });
      });
    });
  </>
</body>

</html>




// otp.php



<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
session_start();


// Function to generate random OTP
function generateOTP($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

// Function to send OTP via email
function sendOTPByEmail($otp, $recipient) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Your email
        $mail->Password = 'your_password'; // Your password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'Hospital Team');
        $mail->addAddress($recipient); // recipient email

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Appointment Confirmation OTP";
        $mail->Body = "Your OTP for appointment confirmation is: $otp";

        $mail->send();
        echo "<script>alert('OTP sent successfully');</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Generate and send OTP


// Verify OTP
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $enteredOTP = isset($_POST['otp']) ? trim($_POST['otp']) : '';
    $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    echo "Entered OTP: $enteredOTP<br>";
    echo "Stored OTP: $storedOTP<br>";

    if ($enteredOTP == $storedOTP) {
        echo "OTP verified successfully!";
        // Proceed with appointment booking or other actions
        // Example: Insert appointment details into the database
        // $slotInsertQuery = "INSERT INTO slot_booking(doctor, slot, appointment_type) VALUES (?, ?, ?)";
        // $stmt = $data->prepare($slotInsertQuery);
        // $stmt->bind_param("sss", $doctor, $slot, $type);
        // if ($stmt->execute()) {
        //     header("Location: thankyou.php");
        //     exit();
        // } else {
        //     echo "Error inserting appointment: " . $stmt->error;
        // }
    } else {
        echo "Invalid OTP. Please try again.";
        // Prompt user to enter OTP again or resend OTP
    }
}
else{
        $otp = generateOTP();
        $recipient = "user@example.com"; // Replace with user's email address
        sendOTPByEmail($otp, $recipient);
        $_SESSION['otp'] = $otp;
}
?>