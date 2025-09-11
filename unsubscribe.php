<?php
require 'db.php';

$email = $_GET['email'] ?? '';

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($dbType === 'pgsql') {
        $stmt = $pdo->prepare("UPDATE subscribers SET unsubscribed = TRUE WHERE email = ?");
    } else {
        $stmt = $pdo->prepare("UPDATE subscribers SET unsubscribed = 1 WHERE email = ?");
    }
    $stmt->execute([$email]);
    echo "✅ You have successfully unsubscribed from kazimind promotional emails.";
} else {
    echo "❌ Invalid unsubscribe request.";
}
