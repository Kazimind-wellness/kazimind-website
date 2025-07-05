<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Only expose safe values
header('Content-Type: application/json');
echo json_encode([
    'API_KEY' => $_ENV['API_KEY'],
    'CALENDAR_ID' => $_ENV['CALENDAR_ID']
]);
