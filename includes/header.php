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
    <!--====== BASIC SEO ======-->
    <title>Kazimind Wellness</title>

    <meta name="description" content="Kazimind Wellness Centre provides professional mental health services, therapy, counseling, and holistic wellness programs. Visit the official Kazimind website for services, appointments, and resources.">

    <meta name="keywords" content="Kazimind, Kazimind Wellness, wellness center Kenya, therapy Kenya, counseling services, mental health Kenya, Kazimind Nanyuki">

    <meta name="author" content="Kazimind Wellness">

    <!--====== OPEN GRAPH (For Social Media Sharing) ======-->
    <meta property="og:title" content="Kazimind Wellness | Official Website">
    <meta property="og:description" content="Kazimind Wellness Centre provides mental health, therapy, and wellness services in Kenya.">
    <meta property="og:url" content="https://kazimind.com">
    <meta property="og:type" content="website">

    <!--====== TWITTER CARD ======-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kazimind Wellness | Official Website">
    <meta name="twitter:description" content="Kazimind Wellness Centre provides mental health, therapy, and wellness services in Kenya.">
    <meta name="twitter:image" content="https://kazimind.com/images/yourmainimage.jpg">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.min.css"> 
    <link rel="stylesheet" href="assets/css/h-footer.min.css">
    <link rel="icon" type="image/png" href="images/icon_K.png">
</head>

<!-- Preloader -->
<div id="preloader">
    <img src="images/logo2.webp" loading="lazy" alt="Loading..." class="loader-logo" /> 
    <div class="loader"></div>
</div>

<!-- Top Awareness Bar -->
<!-- <div class="awareness-bar">
    <script src="assets/js/gradient.js"></script>
    <div class="awareness-grid">
        <ul>    
        <li><a href="#">Anxiety and Depression Help</a></li>
            <li><a href="#">Therapy and Wellness</a></li>
        </ul>

        <ul>
            <li><a href="#">Community Mental Health</a></li>
            <li><a href="#">Emotional Resilience</a></li>
        </ul>
        <div class="awareness-image">
            <img src="images\uptime.gif" alt="Mental Health Awareness">
        </div>

        <ul>
            <li><a href="#">Mindfulness and Self-Care</a></li>
            <li><a href="#">Stress Management</a></li>
        </ul>

        <ul>
            <li><a href="#">Suicide Prevention Resources</a></li>
            <li><a href="#">Psychological Support</a></li>
        </ul>
    </div>
</div> -->



        <div class="navbar">
        <a href="#" class="logo">
            <img src="images/kazi-mind-high-resolution-logo-transparent.webp" loading="lazy" alt="Kazimind Logo">
        </a>

        <button class="menu-btn">☰</button>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a href="#">Who We Are</a>
                <ul class="dropdown-content">
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="ourTeam.php">Our Team</a></li>
                    <li><a href="areasOfFocus.php">Areas Of Focus</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">What We Do</a>
                <ul class="dropdown-content">
                    <li><a href="services.php">Services</a></li>
                    <li><a href="services.php#faqH1">FAQs</a></li>
                    <li><a href="upComingEvents.php">Upcoming Events Calendar</a></li>
                    <li><a href="Kazimind_blogs.php">Blogs</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Connect With Us</a>
                <ul class="dropdown-content">
                    <li><a href="contactUs.php">Contact Us</a></li>
                </ul>
            </li>
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

    <!-- <div class="hero-section">
        <video autoplay muted loop playsinline class="bg-video">
            <source src="uploads/header-vid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay"></div>
        <div class="hero-content">
            <h1><span>Cultivate</span> Your <span>Mind</span></h1>
            <p>Cultivating The Minds Of Our Generation</p>
            <a href="contactUs.php" class="nasdaq-btn"><strong>Reach</strong> Out To <strong>Us</strong> </a>
        </div>
    </div> -->
  <style>
    .parallax-container {
      position: relative;
      width: 100%;
      height: 290px; /* adjust depending on design */
      overflow: hidden;
      margin-top: 3rem;
      border-radius: 8px;
    }

    .parallax-container img {
      position: absolute;
      top: 0;
      left: 50%;
      width: 100%;
      height: 100%;
      object-fit: cover;      /* keeps aspect ratio, crops nicely */
      object-position: center; /* center focus */
      transform: translate(-50%, 0px); 
      transition: transform 0.1s linear;
    }

    @media (max-width: 768px) {
      .parallax-container {
        height: 200px; /* smaller on phones */
      }
    }

    @media (max-width: 480px) {
      .parallax-container {
        height: 150px;
      }
    }
  </style>

  <div class="parallax-container">
    <img src="images/HEad.webp" loading="lazy" alt="Leaves">
  </div>

  <script>
    const img = document.querySelector('.parallax-container img');

    window.addEventListener('scroll', () => {
      let offset = window.scrollY * 0.3; 
      img.style.transform = `translate(-50%, ${offset}px)`; 
    });
  </script>

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