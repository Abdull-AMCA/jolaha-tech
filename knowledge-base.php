<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowledge Base | Jolaha Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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

<!-- Hero -->
<section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
  <div class="container py-5 px-md-5">
    <h1 class="display-4 fw-bold">Knowledge <span style="color: var(--secondary);">Base</span></h1>
    <p class="lead px-2 px-md-5">
      Explore step-by-step guides, tutorials, and FAQs to get the most out of Jolaha products and services.
    </p>
    <form class="d-flex justify-content-center mt-4" style="max-width: 600px; margin: 0 auto;">
      <input type="text" class="form-control me-2" placeholder="Search articles, guides, FAQs...">
      <button class="btn btn-primary">Search</button>
    </form>
  </div>
</section>

<!-- Categories -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4" style="color: var(--secondary);">Browse by Category</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-gear fs-1 mb-3" style="color: var(--primary);"></i>
          <h4 style="color: var(--secondary)">Getting Started</h4>
          <p style="color: var(--text);">Setup guides, onboarding steps, and quick-start tutorials.</p>
          <button class="btn btn-secondary" href="#">Explore</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-journal-code fs-1 mb-3" style="color: var(--primary);"></i>
          <h4 style="color: var(--secondary)">Product Guides</h4>
          <p style="color: var(--text);">Detailed manuals and feature explanations for all Jolaha products.</p>
          <button class="btn btn-secondary" href="#">Explore</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-shield-lock fs-1 mb-3" style="color: var(--primary);"></i>
          <h4 style="color: var(--secondary)">Security & Compliance</h4>
          <p style="color: var(--text);">Policies, best practices, and compliance documentation.</p>
          <button class="btn btn-secondary" href="#">Explore</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-question-circle fs-1 mb-3" style="color: var(--primary);"></i>
          <h4 style="color: var(--secondary)">FAQs</h4>
          <p style="color: var(--text);">Answers to frequently asked questions and common issues.</p>
          <button class="btn btn-secondary" href="#">Explore</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Popular Articles -->
<section class="py-5" style="background: var(--surface);">
  <div class="container">
    <h2 class="fw-bold mb-4 text-center" style="color: var(--secondary);">Popular Articles</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary)">How to set up Jolaha HRMS in 5 steps</h4>
          <p style="color: var(--text);">Quick guide to onboarding your HR team with HRMS.</p>
          <button class="btn btn-primary" href="#">Read More</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary)">Top 10 tips for CRM success</h4>
          <p style="color: var(--text);">Best practices for maximizing customer relationships.</p>
          <button class="btn btn-primary" href="#">Read More</button>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <h4 style="color: var(--secondary)">Securing your cloud applications</h4>
          <p style="color: var(--text);">Step-by-step approach to protecting business data.</p>
          <button class="btn btn-primary" href="#">Read More</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="fw-bold mb-4" style="color: var(--secondary);">Still Need Help?</h2>
    <p class="lead mb-4" style="color: var(--text);">Can’t find what you’re looking for? Reach out to our support team anytime.</p>
    <a href="contact.html" class="btn btn-primary px-4 py-2 fw-bold">Contact Support</a>
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
