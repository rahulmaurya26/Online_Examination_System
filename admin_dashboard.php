<?php include 'admin_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Online Examination System</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- In your <head> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background-color: #343a40;
    }

    .sidebar .nav-link {
      color: #fff;
      cursor: pointer;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #495057;
      color: #fff;
    }

    .content {
      padding: 20px;
    }

    iframe {
      width: 100%;
      height: 85vh;
      border: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
        <div class="position-sticky pt-3">
          <h4 class="text-center text-white mb-4">Admin Panel</h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" onclick="loadContent('home')"><i class="bi bi-speedometer2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="loadContent('manage_users.php')"><i class="bi bi-people"></i> Manage
                Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="loadContent('manage_exams.php')"><i class="bi bi-journal-text"></i> Manage
                Exams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="loadContent('view_results.php')"><i class="bi bi-bar-chart-line"></i> View
                Results</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="loadContent('view_feedback.php')"><i class="bi bi-chat-dots"></i>
                Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="admin_logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
        <iframe id="main-frame" src="admin_home.php"></iframe>
      </main>

    </div>
  </div>

  <script>
    function loadContent(page) {
      const frame = document.getElementById('main-frame');
      if (page === 'home') {
        frame.src = 'admin_home.php';
      } else {
        frame.src = page;
      }

      // Set active link
      const links = document.querySelectorAll('.nav-link');
      links.forEach(link => link.classList.remove('active'));
      event.target.classList.add('active');
    }
  </script>

</body>

</html>