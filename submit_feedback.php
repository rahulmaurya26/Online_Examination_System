<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $feedback = htmlspecialchars($_POST['feedback']); // Sanitize input

    $stmt = $conn->prepare("INSERT INTO feedbacks (name, email, rating, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $feedback);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true);
        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'onlineexaminationsystem26@gmail.com';
            $mail->Password = 'eccf sgef haxf swpi'; // Should be app-specific password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Email Content
            $mail->setFrom('onlineexaminationsystem26@gmail.com', 'Online Examination System');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'FEEDBACK';
            $mail->Body = "
                <h3>📩 Welcome to Online Examination System</h3>
                <h1>📩 Thanks For Your Feedback!</h1>
                <p>Dear <strong>$feedback</strong>,</p>
                <p>We really appreciate your valuable input.</p>
                <br>
                <small>🚫 Please keep this email for your reference and do not share it.</small>
            ";
            $mail->send();
        } catch (Exception $e) {
            echo "❌ Mail error: " . $mail->ErrorInfo;
        }
        echo "success";
    } else {
        echo "Failed";
    }

    $stmt->close();
    $conn->close();
}
?>
