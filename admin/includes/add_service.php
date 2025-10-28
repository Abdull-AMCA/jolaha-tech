<?php
// add-service.php

// Fetch existing services for display
$services_result = null;
$all_services = get_all_services_with_subservices();

// Handle add/delete form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_service'])) {
        $services_result = handle_service_addition();
        if ($services_result['success']) {
            $all_services = get_all_services_with_subservices();
        }
    }

    if (isset($_POST['delete_service'])) {
        $service_id = intval($_POST['service_id']);
        $services_result = handle_service_deletion($service_id);
        if ($services_result['success']) {
            $all_services = get_all_services_with_subservices();
        }

        // AJAX delete response
        if (isset($_POST['ajax'])) {
            echo json_encode($services_result);
            exit;
        }
    }
}

?>

<div class="main-content" id="mainContent">
  <div class="container-fluid">

    <!-- Page Title -->
    <div class="row mb-4">
      <div class="col-12">
        <h2 class="h4">Services Management</h2>
        <p class="text-muted">Manage all Jolaha Services and Sub-Services</p>
      </div>
    </div>

    <!-- Display Messages -->
    <?php if (isset($services_result) && !empty($services_result['message'])): ?>
      <div class="alert alert-<?php echo $services_result['success'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo $services_result['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Existing Services List -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Existing Services</h5>
            <span class="badge bg-primary"><?php echo count($all_services); ?> services</span>
          </div>
          <div class="card-body">
            <?php if (empty($all_services)): ?>
              <div class="text-center py-4">
                <i class="bi bi-inbox display-1 text-muted"></i>
                <p class="text-muted mt-3">No services added yet.</p>
              </div>
            <?php else: ?>
              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Service Name</th>
                      <th>Description</th>
                      <th>Sub-Services</th>
                      <th>Created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($all_services as $service): ?>
                      <tr>
                        <td class="text-muted">#<?php echo $service['id']; ?></td>
                        <td>
                          <div class="d-flex align-items-center">
                            <i class="<?php echo $service['service_icon'] ?: 'bi bi-tools text-muted'; ?> me-2 text-primary"></i>
                            <strong><?php echo htmlspecialchars($service['service_name']); ?></strong>
                          </div>
                        </td>
                        <td>
                          <?php echo !empty($service['service_description']) ? htmlspecialchars($service['service_description']) : '<span class="text-muted">No description</span>'; ?>
                        </td>
                        <td>
                          <?php if (!empty($service['sub_services'])): ?>
                            <div class="badge bg-primary rounded-pill">
                              <?php echo count($service['sub_services']); ?> sub-services
                            </div>
                            <div class="mt-1">
                              <?php foreach ($service['sub_services'] as $sub_service): ?>
                                <small class="d-block text-muted">• <?php echo htmlspecialchars($sub_service['sub_service_name']); ?></small>
                              <?php endforeach; ?>
                            </div>
                          <?php else: ?>
                            <span class="text-muted">No sub-services</span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo date('M j, Y', strtotime($service['created_at'] ?? 'now')); ?></td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a href="services.php?source=edit_service&id=<?php echo $service['id']; ?>" 
                               class="btn btn-outline-primary" title="Edit Service">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" 
                                    class="btn btn-outline-danger delete-service-btn" 
                                    data-service-id="<?php echo $service['id']; ?>"
                                    data-service-name="<?php echo htmlspecialchars($service['service_name']); ?>"
                                    title="Delete Service">
                              <i class="bi bi-trash"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Add New Service Form -->
    <div class="row mt-4 mb-5">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Add New Service</h5>
          </div>
          <div class="card-body">
            <?php 
              include 'service-form-component.php';
              render_service_form(); 
            ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ✅ Success Modal -->
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
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
      </div>
    </div>
  </div>
</div>

<!-- ❌ Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Confirm Deletion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the service: <strong id="deleteServiceName"></strong>?</p>
        <p class="text-danger"><small>This action cannot be undone. All sub-services will also be deleted.</small></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Service</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Tooltip
  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));

  // Delete Modal
  const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
  const deleteServiceName = document.getElementById('deleteServiceName');
  const confirmDeleteBtn = document.getElementById('confirmDelete');
  let serviceToDelete = null;

  document.querySelectorAll('.delete-service-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      serviceToDelete = this.getAttribute('data-service-id');
      deleteServiceName.textContent = this.getAttribute('data-service-name');
      deleteModal.show();
    });
  });

  confirmDeleteBtn.addEventListener('click', function() {
    if (!serviceToDelete) return;
    const formData = new FormData();
    formData.append('delete_service', '1');
    formData.append('service_id', serviceToDelete);
    formData.append('ajax', '1');

    fetch('', { method: 'POST', body: formData })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          showSuccessModal(data.message);
          setTimeout(() => window.location.reload(), 1500);
        } else alert('Error: ' + data.message);
      })
      .catch(err => console.error('Delete error:', err));

    deleteModal.hide();
  });

  // Show success modal if PHP returned success
  <?php if (isset($services_result) && $services_result['success']): ?>
    showSuccessModal('<?php echo $services_result['message']; ?>');
  <?php endif; ?>

  function showSuccessModal(message) {
    const msg = document.getElementById('successMessage');
    msg.textContent = message;
    new bootstrap.Modal(document.getElementById('successModal')).show();
  }
});
</script>
