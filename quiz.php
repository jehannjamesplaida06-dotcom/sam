<?php
$subject = $_GET['subject'] ?? null;
$difficulty = $_GET['difficulty'] ?? null;

if (!$subject || !$difficulty) {
    die("⚠️ Invalid access. Please choose a subject and difficulty first.");
}

$jsonFile = strtolower($subject) . ".json"; // e.g. math.json
if (!file_exists($jsonFile)) {
    die("⚠️ Questions file for $subject not found!");
}

$questionsData = json_decode(file_get_contents($jsonFile), true);

if (!isset($questionsData[$difficulty])) {
    die("⚠️ No questions available for $subject - $difficulty.");
}

$questions = $questionsData[$difficulty];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz - <?= ucfirst($subject) ?> (<?= $difficulty ?>)</title>
     <link rel="icon" href="logo.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #2193b0, #6dd5ed);
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: rgba(0,0,0,0.6);
            padding: 20px;
            border-radius: 12px;
        }
        h1 {
            text-align: center;
        }
        .question {
            margin-bottom: 20px;
        }
        .options label {
            display: block;
            margin: 5px 0;
        }
        button {
            background: #ff9800;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #e68900;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= ucfirst($subject) ?> Quiz (<?= $difficulty ?>)</h1>
        <form id="quizForm" action="answer.php" method="post">
            <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">
            <input type="hidden" name="difficulty" value="<?= htmlspecialchars($difficulty) ?>">
            <input type="hidden" id="timeConsumed" name="timeConsumed" value="0">

            <?php foreach ($questions as $index => $q): ?>
                <div class="question">
                    <p><strong>Q<?= $index+1 ?>: <?= htmlspecialchars($q['question']) ?></strong></p>
                    <div class="options">
                        <?php foreach ($q['options'] as $option): ?>
                            <label>
                                <input type="radio" name="answers[<?= $index ?>]" value="<?= htmlspecialchars($option) ?>" required>
                                <?= htmlspecialchars($option) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="correct[<?= $index ?>]" value="<?= htmlspecialchars($q['answer']) ?>">
                </div>
            <?php endforeach; ?>

            <button type="submit">Submit Answers</button>
        </form>
    </div>

    <script>
    let startTime = Date.now();
    document.getElementById("quizForm").addEventListener("submit", function() {
        let endTime = Date.now();
        let totalSeconds = Math.floor((endTime - startTime) / 1000);

        // Convert to minutes and seconds
        let minutes = Math.floor(totalSeconds / 60);
        let seconds = totalSeconds % 60;

        // Format as "X minutes Y seconds" if more than 60 seconds
        let formattedTime = minutes > 0 
            ? minutes + " minute" + (minutes > 1 ? "s " : " ") + seconds + " seconds"
            : seconds + " seconds";

        // Store in hidden field
        document.getElementById("timeConsumed").value = formattedTime;
    });
</script>

</body>
</html>
