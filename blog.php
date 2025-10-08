<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog | Jolaha Tech</title>
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
    <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">Blog</span></h1>
    <p class="lead px-2 px-md-5">
      Insights, updates, and expert articles from the world of technology and digital transformation.
    </p>
  </div>
  </section>

  <!-- Blog Content -->
  <section class="py-5">
  <div class="container">
    <div class="row">
  <!-- Blog Articles -->
  <div class="col-lg-8">
    <article class="mb-5 pb-4 border-bottom">
      <img src="resources/img/blog-cloud.jpg" alt="Future of Cloud Computing" class="img-fluid rounded mb-3">
      <h2 class="fw-bold" style="color: var(--secondary);">The Future of Cloud Computing in Business</h2>
      <p class="text-light small mb-2">Published: September 15, 2025 • By Admin</p>
      <p style="color: var(--text);">
        Cloud adoption continues to accelerate, reshaping the way businesses operate. In this article, we explore emerging trends, best practices, and what organizations need to know to stay competitive.
      </p>
      <a href="#" class="btn btn-primary">Read More</a>
    </article>

    <article class="mb-5 pb-4 border-bottom">
      <img src="resources/img/blog-cybersecurity.jpg" alt="Cybersecurity Priority" class="img-fluid rounded mb-3">
      <h2 class="fw-bold" style="color: var(--secondary);">Why Cybersecurity Should Be Your Top Priority</h2>
      <p class="text-light small mb-2">Published: August 28, 2025 • By Jolaha Security Team</p>
      <p style="color: var(--text);">
        With growing digital threats, businesses must focus on building robust cybersecurity frameworks. Here’s a breakdown of the essential measures every organization should take.
      </p>
      <a href="#" class="btn btn-primary">Read More</a>
    </article>

    <article class="mb-5 pb-4 border-bottom">
      <img src="resources/img/blog-ai.jpg" alt="AI Customer Experience" class="img-fluid rounded mb-3">
      <h2 class="fw-bold" style="color: var(--secondary);">AI and Machine Learning: Transforming Customer Experience</h2>
      <p class="text-light small mb-2">Published: August 10, 2025 • By Jolaha Insights</p>
      <p style="color: var(--text);">
        Artificial intelligence is redefining how businesses interact with customers. From chatbots to predictive analytics, discover how AI is reshaping the future of customer engagement.
      </p>
      <a href="#" class="btn btn-primary">Read More</a>
    </article>
  </div>

  <!-- Sidebar -->
  <div class="col-lg-4">
    <div class="card border-0 p-4 mb-4" style="background-color: var(--card); border-radius: var(--radius);">
      <h4 style="color: var(--secondary);" class="mb-3">Search</h4>
      <input type="text" class="form-control" placeholder="Search blog...">
    </div>

    <div class="card border-0 p-4 mb-4" style="background-color: var(--card); border-radius: var(--radius);">
      <h4 style="color: var(--secondary);" class="mb-3">Categories</h4>
      <ul style="list-style: none; padding: 0; color: var(--text);">
        <li><a href="#">Cloud</a></li>
        <li><a href="#">Cybersecurity</a></li>
        <li><a href="#">Artificial Intelligence</a></li>
        <li><a href="#">Software Development</a></li>
        <li><a href="#">Business Solutions</a></li>
      </ul>
    </div>

    <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
      <h4 style="color: var(--secondary);" class="mb-3">Recent Posts</h4>
      <ul style="list-style: none; padding: 0; color: var(--text);">
        <li><a href="#">Cloud Migration Made Easy</a></li>
        <li><a href="#">Top 5 IT Support Mistakes</a></li>
        <li><a href="#">The Power of Data Analytics</a></li>
        <li><a href="#">Building Resilient IT Infrastructure</a></li>
      </ul>
    </div>
  </div>
    </div>
  </div>
  </section>

</body>
</html>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>
