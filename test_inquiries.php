<?php
// test_inquiries.php
require_once 'includes/database.php';
require_once 'admin/includes/admin-functions.php';

header('Content-Type: text/plain');

echo "Testing service inquiries:\n\n";

// Test database connection
if (!$connection) {
    echo "Database connection failed\n";
    exit;
}

// Check if table exists
try {
    $stmt = $connection->query("SHOW TABLES LIKE 'service_inquiries'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Table 'service_inquiries' exists\n";
    } else {
        echo "✗ Table 'service_inquiries' does not exist\n";
        exit;
    }
} catch (Exception $e) {
    echo "✗ Error checking table: " . $e->getMessage() . "\n";
    exit;
}

// Count records
try {
    $stmt = $connection->query("SELECT COUNT(*) as count FROM service_inquiries");
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "✓ Total inquiries: " . $count['count'] . "\n";
} catch (Exception $e) {
    echo "✗ Error counting records: " . $e->getMessage() . "\n";
}

// List all inquiry IDs
try {
    $stmt = $connection->query("SELECT id FROM service_inquiries ORDER BY id");
    $inquiries = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "✓ Available inquiry IDs: " . implode(', ', $inquiries) . "\n";
} catch (Exception $e) {
    echo "✗ Error fetching IDs: " . $e->getMessage() . "\n";
}

// Test the function
if (function_exists('get_service_inquiry_by_id')) {
    echo "✓ Function 'get_service_inquiry_by_id' exists\n";
    
    // Test with first available ID
    if (!empty($inquiries)) {
        $test_id = $inquiries[0];
        $inquiry = get_service_inquiry_by_id($test_id);
        if ($inquiry) {
            echo "✓ Function works - found inquiry #$test_id\n";
        } else {
            echo "✗ Function returned false for ID #$test_id\n";
        }
    }
} else {
    echo "✗ Function 'get_service_inquiry_by_id' does not exist\n";
}
?>