<?php
ob_start();
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';


require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['verify_code'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        $error = "An account with this email already exists.";
    } else {
        // Step 1: Generate and email verification code
        $verification_code = rand(100000, 999999);
        $_SESSION['pending_user'] = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'code' => $verification_code
        ];

        // Send email with PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change if needed
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USERNAME']; // your email
            $mail->Password = $_ENV['EMAIL_PASSWORD'];   // your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind Wellness');
            $mail->addAddress($email, $name);
            $mail->isHTML(true);
            $mail->Subject = 'Your Kazimind Verification Code';
            $mail->Body = "
                <p>Hi <b>$name</b>,</p>
                <p>Your Kazimind verification code is:</p>
                <h2 style='color:#2B6CB0;'>$verification_code</h2>
                <p>Enter this code on the registration page to verify your account.</p>
            ";

            $mail->send();
            $success = "A 6-digit verification code has been sent to your email. Please enter it below to complete registration.";
        } catch (Exception $e) {
            $error = "Verification email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    }
}

if (isset($_POST['verify_code'])) {
    $entered_code = trim($_POST['verification_code']);

    if (!isset($_SESSION['pending_user'])) {
        $error = "Your session expired or no pending registration found. Please register again.";
    } else {
        $pending = $_SESSION['pending_user'];
        if ($entered_code == $pending['code']) {
            try {
                $stmt = $pdo->prepare("INSERT INTO users (name, email, password, auth_provider) VALUES (?, ?, ?, ?)");
                $stmt->execute([$pending['name'], $pending['email'], $pending['password'], 'local']);
                unset($_SESSION['pending_user']);
                $_SESSION['user'] = [
                    'name' => $pending['name'],
                    'email' => $pending['email']
                ];
                header('Location: index.php');
                exit;
            } catch (Exception $e) {
                $error = "An error occurred while completing your registration. Please try again.";
            }
        } else {
            $error = "❌ Invalid verification code. Please try again later.";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Kazimind Wellness</title>
    <link rel="stylesheet" href="assets/css/register.min.css">
    <link rel="icon" type="image/png" href="images/icon_K.png">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="register-container">
    <div class="register-left">
        <div class="brand-section">
            <div class="logo-container">
                <img src="images/kazi-mind-high-resolution-logo-transparent.webp" loading="lazy" alt="">
            </div>
            <h1>CULTIVATE YOUR MIND</h1>
            <p>Begin your journey to mental wellness today</p>
        </div>
        <div class="illustration">
            <img src="images/watered_image.webp" loading="lazy" alt="Mental Wellness Journey">
        </div>
        <div class="features-list">
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <span>Secure & Private</span>
            </div>
            <div class="feature">
                <i class="fas fa-user-check"></i>
                <span>Personalized Experience</span>
            </div>
        </div>
    </div>
    
    <div class="register-right">
        <div class="register-box">
            <div class="form-header">
                <h2>Create Your Account</h2>
                <p class="form-subtitle">Join our wellness community</p>
            </div>

            <?php if (isset($error)) : ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" class="register-form">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="button" class="password-toggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="button" class="password-toggle">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <div class="password-strength">
                    <div class="strength-bar">
                        <div class="strength-fill" data-strength="0"></div>
                    </div>
                    <span class="strength-text">Password strength</span>
                </div>

                <button type="submit" class="register-btn">
                    <span class="btn-text">Create Account</span>
                    <div class="btn-loader">
                        <div class="loader-spinner"></div>
                    </div>
                </button>
            </form>

            <?php if (isset($success)) : ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <span><?= htmlspecialchars($success) ?></span>
                </div>

                <form method="POST" class="verification-form">
                    <div class="input-group">
                        <i class="fas fa-key"></i>
                        <input type="text" name="verification_code" placeholder="Enter 6-digit code" maxlength="6" required>
                    </div>
                    <button type="submit" name="verify_code" class="register-btn">
                        <span class="btn-text">Verify & Complete Registration</span>
                    </button>
                </form>
            <?php endif; ?>

            <div class="divider">
                <span>Already have an account?</span>
            </div>

            <a href="signin.php" class="signin-link">
                <i class="fas fa-sign-in-alt"></i>
                <span>Sign in to your account</span>
            </a>

            <div class="privacy-notice">
                <p>
                    <i class="fas fa-lock"></i>
                    By creating an account, you agree to our 
                    <a href="#">Privacy Policy</a> and 
                    <a href="#">Terms of Service</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password toggle functionality
    const toggleButtons = document.querySelectorAll('.password-toggle');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye';
            }
        });
    });

    // Password strength indicator
    const passwordInput = document.querySelector('input[name="password"]');
    const strengthFill = document.querySelector('.strength-fill');
    const strengthText = document.querySelector('.strength-text');

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        if (password.length >= 8) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 25;
        if (/[^A-Za-z0-9]/.test(password)) strength += 25;
        
        strengthFill.style.width = strength + '%';
        strengthFill.dataset.strength = strength;
        
        // Update colors and text
        if (strength < 50) {
            strengthFill.style.background = '#e53e3e';
            strengthText.textContent = 'Weak password';
        } else if (strength < 75) {
            strengthFill.style.background = '#dd6b20';
            strengthText.textContent = 'Medium password';
        } else {
            strengthFill.style.background = '#38a169';
            strengthText.textContent = 'Strong password';
        }
    });

    // Form submission loading state
    const form = document.querySelector('.register-form');
    const submitBtn = form.querySelector('.register-btn');
    
    form.addEventListener('submit', function() {
        submitBtn.classList.add('loading');
    });
});
</script>

</body>
</html>
