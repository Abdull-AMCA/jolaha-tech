<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
// Get all service inquiries
$inquiries = get_all_service_inquiries();
?>

    <div class="main-content" id="mainContent">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title">Service Inquiries</h1>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </button>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-envelope me-2"></i>All Service Inquiries</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="inquiriesTable">
                            <thead>
                                <tr class="table-dark">
                                    <th>#</th>
                                    <th>Service Type</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Budget Range</th>
                                    <th>Timeline</th>
                                    <th>Submitted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($inquiries)): ?>
                                    <?php $serial = 1; foreach ($inquiries as $inquiry): ?>
                                        <tr>
                                            <td class="fw-bold"><?php echo $serial++; ?></td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    <?php echo htmlspecialchars($inquiry['service_type']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <strong><?php echo htmlspecialchars($inquiry['full_name']); ?></strong>
                                            </td>
                                            <td>
                                                <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>" 
                                                class="text-decoration-none">
                                                    <i class="bi bi-envelope me-1"></i>
                                                    <?php echo htmlspecialchars($inquiry['email']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['company_name'])): ?>
                                                    <?php echo htmlspecialchars($inquiry['company_name']); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">Not provided</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['budget_range'])): ?>
                                                    <span class="badge bg-info">
                                                        <?php echo htmlspecialchars($inquiry['budget_range']); ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">Not specified</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($inquiry['timeline'])): ?>
                                                    <span class="badge bg-warning text-dark">
                                                        <?php echo htmlspecialchars($inquiry['timeline']); ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">Not specified</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-semibold"><?php echo date('M j, Y', strtotime($inquiry['submitted_at'])); ?></span>
                                                    <small class="text-muted"><?php echo date('g:i A', strtotime($inquiry['submitted_at'])); ?></small>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary view-inquiry-btn" 
                                                        data-inquiry-id="<?php echo $inquiry['id']; ?>"
                                                        title="View Details">
                                                    <i class="bi bi-eye"></i> View Details
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="bi bi-envelope display-4 d-block mb-2"></i>
                                                <h5>No service inquiries found</h5>
                                                <p>All service inquiries will appear here.</p>
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

    <!-- View Inquiry Details Modal -->
    <div class="modal fade" id="viewInquiryModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-envelope me-2"></i>Inquiry Details</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="inquiryDetails">
                    <!-- Content will be loaded via AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-success" id="respondInquiryBtn">
                        <i class="bi bi-reply me-1"></i> Respond via Email
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/admin-footer.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewModal = new bootstrap.Modal(document.getElementById('viewInquiryModal'));
        const inquiryDetails = document.getElementById('inquiryDetails');
        const respondBtn = document.getElementById('respondInquiryBtn');
        let currentInquiryEmail = '';

        // View inquiry details
        document.querySelectorAll('.view-inquiry-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const inquiryId = this.getAttribute('data-inquiry-id');
                console.log('Fetching inquiry ID:', inquiryId); // Debug log
                
                // Show loading state
                inquiryDetails.innerHTML = `
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading inquiry details...</p>
                    </div>
                `;
                
                // Fetch inquiry details - use absolute path to be safe
                fetch(`includes/get_inquiry_details.php?id=${inquiryId}`)
                    .then(response => {
                        console.log('Response status:', response.status); // Debug log
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Received data:', data); // Debug log
                        if (data.success) {
                            const inquiry = data.inquiry;
                            currentInquiryEmail = inquiry.email;
                            
                            // Update respond button
                            respondBtn.href = `mailto:${inquiry.email}?subject=Re: Your ${inquiry.service_type} Inquiry&body=Dear ${inquiry.full_name},%0D%0A%0D%0AThank you for your inquiry regarding our ${inquiry.service_type} services.%0D%0A%0D%0A`;
                            
                            // Populate modal content
                            inquiryDetails.innerHTML = `
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
                        } else {
                            inquiryDetails.innerHTML = `
                                <div class="alert alert-danger">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    Error loading inquiry details: ${data.message}
                                </div>
                            `;
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                        inquiryDetails.innerHTML = `
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Network error occurred while loading inquiry details: ${error.message}
                            </div>
                        `;
                    });
                
                viewModal.show();
            });
        });

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
</script>