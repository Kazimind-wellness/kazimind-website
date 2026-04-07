<?php
ob_start();
session_start();
$pageTitle = "Psychotherapy Services";
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
        /* FAQ Section Styles - ensuring visibility and functionality */
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
            margin: 0 auto 80px;
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
            border-color: #c0d9e8;
        }
        
        .faq-question {
            padding: 20px 24px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #f8fafc;
            background: #006fd1;
            position: relative;
            padding-right: 50px;
            transition: background 0.3s ease;
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
            color: #006fd1;
            font-size: 1rem;
            transition: transform 0.3s ease, content 0.2s ease;
        }
        
        .faq-item.active .faq-question {
            color: #334155;
        }
        
        .faq-item.active .faq-question::after {
            content: '\f068';
            transform: translateY(-50%) rotate(0deg);
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
        
        .faq-answer ul, .faq-answer ol {
            margin: 10px 0 10px 20px;
            padding-left: 10px;
        }
        
        .faq-answer li {
            margin: 8px 0;
        }
        
        .faq-answer strong {
            color: #006fd1;
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .faqH1 {
                font-size: 0.2rem;
                margin: 40px 0 25px;
            }
            .faq-question {
                font-size: 1rem;
                padding: 16px 20px;
                padding-right: 45px;
            }
            .faq-item.active .faq-answer {
                padding: 0 20px 20px 20px;
            }
            .faq-answer {
                font-size: 0.9rem;
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
            <p>
                Focusing on self-awareness, self-reflection, and inner growth, this area explores personality, values, and beliefs to understand the root of thoughts and actions, fostering personal maturity.
            </p>
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
            <p>
                This topic centers on building confidence and recognizing personal worth while identifying the internal drive necessary to pursue goals and overcome life's obstacles.
            </p>
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
            <p>
                Develop the ability to recognize and manage personal emotions and those of others, while building the capacity to bounce back effectively from difficult life events.
            </p>
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
            <p>
                Learn practical techniques for reducing tension and anxiety through mindfulness and staying present, ensuring mental balance is maintained even under significant pressure.
            </p>
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
            <p>
                Improve interpersonal interactions by mastering active listening, interpreting body language, and practicing clear verbal expression for more effective social engagement.
            </p>
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
            <p>
                Understand the boundaries of positive social connections and learn how to resolve conflicts and navigate complex dynamics with peers, friends, and family.
            </p>
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
            <p>
                Addressing the impact of technology on mental health, this section focuses on digital wellness and overcoming screen addiction to find a healthy balance in a connected world.
            </p>
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
            <p>
                Providing vital education on the risks of substance use, this topic emphasizes prevention, healthy decision-making, and understanding the impact of chemicals on the body and mind.
            </p>
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
            <p>
                A comprehensive look at identity, physical health, and consent, fostering an environment where emotional aspects of human relationships can be discussed with respect and clarity.
            </p>
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
            <p>
                Learn how to transform aspirations into reality by identifying specific objectives and creating structured action plans to achieve personal and professional success.
            </p>
        </div>
    </div>
</div>

<h1 class="faqH1 scroll-animate" id="faqH1">Boot Camp Frequently Asked Questions</h1>

<div class="faq-container scroll-animate">
    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How much do you charge for the Mental Health Bootcamp?</div>
        <div class="faq-answer">
            <strong>A:</strong> The program fee is KES 1,000 per participant, per program session.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Who are the experts running the program?</div>
        <div class="faq-answer">
            <strong>A:</strong> The bootcamp is facilitated by registered psychologists who are specialists in child and adolescent mental health.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Is the bootcamp a boarding program?</div>
        <div class="faq-answer">
            <strong>A:</strong> No. The program operates on a pick-and-drop basis. Participants attend sessions during the day and return home afterward.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer virtual classes?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. We offer both physical and virtual program options to accommodate different needs.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: How many days does the program run?</div>
        <div class="faq-answer">
            <strong>A:</strong> The bootcamp runs from 13th to 18th April 2026, with the 18th designated as the closing ceremony.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you provide food during the bootcamp?</div>
        <div class="faq-answer">
            <strong>A:</strong> No. Parents or guardians are responsible for providing meals and refreshments for their children.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer follow-up after the program?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. We conduct post-program follow-ups, engaging parents or guardians to gather feedback, reflect on progress, and support continued development.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you have afternoon classes?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. We offer both morning and afternoon sessions<br><br>
            Morning: 9:00 AM – 12:00 PM<br><br>
            Afternoon: 2:00 PM – 5:00 PM
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: Do you offer a certificate after the program?</div>
        <div class="faq-answer">
            <strong>A:</strong> Yes. Participants receive a certificate of completion at the end of the bootcamp.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What is the goal of the program?</div>
        <div class="faq-answer">
            <strong>A:</strong> The goal is to equip children and adolescents with essential mental health skills early in life, focusing on prevention, emotional resilience, and healthy coping strategies.
        </div>
    </div>

    <div class="faq-item scroll-animate">
        <div class="faq-question">Q: What if my child is unable to attend the full program this season?</div>
        <div class="faq-answer">
            <strong>A:</strong> We offer flexible participation options across different holiday sessions. Participants who are unable to complete the full program during this period can join subsequent sessions, allowing continuity of learning at a pace that works for their schedule.
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation on scroll for elements
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        let lastScrollPosition = window.pageYOffset;
        let ticking = false;
        
        const animatedElements = new Set();
        
        animateElements.forEach((el, index) => {
            el.style.setProperty('--index', index);
        });

        // FAQ functionality - click to expand/collapse with smooth animation
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            item.addEventListener('click', (e) => {
                // Prevent closing if clicking inside answer content (optional)
                e.stopPropagation();
                // Toggle active class on clicked item
                item.classList.toggle('active');
            });
        });
        
        function checkPosition() {
            const currentScrollPosition = window.pageYOffset;
            
            animateElements.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                const elementBottom = el.getBoundingClientRect().bottom;
                const isVisible = (elementTop < window.innerHeight * 0.8) && (elementBottom > 0);
                
                if (isVisible) {
                    el.classList.add('animate');
                    animatedElements.add(el);
                } else {
                    el.classList.remove('animate');
                    animatedElements.delete(el);
                }
            });
            
            lastScrollPosition = currentScrollPosition;
            ticking = false;
        }
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(checkPosition);
                ticking = true;
            }
        }, { passive: true });
        
        checkPosition();
        
        // Intersection observer for scroll animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                } else {
                    entry.target.classList.remove('animate');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        });
        
        animateElements.forEach(el => {
            observer.observe(el);
        });
        
        // Observer for scroll-animate elements
        const scrollAnimateElements = document.querySelectorAll('.scroll-animate');
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                } else {
                    entry.target.classList.remove('animate');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        scrollAnimateElements.forEach(el => {
            scrollObserver.observe(el);
        });
        
        // Enhanced hover effects for therapy sections
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

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>