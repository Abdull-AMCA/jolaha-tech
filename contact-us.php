<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Jolaha Tech</title>
  <!-- Browser Favicon -->
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
<!-- Header / Navigation -->
<?php
include 'includes/header-navbar.php'
?>

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
<?php
include 'includes/footer.php'
?>

</body>
</html>
