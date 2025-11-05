<?php
// includes/get_inquiry_details.php - CLEAN VERSION

// Start output buffering immediately - NO SPACES BEFORE THIS
if (ob_get_level()) ob_end_clean();
ob_start();

// Set JSON header
header('Content-Type: application/json');

// Only process GET requests with ID parameter
if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['id'])) {
    ob_clean();
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    ob_end_flush();
    exit;
}

try {
    // Clean any previous output
    ob_clean();
    
    // Include required files
    $root_dir = dirname(__DIR__);
    require_once $root_dir . '/includes/database.php';
    require_once $root_dir . '/includes/admin-functions.php';
    
    // Get and validate inquiry ID
    $inquiry_id = intval($_GET['id']);
    
    if ($inquiry_id <= 0) {
        throw new Exception('Invalid inquiry ID');
    }
    
    // Get inquiry data
    $inquiry = get_service_inquiry_by_id($inquiry_id);
    
    if (!$inquiry) {
        throw new Exception('Inquiry not found');
    }
    
    // Return success with inquiry data
    echo json_encode([
        'success' => true,
        'inquiry' => $inquiry
    ]);
    
} catch (Exception $e) {
    ob_clean();
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

// Clean output buffer and send
ob_end_flush();
exit;
?>