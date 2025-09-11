<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
</head>

<section class="feedback-section">
    <h2>Customer Feedback</h2>

    <div class="feedback-steps">
      <div class="step active" data-feedback="1">1</div>
      <div class="step" data-feedback="2">2</div>
      <div class="step" data-feedback="3">3</div>
      <div class="step" data-feedback="4">4</div>
    </div>

    <div class="feedback-content active" id="feedback-1">
      <h3>Brian Kanja</h3>
      <div class="stars">★★★★☆</div>
      <p>
        Everyone needs to debrief, away from the norm, away from usual routine, 
        to make the work place and work relationships better and that place is KaziMind...
      </p>
    </div>

    <div class="feedback-content" id="feedback-2">
      <h3>Elizabeth Muiruri</h3>
      <div class="stars">★★★★★</div>
      <p>
        First off it's a friendly environment with friendly kind hearted people... 
        loved everything about it.
      </p>
    </div>

    <div class="feedback-content" id="feedback-3">
      <h3>Margaret Kariuki</h3>
      <div class="stars">★★★★☆</div>
      <p>
        A wellness center that brings out life in its clients. Solution oriented wellness center.
      </p>
    </div>

    <div class="feedback-content" id="feedback-4">
      <h3>Ruth</h3>
      <div class="stars">★★★★★</div>
      <p>
        My interaction with Njoki was a life changing one. Thank you for your time 
        and from the heart connection. High level of professionalism. Thumbs up.
      </p>
    </div>
  </section>

  <script>
    const steps = document.querySelectorAll('.step');
    const feedbacks = document.querySelectorAll('.feedback-content');
    let current = 0;
    let autoSlide = setInterval(nextFeedback, 5000); // auto rotate every 5s

    function showFeedback(index) {
      // remove active from all
      steps.forEach(s => s.classList.remove('active'));
      feedbacks.forEach(f => f.classList.remove('active'));

      // activate current
      steps[index].classList.add('active');
      feedbacks[index].classList.add('active');
      current = index;

      // reset auto timer
      resetAutoSlide();
    }

    function nextFeedback() {
      let next = (current + 1) % feedbacks.length;
      showFeedback(next);
    }

    function resetAutoSlide() {
      clearInterval(autoSlide);
      autoSlide = setInterval(nextFeedback, 5000);
    }

    // handle click on numbers
    steps.forEach((step, index) => {
      step.addEventListener('click', () => showFeedback(index));
    });
  </script>


  <section class="signup-section">
    <h2>Sign Up For Updates and Promotions</h2>
    <p>Sign up with your email address to receive news, updates and promotions as they’re announced.</p>
      <form class="signup-form" id="signupForm">
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        <button type="submit">SIGN UP</button>
      </form>
      <div id="message"></div>
  </section>

<script>
document.getElementById('signupForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('subscribe.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById('message').innerHTML = data;
    this.reset();
  })
  .catch(err => {
    document.getElementById('message').innerHTML = "❌ Error submitting form.";
  });
});
</script>

    <div class="footer-dark">
        <div class="footer-container">
            
            <div class="footer-column">
                <h3>Kazimind Wellness</h3>
                <p>Cultivate Your Mind</p>
                <p>Mental Wellness Experts</p>
            </div>

            <div class="footer-column">
                <h3>Contact Us</h3>
                <p><img src="images/location-dot.jpg" alt="Location"> <span>Nanyuki, Kenya</span></p>
                <p><img src="images/mail-icon.png" alt="Email"> <span>kazimindadmin@gmail.com</span></p>
            </div>

            <div class="footer-column">
                <h3>Call Us</h3>
                <p><img src="images/whstapp-icon.png" alt="Phone"> <span>+254 700 479 944</span></p>
                <p><img src="images/call-icon.png"  alt="WhatsApp"> <span>+254 202 020 830</span></p>
            </div>

            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-row">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/KaziMindWellness"><img src="images/facebook-icon.png" alt="Facebook"></a>
                        <a href="https://x.com/kazimindw"><img src="images/X-icon.png" alt="Twitter/X"></a>
                        <a href="https://www.instagram.com/invites/contact/"><img src="images/ig-icon.jpg" alt="Instagram"></a>
                    </div>
                </div>
                <div class="social-row">
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/in/kazi-mind-wellness-04434a308/"><img src="images/linkedin-icon.png" alt="LinkedIn"></a>
                        <a href="https://www.tiktok.com/@kazimindwellness"><img src="images/tiktok-icon.png" alt="TikTok"></a>
                        <a href="www.youtube.com/@KaziMindHub"><img src="images/youtube-icon.png" alt="YouTube"></a>
                    </div>
                </div>
            </div>

        </div>

        <p class="copyR">&copy; 2025 Kazimind Wellness. All rights reserved.</p>
    </div>


<div class="whatsapp-float">
  <a href="https://wa.me/254700479944" target="_blank">
    <i class="whatsapp-icon"></i>
    <span>Chat with us</span>
  </a>
</div>

<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    if (preloader) preloader.style.display = "none";
  });
</script>

