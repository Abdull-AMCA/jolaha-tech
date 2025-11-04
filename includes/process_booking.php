<?php
// includes/process_booking.php - COMPLETELY CLEAN VERSION

// Turn on output buffering immediately
if (ob_get_level()) ob_end_clean();
ob_start();

// Set headers
header('Content-Type: application/json');

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    ob_clean();
    echo json_encode(['success' => false, 'message' => 'POST required']);
    ob_end_flush();
    exit;
}

try {
    // Clean output buffer
    ob_clean();
    
    // Your existing booking processing logic here
    $booking_data = [
        'full_name' => trim($_POST['full_name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'company_name' => trim($_POST['company_name'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'preferred_date' => $_POST['preferred_date'] ?? '',
        'preferred_time' => $_POST['preferred_time'] ?? '',
        'additional_notes' => trim($_POST['additional_notes'] ?? '')
    ];

    // Basic validation
    if (empty($booking_data['full_name']) || empty($booking_data['email'])) {
        throw new Exception('Please fill in all required fields');
    }

    // For now, just return success without actual processing
    echo json_encode([
        'success' => true,
        'message' => 'Booking received successfully! (Test mode)',
        'data' => $booking_data
    ]);

} catch (Exception $e) {
    ob_clean();
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

ob_end_flush();
exit;
?>