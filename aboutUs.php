<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <title>Kazimind</title>
</head>
<body>
  
<div class="background" id="background">
  <video autoplay muted loop playsinline id="bgVideo">
    <source src="uploads/WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

   <!-- Mute/Unmute button -->
  <button id="soundToggle" class="sound-toggle">
    <i class="fas fa-volume-mute"></i>
  </button>

  <div class="video-overlay"></div>
</div>

<!-- AboutUs Content  -->

    <div class="review-container">
		<div class="review-header">
			<h2 class="review-title">
			About Us
			</h2>

			<hr class="horizontal">
			<div class="text-justify">
			<h3>What’s the meaning of our name?</h3>
			<br/><br/>
			<div class="offers-list">
			Kazi is a Swahili word for work. Mind refers the mental and emotional aspect of a person.
			WELLNESS is the state of being in good health in all aspects of your life, especially as an actively pursued goal.
			<br/><br/>
			</div>

            <h3>Kazi Mind Wellness </h3>
			Kazi Mind Wellness is a company that provides mental health and wellness services, including psychological counseling and therapy. They may offer a range of services aimed at promoting psychological well-being, such as individual and group therapy, couples counseling, and cognitive-behavioral therapy. . Kazi Mind Wellness" could be interpreted as a business or service that focuses on promoting mental wellness or well-being. "Kazi" means "work" in Swahili, and "mind" refers to the mental and emotional aspect of a person. "Wellness services" could refer to a variety of services or activities aimed at improving mental health and overall well-being, such as therapy, counseling, meditation, mindfulness, and stress management techniques. Therefore, "Kazi Mind Wellness" could be a service that focuses on helping individuals or organizations to manage stress, anxiety, and other mental health issues in order to achieve greater well-being and productivity in their work and personal lives.<br/><br/>
			The demand for housing and decent accommodation in the town has been growing steadily over the last few years. Most University staff and some students reside within the township.
			<br /><br />
			<h2 class="review-title">About Our Centre </h2>
			<br /><br />

			<h3 class="review-title">Our History </h3> <br> 
			Established with a vision to prioritize mental health, KaziMind Wellness Centre has been serving the community since 
			its founding in 2021. Launched with the idea of bringing together a group of therapists for a wider, supportive 
			community for both clients and therapists alike, KaziMind Wellness has dedicated itself to providing accessible and 
			effective therapy services. <br>
			Since inception, we have achieved significant milestones in promoting mental wellness and 
			breaking the stigma surrounding mental health issues.	
			
			<br>
			<h3>Our Slogan</h3>
			<br>
			Cultivate Your Mind                                                                                                                                                                     
			<br /><br />
			<h3>Our Vision</h3>
			<br />
			To be the leading provider of holistic mental health solutions, cultivating well-being and empowerment for all, through professional dedication, innovation, inclusivity, collaborative efforts, and advocacy.                                                                                                                                                                    
			<br /><br />
			<h3>Our Mission</h3>
			<br />
			KaziMind Wellness is dedicated to providing accessible, unbiased psychological support to all. Through our inclusive platform, we promote emotional healing, foster work-life balance, and enhance productivity. By prioritizing mental well-being, we empower individuals to lead fulfilling lives and contribute positively to society.                                                                                                                                                                     
			<br /><br />


			<h3>Our Community Involvement</h3>
			<div class="community"> <p>
			<br />
			We actively engage in community outreach, partnering with local organizations and 
			advocating for mental health awareness 
			to break stigma and promote accessibility to mental wellness.   <br><br>
			KaziMind is a leading mental health solutions organization, dedicated to providing innovative, culturally responsive, 
            and evidence-based interventions that meet the evolving needs of individuals, families, and institutions.<br><br>
			Our approach integrates clinical expertise with community empowerment, ensuring that mental wellness is not only a personal 
			journey but also a collective responsibility. Through workshops, psychoeducation programs, corporate wellness programs, and 
			school-based initiatives, we bring mental health services closer to the people especially underserved populations.
			<br /><br />
			At KaziMind, we believe that mental health is a right, not a privilege, and we work tirelessly to 
			build a society where emotional and psychological well-being are prioritized across all sectors.
			<br><br>
			</p>
			</div>

			<h3>Our People </h3>
			<br /><br />
			We are group of professionals who are dedicated and passionate about supporting growth, 
			empowering individuals, communities and organizations to effectively manage the mental 
			health challenges for enhanced well being and productivity. We are psychotherapists who 
			have specialized in various mental health sectors, counsellors,  IT specialist. <br> 
			Our team is made up of people from different ages, cultures, genders, religion, abilities.
			All of our team members advocate for work to build practices that advocates for Mental Health.
			<h3>Location</h3>
			<br/>
			<div class="offers-list">
				Located right in the heart of Nanyuki town, on Lenana Road, off Mt Kenya National Park Road, just off the main Nairobi–Nanyuki Highway, and approximately 2 km north of the Equator line.
				Within Sportsmans Arms Hotel.
				<br/><br/>
			</div>	
		</div>
		</div>

	</div>
	
<script>
  const bgVideo = document.getElementById('bgVideo');
  const soundToggle = document.getElementById('soundToggle');
  const soundIcon = soundToggle.querySelector('i');

  soundToggle.addEventListener('click', function () {
    if (bgVideo.muted) {
      bgVideo.muted = false;
      bgVideo.volume = 1.0;
      soundIcon.classList.remove('fa-volume-mute');
      soundIcon.classList.add('fa-volume-up');
    } else {
      bgVideo.muted = true;
      soundIcon.classList.remove('fa-volume-up');
      soundIcon.classList.add('fa-volume-mute');
    }
  });
</script>


<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>

</body>