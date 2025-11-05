<?php
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
include 'admin-footer.php';
?>