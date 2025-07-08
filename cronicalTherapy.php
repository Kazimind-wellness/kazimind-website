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
<link rel="stylesheet" href="assets/css/therapyStyles.css">

</head>

<h1 class="therapy-heading">Biodynamic Craniosacral Therapy</h1>

<p class="reiki">
   Biodynamic Craniosacral Therapy is a soft touch and subtle alternative healing modality that allows our bodies
    to return to a sense of wholeness and health. It can help us to come into relationship with our bodies allowing 
    the space to process. This helps to restore balance and health to our nervous system, musculoskeletal system, 
    circulatory system and organs to name a few.
</p>

<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images/services_image7.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Biodynamic Craniosacral Therapy </h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                As we do our best to cope with life, unprocessed life events may be held in our bodies. 
                Biodynamic Craniosacral Therapy can help us to come into relationship with our bodies allowing
                 the space to process which helps to restore balance and health to our nervous system, musculoskeletal system, 
                 circulatory system and organs to name a few. This may result in reduced pain, better sleep, clarity of thoughts, better digestion and improved mental health. These sessions are in office only.
            </p>
        </div>
    </div>
</div>

<div class="therapy-section">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="images\desk.jpg" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Online Body Wisdom Session</h2>
            <!-- <a href="#" class="btn-book">Book an Individual Therapy Appointment</a> -->
            <p>
                Online Body Wisdom sessions are offered when you aren’t able to come into the office for 
                a Biodynamic Craniosacral Therapy appointment as a way to help you connect with what is 
                happening in your system. Together, we explore the sensations and feelings you are noticing 
                and support you in being with them. Often, being present with your body sensations and feelings 
                can allow for transformation to occur. 
            </p>   
            </div>
    </div>
</div>



<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
