<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Blog | Jolaha Tech</title>

    <!-- Browser Favicon -->
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
  </head>

  <body>

    <?php
      include 'includes/header-navbar.php';

      // Fetch published posts
      try {
          $sql = "SELECT post_id, post_slug, post_title, post_content, post_author_name, post_image, post_category, created_at 
                  FROM posts 
                  WHERE post_status = 'published'
                  ORDER BY created_at DESC";
          $stmt = $connection->query($sql);
          $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          $posts = [];
      }
    ?>

    <!-- Hero -->
    <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
      <div class="container py-5 px-md-5">
        <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">Blog</span></h1>
        <p class="lead px-2 px-md-5">
          Insights, updates, and expert articles from the world of technology and digital transformation.
        </p>
      </div>
    </section>

    <!-- Blog Content -->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row g-5">
          <!-- Main Column -->
          <div class="col-lg-8">

            <?php
            if (!empty($posts)) {
                $total = count($posts);

                // FEATURED POST (first one)
                $p = $posts[0];
                $created_at = strtotime($p['created_at']);
                $now = time();
                $days = floor(($now - $created_at) / (60 * 60 * 24));
                if ($days < 1) {
                    $formattedDate = "Today";
                } elseif ($days == 1) {
                    $formattedDate = "Yesterday";
                } elseif ($days <= 3) {
                    $formattedDate = $days . " days ago";
                } else {
                    $formattedDate = date('F j, Y', $created_at);
                }

                $excerpt = strip_tags($p['post_content']);
                if (mb_strlen($excerpt) > 300) $excerpt = mb_substr($excerpt, 0, 300) . '...';

                $imgPath = "resources/img/uploads/posts/" . ($p['post_image'] ?? '');
                $imgUrl = (is_file($imgPath) ? $imgPath : 'https://via.placeholder.com/900x400?text=No+Image');
            ?>
                <article class="mb-5 pb-4 border-bottom">
                  <img src="<?php echo htmlspecialchars($imgUrl); ?>"
                      alt="<?php echo htmlspecialchars($p['post_title']); ?>"
                      class="img-fluid rounded mb-3">
                  <span class="chip mb-2"><?php echo htmlspecialchars($p['post_category']); ?></span>
                  <h2 class="fw-bold" style="color: var(--secondary);">
                    <?php echo htmlspecialchars($p['post_title']); ?>
                  </h2>
                  <p class="text-dark small mb-2">
                    Published: <?php echo htmlspecialchars($formattedDate); ?> •
                    By <?php echo htmlspecialchars($p['post_author_name']); ?>
                  </p>
                  <p style="color: var(--surface);"><?php echo htmlspecialchars($excerpt); ?></p>
                  <a href="post-details.php?slug=<?php echo urlencode($p['post_slug']); ?>" class="btn btn-primary">Read More</a>
                </article>
            <?php
                // SECOND and THIRD POSTS
                echo '<div class="row g-4 mb-5">';
                for ($i = 1; $i <= 2; $i++) {
                    if (!isset($posts[$i])) break;
                    $q = $posts[$i];
                    $created_at = strtotime($q['created_at']);
                    $days = floor((time() - $created_at) / (60 * 60 * 24));
                    if ($days < 1) {
                        $formattedDate = "Today";
                    } elseif ($days == 1) {
                        $formattedDate = "Yesterday";
                    } elseif ($days <= 3) {
                        $formattedDate = $days . " days ago";
                    } else {
                        $formattedDate = date('F j, Y', $created_at);
                    }
                    $excerpt = strip_tags($q['post_content']);
                    if (mb_strlen($excerpt) > 200) $excerpt = mb_substr($excerpt, 0, 200) . '...';

                    $imgPath = "resources/img/uploads/posts/" . ($q['post_image'] ?? '');
                    $imgUrl = (is_file($imgPath) ? $imgPath : 'https://via.placeholder.com/600x300?text=No+Image');
            ?>
                    <div class="col-lg-6">
                      <article class="mb-0 pb-0 h-100">
                        <img src="<?php echo htmlspecialchars($imgUrl); ?>"
                            alt="<?php echo htmlspecialchars($q['post_title']); ?>"
                            class="img-fluid rounded mb-3">
                        <span class="chip mb-2"><?php echo htmlspecialchars($q['post_category']); ?></span>
                        <h4 class="fw-bold" style="color: var(--secondary);">
                          <?php echo htmlspecialchars($q['post_title']); ?>
                        </h4>
                        <p class="text-dark small mb-2">
                          Published: <?php echo htmlspecialchars($formattedDate); ?> •
                          By <?php echo htmlspecialchars($q['post_author_name']); ?>
                        </p>
                        <p style="color: var(--surface);"><?php echo htmlspecialchars($excerpt); ?></p>
                        <a href="post-details.php?slug=<?php echo urlencode($q['post_slug']); ?>" class="btn btn-sm btn-primary">Read More</a>
                      </article>
                    </div>
            <?php
                }
                echo '</div>';

                // REMAINING POSTS (3 columns)
                if ($total > 3) {
                    echo '<div class="row g-4">';
                    for ($j = 3; $j < $total; $j++) {
                        $r = $posts[$j];
                        $created_at = strtotime($r['created_at']);
                        $days = floor((time() - $created_at) / (60 * 60 * 24));
                        if ($days < 1) {
                            $formattedDate = "Today";
                        } elseif ($days == 1) {
                            $formattedDate = "Yesterday";
                        } elseif ($days <= 3) {
                            $formattedDate = $days . " days ago";
                        } else {
                            $formattedDate = date('F j, Y', $created_at);
                        }
                        $excerpt = strip_tags($r['post_content']);
                        if (mb_strlen($excerpt) > 150) $excerpt = mb_substr($excerpt, 0, 150) . '...';

                        $imgPath = "resources/img/uploads/posts/" . ($r['post_image'] ?? '');
                        $imgUrl = (is_file($imgPath) ? $imgPath : 'https://via.placeholder.com/400x250?text=No+Image');
            ?>
                        <div class="col-lg-4 col-md-6">
                          <article class="mb-5 pb-4 h-100">
                            <img src="<?php echo htmlspecialchars($imgUrl); ?>"
                                alt="<?php echo htmlspecialchars($r['post_title']); ?>"
                                class="img-fluid rounded mb-3" style="height:200px; object-fit:cover;">
                            <span class="chip mb-2"><?php echo htmlspecialchars($r['post_category']); ?></span>
                            <h5 class="fw-bold" style="color: var(--secondary);">
                              <?php echo htmlspecialchars($r['post_title']); ?>
                            </h5>
                            <p class="text-dark small mb-2">
                              Published: <?php echo htmlspecialchars($formattedDate); ?> •
                              By <?php echo htmlspecialchars($r['post_author_name']); ?>
                            </p>
                            <p style="color: var(--surface);"><?php echo htmlspecialchars($excerpt); ?></p>
                            <a href="post-details.php?slug=<?php echo urlencode($r['post_slug']); ?>" class="btn btn-sm btn-primary">Read More</a>
                          </article>
                        </div>
            <?php
                    }
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center text-muted">No posts available at the moment.</p>';
            }
            ?>

          </div> <!-- /.col-lg-8 -->

          <!-- Sidebar -->
          <div class="col-lg-4">
            <div class="card border-0 p-4 mb-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Search</h4>
              <input type="text" class="form-control" placeholder="Search blog...">
            </div>

            <div class="card border-0 p-4 mb-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Categories</h4>
              <ul style="list-style: none; padding: 0; color: var(--text);">
                <li><a href="#">Cloud</a></li>
                <li><a href="#">Cybersecurity</a></li>
                <li><a href="#">Artificial Intelligence</a></li>
                <li><a href="#">Software Development</a></li>
                <li><a href="#">Business Solutions</a></li>
              </ul>
            </div>

            <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Recent Posts</h4>
              <ul style="list-style: none; padding: 0; color: var(--text);">
                <?php
                try {
                    $rstmt = $connection->query("SELECT post_slug, post_title FROM posts WHERE post_status = 'published' ORDER BY created_at DESC LIMIT 5");
                    $recent = $rstmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($recent as $rp) {
                        echo '<li><a href="post-details.php?slug=' . urlencode($rp['post_slug']) . '">' . htmlspecialchars($rp['post_title']) . '</a></li>';
                    }
                } catch (Exception $e) {
                    echo '<li class="text-muted">Unable to load recent posts.</li>';
                }
                ?>
              </ul>
            </div>

          </div> <!-- /.col-lg-4 -->
        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </section>

    <?php include 'includes/footer.php'; ?>

  </body>
</html>
