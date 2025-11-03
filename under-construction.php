<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Careers | Jolaha Tech</title>
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


<!-- Under Construction Section -->
<section class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: var(--bg-light);">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-md-10">
                <!-- Animated Icon -->
                <div class="mb-5">
                    <div class="construction-icon">
                        <i class="bi bi-tools display-1 text-primary"></i>
                        <i class="bi bi-hammer display-1 text-secondary position-absolute start-50 translate-middle"></i>
                    </div>
                </div>

                <!-- Content -->
                <h1 class="display-4 fw-bold mb-4" style="color: var(--secondary);">
                    Under Construction
                </h1>
                
                <p class="lead mb-4" style="color: var(--surface);">
                    We're working hard to bring you something amazing! This page is currently being built 
                    and will be available soon.
                </p>

                <!-- Progress Bar -->
                <div class="progress mb-4" style="height: 8px; background: var(--surface);">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                         role="progressbar" 
                         style="width: 75%; background-color: var(--primary);" 
                         aria-valuenow="75" 
                         aria-valuemin="0" 
                         aria-valuemax="100">
                    </div>
                </div>

                <p class="text-muted mb-5">
                    Estimated completion: <strong>2 weeks</strong>
                </p>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-5">
                    <a href="index.php" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-house me-2"></i>Back to Home
                    </a>
                    <a href="contact.php" class="btn btn-outline-primary btn-lg px-4">
                        <i class="bi bi-envelope me-2"></i>Contact Us
                    </a>
                </div>

                <!-- Countdown Timer (Optional) -->
                <div class="card border-0 mt-4" style="background: var(--surface);">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: var(--heading);">
                            <i class="bi bi-clock me-2"></i>Launch Countdown
                        </h5>
                        <div class="countdown-timer d-flex justify-content-center gap-3">
                            <div class="text-center">
                                <div class="countdown-number">14</div>
                                <small class="text-light">Days</small>
                            </div>
                            <div class="text-center">
                                <div class="countdown-number">06</div>
                                <small class="text-light">Hours</small>
                            </div>
                            <div class="text-center">
                                <div class="countdown-number">45</div>
                                <small class="text-light">Minutes</small>
                            </div>
                            <div class="text-center">
                                <div class="countdown-number">30</div>
                                <small class="text-light">Seconds</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Signup -->
                <div class="card border-0 mt-4" style="background: var(--surface);">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: var(--heading);">
                            <i class="bi bi-bell me-2"></i>Get Notified When We Launch
                        </h5>
                        <form class="row g-2">
                            <div class="col-md-8">
                                <input type="email" class="form-control" placeholder="Enter your email address" required>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Notify Me</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Simple countdown timer
    function updateCountdown() {
        const countdownElements = document.querySelectorAll('.countdown-number');
        // Set your launch date here
        const launchDate = new Date('2025-11-30T00:00:00').getTime();
        const now = new Date().getTime();
        const distance = launchDate - now;

        if (distance < 0) {
            document.querySelector('.countdown-timer').innerHTML = '<div class="text-success">Launched!</div>';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const values = [
            days.toString().padStart(2, '0'),
            hours.toString().padStart(2, '0'),
            minutes.toString().padStart(2, '0'),
            seconds.toString().padStart(2, '0')
        ];

        countdownElements.forEach((element, index) => {
            element.textContent = values[index];
        });
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);
    updateCountdown(); // Initial call
</script>

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>