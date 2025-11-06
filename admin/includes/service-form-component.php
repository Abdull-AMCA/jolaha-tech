<?php
    function render_service_form($service = null, $is_edit = false) {
    $service_name = $service['service_name'] ?? '';
    $service_description = $service['service_description'] ?? '';
    $service_icon = $service['service_icon'] ?? '';
    $sub_services = $service['sub_services'] ?? [];
?>
    
    <form method="POST" id="serviceForm">
        <!-- Main Service Section -->
        <div class="mb-4">
            <h6 class="border-bottom pb-2">Main Service Information</h6>
            
            <div class="mb-3">
                <label for="service_name" class="form-label">
                    Service Name *
                    <i class="bi bi-info-circle text-primary ms-1" data-bs-toggle="tooltip" title="Enter the main category name for your service"></i>
                </label>
                <input type="text" class="form-control" id="service_name" name="service_name" 
                       value="<?php echo htmlspecialchars($service_name); ?>" required>
            </div>

            <div class="mb-3">
                <label for="service_description" class="form-label">
                    Service Description
                    <i class="bi bi-info-circle text-primary ms-1" data-bs-toggle="tooltip" title="Brief description of what this service category includes"></i>
                </label>
                <textarea class="form-control" id="service_description" name="service_description" rows="3"><?php echo htmlspecialchars($service_description); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="service_icon" class="form-label">
                    Service Icon
                    <i class="bi bi-info-circle text-primary ms-1" data-bs-toggle="tooltip" title="Bootstrap icon class name (e.g., bi-code, bi-phone)"></i>
                </label>
                <input type="text" class="form-control" id="service_icon" name="service_icon" 
                       value="<?php echo htmlspecialchars($service_icon); ?>" placeholder="bi-code">
            </div>
        </div>

        <!-- Sub Services Section -->
        <div id="subServicesSection" <?php echo !$is_edit ? 'style="display: none;"' : ''; ?>>
            <h6 class="border-bottom pb-2 mb-3">
                Sub-Services
                <i class="bi bi-info-circle text-primary ms-1" data-bs-toggle="tooltip" title="Manage specific services under this main category"></i>
            </h6>

            <div id="subServicesContainer">
                <?php if (!empty($sub_services)): ?>
                    <?php foreach ($sub_services as $index => $sub_service): ?>
                        <?php echo render_sub_service_row($index, $sub_service, $index === 0); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php echo render_sub_service_row(0, [], true); ?>
                <?php endif; ?>
            </div>

            <button type="button" class="btn btn-outline-primary btn-sm" id="addSubService">
                <i class="bi bi-plus-circle me-1"></i> Add Another Sub-Service
            </button>
        </div>

        <div class="mt-4">
            <button type="submit" name="<?php echo $is_edit ? 'update_service' : 'add_service'; ?>" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i> <?php echo $is_edit ? 'Update' : 'Add'; ?> Service
            </button>
            <?php if ($is_edit): ?>
                <a href="services.php" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-1"></i> Cancel
                </a>
            <?php endif; ?>
        </div>
    </form>
    
    <!-- Sub-service row template (hidden) -->
    <template id="subServiceTemplate">
        <?php echo render_sub_service_row('__INDEX__', [], false); ?>
    </template>
<?php
}

function render_sub_service_row($index, $sub_service = [], $is_first = false) {
    $name = $sub_service['name'] ?? $sub_service['sub_service_name'] ?? '';
    $description = $sub_service['description'] ?? $sub_service['sub_service_description'] ?? '';
    $sub_id = $sub_service['id'] ?? '';
    return '
    <div class="sub-service-row p-3 mb-3 rounded border" data-index="' . $index . '" data-sub-id="' . $sub_id . '">
        <div class="row">
            <div class="col-md-10 mb-2">
                <label class="form-label">Sub-Service Name *</label>
                <input type="text" class="form-control" name="sub_services[' . $index . '][name]" value="' . htmlspecialchars($name) . '" required>
            </div>
            <div class="col-md-2 mb-2 d-flex align-items-end">
                <button type="button" class="btn btn-outline-danger btn-sm remove-sub-service" data-sub-id="' . $sub_id . '" ' . ($is_first ? 'disabled' : '') . '>
                    <i class="bi bi-trash"></i>
                </button>
            </div>
            <div class="col-12 mb-2">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="sub_services[' . $index . '][description]" rows="2" placeholder="Brief description of this sub-service">' . htmlspecialchars($description) . '</textarea>
            </div>
        </div>
    </div>';
}
?>