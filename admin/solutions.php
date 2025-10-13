<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4">Solutions Management</h2>
                <p class="text-muted">Manage all Jolaha Solutions</p>
            </div>
        </div>
    
        <!-- Alert Messages -->
        <div id="alertBox"></div>
        
        <?php
            // Success / Error alerts driven by URL params (use filter_input for safety)
            $added   = filter_input(INPUT_GET, 'added', FILTER_SANITIZE_STRING);
            $updated = filter_input(INPUT_GET, 'updated', FILTER_SANITIZE_STRING);
            $deleted = filter_input(INPUT_GET, 'deleted', FILTER_SANITIZE_STRING);
            $error   = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
            ?>

            <?php if ($added === 'true'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> Solution added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($updated === 'true'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> Solution updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($deleted === 'true'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> Solution deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($error === 'true'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> Error occurred while processing your request!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php endif; ?>
        
        <div class="row">
            <!-- Form Section -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-plus-circle me-2"></i>
                            <?php echo isset($_GET['edit']) ? 'Edit Solution' : 'Add New Solution'; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="solutionForm">
                            <?php if(isset($_GET['edit'])): 
                                $solution = getSolutionById($_GET['edit']);
                                if($solution):
                            ?>
                                <input type="hidden" name="solution_id" value="<?php echo $solution['solution_id']; ?>">
                            <?php endif; endif; ?>
                            
                            <div class="mb-3">
                                <label for="solution_name" class="form-label">Solution Name *</label>
                                <input type="text" id="solution_name" name="solution_name" class="form-control" 
                                    value="<?php echo isset($solution) ? htmlspecialchars($solution['solution_name']) : ''; ?>" 
                                    required placeholder="Enter solution name">
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i>
                                    <?php echo isset($_GET['edit']) ? 'Update Solution' : 'Add Solution'; ?>
                                </button>
                                
                                <?php if(isset($_GET['edit'])): ?>
                                    <a href="solutions.php" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-1"></i> Cancel
                                    </a>
                                <?php endif; ?>
                            </div>
                        </form>
                        <?php
                        // Call the insert/update function
                        insert_solutions();
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Table Section -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-list-ul me-2"></i> Existing Solutions
                        </h5>
                        <span class="badge bg-primary"><?php echo countSolutions(); ?> solutions</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="80">ID</th>
                                        <th>Solution Name</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    // Call the function to display all solutions
                                    findAllSolutions();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteSolutionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the solution "<strong id="solutionName"></strong>"?</p>
                <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Solution</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle-fill text-success display-4 mb-3"></i>
                <p id="successMessage"></p>
            </div>
            <div class="modal-footer mb-3">
                <!--button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button-->
            </div>
        </div>
    </div>
</div>

<?php
// Call the delete function
deleteSolution();
?>

<script>
// Solutions Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Delete solution functionality
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteSolutionModal'));
    const solutionNameElement = document.getElementById('solutionName');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    let solutionToDelete = null;

    // Add event listeners to all delete buttons using event delegation
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-solution-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.delete-solution-btn');
            solutionToDelete = btn.getAttribute('data-solution-id');
            const solutionName = btn.getAttribute('data-solution-name');
            solutionNameElement.textContent = solutionName;
            deleteModal.show();
        }
    });

    // Confirm delete action
    confirmDeleteBtn.addEventListener('click', function() {
        if (solutionToDelete) {
            // Show loading state
            confirmDeleteBtn.disabled = true;
            confirmDeleteBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Deleting...';
            
            // Send delete request
            fetch(`solutions.php?delete_solution=${solutionToDelete}`)
                .then(response => response.text())
                .then(data => {
                    // Close modal
                    deleteModal.hide();
                    
                    // Show success message and reload
                    showSuccessModal('Solution deleted successfully!');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while deleting the solution.', 'error');
                    confirmDeleteBtn.disabled = false;
                    confirmDeleteBtn.innerHTML = 'Delete Solution';
                });
        }
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });

    // Scroll to form when in edit mode
    <?php if(isset($_GET['edit'])): ?>
        const formSection = document.querySelector('.card');
        if(formSection) {
            formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    <?php endif; ?>
});

// Show alert function
function showAlert(message, type = 'success') {
    const alertBox = document.getElementById('alertBox');
    const alertClass = type === 'error' ? 'alert-danger' : 'alert-success';
    const icon = type === 'error' ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill';
    
    alertBox.innerHTML = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="bi ${icon} me-2"></i> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        const alert = alertBox.querySelector('.alert');
        if (alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000);
}

// Show success modal
function showSuccessModal(message) {
    const successMessage = document.getElementById('successMessage');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    
    if (successMessage) {
        successMessage.textContent = message;
        successModal.show();
    }
}

// Function to set delete ID (for compatibility)
function setDeleteId(solutionId, solutionName) {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteSolutionModal'));
    document.getElementById('solutionName').textContent = solutionName;
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = `solutions.php?delete_solution=${solutionId}`;
    };
    deleteModal.show();
}
</script>

<?php
include 'includes/admin-footer.php';
?>