<?php
// delete_sub_service.php
require_once '../../includes/database.php';

header('Content-Type: application/json');

$sub_service_id = $_POST['sub_service_id'] ?? null;
if (!$sub_service_id) {
    echo json_encode(['success' => false, 'message' => 'No sub-service ID provided.']);
    exit;
}

try {
    $query = "UPDATE sub_services SET is_active = 0 WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $sub_service_id, PDO::PARAM_INT);
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Sub-service deleted successfully.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Failed to delete sub-service.']);
}
?>