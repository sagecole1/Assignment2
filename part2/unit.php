<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$unit_id = $_GET['id'];

// Fetch unit details
$sql = "SELECT * FROM units WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $unit_id]);
$unit = $stmt->fetch();

// Fetch lessons
$sql = "SELECT * FROM lessons WHERE unit_id = :unit_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['unit_id' => $unit_id]);
$lessons = $stmt->fetchAll();

// Fetch quizzes
$sql = "SELECT * FROM quizzes WHERE unit_id = :unit_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['unit_id' => $unit_id]);
$quizzes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($unit['title']); ?></title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1><?php echo htmlspecialchars($unit['title']); ?></h1>
    </div>

    <div class="content">
        <h2><?php echo htmlspecialchars($unit['title']); ?></h2>
        <h3>Lessons</h3>
        <ul>
            <?php foreach ($lessons as $lesson): ?>
                <li>
                    <a href="lesson.php?id=<?php echo $lesson['id']; ?>" class="button">
                        <?php echo htmlspecialchars($lesson['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <h3>Quizzes</h3>
        <ul>
            <?php foreach ($quizzes as $quiz): ?>
                <li>
                    <a href="quiz.php?id=<?php echo $quiz['id']; ?>" class="button">
                        <?php echo htmlspecialchars($quiz['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="course.php?id=<?php echo $unit['course_id']; ?>" class="button">Back to Course</a>
    </div>
</body>
</html>
