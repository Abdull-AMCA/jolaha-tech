<?php
    $careers = get_all_careers(true);

    // Handle career deletion
    if (isset($_GET['delete_career'])) {
        $job_id = intval($_GET['delete_career']);
        $result = delete_career($job_id);
        
        if ($result['success']) {
            $delete_message = $result['message'];
            $delete_message_type = 'success';
        } else {
            $delete_message = $result['message'];
            $delete_message_type = 'error';
        }
    }
    // Get all active careers
    $careers = get_all_careers(true);
?>

<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Careers Management</h1>
            <a href="careers.php?source=add_career" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Job
            </a>
        </div>

        <?php if (isset($delete_message)): ?>
        <div class="alert alert-<?php echo ($delete_message_type == 'success') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo $delete_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-briefcase me-2"></i>All Job Postings</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="careersTable">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Employment Type</th>
                                <th>Joining Date</th>
                                <th>Posted Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($careers)): ?>
                                <?php $serial = 1; foreach ($careers as $career): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo $serial++; ?></td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($career['job_title']); ?></strong>
                                            <?php if (!empty($career['job_description'])): ?>
                                                <br><small class="text-muted">
                                                    <?php echo htmlspecialchars(substr($career['job_description'], 0, 100)); ?>...
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="fw-semibold"><?php echo htmlspecialchars($career['location']); ?></span>
                                        </td>
                                        <td>
                                            <?php
                                            $employment_badge = [
                                                'full-time' => ['bg-primary', 'Full Time'],
                                                'part-time' => ['bg-info', 'Part Time'],
                                                'contract' => ['bg-warning text-dark', 'Contract']
                                            ];
                                            $badge_class = $employment_badge[$career['employment_type']][0] ?? 'bg-secondary';
                                            $badge_text = $employment_badge[$career['employment_type']][1] ?? ucfirst($career['employment_type']);
                                            ?>
                                            <span class="badge <?php echo $badge_class; ?>">
                                                <?php echo $badge_text; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if (!empty($career['joining_date'])): ?>
                                                <span class="fw-semibold"><?php echo date('M j, Y', strtotime($career['joining_date'])); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted">Not specified</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold"><?php echo date('M j, Y', strtotime($career['posted_date'])); ?></span>
                                                <small class="text-muted"><?php echo date('g:i A', strtotime($career['posted_date'])); ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo $career['is_active'] ? 'success' : 'secondary'; ?>">
                                                <i class="bi <?php echo $career['is_active'] ? 'bi-check-circle' : 'bi-clock'; ?> me-1"></i>
                                                <?php echo $career['is_active'] ? 'Active' : 'Inactive'; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="careers.php?source=edit_career&id=<?php echo $career['job_id']; ?>" 
                                                   class="btn btn-sm btn-warning" title="Edit Job">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger delete-career-btn" 
                                                        data-job-id="<?php echo $career['job_id']; ?>"
                                                        data-job-title="<?php echo htmlspecialchars($career['job_title']); ?>"
                                                        title="Delete Job">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-briefcase display-4 d-block mb-2"></i>
                                            <h5>No job postings found</h5>
                                            <p>Get started by creating your first career opportunity.</p>
                                            <a href="careers.php?source=add_career" class="btn btn-primary mt-2">
                                                <i class="bi bi-plus-circle"></i> Create Job Posting
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the job posting: <strong id="deleteJobTitle"></strong>?</p>
                <p class="text-muted mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger" id="confirmDelete">Delete Job</a>
            </div>
        </div>
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
                <h4 id="successMessage">Job Deleted Successfully!</h4>
                <p class="text-muted">The career opportunity has been removed.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Delete Career Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const deleteJobTitle = document.getElementById('deleteJobTitle');
        const confirmDeleteBtn = document.getElementById('confirmDelete');
        let jobToDelete = null;

        document.querySelectorAll('.delete-career-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                jobToDelete = this.getAttribute('data-job-id');
                const title = this.getAttribute('data-job-title');
                deleteJobTitle.textContent = title;
                confirmDeleteBtn.href = `careers.php?delete_career=${jobToDelete}`;
                deleteModal.show();
            });
        });

        // Show success modal if deletion was successful
        <?php if (isset($delete_message) && $delete_message_type === 'success'): ?>
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        <?php endif; ?>
    });
</script>