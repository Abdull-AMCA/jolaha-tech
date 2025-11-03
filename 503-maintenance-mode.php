<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance Mode | Jolaha Tech</title>
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

    <!-- Maintenance Section -->
    <section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-md-10">
                    <!-- Maintenance Icon -->
                    <div class="mb-5">
                        <i class="bi bi-gear display-1 text-primary"></i>
                        <i class="bi bi-lightning-charge display-1 text-warning position-absolute start-50 translate-middle"></i>
                    </div>

                    <h1 class="display-4 fw-bold mb-4" style="color: var(--secondary);">
                        Scheduled Maintenance
                    </h1>
                    
                    <p class="lead mb-4 text-dark" style="color: var(--surface);">
                        We're currently performing scheduled maintenance to improve your experience. 
                        The website will be back online shortly.
                    </p>

                    <!-- Maintenance Details -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8">
                            <div class="card border-0" style="background: var(--surface);">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <i class="bi bi-clock-history display-6 text-primary mb-3"></i>
                                            <h5 class="text-light">Estimated Duration</h5>
                                            <p class="text-light mb-0">2-4 hours</p>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="bi bi-calendar-event display-6 text-primary mb-3"></i>
                                            <h5 class="text-light">Maintenance Window</h5>
                                            <p class="text-light mb-0">
                                                <?php echo date('M j, Y'); ?><br>
                                                10:00 PM - 2:00 AM EST
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-dark">Maintenance Progress</span>
                            <span class="text-dark">60%</span>
                        </div>
                        <div class="progress" style="height: 8px; background: var(--surface);">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                role="progressbar" 
                                style="width: 60%; background-color: var(--primary);" 
                                aria-valuenow="60" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                    <!-- Updates -->
                    <div class="card border-0 mt-4" style="background: var(--surface);">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--heading);">
                                <i class="bi bi-megaphone me-2"></i>Latest Update
                            </h5>
                            <div class="update-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-info-circle text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="mb-1 text-light"><strong>Database Optimization</strong></p>
                                        <p class="text-light mb-0">We're currently optimizing our database for better performance. This process is 60% complete.</p>
                                        <small class="text-light">Updated 5 minutes ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links
                    <div class="mt-5">
                        <p class="text-dark mb-3">Follow us for updates:</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <script>
        // Auto-refresh the page every 5 minutes to check if maintenance is over
        setTimeout(function() {
            window.location.reload();
        }, 300000); // 5 minutes
    </script>

    </body>
    </html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>