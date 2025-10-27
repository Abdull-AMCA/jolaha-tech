<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT Support | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">IT Support <span style="color: var(--secondary);">Solution</span></h1>
      <p class="lead px-2 px-md-5">
        Reliable IT support services to resolve issues quickly, optimize operations, and keep your business running smoothly.
      </p>
    </div>
  </section>

  <!-- Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Left Content -->
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Comprehensive IT Support</h2>
          <p class="lead mb-4" style="color: var(--text);">
            From day-to-day troubleshooting to proactive IT management, Jolaha Tech provides comprehensive IT support solutions that enhance productivity, reduce downtime, and secure your business operations.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>24/7 Help Desk & Remote Support</li>
                <li>On-Site Technical Assistance</li>
                <li>Network Troubleshooting</li>
                <li>Software Installation & Updates</li>
                <li>End-User Training & Assistance</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Reduce downtime and disruptions</li>
                <li>Boost employee productivity</li>
                <li>Fast response to IT issues</li>
                <li>Cost-effective tech support</li>
              </ul>
            </div>
          </div>

          <!-- Featured Offer -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Managed IT Support Package</h4>
            <p style="color: var(--text);" class="mb-3">
              Includes unlimited remote support, priority issue resolution, proactive system monitoring, and monthly IT health reports to ensure smooth business operations.
            </p>
            <a href="our-solutions.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Benefits from IT Support?</h2>
          <p class="lead mb-5" style="color: var(--text);">Our IT support services are ideal for businesses of every size and industry.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Small Businesses</h5>
                <p style="color: var(--text);">Affordable support solutions for growing companies without dedicated IT staff.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-diagram-3 fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Enterprises</h5>
                <p style="color: var(--text);">Supplement in-house IT teams with extra capacity and specialized expertise.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-briefcase fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Remote Teams</h5>
                <p style="color: var(--text);">Empower distributed teams with reliable tech support from anywhere.</p>
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
                <p style="color: var(--text);">“Jolaha’s IT support team resolves issues before they become problems. They keep our systems stable.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Sarah T., Operations Manager</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“The 24/7 support is a lifesaver for our remote team. Issues get solved within minutes.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— James P., CEO</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“We no longer worry about downtime. Jolaha Tech is like our extended IT department.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Lina M., HR Director</h6>
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