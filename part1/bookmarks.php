<?php
// part1/bookmarks.php
require 'config/database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Initialize variables
$bookmarks = [];
$popular_sites = [];

// Fetch user's bookmarks
$sql = "SELECT * FROM bookmarks WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$bookmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch popular sites
$popular_sql = "SELECT * FROM popular_sites ORDER BY popularity DESC LIMIT 10";
$popular_stmt = $pdo->prepare($popular_sql);
$popular_stmt->execute();
$popular_sites = $popular_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookmarks</title>
    <link rel="stylesheet" href="../shared/styles.css">
</head>
<body>
    <div class="cover-page">
        <h1>Sages Bookmarking</h1>
    </div>

    <div class="content">
        <h2>Welcome to Your Bookmarks</h2>
        <a href="logout.php" class="button">Logout</a>
        <hr>

        <h3>Your Bookmarks</h3>
        <ul>
            <?php if (!empty($bookmarks)): ?>
                <?php foreach ($bookmarks as $bookmark): ?>
                    <li>
                        <a href="<?php echo $bookmark['url']; ?>" target="_blank" class="button"><?php echo $bookmark['title']; ?></a>
                        <a href="edit_bookmark.php?id=<?php echo $bookmark['bookmark_id']; ?>" class="button">Edit</a>
                        <a href="delete_bookmark.php?id=<?php echo $bookmark['bookmark_id']; ?>" class="button">Delete</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No bookmarks found.</li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="content">
        <h3>Add a New Bookmark</h3>
        <form id="addForm" action="add_bookmark.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="url">URL:</label>
            <input type="url" id="url" name="url" required>
            <button type="submit">Add Bookmark</button>
        </form>
    </div>

    <div class="content">
        <h3>Popular Sites</h3>
        <ul>
            <?php if (!empty($popular_sites)): ?>
                <?php foreach ($popular_sites as $site): ?>
                    <li>
                        <a href="<?php echo $site['url']; ?>" target="_blank" class="button"><?php echo $site['title']; ?></a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No popular sites found.</li>
            <?php endif; ?>
        </ul>
    </div>

    <script src="../shared/scripts.js"></script>
</body>
</html>
