<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php';

function otp($length = 4)
{
    $digit = '';
    for ($i = 0; $i < $length; $i++) {
        $digit .= mt_rand(2, 9);
    }
    return $digit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $_POST['Roll_Number']; // current user Roll_Number
    $name = $_POST['name'];
    $toEmail = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone_number'];
    $city = $_POST['city'] ?? '';
    $gender = $_POST['gender'] ?? '';

    // Check email, username, phone duplicate (excluding current Roll_Number)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND user_name = ? AND phone_number = ? AND Roll_Number != ?");
    $stmt->bind_param("ssss", $toEmail, $username, $phone, $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "already_registered";
        exit;
    }

    // Check phone exists (excluding current Roll_Number)
    $stmt = $conn->prepare("SELECT * FROM users WHERE phone_number = ? AND Roll_Number != ?");
    $stmt->bind_param("ss", $phone, $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "phone";
        exit;
    }

    // Check password exists (excluding current Roll_Number)
    $stmt = $conn->prepare("SELECT password FROM users WHERE Roll_Number != ?");
    $stmt->bind_param("s", $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            echo "already_password";
            exit;
        }
    }

    // Check email exists (excluding current Roll_Number)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND Roll_Number != ?");
    $stmt->bind_param("ss", $toEmail, $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "email";
        exit;
    }

    // ✅ Send OTP
    $otp = otp();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $toEmail;
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['phone_number'] = $phone;
    $_SESSION['Roll_Number'] = $roll;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'onlineexaminationsystem26@gmail.com';
        $mail->Password = 'eccf sgef haxf swpi'; // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('onlineexaminationsystem26@gmail.com', 'Online Examination System');
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code - Online Examination System';
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #000;'>
                <h3 style='color: #2E86C1;'>OTP Verification</h3>
                <p>Your One-Time Password (OTP) is:</p>
                <h2 style='background: #f2f2f2; padding: 10px; display: inline-block;'>$otp</h2>
                <p>Please use this OTP to confirm your profile update.</p>
                <br>
                <small style='color: gray;'>⚠️ Do not share this code. It is valid for a limited time only.</small>
            </div>
        ";
        $mail->AltBody = "Your OTP is: $otp\nUse it to confirm your profile update.";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>
