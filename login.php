<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
@include 'connect.php';

$_SESSION['log'] = "false";
$conn = $_SESSION['db'];
$sql = "SELECT * from login";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {

    $date1 = new DateTime("" . $row['pay'] . "");
    $date2 = new DateTime(date("Y-m-d"));
    $interval = $date1->diff($date2);
    if ($interval->format('%R%a days') == -2 && $row['sent'] != 'Done') {
      $recipient = $row['email'];
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
        $mail->Body = "Dear User,<br><br>The OTP generated for your change Password Request is:<h2>" . $_SESSION['otp'] . "</h2>";
        $mail->AltBody = "Dear User,\n\nThe OTP generated for your change Password Request is:<h2>" . $_SESSION['otp'] . "</h2>";

        $mail->send();
        // unset($_SESSION['otp']);
        // echo "Email sent to: $to<br>";
        $mail->clearAddresses();    // Clear all addresses and attachments for the next iteration
      } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
      }
      $sql = "UPDATE login Set sent = 'Done' where email = " . $row['email'] . "";
      $result = mysqli_query($conn, $sql);
    }


  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["rno"];
  $password = $_POST["password"];

  if ($username && $password) {
    if ($username == 'A165' && $password == '165') {
      $_SESSION['log'] = "admin";
      $_SESSION['cred'] = 'Admin';
      // echo "DOne";
      header("Location: dashboard.php");
      exit();
    }
    $sql = "Select * from login where sno = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_num_rows($result)) {
      header("Location: register.php");
      exit();
    } else {
      $rows = mysqli_fetch_assoc($result);
      $_SESSION['log'] = "true";
      $_SESSION["uroll"] = $rows["sno"];
      $_SESSION["umail"] = $rows["email"];
      $_SESSION['uname'] = $rows['name'];
      $_SESSION['uroom'] = $rows['room'];
      $_SESSION['uage'] = $rows['age'];
      header("Location: student.php");
      exit();
    }
  } else {
    echo "Invalid username or password.";
  }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
  <style>
    .log-con {
      background-color: #00C1B6;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .main-con {
      width: 85vw;
      height: 90vh;
      display: flex;
      border-radius: 15px;
      justify-content: center;
      align-items: center;
      background-color: red;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
      /* box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; */
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .main-con>* {
      width: 100%;
      height: 100%;
    }

    .l-con {
      border-top-left-radius: 15px;
      border-bottom-left-radius: 15px;
      background-color: #00C1B6;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .r-con {
      border-bottom-right-radius: 15px;
      border-top-right-radius: 15px;
      background-color: #FAFFFB;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 0.5rem;
      /* padding: -rem; */

    }

    .r-con>* {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 10%;
      gap: 0.3rem;
    }

    .user-cover,
    .pass-cover {
      flex-direction: column;
    }

    .user-name,
    .pass-name {
      width: 63%;
      color: #939493;
    }

    input {
      background-color: #EBEBEB;
      border: #DCDEDC 2px solid;
      border-radius: 7px;
      width: 400px;
      height: 20px;
      padding: 0.5rem;
      color: #00C1B6;
      font-weight: bold;
    }

    input:focus {
      outline: none;

    }

    .forget-cover {
      justify-content: space-between;
      width: 65%;
      position: relative;
      top: -1rem;
    }

    input[type='submit'] {
      border-radius: 7px;
      width: 400px;
      height: 40px;
      font-weight: bolder;
      font-size: 1.1rem;
      border: 0;
      background-color: #00C1B6;
      color: white;
      transition: all 300ms linear;
    }

    input[type='submit']:hover {
      cursor: pointer;
      scale: 1.05;
    }

    a {
      text-decoration: underline;
      color: #00C1B6;
    }

    .l-con a {
      color: white;
      text-decoration: none;
    }

    .logo>img {
      width: 50px;
      border-radius: 50vw;
    }

    .hostel {
      gap: 1rem;
      font-size: 2.5rem;
      font-weight: bolder;
      position: relative;
      top: -2rem;
    }

    span {
      color: #00C1B6;
    }

    .l-con img {
      width: 500px;
    }

    .bb {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 5rem;
    }
  </style>
</head>

<body>
  <form action="login.php" method='post'>

    <div class="log-con">
      <div class="main-con">
        <div class="l-con">
          <div>
            <img src="vectorlab190300330-removebg-preview.png" alt="">
          </div>
          <div class='bb'>
            <div class="b1">
              <a href="about.php">About Us</a>
            </div>
            <div class="b2">
              <a href="reviews.php">Explore</a>
            </div>
          </div>
        </div>
        <div class="r-con">
          <div class="hostel">
            <!-- <div class="logo">
              <img
              src="data:image/png;base64,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"
              alt="">
            </div> -->
            <div class="name"><span>Green </span>Hostel</div>
          </div>
          <div class="user-cover">
            <div class="user-name">UserName</div>
            <div class="user-inp">
              <input type="text" name="rno" id="">
            </div>
          </div>
          <div class="pass-cover">
            <div class="pass-name">Password</div>
            <div class="pass-inp">
              <input type="password" name="password" id="">
            </div>
          </div>
          <div class="forget-cover">
            <div></div>
            <div><a href="forget.php">Forgot Password?</a></div>
          </div>
          <div class="log-btn">
            <input type="submit" value="Login">
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- <div class="login-container">
      <form  method="post">
        <center><h2>LOGIN NOW</h2></center>
        <table>
          <tr>
            <td><label>Roll Number: </label></td>
            <td><input type="text" name="rno" placeholder="Enter Roll Number"><br></td>
          </tr>
          <tr>
            <td><label>Password: </label></td>
            <td><input type="password" name="password" placeholder="Enter password"><br></td>
          </tr>
        </table>
        <center><input type="submit" name="submit" value="Login" class="btn">
        </center>
      </form>

    </div> -->
</body>

</html>