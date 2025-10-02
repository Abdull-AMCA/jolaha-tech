<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

<!-- Header / Navigation -->
<?php
include 'includes/header-navbar.php';
?>

  <!-- Hero Section -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">About <span style="color: var(--secondary);">Us</span></h1>
      <p class="lead px-2 px-md-5">We engineer high-performance, secure, and scalable web solutions that achieve your strategic goals and deliver a superior ROI.</p>
    </div>
  </section>

  <!-- Who We Are Section -->
  <section id="who-we-are" style="background-color: var(--surface);">
      <div class="container py-5">
          <div class="row align-items-center">
              <!-- Text Content Column -->
              <div class="col-lg-7 pe-lg-5">
                  <h2 class="display-5 fw-bold mb-4" style="color: var(--heading);">Engineering Your <span style="color: var(--primary);">Digital Success</span></h2>
                  <p class="lead mb-4" style="color: var(--text);">
                      Jolaha Tech is a premier IT service provider specializing in crafting high-performance, scalable web solutions for forward-thinking corporations. We bridge the gap between complex business needs and elegant technological execution.
                  </p>

                  <div class="d-flex flex-column gap-3 mb-4 mb-lg-0">
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <!-- Bootstrap Icons (make sure to include the icon library) -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                          </div>
                          <p class="mb-0" style="color: var(--text);"><strong>Strategic Focus:</strong> We architect technology that drives growth and achieves business objectives.</p>
                      </div>
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                          </div>
                          <p class="mb-0" style="color: var(--text);"><strong>Enterprise-Grade Development:</strong> Building robust, secure, and scalable web applications.</p>
                      </div>
                      <div class="d-flex align-items-start">
                          <div class="me-3 mt-1" style="color: var(--accent);">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>
                          </div>
                          <p class="mb-0" style="color: var(--text);"><strong>Dedicated Partnership:</strong> Transparent communication and a single point of contact for seamless delivery.</p>
                      </div>
                  </div>
              </div>

              <!-- Image/Graphic Column -->
              <div class="col-lg-5 mt-5 mt-lg-0">
                  <div class="card border-0 shadow" style="background-color: var(--card); border-radius: var(--radius-lg); overflow: hidden;">
                      <!-- Replace with your image path or graphic -->
                      <img src="/path/to/your/team-or-graphic.jpg" class="img-fluid" alt="[Your Company Name] Team" style="opacity: 0.9;">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Our Structure Section -->
  <section id="our-structure" style="background-color: var(--bg);">
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold" style="color: var(--heading);">Our Structured <span style="color: var(--secondary);">Process</span></h2>
                <p class="lead mx-auto" style="color: var(--text); max-width: 700px;">
                    We follow a rigorous, three-phase methodology to ensure your project is delivered with precision, quality, and strategic alignment.
                </p>
            </div>
        </div>

        <!-- Process Cards - Now 3 wider cards -->
        <div class="row justify-content-center">
            
            <!-- Phase 1: Planning -->
            <div class="col-md-8 col-lg-4 mb-4">
                <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                    <div class="card-body">
                        <div class="mb-3" style="color: var(--primary);">
                            <!-- Updated Icon for Planning -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                            </svg>
                        </div>
                        <h4 style="color: var(--heading);">1. Planning</h4>
                        <p style="color: var(--muted);">We begin with deep discovery sessions to understand your business objectives, target audience, and technical requirements. This phase establishes the strategic blueprint for your project.</p>
                    </div>
                </div>
            </div>

            <!-- Phase 2: Developing -->
            <div class="col-md-8 col-lg-4 mb-4">
                <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                    <div class="card-body">
                        <div class="mb-3" style="color: var(--primary);">
                            <!-- Updated Icon for Developing -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                                <path fill-rule="evenodd" d="M5.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708l3-3a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                            </svg>
                        </div>
                        <h4 style="color: var(--heading);">2. Developing</h4>
                        <p style="color: var(--muted);">Our expert developers bring the blueprint to life using cutting-edge technologies. We follow agile methodologies, providing regular updates and demos for continuous feedback.</p>
                    </div>
                </div>
            </div>

            <!-- Phase 3: Executing -->
            <div class="col-md-8 col-lg-4 mb-4">
                <div class="card h-100 border-0 text-center p-4" style="background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow);">
                    <div class="card-body">
                        <div class="mb-3" style="color: var(--primary);">
                            <!-- Updated Icon for Executing -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 8.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 9.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                            </svg>
                        </div>
                        <h4 style="color: var(--heading);">3. Executing</h4>
                        <p style="color: var(--muted);">We rigorously test, optimize, and deploy your solution to ensure flawless performance. Our execution phase includes thorough quality assurance and a structured launch process.</p>
                    </div>
                </div>
            </div>

        </div> <!-- End of Process Row -->

        <!-- Optional: CTA at the end of the section -->
        <div class="text-center mt-5">
            <a href="#contact" class="btn btn-lg px-4 py-3 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                Let's Structure Your Success
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right ms-2" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
            </a>
        </div>
    </div>
  </section>

</body>
</html>

<?php
include 'includes/footer.php';
?>