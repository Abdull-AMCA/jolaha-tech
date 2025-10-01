<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | Jolaha Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

 <!-- Header / Navigation -->
  <header>
    <div class="container nav">
    <a class="brand d-flex align-items-center" href="index.html">
      <img src="resources/img/logo.svg" alt="Jolaha Tech Logo" class="logo-img me-2" />
      <span></span>
    </a>

    <nav class="menu navbar navbar-expand-lg" id="menu" style="height: 40px;">
      <div class="container-fluid">
        <ul class="navbar-nav mx-auto">

          <!-- About -->
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>

          <!-- Industry Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="industryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Industries
            </a>
            <ul class="dropdown-menu" aria-labelledby="industryDropdown">
              <li><a class="dropdown-item" href="audit-accounting.html">Audit & Accounting</a></li>
              <li><a class="dropdown-item" href="real-estate.html">Real Estate</a></li>
              <li><a class="dropdown-item" href="info-tech.html">IT</a></li>
            </ul>
          </li>

          <!-- Product Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="our-products.html" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Our Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="productDropdown">
              <li><a class="dropdown-item" href="jolaha-hrms.html">Jolaha HRMS</a></li>
              <li><a class="dropdown-item" href="jolaha-accountrix.html">Jolaha Accountrix</a></li>
              <li><a class="dropdown-item" href="jolaha-crms.html">Jolaha CRMS</a></li>
              <li><a class="dropdown-item" href="jolaha-pms.html">Jolaha PMS</a></li>
              <li><a class="dropdown-item" href="jolaha-help-desk.html">Jolaha Help Desk</a></li>
              <li><a class="dropdown-item" href="jolaha-aml.html">Jolaha AML</a></li>
              <li><a class="dropdown-item" href="jolaha-lms.html">Jolaha LMS</a></li>
            </ul>
          </li>

          <!-- Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="our-services.html" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Our Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="web-design-dev.html">Web Design & Development</a></li>
              <li><a class="dropdown-item" href="mobile-app.html">Mobile Application</a></li>
              <li><a class="dropdown-item" href="online-marketing.html">Online Marketing</a></li>
              <li><a class="dropdown-item" href="creative-design.html">Creative Design</a></li>
              <li><a class="dropdown-item" href="software-testing.html">Software Testing</a></li>
            </ul>
          </li>

          <!-- Solutions Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="solutionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solutions
            </a>
            <ul class="dropdown-menu" aria-labelledby="solutionsDropdown">
              <li><a class="dropdown-item" href="server-management.html">Server Management</a></li>
              <li><a class="dropdown-item" href="it-support.html">IT Support</a></li>
              <li><a class="dropdown-item" href="cloud-solution.html">Cloud Solutions</a></li>
              <li><a class="dropdown-item" href="hosting-solutions.html">Hosting Solutions</a></li>
            </ul>
          </li>

          <!-- Resources Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Resources
            </a>
            <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
              <li><a class="dropdown-item" href="knowledge-base.html">Knowledge Base</a></li>
              <li><a class="dropdown-item" href="newsletter.html">Newsletter</a></li>
              <li><a class="dropdown-item" href="blog.html">Blog</a></li>
            </ul>
          </li>

          <!-- Careers -->
          <li class="nav-item">
            <a class="nav-link" href="careers.html">Careers</a>
          </li>

          <!-- Contact -->
          <li class="nav-item">
            <a class="nav-link" href="contact-us.html">Contact</a>
          </li>

          <!-- CTA / Request Proposal -->
          <li class="nav-item">
            <a href="contact-us.html" class="btn btn-ghost">Request Proposal</a>
          </li>
        </ul>
      </div>
    </nav>

    <button id="menu-toggle" class="menu-toggle" aria-label="Toggle menu">
    <span></span>
    <span></span>
    <span></span>
    </button>
    </div>
  </header>

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
              <a href="web-design-dev.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
              <a href="mobile-app.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
              <a href="online-marketing.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
              <a href="creative-design.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
              <a href="software-testing.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
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
<footer id="contact">
  <div class="container footer-grid">
    <!-- About -->
    <div>
      <a class="brand" href="#">Jolaha Technologies</a>
      <p>Trusted IT Solutions and consultations services for over 5 years.</p>

      <!-- Social Media -->
      <div class="social-links mt-3">
        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://twitter.com" target="_blank" aria-label="Twitter">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
          <i class="bi bi-linkedin"></i>
        </a>
        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
          <i class="bi bi-instagram"></i>
        </a>
      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h4>Quick Links</h4>
      <a href="about.html">About Jolaha Tech</a><br>
      <a href="our-products.html">Our Products</a><br>
      <a href="our-services.html">Our Services</a><br>
      <a href="our-solutions.html">Our Solutions</a>
    </div>

    <!-- Contact -->
    <div>
      <h4>Contact</h4>
      <p><i class="bi bi-envelope me-2"></i> info@jolaha.com</p>
      <p><i class="bi bi-telephone me-2"></i> +971 12 345 6789</p>
      <p><i class="bi bi-geo-alt me-2"></i> BB2 Tower, Mazaya Business Avenue, JLT Dubai UAE.</p>
    </div>

    <!-- Map -->
    <div>
      <h4>Find Us</h4>
      <div style="width: 100%; height: 200px; border-radius: var(--radius); overflow: hidden;">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.9130389097717!2d55.15352!3d25.074282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6c999999999%3A0xabcdef123456789!2sMazaya%20Business%20Avenue%2C%20JLT%20Dubai!5e0!3m2!1sen!2sae!4v1697891234567" 
          width="100%" 
          height="60%" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>

  <p style="text-align:center; margin-top:2rem; color:var(--muted); font-size:.85rem;">
    © 2025 Jolaha Technologies. All rights reserved.
  </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="resources/js/main.js" defer></script>

<script>
    // Simple JavaScript to handle product switching
    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.product-trigger');
        const contents = document.querySelectorAll('.product-content');
        
        triggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                
                // Remove active class from all triggers and contents
                triggers.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked trigger and corresponding content
                this.classList.add('active');
                document.getElementById(`${productId}-content`).classList.add('active');
            });
        });
    });
</script>
</body>
</html>
