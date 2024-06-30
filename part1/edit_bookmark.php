<?php
// part1/edit_bookmark.php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$bookmark_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $url = $_POST['url'];

    // Validate URL
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $sql = "UPDATE bookmarks SET title = :title, url = :url WHERE bookmark_id = :bookmark_id";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute(['title' => $title, 'url' => $url, 'bookmark_id' => $bookmark_id])) {
            header("Location: bookmarks.php");
            exit();
        } else {
            echo "Error updating bookmark.";
        }
    } else {
        echo "Invalid URL.";
    }
} else {
    // Fetch bookmark data
    $sql = "SELECT * FROM bookmarks WHERE bookmark_id = :bookmark_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['bookmark_id' => $bookmark_id]);
    $bookmark = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bookmark</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1>Sages Bookmarking</h1>
    </div>

    <div class="form-container">
        <h2>Edit Bookmark</h2>
        <form id="editForm" action="edit_bookmark.php?id=<?php echo $bookmark_id; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($bookmark['title']); ?>" required>
            <label for="url">URL:</label>
            <input type="url" id="url" name="url" value="<?php echo htmlspecialchars($bookmark['url']); ?>" required>
            <button type="submit">Update Bookmark</button>
        </form>
    </div>
    <script src="../shared/scripts.js"></script>
</body>
</html>
