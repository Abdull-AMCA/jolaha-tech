<?php

//////////////////////// SERVICE MODULE FUNCTIONS ////////////////////////
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

    $service_name = sanitize_input($_POST['service_name'] ?? '');
    $service_description = sanitize_input($_POST['service_description'] ?? '');
    $service_icon = sanitize_input($_POST['service_icon'] ?? '');
    $sub_services = $_POST['sub_services'] ?? [];

    if (empty($service_name)) {
        return ['success' => false, 'message' => 'Service name is required'];
    }

    try {
        $connection->beginTransaction();

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
        // First, get all active services
        $service_query = "SELECT * FROM services WHERE is_active = 1 ORDER BY service_name";
        $service_stmt = $connection->prepare($service_query);
        $service_stmt->execute();
        $services = $service_stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Then, for each service, get its sub-services
        $result = [];
        foreach ($services as $service) {
            $sub_service_query = "SELECT * FROM sub_services WHERE service_id = :service_id AND is_active = 1 ORDER BY sub_service_name";
            $sub_service_stmt = $connection->prepare($sub_service_query);
            $sub_service_stmt->execute([':service_id' => $service['id']]);
            $sub_services = $sub_service_stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $service['sub_services'] = $sub_services;
            $result[] = $service;
        }
        
        return $result;
        
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

    $service_name = sanitize_input($_POST['service_name'] ?? '');
    $service_description = sanitize_input($_POST['service_description'] ?? '');
    $service_icon = sanitize_input($_POST['service_icon'] ?? '');
    $sub_services = $_POST['sub_services'] ?? [];

    if (empty($service_name)) {
        return ['success' => false, 'message' => 'Service name is required'];
    }

    try {
        $connection->beginTransaction();

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

        $delete_sub_query = "UPDATE sub_services SET is_active = 0 WHERE service_id = :service_id";
        $delete_sub_stmt = $connection->prepare($delete_sub_query);
        $delete_sub_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $delete_sub_stmt->execute();

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



//////////////////////// PRODUCTS MODULE FUNCTIONS ////////////////////////
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

function insert_products() {
    global $connection; // PDO instance

    if (isset($_POST['submit'])) {
       
        $product_name = trim($_POST['product_name'] ?? '');
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

        if ($product_name === '') {
            
            echo "<script>showAlert('Product name should not be empty', 'error');</script>";
            return;
        }

        try {
            if ($product_id > 0) {
                // Update
                $stmt = $connection->prepare("
                    UPDATE products
                    SET product_name = :product_name
                    WHERE product_id = :product_id
                ");
                $stmt->execute([
                    ':product_name' => $product_name,
                    ':product_id'   => $product_id
                ]);

                $redirect_param = "updated=true";
                $success_message = "Product updated successfully!";
            } else {
                // Insert
                $stmt = $connection->prepare("
                    INSERT INTO products (product_name)
                    VALUES (:product_name)
                ");
                $stmt->execute([':product_name' => $product_name]);

                $redirect_param = "added=true";
                $success_message = "Product added successfully!";
            }

            
            $jsMessage = addslashes($success_message);

            echo "<script>
                    if (typeof showAlert === 'function') {
                        showAlert('{$jsMessage}', 'success');
                        setTimeout(function(){ window.location.href = 'products.php?{$redirect_param}'; }, 900);
                    } else {
                        // fallback
                        window.location.href = 'products.php?{$redirect_param}';
                    }
                  </script>";
            exit;

        } catch (PDOException $e) {
            $err = addslashes($e->getMessage());
            echo "<script>showAlert('Database error: {$err}', 'error');</script>";
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
               
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'message' => 'Product deleted successfully!']);
                } else {
                        header("Location: products.php?deleted=true");
                        exit;
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


//////////////////////////// SOLUTIONS MODULE FUNCTIONS ////////////////////////
// Function to count total solutions
function countSolutions() {
    global $connection;
    
    try {
        $stmt = $connection->query("SELECT COUNT(*) as total FROM solutions");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    } catch (PDOException $e) {
        error_log("Count solutions error: " . $e->getMessage());
        return 0;
    }
}

// Function to insert/update solutions
function insert_solutions() {
    global $connection; // PDO instance

    if (isset($_POST['submit'])) {
       
        $solution_name = trim($_POST['solution_name'] ?? '');
        $solution_id = isset($_POST['solution_id']) ? intval($_POST['solution_id']) : 0;

        if ($solution_name === '') {
           
            echo "<script>showAlert('Solution name should not be empty', 'error');</script>";
            return;
        }

        try {
            if ($solution_id > 0) {
                // Update
                $stmt = $connection->prepare("
                    UPDATE solutions
                    SET solution_name = :solution_name
                    WHERE solution_id = :solution_id
                ");
                $stmt->execute([
                    ':solution_name' => $solution_name,
                    ':solution_id'   => $solution_id
                ]);

                $redirect_param = "updated=true";
                $success_message = "Solution updated successfully!";
            } else {
                // Insert
                $stmt = $connection->prepare("
                    INSERT INTO solutions (solution_name)
                    VALUES (:solution_name)
                ");
                $stmt->execute([':solution_name' => $solution_name]);

                $redirect_param = "added=true";
                $success_message = "Solution added successfully!";
            }

            $jsMessage = addslashes($success_message);

            echo "<script>
                    if (typeof showAlert === 'function') {
                        showAlert('{$jsMessage}', 'success');
                        setTimeout(function(){ window.location.href = 'solutions.php?{$redirect_param}'; }, 900);
                    } else {
                        // fallback
                        window.location.href = 'solutions.php?{$redirect_param}';
                    }
                  </script>";
            exit;

        } catch (PDOException $e) {
            $err = addslashes($e->getMessage());
            echo "<script>showAlert('Database error: {$err}', 'error');</script>";
        }
    }
}

// Function to find all solutions
function findAllSolutions() {
    global $connection;

    try {
        $stmt = $connection->query("SELECT * FROM solutions ORDER BY solution_id DESC");
        $solutions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($solutions)) {
            echo '<tr><td colspan="3" class="text-center text-muted py-4">No solutions found. Add your first solution above.</td></tr>';
            return;
        }

        foreach ($solutions as $row) {
            $solution_id = htmlspecialchars($row['solution_id']);
            $solution_name = htmlspecialchars($row['solution_name']);

            echo "<tr>";
            echo "<td><strong>#{$solution_id}</strong></td>";
            echo "<td>{$solution_name}</td>";
            echo "<td>";
            echo "<div class='btn-group btn-group-sm'>";
            echo "<a href='solutions.php?edit={$solution_id}' class='btn btn-outline-primary' data-bs-toggle='tooltip' title='Edit Solution'>";
            echo "<i class='bi bi-pencil'></i>";
            echo "</a>";
            echo "<button type='button' class='btn btn-outline-danger delete-solution-btn' data-solution-id='{$solution_id}' data-solution-name='{$solution_name}' data-bs-toggle='tooltip' title='Delete Solution'>";
            echo "<i class='bi bi-trash'></i>";
            echo "</button>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }

    } catch (PDOException $e) {
        echo "<tr><td colspan='3' class='text-center text-danger py-4'>Error fetching solutions: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
}

// Function to delete a solution
function deleteSolution() {
    global $connection;

    if (isset($_GET['delete_solution'])) {
        $solution_id = intval($_GET['delete_solution']);

        try {
            $stmt = $connection->prepare("DELETE FROM solutions WHERE solution_id = :solution_id");
            $stmt->execute([':solution_id' => $solution_id]);

            if ($stmt->rowCount() > 0) {
            
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'message' => 'Solution deleted successfully!']);
                } else {
                        header("Location: solutions.php?deleted=true");
                        exit;
                }
            } else {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    echo json_encode(['success' => false, 'message' => 'No solution found to delete.']);
                } else {
                    echo "<script>
                        window.location.href = 'solutions.php?error=true';
                    </script>";
                }
            }
            exit;

        } catch (PDOException $e) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            } else {
                echo "<script>
                    window.location.href = 'solutions.php?error=true';
                </script>";
            }
            exit;
        }
    }
}

// Function to get solution by ID for editing
function getSolutionById($solution_id) {
    global $connection;

    try {
        $stmt = $connection->prepare("SELECT * FROM solutions WHERE solution_id = :solution_id");
        $stmt->execute([':solution_id' => intval($solution_id)]);
        $solution = $stmt->fetch(PDO::FETCH_ASSOC);

        return $solution ?: null;

    } catch (PDOException $e) {
        error_log("Error fetching solution by ID: " . $e->getMessage());
        return null;
    }
}


///////////////////////// POSTS MODULE FUNCTIONS ////////////////////////
// Create a new post
function insert_post($data) {
    global $connection;

    try {
        $query = "INSERT INTO posts (
            post_title, post_content, post_excerpt, post_category,
            selected_solution, selected_product, selected_service,
            post_author_name, post_status, post_image,
            meta_title, meta_description, meta_keywords,
            created_at, updated_at
        ) VALUES (
            :post_title, :post_content, :post_excerpt, :post_category,
            :selected_solution, :selected_product, :selected_service,
            :post_author_name, :post_status, :post_image,
            :meta_title, :meta_description, :meta_keywords,
            NOW(), NOW()
        )";

        $stmt = $connection->prepare($query);
        $stmt->execute([
            ':post_title' => $data['post_title'],
            ':post_content' => $data['post_content'],
            ':post_excerpt' => $data['post_excerpt'],
            ':post_category' => $data['post_category'],
            ':selected_solution' => $data['selected_solution'] ?? null,
            ':selected_product' => $data['selected_product'] ?? null,
            ':selected_service' => $data['selected_service'] ?? null,
            ':post_author_name' => $data['post_author_name'],
            ':post_status' => $data['post_status'],
            ':post_image' => $data['post_image'] ?? null,
            ':meta_title' => $data['meta_title'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords']
        ]);

        return [
            'success' => true,
            'message' => 'Post created successfully.'
        ];
    } catch (PDOException $e) {
        error_log("Insert Post Error: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Database error while creating post.'
        ];
    }
}

// Read all posts (with optional filters)
function get_all_posts($status = null) {
    global $connection;

    try {
        $query = "SELECT * FROM posts";
        if ($status) {
            $query .= " WHERE post_status = :status";
        }
        $query .= " ORDER BY created_at DESC";

        $stmt = $connection->prepare($query);
        if ($status) {
            $stmt->bindParam(':status', $status);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get All Posts Error: " . $e->getMessage());
        return [];
    }
}

// Read a single post by ID
function get_post_by_id($id) {
    global $connection;

    try {
        $stmt = $connection->prepare("SELECT * FROM posts WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Get Post Error: " . $e->getMessage());
        return null;
    }
}

// Update an existing post
function update_post($id, $data) {
    global $connection;

    try {
        $query = "UPDATE posts SET 
            post_title = :post_title,
            post_content = :post_content,
            post_excerpt = :post_excerpt,
            post_category = :post_category,
            selected_solution = :selected_solution,
            selected_product = :selected_product,
            selected_service = :selected_service,
            post_author_name = :post_author_name,
            post_status = :post_status,
            post_image = :post_image,
            meta_title = :meta_title,
            meta_description = :meta_description,
            meta_keywords = :meta_keywords,
            updated_at = NOW()
        WHERE id = :id";

        $stmt = $connection->prepare($query);
        $stmt->execute([
            ':post_title' => $data['post_title'],
            ':post_content' => $data['post_content'],
            ':post_excerpt' => $data['post_excerpt'],
            ':post_category' => $data['post_category'],
            ':selected_solution' => $data['selected_solution'] ?? null,
            ':selected_product' => $data['selected_product'] ?? null,
            ':selected_service' => $data['selected_service'] ?? null,
            ':post_author_name' => $data['post_author_name'],
            ':post_status' => $data['post_status'],
            ':post_image' => $data['post_image'],
            ':meta_title' => $data['meta_title'],
            ':meta_description' => $data['meta_description'],
            ':meta_keywords' => $data['meta_keywords'],
            ':id' => $id
        ]);

        return [
            'success' => true,
            'message' => 'Post updated successfully.'
        ];
    } catch (PDOException $e) {
        error_log("Update Post Error: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Database error while updating post.'
        ];
    }
}

// Delete a post
function delete_post($id) {
    global $connection;

    try {
        $stmt = $connection->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return [
            'success' => true,
            'message' => 'Post deleted successfully.'
        ];
    } catch (PDOException $e) {
        error_log("Delete Post Error: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Database error while deleting post.'
        ];
    }
}

?>