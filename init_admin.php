<?php
require 'db.php';

$username = 'kazimind admin';
$password = 'secure123';
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO admin_users (username, password_hash) VALUES (?, ?)");
$stmt->execute([$username, $hash]);

echo "Admin inserted successfully. Delete or rename this file after use.";
?>
