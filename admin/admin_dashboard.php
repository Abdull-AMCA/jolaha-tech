<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
?>

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
                            <div class="stat-title">Total Products</div>
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
                            <div class="stat-number">24</div>
                            <span class="stat-title">New Submissions</span>
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
                                        New product added: Jolaha CRMS
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
                                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                                        New contact form submission
                                    </div>
                                    <small class="text-muted">Yesterday</small>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-cart-check-fill text-info me-2"></i>
                                        New trial request for Jolaha HRMS
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
                                    <i class="bi bi-plus-circle me-2"></i> Add New Product
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

<!-- Main Container Closing Div in Footer page -->

<?php
include 'includes/admin-footer.php';
?>