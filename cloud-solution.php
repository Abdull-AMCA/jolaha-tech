<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cloud Services | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Cloud <span style="color: var(--secondary);">Solutions</span></h1>
      <p class="lead px-2 px-md-5">
        Scalable and secure cloud solutions to accelerate digital transformation and improve business agility.
      </p>
    </div>
  </section>

  <!-- Cloud Service Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <!-- Left Content -->
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Empowering Businesses with Cloud</h2>
          <p class="lead mb-4" style="color: var(--text);">
            Jolaha Tech helps organizations move to the cloud with tailored solutions that enhance scalability, security, and flexibility — enabling you to innovate faster and reduce infrastructure costs.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Cloud Migration Services</li>
                <li>Infrastructure as a Service (IaaS)</li>
                <li>Platform as a Service (PaaS)</li>
                <li>Cloud Backup & Disaster Recovery</li>
                <li>Multi-Cloud & Hybrid Cloud Solutions</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Scale resources on-demand</li>
                <li>Boost collaboration and mobility</li>
                <li>Reduce IT infrastructure costs</li>
                <li>Improve system resilience and security</li>
              </ul>
            </div>
          </div>

          <!-- Featured Offer -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Cloud Transformation Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              Our comprehensive package includes cloud migration, workload optimization, AI-driven monitoring, and 24/7 cloud operations support to ensure your business runs smoothly in the cloud.
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
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Benefits from Cloud?</h2>
          <p class="lead mb-5" style="color: var(--text);">Our cloud services are designed to support a wide range of industries and business needs.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Enterprises</h5>
                <p style="color: var(--text);">Transform legacy systems into agile, cloud-native platforms.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-people fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">SMBs</h5>
                <p style="color: var(--text);">Leverage affordable, scalable cloud solutions to compete effectively.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-globe fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Remote Teams</h5>
                <p style="color: var(--text);">Access applications and files securely from anywhere in the world.</p>
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
                <p style="color: var(--text);">“Migrating to the cloud with Jolaha Tech was seamless. We now scale operations effortlessly.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Ali K., CTO</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Our remote teams collaborate better with secure cloud access. Highly recommend Jolaha Tech.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Priya S., Project Manager</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <p style="color: var(--text);">“Disaster recovery is no longer a worry. Jolaha’s cloud backup saved us multiple times.”</p>
                <h6 class="mt-3" style="color: var(--heading);">— Mark R., CIO</h6>
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
