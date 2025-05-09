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

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, email,admin_id, password FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $email=$user['email'];
            // Send email only once per session
            if (!isset($_SESSION['admin_id'])) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'onlineexaminationsystem26@gmail.com'; // your SMTP Gmail
                    $mail->Password = 'eccf sgef haxf swpi'; // your app password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('onlineexaminationsystem26@gmail.com', 'Online Examination System');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Admin Login';
                    $mail->Body = "
                        <h3>📩 Welcome to Online Examination System</h3>
                        <br>
                        <h1>✅ Login Successful</h1>
                        <br>
                        <small>🚫 Keep this info safe and do not share it with anyone.</small>
                    ";
                    $mail->send();

                    $_SESSION['admin_id'] = true;
                    $_SESSION['admin_id'] = $user['admin_id'];

                } catch (Exception $e) {
                    echo "❌ Mail error: " . $mail->ErrorInfo;
                }
            }

            echo "success";

        } else {
            echo "wrong"; // wrong password
        }
    } else {
        echo "username"; // username not found
    }

    $stmt->close();
    $conn->close();
}
?>
