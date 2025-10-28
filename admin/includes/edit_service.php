<?php
include 'service-form-component.php'; 

// ===============================
// Validate and get service ID
// ===============================
$service_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($service_id <= 0) {
    echo "<div class='alert alert-danger text-center mt-5'>Invalid service ID.</div>";
    exit;
}

// ===============================
// Handle service update
// ===============================
$update_result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_service'])) {
    $update_result = handle_service_update($service_id);
}

// ===============================
// Fetch the service to edit
// ===============================
$service = get_service_by_id($service_id);

if (!$service) {
    echo "<div class='alert alert-warning text-center mt-5'>Service not found or inactive.</div>";
    exit;
}
?>

<!-- ===============================
     Main Content
================================ -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4">Edit Service</h2>
                <p class="text-muted">Update service and sub-service details below.</p>
            </div>
        </div>

        <!-- Display Success or Error Message -->
        <?php if (!empty($update_result['message'])): ?>
            <div class="alert alert-<?php echo $update_result['success'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($update_result['message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Edit Form Card -->
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <?php render_service_form($service, true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===============================
     Success Modal
================================ -->
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
            <div class="modal-footer">
                <a href="services.php" class="btn btn-success">Back to Services</a>
            </div>
        </div>
    </div>
</div>

<!-- ===============================
     JS Interactions
================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(el => new bootstrap.Tooltip(el));

    // Initialize sub-service section
    if (typeof initializeServiceForm === 'function') {
        initializeServiceForm();
    }

    // Show success modal if update was successful
    <?php if (isset($update_result) && $update_result['success']): ?>
        showSuccessModal('<?php echo addslashes($update_result['message']); ?>');
    <?php endif; ?>

    function showSuccessModal(message) {
        const successMessage = document.getElementById('successMessage');
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successMessage.textContent = message;
        successModal.show();
    }
});
</script>
