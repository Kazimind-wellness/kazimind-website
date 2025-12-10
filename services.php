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
      Our OD programs integrate mental health expertise with corporate strategies to build resilience, boost 
      productivity, and nurture positive workplace cultures through tailored training, wellness programs, team 
      building, and leadership development. </p>
            <a href="OrganizationalDevelopmentServices.php" class="service-button">Organizational Development Services</a>
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

  <div class="background" id="background" style="display: none;">
    <video autoplay muted loop playsinline id="bgVideo">
      <source src="uploads/WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <button id="soundToggle" class="sound-toggle">
      <i class="fas fa-volume-mute"></i>
    </button>
  </div>

<h1 class="faqH1 scroll-animate" id="faqH1">Frequently Asked Questions</h1>

<div class="faq-container scroll-animate">
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do I need a referral to see a psychologist?</div>
        <div class="faq-answer">
            <strong>A:</strong> No, you don’t need a referral to see a psychologist or counsellor at KaziMind Wellness. You can contact us directly and schedule an appointment whenever you feel therapy or coaching would be helpful.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: If I have a referral, what types do you accept?</div>
        <div class="faq-answer">
            <strong>A:</strong> At KaziMind Wellness, we accept referrals from your General Practitioner (GP) under a Mental Health Care Plan, as well as from private and public schools.<br><br>
            If a school counsellor, nurse, or guidance teacher identifies that a student may need professional support, they can also refer the student to us.<br><br>
            You may be eligible for discounted rates for individual sessions if you provide a valid referral letter.<br><br>
            Please note that this applies only to individual therapy sessions, not to couples counselling, group programs, or career development services.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What is a valid referral?</div>
        <div class="faq-answer">
            <strong>A:</strong> A valid referral is typically prepared by your GP after a mental health assessment. During this process, your GP will discuss your emotional wellbeing and any challenges you've been facing, such as anxiety, stress, or depression.<br><br>
            Similarly, schools may issue a referral through a school counsellor, nurse, or guidance teacher when they believe a student could benefit from professional psychological support.<br><br>
            The referral outlines your treatment goals and the recommended number of sessions. You'll receive a referral letter from your GP or school guidance office specifying the number of sessions approved under the plan.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Can I claim therapy sessions through my medical cover?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. Depending on your insurance provider and plan, you may be eligible to claim reimbursement for therapy sessions. Some medical covers include outpatient mental health benefits that apply to counselling or psychology sessions.<br><br>
            Since coverage differs by provider, we recommend contacting your insurer to confirm what services are included under your plan.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you accept insurance?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. At KaziMind Wellness, we do accept clients with medical insurance. However, coverage for mental health services depends on your insurer and plan.<br><br>
            Some insurance companies offer direct billing, while others require you to pay first and then claim reimbursement. We're happy to provide receipts and supporting documents to help with your claim.<br><br>
            Before booking, confirm with your insurance provider:
            <ol>
                <li>Are mental health or counselling services covered in my plan?</li>
                <li>Do I need a referral or pre-authorization?</li>
                <li>Does my plan cover outpatient therapy or out-of-network providers?</li>
                <li>What percentage of the fee is reimbursed?</li>
                <li>How do I submit claims for reimbursement?</li>
            </ol>
            Our team can help you understand your coverage and provide the paperwork required by your insurer.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What payment options can I use?</div>
        <div class="faq-answer">
            <strong>A:</strong> We aim to make payments simple and flexible. At KaziMind Wellness, we do not accept cash payments at our office. you can pay for sessions using:
            <ul>
                <li>M-Pesa (Paybill or Till Number)</li>
                <li>Bank transfer (details available on request)</li>
            </ul>
            Our fees are transparent and shared upfront, with no hidden charges. We also offer sliding-scale or discounted rates in special circumstances to ensure therapy remains accessible.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you provide virtual services?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. We offer virtual therapy sessions for clients who prefer or require online support. These sessions are conducted securely through trusted telehealth platforms to ensure privacy and convenience.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How long are my appointments?</div>
        <div class="faq-answer">
            <strong>A:</strong> Session length varies depending on the type of service and your individual needs. Typical durations are:<br><br>
            Phone Consultation (Free): 15 minutes<br><br>
            Initial Evaluation / Diagnostic Session: 55–60 minutes<br><br>
            Individual Therapy Session: 45–60 minutes<br><br>
            Couples Therapy Session: 55–60 minutes<br><br>
            Group Therapy Session: 60–75 minutes<br><br>
            We value your time and aim to ensure each session provides meaningful support and progress.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Will you give me advice?</div>
        <div class="faq-answer">
            <strong>A:</strong> Not exactly. Therapy isn't about giving advice or telling you what to do. Instead, it's a safe, supportive space where we work together to help you explore your thoughts, emotions, and behavior patterns.<br><br>
            Our goal is to help you gain deeper insight, identify what's holding you back, and build practical tools for positive, lasting change.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How long will I be in therapy?</div>
        <div class="faq-answer">
            <strong>A:</strong> The length of therapy depends on your individual needs and goals. Our aim is not to keep you in therapy indefinitely but to help you reach a place of stability and growth.<br><br>
            We often begin with weekly sessions to build momentum. As progress continues, sessions may reduce to bi-weekly or monthly.<br><br>
            Together, we'll review your progress regularly and decide when it's appropriate to conclude or adjust the frequency of sessions.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Can I choose my therapist, and what if I don't feel comfortable with them?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes, you have the freedom to choose a therapist who feels like the right fit for you. The therapeutic relationship is built on trust, comfort, and mutual understanding these are essential for progress.<br><br>
            If at any point you feel that your current therapist isn't the best match, you're welcome to request a change. We'll support you in finding another professional within our team who aligns better with your needs and preferences. Your comfort and wellbeing always come first.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Is everything I share in therapy confidential?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. Your privacy is fully protected. Information shared in therapy remains confidential, except in cases where there is a risk of harm to yourself or others, or if disclosure is required by law.<br><br>
            All confidentiality terms are clearly explained during your first session.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Are your services inclusive and culturally sensitive?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. KaziMind Wellness provides inclusive, culturally responsive, and non-judgmental care. We respect every client's background, faith, identity, and personal values.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What if therapy doesn't work for me?</div>
        <div class="faq-answer">
            <strong>A:</strong> If a particular approach or therapist doesn't seem effective, we'll review your progress and adjust the treatment plan or connect you with another specialist if needed. Therapy is a process, and finding the right fit is key to success.
        </div>
    </div>
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