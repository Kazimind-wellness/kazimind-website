<?php
require_once 'db.php'; // $pdo available

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ Invalid email address.";
        exit;
    }

    try {
        if ($dbType === 'mysql') {
            // MySQL: insert or update
            $stmt = $pdo->prepare("
                INSERT INTO subscribers (email) VALUES (:email)
                ON DUPLICATE KEY UPDATE email = VALUES(email)
            ");
            $stmt->execute(['email' => $email]);
        } else {
            // PostgreSQL: insert or update
            $stmt = $pdo->prepare("
                INSERT INTO subscribers (email) VALUES (:email)
                ON CONFLICT (email) DO UPDATE SET email = EXCLUDED.email
            ");
            $stmt->execute(['email' => $email]);
        }

        echo "✅ Subscription added successfully!";
    } catch (PDOException $e) {
        echo "❌ Database error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
