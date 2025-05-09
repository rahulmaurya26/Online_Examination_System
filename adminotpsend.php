<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
include 'db_connection.php';

function otp($length = 4)
{
    $digit = '';
    for ($i = 0; $i < $length; $i++) {
        $digit .= mt_rand(2, 9);
    }
    return $digit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $toEmail;

    $checkQuery = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $toEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "not_found";
        exit;
    }

    $otp = otp();
    $_SESSION['otp'] = $otp;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'onlineexaminationsystem26@gmail.com';
        $mail->Password = 'eccf sgef haxf swpi';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('onlineexaminationsystem26@gmail.com', 'Online Examination System');
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "
            <h3>OTP Verification</h3>
            <p>Your OTP is: <strong>$otp</strong></p>
            <p>Use this OTP to complete your request.</p>
            <small>Do not share this OTP with anyone.</small>
        ";
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>