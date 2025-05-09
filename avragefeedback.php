<?php
include 'db_connection.php'; // your DB connection

$sql = "SELECT AVG(rating) AS average_rating FROM feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avg_rating = round($row['average_rating'], 1); // round to 1 decimal
    $_SESSION['avrage'] = $avg_rating / 5;
} else {
    echo "<h4 class='text-danger text-center'>No feedbacks found.</h4>";
}
?>