<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <link rel="stylesheet" href="assets/css/areasOfFocus.css">
    <title>Kazimind</title>
</head>


 <div class="mainB">
            <div class="section-container section">
    <h1 class="main-heading">Perinatal Health and Post-Partum Support</h1>
    <p class="intro-paragraph">
        <strong>Perinatal and Post-Partum</strong> support focuses on the emotional and physical well-being of women and their partners before, during, and after childbirth. 
        These stages can involve intense changes and challenges, and are often connected to experiences such as <strong>anxiety</strong>, <strong>depression</strong>, <strong>grief</strong>, <strong>trauma</strong>, and <strong>relationship shifts</strong>. 
        Many individuals and couples turn to <strong>Kazimind Wellness Centre</strong> for guidance and support during these transitional times.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">What is Perinatal Health?</h2>
    <p class="description">
        <strong>Perinatal health</strong> refers to the well-being of mothers and babies throughout the stages before, during, and after pregnancy. 
        This includes attention to <strong>physical health</strong>, <strong>nutrition</strong>, <strong>mental health</strong>, <strong>birthing experiences</strong>, <strong>pregnancy complications</strong>, 
        <strong>premature birth</strong>, <strong>breastfeeding challenges</strong>, <strong>pregnancy or infant loss</strong>, and many other aspects of maternal and infant wellness.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">What is Post-Partum?</h2>
    <p class="description">
        The <strong>post-partum</strong> period typically begins immediately after childbirth and lasts about six to eight weeks. 
        During this time, new mothers and parents may need support with <strong>nutrition</strong>, <strong>breastfeeding</strong>, <strong>healing from birth</strong>, <strong>sexual health</strong>, 
        <strong>identity shifts</strong>, <strong>relationship changes</strong>, and <strong>bonding with their baby</strong>.
        <br><br>
        Some may experience <strong>post-partum depression</strong> a more serious and lasting condition than the commonly experienced "baby blues." 
        If feelings of sadness, irritability, or anxiety persist beyond two weeks, or interfere with daily functioning or care for the baby, 
        it's important to seek help from a healthcare provider.
        <br><br>
        In rare cases, individuals may develop <strong>post-partum psychosis</strong>, which includes severe symptoms like <strong>hallucinations</strong>, <strong>confusion</strong>, <strong>paranoia</strong>, 
        or <strong>dangerous thoughts</strong>. If these symptoms occur, immediate medical attention is necessary. Support is available, and no one should feel ashamed to reach out for help.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">Is This Only Applicable to Women?</h2>
    <p class="description">
        While most post-partum care focuses on women or birthing parents, <strong>fathers and partners</strong> can also experience post-partum challenges. 
        Feelings of <strong>sadness</strong>, <strong>exhaustion</strong>, <strong>anxiety</strong>, and <strong>identity changes</strong> can impact anyone adjusting to life with a new baby. 
        Known as <strong>paternal post-partum depression</strong>, this can affect relationships, bonding with the baby, and overall mental health. 
        No matter your role in the family, your experiences are valid and support is available for all parents during this time.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">Types of Therapy and Support</h2>
    <p class="description">
        Therapy for perinatal and post-partum challenges will vary depending on your specific needs and goals. 
        At <strong>Kazimind Wellness Centre</strong>, our <strong>therapists</strong> use a variety of approaches to support clients during these important life transitions. 
        Some of the methods you may encounter include:
    </p>
    <div class="therapy-list">
        <ul>
            <li>Perinatal Nutrition Support and Planning</li>
            <li>Couples Therapy</li>
            <li>Family Therapy</li>
            <li>Parent-Child Attachment Work</li>
            <li>Cognitive Processing Therapy (CPT)</li>
            <li>Narrative Therapy</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <h2 class="sub-heading">Working with a Therapist</h2>
    <p class="description">
        We have several <strong>therapists</strong> who specialize in <strong>perinatal and post-partum wellness</strong>, and their profiles can be viewed below. 
        Once your <strong>therapist</strong> has had a chance to meet with you and learn about your experience, they’ll work with you to create a customized plan 
        to address the symptoms or challenges you’re facing. Since <strong>therapy</strong> is most effective when you feel safe and connected with your <strong>therapist</strong>, 
        we encourage you to explore consultations with multiple team members to find the right fit.
    </p>
</div>



        <div class="contact-button-container">
            <a href="contactUs.php" class="contact-button">
            CONTACT US FOR MORE MATCHING ASSISTANCE!
            </a>
        </div>


        
<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
</div>




