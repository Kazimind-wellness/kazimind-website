<?php
ob_start();
session_start();
$pageTitle = "Community Sensitization";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - KaziMind Wellness</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #006fd1;
            --white: #ffffff;
            --black: #000000;
            --light-gray: #f5f5f5;
            --dark-gray: #333333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--black);
            background-color: var(--white);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004a8f 100%);
            color: var(--white);
            padding: 3rem 0;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
        }

        .header .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
        }

        .article-content {
            padding: 3rem 0;
        }

        .intro-section {
            background-color: var(--light-gray);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-blue);
        }

        .section-title {
            color: var(--primary-blue);
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .paragraph {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            color: var(--dark-gray);
        }

        .highlight-box {
            background-color: var(--primary-blue);
            color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            margin: 2rem 0;
            text-align: center;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .activity-card {
            background: var(--white);
            border: 2px solid var(--primary-blue);
            border-radius: 8px;
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 111, 209, 0.1);
        }

        .activity-card h3 {
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .activity-card p {
            color: var(--dark-gray);
        }

        .quote-section {
            background-color: var(--light-gray);
            padding: 2rem;
            border-radius: 10px;
            margin: 2rem 0;
            border-left: 4px solid var(--primary-blue);
            font-style: italic;
        }

        .image-container {
            width: 80%;
            height: 60%;
            margin: 2rem 0;
            text-align: center;
        }

        .article-image {
            max-width: 60%;
            height: 30%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .image-caption {
            color: var(--dark-gray);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-style: italic;
        }

        .conclusion {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #004a8f 100%);
            color: var(--white);
            padding: 3rem;
            border-radius: 10px;
            text-align: center;
            margin-top: 2rem;
        }

        .conclusion p {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        @media (max-width: 768px) {
            .header {
                padding: 2rem 0;
            }
            
            .article-content {
                padding: 2rem 0;
            }
            
            .activities-grid {
                grid-template-columns: 1fr;
            }
            
            .intro-section, 
            .highlight-box, 
            .quote-section, 
            .conclusion {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .header .subtitle {
                font-size: 1rem;
            }
            
            .paragraph {
                font-size: 1rem;
            }
        .image-container {
            width: 110%;
            height: 20rem;
            margin: 0 0 5rem 0;
        }
        .article-image {
            width: 100%;
            height: 20%;
        }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>Community Sensitization: Building Awareness, Breaking Barriers</h1>
            <p class="subtitle">KaziMind Wellness & Kenya Red Cross Partnership</p>
        </div>
    </div>

    <div class="container">
        <div class="article-content">
            <div class="intro-section">
                <p class="paragraph">
                    At KaziMind Wellness, we believe that mental health begins in the community. That belief came alive today as we partnered with the Kenya Red Cross, Nanyuki Office, to carry out a market sensitization on wellness and mental health.
                </p>
            </div>

            <div class="image-container">
                <img src="images/redcrossArticle.jpg" alt="Community Mental Health Sensitization Event" class="article-image">
                <p class="image-caption">KaziMind Wellness team engaging with community members at the market sensitization event</p>
            </div>

            <p class="paragraph">
                The market is always buzzing with life traders calling out to customers, families shopping, friends meeting by chance. It is the heartbeat of the community. By bringing mental health conversations here, we meet people exactly where they are, in the middle of their everyday routines. This makes the message of wellness real, relatable, and accessible to all.
            </p>

            <h2 class="section-title">Our Engagement Activities</h2>

            <div class="activities-grid">
                <div class="activity-card">
                    <h3>Open Discussions</h3>
                    <p>Open discussions on stress, depression, and anxiety, helping people understand that mental health challenges are not signs of weakness but human experiences that need support.</p>
                </div>

                <div class="activity-card">
                    <h3>Practical Demonstrations</h3>
                    <p>Practical demonstrations on self-care practices like breathing exercises, journaling, and seeking social support.</p>
                </div>

                <div class="activity-card">
                    <h3>Interactive Q&A Sessions</h3>
                    <p>Interactive Q&A sessions, where individuals could ask questions freely, break myths, and get guidance on where to access professional help.</p>
                </div>

                <div class="activity-card">
                    <h3>Referrals & Resource Sharing</h3>
                    <p>Referrals and resource sharing, ensuring that anyone in distress knows where to turn for counseling and psychosocial support.</p>
                </div>
            </div>

            <div class="highlight-box">
                <h2>Cultivating Minds</h2>
                <p>At KaziMind Wellness, we call this process Cultivating Minds - planting seeds of awareness, nurturing resilience, and inspiring hope within the community.</p>
            </div>

            <p class="paragraph">
                Sensitization is not just about sharing information; it is about transforming perspectives and empowering people to take charge of their mental well-being. A passerby who stops to listen may leave with a changed mindset, a parent may recognize the importance of their child's emotional health, or a young person may find the courage to reach out for help.
            </p>

            <div class="quote-section">
                <p class="paragraph">
                    This year's World Health Organization theme for World Mental Health Day 2025 "Access to Services Mental Health in Catastrophes and Emergencies" highlights why such efforts matter. Crises, whether floods, droughts, conflicts, or pandemics, place unimaginable strain on people's mental health.
                </p>
                <p class="paragraph">
                    Research shows that one in five people in crisis situations develops a mental health condition. Community-level sensitization ensures that people are not only aware of these challenges but also know that help exists, and recovery is possible.
                </p>
            </div>

            <p class="paragraph">
                October is a month of reflection and renewed action. Through initiatives like market sensitization, we reaffirm our commitment to prioritizing mental health for all. With partners like the Kenya Red Cross Nanyuki Office, we continue to bridge gaps, raise awareness, and cultivate minds that are strong, resilient, and ready to thrive.
            </p>

            <div class="conclusion">
                <p>Because when we invest in cultivating minds today, we build the foundation for healthier, more resilient generations tomorrow.</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
// If you have a layout file, uncomment the line below
include 'includes/layout.php';
?>