
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
    <?php
    $pageTitle = "Book Now";
    ob_start();
    ?>
            <div class="section-container section">
    <h1 class="main-heading">Grief and Loss</h1>
    <p class="intro-paragraph">
        Coping with <strong>grief</strong> and <strong>loss</strong> can be incredibly difficult, and everyone experiences it differently. 
        At <strong>Kazimind Wellness Centre</strong>, our team is here to support your mental, emotional, physical, and spiritual well-being during this time. 
        We offer a variety of therapy options tailored to help you navigate your unique grief journey.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">What is Grief?</h2>
    <p class="description">
        <strong>Grief</strong> is a powerful emotional response to <strong>loss</strong>. While it's commonly associated with the death of a loved one, 
        grief can also arise from many other life changes—such as losing a pet, a friendship, a job, a home, a dream, or even a belief. 
        It's a deeply personal experience that varies from person to person. However you're feeling, your grief is valid, and we're here to support you through it.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">What is Prolonged Grief Disorder?</h2>
    <p class="description">
        <strong>Prolonged Grief Disorder</strong>, also referred to as complicated or traumatic grief, is when grief remains intense and persistent for an extended period—often 
        6 to 12 months or longer. It may interfere with daily life and often overlaps with symptoms of depression. While our team cannot provide a formal diagnosis, 
        we can help you connect with a doctor or psychiatrist and offer therapeutic support as you work through your grief.
    </p>
</div>

<div class="section-container">
    <h2 class="sub-heading">Types of Therapy and Support</h2>
    <p class="description">
        Grief therapy can take many forms depending on your needs and the nature of your loss. 
        At <strong>Kazimind Wellness Centre</strong>, our <strong>therapists</strong> use a variety of approaches to support healing, including:
    </p>
    <div class="therapy-list">
        <ul>
            <li>Bereavement Therapy</li>
            <li>Cognitive Behavioural Therapy (CBT)</li>
            <li>Narrative Therapy</li>
            <li>Acceptance and Commitment Therapy (ACT)</li>
            <li>Pet Loss and Bereavement Support Group</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <h2 class="sub-heading">Working with a Therapist</h2>
    <p class="description">
        Our team includes <strong>therapists</strong> who specialize in grief and loss. 
        After meeting with you and understanding your experience, your <strong>therapist</strong> will work with you to create a plan that supports your healing process. 
        Since therapy is most effective when you feel comfortable with your <strong>therapist</strong>, we encourage you to explore consultations 
        with different team members to find the right fit.
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