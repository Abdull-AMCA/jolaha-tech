<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRMS | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">CRMS</span></h1>
      <p class="lead px-2 px-md-5">Comprehensive Customer Relationship Management System to streamline sales, marketing, and support operations.</p>
    </div>
  </section>

  <!-- CRMS Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
        <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha CRMS</h2>
        <p class="lead mb-4" style="color: var(--text);">
          Comprehensive Customer Relationship Management System designed to streamline your sales, marketing, and customer service operations.
        </p>

        <div class="row mb-5">
          <div class="col-md-6">
            <h4 style="color: var(--primary);">Key Features</h4>
            <ul style="color: var(--text);">
              <li>Lead & Opportunity Management</li>
              <li>Sales Pipeline Tracking</li>
              <li>Customer Communication Hub</li>
              <li>Marketing Automation</li>
              <li>Analytics & Reporting</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4 style="color: var(--primary);">Benefits</h4>
            <ul style="color: var(--text);">
              <li>Increase sales conversion by 35%</li>
              <li>Improve customer retention</li>
              <li>Automate marketing campaigns</li>
              <li>Gain actionable insights</li>
            </ul>
          </div>
        </div>

        <!-- Featured Sub-Product -->
        <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise CRM Suite</h4>
          <p style="color: var(--text);" class="mb-3">
            Our premium package includes advanced AI-powered analytics, custom workflow automation, and dedicated support for large enterprises.
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
  </section>

  <!-- Use Cases Section -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Can Benefit?</h2>
      <p class="lead mb-5" style="color: var(--text);">Jolaha CRMS is designed to serve teams across industries, empowering them with data-driven decisions.</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Real Estate Agencies</h5>
            <p style="color: var(--text);">Track leads, manage buyers/sellers, and close deals faster.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-briefcase fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Financial Advisors</h5>
            <p style="color: var(--text);">Centralize client interactions and manage compliance effortlessly.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-cart-check fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Retail & E-Commerce</h5>
            <p style="color: var(--text);">Personalize campaigns and nurture customer loyalty.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Clients Carousel -->
  <section class="py-5">
    <div class="container">
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
      <p class="lead mb-5" style="color: var(--text);">Flexible pricing that scales with your business.</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Starter</h4>
            <p style="color: var(--text);">For small teams just getting started</p>
            <h2 style="color: var(--heading);">$29<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Basic CRM features</li>
              <li>Email support</li>
              <li>Up to 5 users</li>
            </ul>
            <a href="#" class="btn btn-primary mt-3">Get Started</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <h4 style="color: var(--primary);">Professional</h4>
            <p style="color: var(--text);">For growing businesses</p>
            <h2 style="color: var(--heading);">$79<span style="font-size: 1rem;">/mo</span></h2>
            <ul style="color: var(--text);" class="text-start mt-3">
              <li>Advanced analytics</li>
              <li>Marketing automation</li>
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
              <li>Unlimited users</li>
              <li>Dedicated support</li>
              <li>Custom integrations</li>
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
      <p class="lead mb-5" style="color: var(--text);">Connect Jolaha CRMS with the tools you already use.</p>
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
            <p style="color: var(--text);">“Jolaha CRMS has transformed how we handle sales leads. Our conversion rates jumped significantly!”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Sarah M., Sales Director</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“The analytics dashboard gives us clarity we never had before. A must-have for any growing company.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— James K., Operations Manager</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <p style="color: var(--text);">“The marketing automation alone saves us hours every week. Incredible ROI.”</p>
            <h6 class="mt-3" style="color: var(--heading);">— Aisha R., Marketing Lead</h6>
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