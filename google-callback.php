<?php
session_start();
require 'vendor/autoload.php';
require 'db.php';

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load .env variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configure Google Client
$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope("email");
$client->addScope("profile");

$client->setHttpClient(new \GuzzleHttp\Client([
    'timeout' => 30,
    'verify' => false // Set to true in production
]));

if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
}

try {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!is_array($token) || isset($token['error'])) {
        throw new Exception("Google OAuth error: " . json_encode($token));
    }

    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Check if user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$userInfo->email]);
    $user = $stmt->fetch();

    if (!$user) {
        $stmt = $pdo->prepare("INSERT INTO users (auth_provider, google_id, name, email) VALUES (?, ?, ?, ?)");
        $stmt->execute(['google', $userInfo->id, $userInfo->name, $userInfo->email]);
    } elseif (empty($user['google_id'])) {
        $stmt = $pdo->prepare("UPDATE users SET google_id = ?, auth_provider = ? WHERE email = ?");
        $stmt->execute([$userInfo->id, 'google', $userInfo->email]);
    }

    $stmt = $pdo->prepare("SELECT profile_photo FROM users WHERE email = ?");
    $stmt->execute([$userInfo->email]);
    $dbUser = $stmt->fetch();

    $_SESSION['user'] = [
        'name' => $userInfo->name,
        'email' => $userInfo->email,
        'auth_provider' => 'google',
        'picture' => $userInfo->picture,
        'profile_photo' => $dbUser['profile_photo'] ?? null
    ];

    // Send confirmation email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Use your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PASSWORD']; // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
        $mail->addAddress($userInfo->email, $userInfo->name);

        $mail->isHTML(true);
        $mail->Subject = 'Confirm Your Login';
        $mail->Body    = "
            <h2>Hi {$userInfo->name},</h2>
            <p>You just logged into our website using your Google account.</p>
            <p>If this was you, no further action is needed.</p>
            <p>If this wasn't you, please <a href='mailto:support@yourdomain.com'>contact support</a> immediately.</p>
            <br><small>This is an automated email.</small>
        ";

        $mail->send();
        error_log("Confirmation email sent to: {$userInfo->email}");
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
    }

    header("Location: index.php");
    exit;

} catch (Exception $e) {
    echo "<h3>Authentication Failed</h3>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<pre>";
    echo "Google Client ID: " . GOOGLE_CLIENT_ID . "\n";
    echo "Redirect URI: " . GOOGLE_REDIRECT_URI . "\n";
    echo isset($token) ? "Token: " . print_r($token, true) : "";
    echo "</pre>";
    error_log("Google OAuth Error: " . $e->getMessage());
    exit;
}
