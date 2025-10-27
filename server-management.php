<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Management | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Server <span style="color: var(--secondary);">Management</span></h1>
      <p class="lead px-2 px-md-5">
        Ensure peak performance, uptime, and security with our expert server management solutions for on-premises and cloud-based infrastructures.
      </p>
    </div>
  </section>

  <!-- Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Comprehensive Server Management</h2>
          <p class="lead mb-4" style="color: var(--text);">
            Our dedicated server management services give your business the confidence of reliable performance, strong security, and reduced downtime, allowing your team to focus on growth instead of IT headaches.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>24/7 Monitoring & Maintenance</li>
                <li>Patch & Update Management</li>
                <li>Disaster Recovery & Backup</li>
                <li>Performance Optimization</li>
                <li>Security Hardening</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Minimize downtime</li>
                <li>Protect against cyber threats</li>
                <li>Boost infrastructure efficiency</li>
                <li>Lower IT operating costs</li>
              </ul>
            </div>
          </div>

          <!-- Featured Offer -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Server Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              Advanced enterprise-grade server management package including cloud failover solutions, AI-driven monitoring, and 24/7 dedicated support.
            </p>
            <a href="our-solutions.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
              View Other Solutions
              <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>
        </div>

        <!-- Request Quote Form -->
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

      <!-- Use Cases Section -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Needs Server Management?</h2>
          <p class="lead mb-5" style="color: var(--text);">Our server management services are designed for businesses of all scales and industries.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-buildings fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Enterprises</h5>
                <p style="color: var(--text);">Maintain reliable performance across multiple servers and cloud environments.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-shop fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">SMEs</h5>
                <p style="color: var(--text);">Get enterprise-level server management tailored to your budget and needs.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-cloud-check fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Cloud-First Companies</h5>
                <p style="color: var(--text);">Optimize hybrid or full-cloud infrastructures with proactive monitoring.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials Section -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">What Clients Say</h2>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Jolaha Tech keeps our servers running 24/7 with zero downtime. Their proactive monitoring is unmatched.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Ahmed K., IT Director</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“We saved costs and improved security with Jolaha’s managed server solutions.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Maria L., COO</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Their disaster recovery solution gave us peace of mind during unexpected outages.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Raj P., IT Manager</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

</body>
</html>
