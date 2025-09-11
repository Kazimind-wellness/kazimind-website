<?php
ob_start();
session_start();
require 'db.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Total users
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
// Total subscribers
$totalSubscribers = $pdo->query("
    SELECT COUNT(*) 
    FROM subscribers 
    WHERE unsubscribed = FALSE OR unsubscribed = 0
")->fetchColumn();



// Define "online" threshold (e.g., last 5 mins)
$threshold = date('Y-m-d H:i:s', time() - 300);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE last_active >= ?");
$stmt->execute([$threshold]);
$onlineUsers = $stmt->fetchColumn();

// Handle promotional email form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promo_subject'], $_POST['promo_message'])) {
    $subject = trim($_POST['promo_subject']);
    $body = nl2br(trim($_POST['promo_message']));

    // Get all active subscribers
    $stmt = $pdo->query("SELECT email FROM subscribers WHERE WHERE unsubscribed = FALSE OR unsubscribed = 0");
    $subscribers = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if ($subscribers) {
        foreach ($subscribers as $email) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $_ENV['EMAIL_USERNAME'];
                $mail->Password   = $_ENV['EMAIL_PASSWORD'];
                $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body . "<br><br><a href='{$_ENV['APP_URL']}/unsubscribe.php?email=" . urlencode($email) . "'>Unsubscribe</a>";

                $mail->send();
            } catch (Exception $e) {
                // Log error silently
                error_log("Mail to $email failed: " . $mail->ErrorInfo);
            }
        }
        $message = "<div class='message success'>✅ Promotional email sent to all subscribers.</div>";
    } else {
        $message = "<div class='message error'>⚠️ No active subscribers found.</div>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
</head>
<body>
<a href="#password-form-container" style="float:left; margin: 20px;">change password</a>
<a href="logout.php" style="float:right; margin: 20px;">Logout</a>

<div class="admin-container">

<div class="user-stats" style="margin-bottom: 2rem;">
    <h3>Platform Statistics</h3>
    <p><strong>Total Registered Users:</strong> <?= $totalUsers ?></p>
    <p><strong>Currently Online Users:</strong> <?= $onlineUsers ?></p>
    <p><strong>Total Subscribers:</strong> <?= $totalSubscribers ?></p>
</div>

 <?= $message ?>
    
</div>

    <div class="promo-form">
        <h3>Send Promotional Email</h3>
        <form method="POST">
            <input type="text" name="promo_subject" placeholder="Email Subject" required>
            <textarea name="promo_message" placeholder="Write your message here..." rows="6" required></textarea>
            <button type="submit">Send to Subscribers</button>
        </form>
    </div>

<div class="password-form-container" id="password-form-container">
    <h3>Change Password</h3>
    <form method="POST" action="change_password.php">
        <input type="password" name="current_password" placeholder="Current Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
        <button type="submit">Update Password</button>
    </form>
</div>


<!-- <script src="assets/js/adminscript.js"></script> -->
</body>
</html>



