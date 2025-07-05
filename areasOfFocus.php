<?php
$pageTitle = "Book Now";
ob_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <title>Kazimind</title>
</head>

<div class="background2" id="background2"><span style="opacity: 100%;"></span></div>

<div class="areasOfFocusIntro">
  <h2>Areas of Focus</h2>
  <p>
    Our team at The Kazimnd Therapy Centre can support you with a variety of mental,
    physical, emotional and spiritual challenges. Some of the areas of focus that we support clients with
    can be seen below, along with information about which of our therapists works with that presenting need.
  </p>
</div>


<div class="areasOfFocus-images">
  <div class="focus-item">
    <img src="images/trauma.jpg" alt="Trauma">
    <a href="trauma.php"><p>Trauma</p></a>
  </div>
  <div class="focus-item">
    <img src="images/gender.jpg" alt="Gender and Sexuality">
   <a href="genderAndS.php"><p>Gender and <br>Sexuality</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/meditation.jpg" alt="Mid-Body Connection">
    <a href="bodyAndMind.php"><p>Mid-Body<br>Connection</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/marriage.jpg" alt="Marriage Preparation">
    <a href="mariage-prep.php"><p>Marriage<br>Preparation</p></a>
  </div>
</div>

<div class="areasOfFocus-images">
  <div class="focus-item">
    <img src="images/couple.jpg" alt="Couples Therapy">
    <a href="couples.php"><p>Couples Therapy</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/child.jpg" alt="Child and Youth Therapy">
    <a href="child.php"><p>Child and Youth<br>Therapy</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/parent.jpg" alt="Perinatal Health and Post-Partum Support">
    <a href="perinatalHealth.php"><p>Perinatal Health <br>and Post-Partum <br>Support</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/loss.jpg" alt="Grief and Loss">
    <a href="griefAndLoss.php"><p>Grief and Loss</p></a> 
  </div>
</div>



<div class="areasOfFocus-images">
  <div class="focus-item">
    <img src="images/depession.jpg" alt="Anxiety and Depression">
   <a href="axietyandDep.php"><p>Anxiety and<br>Depression</p></a> 
  </div>
  <!-- <div class="focus-item">
    <img src="images/pain.jpg" alt="Chronic and Acute Body Pain">
   <a href="cronicPain.php"><p>Chronic and Acute<br>Body Pain</p></a>
  </div> -->
  <div class="focus-item">
    <img src="images/suiside.jpg" alt="Suicide and Self-Harm">
    <a href="selfHarm.php"><p>Suicide and Self-<br>Harm</p></a> 
  </div>
  <div class="focus-item">
    <img src="images/depresion.jpg" alt="Stress Management">
    <a href="stressMag.php"><p>Stress Management</p></a> 
  </div>
</div>

<!-- <div class="areasOfFocus-images">
  <div class="focus-item">
    <img src="images/selfharm.jpg" alt="Reiki Energy Healing ">
    <a href="reikiHealing.php"><p>Reiki Energy <br> Healing </p></a> 
  </div>
  <div class="focus-item">
    <img src="images/depressed.jpg" alt="Reduced Fee Therapy">
  <a href="reduced-fee-therapy.php"><p>Reduced Fee <br> Therapy</p></a>  
  </div>
</div> -->

<div class="matching-assistance">
   <a href="contactUs.php">NOT SURE WHO TO SEE? CONTACT US FOR MATCHING ASSISTANCE!</a>
</div>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>

</body> 