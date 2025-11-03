<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Error - 500 Internal Server Error | Jolaha Tech</title>
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

    <!-- 500 Error Section -->
    <section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 col-md-8">
                    <!-- Error Code -->
                    <div class="error-code mb-4">
                        <h1 class="display-1 fw-bold text-danger">500</h1>
                    </div>

                    <h1 class="display-4 fw-bold mb-4" style="color: var(--secondary);">
                        Internal Server Error
                    </h1>
                    
                    <p class="lead mb-4 text-dark" style="color: var(--surface);">
                        We're experiencing some technical difficulties. Our team has been notified 
                        and is working to fix the issue. Please try again later.
                    </p>

                    <!-- Status Information -->
                    <div class="alert alert-warning mb-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                            <div>
                                <strong>Service Status:</strong> We're working on a fix
                                <br>
                                <small>Last updated: <?php echo date('M j, Y g:i A'); ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5">
                        <button onclick="window.location.reload()" class="btn btn-secondary btn-lg px-4">
                            <i class="bi bi-arrow-clockwise me-2"></i>Try Again
                        </button>
                        <a href="index.php" class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-house me-2"></i>Go Home
                        </a>
                    </div>

                    <!-- Technical Details -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-gear me-2"></i>What happened?
                            </h5>
                            <ul class="list-unstyled text-light">
                                <li class="mb-2">• Our servers encountered an unexpected condition</li>
                                <li class="mb-2">• The issue has been logged and our team is investigating</li>
                                <li class="mb-2">• This is usually temporary and will be resolved shortly</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-envelope me-2"></i>Still need help?
                            </h5>
                            <p class="card-text text-light mb-3">
                                If the problem persists, please contact our support team with details about what you were doing when the error occurred.
                            </p>
                            <a href="contact-us.php" class="btn btn-danger">
                                <i class="bi bi-headset me-2"></i>Contact Support
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