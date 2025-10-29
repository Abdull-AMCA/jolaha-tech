<?php
// Detect current page filename (e.g., 'products.php')
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar Overlay for Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo-container">
        <div class="sidebar-logo">
            <div class="sidebar-logo-content">
                <button class="sidebar-toggle" id="sidebarToggleBtn">
                    <i class="bi bi-list"></i>
                </button>
                <span class="sidebar-logo-text">Admin Dashboard</span>
            </div>
        </div>
    </div>
    
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'admin_dashboard.php') ? 'active' : ''; ?>" href="admin_dashboard.php">
                <i class="bi bi-speedometer2 nav-icon"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>

        <!-- Posts Menu -->
        <li class="nav-item">
            <?php 
                $is_posts_active = in_array($current_page, ['posts.php', 'add_post.php', 'edit_post.php']);
            ?>
            <a class="nav-link menu-toggle-btn <?php echo $is_posts_active ? 'active' : ''; ?>" href="#" data-menu="posts">
                <i class="bi bi-journal-text nav-icon"></i>
                <span class="nav-text">Posts</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="posts-menu" style="<?php echo $is_posts_active ? 'display:block;' : ''; ?>">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'add_post.php') ? 'active' : ''; ?>" href="posts.php?source=add_post">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span class="nav-text">Add Post</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'posts.php' && !isset($_GET['source'])) ? 'active' : ''; ?>" href="posts.php">
                        <i class="bi bi-card-checklist nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Careers Menu -->
        <li class="nav-item">
            <?php 
                $is_careers_active = in_array($current_page, ['careers.php', 'add_career.php', 'edit_career.php']);
            ?>
            <a class="nav-link menu-toggle-btn <?php echo $is_careers_active ? 'active' : ''; ?>" href="#" data-menu="careers">
                <i class="bi bi-briefcase nav-icon"></i>
                <span class="nav-text">Careers</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="careers-menu" style="<?php echo $is_careers_active ? 'display:block;' : ''; ?>">
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['source']) && $_GET['source'] === 'add_career') ? 'active' : ''; ?>" href="careers.php?source=add_career">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span class="nav-text">Add Job</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'careers.php' && !isset($_GET['source'])) ? 'active' : ''; ?>" href="careers.php">
                        <i class="bi bi-card-checklist nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Products Single Link -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'products.php') ? 'active' : ''; ?>" href="products.php">
                <i class="bi bi-box-seam nav-icon"></i>
                <span class="nav-text">Products</span>
            </a>
        </li>

        <!-- Solutions Single Link -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'solutions.php') ? 'active' : ''; ?>" href="solutions.php">
                <i class="bi bi-lightbulb-fill nav-icon"></i>
                <span class="nav-text">Solutions</span>
            </a>
        </li>

        <!-- Services Menu -->
        <li class="nav-item">
            <?php 
                // Mark parent active if we're on any services page
                $is_services_active = in_array($current_page, ['services.php', 'add_service.php', 'edit_service.php']);
            ?>
            <a class="nav-link menu-toggle-btn <?php echo $is_services_active ? 'active' : ''; ?>" href="includes/services?source=add_service.php" data-menu="services">
                <i class="bi bi-tools nav-icon"></i>
                <span class="nav-text">Services</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="services-menu" style="<?php echo $is_services_active ? 'display:block;' : ''; ?>">
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['source']) && $_GET['source'] === 'add_service') ? 'active' : ''; ?>" href="services.php?source=add_service">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span class="nav-text">Add Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'services.php' && !isset($_GET['source'])) ? 'active' : ''; ?>" href="services.php">
                        <i class="bi bi-card-checklist nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Users Menu -->
        <li class="nav-item">
            <?php $is_users_active = in_array($current_page, ['users.php', 'add_user.php']); ?>
            <a class="nav-link menu-toggle-btn <?php echo $is_users_active ? 'active' : ''; ?>" href="#" data-menu="users">
                <i class="bi bi-people nav-icon"></i>
                <span class="nav-text">Users</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="users-menu" style="<?php echo $is_users_active ? 'display:block;' : ''; ?>">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'add_user.php') ? 'active' : ''; ?>" href="add_user.php">
                        <i class="bi bi-person-plus nav-icon"></i>
                        <span class="nav-text">Add User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'users.php') ? 'active' : ''; ?>" href="users.php">
                        <i class="bi bi-person-lines-fill nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Submissions Menu -->
        <li class="nav-item">
            <?php $is_submissions_active = in_array($current_page, ['contact_forms.php', 'trial_requests.php', 'service_inquiries.php']); ?>
            <a class="nav-link menu-toggle-btn <?php echo $is_submissions_active ? 'active' : ''; ?>" href="#" data-menu="submissions">
                <i class="bi bi-inbox nav-icon"></i>
                <span class="nav-text">Submissions</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="submissions-menu" style="<?php echo $is_submissions_active ? 'display:block;' : ''; ?>">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'contact_forms.php') ? 'active' : ''; ?>" href="contact_forms.php">
                        <i class="bi bi-envelope nav-icon"></i>
                        <span class="nav-text">Contact Forms</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'trial_requests.php') ? 'active' : ''; ?>" href="trial_requests.php">
                        <i class="bi bi-cart-check nav-icon"></i>
                        <span class="nav-text">Trial Requests</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'service_inquiries.php') ? 'active' : ''; ?>" href="service_inquiries.php">
                        <i class="bi bi-chat-square-text nav-icon"></i>
                        <span class="nav-text">Service Inquiries</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Settings -->
        <li class="nav-item">
            <a class="nav-link <?php echo ($current_page === 'settings.php') ? 'active' : ''; ?>" href="settings.php">
                <i class="bi bi-gear nav-icon"></i>
                <span class="nav-text">Settings</span>
            </a>
        </li>
    </ul>
</div>
