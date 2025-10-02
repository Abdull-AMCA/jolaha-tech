<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accounting & Auditing Services</title>
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
      <h1 class="display-4 fw-bold">Accounting & Auditing <span style="color: var(--secondary);">Solutions</span></h1>
      <p class="lead px-2 px-md-5">Comprehensive financial services designed for corporate excellence and regulatory compliance</p>
    </div>
  </section>

  <!-- Services Overview -->
  <section class="py-5" style="background-color: var(--surface);">
      <div class="container py-5">
          <div class="row text-center mb-5">
              <div class="col-12">
                  <h2 class="display-5 fw-bold" style="color: var(--heading);">Our Accounting <span style="color: var(--primary);">Services</span></h2>
                  <p class="lead mx-auto" style="color: var(--text); max-width: 800px;">
                      We provide end-to-end financial solutions that ensure accuracy, compliance, and strategic financial insight for your business.
                  </p>
              </div>
          </div>

          <div class="row g-4">
              <!-- Service 1 -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-cash-coin"></i>
                          </div>
                          <h4 style="color: var(--heading);">Financial Accounting</h4>
                          <p style="color: var(--muted);">
                              Comprehensive bookkeeping, financial statement preparation, and general ledger maintenance for accurate financial reporting.
                          </p>
                      </div>
                  </div>
              </div>

              <!-- Service 2 -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-clipboard-check"></i>
                          </div>
                          <h4 style="color: var(--heading);">External Auditing</h4>
                          <p style="color: var(--muted);">
                              Independent audit services ensuring compliance with international standards and regulatory requirements.
                          </p>
                      </div>
                  </div>
              </div>

              <!-- Service 3 -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-graph-up"></i>
                          </div>
                          <h4 style="color: var(--heading);">Tax Consulting</h4>
                          <p style="color: var(--muted);">
                              Strategic tax planning, compliance, and optimization services to minimize liabilities and maximize returns.
                          </p>
                      </div>
                  </div>
              </div>

              <!-- Add more services as needed -->
          </div>
      </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="py-5" style="background-color: var(--bg);">
      <div class="container py-5">
          <div class="row align-items-center">
              <div class="col-lg-6">
                  <h2 class="display-5 fw-bold mb-4" style="color: var(--heading);">Why Choose Our <span style="color: var(--secondary);">Accounting Services</span></h2>
                  <div class="d-flex flex-column gap-3">
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <i class="bi bi-shield-check"></i>
                          </div>
                          <div>
                              <h5 style="color: var(--heading);">Integrity</h5>
                              <p style="color: var(--text);">Ensure full compliance with local and international financial regulations</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <i class="bi bi-speedometer2"></i>
                          </div>
                          <div>
                              <h5 style="color: var(--heading);">Confidentiality</h5>
                              <p style="color: var(--text);">Streamlined processes that deliver accurate results with optimal efficiency</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <i class="bi bi-bar-chart"></i>
                          </div>
                          <div>
                              <h5 style="color: var(--heading);">Timely</h5>
                              <p style="color: var(--text);">Transform financial data into actionable business intelligence</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 mt-5 mt-lg-0">
                  <div class="card border-0" style="background-color: var(--card); border-radius: var(--radius-lg);">
                      <img src="/path/to/accounting-image.jpg" class="card-img-top" alt="Accounting Services" style="border-radius: var(--radius-lg) var(--radius-lg) 0 0;">
                      <div class="card-body p-4">
                          <h5 style="color: var(--heading);">Get Started Today</h5>
                          <p style="color: var(--text);" class="mb-3">Schedule a consultation to discuss your accounting needs</p>
                          <a href="https://www.amcaauditing.com/contact-us" target="_blank" class="btn btn btn-primary px-4 py-2 fw-bold">
                              Request Consultation
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5">
      <div class="container cta py-4 text-center">
          <h3 class="fw-bold mb-3 text-white">Ready to Transform Your Financial Operations?</h3>
          <p class="lead mb-4 text-white opacity-90">Partner with us for comprehensive accounting solutions that drive business growth</p>
          <a href="https://www.amcaauditing.com/contact-us" target="_blank" class="btn btn-lg px-5 py-3 fw-bold" style="background-color: white; color: var(--primary); border-radius: var(--radius);">
              Get Started Today
              <i class="bi bi-arrow-right ms-2"></i>
          </a>
      </div>
  </section>

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>