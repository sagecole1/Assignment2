<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all courses
$sql = "SELECT * FROM courses";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$courses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../shared/styles.css">
    <script>
        function confirmDelete(courseId) {
            if (confirm("Are you sure you want to delete this course?")) {
                window.location.href = 'delete_course.php?id=' + courseId;
            }
        }
    </script>
</head>
<body>
    <div class="cover-page">
        <h1>Sages Online Learning Management System</h1>
    </div>

    <div class="content">
        <h2>Available Courses</h2>
        <ul>
            <?php foreach ($courses as $course): ?>
                <li>
                    <a href="course.php?id=<?php echo $course['id']; ?>" class="button">
                        <?php echo htmlspecialchars($course['title']); ?>
                    </a>
                    <button class="button" onclick="confirmDelete(<?php echo $course['id']; ?>)">Delete</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
