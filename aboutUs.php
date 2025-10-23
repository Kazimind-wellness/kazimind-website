<?php
ob_start();
session_start();
$pageTitle = "About Us";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <title>About Us | KaziMind</title>
</head>
<body>
    
<div class="review-container">
    <div class="review-header">
        <h2 class="review-title animate-on-scroll">
            About Us
        </h2>

        <hr class="horizontal animate-on-scroll">
        
        <div class="text-justify">
            <h3 class="animate-on-scroll">What's the meaning of our name?</h3>
            <div class="offers-list animate-on-scroll">
                KAZI is a Swahili word for work. Mind refers the mental and emotional aspect of a person.
                WELLNESS is the state of being in good health in all aspects of your life, especially as an actively pursued goal.
            </div>

            <h3 class="animate-on-scroll">KaziMind Wellness</h3>
            <p class="animate-on-scroll">KaziMind Wellness is an organization that provides mental health and wellness services, including psychological counseling and therapy. They may offer a range of services aimed at promoting psychological well-being, such as individual and group therapy, couples counseling, and cognitive-behavioral therapy.</p>
            
            <h2 class="review-title animate-on-scroll">About Our Centre</h2>
            <br>
            <h3 class="review-title animate-on-scroll">Our History</h3> 
            <p class="animate-on-scroll">Established with a vision to prioritize mental health, KaziMind Wellness Centre has been serving the community since its founding in 2021. Launched with the idea of bringing together a group of therapists for a wider, supportive community for both clients and therapists alike, KaziMind Wellness has dedicated itself to providing accessible and effective therapy services.</p>
            <p class="animate-on-scroll">Since inception, we have achieved significant milestones in promoting mental wellness and breaking the stigma surrounding mental health issues.</p>
            
            <h3 class="animate-on-scroll">Our Slogan</h3>
            <p class="animate-on-scroll">Cultivate Your Mind</p>
            
            <h3 class="animate-on-scroll">Our Vision</h3>
            <p class="animate-on-scroll">To be the leading provider of holistic mental health solutions, cultivating well-being and empowerment for all, through professional dedication, innovation, inclusivity, collaborative efforts, and advocacy.</p>
            
            <h3 class="animate-on-scroll">Our Mission</h3>
            <p class="animate-on-scroll">KaziMind Wellness is dedicated to providing accessible, unbiased psychological support to all. Through our inclusive platform, we promote emotional healing, foster work-life balance, and enhance productivity. By prioritizing mental well-being, we empower individuals to lead fulfilling lives and contribute positively to society.</p>
            
            <h3 class="animate-on-scroll">Our Community Involvement</h3>
			<div class="offers-list animate-on-scroll">
                <p class="animate-on-scroll">We actively engage in community outreach, partnering with local organizations and advocating for mental health awareness to break stigma and promote accessibility to mental wellness.</p>
                <p class="animate-on-scroll">KaziMind is a leading mental health solutions organization, dedicated to providing innovative, culturally responsive, and evidence-based interventions that meet the evolving needs of individuals, families, and institutions.</p>
                <p class="animate-on-scroll">Our approach integrates clinical expertise with community empowerment, ensuring that mental wellness is not only a personal journey but also a collective responsibility. Through workshops, psychoeducation programs, corporate wellness programs, and school-based initiatives, we bring mental health services closer to the people especially underserved populations.</p>
                <p class="animate-on-scroll">At KaziMind, we believe that mental health is a right, not a privilege, and we work tirelessly to build a society where emotional and psychological well-being are prioritized across all sectors.</p>
			</div> 
            <h3 class="animate-on-scroll">Our Team</h3>
            <p class="animate-on-scroll">We are group of professionals who are dedicated and passionate about supporting growth, empowering individuals, communities and organizations to effectively manage the mental health challenges for enhanced well being and productivity. We are psychotherapists who have specialized in various mental health sectors, counsellors, IT specialist.</p>
            <p class="animate-on-scroll">Our team is made up of people from different ages, cultures, genders, religion, abilities. All of our team members advocate for work to build practices that advocates for Mental Health.</p>
            
            <h3 class="animate-on-scroll">Location</h3>
            <div class="offers-list animate-on-scroll">
                Located right in the heart of Nanyuki town, on Lenana Road, off Mt Kenya Road, just off the main Nairobi–Nanyuki Highway. Within Sportsmans Arms Hotel.
            </div>    
        </div>
    </div>
</div>
<div class="background" id="background">
  <video autoplay muted loop playsinline id="bgVideo">
    <source src="uploads/WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  

  <button id="soundToggle" class="sound-toggle" aria-label="Toggle sound">
    <i class="fas fa-volume-mute"></i>
  </button>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Video sound toggle (keep existing)
    const bgVideo = document.getElementById('bgVideo');
    const soundToggle = document.getElementById('soundToggle');
    const soundIcon = soundToggle.querySelector('i');

    soundToggle.addEventListener('click', function() {
        bgVideo.muted = !bgVideo.muted;
        soundIcon.classList.toggle('fa-volume-mute');
        soundIcon.classList.toggle('fa-volume-up');
    });

    // Enhanced scroll animations with reset capability
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Remove and re-add animated class to retrigger animation
                entry.target.classList.remove('animated');
                void entry.target.offsetWidth; // Trigger reflow
                entry.target.classList.add('animated');
            } else {
                // Reset the element when it leaves viewport
                entry.target.classList.remove('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observe all elements
    animateElements.forEach(el => {
        // Initialize elements as not animated
        el.classList.remove('animated');
        observer.observe(el);
    });

    // Additional: Smooth scroll behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
</body>