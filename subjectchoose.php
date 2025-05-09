<?php include 'auth_check.php'; ?>
<?php include 'result.php'; ?>
<?php
include 'db_connection.php';
$name = $_SESSION['name'];

$sql = "SELECT AVG(rating) AS average_rating FROM feedbacks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avg_rating = round($row['average_rating'], 1);
} else {
    $avg_rating = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reading Page</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png">


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- AOS (Animate on Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #000;
            color: white;
        }

        .navbar a {
            color: white;
        }

        .container-section>div {
            background-color: #343a40;
            color: white;
            margin: 15px;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .container-section>div:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .q {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            background: #007bff;
            color: white;
            font-size: 18px;
            border-radius: 5px;
        }

        .q a {
            text-decoration: none;
            color: white;
        }

        #exercise-questions,
        #notetext,
        #feedback,
        #get-cer,
        #ai {
            display: none;
            transition: all 0.3s ease;
        }


        .light-theme .container-section>div {
            background-color: #7a7b7c !important;
            color: black !important;
        }

        .chat-container {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            height: 80vh;
            flex-direction: column;
            position: relative;
        }

        .chat-header {
            background: #0d6efd;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-weight: 500;
            font-size: 1.2rem;
        }


        .chat-box {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            scroll-behavior: smooth;
        }

        .chat-box::-webkit-scrollbar {
            width: 6px;
        }

        .chat-box::-webkit-scrollbar-thumb {
            background-color: #fbf8f8;
            border-radius: 10px;
        }

        .input-area {
            display: flex;
            border-top: 1px solid #ddd;
            padding: 10px;
            background-color: #f8f9fa;
            color: #000;
        }

        .input-area input {
            flex: 1;
            border: none;
            padding: 12px;
            border-radius: 10px;
            margin-right: 10px;
        }

        .input-area input:focus {
            outline: none;
        }

        .input-area button {
            background-color: #0d6efd;
            color: #f8f2f2;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
        }

        .user-msg,
        .bot-msg {
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 10px;
            max-width: 80%;
            word-wrap: break-word;
        }

        .user-msg {
            background-color: #e9f5ff;
            align-self: flex-end;
            text-align: right;
            color: #000;
        }

        .bot-msg {
            background-color: #e0ffe6;
            align-self: flex-start;
            color: #000;
        }

        .icon-btn {
            position: absolute;
            top: 10px;
            right: 80px;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
        }

        .icon-btns {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ea0a0a;
            font-size: 40px;
            cursor: pointer;
        }

        .stars input {
            display: none;
        }

        .stars label {
            font-size: 2rem;
            color: gray;
            cursor: pointer;
            transition: color 0.2s;
        }

        .stars input:checked~label,
        .stars label:hover,
        .stars label:hover~label {
            color: gold;
        }

        .feedback-section {
            max-height: 200px;
            overflow-y: auto;
        }

        .feedback-item {
            border-bottom: 1px solid #dee2e6;
            padding: 0.5rem 0;
        }

        #usern {
            text-transform: uppercase;
            color: #007bff;
        }
    </style>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body id="body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">ONLINE EXAMINATION SYSTEM</a>
        <a class="navbar-brand" href="user_information.php">WELCOME, <span id="usern"><?= $name ?></span>!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <button class="btn btn-outline-light" id="searchBtn">
                        <i class="bi bi-search"></i>
                    </button>
                    <input type="text" class="form-control search-input" id="searchInput" placeholder="Search..."
                        style="width: 0; position: absolute; right: 0; top: 50%; transform: translate(-320px,-20px); transition: width 0.5s ease;">
                </li>
                <li class="nav-item"><a class="nav-link" href="subjectchoose.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="user_information.php">PROFILE</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
                <!-- Theme Toggle Button -->
                <li class="nav-item">
                    <button class="btn btn-sm btn-light ms-2" id="themeToggle">
                        <i class="bi bi-moon-fill"></i> Theme
                    </button>
                </li>

                <!-- Search Icon with Animation -->

            </ul>
        </div>
    </nav>


    <!-- Sections -->
    <div class="container mt-4 container-section">
        <div class="container0" data-aos="flip-up">
            <a href="c_programming.php" style="text-decoration: none; color: white;">
                <h1>C LANGUAGE</h1>
            </a>
        </div>
        <div class="container1" data-aos="flip-up">
            <a href="c++.php" style="text-decoration: none; color: white;">
                <h1>C++ LANGUAGE</h1>

            </a>
        </div>
        <div class="container1" data-aos="flip-up">
            <a href="java.php" style="text-decoration: none; color: white;">
                <h1>JAVA</h1>

            </a>
        </div>
        <div class="container2" data-aos="flip-up">
            <a href="python.php" style="text-decoration: none; color: white;">
                <h1>PYTHON</h1>

            </a>
        </div>
        <div class="container3" data-aos="flip-up">
            <a href="nodejs.php" style="text-decoration: none; color: white;">
                <h1>NODE JS</h1>

            </a>
        </div>
        <div class="container4" data-aos="flip-right">
            <a href="reactjs.php" style="text-decoration: none; color: white;">
                <h1>REACTJS</h1>
            </a>
        </div>
        <div class="container7" data-aos="flip-up" onclick="togglenote()">
            <h1>My Notes</h1>
        </div>
        <div class="container" id="notetext">
            <form id="noteForm">
                <ion-icon name="close-outline" class="icon-btns" onclick="togglenote()"></ion-icon>
                <div class="mb-3">
                    <textarea class="form-control fs-5 p-3" id="textarea" name="texts" rows="15"
                        placeholder="Enter your notes here..." required></textarea>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <button type="submit" class="btn btn-success px-4">Save</button>
                    <button type="button" class="btn btn-primary px-4" id="start">
                        <i class="bi bi-mic-fill me-1"></i>Start
                    </button>
                    <button type="button" class="btn btn-danger px-4" id="clear">Clear</button>
                </div>
            </form>
        </div>

        <div class="container8" data-aos="flip-up" onclick="togglefeed()">
            <h1>FEEDBACK</h1>
            <div class="text-center">
                <h4 class="text-success">Average Rating: <?= $avg_rating ?></h4>
                <div style="font-size: 24px; color: gold;">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo $i <= round($avg_rating) ? "★" : "☆";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="feedbacks" id="feedback" style="display:none;">
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <ion-icon name="close-outline" class="icon-btns" onclick="togglefeed()"></ion-icon>
                <div class="card shadow-lg w-100" style="max-width: 500px;">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Rate Us</h4>
                        <form id="submitfeedback">
                            <div class="stars d-flex justify-content-center mb-3 flex-row-reverse">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5">★</label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4">★</label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3">★</label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2">★</label>
                                <input type="radio" id="star1" name="rating" value="1" required>
                                <label for="star1">★</label>
                            </div>
                            <div class="mb-3">
                                <textarea name="feedback" class="form-control" rows="3" placeholder="Your Feedback"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100" id="submit">Submit Feedback</button>
                        </form>
                        <div class="feedback-section mt-4" id="feedback-list">
                            <h5 class="border-bottom pb-2">Recent Feedbacks</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container11" data-aos="flip-up" onclick="toggleai()">
            <h1>AI CHATBOT</h1>
        </div>

        <div class="ai" id="ai">
            <div class="chat-container d-flex flex-column">
                <div class="chat-header">
                    AI Chatbot
                    <ion-icon name="scan-outline" class="icon-btn"></ion-icon>
                    <ion-icon name="close-outline" class="icon-btns" onclick="toggleai()"></ion-icon>
                </div>
                <div class="chat-box d-flex flex-column" id="chatBox"></div>
                <div class="input-area">
                    <input type="text" id="userInput" placeholder="Type your question..." class="form-control">
                    <button onclick="sendMessage()">Send</button>
                </div>
            </div>
        </div>

        <div class="container11" data-aos="flip-up" onclick="toggleExercise()">
            <h1>EXERCISE</h1>
        </div>
        <div id="exercise-questions" class="text-center mt-3">
            <h1>
                EXERCISE
            </h1>
            <ion-icon name="close-outline" class="icon-btns" onclick="toggleExercise()"></ion-icon>
            <div class="question text-center mt-5" data-aos="zoom-in">
                <button class="q"><a href="c_languagequestion.php" target="_blank">C LANGUAGE</a></button>
                <button class="q"><a href="javaquestion.php" target="_blank">JAVA</a></button>
                <button class="q"><a href="pythonquestion.php" target="_blank">PYTHON</a></button>
                <button class="q"><a href="C++question.php" target="_blank">C++</a></button>
                <button class="q"><a href="reactjsquestion.php" target="_blank">REACTJS</a></button>
                <button class="q"><a href="nodejsquestion.php" target="_blank">NODEJS</a></button>
            </div>
        </div>

        <div class="container10" data-aos="flip-up">
            <a href="result.html" style="text-decoration: none; color: white;" target="_blank">
                <h1>RESULT</h1>
            </a>
        </div>
        <div class="container12" data-aos="flip-up" onclick="togglecer()">
            <h1>GET CERTIFICATE</h1>
        </div>
        <div id="get-cer" class="text-center mt-3">
            <ion-icon name="close-outline" class="icon-btns" onclick="togglecer()"></ion-icon>
            <div class="question text-center mt-5" data-aos="zoom-in">
                <button class="btn btn-secondary q" id="C"><a href="certificate.php?subject=C LANGUAGE"
                        class="text-white text-decoration-none">C
                        LANGUAGE</a></button>
                <button class="btn btn-secondary q" id="JAVA"><a href="certificate.php?subject= JAVA PROGRAMMING"
                        class="text-white text-decoration-none">JAVA</a></button>
                <button class="btn btn-secondary q" id="PYTHON"><a href="certificate.php?subject=PYTHON PROGRAMMING"
                        class="text-white text-decoration-none">PYTHON</a></button>
                <button class="btn btn-secondary q" id="CPP"><a href="certificate.php?subject=C++ PROGRAMMING"
                        class="text-white text-decoration-none">C++</a></button>
                <button class="btn btn-secondary q" id="REACTJS"><a href="certificate.php?subject=REACTJS PROGRAMMING"
                        class="text-white text-decoration-none">REACTJS</a></button>
                <button class="btn btn-secondary q" id="NODEJS"><a href="certificate.php?subject=NODES PROGRAMMING"
                        class="text-white text-decoration-none">NODEJS</a></button>
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
                        <li><a href="result.html" class="text-decoration-none text-light">Result</a></li>
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
                        <a href="instagram.com" class="text-decoration-none text-light"><i
                                class="bi bi-instagram fs-6 me-80" style="font-size:45px"></i></a>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>AOS.init();</script>

    <script>
        // PHP से subject_names भेजना
        const passedSubjects = <?php echo json_encode($_SESSION['subject_names'] ?? []); ?>;

        const subjectMap = {
            'C': 'C Programming',
            'JAVA': 'JAVA Programming',
            'PYTHON': 'Python Programming',
            'CPP': 'C++ Programming',
            'REACTJS': 'ReactJS Programming',
            'NODEJS': 'NodeJS Programming'
        };

        // Disable all buttons initially
        Object.keys(subjectMap).forEach(id => {
            const btn = document.getElementById(id);
            btn.disabled = true;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-secondary');
            btn.title = "Score below 80%, certificate locked";


        });

        // Enable if passedSubjects contains subject
        passedSubjects.forEach(subject => {
            for (let id in subjectMap) {
                if (subjectMap[id].toLowerCase() === subject.toLowerCase()) {
                    const btn = document.getElementById(id);
                    btn.disabled = false;
                    btn.classList.remove('btn-secondary');
                    btn.classList.add('btn-success');
                }
            }
        });

        function togglecer() {
            const div = document.getElementById("get-cer");
            div.style.display = div.style.display === "none" ? "block" : "none";
            document.getElementById("get-cer").classList.toggle("d-none");
        }
    </script>
    <script>
        const searchBtn = document.getElementById('searchBtn');
        const searchInput = document.getElementById('searchInput');
        const containerSection = document.querySelector('.container-section');
        const boxes = document.querySelectorAll('.container-section > div');

        // input initially hidden
        searchInput.style.width = "0";
        searchInput.style.display = "none";

        // Save original display style
        const originalDisplay = {};
        boxes.forEach(box => {
            originalDisplay[box.dataset.aos] = window.getComputedStyle(box).display;
        });

        // Handle search button click
        searchBtn.addEventListener('click', () => {
            if (searchInput.style.display === 'none' || searchInput.style.width === '0px') {
                searchInput.style.display = "block";
                searchBtn.style.display = "none";
                setTimeout(() => {
                    searchInput.style.width = '200px';
                    searchInput.focus();
                }, 10);
            } else {
                searchInput.style.width = '0';
                setTimeout(() => {
                    searchBtn.style.display = "block";
                    searchInput.style.display = "none";
                    searchInput.value = '';
                    showAllBoxes();
                }, 500);
            }
        });

        // Handle blur
        searchInput.addEventListener('blur', () => {
            searchInput.style.width = '0';
            setTimeout(() => {
                searchInput.style.display = "none";
                searchBtn.style.display = "block";
                searchInput.value = '';
                showAllBoxes();
            }, 500);
        });

        // Search input filter
        searchInput.addEventListener('input', () => {
            const filter = searchInput.value.trim().toLowerCase();
            let anyMatch = false;

            boxes.forEach(box => {
                const heading = box.querySelector('h1');

                if (heading && heading.innerText.trim() !== '') {
                    const text = heading.innerText.toLowerCase();
                    if (text.includes(filter)) {
                        box.style.display = originalDisplay[box.dataset.aos] || "block";
                        anyMatch = true;
                    } else {
                        box.style.display = "none";
                    }
                } else {
                    box.style.display = originalDisplay[box.dataset.aos] || "block";
                }
            });
            const existing = document.getElementById('noResult');
            if (existing) existing.remove();

            if (!anyMatch) {
                const noResult = document.createElement('div');
                noResult.id = 'noResult';
                noResult.className = 'text-center text-danger mt-5';
                noResult.innerHTML = '<h3>No Result Found</h3>';
                containerSection.appendChild(noResult);
            }
        });

        function showAllBoxes() {
            boxes.forEach(box => {
                box.style.display = originalDisplay[box.dataset.aos] || "block";
            });
            const existing = document.getElementById('noResult');
            if (existing) existing.remove();
        }
    </script>



</body>
<script src="main.js"></script>

</html>