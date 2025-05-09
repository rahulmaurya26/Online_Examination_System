<?php include 'admin_check.php'; ?>

<?php
include 'db_connection.php';

// Fetch feedbacks
$result = $conn->query("SELECT * FROM feedbacks ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Feedback</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4 text-center">User Feedback</h3>

    <div class="table-responsive">
      <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Feedback</th>
            <th>Submitted At</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                  <?php for ($i = 0; $i < $row['rating']; $i++): ?>
                    ⭐
                  <?php endfor; ?>
                </td>
                <td><?= htmlspecialchars($row['feedback']) ?></td>
                <td><?= date('d M Y, h:i A', strtotime($row['created_at'])) ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center text-muted">No feedbacks found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
