<?php
include 'db_connection.php';

$Roll_Number = $_SESSION['Roll_Number'] ?? null;
$subjects = [];

if ($Roll_Number) {
    $sql = "SELECT subject_name FROM quiz_results WHERE Roll_Number = ? AND percentage >= 80";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Roll_Number);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row['subject_name'];
    }
    $_SESSION['subject_names'] = $subjects;
}
?>
