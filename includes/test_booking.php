<?php
// includes/test_booking.php
ob_start();
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('POST method required');
    }

    ob_clean();
    
    // Simple test without external dependencies
    $test_data = [
        'full_name' => 'Test User',
        'email' => 'test@test.com',
        'phone' => '1234567890',
        'preferred_date' => date('Y-m-d'),
        'preferred_time' => '14:00'
    ];

    echo json_encode([
        'success' => true,
        'message' => 'Test successful',
        'data' => $test_data
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