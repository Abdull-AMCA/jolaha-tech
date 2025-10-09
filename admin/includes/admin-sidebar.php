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
            <a class="nav-link active" href="#">
                <i class="bi bi-speedometer2 nav-icon"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        
        <!-- Products Menu -->
        <li class="nav-item">
            <a class="nav-link menu-toggle-btn" href="#" data-menu="products">
                <i class="bi bi-box-seam nav-icon"></i>
                <span class="nav-text">Products</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="products-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span class="nav-text">Add Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-card-checklist nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Services Menu -->
        <li class="nav-item">
            <a class="nav-link menu-toggle-btn" href="#" data-menu="services">
                <i class="bi bi-tools nav-icon"></i>
                <span class="nav-text">Services</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="services-menu">
                <li class="nav-item">
                    <a class="nav-link" href="services.php?source=add_service">
                        <i class="bi bi-plus-circle nav-icon"></i>
                        <span class="nav-text">Add Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./services.php">
                        <i class="bi bi-card-checklist nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Users Menu -->
        <li class="nav-item">
            <a class="nav-link menu-toggle-btn" href="#" data-menu="users">
                <i class="bi bi-people nav-icon"></i>
                <span class="nav-text">Users</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="users-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-plus nav-icon"></i>
                        <span class="nav-text">Add User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-lines-fill nav-icon"></i>
                        <span class="nav-text">View All</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Submissions Menu -->
        <li class="nav-item">
            <a class="nav-link menu-toggle-btn" href="#" data-menu="submissions">
                <i class="bi bi-inbox nav-icon"></i>
                <span class="nav-text">Submissions</span>
                <i class="bi bi-chevron-right menu-toggle"></i>
            </a>
            <ul class="sub-menu" id="submissions-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-envelope nav-icon"></i>
                        <span class="nav-text">Contact Forms</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart-check nav-icon"></i>
                        <span class="nav-text">Trial Requests</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-chat-square-text nav-icon"></i>
                        <span class="nav-text">Service Inquiries</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!-- Settings -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-gear nav-icon"></i>
                <span class="nav-text">Settings</span>
            </a>
        </li>
    </ul>
</div>