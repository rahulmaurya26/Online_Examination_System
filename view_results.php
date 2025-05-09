<?php include 'admin_check.php'; ?>

<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Results | Admin Panel</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="mb-4 text-center">Quiz Results</h3>

  <div class="mb-3 text-end">
    <button class="btn btn-success" onclick="exportTableToPDF()">Download PDF</button>
  </div>

  <div class="table-responsive">
    <table id="resultsTable" class="table table-bordered table-striped table-hover bg-white">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Student Name</th>
          <th>Roll No</th>
          <th>Subject</th>
          <th>Total Questions</th>
          <th>Attempted</th>
          <th>Correct</th>
          <th>Wrong</th>
          <th>Score</th>
          <th>Percentage</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM quiz_results ORDER BY quiz_date DESC, quiz_time DESC";
        $result = $conn->query($query);
        if ($result->num_rows > 0):
          $i = 1;
          while ($row = $result->fetch_assoc()):
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['student_name']) ?></td>
          <td><?= htmlspecialchars($row['Roll_Number']) ?></td>
          <td><?= htmlspecialchars($row['subject_name']) ?></td>
          <td><?= $row['total_questions'] ?></td>
          <td><?= $row['attempted'] ?></td>
          <td><?= $row['correct'] ?></td>
          <td><?= $row['wrong'] ?></td>
          <td><?= $row['total_score'] ?></td>
          <td><?= number_format($row['percentage'], 2) ?>%</td>
          <td><?= date("d M Y", strtotime($row['quiz_date'])) ?></td>
          <td><?= date("h:i A", strtotime($row['quiz_time'])) ?></td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
          <td colspan="12" class="text-center text-muted">No results found.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#resultsTable').DataTable({
      responsive: true,
      lengthChange: true,
      pageLength: 10,
      ordering: true,
      buttons: []
    });
  });

  function exportTableToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.autoTable({
      html: '#resultsTable',
      startY: 20,
      headStyles: { fillColor: [41, 128, 185] },
      margin: { top: 10 },
      styles: { fontSize: 8 }
    });
    doc.save('quiz_results.pdf');
  }
</script>

</body>
</html>
