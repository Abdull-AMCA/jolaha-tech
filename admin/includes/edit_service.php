<?php
// edit-service.php
require_once 'service-form-component.php';

$service_id = $_GET['id'] ?? null;
$service = null;
$update_result = null;

if (!$service_id) {
    header('Location: includes/add_service.php');
    exit;
}

$service = get_service_by_id($service_id);

if (!$service) {
    header('Location: includes/add_service.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_service'])) {
    $update_result = handle_service_update($service_id);
}
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4">Edit Service</h2>
                <p class="text-muted">Edit service details and sub-services</p>
                 <a href="add_service.php" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back to Services
                </a>
            </div>
        </div>

                <?php if ($update_result && $update_result['success']): ?>
            <div class="modal fade show" id="updateSuccessModal" tabindex="-1" style="display:block; background:rgba(0,0,0,0.5);">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title">Service Updated!</h5>
                        </div>
                        <div class="modal-body text-center py-4">
                            <i class="bi bi-check-circle-fill text-success display-4 mb-3"></i>
                            <p><?php echo htmlspecialchars($update_result['message']); ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="./admin_dashboard.php" class="btn btn-success">Go to Dashboard</a>
                            <a href="services.php" class="btn btn-outline-primary">Add/Manage Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('serviceForm').reset();
            </script>
        <?php elseif ($update_result): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($update_result['message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Service: <?php echo htmlspecialchars($service['service_name']); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php render_service_form($service, true); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./resources/js/main.js"></script>
    <script>
        // js/service-form.js
document.addEventListener('DOMContentLoaded', function() {
    initializeServiceForm();
    initializeDeleteHandlers();
});

function initializeServiceForm() {
    const serviceNameInput = document.getElementById('service_name');
    const subServicesSection = document.getElementById('subServicesSection');
    const subServicesContainer = document.getElementById('subServicesContainer');
    const addSubServiceBtn = document.getElementById('addSubService');
    
    if (!serviceNameInput || !subServicesSection) return;

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Enable sub-services section when main service is filled (for add page only)
    if (subServicesSection.style.display === 'none') {
        serviceNameInput.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                subServicesSection.style.display = 'block';
                if (subServicesContainer.children.length === 0) {
                    addSubService();
                }
            } else {
                subServicesSection.style.display = 'none';
                subServicesContainer.innerHTML = '';
            }
        });
    }

    // Add sub-service functionality
    if (addSubServiceBtn) {
        addSubServiceBtn.addEventListener('click', addSubService);
    }

    // Remove sub-service functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-sub-service')) {
            const removeBtn = e.target.closest('.remove-sub-service');
            const subId = removeBtn.getAttribute('data-sub-id');
            if (!removeBtn.disabled) {
                if (subId) {
                    // AJAX delete for existing sub-service
                    fetch('includes/delete_sub_service.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `sub_service_id=${subId}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            removeBtn.closest('.sub-service-row').remove();
                            reindexSubServices();
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        alert('AJAX error deleting sub-service.');
                    });
                } else {
                    // Just remove from DOM for new (unsaved) sub-service
                    removeBtn.closest('.sub-service-row').remove();
                    reindexSubServices();
                }
            }
        }
    });
}

function addSubService() {
    const container = document.getElementById('subServicesContainer');
    const template = document.getElementById('subServiceTemplate');
    
    if (!template) {
        console.error('Sub-service template not found');
        return;
    }

    const index = container.children.length;
    const newRowHtml = template.innerHTML.replace(/__INDEX__/g, index);
    container.insertAdjacentHTML('beforeend', newRowHtml);
    reindexSubServices();
}

function reindexSubServices() {
    const rows = document.querySelectorAll('.sub-service-row');
    rows.forEach((row, index) => {
        row.setAttribute('data-index', index);
        const inputs = row.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            const name = input.getAttribute('name').replace(/\[\d+\]/, `[${index}]`);
            input.setAttribute('name', name);
        });
        
        // Enable/disable remove button for first row
        const removeBtn = row.querySelector('.remove-sub-service');
        if (removeBtn) {
            removeBtn.disabled = index === 0;
        }
    });
}

function initializeDeleteHandlers() {
    const deleteModal = document.getElementById('deleteModal') ? new bootstrap.Modal(document.getElementById('deleteModal')) : null;
    const deleteServiceName = document.getElementById('deleteServiceName');
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    let serviceToDelete = null;

    if (!deleteModal || !deleteServiceName || !confirmDeleteBtn) return;

    document.querySelectorAll('.delete-service-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            serviceToDelete = this.getAttribute('data-service-id');
            const serviceName = this.getAttribute('data-service-name');
            deleteServiceName.textContent = serviceName;
            deleteModal.show();
        });
    });

    confirmDeleteBtn.addEventListener('click', function() {
        if (serviceToDelete) {
            fetch('delete_service.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `service_id=${serviceToDelete}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessModal(data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    alert('Error: ' + data.message);
                }
            })
                        .catch(error => {
                setTimeout(() => { window.location.reload(); }, 1000);
            });
            
            deleteModal.hide();
        }
    });
}

function showSuccessModal(message) {
    const successMessage = document.getElementById('successMessage');
    const successModal = document.getElementById('successModal') ? new bootstrap.Modal(document.getElementById('successModal')) : null;
    
    if (successMessage && successModal) {
        successMessage.textContent = message;
        successModal.show();
    }
}

// Show success modal if there's a success result from PHP
<?php if (isset($services_result) && $services_result && $services_result['success']): ?>
    showSuccessModal('<?php echo $services_result['message']; ?>');
<?php endif; ?>
    </script>
</div>