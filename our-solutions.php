<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Solutions | Jolaha Tech</title>
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

  <!-- Hero -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">Our <span style="color: var(--secondary);">Solutions</span></h1>
      <p class="lead px-2 px-md-5">End-to-end IT solutions to keep your business secure, scalable, and future-ready</p>
    </div>
  </section>

  <!-- Solutions Navigation -->
  <section class="py-4 d-flex align-items-center text-center" style="background-color: var(--surface); position: sticky; top: 0; z-index: 100;">
    <div class="container">
      <div class="row g-2">
        <p class="lead px-2 px-md-5">Click any solution to view details below</p>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger active text-center p-3" data-product="servermgmt" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-hdd-network d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Server Management</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="itsupport" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-headset d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">IT Support</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="cloud" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-cloud d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Cloud Solutions</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="hosting" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-server d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Hosting Solutions</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Solutions Content -->
  <section class="py-5" style="background-color: var(--bg); min-height: 600px;">
    <div class="container">
      
      <!-- Server Management -->
      <div class="product-content active" id="servermgmt-content">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Server Management</h2>
            <p class="lead mb-4" style="color: var(--text);">Ensure peak performance, uptime, and security with our expert server management solutions for on-premises and cloud-based infrastructures.</p>
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

            <!-- Featured Package -->
            <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Server Care Package</h4>
              <p style="color: var(--text);" class="mb-3">Includes round-the-clock monitoring, proactive patching, disaster recovery, and advanced security configurations to maximize uptime and reliability.</p>
              <a href="server-management.php" class="btn btn-primary px-4 py-2 fw-bold">View Details & Pricing <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Request Form -->
            <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
              <form>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
                <div class="mb-3">
                  <select class="form-select">
                    <option>Project Budget</option>
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
      </div>

      <!-- IT Support -->
      <div class="product-content" id="itsupport-content">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">IT Support</h2>
            <p class="lead mb-4" style="color: var(--text);">Reliable IT support services to resolve issues quickly, optimize operations, and keep your business running smoothly.</p>
            <div class="row mb-5">
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Key Features</h4>
                <ul style="color: var(--text);">
                  <li>Remote & On-Site Assistance</li>
                  <li>Helpdesk Ticketing System</li>
                  <li>Software & Hardware Troubleshooting</li>
                  <li>Data Backup & Recovery</li>
                  <li>End-User Training & Guidance</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Benefits</h4>
                <ul style="color: var(--text);">
                  <li>Faster problem resolution</li>
                  <li>Reduced downtime</li>
                  <li>Improved staff productivity</li>
                  <li>Cost-effective IT operations</li>
                </ul>
              </div>
            </div>

            <!-- Featured Package -->
            <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Featured: Managed IT Support Package</h4>
              <p style="color: var(--text);" class="mb-3">Includes 24/7 helpdesk, proactive monitoring, hardware troubleshooting, and regular maintenance to keep your systems running seamlessly.</p>
              <a href="it-support.php" class="btn btn-primary px-4 py-2 fw-bold">View Details & Pricing <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Request Form -->
            <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
              <form>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
                <div class="mb-3">
                  <select class="form-select">
                    <option>Project Budget</option>
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
      </div>

      <!-- Cloud -->
      <div class="product-content" id="cloud-content">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Cloud Solutions</h2>
            <p class="lead mb-4" style="color: var(--text);">Scalable and secure cloud solutions to accelerate digital transformation and improve business agility.</p>
            <div class="row mb-5">
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Key Features</h4>
                <ul style="color: var(--text);">
                  <li>Cloud Migration Services</li>
                  <li>Hybrid & Multi-Cloud Architecture</li>
                  <li>Data Backup & Storage</li>
                  <li>Cloud Security & Compliance</li>
                  <li>Application Hosting</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Benefits</h4>
                <ul style="color: var(--text);">
                  <li>Reduce infrastructure costs</li>
                  <li>Enable scalability & flexibility</li>
                  <li>Improve data security</li>
                  <li>Accelerate innovation</li>
                </ul>
              </div>
            </div>

            <!-- Featured Package -->
            <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Featured: Cloud Transformation Package</h4>
              <p style="color: var(--text);" class="mb-3">Includes assessment, migration, and optimization of your workloads with 24/7 monitoring, ensuring a smooth transition to the cloud with minimal disruption.</p>
              <a href="cloud-solution.php" class="btn btn-primary px-4 py-2 fw-bold">View Details & Pricing <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Request Form -->
            <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
              <form>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
                <div class="mb-3">
                  <select class="form-select">
                    <option>Project Budget</option>
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
      </div>

      <!-- Hosting -->
      <div class="product-content" id="hosting-content">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Hosting Services</h2>
            <p class="lead mb-4" style="color: var(--text);">High-performance hosting solutions tailored for businesses of all sizes, ensuring uptime, speed, and reliability.</p>
            <div class="row mb-5">
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Key Features</h4>
                <ul style="color: var(--text);">
                  <li>Shared & Dedicated Hosting</li>
                  <li>Managed VPS & Cloud Hosting</li>
                  <li>Domain & SSL Management</li>
                  <li>Automatic Backups</li>
                  <li>99.9% Uptime Guarantee</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h4 style="color: var(--primary);">Benefits</h4>
                <ul style="color: var(--text);">
                  <li>Faster website performance</li>
                  <li>Reliable uptime & availability</li>
                  <li>Enhanced security with SSL</li>
                  <li>Expert managed support</li>
                </ul>
              </div>
            </div>

            <!-- Featured Package -->
            <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Featured: Premium Hosting Package</h4>
              <p style="color: var(--text);" class="mb-3">Includes dedicated hosting, free SSL certificate, daily backups, and 24/7 support to ensure your online presence is secure and uninterrupted.</p>
              <a href="hosting-solutions.php" class="btn btn-primary px-4 py-2 fw-bold">View Details & Pricing <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <!-- Request Form -->
            <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
              <h4 style="color: var(--secondary);" class="mb-3">Request a Quote</h4>
              <form>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Company Name"></div>
                <div class="mb-3">
                  <select class="form-select">
                    <option>Project Budget</option>
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
      </div>

    </div>
  </section>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

</body>
</html>
