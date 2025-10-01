<?php
require_once 'database.php';

// Initialize session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sanitize input data
function sanitize_input($data) {
    if ($data === null) return '';
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Send email function
function send_email($to, $subject, $message, $headers = '') {
    if (empty($headers)) {
        $headers = "From: no-reply@jolaha.com\r\n";
        $headers .= "Reply-To: no-reply@jolaha.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    }
    return mail($to, $subject, $message, $headers);
}

// Generate random token
function generate_token($length = 32) {
    return bin2hex(random_bytes($length));
}

// Redirect function
function redirect($url) {
    header("Location: " . $url);
    exit();
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Check if user is admin
function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Handle contact form submission
function handle_contact_submission() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    // Get and sanitize form data
    $name = sanitize_input($_POST['name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $company = sanitize_input($_POST['company'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $service = sanitize_input($_POST['service'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        return ['success' => false, 'message' => 'Please fill in all required fields'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Please provide a valid email address'];
    }

    try {
        // Insert into database
        $query = "INSERT INTO contact_submissions (name, email, company, phone, service_type, message) 
                  VALUES (:name, :email, :company, :phone, :service_type, :message)";
        
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':service_type', $service);
        $stmt->bindParam(':message', $message);
        
        if ($stmt->execute()) {
            // Send notification email
            $admin_email = "info@jolaha.com";
            $email_subject = "New Contact Form Submission - Jolaha Tech";
            $email_message = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Company:</strong> $company</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Service:</strong> $service</p>
            <p><strong>Message:</strong><br>$message</p>
            ";
            
            send_email($admin_email, $email_subject, $email_message);
            
            return ['success' => true, 'message' => 'Thank you for your message! We will get back to you soon.'];
        } else {
            return ['success' => false, 'message' => 'Sorry, there was an error submitting your message. Please try again.'];
        }
        
    } catch (PDOException $e) {
        error_log("Database error in handle_contact_submission: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred. Please try again later.'];
    }
}

// Handle product trial request
function handle_trial_request() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    // Get and sanitize form data
    $product_name = sanitize_input($_POST['product_name'] ?? '');
    $full_name = sanitize_input($_POST['full_name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $company_name = sanitize_input($_POST['company_name'] ?? '');
    $company_size = sanitize_input($_POST['company_size'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');

    // Validate required fields
    if (empty($product_name) || empty($full_name) || empty($email)) {
        return ['success' => false, 'message' => 'Please fill in all required fields'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Please provide a valid email address'];
    }

    try {
        // Insert into database
        $query = "INSERT INTO trial_requests (product_name, full_name, email, company_name, company_size, phone, message) 
                  VALUES (:product_name, :full_name, :email, :company_name, :company_size, :phone, :message)";
        
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':company_size', $company_size);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);
        
        if ($stmt->execute()) {
            // Send confirmation email to user
            $user_subject = "Jolaha Tech - Trial Request Received";
            $user_message = "
            <h2>Thank you for your trial request!</h2>
            <p>Dear $full_name,</p>
            <p>We have received your request for a trial of <strong>$product_name</strong>. Our team will contact you within 24 hours to set up your trial.</p>
            <p><strong>Request Details:</strong></p>
            <ul>
                <li><strong>Product:</strong> $product_name</li>
                <li><strong>Company:</strong> $company_name</li>
                <li><strong>Company Size:</strong> $company_size</li>
            </ul>
            <p>If you have any immediate questions, please don't hesitate to contact us at info@jolaha.com.</p>
            <p>Best regards,<br>Jolaha Tech Team</p>
            ";
            
            send_email($email, $user_subject, $user_message);
            
            // Send notification to admin
            $admin_email = "info@jolaha.com";
            $admin_subject = "New Trial Request - $product_name";
            $admin_message = "
            <h2>New Trial Request</h2>
            <p><strong>Product:</strong> $product_name</p>
            <p><strong>Name:</strong> $full_name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Company:</strong> $company_name</p>
            <p><strong>Company Size:</strong> $company_size</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong><br>$message</p>
            ";
            
            send_email($admin_email, $admin_subject, $admin_message);
            
            return ['success' => true, 'message' => 'Thank you for your trial request! We will contact you soon to set up your trial.'];
        } else {
            return ['success' => false, 'message' => 'Sorry, there was an error processing your request. Please try again.'];
        }
        
    } catch (PDOException $e) {
        error_log("Database error in handle_trial_request: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred. Please try again later.'];
    }
}

// Handle service inquiry
function handle_service_inquiry() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    // Get and sanitize form data
    $service_type = sanitize_input($_POST['service_type'] ?? '');
    $full_name = sanitize_input($_POST['full_name'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $company_name = sanitize_input($_POST['company_name'] ?? '');
    $project_type = sanitize_input($_POST['project_type'] ?? '');
    $budget_range = sanitize_input($_POST['budget_range'] ?? '');
    $timeline = sanitize_input($_POST['timeline'] ?? '');
    $description = sanitize_input($_POST['description'] ?? '');

    // Validate required fields
    if (empty($service_type) || empty($full_name) || empty($email)) {
        return ['success' => false, 'message' => 'Please fill in all required fields'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Please provide a valid email address'];
    }

    try {
        // Insert into database
        $query = "INSERT INTO service_inquiries (service_type, full_name, email, company_name, project_type, budget_range, timeline, description) 
                  VALUES (:service_type, :full_name, :email, :company_name, :project_type, :budget_range, :timeline, :description)";
        
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':service_type', $service_type);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->bindParam(':project_type', $project_type);
        $stmt->bindParam(':budget_range', $budget_range);
        $stmt->bindParam(':timeline', $timeline);
        $stmt->bindParam(':description', $description);
        
        if ($stmt->execute()) {
            // Send confirmation email to user
            $user_subject = "Jolaha Tech - Service Inquiry Received";
            $user_message = "
            <h2>Thank you for your service inquiry!</h2>
            <p>Dear $full_name,</p>
            <p>We have received your inquiry for <strong>$service_type</strong> services. Our team will review your requirements and get back to you within 24 hours with a detailed proposal.</p>
            <p><strong>Inquiry Details:</strong></p>
            <ul>
                <li><strong>Service:</strong> $service_type</li>
                <li><strong>Project Type:</strong> $project_type</li>
                <li><strong>Budget Range:</strong> $budget_range</li>
                <li><strong>Timeline:</strong> $timeline</li>
            </ul>
            <p>If you have any immediate questions, please contact us at info@jolaha.com.</p>
            <p>Best regards,<br>Jolaha Tech Team</p>
            ";
            
            send_email($email, $user_subject, $user_message);
            
            return ['success' => true, 'message' => 'Thank you for your inquiry! We will review your requirements and contact you soon.'];
        } else {
            return ['success' => false, 'message' => 'Sorry, there was an error processing your inquiry. Please try again.'];
        }
        
    } catch (PDOException $e) {
        error_log("Database error in handle_service_inquiry: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred. Please try again later.'];
    }
}

// Handle newsletter subscription
function handle_newsletter_subscription() {
    global $connection;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return ['success' => false, 'message' => 'Invalid request method'];
    }

    $email = sanitize_input($_POST['email'] ?? '');
    $name = sanitize_input($_POST['name'] ?? '');

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Please provide a valid email address'];
    }

    try {
        // Check if email already exists
        $check_query = "SELECT id FROM newsletter_subscriptions WHERE email = :email AND is_active = 1";
        $check_stmt = $connection->prepare($check_query);
        $check_stmt->bindParam(':email', $email);
        $check_stmt->execute();
        
        if ($check_stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'This email is already subscribed to our newsletter.'];
        }
        
        // Insert new subscription
        $query = "INSERT INTO newsletter_subscriptions (email, name) VALUES (:email, :name)";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        
        if ($stmt->execute()) {
            // Send welcome email
            $subject = "Welcome to Jolaha Tech Newsletter!";
            $message = "
            <h2>Welcome to Our Newsletter!</h2>
            <p>Thank you for subscribing to Jolaha Tech's newsletter. You'll now receive:</p>
            <ul>
                <li>Latest product updates and features</li>
                <li>Industry insights and best practices</li>
                <li>Exclusive offers and promotions</li>
                <li>Tips and tutorials for getting the most from our products</li>
            </ul>
            <p>If you ever wish to unsubscribe, you can do so at any time by clicking the unsubscribe link in our emails.</p>
            <p>Best regards,<br>Jolaha Tech Team</p>
            ";
            
            send_email($email, $subject, $message);
            
            return ['success' => true, 'message' => 'Thank you for subscribing to our newsletter!'];
        } else {
            return ['success' => false, 'message' => 'Sorry, there was an error subscribing. Please try again.'];
        }
        
    } catch (PDOException $e) {
        error_log("Database error in handle_newsletter_subscription: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error occurred. Please try again later.'];
    }
}

// Get contact submissions (for admin)
function get_contact_submissions($limit = 50) {
    global $connection;
    
    try {
        $query = "SELECT * FROM contact_submissions ORDER BY submitted_at DESC LIMIT :limit";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error in get_contact_submissions: " . $e->getMessage());
        return [];
    }
}

// Get trial requests (for admin)
function get_trial_requests($limit = 50) {
    global $connection;
    
    try {
        $query = "SELECT * FROM trial_requests ORDER BY requested_at DESC LIMIT :limit";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error in get_trial_requests: " . $e->getMessage());
        return [];
    }
}

// Get service inquiries (for admin)
function get_service_inquiries($limit = 50) {
    global $connection;
    
    try {
        $query = "SELECT * FROM service_inquiries ORDER BY submitted_at DESC LIMIT :limit";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error in get_service_inquiries: " . $e->getMessage());
        return [];
    }
}

// Update submission status (for admin)
function update_submission_status($table, $id, $status) {
    global $connection;
    
    try {
        $allowed_tables = ['contact_submissions', 'trial_requests', 'service_inquiries'];
        $allowed_statuses = ['new', 'read', 'replied', 'pending', 'contacted', 'completed', 'reviewing', 'quoted', 'closed'];
        
        if (!in_array($table, $allowed_tables) || !in_array($status, $allowed_statuses)) {
            return false;
        }
        
        $query = "UPDATE $table SET status = :status WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error in update_submission_status: " . $e->getMessage());
        return false;
    }
}

// User authentication functions
function login_user($username, $password) {
    global $connection;
    
    try {
        $query = "SELECT id, username, email, password_hash, role, full_name FROM users WHERE username = :username OR email = :username";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_username'] = $user['username'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_full_name'] = $user['full_name'];
                
                return true;
            }
        }
        
        return false;
    } catch (PDOException $e) {
        error_log("Database error in login_user: " . $e->getMessage());
        return false;
    }
}

function logout_user() {
    session_destroy();
    session_start();
}

function create_user($username, $email, $password, $full_name, $role = 'staff') {
    global $connection;
    
    try {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users (username, email, password_hash, full_name, role) 
                  VALUES (:username, :email, :password_hash, :full_name, :role)";
        
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $password_hash);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':role', $role);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Database error in create_user: " . $e->getMessage());
        return false;
    }
}
?>