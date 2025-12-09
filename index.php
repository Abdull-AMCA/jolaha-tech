<?php
include 'includes/head.php';
?>

<body>
  <!-- Hero Section -->
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
                  <img src="images/hero1.jpg" alt="" class="img-fluid rounded-3">
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
                <span class="chip">Some Jolaha Service or Product</span>
                <h1 class="hero-title">Some Title of Jolaha Service will go Here</h1>
                <p class="lead hero-lead">Some description of Jolaha service will go here.</p>
                <div class="d-flex gap-3 flex-wrap">
                  <a class="btn btn-primary" href="#contact">Call To Action</a>
                </div>
              </div>
              <!--div class="col-lg-5">
                <div class="hero-illustration card">
                  <img src="images/hero2.jpg" alt="Call To Action" class="img-fluid rounded-3">
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
                <span class="chip">Some Jolaha Service or Product</span>
                <h1 class="hero-title">Some Title of Jolaha Service will go Here</h1>
                <p class="lead hero-lead">Some description of Jolaha service will go here.</p>
                <div class="d-flex gap-3 flex-wrap">
                  <a class="btn btn-primary" href="#contact">Call To Action</a>
                </div>
              </div>
              <!--div class="col-lg-5">
                <div class="hero-illustration card">
                  <img src="images/hero3.jpg" alt="" class="img-fluid rounded-3">
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

  <!-- Contact CTA -->
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
  <section id="services" class="services-section py-6">
    <div class="container">
      <div class="row justify-content-center text-center mb-6">
        <div class="col-lg-8">
          <span class="section-badge">OUR EXPERTISE</span>
          <h2 class="display-5 fw-bold mb-4">Comprehensive Digital Solutions</h2>
          <p class="text">
            From innovative design to seamless applications and digital growth, we deliver end-to-end solutions 
            that transform your business vision into digital reality.
          </p>
        </div>
      </div>

      <div class="row g-4">
        <!-- Web Design & Development -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Web Design & Development</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-laptop"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="web-design-dev.php" class="text-decoration-none">
                    Custom Website Design
                  </a>
                </h3>
                <p class="service-description">
                  We craft responsive, modern websites tailored to your brand identity and optimized for performance and scalability.
                </p>
              </div>

              <div class="service-footer">
                <a href="web-design-dev.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>

        <!-- Mobile Application -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Mobile Application</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-phone"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div><br/>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="mobile-app.php" class="text-decoration-none">
                    Cross-Platform Apps
                  </a>
                </h3>
                <p class="service-description">
                  We develop intuitive mobile apps for iOS and Android that ensure smooth user experience across all devices.
                </p>
              </div>

              <div class="service-footer">
                <a href="mobile-app.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>

        <!-- Online Marketing -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Online Marketing</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-graph-up"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="online-marketing.php" class="text-decoration-none">
                    Digital Marketing
                  </a>
                </h3>
                <p class="service-description">
                  Boost your online presence with targeted campaigns, SEO, and social media strategies that drive measurable growth.
                </p>
              </div>

              <div class="service-footer">
                <a href="online-marketing.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>

        <!-- Design -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Creative Designs</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-palette"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="creative-design.php" class="text-decoration-none">
                    UI & UX Design & More
                  </a>
                </h3>
                <p class="service-description">
                  Enhance usability and engagement with creative UI and UX solutions that put your users at the center.
                </p>
              </div>

              <div class="service-footer">
                <a href="creative-design.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>

        <!-- Testing -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Software Testing</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-bug"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="software-testing.php" class="text-decoration-none">
                    Software Testing
                  </a>
                </h3>
                <p class="service-description">
                  We ensure quality and reliability with thorough manual and automated testing across multiple environments.
                </p>
              </div>

              <div class="service-footer">
                <a href="software-testing.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>

        <!-- Consultation -->
        <div class="col-lg-4 col-md-6">
          <article class="service-card">
            <div class="service-card-inner">
              <div class="service-header">
                <div class="service-chip">
                  <span>Consultation</span>
                </div>
                <div class="service-icon">
                  <div class="icon-wrapper">
                    <i class="bi bi-chat-dots"></i>
                  </div>
                  <div class="icon-glow"></div>
                </div>
              </div>
              
              <div class="service-content">
                <h3 class="service-title">
                  <a href="consultation.php" class="text-decoration-none">
                    Strategic Consultation
                  </a>
                </h3>
                <p class="service-description">
                  Get expert guidance and strategic insights to make informed decisions about your digital transformation journey.
                </p>
              </div>

              <div class="service-footer">
                <a href="consultation.php" class="service-link">
                  <span>Explore Service</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div class="service-hover-effect"></div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats/Why Choose Us -->
  <section id="stats" class="stats-section py-6" style="background: var(--bg-light);">
    <div class="container">
      <div class="row justify-content-center text-center mb-6">
        <div class="col-lg-8">
          <span class="section-badge">OUR IMPACT</span>
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary)">Why Trust Jolaha Tech</h2>
          <p class="" style="color: var(--surface)">
            We're committed to delivering exceptional results that drive real business growth. 
            Our track record speaks for itself through measurable success and client satisfaction.
          </p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-sm-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-rocket-takeoff"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number num" data-target="150+">0</div>
              <div class="stat-label">Projects Delivered</div>
              <div class="stat-description">Successful engagements across diverse industries</div>
            </div>
            <div class="stat-glow"></div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-clock"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number num" data-target="98%">0</div>
              <div class="stat-label">On-Time Delivery</div>
              <div class="stat-description">Meeting deadlines with precision</div>
            </div>
            <div class="stat-glow"></div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-building"></i>
            </div>
            <div class="stat-content">
              <div class="stat-number num" data-target="40+">0</div>
              <div class="stat-label">Industries Served</div>
              <div class="stat-description">From startups to enterprises</div>
            </div>
            <div class="stat-glow"></div>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-award"></i>
            </div>
            <div class="stat-content">
              <div class="stat-grade num" data-target="A+">0</div>
              <div class="stat-label">Client Satisfaction</div>
              <div class="stat-description">Rated excellent by our partners</div>
            </div>
            <div class="stat-glow"></div>
          </div>
        </div>
      </div>

      <!-- Trust Indicators -->
      <div class="row mt-6 pt-5">
        <div class="col-12">
          <div class="trust-bar" style="background: var(--card);">
            <div class="trust-item">
              <i class="bi bi-shield-check"></i>
              <span>Enterprise-Grade Security</span>
            </div>
            <div class="trust-item">
              <i class="bi bi-patch-check"></i>
              <span>Certified Experts</span>
            </div>
            <div class="trust-item">
              <i class="bi bi-globe2"></i>
              <span>Global Delivery</span>
            </div>
            <div class="trust-item">
              <i class="bi bi-headset"></i>
              <span>24/7 Support</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials-section py-6">
    <div class="container">
      <div class="row justify-content-center text-center mb-6">
        <div class="col-lg-8">
          <span class="section-badge">CLIENT SUCCESS</span>
          <h2 class="display-5 fw-bold mb-4">Trusted by Industry Leaders</h2>
          <p class="text">
            Discover why businesses choose Jolaha Tech as their trusted digital transformation partner.
          </p>
        </div>
      </div>

      <div class="testimonials-carousel-wrapper">
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          </div>

          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="CFO, Growth-stage Fintech" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Jolaha helped us convert to IFRS and tightened our controls before our fundraise. Smooth end-to-end delivery with exceptional attention to detail."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Sarah Johnson</h4>
                        <p class="client-position">CFO, Growth-stage Fintech</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>

                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="Chair, Audit Committee" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Their audit team kept us informed and on schedule. The management letter was practical, prioritized, and provided clear actionable insights."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Michael Chen</h4>
                        <p class="client-position">Chair, Audit Committee</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>

                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="MD, Manufacturing Group" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Reliable partner for compliance and reporting. Responsive, meticulous, and exceptionally easy to work with. Highly recommended."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Robert Martinez</h4>
                        <p class="client-position">MD, Manufacturing Group</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
              <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="CEO, Tech Startup" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Great team to work with. They consistently deliver on time and provide actionable strategic insights that drive our business forward."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Emily Rodriguez</h4>
                        <p class="client-position">CEO, Tech Startup</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>

                <!-- Repeat first two for smooth cycling -->
                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="CFO, Growth-stage Fintech" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Jolaha helped us convert to IFRS and tightened our controls before our fundraise. Smooth end-to-end delivery with exceptional attention to detail."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Sarah Johnson</h4>
                        <p class="client-position">CFO, Growth-stage Fintech</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>

                <div class="col-lg-4 col-md-6">
                  <article class="testimonial-card">
                    <div class="testimonial-header">
                      <div class="client-avatar">
                        <img src="resources/img/photo.jpg" alt="Chair, Audit Committee" class="avatar-img">
                        <div class="avatar-glow"></div>
                      </div>
                      <div class="client-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                    
                    <div class="testimonial-content">
                      <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                      </div>
                      <p class="testimonial-text">
                        "Their audit team kept us informed and on schedule. The management letter was practical, prioritized, and provided clear actionable insights."
                      </p>
                    </div>

                    <div class="testimonial-footer">
                      <div class="client-info">
                        <h4 class="client-name">Michael Chen</h4>
                        <p class="client-position">Chair, Audit Committee</p>
                      </div>
                    </div>
                    <div class="testimonial-hover-effect"></div>
                  </article>
                </div>
              </div>
            </div>
          </div>

          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Section-->
  <section id="blog" class="testimonials-section" style="background: var(--bg-light); padding-top: 4rem; padding-bottom: 4rem;">
    <div class="container">
      <!-- Heading -->
      <div class="row justify-content-center text-center text-center">
        <div class="col-lg-8">
          <span class="section-badge">LATEST INSIGHTS</span>
          <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary)">Blog Posts</h2>
          <p class="text-dark">
            Stay updated with expert commentary on web development, mobile apps, digital marketing, and technology trends.
          </p>
        </div>
    </div>

    <?php
      $query = "SELECT post_id, post_slug, post_title, post_content, post_author_name, post_image, post_category, created_at 
                  FROM posts 
                ORDER BY created_at DESC 
                LIMIT 3";

      $stmt = $connection->prepare($query);
      $stmt->execute();
      $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Cards -->
    <div class="row gy-4 mb-5">
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
            } elseif ($hoursDiff < 96) {
              $postedLabel = "Posted 4 days ago";
            } elseif ($hoursDiff < 120) {
              $postedLabel = "Posted 5 days ago";
            }else {
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
                <a href="post-details.php?slug=<?php echo urlencode($post['post_slug']); ?>" class="read-more">
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
  <div class="modal fade" id="serviceenqerrorModalMessage" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
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

              
                <form id="callBookingForm" method="POST">
                  <div class="modal-body">
                      <div id="bookingMessage" style="display: none;"></div>
                      
                      <div class="mb-3">
                          <label class="form-label text-dark">Full Name *</label>
                          <input type="text" class="form-control" name="full_name" placeholder="Enter your full name" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Email Address *</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Company Name</label>
                          <input type="text" class="form-control" name="company_name" placeholder="Enter your company name">
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Phone Number *</label>
                          <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Preferred Date *</label>
                          <input type="date" class="form-control" name="preferred_date" required min="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Preferred Time *</label>
                          <input type="time" class="form-control" name="preferred_time" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label text-dark">Additional Notes</label>
                          <textarea class="form-control" name="additional_notes" rows="3" placeholder="Tell us more about your request..."></textarea>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary" id="submitBookingBtn">
                          <span class="spinner-border spinner-border-sm me-2" style="display: none;"></span>
                          Confirm Booking
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!--  Call Booking Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center">
              <div class="modal-header bg-success text-white border-0">
                  <h5 class="modal-title"><i class="bi bi-check-circle-fill me-2"></i>Booking Confirmed!</h5>
                  <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body py-4">
                  <i class="bi bi-check-circle display-1 text-success mb-3"></i>
                  <h4 class="text-success">Call Booked Successfully!</h4>
                  <p class="text-muted">Our agent will contact you shortly to confirm the call details.</p>
              </div>
              <div class="modal-footer justify-content-center border-0">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
              </div>
          </div>
      </div>
  </div>

  <!--  Call Booking Error Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center">
              <div class="modal-header bg-danger text-white border-0">
                  <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i>Booking Failed</h5>
                  <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body py-4">
                  <i class="bi bi-x-circle display-1 text-danger mb-3"></i>
                  <h4 class="text-danger" id="errorTitle">Oops! Something went wrong</h4>
                  <p class="text-muted" id="errorMessage">Please try again later or contact support.</p>
              </div>
              <div class="modal-footer justify-content-center border-0">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Try Again</button>
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

  <!-- Floating Chat Button -->
  <div id="jolai-floating-btn" class="jolai-floating-btn">
      <div class="jolai-avatar">
          <img src="resources/img/jolai-2.svg" alt="JolAI Assistant" width="40" height="40" />
      </div>
      <span class="jolai-pulse"></span>
  </div>

  <!-- JolAI Chat Widget -->
  <div id="jolai-chat-widget" class="jolai-chat-widget jolai-hidden">
      <!-- Chat Header -->
      <div class="jolai-header">
          <div class="jolai-header-content">
              <img src="resources/img/jolai-2.svg" alt="JolAI Assistant" width="25" height="25" />
              <div class="jolai-header-text">
                  <h6 class="jolai-title">JolAI Assistant</h6>
                  <span class="jolai-status">Online</span>
              </div>
          </div>
          <button id="jolai-close" class="jolai-close-btn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M18 6L6 18M6 6l12 12"/>
              </svg>
          </button>
      </div>

      <!-- Chat Messages Container -->
      <div id="jolai-messages" class="jolai-messages">
          <div class="jolai-welcome-message">
              <div class="jolai-welcome-avatar">
                  <img src="resources/img/jolai-2.svg" alt="JolAI Assistant" width="40" height="40" />
              </div>
              <div class="jolai-welcome-text">
                  <h4>Hello! I'm JolAI 👋</h4>
                  <p>Jolaha's AI Assistant. I'm here to help you learn about Jolaha's services and answer any questions you might have.</p>
              </div>
          </div>
      </div>

      <!-- Dynamic Prompts -->
      <div id="jolai-prompts" class="jolai-prompts">
          <div class="jolai-prompts-header">
              <div class="jolai-prompts-title-container">
                  <button id="jolai-toggle-prompts" class="jolai-toggle-btn" title="Toggle quick questions">
                      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M6 9l6 6 6-6"/>
                      </svg>
                  </button>
                  <span class="jolai-prompts-title">Quick Questions</span>
              </div>
              <div class="jolai-prompts-actions">
                  <button id="jolai-refresh-prompts" class="jolai-refresh-btn" title="Refresh suggestions">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M23 4v6h-6M1 20v-6h6"/>
                          <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                      </svg>
                  </button>
              </div>
          </div>
          <div id="jolai-prompts-container" class="jolai-prompts-container jolai-prompts-expanded">
              <!-- Dynamic prompts will be inserted here -->
          </div>
      </div>

      <!-- Chat Input Area -->
      <div class="jolai-input-area">
          <div class="jolai-input-container">
              <input type="text" id="jolai-user-input" class="jolai-input" placeholder="Message JolAI..." maxlength="500">
              <button id="jolai-send-btn" class="jolai-send-btn">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                  </svg>
              </button>
          </div>
          <div class="jolai-input-footer">
              <span class="jolai-char-count">0/500</span>
              <span class="jolai-powered-by">Powered by Jolaha Tech</span>
          </div>
      </div>
  </div>


  <script>
    // JolAI Chat Widget JavaScript
    class JolAIChat {
        constructor() {
            this.conversationHistory = [];
            this.usedPrompts = new Set();
            this.availablePrompts = [
                "What web development services do you offer?",
                "Tell me about your mobile app development",
                "How can I contact Jolaha?",
                "What industries do you serve?",
                "Do you provide ongoing support?",
                "What's your typical project timeline?",
                "Can you work with startups?",
                "What technologies do you specialize in?",
                "Do you offer UI/UX design services?",
                "What makes Jolaha different from others?"
            ];
            
            this.isTyping = false;
            this.currentStatus = 'Online';
            this.promptsExpanded = true;
            
            this.initializeElements();
            this.bindEvents();
            this.generatePrompts();
        }

        initializeElements() {
            this.floatingBtn = document.getElementById('jolai-floating-btn');
            this.chatWidget = document.getElementById('jolai-chat-widget');
            this.messagesContainer = document.getElementById('jolai-messages');
            this.userInput = document.getElementById('jolai-user-input');
            this.sendBtn = document.getElementById('jolai-send-btn');
            this.closeBtn = document.getElementById('jolai-close');
            this.promptsContainer = document.getElementById('jolai-prompts-container');
            this.refreshPromptsBtn = document.getElementById('jolai-refresh-prompts');
            this.togglePromptsBtn = document.getElementById('jolai-toggle-prompts');
            this.charCount = document.querySelector('.jolai-char-count');
            this.statusElement = document.querySelector('.jolai-status');

            // Load collapse state from localStorage
            const savedState = localStorage.getItem('jolaiPromptsExpanded');
            if (savedState !== null) {
                this.promptsExpanded = savedState === 'true';
            }
            
            // Apply initial state
            if (this.promptsExpanded) {
                this.expandPrompts();
            } else {
                this.collapsePrompts();
            }
        }

        bindEvents() {
            this.floatingBtn.addEventListener('click', () => this.toggleChat());
            this.closeBtn.addEventListener('click', () => this.hideChat());
            this.sendBtn.addEventListener('click', () => this.sendMessage());
            this.userInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }
            });
            
            this.userInput.addEventListener('input', () => this.updateCharCount());
            this.refreshPromptsBtn.addEventListener('click', () => this.generatePrompts());
            this.togglePromptsBtn.addEventListener('click', () => this.togglePrompts());
            
            // Click outside to close
            document.addEventListener('click', (e) => {
                if (!this.chatWidget.contains(e.target) && !this.floatingBtn.contains(e.target)) {
                    this.hideChat();
                }
            });
        }

        updateStatus(status) {
            this.currentStatus = status;
            this.statusElement.textContent = status;
            
            // Add status-specific styling
            const statusColors = {
                'Online': 'var(--accent)',
                'Thinking...': 'var(--secondary)',
                'Analyzing...': 'var(--secondary)',
                'Researching...': 'var(--secondary)',
                'Responding...': 'var(--primary)',
                'Typing...': 'var(--primary)'
            };
            
            this.statusElement.style.color = statusColors[status] || 'var(--accent)';
        }

        toggleChat() {
            this.chatWidget.classList.toggle('jolai-hidden');
            if (!this.chatWidget.classList.contains('jolai-hidden')) {
                this.userInput.focus();
                this.updateStatus('Online');
            }
        }

        hideChat() {
            this.chatWidget.classList.add('jolai-hidden');
        }

        updateCharCount() {
            const count = this.userInput.value.length;
            this.charCount.textContent = `${count}/500`;
            
            if (count > 450) {
                this.charCount.style.color = 'var(--secondary)';
            } else {
                this.charCount.style.color = 'var(--muted)';
            }
        }

        togglePrompts() {
            this.promptsExpanded = !this.promptsExpanded;
            
            if (this.promptsExpanded) {
                this.expandPrompts();
            } else {
                this.collapsePrompts();
            }
            
            // Save state to localStorage
            localStorage.setItem('jolaiPromptsExpanded', this.promptsExpanded);
        }

        expandPrompts() {
            this.promptsContainer.classList.remove('jolai-prompts-collapsed');
            this.promptsContainer.classList.add('jolai-prompts-expanded');
            this.togglePromptsBtn.classList.remove('collapsed');
            this.promptsExpanded = true;
        }

        collapsePrompts() {
            this.promptsContainer.classList.remove('jolai-prompts-expanded');
            this.promptsContainer.classList.add('jolai-prompts-collapsed');
            this.togglePromptsBtn.classList.add('collapsed');
            this.promptsExpanded = false;
        }

        generatePrompts() {
            this.promptsContainer.innerHTML = '';
            
            // Filter out used prompts and get 3 random ones
            const unusedPrompts = this.availablePrompts.filter(prompt => !this.usedPrompts.has(prompt));
            const randomPrompts = this.shuffleArray([...unusedPrompts]).slice(0, 3);
            
            // If we don't have enough unused prompts, reuse some
            if (randomPrompts.length < 3) {
                const additional = this.shuffleArray([...this.usedPrompts]).slice(0, 3 - randomPrompts.length);
                randomPrompts.push(...additional);
            }

            randomPrompts.forEach(prompt => {
                const button = document.createElement('button');
                button.className = `jolai-prompt-btn ${this.usedPrompts.has(prompt) ? 'jolai-prompt-used' : ''}`;
                button.textContent = prompt;
                button.addEventListener('click', () => {
                    if (!this.usedPrompts.has(prompt)) {
                        this.usedPrompts.add(prompt);
                        button.classList.add('jolai-prompt-used');
                        this.sendMessage(prompt);
                        
                        // Auto-collapse after selecting a prompt for better UX
                        setTimeout(() => this.collapsePrompts(), 500);
                    }
                });
                this.promptsContainer.appendChild(button);
            });
            
            // Animate prompts in when generating new ones
            if (this.promptsExpanded) {
                this.animatePromptsIn();
            }
        }

        animatePromptsIn() {
            const prompts = this.promptsContainer.querySelectorAll('.jolai-prompt-btn');
            prompts.forEach((prompt, index) => {
                prompt.style.opacity = '0';
                prompt.style.transform = 'translateY(-10px)';
                
                setTimeout(() => {
                    prompt.style.transition = 'all 0.3s ease';
                    prompt.style.opacity = '1';
                    prompt.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        addMessage(content, isUser, isHTML = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `jolai-message ${isUser ? 'jolai-message-user' : 'jolai-message-bot'}`;
            
            const avatar = document.createElement('div');
            avatar.className = 'jolai-message-avatar';
            
            if (isUser) {
                avatar.innerHTML = 'You';
                avatar.style.background = 'var(--secondary)';
                avatar.style.color = 'var(--bg)';
            } else {
                avatar.innerHTML = '<img src="resources/img/jolai-2.svg" alt="JolAI" width="16" height="16" />';
                avatar.style.background = 'var(--primary)';
            }
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'jolai-message-content';
            
            if (isHTML) {
                contentDiv.innerHTML = content;
            } else {
                contentDiv.textContent = content;
            }
            
            messageDiv.appendChild(avatar);
            messageDiv.appendChild(contentDiv);
            this.messagesContainer.appendChild(messageDiv);
            
            this.scrollToBottom();
            return contentDiv;
        }

        async typeWriterEffect(element, text, speed = 20) {
            this.isTyping = true;
            element.innerHTML = '';
            let i = 0;
            
            // Process text for basic formatting
            const formattedText = this.formatText(text);
            
            const typeChar = () => {
                if (i < formattedText.length && this.isTyping) {
                    // Handle HTML tags
                    if (formattedText.substring(i, i + 4) === '<ul>' || 
                        formattedText.substring(i, i + 5) === '</ul>' ||
                        formattedText.substring(i, i + 5) === '<br/>') {
                        const tagEnd = formattedText.indexOf('>', i) + 1;
                        element.innerHTML = formattedText.substring(0, tagEnd);
                        i = tagEnd;
                    } else if (formattedText.substring(i, i + 3) === '<li') {
                        const liEnd = formattedText.indexOf('</li>', i) + 5;
                        element.innerHTML = formattedText.substring(0, liEnd);
                        i = liEnd;
                    } else {
                        element.innerHTML = formattedText.substring(0, i + 1);
                        i++;
                    }
                    
                    this.scrollToBottom();
                    setTimeout(typeChar, speed);
                } else {
                    this.isTyping = false;
                    this.updateStatus('Online');
                }
            };
            
            typeChar();
        }

        formatText(text) {
            // Convert markdown-like formatting to HTML
            return text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                .replace(/^(#+)\s*(.*?)$/gm, (match, hashes, content) => {
                    const level = hashes.length;
                    return `<h${level} class="jolai-heading-${level}">${content}</h${level}>`;
                })
                .replace(/\n/g, '<br/>')
                .replace(/(?:\d+\.\s+)(.*?)(?=\n|$)/g, '<li>$1</li>')
                .replace(/(?:-\s+)(.*?)(?=\n|$)/g, '<li>$1</li>')
                .replace(/(<li>.*<\/li>)/s, '<ul class="jolai-list">$1</ul>')
                .replace(/<\/ul>\s*<ul>/g, '')
                .replace(/(\d+)\/(\d+)/g, '<span class="jolai-fraction">$1/$2</span>')
                .replace(/`(.*?)`/g, '<code class="jolai-code">$1</code>');
        }

        showThinkingIndicator() {
            const thinkingDiv = document.createElement('div');
            thinkingDiv.className = 'jolai-thinking';
            thinkingDiv.id = 'jolai-thinking';
            
            const avatar = document.createElement('div');
            avatar.className = 'jolai-message-avatar';
            avatar.innerHTML = '<img src="resources/img/jolai-2.svg" alt="JolAI" width="16" height="16" />';
            avatar.style.background = 'var(--primary)';
            
            const contentDiv = document.createElement('div');
            contentDiv.className = 'jolai-thinking-content';
            contentDiv.innerHTML = `
                <div class="jolai-thinking-dots">
                    <div class="jolai-thinking-dot"></div>
                    <div class="jolai-thinking-dot"></div>
                    <div class="jolai-thinking-dot"></div>
                </div>
                <div class="jolai-thinking-text">Processing your question...</div>
            `;
            
            thinkingDiv.appendChild(avatar);
            thinkingDiv.appendChild(contentDiv);
            this.messagesContainer.appendChild(thinkingDiv);
            
            this.scrollToBottom();
            return thinkingDiv;
        }

        updateThinkingStep(step) {
            const thinking = document.getElementById('jolai-thinking');
            if (thinking) {
                const textElement = thinking.querySelector('.jolai-thinking-text');
                const steps = {
                    'thinking': 'Analyzing your question...',
                    'researching': 'Researching information...',
                    'formulating': 'Formulating response...',
                    'finalizing': 'Finalizing answer...'
                };
                
                if (textElement && steps[step]) {
                    textElement.textContent = steps[step];
                }
            }
        }

        removeThinkingIndicator() {
            const thinking = document.getElementById('jolai-thinking');
            if (thinking) {
                thinking.remove();
            }
        }

        scrollToBottom() {
            this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
        }

        async sendMessage(prefilledMessage = null) {
            const messageText = prefilledMessage || this.userInput.value.trim();
            
            if (!messageText || this.isTyping) return;

            // Add user message to UI and history
            this.addMessage(messageText, true);
            this.conversationHistory.push({ role: 'user', content: messageText });

            // Clear input and update prompts if it's a new message
            if (!prefilledMessage) {
                this.userInput.value = '';
                this.updateCharCount();
                this.usedPrompts.add(messageText);
                this.generatePrompts();
            }

            // Disable UI
            this.userInput.disabled = true;
            this.sendBtn.disabled = true;

            // Show thinking indicator with step updates
            this.showThinkingIndicator();
            this.updateStatus('Thinking...');
            
            // Simulate different thinking stages
            const stages = ['thinking', 'researching', 'formulating', 'finalizing'];
            let stageIndex = 0;
            
            const stageInterval = setInterval(() => {
                if (stageIndex < stages.length) {
                    this.updateThinkingStep(stages[stageIndex]);
                    this.updateStatus(stages[stageIndex].charAt(0).toUpperCase() + stages[stageIndex].slice(1) + '...');
                    stageIndex++;
                }
            }, 800);

            try {
                const response = await fetch('chat_proxy.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        message: messageText,
                        history: this.conversationHistory
                    })
                });

                const data = await response.json();
                clearInterval(stageInterval);
                this.removeThinkingIndicator();

                if (data.error) {
                    this.addMessage(`Error: ${data.error}`, false);
                    this.updateStatus('Online');
                } else {
                    // Create message container for typing effect
                    const messageElement = this.addMessage('', false, true);
                    this.updateStatus('Typing...');
                    
                    // Start typing animation
                    await this.typeWriterEffect(messageElement, data.reply, 15);
                    
                    // Add to conversation history after typing completes
                    this.conversationHistory.push({ role: 'assistant', content: data.reply });
                }
            } catch (error) {
                clearInterval(stageInterval);
                this.removeThinkingIndicator();
                this.addMessage('Sorry, there was a connection error. Please try again.', false);
                this.updateStatus('Online');
                console.error('JolAI Error:', error);
            }

            // Re-enable UI
            this.userInput.disabled = false;
            this.sendBtn.disabled = false;
            this.userInput.focus();
        }
    }

    // Initialize JolAI when the page loads
    document.addEventListener('DOMContentLoaded', () => {
        new JolAIChat();
    });
  </script>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>

<?php 
  if (!is_null($subscription_result)): ?>
  <?php endif; 
?>


<script>
// ================================
// Call booking form submission with AJAX
// ================================

document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('callBookingForm');
    const submitBtn = document.getElementById('submitBookingBtn');
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            submitBtn.disabled = true;
            const spinner = submitBtn.querySelector('.spinner-border');
            if (spinner) {
                spinner.style.display = 'inline-block';
            }
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Processing...';
            
            // Get form data
            const formData = new FormData(bookingForm);
            
            // Send AJAX request with correct path
            fetch('includes/process_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data); // Debug log
                if (data.success) {
                    // Show success modal
                    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                    
                    // Reset form and close booking modal
                    bookingForm.reset();
                    const bookingModal = bootstrap.Modal.getInstance(document.getElementById('bookCallModal'));
                    if (bookingModal) {
                        bookingModal.hide();
                    }
                } else {
                    // Show error modal
                    const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    document.getElementById('errorMessage').textContent = data.message || 'An error occurred.';
                    errorModal.show();
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                document.getElementById('errorMessage').textContent = 'Network error: ' + error.message;
                errorModal.show();
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                const spinner = submitBtn.querySelector('.spinner-border');
                if (spinner) {
                    spinner.style.display = 'none';
                }
                submitBtn.innerHTML = 'Confirm Booking';
            });
        });
    }
    
    // Reset form when modal is closed
    const bookCallModal = document.getElementById('bookCallModal');
    if (bookCallModal) {
        bookCallModal.addEventListener('hidden.bs.modal', function() {
            if (bookingForm) {
                bookingForm.reset();
            }
        });
    }
});
</script>

</body>
</html>