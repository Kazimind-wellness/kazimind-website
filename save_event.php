<?php
// Make sure there is absolutely no whitespace before this PHP tag
require 'db.php';

// Ensure nothing is accidentally printed
ob_clean();
header('Content-Type: application/json');

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['event_date'] ?? '';
    $title = $_POST['title'] ?? '';
    $imageData = null;

    if (empty($date) || empty($title)) {
        $response['error'] = "Missing event date or title.";
        echo json_encode($response);
        exit;
    }

    // Read image as binary
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO events (event_date, title, image_path) VALUES (?, ?, ?)");
        if ($stmt->execute([$date, $title, $imageData])) {
            $response['success'] = true;
        } else {
            $response['error'] = $stmt->errorInfo();
        }
    } catch (PDOException $e) {
        $response['error'] = $e->getMessage();
    }
} else {
    $response['error'] = 'Invalid request method.';
}

echo json_encode($response);
?>
