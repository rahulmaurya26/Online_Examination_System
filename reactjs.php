<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>React.js Tutorial</title>
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
            <button class="btn btn-outline-light"><a class="nav-link" href="logout.php">LOGOUT</a></button>
            <button class="btn btn-outline-light" id="iconid">Theme</button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 collapse d-md-block sidebar p-3 bg-light" id="sidebarMenu">
                <h5 class="text-center" style="color: black !important;">Topics</h5>
                <div id="btnList" class="d-grid gap-1">
                    <button class="btn btn-light btn-toggle" onclick="showSection('intro', this)">Introduction</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('syntax', this)">Syntax</button>
                    <button class="btn btn-light btn-toggle"
                        onclick="showSection('components', this)">Components</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('jsx', this)">JSX</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('props', this)">Props</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('state', this)">State</button>
                    <button class="btn btn-light btn-toggle" onclick="showSection('hooks', this)">Hooks</button>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div id="intro" class="content-section active">
                    <h1>React.js Tutorial</h1>
                    <div class="bg-success text-white p-4 my-3 rounded">
                        <h3>Learn React.js</h3>
                        <p>
                            React is a JavaScript library for building user interfaces. It allows developers to create
                            large web applications that can change data, without reloading the page. It uses a
                            component-based architecture for creating interactive UIs.
                        </p>
                    </div>
                    <h4>Example:</h4>
                    <pre>
console.log("Hello, React!");
                    </pre>
                </div>

                <div id="syntax" class="content-section">
                    <h2>React.js Syntax</h2>
                    <p>React uses JavaScript syntax along with JSX for writing components. Below is a basic example:</p>
                    <pre>
function Hello() {
    return <h1>Hello, React!</h1>;
}
                    </pre>
                </div>

                <div id="components" class="content-section">
                    <h2>React Components</h2>
                    <p>In React, a component is a reusable, self-contained piece of code that can manage its state and
                        render UI elements. Components can be functional or class-based.</p>
                    <h4>Example of a Functional Component:</h4>
                    <pre>
function MyComponent() {
    return <h1>Hello from MyComponent</h1>;
}
                    </pre>
                    <h4>Example of a Class Component:</h4>
                    <pre>
class MyComponent extends React.Component {
    render() {
        return <h1>Hello from MyComponent</h1>;
    }
}
                    </pre>
                </div>

                <div id="jsx" class="content-section">
                    <h2>JSX (JavaScript XML)</h2>
                    <p>JSX is a syntax extension that allows you to write HTML-like elements in JavaScript. It makes
                        React code easier to write and understand.</p>
                    <h4>JSX Example:</h4>
                    <pre>
function App() {
    return (
        <div>
            <h1>Hello, JSX!</h1>
            <p>This is JSX syntax inside a React component.</p>
        </div>
    );
}
                    </pre>
                </div>

                <div id="props" class="content-section">
                    <h2>Props in React</h2>
                    <p>Props (short for properties) are read-only attributes passed from a parent component to a child
                        component. They allow data to flow from one component to another.</p>
                    <h4>Example of Passing Props:</h4>
                    <pre>
function Welcome(props) {
    return <h1>Hello, {props.name}!</h1>;
}

function App() {
    return <Welcome name="React" />;
}
                    </pre>
                </div>

                <div id="state" class="content-section">
                    <h2>State in React</h2>
                    <p>State is an object that stores a component's dynamic data. When the state changes, React
                        re-renders the component.</p>
                    <h4>Example of Using State:</h4>
                    <pre>
import React, { useState } from 'react';

function Counter() {
    const [count, setCount] = useState(0);

    return (
        <div>
            <p>You clicked {count} times</p>
            <button onClick={() => setCount(count + 1)}>Click me</button>
        </div>
    );
}
                    </pre>
                </div>

                <div id="hooks" class="content-section">
                    <h2>React Hooks</h2>
                    <p>React Hooks are functions that let you use state and other React features in functional
                        components. The most common hooks are useState and useEffect.</p>
                    <h4>useState Hook Example:</h4>
                    <pre>
import React, { useState } from 'react';

function Counter() {
    const [count, setCount] = useState(0);

    return (
        <div>
            <p>You clicked {count} times</p>
            <button onClick={() => setCount(count + 1)}>Click me</button>
        </div>
    );
}
                    </pre>
                    <h4>useEffect Hook Example:</h4>
                    <pre>
import React, { useState, useEffect } from 'react';

function Timer() {
    const [seconds, setSeconds] = useState(0);

    useEffect(() => {
        const interval = setInterval(() => {
            setSeconds(seconds + 1);
        }, 1000);
        
        return () => clearInterval(interval);  // Clean up the interval when component unmounts
    }, [seconds]);

    return <h1>Timer: {seconds} seconds</h1>;
}
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