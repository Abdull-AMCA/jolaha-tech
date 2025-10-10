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

// PRODUCTS MODULE FUNCTIONS
// Function to count total products
function countProducts() {
    global $connection;
    
    try {
        $stmt = $connection->query("SELECT COUNT(*) as total FROM products");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    } catch (PDOException $e) {
        error_log("Count products error: " . $e->getMessage());
        return 0;
    }
}

// Function to insert/update products
function insert_products() {
    global $connection;

    if (isset($_POST['submit'])) {
        // Sanitize input safely using trim and htmlspecialchars
        $product_name = trim($_POST['product_name'] ?? '');
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

        if ($product_name === '') {
            echo "<script>showAlert('Product name should not be empty', 'error');</script>";
            return;
        }

        try {
            if ($product_id > 0) {
                // Update existing product
                $stmt = $connection->prepare("
                    UPDATE products 
                    SET product_name = :product_name 
                    WHERE product_id = :product_id
                ");
                $stmt->execute([
                    ':product_name' => $product_name,
                    ':product_id' => $product_id
                ]);

                $redirect_param = "updated=true";
                $success_message = "Product updated successfully!";
            } else {
                // Insert new product
                $stmt = $connection->prepare("
                    INSERT INTO products (product_name) 
                    VALUES (:product_name)
                ");
                $stmt->execute([':product_name' => $product_name]);

                $redirect_param = "added=true";
                $success_message = "Product added successfully!";
            }

            // If query succeeds
            echo "<script>
                showAlert('{$success_message}', 'success');
                window.location.href = 'products.php?{$redirect_param}';
            </script>";

        } catch (PDOException $e) {
            echo "<script>
                showAlert('Database error: " . addslashes($e->getMessage()) . "', 'error');
            </script>";
        }
    }
}

// Function to find all products
function findAllProducts() {
    global $connection;

    try {
        $stmt = $connection->query("SELECT * FROM products ORDER BY product_id DESC");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($products)) {
            echo '<tr><td colspan="3" class="text-center text-muted py-4">No products found. Add your first product above.</td></tr>';
            return;
        }

        foreach ($products as $row) {
            $product_id = htmlspecialchars($row['product_id']);
            $product_name = htmlspecialchars($row['product_name']);

            echo "<tr>";
            echo "<td><strong>#{$product_id}</strong></td>";
            echo "<td>{$product_name}</td>";
            echo "<td>";
            echo "<div class='btn-group btn-group-sm'>";
            echo "<a href='products.php?edit={$product_id}' class='btn btn-outline-primary' data-bs-toggle='tooltip' title='Edit Product'>";
            echo "<i class='bi bi-pencil'></i>";
            echo "</a>";
            echo "<button type='button' class='btn btn-outline-danger delete-product-btn' data-product-id='{$product_id}' data-product-name='{$product_name}' data-bs-toggle='tooltip' title='Delete Product'>";
            echo "<i class='bi bi-trash'></i>";
            echo "</button>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }

    } catch (PDOException $e) {
        echo "<tr><td colspan='3' class='text-center text-danger py-4'>Error fetching products: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

// Function to delete a product
function deleteProduct() {
    global $connection;

    if (isset($_GET['delete_product'])) {
        $product_id = intval($_GET['delete_product']);

        try {
            $stmt = $connection->prepare("DELETE FROM products WHERE product_id = :product_id");
            $stmt->execute([':product_id' => $product_id]);

            if ($stmt->rowCount() > 0) {
                // Return JSON response for AJAX
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'message' => 'Product deleted successfully!']);
                } else {
                    echo "<script>
                        window.location.href = 'products.php?deleted=true';
                    </script>";
                }
            } else {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    echo json_encode(['success' => false, 'message' => 'No product found to delete.']);
                } else {
                    echo "<script>
                        window.location.href = 'products.php?error=true';
                    </script>";
                }
            }
            exit;

        } catch (PDOException $e) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            } else {
                echo "<script>
                    window.location.href = 'products.php?error=true';
                </script>";
            }
            exit;
        }
    }
}

// Function to get product by ID for editing
function getProductById($product_id) {
    global $connection;

    try {
        $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = :product_id");
        $stmt->execute([':product_id' => intval($product_id)]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product ?: null;

    } catch (PDOException $e) {
        error_log("Error fetching product by ID: " . $e->getMessage());
        return null;
    }
}
?>