<?php
// Initialize variables
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post_title = $post_content = $post_excerpt = $meta_title = $meta_description = $meta_keywords = '';
$post_status = 'published';
$post_author = '';
$current_image = '';
$message = '';
$message_type = '';

// Fetch post data if editing existing post
if ($post_id > 0) {
    try {
        $sql = "SELECT * FROM posts WHERE post_id = :post_id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([':post_id' => $post_id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($post) {
            $post_title = $post['post_title'];
            $post_content = $post['post_content'];
            $post_excerpt = $post['post_excerpt'];
            $post_status = $post['post_status'];
            $post_author = $post['post_author'];
            $current_image = $post['post_image'];
            $meta_title = $post['meta_title'];
            $meta_description = $post['meta_description'];
            $meta_keywords = $post['meta_keywords'];
        } else {
            $message = "Post not found.";
            $message_type = "error";
        }
    } catch (PDOException $e) {
        $message = "Database error: " . $e->getMessage();
        $message_type = "error";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = intval($_POST['post_id']);
    $post_title = trim($_POST['post_title']);
    $post_content = trim($_POST['post_content']);
    $post_excerpt = trim($_POST['post_excerpt'] ?? '');
    $post_status = trim($_POST['post_status']);
    $post_author = trim($_POST['post_author']);
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');

    // Handle file upload
    $post_image = $current_image;
    if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['post_image'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($ext, $allowed)) {
            $upload_dir = "../uploads/posts/";
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $new_filename = "post_" . time() . "_" . rand(1000, 9999) . ".{$ext}";
            $target = $upload_dir . $new_filename;
            
            if (move_uploaded_file($file['tmp_name'], $target)) {
                // Delete old image if it exists
                if (!empty($current_image) && file_exists($upload_dir . $current_image)) {
                    unlink($upload_dir . $current_image);
                }
                $post_image = $new_filename;
            }
        }
    }

    // Validate required fields
    if (empty($post_title) || empty($post_content)) {
        $message = "Please fill in all required fields.";
        $message_type = "error";
    } else {
        try {
            // Update database using PDO
            $sql = "UPDATE posts SET 
                    post_title = :post_title, 
                    post_content = :post_content, 
                    post_excerpt = :post_excerpt, 
                    post_status = :post_status, 
                    post_author = :post_author, 
                    post_image = :post_image, 
                    meta_title = :meta_title, 
                    meta_description = :meta_description, 
                    meta_keywords = :meta_keywords,
                    updated_at = NOW()
                    WHERE post_id = :post_id";
            
            $stmt = $connection->prepare($sql);
            $stmt->execute([
                ':post_title' => $post_title,
                ':post_content' => $post_content,
                ':post_excerpt' => $post_excerpt,
                ':post_status' => $post_status,
                ':post_author' => $post_author,
                ':post_image' => $post_image,
                ':meta_title' => $meta_title,
                ':meta_description' => $meta_description,
                ':meta_keywords' => $meta_keywords,
                ':post_id' => $post_id
            ]);

            // Show success modal
            echo "
            <script>
                window.addEventListener('load', function() {
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                });
            </script>
            ";
            
        } catch (PDOException $e) {
            $message = "Failed to update post. Error: " . $e->getMessage();
            $message_type = "error";
        }
    }
}
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h4 mb-1"><?php echo $post_id > 0 ? 'Edit Blog Post' : 'Add New Blog Post'; ?></h2>
                        <p class="text-muted mb-0"><?php echo $post_id > 0 ? 'Update existing blog post' : 'Create a new blog post'; ?></p>
                    </div>
                    <a href="posts.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Posts
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <div id="alertBox"></div>

        <div class="row">
            <!-- Main Content Column -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-pencil-square me-2"></i>
                            Post Content
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo $message_type == 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                            <i class="bi <?php echo $message_type == 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'; ?> me-2"></i>
                            <?php echo $message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="" enctype="multipart/form-data" id="postForm">
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                            
                            <div class="mb-4">
                                <label for="post_title" class="form-label fw-semibold">Post Title *</label>
                                <input type="text" id="post_title" name="post_title" class="form-control form-control-lg" 
                                       value="<?php echo htmlspecialchars($post_title); ?>" 
                                       placeholder="Enter your post title" required>
                            </div>

                            <div class="mb-4">
                                <label for="post_content" class="form-label fw-semibold">Content *</label>
                                <textarea id="post_content" name="post_content" class="form-control" 
                                          rows="15" placeholder="Write your post content here..." required><?php echo htmlspecialchars($post_content); ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="post_excerpt" class="form-label fw-semibold">Excerpt</label>
                                <textarea id="post_excerpt" name="post_excerpt" class="form-control" 
                                          rows="4" placeholder="Brief summary of your post (optional)"><?php echo htmlspecialchars($post_excerpt); ?></textarea>
                                <div class="form-text">A short summary that appears in post listings and search results.</div>
                            </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4">
                <!-- Publish Settings Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Publish Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="post_author" class="form-label fw-semibold">Author</label>
                            <input type="text" id="post_author" name="post_author" class="form-control" 
                                   value="<?php echo htmlspecialchars($post_author); ?>" 
                                   placeholder="Enter author name">
                            <div class="form-text">Name of the post author</div>
                        </div>

                        <div class="mb-3">
                            <label for="post_status" class="form-label fw-semibold">Status</label>
                            <select id="post_status" name="post_status" class="form-select">
                                <option value="draft" <?php echo ($post_status == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                <option value="published" <?php echo ($post_status == 'published') ? 'selected' : ''; ?>>Published</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="post_image" class="form-label fw-semibold">Featured Image</label>
                            <input type="file" id="post_image" name="post_image" class="form-control" 
                                   accept="image/jpeg,image/png,image/gif,image/webp">
                            <div class="form-text">Recommended size: 1200x630 pixels</div>
                            
                            <?php if (!empty($current_image)): ?>
                            <div class="mt-2">
                                <small class="fw-semibold">Current Image:</small>
                                <?php
                                $image_url = "";
                                if (!empty($current_image) && file_exists("../uploads/posts/" . $current_image)) {
                                    $image_url = "../uploads/posts/" . $current_image;
                                } else {
                                    $image_url = "https://via.placeholder.com/150x100/f1bf70/0f172a?text=Post";
                                }
                                ?>
                                <img src="<?php echo $image_url; ?>" 
                                     alt="Current Post Image" 
                                     class="rounded ms-2" width="80" height="60"
                                     onerror="this.src='https://via.placeholder.com/80x60/f1bf70/0f172a?text=Post'">
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i> 
                                <?php echo $post_id > 0 ? 'Update Post' : 'Publish Post'; ?>
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i> Reset Form
                            </button>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- SEO Settings Card -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-search me-2"></i>
                            SEO Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label fw-semibold">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control" 
                                   value="<?php echo htmlspecialchars($meta_title); ?>" 
                                   placeholder="SEO title for search engines">
                            <div class="form-text">Title tag for SEO (50-60 characters recommended)</div>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" class="form-control" 
                                      rows="3" placeholder="SEO description for search engines"><?php echo htmlspecialchars($meta_description); ?></textarea>
                            <div class="form-text">Description for SEO (150-160 characters recommended)</div>
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                            <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" 
                                   value="<?php echo htmlspecialchars($meta_keywords); ?>" 
                                   placeholder="keyword1, keyword2, keyword3">
                            <div class="form-text">Comma-separated keywords for SEO</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Success
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle-fill text-success mb-3" style="font-size: 3rem;"></i>
                <h4 class="mb-3">Post Updated Successfully!</h4>
                <p class="text-muted">Your post has been updated in the database.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="./posts.php" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-list-ul me-1"></i> View All Posts
                </a>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                    <i class="bi bi-pencil me-1"></i> Continue Editing
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Additional JavaScript for enhanced user experience
document.addEventListener('DOMContentLoaded', function() {
    // Character counters for SEO fields
    const metaTitle = document.getElementById('meta_title');
    const metaDescription = document.getElementById('meta_description');
    
    if (metaTitle) {
        metaTitle.addEventListener('input', function() {
            updateCharacterCount(this, 'metaTitleCount');
        });
    }
    
    if (metaDescription) {
        metaDescription.addEventListener('input', function() {
            updateCharacterCount(this, 'metaDescCount');
        });
    }
    
    function updateCharacterCount(field, countId) {
        let countElement = document.getElementById(countId);
        if (!countElement) {
            countElement = document.createElement('div');
            countElement.id = countId;
            countElement.className = 'form-text text-end';
            field.parentNode.appendChild(countElement);
        }
        countElement.textContent = field.value.length + ' characters';
        
        // Add color coding for optimal lengths
        if (field.id === 'meta_title') {
            if (field.value.length >= 50 && field.value.length <= 60) {
                countElement.className = 'form-text text-end text-success';
            } else {
                countElement.className = 'form-text text-end text-warning';
            }
        } else if (field.id === 'meta_description') {
            if (field.value.length >= 150 && field.value.length <= 160) {
                countElement.className = 'form-text text-end text-success';
            } else {
                countElement.className = 'form-text text-end text-warning';
            }
        }
    }
});
</script>