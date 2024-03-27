
        <?php
        @include 'connect.php';
        // Include PHPMailer library
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        // Send email to each matching user using PHPMailer
        

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

                $to = "dasarinirmala110@gmail.com";
                $mail->addAddress($to);     // Add a recipient
        
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Green Hostel OTP";
                $mail->Body = "Dear User,<br><br>A new job matching your field and experience has been added:<br><br>Job Type: $jobType<br>Company: $company<br>Description: $description<br><br>Apply now!";
                $mail->AltBody = "Dear User,\n\nA new job matching your field and experience has been added:\n\nJob Type: $jobType\nCompany: $company\nDescription: $description\n\nApply now!";

                $mail->send();
                echo "Email sent to: $to<br>";
                $mail->clearAddresses();    // Clear all addresses and attachments for the next iteration
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }


        $conn->close();

        ?>

