<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start(); // Start session to store OTP

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php'; // Include your DB connection

// Generate OTP
function otp($length = 4)
{
    $digit = '';
    for ($i = 0; $i < $length; $i++) {
        $digit .= mt_rand(2, 9);
    }
    return $digit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $toEmail = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $phone = $_POST['phone_number'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    if($password!=$repassword){
        echo"password";
        exit;
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND user_name = ? AND phone_number = ?");
    $stmt->bind_param("ssd", $toEmail, $username, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_unset();
        session_destroy();
        echo "already_registered";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE  phone_number = ?");
    $stmt->bind_param("d",  $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_unset();
        session_destroy();
        echo "phone";
        exit;
    }

    // Fetch all passwords and verify against input
    $stmt = $conn->prepare("SELECT password FROM users");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            echo "already_password";
            exit;
        }
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?  ");
    $stmt->bind_param("s", $toEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_unset();
        session_destroy();
        echo "email";
        exit;
    }

    // Generate OTP and save to session
    $otp = otp();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $toEmail;
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['phone_number'] = $phone;
    $_SESSION['city'] = $city;
    $_SESSION['gender'] = $gender;

    // Send OTP via Mail
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'onlineexaminationsystem26@gmail.com';
        $mail->Password = 'eccf sgef haxf swpi'; // App-specific password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('onlineexaminationsystem26@gmail.com', 'Online Examination System');
        $mail->addAddress($toEmail);
        $mail->addReplyTo('onlineexaminationsystem26@gmail.com', 'Online Examination Support');
        $mail->addCustomHeader('X-Mailer', 'PHPMailer');

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code - Online Examination System';
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #000;'>
                <h3 style='color: #2E86C1;'>OTP Verification</h3>
                <p>Your One-Time Password (OTP) is:</p>
                <h2 style='background: #f2f2f2; padding: 10px; display: inline-block;'>$otp</h2>
                <p>Please use this OTP to complete your registration.</p>
                <br>
                <small style='color: gray;'>⚠️ Do not share this code with anyone. This OTP is confidential and valid for a limited time only.</small>
            </div>
        ";
        $mail->AltBody = "Your OTP is: $otp\nUse this code to complete your registration. Do not share it with anyone.";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>