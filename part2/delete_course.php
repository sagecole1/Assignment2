<?php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$course_id = $_GET['id'];

// Delete course and its associated data
try {
    // Begin transaction
    $pdo->beginTransaction();

    // Delete options
    $sql = "DELETE FROM options WHERE question_id IN (SELECT id FROM questions WHERE quiz_id IN (SELECT id FROM quizzes WHERE unit_id IN (SELECT id FROM units WHERE course_id = :course_id)))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Delete questions
    $sql = "DELETE FROM questions WHERE quiz_id IN (SELECT id FROM quizzes WHERE unit_id IN (SELECT id FROM units WHERE course_id = :course_id))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Delete quizzes
    $sql = "DELETE FROM quizzes WHERE unit_id IN (SELECT id FROM units WHERE course_id = :course_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Delete lessons
    $sql = "DELETE FROM lessons WHERE unit_id IN (SELECT id FROM units WHERE course_id = :course_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Delete units
    $sql = "DELETE FROM units WHERE course_id = :course_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Delete course
    $sql = "DELETE FROM courses WHERE id = :course_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['course_id' => $course_id]);

    // Commit transaction
    $pdo->commit();
} catch (Exception $e) {
    // Rollback transaction if something goes wrong
    $pdo->rollBack();
    echo "Failed to delete course: " . $e->getMessage();
    exit();
}

header("Location: courses.php");
exit();
?>
