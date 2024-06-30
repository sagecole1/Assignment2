<?php
require 'config/database.php';
require 'eml_parser.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eml_content = $_POST['eml_content'] ?? '';

    // Validate the EML content
    if (empty($eml_content)) {
        $error = "Please fill out the EML content.";
    } else {
        // Load EML content as XML
        $xml = simplexml_load_string($eml_content);
        if ($xml === false) {
            $error = "Error parsing EML content.";
        } else {
            try {
                $pdo->beginTransaction();

                // Extract course details and insert into courses table
                $course_title = (string)$xml->title;
                $course_description = (string)$xml->description;
                $sql = "INSERT INTO courses (title, description) VALUES (:title, :description)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['title' => $course_title, 'description' => $course_description]);
                $course_id = $pdo->lastInsertId();

                // Insert units, lessons, quizzes, questions, and options
                foreach ($xml->units->unit as $unit) {
                    $unit_title = (string)$unit->title;
                    $sql = "INSERT INTO units (course_id, title) VALUES (:course_id, :title)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['course_id' => $course_id, 'title' => $unit_title]);
                    $unit_id = $pdo->lastInsertId();

                    foreach ($unit->lessons->lesson as $lesson) {
                        $lesson_title = (string)$lesson->title;
                        $lesson_content = parseEML($lesson->content->asXML());
                        $sql = "INSERT INTO lessons (unit_id, title, content) VALUES (:unit_id, :title, :content)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['unit_id' => $unit_id, 'title' => $lesson_title, 'content' => $lesson_content]);
                    }

                    foreach ($unit->quizzes->quiz as $quiz) {
                        $quiz_title = (string)$quiz->title;
                        $sql = "INSERT INTO quizzes (unit_id, title) VALUES (:unit_id, :title)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['unit_id' => $unit_id, 'title' => $quiz_title]);
                        $quiz_id = $pdo->lastInsertId();

                        foreach ($quiz->questions->question as $question) {
                            $question_text = (string)$question->text;
                            $sql = "INSERT INTO questions (quiz_id, text) VALUES (:quiz_id, :text)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(['quiz_id' => $quiz_id, 'text' => $question_text]);
                            $question_id = $pdo->lastInsertId();

                            foreach ($question->options->option as $option) {
                                $option_text = (string)$option;
                                $is_correct = ((string)$option['correct'] === 'true') ? 1 : 0;
                                $sql = "INSERT INTO options (question_id, text, is_correct) VALUES (:question_id, :text, :is_correct)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute(['question_id' => $question_id, 'text' => $option_text, 'is_correct' => $is_correct]);
                            }
                        }
                    }
                }

                $pdo->commit();
                header("Location: courses.php");
                exit();
            } catch (Exception $e) {
                $pdo->rollBack();
                $error = "Error saving course: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1>Create a New Course</h1>
    </div>

    <div class="content">
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="create_course.php" method="post">
            <label for="eml_content">EML Content:</label>
            <textarea id="eml_content" name="eml_content" rows="10" required></textarea>
            <button type="submit">Create Course</button>
        </form>
        <a href="index.php" class="button">Home</a>
    </div>
</body>
</html>
