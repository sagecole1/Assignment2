<?php
// part1/index.php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: bookmarks.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
