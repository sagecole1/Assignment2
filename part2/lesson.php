<?php
require 'config/database.php';
require 'eml_parser.php'; // Include the EML parser
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$lesson_id = $_GET['id'];

// Fetch lesson details
$sql = "SELECT * FROM lessons WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $lesson_id]);
$lesson = $stmt->fetch();

// Parse the lesson content from EML to HTML
$lesson_content = parseEML($lesson['content']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($lesson['title']); ?></title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1><?php echo htmlspecialchars($lesson['title']); ?></h1>
    </div>

    <div class="content">
        <h2><?php echo htmlspecialchars($lesson['title']); ?></h2>
        <div class="lesson-content">
            <?php echo $lesson_content; ?>
        </div>
        <a href="unit.php?id=<?php echo $lesson['unit_id']; ?>" class="button">Back to Unit</a>
    </div>
</body>
</html>
