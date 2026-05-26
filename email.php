<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$MailSubject = 'Email From SBIHM Travel & Tourism Management Landing Page Section';

$sender_name    = $_POST["name"]; 
$reply_to_email = $_POST["email"];
$phone          = $_POST["phone"];
$city           = $_POST["city"];
$stream         = $_POST["stream"];
$campus         = $_POST["campus"];
$source         = $_POST["source"];

$MailHtmlMessage = '
    <p><strong>Name:</strong> ' . htmlspecialchars($sender_name) . '</p>
    <p><strong>Email:</strong> ' . htmlspecialchars($reply_to_email) . '</p>
    <p><strong>Phone:</strong> ' . htmlspecialchars($phone) . '</p>
    <p><strong>City:</strong> ' . htmlspecialchars($city) . '</p>
    <p><strong>Class 12 Stream:</strong> ' . htmlspecialchars($stream) . '</p>
    <p><strong>Campus:</strong> ' . htmlspecialchars($campus) . '</p>
    <p><strong>How did you hear about us?:</strong> ' . htmlspecialchars($source) . '</p>
';

// Send email
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();	
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "plandleadtest@gmail.com";
    $mail->Password = "pwas ggqt voph lxrq"; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('plandleadtest@gmail.com', 'SBIHM Travel & Tourism Management');
    $mail->addAddress('strategy@pland.in', 'SBIHM Travel & Tourism Management');
    $mail->addAddress('plandleadtest@gmail.com', 'SBIHM Travel & Tourism Management');
    $mail->addAddress('das.sajal143@gmail.com', 'SBIHM Travel & Tourism Management');
    $mail->addAddress('admissions.sbihm@gmail.com', 'SBIHM Travel & Tourism Management');
	
    $mail->isHTML(true);
    $mail->Subject = $MailSubject;
    $mail->Body    = $MailHtmlMessage;

    $mail->send();

    echo "<script type='text/javascript'>
            window.location.href = 'thankyou.html';
          </script>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>
