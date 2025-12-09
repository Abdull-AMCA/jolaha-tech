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
  
  <section class="py-5" style="background-color: var(--surface);">
    <div class="container">
      <div class="row g-5">

        <!-- Google Map -->
        <div class="col-lg-12">
          <h3 class="mb-4" style="color: var(--secondary);">Find Us</h3>
          <div class="ratio ratio-16x9 shadow rounded">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.122198588098!2d55.15345281501077!3d25.074282983957303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6cf9b7b4cbe5%3A0x5f9f7b7b32c77bb8!2sMazaya%20Business%20Avenue%20BB2!5e0!3m2!1sen!2sae!4v1695300000000"
              width="100%" height="100%" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
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

<!-- Footer -->
<?php
include 'includes/footer.php'
?>

</body>
</html>
