<?php
$name = "John Doe";
$subject = isset($_GET['subject']) ? $_GET['subject'] : "Unknown Subject";
$date = date("F d, Y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Certificate of Achievement</title>
  <link rel="icon" type="image/png" href="favicon-32x32.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <style>
    body {
      background-color: #e6f0fa;
      font-family: 'Georgia', serif;
      padding: 20px;
    }

    .certificate {
      background: #fff;
      padding: 60px 50px;
      border: 10px double #333;
      width: 100%;
      max-width: 900px;
      margin: 30px auto;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
      position: relative;
    }

    .certificate h1 {
      font-size: 42px;
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 10px;
      color: #2c3e50;
    }

    .certificate h3 {
      font-size: 22px;
      margin-bottom: 30px;
      color: #555;
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo img {
      width: 120px;
    }

    .recipient-name {
      text-transform: uppercase;
      font-size: 32px;
      font-weight: bold;
      color: #1a73e8;
      margin: 20px 0;
    }

    .certificate-body {
      font-size: 18px;
      color: #333;
      line-height: 1.6;
      margin-top: 20px;
    }

    .footer {
      display: flex;
      justify-content: space-between;
      margin-top: 60px;
      font-size: 16px;
      font-weight: bold;
    }

    #nameInput {
      text-transform: uppercase;
      border: none;
      border-bottom: 2px solid #1a73e8;
      font-size: 24px;
      text-align: center;
      font-weight: bold;
      color: #1a73e8;
      width: 60%;
      margin: 10px auto;
      display: block;
    }

    #pdf {
      display: block;
      margin: 20px auto;
    }

    @media print {

      #nameInput,
      #pdf {
        display: none !important;
      }
    }

    .logo-circle {
      width: 110px;
      height: 110px;
      background: linear-gradient(to right, #28a745, #1e7e34);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 36px;
      font-weight: bold;
      margin: 0 auto 20px;
    }
  </style>
</head>

<body>

  <button class="btn btn-success" id="pdf" onclick="downloadPDF()" disabled>Download PDF</button>

  <div class="certificate text-center" id="certificate">
    <div class="logo-circle">OES</div>

    <h1 style="color:green;">Certificate of Achievement</h1>
    <h3 style="color:green;">Presented by Online Examination System</h3>

    <p>This is to proudly certify that</p>

    <div class="recipient-name" id="nameDisplay">______________</div>
    <input type="text" id="nameInput" placeholder="Enter your full name" oninput="updateName()" />

    <div class="certificate-body">
      has successfully completed the course on <strong><?= htmlspecialchars($subject) ?></strong><br />
      demonstrating exceptional knowledge and commitment.
    </div>

    <div class="footer">
      <div>Authorized by:<br>OES Management</div>
      <div>Issued on:<br><?= $date ?></div>
    </div>
  </div>

  <script>
    function updateName() {
      const input = document.getElementById('nameInput');
      const display = document.getElementById('nameDisplay');
      const btn = document.getElementById('pdf');
      display.textContent = input.value.trim() || "______________";
      btn.disabled = input.value.trim() === "";
    }

    function downloadPDF() {
      const input = document.getElementById('nameInput');
      if (input.value.trim() === "") {
        alert("Please enter your name.");
        return;
      }
      input.style.display = "none";

      html2pdf()
        .set({
          margin: 0.5,
          filename: 'certificate.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 4 },
          jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        })
        .from(document.getElementById("certificate"))
        .save()
        .then(() => {
          input.style.display = "block";
        });
    }
  </script>

</body>

</html>