<?php
    $message = '';
    $message_type = '';

    // Form submission handling
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $job_title = trim($_POST['job_title']);
        $job_description = trim($_POST['job_description']);
        $location = trim($_POST['location']);
        $employment_type = $_POST['employment_type'];
        $joining_date = $_POST['joining_date'];
        
        $result = add_career($job_title, $job_description, $location, $employment_type, $joining_date);
        
        if ($result['success']) {
            $message = $result['message'];
            $message_type = 'success';
            // Clear form fields on success
            $job_title = $job_description = $location = $employment_type = $joining_date = '';
        } else {
            $message = $result['message'];
            $message_type = 'error';
        }
    }
?>

<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="h4 mb-1">Create New Job Posting</h2>
                    <p class="text-muted mb-0">Add a new career opportunity to your website.</p>
                </div>
                <a href="./careers.php" class="btn btn-primary"><i class="bi bi-arrow-left me-1"></i> Back to Careers</a>
            </div>
        </div>

        <?php if (!empty($message)): ?>
        <div class="alert alert-<?php echo ($message_type == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <form method="POST" action="" id="careerForm">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-briefcase me-2"></i>
                                Job Details
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Job Title -->
                            <div class="mb-4">
                                <label for="job_title" class="form-label fw-semibold">Job Title *</label>
                                <input type="text" id="job_title" name="job_title" class="form-control form-control-lg"
                                    value="<?php echo htmlspecialchars($job_title ?? ''); ?>"
                                    placeholder="Enter job title" required>
                                <div class="form-text">Title of the job position</div>
                            </div>

                            <!-- Job Description -->
                            <div class="mb-4">
                                <label for="job_description" class="form-label fw-semibold">Job Description *</label>
                                <textarea id="job_description" name="job_description" class="form-control"
                                    rows="12" placeholder="Enter detailed job description..." required><?php echo htmlspecialchars($job_description ?? ''); ?></textarea>
                                <div class="form-text">Detailed description of responsibilities, requirements, and qualifications</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4">
                    <!-- Job Settings Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title mb-0">
                                <i class="bi bi-gear me-2"></i>
                                Job Settings
                            </h6>
                        </div>
                        <div class="card-body">
                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label fw-semibold">Location *</label>
                                <input type="text" id="location" name="location" class="form-control"
                                    value="<?php echo htmlspecialchars($location ?? ''); ?>"
                                    placeholder="e.g., Dubai, Nigeria" required>
                                <div class="form-text">Job location</div>
                            </div>

                            <!-- Employment Type -->
                            <div class="mb-3">
                                <label for="employment_type" class="form-label fw-semibold">Employment Type *</label>
                                <select id="employment_type" name="employment_type" class="form-select" required>
                                    <option value="">Select Type</option>
                                    <option value="full-time" <?php echo (($employment_type ?? '') == 'full-time') ? 'selected' : ''; ?>>Full-time</option>
                                    <option value="part-time" <?php echo (($employment_type ?? '') == 'part-time') ? 'selected' : ''; ?>>Part-time</option>
                                    <option value="contract" <?php echo (($employment_type ?? '') == 'contract') ? 'selected' : ''; ?>>Contract</option>
                                </select>
                                <div class="form-text">Type of employment</div>
                            </div>

                            <!-- Joining Date -->
                            <div class="mb-3">
                                <label for="joining_date" class="form-label fw-semibold">Expected Joining Date</label>
                                <input type="date" id="joining_date" name="joining_date" class="form-control"
                                    value="<?php echo htmlspecialchars($joining_date ?? ''); ?>">
                                <div class="form-text">Expected date when the candidate can join</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i> Publish Job
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle me-1"></i> Reset Form
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="bi bi-check-circle-fill me-2"></i>Success</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <h4>Job Posted Successfully!</h4>
                <p class="text-muted">Your career opportunity has been published.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="./careers.php" class="btn btn-outline-secondary"><i class="bi bi-list-ul me-1"></i> View All</a>
                <a href="careers.php?source=add_career" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> New Job</a>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($message) && $message_type === 'success'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script>
<?php endif; ?>