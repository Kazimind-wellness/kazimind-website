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
    <div class="container">
        <div class="article-content">
            <h1>World Mental Health Day – October 10th</h1>

            <p class="paragraph">
                Today, October 10th, the world unites to mark World Mental Health Day.
                It is a day when nations, organizations, and individuals pause to reflect on a truth we cannot ignore:
                wellbeing is not optional—it is a global priority.
            </p>

            <p class="paragraph">
                At KaziMind Wellness, we could not have thought otherwise but to be here, showing ways of cultivating minds.
                Why? Because we believe mental health is the foundation on which all learning and growth rest.
            </p>

            <p class="paragraph">
                And how fitting that this year’s celebration coincides with the Nanyuki Book Festival.
                After all, what is literacy without wellness, or knowledge without balance?
                Together, they remind us of the theme that guides today’s reflection:
            </p>

            <blockquote class="highlight-box">
                “Every Page Counts, A Story for Everyone.”
            </blockquote>

            <p class="paragraph">
                At KaziMind, we believe every mind deserves to be cultivated, every story deserves to thrive.
            </p>

            <h2 class="section-title">1. The Global Reminder</h2>
            <p class="paragraph">
                Every year, World Mental Health Day reminds us to keep wellness at the center of our lives.
                Today, books and mental health stand side by side, reminding us that the human story is written
                not just in pages but also in minds.
            </p>

            <h2 class="section-title">2. Why Books & Mental Health Belong Together</h2>
            <ul class="paragraph">
                <li>Books feed the mind, but mental health sustains the mind.</li>
                <li>A learner may have access to books, but without wellbeing, focus, resilience, and hope,
                    knowledge cannot fully bloom.</li>
            </ul>

            <p class="paragraph">
                Through stories, we learn empathy, coping, and healing. Reading is, in many ways, a form of therapy.
            </p>

            <p class="paragraph">
                Think of a child reading <em>Wonder</em> by R.J. Palacio, discovering kindness and empathy.<br>
                Or an adult reading <em>Reasons to Stay Alive</em> by Matt Haig—a powerful, honest story about
                surviving depression and rediscovering hope.<br>
                Or <em>The Things You Can See Only When You Slow Down</em> by Haemin Sunim—a guide on mindfulness,
                calm, and balance in a fast-paced world.<br>
                Or <em>Personality Plus</em> by Florence Littauer—a practical look at understanding yourself
                and others through the four personality types, helping you build healthier relationships
                and emotional awareness.
            </p>

            <p class="paragraph">
                You can find these books at <strong>KaziMind Wellness</strong> and
                <strong>Books and Bloom Bookstore</strong>.
            </p>

            <h2 class="section-title">3. Mental Health for Every Age</h2>
            <ul class="paragraph">
                <li>Children’s books give kids the language to express emotions.</li>
                <li>Teen and young adult stories normalize struggles and resilience.</li>
                <li>Adult literature helps us process trauma, reflect deeply, and build perspective.</li>
            </ul>

            <p class="paragraph">
                Just as every page counts in a book, every mind counts in our communities.
            </p>

            <h2 class="section-title">4. A Call to Action</h2>
            <p class="paragraph">
                On this World Mental Health Day, let us remember:
            </p>

            <blockquote class="highlight-box">
                “Just as we invest in libraries for books, we must invest in safe spaces for mental health.”
            </blockquote>

            <p class="paragraph">
                If we build literacy without wellness, we grow knowledge without balance.
                But when books and mental health grow together, we raise generations that are not only learned
                but also resilient, compassionate, and whole.
            </p>

            <h2 class="section-title">Closing with KaziMind’s Motto</h2>
            <p class="paragraph">
                At KaziMind, we believe that books give us the seeds of knowledge,
                but mental health provides the soil, sunlight, and water to make those seeds grow.
            </p>

            <blockquote class="highlight-box">
                “Cultivate Your Mind.”
            </blockquote>

            <p class="paragraph">
                Because when we cultivate minds, we don’t just build readers—we raise healthy,
                creative, and resilient human beings.
            </p>
        </div>
    </div>
</body>

</html>

<?php
$content = ob_get_clean();
// If you have a layout file, uncomment the line below
include 'includes/layout.php';
?>