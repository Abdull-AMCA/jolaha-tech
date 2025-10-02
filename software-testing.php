<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Software Testing | Jolaha Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

  <!-- Header / Navigation -->
  <?php
  include 'includes/header-navbar.php';
  ?>

  <!-- Hero Section -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">Software <span style="color: var(--secondary);">Testing</span></h1>
      <p class="lead px-2 px-md-5">Delivering high-quality, bug-free software with our comprehensive manual and automated testing services.</p>
    </div>
  </section>

  <!-- Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Software Testing Services</h2>
          <p class="lead mb-4" style="color: var(--text);">
            Our end-to-end software testing solutions ensure your applications perform flawlessly, meet compliance, and deliver a seamless user experience.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Functional & Regression Testing</li>
                <li>Automated Testing Frameworks</li>
                <li>Performance & Load Testing</li>
                <li>Security & Penetration Testing</li>
                <li>Cross-Platform & Device Testing</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Detect issues early in the lifecycle</li>
                <li>Ensure optimal performance under pressure</li>
                <li>Protect against vulnerabilities</li>
                <li>Accelerate release cycles with confidence</li>
              </ul>
            </div>
          </div>

          <!-- Featured Package -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: QA Automation Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              A complete package offering test automation setup, CI/CD integration, and real-time test reporting dashboards.
            </p>
            <a href="contact.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
              Request a Quote
              <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>
        </div>

        <!-- Quote Form -->
        <div class="col-lg-4">
          <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
            <form>
              <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
              <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
              <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
              <div class="mb-3">
                <select class="form-select">
                  <option>Testing Budget</option>
                  <option>Below $5,000</option>
                  <option>$5,000 - $20,000</option>
                  <option>$20,000 - $50,000</option>
                  <option>$50,000+</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Submit Request</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Use Cases Section -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Can Benefit?</h2>
          <p class="lead mb-5" style="color: var(--text);">Our testing services support organizations at every stage of their software lifecycle.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-lightning-charge fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Startups</h5>
                <p style="color: var(--text);">Launch products faster with reliable QA processes ensuring stability and performance.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-code-slash fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Software Companies</h5>
                <p style="color: var(--text);">Deliver high-quality apps with confidence using advanced test automation and QA frameworks.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-bank fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Enterprises</h5>
                <p style="color: var(--text);">Protect mission-critical systems with robust performance, compliance, and security testing.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Clients Carousel -->
      <div class="mt-5">
        <h4 style="color: var(--secondary);" class="mb-4">Trusted by Businesses Worldwide</h4>
        <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
          <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
          <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
          <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
          <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
          <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

</body>
</html>
