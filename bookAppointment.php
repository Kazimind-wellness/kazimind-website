<?php 
ob_start(); 
session_start(); 
$pageTitle = "Book Now"; 

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Load .env variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $fullName = $_POST['full-name'];
        $emailAddress = $_POST['email'];
        $location = $_POST['location'];
        $phone = $_POST['fullPhone']; // Changed to use fullPhone with country code
        $kinName = $_POST['kin'];
        $kinPhone = $_POST['kinFullPhone']; // Changed to use kinFullPhone with country code
        $dateOfBirth = $_POST['date'];
        $gender = $_POST['Gender'];
        $nationality = $_POST['Nationality'];
        $country = $_POST['Country'];
        $town = $_POST['Town'];
        $county = $_POST['County'];
        $maritalStatus = $_POST['Status'];
        $occupation = $_POST['business'];
        $therapyReason = $_POST['Reason'];
        $referredBy = $_POST['referred'];
        $therapyBefore = $_POST['before'];
        $previousTherapist = $_POST['therapist'];
        $previousTherapistLocation = $_POST['therapistloc'];
        $onMedication = $_POST['medication'];
        $doctorName = $_POST['doctor'];
        $substanceUse = $_POST['usage'];
        $availableDate = $_POST['available'];
        $preferredTime = $_POST['time'];
        $therapyType = $_POST['looking'];
        $insuranceProvider = $_POST['provider'];
        $paymentConfirmation = $_POST['confirmation'];
        $referenceNumber = $_POST['reference'];
        $paymentMode = $_POST['payment'];
        $psychotherapistName = $_POST['Psychotherapist'];

        // Construct email message with all form data
        $subject = "New Booking Request: Kazimind Wellness";
        $body = "A new client has submitted a booking request with the following details:\n\n";
        $body .= "PERSONAL INFORMATION:\n";
        $body .= "Full Name: $fullName\n";
        $body .= "Email: $emailAddress\n";
        $body .= "Phone: $phone\n";
        $body .= "Date of Birth: $dateOfBirth\n";
        $body .= "Gender: $gender\n";
        $body .= "Nationality: $nationality\n";
        $body .= "Country: $country\n";
        $body .= "Town: $town\n";
        $body .= "County: $county\n";
        $body .= "Location/Residence: $location\n\n";
        
        $body .= "CONTACT & BACKGROUND INFORMATION:\n";
        $body .= "Next of Kin Name: $kinName\n";
        $body .= "Next of Kin Phone: $kinPhone\n";
        $body .= "Marital Status: $maritalStatus\n";
        $body .= "Occupation/Business: $occupation\n";
        $body .= "Reason for Therapy: $therapyReason\n";
        $body .= "Referred By: $referredBy\n";
        $body .= "Therapy Before: $therapyBefore\n";
        if ($therapyBefore == "Yes") {
            $body .= "Previous Therapist: $previousTherapist\n";
            $body .= "Previous Therapist Location: $previousTherapistLocation\n";
        }
        $body .= "Currently on Medication: $onMedication\n";
        if ($onMedication == "Yes") {
            $body .= "Doctor Name: $doctorName\n";
        }
        $body .= "Alcohol/Drug Usage: $substanceUse\n\n";
        
        $body .= "APPOINTMENT DETAILS:\n";
        $body .= "Available Date: $availableDate\n";
        $body .= "Preferred Time: $preferredTime\n";
        $body .= "Therapy Type: $therapyType\n";
        $body .= "Insurance Provider: $insuranceProvider\n";
        $body .= "Payment Confirmation ID/Name: $paymentConfirmation\n";
        $body .= "Reference Number: $referenceNumber\n";
        $body .= "Payment Mode: $paymentMode\n";
        $body .= "Preferred Psychotherapist: $psychotherapistName\n";

        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USERNAME'];
            $mail->Password = $_ENV['EMAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom($_ENV['EMAIL_USERNAME'], 'Kazimind Wellness');
            $mail->addAddress($_ENV['EMAIL_RECEIVER']);

            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            echo "<script>
                    alert('✅ Booking submitted successfully!\\\\n\\\\nThank you for choosing Kazimind Wellness. We will contact you shortly to confirm your appointment.');
                    document.getElementById('booking-form').reset();
                    // Reset form to first page if it's a multi-step form
                    window.location.href = window.location.href.split('?')[0];
                </script>";
            exit();
        } catch (Exception $e) {
            // Log the error and show a user-friendly message
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo "<script>alert('Failed to submit booking request. Please try again later.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
            width: var(--progress-width, 0%);
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
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
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
        .phone-input-group {
            display: flex;
            gap: 10px;
        }
        .country-code {
            flex: 0 0 100px;
        }
        .phone-number {
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
        .office-hours-container {
            display: flex;
            gap: 30px;
            margin-top: 40px;
        }
        .office-info, .office-hours {
            flex: 1;
        }
        .travel-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .two-columns, .phone-input-group {
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
            .office-hours-container {
                flex-direction: column;
            }
        }
        @media (max-width: 480px) {
            .progress-step {
                width: 25px;
                height: 25px;
                font-size: 12px;
            }
            .form-group input, .form-group select, .form-group textarea {
                padding: 10px;
                font-size: 14px;
            }
            .nav-button {
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Book Your Appointment</h2>
        <div class="progress-bar">
            <div class="progress-step active" data-step="1">1</div>
            <div class="progress-step" data-step="2">2</div>
            <div class="progress-step" data-step="3">3</div>
            <div class="progress-step" data-step="4">4</div>
        </div>
        <form id="booking-form" method="post">
            <!-- Page 1: Personal Information -->
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
                        <option value="Prefer not to say">Prefer not to say</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Nationality">Nationality <span>(required)</span></label>
                    <input type="text" id="Nationality" placeholder="Nationality" name="Nationality" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Country">Country <span>(required)</span></label>
                      <select id="Country" name="Country" required>
                        <option value="">Select your country</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="location">Place of residence / Ward <span>(required)</span></label>
                    <input type="text" id="location" name="location" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Town">Town <span>(required)</span></label>
                    <input type="text" id="Town" name="Town" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="County">County <span>(required)</span></label>
                    <input type="text" id="County" name="County" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="phone">Primary Cellphone number <span>(required)</span></label>
                    <input type="tel" id="phone" name="phone">
                    <input type="hidden" id="fullPhone" name="fullPhone">
                </div>
            </div>

            <!-- Page 2: Contact & Background Information -->
            <div class="form-page" data-page="2">
                <div class="form-group scroll-animate">
                    <label for="kin">Next of kin name (Family/Friend) <span>(required)</span></label>
                    <input type="text" id="kin" name="kin" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="kinCel">Next of kin cellphone number (Family/Friend) <span>(required)</span></label>
                    <input type="tel" id="kinCel" name="kinCel">
                    <input type="hidden" id="kinFullPhone" name="kinFullPhone">
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
                    <label for="business">Occupation/ business <span>(required)</span></label>
                    <input type="text" id="business" name="business" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="Reason">Reason for seeking Therapy <span>(required)</span></label>
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
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
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
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group scroll-animate">
                    <label for="doctor">If you're on medication, who is the doctor?</label>
                    <input type="text" id="doctor" name="doctor">
                </div>
            </div>

            <!-- Page 3: Appointment Details -->
            <div class="form-page" data-page="3">
                <div class="form-group scroll-animate">
                    <label for="usage">Any alcohol/Drug usage? <span>(required)</span></label>
                    <select id="usage" name="usage" required>
                        <option value="">Select an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
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
                    <label for="looking">What type of therapy are you looking forward to have with us? <span>(required)</span></label>
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
                <h2>PAYBILL NUMBER: <span style="color: red;">247 247 </span>; BUSINESS NUMBER:<span style="color: red;"> 502 450 </span></h2>
                <div class="form-group scroll-animate">
                    <label for="confirmation">Please provide your payment confirmation ID / NAME <span>(required)</span></label>
                    <input type="text" id="confirmation" name="confirmation" required>
                </div>
            </div>

            <!-- Page 4: Final Details -->
            <div class="form-page" data-page="4">
                <div class="form-group scroll-animate">
                    <label for="reference">Our reference number (Write in the following format KMW/Id Number) <span>(required)</span></label>
                    <input type="text" id="reference" name="reference" required>
                </div>
                <div class="form-group scroll-animate">
                    <label for="payment">Mode of payment <span>(required)</span></label>
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
                    <label for="Psychotherapist">Name of Psychotherapist <span>(required)</span></label>
                    <input type="text" id="Psychotherapist" name="Psychotherapist" required>
                </div>
            </div>

            <div class="form-navigation">
                <button type="button" class="nav-button prev" id="prev-button" style="visibility: hidden;">Previous</button>
                <button type="button" class="nav-button next" id="next-button">Next</button>
                <button type="submit" class="nav-button submit" id="submit-button" name="submit" style="display: none;">Submit</button>
            </div>
        </form>
    </div>

    <div class="office-hours-container">
        <div class="office-info scroll-animate">
            <h2>Our Office</h2>
            <p><strong>Kazimind Wellness Centre</strong><br> Mt Kenya Road, Nanyuki<br></p>
            <p>Phone: 0700 479 944 | 020 202 0830</p>
            <p>Email: <a href="mailto:admin@kazimind.com">admin@kazimind.com</a></p>
            <div class="map">
                <iframe src="https://www.google.com/maps?q=KaziMind+Wellness+Nanyuki+Kenya&output=embed" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="office-hours scroll-animate">
            <h2>Our Office Hours</h2>
            <ul>
                <li><strong>Mondays to Fridays: </strong> 8am to 5pm</li>
                <li><strong>Saturdays: </strong> 9am to 4:30pm </li>
                <li><strong>Sundays: </strong> closed</li>
                <li><strong>Public Holidays:  </strong> Open by appointment only</li>
            </ul>
            <p><em>Our therapists work flexible hours; however, the times listed above reflect when our administrative support is available both in-office and online.</em></p>
            <p><em>Please note that emails sent to our administrative desk over the weekend may not receive a response until Monday.</em></p>
        </div>
    </div>

    <div class="travel-info scroll-animate">
        <h3>Travelling to our office:</h3>
        <p>Located right in the heart of Nanyuki town, on Lenana Road. Within Sportsmans Arms Hotel.</p>
    </div>
        <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const countrySelect = document.getElementById("Country");

            try {
            const response = await fetch("https://restcountries.com/v3.1/all?fields=name");
            const countries = await response.json();

            // Sort countries alphabetically
            const sortedCountries = countries.sort((a, b) =>
                a.name.common.localeCompare(b.name.common)
            );

            // Populate dropdown
            sortedCountries.forEach(country => {
                const option = document.createElement("option");
                option.value = country.name.common;
                option.textContent = country.name.common;
                countrySelect.appendChild(option);
            });
            } catch (error) {
            console.error("Error loading countries:", error);
            const option = document.createElement("option");
            option.textContent = "Unable to load countries";
            countrySelect.appendChild(option);
            }
        });
        </script>

    <script>
        // Initialize phone inputs with international dialing codes
        document.addEventListener('DOMContentLoaded', function () {
            // Primary phone input
            const phoneInput = document.querySelector("#phone");
            const fullPhoneInput = document.querySelector("#fullPhone");
            
            // Next of kin phone input
            const kinPhoneInput = document.querySelector("#kinCel");
            const kinFullPhoneInput = document.querySelector("#kinFullPhone");
            
            const form = document.querySelector("#booking-form");

            // Initialize primary phone input
            const itiPhone = window.intlTelInput(phoneInput, {
                initialCountry: "auto",
                geoIpLookup: (success, failure) => {
                    fetch("https://ipinfo.io/json?token=YOUR_TOKEN_HERE")
                        .then(res => res.json())
                        .then(data => success(data.country))
                        .catch(() => success("ke")); // fallback: Kenya
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
            });

            // Initialize next of kin phone input
            const itiKinPhone = window.intlTelInput(kinPhoneInput, {
                initialCountry: "auto",
                geoIpLookup: (success, failure) => {
                    fetch("https://ipinfo.io/json?token=YOUR_TOKEN_HERE")
                        .then(res => res.json())
                        .then(data => success(data.country))
                        .catch(() => success("ke")); // fallback: Kenya
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
            });

            // On form submit, set hidden fields with full phone numbers
            form.addEventListener("submit", function () {
                fullPhoneInput.value = itiPhone.getNumber(); // gives +254...
                kinFullPhoneInput.value = itiKinPhone.getNumber(); // gives +254...
            });

            // Time format conversion
            document.getElementById('time').addEventListener('change', function() {
                const timeValue = this.value;
                if (timeValue) {
                    const [hours, minutes] = timeValue.split(':');
                    let hour12 = parseInt(hours) % 12 || 12;
                    const ampm = parseInt(hours) >= 12 ? 'PM' : 'AM';
                    this.value = timeValue; // Keep 24h format for submission
                    console.log(`${hour12}:${minutes} ${ampm}`);
                }
            });
        });
    </script>

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
                if (!validatePage(currentPage)) {
                    e.preventDefault();
                    alert('Please fill in all required fields before submitting.');
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
                    } else {
                        entry.target.classList.remove('animated');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            animatedElements.forEach(element => {
                observer.observe(element);
            });

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