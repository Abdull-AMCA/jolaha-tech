<?php
// Include database connection
include 'includes/database.php';

// Get post slug from query parameter
$post_slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if (empty($post_slug)) {
    echo "<h2>Invalid post slug.</h2>";
    exit;
}

// Fetch post details from database
$stmt = $connection->prepare("SELECT * FROM posts WHERE post_slug = :slug");
$stmt->execute(['slug' => $post_slug]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo "<h2>Post not found.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?> - Post Details</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($post['post_title']); ?></h1>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($post['post_author']); ?></p>
        <p><strong>Date:</strong> <?php echo htmlspecialchars(date('F j, Y', strtotime($post['created_at']))); ?></p>
        <?php if (!empty($post['image'])): ?>
            <img src="../uploads/<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image" style="max-width:100%;height:auto;">
        <?php endif; ?>
        <div class="post-content">
            <?php echo nl2br(htmlspecialchars($post['post_content'])); ?>
        </div>
        <a href="view_all_post.php">Back to All Posts</a>
    </div>
</body>
</html>