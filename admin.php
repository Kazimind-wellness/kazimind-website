<?php
require 'db.php'; 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}



// Total users
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

// Define "online" threshold (e.g., last 5 mins)
$threshold = date('Y-m-d H:i:s', time() - 300);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE last_active >= ?");
$stmt->execute([$threshold]);
$onlineUsers = $stmt->fetchColumn();


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
</head>
<body>
<a href="#password-form-container" style="float:left; margin: 20px;">change password</a>

<a href="logout.php" style="float:right; margin: 20px;">Logout</a>
<div class="admin-container">

<div class="user-stats" style="margin-bottom: 2rem;">
    <h3>Platform Statistics</h3>
    <p><strong>Total Registered Users:</strong> <?= $totalUsers ?></p>
    <p><strong>Currently Online Users:</strong> <?= $onlineUsers ?></p>
</div>


    <h2>Manage Calendar Events</h2>
    <div class="event-form">
        <h3>Add New Event</h3>
         <form id="event-form" enctype="multipart/form-data" method="POST">
                <input type="date" name="event_date" id="admin-event-date" required>
                <input type="text" name="title" id="admin-event-title" placeholder="Event Title" required>
                <input type="file" name="image" id="admin-event-image" accept="image/*">
                <button type="submit">Save Event</button>
                <div id="admin-message" class="message"></div>
        </form>
    </div>
    
    <div class="events-list">
        <h3>Existing Events</h3>
        <div id="admin-events-container"></div>
    </div>
    <hr>
    
</div>

<div class="password-form-container" id="password-form-container">
    <h3>Change Password</h3>
    <form method="POST" action="change_password.php">
        <input type="password" name="current_password" placeholder="Current Password" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
        <button type="submit">Update Password</button>
    </form>
</div>


<script src="assets/js/adminscript.js"></script>
</body>
</html>



