<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$calendarId = $_ENV['CALENDAR_ID'];
$apiKey = $_ENV['API_KEY'];

// Use ISO 8601 with Zulu time
$startTime = gmdate('Y-m-d\TH:i:s\Z');
$endTime = gmdate('Y-m-d\TH:i:s\Z', strtotime('+30 days'));

$url = "https://www.googleapis.com/calendar/v3/calendars/$calendarId/events?key=$apiKey&timeMin=$startTime&timeMax=$endTime&singleEvents=true&orderBy=startTime";

// Use cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<!-- DEBUG: HTTP response code = $httpCode -->";

if (!$response || $httpCode !== 200) {
    echo "<!-- DEBUG: API request failed -->";
    return;
}

$data = json_decode($response, true);
$events = $data['items'] ?? [];

$monthNames = [
    '01'=>'JAN','02'=>'FEB','03'=>'MAR','04'=>'APR','05'=>'MAY','06'=>'JUN',
    '07'=>'JUL','08'=>'AUG','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DEC'
];

echo "<!-- DEBUG: " . count($events) . " events fetched -->";

foreach ($events as $event) {
    $title = htmlspecialchars($event['summary'] ?? 'Untitled Event');
    $dateStr = $event['start']['dateTime'] ?? $event['start']['date'];
    $timestamp = strtotime($dateStr);
    $day = date('d', $timestamp);
    $month = strtoupper($monthNames[date('m', $timestamp)]);
    $description = $event['description'] ?? '';

    // Extract image from description (case-insensitive, whitespace tolerant)
    $imageUrl = null;
    if (preg_match('/^\s*image\s*:\s*(https?:\/\/[^\s]+)/im', $description, $matches)) {
        $imageUrl = htmlspecialchars(trim($matches[1]));
    }

    $bgImage = $imageUrl
        ? "style=\"background-image: url('$imageUrl');\""
        : "style=\"background-image: url('images/AP.jpg');\"";
    echo "
    <div class=\"event-card\">
        <div class=\"event-image\" $bgImage>
            <div class=\"event-date\">$month<br><span>$day</span></div>
        </div>
        <h3>$title</h3>
        <p>" . date('M j, Y', $timestamp) . "</p>
    </div>
    ";
}
?>
