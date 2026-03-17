<?php
ob_start();
session_start();
$pageTitle = "Psychotherapy Services";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.min.css">
    <link rel="stylesheet" href="assets/css/h-footer.min.css">
    <link rel="stylesheet" href="assets/css/therapyStyles.min.css">
</head>

<h1 class="therapy-heading animate-on-scroll">Organizational Development Services</h1>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-1.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2> Workplace Mental Health & Wellness</h2>
            <p>
                We help organizations create healthier workplaces through Employee Assistance Programs (EAP), 
                stress and burnout management, and mental health awareness training. Our experts also provide 
                psychological first aid to support staff during challenging times.
            </p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-2.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Leadership & Management Development</h2>
            <p>
                Strong leaders build strong teams. We equip managers and executives with skills in emotional 
                intelligence, conflict resolution, coaching, and change management—helping them lead with 
                clarity, empathy, and resilience. 
            </p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-3.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Team Building & Group Dynamics</h2>
            <p>
             We design interactive team-building retreats and workshops that strengthen collaboration, 
             trust, and morale. Our group dynamics sessions foster open communication and promote diversity, 
             equity, and inclusion for a more cohesive workforce.
            </p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-4.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Organizational Culture & Performance</h2>
            <p>
            A healthy culture drives productivity. We assess workplace wellness, develop employee engagement 
            strategies, and help organizations build positive, high-performing cultures that improve both 
            morale and results.
        </p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-5.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Training & Capacity Building</h2>
            <p>
                Our customized trainings cover resilience, work-life balance, trauma-informed care, 
                and peer-support systems. These programs empower staff with practical tools to thrive 
                both personally and professionally.
            </p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/org-6.webp" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Crisis & Conflict Intervention</h2>
            <p>
                When crises occur, organizations need timely support. We provide critical 
                incident stress debriefing, mediation services, and tailored crisis-response plans, 
                including suicide prevention and post-crisis recovery strategies.
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        let lastScrollPosition = window.pageYOffset;
        let ticking = false;
        
        // Track which elements have been animated
        const animatedElements = new Set();
        
        // Set index for staggered animations
        animateElements.forEach((el, index) => {
            el.style.setProperty('--index', index);
        });
        
        function checkPosition() {
            const currentScrollPosition = window.pageYOffset;
            const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
            
            animateElements.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                const elementBottom = el.getBoundingClientRect().bottom;
                const isVisible = (elementTop < window.innerHeight * 0.8) && (elementBottom > 0);
                
                // Always check visibility regardless of scroll direction
                if (isVisible) {
                    el.classList.add('animate');
                    animatedElements.add(el);
                } else {
                    // Remove animation class when element is out of view
                    // This ensures animations can trigger again when scrolled back into view
                    el.classList.remove('animate');
                    animatedElements.delete(el);
                }
            });
            
            lastScrollPosition = currentScrollPosition;
            ticking = false;
        }
        
        // More aggressive scroll handling
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(checkPosition);
                ticking = true;
            }
        }, { passive: true });
        
        // Initial check
        checkPosition();
        
        // Add intersection observer for more reliable detection
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                } else {
                    entry.target.classList.remove('animate');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        });
        
        animateElements.forEach(el => {
            observer.observe(el);
        });
        
        // Enhanced hover effects
        const therapySections = document.querySelectorAll('.therapy-section');
        therapySections.forEach(section => {
            section.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 10px 30px rgba(0, 111, 209, 0.1)';
                this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
            });
            
            section.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>