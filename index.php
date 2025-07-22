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
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <title>Kazimind</title>
</head>

<div class="welcome" id="welcome">
  <div class="background-overlay bg1" id="bg1"></div>
  <div class="background-overlay bg2" id="bg2"></div>

  <div class="welcome-message">
    <h2>WELCOME TO</h2>
    <h1 class="animate__animated animate__zoomInRight animate__delay-0.5s">Kazimind</h1>
    <p>Our goal is to create a safe and supportive environment to help both clients and therapists grow to their full potential.</p>
  </div>
  <button type="button" onclick="window.location.href='aboutUs.php'">Our Story</button>
</div>



 <p class="brief-overview">
  <mark> Kazimind Wellness Centre </mark>is a health and wellness centre focused on providing mental related services to individuals, 
    groups and families across  Kenya. Our therapists provide services for clients in office, in the community and online so that no matter where you reside
    you’re able to get the support you need.
    <hr>
 </P>


 <div class="topic-handled">
  <p class="topic-intro">
   <mark> Our team members have experience working </mark> with a variety of topics and challenges, 
    and can support you with whatever is going on for you including the following: 
  </p>

  <div class="topic-handled-lists">

<ul>
  <li>Anxiety and Depression</li>
  <li>Chronic and Acute Body Pain</li>
  <li>Stress Management</li>
  <li>Trauma, PTSD and C-PTSD</li>
  <li>Gender and Sexuality</li>
  <li>Nutrition Planning and Counselling</li>
  <li>Body Image</li>
  <li>Mind-Body Connection</li>
  <li>Corporate Mental Health Talks</li>
</ul>

<ul>
  <li>Self-Esteem</li>
  <li>Communication</li>
  <li>Marriage Preparation</li>
  <li>Anger Management</li>
  <li>Neurodiversity, ADHD and ASD</li>
  <li>Suicide and Self-Harm</li>
  <li>Attachment</li>
  <li>One On One Therapy</li>
  <li>Teen Therapy</li>
</ul>

<ul>
  <li>Grief and Loss</li>
  <li>Perinatal Health and Post-Partum Support</li>
  <li>Substance Use and Recovery</li>
  <li>Couples Therapy</li>
  <li>Family Therapy</li>
  <li>Child therapy </li>
  <li>Youth Training workshop</li>
  <li>Student Personal Therapy</li>
</ul>

<a href="contactUs.php" style="text-decoration: none;">Reach out to us to book your consult today.</a>
</div>
</div>


  <div class="section-cards">
    <div class="card card-team">
      <div class="card-content">
        <h2>Meet Our Team</h2>
        <p>
          Great therapy requires a great connection. Take a look at the therapists that work with us and
          we’re sure you’ll find someone you’ll feel good about.
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

<!-- upcoming events -->
<div class="upcoming-events">
  <h2>Upcoming Events and Workshops at <span>Kazimind</span></h2>

        <div class="scroll-wrapper-with-buttons">
          <button class="scroll-btn left">&#10094;</button>

          <div class="events-scroll-wrapper" id="events-scroll">
            <div class="events-container">
              <?php include 'fetch_events.php'; ?>
            </div>
          </div>

          <button class="scroll-btn right">&#10095;</button>
        </div>

</div>
  <div class="event-buttons">
   <a href="services.php"><button>VIEW ALL OUR GROUPS AND PROGRAMS</button></a> 
   <a href="upComingEvents.php"><button>VIEW OUR UPCOMING EVENTS CALENDAR</button></a> 
  </div>

<!-- Articles section -->

 <div class="articles">
  <div class="intro">
    <h2>Articles and Tips</h2>
    <p>
      Looking to meet our team members or <mark> learn information and strategies to support yourself?</mark>
      We’ll share information and tips here to support the cultivation of your mind.
    </p>
    <p>
      If there’s any content you’d like to know more about feel free to 
      <a href="contactUs.php" class="reach-out"><strong>reach out</strong></a> to us to let us know!
    </p>
    <!-- <button class="view-button">View Past Articles</button> -->
  </div>

  <div class="articles-grid">
    <div class="article-card">
      <img src="images/junkfood.jpg" alt="Emotional Eating">
      <h3>Break Free from Emotional Eating: </h3>
      <!-- <p class="meta">Feb 10, 2025 · <span>Lauren Gilbey RD, CDE</span></p> -->
      <p class="excerpt">
        Emotional eating is something many of us struggle with—turning to food for comfort, stress relief, or to cope with difficult emotions...
      </p>
    </div>

    <div class="article-card">
      <img src="images/axietyDisOrder.jpg" alt="CBT for Anxiety">
      <h3>Cognitive-Behavioural Therapy (CBT) for Social Anxiety Disorder</h3>
      <!-- <p class="meta">Feb 4, 2025 · <span>Kendra Michano, BSW RSW</span></p> -->
      <p class="excerpt">
        One of the most well-known psychological treatments for anxiety disorders is cognitive-behavioural therapy...
      </p>
    </div>
  </div>
</div>

<script>
  
  document.addEventListener('DOMContentLoaded', function () {
    
    const scrollContainer = document.getElementById('events-scroll');
    const leftBtn = document.querySelector('.scroll-btn.left');
    const rightBtn = document.querySelector('.scroll-btn.right');

    leftBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
    });

    rightBtn.addEventListener('click', () => {
        scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
    });

  const marks = document.querySelectorAll('mark');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
      } else {
        entry.target.classList.remove('animate');
      }
    });
  }, {
    threshold: 0.6 // visible 60% or more to trigger
  });

  marks.forEach(mark => observer.observe(mark));

});

const images = [
  "images/frontDesk.jpg",
  "images/imageB.jpg",
  "images/imageB1.jpg",
  "images/imageB4.jpg",
  "images/imageb3.jpg",
  "images/imageB5.jpg",
  "images/imageB6.jpg"
];

images.forEach(src => {
  const img = new Image();
  img.src = src; // preload
});

let current = 0;
let showingBg1 = true;

const bg1 = document.getElementById('bg1');
const bg2 = document.getElementById('bg2');

// Initial image
bg1.style.backgroundImage = `url('${images[current]}')`;

function crossFadeBackground() {
  current = (current + 1) % images.length;

  if (showingBg1) {
    bg2.style.backgroundImage = `url('${images[current]}')`;
    bg2.style.opacity = 1;
    bg1.style.opacity = 0;
  } else {
    bg1.style.backgroundImage = `url('${images[current]}')`;
    bg1.style.opacity = 1;
    bg2.style.opacity = 0;
  }

  showingBg1 = !showingBg1;
}

setInterval(crossFadeBackground, 8000);

</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>


