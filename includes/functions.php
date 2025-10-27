<?php
require_once 'database.php';


// config/functions.php
require_once 'database.php';

// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Email configuration
define('SMTP_HOST', 'smtp.gmail.com'); // or your SMTP server
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your-email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
define('SMTP_FROM_EMAIL', 'noreply@jolaha.com');
define('SMTP_FROM_NAME', 'Jolaha Tech');

// Enhanced send_email function using PHPMailer
function send_email($to, $subject, $message, $attachments = []) {
    try {
        $mail = new PHPMailer(true);
        
        // Server settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        
        // Recipients
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress($to);
        $mail->addReplyTo(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message);
        
        // Attachments
        foreach ($attachments as $attachment) {
            $mail->addAttachment($attachment);
        }
        
        return $mail->send();
        
    } catch (Exception $e) {
        error_log("Email sending failed: " . $mail->ErrorInfo);
        return false;
    }
}

// Alternative: Simple PHP mail() function (less reliable)
function send_email_simple($to, $subject, $message) {
    $headers = "From: " . SMTP_FROM_NAME . " <" . SMTP_FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: " . SMTP_FROM_EMAIL . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    
    return mail($to, $subject, $message, $headers);
}


// Initialize session if not already started
if (session_status() == PHP_SESSION_NONE) {
// Invoking session_start() in header-navbar.php
}

// Sanitize input data
function sanitize_input($data) {
    if ($data === null) return '';
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
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
        return;
    }

    // Sanitize form data
    $full_name = sanitize_input(trim($_POST['full_name'] ?? ''));
    $email = sanitize_input(trim($_POST['email'] ?? ''));
    $company_name = sanitize_input(trim($_POST['company_name'] ?? ''));
    $service_type = sanitize_input(trim($_POST['service_type'] ?? ''));
    $project_type = sanitize_input(trim($_POST['project_type'] ?? ''));
    $budget_range = sanitize_input(trim($_POST['budget_range'] ?? ''));
    $timeline = sanitize_input(trim($_POST['timeline'] ?? ''));
    $description = sanitize_input(trim($_POST['description'] ?? ''));

    // Validate
    if (empty($full_name) || empty($email) || empty($service_type)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = new bootstrap.Modal(document.getElementById('serviceenqerrorModal'));
                document.getElementById('errorModalMessage').innerText = 'Please fill in all required fields.';
                modal.show();
            });
        </script>";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = new bootstrap.Modal(document.getElementById('serviceenqerrorModal'));
                document.getElementById('errorModalMessage').innerText = 'Please enter a valid email address.';
                modal.show();
            });
        </script>";
        return;
    }

    try {
        // Insert data into database
        $query = "INSERT INTO service_inquiries 
                  (service_type, full_name, email, company_name, project_type, budget_range, timeline, description)
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
            echo "<script>
                document.addEventListener('DOMContentLoaded', () => {
                    const modal = new bootstrap.Modal(document.getElementById('serviceenqsuccessModal'));
                    modal.show();
                });
            </script>";
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', () => {
                    const modal = new bootstrap.Modal(document.getElementById('serviceenqerrorModal'));
                    document.getElementById('errorModalMessage').innerText = 'Sorry, there was an error submitting your inquiry. Please try again.';
                    modal.show();
                });
            </script>";
        }

    } catch (PDOException $e) {
        error_log('Service Inquiry Error: ' . $e->getMessage());
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = new bootstrap.Modal(document.getElementById('serviceenqerrorModal'));
                document.getElementById('errorModalMessage').innerText = 'A server error occurred. Please try again later.';
                modal.show();
            });
        </script>";
    }
}


///////////////////////// FUNCTION TO HANDLE NEWSLETTER SUBSCRIPTION /////////////////////////
function handle_newsletter_subscription() {
    global $connection;

    try {
        // Validate input
        if (empty($_POST['name']) || empty($_POST['email'])) {
            return [
                'success' => false,
                'message' => 'Please provide both name and email.'
            ];
        }

        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Invalid email address.'
            ];
        }

        // Check if email already subscribed
        $checkStmt = $connection->prepare("SELECT id FROM newsletter_subscribers WHERE email = :email");
        $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            return [
                'success' => false,
                'message' => 'This email is already subscribed.'
            ];
        }

        // Insert subscriber
        $stmt = $connection->prepare("
            INSERT INTO newsletter_subscribers (name, email, subscription_date)
            VALUES (:name, :email, NOW())
        ");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return [
            'success' => true,
            'message' => 'Thank you for subscribing to our newsletter!'
        ];

    } catch (PDOException $e) {
        error_log("Newsletter subscription error: " . $e->getMessage());
        return [
            'success' => false,
            'message' => 'An error occurred while processing your subscription. Please try again later.'
        ];
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