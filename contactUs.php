<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>

<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 // For PHPMailer and dotenv
require 'vendor/autoload.php';

// Load .env variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Retrieve form data
            $firstName      = $_POST['first-name'];
            $lastName       = $_POST['last_name'];  // Changed to match new field name
            $fullName       = $firstName . ' ' . $lastName;
            $emailAddress   = $_POST['email'];
            $location       = $_POST['location'];
            $county       = $_POST['county'];
            $phone          = $_POST['fullPhone'];
            $reason         = $_POST['reason']; 
            $service        = $_POST['service'];
            $message        = $_POST['message'];

        // Construct email message
        $subject = "client reach out: kazimind wellness";
        $body = "Hello there!\n\nA new contact has been submitted with the following details:\n
                  Name: $fullName
                  Email: $emailAddress
                  Phone: $phone
                  country: $location
                  county: $county
                  Reason for Contact: $reason
                  Service: $service
                  Message: $message
                  ";

        $mail = new PHPMailer(true);

            try{

                    // Server settings (using Gmail SMTP as example)
                      $mail->isSMTP();
                      $mail->Host = 'smtp.gmail.com';
                      $mail->SMTPAuth = true;
                      $mail->Username = $_ENV['EMAIL_USERNAME'];
                      $mail->Password = $_ENV['EMAIL_PASSWORD'];
                      // Use App Password if 2FA is enabled
                      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                      $mail->Port = 465;       

                      //Recipients
                      $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
                      $mail->addAddress($_ENV['EMAIL_RECEIVER']);; // Add a recipient

                      //Content
                      $mail->isHTML(false); // Set email format to HTML
                      $mail->Subject = $subject;
                      $mail->Body = $body;
                      $mail->send();
                      sleep(1);

                      header('Location: thank_you.html');
                      exit();
                      
            }catch  (Exception $e){
                   // Log the error and show a user-friendly message
                  echo "Mailer Error: " . $mail->ErrorInfo;
                  echo "<script>alert('Failed to submit. Please try again later.');</script>";
          }

    }

  }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <title>Kazimind</title>
</head>

<div class="background2" id="background2"><span style="opacity: 100%;"></span></div>

<h1 class="contact-h1 scroll-animate">Contact Us</h1>

<div class="contact-section">
  <div class="contact-text scroll-animate">  
    <p>
      Choosing a therapist and connecting for a free consult are the first steps in beginning your wellness journey.  
      Please submit your information below and our administrative team can assist you.
    </p>
    <p>
      If you are ready see one of our therapist we invite you to email or <a href="bookAppointment.php" class="contact-link">book</a> with us directly.
    </p>
    <p>
      All messages sent through this contact form pass through our administrative team, so please don't share anything confidential in this form.
    </p>
  </div>
  <div class="contact-image scroll-animate">
    <img src="images/fenis.jpg" alt="Office Desk" />
  </div>
  <p class="disclaimer scroll-animate">
    <em class="disclaimer scroll-animate">If you are in crisis or someone may be in danger, please do not use this site, as messages may not be reviewed immediately, <br> Instead, please use <a href="emergencyAssistance.php">These resources</a> can provide you with immediate help.</em>
  </p>
</div>


<div class="contact-form scroll-animate">
  <form method="post">
    <div class="form-group two-columns scroll-animate">
      <div>
        <label for="first-name">Name <span>*</span></label>
        <input type="text" id="first-name" placeholder="First Name" name="first-name" required>
      </div>
      <div>
        <label>&nbsp;</label>
        <input type="text" placeholder="Last Name" name="last_name" id="last-name" required>
      </div>
    </div>

    <div class="form-group scroll-animate">
      <label for="email">Email Address <span>*</span></label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group scroll-animate">
      <label for="location">Country <span>*</span></label>
      <small>Your Country or state</small>
      <input type="text" id="location" name="location" required>
    </div>

    <div class="form-group scroll-animate">
      <label for="county">County <span>*</span></label>
      <small>Your province or city</small>
      <input type="text" id="county" name="county" required>
    </div>

    <div class="form-group scroll-animate">
      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone">
      <input type="hidden" id="fullPhone" name="fullPhone">
    </div>

    <div class="form-group scroll-animate">
      <label for="reason">Reason for Contact <span>*</span></label>
      <select id="reason" name="reason" required>
        <option value="">Select an option</option>
        <option value="consult">Free Consult</option>
        <option value="inquiry">General Inquiry</option>
        <option value="inquiry">Internship</option>
        <option value="follow-up">Follow-up</option>
        <option value="follow-up">Practicum</option>
        <option value="follow-up">Communicate with team member</option>
        <option value="follow-up">Concerns or feedback</option>
        <option value="follow-up">Other.</option>
      </select>
    </div>

    <div class="form-group scroll-animate">
      <label for="service">Related to which service? <span>*</span></label>
      <select id="service" name="service" required>
        <option value="">Select an option</option>
        <option value="therapy">Therapy</option>
        <option value="counseling">Counseling</option>
        <option value="coaching">Coaching</option>
        <option value="follow-up">Practicum</option>
        <option value="inquiry">Internship</option>
      </select>
    </div>

    <div class="form-group scroll-animate">
      <label for="message">
        Tell us about yourself and what service you're interested in
        <span>*</span>
      </label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <div class="form-group scroll-animate">
      <button type="submit" class="submit-button" name="submit" >SUBMIT</button>
    </div>
  </form>
  
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.querySelector("#phone");
    const fullPhoneInput = document.querySelector("#fullPhone");
    const form = document.querySelector("form"); // get the form itself

    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: (success, failure) => {
            fetch("https://ipinfo.io/json?token=YOUR_TOKEN_HERE")
                .then(res => res.json())
                .then(data => success(data.country))
                .catch(() => success("ke")); // fallback: Kenya
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });

    // On form submit, set hidden field
    form.addEventListener("submit", function () {
        fullPhoneInput.value = iti.getNumber(); // always gives +254...
    });
});
</script>

</div>


<div class="office-hours-container">
  <div class="office-info scroll-animate">
    <h2>Our Office</h2>
    <p><strong>Kazimind Wellness Centre</strong><br>
      Mt kenya road, Nanyuki<br>
      </p>

    <p>Phone: 0700 479 944 | 020 202 0830</p>
    <p>Email: <a href="mailto:admin@kazimind.com">admin@kazimind.com</a></p>

    <div class="map">
      <iframe 
        src="https://www.google.com/maps?q=KaziMind+Wellness+Nanyuki+Kenya&output=embed" 
        width="100%" 
        height="200" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy"
      ></iframe>
    </div>
  </div>

    <div class="office-hours scroll-animate">
        <h2>Our Office Hours</h2>
        <ul>
            <li><strong>Monday-Friday: </strong> 8:00am to 5:00pm</li>
            <li><strong>Saturday: </strong> 9:00am to 4:30pm </li>
            <li><strong>Sunday: </strong> Closed</li>
            <li><strong>Public Holidays:  </strong> Open by appointment only</li>
            </ul>
        <p><em>Our therapists work flexible hours; however, the times listed above reflect when our administrative support is available both in-office and online.</em></p>
        <p><em>Please note that emails sent to our administrative desk over the weekend may not receive a response until Monday. </em></p>
    </div>
</div>

<div class="travel-info scroll-animate">
  <h3>Travelling to our office:</h3>
  <p>
    Located right in the heart of Nanyuki town, on Lenana-Road, just off the main Nairobi-Nanyuki Highway. Within Sportsmans Arms Hotel. 
  </p>  
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced scroll animations with reset capability
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

    // Form input focus effects
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>


</body> 


</html>