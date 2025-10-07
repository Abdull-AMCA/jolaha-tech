  <!-- Header / Navigation -->
  <?php
    include 'includes/database.php';
    include 'includes/functions.php';
    session_start();
  ?>
  <header>
    <div class="container nav">
    <a class="brand d-flex align-items-center" href="index.php">
      <img src="resources/img/logo.svg" alt="Jolaha Tech Logo" class="logo-img me-2" />
      <span></span>
    </a>

    <nav class="menu navbar navbar-expand-lg" id="menu" style="height: 40px;">
      <div class="container-fluid">
        <ul class="navbar-nav mx-auto">

          <!-- About -->
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <!-- Industry Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="industryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Industries
            </a>
            <ul class="dropdown-menu" aria-labelledby="industryDropdown">
              <li><a class="dropdown-item" href="audit-accounting.php">Audit & Accounting</a></li>
              <li><a class="dropdown-item" href="real-estate.php">Real Estate</a></li>
              <li><a class="dropdown-item" href="info-tech.php">IT</a></li>
            </ul>
          </li>

          <!-- Product Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="our-products.php" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Our Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="productDropdown">
              <li><a class="dropdown-item" href="jolaha-hrms.php">Jolaha HRMS</a></li>
              <li><a class="dropdown-item" href="jolaha-accountrix.php">Jolaha Accountrix</a></li>
              <li><a class="dropdown-item" href="jolaha-crms.php">Jolaha CRMS</a></li>
              <li><a class="dropdown-item" href="jolaha-pms.php">Jolaha PMS</a></li>
              <li><a class="dropdown-item" href="jolaha-help-desk.php">Jolaha Help Desk</a></li>
              <li><a class="dropdown-item" href="jolaha-aml.php">Jolaha AML</a></li>
              <li><a class="dropdown-item" href="jolaha-lms.php">Jolaha LMS</a></li>
            </ul>
          </li>

          <!-- Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="our-services.php" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Our Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="web-design-dev.php">Web Design & Development</a></li>
              <li><a class="dropdown-item" href="mobile-app.php">Mobile Application</a></li>
              <li><a class="dropdown-item" href="online-marketing.php">Online Marketing</a></li>
              <li><a class="dropdown-item" href="creative-design.php">Creative Design</a></li>
              <li><a class="dropdown-item" href="software-testing.php">Software Testing</a></li>
            </ul>
          </li>

          <!-- Solutions Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="solutionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Solutions
            </a>
            <ul class="dropdown-menu" aria-labelledby="solutionsDropdown">
              <li><a class="dropdown-item" href="server-management.php">Server Management</a></li>
              <li><a class="dropdown-item" href="it-support.php">IT Support</a></li>
              <li><a class="dropdown-item" href="cloud-solution.php">Cloud Solutions</a></li>
              <li><a class="dropdown-item" href="hosting-solutions.php">Hosting Solutions</a></li>
            </ul>
          </li>

          <!-- Resources Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Resources
            </a>
            <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
              <li><a class="dropdown-item" href="knowledge-base.php">Knowledge Base</a></li>
              <li><a class="dropdown-item" href="newsletter.php">Newsletter</a></li>
              <li><a class="dropdown-item" href="blog.php">Blog</a></li>
            </ul>
          </li>

          <!-- Services (with submenu) 
          <li class="dropdown">
            <a class="dropdown-toggle" data-bs-toggle="dropdown">Services</a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" href="#">Web</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Web Design</a></li>
                  <li><a href="#">Web Hosting</a></li>
                </ul>
              </li>
            </ul>
          </li-->

          <!-- Careers -->
          <li class="nav-item">
            <a class="nav-link" href="careers.php">Careers</a>
          </li>

          <!-- Contact -->
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact</a>
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
  