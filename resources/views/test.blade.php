<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Laravel Eloquent Practice Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Apply Inter font globally */
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Simple transition for feedback */
        #feedback {
            transition: all 0.3s ease-in-out;
        }
        /* Style for code input */
        #answerInput {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f3f4f6; /* gray-100 */
            border: 1px solid #d1d5db; /* gray-300 */
            padding: 8px 12px;
            border-radius: 0.375rem; /* rounded-md */
            width: 100%;
        }
        /* Basic styling for the message box */
        #messageBox {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #10b981; /* emerald-500 */
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none; /* Hidden by default */
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        #messageBox.show {
            display: block;
            opacity: 1;
        }
        #messageBox.error {
             background-color: #ef4444; /* red-500 */
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-6 sm:p-8 md:p-10 rounded-xl shadow-lg w-full max-w-2xl">
        <h1 class="text-2xl sm:text-3xl font-bold text-center text-indigo-700 mb-6">Advanced Laravel Eloquent Practice</h1>

        <div class="text-right text-lg font-semibold text-gray-600 mb-4">
            Score: <span id="score" class="text-indigo-600">0</span> / <span id="totalQuestions">0</span>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-5">
            <p class="text-sm font-medium text-gray-500 mb-1">Scenario:</p>
            <p id="scenario" class="text-lg text-gray-800 font-medium"></p>
            <p class="text-sm text-gray-500 mt-3">
                (Assume Models: <code class="bg-gray-200 px-1 rounded text-xs">User</code>, <code class="bg-gray-200 px-1 rounded text-xs">Post</code>, <code class="bg-gray-200 px-1 rounded text-xs">Comment</code>, <code class="bg-gray-200 px-1 rounded text-xs">Role</code>. Focus on the Eloquent query chain.)
            </p>
             <p class="text-sm text-gray-500 mt-1">
                (Relationships: User hasMany Post, Post belongsTo User, Post hasMany Comment, Comment belongsTo Post, User belongsToMany Role)
            </p>
        </div>

        <div class="mb-4">
            <label for="answerInput" class="block text-sm font-medium text-gray-700 mb-1">Your Eloquent Query:</label>
            <input type="text" id="answerInput" placeholder="e.g., User::with('posts')->find(1);">
        </div>

        <button id="submitBtn" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
            Check Answer
        </button>

        <div id="feedback" class="mt-5 p-3 rounded-md text-center font-medium min-h-[50px]">
            </div>

        <button id="nextBtn" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-150 ease-in-out mt-3 hidden">
            Next Question
        </button>

         <button id="hintBtn" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 transition duration-150 ease-in-out mt-3">
            Show Hint
        </button>

        <button id="restartBtn" class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-150 ease-in-out mt-3 hidden">
            Restart Game
        </button>
    </div>

    <div id="messageBox">
        <span id="messageText"></span>
    </div>

    <script>
        // --- Game Data ---
        const questions = [
            // Basic Questions (from previous version)
            {
                scenario: "Retrieve all users.",
                answer: "User::all();",
                hint: "Use the static `all()` method on the Model."
            },
            {
                scenario: "Find the user with an ID of 5.",
                answer: "User::find(5);",
                hint: "Use the static `find()` method with the ID."
            },
            {
                scenario: "Retrieve all posts, ordered by creation date (newest first).",
                answer: "Post::orderBy('created_at', 'desc')->get();",
                hint: "Chain `orderBy()` with the column and direction ('desc'), then finish with `get()`."
            },
            {
                scenario: "Find all users who are active (assuming an 'active' column with value 1).",
                answer: "User::where('active', 1)->get();",
                hint: "Use `where()` with the column, operator (implicitly '='), and value. Finish with `get()`."
            },
             {
                scenario: "Find all users whose name is 'Alice'.",
                answer: "User::where('name', 'Alice')->get();",
                hint: "Use `where()` for equality checks on strings. Remember quotes around the string value. Finish with `get()`."
            },
            {
                scenario: "Find the first user named 'Bob'.",
                answer: "User::where('name', 'Bob')->first();",
                hint: "Use `where()` and then chain `first()` instead of `get()` to retrieve only one record."
            },
            {
                scenario: "Retrieve all posts created by user with ID 10 (assuming a 'user_id' column).",
                answer: "Post::where('user_id', 10)->get();",
                hint: "Filter posts using `where()` on the foreign key column. Finish with `get()`."
            },
            {
                scenario: "Get the latest post.",
                answer: "Post::latest()->first();",
                hint: "Use the `latest()` scope (orders by 'created_at' desc) and then `first()`."
            },
            {
                scenario: "Count the total number of active users.",
                answer: "User::where('active', 1)->count();",
                hint: "Filter with `where()` and then use `count()` instead of `get()`."
            },
            {
                scenario: "Find a user by email 'test@example.com'.",
                answer: "User::where('email', 'test@example.com')->first();",
                hint: "Use `where()` for the email column and `first()` as emails are usually unique."
            },
            // --- Advanced Questions ---
            {
                scenario: "Retrieve all users along with their posts (eager loading).",
                answer: "User::with('posts')->get();",
                hint: "Use `with()` passing the relationship name as a string before `get()`."
            },
            {
                scenario: "Retrieve posts created between '2024-01-01' and '2024-12-31'.",
                answer: "Post::whereBetween('created_at', ['2024-01-01', '2024-12-31'])->get();",
                hint: "Use `whereBetween()` with the column name and an array containing the start and end dates/values."
            },
            {
                scenario: "Retrieve all users who have written at least one post.",
                answer: "User::has('posts')->get();",
                hint: "Use `has()` with the relationship name to check for the existence of related models."
            },
             {
                scenario: "Retrieve all users who have written *more than 5* posts.",
                answer: "User::has('posts', '>', 5)->get();",
                hint: "Use `has()` with the relationship name, an operator, and a count."
            },
            {
                scenario: "Retrieve all posts that have at least one comment.",
                answer: "Post::has('comments')->get();",
                hint: "Similar to checking user posts, use `has()` with the 'comments' relationship."
            },
            {
                scenario: "Retrieve all users who have *not* written any posts.",
                answer: "User::doesntHave('posts')->get();",
                hint: "Use `doesntHave()` with the relationship name."
            },
            {
                scenario: "Retrieve posts where the title is either 'First Post' or 'Second Post'.",
                answer: "Post::whereIn('title', ['First Post', 'Second Post'])->get();",
                hint: "Use `whereIn()` with the column name and an array of possible values."
            },
            {
                scenario: "Retrieve all users who have the 'Admin' role (assuming a many-to-many relationship 'roles' and Role model with a 'name' column).",
                answer: "User::whereHas('roles', function ($query) { $query->where('name', 'Admin'); })->get();",
                hint: "Use `whereHas()` with the relationship name and a closure to add constraints to the related model query."
            },
             {
                scenario: "Retrieve all posts that *do not* have any comments containing the word 'spam'.",
                answer: "Post::whereDoesntHave('comments', function ($query) { $query->where('body', 'like', '%spam%'); })->get();",
                hint: "Use `whereDoesntHave()` with a closure to specify conditions on the related comments that should *not* exist."
            },
            {
                scenario: "Retrieve active users, but only if a variable `$isActiveFilter` is true. (Simulate the variable being true).",
                answer: "User::when(true, function ($query) { return $query->where('active', 1); })->get();",
                hint: "Use `when()` with a condition (simulated as `true` here) and a closure containing the conditional query."
            },
            {
                scenario: "Retrieve users created today.",
                answer: "User::whereDate('created_at', today())->get();",
                hint: "Use `whereDate()` with the column and `today()` helper (or a specific date string 'YYYY-MM-DD')."
            },
             {
                scenario: "Retrieve posts along with the count of their comments, ordered by comment count descending.",
                answer: "Post::withCount('comments')->orderBy('comments_count', 'desc')->get();",
                hint: "Use `withCount()` for the relationship, then `orderBy()` the generated `comments_count` column."
            },
             {
                scenario: "Find users with IDs 1, 5, or 10.",
                answer: "User::find([1, 5, 10]);",
                hint: "Pass an array of IDs to the static `find()` method."
            },
            {
                scenario: "Retrieve posts using a local scope 'published' defined on the Post model.",
                answer: "Post::published()->get();",
                hint: "Call the scope method directly as if it were a static method (e.g., `published()` for `scopePublished`)."
            }
            // Add more complex scenarios: nested relationships, polymorphic, more complex closures in whereHas/when, etc.
        ];

        // --- DOM Elements ---
        const scenarioEl = document.getElementById('scenario');
        const answerInput = document.getElementById('answerInput');
        const submitBtn = document.getElementById('submitBtn');
        const feedbackEl = document.getElementById('feedback');
        const scoreEl = document.getElementById('score');
        const totalQuestionsEl = document.getElementById('totalQuestions');
        const nextBtn = document.getElementById('nextBtn');
        const hintBtn = document.getElementById('hintBtn');
        const restartBtn = document.getElementById('restartBtn');
        const messageBox = document.getElementById('messageBox');
        const messageText = document.getElementById('messageText');

        // --- Game State ---
        let currentQuestionIndex = 0;
        let score = 0;
        let gameActive = true;
        let shuffledQuestions = []; // To hold the shuffled questions

        // --- Functions ---

        // Function to shuffle an array (Fisher-Yates algorithm)
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]]; // Swap elements
            }
        }


        // Function to normalize answers
        function normalizeAnswer(answer) {
            if (!answer) return "";
            let normalized = answer.trim();
            // Remove trailing semicolon
            if (normalized.endsWith(';')) {
                normalized = normalized.slice(0, -1);
            }
            // Remove extra spaces around operators, parentheses, commas, etc.
            // Be careful not to remove spaces within strings
            // This regex is more comprehensive
            normalized = normalized.replace(/\s*([:->=,<()\[\]{}])\s*/g, '$1');
            // Special handling for '=>' in closures to keep one space
            normalized = normalized.replace(/=\s*>/g, '=>');
             normalized = normalized.replace(/,\s*'/g, ",'"); // Keep space after comma before string literal
             normalized = normalized.replace(/,\s*"/g, ',"');
             normalized = normalized.replace(/,\s*\[/g, ',['); // Keep space after comma before array
             normalized = normalized.replace(/,\s*\d/g, ', '); // Keep space after comma before number (approx)


            // Remove spaces inside empty parentheses like `get()` or `all()`
             normalized = normalized.replace(/\(\s*\)/g, '()');
             // Remove space after function keyword in closures
             normalized = normalized.replace(/function\s*\(/g, 'function(');
             // Remove space before closure 'use' keyword
             normalized = normalized.replace(/\s*use\s*\(/g, 'use(');


            // Attempt to handle minor variations in closure formatting (basic)
            normalized = normalized.replace(/\$query\s*,\s*\$variable/g, '$query,$variable'); // Example for 'use' variables

            console.log("Normalization Steps:", answer, "->", normalized); // Debugging output

            return normalized;
        }

        // Function to display a message in the message box
        function showMessage(text, isError = false, duration = 3000) {
            messageText.textContent = text;
            messageBox.className = 'show'; // Add 'show' class
             if (isError) {
                messageBox.classList.add('error');
            } else {
                messageBox.classList.remove('error');
            }

            // Hide the message after 'duration' milliseconds
            setTimeout(() => {
                messageBox.classList.remove('show');
            }, duration);
        }


        // Function to load and display the current question
        function loadQuestion() {
            if (currentQuestionIndex < shuffledQuestions.length) {
                // Use shuffled questions array
                const question = shuffledQuestions[currentQuestionIndex];
                scenarioEl.textContent = question.scenario;
                answerInput.value = ''; // Clear previous answer
                feedbackEl.textContent = ''; // Clear feedback
                feedbackEl.className = 'mt-5 p-3 rounded-md text-center font-medium min-h-[50px]'; // Reset feedback style
                answerInput.disabled = false;
                answerInput.focus(); // Focus input field
                submitBtn.disabled = false;
                hintBtn.disabled = false;
                nextBtn.classList.add('hidden'); // Hide next button
                restartBtn.classList.add('hidden'); // Hide restart button
                gameActive = true;
            } else {
                // Game Over
                scenarioEl.textContent = "Game Over! You've completed all questions.";
                answerInput.disabled = true;
                submitBtn.disabled = true;
                hintBtn.disabled = true;
                nextBtn.classList.add('hidden');
                restartBtn.classList.remove('hidden'); // Show restart button
                feedbackEl.textContent = `Final Score: ${score} / ${shuffledQuestions.length}`;
                feedbackEl.className = 'mt-5 p-3 rounded-md text-center font-medium text-blue-700 bg-blue-100';
                gameActive = false;
            }
        }

        // Function to check the user's answer
        function checkAnswer() {
            if (!gameActive) return;

            const userAnswerRaw = answerInput.value;
            // Use shuffled questions array
            const correctAnswerRaw = shuffledQuestions[currentQuestionIndex].answer;

            // Normalize both answers for comparison
            const userAnswerNormalized = normalizeAnswer(userAnswerRaw);
            const correctAnswerNormalized = normalizeAnswer(correctAnswerRaw);

            console.log("User Answer (Raw):", userAnswerRaw);
            console.log("User Answer (Normalized):", userAnswerNormalized);
            console.log("Correct Answer (Raw):", correctAnswerRaw);
            console.log("Correct Answer (Normalized):", correctAnswerNormalized);


            if (userAnswerNormalized === correctAnswerNormalized) {
                feedbackEl.textContent = 'Correct!';
                feedbackEl.className = 'mt-5 p-3 rounded-md text-center font-medium text-green-700 bg-green-100';
                score++;
                scoreEl.textContent = score; // Update score display
                nextBtn.classList.remove('hidden'); // Show next button
                submitBtn.disabled = true; // Disable submit after correct answer
                answerInput.disabled = true;
                 hintBtn.disabled = true;
                 nextBtn.focus(); // Focus next button
            } else {
                feedbackEl.textContent = `Incorrect. Expected: ${correctAnswerRaw}`;
                feedbackEl.className = 'mt-5 p-3 rounded-md text-center font-medium text-red-700 bg-red-100';
                 nextBtn.classList.remove('hidden'); // Show next button even if wrong
                 submitBtn.disabled = true; // Disable submit after incorrect answer
                 answerInput.disabled = true;
                 hintBtn.disabled = true;
                 nextBtn.focus(); // Focus next button
            }
            gameActive = false; // Prevent multiple submissions for the same question
        }

        // Function to show hint
        function showHint() {
             if (currentQuestionIndex < shuffledQuestions.length) {
                 // Use shuffled questions array
                const hint = shuffledQuestions[currentQuestionIndex].hint;
                showMessage(`Hint: ${hint}`, false, 5000); // Show hint for 5 seconds
             }
        }

        // Function to move to the next question
        function nextQuestion() {
            currentQuestionIndex++;
            loadQuestion();
        }

         // Function to start or restart the game
        function startGame() {
            currentQuestionIndex = 0;
            score = 0;
            scoreEl.textContent = score;
            // Shuffle the questions each time the game starts
            shuffledQuestions = [...questions]; // Create a copy
            shuffleArray(shuffledQuestions);
            totalQuestionsEl.textContent = shuffledQuestions.length; // Update total count
            loadQuestion();
        }


        // --- Event Listeners ---
        submitBtn.addEventListener('click', checkAnswer);
        // Allow submitting with Enter key in the input field
        answerInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter' && !submitBtn.disabled) { // Only submit if button is enabled
                event.preventDefault(); // Prevent default form submission behavior
                checkAnswer();
            }
        });
        nextBtn.addEventListener('click', nextQuestion);
        hintBtn.addEventListener('click', showHint);
        restartBtn.addEventListener('click', startGame); // Use startGame for restart


        // --- Initial Load ---
        startGame(); // Start the game initially

    </script>

</body>
</html>
