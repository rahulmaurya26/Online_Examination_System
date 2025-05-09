<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';


    // Get form data
    $password = $_POST['password'];
    $conform_password = $_POST['conform_password'];
    $high_school_rollnumber = $_POST['high_school_rollnumber'];

    // Validate passwords match
    if ($password !== $conform_password) {
        echo "<script> alert('MisMatch Password')</script>";
        echo "<script>window.location.href='forgetpassword.html'</script>";
        exit();
    }

    // Check if user exists by high school roll number
    $sql = "SELECT * FROM admin WHERE high_school_rollnumber=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $high_school_rollnumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, proceed with password update
        $sql = "UPDATE users SET password = ?  WHERE high_school_rollnumber = ?";
        $stmt = $conn->prepare($sql);  // Prepare first
        $stmt->bind_param("ss", $password,$high_school_rollnumber); 
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            
            echo "<script>window.location.href='otpsendgmail.html'</script>";
        } else {
            echo "<script> alert('password not update')</script>.";
            echo "<script>window.location.href='index.html'</script>";
        }

    } 
    else {
        echo "<script> alert('Wrong HIGH SCHOOL ROLL NUMBER')</script>";
        echo "<script>window.location.href='forgetpassword.html'</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

