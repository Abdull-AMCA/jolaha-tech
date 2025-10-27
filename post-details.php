<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Details | Jolaha Tech</title>
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>

<?php
    include 'includes/header-navbar.php';

    // -------------------
    // Get post slug from URL
    // -------------------
    $post_slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

    $post = null;

    if (!empty($post_slug)) {
    $sql = "SELECT post_id, post_title, post_content, post_author_name, post_image, post_category, created_at, post_slug
            FROM posts
            WHERE post_slug = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$post_slug]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<?php if (!$post): ?>
  <!-- 404 Error Message -->
  <div class="container my-5 text-center bg-light p-5 rounded">
    <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
    <h1 class="mt-3 text-dark">Post Not Found</h1>
    <p class="text-dark">The post you’re looking for doesn’t exist or has been removed.</p>
    <a href="blog.php" class="btn btn-primary mt-3"><i class="bi bi-house"></i> Back to Blog</a>
  </div>

<?php else: ?>
  <!-- -------------------
       Post Hero Section
  ------------------- -->
  <section class="about-hero d-flex align-items-center text-center text-white" style="background: #//7125eb; padding: 100px 0;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h1 class="fw-bold"><?php echo htmlspecialchars($post['post_title']); ?></h1>
          <div class="post-meta mt-3">
            <span><i class="bi bi-person"></i> By <?php echo htmlspecialchars($post['post_author_name']); ?></span>
            <span class="mx-2">•</span>
            <span><i class="bi bi-calendar"></i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
            <span class="mx-2">•</span>
            <span><i class="bi bi-tag"></i> <?php echo htmlspecialchars($post['post_category']); ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- -------------------
       Post Content Section
  ------------------- -->
  <section class="py-5 bg-light text-dark">
    <div class="container">
      <div class="row justify-content-center">
        <main class="col-lg-8">
          <!-- Featured Image -->
          <?php if (!empty($post['post_image'])): ?>
            <img src="resources/img/uploads/posts/<?php echo htmlspecialchars($post['post_image']); ?>" 
                 alt="<?php echo htmlspecialchars($post['post_title']); ?>" 
                 class="img-fluid rounded shadow mb-4">
          <?php endif; ?>

          <!-- Post Content -->
          <article class="post-content mb-4">
            <?php echo $post['post_content']; ?>
          </article>

          <!-- Social Sharing -->
          <div class="social-share mt-5">
            <h5 class="mb-3">Share this post:</h5>
            <?php 
              $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                             . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            ?>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>"
               target="_blank" class="btn btn-outline-primary btn-sm me-2">
              <i class="bi bi-facebook"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($current_url); ?>&text=<?php echo urlencode($post['post_title']); ?>"
               target="_blank" class="btn btn-outline-info btn-sm me-2">
              <i class="bi bi-twitter"></i> Twitter
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($current_url); ?>&title=<?php echo urlencode($post['post_title']); ?>"
               target="_blank" class="btn btn-outline-primary btn-sm">
              <i class="bi bi-linkedin"></i> LinkedIn
            </a>
          </div>
        </main>
      </div>

      <!-- -------------------
           Related Posts
      ------------------- -->
      <?php
      $related_sql = "SELECT post_title, post_image, post_category, created_at, post_content, post_slug
                      FROM posts
                      WHERE post_category = ? AND post_slug != ?
                      ORDER BY created_at DESC
                      LIMIT 3";
      $related_stmt = $connection->prepare($related_sql);
      $related_stmt->execute([$post['post_category'], $post['post_slug']]);
      $related_posts = $related_stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <?php if (!empty($related_posts)): ?>
        <div class="related-posts mt-5">
          <h3 class="mb-4">Related Posts</h3>
          <div class="row gy-4">
            <?php foreach ($related_posts as $rpost): 
              $excerpt = strlen($rpost['post_content']) > 100 
                ? substr($rpost['post_content'], 0, 100) . '...' 
                : $rpost['post_content'];
            ?>
              <div class="col-md-6 col-lg-4">
                <article class="blog-card card h-100">
                  <img src="resources/img/uploads/posts/<?php echo htmlspecialchars($rpost['post_image']); ?>" 
                       class="card-img-top" 
                       alt="<?php echo htmlspecialchars($rpost['post_title']); ?>"
                       style="height: 200px; object-fit: cover;">
                  <div class="card-body">
                    <span class="chip"><?php echo htmlspecialchars($rpost['post_category']); ?></span>
                    <h5 class="blog-title mt-2"><?php echo htmlspecialchars($rpost['post_title']); ?></h5>
                    <p class="text-muted small mb-2"><?php echo date('F j, Y', strtotime($rpost['created_at'])); ?></p>
                    <p class="blog-excerpt" style="text-align:left;"><?php echo htmlspecialchars($excerpt); ?></p>
                    <a href="post-details.php?slug=<?php echo urlencode($rpost['post_slug']); ?>" class="read-more">
                      Read More →
                    </a>
                  </div>
                </article>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

    <!-- Floating Action Buttons -->
    <div class="floating-buttons">
        <a href="https://wa.me/+971" class="floating-btn whatsapp-btn" target="_blank" rel="noopener">
            <i class="bi bi-whatsapp"></i>
        </a>
        <a href="#" class="floating-btn back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
