<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM events ORDER BY event_date ASC");
$events = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $imageData = $row['image_path'];

    $imageUrl = null;
    if ($imageData) {
        // Try to determine image type (optional but improves rendering)
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($imageData) ?? 'image/jpeg'; // fallback to jpeg

        $base64 = base64_encode($imageData);
        $imageUrl = "data:$mimeType;base64,$base64";
    }

    $events[$row['event_date']] = [
        'title' => $row['title'],
        'imageUrl' => $imageUrl
    ];
}

header('Content-Type: application/json');
echo json_encode($events);
