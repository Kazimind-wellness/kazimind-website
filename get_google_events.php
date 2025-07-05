<?php
session_start();
require 'vendor/autoload.php';

if (!isset($_SESSION['google_access_token'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}


$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->setAccessToken($_SESSION['google_access_token']);

if ($client->isAccessTokenExpired()) {
    echo json_encode(['error' => 'Access token expired']);
    exit;
}

$service = new Google_Service_Calendar($client);
$events = $service->events->listEvents('primary', [
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
]);

$result = [];

foreach ($events->getItems() as $event) {
    $start = $event->start->dateTime ?? $event->start->date;
    $result[] = [
        'id' => $event->id,
        'summary' => $event->getSummary(),
        'start' => $start,
    ];
}

header('Content-Type: application/json');
echo json_encode($result);
