<?php
require_once 'config.php';
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'])) {
    $service_id = intval($_POST['service_id']);
    
    if ($service_id > 0) {
        $result = handle_service_deletion($service_id);
        echo json_encode($result);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid service ID.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
