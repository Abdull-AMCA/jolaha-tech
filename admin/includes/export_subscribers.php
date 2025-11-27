<?php
include 'database.php';

// Export function
function export_subscribers_to_csv() {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT email, subscription_date 
            FROM newsletter_subscribers
            ORDER BY subscription_date DESC
        ");
        $stmt->execute();
        $subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=newsletter_subscribers_' . date('Y-m-d') . '.csv');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Create output stream
        $output = fopen('php://output', 'w');
        
        // Add CSV headers
        fputcsv($output, ['Email', 'Subscription Date']);
        
        // Add data
        foreach ($subscribers as $subscriber) {
            fputcsv($output, [
                $subscriber['email'],
                date('Y-m-d H:i:s', strtotime($subscriber['subscription_date']))
            ]);
        }
        
        fclose($output);
        exit;
        
    } catch (PDOException $e) {
        error_log("Error exporting subscribers: " . $e->getMessage());
        die("Error generating CSV file. Please try again.");
    }
}

// Call the export function
export_subscribers_to_csv();
?>