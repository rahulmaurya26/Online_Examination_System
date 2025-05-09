<?php
include 'db_connection.php';
session_start();

$Roll_Number = $_SESSION['Roll_Number'] ?? null;
$text = $_POST['texts'] ?? null;

if (empty($Roll_Number)) {
    echo "Session expired. Please log in again.";
    exit;
}

if (empty($text)) {
    echo "Note text is missing.";
    exit;
}

// Check if the record already exists
$check_sql = "SELECT * FROM note_text WHERE Roll_Number = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $Roll_Number);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing record
    $update_sql = "UPDATE note_text SET text = ? WHERE Roll_Number = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ss", $text, $Roll_Number);

    echo $update_stmt->execute() ? "success" : "Error updating record: " . $conn->error;

    $update_stmt->close();
} else {
    // Insert new record
    $insert_sql = "INSERT INTO note_text (Roll_Number, text) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ss", $Roll_Number, $text);

    echo $insert_stmt->execute() ? "success" : "Error inserting record: " . $conn->error;

    $insert_stmt->close();
}

$check_stmt->close();
$conn->close();

?>