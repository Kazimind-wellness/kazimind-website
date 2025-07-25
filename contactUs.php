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
            $phone          = $_POST['phone'];
            $reason         = $_POST['reason']; 
            $service        = $_POST['service'];
            $message        = $_POST['message'];

        // Construct email message
        $subject = "client reach out: kazimind wellness";
        $body = "Hello there!\n\nA new booking has been submitted with the following details:\n
                  Name: $fullName
                  Email: $emailAddress
                  Phone: $phone
                  Location: $location
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
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <title>Kazimind</title>
</head>

<div class="background2" id="background2"><span style="opacity: 100%;"></span></div>

<h1 class="contact-h1">Contact Us</h1>

<div class="contact-section">

  <div class="contact-text">  
    <p>
      Choosing a therapist and connecting for a free consult are the first steps in beginning your wellness journey.  
      Please submit your information below and our administrative team can assist you.
    </p>
    <p>
      If you are ready see one of our therapist we invite you to email or <a href="#">book</a> with them directly.
    </p>
    <p>
      All messages sent through this contact form pass through our administrative team, so please don’t share anything confidential in this form.
    </p>

  </div>
  <div class="contact-image">
    <img src="images/fenis.jpg" alt="Office Desk" />
  </div>
      <p class="disclaimer">
      <em>Please note if you are in crisis or need immediate support, these messages may not be immediately seen, and in such situations you should reach out to a supportive person or emergency services.</em>
      <em> If you need immediate support please reach out to your local distress line. </em>
    </p>
</div>


<div class="contact-form">
  <form method="post">
    <div class="form-group two-columns">
      <div>
        <label for="first-name">Name <span>(required)</span></label>
        <input type="text" id="first-name" placeholder="First Name" name="first-name" required>
      </div>
      <div>
        <label>&nbsp;</label>
        <input type="text" placeholder="Last Name" name="last_name" id="last-name" required>
      </div>
    </div>

    <div class="form-group">
      <label for="email">Email Address <span>(required)</span></label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="location">Location <span>(required)</span></label>
      <small>Your province or city</small>
      <input type="text" id="location" name="location" required>
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone">
    </div>

    <div class="form-group">
      <label for="reason">Reason for Contact <span>(required)</span></label>
      <select id="reason" name="reason" required>
        <option value="">Select an option</option>
        <option value="consult">Free Consult</option>
        <option value="inquiry">General Inquiry</option>
        <option value="follow-up">Follow-up</option>
      </select>
    </div>

    <div class="form-group">
      <label for="service">Related to which service? <span>(required)</span></label>
      <select id="service" name="service" required>
        <option value="">Select an option</option>
        <option value="therapy">Therapy</option>
        <option value="counseling">Counseling</option>
        <option value="coaching">Coaching</option>
      </select>
    </div>

     <div class="form-group">
      <label for="message">
        Tell us about yourself and what service you're interested in
        <span>(required)</span>
      </label>
      <textarea id="message" name="message" placeholder="If you are unsure of the clinician that would be best for you please let us know what you're hoping to address in therapy and we'll try to connect you with an appropriate therapist." required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="submit-button" name="submit" >SUBMIT</button>
    </div>
  </form>

</div>


<div class="office-hours-container">
  <div class="office-info">
    <h2>Our Office</h2>
    <p><strong>Kazimind Wellness Centre</strong><br>
      Mt kenya road<br>
      Nanyuki, Sportsman Arms Hotel</p>

    <p>Phone: 070 0479 944</p>
    <p>Email: <a href="mailto:kazimindw@gmail.com">kazimindw@gmail.com</a></p>

    <div class="map">
      <iframe 
        src="https://www.google.com/maps?q=Kazimind+Sportmans+Arms+Hotel+Nanyuki+Kenya&output=embed" 
        width="100%" 
        height="200" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy"
      ></iframe>
    </div>
  </div>

  <div class="office-hours">
    <h2>Our Hours</h2>
    <ul>
      <li><strong>Mondays</strong> 8am - 5pm</li>
      <li><strong>Tuesdays</strong> 8am - 5pm</li>
      <li><strong>Wednesdays</strong> 8am - 5pm</li>
      <li><strong>Thursdays</strong> 8am - 5pm</li>
      <li><strong>Fridays</strong> 8am - 5pm</li>
      <li><strong>Saturdays</strong> 9m to 5pm</li>
      <li><strong>Sundays</strong> closed</li>
    </ul>
    <p>Closed on Sundays Only.</p>
    <p>Open to appointment On Public Holidays</p>
    <p><em>Our therapists work a variety of hours, the above hours indicate when our administrative support is available for you in-office and online.</em></p>
    <p><em>Please note emails sent to the administrative desk on weekends may not be responded to until Monday.</em></p>
  </div>
</div>

<div class="travel-info">
  <h3>Travelling to our office:</h3>
  <p>
    Located right in the heart of Nanyuki town, on Lenana Road, just off the main Nairobi–Nanyuki Highway. Within Sportsmans Arms Hotel. 
  </p>  
</div>

  <script src="assets/js/topBackground.js"></script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>


</body> 


</html>