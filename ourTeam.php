<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/indexStyles.css">
    <link rel="stylesheet" href="assets/css/h-footer.css">
    <title>Kazimind</title>
</head>

<section class="team" id="team">
    <h2 class="title scroll-animate">
        Meet Our Team - Psychologists
    </h2>
    <div class="swiper review-slider scroll-animate">
        <div class="swiper-wrapper">

                    <div class="swiper-slide box">
                        <img src="images/fenis.png" alt="">
                        <h3>Fenis Akinyi</h3>
                        <p>
                            clinical counseling psychologist.
                        </p>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/njoki.jpg" alt="">
                        <h3>Njoki Kamau</h3>
                        <p>
                            Best Psychologist in Kenya 2024.
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
                        <img src="images/maryMaiko.png" alt="">
                        <h3>Mary Wanjiku</h3>
                        <p>
                            Spiritual & Psychological Counselor.
                        </p>

                    </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <h2 class="title scroll-animate">
        Meet Our Team - Technology and Innovation
    </h2>
    <div class="swiper review-slider scroll-animate">
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

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper
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
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });

    // Scroll animations with reset capability
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
});
</script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
</body>