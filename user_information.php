<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Info with Image</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      font-family: 'Segoe UI', sans-serif;
    }

    .profile-container {
      max-width: 800px;
      margin: 80px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .profile-pic:hover {
      opacity: 0.8;
      cursor: pointer;
    }

    .file-input {
      display: none;
    }

    .profile-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-info p {
      font-size: 16px;
      color: #555;
    }

    .modal-header,
    .modal-footer {
      background-color: #0072ff;
      color: #fff;
    }

    .modal-body input {
      border-radius: 10px;
    }

    footer {
      background-color: #232323;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 50px;
    }

    .btn-custom {
      background-color: #0072ff;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 8px 16px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body id="body">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">ONLINE EXAMINATION SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link" href="subjectchoose.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
        <!-- Theme Toggle Button -->
        <li class="nav-item">
          <button class="btn btn-sm btn-light ms-2" id="themeToggle">
            <i class="bi bi-moon-fill"></i> Theme
          </button>
        </li>

      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="profile-container">
      <div class="profile-header">
        <form id="imageForm" enctype="multipart/form-data">
          <label for="fileUpload">
            <img src="uploads/default.png" id="profileImage" class="profile-pic mb-3" alt="Profile">
          </label>
          <input type="file" name="image" id="fileUpload" class="file-input" accept="image/*">
          <input type="hidden" name="Roll_Number" id="roll_hidden">
        </form>
        <h3 id="user_name">Username</h3>
        <p id="name">Full Name</p>
      </div>
      <div class="profile-info">
        <p>Email: <span id="email">---</span></p>
        <p>Phone: <span id="phone_number">---</span></p>
        <p>Roll: <span id="Roll_Number">---</span></p>
        <button class="btn-custom mt-3" data-bs-toggle="modal" data-bs-target="#editModal">Edit Info</button>
      </div>
    </div>
  </div>

  <!-- EDIT MODAL -->

  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- UPDATE FORM -->
        <form id="updateForm">
          <div class="modal-header">
            <h5 class="modal-title">Edit Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="Roll_Number" id="editRoll">
            <div class="mb-3">
              <label>Name</label>
              <input type="text" name="name" id="editName" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Username</label>
              <input type="text" name="username" id="user" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" id="editEmail" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" id="editpassword" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Phone</label>
              <input type="text" name="phone_number" id="editPhone" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Update</button>
          </div>
        </form>

        <!-- OTP FORM -->
        <form id="otp" style="display: none;">
          <div class="modal-body">
            <div class="mb-3">
              <label>Enter OTP</label>
              <input type="text" name="otp" id="otp_input" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" onclick="verifyOTP(event)">Verify</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <footer class="bg-black text-light" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-4">
                    <h4 class="pt-3 fw-bold"></h4>
                    <p>Online Examination System</p>
                    <p>6398428250</p>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <h4 class="pt-3">More</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Result</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Get Certificate</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="pt-3">Categories</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Update Profile</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 text-lg-end">
                    <h4 class="pt-3">Secial Media Icons</h4>
                    <div>
                        <a href="instagram.com" class="text-decoration-none text-light"><i class="bi bi-instagram fs-6 me-80"
                                style="font-size:45px"></i></a>
                        <a href="github.com" class="text-decoration-none text-light"><i class="bi bi-github fs-6 me-80"
                                style="font-size:45px"></i></a>
                        <a href="https://www.linkedin.com/in/mohd-tanzeem-908161314?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                            class="text-deco ration-none text-light"><i class="bi bi-linkedin fs-6 me-3"
                                style="font-size:45px"></i></a>
                        <a href="https://www.youtube.com/@CodingSeekhoAurSeekhao-q2i"
                            class="text-decoration-none text-light"><i class="bi bi-youtube fs-6 me-3"
                                style="font-size:45px"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <p>2025 Coding Seekho Aur Seekhao. All Rights Reserved.</p>
                <div>
                    <a href="#" class="text-decoration-none text-light me-4">Terms And Condition</a>
                    <a href="#" class="text-decoration-none text-light">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
  <script>
    const roll = localStorage.getItem("roll_number");
    document.getElementById("roll_hidden").value = roll;

    function fetchData() {
      fetch("fetch_name.php")
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            document.getElementById("user_name").innerText = data.user_name;
            document.getElementById("user").value = data.user_name;
            document.getElementById("name").innerText = data.name;
            document.getElementById("email").innerText = data.email;
            document.getElementById("phone_number").innerText = data.phone_number;
            document.getElementById("Roll_Number").innerText = data.Roll_Number;
            document.getElementById("editRoll").value = data.Roll_Number;
            document.getElementById("editName").value = data.name;
            document.getElementById("editEmail").value = data.email;
            document.getElementById("editPhone").value = data.phone_number;
            document.getElementById("profileImage").src = "uploads/" + data.image;
          }
        });
    }

    // Upload profile image when file is selected
    document.getElementById("fileUpload").addEventListener("change", function () {
      const imgForm = document.getElementById("imageForm");
      const formData = new FormData(imgForm);
      fetch("upload_image.php", {
        method: "POST",
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert("Image uploaded successfully!");
            document.getElementById("profileImage").src = "uploads/" + data.image;
          } else {
            alert("Image upload failed!");
          }
        });
    });

    fetchData();
  </script>
  <script>
    document.getElementById("updateForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const sendBtn = document.getElementById('otp');

      sendBtn.disabled = true;
      sendBtn.style.cursor = "not-allowed";

      const formData = new FormData(this);

      fetch("update.php", {
        method: "POST",
        body: formData
      })
        .then(response => response.text())
        .then(data => {
          if (data.trim() === "success") {
            alert('✅ OTP sent Email in spam');
            document.getElementById("otp").style.display = "block";
          }

          else if (data.trim() === "already_registered") {
            alert('✅ already_data Present');
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
          }
          else if (data.trim() === "already_password") {
            alert('❌ Already password stored database');
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
          }

          else if (data.trim() === "phone") {
            alert('❌ already stored Phone Number');
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
          }

          else if (data.trim() === "email") {
            alert('Already Email registered');
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
          }

          else {
            alert('❌ Failed to send OTP: ' + data);
            sendBtn.disabled = false;
            sendBtn.style.cursor = "pointer";
          }
        })
        .catch(error => {
          alert('❌ Error: ' + error);
          sendBtn.disabled = false;
          sendBtn.style.cursor = "pointer";
        });
    });
    function verifyOTP(event) {
      event.preventDefault();
      const otp = document.getElementById('otp_input').value;

      fetch("update_verify.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "otp=" + encodeURIComponent(otp)
      })
        .then(response => response.text())
        .then(data => {
          if (data.trim().toLowerCase() === "success") {
            alert('✅ Update successfully!');
            fetchData();
          }

          else if (data.trim() === "Failed") {
            alert('❌ Something went wrong please try again');
          }

          else if (data.trim() === "invalid") {
            alert('❌ Invallid Otp');

          }
          else {
            alert('❌ Error: ' + data);
          }

        });
    }
  </script>
  <script>
    const toggleBtn = document.getElementById("themeToggle");
    const body = document.getElementById("body");

    toggleBtn.addEventListener("click", () => {
      document.body.classList.toggle("light-theme");
      const icon = toggleBtn.querySelector("i");
      if (document.body.classList.contains("light-theme")) {
        body.style.backgroundColor = "black";
        icon.classList.remove("bi-moon-fill");
        icon.classList.add("bi-sun-fill");
      } else {
        body.style.backgroundColor = "white";
        icon.classList.remove("bi-sun-fill");
        icon.classList.add("bi-moon-fill");
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>