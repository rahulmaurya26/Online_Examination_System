<?php
include 'db_connection.php';



$data = json_decode(file_get_contents("php://input"), true);


if (!$data) {
    die(json_encode(["success" => false, "message" => "Invalid JSON data"]));
}
$student_name = $data['student_name'];
$subject_name = $data['subject_name'];
$total_questions = $data['total_questions'];
$attempted = $data['attempted'];
$correct = $data['correct'];
$wrong = $data['wrong'];
$percentage = $data['percentage'];
$total_score = $data['total_score'];
$Roll_Number=$data['Roll_Number'];
$sql = "INSERT INTO quiz_results (student_name, subject_name, total_questions, attempted, correct, wrong, percentage, total_score,Roll_Number) 
        VALUES ('$student_name', '$subject_name', '$total_questions', '$attempted', '$correct', '$wrong', '$percentage', '$total_score','$Roll_Number')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Result saved successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $sql . " - " . $conn->error]);
}


$conn->close();
?>
