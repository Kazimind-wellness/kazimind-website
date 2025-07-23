<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

// Load Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Detect if we're running locally or on Render
$serverHost = $_SERVER['HTTP_HOST'] ?? 'cli';
$isLocal = $serverHost === 'localhost' || $serverHost === '127.0.0.1' || strpos($serverHost, '192.168.') === 0;

// Load .env only if local (Render has env variables already set)
if ($isLocal && file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__, '.env');
    $dotenv->load();
}

// Detect DB type (optional: set this via an env variable if you prefer)
$dbType = $_ENV['DB_TYPE'] ?? ($isLocal ? 'mysql' : 'pgsql');
$defaultPort = $dbType === 'mysql' ? 3306 : 5432;

// Database credentials from env (from Render or .env.local)
$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$port = $_ENV['DB_PORT'] ?? $defaultPort;

// Build DSN string based on DB type
if ($dbType === 'mysql') {
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
} else {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
}

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Create PDO instance
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Google OAuth Client Settings
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID']);
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET']);
define('GOOGLE_REDIRECT_URI', $_ENV['GOOGLE_REDIRECT_URI']);