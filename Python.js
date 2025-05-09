const allQuestions =
    [{
        "question": "Who is the creator of Python programming language?",
        "options": ["Guido van Rossum", "James Gosling", "Dennis Ritchie", "Bjarne Stroustrup"],
        "answer": "Guido van Rossum"
    },
    {
        "question": "Which of the following is a Python data type?",
        "options": ["int", "char", "float", "string"],
        "answer": "int"
    },
    {
        "question": "What is the correct extension of a Python file?",
        "options": [".py", ".pt", ".python", ".p"],
        "answer": ".py"
    },
    {
        "question": "Which of the following is used to define a block of code in Python?",
        "options": ["Indentation", "Brackets", "Parentheses", "Curly braces"],
        "answer": "Indentation"
    },
    {
        "question": "What is the output of print(2**3)?",
        "options": ["8", "6", "9", "16"],
        "answer": "8"
    },
    {
        "question": "Which Python keyword is used to create a function?",
        "options": ["def", "function", "create", "fun"],
        "answer": "def"
    },
    {
        "question": "Which function is used to find the length of an object in Python?",
        "options": ["len()", "length()", "size()", "count()"],
        "answer": "len()"
    },
    {
        "question": "Which of the following is NOT a valid Python data structure?",
        "options": ["list", "tuple", "array", "set"],
        "answer": "array"
    },
    {
        "question": "How do you create a variable in Python?",
        "options": ["var = 10", "let var = 10", "int var = 10", "variable = 10"],
        "answer": "var = 10"
    },
    {
        "question": "What is the method to add an element to the end of a list?",
        "options": ["add()", "append()", "insert()", "extend()"],
        "answer": "append()"
    },
    {
        "question": "Which of the following is used to handle exceptions in Python?",
        "options": ["try-except", "throw-catch", "exception-handling", "catch-except"],
        "answer": "try-except"
    },
    {
        "question": "Which operator is used to check equality in Python?",
        "options": ["=", "==", "!=", "="],
        "answer": "=="
    },
    {
        "question": "What is the purpose of the 'self' keyword in Python?",
        "options": ["It refers to the instance of the class", "It is used for private variables", "It is used to define static variables", "It is used to create instances of a class"],
        "answer": "It refers to the instance of the class"
    },
    {
        "question": "What does the 'break' statement do in Python?",
        "options": ["Exits the current loop", "Skips the current iteration", "Exits the current function", "Returns from the current loop"],
        "answer": "Exits the current loop"
    },
    {
        "question": "What is a Python lambda function?",
        "options": ["An anonymous function", "A type of list", "A keyword in the 'while' loop", "A function with multiple parameters"],
        "answer": "An anonymous function"
    },
    {
        "question": "Which of the following is NOT a valid Python string operation?",
        "options": ["concatenation", "multiplication", "subtraction", "repetition"],
        "answer": "subtraction"
    },
    {
        "question": "Which of the following Python libraries is used for data analysis?",
        "options": ["NumPy", "Matplotlib", "Pandas", "SciPy"],
        "answer": "Pandas"
    },
    {
        "question": "How do you start a comment in Python?",
        "options": ["//", "#", "/*", "--"],
        "answer": "#"
    },
    {
        "question": "What is the method used to remove an item from a dictionary in Python?",
        "options": ["remove()", "pop()", "delete()", "clear()"],
        "answer": "pop()"
    },
    {
        "question": "What does the 'continue' statement do in Python?",
        "options": ["Skips the current iteration of the loop", "Exits the loop", "Exits the current function", "Returns from the function"],
        "answer": "Skips the current iteration of the loop"
    },
    {
        "question": "What does 'is' keyword in Python check?",
        "options": ["Equality of values", "Identity of objects", "Membership in a list", "Existence of a variable"],
        "answer": "Identity of objects"
    },
    {
        "question": "Which of the following is the correct syntax to import a module in Python?",
        "options": ["import module", "include module", "using module", "import(module)"],
        "answer": "import module"
    },
    {
        "question": "How do you define a class in Python?",
        "options": ["class ClassName:", "def ClassName():", "class ClassName{}", "function ClassName()"],
        "answer": "class ClassName:"
    },
    {
        "question": "Which of the following is NOT a valid Python loop?",
        "options": ["for", "while", "until", "break"],
        "answer": "until"
    },
    {
        "question": "What is the output of the following Python code: 'print(3 + 2 * 4)'?",
        "options": ["14", "11", "7", "20"],
        "answer": "11"
    },
    {
        "question": "Which of the following methods is used to create a new empty list in Python?",
        "options": ["list()", "[]", "new()", "create()"],
        "answer": "[]"
    },
    {
        "question": "What is the result of the following operation: '4 // 2'?",
        "options": ["2", "4", "1", "None"],
        "answer": "2"
    },
    {
        "question": "What does the 'pass' statement do in Python?",
        "options": ["It terminates a function", "It performs a no-operation action", "It throws an exception", "It is used in the for loop"],
        "answer": "It performs a no-operation action"
    },
    {
        "question": "What is the purpose of the 'zip' function in Python?",
        "options": ["Combines two or more iterables", "Zips files into one", "Creates a new dictionary", "Splits iterables into tuples"],
        "answer": "Combines two or more iterables"
    },
    {
        "question": "Which of the following is the correct way to write a Python decorator?",
        "options": ["@decorator", "def decorator()", "decorate@", "function @decorator"],
        "answer": "@decorator"
    },
    {
        "question": "What is the purpose of the 'yield' keyword in Python?",
        "options": ["To stop a function", "To create a generator function", "To return a value", "To throw an exception"],
        "answer": "To create a generator function"
    },
    {
        "question": "Which of the following is NOT a valid Python exception?",
        "options": ["TypeError", "IndexError", "MemoryError", "DivisionZeroError"],
        "answer": "DivisionZeroError"
    },
    {
        "question": "Which of the following is used to create a virtual environment in Python?",
        "options": ["virtualenv", "venv", "env", "python-virtual"],
        "answer": "venv"
    },
    {
        "question": "What is a module in Python?",
        "options": ["A file containing Python code", "A built-in function", "A class", "An instance of a function"],
        "answer": "A file containing Python code"
    },
    {
        "question": "What is the output of 'print('hello' + 3)' in Python?",
        "options": ["hello3", "error", "hello", "None"],
        "answer": "error"
    },
    {
        "question": "Which of the following is used to create a new dictionary in Python?",
        "options": ["{}", "[]", "dict()", "new()"],
        "answer": "{}"
    },
    {
        "question": "How do you declare a global variable in Python?",
        "options": ["global variable", "global x", "x = global", "global"],
        "answer": "global x"
    },
    {
        "question": "Which of the following methods is used to sort a list in Python?",
        "options": ["sort()", "sorted()", "order()", "arrange()"],
        "answer": "sort()"
    },
    {
        "question": "What is the purpose of the 'in' keyword in Python?",
        "options": ["To check membership", "To assign values", "To iterate over a sequence", "To define a function"],
        "answer": "To check membership"
    },
    {
        "question": "What is the purpose of the 'del' keyword in Python?",
        "options": ["To delete a variable", "To delete an object", "To delete a class", "To delete a dictionary key"],
        "answer": "To delete a variable"
    },
    {
        "question": "How do you access the first element of a list 'lst' in Python?",
        "options": ["lst[1]", "lst[0]", "lst(-1)", "lst.first()"],
        "answer": "lst[0]"
    },
    {
        "question": "What is the output of 'print('Python'.lower())'?",
        "options": ["python", "Python", "PYTHON", "Error"],
        "answer": "python"
    },
    {
        "question": "Which of the following is used to define an anonymous function in Python?",
        "options": ["def", "lambda", "function", "func"],
        "answer": "lambda"
    },
    {
        "question": "Which of the following is a mutable data type in Python?",
        "options": ["tuple", "list", "set", "string"],
        "answer": "list"
    },
    {
        "question": "Which of the following Python functions returns the highest value?",
        "options": ["max()", "highest()", "top()", "biggest()"],
        "answer": "max()"
    },
    {
        "question": "Which Python method is used to remove an element from a list?",
        "options": ["remove()", "pop()", "delete()", "clear()"],
        "answer": "pop()"
    },
    {
        "question": "What is the result of '3 == 3' in Python?",
        "options": ["True", "False", "None", "Error"],
        "answer": "True"
    }


    ];

export default allQuestions;
