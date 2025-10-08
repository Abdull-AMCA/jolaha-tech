<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRMS | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">HRMS</span></h1>
      <p class="lead px-2 px-md-5">Powerful Human Resource Management System to simplify employee management, payroll, and workforce planning.</p>
    </div>
  </section>

  <!-- HRMS Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha HRMS</h2>
          <p class="lead mb-4" style="color: var(--text);">
            A modern Human Resource Management System built to streamline employee lifecycle, improve productivity, and empower data-driven HR decisions.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Employee Records Management</li>
                <li>Payroll & Tax Automation</li>
                <li>Attendance & Leave Tracking</li>
                <li>Performance & Appraisals</li>
                <li>Recruitment & Onboarding</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Reduce manual HR tasks by 60%</li>
                <li>Ensure payroll accuracy & compliance</li>
                <li>Boost employee satisfaction</li>
                <li>Gain real-time workforce insights</li>
              </ul>
            </div>
          </div>

          <!-- Featured Sub-Product -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise HR Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              Our advanced HRMS suite includes payroll compliance, talent acquisition, and workforce analytics tailored for large enterprises.
            </p>
            <a href="our-products.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
              View Other Products
              <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <!-- Get Free Trial Form -->
          <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
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
                  <option>Company Size</option>
                  <option>1-10 employees</option>
                  <option>11-50 employees</option>
                  <option>51-200 employees</option>
                  <option>200+ employees</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                Start 14-Day Free Trial
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Use Cases Section -->
      <section class="py-5">
        <div class="container text-center">
          <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Can Benefit?</h2>
          <p class="lead mb-5" style="color: var(--text);">Jolaha HRMS is designed for businesses of all sizes to manage people effectively and boost workplace efficiency.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-people fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">SMEs & Startups</h5>
                <p style="color: var(--text);">Automate HR tasks without needing a large HR team.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Corporates</h5>
                <p style="color: var(--text);">Manage large workforces efficiently with integrated HR tools.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-mortarboard fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Educational Institutions</h5>
                <p style="color: var(--text);">Track faculty, staff, and student employees with ease.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Featured Clients Carousel -->
      <div class="mt-5">
        <h4 style="color: var(--secondary);" class="mb-4">Trusted by Industry Leaders</h4>
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

  <!-- Pricing Section -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">Choose Your Plan</h2>
      <p class="lead mb-5" style="color: var(--text);">Affordable HR solutions tailored to your business size.</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Starter</h4>
            <p style="color: var(--text);">For small teams</p>
            <h2 style="color: var(--heading);">$39<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Core HR features</li>
              <li>Leave & Attendance</li>
              <li>Up to 20 employees</li>
            </ul>
            <a href="#" class="btn btn-primary mt-3">Get Started</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Professional</h4>
            <p style="color: var(--text);">For growing companies</p>
            <h2 style="color: var(--heading);">$99<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Payroll & Tax automation</li>
              <li>Performance tracking</li>
              <li>Up to 100 employees</li>
            </ul>
            <a href="#" class="btn btn-primary mt-3">Start Free Trial</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Enterprise</h4>
            <p style="color: var(--text);">For large organizations</p>
            <h2 style="color: var(--heading);">Custom</h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Unlimited employees</li>
              <li>Custom integrations</li>
              <li>Dedicated support</li>
            </ul>
            <a href="#" class="btn btn-primary mt-3">Contact Sales</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Integrations Section 
  <section class="py-5" style="background-color: var(--surface);">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">Seamless Integrations</h2>
      <p class="lead mb-5" style="color: var(--text);">Connect Jolaha HRMS with payroll, accounting, and collaboration tools you already use.</p>
      <div class="d-flex justify-content-center flex-wrap gap-5">
        <img src="resources/img/integration-slack.png" alt="Slack" class="img-fluid" style="height: 50px;">
        <img src="resources/img/integration-gmail.png" alt="Gmail" class="img-fluid" style="height: 50px;">
        <img src="resources/img/integration-quickbooks.png" alt="QuickBooks" class="img-fluid" style="height: 50px;">
        <img src="resources/img/integration-zoom.png" alt="Zoom" class="img-fluid" style="height: 50px;">
      </div>
    </div>
  </section-->

  <!-- Testimonials Section -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">What Our Clients Say</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“Payroll and compliance are no longer a headache — Jolaha HRMS automates everything seamlessly.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Priya S., HR Manager</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“Managing leave and attendance has never been this easy. Our employees love the self-service portal.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Ahmed R., Operations Head</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“The recruitment and onboarding features helped us scale quickly with zero chaos.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Elena G., Talent Acquisition Lead</h6>
          </div>
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