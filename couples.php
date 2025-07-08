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
                <h1 class="main-heading"> Couples Therapy </h1>
                <p class="intro-paragraph">
                <strong>Couples Therapy</strong> offers partners a chance to explore and address challenges in their relationship with the guidance of a supportive, neutral third party. It provides a space to process shared experiences and work through issues such as <strong>attachment</strong>, <strong>intimacy</strong>, and <strong>life transitions</strong>. At <strong>Kazimind Wellness Centre</strong>, we support couples at every stage of their relationship—whether you’re just starting out or have been together for years.

                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Why Would People Access Couples Therapy?</h2>
                <p class="description">
              People seek out <strong>Couples Therapy</strong> for many different reasons, such as navigating relationship changes, communication difficulties, <strong>fertility</strong> and <strong>family planning</strong> concerns, inter-faith or inter-cultural dynamics, <strong>trust issues</strong>, intimacy struggles, or the impact of <strong>mental health</strong> on the relationship. Talking with a neutral third party in a safe and supportive space can help both partners feel heard and understood. Our <strong>therapists</strong> are trained in effective approaches to <strong>conflict resolution</strong> and <strong>communication</strong>, and can help you build the tools needed to move forward together.
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Do You Only See Monogamous Partners?</h2>
                <p class="description">
                 No. Our practitioners support monogamous, non-monogamous and open relationships. 
                 We’re here to support you and your partner(s) 
                 in whatever way works for you, whether that’s working together as a group or in dyadics. 
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Types of Therapy and Support</h2>
                <p class="description">
                <strong>Couples Therapy</strong> can vary depending on your unique needs as a couple and the therapeutic approach your <strong>therapist</strong> uses. Some therapists work exclusively with partners together, while others may also include occasional individual check-ins. Every <strong>therapist</strong> has their own method of supporting couples, but some of the therapeutic approaches you might encounter at <strong>Kazimind Wellness Centre</strong> include:
                </p>
                <div class="therapy-list">
                    <ul>
                        <li>The Gottman Method </li>
                        <li>Emotion Focused Couples Therapy</li>
                        <li>Narrative Therapy</li>
                        <li>Solution Focused Therapy </li>
                        <li>Marriage Preparation Sessions</li>
                    </ul>
                </div>

            </div>

            <div class="section-container">
                <h2 class="sub-heading">Working with a Therapist</h2>
                <p class="description">
                    Our office has a number of <strong>therapists</strong> who specialize in working with <strong>couples and partners</strong>, and you can view their profiles below. 
                    After meeting with you and completing a thorough assessment, your <strong>therapist</strong> will work with you and your partner(s) to create a personalized plan 
                    to address the issues or patterns that may be affecting your relationship. <strong>Therapy</strong> is most effective when there is a strong connection between the 
                    <strong>therapist</strong> and clients, so we encourage you to consult with as many therapists as needed to find the right fit for your relationship journey.
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




