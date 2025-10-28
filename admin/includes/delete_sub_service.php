<?php
require_once 'database.php';
require_once 'admin_functions.php';
header('Content-Type: application/json');
ob_clean();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_service_id'])) {
    $id = intval($_POST['sub_service_id']);
    if ($id > 0) {
        $stmt = $connection->prepare("
            UPDATE sub_services 
            SET is_active = 0, updated_at = NOW()
            WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        echo json_encode(['success' => true, 'message' => 'Sub-service deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid sub-service ID.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
exit;
