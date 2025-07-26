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
    <link rel="stylesheet" href="assets/css/areasOfFocus.css">
    <title>Kazimind</title>
</head>

 <div class="mainB">


            <div class="section-container section">
                <h1 class="main-heading">Trauma, PTSD and C-PTSD</h1>
                <p class="intro-paragraph">
                    <strong>Trauma </strong>  
                     can happen to anyone and can cause significant distress and disruption. Trauma can come from “Big T Trauma” 
                     events like war or assault, and it can also come from “small t trauma” events like medical challenges, relocation, 
                     or accidents that were just barely avoided. The majority of our therapist are Kazimind wellness Centre 
                     work with trauma, and we can support you however you need  through debriefing, processing or problem solving.
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">What is Trauma?  </h2>
                <p class="description">
                Trauma is when we experience some type of event that our brain and / or body perceives to be very distressing, 
                frightening, disturbing, life-threatening or stressful. It could be something that happens one time (like a car accident) 
                or something that happens on an on-going basis (like abuse or neglect). What is traumatic for one person isn’t always traumatic 
                for another person, and there are different types of trauma that can impact people in different ways. If you feel like you’ve been 
                through an experience that you can’t let go of, or that continues to cause distress or disturbance in your life, you may benefit from trauma therapy. 
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">What is the Difference Between PTSD and C-PTSD?</h2>
                <p class="description">
                <strong> Post-Traumatic Stress Disorder (PTSD)</strong> and <strong> Complex-PTSD (C-PTSD)</strong> are diagnoses people may receive after experiencing traumatic event(s). While PTSD 
                usually comes from a single incident trauma (think of a car accident, or a traumatic birth), C-PTSD tends to develop because of chronic or repeated 
                trauma (think of on-going abuse, bullying, or victims of kidnapping). <br><br>
                Both PTSD and C-PTSD can result in the development of disrupting symptoms such as feeling on edge, re-experiencing or flashing back 
                to the event, dissociation, avoiding people or places that remind you of the event, and feeling disconneted or distant from other people. 
                If you are struggling with any of these things, regardless of if you have a diagnosis or not, you can reach out to our office for support 
                and we will support you through it. 
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">What Does “Trauma-Informed” Mean? </h2>
                <p class="description">
                On some therapist profiles you might see the words <strong>Trauma-Informed</strong>, trauma-informed care or trauma-informed practice. 
                This means that though the therapist tioner doesn’t have specified training in processing trauma, they understand and incorporate 
                into their practice an understanding of how trauma works and how it can impact a person. It’s a shift from focusing on “What’s 
                wrong with you?” to “What happened to you?”
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Types of Therapy and Support</h2>
                <p class="description">
                    Therapy for trauma will be customized based on what you need want from therapy. Each therapist will have their own approach to 
                    dealing with trauma, but some of the approaches you might experience at Kazimind Wellness Centre include: 
                </p>
                <div class="therapy-list">
                    <ul>
                        <li>Cognitive Processing Therapy (CPT)</li>
                        <li>Internal Family Systems (IFS)</li>
                        <li>Somatic Experiencing</li>
                        <li>Accelerated Experiential Dynamic Psychotherapy (AEDP)</li>
                        <li>Cognitive Behavioural Therapy (CBT) </li>
                        <li>Dialectical Behavioural Therapy (DBT) </li>
                        <li>Narrative Therapy </li>
                        <li>Play Therapy </li>
                        <li>Sandtray Therapy</li>
                    </ul>
                </div>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Working with a therapist</h2>
                <p class="description">
                    Our office has a number of professionals who work with trauma, who you can view below. 
                    Once your therapist has met with you and completed their assessment they will make a 
                    plan with you to address the symptoms or causes that may be negatively impacting your life. 
                    Therapy is most effective when there is a strong connection between the therapist and client, 
                    and because of that we encourage you to meet for consults with as many therapist as you need to ensure the best fit.
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




