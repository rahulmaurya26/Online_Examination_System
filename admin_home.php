<!-- In your <head> -->
<?php include 'admin_check.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="icon" type="image/png" href="favicon-32x32.png">


<?php
include 'db_connection.php'; // ← apni DB connection file ka naam

// Fetch total users
$userQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users");
$userData = mysqli_fetch_assoc($userQuery);
$totalUsers = $userData['total_users'];

// Fetch total exams
$examQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_exams FROM quiz_results");
$examData = mysqli_fetch_assoc($examQuery);
$totalExams = $examData['total_exams'];

// Fetch total feedbacks
$feedbackQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_feedbacks FROM feedbacks");
$feedbackData = mysqli_fetch_assoc($feedbackQuery);
$totalFeedbacks = $feedbackData['total_feedbacks'];
?>



<?php
// include 'db_connection.php';

// 1. Recent Registrations
$regQuery = mysqli_query($conn, "SELECT name, created_at FROM users ORDER BY id DESC LIMIT 5");

// 2. Recent Exam Submissions
$examQuery = mysqli_query($conn, "
  SELECT student_name,subject_name,percentage,quiz_date 
  FROM quiz_results ORDER BY quiz_results.id DESC LIMIT 5");

// // 3. Recent Feedbacks
$fbQuery = mysqli_query($conn, "
  SELECT name, feedback,created_at 
  FROM feedbacks ORDER BY feedbacks.id DESC 
  LIMIT 5");
?>





<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text fs-3"><i class="bi bi-person-lines-fill"></i> <?= $totalUsers ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total Exams</h5>
                <p class="card-text fs-3"><i class="bi bi-journals"></i> <?= $totalExams ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Feedbacks</h5>
                <p class="card-text fs-3"><i class="bi bi-chat-square-text"></i> <?= $totalFeedbacks ?></p>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h5 class="mb-3">Recent Activity</h5>
    <ul class="list-group">

        <!-- Recent Registrations -->
        <?php while ($row = mysqli_fetch_assoc($regQuery)): ?>
            <li class="list-group-item">
                <i class="bi bi-person-plus-fill text-primary"></i>
                New user registered: <strong><?= $row['name'] ?></strong>
                (<?= date("d M Y", strtotime($row['created_at'])) ?>)
            </li>
        <?php endwhile; ?>

        <!-- Recent Exams -->
        <?php while ($row = mysqli_fetch_assoc($examQuery)): ?>
            <li class="list-group-item">
                <i class="bi bi-person-check-fill text-success"></i>
                <strong><?= $row['student_name'] ?></strong> submitted <strong><?= $row['subject_name'] ?></strong> on
                <?= date("d M Y", strtotime($row['quiz_date'])) ?> —
                <span class="text-primary fw-semibold">Scored <?= $row['percentage'] ?>%</span>
            </li>

        <?php endwhile; ?>

        <!-- Recent Feedbacks -->
        <?php while ($row = mysqli_fetch_assoc($fbQuery)): ?>
            <li class="list-group-item">
                <i class="bi bi-chat-dots text-warning"></i>
                <strong><?= $row['name'] ?></strong> gave feedback: "<?= $row['feedback'] ?>"
            </li>
        <?php endwhile; ?>

    </ul>
</div>