<?php
$pageTitle = "Book Now";
ob_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h&footer.css">
    <title>Kazimind</title>
</head>

<!-- uploads\WhatsApp Video 2025-06-13 at 09.30.37_557383d8.mp4 -->
<!-- Our Team -->

<section class="team" id="team">

    <h2 class="title">
		Meet Our  Team - Psychologists
			</h2>
    <div class="swiper review-slider">
            <div class="swiper-wrapper">
                    <div class="swiper-slide box">
                        <img src="images/fenis.png" alt="">
                        <h3>Fenis Akinyi</h3>
                        <p>
                            Fenis Akinyi, a clinical counseling psychologist specializing in addiction. Passionate about mental health advocacy, she excels in outreach and collaborative care, advancing KaziMind's wellness mission.
                        </p>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/njoki.jpg" alt="">
                        <h3>Njoki Kamau</h3>
                        <p>
                            Njoki, Best Psychologist in Kenya 2024, brings 10+ years of clinical and corporate mental health expertise, specializing in counseling and holistic care.
                        </p>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/mary.png" alt="">
                        <h3>Mary Macharia</h3>
                        <p>
                            Family and Marriage Therapist.
                        </p>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/kel.png" alt="">
                        <h3>Kelsey Wairimu</h3>
                        <p>
                            Our Counselling Phycologist, passionate with children.
                        </p>

                    </div>
            </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

    <h2 class="title">
		Meet Our  Team - Technology and Innovation
			</h2>
    <div class="swiper review-slider">
            <div class="swiper-wrapper">
                   
                    <div class="swiper-slide box">
                        <img src="images/steven.png" alt="">
                        <h3>Steven Macharia</h3>
                        <p>
                            Software Engineer (Web-developer)
                        </p>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/ken.png" alt="">
                        <h3>Ken Kagunda</h3>
                        <p>
                            Head Of Technology and Innovation Department
                        </p>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/ephantas.png" alt="">
                        <h3>Ephantus Wamuyu</h3>
                        <p>
                            Graphic Desgner And Social Media Manager
                        </p>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/ken.png" alt="">
                        <h3>Ken Kagunda</h3>
                        <p>
                            Head Of Technology and Innovation Department
                        </p>
                    </div>
            </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
</section>
    <script src="assets/js/topBackground.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".review-slider", {
    spaceBetween: 10,
    grabCursor: true,
    loop: true,
    centeredSlides: false,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
        breakpoints: {
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            1024: {
              slidesPerView: 3,
            },
          },
  });
</script>


<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>

</body>
