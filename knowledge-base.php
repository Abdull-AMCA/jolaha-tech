<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowledge Base | Jolaha Tech</title>
  <!-- Browser Favicon -->
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

<!-- Header / Navigation -->
<?php
include 'includes/header-navbar.php';
?>

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

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>