<?php include 'auth_check.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYTHON Language Quiz</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #e0c3fc, #8ec5fc);
            min-height: 100vh;
        }

        .quiz-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            transition: transform 0.4s ease;
        }

        h1 {
            text-align: center;
            color: #6a1b9a;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .option {
            background: #f2f2f2;
            padding: 15px;
            border-radius: 10px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .option:hover {
            background: #d1c4e9;
        }

        .correct {
            background-color: #4caf50 !important;
            color: white;
        }

        .wrong {
            background-color: #f44336 !important;
            color: white;
        }

        #next-button {
            display: none;
            background: #6a1b9a;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        #next-button:hover {
            background: #7b1fa2;
        }

        .show {
            display: none;
            background: white;
            padding: 25px;
            border-radius: 15px;
            max-width: 600px;
            margin: 20px auto;
            text-align: left;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .show input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            background: #f5f5f5;
            border-radius: 8px;
        }

        #progress {
            height: 8px;
            background: #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        #progress-bar {
            height: 100%;
            background: #6a1b9a;
            width: 0%;
            transition: width 0.4s ease;
        }

        .red-countdown {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <script>
        // Storing PHP session values into localStorage
        localStorage.setItem("username", "<?php echo $name; ?>");
        localStorage.setItem("roll_number", "<?php echo $roll; ?>");
    </script>

    <div class="quiz-container">
        <h1>PYTHON Language Quiz</h1>
        <div style="text-align:center; font-size: 20px; margin-bottom: 10px;">
            Time Left: <span id="countdown">20</span> seconds
        </div>
        <div id="progress-container">
            <div id="question-label">Question 1 of 25</div>
        </div>
        <div id="progress">
            <div id="progress-bar"></div>
        </div>
        <div id="question"></div>
        <div id="options"></div>
        <button id="next-button" onclick="nextQuestion()">Next</button>
    </div>

    <div class="show" id="result-box">
        <h2>Quiz Result</h2>
        <input type="text" id="studentName" readonly>
        <input type="text" id="subjectName" readonly>
        <input type="text" id="totalQuestions" readonly>
        <input type="text" id="attempted" readonly>
        <input type="text" id="correct" readonly>
        <input type="text" id="wrong" readonly>
        <input type="text" id="percentage" readonly>
        <input type="text" id="score" readonly>
    </div>

    <script type="module">
        import allQuestions from './Python.js';

        let questions = getRandomQuestions(allQuestions, 25);
        let currentQuestionIndex = 0;
        let score = 0;
        let attempted = 0;
        let correct = 0;
        let wrong = 0;
        let timeLeft = 20;
        let timer;
        let subjectName = "Python Programming";
        const studentName = localStorage.getItem("username") || "Unknown Student";
        const Roll_Number = localStorage.getItem("roll_number") || "NA";

        function loadQuestion() {
            clearInterval(timer);
            const current = questions[currentQuestionIndex];
            document.getElementById('question').innerHTML = `<strong>Q${currentQuestionIndex + 1}:</strong> ${current.question}`;
            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = '';

            updateProgress();

            [...current.options].sort(() => Math.random() - 0.5).forEach(opt => {
                const div = document.createElement('div');
                div.className = 'option';
                div.textContent = opt;
                div.onclick = () => selectOption(div, opt);
                optionsContainer.appendChild(div);
            });

            document.getElementById('next-button').style.display = 'none';
            startTimer();
        }

        function startTimer() {
            clearInterval(timer);
            timeLeft = 20;

            const countdownElement = document.getElementById("countdown");
            countdownElement.textContent = timeLeft;
            countdownElement.classList.remove('red-countdown');

            timer = setInterval(() => {
                timeLeft--;

                if (timeLeft <= 5 && timeLeft > 0) {
                    countdownElement.classList.add('red-countdown');
                }

                if (timeLeft <= 0) {
                    timeLeft = 0;
                    clearInterval(timer);
                    countdownElement.textContent = "0";

                    document.querySelectorAll('.option').forEach(opt => {
                        opt.style.pointerEvents = 'none';
                        if (opt.textContent === questions[currentQuestionIndex].answer) {
                            opt.classList.add('correct');
                        }
                    });
                    wrong++;
                    document.getElementById('next-button').style.display = 'block';
                } else {
                    countdownElement.textContent = timeLeft;
                }
            }, 1000);
        }

        function getRandomQuestions(all, count = 25) {
            const used = new Set();
            const out = [];
            while (out.length < count && used.size < all.length) {
                const i = Math.floor(Math.random() * all.length);
                if (!used.has(i)) {
                    out.push(all[i]);
                    used.add(i);
                }
            }
            return out;
        }

        function selectOption(el, value) {
            clearInterval(timer);
            const current = questions[currentQuestionIndex];
            attempted++;
            document.querySelectorAll('.option').forEach(opt => opt.style.pointerEvents = 'none');

            if (value === current.answer) {
                correct++;
                score += 10;
                el.classList.add('correct');
            } else {
                wrong++;
                el.classList.add('wrong');
                document.querySelectorAll('.option').forEach(opt => {
                    if (opt.textContent === current.answer) opt.classList.add('correct');
                });
            }
            document.getElementById('next-button').style.display = 'block';
        }

        function nextQuestion() {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) loadQuestion();
            else {
                showResult();
                saveResult();
            }
        }

        function updateProgress() {
            const percent = (currentQuestionIndex / questions.length) * 100;
            document.getElementById('progress-bar').style.width = `${percent}%`;
            document.getElementById('question-label').textContent = `Question ${currentQuestionIndex + 1} of ${questions.length}`;
        }

        function showResult() {
            const percent = (correct / attempted) * 100;
            document.getElementById('studentName').value = `Student Name: ${studentName}`;
            document.getElementById('subjectName').value = `Subject: ${subjectName}`;
            document.getElementById('totalQuestions').value = `Total Questions: ${questions.length}`;
            document.getElementById('attempted').value = `Attempted: ${attempted}`;
            document.getElementById('correct').value = `Correct: ${correct}`;
            document.getElementById('wrong').value = `Wrong: ${wrong}`;
            document.getElementById('percentage').value = `Percentage: ${percent.toFixed(2)}%`;
            document.getElementById('score').value = `Score: ${score}`;
            document.querySelector('.quiz-container').style.display = 'none';
            document.getElementById('result-box').style.display = 'block';
        }

        function saveResult() {
            const percentage = (correct / questions.length) * 100;
            fetch('save_result.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    student_name: studentName,
                    subject_name: subjectName,
                    total_questions: questions.length,
                    attempted,
                    correct,
                    wrong,
                    percentage: percentage.toFixed(2),
                    total_score: score,
                    Roll_Number
                })
            });
        }

        window.nextQuestion = nextQuestion;
        loadQuestion();
    </script>
</body>

</html>
