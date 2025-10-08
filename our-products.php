<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Products | Jolaha Tech</title>
  <!-- Browser Favicon -->
  <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%237125eb'/><text x='50%' y='50%' font-size='60' text-anchor='middle' dy='.3em' fill='white'>J</text></svg>">
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
      <h1 class="display-4 fw-bold">Jolaha <span style="color: var(--secondary);">Product Suite</span></h1>
      <p class="lead px-2 px-md-5">Comprehensive software solutions designed to streamline your business operations and drive growth</p>
    </div>
  </section>

  <!-- Products Navigation -->
  <section class="py-4 d-flex align-items-center text-center" style="background-color: var(--surface); position: sticky; top: 0; z-index: 100;">
      <div class="container">
          <div class="row g-2">
            <p class="lead px-2 px-md-5">Click any service to view details below</p>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger active text-center p-3" data-product="crm" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-people-fill d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha CRMS</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="hrms" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-person-badge d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha HRMS</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="accountrix" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-cash-coin d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha Accountrix</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="pms" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-building d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha PMS</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="helpdesk" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-headset d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha Help Desk</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="aml" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-shield-check d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha AML</span>
                  </div>
              </div>
              <div class="col-6 col-md-3 col-lg-2">
                  <div class="product-trigger text-center p-3" data-product="lms" style="background-color: var(--card); border-radius: var(--radius);">
                      <i class="bi bi-book d-block mb-2" style="color: var(--primary); font-size: 1.5rem;"></i>
                      <span style="color: var(--heading); font-size: 0.9rem;">Jolaha LMS</span>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Product Content Area -->
  <section class="py-5" style="background-color: var(--bg); min-height: 600px;">
      <div class="container">
          
        <!-- Jolaha CRMS Content -->
        <div class="product-content active" id="crm-content">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha CRMS</h2>
                    <p class="lead mb-4" style="color: var(--text);">
                        Comprehensive Customer Relationship Management System designed to streamline your sales, marketing, and customer service operations.
                    </p>
                    
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h4 style="color: var(--primary);">Key Features</h4>
                            <ul style="color: var(--text);">
                                <li>Lead & Opportunity Management</li>
                                <li>Sales Pipeline Tracking</li>
                                <li>Customer Communication Hub</li>
                                <li>Marketing Automation</li>
                                <li>Analytics & Reporting</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color: var(--primary);">Benefits</h4>
                            <ul style="color: var(--text);">
                                <li>Increase sales conversion by 35%</li>
                                <li>Improve customer retention</li>
                                <li>Automate marketing campaigns</li>
                                <li>Gain actionable insights</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Featured Sub-Product -->
                    <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                        <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise CRM Suite</h4>
                        <p style="color: var(--text);" class="mb-3">
                            Our premium package includes advanced AI-powered analytics, custom workflow automation, and dedicated support for large enterprises.
                        </p>
                        <a href="jolaha-crms.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                            View Details & Pricing
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <!-- Get Free Trial Form -->
                    <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                        <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                                    <option>Company Size</option>
                                    <option>1-10 employees</option>
                                    <option>11-50 employees</option>
                                    <option>51-200 employees</option>
                                    <option>200+ employees</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                                Start 14-Day Free Trial
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Featured Clients Carousel -->
            <div class="mt-5">
                <h4 style="color: var(--secondary);" class="mb-4">Trusted by Industry Leaders</h4>
                <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
                    <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
                    <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
                    <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
                    <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
                    <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- Jolaha HRMS Content -->
        <div class="product-content" id="hrms-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha HRMS</h2>
              <p class="lead mb-4" style="color: var(--text);">
                A powerful Human Resource Management System designed to simplify HR processes, improve workforce engagement, and drive organizational efficiency.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Employee Records Management</li>
                    <li>Payroll & Tax Automation</li>
                    <li>Attendance & Leave Tracking</li>
                    <li>Performance & Appraisals</li>
                    <li>Recruitment & Onboarding</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Reduce manual HR tasks by 60%</li>
                    <li>Ensure payroll accuracy & compliance</li>
                    <li>Boost employee satisfaction</li>
                    <li>Gain real-time workforce insights</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise HR Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes advanced talent management, recruitment automation, learning & development modules, and AI-powered workforce analytics for growing enterprises.
                </p>
                <a href="jolaha-hrms.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Growing Teams</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
            </div>
          </div>
        </div>

        <!-- Jolaha Accountrix Content -->
        <div class="product-content" id="accountrix-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha Accountrix</h2>
              <p class="lead mb-4" style="color: var(--text);">
                A complete Accounting & Financial Management System built to simplify bookkeeping, ensure compliance, and give you real-time visibility into business performance.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>General Ledger & Chart of Accounts</li>
                    <li>Accounts Payable & Receivable</li>
                    <li>Expense Tracking</li>
                    <li>Tax Compliance & VAT</li>
                    <li>Financial Reporting & Dashboards</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Maintain accurate books with ease</li>
                    <li>Reduce manual accounting errors</li>
                    <li>Stay compliant with tax regulations</li>
                    <li>Gain real-time financial insights</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Accounting Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  Includes advanced financial consolidation, tax compliance automation, audit-ready reports, and integrations with banking & ERP systems for large organizations.
                </p>
                <a href="jolaha-accountrix.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Finance Teams</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
            </div>
          </div>
        </div>

        <!-- Jolaha PMS Content -->
        <div class="product-content" id="pms-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha PMS</h2>
              <p class="lead mb-4" style="color: var(--text);">
                A robust Project Management System designed to plan, track, and deliver projects efficiently while keeping teams aligned and deadlines on track.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Task & Milestone Management</li>
                    <li>Team Collaboration Tools</li>
                    <li>Gantt Charts & Kanban Boards</li>
                    <li>Time Tracking & Reporting</li>
                    <li>Resource Allocation & Planning</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Boost team productivity</li>
                    <li>Enhance project visibility</li>
                    <li>Deliver projects on time & budget</li>
                    <li>Improve collaboration & accountability</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Project Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  Our premium package includes advanced workflow automation, real-time dashboards, risk management tools, and dedicated support for large-scale projects.
                </p>
                <a href="jolaha-pms.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Project Teams</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
            </div>
          </div>
        </div>

        <!-- Jolaha Help Desk Content -->
        <div class="product-content" id="helpdesk-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha Help Desk</h2>
              <p class="lead mb-4" style="color: var(--text);">
                A comprehensive Help Desk and IT Support system designed to manage tickets, streamline issue resolution, and improve overall service efficiency.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Omni-channel Ticket Management</li>
                    <li>AI-powered Knowledge Base</li>
                    <li>SLA Tracking & Automation</li>
                    <li>Live Chat & Chatbot Integration</li>
                    <li>Analytics & Performance Reporting</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Reduce response time by up to 40%</li>
                    <li>Boost customer satisfaction</li>
                    <li>Empower agents with better tools</li>
                    <li>Improve service efficiency</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Help Desk Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  Our enterprise package includes advanced ticket routing, automation workflows, priority escalation, and integration with existing IT systems.
                </p>
                <a href="jolaha-help-desk.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Support Teams</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
            </div>
          </div>
        </div>

        <!-- Jolaha AML Content -->
        <div class="product-content" id="aml-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha AML</h2>
              <p class="lead mb-4" style="color: var(--text);">
                Comprehensive Anti-Money Laundering software to help organizations comply with regulations, detect suspicious activities, and safeguard against financial crimes.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Real-Time Transaction Monitoring</li>
                    <li>Customer Risk Scoring & Profiling</li>
                    <li>Automated KYC & Identity Verification</li>
                    <li>Suspicious Activity Detection</li>
                    <li>Compliance Reporting & Audit Trails</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Stay compliant with global AML regulations</li>
                    <li>Reduce fraud and financial crime risks</li>
                    <li>Streamline compliance operations</li>
                    <li>Protect brand reputation and trust</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise AML Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  The enterprise package includes advanced analytics, AI-based suspicious activity detection, automated regulatory reporting, and dedicated support for large institutions.
                </p>
                <a href="jolaha-aml.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Financial Institutions</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
            </div>
          </div>
        </div>

        <!-- Jolaha LMS Content -->
        <div class="product-content" id="lms-content">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="display-5 fw-bold mb-4" style="color: var(--secondary);">Jolaha LMS</h2>
              <p class="lead mb-4" style="color: var(--text);">
                A comprehensive Learning Management System designed to deliver, track, and manage training programs efficiently for employees and clients.
              </p>

              <div class="row mb-5">
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Key Features</h4>
                  <ul style="color: var(--text);">
                    <li>Course Creation & Management</li>
                    <li>Progress Tracking & Assessments</li>
                    <li>Interactive Learning Modules</li>
                    <li>Certification & Badging</li>
                    <li>Reporting & Analytics</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 style="color: var(--primary);">Benefits</h4>
                  <ul style="color: var(--text);">
                    <li>Enhance employee skills and knowledge</li>
                    <li>Streamline training administration</li>
                    <li>Ensure compliance and certifications</li>
                    <li>Gain insights into learning performance</li>
                  </ul>
                </div>
              </div>

              <!-- Featured Sub-Product -->
              <div class="card border-0 p-4 mb-5" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Featured: Enterprise Learning Suite</h4>
                <p style="color: var(--text);" class="mb-3">
                  Our premium package includes advanced course authoring, AI-driven learning paths, gamification, and analytics for large-scale learning programs.
                </p>
                <a href="jolaha-lms.html" class="btn btn-primary px-4 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius); width: fit-content;">
                  View Details & Pricing
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <!-- Get Free Trial Form -->
              <div class="card border-0 p-4" style="background-color: var(--card); border-radius: var(--radius);">
                <h4 style="color: var(--secondary);" class="mb-3">Get Free Trial</h4>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Full Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Address" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Company Name" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" style="background-color: var(--surface); border-color: var(--muted); color: var(--text);">
                      <option>Company Size</option>
                      <option>1-10 employees</option>
                      <option>11-50 employees</option>
                      <option>51-200 employees</option>
                      <option>200+ employees</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--primary); color: white; border-radius: var(--radius);">
                    Start 14-Day Free Trial
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Featured Clients Carousel -->
          <div class="mt-5">
            <h4 style="color: var(--secondary);" class="mb-4">Trusted by Learning Teams</h4>
            <div class="client-carousel d-flex justify-content-between align-items-center flex-wrap gap-4">
              <img src="resources/img/photo.jpg" alt="Client 1" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 2" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 3" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 4" class="img-fluid">
              <img src="resources/img/photo.jpg" alt="Client 5" class="img-fluid">
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
