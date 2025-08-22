<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("⚠️ Invalid access.");
}

$subject = $_POST['subject'] ?? '';
$difficulty = $_POST['difficulty'] ?? '';
$timeConsumed = $_POST['timeConsumed'] ?? 0;

if (!$subject || !$difficulty) {
    die("⚠️ Invalid subject or difficulty.");
}

$answers = $_POST['answers'] ?? [];
$corrects = $_POST['correct'] ?? [];

$score = 0;
$results = [];

foreach ($corrects as $index => $correctAnswer) {
    $userAnswer = $answers[$index] ?? '';
    $isCorrect = ($userAnswer === $correctAnswer);
    if ($isCorrect) $score++;
    $results[] = [
        'questionNum' => $index + 1,
        'yourAnswer' => $userAnswer,
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $isCorrect
    ];
}

$total = count($corrects);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Result - <?= ucfirst($subject) ?> (<?= $difficulty ?>)</title>
     <link rel="icon" href="logo.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff512f, #dd2476);
            color: white;
            padding: 20px;
        }
        .result-container {
            max-width: 900px;
            margin: auto;
            background: rgba(0,0,0,0.6);
            padding: 30px;
            border-radius: 12px;
        }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        .summary {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary strong {
            font-size: 1.2em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255,255,255,0.1);
        }
        th, td {
            border: 1px solid #fff;
            padding: 12px;
            text-align: center;
        }
        th {
            background: rgba(255,255,255,0.2);
        }
        .correct {
            background: #28a745b3; /* semi-transparent green */
        }
        .wrong {
            background: #dc3545b3; /* semi-transparent red */
        }
        .back-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 25px;
            background: #ffc107;
            color: black;
            font-weight: bold;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.2s;
        }
        .back-btn:hover {
            background: #e0a800;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Result for <?= ucfirst($subject) ?> (<?= $difficulty ?>)</h2>
        <div class="summary">
            <p>You scored <strong><?= $score ?></strong> out of <strong><?= $total ?></strong></p>
            <p>Total time consumed: <strong><?= $timeConsumed ?></strong></p>
        </div>

        <table>
            <tr>
                <th>#</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Status</th>
            </tr>
            <?php foreach ($results as $res): ?>
            <tr class="<?= $res['isCorrect'] ? 'correct' : 'wrong' ?>">
                <td><?= $res['questionNum'] ?></td>
                <td><?= htmlspecialchars($res['yourAnswer']) ?></td>
                <td><?= htmlspecialchars($res['correctAnswer']) ?></td>
                <td><?= $res['isCorrect'] ? '✔ Correct' : '✘ Wrong' ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <a href="leaderboard.php" class="back-btn">Go to Leaderboard</a>
    </div>
</body>
</html>
