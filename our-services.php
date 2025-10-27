<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | Jolaha Tech</title>
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
      <h1 class="display-4 fw-bold">Our <span style="color: var(--secondary);">Services</span></h1>
      <p class="lead px-2 px-md-5">Professional IT services designed to build, scale, and transform your business through technology and innovation</p>
    </div>
  </section>

  <!-- Services Navigation -->
  <section class="py-4 d-flex align-items-center text-center" style="background-color: var(--surface); position: sticky; top: 0; z-index: 100;">
    <div class="container">
      <div class="row g-2">
        <p class="lead px-2 px-md-5">Click any service to view details below</p>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger active text-center p-3" data-product="webdev" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-laptop d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Web Design & Development</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="mobileapp" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-phone d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Mobile Application</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="design" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-palette d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Design</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="testing" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-bug d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Testing</span>
          </div>
        </div>

        <div class="col-6 col-md-3 col-lg-2">
          <div class="product-trigger text-center p-3" data-product="marketing" style="background-color: var(--card); border-radius: var(--radius);">
            <i class="bi bi-megaphone d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
            <span style="color: var(--heading); font-size: 0.9rem;">Online Marketing</span>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Product Content Area -->
  <section class="py-5" style="background-color: var(--bg); min-height: 600px;">
      <div class="container">
          
        <!-- Web Design & Dev Content -->
        <div class="product-content active" id="webdev-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Web Design & Development</h2>
              <p class="lead mb-4" style="color: var(--text);">
                Professional website design and development services to build scalable, responsive, and visually stunning websites that drive engagement and conversions.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Custom Website Design</li>
                    <li>Responsive & Mobile-Friendly Development</li>
                    <li>E-commerce Solutions</li>
                    <li>CMS Development (WordPress, Joomla, Drupal)</li>
                    <li>Website Maintenance & Support</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Boost brand presence online</li>
                    <li>Deliver seamless user experience</li>
                    <li>Improve SEO & site performance</li>
                    <li>Ensure scalability & security</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Service Package -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Business Website Package</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes responsive web design, up to 10 custom pages, SEO optimization, and a content management system to keep your website up-to-date with ease.
                </p>
                <a href="web-design-dev.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Request a Quote Form -->
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

          <!-- Featured Clients Carousel -->
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

        <!-- Mobile Application Development Content -->
        <div class="product-content" id="mobileapp-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Mobile Application Development</h2>
              <p class="lead mb-4" style="color: var(--text);">
                End-to-end mobile application development services to build scalable, secure, and user-friendly apps for iOS, Android, and cross-platform solutions.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Native iOS & Android Development</li>
                    <li>Cross-Platform Apps (Flutter, React Native)</li>
                    <li>Custom API & Backend Integration</li>
                    <li>UI/UX Design for Mobile Experiences</li>
                    <li>App Store & Play Store Deployment</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Engage customers on the go</li>
                    <li>Boost operational efficiency</li>
                    <li>Faster time-to-market with hybrid solutions</li>
                    <li>Secure, scalable, and high-performing apps</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Service Package -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Mobile App Package</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes custom app design, cross-platform development, API integration, and post-launch support to help your business succeed in the mobile-first era.
                </p>
                <a href="mobile-app.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Request a Quote Form -->
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
                      <option>Below $10,000</option>
                      <option>$10,000 - $50,000</option>
                      <option>$50,000 - $100,000</option>
                      <option>$100,000+</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Submit Request
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
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

        <!-- Online Marketing Content -->
        <div class="product-content" id="marketing-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Online Marketing</h2>
              <p class="lead mb-4" style="color: var(--text);">
                Data-driven online marketing strategies that boost your brand visibility, generate leads, and drive measurable ROI across digital channels.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Search Engine Optimization (SEO)</li>
                    <li>Pay-Per-Click (PPC) Advertising</li>
                    <li>Social Media Campaigns</li>
                    <li>Email Marketing Automation</li>
                    <li>Content Strategy & Blogging</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Grow brand awareness globally</li>
                    <li>Generate qualified leads</li>
                    <li>Boost conversion rates</li>
                    <li>Track campaigns with real-time analytics</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Service Package -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Digital Growth Package</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes SEO optimization, targeted ad campaigns, social media management, and monthly performance reports to accelerate your digital growth.
                </p>
                <a href="online-marketing.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Request a Quote Form -->
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

          <!-- Featured Clients Carousel -->
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

        <!-- Creative Design Content -->
        <div class="product-content" id="design-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Creative Design</h2>
              <p class="lead mb-4" style="color: var(--text);">
                Innovative graphic and creative design services that bring your brand to life with impactful visuals and seamless user experiences.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Logo & Brand Identity Design</li>
                    <li>UI/UX Design for Web & Mobile</li>
                    <li>Infographics & Marketing Collateral</li>
                    <li>Print & Digital Advertising Design</li>
                    <li>Motion Graphics & Illustrations</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Create a lasting brand impression</li>
                    <li>Engage audiences with stunning visuals</li>
                    <li>Enhance usability and experience</li>
                    <li>Support campaigns with consistent branding</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Service Package -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Brand Identity Package</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes logo design, brand guidelines, business card templates, and social media assets to ensure consistent branding across all platforms.
                </p>
                <a href="creative-design.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Request a Quote Form -->
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
                      <option>Below $3,000</option>
                      <option>$3,000 - $10,000</option>
                      <option>$10,000 - $30,000</option>
                      <option>$30,000+</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Submit Request
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
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
  
        <!-- Software Testing & QA Content -->
        <div class="product-content" id="testing-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Software Testing & QA</h2>
              <p class="lead mb-4" style="color: var(--text);">
                Comprehensive software testing and quality assurance services to ensure your applications are secure, reliable, and deliver flawless user experiences.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Manual & Automated Testing</li>
                    <li>Functional & Regression Testing</li>
                    <li>Performance & Load Testing</li>
                    <li>Security & Compliance Testing</li>
                    <li>User Acceptance Testing (UAT)</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Ensure flawless user experience</li>
                    <li>Prevent costly bugs post-launch</li>
                    <li>Enhance performance & scalability</li>
                    <li>Meet compliance and security standards</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Service Package -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise QA Package</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes end-to-end functional testing, automated regression testing, performance benchmarking, and ongoing QA support for enterprise systems.
                </p>
                <a href="software-testing.php" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Request a Quote Form -->
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
                      <option>Below $10,000</option>
                      <option>$10,000 - $30,000</option>
                      <option>$30,000 - $100,000</option>
                      <option>$100,000+</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Submit Request
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
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
        
      </div>
  </section>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

</body>
</html>
