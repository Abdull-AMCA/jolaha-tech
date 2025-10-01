<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Jolaha Tech</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>

<?php
// Include the functions file at the top
include 'includes/database.php';
include 'includes/functions.php';
?>

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
    <h1 class="display-4 fw-bold">Get in Touch with <span style="color: var(--secondary);">Jolaha Tech</span></h1>
    <p class="lead px-2 px-md-5">We’d love to hear from you! Reach out for inquiries, collaborations, or support.</p>
  </div>
</section>

<!-- Contact Info -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-geo-alt-fill fs-1 mb-3" style="color: var(--primary);"></i>
          <h5 style="color: var(--heading);">Our Office</h5>
          <p style="color: var(--text);">BB2 Tower, Mazaya Business Avenue, JLT Dubai, UAE</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-envelope-fill fs-1 mb-3" style="color: var(--primary);"></i>
          <h5 style="color: var(--heading);">Email Us</h5>
          <p style="color: var(--text);">info@jolaha.com</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
          <i class="bi bi-telephone-fill fs-1 mb-3" style="color: var(--primary);"></i>
          <h5 style="color: var(--heading);">Call Us</h5>
          <p style="color: var(--text);">+971 12 345 6789</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form & Map -->
<section class="py-5" style="background-color: var(--surface);">
  <div class="container">
    <div class="row g-5">
      <!-- Contact Form -->
      <div class="col-lg-6">
        <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
          <h3 class="mb-4" style="color: var(--secondary);">Send Us a Message</h3>
          <form method="POST" action="">
            <input type="hidden" name="contact_form" value="1">
            <div class="mb-3"><input type="text" class="form-control" placeholder="Full Name" required></div>
            <div class="mb-3"><input type="email" class="form-control" placeholder="Email Address" required></div>
            <div class="mb-3"><input type="text" class="form-control" placeholder="Subject"></div>
            <div class="mb-3"><textarea class="form-control" rows="5" placeholder="Your Message" required></textarea></div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Submit</button>
          </form>
        </div>
      </div>

      <!-- Google Map -->
      <div class="col-lg-6">
        <h3 class="mb-4" style="color: var(--secondary);">Find Us</h3>
        <div class="ratio ratio-16x9 shadow rounded">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.122198588098!2d55.15345281501077!3d25.074282983957303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6cf9b7b4cbe5%3A0x5f9f7b7b32c77bb8!2sMazaya%20Business%20Avenue%20BB2!5e0!3m2!1sen!2sae!4v1695300000000"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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

<?php

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $result = handle_contact_submission();
    if ($result['success']) {
        $success_message = $result['message'];
    } else {
        $error_message = $result['message'];
    }
}
?>

<?php if (isset($success_message)): ?>
    <div class="alert alert-success"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="resources/js/main.js" defer></script>
</body>
</html>
