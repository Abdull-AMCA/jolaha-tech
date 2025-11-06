<?php
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Blog Management</h1>
            <a href="posts.php?source=add_post" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Post
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-file-earmark-post me-2"></i>All Posts</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="postsTable">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($posts)): ?>
                                <?php $serial = 1; foreach ($posts as $post): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo $serial++; ?></td>
                                        <td>
                                            <?php
                                            $image_url = (!empty($post['post_image']) && file_exists("../resources/img/uploads/posts/" . $post['post_image']))
                                                ? "../resources/img/uploads/posts/" . $post['post_image']
                                                : "https://via.placeholder.com/60x40/f1bf70/0f172a?text=Post";
                                            ?>
                                            <img src="<?php echo $image_url; ?>" class="rounded" width="60" height="40" alt="<?php echo htmlspecialchars($post['post_title']); ?>"
                                                 onerror="this.src='https://via.placeholder.com/60x40/f1bf70/0f172a?text=Post'">
                                        </td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($post['post_title']); ?></strong>
                                            <?php if (!empty($post['post_excerpt'])): ?>
                                                <br><small class="text-muted">
                                                    <?php echo htmlspecialchars(substr($post['post_excerpt'], 0, 100)); ?>...
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <strong class="text-primary"><?php echo htmlspecialchars($post['post_author_name'] ?? 'Unknown Author'); ?></strong>
                                                <small class="text-muted">ID: <?php echo $post['post_author'] ?? 1; ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $category = $post['post_category'] ?? 'uncategorized';
                                            $category_badge = [
                                                'solution' => ['bg-warning text-dark', 'Solution'],
                                                'product' => ['bg-primary', 'Product'],
                                                'service' => ['bg-success', 'Service'],
                                                'uncategorized' => ['bg-secondary', 'Uncategorized']
                                            ];
                                            $badge_class = $category_badge[$category][0] ?? 'bg-secondary';
                                            $badge_text = $category_badge[$category][1] ?? ucfirst($category);
                                            ?>
                                            <span class="badge <?php echo $badge_class; ?>">
                                                <i class="bi 
                                                    <?php 
                                                    if ($category === 'solution') echo 'bi-lightbulb';
                                                    elseif ($category === 'product') echo 'bi-box';
                                                    elseif ($category === 'service') echo 'bi-tools';
                                                    else echo 'bi-file-earmark';
                                                    ?> 
                                                    me-1">
                                                </i>
                                                <?php echo $badge_text; ?>
                                            </span>
                                            
                                            <?php if (!empty($post['selected_solution']) || !empty($post['selected_product']) || !empty($post['selected_service'])): ?>
                                                <br>
                                                <small class="text-muted">
                                                    <?php
                                                    if (!empty($post['selected_solution'])) echo "Solution ID: " . $post['selected_solution'];
                                                    elseif (!empty($post['selected_product'])) echo "Product ID: " . $post['selected_product'];
                                                    elseif (!empty($post['selected_service'])) echo "Service ID: " . $post['selected_service'];
                                                    ?>
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo ($post['post_status'] == 'published') ? 'success' : 'secondary'; ?>">
                                                <i class="bi <?php echo ($post['post_status'] == 'published') ? 'bi-check-circle' : 'bi-clock'; ?> me-1"></i>
                                                <?php echo ucfirst($post['post_status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold"><?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                                                <small class="text-muted"><?php echo date('g:i A', strtotime($post['created_at'])); ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="./post_detail.php?slug=<?php echo urlencode($post['post_slug']); ?>" 
                                                   class="btn btn-sm btn-info" target="_blank" title="View Post">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="posts.php?source=edit_post&id=<?php echo $post['post_id']; ?>" 
                                                   class="btn btn-sm btn-warning" title="Edit Post">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="posts.php?delete_post=<?php echo $post['post_id']; ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.');"
                                                   title="Delete Post">
                                                   <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-file-earmark-post display-4 d-block mb-2"></i>
                                            <h5>No posts found</h5>
                                            <p>Get started by creating your first blog post.</p>
                                            <a href="posts.php?source=add_post" class="btn btn-primary mt-2">
                                                <i class="bi bi-plus-circle"></i> Create Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // Handle Post Deletion
    if (isset($_GET['delete_post'])) {
        $post_id = intval($_GET['delete_post']);
        $result = delete_post($post_id);

        if ($result['success']) {
            echo "
            <script>
                alert('{$result['message']}');
                window.location.href = 'posts.php';
            </script>
            ";
            exit;
        } else {
            echo "
            <script>
                alert('{$result['message']}');
                window.location.href = 'posts.php';
            </script>
            ";
            exit;
        }
    }
?>