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
    <title>Kazimind</title>
</head>
 <div class="services">

 <div class="background" id="background">
  <video autoplay muted loop playsinline id="bgVideo">
    <source src="uploads/WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

   <!-- Mute/Unmute button -->
  <button id="soundToggle" class="sound-toggle">
    <i class="fas fa-volume-mute"></i>
  </button>

  <div class="video-overlay"></div>
</div>
 <h1>SERVICES WE OFFER</h1>

  <section class="services-offered">
    <div class="service-card">
      <div class="service-image">
        <img src="images/physcoTerapyImage.jpg" alt="Psychotherapy Image">
      </div>
      <h3>Psychotherapy Services</h3>
      <p>
        An opportunity to meet with one of our therapists to reflect on past experiences, look at current behaviors and plan for future goals. Available for individuals, children, couples and families. Offered online, by phone, and in person in office.
      </p>
      <a href="PsychotherapyServices.php" class="service-button">View our Psychotherapy Services</a>
    </div>

    <div class="service-card" id="Life">
      <div class="service-image">
        <img src="images/lifeCoaching.jpg" alt="Life Coaching Image">
      </div>
      <h3>Life Coaching Services</h3>
      <p>
        Life Coaching is a professional partnership between a coach and a client, meant to help one to achieve demonstrable and lasting change. Coaching provides the tools to enable the discovery of one’s life direction, and aims to provide guidance, motivation, accountability and inspiration. Offered online.
      </p>
      <!-- <a href="#" class="service-button">View our Life Coaching Services</a> -->
    </div>
  </section>
 
  
  <section class="services-offered">
    <div class="service-card">
      <div class="service-image">
        <img src="images/S-img.jpg" alt="Psychotherapy Image">
      </div>
      <h3>Group Therapy</h3>
      <p>
        This includes a number of six people who have a same specific goal they want to achieve. 
        Group creates a sense of belonging and oneness. Group therapies are offered on Thursdays 
        and Saturdays at 5:00pm
      </p>
      <!-- <a href="#" class="service-button">View our Group Programs</a> -->
    </div>

    <div class="service-card">
      <div class="service-image">
        <img src="images/WhatsApp Image 2025-06-26 at 16.10.02_877e202d.jpg" alt="Life Coaching Image">
      </div>
      <h3>Organisational Developmenet and Group Development</h3>
      <p>
       We love engaging the community and organisations, we advocate on prioritizing Mental health at work places, we offer trainings on self-awareness, stress management, burnout. We customise our training to your company’s or organisation’s objectives.
      </p>
      <!-- <a href="#" class="service-button">View our Yoga Programs</a> -->
    </div>
  </section>
  

  
  <section class="services-offered">
    <div class="service-card">
      <div class="service-image">
        <img src="images/onlineThearpy.png" alt="Psychotherapy Image">
      </div>
      <h3>Online therapy</h3>
      <p>
        For those who are far and can’t access our office, we offer online therapy which is reliable and effective.
       </p>
      <!-- <a href="#" class="service-button">View our Mindful Meditation</a> -->
    </div>

    <div class="service-card">
      <div class="service-image">
        <img src="images/clinicalSupervision.png" alt="Life Coaching Image">
      </div>
      <h3>Clinical Supervision</h3>
      <p>
       Supervision allows for space to discuss your needs and experiences as a therapist which is 
       vital to maintaining a healthy and ethical practice. Offered online and in office.
      </p>
      <!-- <a href="#" class="service-button">Clinical Supervision</a> -->
    </div>
  </section>

</div>

  <section class="services-offered">

    <div class="service-card">
      <div class="service-image">
        <img src="images/masssageBed.png" alt="Life Coaching Image">
      </div>
      <h3>Massage Therapy Services</h3>
      <p>
       At KaziMind Wellness, we believe that caring for your mind must include caring for your body.
        That’s why we offer therapeutic massage ,not just to help you relax, but to support your emotional healing, stress recovery, and inner balance.

      </p>
      <!-- <a href="#" class="service-button">View our Massage Therapy Services</a> -->
    </div>
  </section>

    <h1 class="faqH1">Frequently Asked Questions</h1>

<div class="faq-container">
    <div class="faq-item">
      <div class="faq-question">Q: What should I expect during my first visit?</div>
      <div class="faq-answer"> 
        <strong>A:</strong> 
        During your initial meeting, we will collect information to better comprehend your previous experiences, 
        requirements, abilities, obstacles, interests, and objectives for therapy. The primary goal of this session 
        is to establish a bond that will help create a solid foundation for a successful therapeutic journey.<br>
        This will also provide a chance for you to determine whether our services will be helpful in achieving your 
        treatment objectives and whether you feel at ease with your therapist. You should make the most of this opportunity 
        by asking any questions you may have regarding the therapy approach.
    </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: How long will I be in therapy?</div>
      <div class="faq-answer">
       <strong>A:</strong>
      Truthfully, treatment processes vary by client.  The goal is not to adopt you as a therapy client forever, but instead to assist you in reaching your goals.  Therapy is a commitment to yourself that requires time and effort, and the decision to engage in the process is yours.  
      We work with clients interested in regular weekly participation in the therapeutic process, as this will increase the likelihood of better and quicker results.  We will work as a team to assess the progress you are making in achieving your goals and explore any barriers that may arise.  Once consistent improvement is observed, discussion to begin the discharge process occurs and sessions move from weekly to bi-weekly, then monthly.  Then you earn your wings to soar as you were always destined to do!!
      </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: Do you take my insurance?</div>
      <div class="faq-answer">
       <strong>A:</strong>We do not take insurance and would be considered an “out-of-network provider”. As an “out-of-network” provider Kazi Mind Wellness Services 
       is a fee-for-service company and only accepts our full fee for services. You should always check with your insurance company to see whether 
       you are covered for out-of-network services for mental health. Typically, if you have the terms PPO, POS, or out-or-network on your insurance card, 
       you may be able to receive reimbursement for services at the insurance companies rate of reimbursement. <br>
       Questions to ask your insurance provider:
                <ol>
                  <li>Are mental health benefits covered in my plan?</li>
                  <li>Do I have a deductible? If yes, how much is it?</li>
                  <li>Do I have coverage for an “out-of-network” provider?</li>
                  <li>
                    What is the rate of reimbursement (percentage of reimbursement) for the following codes?90832 (30 min. individual therapy)
                    90834 (45 min. individual therapy)90837 (60 min. individual therapy)90853 (group therapy)
                  </li>
                  <li>Do I have a co-pay/co-insurance amount? If yes, how much is it?</li>
                  <li>Is an authorization required for me to receive services?</li>
                  <li>Is there a limit to the number of sessions I can participate in?</li>
                  <li>How do I submit claims for out-of-network reimbursement?</li>
                </ol>
      </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: What Payment Options can I use?</div>
      <div class="faq-answer"><strong>A:</strong>
        We accept mobile money, credit/debit cards as payment for services. 
        We will provide you with a monthly statement that you can use to submit to your insurance company for 
        reimbursement that will include all of the relevant information necessary
        Some options for claims submission include:
        Directly to insurer via mail or electronically</div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: How long are my appointments?</div>
      <div class="faq-answer">
        <strong>A:</strong>  Phone Consultation (free): 15-20 minutes <br> <br>
                  Initial Evaluation/Diagnostic: 55-60 minutes <br><br>
                  Individual Session: 45-60 minutes <br><br>
                  Couples Session: 55-60 minutes<br><br>
                  Group Sessions 60-75 minutes<br>
    </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: Will you give me advice?</div>
      <div class="faq-answer">
        <strong>A:</strong> The short answer is “No”.  Contrary to the belief of many, therapy is not about giving advice.  
        Instead, it is a safe place that allows you to work toward changing your life through the exploration of 
        behavior patterns, thought processes, and feelings.  We will work as a team to examine these inner conflicts 
        that may be impeding your ability to enjoy life.
      </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">Q: Do you provide virtual services?</div>
      <div class="faq-answer"><strong>A:</strong>  Yes, virtual therapy services are available.</div>
    </div>
  </div>


<div class="sure">
  <h1>Not sure what services you need? No problem!</h1>
  <h1><a href="contactUs.php">Contact us today</a> and we’ll help you figure it out! </h1>
</div>

<script src="assets/js/topBackground.js"></script>
<script>
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
  item.addEventListener('click', () => {
    // Close others
    faqItems.forEach(i => {
      if (i !== item) i.classList.remove('active');
    });

    // Toggle current
    item.classList.toggle('active');
  });
});



  const bgVideo = document.getElementById('bgVideo');
  const soundToggle = document.getElementById('soundToggle');
  const soundIcon = soundToggle.querySelector('i');

  soundToggle.addEventListener('click', function () {
    if (bgVideo.muted) {
      bgVideo.muted = false;
      bgVideo.volume = 1.0;
      soundIcon.classList.remove('fa-volume-mute');
      soundIcon.classList.add('fa-volume-up');
    } else {
      bgVideo.muted = true;
      soundIcon.classList.remove('fa-volume-up');
      soundIcon.classList.add('fa-volume-mute');
    }
  });


</script>


<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>

</body> 