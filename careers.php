<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Careers | Jolaha Tech</title>
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

  <!-- Hero Section -->
  <section class="about-hero d-flex align-items-center text-center py-5 px-3 px-md-5 text-white">
    <div class="container py-5 px-md-5">
      <h1 class="display-4 fw-bold">Careers at <span style="color: var(--secondary);">Jolaha Tech</span></h1>
      <p class="lead px-2 px-md-5">Join a team that’s transforming businesses with technology and innovation. Let’s build the future together.</p>
    </div>
  </section>

  <!-- Why Join Us -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">Why Work With Us?</h2>
      <p class="lead mb-5" style="color: var(--text);">We believe in empowering our people to innovate, grow, and thrive. At Jolaha Tech, your career is more than a job — it’s a journey of impact.</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-lightbulb fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Innovative Projects</h5>
            <p style="color: var(--text);">Work on cutting-edge technologies that solve real-world problems for global clients.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-people fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Collaborative Culture</h5>
            <p style="color: var(--text);">Be part of a supportive team that values creativity, diversity, and growth.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius);">
            <i class="bi bi-rocket-takeoff fs-1 mb-3" style="color: var(--primary);"></i>
            <h5 style="color: var(--heading);">Career Growth</h5>
            <p style="color: var(--text);">Access mentorship, continuous learning, and leadership opportunities to grow your career.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Open Positions - Enhanced -->
  <section class="py-5" style="background-color: var(--bg-light);">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center" style="color: var(--secondary);">Open Positions</h2>
        
        <?php
          $careers = get_all_careers(true); // Use your existing function
          
          if (!empty($careers)): 
              // Group by employment type for filtering (optional)
              $employment_types = [];
              foreach ($careers as $career) {
                $type = $career['employment_type'];
                if (!isset($employment_types[$type])) {
                    $employment_types[$type] = 0;
                }
                $employment_types[$type]++;
              }
            ?>
            
            <!-- Employment Type Filter (Optional) -->
            <div class="row justify-content-center mb-4">
              <p class="lead text-center mb-5" style="color: var(--surface);">Explore exciting opportunities across our teams and apply today.</p>
                <div class="col-auto">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">
                            All Positions (<?php echo count($careers); ?>)
                        </button>
                        <?php foreach ($employment_types as $type => $count): ?>
                            <button type="button" class="btn btn-outline-primary" data-filter="<?php echo $type; ?>">
                                <?php 
                                $type_names = [
                                    'full-time' => 'Full Time',
                                    'part-time' => 'Part Time',
                                    'contract' => 'Contract'
                                ];
                                echo $type_names[$type] ?? ucfirst($type); 
                                ?> (<?php echo $count; ?>)
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <!-- Careers Grid -->
            <div class="row g-4" id="careers-container">
                <?php foreach ($careers as $career): ?>
                    <div class="col-md-6 career-item" data-type="<?php echo $career['employment_type']; ?>">
                        <div class="card border-0 p-4 h-100" style="background: var(--card); border-radius: var(--radius); transition: transform 0.3s ease;">
                            <!-- Employment Type Badge -->
                            <div class="mb-2">
                                <?php 
                                $badge_classes = [
                                    'full-time' => 'bg-primary',
                                    'part-time' => 'bg-info',
                                    'contract' => 'bg-warning text-dark'
                                ];
                                $badge_class = $badge_classes[$career['employment_type']] ?? 'bg-secondary';
                                ?>
                                <span class="badge <?php echo $badge_class; ?>">
                                    <?php 
                                    $type_names = [
                                        'full-time' => 'Full Time',
                                        'part-time' => 'Part Time', 
                                        'contract' => 'Contract'
                                    ];
                                    echo $type_names[$career['employment_type']] ?? ucfirst($career['employment_type']);
                                    ?>
                                </span>
                            </div>
                            
                            <!-- Job Title -->
                            <h5 style="color: var(--heading);"><?php echo htmlspecialchars($career['job_title']); ?></h5>
                            
                            <!-- Job Description -->
                            <p style="color: var(--text);" class="mb-3">
                                <?php 
                                $description = htmlspecialchars($career['job_description']);
                                if (strlen($description) > 120) {
                                    echo substr($description, 0, 120) . '...';
                                } else {
                                    echo $description;
                                }
                                ?>
                            </p>
                            
                            <!-- Job Meta Information -->
                            <div class="job-meta mb-3">
                                <!-- Location -->
                                <?php if (!empty($career['location'])): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt me-2" style="color: var(--primary); width: 16px;"></i>
                                        <small style="color: var(--text);"><?php echo htmlspecialchars($career['location']); ?></small>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Joining Date -->
                                <?php if (!empty($career['joining_date'])): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-check me-2" style="color: var(--primary); width: 16px;"></i>
                                        <small style="color: var(--text);">
                                            Start: <?php echo date('M j, Y', strtotime($career['joining_date'])); ?>
                                        </small>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Posted Date -->
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-2" style="color: var(--primary); width: 16px;"></i>
                                    <small style="color: var(--text);">
                                        Posted <?php echo time_elapsed_string($career['posted_date']); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <!-- Apply Now Button -->
                            <div class="mt-auto">
                                <a href="career-apply.php?job_id=<?php echo $career['job_id']; ?>" class="btn btn-primary w-100">
                                    <i class="bi bi-send me-1"></i> Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- JavaScript for Filtering -->
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                  const filterButtons = document.querySelectorAll('[data-filter]');
                  const careerItems = document.querySelectorAll('.career-item');
                  
                  filterButtons.forEach(button => {
                      button.addEventListener('click', function() {
                          // Remove active class from all buttons
                          filterButtons.forEach(btn => btn.classList.remove('active'));
                          // Add active class to clicked button
                          this.classList.add('active');
                          
                          const filterValue = this.getAttribute('data-filter');
                          
                          // Filter career items
                          careerItems.forEach(item => {
                              if (filterValue === 'all' || item.getAttribute('data-type') === filterValue) {
                                  item.style.display = 'block';
                              } else {
                                  item.style.display = 'none';
                              }
                          });
                      });
                  });
              });
            </script>
            
        <?php else: ?>
            <!-- No Open Positions -->
            <div class="text-center py-5">
                <div class="mb-4">
                    <i class="bi bi-briefcase display-1" style="color: var(--muted);"></i>
                </div>
                <h4 style="color: var(--primary);">No Open Positions Currently</h4>
                <p class="mb-4" style="color: var(--surface);">
                    We're always looking for talented people. Check back soon for new opportunities!
                </p>
                <a href="contact-us.php" class="btn btn-primary">
                    <i class="bi bi-envelope me-1"></i> Contact Us Anyway
                </a>
            </div>
        <?php endif; ?>
    </div>
  </section>

  <!-- Life at Jolaha -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color: var(--secondary);">Life at Jolaha Tech</h2>
      <p class="lead mb-5" style="color: var(--text);">A workplace where creativity meets purpose. Here’s a glimpse of what makes us unique:</p>
      <div class="row g-4">
        <div class="col-md-4">
          <img src="resources/img/culture-team.jpg" alt="Team Collaboration" class="img-fluid rounded shadow">
          <h6 class="mt-3" style="color: var(--heading);">Team Collaboration</h6>
        </div>
        <div class="col-md-4">
          <img src="resources/img/culture-events.jpg" alt="Company Events" class="img-fluid rounded shadow">
          <h6 class="mt-3" style="color: var(--heading);">Company Events</h6>
        </div>
        <div class="col-md-4">
          <img src="resources/img/culture-growth.jpg" alt="Learning Growth" class="img-fluid rounded shadow">
          <h6 class="mt-3" style="color: var(--heading);">Learning & Growth</h6>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-5 text-center">
    <div class="container">
      <div class="cta card p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 text-md-start">
        
        <!-- Left Content -->
        <div>
          <h2 class="fw-bold mb-2">Ready to Join Us?</h2>
          <p class="lead mb-0" style="color: var(--text);">
            If you’re passionate about innovation and impact, Jolaha Tech is the place for you.
          </p>
        </div>
        
        <!-- Right Button -->
        <div>
          <a href="contact-us.php" class="btn btn-secondary px-4 py-2 fw-bold">
            Submit Your Resume
          </a>
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