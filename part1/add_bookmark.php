<?php
// part1/add_bookmark.php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $url = $_POST['url'];

    // Validate URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $sql = "INSERT INTO bookmarks (user_id, title, url) VALUES (:user_id, :title, :url)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(['user_id' => $user_id, 'title' => $title, 'url' => $url])) {
            header("Location: bookmarks.php");
            exit();
        } else {
            echo "Error adding bookmark.";
        }
    } else {
        echo "Invalid URL.";
    }
}
?>
