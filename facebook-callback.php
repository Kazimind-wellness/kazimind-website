<?php
ob_start();
session_start();
require 'vendor/autoload.php';
require 'db.php';

use Dotenv\Dotenv;
use Facebook\Facebook;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$appId = $_ENV['FACEBOOK_APP_ID'];
$appSecret = $_ENV['FACEBOOK_APP_SECRET'];
$redirectUri = $_ENV['FACEBOOK_REDIRECT_URI'];

$fb = new Facebook([
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v20.0',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    if (!isset($_GET['code'])) {
        $permissions = ['email']; // Permissions to request
        $loginUrl = $helper->getLoginUrl($redirectUri, $permissions);
        header("Location: " . htmlspecialchars($loginUrl));
        exit;
    }

    // Get access token
    $accessToken = $helper->getAccessToken();

    if (!$accessToken) {
        throw new Exception("Failed to obtain access token");
    }

    // Get user profile
    $response = $fb->get('/me?fields=id,name,email,picture', $accessToken);
    $user = $response->getGraphUser();

    $email = $user->getEmail();
    $name = $user->getName();
    $facebookId = $user->getId();
    $picture = $user->getPicture()->getUrl();

    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $dbUser = $stmt->fetch();

    if (!$dbUser) {
        $stmt = $pdo->prepare("INSERT INTO users (auth_provider, facebook_id, name, email) VALUES (?, ?, ?, ?)");
        $stmt->execute(['facebook', $facebookId, $name, $email]);
    } elseif (empty($dbUser['facebook_id'])) {
        $stmt = $pdo->prepare("UPDATE users SET facebook_id = ?, auth_provider = ? WHERE email = ?");
        $stmt->execute([$facebookId, 'facebook', $email]);
    }

    // Retrieve updated user
    $stmt = $pdo->prepare("SELECT profile_photo FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $dbUser = $stmt->fetch();

    // Start session
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email,
        'auth_provider' => 'facebook',
        'picture' => $picture,
        'profile_photo' => $dbUser['profile_photo'] ?? null
    ];

    // Send login confirmation email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['EMAIL_USERNAME'];
        $mail->Password   = $_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Confirm Your Facebook Login';
        $mail->Body    = "
            <h2>Hi {$name},</h2>
            <p>You just logged into our website using your Facebook account.</p>
            <p>If this was you, no further action is needed.</p>
            <p>If this wasn't you, please <a href='mailto:kazimindwellness50@gmail.com'>contact support</a> immediately.</p>
            <br><small>This is an automated email.</small>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
    }

    header("Location: index.php");
    exit;

} catch (Exception $e) {
    echo "<h3>Authentication Failed</h3>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    error_log("Facebook OAuth Error: " . $e->getMessage());
    exit;
}
?>
