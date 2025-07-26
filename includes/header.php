<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'db.php';
$isLoggedIn = isset($_SESSION['user']);

if ($isLoggedIn) {
    $email = $_SESSION['user']['email']; 

    $stmt = $pdo->prepare("UPDATE users SET last_active = NOW() WHERE email = ?");
    $stmt->execute([$email]);
}
?>

<!-- header  -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.css"> 
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <link rel="icon" type="image/png" href="images/icon_K.png">
</head>

<!-- Preloader -->
<div id="preloader">
    <img src="images/logo2.png" alt="Loading..." class="loader-logo" /> 
    <div class="loader"></div>
</div>


        <div class="navbar">
        <a href="#" class="logo">
            <img src="images/kazi-mind-high-resolution-logo-transparent.png" alt="Skye Bioscience Logo">
        </a>

        <button class="menu-btn">☰</button>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li class="dropdown">
                <a href="services.php">Services</a>
                <ul class="dropdown-content">
                    <li><a href="services.php">All Services</a></li>
                    <li><a href="PsychotherapyServices.php">Psychotherapy Services</a></li>
                </ul>
            </li>
            <li><a href="ourTeam.php">Our Team</a></li>
            <li><a href="upComingEvents.php">Upcoming Events Calendar</a></li>
            <li class="dropdown">
                <a href="areasOfFocus.php">Areas Of Focus</a>
                <ul class="dropdown-content">
                    <li><a href="areasOfFocus.php">Areas Of Focus</a></li>
                    <li><a href="axietyandDep.php">Anxiety and Depression</a></li>
                    <li><a href="selfHarm.php">Suicide and Self-Harm</a></li>
                    <li><a href="stressMag.php">Stress Management</a></li>
                    <li><a href="genderAndS.php">Gender and Sexuality</a></li>
                    <li><a href="bodyAndMind.php">Body And Mind Connection</a></li>
                    <li><a href="trauma.php">Trauma</a></li>
                    <li><a href="mariage-prep.php">Marriage Preparation</a></li>
                    <li><a href="couples.php">Couples Therapy</a></li>
                    <li><a href="child.php">Child and Youth Therapy</a></li>
                    <li><a href="perinatalHealth.php">Perinatal Health and Post-Partum Support</a></li>
                    <li><a href="griefAndLoss.php">Grief and Loss</a></li>
                </ul>
            </li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="bookAppointment.php">Book An Appointment</a></li>

            <?php if ($isLoggedIn): ?>
            <div class="nav-item">
            <li> <a href="profile.php">profile</a> </li>
            <li> <a href="userlogout.php" style="color: red; width: 100%;">Logout</a></li>
            </div>
            <?php else: ?>
            
            <li><a href="signin.php">Sign In</a></li>
            
            <?php endif; ?>
        </ul>
    </div>

    <div class="hero-section">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="uploads/your-video-file.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay"></div>
        <div class="hero-content">
            <h1><span>Cultivate</span> Your <span>Mind</span></h1>
            <p>Cultivating The Minds Of Our Generation</p>
            <a href="contactUs.php" class="nasdaq-btn"><strong>Reach</strong> Out To <strong>Us</strong> </a>
        </div>
    </div>



<script>
        // Enhanced Mobile menu toggle with animation control
        const menuBtn = document.querySelector('.menu-btn');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('mobile-active');

            // Toggle menu button animation
            if (navLinks.classList.contains('mobile-active')) {
                menuBtn.innerHTML = '✕';
                menuBtn.style.transform = 'rotate(180deg)';
            } else {
                menuBtn.innerHTML = '☰';
                menuBtn.style.transform = 'rotate(0)';
            }
        });

        // Mobile dropdown toggle
        dropdowns.forEach(dropdown => {
            const link = dropdown.querySelector('a');

            link.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');

                    // Close other dropdowns when opening one
                    if (dropdown.classList.contains('active')) {
                        dropdowns.forEach(otherDropdown => {
                            if (otherDropdown !== dropdown && otherDropdown.classList.contains('active')) {
                                otherDropdown.classList.remove('active');
                            }
                        });
                    }
                }
            });
        });

        // Close menu when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                if (!e.target.closest('.navbar') && navLinks.classList.contains('mobile-active')) {
                    navLinks.classList.remove('mobile-active');
                    menuBtn.innerHTML = '☰';
                    menuBtn.style.transform = 'rotate(0)';

                    // Also close any open dropdowns
                    dropdowns.forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            }
        });

        // Close dropdowns when clicking on a dropdown item
        document.querySelectorAll('.dropdown-content a').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    item.closest('.dropdown').classList.remove('active');
                }
            });
        });
</script>

</body>