<?php
ob_start();
session_start();
$pageTitle = "Book Now";
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
    <title>Kazimind</title>
</head>

<p class="brief-overview">
  “At KaziMind Wellness, we believe that every mind has the potential to grow, heal, and thrive. Just like a garden, the mind requires care, patience, and the right tools to flourish.

Our work is rooted in cultivating resilience, clarity, and balance guiding individuals, families, and organizations to discover strength within themselves. When we cultivate minds, we nurture communities, workplaces, and generations to come.” <br>

“When we cultivate minds, we cultivate life.”
    <hr>
</p>

<div class="welcome" id="welcome">
  <div class="background-overlay bg1" id="bg1"></div>
  <div class="background-overlay bg2" id="bg2"></div>
  <div class="welcome-content">
    <h1 class="welcome-title">Welcome to Our Centre</h1>
    <p class="welcome-subtitle">Professional care in a compassionate environment where healing begins and growth is nurtured</p>
    <!-- <button class="cta-button">Schedule a Consultation</button> -->
  </div>

  <div class="moving-message">
    <p>Our goal is to create a safe and supportive environment to help both clients and therapists grow to their full potential.  • Compassion • Understanding • Growth • Healing </p>
  </div>
</div>



<div class="topic-handled">
          <div class="bubble-container">
            <!-- Bubbles will be added here dynamically -->
        </div>
            <script>
        const container = document.querySelector('.bubble-container');
        const bubbleCount = 50;

        function createBubble() {
            const bubble = document.createElement('div');
            bubble.classList.add('bubble');

            const size = Math.random() * 40 + 15 + 'px';
            const left = Math.random() * 100 + '%';
            const delay = Math.random() * 8 + 's';
            const duration = Math.random() * 10 + 8 + 's';
            const sway = Math.random() > 0.5 ? 1 : -1;

            bubble.style.setProperty('--size', size);
            bubble.style.setProperty('--left', left);
            bubble.style.setProperty('--delay', delay);
            bubble.style.setProperty('--duration', duration);
            bubble.style.setProperty('--sway', sway);

            bubble.style.animationDuration = duration;

            // Add slight color variation
            if (Math.random() > 0.7) {
                bubble.style.background = `radial-gradient(
                    circle at 30% 30%, 
                    rgba(255, 255, 255, 0.9) 5%, 
                    rgba(200, 230, 255, 0.6) 30%, 
                    rgba(170, 220, 255, 0.3) 90%
                )`;
            }

            container.appendChild(bubble);

            // Remove bubble after animation completes
            setTimeout(() => {
                if (bubble.parentNode) {
                    bubble.remove();
                }
            }, parseFloat(duration) * 1000 + parseFloat(delay) * 1000);
        }

        // Create initial bubbles
        for (let i = 0; i < bubbleCount; i++) {
            setTimeout(createBubble, Math.random() * 2000);
        }

        // Continue creating bubbles
        setInterval(createBubble, 500);
    </script>
  <p class="topic-intro">
    In our therapy sessions, we address a wide range of topics designed to enhance mental and 
    emotional well-being. Guided by our philosophy of Cultivating Minds, we focus on the areas 
    below to support growth, healing, and resilience.  
  </p>

  <div class="topic-handled-lists">
    <ul>
      <li><span>Anxiety and Depression</span></li>
      <!-- <li><span>Chronic and Acute Body Pain</span></li> -->
      <li><span>Stress Management</span></li>
      <li><span>Trauma, PTSD and C-PTSD</span></li>
      <li><span>Gender and Sexuality</span></li>
      <li><span>Eating Disorders</span></li>
      <li><span>Body Image</span></li>
      <!-- <li><span>Corporate Mental Health Talks</span></li> -->
    </ul>

    <ul>
      <li><span>Self-Esteem</span></li>
      <li><span>Communication and social skills</span></li>
      <li><span>Marriage Preparation</span></li>
      <li><span>Anger Management</span></li>
      <li><span>Neurodiversity, ADHD and ASD</span></li>
      <li><span>Suicide and Self-Harm</span></li>
      <!-- <li><span>One On One Therapy</span></li> -->
      <!-- <li><span>Teen Therapy</span></li> -->
    </ul>
    
    <ul>
      <li><span>Grief and Loss</span></li>
      <li><span>Prenatal Health and Post-Partum Support</span></li>
      <li><span>Substance Use and Recovery</span></li>
      <li><span>Attachment Disorders / Attachment styles</span></li>
      <li><span>Mind-Body Connection</span></li>
      <!-- <li><span>Couples Therapy</span></li> -->
      <!-- <li><span>Family Therapy</span></li> -->
      <!-- <li><span>Child therapy</span></li> -->
      <!-- <li><span>Youth Training workshop</span></li> -->
      <!-- <li><span>Student Personal Therapy</span></li> -->
    </ul>
  </div>
  <a href="contactUs.php" class="topic-link">Cultivate Today.</a>
</div>

<div class="section-cards">
  <div class="card card-team">
    <div class="card-content">
      <h2>Meet Our Team</h2>
      <p>
        Great therapy requires a great connection. Take a look at the team that work with us and
        we're sure you'll find someone you'll feel good about.
      </p>
      <a href="ourTeam.php" class="card-btn">Our Team</a>
    </div>
  </div>

  <div class="card card-services">
    <div class="card-content">
      <h2>What We Offer</h2>
      <p>
        Are you dealing with physical, mental, spiritual or emotional pain? We can help. Check out our
        services to explore the options we offer.
      </p>
      <a href="services.php" class="card-btn">Our Services</a>
    </div>
  </div>
</div>

<div class="upcoming-events">
  <h2>Upcoming Events and Workshops at <span>Kazimind</span></h2>

  <div class="scroll-wrapper-with-buttons">
    <button class="scroll-btn left" aria-label="Scroll left">&#10094;</button>
    <div class="events-scroll-wrapper" id="events-scroll">
      <div class="events-container">
        <?php include 'fetch_events.php'; ?>
      </div>
    </div>
    <button class="scroll-btn right" aria-label="Scroll right">&#10095;</button>
  </div>
</div>

<div class="event-buttons">
  <a href="services.php"><button>VIEW ALL OUR GROUPS AND PROGRAMS</button></a> 
  <a href="upComingEvents.php"><button>VIEW OUR UPCOMING EVENTS CALENDAR</button></a> 
</div>

<div class="articles">
  <div class="intro">
    <h2>Articles and Tips</h2>
    <p>
      Looking to meet our team members or learn information and strategies to support yourself?
      We'll share information and tips here to support the cultivation of your mind.
    </p>
    <p>
      If there's any content you'd like to know more about feel free to 
      <a href="contactUs.php" class="reach-out"><strong>reach out</strong></a> to us to let us know!
    </p>
  </div>

  <div class="articles-grid">
    <div class="article-card">
      <div class="article-image-container">
        <img src="images/junkfood.jpg" alt="Emotional Eating" class="article-image">
      </div>
      <h3>Break Free from Emotional Eating</h3>
      <p class="excerpt">
        Emotional eating is something many of us struggle with—turning to food for comfort, stress relief, or to cope with difficult emotions...
      </p>
      <div class="read-more-overlay">
        <span>Read More</span>
      </div>
    </div>

    <div class="article-card">
      <div class="article-image-container">
        <img src="images/axietyDisOrder.jpg" alt="CBT for Anxiety" class="article-image">
      </div>
      <h3>Cognitive-Behavioural Therapy (CBT) for Social Anxiety Disorder</h3>
      <p class="excerpt">
        One of the most well-known psychological treatments for anxiety disorders is cognitive-behavioural therapy...
      </p>
      <div class="read-more-overlay">
        <span>Read More</span>
      </div>
    </div>
  </div>
</div>
<!-- COOKIES WE VALUE YOUR PRIVACY BANNER POP-UP CODE STARTS HERE  -->

<style>
  .cookie-banner {
  position: fixed;
  bottom: 20px;
  left: 20px;
  right: 20px;
  background: #222;
  color: #fff;
  padding: 15px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0px 4px 6px rgba(0,0,0,0.2);
  z-index: 9999;
}
.cookie-banner button {
  margin: 0 10px;
  padding: 8px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.cookie-banner button:first-child {
  background: #4CAF50;
  color: #fff;
}
.cookie-banner button:last-child {
  background: #f44336;
  color: #fff;
}

</style>

<div id="cookie-banner" class="cookie-banner">
  <p>We value your privacy 🍪. </p>
  <P>We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. 
    By clicking "Accept", you consent to our use of cookies</p>
  <button onclick="acceptCookies()">Accept</button>
  <button onclick="declineCookies()">Decline</button>
</div>

<script>
// Check if user has already made a choice
window.onload = function() {
  if (getCookie("cookieConsent")) {
    // document.getElementById("cookie-banner").style.display = "none";
  }
};

function acceptCookies() {
  setCookie("cookieConsent", "accepted", 365);
  document.getElementById("cookie-banner").style.display = "none";
}

function declineCookies() {
  setCookie("cookieConsent", "declined", 365);
  document.getElementById("cookie-banner").style.display = "none";
}

// Helper functions
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    let date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
  let nameEQ = name + "=";
  let ca = document.cookie.split(';');
  for(let i=0;i < ca.length;i++) {
    let c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

</script>
<!-- COOKIES WE VALUE YOUR PRIVACY BANNER POP-UP CODE ENDS HERE  -->


<script>
document.addEventListener('DOMContentLoaded', function () {
  // Background image crossfade (keep existing)
const images = [
    "images/imageB.jpg",
    "images/imageB1.jpg",
    "images/imageB2.jpg",
    "images/imageB3.jpg",
    "images/imageB4.jpg",
    "images/imageB5.jpg",
    "images/imageB6.jpg",
    "images/imageB7.jpg"
];

// Preload images with callback when all are loaded
let loadedImages = 0;
images.forEach(src => {
    const img = new Image();
    img.src = src;
    img.onload = () => {
        loadedImages++;
        if (loadedImages === images.length) {
            // All images loaded, start slideshow
            initSlideshow();
        }
    };
});

function initSlideshow() {
    let current = 0;
    let showingBg1 = true;
    const bg1 = document.getElementById('bg1');
    const bg2 = document.getElementById('bg2');
    
    // Set initial background with zoom effect
    bg1.style.backgroundImage = `url('${images[current]}')`;
    bg1.style.transform = 'scale(1.05)';
    setTimeout(() => {
        bg1.style.transform = 'scale(1)';
    }, 100);

    function crossFadeBackground() {
        current = (current + 1) % images.length;
        const nextImage = images[current];
        
        if (showingBg1) {
            bg2.style.backgroundImage = `url('${nextImage}')`;
            bg2.style.opacity = 1;
            bg2.style.transform = 'scale(1.05)';
            bg1.style.opacity = 0;
            
            setTimeout(() => {
                bg2.style.transform = 'scale(1)';
            }, 100);
        } else {
            bg1.style.backgroundImage = `url('${nextImage}')`;
            bg1.style.opacity = 1;
            bg1.style.transform = 'scale(1.05)';
            bg2.style.opacity = 0;
            
            setTimeout(() => {
                bg1.style.transform = 'scale(1)';
            }, 100);
        }
        showingBg1 = !showingBg1;
    }
    
    // Function to start the automatic animation
    function startAnimation(element) {
        // Reset any existing animation
        stopAnimation(element);
        
        // Set initial state
        element.style.transform = 'scale(1) translate(0, 0)';
        
        // Start the animation loop
        element.animationInterval = setInterval(() => {
            // Calculate progress through a 20-second cycle (can adjust timing)
            const now = Date.now();
            const cycleTime = 20000; // 20 seconds for full cycle
            const progress = (now % cycleTime) / cycleTime;
            
            // Calculate movement values (subtle side-to-side and zoom)
            const moveX = Math.sin(progress * Math.PI * 2) * 20; // ±20px horizontal movement
            const moveY = Math.cos(progress * Math.PI * 2) * 10; // ±10px vertical movement
            const scale = 1 + (Math.sin(progress * Math.PI * 4) * 0.02); // 1-1.04 scale oscillation
            
            // Apply the transformation
            element.style.transform = `scale(${scale}) translate(${moveX}px, ${moveY}px)`;
            element.style.transition = 'transform 8s linear';
        }, 50); // Update every 50ms for smooth animation
    }
    
    // Function to stop animation
    function stopAnimation(element) {
        if (element.animationInterval) {
            clearInterval(element.animationInterval);
            element.animationInterval = null;
        }
    }
    
    setInterval(crossFadeBackground, 8000);
    
    // Start animation for initial background
    startAnimation(bg1);
}

  // Event scroll buttons (keep existing)
  const scrollContainer = document.getElementById('events-scroll');
  const leftBtn = document.querySelector('.scroll-btn.left');
  const rightBtn = document.querySelector('.scroll-btn.right');

  leftBtn.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
  });

  rightBtn.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
  });

  // NEW: Enhanced Intersection Observer with reset capability
  const animatedElements = document.querySelectorAll(
    '.card-content, .article-card, .intro, .topic-intro, .topic-handled-lists ul, .event-card, .event-buttons, .brief-overview, mark, .upcoming-events'
  );

  const observerOptions = {
    threshold: 0.2,
    rootMargin: "0px 0px -50px 0px"
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Reset animation by removing and re-adding class
        entry.target.classList.remove('animate-visible');
        void entry.target.offsetWidth; // Trigger reflow
        entry.target.classList.add('animate-visible');
        
        // Special handling for mark elements
        if (entry.target.tagName === 'MARK') {
          entry.target.style.backgroundPosition = '100%';
          void entry.target.offsetWidth;
          entry.target.style.backgroundPosition = '0%';
        }
      } else {
        // Reset the element's state when it leaves view
        entry.target.classList.remove('animate-visible');
        if (entry.target.tagName === 'MARK') {
          entry.target.style.backgroundPosition = '100%';
        }
      }
    });
  }, observerOptions);

  // Observe all elements
  animatedElements.forEach(el => {
    observer.observe(el);
    // Initialize mark elements
    if (el.tagName === 'MARK') {
      el.style.backgroundPosition = '100%';
    }
  });

  // Hover effects for topic lists (keep existing)
  document.querySelectorAll('.topic-handled-lists li span').forEach(item => {
    item.addEventListener('mouseenter', function() {
      this.style.transform = 'translateX(5px)';
    });
    item.addEventListener('mouseleave', function() {
      this.style.transform = 'translateX(0)';
    });
  });
});
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>