<?php
require 'db.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['event_date'] ?? '';
    $stmt = $pdo->prepare("DELETE FROM events WHERE event_date = ?");
    $response['success'] = $stmt->execute([$date]);
}

header('Content-Type: application/json');
echo json_encode($response);
?>