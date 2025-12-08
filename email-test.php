<!DOCTYPE html>
<html>
<head>
    <title>Email Test with PHPMailer</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; }
        textarea { height: 150px; font-family: Arial, sans-serif; }
        .btn { background: #007bff; color: white; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%; }
        .btn:hover { background: #0056b3; }
        .message { padding: 15px; margin: 20px 0; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
        .folder-structure { background: #f8f9fa; padding: 15px; border-radius: 4px; margin: 20px 0; font-family: monospace; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📧 Email Test with PHPMailer</h2>
        
        <?php
        // Try to include PHPMailer
        $phpmailerLoaded = false;
        try {
            $path = __DIR__ . '/PHPMailer/src/PHPMailer.php';
            if (file_exists($path)) {
                require_once $path;
                require_once dirname($path) . '/SMTP.php';
                require_once dirname($path) . '/Exception.php';
                $phpmailerLoaded = true;
            } else {
                throw new Exception('PHPMailer files not found!');
            }
        } catch (Exception $e) {
            echo '<div class="error">❌ Error: ' . $e->getMessage() . '</div>';
        }
        
        // Only process form if PHPMailer is loaded
        if ($phpmailerLoaded && isset($_POST['submit'])) {
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
            // Validate inputs
            if (empty($to) || empty($subject) || empty($message)) {
                echo '<div class="error">❌ Please fill all fields!</div>';
            } else {
                // Create PHPMailer instance with full namespace
                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'abdullabalaamca@gmail.com';
                    $mail->Password = 'xnae stou zjvv bgec'; // REPLACE WITH YOUR APP PASSWORD
                    $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    
                    // Optional debugging
                    // $mail->SMTPDebug = 2; // Enable for detailed debug output
                    
                    // Recipients
                    $mail->setFrom('abdullabalaamca@gmail.com', 'Abdull Madaki');
                    $mail->addAddress($to);
                    $mail->addReplyTo('abdullabalaamca@gmail.com', 'Abdull Madaki');
                    
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = '<html><body>' . nl2br(htmlspecialchars($message)) . '</body></html>';
                    $mail->AltBody = strip_tags($message); // Plain text fallback
                    
                    $mail->send();
                    echo '<div class="success">✅ Email sent successfully to ' . htmlspecialchars($to) . '!</div>';
                    
                } catch (\PHPMailer\PHPMailer\Exception $e) {
                    echo '<div class="error">❌ Mailer Error: ' . $e->getMessage() . '</div>';
                }
            }
        }
        ?>
        
        <hr>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="to">To Email:</label>
                <input type="email" id="to" name="to" required 
                       placeholder="recipient@example.com" value="test@example.com">
            </div>
            
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required 
                       placeholder="Email subject" value="Test Email from PHPMailer">
            </div>
            
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required 
                          placeholder="Type your message here...">This is a test email sent using PHPMailer from localhost.</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn">Send Email</button>
            </div>
        </form>
    </div>
</body>
</html>