<?php
ob_start();
session_start();
$pageTitle = "Attachment Disorders and Styles";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <link rel="stylesheet" href="assets/css/areasOfFocus.css">
    <title>Kazimind - Attachment Disorders and Styles</title>
<style>
/* Reduced font sizes for headers */
.main-heading {
    font-size: 2rem !important;
    margin-bottom: 1rem !important;
}

.sub-heading {
    font-size: 1.4rem !important;
    margin-bottom: 0.75rem !important;
}

/* Reduced spacing between sections */
.section-container {
    margin-bottom: 1.5rem !important;
    padding: 1rem !important;
}

/* Reduced paragraph spacing */
.intro-paragraph,
.description {
    margin-bottom: 0.75rem !important;
    line-height: 1!important;
}

/* Contact button spacing */
.contact-button-container {
    margin-top: 2rem !important;
    margin-bottom: 1rem !important;
}

/* Floating Download Button */
.floating-download-btn {
    position: fixed;
    top: 20px;
    left: 20px;
    background: #3498db;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    transition: all 0.3s ease;
    cursor: pointer;
}

.floating-download-btn:hover {
    background: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.floating-download-btn i {
    font-size: 24px;
}

.floating-download-btn .tooltip {
    position: absolute;
    top: 50%;
    left: 70px;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.floating-download-btn:hover .tooltip {
    opacity: 1;
    visibility: visible;
    left: 75px;
}

/* Responsive styles for floating button */
@media (max-width: 768px) {
    .floating-download-btn {
        width: 50px;
        height: 50px;
        top: 15px;
        left: 15px;
    }
    
    .floating-download-btn i {
        font-size: 20px;
    }
    
    .floating-download-btn .tooltip {
        font-size: 12px;
        padding: 6px 10px;
    }

    /* Further reduce sizes on mobile */
    .main-heading {
        font-size: 1.8rem !important;
    }
    
    .sub-heading {
        font-size: 1.3rem !important;
    }
    
    .section-container {
        margin-bottom: 1rem !important;
        padding: 0.75rem !important;
    }
}

@media (max-width: 480px) {
    .main-heading {
        font-size: 1.6rem !important;
    }
    
    .sub-heading {
        font-size: 1.2rem !important;
    }
    
    .section-container {
        margin-bottom: 0.75rem !important;
        padding: 0.5rem !important;
    }
}
</style>
</head>

<div class="mainB">
    <!-- Floating Download Button -->
    <a href="documents/ATTACHMENT STYLES.pdf" class="floating-download-btn" download>
        <i class="fas fa-download"></i>
        <span class="tooltip">Download Information PDF</span>
    </a>

    <div class="section-container section scroll-animate">
        <h2 class="main-heading">Understanding Attachment Disorders and Attachment Styles</h1>
        <p class="description">
            <strong>Healthy relationships begin with how we bond.</strong> The way a child connects with a caregiver shapes how they view themselves, others, and the world. When this bonding process is disrupted, it may lead to attachment disorders in childhood. Later in life, early experiences often shape our attachment styles as adults.
            <br><br>
            At <strong>KaziMind Wellness</strong>, we believe that understanding both is the first step toward healing and cultivating healthier connections.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">Attachment Disorders (in Children)</h2>
        <p class="description">
            Attachment disorders occur when a child does not form a secure emotional bond with their caregiver, often due to <strong>neglect, trauma, or inconsistent care</strong>. These conditions can affect trust, emotional regulation, and social development.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">1. Reactive Attachment Disorder (RAD)</h2>
        <p class="description">
            Children withdraw emotionally, avoid comfort, and struggle to show positive emotions.
            <br><br>
            <strong>Example:</strong> A child resists hugs or comfort even when upset.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">2. Disinhibited Social Engagement Disorder (DSED)</h2>
        <p class="description">
            Children show little fear of strangers, seek attention in unsafe ways, and have poor social boundaries.
            <br><br>
            <strong>Example:</strong> A child eagerly approaches or follows unfamiliar adults without caution.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">Important Note</h2>
        <p class="description">
            <strong>Attachment disorders are diagnosed only in childhood, not adulthood.</strong>
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">Attachment Styles (in Adults)</h2>
        <p class="description">
            While adults do not have attachment disorders, the way they relate to others often reflects their early bonding experiences. These patterns are called <strong>attachment styles</strong>, and they influence how we connect in friendships, family, and romantic relationships.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">1. Secure Attachment</h2>
        <p class="description">
            Comfortable with closeness and independence.
            <br><br>
            <strong>Example:</strong> Communicates openly and trusts partners.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">2. Anxious (Preoccupied) Attachment</h2>
        <p class="description">
            Craves reassurance and fears abandonment.
            <br><br>
            <strong>Example:</strong> Constantly worries if their partner still cares.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">3. Avoidant (Dismissive) Attachment</h2>
        <p class="description">
            Values independence and avoids emotional intimacy.
            <br><br>
            <strong>Example:</strong> Keeps distance or avoids deep conversations.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">4. Disorganized (Fearful-Avoidant) Attachment</h2>
        <p class="description">
            Wants closeness but fears getting hurt.
            <br><br>
            <strong>Example:</strong> Pulls partners close, then pushes them away.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">Our Approach</h2>
        <p class="description">
            At <strong>KaziMind Wellness</strong>, we help individuals, families, and organizations explore these patterns and work toward cultivating <strong>secure, supportive bonds</strong>.
        </p>
    </div>

    <div class="contact-button-container scroll-animate">
        <a href="contactUs.php" class="contact-button">
            CONTACT US FOR SUPPORT
        </a>
    </div>

</div>

<script src="assets/js/dynamicScroll.js"></script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>