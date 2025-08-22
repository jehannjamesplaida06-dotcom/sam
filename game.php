<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose Subject - BOARD PRE-QUIZ</title>
    <link rel="icon" href="logo.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: "Segoe UI", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('logo.png') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }
        h1 {
            font-size: 3em;
            color: #ffd700;
            text-shadow: 3px 3px 8px black;
            margin-bottom: 40px;
        }
        .subject-board {
            background: rgba(255,255,255,0.1);
            padding: 20px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.6);
            max-width: 500px;
            text-align: center;
        }
        .btn {
            display: block;
            margin: 15px auto;
            padding: 15px 50px;
            font-size: 1.3em;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background: #ffd700;
            color: black;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
            transition: transform 0.2s, background 0.3s;
        }
        .btn:hover {
            background: #ffcc00;
            transform: scale(1.05);
        }
        .back-btn {
            margin-top: 20px;
            background: #ff4444;
            color: white;
        }
        .back-btn:hover {
            background: #cc0000;
        }
        /* Popup */
        .popup {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.7);
        }
        .popup h2 {
            margin-bottom: 20px;
        }
        .popup button {
            margin: 10px;
            padding: 10px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background: #ffd700;
            font-weight: bold;
        }
        .popup button:hover {
            background: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>🎯 Choose a Subject 🎯</h1>
        <div class="subject-board">
            <button class="btn" onclick="chooseSubject('Math')">📘 Math</button>
            <button class="btn" onclick="chooseSubject('Science')">🔬 Science</button>
            <button class="btn" onclick="chooseSubject('English')">📖 English</button>
            <button class="btn" onclick="chooseSubject('History')">🏺 History</button>
            <button class="btn" onclick="chooseSubject('General Knowledge')">🌍 General</button>
            <button class="btn back-btn" onclick="window.location.href='leaderboard.php'">⬅ Back</button>
        </div>
    </div>

    <!-- Popup -->
    <div class="popup" id="difficultyPopup">
        <div class="popup-content">
            <h2>Choose Difficulty</h2>
            <button onclick="startQuiz('Easy')">Easy</button>
            <button onclick="startQuiz('Medium')">Medium</button>
            <button onclick="startQuiz('Hard')">Hard</button>
        </div>
    </div>

    <script>
        let selectedSubject = "";

        function chooseSubject(subject) {
            selectedSubject = subject;
            document.getElementById('difficultyPopup').style.display = 'flex';
        }

        function startQuiz(difficulty) {
            window.location.href = "quiz.php?subject=" + encodeURIComponent(selectedSubject) + "&difficulty=" + encodeURIComponent(difficulty);
        }
    </script>
</body>
</html>
