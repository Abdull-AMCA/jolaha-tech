<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Marketing | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Online <span style="color: var(--secondary);">Marketing</span></h1>
      <p class="lead px-2 px-md-5">Boost your brand visibility, engage customers, and generate leads with tailored digital marketing strategies.</p>
    </div>
  </section>

  <!-- Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Digital Marketing Services</h2>
          <p class="lead mb-4" style="color: var(--text);">
            Our online marketing services help your business thrive in the digital landscape by building impactful campaigns that attract, engage, and convert customers.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Search Engine Optimization (SEO)</li>
                <li>Pay-Per-Click Advertising (PPC)</li>
                <li>Social Media Marketing & Management</li>
                <li>Email Campaigns & Automation</li>
                <li>Analytics & Performance Tracking</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Increase brand visibility</li>
                <li>Drive qualified leads</li>
                <li>Engage customers across platforms</li>
                <li>Boost ROI with targeted campaigns</li>
              </ul>
            </div>
          </div>

          <!-- Featured Package -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Growth Marketing Bundle</h4>
            <p style="color: var(--text);" class="mb-3">
              A complete package with SEO optimization, social media management, PPC campaigns, and monthly performance reports to grow your brand.
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
                  <option>Marketing Budget</option>
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
          <p class="lead mb-5" style="color: var(--text);">We design marketing strategies for businesses across industries.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-shop fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">E-commerce Brands</h5>
                <p style="color: var(--text);">Drive more traffic and boost sales through targeted ads and SEO.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">SMEs</h5>
                <p style="color: var(--text);">Expand your brand reach and build long-term customer relationships.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-globe fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Global Enterprises</h5>
                <p style="color: var(--text);">Optimize multi-channel campaigns for global impact and visibility.</p>
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

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>