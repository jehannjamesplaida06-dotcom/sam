<?php
session_start();

$qIndex = $_POST['qIndex'];
$answer = $_POST['answer'] ?? null;
$action = $_POST['action'];

// Save answer
if ($answer !== null) {
    $_SESSION['answers'][$qIndex] = $answer;
}

// Next / Back navigation
if ($action == "next" && $_SESSION['currentQ'] < count($_SESSION['quizSet'])-1) {
    $_SESSION['currentQ']++;
} elseif ($action == "back" && $_SESSION['currentQ'] > 0) {
    $_SESSION['currentQ']--;
} elseif ($action == "finish") {
    header("Location: result.php");
    exit;
}

header("Location: quiz.php?subject=Math"); // keep subject static or pass dynamically
exit;
