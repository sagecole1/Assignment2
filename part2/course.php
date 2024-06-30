<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$course_id = $_GET['id'];

// Fetch course details
$sql = "SELECT * FROM courses WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $course_id]);
$course = $stmt->fetch();

// Fetch units
$sql = "SELECT * FROM units WHERE course_id = :course_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['course_id' => $course_id]);
$units = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?></title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1><?php echo htmlspecialchars($course['title']); ?></h1>
    </div>

    <div class="content">
        <h2><?php echo htmlspecialchars($course['title']); ?></h2>
        <p><?php echo htmlspecialchars($course['description']); ?></p>
        <h3>Units</h3>
        <ul>
            <?php foreach ($units as $unit): ?>
                <li>
                    <a href="unit.php?id=<?php echo $unit['id']; ?>" class="button">
                        <?php echo htmlspecialchars($unit['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="courses.php" class="button">Back to Courses</a>
    </div>
</body>
</html>
