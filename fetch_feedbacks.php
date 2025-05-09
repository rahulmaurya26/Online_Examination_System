<?php
include 'db_connection.php';

$query = "SELECT name, feedback, rating FROM feedbacks ORDER BY id DESC";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
