<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>

<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to autoload.php of PHPMailer

// Load .env variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Retrieve form data// Changed to match new field name
            $fullName       = $_POST['full-name'];
            $emailAddress   = $_POST['email'];
            $location       = $_POST['location'];
            $phone          = $_POST['phone'];
            $preferredDate  = $_POST['date'];
            $preferredTime  = $_POST['time'];

        // Construct email message
        $subject = "client reach out: kazimind wellness";
        $body = "Hello there!\n\n A client has reached out with the following details:\n
                    Name: $fullName
                    Email: $emailAddress
                    Phone: $phone
                    Location: $location
                    Preferred Date: $preferredDate
                    Preferred Time: $preferredTime
                ";

        $mail = new PHPMailer(true);

            try{

                    // Server settings (using Gmail SMTP as example)
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $_ENV['EMAIL_USERNAME'];
                    $mail->Password = $_ENV['EMAIL_PASSWORD']; // Use App Password if 2FA is enabled
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;       

                       //Recipients
                    $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind wellness');
                    $mail->addAddress($_ENV['EMAIL_RECEIVER']); // Add a recipient

                      //Content
                    $mail->isHTML(false); // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->send();

                    header('Location: thank_you.html');
                    exit();           
            }catch  (Exception $e){
                   // Log the error and show a user-friendly message
                echo "Mailer Error: " . $mail->ErrorInfo;
                echo "<script>alert('Failed to submit booking request. Please try again later.');</script>";
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
    <style>
        .booking-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        .progress-bar::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            background: #e0e0e0;
            z-index: 1;
        }
        .progress-bar::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 0%;
            background: #3498db;
            z-index: 1;
            transition: width 0.5s ease;
        }

        .progress-step {
            width: 30px;
            height: 30px;
            background-color: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            position: relative;
            z-index: 2;
        }

        .progress-step.active {
            background-color: #3498db;
        }

        .progress-step.completed {
            background-color: #2ecc71;
        }

        .form-page {
            display: none;
        }

        .form-page.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group span {
            color: #e74c3c;
        }

        .form-group small {
            display: block;
            color: #7f8c8d;
            margin-bottom: 5px;
            font-size: 0.85em;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        .two-columns {
            display: flex;
            gap: 15px;
        }

        .two-columns > div {
            flex: 1;
        }

        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .nav-button {
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .nav-button:hover {
            background-color: #2980b9;
        }

        .nav-button.prev {
            background-color: #95a5a6;
        }

        .nav-button.prev:hover {
            background-color: #7f8c8d;
        }

        .nav-button.submit {
            background-color: #2ecc71;
        }

        .nav-button.submit:hover {
            background-color: #27ae60;
        }

        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .scroll-animate.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .two-columns {
                flex-direction: column;
                gap: 0;
            }
            
            .booking-container {
                padding: 20px;
            }
            
            .nav-button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .progress-step {
                width: 25px;
                height: 25px;
                font-size: 12px;
            }
            
            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 10px;
                font-size: 14px;
            }
            
            .nav-button {
                padding: 8px 15px;
            }
        }
    </style>
</head>
<div class="booking-container">
        <h2>Book Your Appointment</h2>
        <div class="progress-bar">
            <div class="progress-step active" data-step="1">1</div>
            <div class="progress-step" data-step="2">2</div>
            <div class="progress-step" data-step="3">3</div>
            <div class="progress-step" data-step="4">4</div>
        </div>
        
        <form id="booking-form" method="post">
            <!-- Page 1-->
            <div class="form-page active" data-page="1">
                <div class="form-group scroll-animate">
                    <label for="email">Email Address <span>(required)</span></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group two-columns scroll-animate">
                    <div>
                        <label for="full-name">Full Name <span>(required)</span></label>
                        <input type="text" id="full-name" placeholder="Full Name" name="full-name" required>
                    </div>
                </div>
                <div class="form-group scroll-animate">
                    <label for="date">Date of Birth <span>(required)</span></label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Gender">Gender <span>(required)</span></label>
                    <select id="Gender" name="Gender" required>
                        <option value="">Select an option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prfer not to say">Prfer not to say</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Nationality">Nationality <span>(required)</span></label>
                    <select id="Nationality" name="Nationality" required>
                        <option value="">Select an option</option>
                        <option value="Kenyan">Kenyan</option>
                        <option value="Tanzanian">Tanzanian</option>
                        <option value="Ugandan">Ugandan</option>
                        <option value="British">British</option>
                        <option value="American">American</option>
                        <option value="German">German</option>
                        <option value="Bavarian">Bavarian</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Country">Country <span>(required)</span></label>
                    <input type="text" id="Country" name="Country" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="location">Place of residence / Ward <span>(required)</span></label>
                    <input type="text" id="location" name="location" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Town">Town <span>(required)</span> </label>
                    <input type="text" id="Town" name="Town" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="Country">County <span>(required)</span> </label>
                    <input type="text" id="County" name="County" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="phone">Primary Cellphone number <span>(required)</span> </label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>
            
            <!-- Page 2:-->
            <div class="form-page" data-page="2">
                <div class="form-group scroll-animate">
                    <label for="kin">Next of kin name (Family/Friend) <span>(required)</span> </label>
                    <input type="text" id="kin" name="kin" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="kinCel">Next of kin cellphone number (Family/Friend)  <span>(required)</span> </label>
                    <input type="text" id="kinCel" name="kinCel" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Status">Marital Status <span>(required)</span></label>
                    <select id="Status" name="Status" required>
                    <option value="">Select an option</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Domestic Partnership / Civil Partnership">Domestic Partnership / Civil Partnership</option>
                    <option value="In a Relationship">In a Relationship</option>
                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                    <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="business">Occupation/ business <span>(required)</span> </label>
                    <input type="text" id="business" name="business" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="Reason">Reason for seeking Therapy <span>(required)</span> </label>
                    <input type="text" id="Reason" name="Reason" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="referred">Who referred you? <span>(required)</span></label>
                    <select id="referred" name="referred" required>
                    <option value="">Select an option</option>
                    <option value="Friend or Family Member">Friend or Family Member</option>
                    <option value="Primary Care Physician">Primary Care Physician</option>
                    <option value="Mental Health Professional">Mental Health Professional</option>
                    <option value="Online Recommendation/Review">Online Recommendation/Review</option>
                    <option value="Employer or Colleague">Employer or Colleague</option>
                    <option value="Educational Institution">Educational Institution</option>
                    <option value="Support Group">Support Group</option>
                    <option value="Internet Search">Internet Search</option>
                    <option value="Health Insurance Provider">Health Insurance Provider</option>
                    <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="before">If you been in Therapy before? <span>(required)</span></label>
                    <select id="before" name="before" required>
                    <option value="">Select an option</option>
                    <option value="Friend or Family Member">Yes</option>
                    <option value="Primary Care Physician">No</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="therapist">If you been in Therapy before, who was your therapist?</label>
                    <input type="text" id="therapist" name="therapist">
                </div>  
                <div class="form-group scroll-animate">
                    <label for="therapistloc">If you been in Therapy before, where was your therapist?</label>
                    <input type="text" id="therapistloc" name="therapistloc">
                </div>  
                <div class="form-group scroll-animate">
                    <label for="medication">Currently on medication? <span>(required)</span></label>
                    <select id="medication" name="medication" required>
                    <option value="">Select an option</option>
                    <option value="Friend or Family Member">Yes</option>
                    <option value="Primary Care Physician">No</option>
                    </select>
                </div> 
                <div class="form-group scroll-animate">
                    <label for="doctor">If you're on medication, who is the doctor?</label>
                    <input type="text" id="doctor" name="doctor">
                </div>  
                <!-- 
                <div class="form-group scroll-animate">
                    <label for="venue">Preferred Venue <span>(required)</span></label>
                    <select id="venue" name="venue" required>
                        <option value="">Select an option</option>
                        <option value="online">Online</option>
                        <option value="physical">Physical</option>
                    </select>
                </div> -->
            </div>
            
            <!-- Page 3 -->
            <div class="form-page" data-page="3">
                <div class="form-group scroll-animate">
                    <label for="usage">Any alcohol/Drug usage?  <span>(required)</span></label>
                    <select id="usage" name="usage" required>
                    <option value="">Select an option</option>
                    <option value="Friend or Family Member">Yes</option>
                    <option value="Primary Care Physician">No</option>
                    </select>
                </div> 
                <div class="form-group scroll-animate">
                    <label for="available">Date you're available for Therapy <span>(required)</span></label>
                    <input type="date" id="available" name="available" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="time">Preferred Time <span>(required)</span></label>
                    <input type="time" id="time" name="time" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="looking">What type of  therapy  are you looking forward to have with us? <span>(required)</span></label>
                    <select id="looking" name="looking" required>
                        <option value="">Select an option</option>
                        <option value="Individual Therapy (Ksh 4,500)">Individual Therapy (Ksh 4,500)</option>
                        <option value="Teen Therapy (Ksh 3,500)">Teen Therapy (Ksh 3,500)</option>
                        <option value="Tele/Online Therapy (Ksh 4,500)">Tele/Online Therapy (Ksh 4,500)</option>
                        <option value="Couple Therapy / Marriage Therapy (Ksh 6,500)">Couple Therapy / Marriage Therapy (Ksh 6,500)</option>
                        <option value="Group Therapy (Ksh 10,000)">Group Therapy (Ksh 10,000)</option>
                        <option value="Child Therapy (Ksh 3,500)">Child Therapy (Ksh 3,500)</option>
                        <option value="Family Therapy (Ksh 7,000)">Family Therapy (Ksh 7,000)</option>
                        <option value="Student Personal Therapy (Ksh 2,000)">Student Personal Therapy (Ksh 2,000)</option>
                        <option value="Family / Couple Transition Support Services">Family / Couple Transition Support Services</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="provider">List the medical insurance provider(If applicable)</label>
                    <input type="text" id="provider" name="provider">
                </div>  
                <h2>After registering for your session, proceed with payment through the following method:</h2>
                <h2>PAYBILL NUMBER: <span style="color: red;">247 247 </span>; BISINESS NUMBER:<span style="color: red;"> 502 450 </span></h2>
                <div class="form-group scroll-animate">
                    <label for="confirmation">Please provide your payment confirmation ID / NAME <span>(required)</span> </label>
                    <input type="text" id="confirmation" name="confirmation" required>
                </div> 
            </div>
            
            <!-- Page 4-->
            <div class="form-page" data-page="4">
                <div class="form-group scroll-animate">
                    <label for="referencer">our reference number (Write in the following format KMW/Id Number) <span>(required)</span> </label>
                    <input type="text" id="reference" name="reference" required>
                </div>  
                <div class="form-group scroll-animate">
                    <label for="payment">Mode of payment  <span>(required)</span></label>
                    <select id="payment" name="payment" required>
                        <option value="">Select an option</option>
                        <option value="Cash">Cash</option>
                        <option value="MPESA">MPESA</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Post-service payment">Post-service payment</option>
                        <option value="Medical Insurance">Medical Insurance</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for=" Psychotherapist">Name of Psychotherapist <span>(required)</span> </label>
                    <input type="text" id=" Psychotherapist" name=" Psychotherapist" required>
                </div>              
            </div>
            
            <div class="form-navigation">
                <button type="button" class="nav-button prev" id="prev-button" style="visibility: hidden;">Previous</button>
                <button type="button" class="nav-button next" id="next-button">Next</button>
                <button type="submit" class="nav-button submit" id="submit-button" style="display: none;">Submit</button>
            </div>
        </form>
    </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form navigation variables
            const formPages = document.querySelectorAll('.form-page');
            const progressSteps = document.querySelectorAll('.progress-step');
            const nextButton = document.getElementById('next-button');
            const prevButton = document.getElementById('prev-button');
            const submitButton = document.getElementById('submit-button');
            const progressBar = document.querySelector('.progress-bar');
            const animatedElements = document.querySelectorAll('.scroll-animate');
            
            let currentPage = 1;
            const totalPages = formPages.length;
            
            // Initialize animation on elements in the first page
            animateElements();
            
            // Next button click handler
            nextButton.addEventListener('click', function() {
                if (validatePage(currentPage)) {
                    if (currentPage < totalPages) {
                        // Move to next page
                        changePage(currentPage, currentPage + 1);
                        currentPage++;
                        
                        // Update button visibility
                        if (currentPage > 1) {
                            prevButton.style.visibility = 'visible';
                        }
                        
                        if (currentPage === totalPages) {
                            nextButton.style.display = 'none';
                            submitButton.style.display = 'block';
                        }
                        
                        // Animate elements on the new page
                        setTimeout(animateElements, 300);
                    }
                }
            });
            
            // Previous button click handler
            prevButton.addEventListener('click', function() {
                if (currentPage > 1) {
                    // Move to previous page
                    changePage(currentPage, currentPage - 1);
                    currentPage--;
                    
                    // Update button visibility
                    if (currentPage === 1) {
                        prevButton.style.visibility = 'hidden';
                    }
                    
                    if (currentPage < totalPages) {
                        nextButton.style.display = 'block';
                        submitButton.style.display = 'none';
                    }
                    
                    // Animate elements on the new page
                    setTimeout(animateElements, 300);
                }
            });
            
            // Form submission handler
            document.getElementById('booking-form').addEventListener('submit', function(e) {
                e.preventDefault();
                if (validatePage(currentPage)) {
                    alert('Booking submitted successfully!');
                    // In a real application, you would submit the form to a server here
                }
            });
            
            // Function to change pages
            function changePage(from, to) {
                // Update form pages
                document.querySelector(`.form-page[data-page="${from}"]`).classList.remove('active');
                document.querySelector(`.form-page[data-page="${to}"]`).classList.add('active');
                
                // Update progress steps
                document.querySelector(`.progress-step[data-step="${from}"]`).classList.remove('active');
                document.querySelector(`.progress-step[data-step="${to}"]`).classList.add('active');
                
                // Update completed steps
                for (let i = 1; i < to; i++) {
                    document.querySelector(`.progress-step[data-step="${i}"]`).classList.add('completed');
                }
                
                // Update progress bar
                const progressPercentage = ((to - 1) / (totalPages - 1)) * 100;
                progressBar.style.setProperty('--progress-width', `${progressPercentage}%`);
            }
            
            // Function to validate current page
            function validatePage(pageNumber) {
                const currentPageElements = document.querySelectorAll(`.form-page[data-page="${pageNumber}"] input, .form-page[data-page="${pageNumber}"] select, .form-page[data-page="${pageNumber}"] textarea`);
                let isValid = true;
                
                currentPageElements.forEach(element => {
                    if (element.hasAttribute('required') && !element.value) {
                        element.style.borderColor = '#e74c3c';
                        isValid = false;
                        
                        // Reset border color when user starts typing
                        element.addEventListener('input', function() {
                            this.style.borderColor = '#ddd';
                        });
                    }
                });
                
                return isValid;
            }
            
            // Function to animate elements
            function animateElements() {
                animatedElements.forEach(element => {
                    element.classList.remove('animated');
                });
                
                const currentPageAnimatedElements = document.querySelectorAll(`.form-page[data-page="${currentPage}"] .scroll-animate`);
                
                currentPageAnimatedElements.forEach((element, index) => {
                    setTimeout(() => {
                        element.classList.add('animated');
                    }, index * 150);
                });
            }
            
            // Intersection Observer for scroll animation
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        setTimeout(() => {
                            element.classList.add('animated');
                        }, 100);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animatedElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>


<div class="office-hours-container">
        <div class="office-info scroll-animate">
            <h2>Our Office</h2>
            <p><strong>Kazimind Wellness Centre</strong><br>Mt kenya road<br>Nanyuki, Sportsman Arms Hotel</p>
            <p>Phone: 070 0479 944</p>
            <p>Email: <a href="mailto:kazimindw@gmail.com">kazimindw@gmail.com</a></p>
        <div class="map">

        <iframe 
            src="https://www.google.com/maps?q=Kazimind+Sportmans+Arms+Hotel+Nanyuki+Kenya&output=embed" 
            width="100%" 
            height="200" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
        </div>
        </div>

    <div class="office-hours scroll-animate">
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
        <p><em>Our therapists work a variety of hours, the above hours indicate when our administrative support is available for you in-office and online.</em></p>
        <p><em>Please note emails sent to the administrative desk on weekends may not be responded to until Monday.</em></p>
    </div>
</div>

<div class="travel-info scroll-animate">
    <h3>Travelling to our office:</h3>
    <p>Located right in the heart of Nanyuki town, on Lenana Road. Within Sportsmans Arms Hotel. </p>  
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