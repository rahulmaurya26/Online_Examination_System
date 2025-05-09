<?php
session_start();
if (isset($_SESSION['name'])) {
    header("Location: subjectchoose.php");
    exit();
}

if (isset($_SESSION['admin_id'])) {
    header("Location:admin_dashboard.php");
    exit();
}
?>
<?php
include 'db_connection.php';

$sql = "SELECT AVG(rating) AS average_rating FROM feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avg_rating = round($row['average_rating'], 1);
} else {
    $avg_rating = 0;
}
?>
<?php
include 'db_connection.php';

$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$user_result = $conn->query($sql_users);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $total_users = $user_row['total_users'];
} else {
    $total_users = 0;
}
?>
<?php
include 'db_connection.php';

$sql_user = "SELECT COUNT(*) AS total_users FROM quiz_results";
$quiz_result = $conn->query($sql_user);

if ($quiz_result->num_rows > 0) {
    $quiz_row = $quiz_result->fetch_assoc();
    $total_quiz = $quiz_row['total_users'];
} else {
    $total_users = 0;
}
?>
<?php
include 'db_connection.php';

$sql_above_80 = "SELECT COUNT(*) AS above_80 FROM quiz_results WHERE percentage > 80";
$above_80_result = $conn->query($sql_above_80);

if ($above_80_result->num_rows > 0) {
    $row_above_80 = $above_80_result->fetch_assoc();
    $above_80_users = $row_above_80['above_80'];
} else {
    $above_80_users = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Examination System</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png">


    <!-- External Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 70px;
            background-color: #f4f6f8;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .container-image img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #009688;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 60px;
        }

        .forgot-password {
            font-size: 0.9rem;
        }

        .captcha {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 4px;
            color: #333;
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
        }

        .hero {
            background: linear-gradient(rgba(44, 43, 43, 0.6), rgba(105, 104, 104, 0.7)), url('https://thinkexam.com/blog/wp-content/uploads/2020/01/scope-of-online-examination-system-in-india.png') center/cover no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: yellow;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease-in-out;
        }

        .stats {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .testimonial-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
        }

        .rating-card {
            background: rgb(84, 82, 82);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
        }

        .rating-card:hover {
            transform: scale(1.05);
        }

        .stars {
            font-size: 36px;
            color: gold;
            letter-spacing: 5px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #009688;">
        <a class="navbar-brand animate__animated animate__fadeInDown" href="#">ONLINE EXAMINATION SYSTEM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#" onclick="toggleView('home')">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="toggleView('login')">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="toggleView('registration')">Registration</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="toggleView('about')">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="toggleView('help')">Help Us</a></li>
            </ul>
        </div>
    </nav>

    <!-- Views -->
    <div class="container">
        <!-- Home -->
        <div id="homeView" class="content-section active">
            <section class="hero" id="home">
                <h1 class="display-6 fw-bold" data-aos="fade-down">Welcome to <br><span id="typing-text"></span></h1>
                <p class="lead mt-3" data-aos="fade-up" data-aos-delay="300">Master your skills and test your knowledge
                    with ease.</p>
                <a href="#" class="btn btn-primary btn-lg mt-4" data-aos="zoom-in" data-aos-delay="500"
                    onclick="toggleView('login')">Get
                    Started</a>
            </section>

            <!-- Features Section -->
            <section class="py-5" id="features">
                <div class="container">
                    <h2 class="text-center mb-5" data-aos="fade-up">Our Features</h2>
                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-right">
                            <div class="card feature-card p-4 text-center">
                                <div class="mb-3"><i class="bi bi-pencil-square fs-1 text-primary"></i></div>
                                <h5>Attempt Quizzes</h5>
                                <p>Choose from multiple subjects and sharpen your skills with real-time quizzes.</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="card feature-card p-4 text-center">
                                <div class="mb-3"><i class="bi bi-bar-chart-line fs-1 text-success"></i></div>
                                <h5>Analyze Progress</h5>
                                <p>Track your scores, attempt history and improve your weak areas.</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-left">
                            <div class="card feature-card p-4 text-center">
                                <div class="mb-3"><i class="bi bi-award fs-1 text-warning"></i></div>
                                <h5>Get Certified</h5>
                                <p>Earn achievement certificates after completing quizzes successfully.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Statistics Section -->
            <section class="stats text-center py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-right">
                            <h2 class="text-primary"><?= $total_users ?></h2>
                            <p>Registered Students</p>
                        </div>
                        <div class="col-md-4" data-aos="fade-up">
                            <h2 class="text-success"><?= $total_quiz ?></h2>
                            <p>Quizzes Attempted</p>
                        </div>
                        <div class="col-md-4" data-aos="fade-left">
                            <h2 class="text-warning"><?= $above_80_users ?></h2>
                            <p>Certificates Awarded</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section class="py-5" id="about">
                <div class="container">
                    <h2 class="text-center mb-4" data-aos="fade-up">About Us</h2>
                    <p class="lead text-center" data-aos="fade-up" data-aos-delay="200">
                        We are committed to providing the best platform for students to test their knowledge across
                        multiple
                        subjects. Our system is designed to be easy, fast, and rewarding for learners everywhere.
                    </p>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="py-5 bg-light">
                <div class="container">
                    <h2 class="text-center mb-5" data-aos="fade-up">What Students Say</h2>
                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-right">
                            <div class="testimonial-card p-4 text-center">
                                <p>"Best platform to practice and earn certificates!"</p>
                                <h6 class="mt-3">- Rahul M.</h6>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="testimonial-card p-4 text-center">
                                <p>"User-friendly and very helpful for exam preparation."</p>
                                <h6 class="mt-3">- Priya S.</h6>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-left">
                            <div class="testimonial-card p-4 text-center">
                                <p>"Loved the instant feedback and detailed results!"</p>
                                <h6 class="mt-3">- Aman G.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Student Feedbacks Section -->
            <section class="py-5 bg-white text-center">
                <div data-aos="zoom-in" data-aos-delay="200">
                    <div class="rating-card">
                        <!-- <h4 class="mb-3 text-dark">Average Rating</h4> -->
                        <div class="stars mb-2">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= round($avg_rating) ? "★" : "☆";
                            }
                            ?>
                        </div>
                        <p class="text-muted">Rated <?= $avg_rating ?> out of 5</p>
                    </div>
                </div>
            </section>

        </div>

        <!-- Login -->
        <div id="loginView" class="content-section mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-section" id="user_id">
                        <form id="uform_id">
                            <div class="btn-group w-100 mb-4">
                                <button type="button" class="btn btn-primary" disabled>USER</button>
                                <button type="button" class="btn btn-outline-secondary" id="first_form">ADMIN</button>
                            </div>

                            <h3 class="text-center text-primary mb-4">User Login</h3>

                            <div class="form-group">
                                <label>Username OR Email</label>
                                <input type="text" name="user_name" class="form-control"
                                    placeholder="Enter your username or email address" required />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password" required />
                            </div>

                            <div class="form-group form-check d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                </div>
                                <a href="otpsendgmail.html" target="_blank" class="text-danger forgot-password">Forgot
                                    Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" id="login">Login</button>

                            <div class="text-center mt-3">
                                <p>Don't have an account? <a href="#" onclick="toggleView('registration')">Register</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="form-section" id="admin_id" style="display: none;">
                        <form id="aform_id">
                            <div class="btn-group w-100 mb-4">
                                <button type="button" class="btn btn-outline-secondary" id="second_form">USER</button>
                                <button type="button" class="btn btn-primary" disabled>ADMIN</button>
                            </div>

                            <h3 class="text-center text-primary mb-4">Admin Login</h3>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Enter your username" required />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password" required />
                            </div>

                            <div class="form-group form-check d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="adminRememberMe">
                                    <label class="form-check-label" for="adminRememberMe">Remember Me</label>
                                </div>
                                <a href="otpsendgmail.html" class="text-danger forgot-password" target="_blank">Forgot
                                    Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" id="adminid">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div id="registrationView" class="content-section mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-section">
                        <h3 class="text-center text-success mb-4">Registration Form</h3>
                        <form id="registrationForm">
                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input type="text" class="form-control" id="user_name" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password (min 8 characters)</label>
                                <input type="password" class="form-control" id="password" name="password" minlength="8"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="repassword">Re-type Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword"
                                    minlength="8" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                <input type="text" class="form-control" id="phone" name="phone_number" maxlength="10"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <p class="captcha" id="captcha-text"></p>
                                <button type="button" class="btn btn-sm btn-outline-secondary mb-2"
                                    onclick="generateCaptcha()">Refresh</button>
                                <input type="text" class="form-control" id="captcha-input" placeholder="Enter CAPTCHA"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-success btn-block" onclick="return validateCaptcha()"
                                id="send_otp">Submit</button>
                            <p class="success-msg" id="otpMsg"></p>
                            <p class="error-msg" id="otpErr"></p>
                        </form>


                        <form id="otpForm" style="display: none;">
                            <input type="text" name="otp" placeholder="Enter OTP" id="otp_input" required>
                            <button type="submit" onclick="verifyOTP(event)" class="btn-primary">Verify OTP</button>
                            <p class="success-msg" id="verifyMsg"></p>
                            <p class="error-msg" id="verifyErr"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- About -->
        <div id="aboutView" class="content-section">
            <div class="container mt-5">
                <h1 class="text-center">About Us</h1>
                <p class="mt-4">
                    Welcome to the Online Examination System! We provide a seamless and secure platform for conducting
                    online exams. Our system ensures integrity, efficiency, and ease of access for students and
                    institutions.
                </p>
                <p>Key Features:</p>
                <ul>
                    <li>Secure online examination process</li>
                    <li>AI-based question generation</li>
                    <li>Real-time monitoring</li>
                    <li>Instant results and analytics</li>
                    <li>Get Certificate</li>
                </ul>
            </div>
        </div>
        <div id="helpView" class="content-section">
            <div class="container my-5">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top-4">
                        <h3>Help & Frequently Asked Questions</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="accordion" id="helpAccordion">

                            <!-- Question 1 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne">
                                        What is the Online Examination System?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        It is a web-based platform where students can register, take quizzes, view
                                        results,
                                        write notes, and ask AI chatbot questions related to their subjects.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo">
                                        How do I register and log in?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Go to the Register page, enter your email or roll number, verify with OTP, and
                                        set a
                                        password. Once done, you can log in anytime using your credentials.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree">
                                        How does the quiz system work?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Select a subject, start the quiz, and answer multiple-choice questions within
                                        the given
                                        time. After submitting, you will see your score and correct answers.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour">
                                        How can I take notes?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        After login, go to "My Notes", select your subject, and write your notes. You
                                        can update
                                        them anytime. All notes are saved to your account.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 5 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive">
                                        What is the use of the chatbot?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        The AI chatbot helps you with your subject-related queries, explanations of
                                        answers, and
                                        can also guide you through the system usage.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 6 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix">
                                        Can I download my quiz result?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Yes! After completing the quiz, you will get an option to download your result
                                        as a PDF file including your score, percentage, and answer summary.
                                    </div>
                                </div>
                            </div>
                            <!-- Question 6 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingeEleven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEleven">
                                        Can I get a certificate after the quiz?
                                    </button>
                                </h2>
                                <div id="collapseEleven" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Yes! If you score more than 80% in any subject, you will unlock the certificate
                                        feature.
                                        You can then enter your name and download a beautifully designed certificate as
                                        a PDF.
                                    </div>
                                </div>
                            </div>


                            <!-- Question 7 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven">
                                        How do I update my profile or upload an image?
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        After logging in, go to your profile page. Click on the "Update Profile" button
                                        or image icon to upload a new photo and change your information.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 8 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight">
                                        How can I give feedback or suggestions?
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Go to the Feedback section in your dashboard. You can rate the system and submit
                                        your suggestions. The admin can view all feedbacks.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 9 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine">
                                        What does the admin dashboard include?
                                    </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        The admin dashboard includes modules to manage users, manage exams, view quiz
                                        results dynamically, and read feedback submitted by students.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 10 -->
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header" id="headingTen">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTen">
                                        How are the quiz questions managed?
                                    </button>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse"
                                    data-bs-parent="#helpAccordion">
                                    <div class="accordion-body">
                                        Each subject has its own JavaScript file where quiz questions are stored. Admin
                                        can dynamically update these questions through the admin panel.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p class="mb-1">© 2025 Online Examination System</p>
        <p>Email: onlineexaminationsystem26@gmail.com</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        AOS.init();
        var typed = new Typed("#typing-text", {
            strings: ["Online Examination System", "Your Learning Partner", "Achieve Excellence"],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });
    </script>
</body>
<script src="script.js"></script>

</html>