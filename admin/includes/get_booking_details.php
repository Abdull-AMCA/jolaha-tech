<?php
    // includes/get_booking_details.php

    // Start output buffering immediately
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
        
        // Get and validate booking ID
        $booking_id = intval($_GET['id']);
        
        if ($booking_id <= 0) {
            throw new Exception('Invalid booking ID');
        }
        
        // Get booking data
        $booking = get_call_booking_by_id($booking_id);
        
        if (!$booking) {
            throw new Exception('Booking not found');
        }
        
        // Return success with booking data
        echo json_encode([
            'success' => true,
            'booking' => $booking
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