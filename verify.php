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
    $city = $_SESSION['city'];
    $gender = $_SESSION['gender'];

    if (isset($_SESSION['otp']) && $userOtp == $_SESSION['otp']) {
        // 1. Insert into DB
        $Roll_Number = rand(100000000000, 999999999999);
        $hashedPassword = password_hash($rawPassword, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, user_name, phone_number, Roll_Number, city, gender, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssddsss", $name, $email, $username, $phone, $Roll_Number, $city, $gender, $hashedPassword);

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
                    <p><strong>City:</strong> $city</p>
                    <p><strong>Gender:</strong> $gender</p>
                    <br>
                    <small>🚫 Keep this info safe and do not share it with anyone.</small>
                ";
                $mail->send();
            } catch (Exception $e) {
                echo "❌ Mail error: " . $mail->ErrorInfo;
            }

            session_unset();
            session_destroy();
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