<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    $total_questions = 0;

    foreach ($_POST as $question_id => $option_id) {
        if (strpos($question_id, 'question_') === 0) {
            $question_id = str_replace('question_', '', $question_id);
            $sql = "SELECT is_correct FROM options WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $option_id]);
            $option = $stmt->fetch();
            if ($option['is_correct']) {
                $score++;
            }
            $total_questions++;
        }
    }

    $percentage = ($score / $total_questions) * 100;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1>Quiz Results</h1>
    </div>

    <div class="content">
        <h2>Your Score</h2>
        <p><?php echo "You scored $score out of $total_questions."; ?></p>
        <p><?php echo "Your percentage: " . number_format($percentage, 2) . "%"; ?></p>
        <a href="courses.php" class="button">Back to Courses</a>
    </div>
</body>
</html>
