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
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $photoBlob = $user['profile_photo'] ?? null;
    $uploadError = '';
    
    if (!empty($_FILES['photo']['tmp_name'])) {
        // Validate file size (max 1.5MB to be safe)
        $maxFileSize = 1.5 * 1024 * 1024; // 1.5MB in bytes
        if ($_FILES['photo']['size'] > $maxFileSize) {
            $uploadError = "File size too large. Maximum allowed size is 1.5MB.";
        } 
        // Validate file type using extension and MIME type
        elseif (!in_array($_FILES['photo']['type'], ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'])) {
            $uploadError = "Invalid file type. Only JPEG, PNG, GIF, and SVG are allowed.";
        }
        // Validate upload errors
        elseif ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            $uploadError = "File upload failed. Please try again.";
        }
        // Additional security check - getimagesize
        elseif (!getimagesize($_FILES['photo']['tmp_name'])) {
            $uploadError = "Invalid image file. Please upload a valid image.";
        }
        // If validation passes, process the file
        else {
            $fileContent = file_get_contents($_FILES['photo']['tmp_name']);
            
            // Double-check the size after reading the file
            if (strlen($fileContent) > $maxFileSize) {
                $uploadError = "File size too large after processing. Maximum allowed size is 1.5MB.";
            } else {
                $photoBlob = $fileContent;
            }
        }
    }

    // Only proceed with database update if there are no upload errors
    if (empty($uploadError)) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET name = ?, profile_photo = ? WHERE email = ?");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $photoBlob, PDO::PARAM_LOB);
            $stmt->bindParam(3, $email);
            
            if ($stmt->execute()) {
                // Update session
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['profile_photo'] = $photoBlob;
                $success = "Profile updated successfully!";
            } else {
                $success = "Error updating profile. Please try again.";
            }
        } catch (PDOException $e) {
            // Handle database errors specifically
            if (strpos($e->getMessage(), 'max_allowed_packet') !== false) {
                $success = "File too large for database. Please try a smaller image (under 1MB).";
            } else {
                $success = "Database error: " . $e->getMessage();
            }
        }
    } else {
        $success = $uploadError;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Kazimind Wellness</title>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icon_K.png">
</head>
<body>
    <div class="profile-container">
        <div class="profile-background">
            <div class="background-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
        
        <div class="profile-card">
            <div class="card-header">
                <div class="header-content">
                    <h1><i class="fas fa-user-circle"></i> My Profile</h1>
                    <p>Manage your personal information</p>
                </div>
                <div class="header-actions">
                    <a href="index.php" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Home Page
                    </a>
                </div>
            </div>

            <?php if ($success): ?>
                <div class="alert alert-success" id="success-msg">
                    <i class="fas fa-check-circle"></i>
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <div class="profile-content">
                <div class="profile-sidebar">
                    <div class="profile-avatar-section">
                        <?php
                            $photoData = $user['profile_photo'] ?? null;
                            $photoSrc = $photoData ? 'data:image/jpeg;base64,' . base64_encode($photoData) : 'assets/images/default-avatar.png';
                        ?>
                        <div class="avatar-container">
                            <img src="<?= $photoSrc ?>" alt="Profile Photo" class="profile-avatar" id="avatar-preview">
                            <div class="avatar-overlay">
                                <i class="fas fa-camera"></i>
                                <span>Change Photo</span>
                            </div>
                        </div>
                        
                        <div class="user-info">
                            <h2 class="user-name"><?= htmlspecialchars($user['name'] ?? 'User') ?></h2>
                            <p class="user-email">
                                <i class="fas fa-envelope"></i>
                                <?= htmlspecialchars($user['email']) ?>
                            </p>
                            <div class="user-stats">
                                <div class="stat-item">
                                    <i class="fas fa-star"></i>
                                    <span>Member</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>Joined <?= date('M Y', strtotime($user['created_at'] ?? 'now')) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-features">
                        <div class="feature-item">
                            <i class="fas fa-heart"></i>
                            <span>Wellness Journey</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Progress Tracking</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-award"></i>
                            <span>Achievements</span>
                        </div>
                    </div>
                </div>

                <div class="profile-main">
                    <form method="POST" enctype="multipart/form-data" class="profile-form">
                        <div class="form-section">
                            <h3><i class="fas fa-user-edit"></i> Personal Information</h3>
                            
                            <div class="form-group">
                                <label for="name">
                                    <i class="fas fa-signature"></i>
                                    Full Name
                                </label>
                                <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
                                <div class="input-decoration"></div>
                            </div>

                            <div class="form-group">
                                <label for="email">
                                    <i class="fas fa-envelope"></i>
                                    Email Address
                                </label>
                                <input type="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
                                <small>Email cannot be changed</small>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3><i class="fas fa-camera"></i> Profile Photo</h3>
                            
                            <div class="file-upload-container">
                                <div class="file-upload-box">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Click to upload or drag and drop</p>
                                    <span>SVG, PNG, JPG or GIF (max. 1.5MB)</span>
                                    <input type="file" id="photo" name="photo" accept="image/*" class="file-input">
                                </div>
                                <div class="upload-preview" id="upload-preview"></div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                            <a href="userlogout.php" class="btn-logout">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Avatar preview and upload functionality
        const avatarContainer = document.querySelector('.avatar-container');
        const fileInput = document.getElementById('photo');
        const avatarPreview = document.getElementById('avatar-preview');
        const uploadPreview = document.getElementById('upload-preview');

        // Click avatar to trigger file input
        avatarContainer.addEventListener('click', () => {
            fileInput.click();
        });

        // Handle file selection
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Update main avatar preview
                    avatarPreview.src = e.target.result;
                    
                    // Show upload preview
                    uploadPreview.innerHTML = `
                        <div class="preview-item">
                            <img src="${e.target.result}" alt="Preview">
                            <span>${file.name}</span>
                            <button type="button" onclick="removePreview()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                }
                
                reader.readAsDataURL(file);
            }
        });

        // Remove preview function
        window.removePreview = function() {
            uploadPreview.innerHTML = '';
            fileInput.value = '';
        };

        // Auto-hide success message
        setTimeout(function() {
            const msg = document.getElementById('success-msg');
            if (msg) {
                msg.style.opacity = '0';
                setTimeout(() => msg.remove(), 300);
            }
        }, 5000);

        // Add animation on load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.profile-card').style.opacity = '0';
            document.querySelector('.profile-card').style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                document.querySelector('.profile-card').style.transition = 'all 0.6s ease';
                document.querySelector('.profile-card').style.opacity = '1';
                document.querySelector('.profile-card').style.transform = 'translateY(0)';
            }, 100);
        });

// Add file size validation
fileInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    const maxSize = 1.5 * 1024 * 1024; // 1.5MB in bytes - matches PHP
    
    if (file) {
        // Check file size
        if (file.size > maxSize) {
            alert('File size too large. Maximum allowed size is 1.5MB.');
            this.value = ''; // Clear the file input
            removePreview();
            return;
        }
        
        // Check file type
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
        if (!validTypes.includes(file.type)) {
            alert('Invalid file type. Please select an image file (JPEG, PNG, GIF, or SVG).');
            this.value = ''; // Clear the file input
            removePreview();
            return;
        }

        const reader = new FileReader();
        
        reader.onload = function(e) {
            // Update main avatar preview
            avatarPreview.src = e.target.result;
            
            // Show upload preview
            uploadPreview.innerHTML = `
                <div class="preview-item">
                    <img src="${e.target.result}" alt="Preview">
                    <span>${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
                    <button type="button" onclick="removePreview()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        }
        
        reader.onloadend = function() {
            // Additional check after file is read
            if (file.size > maxSize) {
                alert('File appears to be too large after processing. Please select a smaller image.');
                fileInput.value = '';
                removePreview();
            }
        }
        
        reader.readAsDataURL(file);
    }
});
    </script>
</body>
</html>
