<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hosting Solutions | Jolaha Tech</title>
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

  <!-- Hero -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">Hosting <span style="color: var(--secondary);">Solutions</span></h1>
      <p class="lead px-2 px-md-5">
        High-performance hosting solutions tailored for businesses of all sizes, ensuring uptime, speed, and reliability.
      </p>
    </div>
  </section>

  <!-- Hosting Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Left Content -->
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Reliable & Scalable Hosting</h2>
          <p class="lead mb-4" style="color: var(--text);">
            Jolaha Tech provides fully managed hosting solutions that deliver optimal performance, robust security, and guaranteed uptime — giving your business the infrastructure it deserves.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Shared, VPS & Dedicated Hosting</li>
                <li>Managed WordPress Hosting</li>
                <li>Domain & Email Hosting</li>
                <li>99.9% Uptime Guarantee</li>
                <li>24/7 Monitoring & Support</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Reliable performance and uptime</li>
                <li>Secure hosting with SSL & backups</li>
                <li>Flexible plans to fit your needs</li>
                <li>Expert support around the clock</li>
              </ul>
            </div>
          </div>

          <!-- Featured Offer -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Business Hosting Package</h4>
            <p style="color: var(--text);" class="mb-3">
              Includes domain registration, SSL certificate, business-class email accounts, daily backups, and managed WordPress hosting optimized for speed and security.
            </p>
            <a href="solutions.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
              View Other Solutions
              <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>
        </div>

        <!-- Right Form -->
        <div class="col-lg-4">
          <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
            <form>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
              </div>
              <div class="mb-3">
                <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  <option>Project Budget</option>
                  <option>Below $5,000</option>
                  <option>$5,000 - $20,000</option>
                  <option>$20,000 - $50,000</option>
                  <option>$50,000+</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                Submit Request
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Use Cases -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Benefits from Hosting?</h2>
          <p class="lead mb-5" style="color: var(--text);">From startups to enterprises, our hosting plans are built to support growth and reliability.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-bag-check fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">E-commerce Stores</h5>
                <p style="color: var(--text);">Fast, secure hosting to keep your online shop running 24/7.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-briefcase fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Businesses</h5>
                <p style="color: var(--text);">Reliable hosting with professional email to strengthen brand presence.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-file-earmark-code fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Developers</h5>
                <p style="color: var(--text);">Flexible VPS and dedicated hosting tailored for developers and tech teams.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">What Clients Say</h2>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Our site uptime has been flawless. Jolaha’s hosting is truly reliable.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Sarah T., CEO</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Fast support and seamless WordPress hosting — exactly what we needed.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— David M., Entrepreneur</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Affordable hosting that scales as our business grows. Highly recommend.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Laila A., Startup Founder</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>