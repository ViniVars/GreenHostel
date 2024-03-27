<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
@include 'connect.php';

$otp = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enteredOTP = $_POST['otp'];
    echo $enteredOTP;
    echo $_SESSION['otp'];
    if ($enteredOTP == $_SESSION['otp']) {
        echo "OTP verified successfully!";
        header('Location: forget1.php');

    } else {
        echo "Invalid OTP. Please try again.";
    }
} else {
    // echo $otp;
    function generateOTP($length = 6)
    {
        return rand(pow(10, $length - 1), pow(10, $length) - 1);
    }
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $recipient = $_SESSION['change'];
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

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .o-con {
            background-color: #0C0E10;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00E2C8;
        }

        .o-con>* {
            height: 100%;
            width: 100%;
        }

        .ol-con {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            width: 600px;
            border-radius: 15px;
        }

        .or-con {
            /* background-color: red; */
            display: flex;
            justify-content: center;
            gap: 4rem;
            align-items: center;
            flex-direction: column;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bolder;
            font-size: 1.2rem;

        }

        .auth {
            font-size: 4rem;

        }

        input {
            background-color: #121118;
            border: #00E2C8 2.5px solid;
            border-radius: 7px;
            width: 400px;
            height: 20px;
            padding: 0.5rem;
            color: #00C1B6;
            font-weight: bold;
        }

        .sent {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input:focus {
            outline: none;

        }

        input[type='submit'] {
            background-color: #00E2C8;
            border-radius: 15px;
            width: 150px;
            height: 40px;
            color: #121118;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <form action="otp.php" method="post">

        <div class="o-con">
            <div class="ol-con">
                <img src="auth.png" alt="">
            </div>
            <div class="or-con">
                <div>
                    <div class="auth">Authentication</div>
                    <?php

                    echo "<div class='sent'>Verification Code sent to " . $_SESSION['change'] . " </div>"
                        ?>
                </div>
                <div class="inp">
                    <input type="text" name='otp'>
                </div>
                <div class="ver-btn">
                    <input type="submit" value="Verify">
                </div>
            </div>
        </div>
        <!-- <h2>OTP Verification</h2>
    <form method="POST" action="otp.php">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit" name="submit">Verify OTP</button>
    </form> -->
    </form>
</body>

</html>