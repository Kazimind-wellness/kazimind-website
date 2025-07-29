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

<div class="services">

<div class="background" id="background">
  <video autoplay muted loop playsinline id="bgVideo">
    <source src="uploads/WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <button id="soundToggle" class="sound-toggle">
    <i class="fas fa-volume-mute"></i>
  </button>
</div>

<h1 class="scroll-animate">SERVICES WE OFFER</h1>

<section class="services-offered">
    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/physcoTerapyImage.jpg" alt="Psychotherapy Image">
      </div>
      <h3>Psychotherapy Services</h3>
      <p>
        An opportunity to meet with one of our therapists to reflect on past experiences, look at current behaviors and plan for future goals.
      </p>
      <a href="PsychotherapyServices.php" class="service-button">View our Psychotherapy Services</a>
    </div>

    <div class="service-card scroll-animate" id="Life">
      <div class="service-image">
        <img src="images/lifeCoaching.jpg" alt="Life Coaching Image">
      </div>
      <h3>Life Coaching Services</h3>
      <p>
        Life Coaching is a professional partnership between a coach and a client, meant to help one to achieve demonstrable and lasting change.
      </p>
    </div>
</section>
  
<section class="services-offered">
    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/S-img.jpg" alt="Group Therapy Image">
      </div>
      <h3>Group Therapy</h3>
      <p>
        This includes a number of six people who have a same specific goal they want to achieve.
      </p>
    </div>

    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/WhatsApp Image 2025-06-26 at 16.10.02_877e202d.jpg" alt="Organizational Development Image">
      </div>
      <h3>Organizational Development</h3>
      <p>
       We love engaging the community and organisations, we advocate on prioritizing Mental health at work places.
      </p>
    </div>
</section>

<section class="services-offered">
    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/onlineThearpy.png" alt="Online Therapy Image">
      </div>
      <h3>Online therapy</h3>
      <p>
        For those who are far and can't access our office, we offer online therapy which is reliable and effective.
      </p>
    </div>

    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/clinicalSupervision.png" alt="Clinical Supervision Image">
      </div>
      <h3>Clinical Supervision</h3>
      <p>
       Supervision allows for space to discuss your needs and experiences as a therapist.
      </p>
    </div>
</section>

<section class="services-offered">
    <div class="service-card scroll-animate">
      <div class="service-image">
        <img src="images/masssageBed.png" alt="Massage Therapy Image">
      </div>
      <h3>Massage Therapy Services</h3>
      <p>
       At KaziMind Wellness, we believe that caring for your mind must include caring for your body.
      </p>
    </div>
</section>

<h1 class="faqH1 scroll-animate">Frequently Asked Questions</h1>

<div class="faq-container scroll-animate">
    <div class="faq-item scroll-animate">
  <div class="faq-question">Q: How long will I be in therapy?</div>
  <div class="faq-answer">
    <strong>A:</strong> Truthfully, treatment processes vary by client. The goal is not to adopt you as a therapy client forever, but instead to assist you in reaching your goals. Therapy is a commitment to yourself that requires time and effort, and the decision to engage in the process is yours. We work with clients interested in regular weekly participation in the therapeutic process, as this will increase the likelihood of better and quicker results. We will work as a team to assess the progress you are making in achieving your goals and explore any barriers that may arise. Once consistent improvement is observed, discussion to begin the discharge process occurs and sessions move from weekly to bi-weekly, then monthly.
  </div>
</div>

        <div class="faq-item scroll-animate">
          <div class="faq-question">Q: Do you take my insurance?</div>
          <div class="faq-answer">
            <strong>A:</strong> We do not take insurance and would be considered an "out-of-network provider". As an "out-of-network" provider Kazi Mind Wellness Services is a fee-for-service company and only accepts our full fee for services. You should always check with your insurance company to see whether you are covered for out-of-network services for mental health. Typically, if you have the terms PPO, POS, or out-or-network on your insurance card, you may be able to receive reimbursement for services at the insurance companies rate of reimbursement.<br><br>
            Questions to ask your insurance provider:
            <ol>
              <li>Are mental health benefits covered in my plan?</li>
              <li>Do I have a deductible? If yes, how much is it?</li>
              <li>Do I have coverage for an "out-of-network" provider?</li>
              <li>What is the rate of reimbursement for the following codes? 90832 (30 min. individual therapy), 90834 (45 min. individual therapy), 90837 (60 min. individual therapy), 90853 (group therapy)</li>
              <li>Do I have a co-pay/co-insurance amount? If yes, how much is it?</li>
              <li>Is an authorization required for me to receive services?</li>
              <li>Is there a limit to the number of sessions I can participate in?</li>
              <li>How do I submit claims for out-of-network reimbursement?</li>
            </ol>
          </div>
        </div>

        <div class="faq-item scroll-animate">
          <div class="faq-question">Q: What Payment Options can I use?</div>
          <div class="faq-answer">
            <strong>A:</strong> We accept mobile money, credit/debit cards as payment for services. We will provide you with a monthly statement that you can use to submit to your insurance company for reimbursement that will include all of the relevant information necessary. Some options for claims submission include: Directly to insurer via mail or electronically.
          </div>
        </div>

        <div class="faq-item scroll-animate">
          <div class="faq-question">Q: How long are my appointments?</div>
          <div class="faq-answer">
            <strong>A:</strong> 
            Phone Consultation (free): 15-20 minutes<br><br>
            Initial Evaluation/Diagnostic: 55-60 minutes<br><br>
            Individual Session: 45-60 minutes<br><br>
            Couples Session: 55-60 minutes<br><br>
            Group Sessions: 60-75 minutes<br>
          </div>
        </div>

        <div class="faq-item scroll-animate">
          <div class="faq-question">Q: Will you give me advice?</div>
          <div class="faq-answer">
            <strong>A:</strong> The short answer is "No". Contrary to the belief of many, therapy is not about giving advice. Instead, it is a safe place that allows you to work toward changing your life through the exploration of behavior patterns, thought processes, and feelings. We will work as a team to examine these inner conflicts that may be impeding your ability to enjoy life.
          </div>
        </div>

        <div class="faq-item scroll-animate">
          <div class="faq-question">Q: Do you provide virtual services?</div>
          <div class="faq-answer">
            <strong>A:</strong> Yes, virtual therapy services are available.
          </div>
        </div>
    <!-- Additional FAQ items here with same structure -->
    
</div>

<div class="sure scroll-animate">
  <h1>Not sure what services you need? No problem!</h1>
  <h1><a href="contactUs.php">Contact us today</a> and we'll help you figure it out!</h1>
</div>

<script>
// Enhanced scroll animations
document.addEventListener('DOMContentLoaded', function() {
    // Video sound toggle
    const bgVideo = document.getElementById('bgVideo');
    const soundToggle = document.getElementById('soundToggle');
    const soundIcon = soundToggle.querySelector('i');

    soundToggle.addEventListener('click', function() {
        bgVideo.muted = !bgVideo.muted;
        soundIcon.classList.toggle('fa-volume-mute');
        soundIcon.classList.toggle('fa-volume-up');
    });

    // FAQ toggle functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            faqItems.forEach(i => {
                if (i !== item) i.classList.remove('active');
            });
            item.classList.toggle('active');
        });
    });

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