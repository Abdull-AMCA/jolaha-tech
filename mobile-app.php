<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mobile Application | Jolaha Tech</title>
  <!-- Browser Favicon -->
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
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
      <h1 class="display-4 fw-bold">Mobile <span style="color: var(--secondary);">Application</span></h1>
      <p class="lead px-2 px-md-5">Custom mobile apps built for iOS, Android, and cross-platform that help businesses scale, engage customers, and innovate faster.</p>
    </div>
  </section>

  <!-- Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Mobile Application Development</h2>
          <p class="lead mb-4" style="color: var(--text);">
            We build high-performance, scalable, and user-friendly mobile applications tailored to your business needs—whether native, hybrid, or cross-platform solutions.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Native iOS & Android Development</li>
                <li>Cross-Platform Apps (Flutter, React Native)</li>
                <li>API Integration & Backend Development</li>
                <li>App Store Deployment & Support</li>
                <li>UI/UX Optimized Design</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Reach wider mobile audiences</li>
                <li>Boost user engagement & retention</li>
                <li>Seamless integration with your systems</li>
                <li>Scalable and secure architecture</li>
              </ul>
            </div>
          </div>

          <!-- Featured Package -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Business App Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              A complete solution including native iOS & Android apps, push notifications, API integrations, and one year of support.
            </p>
            <a href="contact-us.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
              Request a Quote
              <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <!-- Request a Quote Form -->
          <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
            <form>
              <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
              <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
              <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
              <div class="mb-3">
                <select class="form-select">
                  <option>App Budget</option>
                  <option>Below $10,000</option>
                  <option>$10,000 - $50,000</option>
                  <option>$50,000 - $100,000</option>
                  <option>$100,000+</option>
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
          <p class="lead mb-5" style="color: var(--text);">Our mobile app solutions are tailored for diverse industries and businesses.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-shop fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Retail & E-commerce</h5>
                <p style="color: var(--text);">Boost customer loyalty and sales with custom mobile apps.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-hospital fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Healthcare</h5>
                <p style="color: var(--text);">Enhance patient engagement and streamline healthcare services.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-bank fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Finance & Banking</h5>
                <p style="color: var(--text);">Enable secure, scalable mobile solutions for financial services.</p>
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
