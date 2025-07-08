<?php
ob_start();
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <h2>Login</h2>

        <?php if (isset($error)) : ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- <div class="google-signin">
            <div id="g_id_onload"></div>
            <div class="g_id_signin" data-type="standard"></div>
        </div> -->

        

        <a href="google-callback.php">
            <img style="height: 6rem; width: 100%;" src="https://app.getbeamer.com/pictures?id=78777-77-9Fu-_ve-_ve-_vXhFKyEyBykT77-9V1hJ77-9YVI077-977-977-9MQRd77-977-9AHHvv70.&v=4" alt="">
        </a>

        <p class="switch-link">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>

</body>
</html>
