<?php
ob_start();
session_start();
$pageTitle = "Eating Disorders";
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
    <title>Kazimind - Eating Disorders</title>
</head>

<style>
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
}
</style>

<div class="mainB">
<!-- Floating Download Button -->
<a href="documents/EATING DISORDERS.pdf" class="floating-download-btn" download>
    <i class="fas fa-download"></i>
    <span class="tooltip">Download Information PDF</span>
</a>
    <div class="section-container section scroll-animate">
        <h1 class="main-heading">Eating Disorders</h1>
        <p class="intro-paragraph">
            <strong>Eating disorders</strong> are serious mental health conditions that affect how people relate to food, body image, and self-worth. At <strong>KaziMind Wellness</strong>, we help individuals and families understand, manage, and recover from these challenges.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">1. Anorexia Nervosa</h2>
        <p class="description">
            A condition marked by <strong>extreme restriction of food intake</strong>, intense fear of gaining weight, and a <strong>distorted body image</strong>.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">2. Bulimia Nervosa</h2>
        <p class="description">
            Characterized by cycles of <strong>binge eating</strong> followed by compensatory behaviors such as vomiting, fasting, or excessive exercise.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">3. Binge-Eating Disorder (BED)</h2>
        <p class="description">
            Involves repeated episodes of eating unusually large amounts of food with a feeling of <strong>loss of control</strong>, without purging.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">4. Avoidant/Restrictive Food Intake Disorder (ARFID)</h2>
        <p class="description">
            An eating disturbance where individuals avoid or restrict food intake due to <strong>sensory issues</strong>, lack of interest in food, or fear of negative consequences (like choking).
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">5. Other Specified Feeding or Eating Disorder (OSFED)</h2>
        <p class="description">
            Eating disorder symptoms that don't fully fit into the above categories but still cause significant distress and health challenges (e.g., atypical anorexia, purging disorder).
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">6. Pica</h2>
        <p class="description">
            Persistent eating of <strong>non-food substances</strong> such as chalk, paper, soil, or hair.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">7. Rumination Disorder</h2>
        <p class="description">
            Recurrent <strong>regurgitation of food</strong>, which may be re-chewed, re-swallowed, or spit out.
        </p>
    </div>

    <div class="section-container scroll-animate">
        <h2 class="sub-heading">Recovery and Support</h2>
        <p class="description">
            <strong>Eating disorders are treatable</strong>. With a proper diagnosis by a qualified psychologist using professional clinical criteria, individuals can receive the right support and begin their <strong>journey to recovery</strong>.
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