<?php
session_start();

if (!isset($_SESSION['Roll_Number']) || !isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$roll = $_SESSION['Roll_Number'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
