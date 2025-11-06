<?php
// Get all call bookings
$call_bookings = get_all_call_bookings();
?>

<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title">Call Bookings</h1>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise"></i> Refresh
                </button>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-telephone me-2"></i>All Call Bookings</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="callBookingsTable">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Preferred Date</th>
                                <th>Preferred Time</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($call_bookings)): ?>
                                <?php $serial = 1; foreach ($call_bookings as $booking): ?>
                                    <tr>
                                        <td class="fw-bold"><?php echo $serial++; ?></td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($booking['full_name']); ?></strong>
                                        </td>
                                        <td>
                                            <a href="mailto:<?php echo htmlspecialchars($booking['email']); ?>" 
                                            class="text-decoration-none">
                                                <i class="bi bi-envelope me-1"></i>
                                                <?php echo htmlspecialchars($booking['email']); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="tel:<?php echo htmlspecialchars($booking['phone']); ?>" 
                                            class="text-decoration-none">
                                                <i class="bi bi-telephone me-1"></i>
                                                <?php echo htmlspecialchars($booking['phone']); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if (!empty($booking['company_name'])): ?>
                                                <?php echo htmlspecialchars($booking['company_name']); ?>
                                            <?php else: ?>
                                                <span class="text-muted">Not provided</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($booking['preferred_date'])): ?>
                                                <span class="fw-semibold">
                                                    <?php echo date('M j, Y', strtotime($booking['preferred_date'])); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted">Not specified</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($booking['preferred_time'])): ?>
                                                <span class="badge bg-info">
                                                    <?php echo date('g:i A', strtotime($booking['preferred_time'])); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted">Not specified</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $status_badge = [
                                                'pending' => ['bg-warning text-dark', 'Pending'],
                                                'confirmed' => ['bg-success', 'Confirmed'],
                                                'cancelled' => ['bg-danger', 'Cancelled']
                                            ];
                                            $badge_class = $status_badge[$booking['status']][0] ?? 'bg-secondary';
                                            $badge_text = $status_badge[$booking['status']][1] ?? ucfirst($booking['status']);
                                            ?>
                                            <span class="badge <?php echo $badge_class; ?>">
                                                <?php echo $badge_text; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold"><?php echo date('M j, Y', strtotime($booking['submitted_at'])); ?></span>
                                                <small class="text-muted"><?php echo date('g:i A', strtotime($booking['submitted_at'])); ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-sm btn-primary view-booking-btn" 
                                                        data-booking-id="<?php echo $booking['id']; ?>"
                                                        title="View Details">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                            type="button" data-bs-toggle="dropdown" 
                                                            aria-expanded="false" title="Change Status">
                                                        <i class="bi bi-gear"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item status-update-btn" 
                                                               href="#" data-booking-id="<?php echo $booking['id']; ?>" 
                                                               data-status="pending">
                                                                <i class="bi bi-clock text-warning me-2"></i>Mark as Pending
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item status-update-btn" 
                                                               href="#" data-booking-id="<?php echo $booking['id']; ?>" 
                                                               data-status="confirmed">
                                                                <i class="bi bi-check-circle text-success me-2"></i>Mark as Confirmed
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item status-update-btn" 
                                                               href="#" data-booking-id="<?php echo $booking['id']; ?>" 
                                                               data-status="cancelled">
                                                                <i class="bi bi-x-circle text-danger me-2"></i>Mark as Cancelled
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-telephone display-4 d-block mb-2"></i>
                                            <h5>No call bookings found</h5>
                                            <p>All call booking requests will appear here.</p>
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

<!-- View Booking Details Modal -->
<div class="modal fade" id="viewBookingModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-telephone me-2"></i>Call Booking Details</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="bookingDetails">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-success" id="callBookingBtn">
                    <i class="bi bi-telephone me-1"></i> Call Now
                </a>
                <a href="#" class="btn btn-info" id="emailBookingBtn">
                    <i class="bi bi-envelope me-1"></i> Email
                </a>
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