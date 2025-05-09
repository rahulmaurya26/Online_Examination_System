<?php include 'admin_check.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the subject and questions from the form
    $subject = $_POST['subject'];
    $questions = $_POST['questions'];

    // Define the file path for each subject
    $file_path = "$subject.js";

    // Check if the file exists and is writable
    if (file_exists($file_path) && is_writable($file_path)) {
        // Save the questions into the respective file
        file_put_contents($file_path, $questions);
        $message = "Questions saved successfully!";
    } else {
        $message = "Failed to save questions. File not found or not writable.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Exams</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h3 class="mb-4">Manage Exam Questions</h3>

  <?php if (isset($message)): ?>
    <div class="alert alert-info"><?= $message; ?></div>
  <?php endif; ?>

  <form id="questionForm" method="post">
    <div class="mb-3">
      <label for="subject" class="form-label">Select Subject</label>
      <select class="form-select" id="subject" name="subject" required>
        <option value="">-- Select Subject --</option>
        <option value="c">C</option>
        <option value="cpp">C++</option>
        <option value="java">Java</option>
        <option value="python">Python</option>
        <option value="nodejs">Nodejs</option>
        <option value="reactjs">Reactjs</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="questions" class="form-label">Edit Questions</label>
      <textarea class="form-control" id="questions" name="questions" rows="15" placeholder="Questions will load here..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>

<script>
  // Load questions on subject change
  document.getElementById('subject').addEventListener('change', function () {
    const subject = this.value;
    if (subject) {
      fetch(`load_question.php?subject=${subject}`)
        .then(response => response.text())
        .then(data => {
          // Add spacing after each question in the textarea
          document.getElementById('questions').value = data.replace(/\n/g, '\n\n'); // Adds a double newline
        });
    } else {
      document.getElementById('questions').value = '';
    }
  });
</script>
</body>
</html>
