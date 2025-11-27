<?php
// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_subscriber'])) {
        $subscriber_id = intval($_POST['subscriber_id']);
        $delete_result = delete_newsletter_subscriber($subscriber_id);
        
        if (isset($_POST['ajax'])) {
            echo json_encode($delete_result);
            exit;
        }
    }
}

// Handle CSV export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    export_subscribers_to_csv();
}

// Get all subscribers
$subscribers = get_all_newsletter_subscribers();

// Get stats using existing functions
$total_subscribers = get_total_newsletter_subscribers();
$new_subscribers_7days = get_new_newsletter_subscribers();
?>

<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Newsletter Subscribers</h1>
            <div class="d-flex gap-2">
                <a href="includes/export_subscribers.php" class="btn btn-success">
                    <i class="bi bi-download me-1"></i> Export CSV
                </a>
                <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise"></i> Refresh
                </button>
            </div>
        </div>

        <!-- Stats Summary Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="stat-number"><?php echo $total_subscribers; ?></div>
                        <div class="stat-title">Total Subscribers</div>
                        <div class="stat-subtitle">All active subscribers</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card stat-card">
                    <div class="card-body">
                        <div class="stat-number"><?php echo $new_subscribers_7days; ?></div>
                        <div class="stat-title">New Subscribers</div>
                        <div class="stat-subtitle">Last 7 days</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-envelope me-2"></i>All Newsletter Subscribers</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="subscribersTable">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Email Address</th>
                                <th>Subscription Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($subscribers)): ?>
                                <?php $serial = 1; foreach ($subscribers as $subscriber): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo $serial++; ?></td>
                                        <td>
                                            <a href="mailto:<?php echo htmlspecialchars($subscriber['email']); ?>" 
                                               class="text-decoration-none">
                                                <i class="bi bi-envelope me-1"></i>
                                                <?php echo htmlspecialchars($subscriber['email']); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold">
                                                    <?php echo date('M j, Y', strtotime($subscriber['subscription_date'])); ?>
                                                </span>
                                                <small class="text-muted">
                                                    <?php echo date('g:i A', strtotime($subscriber['subscription_date'])); ?>
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i> Active
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-sm btn-outline-danger delete-subscriber-btn" 
                                                        data-subscriber-id="<?php echo $subscriber['id']; ?>"
                                                        data-subscriber-email="<?php echo htmlspecialchars($subscriber['email']); ?>"
                                                        title="Delete Subscriber">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-envelope display-4 d-block mb-2"></i>
                                            <h5>No subscribers found</h5>
                                            <p>All newsletter subscribers will appear here.</p>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteSubscriberModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the subscriber: <strong id="deleteSubscriberEmail"></strong>?</p>
                <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteSubscriber">Delete Subscriber</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title"><i class="bi bi-check-circle-fill me-2"></i>Success</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <i class="bi bi-check-circle display-1 text-success mb-3"></i>
                <h4 id="successTitle">Success!</h4>
                <p class="text-muted" id="successMessage">Operation completed successfully.</p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i>Error</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body py-4">
                <i class="bi bi-exclamation-triangle display-1 text-danger mb-3"></i>
                <h4 id="errorTitle">Error!</h4>
                <p class="text-muted" id="errorMessage">An error occurred.</p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
// Newsletter Subscribers Management
document.addEventListener('DOMContentLoaded', function() {
    const deleteSubscriberModal = new bootstrap.Modal(document.getElementById('deleteSubscriberModal'));
    const deleteSubscriberEmail = document.getElementById('deleteSubscriberEmail');
    const confirmDeleteSubscriberBtn = document.getElementById('confirmDeleteSubscriber');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
    
    let subscriberToDelete = null;

    // Delete subscriber button click
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-subscriber-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.delete-subscriber-btn');
            subscriberToDelete = btn.getAttribute('data-subscriber-id');
            const subscriberEmail = btn.getAttribute('data-subscriber-email');
            
            deleteSubscriberEmail.textContent = subscriberEmail;
            deleteSubscriberModal.show();
        }
    });

    // Confirm delete action
    confirmDeleteSubscriberBtn.addEventListener('click', function() {
        if (!subscriberToDelete) return;

        // Show loading state
        confirmDeleteSubscriberBtn.disabled = true;
        confirmDeleteSubscriberBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Deleting...';

        const formData = new FormData();
        formData.append('delete_subscriber', '1');
        formData.append('subscriber_id', subscriberToDelete);
        formData.append('ajax', '1');

        fetch('', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                deleteSubscriberModal.hide();
                document.getElementById('successMessage').textContent = data.message;
                successModal.show();
                
                // Reload page after success
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                deleteSubscriberModal.hide();
                document.getElementById('errorMessage').textContent = data.message;
                errorModal.show();
            }
        })
        .catch(error => {
            console.error('Delete error:', error);
            deleteSubscriberModal.hide();
            document.getElementById('errorMessage').textContent = 'Network error occurred. Please try again.';
            errorModal.show();
        })
        .finally(() => {
            confirmDeleteSubscriberBtn.disabled = false;
            confirmDeleteSubscriberBtn.innerHTML = 'Delete Subscriber';
        });
    });
});
</script>