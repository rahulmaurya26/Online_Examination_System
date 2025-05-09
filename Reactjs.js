const allQuestions =
    [
        {
            "question": "What is React.js?",
            "options": ["A JavaScript library for building user interfaces", "A server-side scripting language", "A database management system", "A CSS framework"],
            "answer": "A JavaScript library for building user interfaces"
        },
        {
            "question": "Who developed React.js?",
            "options": ["Google", "Microsoft", "Facebook (Meta)", "Amazon"],
            "answer": "Facebook (Meta)"
        },
        {
            "question": "What is JSX in React?",
            "options": ["A syntax extension for JavaScript", "A styling language", "A database query language", "A server-side framework"],
            "answer": "A syntax extension for JavaScript"
        },
        {
            "question": "What are components in React?",
            "options": ["Reusable UI elements", "Data storage units", "Server-side scripts", "Database tables"],
            "answer": "Reusable UI elements"
        },
        {
            "question": "What is the purpose of the 'state' in React?",
            "options": ["To store mutable data that affects the component's rendering", "To store static data", "To manage CSS styles", "To handle server requests"],
            "answer": "To store mutable data that affects the component's rendering"
        },
        {
            "question": "What is the purpose of 'props' in React?",
            "options": ["To pass data from parent to child components", "To store component state", "To manage CSS styles", "To handle server requests"],
            "answer": "To pass data from parent to child components"
        },
        {
            "question": "What is the virtual DOM in React?",
            "options": ["An in-memory representation of the actual DOM", "A physical DOM implementation", "A database for storing DOM elements", "A server-side DOM rendering engine"],
            "answer": "An in-memory representation of the actual DOM"
        },
        {
            "question": "What is the purpose of 'useEffect' hook in React?",
            "options": ["To perform side effects in functional components", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To perform side effects in functional components"
        },
        {
            "question": "What is the purpose of 'useState' hook in React?",
            "options": ["To manage state in functional components", "To perform side effects", "To handle server requests", "To style components"],
            "answer": "To manage state in functional components"
        },
        {
            "question": "What is the purpose of 'React Router'?",
            "options": ["To handle navigation in React applications", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To handle navigation in React applications"
        },
        {
            "question": "What is the purpose of 'keys' in React lists?",
            "options": ["To uniquely identify list items", "To style list items", "To manage list state", "To handle list events"],
            "answer": "To uniquely identify list items"
        },
        {
            "question": "What is the purpose of 'context' in React?",
            "options": ["To share state between components without passing props manually at every level", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To share state between components without passing props manually at every level"
        },
        {
            "question": "What is the purpose of 'refs' in React?",
            "options": ["To access DOM nodes or React elements created in the render method", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To access DOM nodes or React elements created in the render method"
        },
        {
            "question": "What is the purpose of 'componentDidMount' lifecycle method?",
            "options": ["To perform actions after the component is inserted into the DOM", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To perform actions after the component is inserted into the DOM"
        },
        {
            "question": "What is the purpose of 'componentDidUpdate' lifecycle method?",
            "options": ["To perform actions after the component is updated", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To perform actions after the component is updated"
        },
        {
            "question": "What is the purpose of 'componentWillUnmount' lifecycle method?",
            "options": ["To perform cleanup actions before the component is removed from the DOM", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To perform cleanup actions before the component is removed from the DOM"
        },
        {
            "question": "What is the purpose of 'Redux' in React?",
            "options": ["To manage application state in a predictable way", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To manage application state in a predictable way"
        },
        {
            "question": "What is the purpose of 'Hooks' in React?",
            "options": ["To use state and other React features without writing a class", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To use state and other React features without writing a class"
        },
        {
            "question": "What is the purpose of 'React Fragments'?",
            "options": ["To group a list of children without adding extra nodes to the DOM", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To group a list of children without adding extra nodes to the DOM"
        },
        {
            "question": "What is the purpose of 'Higher-Order Components (HOCs)' in React?",
            "options": ["To reuse component logic", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To reuse component logic"
        },
        {
            "question": "What is the purpose of 'React Memo'?",
            "options": ["To memoize functional components", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To memoize functional components"
        },
        {
            "question": "What is the purpose of 'useMemo' hook?",
            "options": ["To memoize expensive calculations", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To memoize expensive calculations"
        },
        {
            "question": "What is the purpose of 'useCallback' hook?",
            "options": ["To memoize callback functions", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To memoize callback functions"
        },
        {
            "question": "What is the purpose of 'forwardRef' in React?",
            "options": ["To pass a ref from a parent component to a child component", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To pass a ref from a parent component to a child component"
        },
        {
            "question": "What is the purpose of 'React.lazy'?",
            "options": ["To lazy load components", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To lazy load components"
        },
        {
            "question": "What is the purpose of 'Suspense' in React?",
            "options": ["To display a fallback UI while lazy-loaded components are loading", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To display a fallback UI while lazy-loaded components are loading"
        },
        {
            "question": "What is the purpose of 'Custom Hooks'?",
            "options": ["To extract component logic into reusable functions", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To extract component logic into reusable functions"
        },
        {
            "question": "What is the purpose of 'React Testing Library'?",
            "options": ["To test React components", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To test React components"
        },
        {
            "question": "What is the purpose of 'React Developer Tools'?",
            "options": ["To debug React applications", "To manage component state", "To handle server requests", "To style components"],
            "answer": "To debug React applications"
        },

    ];

export default allQuestions;
