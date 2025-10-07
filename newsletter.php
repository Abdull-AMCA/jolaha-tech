<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newsletter | Jolaha Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

<!-- Header / Navigation -->
<?php
include 'includes/header-navbar.php';
?>

  <!-- Hero -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">Newsletter</span></h1>
      <p class="lead px-2 px-md-5">
        Stay updated with the latest insights, tech trends, and company news delivered right to your inbox.
      </p>
    </div>
  </section>

  <!-- Newsletter Intro -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Content -->
        <div class="col-lg-8">
        <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Your Monthly Tech Digest</h2>
        <p class="lead mb-4" style="color: var(--text);">
          Our newsletter brings you curated updates from the IT world, product announcements, industry insights, and best practices to help your business grow.
        </p>

        <!-- Latest Highlights -->
        <div class="row mb-5">
          <div class="col-md-6">
            <h4 style="color: var(--primary);">What’s Inside</h4>
            <ul style="color: var(--text);">
              <li>Industry news & analysis</li>
              <li>New product features</li>
              <li>Expert IT tips & guides</li>
              <li>Upcoming events & webinars</li>
              <li>Exclusive offers</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4 style="color: var(--primary);">Why Subscribe?</h4>
            <ul style="color: var(--text);">
              <li>Stay ahead of IT trends</li>
              <li>Get early access to new services</li>
              <li>Boost productivity with practical tips</li>
              <li>Learn from industry experts</li>
            </ul>
          </div>
        </div>

        <!-- Featured Issue -->
        <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary);" class="mb-3">Featured: September 2025 Issue</h4>
          <p style="color: var(--text);" class="mb-3">
            Explore insights on cloud adoption, the future of AI-driven solutions, and highlights from our latest Jolaha LMS release.
          </p>
          <a href="resources.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
            View All Resources
            <i class="bi bi-arrow-right ms-2"></i>
          </a>
          </div>
        </div>

        <!-- Subscription Form -->
        <div class="col-lg-4">
          <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Subscribe Today</h4>
            <form form method="POST">
              <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
              </div>
              <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" name="newsletter_submit" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                Subscribe Now
              </button>
            </form>
          </div>
          </div>
            <?php
              $subscription_result = null;

              if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletter_submit'])) {
                  $subscription_result = handle_newsletter_subscription();
              }
            ?>
        </div>

      <!-- Previous Issues -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Previous Issues</h2>
          <p class="lead mb-5" style="color: var(--text);">Catch up on past editions of the Jolaha Newsletter.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <h5 style="color: var(--heading);">August 2025</h5>
                <p style="color: var(--text);">Cloud security insights, HRMS product updates, and webinar highlights.</p>
                <a href="#" class="btn btn-outline-primary mt-2">Read More</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <h5 style="color: var(--heading);">July 2025</h5>
                <p style="color: var(--text);">AI in CRM, best practices for remote work, and our success stories.</p>
                <a href="#" class="btn btn-outline-primary mt-2">Read More</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <h5 style="color: var(--heading);">June 2025</h5>
                <p style="color: var(--text);">Latest in IT support, software testing trends, and client spotlights.</p>
                <a href="#" class="btn btn-outline-primary mt-2">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>

  <!-- Newsletter Success Modal -->
  <div class="modal fade" id="newslettersuccessModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="successModalLabel" style="color: var(--secondary);">
            Subscription Successful 🎉
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Thank you for subscribing to <strong>Jolaha Tech</strong>! You’ll now receive updates, insights, and offers directly in your inbox.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Newsletter Error Modal -->
  <div class="modal fade" id="newslettererrorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="errorModalLabel" style="color: #dc3545;">
            Subscription Failed ⚠️
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="newslettererrorModalMessage">An unexpected error occurred. Please try again later.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>