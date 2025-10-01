<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Jolaha Tech - Accounting & Auditing Services</title>
<meta name="description" content="" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="resources/css/style.css" />
<!-- Bootstrap CSS (load first so our style.css can override) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Your custom CSS -->
<link rel="stylesheet" href="resources/css/style.css" />
<script src="resources/js/main.js" defer></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Target only submenu toggles
  document.querySelectorAll(".dropdown-submenu > .dropdown-toggle").forEach(function (el) {
    el.addEventListener("click", function (e) {
      e.preventDefault();  // stop link navigation
      e.stopPropagation(); // stop Bootstrap from closing parent

      // close any other open submenus inside the same parent
      let parentMenu = this.closest(".dropdown-menu");
      parentMenu.querySelectorAll(".dropdown-menu.show").forEach(function (submenu) {
        if (submenu !== el.nextElementSibling) {
          submenu.classList.remove("show");
        }
      });

      // toggle the submenu
      let submenu = this.nextElementSibling;
      if (submenu) {
        submenu.classList.toggle("show");
      }
    });
  });

  // Close submenus when main dropdown closes
  document.querySelectorAll(".dropdown").forEach(function (dd) {
    dd.addEventListener("hide.bs.dropdown", function () {
      this.querySelectorAll(".dropdown-menu.show").forEach(function (submenu) {
        submenu.classList.remove("show");
      });
    });
  });
});
</script>

</head>
<body>
  <section class="hero position-relative">
  <!-- Background Video >
  <video autoplay muted loop playsinline class="hero-bg-video">
    <source src="resources/video/hero.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video-->

  <!-- Background Image -->
  <img src="resources/img/hero.jpg" alt="Hero Background" class="hero-bg-image">

  <!-- Overlay for better text readability -->
  <div class="hero-overlay"></div>

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
            <a href="#" class="btn btn-ghost" data-bs-toggle="modal" data-bs-target="#proposalModal">
              Login
            </a>
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

<!-- Hero Section (Carousel) -->
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- indicators (optional) -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row align-items-center gy-4">
            <div class="col-lg-7 mb-5">
              <span class="chip">Planning • Developing • Executing</span>
              <h1 class="hero-title">We Make AI Driven Innovations By Planning, Developing & Executing</h1>
              <p class="lead hero-lead">We provide end-to-end IT services...design, development, marketing, and support; so you can focus on growth, not technology.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookCallModal">
                  Book a Call
                </a>
                <a class="btn btn-ghost" href="our-services.html">Explore services</a>
              </div>
            </div>
            <!--div class="col-lg-5">
              <div class="hero-illustration card">
                <img src="images/hero1.jpg" alt="Audit working session" class="img-fluid rounded-3">
              </div>
            </div-->
          </div>
        </div>
      </div>

      <!-- Slide 2
      <div class="carousel-item">
        <div class="container">
          <div class="row align-items-center gy-4">
            <div class="col-lg-7 mb-5">
              <span class="chip">Financial Reporting</span>
              <h1 class="hero-title">Clear, compliant, and timely IFRS reporting.</h1>
              <p class="lead hero-lead">Accurate preparation, conversion, and consolidation of financial statements aligned with global standards.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a class="btn btn-primary" href="#contact">Get IFRS support</a>
              </div>
            </div>
            <!--div class="col-lg-5">
              <div class="hero-illustration card">
                <img src="images/hero2.jpg" alt="Financial reporting" class="img-fluid rounded-3">
              </div>
            </div
          </div>
        </div>
      </div-->

      <!-- Slide 3 
      <div class="carousel-item">
        <div class="container">
          <div class="row align-items-center gy-4">
            <div class="col-lg-7 mb-5">
              <span class="chip">Advisory & Compliance</span>
              <h1 class="hero-title">Strengthen governance & controls with Jolaha.</h1>
              <p class="lead hero-lead">Risk assessments, SOPs, internal audits, and tax compliance tailored to your sector.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a class="btn btn-primary" href="#contact">Talk to an advisor</a>
              </div>
            </div>
            <!--div class="col-lg-5">
              <div class="hero-illustration card">
                <img src="images/hero3.jpg" alt="Advisory session" class="img-fluid rounded-3">
              </div>
            </div
          </div>
        </div>
      </div>-->
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- Overlapping Contact CTA -->
<div class="contact-cta container position-relative">
  <div class="contact-cta-inner d-flex flex-column flex-md-row align-items-center justify-content-between p-4 rounded-4 shadow-lg">
    
    <!-- Contact Info -->
    <div class="d-flex flex-column flex-md-row align-items-center gap-4 text-white contact-info">
      <div class="info-box d-flex align-items-center gap-2">
        <div class="icon-circle"><i class="bi bi-telephone-fill"></i></div>
        <span>+971 12 345 6789</span>
      </div>
      <div class="info-box d-flex align-items-center gap-2">
        <div class="icon-circle"><i class="bi bi-envelope-fill"></i></div>
        <span>info@jolaha.com</span>
      </div>
      <div class="info-box d-flex align-items-center gap-2">
        <div class="icon-circle"><i class="bi bi-geo-alt-fill"></i></div>
        <span>BB2 Tower, Mazaya Business Avenue, JLT Dubai UAE.</span>
      </div>
    </div>

    <!-- CTA Button (kept separate so it doesn’t expand) -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#proposalModal">Request Proposal</button>
  </div>
</div>

<!-- Services -->
<section id="services" class="section">
  <div class="container">
    <h2>Services</h2>
    <div class="d-flex justify-content-center">
      <p class="lead text-center">
        From innovative design to seamless applications and digital growth, we deliver end-to-end solutions for your business.
      </p>
    </div> 

    <div class="row g-4 services">

      <!-- Web Design & Development -->
      <div class="col-lg-4 col-md-6">
        <article class="service card h-100 text-center">
          <a href="web-design-dev.html" class="chip text-decoration-none d-inline-block">
            Web Design & Development
          </a>
          <div class="service-icon">
            <i class="bi bi-laptop"></i>
          </div>
          <h3>
            <a href="web-design-dev.html" class="text-decoration-none" style="color: inherit;">
              Custom Website Design
            </a>
          </h3>
          <p>We craft responsive, modern websites tailored to your brand identity and optimized for performance and scalability.</p>
        </article>
      </div>

      <!-- Mobile Application -->
      <div class="col-lg-4 col-md-6">
        <article class="service card h-100 text-center">
          <a href="mobile-app.html" class="chip text-decoration-none d-inline-block">
            Mobile Application
          </a>
          <div class="service-icon">
            <i class="bi bi-phone"></i>
          </div>
          <h3>
            <a href="mobile-app.html" class="text-decoration-none" style="color: inherit;">
              Cross-Platform Apps
            </a>
          </h3>
          <p>We develop intuitive mobile apps for iOS and Android that ensure smooth user experience across all devices.</p>
        </article>
      </div>

      <!-- Online Marketing -->
      <div class="col-lg-4 col-md-6">
        <article class="service card h-100 text-center">
          <a href="online-marketing.html" class="chip text-decoration-none d-inline-block">
            Online Marketing
          </a>
          <div class="service-icon">
            <i class="bi bi-graph-up"></i>
          </div>
          <h3>
            <a href="online-marketing.html" class="text-decoration-none" style="color: inherit;">
              Digital Marketing
            </a>
          </h3>
          <p>Boost your online presence with targeted campaigns, SEO, and social media strategies that drive measurable growth.</p>
        </article>
      </div>

      <!-- Design -->
      <div class="col-lg-4 col-md-6">
        <article class="service card h-100 text-center">
          <a href="creative-design.html" class="chip text-decoration-none d-inline-block">
            Creative Designs
          </a>
          <div class="service-icon">
            <i class="bi bi-palette"></i>
          </div>
          <h3>
            <a href="creative-design.html" class="text-decoration-none" style="color: inherit;">
              UI & UX Design & More
            </a>
          </h3>
          <p>Enhance usability and engagement with creative UI and UX solutions that put your users at the center.</p>
        </article>
      </div>

      <!-- Testing -->
      <div class="col-lg-4 col-md-6">
        <article class="service card h-100 text-center">
          <a href="software-testing.html" class="chip text-decoration-none d-inline-block">
            Software Testing
          </a>
          <div class="service-icon">
            <i class="bi bi-bug"></i>
          </div>
          <h3>
            <a href="software-testing.html" class="text-decoration-none" style="color: inherit;">
              Software Testing
            </a>
          </h3>
          <p>We ensure quality and reliability with thorough manual and automated testing across multiple environments.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<section id="stats" class="bg-light py-5">
  <div class="container text-center">
    <h2 class="text-dark">Why Choose Us</h2>
    <p class="text-dark mb-5">
      We are committed to making a positive impact on our clients' businesses and helping them 
      navigate the complexities of today's business environment with confidence and success.
    </p>

    <div class="row g-4">
      <div class="container">
        <div class="row g-4 text-center">
          <div class="col-sm-6 col-md-3">
            <div class="stat card p-3">
              <div class="num display-6" data-target="150+">0</div>
              <div class="label muted">Engagements delivered</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="stat card p-3">
              <div class="num display-6" data-target="98%">0</div>
              <div class="label muted">On-time completion</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="stat card p-3">
              <div class="num display-6" data-target="40+">0</div>
              <div class="label muted">Industries served</div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="stat card p-3">
              <div class="num display-6" data-target="A+">0</div>
              <div class="label muted">Client satisfaction</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section">
  <div class="container">
    <h2>What Clients Say</h2>
    <div class="d-flex justify-content-center">
      <p class="lead text-center">
        Board-ready insights, clear communication, and pragmatic recommendations.
      </p>
    </div>

    <div id="clientCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- Slide 1 (first 3 clients) -->
        <div class="carousel-item active">
          <div class="row g-4 justify-content-center">
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 1" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Jolaha helped us convert to IFRS and tightened our controls before our fundraise. Smooth end-to-end.”</p>
                <div class="text-light mt-2">CFO, Growth-stage Fintech</div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 2" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Their audit team kept us informed and on schedule. The management letter was practical and prioritized.”</p>
                <div class="text-light mt-2">Chair, Audit Committee</div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 3" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Reliable partner for compliance and reporting. Responsive, meticulous, and easy to work with.”</p>
                <div class="text-light mt-2">MD, Manufacturing Group</div>
              </article>
            </div>
          </div>
        </div>

        <!-- Slide 2 (last card + loop around) -->
        <div class="carousel-item">
          <div class="row g-4 justify-content-center">
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 4" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Great team to work with. They deliver on time and provide actionable insights for our strategy.”</p>
                <div class="text-light mt-2">CEO, Tech Startup</div>
              </article>
            </div>
            <!-- Re-show first 2 for smooth cycling -->
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 1" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Jolaha helped us convert to IFRS and tightened our controls before our fundraise. Smooth end-to-end.”</p>
                <div class="text-light mt-2">CFO, Growth-stage Fintech</div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="quote card p-4 text-center">
                <img src="resources/img/photo.jpg" alt="Client 2" class="rounded-circle mx-auto d-block client-img">
                <p class="mt-3">“Their audit team kept us informed and on schedule. The management letter was practical and prioritized.”</p>
                <div class="text-light mt-2">Chair, Audit Committee</div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Blog -->
<section id="blog" class="section blog-section bg-light">
  <div class="container">
    <!-- Heading -->
    <div class="text-center mb-5">
      <h2 class="section-title">Latest Insights</h2>
      <div class="d-flex justify-content-center">
        <p class="lead text-center">
          Stay updated with expert commentary on web development, mobile apps, digital marketing, and technology trends.
        </p>
      </div>
    </div>

    <div class="row g-4">
      <!-- Blog Post 1 -->
      <div class="col-md-6 col-lg-4">
        <article class="blog-card card h-100">
          <img src="resources/img/blog-1.jpg" class="card-img-top" alt="Web Design Trends 2025">
          <div class="card-body">
            <span class="chip">Web Development</span>
            <h3 class="blog-title">Top Web Design & Development Trends in 2025</h3>
            <p class="blog-excerpt" style="text-align: left;">Explore the latest innovations in responsive design, performance optimization, and user-first websites.</p>
            <a href="#" class="read-more">Read More →</a>
          </div>
        </article>
      </div>

      <!-- Blog Post 2 -->
      <div class="col-md-6 col-lg-4">
        <article class="blog-card card h-100">
          <img src="resources/img/blog-2.jpg" class="card-img-top" alt="Mobile App Growth">
          <div class="card-body">
            <span class="chip">Mobile Apps</span>
            <h3 class="blog-title">The Future of Cross-Platform Mobile Apps</h3>
            <p class="blog-excerpt" style="text-align: left;">Learn how Flutter, React Native, and emerging frameworks are transforming app development for all devices.</p>
            <a href="#" class="read-more">Read More →</a>
          </div>
        </article>
      </div>

      <!-- Blog Post 3 -->
      <div class="col-md-6 col-lg-4">
        <article class="blog-card card h-100">
          <img src="resources/img/blog-3.jpg" class="card-img-top" alt="Digital Marketing Insights">
          <div class="card-body">
            <span class="chip">Digital Marketing</span>
            <h3 class="blog-title">Smart Digital Marketing Strategies for 2025</h3>
            <p class="blog-excerpt" style="text-align: left;">Discover how AI, SEO, and social media trends can help your business grow and stay competitive online.</p>
            <a href="#" class="read-more">Read More →</a>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="section checked py-5" >
  <div class="container">
    <div class="form-wrapper mx-auto p-4 p-md-5">
      <h2 class="fw-bold text-white mb-4 text-center">Get Started With Jolaha Tech</h2>
      <form>
        <div class="row g-3">
          <!-- First Name -->
          <div class="col-md-6">
            <label class="form-label text-white">First Name</label>
            <input type="text" class="form-control" placeholder="Enter first name" required>
          </div>
          <!-- Last Name -->
          <div class="col-md-6">
            <label class="form-label text-white">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name" required>
          </div>
          <!-- Email -->
          <div class="col-md-6">
            <label class="form-label text-white">Email ID</label>
            <input type="email" class="form-control" placeholder="example@email.com" required>
          </div>
          <!-- Contact Number -->
          <div class="col-md-6">
            <label class="form-label text-white">Contact Number</label>
            <input type="tel" class="form-control" placeholder="+971 50 123 4567" required>
          </div>
          <!-- Business Activity -->
          <div class="col-12">
            <label class="form-label text-white">What is your industry?</label>
            <input type="text" class="form-control" placeholder="e.g., Trading, Consulting, IT Services" required>
          </div>
          <!-- Service Required -->
          <div class="col-12">
            <label class="form-label text-white">Which service do you require?</label>
            <select class="form-select" required>
              <option value="">Select...</option>
              <option value="web design and development">Web Design & Development</option>
              <option value="mobile application">Mobile Application</option>
              <option value="online marketing">Online Marketing</option>
              <option value="design">Design</option>
              <option value="testing">Testting</option>
            </select>
          </div>
          <!-- Submit -->
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary px-4">Submit Details</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- NEWSLETTER SUB -->
<section class="section">
  <div class="container">
    <div class="cta card p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
      <div>
        <h2>Subscribe to Our Newsletter</h2>
        <p class="text-dark">Get the latest insights on web development, mobile apps, digital marketing, and IT trends delivered straight to your inbox.</p>
      </div>
      <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
        <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email">
        <button class="btn btn-secondary">Subscribe</button>
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

<!-- Proposal Modal -->
<div class="modal fade" id="proposalModal" tabindex="-1" aria-labelledby="proposalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border-radius: var(--radius);">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="proposalModalLabel" style="color: var(--secondary);">Request a Proposal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="proposalForm">

          <!-- Name -->
          <div class="mb-3">
            <label class="form-label text-dark">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" required>
          </div>

          <!-- Company -->
          <div class="mb-3">
            <label class="form-label text-dark">Company Name</label>
            <input type="text" class="form-control" placeholder="Enter your company name">
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label class="form-label text-dark">Email Address</label>
            <input type="email" class="form-control" placeholder="Enter your email" required>
          </div>

          <!-- Category -->
          <div class="mb-3">
            <label class="form-label text-dark">Category</label>
            <select id="categorySelect" class="form-select" required>
              <option value="">-- Select Category --</option>
              <option value="products">Our Products</option>
              <option value="services">Our Services</option>
              <option value="solutions">Our Solutions</option>
            </select>
          </div>

          <!-- Sub Service -->
          <div class="mb-3">
            <label class="form-label text-dark">Sub Service / Product</label>
            <select id="subServiceSelect" class="form-select" required>
              <option value="">-- Select Option --</option>
            </select>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label class="form-label text-dark">Project Description</label>
            <textarea class="form-control" rows="4" placeholder="Tell us more about your requirements"></textarea>
          </div>

          <!-- Budget -->
          <div class="mb-3">
            <label class="form-label text-dark">Budget</label>
            <div class="d-flex align-items-center gap-3">
              <input type="range" id="budgetRange" class="form-range" min="2500" max="200000" step="500" value="2500">
              <input type="number" id="budgetInput" class="form-control" style="max-width: 200px;" min="2500" max="200000" value="2500">
            </div>
            <p class="mt-2" style="color: var(--secondary);">Selected Budget: <strong id="budgetDisplay">2,500 AED</strong></p>
          </div>

          <!-- Submit -->
          <div class="text-end">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Call Booking Modal -->
<div class="modal fade" id="bookCallModal" tabindex="-1" aria-labelledby="bookCallLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: var(--radius);">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="bookCallLabel" style="color: var(--secondary);">
          Book a Call with Our Agent
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label text-dark">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter your full name">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Company Name</label>
            <input type="text" class="form-control" placeholder="Enter your company name">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Email Address</label>
            <input type="email" class="form-control" placeholder="Enter your email">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Phone Number</label>
            <input type="tel" class="form-control" placeholder="Enter your phone number">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Preferred Date</label>
            <input type="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Preferred Time</label>
            <input type="time" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label text-dark">Additional Notes</label>
            <textarea class="form-control" rows="3" placeholder="Tell us more about your request..."></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Confirm Booking</button>
      </div>
    </div>
  </div>
</div>

<!-- Floating Action Buttons -->
<div class="floating-buttons">
    <!-- WhatsApp Button -->
    <a href="https://wa.me/+971509860136" class="floating-btn whatsapp-btn" target="_blank" rel="noopener">
        <i class="bi bi-whatsapp"></i>
    </a>
   
    <!-- Back to Top Button -->
    <a href="#" class="floating-btn back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="resources/js/main.js" defer></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".num");
    let started = false;

    function animateCount(counter) {
      const target = counter.getAttribute("data-target");
      const isPercentage = target.includes("%");
      const isPlus = target.includes("+");
      const isGrade = target.toUpperCase().includes("A+");

      if (isGrade) {
        // Animate 0 → 100, then replace with "A+"
        let count = 0;
        const duration = 2000;
        const stepTime = 20;
        const increment = Math.ceil(100 / (duration / stepTime));

        const timer = setInterval(() => {
          count += increment;
          if (count >= 100) {
            clearInterval(timer);
            counter.textContent = "A+";
          } else {
            counter.textContent = count;
          }
        }, stepTime);
      } else {
        // Handle numbers with + or %
        const numericTarget = parseInt(target.replace(/\D/g, ""), 10);
        let count = 0;
        const duration = 2000;
        const stepTime = Math.max(Math.floor(duration / numericTarget), 20);

        const timer = setInterval(() => {
          count++;
          if (count >= numericTarget) {
            clearInterval(timer);
            counter.textContent = isPercentage
              ? numericTarget + "%"
              : numericTarget + (isPlus ? "+" : "");
          } else {
            counter.textContent = isPercentage
              ? count + "%"
              : count + (isPlus ? "+" : "");
          }
        }, stepTime);
      }
    }

    function checkScroll() {
      const section = document.querySelector("#stats");
      if (!section) return;
      const rect = section.getBoundingClientRect();

      if (!started && rect.top < window.innerHeight && rect.bottom > 0) {
        counters.forEach(animateCount);
        started = true;
      }
    }

    window.addEventListener("scroll", checkScroll);
  });
  

   document.addEventListener("DOMContentLoaded", function() {
    const categorySelect = document.getElementById("categorySelect");
    const subServiceSelect = document.getElementById("subServiceSelect");
    const budgetRange = document.getElementById("budgetRange");
    const budgetInput = document.getElementById("budgetInput");
    const budgetDisplay = document.getElementById("budgetDisplay");

    const options = {
      products: [
        "Jolaha CRMS",
        "Jolaha HRMS",
        "Jolaha Accountrix",
        "Jolaha PMS",
        "Jolaha Help Desk",
        "Jolaha AML",
        "Jolaha LMS"
      ],
      services: [
        "Web Design & Development",
        "Mobile Application",
        "Online Marketing",
        "Creative Design",
        "Software Testing"
      ],
      solutions: [
        "Server Management",
        "IT Support",
        "Cloud",
        "Hosting"
      ]
    };

    // Update sub-service options dynamically
    categorySelect.addEventListener("change", function() {
      const selected = this.value;
      subServiceSelect.innerHTML = '<option value="">-- Select Option --</option>';
      if (options[selected]) {
        options[selected].forEach(opt => {
          const optionEl = document.createElement("option");
          optionEl.value = opt;
          optionEl.textContent = opt;
          subServiceSelect.appendChild(optionEl);
        });
      }
    });

    // Sync budget slider and input
    function updateBudget(value) {
      budgetDisplay.textContent = new Intl.NumberFormat().format(value) + " AED";
      budgetInput.value = value;
      budgetRange.value = value;
    }

    budgetRange.addEventListener("input", e => updateBudget(e.target.value));
    budgetInput.addEventListener("input", e => updateBudget(e.target.value));
  });


  // Back to top button functionality
  document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.querySelector('.back-to-top');
    
    // Show/hide button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });
    
    // Smooth scroll to top
    backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // WhatsApp button click tracking (optional)
    const whatsappBtn = document.querySelector('.whatsapp-btn');
    whatsappBtn.addEventListener('click', function() {
        // You can add analytics tracking here
        console.log('WhatsApp button clicked');
    });
});
</script>
</body>
</html>