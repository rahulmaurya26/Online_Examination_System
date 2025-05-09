<?php
session_start();
include 'db_connection.php'; // Database connection

// Check if the Roll Number is set in the session
if (!isset($_SESSION['Roll_Number'])) {
    echo json_encode(['status' => 'error', 'message' => 'Roll Number not found in session']);
    exit;
}

// Get Roll Number from session
$Roll_Number = $_SESSION['Roll_Number'];

// Check if Roll Number exists in the note_text table
$check_sql = "SELECT text FROM note_text WHERE Roll_Number = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $Roll_Number);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the note text from the database
    $row = $result->fetch_assoc();
    $noteText = $row['text'];
    echo json_encode(['status' => 'success', 'text' => $noteText]); // Return the note text as JSON
} else {
    echo json_encode(['status' => 'error', 'message' => 'No notes found for this Roll Number']); // If no note found
}

$check_stmt->close();
$conn->close();
?>
