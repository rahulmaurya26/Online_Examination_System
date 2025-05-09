<?php include 'auth_check.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Python Tutorial</title>
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
                    <h1>Python Tutorial</h1>
                    <div class="bg-success text-white p-4 my-3 rounded">
                        <h3>Learn Python Language</h3>
                        <p>
                            Python is an easy-to-learn, high-level, interpreted programming language. It is widely used
                            for
                            web development, data science, artificial intelligence, automation, and more. Python's
                            simple
                            syntax makes it ideal for beginners.
                        </p>
                    </div>
                    <h4>Example:</h4>
                    <pre>
print("Hello, Python!")
                    </pre>
                </div>

                <div id="syntax" class="content-section">
                    <h2>Python Syntax</h2>
                    <p>Python uses indentation to define code blocks, making it easy to read.</p>
                    <pre>
# This is a comment
x = 5
print(x)
                    </pre>
                </div>

                <div id="variables" class="content-section">
                    <h2>Variables</h2>
                    <p>Variables store values in Python and don't require explicit data type declarations.</p>
                    <pre>
x = 10
name = "John"
is_active = True
                    </pre>
                </div>

                <div id="datatypes" class="content-section">
                    <h2>Data Types</h2>
                    <p>Python supports various data types like int, float, string, and boolean.</p>
                    <pre>
age = 25  # int
height = 5.9  # float
name = "John"  # string
is_active = True  # boolean
                    </pre>
                </div>

                <div id="inputoutput" class="content-section">
                    <h2>Input and Output</h2>
                    <p>Python uses input() to take input and print() to display output.</p>
                    <pre>
name = input("Enter your name: ")
print("Hello, " + name)
                    </pre>
                </div>

                <div id="ifelse" class="content-section">
                    <h2>If Else</h2>
                    <p>Conditional statements in Python are implemented using if, elif, and else.</p>
                    <pre>
x = 10
if x > 0:
    print("Positive")
else:
    print("Non-positive")
                    </pre>
                </div>

                <div id="loops" class="content-section">
                    <h2>Loops</h2>
                    <p>Python supports for and while loops for iteration.</p>
                    <pre>
# For loop
for i in range(5):
    print(i)

# While loop
i = 0
while i < 5:
    print(i)
    i += 1
                    </pre>
                </div>

                <div id="functions" class="content-section">
                    <h2>Functions</h2>
                    <p>Functions in Python allow you to reuse code efficiently.</p>
                    <pre>
def add(a, b):
    return a + b

result = add(3, 5)
print(result)
                    </pre>
                </div>

                <div id="oop" class="content-section">
                    <h2>OOP Concepts</h2>
                    <p>Python supports object-oriented programming with concepts like classes, objects, inheritance, and
                        polymorphism.</p>
                    <pre>
class Person:
    def __init__(self, name, age):
        self.name = name
        self.age = age

    def greet(self):
        print(f"Hello, my name is {self.name} and I am {self.age} years old.")

# Creating an object of the Person class
person = Person("John", 30)
person.greet()
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