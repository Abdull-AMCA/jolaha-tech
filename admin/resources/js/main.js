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
            body: new URLSearchParams({ service_id: serviceId }).toString()
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
// 4️⃣ VISUAL ENHANCEMENTS / Service card highlight styles
// =====================================================
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


  
// =====================================================
// 5️⃣ VIEW INQUIRY DETAILS MODAL HANDLER
// =====================================================
    document.addEventListener('DOMContentLoaded', function() {
        const viewModal = new bootstrap.Modal(document.getElementById('viewInquiryModal'));
        const inquiryDetails = document.getElementById('inquiryDetails');
        const respondBtn = document.getElementById('respondInquiryBtn');
        let currentInquiryEmail = '';

        // Use event delegation for dynamically loaded buttons
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('view-inquiry-btn') || e.target.closest('.view-inquiry-btn')) {
                e.preventDefault();
                const btn = e.target.classList.contains('view-inquiry-btn') ? e.target : e.target.closest('.view-inquiry-btn');
                handleViewInquiry(btn);
            }
        });

        function handleViewInquiry(btn) {
            const inquiryId = btn.getAttribute('data-inquiry-id');
            console.log('Fetching inquiry ID:', inquiryId);
            
            // Show loading state
            inquiryDetails.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading inquiry details...</p>
                </div>
            `;
            
            // FIXED: Use backticks for template literal
            fetch(`includes/get_inquiry_details.php?id=${inquiryId}`)
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text(); // First get as text to debug
                })
                .then(text => {
                    console.log('Raw response:', text);
                    
                    try {
                        const data = JSON.parse(text);
                        console.log('Parsed data:', data);
                        
                        if (data.success) {
                            const inquiry = data.inquiry;
                            currentInquiryEmail = inquiry.email;
                            
                            // Update respond button
                            respondBtn.href = `mailto:${inquiry.email}?subject=Re: Your ${inquiry.service_type} Inquiry&body=Dear ${inquiry.full_name},%0D%0A%0D%0AThank you for your inquiry regarding our ${inquiry.service_type} services.%0D%0A%0D%0A`;
                            
                            // Populate modal content
                            inquiryDetails.innerHTML = generateInquiryHTML(inquiry);
                        } else {
                            inquiryDetails.innerHTML = `
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    Error loading inquiry details: ${data.message}
                                </div>
                            `;
                        }
                    } catch (parseError) {
                        console.error('JSON Parse Error:', parseError);
                        throw new Error('Invalid JSON response: ' + text.substring(0, 100));
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    inquiryDetails.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Error loading inquiry details: ${error.message}
                        </div>
                    `;
                });
            
            viewModal.show();
        }

        function generateInquiryHTML(inquiry) {
            return `
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-primary">Personal Information</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <p class="form-control-static">${escapeHtml(inquiry.full_name)}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <p class="form-control-static">
                                <a href="mailto:${escapeHtml(inquiry.email)}" class="text-decoration-none">
                                    <i class="bi bi-envelope me-1"></i>${escapeHtml(inquiry.email)}
                                </a>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Company</label>
                            <p class="form-control-static">
                                ${inquiry.company_name ? escapeHtml(inquiry.company_name) : '<span class="text-muted">Not provided</span>'}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-primary">Project Details</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Service Type</label>
                            <p class="form-control-static">
                                <span class="badge bg-primary">${escapeHtml(inquiry.service_type)}</span>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Project Type</label>
                            <p class="form-control-static">
                                ${inquiry.project_type ? escapeHtml(inquiry.project_type) : '<span class="text-muted">Not specified</span>'}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Budget Range</label>
                            <p class="form-control-static">
                                ${inquiry.budget_range ? `<span class="badge bg-info">${escapeHtml(inquiry.budget_range)}</span>` : '<span class="text-muted">Not specified</span>'}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Timeline</label>
                            <p class="form-control-static">
                                ${inquiry.timeline ? `<span class="badge bg-warning text-dark">${escapeHtml(inquiry.timeline)}</span>` : '<span class="text-muted">Not specified</span>'}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h6 class="fw-bold text-primary">Project Description</h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                ${inquiry.description ? `<p class="mb-0">${escapeHtml(inquiry.description).replace(/\n/g, '<br>')}</p>` : '<p class="text-muted mb-0">No description provided.</p>'}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold text-primary">Submission Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Submitted On</label>
                                        <p class="form-control-static">${formatDate(inquiry.submitted_at)}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Inquiry ID</label>
                                        <p class="form-control-static">#${inquiry.id}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Utility functions
        function escapeHtml(unsafe) {
            if (!unsafe) return '';
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function formatDate(dateString) {
            if (!dateString) return 'Unknown date';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    });


// =====================================================
// 6️⃣ VIEW BOOKING DETAILS MODAL & STATUS UPDATE
// =====================================================

    document.addEventListener('DOMContentLoaded', function() {
    const viewModal = new bootstrap.Modal(document.getElementById('viewBookingModal'));
    const bookingDetails = document.getElementById('bookingDetails');
    const callBookingBtn = document.getElementById('callBookingBtn');
    const emailBookingBtn = document.getElementById('emailBookingBtn');
    
    let currentBookingPhone = '';
    let currentBookingEmail = '';

    // View booking details
    document.querySelectorAll('.view-booking-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const bookingId = this.getAttribute('data-booking-id');
            console.log('Fetching booking ID:', bookingId);
            
            // Show loading state
            bookingDetails.innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Loading booking details...</p>
                </div>
            `;
            
            // Fetch booking details
            fetch(`includes/get_booking_details.php?id=${bookingId}`)
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(text => {
                    console.log('Raw response:', text);
                    
                    // Try to extract JSON from the response
                    let jsonText = text;
                    const jsonStart = text.indexOf('{');
                    if (jsonStart > 0) {
                        jsonText = text.substring(jsonStart);
                    }
                    
                    try {
                        const data = JSON.parse(jsonText);
                        console.log('Parsed data:', data);
                        
                        if (data.success) {
                            const booking = data.booking;
                            currentBookingPhone = booking.phone;
                            currentBookingEmail = booking.email;
                            
                            // Update action buttons
                            callBookingBtn.href = `tel:${booking.phone}`;
                            emailBookingBtn.href = `mailto:${booking.email}?subject=Regarding Your Call Booking&body=Dear ${booking.full_name},%0D%0A%0D%0A`;
                            
                            // Populate modal content
                            bookingDetails.innerHTML = generateBookingHTML(booking);
                        } else {
                            bookingDetails.innerHTML = `
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    Error loading booking details: ${data.message}
                                </div>
                            `;
                        }
                    } catch (parseError) {
                        console.error('JSON Parse Error:', parseError);
                        throw new Error('Invalid JSON response: ' + text.substring(0, 100));
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    bookingDetails.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Error loading booking details: ${error.message}
                        </div>
                    `;
                });
            
            viewModal.show();
        });
    });

    // Status update functionality
    document.querySelectorAll('.status-update-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const bookingId = this.getAttribute('data-booking-id');
            const newStatus = this.getAttribute('data-status');
            
            if (confirm('Are you sure you want to update the status of this booking?')) {
                updateBookingStatus(bookingId, newStatus);
            }
        });
    });

    function updateBookingStatus(bookingId, status) {
        const formData = new FormData();
        formData.append('booking_id', bookingId);
        formData.append('status', status);
        
        fetch('includes/update_booking_status.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            if (data.success) {
                document.getElementById('successTitle').textContent = 'Status Updated!';
                document.getElementById('successMessage').textContent = data.message;
                successModal.show();
                
                // Reload the page after a short delay
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                document.getElementById('successTitle').textContent = 'Update Failed';
                document.getElementById('successMessage').textContent = data.message;
                successModal.show();
            }
        })
        .catch(error => {
            console.error('Status update error:', error);
            alert('Error updating status. Please try again.');
        });
    }

    function generateBookingHTML(booking) {
        return `
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Contact Information</h6>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <p class="form-control-static">${escapeHtml(booking.full_name)}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <p class="form-control-static">
                            <a href="mailto:${escapeHtml(booking.email)}" class="text-decoration-none">
                                <i class="bi bi-envelope me-1"></i>${escapeHtml(booking.email)}
                            </a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone</label>
                        <p class="form-control-static">
                            <a href="tel:${escapeHtml(booking.phone)}" class="text-decoration-none">
                                <i class="bi bi-telephone me-1"></i>${escapeHtml(booking.phone)}
                            </a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Company</label>
                        <p class="form-control-static">
                            ${booking.company_name ? escapeHtml(booking.company_name) : '<span class="text-muted">Not provided</span>'}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Call Scheduling</h6>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Date</label>
                        <p class="form-control-static">
                            <span class="fw-semibold">${booking.preferred_date ? formatDate(booking.preferred_date) : 'Not specified'}</span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Time</label>
                        <p class="form-control-static">
                            ${booking.preferred_time ? `<span class="badge bg-info">${formatTime(booking.preferred_time)}</span>` : '<span class="text-muted">Not specified</span>'}
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <p class="form-control-static">
                            ${getStatusBadge(booking.status)}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <h6 class="fw-bold text-primary">Additional Notes</h6>
                    <div class="card bg-light">
                        <div class="card-body">
                            ${booking.additional_notes ? `<p class="mb-0">${escapeHtml(booking.additional_notes).replace(/\n/g, '<br>')}</p>` : '<p class="text-muted mb-0">No additional notes provided.</p>'}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="fw-bold text-primary">Submission Details</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Submitted On</label>
                                    <p class="form-control-static">${formatDateTime(booking.submitted_at)}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Last Updated</label>
                                    <p class="form-control-static">${formatDateTime(booking.updated_at)}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Booking ID</label>
                                    <p class="form-control-static">#${booking.id}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

        // Utility functions
        function escapeHtml(unsafe) {
            if (!unsafe) return '';
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function formatDate(dateString) {
            if (!dateString) return 'Unknown date';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric'
            });
        }

        function formatTime(timeString) {
            if (!timeString) return 'Unknown time';
            const date = new Date(`2000-01-01T${timeString}`);
            return date.toLocaleTimeString('en-US', { 
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function formatDateTime(dateTimeString) {
            if (!dateTimeString) return 'Unknown date/time';
            const date = new Date(dateTimeString);
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function getStatusBadge(status) {
            const statusConfig = {
                'pending': ['bg-warning text-dark', 'Pending'],
                'confirmed': ['bg-success', 'Confirmed'],
                'cancelled': ['bg-danger', 'Cancelled']
            };
            
            const [badgeClass, badgeText] = statusConfig[status] || ['bg-secondary', 'Unknown'];
            return `<span class="badge ${badgeClass}">${badgeText}</span>`;
        }
    });


// =====================================================
// 6️⃣ DELETE CAREER FUNCTIONALITY
// =====================================================
    // main.js - Career deletion functionality
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const deleteJobTitle = document.getElementById('deleteJobTitle');
        const confirmDeleteBtn = document.getElementById('confirmDelete');
        
        let jobToDelete = null;

        // Use event delegation for delete buttons
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-career-btn') || e.target.closest('.delete-career-btn')) {
                e.preventDefault();
                const btn = e.target.classList.contains('delete-career-btn') ? e.target : e.target.closest('.delete-career-btn');
                handleCareerDelete(btn);
            }
        });

        function handleCareerDelete(btn) {
            jobToDelete = btn.getAttribute('data-job-id');
            const title = btn.getAttribute('data-job-title');
            
            if (deleteJobTitle) {
                deleteJobTitle.textContent = title;
            }
            
            if (confirmDeleteBtn) {
                confirmDeleteBtn.href = `careers.php?delete_career=${jobToDelete}`;
            }
            
            if (deleteModal) {
                deleteModal.show();
            }
        }

        // Show success modal if deletion was successful
        // This will be triggered by data attributes from PHP
        showDeletionSuccessModal();
    });

    // Function to show success modal based on data attributes
    function showDeletionSuccessModal() {
        const successModalElement = document.getElementById('successModal');
        const showSuccessModal = successModalElement ? successModalElement.getAttribute('data-show-success') : null;
        
        if (showSuccessModal === 'true') {
            const successModal = new bootstrap.Modal(successModalElement);
            successModal.show();
        }
    }


// =====================================================
// 7️⃣ TOOLTIP INITIALIZATION
// =====================================================
    document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects and tooltips
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        btn.setAttribute('data-bs-toggle', 'tooltip');
    });
    
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});