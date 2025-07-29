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

<div class="background2" id="background2"><span style="opacity: 100%;"></span></div>

<div class="areasOfFocusIntro scroll-animate">
  <h2>Areas of Focus</h2>
  <p>
    Our team at The Kazimnd Therapy Centre can support you with a variety of mental,
    physical, emotional and spiritual challenges. Some of the areas of focus that we support clients with
    can be seen below, along with information about which of our therapists works with that presenting need.
  </p>
</div>

<div class="areasOfFocus-images scroll-animate">

  <div class="focus-item">
    <div class="focus-image-container">
      <img src="images/trauma.jpg" alt="Trauma">
      <div class="focus-overlay"></div>
    </div>
    <a href="trauma.php"><p>Trauma</p></a>
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/gender.jpg" alt="Gender and Sexuality">
    <div class="focus-overlay"></div>
    </div>    
   <a href="genderAndS.php"><p>Gender and <br>Sexuality</p></a> 
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/meditation.jpg" alt="Mid-Body Connection">
    <div class="focus-overlay"></div>
    </div>   
    <a href="bodyAndMind.php"><p>Mid-Body<br>Connection</p></a> 
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/marriage.jpg" alt="Marriage Preparation">
        <div class="focus-overlay"></div>
    </div>   
    <a href="mariage-prep.php"><p>Marriage<br>Preparation</p></a>
  </div>
</div>

<div class="areasOfFocus-images scroll-animate">
  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/couple.jpg" alt="Couples Therapy">
    <div class="focus-overlay"></div>
    </div>   
    <a href="couples.php"><p>Couples Therapy</p></a> 
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/child.jpg" alt="Child and Youth Therapy">
        <div class="focus-overlay"></div>
    </div>   
    <a href="child.php"><p>Child and Youth<br>Therapy</p></a> 
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/parent.jpg" alt="Perinatal Health and Post-Partum Support">
    <div class="focus-overlay"></div>
    </div>   
    <a href="perinatalHealth.php"><p>Perinatal Health <br>and Post-Partum <br>Support</p></a> 
  </div>

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/loss.jpg" alt="Grief and Loss">
        <div class="focus-overlay"></div>
    </div>   
    <a href="griefAndLoss.php"><p>Grief and Loss</p></a> 
  </div>
</div>




<div class="areasOfFocus-images scroll-animate">

  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/depession.jpg" alt="Anxiety and Depression">
            <div class="focus-overlay"></div>
    </div>   
   <a href="axietyandDep.php"><p>Anxiety and<br>Depression</p></a> 
  </div>
  <!-- <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/pain.jpg" alt="Chronic and Acute Body Pain">
        <div class="focus-overlay"></div>
    </div>   
   <a href="cronicPain.php"><p>Chronic and Acute<br>Body Pain</p></a>
  </div> -->
  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/suiside.jpg" alt="Suicide and Self-Harm">
        <div class="focus-overlay"></div>
    </div>  
    <a href="selfHarm.php"><p>Suicide and Self-<br>Harm</p></a> 
  </div>
  <div class="focus-item">
    <div class="focus-image-container">
    <img src="images/depresion.jpg" alt="Stress Management">
      <div class="focus-overlay"></div>
    </div>  
    <a href="stressMag.php"><p>Stress Management</p></a> 
  </div>
</div>


<!-- Additional focus image sections with same structure -->

<div class="matching-assistance scroll-animate">
   <a href="contactUs.php">NOT SURE WHO TO SEE? CONTACT US FOR MATCHING ASSISTANCE!</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll animations with reset capability
    const animateElements = document.querySelectorAll('.scroll-animate');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            } else {
                entry.target.classList.remove('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animateElements.forEach(el => observer.observe(el));
});
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
</body>