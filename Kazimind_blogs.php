<?php
ob_start();
session_start();
$pageTitle = "Kazimind Blogs";

// Get blogs from JSON file
function getBlogs() {
    $blogsFile = 'data/blogs.json';
    if (!file_exists($blogsFile)) {
        return [];
    }
    $blogsData = file_get_contents($blogsFile);
    return json_decode($blogsData, true) ?: [];
}

$blogs = getBlogs();
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/blogs.min.css">
</head>
<div class="blogs-hero">
    <div class="blogs-container">
        <h1>Kazimind Wellness Blogs</h1>
        <p>Discover insights, tips, and stories to enhance your wellness journey</p>
    </div>
</div>

<div class="blogs-container">
    <?php if (empty($blogs)): ?>
        <div class="no-blogs">
            <h3>No Blogs Published Yet</h3>
            <p>We're working on creating valuable content for your wellness journey. Check back soon!</p>
        </div>
    <?php else: ?>
        <div class="blogs-grid">
            <?php foreach (array_reverse($blogs) as $blog): ?>
                <div class="blog-card" id="blog-<?= $blog['id'] ?>">
                    <div class="blog-image-container">
                        <div style="text-align: center; padding: 2rem;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 1rem;">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            <div>Wellness Insights</div>
                        </div>
                    </div>
                    
                    <div class="blog-content">
                        <h3 class="blog-title"><?= htmlspecialchars($blog['title']) ?></h3>
                        
                        <div class="blog-meta">
                            <div class="writer-info">
                                <img src="<?= $blog['writer_image'] ?>" alt="<?= htmlspecialchars($blog['writer_name']) ?>" class="writer-avatar">
                                <span class="writer-name"><?= htmlspecialchars($blog['writer_name']) ?></span>
                            </div>
                            <div class="blog-date">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <?php
                                $displayDate = 'Recent';
                                if (!empty($blog['created_at']) && strtotime($blog['created_at']) !== false) {
                                    $displayDate = date('M j, Y', strtotime($blog['created_at']));
                                } else {
                                    // If date is invalid, use current date
                                    $displayDate = date('M j, Y');
                                }
                                echo $displayDate;
                                ?>
                            </div>
                        </div>
                        
                        <div class="blog-excerpt">
                            <?= substr(strip_tags($blog['content']), 0, 150) ?>...
                        </div>
                        
                        <div class="blog-full-content">
                            <?= nl2br(htmlspecialchars($blog['content'])) ?>
                        </div>
                        
                        <button class="read-more-btn" onclick="toggleBlogContent(this, '<?= $blog['id'] ?>')">
                            Read More
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </button>

                        <button class="read-less-btn" onclick="toggleBlogContent(this, '<?= $blog['id'] ?>')">
                            Read Less
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="M12 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    function toggleBlogContent(clickedButton, blogId) {
        const blogCard = document.getElementById(`blog-${blogId}`);
        
        // Find elements relative to the clicked button for more reliability
        const blogContent = clickedButton.closest('.blog-content');
        const excerpt = blogContent.querySelector('.blog-excerpt');
        const fullContent = blogContent.querySelector('.blog-full-content');
        const readMoreBtn = blogContent.querySelector('.read-more-btn');
        const readLessBtn = blogContent.querySelector('.read-less-btn');
        
        if (excerpt.style.display === 'none' || excerpt.style.display === '') {
            // Show excerpt, hide full content
            excerpt.style.display = '-webkit-box';
            fullContent.style.display = 'none';
            readMoreBtn.style.display = 'inline-flex';
            readLessBtn.style.display = 'none';
        } else {
            // Show full content, hide excerpt
            excerpt.style.display = 'none';
            fullContent.style.display = 'block';
            readMoreBtn.style.display = 'none';
            readLessBtn.style.display = 'inline-flex';
        }
    }
</script>

<?php 
$content = ob_get_clean(); 
include 'includes/layout.php'; 
?>