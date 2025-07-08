<?php
ob_start();
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit;
}

$user = $_SESSION['user'];
$email = $user['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = trim($_POST['name']);
$photoBlob = $user['profile_photo'] ?? null;

if (!empty($_FILES['photo']['tmp_name'])) {
    $photoBlob = file_get_contents($_FILES['photo']['tmp_name']);
}

$stmt = $pdo->prepare("UPDATE users SET name = ?, profile_photo = ? WHERE email = ?");
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $photoBlob, PDO::PARAM_LOB);
$stmt->bindParam(3, $email);
$stmt->execute();

// Update session
$_SESSION['user']['name'] = $name;
$_SESSION['user']['profile_photo'] = $photoBlob;
$success = "Profile updated successfully!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
    <div class="profile-container">
        <div class="card">
            <h2>Profile Info:</h2>

            <?php if (isset($success)): ?>
                 <p id="success-msg" style="color: green;"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
           
                <?php
                    $photoData = $user['profile_photo'] ?? null;
                    $photoSrc = $photoData ? 'data:image/jpeg;base64,' . base64_encode($photoData) : 'https://via.placeholder.com/100';
                ?>
                <img src="<?= $photoSrc ?>" width="100">

                <br><br>
                <h3> You Are logged In As : </h3> <br>
               <h4><?= htmlspecialchars($user['email']) ?> <br></h4> <br>
               <h3><?= htmlspecialchars($user['name']) ?> <br></h3> <br>

                Edit Name: <br> <br> <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br> <br>
                Update Photo : <br> <br> <input type="file" name="photo" accept="image/*"><br><br>

                <button type="submit">Save Changes</button>
            </form>
            <br>
            <a href="userlogout.php" class="logout-button">Log Out</a>
        </div>
    </div>

<script>
    setTimeout(function () {
        const msg = document.getElementById('success-msg');
        if (msg) msg.style.display = 'none';
    }, 4000); // 4 seconds
</script>


</body>
</html>
