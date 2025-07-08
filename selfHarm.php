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
                <h1 class="main-heading">Suicide and Self-Harm</h1>
                <p class="intro-paragraph">
                Suicide and self-harm affect people of all ages in Kenya, with around 3,200 deaths by suicide reported in 2019, and many more cases likely unreported due to stigma and past legal barriers. Young people, especially those aged 15–29, are most affected, with rising cases of self-harm and suicide attempts particularly among young women. In 2025, Kenya decriminalized attempted suicide, marking a shift toward mental health care over punishment. At Kazimind Wellness Centre, we offer compassionate support for anyone struggling with suicidal thoughts, self-harm, or loss because you don’t have to face it alone.
            </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">What is Suicidal Ideation? </h2>
                <p class="description">
                    <strong>Suicidal</strong> ideation refers to having thoughts about suicide. For some, these 
                    thoughts may come with urges or actions, while for others, they remain as thoughts sometimes intrusive that can surface in response to triggers or persist either in the background or more intensely in daily life.
                    In Kenya, suicide remains a major mental health concern. According to the World Health Organization and the Kenyan Ministry of Health, it’s estimated that over 500 suicide cases are officially reported each year, though the real number is likely higher due to underreporting and social stigma. Many more people live with suicidal thoughts or attempt suicide without seeking help. Every suicide leaves behind a ripple effect family, friends, and communities significantly impacted by the loss.At Kazimind wellness Centre, we are here to support you whether you're struggling with these thoughts, experiencing urges, or supporting someone who is. Reaching out is a powerful first step, and you don’t have to face it alone. 

                     <br> <br>

                    People often experience suicidal ideation when they’re overwhelmed by challenges they don’t know how to cope with. It can feel like being trapped, with suicide seeming like the only way out. These thoughts can stem from depression or other mental health conditions, as well as from difficult life experiences such as abuse, trauma, grief, bullying, poverty, low self-esteem, or family and relationship breakdowns all of which are real struggles faced by many individuals across Kenya.
                    Therapy offers a space to begin unpacking these experiences and emotions. At Kazimind wellness Centre, our goal is to help you understand what you're going through and guide you toward healthier ways of coping and healing so you can find relief, hope, and a renewed sense of purpose without resorting to thoughts or plans of ending your life. You're not alone, and support is available.
                </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">What is Self-Harm?</h2>
                <p class="description">
                  <strong>Self-harm</strong> is the intentional act of causing physical pain or injury to oneself. People may self-harm for different reasons: to punish themselves, to release overwhelming emotions, or to momentarily quiet their thoughts. It's important to note that self-harm doesn’t always mean someone is experiencing suicidal thoughts. For some, it may overlap with suicidal ideation, but for many others, self-harm is a way of coping with intense emotional distress in the moment, without any intention of ending their life
                  <br><br>
                    individuals of all ages, backgounds and experiences engage in self-harm, though statistics show that it occurs most often with teenagers and a recent study indicated that rates of self-harm ranged from 6.4% to 14.8% for boys and 17.7% to 30.8% for girls.
                    <br><br>
                    Many people who self-harm believe it will help them cope or solve their problems, but often the relief is only temporary. When the moment passes, the underlying pain remains and sometimes feels even heavier. This is where therapy becomes essential. At Kazimind wellness Centre, we provide a safe, supportive space to explore what’s driving these behaviors and help you develop healthier, more sustainable ways to cope. You don’t have to face this alone we’re here to help you heal.
                 </p>
            </div>

            <div class="section-container">
                <h2 class="sub-heading">Types of Therapy and Support</h2>
                <p class="description">
                   Therapy for suicide and self-harm usually starts with figuring out <strong> what the goal of those actions are -</strong>
                   What is the function of self-harm? What are the thoughts of suicide helping the person get away from? 
                   What is the goal of suicide? <strong> Once we figure those out, we can get to the root of the issue and work to 
                   address and process it.</strong> Each therapist will have their own approach to dealing with suicide and self-harm, 
                   but some of the approaches you might experience at Kazimind wellness Centre include: 
                </p>
                <div class="therapy-list">
                    <ul>
                        <li>Safety Planning and Crisis Management </li>
                        <li>Cognitive Behavioural Therapy (CBT) </li>
                        <li>Dialectical Behavioural Therapy (DBT) </li>
                        <li>Family Therapy</li>
                    </ul>
                </div>

            </div>

            <div class="section-container">
                <h2 class="sub-heading">Working with a therapist</h2>
                <p class="description">
                    Our office has several experienced professionals who specialize in working with individuals facing suicidal thoughts and self-harm, and you can view their profiles below. Once you’ve met with a therapist and they’ve had the opportunity to understand your situation, they will work with you to create a personalized treatment plan focused on addressing the thoughts or urges you may be experiencing.

We believe that therapy is most effective when there is a strong, trusting connection between the therapist and client. Because of this, we encourage you to schedule consultations with different therapist if needed so you can find the therapist who feels like the best fit for your healing journey.
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




