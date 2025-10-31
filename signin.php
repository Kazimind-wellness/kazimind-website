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
    <title>Client Login | Kazimind Wellness</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <link rel="icon" type="image/png" href="images/icon_K.png">
</head>
<body>

<div class="login-container">
    <div class="login-left">
        <div class="brand-section">
            <div class="logo-container">
                <img src="images/kazi-mind-high-resolution-logo-transparent.png" alt="">
            </div>
            <h1>CULTIVATE YOUR MIND</h1>
            <p>Your journey to mental wellness begins here</p>
        </div>
        <div class="illustration">
            <img src="images/brainy_plant.jpeg" alt="Mental Wellness">
        </div>
    </div>
    
    <div class="login-right">
        <div class="login-box">
            <h2>Welcome</h2>
            <p class="login-subtitle">Sign in to your account</p>

            <?php if (isset($error)) : ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
                        <p class="switch-link">Don't have an account? <a href="register.php">Register here</a></p>
            <div class="divider">
                <span>or continue with</span>
            </div>
            
            <a href="google-callback.php" class="google-signin">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
                <span>Sign in with Google</span>
            </a>
            <!-- <a class="google-signin" id="fbLoginBtn">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDy_BNkPSR9l2X5I074rtb6j-z-i2Iz2yblw&s" alt="Google Logo">
                <span>Sign in with Facebook</span>
            </a> -->
            <script src="assets\js\fbLogin.js"></script>
            
            <div class="support-info">
                <p><i class="fas fa-shield-alt"></i> Your privacy and security are our priority</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
