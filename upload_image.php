<?php
session_start(); 
include 'db_connection.php';


$roll = $_SESSION["Roll_Number"]; 
if (isset($_FILES["image"])) {
  $img_name = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];
  $target = "uploads/" . basename($img_name);

  if (move_uploaded_file($tmp_name, $target)) {
    $stmt = $conn->prepare("UPDATE users SET image=? WHERE Roll_Number=?");
    $stmt->bind_param("ss", $img_name, $roll);
    if ($stmt->execute()) {
      echo json_encode(["success" => true, "image" => $img_name]);
    } else {
      echo json_encode(["success" => false, "message" => "DB update error"]);
    }
  } else {
    echo json_encode(["success" => false, "message" => "Upload failed"]);
  }
}

?>