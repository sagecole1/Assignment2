<?php
// part1/config/database.php

$host = 'localhost';
$db = 'bookmarking_service';
$user = 'root'; // Your MySQL username
$pass = ''; // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
