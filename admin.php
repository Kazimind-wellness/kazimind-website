<?php
ob_start();
session_start();
require 'db.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Total users
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
// Total subscribers
if ($dbType === 'pgsql') {
    // Postgres uses true/false
    $sql = "SELECT COUNT(*) FROM subscribers WHERE unsubscribed = FALSE";
} else {
    // MySQL uses 0/1
    $sql = "SELECT COUNT(*) FROM subscribers WHERE unsubscribed = 0";
}

$totalSubscribers = $pdo->query($sql)->fetchColumn();

// Define "online" threshold
$threshold = date('Y-m-d H:i:s', time() - 300);

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE last_active >= ?");
$stmt->execute([$threshold]);
$onlineUsers = $stmt->fetchColumn();

// Handle promotional email
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promo_subject'], $_POST['promo_message'])) {
    $subject = trim($_POST['promo_subject']);
    $body = nl2br(trim($_POST['promo_message']));

    // Get all active subscribers
    if ($dbType === 'pgsql') {
        $stmt = $pdo->query("SELECT email FROM subscribers WHERE unsubscribed = FALSE");
    } else {
        $stmt = $pdo->query("SELECT email FROM subscribers WHERE unsubscribed = 0");
    }
    $subscribers = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if ($subscribers) {
        foreach ($subscribers as $email) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $_ENV['EMAIL_USERNAME'];
                $mail->Password   = $_ENV['EMAIL_PASSWORD'];
                $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body . "<br><br><a href='{$_ENV['APP_URL']}/unsubscribe.php?email=" . urlencode($email) . "'>Unsubscribe</a>";

                $mail->send();
            } catch (Exception $e) {
                error_log("Mail to $email failed: " . $mail->ErrorInfo);
            }
        }
        $message = "<div class='message success'>✅ Promotional email sent to all subscribers.</div>";
    } else {
        $message = "<div class='message error'>⚠️ No active subscribers found.</div>";
    }
}

// Blog Management Functions
function getBlogs() {
    $blogsFile = 'data/blogs.json';
    if (!file_exists($blogsFile)) {
        return [];
    }
    $blogsData = file_get_contents($blogsFile);
    return json_decode($blogsData, true) ?: [];
}

function saveBlogs($blogs) {
    $blogsDir = 'data';
    if (!is_dir($blogsDir)) {
        mkdir($blogsDir, 0755, true);
    }
    file_put_contents($blogsDir . '/blogs.json', json_encode($blogs, JSON_PRETTY_PRINT));
}

function handleImageUpload($file, $writerName) {
    // FIX: Check if file was actually uploaded and has no errors
    if (!isset($file) || $file['error'] !== 0 || empty($file['tmp_name'])) {
        return 'assets/images/default-avatar.png';
    }
    
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception('Invalid image format. Only JPG, PNG, and GIF are allowed.');
    }
    
    $uploadDir = 'assets/images/writers/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'writer_' . preg_replace('/[^a-zA-Z0-9]/', '_', $writerName) . '_' . time() . '.' . $extension;
    $imagePath = $uploadDir . $filename;
    
    if (!move_uploaded_file($file['tmp_name'], $imagePath)) {
        throw new Exception('Failed to upload image.');
    }
    
    return $imagePath;
}

// Handle blog operations
$blogMessage = '';
$blogs = getBlogs();

// Create or Update Blog - CORRECTED VERSION
// Create or Update Blog - COMPLETELY REWRITTEN VERSION
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blog_title'])) {
    $isEdit = isset($_POST['blog_id']) && !empty($_POST['blog_id']);
    $id = $isEdit ? $_POST['blog_id'] : uniqid();
    $title = trim($_POST['blog_title']);
    $content = trim($_POST['blog_content']);
    $writer = trim($_POST['writer_name']);
    
    try {
        // Handle image upload
        $writerImage = 'assets/images/default-avatar.png';
        
        if ($isEdit && isset($_POST['existing_writer_image']) && !empty($_POST['existing_writer_image'])) {
            $writerImage = $_POST['existing_writer_image'];
        }
        
        if (isset($_FILES['writer_image']) && 
            $_FILES['writer_image']['error'] === 0 && 
            !empty($_FILES['writer_image']['tmp_name'])) {
            $writerImage = handleImageUpload($_FILES['writer_image'], $writer);
        }
        
        // Handle dates
        $currentTime = date('Y-m-d H:i:s');
        
        if ($isEdit) {
            // Find the existing blog to preserve its creation date
            $existingBlogIndex = null;
            foreach ($blogs as $index => $blog) {
                if ($blog['id'] === $id) {
                    $existingBlogIndex = $index;
                    break;
                }
            }
            
            if ($existingBlogIndex !== null) {
                $createdAt = $blogs[$existingBlogIndex]['created_at'];
            } else {
                $createdAt = $currentTime;
            }
        } else {
            $createdAt = $currentTime;
        }
        
        // Create blog data
        $blogData = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'writer_name' => $writer,
            'writer_image' => $writerImage,
            'created_at' => $createdAt,
            'updated_at' => $currentTime
        ];
        
        if ($isEdit) {
            // Update existing blog
            $updated = false;
            foreach ($blogs as $index => &$blog) {
                if ($blog['id'] === $id) {
                    $blogs[$index] = $blogData;
                    $updated = true;
                    break;
                }
            }
            
            if ($updated) {
                saveBlogs($blogs);
                header("Location: admin.php?message=updated&blog_id=" . $id);
                exit;
            } else {
                $blogMessage = "<div class='message error'>⚠️ Blog not found for updating.</div>";
            }
        } else {
            // Add new blog
            $blogs[] = $blogData;
            saveBlogs($blogs);
            header("Location: admin.php?message=published");
            exit;
        }
        
    } catch (Exception $e) {
        $blogMessage = "<div class='message error'>⚠️ " . $e->getMessage() . "</div>";
    }
}

// Delete Blog
if (isset($_GET['delete_blog'])) {
    $deleteId = $_GET['delete_blog'];
    $blogs = array_filter($blogs, function($blog) use ($deleteId) {
        return $blog['id'] !== $deleteId;
    });
    saveBlogs($blogs);
    header("Location: admin.php?message=deleted");
    exit;
}

// Edit Blog - Pre-fill form
$editBlog = null;
if (isset($_GET['edit_blog'])) {
    $editId = $_GET['edit_blog'];
    foreach ($blogs as $blog) {
        if ($blog['id'] === $editId) {
            $editBlog = $blog;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/adminstyle.min.css">
    <style>
        /* Blog Management Styles */
        .blog-management {
            background: #fff;
            border-radius: 16px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        
        .blog-form {
            display: grid;
            gap: 1.75rem;
            margin-bottom: 3rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .form-group label {
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
        }
        
        .form-control {
            padding: 1rem 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
            background: white;
        }
        
        textarea.form-control {
            min-height: 200px;
            resize: vertical;
            line-height: 1.6;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: fit-content;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }
        
        .blogs-list {
            margin-top: 3rem;
        }
        
        .blog-item {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            border-left: 6px solid #8b5cf6;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .blog-item:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        
        .blog-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
            gap: 1rem;
        }
        
        .blog-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
            line-height: 1.3;
        }
        
        .blog-meta {
            color: #6b7280;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .blog-content-preview {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .writer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }
        
        .writer-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #8b5cf6;
        }
        
        .writer-details h4 {
            margin: 0 0 0.25rem 0;
            color: #1f2937;
            font-size: 1.1rem;
        }
        
        .writer-details p {
            margin: 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .blog-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }
        
        .btn-sm {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }
        
        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .image-preview {
            max-width: 120px;
            border-radius: 50%;
            border: 3px solid #e5e7eb;
            margin-top: 0.5rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn-cancel {
            background: #6b7280;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .blog-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .blog-actions {
                flex-direction: column;
            }
            
            .btn-sm {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<a href="#password-form-container" style="float:left; margin: 20px;">Change Password</a>
<a href="logout.php" style="float:right; margin: 20px;">Logout</a>

<div class="admin-container">
    <div class="user-stats" style="margin-bottom: 2rem;">
        <h3>Platform Statistics</h3>
        <p><strong>Total Registered Users:</strong> <?= $totalUsers ?></p>
        <p><strong>Currently Online Users:</strong> <?= $onlineUsers ?></p>
        <p><strong>Total Subscribers:</strong> <?= $totalSubscribers ?></p>
    </div>

    <?= $message ?>
    
    <!-- Blog Management Section -->
    <div class="blog-management">
        <h3 style="margin-bottom: 2rem; color: #1f2937; font-size: 2rem;">Blog Content Management</h3>
        <?php
        // Handle redirect messages with debug info
        if (isset($_GET['message'])) {
            if ($_GET['message'] === 'published') {
                echo "<div class='message success'>✅ Blog published successfully!</div>";
            } elseif ($_GET['message'] === 'updated') {
                echo "<div class='message success'>✅ Blog updated successfully! (ID: " . ($_GET['blog_id'] ?? 'unknown') . ")</div>";
            } elseif ($_GET['message'] === 'deleted') {
                echo "<div class='message success'>✅ Blog deleted successfully!</div>";
            }
        } else {
            echo $blogMessage;
        }

        // DEBUG: Show current blog IDs and data
        echo "<!-- DEBUG: Blog count: " . count($blogs) . " -->";
        foreach ($blogs as $index => $blog) {
            echo "<!-- DEBUG: Blog $index - ID: '{$blog['id']}', Title: '{$blog['title']}' -->";
        }
        ?>
        
        <form method="POST" enctype="multipart/form-data" class="blog-form">
            <input type="hidden" name="blog_id" value="<?= $editBlog['id'] ?? '' ?>">
            <input type="hidden" name="existing_writer_image" value="<?= $editBlog['writer_image'] ?? '' ?>">
            <input type="hidden" name="existing_created_at" value="<?= $editBlog['created_at'] ?? '' ?>">
            
            <div class="form-group">
                <label for="blog_title">Blog Title</label>
                <input type="text" id="blog_title" name="blog_title" class="form-control" 
                    value="<?= htmlspecialchars($editBlog['title'] ?? '') ?>" required
                    placeholder="Enter an engaging blog title...">
            </div>
            
            <div class="form-group">
                <label for="blog_content">Blog Content</label>
                <textarea id="blog_content" name="blog_content" class="form-control" required
                          placeholder="Write your blog content here..."><?= htmlspecialchars($editBlog['content'] ?? '') ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="writer_name">Writer Name</label>
                <input type="text" id="writer_name" name="writer_name" class="form-control" 
                       value="<?= htmlspecialchars($editBlog['writer_name'] ?? '') ?>" required
                       placeholder="Enter writer's name...">
            </div>
            
            <div class="form-group">
                <label for="writer_image">Writer Profile Image</label>
                <input type="file" id="writer_image" name="writer_image" class="form-control" accept="image/*">
                <?php if (isset($editBlog['writer_image'])): ?>
                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
                        <span style="color: #6b7280; font-size: 0.9rem;">Current Image:</span>
                        <img src="<?= $editBlog['writer_image'] ?>" class="image-preview" alt="Current writer image">
                    </div>
                <?php endif; ?>
                <div id="imagePreview" class="image-preview-container"></div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <?= $editBlog ? 'Update Blog' : 'Publish Blog' ?>
                </button>
                <?php if ($editBlog): ?>
                    <a href="admin.php" class="btn-cancel">Cancel Edit</a>
                <?php endif; ?>
            </div>
        </form>
        
        <!-- Existing Blogs -->
       <div class="blogs-list">
            <h4 style="color: #374151; margin-bottom: 2rem; font-size: 1.5rem;">Published Blogs (<?= count($blogs) ?>)</h4>
            <?php if (empty($blogs)): ?>
                <div style="text-align: center; padding: 3rem; color: #6b7280; background: #f8fafc; border-radius: 12px;">
                    <h5 style="margin: 0 0 1rem 0; color: #374151;">No blogs published yet</h5>
                    <p style="margin: 0;">Start by creating your first blog post above!</p>
                </div>
            <?php else: ?>
                <?php 
                // FIX: Create a reversed copy without affecting the original array keys
                $reversedBlogs = array_reverse($blogs);
                foreach ($reversedBlogs as $blog): 
                ?>
                    <div class="blog-item">
                        <div class="blog-header">
                            <h5 class="blog-title"><?= htmlspecialchars($blog['title']) ?></h5>
                            <span style="color: #6b7280; font-size: 0.9rem;">
                                <?php
                                $displayDate = 'Unknown date';
                                if (!empty($blog['created_at']) && strtotime($blog['created_at']) !== false) {
                                    $displayDate = date('M j, Y', strtotime($blog['created_at']));
                                } else {
                                    // If date is invalid, use current date
                                    $displayDate = date('M j, Y');
                                }
                                echo $displayDate;
                                ?>
                            </span>
                        </div>
                        
                        <div class="writer-info">
                            <img src="<?= $blog['writer_image'] ?>" alt="<?= htmlspecialchars($blog['writer_name']) ?>" class="writer-avatar">
                            <div class="writer-details">
                                <h4><?= htmlspecialchars($blog['writer_name']) ?></h4>
                                <p>Writer</p>
                            </div>
                        </div>
                        
                        <div class="blog-content-preview">
                            <?= substr(strip_tags($blog['content']), 0, 200) ?>...
                        </div>
                        
                        <div class="blog-actions">
                            <a href="admin.php?edit_blog=<?= $blog['id'] ?>" class="btn-sm btn-edit">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Edit
                            </a>
                            <a href="admin.php?delete_blog=<?= $blog['id'] ?>" class="btn-sm btn-delete" 
                            onclick="return confirm('Are you sure you want to delete the blog &quot;<?= addslashes($blog['title']) ?>&quot;?')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="promo-form">
    <h3>Send Promotional Email</h3>
    <form method="POST">
        <input type="text" name="promo_subject" placeholder="Email Subject" required>
        <textarea name="promo_message" placeholder="Write your message here..." rows="6" required></textarea>
        <button type="submit">Send to Subscribers</button>
    </form>
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

<script>
    // Image preview functionality
    document.getElementById('writer_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewContainer.innerHTML = `
                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
                        <span style="color: #6b7280; font-size: 0.9rem;">Preview:</span>
                        <img src="${e.target.result}" class="image-preview" alt="Preview">
                    </div>
                `;
            }
            
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '';
        }
    });
</script>
</body>
</html>