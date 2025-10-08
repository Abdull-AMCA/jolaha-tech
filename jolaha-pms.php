<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMS | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">PMS</span></h1>
      <p class="lead px-2 px-md-5">An all-in-one Project Management System to streamline planning, task allocation, collaboration, and project delivery.</p>
    </div>
  </section>

  <!-- PMS Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha PMS</h2>
          <p class="lead mb-4" style="color: var(--text);">
            A modern, intuitive project management solution designed to help teams stay organized, meet deadlines, and achieve business goals effectively.
          </p>

          <div class="row mb-5">
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Key Features</h4>
              <ul style="color: var(--text);">
                <li>Task & Milestone Management</li>
                <li>Team Collaboration Tools</li>
                <li>Gantt Charts & Kanban Boards</li>
                <li>Time Tracking & Reporting</li>
                <li>Resource Allocation & Planning</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h4 style="color: var(--primary);">Benefits</h4>
              <ul style="color: var(--text);">
                <li>Boost team productivity</li>
                <li>Enhance project visibility</li>
                <li>Deliver projects on time & budget</li>
                <li>Improve collaboration & accountability</li>
              </ul>
            </div>
          </div>

          <!-- Featured Sub-Product -->
          <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--secondary);" class="mb-3">Featured: Agile Project Suite</h4>
            <p style="color: var(--text);" class="mb-3">
              Designed for agile teams, this suite includes sprint planning tools, backlog management, and real-time progress tracking.
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
          <p class="lead mb-5" style="color: var(--text);">Jolaha PMS empowers teams across industries to plan, collaborate, and deliver projects successfully.</p>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-kanban fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Agencies & Consultants</h5>
                <p style="color: var(--text);">Manage multiple client projects seamlessly and deliver on time.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-diagram-3 fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">IT & Software Teams</h5>
                <p style="color: var(--text);">Plan sprints, track issues, and stay agile with robust tools.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
                <i class="bi bi-people fs-1 mb-3" style="color: var(--primary);"></i>
                <h5 style="color: var(--heading);">Enterprises</h5>
                <p style="color: var(--text);">Coordinate large teams, allocate resources, and track KPIs.</p>
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
      <p class="lead mb-5" style="color: var(--text);">Flexible plans to suit teams of all sizes.</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Starter</h4>
            <p style="color: var(--text);">For freelancers & small teams</p>
            <h2 style="color: var(--heading);">$19<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Task management</li>
              <li>Basic reporting</li>
              <li>Up to 5 users</li>
            </ul>
            <a href="#" class="btn btn-primary mt-3">Get Started</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Professional</h4>
            <p style="color: var(--text);">For growing teams</p>
            <h2 style="color: var(--heading);">$49<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Kanban & Gantt charts</li>
              <li>Time tracking</li>
              <li>Up to 25 users</li>
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
              <li>Unlimited projects</li>
              <li>Advanced integrations</li>
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
      <p class="lead mb-5" style="color: var(--text);">Connect Jolaha PMS with your favorite work tools.</p>
      <div class="d-flex justify-content-center flex-wrap gap-5">
        <img src="resources/img/integration-slack.png" alt="Slack" class="img-fluid" style="height: 50px;">
        <img src="resources/img/integration-trello.png" alt="Trello" class="img-fluid" style="height: 50px;">
        <img src="resources/img/integration-github.png" alt="GitHub" class="img-fluid" style="height: 50px;">
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
            <p style="color: var(--text);">“Jolaha PMS made collaboration so much easier. Our projects now run smoothly and on schedule.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Emily R., Project Manager</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“The reporting tools give us the clarity to make quick and informed decisions.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— David K., Operations Head</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“With PMS, our remote teams collaborate just as efficiently as in-office teams.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Maria L., Team Lead</h6>
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