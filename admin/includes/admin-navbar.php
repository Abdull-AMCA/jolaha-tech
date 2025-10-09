<body>
    <div class="main-container">
        <!-- Top Navigation Bar -->
        <nav class="navbar top-navbar">
            <div class="container-fluid">
                <!-- Logo and mobile toggle on the left -->
                <div class="d-flex align-items-center">
                    <button class="mobile-sidebar-toggle" id="mobileSidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a href="#" class="navbar-logo">
                        <!-- SVG Logo as data URI -->
                        <img src="resources/img/logo.svg" alt="Jolaha Logo" class="logo-img">
                        <span class="logo-text">Tech<span class="logo-accent">.</span></span>
                    </a>
                </div>
                
                <!-- Right-aligned user profile -->
                <div class="user-profile">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=7125eb&color=ffffff&bold=true" alt="User" class="user-img">
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