<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Design & Development | Jolaha Tech</title>
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
    <h1 class="display-4 fw-bold">Web <span style="color: var(--secondary);">Design & Development</span></h1>
    <p class="lead px-2 px-md-5">Building scalable, responsive, and visually stunning websites that engage users and drive conversions.</p>
  </div>
</section>

<!-- Web Design & Development Content -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Our Web Design & Development Service</h2>
        <p class="lead mb-4" style="color: var(--text);">
          From startups to enterprises, we deliver websites that are crafted with modern design principles, responsive layouts, and optimized performance.
        </p>

        <div class="row mb-5">
          <div class="col-md-6">
            <h4 style="color: var(--primary);">Key Features</h4>
            <ul style="color: var(--text);">
              <li>Custom Website Design</li>
              <li>Responsive & Mobile-Friendly</li>
              <li>E-commerce Development</li>
              <li>CMS Solutions (WordPress, Drupal, etc.)</li>
              <li>Ongoing Maintenance & Support</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4 style="color: var(--primary);">Benefits</h4>
            <ul style="color: var(--text);">
              <li>Boost online brand presence</li>
              <li>Deliver seamless user experiences</li>
              <li>Improve SEO & site performance</li>
              <li>Ensure scalability & security</li>
            </ul>
          </div>
        </div>

        <!-- Featured Package -->
        <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary);" class="mb-3">Featured: Business Website Package</h4>
          <p style="color: var(--text);" class="mb-3">
            Includes responsive web design, up to 10 custom pages, SEO optimization, and a content management system to keep your website up-to-date with ease.
          </p>
          <a href="contact.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
            Request a Quote
            <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4">
        <!-- Request a Quote Form -->
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

    <!-- Use Cases Section -->
    <section class="py-5">
      <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: var(--secondary);">Who Can Benefit?</h2>
        <p class="lead mb-5" style="color: var(--text);">Our web design & development services are crafted for businesses across industries.</p>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
              <i class="bi bi-shop fs-1 mb-3" style="color: var(--primary);"></i>
              <h5 style="color: var(--heading);">Small Businesses</h5>
              <p style="color: var(--text);">Launch professional websites that attract and convert customers.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
              <i class="bi bi-building fs-1 mb-3" style="color: var(--primary);"></i>
              <h5 style="color: var(--heading);">Enterprises</h5>
              <p style="color: var(--text);">Build scalable, secure platforms tailored to enterprise-level operations.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
              <i class="bi bi-bag fs-1 mb-3" style="color: var(--primary);"></i>
              <h5 style="color: var(--heading);">E-commerce Brands</h5>
              <p style="color: var(--text);">Develop optimized online stores with seamless shopping experiences.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

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
</section>

<!-- Pricing Section -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color: var(--secondary);">Flexible Pricing</h2>
    <p class="lead mb-5" style="color: var(--text);">Choose a package that fits your business needs.</p>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--primary);">Starter</h4>
          <p style="color: var(--text);">Perfect for small businesses</p>
          <h2 style="color: var(--heading);">$999</h2>
          <ul style="color: var(--text);" class="text-start mt-3">
            <li>Up to 5 custom pages</li>
            <li>Basic SEO setup</li>
            <li>Responsive design</li>
          </ul>
          <a href="contact.html" class="btn btn-primary mt-3">Get Started</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--primary);">Professional</h4>
          <p style="color: var(--text);">For growing businesses</p>
          <h2 style="color: var(--heading);">$2,499</h2>
          <ul style="color: var(--text);" class="text-start mt-3">
            <li>Up to 15 custom pages</li>
            <li>E-commerce functionality</li>
            <li>SEO optimization</li>
          </ul>
          <a href="contact.html" class="btn btn-primary mt-3">Start Project</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--primary);">Enterprise</h4>
          <p style="color: var(--text);">Tailored for large-scale businesses</p>
          <h2 style="color: var(--heading);">Custom</h2>
          <ul style="color: var(--text);" class="text-start mt-3">
            <li>Unlimited pages</li>
            <li>Advanced integrations</li>
            <li>Dedicated support</li>
          </ul>
          <a href="contact.html" class="btn btn-primary mt-3">Contact Sales</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color: var(--secondary);">What Our Clients Say</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <p style="color: var(--text);">“The website Jolaha built for us is fast, responsive, and visually stunning. Our customers love it.”</p>
          <h6 class="mt-3" style="color: var(--heading);">— Sarah M., Business Owner</h6>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <p style="color: var(--text);">“Their team understood our needs and delivered a scalable platform that grows with us.”</p>
          <h6 class="mt-3" style="color: var(--heading);">— Daniel K., CTO</h6>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <p style="color: var(--text);">“Jolaha Tech provided full support even after launch — they’re truly a partner in our growth.”</p>
          <h6 class="mt-3" style="color: var(--heading);">— Aisha L., Marketing Director</h6>
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
</body>
</html>
