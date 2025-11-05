<?php
putenv("SSL_CERT_FILE=C:\xampp\apache\bin\cacert.pem");

// ========================================================
// process_booking.php — Handles call booking submissions
// ========================================================

// Load Composer's PHPMailer autoloader
require_once __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Clean output buffer & enforce JSON response
if (ob_get_level()) ob_end_clean();
ob_start();
header('Content-Type: application/json; charset=utf-8');

// Log errors instead of displaying them
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../error_log.txt');

// Convert PHP warnings/notices into exceptions
set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

try {
    // Ensure POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method.');
    }

    // Load config (if exists)
    $configPath = __DIR__ . '/../config.php';
    if (file_exists($configPath)) {
        require_once $configPath;
    }

    // Default database credentials (if not defined in config.php)
    if (!defined('DB_HOST')) define('DB_HOST', '127.0.0.1');
    if (!defined('DB_USER')) define('DB_USER', 'root');
    if (!defined('DB_PASS')) define('DB_PASS', '');
    if (!defined('DB_NAME')) define('DB_NAME', 'jolaha');

    // Default email configuration (can override in config.php)
    if (!defined('ADMIN_EMAIL')) define('ADMIN_EMAIL', 'support1@amca.ae');
    if (!defined('SMTP_USER')) define('SMTP_USER', 'abdullabalaamca@gmail.com');
    if (!defined('SMTP_PASS')) define('SMTP_PASS', 'xnaestouzjvvbgec'); // Gmail App Password

    // ============================
    // Collect & sanitize input
    // ============================
    $full_name        = trim($_POST['full_name'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $company_name     = trim($_POST['company_name'] ?? '');
    $phone            = trim($_POST['phone'] ?? '');
    $preferred_date   = trim($_POST['preferred_date'] ?? '');
    $preferred_time   = trim($_POST['preferred_time'] ?? '');
    $additional_notes = trim($_POST['additional_notes'] ?? '');

    // Validate required fields
    if ($full_name === '' || $email === '') {
        throw new Exception('Please provide your full name and email.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Please enter a valid email address.');
    }

    // ============================
    // Database: insert record
    // ============================
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        throw new Exception('Database connection failed: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');

    // Create table if missing
    $createTable = "CREATE TABLE IF NOT EXISTS call_bookings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(200) NOT NULL,
        email VARCHAR(200) NOT NULL,
        company_name VARCHAR(200),
        phone VARCHAR(50),
        preferred_date DATE,
        preferred_time TIME,
        additional_notes TEXT,
        submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $mysqli->query($createTable);

    // Insert new record
    $stmt = $mysqli->prepare("
        INSERT INTO call_bookings 
        (full_name, email, company_name, phone, preferred_date, preferred_time, additional_notes)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        'sssssss',
        $full_name,
        $email,
        $company_name,
        $phone,
        $preferred_date,
        $preferred_time,
        $additional_notes
    );
    if (!$stmt->execute()) {
        throw new Exception('DB insert failed: ' . $stmt->error);
    }
    $booking_id = $stmt->insert_id;
    $stmt->close();
    $mysqli->close();

    // ============================
    // Send notification email
    // ============================
    $subject = "New Call Booking from {$full_name}";
    $body = "You have received a new call booking:\n\n";
    $body .= "Full Name: {$full_name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Company: " . ($company_name ?: '(none)') . "\n";
    $body .= "Phone: " . ($phone ?: '(none)') . "\n";
    $body .= "Preferred Date: " . ($preferred_date ?: '(none)') . "\n";
    $body .= "Preferred Time: " . ($preferred_time ?: '(none)') . "\n";
    $body .= "Additional Notes: " . ($additional_notes ?: '(none)') . "\n\n";
    $body .= "Booking ID: {$booking_id}\n";

    $email_sent = false;
    $email_error = null;

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => true,
                'verify_peer_name' => true,
                'allow_self_signed' => false,
                'cafile' => 'C:\xampp\apache\bin\cacert.pem',
            ],
        ];

        $mail->setFrom(SMTP_USER, 'Jolaha Booking');
        $mail->addAddress(ADMIN_EMAIL);
        $mail->addReplyTo($email, $full_name);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;

        $mail->send();
        $email_sent = true;

        $mail->SMTPDebug = 2;
$mail->Debugoutput = function($str, $level) {
    error_log("SMTP DEBUG: $str");
};

    } catch (Exception $e) {
        $email_error = 'PHPMailer error: ' . $e->getMessage();
        error_log($email_error);
    }

    // ============================
    // Return success response
    // ============================
    echo json_encode([
        'success' => true,
        'message' => 'Booking received successfully.',
        'booking_id' => $booking_id,
        'email_sent' => $email_sent,
        'email_error' => $email_error
    ]);
    ob_end_flush();
    exit;

} catch (Exception $e) {
    error_log("Booking error: " . $e->getMessage());
    ob_clean();
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    ob_end_flush();
    exit;
}
