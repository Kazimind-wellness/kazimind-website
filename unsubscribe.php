<?php
require 'db.php';

$email = $_GET['email'] ?? '';

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stmt = $pdo->prepare("UPDATE subscribers SET unsubscribed = TRUE WHERE email = ?");
    $stmt->execute([$email]);
    echo "✅ You have successfully unsubscribed from kazimind promotional emails.";
} else {
    echo "❌ Invalid unsubscribe request.";
}
