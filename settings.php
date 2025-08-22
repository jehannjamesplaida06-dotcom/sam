<?php
session_start();

$questionsFile = "questions.json";
$questions = json_decode(file_get_contents($questionsFile), true);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $choices = [$_POST['choice1'], $_POST['choice2'], $_POST['choice3'], $_POST['choice4']];
    $answer = $_POST['answer'];

    // Add new question
    $questions[$subject][] = [
        "q" => $question,
        "choices" => $choices,
        "answer" => $answer
    ];

    // Save back to JSON
    file_put_contents($questionsFile, json_encode($questions, JSON_PRETTY_PRINT));

    $message = "✅ Question added successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - Add Question</title>
    <style>
        body { font-family: Arial; background:#222; color:white; text-align:center; }
        .form-box { background:rgba(255,255,255,0.1); padding:20px; border-radius:10px; max-width:500px; margin:auto; }
        input, select { margin:5px; padding:8px; width:90%; }
        button { padding:10px 20px; border:none; border-radius:10px; background:#4caf50; color:white; cursor:pointer; }
        button:hover { background:#45a049; }
        .msg { color:yellow; margin:10px; }
    </style>
</head>
<body>
    <h1>⚙️ Add New Question</h1>
    <?php if (!empty($message)) echo "<p class='msg'>$message</p>"; ?>
    <div class="form-box">
        <form method="post">
            <label>Subject:</label><br>
            <select name="subject" required>
                <?php foreach(array_keys($questions) as $sub): ?>
                    <option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label>Question:</label><br>
            <input type="text" name="question" required><br>

            <label>Choices:</label><br>
            <input type="text" name="choice1" placeholder="Choice 1" required><br>
            <input type="text" name="choice2" placeholder="Choice 2" required><br>
            <input type="text" name="choice3" placeholder="Choice 3" required><br>
            <input type="text" name="choice4" placeholder="Choice 4" required><br>

            <label>Correct Answer:</label><br>
            <input type="text" name="answer" required><br><br>

            <button type="submit">➕ Add Question</button>
        </form>
    </div>
    <br>
    <a href="leaderboard.php" style="color:yellow;">⬅ Back to Menu</a>
</body>
</html>
