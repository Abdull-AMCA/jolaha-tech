Now I want to create a careers module in my application. First I would like you to give me the query to create the necessary table in MySQL. The table should be named 'careers' and have the following fields: job_id (primary key, auto-increment), job_title (varchar 255), job_description (text), location (varchar 255), employment_type (enum with values 'full-time', 'part-time', 'contract'), joining_date, posted_date (datetime), is_active (boolean, default true).

then create the PHP functions to add, edit, delete, and fetch job postings from the 'careers' table. I want to place all the CRUD functions in my functions.php file.

Make sure the functions use prepared statements to prevent SQL injection. and finally provide away of how to call each function in the respective pages (add, view_all, edit, delete).

Also use my existing database connection variable named $connection.

Follow my current structure for adding new career as in the sample below for adding a post (include the success and failure modals):

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

Use the same form structure for add_career to implement the edit_career functionality, making sure the selected career details are fetched in the form using its ID. On successful edit, show the success modal; on failure, show the failure modal.

Then I want to view all careers in a tabular format similar to how services are displayed. Include options to edit and delete each career. Use modals for confirming deletions and showing success or failure messages.
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

Then create a delete career functionality that removes the career from the database using its ID, with appropriate success and failure modals. Make sure to not create a seperate delete_career.php file but include the delete functionality within the functions.php file and js if necessary




This is the schema of my service_inquiries table;

127.0.0.1/jolaha/service_inquiries/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=jolaha&table=service_inquiries
Your SQL query has been executed successfully.

DESCRIBE service_inquiries;



id	int(11)	NO	PRI	NULL	auto_increment	
service_type	varchar(100)	NO		NULL		
full_name	varchar(150)	NO		NULL		
email	varchar(150)	NO		NULL		
company_name	varchar(150)	YES		NULL		
project_type	varchar(100)	YES		NULL		
budget_range	varchar(100)	YES		NULL		
timeline	varchar(100)	YES		NULL		
description	text	YES		NULL		
submitted_at	timestamp	NO		current_timestamp()		


Now I want to create a query to fetch all the service inquiries made, ordered by the most recent submission date. 
Structure the page to follow the same format as the view_all_posts we implemented above. 
In the action column for this, only include a 'View Details' button that opens a modal displaying the full inquiry details when clicked. 
Then on the modal create a button to respond to the request via email using the mailto: link with the email address prefilled.


view_all_inquiries.php (instead of inquiries.php) look like this;

<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
// Get all service inquiries
$inquiries = get_all_service_inquiries();
?>

    <div class="main-content" id="mainContent">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title">Service Inquiries</h1>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </button>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-envelope me-2"></i>All Service Inquiries</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="inquiriesTable">
                            <thead>
                                <tr class="table-dark">
                                    <th>#</th>
                                    <th>Service Type</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Budget Range</th>
                                    <th>Timeline</th>
                                    <th>Submitted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($inquiries)): ?>
                                    <?php $serial = 1; foreach ($inquiries as $inquiry): ?>
                                        <tr>
                                            <td class="fw-bold"><?php echo $serial++; ?></td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    <?php echo htmlspecialchars($inquiry['service_type']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($inquiry['full_name']); ?></strong>
                                            </td>
                                            <td>
                                                <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>" 
                                                class="text-decoration-none">
                                                    <i class="bi bi-envelope me-1"></i>
                                                    <?php echo htmlspecialchars($inquiry['email']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['company_name'])): ?>
                                                    <?php echo htmlspecialchars($inquiry['company_name']); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">Not provided</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['budget_range'])): ?>
                                                    <span class="badge bg-info">
                                                        <?php echo htmlspecialchars($inquiry['budget_range']); ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">Not specified</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['timeline'])): ?>
                                                    <span class="badge bg-warning text-dark">
                                                        <?php echo htmlspecialchars($inquiry['timeline']); ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">Not specified</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-semibold"><?php echo date('M j, Y', strtotime($inquiry['submitted_at'])); ?></span>
                                                    <small class="text-muted"><?php echo date('g:i A', strtotime($inquiry['submitted_at'])); ?></small>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary view-inquiry-btn" 
                                                        data-inquiry-id="<?php echo $inquiry['id']; ?>"
                                                        title="View Details">
                                                    <i class="bi bi-eye"></i> View Details
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bi bi-envelope display-4 d-block mb-2"></i>
                                                <h5>No service inquiries found</h5>
                                                <p>All service inquiries will appear here.</p>
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

    <!-- View Inquiry Details Modal -->
    <div class="modal fade" id="viewInquiryModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-envelope me-2"></i>Inquiry Details</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="inquiryDetails">
                    <!-- Content will be loaded via AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-success" id="respondInquiryBtn">
                        <i class="bi bi-reply me-1"></i> Respond via Email
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/admin-footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewModal = new bootstrap.Modal(document.getElementById('viewInquiryModal'));
    const inquiryDetails = document.getElementById('inquiryDetails');
    const respondBtn = document.getElementById('respondInquiryBtn');
    let currentInquiryEmail = '';

    // View inquiry details
    document.querySelectorAll('.view-inquiry-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const inquiryId = this.getAttribute('data-inquiry-id');
            
            // Show loading state
            inquiryDetails.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading inquiry details...</p>
                </div>
            `;
            
            // Fetch inquiry details
            fetch(`get_inquiry_details.php?id=${inquiryId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const inquiry = data.inquiry;
                        currentInquiryEmail = inquiry.email;
                        
                        // Update respond button
                        respondBtn.href = `mailto:${inquiry.email}?subject=Re: Your ${inquiry.service_type} Inquiry&body=Dear ${inquiry.full_name},%0D%0A%0D%0AThank you for your inquiry regarding our ${inquiry.service_type} services.%0D%0A%0D%0A`;
                        
                        // Populate modal content
                        inquiryDetails.innerHTML = `
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary">Personal Information</h6>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Full Name</label>
                                        <p class="form-control-static">${escapeHtml(inquiry.full_name)}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Email</label>
                                        <p class="form-control-static">
                                            <a href="mailto:${escapeHtml(inquiry.email)}" class="text-decoration-none">
                                                <i class="bi bi-envelope me-1"></i>${escapeHtml(inquiry.email)}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Company</label>
                                        <p class="form-control-static">
                                            ${inquiry.company_name ? escapeHtml(inquiry.company_name) : '<span class="text-muted">Not provided</span>'}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-primary">Project Details</h6>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Service Type</label>
                                        <p class="form-control-static">
                                            <span class="badge bg-primary">${escapeHtml(inquiry.service_type)}</span>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Project Type</label>
                                        <p class="form-control-static">
                                            ${inquiry.project_type ? escapeHtml(inquiry.project_type) : '<span class="text-muted">Not specified</span>'}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Budget Range</label>
                                        <p class="form-control-static">
                                            ${inquiry.budget_range ? `<span class="badge bg-info">${escapeHtml(inquiry.budget_range)}</span>` : '<span class="text-muted">Not specified</span>'}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Timeline</label>
                                        <p class="form-control-static">
                                            ${inquiry.timeline ? `<span class="badge bg-warning text-dark">${escapeHtml(inquiry.timeline)}</span>` : '<span class="text-muted">Not specified</span>'}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary">Project Description</h6>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            ${inquiry.description ? `<p class="mb-0">${escapeHtml(inquiry.description).replace(/\n/g, '<br>')}</p>` : '<p class="text-muted mb-0">No description provided.</p>'}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="fw-bold text-primary">Submission Details</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Submitted On</label>
                                                    <p class="form-control-static">${formatDate(inquiry.submitted_at)}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Inquiry ID</label>
                                                    <p class="form-control-static">#${inquiry.id}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        inquiryDetails.innerHTML = `
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Error loading inquiry details: ${data.message}
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    inquiryDetails.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Network error occurred while loading inquiry details.
                        </div>
                    `;
                });
            
            viewModal.show();
        });
    });

    // Utility functions
    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
});
</script>



Now, the below code is how I am showing the careers at jolaha (hard coded), 

 <!-- Open Positions -->
  <section class="py-5" style="background-color: var(--surface);">
    <div class="container">
      <h2 class="fw-bold mb-4 text-center" style="color: var(--secondary);">Open Positions</h2>
      <p class="lead text-center mb-5" style="color: var(--text);">Explore exciting opportunities across our teams and apply today.</p>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h5 style="color: var(--heading);">Frontend Developer</h5>
            <p style="color: var(--text);">Build engaging web experiences with React, Vue, and modern frameworks.</p>
            <a href="#" class="btn btn-primary mt-2">Apply Now</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h5 style="color: var(--heading);">Mobile App Developer</h5>
            <p style="color: var(--text);">Develop high-performance Android/iOS apps for businesses worldwide.</p>
            <a href="#" class="btn btn-primary mt-2">Apply Now</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h5 style="color: var(--heading);">Cloud Engineer</h5>
            <p style="color: var(--text);">Design and manage scalable, secure, and reliable cloud infrastructures.</p>
            <a href="#" class="btn btn-primary mt-2">Apply Now</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h5 style="color: var(--heading);">UI/UX Designer</h5>
            <p style="color: var(--text);">Create intuitive interfaces and delightful experiences for end users.</p>
            <a href="#" class="btn btn-primary mt-2">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

so now I want to replace this with dynamic data fetched from the database instead of hard coding it. But follow the same style and structure as above. You can include the elements that we have in the database but are not available in the hard coded version above.