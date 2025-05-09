<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Node.js Tutorial</title>
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
                    <button class="btn btn-light btn-toggle" onclick="showSection('modules', this)">Modules</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('express', this)">Express.js</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('httpserver', this)">HTTP
                        Server</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('filehandling', this)">File
                        Handling</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div id="intro" class="content-section active">
                    <h1>Node.js Tutorial</h1>
                    <div class="bg-success text-white p-4 my-3 rounded">
                        <h3>Learn Node.js</h3>
                        <p>
                            Node.js is a JavaScript runtime built on Chrome's V8 JavaScript engine. It is used for
                            building fast,
                            scalable network applications. Node.js is particularly suited for building real-time
                            applications,
                            web servers, and APIs.
                        </p>
                    </div>
                    <h4>Example:</h4>
                    <pre>
console.log("Hello, Node.js!");
                    </pre>
                </div>

                <div id="syntax" class="content-section">
                    <h2>Node.js Syntax</h2>
                    <p>Node.js follows JavaScript syntax and uses asynchronous, event-driven programming. Below is a
                        simple Node.js example.</p>
                    <pre>
console.log("This is Node.js!");
                    </pre>
                </div>

                <div id="modules" class="content-section">
                    <h2>Node.js Modules</h2>
                    <p>Node.js comes with a set of built-in modules to handle various tasks such as file handling,
                        networking, and more.</p>
                    <h4>Example of Importing a Module:</h4>
                    <pre>
const fs = require('fs');

fs.readFile('example.txt', 'utf8', (err, data) => {
    if (err) {
        console.log(err);
        return;
    }
    console.log(data);
});
                    </pre>
                </div>

                <div id="express" class="content-section">
                    <h2>Express.js Framework</h2>
                    <p>Express is a minimal and flexible Node.js web application framework that provides a robust set of
                        features for building web and mobile applications.</p>
                    <h4>Setting up an Express Server:</h4>
                    <pre>
const express = require('express');
const app = express();

app.get('/', (req, res) => {
    res.send('Hello, Express!');
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
                    </pre>
                </div>

                <div id="httpserver" class="content-section">
                    <h2>Node.js HTTP Server</h2>
                    <p>Node.js can also be used to create an HTTP server to handle client requests and responses.</p>
                    <h4>Basic HTTP Server Example:</h4>
                    <pre>
const http = require('http');

const server = http.createServer((req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end('Hello, HTTP Server!');
});

server.listen(3000, () => {
    console.log('Server running at http://localhost:3000/');
});
                    </pre>
                </div>

                <div id="filehandling" class="content-section">
                    <h2>File Handling in Node.js</h2>
                    <p>Node.js provides a File System (fs) module to interact with the file system, allowing us to read
                        from and write to files.</p>
                    <h4>Reading a File Example:</h4>
                    <pre>
const fs = require('fs');

fs.readFile('example.txt', 'utf8', (err, data) => {
    if (err) {
        console.log(err);
        return;
    }
    console.log(data);
});
                    </pre>

                    <h4>Writing to a File Example:</h4>
                    <pre>
fs.writeFile('output.txt', 'Hello, Node.js!', (err) => {
    if (err) throw err;
    console.log('File has been saved!');
});
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