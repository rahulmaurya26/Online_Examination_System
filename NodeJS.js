const allQuestions =
    [
        {
            "question": "What is Node.js?",
            "options": ["A JavaScript library", "A JavaScript runtime", "A web browser", "A programming language"],
            "answer": "A JavaScript runtime"
        },
        {
            "question": "Who created Node.js?",
            "options": ["Ryan Dahl", "Brendan Eich", "Guido van Rossum", "James Gosling"],
            "answer": "Ryan Dahl"
        },
        {
            "question": "Which engine does Node.js use?",
            "options": ["SpiderMonkey", "Chakra", "V8", "JavaScriptCore"],
            "answer": "V8"
        },
        {
            "question": "Which module is used to create a web server in Node.js?",
            "options": ["fs", "http", "url", "querystring"],
            "answer": "http"
        },
        {
            "question": "Which command is used to install a Node.js package globally?",
            "options": ["npm install <package>", "npm install -g <package>", "npm add <package>", "node install <package>"],
            "answer": "npm install -g <package>"
        },
        {
            "question": "What is the purpose of the package.json file in a Node.js project?",
            "options": ["To define project metadata", "To list dependencies", "To specify scripts", "All of the above"],
            "answer": "All of the above"
        },
        {
            "question": "How can you handle asynchronous operations in Node.js?",
            "options": ["Callbacks", "Promises", "Async/Await", "All of the above"],
            "answer": "All of the above"
        },
        {
            "question": "Which module helps in performing file operations in Node.js?",
            "options": ["fs", "http", "os", "path"],
            "answer": "fs"
        },
        {
            "question": "What is the purpose of the 'os' module in Node.js?",
            "options": ["To interact with the operating system", "To manage HTTP requests", "To handle file uploads", "To create UI components"],
            "answer": "To interact with the operating system"
        },
        {
            "question": "How can you create an HTTP server in Node.js?",
            "options": ["Using the 'http' module", "Using the 'fs' module", "Using the 'os' module", "Using the 'stream' module"],
            "answer": "Using the 'http' module"
        },
        {
            "question": "What does NPM stand for?",
            "options": ["Node Package Manager", "Node Program Module", "Node Project Management", "New Package Manager"],
            "answer": "Node Package Manager"
        },
        {
            "question": "What is the purpose of the 'path' module?",
            "options": ["To handle file paths", "To manage HTTP requests", "To interact with the OS", "To create web servers"],
            "answer": "To handle file paths"
        },
        {
            "question": "What is a callback function in Node.js?",
            "options": ["A function passed as an argument to another function", "A function that returns a value", "A function that handles errors", "A function that creates a server"],
            "answer": "A function passed as an argument to another function"
        },
        {
            "question": "What is the purpose of 'require()' in Node.js?",
            "options": ["To include modules", "To define variables", "To create functions", "To handle errors"],
            "answer": "To include modules"
        },
        {
            "question": "What is the event loop in Node.js?",
            "options": ["A mechanism for handling asynchronous operations", "A loop for creating web servers", "A loop for file operations", "A loop for managing variables"],
            "answer": "A mechanism for handling asynchronous operations"
        },
        {
            "question": "What is the purpose of 'module.exports'?",
            "options": ["To export functions and variables from a module", "To import modules", "To create variables", "To handle errors"],
            "answer": "To export functions and variables from a module"
        },
        {
            "question": "What is the purpose of 'process' object in Node.js?",
            "options": ["Provides information about the current Node.js process", "Manages file operations", "Creates web servers", "Handles HTTP requests"],
            "answer": "Provides information about the current Node.js process"
        },
        {
            "question": "What is the purpose of 'Buffer' class in Node.js?",
            "options": ["To handle binary data", "To manage text data", "To handle HTTP requests", "To create web servers"],
            "answer": "To handle binary data"
        },
        {
            "question": "What is the purpose of 'stream' module in Node.js?",
            "options": ["To handle streaming data", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To handle streaming data"
        },
        {
            "question": "What is middleware in Express.js?",
            "options": ["Functions that have access to the request object, the response object, and the next middleware function in the application's request-response cycle", "Functions that create web servers", "Functions that handle file operations", "Functions that manage variables"],
            "answer": "Functions that have access to the request object, the response object, and the next middleware function in the application's request-response cycle"
        },
        {
            "question": "What is the purpose of Express.js?",
            "options": ["To create web applications and APIs", "To handle file operations", "To manage variables", "To create operating systems"],
            "answer": "To create web applications and APIs"
        },
        {
            "question": "What is a RESTful API?",
            "options": ["An architectural style for building web services", "A method for creating web servers", "A method for handling file operations", "A method for managing variables"],
            "answer": "An architectural style for building web services"
        },
        {
            "question": "What is the purpose of 'EventEmitter' in Node.js?",
            "options": ["To handle events and emit events", "To create web servers", "To manage file operations", "To handle HTTP requests"],
            "answer": "To handle events and emit events"
        },
        {
            "question": "What is the purpose of 'cluster' module in Node.js?",
            "options": ["To create child processes for load balancing", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To create child processes for load balancing"
        },
        {
            "question": "What is the purpose of '.gitignore' file?",
            "options": ["To specify files and directories that should be ignored by Git", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To specify files and directories that should be ignored by Git"
        },
        {
            "question": "What is the purpose of 'async/await' in Node.js?",
            "options": ["To handle asynchronous operations in a synchronous style", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To handle asynchronous operations in a synchronous style"
        },
        {
            "question": "What is the purpose of 'promises' in Node.js?",
            "options": ["To handle asynchronous operations", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To handle asynchronous operations"
        },
        {
            "question": "What is the purpose of the 'URL' module?",
            "options": ["To parse and manipulate URLs", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To parse and manipulate URLs"
        },
        {
            "question": "What is the purpose of the 'querystring' module?",
            "options": ["To parse and stringify query strings", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To parse and stringify query strings"
        },
        {
            "question": "What is the purpose of 'child_process' module?",
            "options": ["To create child processes", "To manage file operations", "To create web servers", "To handle HTTP requests"],
            "answer": "To create child processes"
        },
        {
            "question": "What is REPL in Node.js?",
            "options": ["Read-Eval-Print Loop", "Read-Execute-Print Line", "Recursive Eval Print Loop", "Remote Execution Programming Language"],
            "answer": "Read-Eval-Print Loop"
        }
    ];

export default allQuestions;
