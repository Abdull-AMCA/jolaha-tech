<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --dark-blue: #0f172a;
            --medium-blue: #1e293b;
            --light-blue: #334155;
            --gold: #f1bf70;
            --light-gold: #f8d7a4;
            --text: #e2e8f0;
            --muted: #94a3b8;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Top Navigation Bar */
        .top-navbar {
            background-color: var(--dark-blue);
            color: var(--text);
            padding: 0.8rem 1.5rem;
            border-bottom: 2px solid var(--gold);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        
        .user-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            object-fit: cover;
        }
        
        .user-name {
            margin: 0 10px;
            color: var(--text);
            font-weight: 500;
        }
        
        /* Sidebar */
        .sidebar {
            background-color: var(--medium-blue);
            color: var(--text);
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 70px;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
        }
        
        .sidebar.collapsed {
            width: 70px;
        }
        
        .logo-container {
            padding: 0 1rem 1.5rem;
            border-bottom: 1px solid var(--light-blue);
            margin-bottom: 1rem;
        }
        
        .logo {
            color: var(--gold);
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .logo-text {
            margin-left: 10px;
            opacity: 1;
            transition: opacity 0.3s;
        }
        
        .sidebar.collapsed .logo-text {
            opacity: 0;
            display: none;
        }
        
        .nav-link {
            color: var(--text);
            padding: 0.8rem 1rem;
            border-radius: 5px;
            margin: 0.2rem 0.5rem;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        .nav-link:hover, .nav-link:focus {
            background-color: var(--light-blue);
            color: var(--gold);
        }
        
        .nav-link.active {
            background-color: var(--gold);
            color: var(--dark-blue);
            font-weight: 600;
        }
        
        .nav-icon {
            margin-right: 12px;
            font-size: 1.2rem;
            min-width: 24px;
            text-align: center;
        }
        
        .sidebar.collapsed .nav-text {
            opacity: 0;
            display: none;
        }
        
        .sub-menu {
            padding-left: 0.5rem;
            font-size: 0.95rem;
            margin-top: 0.2rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .sub-menu.show {
            max-height: 200px;
        }
        
        .sub-menu .nav-link {
            padding: 0.5rem 1rem;
            margin: 0.1rem 0.5rem;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
            padding-top: 90px;
            min-height: 100vh;
        }
        
        .main-content.expanded {
            margin-left: 70px;
        }
        
        /* Toggle Button */
        .sidebar-toggle {
            position: fixed;
            left: 10px;
            top: 80px;
            z-index: 1100;
            background: var(--gold);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }
        
        .sidebar-toggle:hover {
            background: var(--light-gold);
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background-color: var(--dark-blue);
            color: var(--text);
            border-bottom: 2px solid var(--gold);
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                transform: translateX(-70px);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .main-content.expanded {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                left: 15px;
                top: 15px;
            }
            
            /* Colored backgrounds for sub-menu items on mobile */
            .sub-menu .nav-link {
                background-color: var(--light-blue);
                margin: 0.15rem 0.3rem;
                padding: 0.4rem 0.8rem;
            }
        }
        
        /* Dropdown */
        .dropdown-menu {
            background-color: var(--medium-blue);
            border: 1px solid var(--gold);
        }
        
        .dropdown-item {
            color: var(--text);
        }
        
        .dropdown-item:hover {
            background-color: var(--light-blue);
            color: var(--gold);
        }
        
        /* Stats */
        .stat-card {
            border-left: 4px solid var(--gold);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-blue);
        }
        
        .stat-title {
            color: var(--muted);
            font-weight: 500;
        }
        
        /* Menu toggle arrow */
        .menu-toggle {
            transition: transform 0.3s ease;
            margin-left: auto;
        }
        
        .menu-toggle.rotated {
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar top-navbar fixed-top">
        <div class="container-fluid">
            <!-- Empty left-aligned menu items -->
            <div class="d-flex">
                <!-- Empty for alignment -->
            </div>
            
            <!-- Right-aligned user profile -->
            <div class="user-profile">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=f1bf70&color=0f172a&bold=true" alt="User" class="user-img">
                        <span class="user-name">Admin User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <div class="logo">
                <i class="bi bi-shield-shaded"></i>
                <span class="logo-text">AdminPanel</span>
            </div>
        </div>
        
        <ul class="nav flex-column">
            <!-- Posts Menu -->
            <li class="nav-item">
                <a class="nav-link active menu-toggle-btn" href="#" data-menu="posts">
                    <i class="bi bi-file-earmark-post nav-icon"></i>
                    <span class="nav-text">Posts</span>
                    <i class="bi bi-chevron-right menu-toggle"></i>
                </a>
                <ul class="sub-menu" id="posts-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-plus-circle nav-icon"></i>
                            <span class="nav-text">Add Post</span>
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
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="h4">Dashboard Overview</h2>
                    <p class="text-muted">Welcome back, Admin! Here's what's happening today.</p>
                </div>
            </div>
            
            <!-- Stats Row -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">128</div>
                            <div class="stat-title">Total Posts</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">42</div>
                            <div class="stat-title">Total Users</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">956</div>
                            <div class="stat-title">Page Views</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">83%</div>
                            <div class="stat-title">Engagement Rate</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Recent Activity
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-plus-circle-fill text-success me-2"></i>
                                        New post created
                                    </div>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-person-plus-fill text-primary me-2"></i>
                                        New user registered
                                    </div>
                                    <small class="text-muted">5 hours ago</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-pencil-fill text-warning me-2"></i>
                                        Post updated
                                    </div>
                                    <small class="text-muted">Yesterday</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-trash-fill text-danger me-2"></i>
                                        User deleted
                                    </div>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Quick Actions
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary mb-2">
                                    <i class="bi bi-plus-circle me-2"></i> Add New Post
                                </button>
                                <button class="btn btn-success mb-2">
                                    <i class="bi bi-person-plus me-2"></i> Add New User
                                </button>
                                <button class="btn btn-warning mb-2">
                                    <i class="bi bi-gear me-2"></i> Settings
                                </button>
                                <button class="btn btn-info">
                                    <i class="bi bi-graph-up me-2"></i> View Reports
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            // Toggle sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
                
                // Change icon based on state
                const icon = this.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.remove('bi-list');
                    icon.classList.add('bi-x');
                } else {
                    icon.classList.remove('bi-x');
                    icon.classList.add('bi-list');
                }
            });
            
            // Handle menu toggles for Posts and Users
            const menuToggleBtns = document.querySelectorAll('.menu-toggle-btn');
            
            menuToggleBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const menuId = this.getAttribute('data-menu');
                    const menu = document.getElementById(`${menuId}-menu`);
                    const toggleIcon = this.querySelector('.menu-toggle');
                    
                    // Close other menus
                    document.querySelectorAll('.sub-menu').forEach(m => {
                        if (m.id !== `${menuId}-menu`) {
                            m.classList.remove('show');
                        }
                    });
                    
                    // Reset other toggle icons
                    document.querySelectorAll('.menu-toggle').forEach(icon => {
                        if (icon !== toggleIcon) {
                            icon.classList.remove('rotated');
                        }
                    });
                    
                    // Toggle current menu
                    menu.classList.toggle('show');
                    toggleIcon.classList.toggle('rotated');
                });
            });
            
            // Responsive behavior for mobile
            function handleResize() {
                if (window.innerWidth < 768) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.remove('expanded');
                } else {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                }
            }
            
            // Initial call and event listener
            handleResize();
            window.addEventListener('resize', handleResize);
        });
    </script>
</body>
</html>