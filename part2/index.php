<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1>Sages Online Learning Management System</h1>
    </div>

    <div class="content">
        <h2>Welcome to the Online Learning Management System</h2>
        <p><a href="profile.php" class="button">View Profile</a></p>
        <p><a href="courses.php" class="button">View Courses</a></p>
        <p><a href="create_course.php" class="button">Create a New Course</a></p> <!-- Link to create course page -->
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>
