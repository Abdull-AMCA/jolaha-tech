<?php

$services_result = null;
$all_services = get_all_services_with_subservices();

// Debug: Check if services are being fetched
error_log("Fetched services count: " . count($all_services));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_service'])) {
        $services_result = handle_service_addition();
        // Refresh services list after addition
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
        
        // For AJAX requests, return JSON and exit
        if (isset($_POST['ajax'])) {
            echo json_encode($services_result);
            exit;
        }
    }
}
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4">Services Management</h2>
                <p class="text-muted">Manage all Jolaha Services and sub-services</p>
            </div>
        </div>

        <!-- Display Messages -->
        <?php if (isset($services_result) && !empty($services_result['message'])): ?>
            <div class="alert alert-<?php echo $services_result['success'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                <?php echo $services_result['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Services List -->
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
                                <table class="table table-hover">
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
                                                        <?php if (!empty($service['service_icon'])): ?>
                                                            <i class="<?php echo $service['service_icon']; ?> me-2 text-primary"></i>
                                                        <?php else: ?>
                                                            <i class="bi bi-tools me-2 text-muted"></i>
                                                        <?php endif; ?>
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
                                                                <small class="d-block text-muted">
                                                                    • <?php echo htmlspecialchars($sub_service['sub_service_name']); ?>
                                                                    <?php if (!empty($sub_service['price'])): ?>
                                                                        - $<?php echo $sub_service['price']; ?>
                                                                    <?php endif; ?>
                                                                </small>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="text-muted">No sub-services</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo !empty($service['created_at']) ? date('M j, Y', strtotime($service['created_at'])) : 'N/A'; ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="services.php?source=edit_service&id=<?php echo $service['id']; ?>"
                                                           class="btn btn-outline-primary" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Service">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <button type="button" 
                                                                class="btn btn-outline-danger delete-service-btn" 
                                                                data-service-id="<?php echo $service['id']; ?>"
                                                                data-service-name="<?php echo htmlspecialchars($service['service_name']); ?>"
                                                                data-bs-toggle="tooltip" 
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

        <!-- Add Service Form -->
        <div class="row mt-4 mb-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add New Service</h5>
                    </div>
                    <div class="card-body">
                        <?php 
                        // Include the service form component
                        if (file_exists('service-form-component.php')) {
                            require_once 'service-form-component.php';
                            render_service_form();
                        } else {
                            echo '<div class="alert alert-warning">Service form component not found.</div>';
                        }
                        ?>
                    </div>
                </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the service: <strong id="deleteServiceName"></strong>?</p>
                <p class="text-danger"><small>This action cannot be undone. All associated sub-services will also be deleted.</small></p>
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
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Delete service functionality
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const deleteServiceName = document.getElementById('deleteServiceName');
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    let serviceToDelete = null;

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
            // Send delete request using FormData
            const formData = new FormData();
            formData.append('delete_service', '1');
            formData.append('service_id', serviceToDelete);
            formData.append('ajax', '1');

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessModal(data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the service.');
            });
            
            deleteModal.hide();
        }
    });

    // Show success modal if there's a success result from PHP
    <?php if (isset($services_result) && $services_result && $services_result['success']): ?>
        showSuccessModal('<?php echo $services_result['message']; ?>');
    <?php endif; ?>

    function showSuccessModal(message) {
        const successMessage = document.getElementById('successMessage');
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        
        if (successMessage) {
            successMessage.textContent = message;
            successModal.show();
        }
    }
});
</script>

  
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
            if (!removeBtn.disabled) {
                removeBtn.closest('.sub-service-row').remove();
                reindexSubServices();
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
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `delete_service=1&service_id=${serviceToDelete}`
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
                console.error('Error:', error);
                alert('An error occurred while deleting the service.');
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Service form validation and sub-service management
            const serviceNameInput = document.getElementById('service_name');
            const subServicesSection = document.getElementById('subServicesSection');
            const subServicesContainer = document.getElementById('subServicesContainer');
            const addSubServiceBtn = document.getElementById('addSubService');

            // Enable sub-services section when main service is filled
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

            // Add sub-service row
            function addSubService() {
                const index = subServicesContainer.children.length;
                const subServiceHtml = `
                    <div class="sub-service-row p-3 mb-3 rounded" data-index="${index}">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label class="form-label">Sub-Service Name *</label>
                                <input type="text" class="form-control" name="sub_services[${index}][name]" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Price ($)</label>
                                <input type="number" class="form-control" name="sub_services[${index}][price]" step="0.01" min="0">
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" name="sub_services[${index}][duration]" placeholder="e.g., 2 weeks">
                            </div>
                            <div class="col-md-2 mb-2 d-flex align-items-end">
                                <button type="button" class="btn btn-outline-danger btn-sm remove-sub-service" ${index === 0 ? 'disabled' : ''}>
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="sub_services[${index}][description]" rows="2" placeholder="Brief description of this sub-service"></textarea>
                            </div>
                        </div>
                    </div>
                `;
                subServicesContainer.insertAdjacentHTML('beforeend', subServiceHtml);
                
                // Add event listener to remove button
                const removeBtn = subServicesContainer.lastElementChild.querySelector('.remove-sub-service');
                removeBtn.addEventListener('click', function() {
                    this.closest('.sub-service-row').remove();
                    reindexSubServices();
                });
            }

            // Reindex sub-services after removal
            function reindexSubServices() {
                const rows = subServicesContainer.querySelectorAll('.sub-service-row');
                rows.forEach((row, index) => {
                    row.setAttribute('data-index', index);
                    const inputs = row.querySelectorAll('input, textarea');
                    inputs.forEach(input => {
                        const name = input.getAttribute('name').replace(/\[\d+\]/, `[${index}]`);
                        input.setAttribute('name', name);
                    });
                    
                    // Enable/disable remove button for first row
                    const removeBtn = row.querySelector('.remove-sub-service');
                    removeBtn.disabled = index === 0;
                });
            }

            // Add sub-service button event
            addSubServiceBtn.addEventListener('click', addSubService);

            // Delete service functionality
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            const deleteServiceName = document.getElementById('deleteServiceName');
            const confirmDeleteBtn = document.getElementById('confirmDelete');
            let serviceToDelete = null;

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
                    // Send delete request
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
                            // Show success message and reload
                            showSuccessModal(data.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            alert('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the service.');
                    });
                    
                    deleteModal.hide();
                }
            });

            // Show success modal if there's a success result from PHP
            <?php if ($services_result && $services_result['success']): ?>
                showSuccessModal('<?php echo $services_result['message']; ?>');
            <?php endif; ?>

            function showSuccessModal(message) {
                document.getElementById('successMessage').textContent = message;
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });
    </script>
    </div>
</div>