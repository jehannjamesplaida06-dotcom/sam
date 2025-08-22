<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['subject'] = $_POST['subject'] ?? 'Math';
    $_SESSION['difficulty'] = $_POST['difficulty'] ?? 'easy';
    header("Location: quiz.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Game - Choose</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .choose-box {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            text-align: center;
        }
        h2 { color: #764ba2; }
        select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background: #667eea;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover { background: #5563c1; }
    </style>
</head>
<body>
    <div class="choose-box">
        <h2>Start Quiz</h2>
        <form method="POST">
            <label>Choose Subject:</label>
            <select name="subject" required>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
            </select>

            <label>Choose Difficulty:</label>
            <select name="difficulty" required>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <button type="submit">Start</button>
        </form>
    </div>
</body>
</html>
