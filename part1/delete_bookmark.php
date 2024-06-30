<?php
// part1/delete_bookmark.php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$bookmark_id = $_GET['id'];
$sql = "DELETE FROM bookmarks WHERE bookmark_id = :bookmark_id";
$stmt = $pdo->prepare($sql);

if ($stmt->execute(['bookmark_id' => $bookmark_id])) {
    header("Location: bookmarks.php");
    exit();
} else {
    echo "Error deleting bookmark.";
}
?>
