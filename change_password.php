<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
$stmt->execute(['kazimind admin']);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if (!password_verify($current, $user['password_hash'])) {
        die("❌ Current password is incorrect.");
    }

    if ($new !== $confirm) {
        die("❌ New passwords do not match.");
    }

    $newHash = password_hash($new, PASSWORD_DEFAULT);
    $update = $pdo->prepare("UPDATE admin_users SET password_hash = ? WHERE username = ?");
    $update->execute([$newHash, 'kazimind admin']);

    echo "✅ Password updated. <a href='admin.php'>Back</a>";
}
?>
