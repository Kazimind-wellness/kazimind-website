<?php
ob_start();
session_start();
$pageTitle = "Psychotherapy Services";

// --- START: Volunteer Form Email Handling ---
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$volunteer_status_message = ''; // For optional feedback

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['volunteer_submit'])) {
    // Retrieve volunteer form data
    $fullName       = $_POST['fullName'] ?? '';
    $phoneNumber    = $_POST['phoneNumber'] ?? '';
    $emailAddress   = $_POST['emailAddress'] ?? '';
    $residence      = $_POST['residence'] ?? '';
    $volunteerRole  = $_POST['volunteerRole'] ?? '';
    $availability   = $_POST['availability'] ?? '';
    $experience     = $_POST['experience'] ?? '';
    $motivation     = $_POST['motivation'] ?? '';
    $agree          = isset($_POST['agree']) ? 'Yes' : 'No';

    // Construct email body
    $subject = "New Volunteer Application - Mental Health BootCamp";
    $body = "A new volunteer application has been submitted.\n\n"
          . "Full Name: $fullName\n"
          . "Phone Number: $phoneNumber\n"
          . "Email Address: $emailAddress\n"
          . "Location/Residence: $residence\n"
          . "Preferred Volunteer Role: $volunteerRole\n"
          . "Availability: $availability\n"
          . "Relevant Skills/Experience: $experience\n"
          . "Motivation Message: $motivation\n"
          . "Agreed to terms: $agree\n";

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

        $volunteer_status_message = "<p style='color: green; text-align: center;'>Thank you! Your volunteer application has been submitted successfully.</p>";

    } catch (Exception $e) {
        $volunteer_status_message = "<p style='color: red; text-align: center;'>Failed to submit application. Please try again later.</p>";
    }
}
// --- END: Volunteer Form Email Handling ---
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/indexStyles.min.css">
    <link rel="stylesheet" href="assets/css/h-footer.min.css">
    <link rel="stylesheet" href="assets/css/therapyStyles.min.css">
    <style>
        /* FAQ Section Styles */
        .faqH1 {
            text-align: center;
            font-size: 2.5rem;
            margin: 60px 0 40px;
            color: #1a2a4f;
            font-family: 'Titillium Web', sans-serif;
            font-weight: 700;
        }
        
        .faq-container {
            max-width: 900px;
            margin: 0 auto 40px;
            padding: 0 20px;
        }
        
        .faq-item {
            background: #006fd1;
            border-radius: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            overflow: hidden;
            cursor: pointer;
        }
        
        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(0, 111, 209, 0.1);
        }
        
        .faq-question {
            padding: 20px 24px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #f8fafc;
            background: #006fd1;
            position: relative;
            padding-right: 50px;
            font-family: 'Titillium Web', sans-serif;
        }
        
        .faq-question::after {
            content: '\f067';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
            font-size: 1rem;
            transition: transform 0.3s ease;
        }
        
        .faq-item.active .faq-question {
            color: #1e293b;
        }
        
        .faq-item.active .faq-question::after {
            content: '\f068';
        }
        
        .faq-answer {
            max-height: 0;
            padding: 0 24px;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease;
            background: #ffffff;
            line-height: 1.6;
            color: #334155;
            font-size: 1rem;
            font-family: 'Titillium Web', sans-serif;
        }
        
        .faq-item.active .faq-answer {
            max-height: 800px;
            padding: 0 24px 24px 24px;
        }
        
        .faq-answer strong {
            color: #006fd1;
        }

        /* Donation Button Styles */
        .donation-btn-wrapper {
            text-align: center;
            margin: 40px 0 30px;
        }
        
        .donation-main-btn {
            background: linear-gradient(135deg, #006fd1 0%, #1e88e5 100%);
            color: white;
            border: none;
            padding: 16px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 111, 209, 0.3);
            font-family: 'Titillium Web', sans-serif;
        }
        
        .donation-main-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 111, 209, 0.4);
            background: linear-gradient(135deg, #0056b3 0%, #006fd1 100%);
        }

        /* Donation Modal */
        .donation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            font-family: 'Titillium Web', sans-serif;
        }
        
        .donation-modal.active {
            display: flex;
        }
        
        .donation-modal-content {
            background: white;
            border-radius: 24px;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .donation-modal-header {
            padding: 24px 24px 16px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .donation-modal-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        
        .donation-modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }
        
        .donation-modal-close:hover {
            color: #ef4444;
        }
        
        .donation-modal-body {
            padding: 24px;
        }
        
        .donation-step {
            display: none;
        }
        
        .donation-step.active-step {
            display: block;
        }
        
        .donation-description {
            color: #475569;
            margin-bottom: 24px;
            font-size: 0.95rem;
        }
        
        .frequency-toggle {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
            background: #f1f5f9;
            padding: 6px;
            border-radius: 60px;
        }
        
        .freq-btn {
            flex: 1;
            text-align: center;
            padding: 10px 0;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            color: #64748b;
        }
        
        .freq-btn.active {
            background: white;
            color: #006fd1;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .amount-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 16px;
        }
        
        .amount-option {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 8px;
            text-align: center;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            color: #1e293b;
        }
        
        .amount-option:hover {
            border-color: #006fd1;
            background: #f0f9ff;
        }
        
        .amount-option.selected {
            background: #006fd1;
            border-color: #006fd1;
            color: white;
        }
        
        .custom-amount-input {
            margin-top: 16px;
            margin-bottom: 24px;
        }
        
        .custom-amount-input label {
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 6px;
            display: block;
        }
        
        .custom-amount-input input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Titillium Web', sans-serif;
        }
        
        .custom-amount-input input:focus {
            outline: none;
            border-color: #006fd1;
            box-shadow: 0 0 0 3px rgba(0,111,209,0.1);
        }
        
        .donation-next-btn {
            width: 100%;
            background: #006fd1;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 16px;
        }
        
        .donation-next-btn:hover {
            background: #0056b3;
        }
        
        .payment-summary {
            background: #f8fafc;
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .payment-summary-info {
            display: flex;
            flex-direction: column;
        }
        
        .payment-summary-label {
            font-size: 0.8rem;
            color: #64748b;
        }
        
        .payment-summary-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }
        
        .payment-summary-edit {
            background: none;
            border: none;
            color: #006fd1;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.85rem;
        }
        
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 24px;
        }
        
        .payment-method {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .payment-method:hover {
            border-color: #006fd1;
            background: #f0f9ff;
        }
        
        .payment-method.selected {
            border-color: #006fd1;
            background: #f0f9ff;
        }
        
        .payment-method i {
            font-size: 1.6rem;
            color: #006fd1;
        }
        
        .payment-method span {
            font-weight: 600;
            color: #1e293b;
        }
        
        .payment-instructions {
            text-align: center;
        }
        
        .mobile-money-icon {
            font-size: 3rem;
            color: #006fd1;
            margin-bottom: 16px;
        }
        
        .payment-details-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 24px;
            margin: 20px 0;
            text-align: left;
        }
        
        .payment-detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .payment-detail-row:last-child {
            border-bottom: none;
        }
        
        .payment-detail-label {
            font-weight: 600;
            color: #475569;
        }
        
        .payment-detail-value {
            font-weight: 700;
            color: #1e293b;
        }
        
        .payment-instruction-note {
            background: #e6f7e6;
            border-radius: 12px;
            padding: 14px;
            margin: 16px 0;
            font-size: 0.85rem;
            color: #2e7d32;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }
        
        .mpesa-guide-btn {
            background: #00a859;
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: 40px;
            font-weight: 700;
            width: 100%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 16px;
        }
        
        .mpesa-guide-btn:hover {
            background: #008f4a;
        }
        
        .back-to-payment {
            background: none;
            border: none;
            color: #006fd1;
            font-weight: 600;
            cursor: pointer;
            margin-top: 16px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Registration & Volunteer Section */
        .reg-section {
            max-width: 1200px;
            margin: 0 auto 80px;
            padding: 0 20px;
            font-family: 'Titillium Web', sans-serif;
            overflow: visible !important;
        }

        .reg-top-header {
            background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 50%, #e0f2fe 100%);
            border-radius: 16px;
            padding: 50px 30px;
            text-align: center;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(200, 225, 245, 0.5);
            overflow: visible !important;
        }

        .reg-top-header .sub-tag {
            color: #d97706;
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 12px;
            display: block;
        }

        .reg-top-header h1 {
            color: #006fd1;
            font-size: 3rem;
            font-weight: 800;
            margin: 0 0 20px 0;
            letter-spacing: -0.5px;
        }

        .reg-top-header > p {
            color: #475569;
            font-size: 1.15rem;
            line-height: 1.6;
            max-width: 850px;
            margin: 0 auto;
            font-weight: 400;
        }

        /* Volunteer Content Wrapper */
        .volunteer-content-wrapper {
            text-align: left;
            margin-top: 35px;
            overflow: visible !important;
            width: 100%;
        }

        .section-title {
            color: #006fd1;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* How You Can Get Involved Grid */
        .involvement-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .involvement-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .involvement-card i {
            font-size: 2rem;
            color: #006fd1;
            margin-bottom: 12px;
            display: block;
        }

        .involvement-card h4 {
            color: #1e293b;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .involvement-card p {
            font-size: 0.9rem;
            color: #475569;
            margin: 0;
        }

        /* Volunteer Expectations Box */
        .expectations-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }

        .expectations-box h3 {
            color: #006fd1;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .expectations-box ul {
            margin: 0;
            padding-left: 20px;
            color: #334155;
            line-height: 1.8;
        }

        /* Why Volunteer Box */
        .why-volunteer-box {
            background: #e0f2fe;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }

        .why-volunteer-box h3 {
            color: #006fd1;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .why-volunteer-box p {
            margin-bottom: 15px;
        }

        .why-volunteer-list {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
            display: inline-block;
        }

        .why-volunteer-list li {
            margin-bottom: 10px;
        }

        .why-volunteer-list li i {
            color: #006fd1;
            margin-right: 10px;
        }

        .closing-statement {
            margin-top: 20px;
            font-weight: 600;
            color: #006fd1;
        }

        /* Two-Column Form Split Layout */
        .reg-container-layout {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 30px;
            align-items: start;
        }

        /* Left Side: Info Poster Card */
        .reg-poster-card {
            background: #006fd1; 
            border-radius: 16px;
            padding: 35px 25px;
            color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .reg-poster-card h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            color: #ffffff;
        }

        .reg-badge-title {
            background: #ffffff;
            color: #14a384;
            display: inline-block;
            padding: 6px 15px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .reg-poster-list-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 5px;
        }

        .reg-poster-list {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .reg-poster-list li {
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .reg-poster-list li i {
            color: #ffffff;
        }

        .reg-poster-footer-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .reg-poster-footer-box div {
            margin-bottom: 5px;
        }

        /* Right Side: Registration Form Container */
        .reg-form-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .reg-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .reg-form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: left;
        }

        .reg-form-group.full-width {
            grid-column: span 2;
        }

        .reg-form-group label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #334155;
        }

        .reg-form-group label span {
            color: #ef4444;
            margin-left: 2px;
        }

        .reg-form-group input, 
        .reg-form-group select, 
        .reg-form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: 'Titillium Web', sans-serif;
            color: #334155;
            background-color: #ffffff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .reg-form-group input:focus, 
        .reg-form-group select:focus, 
        .reg-form-group textarea:focus {
            outline: none;
            border-color: #006fd1;
            box-shadow: 0 0 0 3px rgba(0, 111, 209, 0.15);
        }

        /* Radio Toggle Switch Options */
        .availability-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .avail-btn-label {
            border: 1px solid #cbd5e1;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            color: #475569;
            transition: all 0.2s ease;
        }

        .availability-options input[type="radio"] {
            display: none;
        }

        .availability-options input[type="radio"]:checked + .avail-btn-label {
            background-color: #006fd1;
            border-color: #006fd1;
            color: #ffffff;
        }

        .reg-checkbox-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 25px 0;
            font-size: 0.95rem;
            color: #475569;
            text-align: left;
            cursor: pointer;
        }

        .reg-checkbox-row input {
            margin-top: 4px;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .reg-submit-btn {
            width: 100%;
            background: #006fd1;
            color: #ffffff;
            border: none;
            padding: 15px;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 111, 209, 0.2);
            transition: background 0.2s ease;
        }

        .reg-submit-btn:hover {
            background: #0056a4;
        }

        /* Animation classes */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .scroll-animate.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .volunteer-status-message {
            max-width: 1200px;
            margin: 20px auto 0;
            padding: 0 20px;
        }

        /* ========== RESPONSIVE BREAKPOINTS ========== */
        
        /* Tablet and below (992px and less) */
        @media (max-width: 992px) {
            .reg-section {
                overflow: visible !important;
            }
            
            .reg-top-header {
                overflow: visible !important;
                height: auto !important;
                padding: 40px 25px !important;
                text-align: left !important;
            }
            
            .reg-top-header > p {
                max-width: 100% !important;
                text-align: left !important;
                margin: 0 0 20px 0 !important;
            }
            
            .volunteer-content-wrapper {
                overflow: visible !important;
                width: 100% !important;
            }
            
            .involvement-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px !important;
            }
            
            .reg-container-layout {
                grid-template-columns: 1fr !important;
                gap: 30px !important;
            }
            
            .reg-poster-card,
            .reg-form-card {
                width: 100% !important;
            }
            
            /* Force all child elements to be visible */
            .reg-top-header * {
                max-height: none !important;
                overflow: visible !important;
            }
        }
        
        /* Mobile (768px and less) */
        @media (max-width: 768px) {
            .reg-top-header {
                padding: 30px 20px !important;
            }
            
            .reg-top-header h1 {
                font-size: 1.8rem !important;
                text-align: center !important;
            }
            
            .reg-top-header .sub-tag {
                text-align: center !important;
            }
            
            .reg-top-header > p {
                font-size: 0.95rem !important;
                text-align: left !important;
            }
            
            .involvement-grid {
                grid-template-columns: 1fr !important;
                gap: 15px !important;
            }
            
            .involvement-card {
                padding: 15px !important;
            }
            
            .expectations-box,
            .why-volunteer-box {
                padding: 20px !important;
                margin: 20px 0 !important;
            }
            
            .expectations-box h3,
            .why-volunteer-box h3 {
                font-size: 1.2rem !important;
                text-align: center !important;
            }
            
            .expectations-box ul {
                padding-left: 20px !important;
            }
            
            .expectations-box ul li,
            .why-volunteer-list li {
                font-size: 0.85rem !important;
                margin-bottom: 8px !important;
            }
            
            .why-volunteer-list {
                text-align: left !important;
                display: block !important;
            }
            
            .why-volunteer-list li {
                display: flex !important;
                align-items: flex-start !important;
            }
            
            .why-volunteer-list li i {
                margin-top: 3px !important;
            }
            
            .faqH1 {
                font-size: 2rem;
                margin: 40px 0 25px;
            }
            
            .faq-question {
                font-size: 1rem;
                padding: 16px 20px;
                padding-right: 45px;
            }
            
            .faq-answer {
                font-size: 0.9rem;
            }
            
            .reg-form-grid {
                grid-template-columns: 1fr;
            }
            
            .reg-form-group.full-width {
                grid-column: span 1;
            }
            
            .reg-form-card {
                padding: 25px 20px;
            }
        }
        
        /* Small Mobile (576px and less) */
        @media (max-width: 576px) {
            .reg-top-header {
                padding: 20px 15px !important;
            }
            
            .reg-top-header h1 {
                font-size: 1.5rem !important;
            }
            
            .involvement-card {
                padding: 12px !important;
            }
            
            .involvement-card h4 {
                font-size: 1rem !important;
            }
            
            .involvement-card p {
                font-size: 0.8rem !important;
            }
            
            .amount-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .donation-modal-content {
                width: 95%;
            }
        }
    </style>
</head>

<h1 class="therapy-heading animate-on-scroll">Mental Health bootCamp Programs</h1>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/4105057/pexels-photo-4105057.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Understanding Self</h2>
            <p>Focusing on self-awareness, self-reflection, and inner growth, this area explores personality, values, and beliefs to understand the root of thoughts and actions, fostering personal maturity.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/8950828/pexels-photo-8950828.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Self Esteem and Motivation</h2>
            <p>This topic centers on building confidence and recognizing personal worth while identifying the internal drive necessary to pursue goals and overcome life's obstacles.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/20040806/pexels-photo-20040806.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Emotional Intelligence and Resilience</h2>
            <p>Develop the ability to recognize and manage personal emotions and those of others, while building the capacity to bounce back effectively from difficult life events.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/6632512/pexels-photo-6632512.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Stress Management, Mindfulness and Resilience</h2>
            <p>Learn practical techniques for reducing tension and anxiety through mindfulness and staying present, ensuring mental balance is maintained even under significant pressure.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/7550297/pexels-photo-7550297.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Social Skills and Communication</h2>
            <p>Improve interpersonal interactions by mastering active listening, interpreting body language, and practicing clear verbal expression for more effective social engagement.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/19717979/pexels-photo-19717979.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Healthy Friendship and Managing Relationships</h2>
            <p>Understand the boundaries of positive social connections and learn how to resolve conflicts and navigate complex dynamics with peers, friends, and family.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/9708519/pexels-photo-9708519.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Modern Challenges and Personal Growth</h2>
            <p>Addressing the impact of technology on mental health, this section focuses on digital wellness and overcoming screen addiction to find a healthy balance in a connected world.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/7230342/pexels-photo-7230342.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Drugs and Substance Awareness</h2>
            <p>Providing vital education on the risks of substance use, this topic emphasizes prevention, healthy decision-making, and understanding the impact of chemicals on the body and mind.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/6770142/pexels-photo-6770142.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Sexuality</h2>
            <p>A comprehensive look at identity, physical health, and consent, fostering an environment where emotional aspects of human relationships can be discussed with respect and clarity.</p>
        </div>
    </div>
</div>

<div class="therapy-section animate-on-scroll">
    <div class="therapy-content">
        <div class="therapy-image">
            <img src="https://images.pexels.com/photos/5717463/pexels-photo-5717463.jpeg" loading="lazy" alt="Therapy image">
        </div>
        <div class="therapy-text">
            <h2>Goal Setting</h2>
            <p>Learn how to transform aspirations into reality by identifying specific objectives and creating structured action plans to achieve personal and professional success.</p>
        </div>
    </div>
</div>

<!-- DONATION MODAL POPUP -->
<div id="donationModal" class="donation-modal">
    <div class="donation-modal-content">
        <div class="donation-modal-header">
            <h2 id="modalTitle">Make a Donation</h2>
            <button class="donation-modal-close" id="closeDonationModal">&times;</button>
        </div>
        <div class="donation-modal-body">
            <!-- Step 1: Amount Selection -->
            <div id="step1" class="donation-step active-step">
                <p class="donation-description">Your donation makes a real difference. Choose an amount to get started.</p>
                
                <div class="frequency-toggle">
                    <div class="freq-btn active" data-freq="once">Once</div>
                    <div class="freq-btn" data-freq="repeat">Repeat</div>
                </div>
                
                <div class="amount-grid">
                    <div class="amount-option" data-amount="10000">KES 10,000</div>
                    <div class="amount-option" data-amount="20000">KES 20,000</div>
                    <div class="amount-option" data-amount="50000">KES 50,000</div>
                    <div class="amount-option" data-amount="100000">KES 100,000</div>
                </div>
                
                <div class="custom-amount-input">
                    <label>KES (Other amount)</label>
                    <input type="number" id="customAmount" placeholder="Enter amount" min="1">
                </div>
                
                <button class="donation-next-btn" id="goToStep2">Continue</button>
            </div>
            
            <!-- Step 2: Payment Method Selection -->
            <div id="step2" class="donation-step">
                <p class="donation-description">Choose your preferred payment method to complete your donation.</p>
                
                <div class="payment-summary">
                    <div class="payment-summary-info">
                        <span class="payment-summary-label" id="paymentFreqLabel">One-time donation</span>
                        <span class="payment-summary-amount" id="paymentAmountDisplay">KES 0</span>
                    </div>
                    <button class="payment-summary-edit" id="editAmountBtn">Edit</button>
                </div>
                
                <div class="payment-methods">
                    <div class="payment-method" data-method="mpesa">
                        <i class="fas fa-mobile-alt"></i>
                        <span>M-Pesa / Airtel</span>
                    </div>
                </div>
                
                <button class="donation-next-btn" id="goToStep3">Continue</button>
            </div>
            
            <!-- Step 3: Payment Instructions -->
            <div id="step3" class="donation-step">
                <div class="payment-instructions">
                    <div class="mobile-money-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 style="margin-bottom: 8px;">Mobile Payment</h3>
                    <p style="color: #475569; margin-bottom: 16px;">M-PESA &nbsp;|&nbsp; Airtel Money</p>
                    
                    <div class="payment-details-card">
                        <div class="payment-detail-row">
                            <span class="payment-detail-label">Paybill:</span>
                            <span class="payment-detail-value">247247</span>
                        </div>
                        <div class="payment-detail-row">
                            <span class="payment-detail-label">Account Number:</span>
                            <span class="payment-detail-value">28880</span>
                        </div>
                        <div class="payment-detail-row">
                            <span class="payment-detail-label">Amount:</span>
                            <span class="payment-detail-value" id="finalAmountDisplay">KES 0</span>
                        </div>
                    </div>
                    
                    <div class="payment-instruction-note">
                        <i class="fas fa-info-circle"></i>
                        <span>Go to M-Pesa → Lipa na M-Pesa → Paybill, enter the Paybill and Account Number above, then the amount.</span>
                    </div>
                    
                    <button class="mpesa-guide-btn" id="copyPaymentDetails">
                        <i class="fas fa-copy"></i> Copy Payment Details
                    </button>
                    
                    <button class="back-to-payment" id="backToStep2">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Donation Modal JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('donationModal');
    const openBtn = document.getElementById('openDonationModal');
    const closeBtn = document.getElementById('closeDonationModal');
    
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    
    let selectedAmount = 0;
    let selectedFrequency = 'once';
    
    const amountOptions = document.querySelectorAll('.amount-option');
    const customAmountInput = document.getElementById('customAmount');
    const freqBtns = document.querySelectorAll('.freq-btn');
    const paymentMethods = document.querySelectorAll('.payment-method');
    const paymentAmountDisplay = document.getElementById('paymentAmountDisplay');
    const finalAmountDisplay = document.getElementById('finalAmountDisplay');
    const paymentFreqLabel = document.getElementById('paymentFreqLabel');
    
    if (openBtn) {
        openBtn.addEventListener('click', () => {
            modal.classList.add('active');
            resetToStep1();
        });
    }
    
    function closeModal() {
        modal.classList.remove('active');
        resetToStep1();
    }
    
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (modal) modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
    
    function resetToStep1() {
        step1.classList.add('active-step');
        step2.classList.remove('active-step');
        step3.classList.remove('active-step');
        selectedAmount = 0;
        selectedFrequency = 'once';
        amountOptions.forEach(opt => opt.classList.remove('selected'));
        if (customAmountInput) customAmountInput.value = '';
        freqBtns.forEach(btn => {
            if (btn.dataset.freq === 'once') btn.classList.add('active');
            else btn.classList.remove('active');
        });
    }
    
    freqBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            freqBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            selectedFrequency = btn.dataset.freq;
        });
    });
    
    amountOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            amountOptions.forEach(o => o.classList.remove('selected'));
            opt.classList.add('selected');
            if (customAmountInput) customAmountInput.value = '';
            selectedAmount = parseInt(opt.dataset.amount);
        });
    });
    
    if (customAmountInput) {
        customAmountInput.addEventListener('input', () => {
            amountOptions.forEach(o => o.classList.remove('selected'));
            const value = parseInt(customAmountInput.value);
            if (!isNaN(value) && value > 0) {
                selectedAmount = value;
            } else {
                selectedAmount = 0;
            }
        });
    }
    
    document.getElementById('goToStep2').addEventListener('click', () => {
        if (selectedAmount <= 0) {
            alert('Please select or enter a donation amount.');
            return;
        }
        const freqText = selectedFrequency === 'once' ? 'One-time donation' : 'Monthly donation';
        paymentFreqLabel.textContent = freqText;
        paymentAmountDisplay.textContent = `KES ${selectedAmount.toLocaleString()}`;
        step1.classList.remove('active-step');
        step2.classList.add('active-step');
    });
    
    document.getElementById('editAmountBtn').addEventListener('click', () => {
        step2.classList.remove('active-step');
        step1.classList.add('active-step');
    });
    
    paymentMethods.forEach(method => {
        method.addEventListener('click', () => {
            paymentMethods.forEach(m => m.classList.remove('selected'));
            method.classList.add('selected');
        });
    });
    
    if (paymentMethods.length > 0) paymentMethods[0].classList.add('selected');
    
    document.getElementById('goToStep3').addEventListener('click', () => {
        finalAmountDisplay.textContent = `KES ${selectedAmount.toLocaleString()}`;
        step2.classList.remove('active-step');
        step3.classList.add('active-step');
    });
    
    document.getElementById('backToStep2').addEventListener('click', () => {
        step3.classList.remove('active-step');
        step2.classList.add('active-step');
    });
    
    document.getElementById('copyPaymentDetails').addEventListener('click', async () => {
        const paymentText = `Paybill: 522522\nAccount Number: 1351573063\nAmount: KES ${selectedAmount.toLocaleString()}`;
        try {
            await navigator.clipboard.writeText(paymentText);
            alert('Payment details copied to clipboard!');
        } catch (err) {
            alert('Could not copy details. Please copy manually.');
        }
    });
    
    // FAQ functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.stopPropagation();
            item.classList.toggle('active');
        });
    });
    
    // Scroll animations
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    const scrollAnimateElements = document.querySelectorAll('.scroll-animate');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, { threshold: 0.2, rootMargin: '0px 0px -100px 0px' });
    
    animateElements.forEach(el => observer.observe(el));
    
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, { threshold: 0.2, rootMargin: '0px 0px -50px 0px' });
    
    scrollAnimateElements.forEach(el => scrollObserver.observe(el));
    
    // Hover effects for therapy sections
    const therapySections = document.querySelectorAll('.therapy-section');
    therapySections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 30px rgba(0, 111, 209, 0.1)';
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
        section.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>

<h1 class="faqH1 scroll-animate" id="faqH1">Boot Camp Frequently Asked Questions</h1>

<div class="faq-container scroll-animate">
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How much do you charge for the Mental Health Bootcamp?</div>
        <div class="faq-answer"><strong>A:</strong> The program fee is KES 1,000 per participant, per program session.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Who are the experts running the program?</div>
        <div class="faq-answer"><strong>A:</strong> The bootcamp is facilitated by registered psychologists who are specialists in child and adolescent mental health.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Is the bootcamp a boarding program?</div>
        <div class="faq-answer"><strong>A:</strong> No. The program operates on a pick-and-drop basis. Participants attend sessions during the day and return home afterward.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer virtual classes?</div>
        <div class="faq-answer"><strong>A:</strong> Yes. We offer both physical and virtual program options to accommodate different needs.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How many days does the program run?</div>
        <div class="faq-answer"><strong>A:</strong> The bootcamp runs from 13th to 18th April 2026, with the 18th designated as the closing ceremony.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you provide food during the bootcamp?</div>
        <div class="faq-answer"><strong>A:</strong> No. Parents or guardians are responsible for providing meals and refreshments for their children.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer follow-up after the program?</div>
        <div class="faq-answer"><strong>A:</strong> Yes. We conduct post-program follow-ups, engaging parents or guardians to gather feedback, reflect on progress, and support continued development.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you have afternoon classes?</div>
        <div class="faq-answer"><strong>A:</strong> Yes. We offer both morning and afternoon sessions<br><br>Morning: 9:00 AM – 12:00 PM<br><br>Afternoon: 2:00 PM – 5:00 PM</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer a certificate after the program?</div>
        <div class="faq-answer"><strong>A:</strong> Yes. Participants receive a certificate of completion at the end of the bootcamp.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What is the goal of the program?</div>
        <div class="faq-answer"><strong>A:</strong> The goal is to equip children and adolescents with essential mental health skills early in life, focusing on prevention, emotional resilience, and healthy coping strategies.</div>
    </div>
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What if my child is unable to attend the full program this season?</div>
        <div class="faq-answer"><strong>A:</strong> We offer flexible participation options across different holiday sessions. Participants who are unable to complete the full program during this period can join subsequent sessions, allowing continuity of learning at a pace that works for their schedule.</div>
    </div>
</div>

<?php if (!empty($volunteer_status_message)): ?>
<div class="volunteer-status-message"><?php echo $volunteer_status_message; ?></div>
<?php endif; ?>

<div class="reg-section scroll-animate">
    <div class="reg-top-header" id="Volunteer">
        <span class="sub-tag">Get Involved</span>
        <h1>Volunteer With Us</h1>
        <p>We welcome passionate individuals, professionals, organizations, and businesses to partner with us in creating meaningful experiences for children and adolescents aged 7–19 years through our Mental Health Bootcamp.</p>

        <div class="volunteer-content-wrapper">
            <h3 class="section-title">How You Can Get Involved</h3>
            
            <div class="involvement-grid">
                <div class="involvement-card">
                    <i class="fas fa-chalkboard-user"></i>
                    <h4>Professional Support</h4>
                    <p>Share your knowledge, skills, and experience through mentorship, facilitation, coaching, training, or speaking engagements. We welcome professionals from all fields who are passionate about empowering young people.</p>
                </div>
                
                <div class="involvement-card">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h4>Financial Support</h4>
                    <p>Help us expand our reach and impact through financial contributions that support program delivery, participant sponsorships, learning materials, meals, transportation, and other essential resources.</p>
                </div>
                
                <div class="involvement-card">
                    <i class="fas fa-box-open"></i>
                    <h4>In-Kind Contributions</h4>
                    <p>Support the bootcamp by donating goods, services, equipment, venues, refreshments, educational materials, transport, printing services, or any other resources that can enhance the participant experience.</p>
                </div>
                
                <div class="involvement-card">
                    <i class="fas fa-hands-helping"></i>
                    <h4>Volunteer Service</h4>
                    <p>Contribute your time and energy by assisting with event coordination, participant engagement, communications, or other operational activities.</p>
                </div>
                
                <div class="involvement-card">
                    <i class="fas fa-handshake"></i>
                    <h4>Partnerships and Collaborations</h4>
                    <p>We welcome schools, community groups, businesses, non-governmental organizations, government agencies, faith-based organizations, and other stakeholders interested in supporting youth mental health and wellbeing.</p>
                </div>
            </div>

            <div class="expectations-box">
                <h3>Volunteer Expectations</h3>
                <ul>
                    <li>Demonstrate professionalism, integrity, and respect.</li>
                    <li>Support the mission and objectives of the bootcamp.</li>
                    <li>Foster a safe, inclusive, and supportive environment.</li>
                    <li>Work collaboratively with participants, volunteers, and staff.</li>
                    <li>Uphold confidentiality and safeguarding standards where applicable.</li>
                    <li>Serve as positive role models for young people.</li>
                </ul>
            </div>

            <div class="why-volunteer-box">
                <h3>Why Volunteer With Us?</h3>
                <p>By partnering with us, you will:</p>
                <ul class="why-volunteer-list">
                    <li><i class="fas fa-check-circle"></i> Make a meaningful difference in the lives of young people.</li>
                    <li><i class="fas fa-check-circle"></i> Contribute to the promotion of mental health and wellbeing.</li>
                    <li><i class="fas fa-check-circle"></i> Share your expertise and skills for a worthy cause.</li>
                    <li><i class="fas fa-check-circle"></i> Build valuable networks and community connections.</li>
                    <li><i class="fas fa-check-circle"></i> Be part of a movement that empowers the next generation to thrive.</li>
                </ul>
                <p class="closing-statement">Together, we can create a lasting impact by nurturing resilience, confidence, emotional wellbeing, and personal growth among children and adolescents.</p>
            </div>
        </div>
    </div>

    <div class="reg-container-layout">
        <div class="reg-poster-card">
            <h2>Camp Benefits</h2>
            <div class="reg-badge-title">
                <i class="fa-solid fa-clock"></i> August BootCamp 2026
            </div>

            <div class="reg-poster-list-title">Why Volunteer With Us?</div>
            <ul class="reg-poster-list">
                <li><i class="fa-solid fa-check-double"></i> Community Impact & Experience</li>
                <li><i class="fa-solid fa-check-double"></i> Networking & Mentorship Hubs</li>
                <li><i class="fa-solid fa-check-double"></i> Certificates of Participation</li>
                <li><i class="fa-solid fa-check-double"></i> Leadership Exposure Training</li>
            </ul>

            <div class="reg-poster-list-title">Active Available Roles</div>
            <ul class="reg-poster-list" style="grid-template-columns: 1fr; font-weight: 300; opacity: 0.9;">
                <li><i class="fa-solid fa-circle-dot" style="font-size:0.5rem;"></i> Professional Support (Mentorship, Facilitation, Coaching, Training, Speaking)</li>
                <li><i class="fa-solid fa-circle-dot" style="font-size:0.5rem;"></i> Financial Support & Fundraising</li>
                <li><i class="fa-solid fa-circle-dot" style="font-size:0.5rem;"></i> In-Kind Contributions (Goods, Services, Equipment, Venue, Meals, Transport)</li>
                <li><i class="fa-solid fa-circle-dot" style="font-size:0.5rem;"></i> Volunteer Service (Event Coordination, Participant Engagement, Comms)</li>
                <li><i class="fa-solid fa-circle-dot" style="font-size:0.5rem;"></i> Partnerships & Collaborations (Schools, NGOs, Businesses, Government, FBOs)</li>
            </ul>

            <div class="reg-poster-footer-box">
                <div><strong>Email:</strong> admin@kazimind.com</div>
                <div><strong>Call/WhatsApp:</strong> +254 700 479 944</div>
            </div>
        </div>

        <div class="reg-form-card">
            <form action="" method="POST">
                <div class="reg-form-grid">
                    <div class="reg-form-group">
                        <label for="fullName">Full Name <span>*</span></label>
                        <input type="text" id="fullName" name="fullName" required placeholder="John Doe">
                    </div>

                    <div class="reg-form-group">
                        <label for="phoneNumber">Phone Number <span>*</span></label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" required placeholder="+254 700 000000">
                    </div>

                    <div class="reg-form-group">
                        <label for="emailAddress">Email Address <span>*</span></label>
                        <input type="email" id="emailAddress" name="emailAddress" required placeholder="name@example.com">
                    </div>

                    <div class="reg-form-group">
                        <label for="residence">Location / Area of Residence <span>*</span></label>
                        <input type="text" id="residence" name="residence" required placeholder="e.g. Utawala, Nairobi">
                    </div>

                    <div class="reg-form-group full-width">
                        <label for="volunteerRole">Preferred Volunteer Role <span>*</span></label>
                        <select id="volunteerRole" name="volunteerRole" required>
                            <option value="" disabled selected>Select a role...</option>
                            <option value="professional">Professional Support (Mentorship, Facilitation, Coaching, Training, Speaking)</option>
                            <option value="financial">Financial Support & Fundraising</option>
                            <option value="inkind">In-Kind Contributions (Goods, Services, Equipment, Venue, Meals, Transport)</option>
                            <option value="volunteer">Volunteer Service (Event Coordination, Participant Engagement)</option>
                            <option value="partnership">Partnerships & Collaborations (Schools, NGOs, Businesses, Government, FBOs)</option>
                        </select>
                    </div>

                    <div class="reg-form-group full-width">
                        <label>Availability on August BootCamp 2026? <span>*</span></label>
                        <div class="availability-options">
                            <div>
                                <input type="radio" id="availYes" name="availability" value="Yes" checked>
                                <label for="availYes" class="avail-btn-label">Yes</label>
                            </div>
                            <div>
                                <input type="radio" id="availNo" name="availability" value="No">
                                <label for="availNo" class="avail-btn-label">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="reg-form-group full-width">
                        <label for="experience">Relevant Skills or Experience <span>(optional)</span></label>
                        <textarea id="experience" name="experience" rows="3" placeholder="Briefly detail any past experience..."></textarea>
                    </div>

                    <div class="reg-form-group full-width">
                        <label for="motivation">Short Message / Motivation <span>(optional)</span></label>
                        <textarea id="motivation" name="motivation" rows="3" placeholder="Why would you like to join this specific bootcamp cohort?"></textarea>
                    </div>
                </div>

                <label class="reg-checkbox-row">
                    <input type="checkbox" name="agree" required>
                    <span>I confirm that the information provided is correct and I am available to participate as a volunteer.</span>
                </label>

                <button type="submit" name="volunteer_submit" class="reg-submit-btn">
                    <i class="fa-solid fa-paper-plane"></i> Submit Volunteer Application
                </button>
            </form>
        </div>
    </div>
</div>

<div class="donation-btn-wrapper scroll-animate">
    <button class="donation-main-btn" id="openDonationModal">
        <i class="fas fa-heart"></i> Support Our Cause
    </button>
</div>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>