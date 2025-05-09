<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php';

session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_input = $_POST['user_name']; // yeh input ho sakta hai user_name ya email
    $password = $_POST['password'];

    // user_name ya email dono match karne ka SQL
    $sql = "SELECT name, Roll_Number, email, password FROM users WHERE user_name = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_input, $user_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['Roll_Number'] = $user['Roll_Number'];
            $email = $user['email'];

            if (!isset($_SESSION['email'])) {
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
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Your Login Info';
                    $mail->Body = "
                        <h3>📩 Welcome to Online Examination System</h3>
                        <br>
                        <h1>✅ Login Successful</h1>
                        <br>
                        <small>🚫 Keep this info safe and do not share it with anyone.</small>
                    ";
                    $mail->send();

                    $_SESSION['email'] = $email;

                } catch (Exception $e) {
                    echo "❌ Mail error: " . $mail->ErrorInfo;
                }
            }

            echo "success";

        } else {
            echo "wrong"; // wrong password
        }
    } else {
        echo "username"; // username or email not found
    }

    $stmt->close();
    $conn->close();
}
?>
