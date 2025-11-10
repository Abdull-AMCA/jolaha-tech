<?php
//////////////////////// SERVICE MODULE FUNCTIONS ////////////////////////

// ========== UTILITY ==========
function sanitize_input($data) {
    if (is_array($data)) return array_map('sanitize_input', $data);
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// ========== CREATE ==========
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

        $stmt = $connection->prepare("
            INSERT INTO services (service_name, service_description, service_icon) 
            VALUES (:service_name, :service_description, :service_icon)
        ");
        $stmt->execute([
            ':service_name' => $service_name,
            ':service_description' => $service_description,
            ':service_icon' => $service_icon
        ]);

        $service_id = $connection->lastInsertId();

        if (!empty($sub_services)) {
            $sub_stmt = $connection->prepare("
                INSERT INTO sub_services (service_id, sub_service_name, sub_service_description)
                VALUES (:service_id, :name, :description)
            ");
            foreach ($sub_services as $sub) {
                $name = trim($sub['name'] ?? '');
                $desc = trim($sub['description'] ?? '');
                if (!empty($name)) {
                    $sub_stmt->execute([
                        ':service_id' => $service_id,
                        ':name' => $name,
                        ':description' => $desc
                    ]);
                }
            }
        }

        $connection->commit();
        return ['success' => true, 'message' => 'Service added successfully!'];
    } catch (Exception $e) {
        $connection->rollBack();
        error_log('Service addition error: ' . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to add service.'];
    }
}

// ========== READ ==========
function get_all_services_with_subservices() {
    global $connection;

    try {
        // Get all active services
        $stmt = $connection->prepare("
            SELECT id, service_name, service_description, service_icon, created_at 
            FROM services 
            WHERE is_active = 1 
            ORDER BY created_at DESC
        ");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get sub-services for each service
        foreach ($services as &$service) {
            $sub_stmt = $connection->prepare("
                SELECT id, sub_service_name, sub_service_description 
                FROM sub_services 
                WHERE service_id = :service_id AND is_active = 1
                ORDER BY sub_service_name
            ");
            $sub_stmt->execute([':service_id' => $service['id']]);
            $service['sub_services'] = $sub_stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $services;
    } catch (PDOException $e) {
        error_log('Get services with subservices error: ' . $e->getMessage());
        return [];
    }
}

// Get service by ID for editing
function get_service_by_id($service_id) {
    global $connection;

    try {
        // Step 1: Fetch the main service record
        $query_service = "
            SELECT 
                id,
                service_name,
                service_description,
                service_icon,
                is_active,
                created_at,
                updated_at
            FROM services
            WHERE id = :service_id
            LIMIT 1
        ";

        $stmt = $connection->prepare($query_service);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$service) {
            // No service found
            return null;
        }

        // Step 2: Fetch sub-services for this service (if any)
        $query_sub = "
            SELECT 
                id,
                sub_service_name,
                sub_service_description,
                is_active,
                created_at,
                updated_at
            FROM sub_services
            WHERE service_id = :service_id
            ORDER BY sub_service_name ASC
        ";

        $stmt_sub = $connection->prepare($query_sub);
        $stmt_sub->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $stmt_sub->execute();
        $sub_services = $stmt_sub->fetchAll(PDO::FETCH_ASSOC);

        // Step 3: Attach sub-services to main service array
        $service['sub_services'] = [];
        foreach ($sub_services as $sub) {
            $service['sub_services'][] = [
                'id' => $sub['id'],
                'name' => $sub['sub_service_name'],
                'description' => $sub['sub_service_description'],
                'is_active' => $sub['is_active'],
                'created_at' => $sub['created_at'],
                'updated_at' => $sub['updated_at']
            ];
        }

        return $service;

    } catch (PDOException $e) {
        error_log("Error fetching service by ID: " . $e->getMessage());
        return null;
    }
}

// Handle Service Update
function handle_service_update($service_id) {
    global $connection;

    try {
        $connection->beginTransaction();

        // 1️⃣ Update the main service
        $sql_service = "
            UPDATE services 
            SET service_name = :name, 
                service_description = :description, 
                service_icon = :icon, 
                updated_at = NOW()
            WHERE id = :id
        ";

        $stmt = $connection->prepare($sql_service);
        $stmt->execute([
            ':name' => $_POST['service_name'] ?? '',
            ':description' => $_POST['service_description'] ?? '',
            ':icon' => $_POST['service_icon'] ?? '',
            ':id' => $service_id
        ]);

        // 2️⃣ Handle sub-services (update or insert)
        $sub_services = $_POST['sub_services'] ?? [];

        // Fetch existing sub_service IDs for this service
        $stmt_ids = $connection->prepare("SELECT id FROM sub_services WHERE service_id = :sid");
        $stmt_ids->execute([':sid' => $service_id]);
        $existing_ids = $stmt_ids->fetchAll(PDO::FETCH_COLUMN);

        $updated_ids = [];

        foreach ($sub_services as $sub) {
            $name = trim($sub['name'] ?? '');
            $description = trim($sub['description'] ?? '');
            $sub_id = $sub['id'] ?? null;

            // Skip empty rows
            if ($name === '') continue;

            if ($sub_id && in_array($sub_id, $existing_ids)) {
                // Update existing sub-service
                $update_sql = "
                    UPDATE sub_services 
                    SET sub_service_name = :name, 
                        sub_service_description = :description,
                        is_active = 1,
                        updated_at = NOW()
                    WHERE id = :id
                ";
                $stmt_sub = $connection->prepare($update_sql);
                $stmt_sub->execute([
                    ':name' => $name,
                    ':description' => $description,
                    ':id' => $sub_id
                ]);
                $updated_ids[] = $sub_id;
            } else {
                // Insert new sub-service
                $insert_sql = "
                    INSERT INTO sub_services (service_id, sub_service_name, sub_service_description, is_active, created_at, updated_at)
                    VALUES (:service_id, :name, :description, 1, NOW(), NOW())
                ";
                $stmt_sub = $connection->prepare($insert_sql);
                $stmt_sub->execute([
                    ':service_id' => $service_id,
                    ':name' => $name,
                    ':description' => $description
                ]);
            }
        }

        // 3️⃣ Mark removed sub-services as inactive
        if (!empty($existing_ids)) {
            $inactive_ids = array_diff($existing_ids, $updated_ids);
            if (!empty($inactive_ids)) {
                $placeholders = implode(',', array_fill(0, count($inactive_ids), '?'));
                $deactivate_sql = "UPDATE sub_services SET is_active = 0 WHERE id IN ($placeholders)";
                $stmt_deactivate = $connection->prepare($deactivate_sql);
                $stmt_deactivate->execute($inactive_ids);
            }
        }

        $connection->commit();

        return [
            'success' => true,
            'message' => 'Service and sub-services updated successfully.'
        ];

    } catch (PDOException $e) {
        $connection->rollBack();
        error_log("Service update failed: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Failed to update service. Please try again.'
        ];
    }
}

// Handle Service Deletion
function handle_service_deletion($service_id) {
    global $connection;

    try {
        $connection->beginTransaction();

        // Soft delete main service
        $stmt = $connection->prepare("
            UPDATE services 
            SET is_active = 0, updated_at = NOW() 
            WHERE id = :service_id
        ");
        $stmt->execute([':service_id' => $service_id]);

        // Soft delete all related sub-services
        $sub_stmt = $connection->prepare("
            UPDATE sub_services 
            SET is_active = 0, updated_at = NOW() 
            WHERE service_id = :service_id
        ");
        $sub_stmt->execute([':service_id' => $service_id]);

        $connection->commit();

        return [
            'success' => true,
            'message' => 'Service and its sub-services were deleted successfully.'
        ];
    } catch (Exception $e) {
        $connection->rollBack();
        error_log('Delete service error: ' . $e->getMessage());
        return [
            'success' => false,
            'message' => 'An error occurred while deleting the service.'
        ];
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


///////////////////////// CAREERS CRUD FUNCTIONS /////////////////////////

// Add new career
function add_career($job_title, $job_description, $location, $employment_type, $joining_date) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            INSERT INTO careers (job_title, job_description, location, employment_type, joining_date) 
            VALUES (:job_title, :job_description, :location, :employment_type, :joining_date)
        ");
        
        $stmt->execute([
            ':job_title' => $job_title,
            ':job_description' => $job_description,
            ':location' => $location,
            ':employment_type' => $employment_type,
            ':joining_date' => $joining_date
        ]);
        
        return [
            'success' => true,
            'message' => 'Career posting added successfully!',
            'job_id' => $connection->lastInsertId()
        ];
    } catch (Exception $e) {
        error_log('Add career error: ' . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Error adding career posting: ' . $e->getMessage()
        ];
    }
}

// Get all careers
function get_all_careers($active_only = true) {
    global $connection;
    
    try {
        $sql = "SELECT * FROM careers";
        if ($active_only) {
            $sql .= " WHERE is_active = 1";
        }
        $sql .= " ORDER BY posted_date DESC";
        
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get careers error: ' . $e->getMessage());
        return [];
    }
}

// Get career by ID
function get_career_by_id($job_id) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("SELECT * FROM careers WHERE job_id = :job_id");
        $stmt->execute([':job_id' => $job_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get career by ID error: ' . $e->getMessage());
        return false;
    }
}

// Update career
function update_career($job_id, $job_title, $job_description, $location, $employment_type, $joining_date) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            UPDATE careers 
            SET job_title = :job_title, 
                job_description = :job_description, 
                location = :location, 
                employment_type = :employment_type, 
                joining_date = :joining_date,
                updated_at = NOW()
            WHERE job_id = :job_id
        ");
        
        $stmt->execute([
            ':job_id' => $job_id,
            ':job_title' => $job_title,
            ':job_description' => $job_description,
            ':location' => $location,
            ':employment_type' => $employment_type,
            ':joining_date' => $joining_date
        ]);
        
        return [
            'success' => true,
            'message' => 'Career posting updated successfully!'
        ];
    } catch (Exception $e) {
        error_log('Update career error: ' . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Error updating career posting: ' . $e->getMessage()
        ];
    }
}

// Delete career (soft delete)
function delete_career($job_id) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            UPDATE careers 
            SET is_active = 0, updated_at = NOW() 
            WHERE job_id = :job_id
        ");
        
        $stmt->execute([':job_id' => $job_id]);
        
        return [
            'success' => true,
            'message' => 'Career posting deleted successfully!'
        ];
    } catch (Exception $e) {
        error_log('Delete career error: ' . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Error deleting career posting: ' . $e->getMessage()
        ];
    }
}

///////////////////////// SERVICE INQUIRIES FUNCTIONS /////////////////////////

// Get all service inquiries
function get_all_service_inquiries() {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            SELECT * FROM service_inquiries 
            ORDER BY submitted_at DESC
        ");
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get service inquiries error: ' . $e->getMessage());
        return [];
    }
}

// Get service inquiry by ID
function get_service_inquiry_by_id($inquiry_id) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("SELECT * FROM service_inquiries WHERE id = :id");
        $stmt->execute([':id' => $inquiry_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get service inquiry by ID error: ' . $e->getMessage());
        return false;
    }
}



// ========== CALL BOOKINGS FUNCTIONS ==========

// Get all call bookings
function get_all_call_bookings($status = null) {
    global $connection;
    
    try {
        $sql = "SELECT * FROM call_bookings";
        if ($status) {
            $sql .= " WHERE status = :status";
        }
        $sql .= " ORDER BY submitted_at DESC";
        
        $stmt = $connection->prepare($sql);
        
        if ($status) {
            $stmt->execute([':status' => $status]);
        } else {
            $stmt->execute();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get call bookings error: ' . $e->getMessage());
        return [];
    }
}

// Get call booking by ID
function get_call_booking_by_id($booking_id) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("SELECT * FROM call_bookings WHERE id = :id");
        $stmt->execute([':id' => $booking_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Get call booking by ID error: ' . $e->getMessage());
        return false;
    }
}

// Update call booking status
function update_call_booking_status($booking_id, $status) {
    global $connection;
    
    try {
        $stmt = $connection->prepare("
            UPDATE call_bookings 
            SET status = :status, updated_at = NOW() 
            WHERE id = :id
        ");
        
        $stmt->execute([
            ':id' => $booking_id,
            ':status' => $status
        ]);
        
        return [
            'success' => true,
            'message' => 'Call booking status updated successfully!'
        ];
    } catch (Exception $e) {
        error_log('Update call booking status error: ' . $e->getMessage());
        return [
            'success' => false,
            'message' => 'Error updating call booking status: ' . $e->getMessage()
        ];
    }
}

?>