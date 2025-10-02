<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT Services & Solutions</title>
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
    <h1 class="display-4 fw-bold">Comprehensive IT <span style="color: var(--secondary);">Solutions</span></h1>
    <p class="lead px-2 px-md-5">Empowering businesses with cutting-edge technology services, strategic IT consulting, and innovative digital transformation</p>
  </div>
</section>

<!-- Services Overview -->
  <section class="py-5" style="background-color: var(--surface);">
      <div class="container py-5">
          <div class="row text-center mb-5">
              <div class="col-12">
                  <h2 class="display-5 fw-bold" style="color: var(--heading);">Our IT <span style="color: var(--primary);">Services</span></h2>
                  <p class="lead mx-auto" style="color: var(--text); max-width: 800px;">
                      End-to-end technology solutions designed to drive innovation, efficiency, and growth for your business
                  </p>
              </div>
          </div>

          <div class="row g-4">
              <!-- Service 1: Web Development -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-code-slash"></i>
                          </div>
                          <h4 style="color: var(--heading);">Web Development</h4>
                          <p style="color: var(--muted);">
                              Custom websites, web applications, and e-commerce solutions built with modern technologies and frameworks.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">React</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Vue.js</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Node.js</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Service 2: Cloud Solutions -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-cloud"></i>
                          </div>
                          <h4 style="color: var(--heading);">Cloud Solutions</h4>
                          <p style="color: var(--muted);">
                              Cloud migration, infrastructure management, and scalable cloud architecture for modern businesses.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">AWS</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Azure</span>
                              <span class="badge me-1" style="background-color: var(--primary);">GCP</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Service 3: Cybersecurity -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-shield-lock"></i>
                          </div>
                          <h4 style="color: var(--heading);">Cybersecurity</h4>
                          <p style="color: var(--muted);">
                              Comprehensive security assessments, vulnerability testing, and enterprise-grade protection solutions.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">SOC 2</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Pen Testing</span>
                              <span class="badge me-1" style="background-color: var(--primary);">ISO 27001</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Service 4: Mobile Development -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-phone"></i>
                          </div>
                          <h4 style="color: var(--heading);">Mobile Development</h4>
                          <p style="color: var(--muted);">
                              Native and cross-platform mobile applications for iOS and Android with seamless user experiences.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">iOS</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Android</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Flutter</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Service 5: DevOps -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-gear"></i>
                          </div>
                          <h4 style="color: var(--heading);">DevOps & Automation</h4>
                          <p style="color: var(--muted);">
                              CI/CD pipelines, infrastructure as code, and automation solutions for efficient software delivery.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">Docker</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Kubernetes</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Jenkins</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Service 6: IT Consulting -->
              <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-0 p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body text-center">
                          <div class="mb-3" style="color: var(--primary); font-size: 2.5rem;">
                              <i class="bi bi-graph-up"></i>
                          </div>
                          <h4 style="color: var(--heading);">IT Consulting</h4>
                          <p style="color: var(--muted);">
                              Strategic technology planning, digital transformation, and IT infrastructure optimization.
                          </p>
                          <div class="mt-3">
                              <span class="badge me-1" style="background-color: var(--primary);">Strategy</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Transformation</span>
                              <span class="badge me-1" style="background-color: var(--primary);">Support</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Technology Stack -->
  <section class="py-5" style="background-color: var(--bg);">
      <div class="container py-5">
          <div class="row text-center mb-5">
              <div class="col-12">
                  <h2 class="display-5 fw-bold" style="color: var(--heading);">Our <span style="color: var(--secondary);">Technology Stack</span></h2>
                  <p class="lead mx-auto" style="color: var(--text); max-width: 800px;">
                      We work with modern technologies and frameworks to deliver robust and scalable solutions
                  </p>
              </div>
          </div>

          <div class="row g-4">
              <div class="col-md-3 col-6 text-center">
                  <div class="p-3">
                      <div class="mb-2" style="color: var(--accent); font-size: 2.5rem;">
                          <i class="bi bi-braces"></i>
                      </div>
                      <h6 style="color: var(--heading);">Frontend</h6>
                      <p class="small" style="color: var(--text);">React, Vue.js, Angular, TypeScript</p>
                  </div>
              </div>
              <div class="col-md-3 col-6 text-center">
                  <div class="p-3">
                      <div class="mb-2" style="color: var(--accent); font-size: 2.5rem;">
                          <i class="bi bi-server"></i>
                      </div>
                      <h6 style="color: var(--heading);">Backend</h6>
                      <p class="small" style="color: var(--text);">Node.js, Python, .NET, PHP, Java</p>
                  </div>
              </div>
              <div class="col-md-3 col-6 text-center">
                  <div class="p-3">
                      <div class="mb-2" style="color: var(--accent); font-size: 2.5rem;">
                          <i class="bi bi-database"></i>
                      </div>
                      <h6 style="color: var(--heading);">Database</h6>
                      <p class="small" style="color: var(--text);">PostgreSQL, MongoDB, MySQL, Redis</p>
                  </div>
              </div>
              <div class="col-md-3 col-6 text-center">
                  <div class="p-3">
                      <div class="mb-2" style="color: var(--accent); font-size: 2.5rem;">
                          <i class="bi bi-cloud"></i>
                      </div>
                      <h6 style="color: var(--heading);">Cloud</h6>
                      <p class="small" style="color: var(--text);">AWS, Azure, Google Cloud, Docker</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Process Section -->
  <section class="py-5" style="background-color: var(--surface);">
      <div class="container py-5">
          <div class="row text-center mb-5">
              <div class="col-12">
                  <h2 class="display-5 fw-bold" style="color: var(--heading);">Our Development <span style="color: var(--primary);">Process</span></h2>
                  <p class="lead mx-auto" style="color: var(--text); max-width: 800px;">
                      A structured approach that ensures quality, transparency, and successful project delivery
                  </p>
              </div>
          </div>

          <div class="row justify-content-center">
              <div class="col-md-8 col-lg-3 mb-4">
                  <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body">
                          <div class="mb-3" style="color: var(--primary); font-size: 2rem;">
                              <i class="bi bi-search"></i>
                          </div>
                          <h5 style="color: var(--heading);">1. Discovery</h5>
                          <p class="small" style="color: var(--muted);">Requirements analysis, planning, and project scoping</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-8 col-lg-3 mb-4">
                  <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body">
                          <div class="mb-3" style="color: var(--primary); font-size: 2rem;">
                              <i class="bi bi-palette"></i>
                          </div>
                          <h5 style="color: var(--heading);">2. Design</h5>
                          <p class="small" style="color: var(--muted);">UI/UX design, architecture planning, and prototyping</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-8 col-lg-3 mb-4">
                  <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body">
                          <div class="mb-3" style="color: var(--primary); font-size: 2rem;">
                              <i class="bi bi-code-square"></i>
                          </div>
                          <h5 style="color: var(--heading);">3. Development</h5>
                          <p class="small" style="color: var(--muted);">Agile development, continuous integration, and testing</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-8 col-lg-3 mb-4">
                  <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                      <div class="card-body">
                          <div class="mb-3" style="color: var(--primary); font-size: 2rem;">
                              <i class="bi bi-rocket"></i>
                          </div>
                          <h5 style="color: var(--heading);">4. Deployment</h5>
                          <p class="small" style="color: var(--muted);">Deployment, monitoring, and ongoing support & maintenance</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5">
      <div class="container cta py-4 text-center">
          <h3 class="fw-bold mb-3 text-white">Ready to Transform Your Business with Technology?</h3>
          <p class="lead mb-4 text-white opacity-90">Let's discuss how our IT services can drive your digital success</p>
          <a href="#contact" class="btn btn-lg px-5 py-3 fw-bold" style="background-color: white; color: var(--primary); border-radius: var(--radius);">
              Start Your Project
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