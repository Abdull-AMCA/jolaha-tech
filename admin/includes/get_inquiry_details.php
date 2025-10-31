<?php
include __DIR__ . '/admin-functions.php';
include __DIR__ . '/database.php';

error_log("Fetching inquiry details for ID: " . $_GET['id']);
header('Content-Type: application/json');

ob_clean(); // clear any accidental output

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $inquiry_id = intval($_GET['id']);
    
    if ($inquiry_id > 0) {
        $inquiry = get_service_inquiry_by_id($inquiry_id);
        if ($inquiry) {
            echo json_encode([
                'success' => true,
                'inquiry' => $inquiry
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Inquiry not found.'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid inquiry ID.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
}
exit;
?>
