<?php
session_start();
$quizSet = $_SESSION['quizSet'];
$answers = $_SESSION['answers'];
$end_time = time();
$time_used = $end_time - $_SESSION['start_time'];

$score = 0;
foreach ($quizSet as $i => $q) {
    if (isset($answers[$i]) && $answers[$i] == $q['answer']) {
        $score++;
    }
}
$total = count($quizSet);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results - BOARD PRE-QUIZ</title>
    <link rel="icon" href="logo.png" type="image/png">
    <style>
        body { font-family: Arial, sans-serif; background:#111; color:white; padding:20px; }
        .review { background:rgba(255,255,255,0.1); padding:15px; border-radius:10px; margin-bottom:15px; }
        .correct { color:#4caf50; }
        .wrong { color:#f44336; }
    </style>
</head>
<body>
    <h1>🏆 Game Over 🏆</h1>
    <?php if(isset($_GET['timeout'])) echo "<h2>⏰ Time's Up!</h2>"; ?>
    <p>Your Score: <b><?php echo $score; ?>/<?php echo $total; ?></b></p>
    <p>Time Used: <?php echo $time_used; ?> seconds</p>

    <h2>Review Questions:</h2>
    <?php foreach ($quizSet as $i => $q): ?>
        <div class="review">
            <p><b>Q<?php echo $i+1; ?>: <?php echo $q['q']; ?></b></p>
            <p>✅ Correct: <?php echo $q['answer']; ?></p>
            <p>
                <?php if(isset($answers[$i])): ?>
                    Your Answer: 
                    <span class="<?php echo ($answers[$i]==$q['answer']) ? 'correct' : 'wrong'; ?>">
                        <?php echo $answers[$i]; ?>
                    </span>
                <?php else: ?>
                    ❌ Not Answered
                <?php endif; ?>
            </p>
        </div>
    <?php endforeach; ?>
    <br>
    <a href="game.php" style="color:yellow;">Play Again</a>
</body>
</html>
<?php session_destroy(); ?>
