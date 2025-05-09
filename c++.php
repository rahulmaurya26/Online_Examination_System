<?php include 'auth_check.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>C++ Tutorial</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #dae0e0;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        pre {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 0.5rem;
            color: #cb0eaf;
        }

        @media (min-width: 768px) {
            #sidebarMenu {
                position: sticky;
                top: 0;
                height: 100vh;
            }
        }
    </style>
</head>

<body id="body1">
    <nav class="navbar bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="c_programming.php">C</a>
            <a class="navbar-brand" href="c++.php">C++</a>
            <a class="navbar-brand" href="java.php">JAVA</a>
            <a class="navbar-brand" href="python.php">PYTHON</a>
            <a class="navbar-brand" href="nodejs.php">NODEJS</a>
            <a class="navbar-brand" href="reactjs.php">REACTJS</a>
            <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu">
                ☰ Topics
            </button>
            <a class="navbar-brand" href="subjectchoose.php">HOME</a>
            <button class="btn btn-outline-light" ><a class="nav-link" href="logout.php">LOGOUT</a></button>
            <button class="btn btn-outline-light" id="iconid">Theme</button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 collapse d-md-block sidebar p-3 bg-light" id="sidebarMenu">
                <h5 class="text-center">Topics</h5>
                <div id="btnList" class="d-grid gap-1">
                    <button class="btn btn-light btn-toggle" onclick="showSection('intro', this)">Introduction</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('syntax', this)">Syntax</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('variables', this)">Variables</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('datatypes', this)">Data
                        Types</button>
                    <button class="btn btn-light btn-toggle"
                        onclick="showSection('inputoutput', this)">Input/Output</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('ifelse', this)">If Else</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('loops', this)">Loops</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('functions', this)">Functions</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('oop', this)">OOP Concepts</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div id="intro" class="content-section active">
                    <h1>C++ Tutorial</h1>
                    <div class="bg-success text-white p-4 my-3 rounded">
                        <h3>Learn C++ Language</h3>
                        <p>
                            C++ is a high-level, object-oriented programming language developed as an extension of the C
                            language. It
                            supports features like classes, inheritance, polymorphism, and encapsulation, making it
                            suitable for
                            system and application software.
                        </p>
                    </div>
                    <h4>Example:</h4>
                    <pre>
#include &lt;iostream&gt;
using namespace std;

int main() {
    cout &lt;&lt; "Hello, C++!";
    return 0;
}
          </pre>
                </div>

                <div id="syntax" class="content-section">
                    <h2>C++ Syntax</h2>
                    <p>C++ uses similar syntax to C, but introduces object-oriented features.</p>
                    <pre>
#include &lt;iostream&gt;
using namespace std;

int main() {
    cout &lt;&lt; "Welcome to C++";
    return 0;
}</pre>
                </div>

                <div id="variables" class="content-section">
                    <h2>Variables</h2>
                    <p>Variables store data that can be used later in the program.</p>
                    <pre>
int age = 25;
float weight = 67.5;
char grade = 'A';</pre>
                </div>

                <div id="datatypes" class="content-section">
                    <h2>Data Types</h2>
                    <p>Basic data types in C++ include int, float, double, char, and bool.</p>
                    <pre>
int a = 10;
double pi = 3.1415;
bool isReady = true;</pre>
                </div>

                <div id="inputoutput" class="content-section">
                    <h2>Input and Output</h2>
                    <p>C++ uses cin for input and cout for output.</p>
                    <pre>
int age;
cout &lt;&lt; "Enter age: ";
cin &gt;&gt; age;
cout &lt;&lt; "You are " &lt;&lt; age &lt;&lt; " years old.";</pre>
                </div>

                <div id="ifelse" class="content-section">
                    <h2>If Else</h2>
                    <p>Conditional logic is implemented using if, else if, and else.</p>
                    <pre>
int num = 10;
if(num > 0) {
    cout &lt;&lt; "Positive";
} else {
    cout &lt;&lt; "Non-positive";
}</pre>
                </div>

                <div id="loops" class="content-section">
                    <h2>Loops</h2>
                    <p>C++ supports while, do-while, and for loops.</p>
                    <pre>
for(int i = 0; i < 5; i++) {
    cout &lt;&lt; i &lt;&lt; " ";
}</pre>
                </div>

                <div id="functions" class="content-section">
                    <h2>Functions</h2>
                    <p>Functions allow code to be reused and organized.</p>
                    <pre>
int add(int a, int b) {
    return a + b;
}</pre>
                </div>

                <div id="oop" class="content-section">
                    <h2>OOP Concepts</h2>
                    <p>C++ is known for supporting Object-Oriented Programming. Basic concepts include:</p>
                    <ul>
                        <li><strong>Class</strong>: A blueprint for objects</li>
                        <li><strong>Object</strong>: Instance of class</li>
                        <li><strong>Inheritance</strong>: Deriving new classes from existing ones</li>
                        <li><strong>Polymorphism</strong>: Same function behaves differently</li>
                        <li><strong>Encapsulation</strong>: Wrapping data and code together</li>
                    </ul>
                    <pre>
class Person {
    public:
        string name;
        void sayHello() {
            cout &lt;&lt; "Hello " &lt;&lt; name;
        }
};</pre>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const btn = document.getElementById("iconid");
        const body = document.getElementById("body1");
        let lightMode = true;

        btn.addEventListener("click", () => {
            body.style.backgroundColor = lightMode ? "#545353" : "#dae0e0";
            body.style.color = lightMode ? "white" : "black";
            lightMode = !lightMode;
        });

        function showSection(id, clickedBtn) {
            const sections = document.querySelectorAll(".content-section");
            sections.forEach((sec) => sec.classList.remove("active"));
            const active = document.getElementById(id);
            if (active) active.classList.add("active");

            // Reset all button backgrounds
            const buttons = document.querySelectorAll("#btnList .btn-toggle");
            buttons.forEach((btn) => {
                btn.classList.remove("btn-success");
                btn.classList.add("btn-light");
            });

            // Highlight clicked button
            clickedBtn.classList.remove("btn-light");
            clickedBtn.classList.add("btn-success");
        }
    </script>
</body>

</html>