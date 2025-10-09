<?php

///////////// Add these functions to your existing functions.php file /////////////

// Handle service addition
// Sanitize input helper
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function handle_service_addition() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['add_service'])) {
        return ['success' => false, 'message' => 'Invalid request'];
    }

    // Get and sanitize form data
    $service_name = sanitize_input($_POST['service_name'] ?? '');
    $service_description = sanitize_input($_POST['service_description'] ?? '');
    $service_icon = sanitize_input($_POST['service_icon'] ?? '');
    $sub_services = $_POST['sub_services'] ?? [];

    // Validate required fields
    if (empty($service_name)) {
        return ['success' => false, 'message' => 'Service name is required'];
    }

    try {
        $connection->beginTransaction();

        // Insert main service
        $service_query = "INSERT INTO services (service_name, service_description, service_icon) 
                         VALUES (:service_name, :service_description, :service_icon)";
        
        $service_stmt = $connection->prepare($service_query);
        $service_stmt->bindParam(':service_name', $service_name);
        $service_stmt->bindParam(':service_description', $service_description);
        $service_stmt->bindParam(':service_icon', $service_icon);
        
        if (!$service_stmt->execute()) {
            throw new Exception('Failed to add service');
        }

        $service_id = $connection->lastInsertId();

        // Insert sub-services
        if (!empty($sub_services) && is_array($sub_services)) {
            $sub_service_query = "INSERT INTO sub_services (service_id, sub_service_name, sub_service_description) 
                                 VALUES (:service_id, :sub_service_name, :sub_service_description)";
            $sub_service_stmt = $connection->prepare($sub_service_query);
            foreach ($sub_services as $sub_service) {
                if (!empty(trim($sub_service['name']))) {
                    $sub_service_stmt->bindParam(':service_id', $service_id);
                    $sub_service_stmt->bindParam(':sub_service_name', $sub_service['name']);
                    $sub_service_stmt->bindParam(':sub_service_description', $sub_service['description']);
                    if (!$sub_service_stmt->execute()) {
                        throw new Exception('Failed to add sub-service');
                    }
                }
            }
        }

        $connection->commit();
        return ['success' => true, 'message' => 'Service added successfully!', 'service_id' => $service_id];

    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Service addition error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to add service. Please try again.'];
    }
}

// Get all services with their sub-services
function get_all_services_with_subservices() {
    global $connection;

    try {
        $query = "SELECT s.*, 
                         ss.id as sub_service_id, 
                         ss.sub_service_name, 
                         ss.sub_service_description, 
                         ss.price, 
                         ss.duration,
                         ss.is_active as sub_service_active
                  FROM services s
                  LEFT JOIN sub_services ss ON s.id = ss.service_id AND ss.is_active = 1
                  WHERE s.is_active = 1
                  ORDER BY s.service_name, ss.sub_service_name";
        
        $stmt = $connection->prepare($query);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $service_id = $row['id'];
            
            if (!isset($services[$service_id])) {
                $services[$service_id] = [
                    'id' => $row['id'],
                    'service_name' => $row['service_name'],
                    'service_description' => $row['service_description'],
                    'service_icon' => $row['service_icon'],
                    'created_at' => $row['created_at'],
                    'sub_services' => []
                ];
            }
            
            if ($row['sub_service_id']) {
                $services[$service_id]['sub_services'][] = [
                    'id' => $row['sub_service_id'],
                    'name' => $row['sub_service_name'],
                    'description' => $row['sub_service_description'],
                    'price' => $row['price'],
                    'duration' => $row['duration']
                ];
            }
        }
        
        return array_values($services);
        
    } catch (PDOException $e) {
        error_log("Get services error: " . $e->getMessage());
        return [];
    }
}

// Get service by ID for editing
function get_service_by_id($service_id) {
    global $connection;

    try {
        $query = "SELECT s.*, 
                         ss.id as sub_service_id, 
                         ss.sub_service_name, 
                         ss.sub_service_description, 
                         ss.price, 
                         ss.duration
                  FROM services s
                  LEFT JOIN sub_services ss ON s.id = ss.service_id AND ss.is_active = 1
                  WHERE s.id = :service_id AND s.is_active = 1
                  ORDER BY ss.sub_service_name";
        
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $service = null;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (!$service) {
                $service = [
                    'id' => $row['id'],
                    'service_name' => $row['service_name'],
                    'service_description' => $row['service_description'],
                    'service_icon' => $row['service_icon'],
                    'sub_services' => []
                ];
            }
            
            if ($row['sub_service_id']) {
                $service['sub_services'][] = [
                    'id' => $row['sub_service_id'],
                    'name' => $row['sub_service_name'],
                    'description' => $row['sub_service_description'],
                    'price' => $row['price'],
                    'duration' => $row['duration']
                ];
            }
        }
        
        return $service;
        
    } catch (PDOException $e) {
        error_log("Get service by ID error: " . $e->getMessage());
        return null;
    }
}

// Handle service update
function handle_service_update($service_id) {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['update_service'])) {
        return ['success' => false, 'message' => 'Invalid request'];
    }

    // Get and sanitize form data
    $service_name = sanitize_input($_POST['service_name'] ?? '');
    $service_description = sanitize_input($_POST['service_description'] ?? '');
    $service_icon = sanitize_input($_POST['service_icon'] ?? '');
    $sub_services = $_POST['sub_services'] ?? [];

    // Validate required fields
    if (empty($service_name)) {
        return ['success' => false, 'message' => 'Service name is required'];
    }

    try {
        $connection->beginTransaction();

        // Update main service
        $service_query = "UPDATE services 
                         SET service_name = :service_name, 
                             service_description = :service_description, 
                             service_icon = :service_icon,
                             updated_at = CURRENT_TIMESTAMP
                         WHERE id = :service_id";
        
        $service_stmt = $connection->prepare($service_query);
        $service_stmt->bindParam(':service_name', $service_name);
        $service_stmt->bindParam(':service_description', $service_description);
        $service_stmt->bindParam(':service_icon', $service_icon);
        $service_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        
        if (!$service_stmt->execute()) {
            throw new Exception('Failed to update service');
        }

        // Soft delete existing sub-services
        $delete_sub_query = "UPDATE sub_services SET is_active = 0 WHERE service_id = :service_id";
        $delete_sub_stmt = $connection->prepare($delete_sub_query);
        $delete_sub_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $delete_sub_stmt->execute();

        // Insert/update sub-services
        if (!empty($sub_services) && is_array($sub_services)) {
            $sub_service_query = "INSERT INTO sub_services (service_id, sub_service_name, sub_service_description) 
                                 VALUES (:service_id, :sub_service_name, :sub_service_description)";
            $sub_service_stmt = $connection->prepare($sub_service_query);
            foreach ($sub_services as $sub_service) {
                if (!empty(trim($sub_service['name']))) {
                    $sub_service_stmt->bindParam(':service_id', $service_id);
                    $sub_service_stmt->bindParam(':sub_service_name', $sub_service['name']);
                    $sub_service_stmt->bindParam(':sub_service_description', $sub_service['description']);
                    if (!$sub_service_stmt->execute()) {
                        throw new Exception('Failed to update sub-service');
                    }
                }
            }
        }

        $connection->commit();
        return ['success' => true, 'message' => 'Service updated successfully!'];

    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Service update error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to update service. Please try again.'];
    }
}

// Handle service deletion
function handle_service_deletion($service_id) {
    global $connection;

    try {
        $connection->beginTransaction();

        // Soft delete the service
        $service_query = "UPDATE services SET is_active = 0 WHERE id = :service_id";
        $service_stmt = $connection->prepare($service_query);
        $service_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        
        if (!$service_stmt->execute()) {
            throw new Exception('Failed to delete service');
        }

        // Soft delete associated sub-services
        $sub_service_query = "UPDATE sub_services SET is_active = 0 WHERE service_id = :service_id";
        $sub_service_stmt = $connection->prepare($sub_service_query);
        $sub_service_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $sub_service_stmt->execute();

        $connection->commit();
        return ['success' => true, 'message' => 'Service deleted successfully!'];

    } catch (Exception $e) {
        $connection->rollBack();
        error_log("Service deletion error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to delete service. Please try again.'];
    }
}


?>