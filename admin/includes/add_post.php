<?php
// Initialize variables
$post_title = $post_content = $post_excerpt = $meta_title = $meta_description = $meta_keywords = $post_author_name = '';
$post_category = $selected_solution = $selected_product = $selected_service = '';
$post_status = 'published';
$message = '';
$message_type = '';

// Function to generate slug
function generateSlug($title) {
    $slug = strtolower(trim($title));
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    return trim($slug, '-');
}

// Fetch solutions, products, and services
$solutions = $products = $services = [];

try {
    $stmt = $connection->prepare("SELECT solution_id, solution_name FROM solutions");
    $stmt->execute();
    $solutions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $connection->prepare("SELECT product_id, product_name FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ✅ Only fetch services (no sub-services)
    $stmt = $connection->prepare("SELECT id, service_name FROM services");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $message = "Error fetching category data: " . $e->getMessage();
    $message_type = "error";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_title = trim($_POST['post_title']);
    $post_content = trim($_POST['post_content']);
    $post_excerpt = trim($_POST['post_excerpt'] ?? '');
    $post_status = trim($_POST['post_status']);
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');
    $post_author = $_SESSION['user_id'] ?? 1;
    $post_author_name = trim($_POST['post_author_name'] ?? '');
    $post_category = trim($_POST['post_category'] ?? '');
    $selected_solution = trim($_POST['selected_solution'] ?? '');
    $selected_product = trim($_POST['selected_product'] ?? '');
    $selected_service = trim($_POST['selected_service'] ?? '');
    $post_slug = generateSlug($post_title);

    // Handle image upload
    $post_image = '';
    if (isset($_FILES['post_image']) && $_FILES['post_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['post_image'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($ext, $allowed)) {
            $upload_dir = "../resources/img/uploads/posts/";
            if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);

            $new_filename = "post_" . time() . "_" . rand(1000, 9999) . ".{$ext}";
            $target = $upload_dir . $new_filename;

            if (move_uploaded_file($file['tmp_name'], $target)) {
                $post_image = $new_filename;
            }
        }
    }

    // Validate inputs
    if (empty($post_title) || empty($post_content) || empty($post_category) || empty($post_author_name)) {
        $message = "Please fill in all required fields.";
        $message_type = "error";
    } else {
        $category_valid = true;

        if ($post_category === 'solution' && empty($selected_solution)) {
            $message = "Please select a solution.";
            $category_valid = false;
        } elseif ($post_category === 'product' && empty($selected_product)) {
            $message = "Please select a product.";
            $category_valid = false;
        } elseif ($post_category === 'service' && empty($selected_service)) {
            $message = "Please select a service.";
            $category_valid = false;
        }

        if ($category_valid) {
            try {
                $sql = "INSERT INTO posts (
                            post_title, post_slug, post_content, post_author, post_author_name,
                            post_excerpt, post_status, post_image, meta_title, meta_description, meta_keywords,
                            post_category, selected_solution, selected_product, selected_service
                        ) VALUES (
                            :post_title, :post_slug, :post_content, :post_author, :post_author_name,
                            :post_excerpt, :post_status, :post_image, :meta_title, :meta_description, :meta_keywords,
                            :post_category, :selected_solution, :selected_product, :selected_service
                        )";

                $stmt = $connection->prepare($sql);
                $stmt->execute([
                    ':post_title' => $post_title,
                    ':post_slug' => $post_slug,
                    ':post_content' => $post_content,
                    ':post_author' => $post_author,
                    ':post_author_name' => $post_author_name,
                    ':post_excerpt' => $post_excerpt,
                    ':post_status' => $post_status,
                    ':post_image' => $post_image,
                    ':meta_title' => $meta_title,
                    ':meta_description' => $meta_description,
                    ':meta_keywords' => $meta_keywords,
                    ':post_category' => $post_category,
                    ':selected_solution' => $selected_solution,
                    ':selected_product' => $selected_product,
                    ':selected_service' => $selected_service
                ]);

                echo "
                <script>
                    window.addEventListener('load', function() {
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    });
                </script>
                ";

            } catch (PDOException $e) {
                $message = "Failed to create post. Error: " . $e->getMessage();
                $message_type = "error";
            }
        }
    }
}
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="h4 mb-1">Create New Post</h2>
                    <p class="text-muted mb-0">Add a new post on the Jolaha blog.</p>
                </div>
                <a href="./posts.php" class="btn btn-primary"><i class="bi bi-arrow-left me-1"></i> Back to Posts</a>
            </div>
        </div>

        <?php if (!empty($message)): ?>
        <div class="alert alert-<?php echo ($message_type == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data" id="postForm">
            <div class="row">
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

                    <!-- Post Title -->
                    <div class="mb-4">
                        <label for="post_title" class="form-label fw-semibold">Post Title *</label>
                        <input type="text" id="post_title" name="post_title" class="form-control form-control-lg"
                            value="<?php echo htmlspecialchars($post_title); ?>"
                            placeholder="Enter your post title" required>
                        <div class="form-text">Title of your post (keep it concise and descriptive)</div>
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Post Category *</label>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="post_category" id="category_solution" value="solution" <?php echo ($post_category === 'solution') ? 'checked' : ''; ?>>
                                <label class="btn btn-outline-warning w-100" for="category_solution">
                                    <i class="bi bi-lightbulb me-2"></i> Solution
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="post_category" id="category_product" value="product" <?php echo ($post_category === 'product') ? 'checked' : ''; ?>>
                                <label class="btn btn-outline-primary w-100" for="category_product">
                                    <i class="bi bi-box me-2"></i> Product
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="post_category" id="category_service" value="service" <?php echo ($post_category === 'service') ? 'checked' : ''; ?>>
                                <label class="btn btn-outline-success w-100" for="category_service">
                                    <i class="bi bi-tools me-2"></i> Service
                                </label>
                            </div>
                        </div>
                        <div class="form-text">Select what type of content this post belongs to.</div>
                    </div>

                    <!-- Dynamic Category Dropdowns -->
                    <div id="categorySelection" class="mb-4" style="display:none;">
                        <!-- Solution/Product Section -->
                        <div id="solutionProductSection" style="display:none;">
                            <label for="category_dropdown" class="form-label fw-semibold">Select <span id="dropdownLabel"></span> *</label>
                            <select id="category_dropdown" class="form-select">
                                <option value="">Select an option</option>
                            </select>
                            <input type="hidden" id="selected_solution" name="selected_solution" value="<?php echo htmlspecialchars($selected_solution); ?>">
                            <input type="hidden" id="selected_product" name="selected_product" value="<?php echo htmlspecialchars($selected_product); ?>">
                        </div>

                        <!-- Service Section -->
                        <div id="serviceSection" style="display:none;">
                            <label for="service_dropdown" class="form-label fw-semibold">Select Service *</label>
                            <select id="service_dropdown" name="selected_service" class="form-select">
                                <option value="">Select a service</option>
                                <?php foreach ($services as $service): ?>
                                    <option value="<?php echo htmlspecialchars($service['id']); ?>"
                                        <?php echo ($selected_service == $service['id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($service['service_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="mb-4">
                        <label for="post_content" class="form-label fw-semibold">Content *</label>
                        <textarea id="post_content" name="post_content" class="form-control"
                            rows="12" placeholder="Write your post content here..." required><?php echo htmlspecialchars($post_content); ?></textarea>
                        <div class="form-text">Main body of the post. Only use contents with due approvals.</div>
                    </div>

                    <!-- Post Excerpt -->
                    <div class="mb-4">
                        <label for="post_excerpt" class="form-label fw-semibold">Excerpt</label>
                        <textarea id="post_excerpt" name="post_excerpt" class="form-control"
                            rows="3" placeholder="Brief summary of your post (optional)"
                            data-counter="excerptCounter"><?php echo htmlspecialchars($post_excerpt); ?></textarea>
                        <div class="form-text">
                            Short preview text (max <span id="excerptCounter">0</span>/160 characters)
                        </div>
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
                                <label for="post_author_name" class="form-label fw-semibold">Author</label>
                                <input type="text" id="post_author_name" name="post_author_name" class="form-control"
                                    value="<?php echo htmlspecialchars($post_author_name); ?>" placeholder="Enter author name">
                                <div class="form-text">Name of the post author.</div>
                            </div>

                            <div class="mb-3">
                                <label for="post_status" class="form-label fw-semibold">Status</label>
                                <select id="post_status" name="post_status" class="form-select">
                                    <option value="draft" <?php echo ($post_status == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                    <option value="published" <?php echo ($post_status == 'published') ? 'selected' : ''; ?>>Published</option>
                                </select>
                                <div class="form-text">Choose whether to save as draft or publish immediately.</div>
                            </div>

                            <div class="mb-3">
                                <label for="post_image" class="form-label fw-semibold">Featured Image</label>
                                <input type="file" id="post_image" name="post_image" class="form-control"
                                    accept="image/jpeg,image/png,image/gif,image/webp">
                                <div class="form-text">Recommended size: 1200×630 pixels.</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> Publish Post
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle me-1"></i> Reset Form
                                </button>
                            </div>
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
                                    placeholder="SEO title for search engines" data-counter="metaTitleCounter">
                                <div class="form-text">Title tag for SEO (<span id="metaTitleCounter">0</span>/60 characters)</div>
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                                <textarea id="meta_description" name="meta_description" class="form-control"
                                    rows="3" placeholder="SEO description for search engines"
                                    data-counter="metaDescCounter"><?php echo htmlspecialchars($meta_description); ?></textarea>
                                <div class="form-text">
                                    Description for SEO (<span id="metaDescCounter">0</span>/160 characters)
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label fw-semibold">Meta Keywords</label>
                                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control"
                                    value="<?php echo htmlspecialchars($meta_keywords); ?>"
                                    placeholder="keyword1, keyword2, keyword3">
                                <div class="form-text">Comma-separated keywords for SEO.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="bi bi-check-circle-fill me-2"></i>Success</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <h4>Post Created Successfully!</h4>
                <p class="text-muted">Your post has been published.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="./posts.php" class="btn btn-outline-secondary"><i class="bi bi-list-ul me-1"></i> View All</a>
                <a href="posts.php?source=add_post" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> New Post</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryRadios = document.querySelectorAll('input[name="post_category"]');
        const categorySelection = document.getElementById('categorySelection');
        const solutionProductSection = document.getElementById('solutionProductSection');
        const serviceSection = document.getElementById('serviceSection');
        const dropdownLabel = document.getElementById('dropdownLabel');
        const categoryDropdown = document.getElementById('category_dropdown');
        const selectedSolution = document.getElementById('selected_solution');
        const selectedProduct = document.getElementById('selected_product');
        const solutions = <?php echo json_encode($solutions); ?>;
        const products = <?php echo json_encode($products); ?>;

        categoryRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                categorySelection.style.display = 'block';
                solutionProductSection.style.display = 'none';
                serviceSection.style.display = 'none';
                categoryDropdown.innerHTML = '<option value="">Select an option</option>';

                const category = this.value;
                if (category === 'solution') {
                    dropdownLabel.textContent = 'Solution';
                    solutionProductSection.style.display = 'block';
                    solutions.forEach(s => {
                        const opt = document.createElement('option');
                        opt.value = s.solution_id;
                        opt.textContent = s.solution_name;
                        if (selectedSolution.value == s.solution_id) opt.selected = true;
                        categoryDropdown.appendChild(opt);
                    });
                } else if (category === 'product') {
                    dropdownLabel.textContent = 'Product';
                    solutionProductSection.style.display = 'block';
                    products.forEach(p => {
                        const opt = document.createElement('option');
                        opt.value = p.product_id;
                        opt.textContent = p.product_name;
                        if (selectedProduct.value == p.product_id) opt.selected = true;
                        categoryDropdown.appendChild(opt);
                    });
                } else if (category === 'service') {
                    serviceSection.style.display = 'block';
                }
            });
        });

        categoryDropdown.addEventListener('change', function() {
            const selectedCategory = document.querySelector('input[name="post_category"]:checked').value;
            if (selectedCategory === 'solution') {
                selectedSolution.value = this.value;
                selectedProduct.value = '';
            } else if (selectedCategory === 'product') {
                selectedProduct.value = this.value;
                selectedSolution.value = '';
            }
        });

        const initialCategory = document.querySelector('input[name="post_category"]:checked');
        if (initialCategory) initialCategory.dispatchEvent(new Event('change'));
    });
</script>
