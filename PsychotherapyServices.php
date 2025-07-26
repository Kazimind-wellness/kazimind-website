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
<link rel="stylesheet" href="assets/css/therapyStyles.css">
</head>

<h1 class="therapy-heading">Psychotherapy Services</h1>

<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images\individualtherap.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Individual Therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                	Individual Therapy is where you get an opportunity to meet one on one with our therapist. 
                    Our therapists help individuals to navigate life challenges and reflect on their past experiences. 
                    Our therapist focuses on anxiety, depression, trauma, stress, loss and grief.  
                    They equip clients with skills that would them navigate life challenges and help them regain resilience.
            </p>
        </div>
    </div>
</div>


<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images\teenTherap.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Teen Therapy and Child therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                Young adults are facing challenges too when it comes to self-awareness, decision making. 
                We have child psychologist who helps teens to navigate this life, school pressures to build skills for healthier future. 
                Approaches used Play and Art therapy help teens and children to express their emotions. 
            </p>
        </div>
    </div>
</div>


<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/couple2.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Couples / Partner Therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                If you and your partner are facing challenges in your marriage, you can lock in with our family 
                and marriage therapist, who helps partner navigate and resolve their issues more effectively and 
                encourage growth and self-awareness within the relationship
            </p>
        </div>
    </div>
</div>




<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images\a-family.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Family Therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                Family therapy can be way to strengthen relationship within the family may it be communication skills within family, siblings. This consists of mother, father and children. We have therapist that can help.
            </p>
        </div>
    </div>
</div>


<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/walkAndTalk.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Walk and Talk Therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                Walk and Talk Therapy is a form of psychotherapy that incorporates walking outdoors 
                while talking about issues and problem-solving with your therapist. 
                Depending on your preferences, your therapist may also incorporate aspects of 
                mindfulness that integrates physical movement and observation of your natural surroundings. 
                The location is agreed upon between client and therapist before the session.
            </p>
        </div>
    </div>
</div>

<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images\student.png" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Student personal Therapy</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                We offer personal therapy to students in college, universities waiting to graduate. 
                Our services are available online and physical.
            </p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
