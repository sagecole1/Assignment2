<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$quiz_id = $_GET['id'];

// Fetch quiz details
$sql = "SELECT * FROM quizzes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $quiz_id]);
$quiz = $stmt->fetch();

// Fetch quiz questions
$sql = "SELECT * FROM questions WHERE quiz_id = :quiz_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['quiz_id' => $quiz_id]);
$questions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($quiz['title']); ?></title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1><?php echo htmlspecialchars($quiz['title']); ?></h1>
    </div>

    <div class="content">
        <h2><?php echo htmlspecialchars($quiz['title']); ?></h2>
        <form action="submit_quiz.php" method="post">
            <?php foreach ($questions as $question): ?>
                <div class="question">
                    <p><?php echo htmlspecialchars($question['text']); ?></p>
                    <?php
                    $sql = "SELECT * FROM options WHERE question_id = :question_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['question_id' => $question['id']]);
                    $options = $stmt->fetchAll();
                    foreach ($options as $option): ?>
                        <label class="option-label">
                            <input type="radio" name="question_<?php echo $question['id']; ?>" value="<?php echo $option['id']; ?>">
                            <span><?php echo htmlspecialchars($option['text']); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit">Submit Quiz</button>
        </form>
        <a href="unit.php?id=<?php echo $quiz['unit_id']; ?>" class="button">Back to Unit</a>
    </div>
</body>
</html>
