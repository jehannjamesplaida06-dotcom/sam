<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BOARD PRE-QUIZ Menu</title>
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
            background: url('logo.png') no-repeat center center fixed; /* Replace with your logo */
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
        .menu {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .btn {
            padding: 15px 50px;
            font-size: 1.5em;
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
    </style>
</head>
<body>
    <div class="overlay">
        <h1>🏆 BOARD PRE-QUIZ 🏆</h1>
        <div class="menu">
            <form action="game.php" method="get">
                <button class="btn">Start</button>
            </form>
            <form action="settings.php" method="get">
                <button class="btn">Settings</button>
            </form>
            <form action="index.php" method="get">
                <button class="btn">Exit</button>
            </form>
        </div>
    </div>
</body>
</html>
