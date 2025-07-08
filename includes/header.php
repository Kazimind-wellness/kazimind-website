<?php
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
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="icon" type="image/png" href="images/icon_K.png">
</head>

<!-- Preloader -->
<div id="preloader">
    <img src="images/logo2.png" alt="Loading..." class="loader-logo" /> 
    <div class="loader"></div>
</div>

<header class="site-header">
    <div class="logo-section">
        <img src="images\kazi-mind-high-resolution-logo-transparent.png" alt="Kazimind Logo">
        <h1>
        <span class="small-text">
            <span class="highlight">Cultivate </span>Your
            <span class="highlight">Mind</span><br>
        </h1>
    </div>
    <div class="nav-section">
        <div class="nav-item"><a href="index.php">Home</a></div>
        <div class="nav-item">
            <a href="aboutUs.php">About Us</a>
            <div class="hover-box">
                <p><strong>Our Story</strong></p>
                <p>Learn more about our journey.</p>
            </div>
        </div>
        <div class="nav-item">
            <a href="services.php">Services</a>
            <div class="hover-box">
                <a href="PsychotherapyServices.php">Psychotherapy Services</a>
            </div>
        </div>
        <div class="nav-item"><a href="ourTeam.php">Our Team</a></div>
        <div class="nav-item"><a href="upComingEvents.php">Upcoming Events Calendar</a></div>
        <div class="nav-item">
            <a href="areasOfFocus.php">Areas Of Focus</a>
            <div class="hover-box">
                <a href="axietyandDep.php">Anxiety and Depression</a>
                <a href="selfHarm.php">Suicide and Self-Harm</a>
                <a href="stressMag.php">Stress Management</a>
                <a href="genderAndS.php">Gender and Sexuality</a>
                <a href="bodyAndMind.php">Body And Mind Connection</a>
                <a href="trauma.php">Trauma</a>
                <a href="mariage-prep.php">Marriage Preparation</a>
                <a href="couples.php">Couples Therapy</a>
                <a href="child.php">Child and Youth Therapy</a>
                <a href="perinatalHealth.php">Perinatal Health and Post-Partum Support</a>
                <a href="griefAndLoss.php">Grief and Loss</a>
            </div>
        </div>
        <div class="nav-item"><a href="contactUs.php">Contact Us</a></div>
        <div class="nav-item"><a href="bookAppointment.php">Book An Appointment</a></div>

        <?php if ($isLoggedIn): 
            $user = $_SESSION['user'];
            ?>
            <div class="nav-item" style="margin: 0;">
                <h4  style="position: absolute;
                            top: -240%;
                            left: -170%;
                            width: 12rem;
                            background: #006fd1;
                            color: #FFDB58;
                            padding: 15px;
                            border: 1px solid yellow;
                            border-radius: 20px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            z-index: 100;"
            >Welcome, <?= htmlspecialchars($user['name']) ?>!<a href="profile.php">  My Profile</a></h4>
                <a href="userlogout.php" style="color: red;">Logout</a>
            </div>
        <?php else: ?>
            <div class="nav-item">
                <a href="signin.php">Client <br> Login</a>
            </div>
        <?php endif; ?>

        <div class="social-icons">
            <a href="https://www.facebook.com/KaziMindWellness"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/invites/contact/?utm_source=ig_contact_invite&utm_medium=copy_link&utm_content=nsq9ae0"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>

</header>

<!-- Hamburger and Mobile Nav remain unchanged -->

            <div class="hamburger">
                <div class="bar1"></div>
                <div class="bar3"></div>
                <div class="bar2"></div>
            </div>
            <!-- NAV FOR MOBILE PHONES -->
              <nav class="mobileNav">
                        <a href="index.php">Home</a>
                        <a href="aboutUs.php">About Us</a>
                        <a href="services.php">Services</a>
                        <a href="ourTeam.php">Our Team</a>
                        <a href="upComingEvents.php">Upcoming <br> Calendar</a>
                        <a href="areasOfFocus.php">Areas Of Focus</a>
                        <a href="contactUs.php">Contact Us</a>
                        <a href="bookAppointment.php">Appointment <br> <span style="margin-left: 15px;"> Booking</span> </a> 

                        <?php if ($isLoggedIn): ?>
                            <div class="nav-item">
                              <br> <br> <a href="profile.php">profile</a> <br> <br>
                                <a href="userlogout.php" style="color: red; width: 100%;">Logout</a>
                            </div>
                        <?php else: ?>

                                <a href="signin.php">Client Login</a>
         
                        <?php endif; ?>

                        <a href="https://www.facebook.com/KaziMindWellness"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/invites/contact/?utm_source=ig_contact_invite&utm_medium=copy_link&utm_content=nsq9ae0"><i class="fa-brands fa-instagram"></i></a>
              </nav>

<script>

const hamburger = document.querySelector(".hamburger");
const bar1 = document.querySelector(".bar1");
const bar2 = document.querySelector(".bar2");
const bar3 = document.querySelector(".bar3");
const mobileNav = document.querySelector(".mobileNav");


hamburger.addEventListener("click", () =>{
   bar1.classList.toggle("animateBar1");
   bar2.classList.toggle("animateBar2");
   bar3.classList.toggle("animateBar3");
   mobileNav.classList.toggle("openDrawer");
} );


</script>

</body>