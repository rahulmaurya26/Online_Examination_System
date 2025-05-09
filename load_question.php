<?php include 'admin_check.php'; ?>
<?php
if (isset($_GET['subject'])) {
  $subject = $_GET['subject'];
  $file = "$subject.js";

  if (file_exists($file)) {
    echo file_get_contents($file);
  } else {
    echo "// No questions found for $subject";
  }
}
?>
