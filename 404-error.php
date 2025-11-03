<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error - 404 | Jolaha Tech</title>
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

    <!-- 404 Error Section -->
    <section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 col-md-8">
                    <!-- Error Code -->
                    <div class="error-code mb-4">
                        <h1 class="display-1 fw-bold text-primary">404</h1>
                    </div>

                    <h1 class="display-4 fw-bold mb-4" style="color: var(--secondary);">
                        Page Not Found
                    </h1>
                    
                    <p class="lead mb-4 text-dark" style="color: var(--surface);">
                        Sorry, we couldn't find the page you're looking for. The page might have been moved, 
                        deleted, or you entered the wrong URL.
                    </p>

                    <!-- Search Box -->
                    <div class="mb-5">
                        <form action="search.php" method="GET" class="d-flex gap-2">
                            <input type="text" name="q" class="form-control form-control-lg" 
                                placeholder="Search our website..." required>
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Quick Links -->
                    <div class="mb-5">
                        <p class="text-muted mb-3">Here are some helpful links instead:</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="index.php" class="btn btn-primary">
                                <i class="bi bi-house me-2"></i>Homepage
                            </a>
                            <a href="our-services.php" class="btn btn-success">
                                <i class="bi bi-briefcase me-2"></i>Our Services
                            </a>
                        </div>
                    </div>

                    <!-- Additional Help -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-question-circle me-2"></i>Need Help?
                            </h5>
                            <p class="card-text text-light mb-3">
                                If you believe this is an error or need immediate assistance, please contact our support team.
                            </p>
                            <a href="contact-us.php" class="btn btn-primary">
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