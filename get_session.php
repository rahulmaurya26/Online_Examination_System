<?php
session_start();

if (isset($_SESSION['Roll_Number'])) {
    echo json_encode([
        "status" => "success",
        "roll_number" => $_SESSION['Roll_Number']
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No session found"
    ]);
}
?>
