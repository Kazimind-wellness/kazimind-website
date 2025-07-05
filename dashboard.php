<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit;
}

$user = $_SESSION['user'];
?>
<h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>
<a href="userlogout.php">Logout</a>
