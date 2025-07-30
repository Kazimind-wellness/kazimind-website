document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.scroll-animate');
    
    // Initialize Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            } else {
                // Reset animation when element leaves viewport
                entry.target.classList.remove('animated');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });

    // Observe all elements
    animatedElements.forEach(el => {
        observer.observe(el);
    });

    // Enhanced scroll handling for direction changes
    let lastScrollPosition = window.pageYOffset;
    window.addEventListener('scroll', function() {
        const currentScrollPosition = window.pageYOffset;
        const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
        lastScrollPosition = currentScrollPosition;
        
        // Force re-check of elements when scroll direction changes
        if (this.lastScrollDirection && this.lastScrollDirection !== scrollDirection) {
            animatedElements.forEach(el => {
                const bounds = el.getBoundingClientRect();
                const isVisible = bounds.top < window.innerHeight && bounds.bottom > 0;
                if (isVisible) {
                    el.classList.add('animated');
                } else {
                    el.classList.remove('animated');
                }
            });
        }
        this.lastScrollDirection = scrollDirection;
    }, { passive: true });
});