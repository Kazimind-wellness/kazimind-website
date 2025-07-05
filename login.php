<?php
session_start();
require 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Incorrect username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f0f0; }
        .login-box { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; width: 300px; }
        .login-box input { width: 100%; margin: 10px 0; padding: 10px; }
        .login-box button { padding: 10px; width: 100%; background: #333; color: white; border: none; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    </form>
</div>
</body>
</html>
