<?php
include 'includes/head.php';
?>

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

    <?php
    include 'includes/header-navbar.php';
    ?>

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
                  <a class="btn btn-ghost" href="our-services.php">Explore services</a>
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
            <a href="web-design-dev.php" class="chip text-decoration-none d-inline-block">
              Web Design & Development
            </a>
            <div class="service-icon">
              <i class="bi bi-laptop"></i>
            </div>
            <h3>
              <a href="web-design-dev.php" class="text-decoration-none" style="color: inherit;">
                Custom Website Design
              </a>
            </h3>
            <p>We craft responsive, modern websites tailored to your brand identity and optimized for performance and scalability.</p>
          </article>
        </div>

        <!-- Mobile Application -->
        <div class="col-lg-4 col-md-6">
          <article class="service card h-100 text-center">
            <a href="mobile-app.php" class="chip text-decoration-none d-inline-block">
              Mobile Application
            </a>
            <div class="service-icon">
              <i class="bi bi-phone"></i>
            </div>
            <h3>
              <a href="mobile-app.php" class="text-decoration-none" style="color: inherit;">
                Cross-Platform Apps
              </a>
            </h3>
            <p>We develop intuitive mobile apps for iOS and Android that ensure smooth user experience across all devices.</p>
          </article>
        </div>

        <!-- Online Marketing -->
        <div class="col-lg-4 col-md-6">
          <article class="service card h-100 text-center">
            <a href="online-marketing.php" class="chip text-decoration-none d-inline-block">
              Online Marketing
            </a>
            <div class="service-icon">
              <i class="bi bi-graph-up"></i>
            </div>
            <h3>
              <a href="online-marketing.php" class="text-decoration-none" style="color: inherit;">
                Digital Marketing
              </a>
            </h3>
            <p>Boost your online presence with targeted campaigns, SEO, and social media strategies that drive measurable growth.</p>
          </article>
        </div>

        <!-- Design -->
        <div class="col-lg-4 col-md-6">
          <article class="service card h-100 text-center">
            <a href="creative-design.php" class="chip text-decoration-none d-inline-block">
              Creative Designs
            </a>
            <div class="service-icon">
              <i class="bi bi-palette"></i>
            </div>
            <h3>
              <a href="creative-design.php" class="text-decoration-none" style="color: inherit;">
                UI & UX Design & More
              </a>
            </h3>
            <p>Enhance usability and engagement with creative UI and UX solutions that put your users at the center.</p>
          </article>
        </div>

        <!-- Testing -->
        <div class="col-lg-4 col-md-6">
          <article class="service card h-100 text-center">
            <a href="software-testing.php" class="chip text-decoration-none d-inline-block">
              Software Testing
            </a>
            <div class="service-icon">
              <i class="bi bi-bug"></i>
            </div>
            <h3>
              <a href="software-testing.php" class="text-decoration-none" style="color: inherit;">
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

    <?php
    // -------------------
    // Fetch latest 3 posts (using your existing $connection)
    // -------------------
    $query = "SELECT post_id, post_title, post_content, post_author_name, post_image, post_category, created_at 
              FROM posts 
              ORDER BY created_at DESC 
              LIMIT 3";

    $stmt = $connection->prepare($query);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<!-- -------------------
    Blog Section Cards
------------------- -->
<div class="row gy-4">
  <?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
      <?php
        // Truncate post content
        $excerpt = strlen($post['post_content']) > 150 
          ? substr($post['post_content'], 0, 150) . '...' 
          : $post['post_content'];

        // Calculate time difference for the "posted" label
        $createdTime = strtotime($post['created_at']);
        $currentTime = time();
        $hoursDiff = ($currentTime - $createdTime) / 3600;

        if ($hoursDiff < 24) {
          $postedLabel = "Posted Today";
        } elseif ($hoursDiff < 48) {
          $postedLabel = "Posted Yesterday";
        } elseif ($hoursDiff < 72) {
          $postedLabel = "Posted 3 days ago";
        } else {
          $postedLabel = "Posted on " . date("M j, Y", $createdTime);
        }
      ?>
        <div class="col-md-6 col-lg-4">
          <article class="blog-card card h-100">
            <img 
              src="resources/img/uploads/posts/<?php echo htmlspecialchars($post['post_image']); ?>" 
              class="card-img-top" 
              alt="<?php echo htmlspecialchars($post['post_title']); ?>"
            >
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="chip"><?php echo htmlspecialchars($post['post_category']); ?></span>
                <small class="text-light" style="font-size: 0.85rem;">
                  <?php echo htmlspecialchars($postedLabel); ?>
                </small>
              </div>

              <h3 class="blog-title"><?php echo htmlspecialchars($post['post_title']); ?></h3>
              <p class="blog-excerpt" style="text-align:left;">
                <?php echo htmlspecialchars($excerpt); ?>
              </p>
              <a href="post.php?id=<?php echo urlencode($post['post_id']); ?>" class="read-more">
                Read More →
              </a>
            </div>
          </article>
        </div>
      <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center text-muted">No posts found.</p>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>


  <!-- Service Inquiry Form -->
  <section class="section checked py-5">
    <div class="container">
      <div class="form-wrapper mx-auto p-4 p-md-5">
        <h2 class="fw-bold text-white mb-4 text-center">Get Started With Jolaha Tech</h2>
        <form method="POST" action="">
          <div class="row g-3">
            <!-- Full Name -->
            <div class="col-md-6">
              <label class="form-label text-white">Full Name</label>
              <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <!-- Company Name -->
            <div class="col-md-6">
              <label class="form-label text-white">Company Name</label>
              <input type="text" name="company_name" class="form-control" placeholder="Enter company name">
            </div>
            <!-- Email -->
            <div class="col-md-6">
              <label class="form-label text-white">Email ID</label>
              <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
            </div>
            <!-- Service Required -->
            <div class="col-md-6">
              <label class="form-label text-white">Which service do you require?</label>
              <select name="service_type" class="form-select" required>
                <option value="">Select...</option>
                <option value="Web Design & Development">Web Design & Development</option>
                <option value="Mobile Application">Mobile Application</option>
                <option value="Online Marketing">Online Marketing</option>
                <option value="Design">Creative Design</option>
                <option value="Testing">Software Testing</option>
              </select>
            </div>
            <!-- Project Type -->
            <div class="col-md-6">
              <label class="form-label text-white">Project Type</label>
              <input type="text" name="project_type" class="form-control" placeholder="e.g., Website Revamp, New App Development">
            </div>
            <!-- Budget Range -->
            <div class="col-md-6">
              <label class="form-label text-white">Estimated Budget Range (AED)</label>
              <input type="text" name="budget_range" class="form-control" placeholder="e.g., 10,000 - 25,000">
            </div>
            <!-- Timeline -->
            <div class="col-md-6">
              <label class="form-label text-white">Preferred Timeline</label>
              <input type="text" name="timeline" class="form-control" placeholder="e.g., 1 Month, 3 Weeks">
            </div>
            <!-- Description -->
            <div class="col-12">
              <label class="form-label text-white">Project Description</label>
              <textarea name="description" rows="4" class="form-control" placeholder="Tell us a bit more about your project"></textarea>
            </div>
            <!-- Submit -->
            <div class="col-12 text-center mt-4">
              <button type="submit" name="service_inquiry_submit" class="btn btn-primary px-4">Submit Details</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
      $inquiry_result = null;

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_inquiry_submit'])) {
          $inquiry_result = handle_service_inquiry();
      }
    ?>
  </section>

  <!-- NEWSLETTER SUB -->
  <section class="section">
    <div class="container">
      <div class="cta card p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <div>
          <h2>Subscribe to Our Newsletter</h2>
          <p class="text-dark">
            Get the latest insights on web development, mobile apps, digital marketing, and IT trends delivered straight to your inbox.
          </p>
        </div>

        <form method="POST" class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
          <input type="text" name="name" class="form-control" placeholder="Your Name" aria-label="Name" required>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" aria-label="Email" required>
          <button type="submit" name="newsletter_submit" class="btn btn-secondary">Subscribe</button>
        </form>
      </div>
    </div>
    <?php
      $subscription_result = null;

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsletter_submit'])) {
          $subscription_result = handle_newsletter_subscription();
      }
      
    ?>
  </section>

  <!-- Service Inquiry Success Modal -->
  <div class="modal fade" id="serviceenqsuccessModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="successModalLabel" style="color: var(--secondary);">
            Inquiry Submitted Successfully 🎉
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Thank you for reaching out to <strong>Jolaha Tech</strong>! Our team will contact you within 24 hours with your customized proposal.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Service Inquiry Error Modal -->
  <div class="modal fade" id="serviceenqerrorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="errorModalLabel" style="color: #dc3545;">
            Submission Failed ⚠️
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="serviceenqerrorModalMessage">Something went wrong. Please try again later.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Newsletter Success Modal -->
  <div class="modal fade" id="newslettersuccessModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="successModalLabel" style="color: var(--secondary);">
            Subscription Successful 🎉
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Thank you for subscribing to <strong>Jolaha Tech</strong>! You’ll now receive updates, insights, and offers directly in your inbox.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Newsletter Error Modal -->
  <div class="modal fade" id="newslettererrorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: var(--bg-light); color: var(--primary); border-radius: var(--radius);">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold" id="errorModalLabel" style="color: #dc3545;">
            Subscription Failed ⚠️
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="newslettererrorModalMessage">An unexpected error occurred. Please try again later.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
      <a href="https://wa.me/+971123456789" class="floating-btn whatsapp-btn" target="_blank" rel="noopener">
          <i class="bi bi-whatsapp"></i>
      </a>
    
      <!-- Back to Top Button -->
      <a href="#" class="floating-btn back-to-top">
          <i class="bi bi-arrow-up"></i>
      </a>
  </div>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

<?php 
  if (!is_null($subscription_result)): ?>

  <?php endif; 
?>

</body>
</html>