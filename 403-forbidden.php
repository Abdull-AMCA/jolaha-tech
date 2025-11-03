<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Access Denied - 403 Forbidden | Jolaha Tech</title>
  <!-- Browser Favicon -->
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

  <!-- Header / Navigation -->
  <?php
  include 'includes/header-navbar.php';
  ?>

    <!-- 403 Error Section -->
    <section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 col-md-8">
                    <!-- Error Code -->
                    <div class="error-code mb-4">
                        <h1 class="display-1 fw-bold text-warning">403</h1>
                    </div>

                    <h1 class="display-4 fw-bold mb-4" style="color: var(--secondary);">
                        Access Denied
                    </h1>
                    
                    <p class="lead mb-4 text-dark" style="color: var(--surface);">
                        You don't have permission to access this resource. This area is restricted 
                        to authorized users only.
                    </p>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5">
                        <a href="index.php" class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-house me-2"></i>Back to Homepage
                        </a>
                        <a href="login.php" class="btn btn-success btn-lg px-4">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login
                        </a>
                    </div>

                    <!-- Possible Reasons -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-shield-exclamation me-2"></i>Why did this happen?
                            </h5>
                            <ul class="list-unstyled text-light">
                                <li class="mb-2">• You may not be logged in</li>
                                <li class="mb-2">• Your account doesn't have sufficient permissions</li>
                                <li class="mb-2">• The resource requires special access rights</li>
                                <li class="mb-2">• IP address restrictions may be in place</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Admin -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-person-gear me-2"></i>Need Access?
                            </h5>
                            <p class="card-text text-light mb-3">
                                If you believe you should have access to this resource, please contact the administrator.
                            </p>
                            <a href="contact-us.php" class="btn btn-warning">
                                <i class="bi bi-person-badge me-2"></i>Request Access
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>
    </html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>