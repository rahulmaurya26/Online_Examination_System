<?php include 'auth_check.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>C Tutorial</title>
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
                    <button class="btn btn-light btn-toggle" onclick="showSection('pointers', this)">Pointers</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div id="intro" class="content-section active">
                    <h1>C Tutorial</h1>
                    <div class="bg-success text-white p-4 my-3 rounded">
                        <h3>Learn C Language</h3>
                        <p>
                            C is a general-purpose programming language created by Dennis Ritchie at Bell Labs in 1972.
                            It is powerful, efficient, and widely used in system programming, operating systems, and
                            embedded systems.
                        </p>
                    </div>
                    <h4>Example:</h4>
                    <pre>
#include &lt;stdio.h&gt;

int main() {
    printf("Hello, C!\n");
    return 0;
}
                    </pre>
                </div>

                <div id="syntax" class="content-section">
                    <h2>C Syntax</h2>
                    <p>C code structure includes functions, curly braces, and semicolons.</p>
                    <pre>
#include &lt;stdio.h&gt;

int main() {
    printf("This is C syntax.\n");
    return 0;
}
                    </pre>
                </div>

                <div id="variables" class="content-section">
                    <h2>Variables</h2>
                    <p>Variables hold data types and values that can be manipulated during program execution.</p>
                    <pre>
int a = 10;
float b = 3.14;
char c = 'A';
                    </pre>
                </div>

                <div id="datatypes" class="content-section">
                    <h2>Data Types</h2>
                    <p>C includes several data types: int, float, double, char, etc.</p>
                    <pre>
int number = 5;
double pi = 3.14159;
bool flag = 1;  // _Bool in older C standards
                    </pre>
                </div>

                <div id="inputoutput" class="content-section">
                    <h2>Input and Output</h2>
                    <p>Use scanf for input and printf for output.</p>
                    <pre>
int age;
printf("Enter your age: ");
scanf("%d", &age);
printf("You are %d years old", age);
                    </pre>
                </div>

                <div id="ifelse" class="content-section">
                    <h2>If Else</h2>
                    <p>Conditional statements control the program flow.</p>
                    <pre>
int number = 10;
if (number > 0) {
    printf("Positive\n");
} else {
    printf("Non-positive\n");
}
                    </pre>
                </div>

                <div id="loops" class="content-section">
                    <h2>Loops</h2>
                    <p>Loops repeat a block of code multiple times.</p>
                    <pre>
for (int i = 0; i < 5; i++) {
    printf("%d ", i);
}
                    </pre>
                </div>

                <div id="functions" class="content-section">
                    <h2>Functions</h2>
                    <p>Functions break a program into reusable blocks.</p>
                    <pre>
int add(int a, int b) {
    return a + b;
}

int main() {
    printf("Sum: %d", add(5, 3));
    return 0;
}
                    </pre>
                </div>

                <div id="pointers" class="content-section">
                    <h2>Pointers</h2>
                    <p>Pointers store the address of variables and are used for dynamic memory and array handling.</p>
                    <pre>
int a = 10;
int *ptr = &a;
printf("Value of a: %d", *ptr);
                    </pre>
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

            const buttons = document.querySelectorAll("#btnList .btn-toggle");
            buttons.forEach((btn) => {
                btn.classList.remove("btn-success");
                btn.classList.add("btn-light");
            });

            clickedBtn.classList.remove("btn-light");
            clickedBtn.classList.add("btn-success");
        }
    </script>
</body>

</html>