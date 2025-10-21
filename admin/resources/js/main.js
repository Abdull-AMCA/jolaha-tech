document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    let isMobile = window.innerWidth < 768;
    
    // Initialize mobile state
    if (isMobile) {
        sidebar.classList.add('mobile-closed');
    }
    
    // Desktop sidebar toggle
    sidebarToggleBtn.addEventListener('click', function() {
        if (!isMobile) {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            
            // Change icon based on state
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-chevron-right');
            } else {
                icon.classList.remove('bi-chevron-right');
                icon.classList.add('bi-list');
            }
        }
    });
    
    // Mobile sidebar toggle
    mobileSidebarToggle.addEventListener('click', function() {
        if (isMobile) {
            sidebar.classList.toggle('mobile-open');
            sidebarOverlay.classList.toggle('show');
            
            // Change icon based on state
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('mobile-open')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x');
            } else {
                icon.classList.remove('bi-x');
                icon.classList.add('bi-list');
            }
        }
    });
    
    // Close sidebar when clicking on overlay
    sidebarOverlay.addEventListener('click', function() {
        if (isMobile) {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('show');
            mobileSidebarToggle.querySelector('i').classList.remove('bi-x');
            mobileSidebarToggle.querySelector('i').classList.add('bi-list');
        }
    });
    
    // Handle menu toggles for dropdown menus
    const menuToggleBtns = document.querySelectorAll('.menu-toggle-btn');
    
    menuToggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const menuId = this.getAttribute('data-menu');
            const menu = document.getElementById(`${menuId}-menu`);
            const toggleIcon = this.querySelector('.menu-toggle');
            
            // Close other menus
            document.querySelectorAll('.sub-menu').forEach(m => {
                if (m.id !== `${menuId}-menu`) {
                    m.classList.remove('show');
                }
            });
            
            // Reset other toggle icons
            document.querySelectorAll('.menu-toggle').forEach(icon => {
                if (icon !== toggleIcon) {
                    icon.classList.remove('rotated');
                }
            });
            
            // Toggle current menu
            menu.classList.toggle('show');
            toggleIcon.classList.toggle('rotated');
        });
    });
    
    // Responsive behavior
    function handleResize() {
        isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            // Mobile behavior - ensure sidebar starts hidden
            if (!sidebar.classList.contains('mobile-open')) {
                sidebar.classList.add('mobile-closed');
            }
            mainContent.style.marginLeft = '0';
            
            // Reset desktop toggle icon
            sidebarToggleBtn.querySelector('i').classList.remove('bi-chevron-right');
            sidebarToggleBtn.querySelector('i').classList.add('bi-list');
        } else {
            // Desktop behavior
            sidebar.classList.remove('mobile-open', 'mobile-closed');
            sidebarOverlay.classList.remove('show');
            mainContent.style.marginLeft = '';
            
            // Reset mobile toggle icon
            mobileSidebarToggle.querySelector('i').classList.remove('bi-x');
            mobileSidebarToggle.querySelector('i').classList.add('bi-list');
            
            // Reset to default desktop state
            if (sidebar.classList.contains('collapsed')) {
                mainContent.classList.add('expanded');
            } else {
                mainContent.classList.remove('expanded');
            }
        }
    }
    
    // Initial call and event listener
    handleResize();
    window.addEventListener('resize', handleResize);
});




////////////////////////////////////////

// Handle service form submission
// main.js - Consolidated Service Management Functions

class ServiceManager {
    constructor() {
        this.serviceToDelete = null;
        this.init();
    }

    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.initializeTooltips();
            this.initializeServiceForm();
            this.initializeDeleteHandlers();
            this.initializeSuccessModals();
        });
    }

    // Initialize Bootstrap tooltips
    initializeTooltips() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    }

    // Initialize service form functionality
    initializeServiceForm() {
        const serviceNameInput = document.getElementById('service_name');
        const subServicesSection = document.getElementById('subServicesSection');
        const subServicesContainer = document.getElementById('subServicesContainer');
        const addSubServiceBtn = document.getElementById('addSubService');
        
        if (!serviceNameInput || !subServicesSection) return;

        // Enable sub-services section when main service is filled (for add page only)
        if (subServicesSection.style.display === 'none') {
            serviceNameInput.addEventListener('input', () => {
                if (serviceNameInput.value.trim().length > 0) {
                    subServicesSection.style.display = 'block';
                    if (subServicesContainer.children.length === 0) {
                        this.addSubService();
                    }
                } else {
                    subServicesSection.style.display = 'none';
                    subServicesContainer.innerHTML = '';
                }
            });
        }

        // Add sub-service functionality
        if (addSubServiceBtn) {
            addSubServiceBtn.addEventListener('click', () => this.addSubService());
        }

        // Remove sub-service functionality
        document.addEventListener('click', (e) => {
            if (e.target.closest('.remove-sub-service')) {
                this.handleSubServiceRemoval(e);
            }
        });
    }

    // Handle sub-service removal (for both edit and add pages)
    handleSubServiceRemoval(e) {
        const removeBtn = e.target.closest('.remove-sub-service');
        if (!removeBtn || removeBtn.disabled) return;

        const subId = removeBtn.getAttribute('data-sub-id');
        const subServiceName = removeBtn.closest('.sub-service-row').querySelector('input[name*="[name]"]')?.value || 'this sub-service';

        if (subId && subId !== 'null') {
            // AJAX delete for existing sub-service
            if (confirm(`Are you sure you want to delete "${subServiceName}"?`)) {
                this.deleteSubService(subId, removeBtn);
            }
        } else {
            // Just remove from DOM for new (unsaved) sub-service
            removeBtn.closest('.sub-service-row').remove();
            this.reindexSubServices();
        }
    }

    // Delete sub-service via AJAX
    deleteSubService(subId, removeBtn) {
        fetch('includes/delete_sub_service.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `sub_service_id=${subId}`
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                removeBtn.closest('.sub-service-row').remove();
                this.reindexSubServices();
                this.showSuccessMessage('Sub-service deleted successfully');
            } else {
                this.showErrorModal(data.message || 'Failed to delete sub-service.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            this.showErrorModal('An error occurred while deleting the sub-service.');
        });
    }

    // Add new sub-service row
    addSubService() {
        const container = document.getElementById('subServicesContainer');
        const template = document.getElementById('subServiceTemplate');
        
        if (!template) {
            console.error('Sub-service template not found');
            return;
        }

        const index = container.children.length;
        const newRowHtml = template.innerHTML.replace(/__INDEX__/g, index);
        container.insertAdjacentHTML('beforeend', newRowHtml);
        this.reindexSubServices();
    }

    // Reindex sub-services after addition/removal
    reindexSubServices() {
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

    // Initialize service deletion handlers
    initializeDeleteHandlers() {
        const deleteModal = document.getElementById('deleteModal') ? new bootstrap.Modal(document.getElementById('deleteModal')) : null;
        const deleteServiceName = document.getElementById('deleteServiceName');
        const confirmDeleteBtn = document.getElementById('confirmDelete');

        if (!deleteModal || !deleteServiceName || !confirmDeleteBtn) return;

        // Service deletion buttons
        document.querySelectorAll('.delete-service-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                this.serviceToDelete = btn.getAttribute('data-service-id');
                const serviceName = btn.getAttribute('data-service-name');
                deleteServiceName.textContent = serviceName;
                deleteModal.show();
            });
        });

        // Confirm deletion
        confirmDeleteBtn.addEventListener('click', () => {
            if (this.serviceToDelete) {
                this.deleteService(this.serviceToDelete);
                deleteModal.hide();
            }
        });
    }

    // Delete service via AJAX
    deleteService(serviceId) {
        fetch('delete_service.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `service_id=${serviceId}`
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                this.showSuccessModal(data.message);
                setTimeout(() => window.location.reload(), 2000);
            } else {
                this.showErrorModal(data.message || 'Failed to delete service.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            this.showErrorModal('An error occurred while deleting the service.');
        });
    }

    // Initialize success modals from PHP results
    initializeSuccessModals() {
        // Check for PHP success messages
        if (typeof services_result !== 'undefined' && services_result && services_result.success) {
            this.showSuccessModal(services_result.message);
        }
    }

    // Show success modal
    showSuccessModal(message) {
        const successMessage = document.getElementById('successMessage');
        const successModal = document.getElementById('successModal') ? new bootstrap.Modal(document.getElementById('successModal')) : null;
        
        if (successMessage && successModal) {
            successMessage.textContent = message;
            successModal.show();
        }
    }

    // Show error modal
    showErrorModal(message) {
        let errorModal = document.getElementById('errorModal');
        
        // Create error modal if it doesn't exist
        if (!errorModal) {
            errorModal = document.createElement('div');
            errorModal.className = 'modal fade';
            errorModal.id = 'errorModal';
            errorModal.innerHTML = `
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Error</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center py-4">
                            <i class="bi bi-x-circle-fill text-danger display-4 mb-3"></i>
                            <p id="errorMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(errorModal);
        }

        const errorMessage = document.getElementById('errorMessage');
        const modalInstance = new bootstrap.Modal(errorModal);
        
        if (errorMessage) {
            errorMessage.textContent = message;
        }
        modalInstance.show();
    }

    // Show temporary success message
    showSuccessMessage(message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-success alert-dismissible fade show';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.container-fluid');
        if (container) {
            container.insertBefore(alertDiv, container.firstChild);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 3000);
        }
    }
}

// Initialize Service Manager
const serviceManager = new ServiceManager();

// Utility function for simple service form initialization (for basic pages)
function initializeBasicServiceForm() {
    const serviceNameInput = document.getElementById('service_name');
    const subServicesSection = document.getElementById('subServicesSection');
    const subServicesContainer = document.getElementById('subServicesContainer');
    const addSubServiceBtn = document.getElementById('addSubService');

    if (!serviceNameInput || !subServicesSection) return;

    // Enable sub-services section when main service is filled
    serviceNameInput.addEventListener('input', function() {
        if (this.value.trim().length > 0) {
            subServicesSection.style.display = 'block';
            if (subServicesContainer.children.length === 0) {
                serviceManager.addSubService();
            }
        } else {
            subServicesSection.style.display = 'none';
            subServicesContainer.innerHTML = '';
        }
    });

    // Add sub-service button
    if (addSubServiceBtn) {
        addSubServiceBtn.addEventListener('click', () => serviceManager.addSubService());
    }
}

// Export for use in other modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { ServiceManager, initializeBasicServiceForm };
}


/////////////////////////////////////////////
// =====================================================
// Main Admin JS — handles global UI behavior
// =====================================================
document.addEventListener("DOMContentLoaded", function () {

    // =====================================================
    // 1️⃣ SEO FIELD CHARACTER COUNTERS
    // =====================================================
    const metaTitle = document.getElementById('meta_title');
    const metaDescription = document.getElementById('meta_description');

    function updateCharacterCount(field, countId) {
        let countElement = document.getElementById(countId);
        if (!countElement) {
            countElement = document.createElement('div');
            countElement.id = countId;
            countElement.className = 'form-text text-end mt-1';
            field.parentNode.appendChild(countElement);
        }

        const len = field.value.trim().length;
        countElement.textContent = len + ' characters';

        if (field.id === 'meta_title') {
            if (len >= 50 && len <= 60) {
                countElement.className = 'form-text text-end text-success mt-1';
            } else {
                countElement.className = 'form-text text-end text-warning mt-1';
            }
        } else if (field.id === 'meta_description') {
            if (len >= 150 && len <= 160) {
                countElement.className = 'form-text text-end text-success mt-1';
            } else {
                countElement.className = 'form-text text-end text-warning mt-1';
            }
        }
    }

    if (metaTitle) {
        metaTitle.addEventListener('input', function () {
            updateCharacterCount(this, 'metaTitleCount');
        });
        updateCharacterCount(metaTitle, 'metaTitleCount');
    }

    if (metaDescription) {
        metaDescription.addEventListener('input', function () {
            updateCharacterCount(this, 'metaDescCount');
        });
        updateCharacterCount(metaDescription, 'metaDescCount');
    }

    // =====================================================
    // 2️⃣ POST CATEGORY SELECTION (Solution / Product / Service)
    // =====================================================
    const categoryRadios = document.querySelectorAll('input[name="post_category_type"]');
    const categoryDropdownContainer = document.getElementById('categoryDropdownContainer');
    const categoryDropdown = document.getElementById('categoryDropdown');
    const serviceCardsContainer = document.getElementById('serviceCardsContainer');

    // Data from PHP (loaded in DOM)
    const solutions = window.solutionsData || [];
    const products = window.productsData || [];

    // Reset form category UI
    function resetCategoryUI() {
        if (categoryDropdown) {
            categoryDropdown.innerHTML = '<option value="">Select an option</option>';
        }
        if (categoryDropdownContainer) categoryDropdownContainer.style.display = 'none';
        if (serviceCardsContainer) {
            serviceCardsContainer.style.display = 'none';
            document.querySelectorAll('.service-card').forEach(card => card.classList.remove('selected'));
            document.querySelectorAll('.subservice-btn').forEach(btn => btn.classList.remove('active'));
        }
        // Remove hidden inputs
        document.querySelectorAll('#selectedServiceInput, #selectedSubServiceInput').forEach(el => el.remove());
    }

    // Populate dropdown (solutions or products)
    function populateDropdown(data, labelKey) {
        categoryDropdown.innerHTML = '<option value="">Select an option</option>';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item[labelKey];
            categoryDropdown.appendChild(option);
        });
    }

    // When user changes category type
    categoryRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            resetCategoryUI();
            if (this.value === 'solution') {
                populateDropdown(solutions, 'solution_name');
                categoryDropdownContainer.style.display = 'block';
            } else if (this.value === 'product') {
                populateDropdown(products, 'product_name');
                categoryDropdownContainer.style.display = 'block';
            } else if (this.value === 'service') {
                serviceCardsContainer.style.display = 'flex';
            }
        });
    });

    // =====================================================
    // 3️⃣ SERVICE / SUBSERVICE INTERACTION
    // =====================================================
    if (serviceCardsContainer) {
        serviceCardsContainer.addEventListener('click', function (e) {
            const subBtn = e.target.closest('.subservice-btn');
            if (!subBtn) return;

            const serviceId = subBtn.getAttribute('data-service-id');
            const subId = subBtn.getAttribute('data-sub-id');

            // Clear all previous selections
            document.querySelectorAll('.service-card').forEach(card => card.classList.remove('selected'));
            document.querySelectorAll('.subservice-btn').forEach(btn => btn.classList.remove('active'));

            // Highlight selected
            subBtn.classList.add('active');
            subBtn.closest('.service-card').classList.add('selected');

            // Remove any existing hidden inputs
            document.querySelectorAll('#selectedServiceInput, #selectedSubServiceInput').forEach(el => el.remove());

            // Add hidden inputs for selected service/subservice
            const form = document.getElementById('postForm');
            if (form) {
                const serviceInput = document.createElement('input');
                serviceInput.type = 'hidden';
                serviceInput.name = 'selected_service_id';
                serviceInput.id = 'selectedServiceInput';
                serviceInput.value = serviceId;

                const subInput = document.createElement('input');
                subInput.type = 'hidden';
                subInput.name = 'selected_subservice_id';
                subInput.id = 'selectedSubServiceInput';
                subInput.value = subId;

                form.appendChild(serviceInput);
                form.appendChild(subInput);
            }
        });
    }

    // =====================================================
    // 4️⃣ VISUAL ENHANCEMENTS
    // =====================================================
    // Service card highlight styles
    const style = document.createElement('style');
    style.textContent = `
        .service-card.selected {
            border: 2px solid #0d6efd !important;
            box-shadow: 0 0 0.5rem rgba(13,110,253,0.4);
        }
        .subservice-btn.active {
            background-color: #0d6efd !important;
            color: white !important;
        }
    `;
    document.head.appendChild(style);

});
