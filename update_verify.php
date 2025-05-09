<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userOtp = $_POST['otp'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $rawPassword = $_SESSION['password'];
    $phone = $_SESSION['phone_number'];
    $roll = $_SESSION['Roll_Number'];

    if (isset($_SESSION['otp']) && $userOtp == $_SESSION['otp']) {
        // 1. Insert into DB
        $hashedPassword = password_hash($rawPassword, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, user_name = ?, phone_number = ?, password = ? WHERE Roll_Number= ?");
        $stmt->bind_param("sssssd", $name, $email, $username, $phone, $hashedPassword, $roll);

        if ($stmt->execute()) {
            // 2. Send Email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'onlineexaminationsystem26@gmail.com';
                $mail->Password = 'eccf sgef haxf swpi';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('onlineexaminationsystem@gmail.com', 'Online Examination System');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Your Login Info';
                $mail->Body = "
                    <h3>📩 Welcome to Online Examination System</h3>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Username:</strong> $username</p>
                    <p><strong>Password:</strong> $rawPassword</p>
                    <p><strong>Phone:</strong> $phone</p>
                    <br>
                    <small>🚫 Keep this info safe and do not share it with anyone.</small>
                ";
                $mail->send();
            } catch (Exception $e) {
                echo "❌ Mail error: " . $mail->ErrorInfo;
            }

            // Success
            echo "success";
        } else {
            echo "Failed";
        }

        $stmt->close();
        $conn->close();

    } else {
        echo "invalid";
    }
}
?>