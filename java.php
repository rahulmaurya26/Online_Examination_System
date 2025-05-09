<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Java Tutorial</title>
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
      overflow-x: auto;
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
      <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
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
          <button class="btn btn-light btn-toggle" onclick="showSection('datatypes', this)">Data Types</button>
          <button class="btn btn-light btn-toggle" onclick="showSection('inputoutput', this)">Input/Output</button>
          <button class="btn btn-light btn-toggle" onclick="showSection('ifelse', this)">If Else</button>
          <button class="btn btn-light btn-toggle" onclick="showSection('loops', this)">Loops</button>
          <button class="btn btn-light btn-toggle" onclick="showSection('functions', this)">Methods</button>
          <button class="btn btn-light btn-toggle" onclick="showSection('oop', this)">OOP Concepts</button>
        </div>
      </div>

      <!-- Main content -->
      <div class="col-md-9 col-lg-10 p-4">
        <div id="intro" class="content-section active">
          <h1>Java Tutorial</h1>
          <div class="bg-success text-white p-4 my-3 rounded">
            <h3>Learn Java Language</h3>
            <p>
              Java is a popular, high-level, object-oriented programming language developed by Sun Microsystems. It's platform-independent, secure, and widely used in web applications, mobile apps, and enterprise systems.
            </p>
          </div>
          <h4>Example:</h4>
          <pre>
public class HelloWorld {
    public static void main(String[] args) {
        System.out.println("Hello, Java!");
    }
}</pre>
        </div>

        <div id="syntax" class="content-section">
          <h2>Java Syntax</h2>
          <p>Java syntax includes class definitions, method declarations, and statements.</p>
          <pre>
public class MyClass {
    public static void main(String[] args) {
        System.out.println("This is Java syntax.");
    }
}</pre>
        </div>

        <div id="variables" class="content-section">
          <h2>Variables</h2>
          <p>Variables store data to be used later.</p>
          <pre>
int age = 30;
double salary = 55000.75;
String name = "Rahul";
boolean isJavaFun = true;</pre>
        </div>

        <div id="datatypes" class="content-section">
          <h2>Data Types</h2>
          <p>Java has primitive and non-primitive data types.</p>
          <pre>
byte a = 10;
short b = 5000;
int c = 100000;
long d = 15000000000L;
float e = 5.75f;
double f = 19.99;
char g = 'A';
boolean h = true;</pre>
        </div>

        <div id="inputoutput" class="content-section">
          <h2>Input and Output</h2>
          <p>Use Scanner for input and System.out for output.</p>
          <pre>
import java.util.Scanner;

public class InputExample {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter your name: ");
        String name = scanner.nextLine();
        System.out.println("Hello, " + name);
    }
}</pre>
        </div>

        <div id="ifelse" class="content-section">
          <h2>If Else</h2>
          <p>Conditional logic using if-else statements.</p>
          <pre>
int number = 10;
if(number > 0) {
    System.out.println("Positive number");
} else {
    System.out.println("Negative or zero");
}</pre>
        </div>

        <div id="loops" class="content-section">
          <h2>Loops</h2>
          <p>Java supports for, while, and do-while loops.</p>
          <pre>
for(int i = 0; i < 5; i++) {
    System.out.println("i = " + i);
}</pre>
        </div>

        <div id="functions" class="content-section">
          <h2>Methods</h2>
          <p>Methods are blocks of code to perform a task.</p>
          <pre>
public class Main {
    static int add(int x, int y) {
        return x + y;
    }

    public static void main(String[] args) {
        int result = add(10, 20);
        System.out.println("Sum = " + result);
    }
}</pre>
        </div>

        <div id="oop" class="content-section">
          <h2>OOP Concepts</h2>
          <p>Java is an Object-Oriented Programming language.</p>
          <ul>
            <li><strong>Class</strong>: Template for objects</li>
            <li><strong>Object</strong>: Instance of a class</li>
            <li><strong>Inheritance</strong>: Acquire properties of another class</li>
            <li><strong>Polymorphism</strong>: Many forms of a method</li>
            <li><strong>Encapsulation</strong>: Protect data using access modifiers</li>
          </ul>
          <pre>
class Animal {
    void sound() {
        System.out.println("Animal makes a sound");
    }
}

class Dog extends Animal {
    void sound() {
        System.out.println("Dog barks");
    }
}

public class Main {
    public static void main(String[] args) {
        Animal a = new Dog();
        a.sound();
    }
}</pre>
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
      body.style.backgroundColor = lightMode ? "#212529" : "#dae0e0";
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
