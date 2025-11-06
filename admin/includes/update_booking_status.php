<?php
    // includes/update_booking_status.php

    // Start output buffering
    if (ob_get_level()) ob_end_clean();
    ob_start();

    // Set JSON header
    header('Content-Type: application/json');

    // Only process POST requests
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        ob_clean();
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
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
        
        // Get and validate input
        $booking_id = intval($_POST['booking_id'] ?? 0);
        $status = trim($_POST['status'] ?? '');
        
        if ($booking_id <= 0) {
            throw new Exception('Invalid booking ID');
        }
        
        $allowed_statuses = ['pending', 'confirmed', 'cancelled'];
        if (!in_array($status, $allowed_statuses)) {
            throw new Exception('Invalid status');
        }
        
        // Update booking status
        $result = update_call_booking_status($booking_id, $status);
        
        echo json_encode($result);
        
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