<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/h-footer.min.css">
    <link rel="stylesheet" href="assets/css/indexStyles.min.css">
</head>
<div class="awards-section">
 <style>
    
    /* Stats Section Styles */
            .stats-section {
                padding: 60px 20px;
                background-color: #fcfcfc; /* Light subtle background to pop the cards */
            }

            .stats-container {
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 30px;
                justify-items: center;
            }

            .stat-card {
                background: #ffffff;
                padding: 40px 20px;
                border-radius: 24px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
                text-align: center;
                width: 100%;
                max-width: 260px;
                display: flex;
                flex-direction: column;
                align-items: center;
                transition: transform 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
            }

            /* Semi-circular / Progress ring matching the image design */
            .progress-circle {
                position: relative;
                width: 150px;
                height: 150px;
                border-radius: 50%;
                background: radial-gradient(closest-side, white 79%, transparent 80% 100%),
                            conic-gradient(#006fdf calc(var(--percent) * 1%), #dce7fa 0);
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 25px;
            }

            .stat-number {
                font-size: 24px;
                font-weight: 700;
                color: #4d8dd7; /* Teal hex matching the image */
                font-family: inherit;
            }

            .stat-label {
                font-size: 16px;
                color: #555555;
                font-weight: 500;
                line-height: 1.4;
                margin: 0;
                padding: 0 10px;
            }
 </style>
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-card">
            <div class="progress-circle" style="--percent: 75;">
                <span class="stat-number">400+</span>
            </div>
            <p class="stat-label">Community Members Reached</p>
        </div>
        <div class="stat-card">
            <div class="progress-circle" style="--percent: 65;">
                <span class="stat-number">20+</span>
            </div>
            <p class="stat-label">Care Experienced Youth</p>
        </div>
        <div class="stat-card">
            <div class="progress-circle" style="--percent: 30;">
                <span class="stat-number">4+</span>
            </div>
            <p class="stat-label">Countries in Africa</p>
        </div>
        <div class="stat-card">
            <div class="progress-circle" style="--percent: 50;">
                <span class="stat-number">200+</span>
            </div>
            <p class="stat-label">Individual Sessions</p>
        </div>
    </div>
</section>

    <h2>Awards</h2>
    <div class="awards-container">
        <div class="award-item">
            <div class="award-badge winner">
                <img src="https://cdn-icons-png.flaticon.com/128/11224/11224727.png" alt="Laurel Wreath">
                <span>1st Place </span>
            </div>
            <p class="award-title">Social Impact Award Of The Year</p>
        </div>
        <div class="award-item">
            <div class="award-badge winner">
                <img src="https://cdn-icons-png.flaticon.com/128/11224/11224727.png" alt="Laurel Wreath">
                <span>1st Place</span>
            </div>
            <p class="award-title">Most Innovative Award</p>
        </div>
        <div class="award-item">
            <div class="award-badge winner">
                <img src="https://cdn-icons-png.flaticon.com/128/11224/11224727.png" alt="Laurel Wreath">
                <span>1st Place</span>
            </div>
            <p class="award-title">Best Psychologist In Kenya</p>
        </div>
    </div>
</div>
<section class="feedback-section">
    <h2>Client Reviews</h2>

    <div class="feedback-steps">
      <div class="step active" data-feedback="1">1</div>
      <div class="step" data-feedback="2">2</div>
      <div class="step" data-feedback="3">3</div>
      <div class="step" data-feedback="4">4</div>
    </div>

    <div class="feedback-content active" id="feedback-1">
      <h3>Brian Kanja</h3>
      <div class="stars">★★★★☆</div>
      <p>
        Everyone needs to debrief, away from the norm, away from usual routine, 
        to make the work place and work relationships better and that place is KaziMind...
      </p>
    </div>

    <div class="feedback-content" id="feedback-2">
      <h3>Elizabeth Muiruri</h3>
      <div class="stars">★★★★★</div>
      <p>
        First off it's a friendly environment with friendly kind hearted people... 
        loved everything about it.
      </p>
    </div>

    <div class="feedback-content" id="feedback-3">
    <h3>Margaret Kariuki</h3>
    <div class="stars">★★★★☆</div>
    <p>
        A wellness center that brings out life in its clients. Solution oriented wellness center.
    </p>
    </div>

    <div class="feedback-content" id="feedback-4">
    <h3>Ruth</h3>
    <div class="stars">★★★★★</div>
    <p>
        My interaction with Njoki was a life changing one. Thank you for your time 
        and from the heart connection. High level of professionalism. Thumbs up.
    </p>
    </div>
  </section>

  <script>
    const steps = document.querySelectorAll('.step');
    const feedbacks = document.querySelectorAll('.feedback-content');
    let current = 0;
    let autoSlide = setInterval(nextFeedback, 5000); // auto rotate every 5s

    function showFeedback(index) {
      // remove active from all
      steps.forEach(s => s.classList.remove('active'));
      feedbacks.forEach(f => f.classList.remove('active'));

      // activate current
      steps[index].classList.add('active');
      feedbacks[index].classList.add('active');
      current = index;

      // reset auto timer
      resetAutoSlide();
    }

    function nextFeedback() {
      let next = (current + 1) % feedbacks.length;
      showFeedback(next);
    }

    function resetAutoSlide() {
      clearInterval(autoSlide);
      autoSlide = setInterval(nextFeedback, 5000);
    }

    // handle click on numbers
    steps.forEach((step, index) => {
      step.addEventListener('click', () => showFeedback(index));
    });
  </script>


  <section class="signup-section">
    <h2>Sign Up For Updates and Promotions</h2>
    <p>Sign up with your email address to receive news, updates and promotions as they’re announced.</p>
      <form class="signup-form" id="signupForm">
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        <button type="submit">SIGN UP</button>
      </form>
      <div id="message"></div>
  </section>

<script>
document.getElementById('signupForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch('subscribe.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    document.getElementById('message').innerHTML = data;
    this.reset();
  })
  .catch(err => {
    document.getElementById('message').innerHTML = "❌ Error submitting form.";
  });
});
</script>

    <div class="footer-dark">
        <div class="footer-container">
            
            <div class="footer-column">
                <h3>Kazimind Wellness</h3>
                <p>Cultivate Your Mind.</p>
                <p>Mental Health and Wellness Experts</p>
            </div>

            <div class="footer-column">
                <h3>Contact Us</h3>
                <p><img src="images/location-dot.webp" loading="lazy" alt="Location"> <span>Nanyuki, Kenya</span></p>
                <p><img src="images/mail-icon.webp" loading="lazy" alt="Email"> <span>admin@kazimind.com</span></p>
            </div>

            <div class="footer-column">
                <h3>Call Us</h3>
                <p><img src="images/whstapp-icon.webp" loading="lazy" alt="Phone"> <span>+254 700 479 944</span></p>
                <p><img src="images/phone-icon.webp" loading="lazy"  alt="WhatsApp"> <span>+254 202 020 830</span></p>
            </div>

            <div class="footer-column">
                <h3>Follow Us</h3>
                <div class="social-row">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/KaziMindWellness"><img src="images/facebook-icon.webp" loading="lazy" alt="Facebook"></a>
                        <a href="https://x.com/kazimindw"><img src="images/X-icon.webp" loading="lazy" alt="Twitter/X"></a>
                        <a href="https://www.instagram.com/invites/contact/"><img src="images/ig-icon.webp" loading="lazy" alt="Instagram"></a>
                    </div>
                </div>
                <div class="social-row">
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/company/kazimind-wellness/"><img src="images/linkedin-icon.webp" loading="lazy" alt="LinkedIn"></a>
                        <a href="https://vm.tiktok.com/ZMA2SKHWp/"><img src="images/tiktok-icon.webp" loading="lazy" alt="TikTok"></a>
                        <a href="https://youtube.com/@kazimindhub?si=WPfCRa8_7OiyrpwN"><img src="images/youtube-icon.webp" loading="lazy" alt="YouTube"></a>
                    </div>
                </div>
            </div>

        </div>

        <p class="copyR">&copy; 2025 Kazimind Wellness. All rights reserved.</p>
    </div>


<div class="whatsapp-float">
  <a href="https://wa.me/254700479944" target="_blank">
    <i class="whatsapp-icon"></i>
    <span>Chat with us</span>
  </a>
</div>

<!-- CUSTOMIZATION BUTTON IMPLEMENTATION STARTS HERE -->
<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #006fd1;
        --background-color: #ffffff;
        --text-color: #333333;
        --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        --font-size: 16px;
        --border-radius: 12px;
        --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    /* Customization Panel Styles */
    .customization-panel {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 10000;
        font-family: var(--font-family);
    }

    .customization-toggle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        cursor: pointer;
        box-shadow: var(--box-shadow);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transition: var(--transition);
        animation: pulse 2s infinite;
        z-index: 10001;
    }

    .customization-toggle:hover {
        transform: scale(1.1);
        box-shadow: 0 15px 40px rgba(67, 97, 238, 0.3);
    }

    .customization-content {
        position: absolute;
        bottom: 70px;
        left: 0;
        width: 300px;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 20px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: var(--transition);
        z-index: 10002;
    }

    .customization-content.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .customization-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .customization-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #777;
        transition: var(--transition);
    }

    .close-btn:hover {
        color: var(--primary-color);
        transform: rotate(90deg);
    }

    .customization-option {
        margin-bottom: 15px;
    }

    .option-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
    }

    .color-picker {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }

    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid transparent;
        transition: var(--transition);
    }

    .color-option.active {
        border-color: #333;
        transform: scale(1.1);
    }

    .font-select, .theme-select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background: white;
        font-family: inherit;
        transition: var(--transition);
    }

    .font-select:focus, .theme-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    .slider-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .slider {
        flex: 1;
        -webkit-appearance: none;
        height: 6px;
        border-radius: 3px;
        background: #e0e0e0;
        outline: none;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: var(--primary-color);
        cursor: pointer;
        transition: var(--transition);
    }

    .slider::-webkit-slider-thumb:hover {
        transform: scale(1.2);
    }

    .slider-value {
        min-width: 30px;
        text-align: center;
        font-weight: 500;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        font-family: inherit;
    }

    .btn-primary {
        background: var(--primary-color);
        color: #fff !important;
    }

    .btn-primary:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #f0f0f0;
        color: #555;
    }

    .btn-secondary:hover {
        background: #e0e0e0;
        transform: translateY(-2px);
    }

    /* Animation for the toggle button */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(67, 97, 238, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(67, 97, 238, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(67, 97, 238, 0);
        }
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .customization-content {
            width: 280px;
            left: -10px;
        }
    }

    @media (max-width: 480px) {
        .customization-panel {
            bottom: 10px;
            left: 10px;
        }
        
        .customization-content {
            width: 260px;
            left: -20px;
        }
    }
</style>
<div class="customization-panel">
    <button class="customization-toggle" id="customizationToggle">
    <i class="fas fa-user-cog"></i>
    </button>
    <div class="customization-content" id="customizationContent">
        <div class="customization-header">
            <h3 class="customization-title">Customize Website</h3>
            <button class="close-btn" id="closeCustomization">&times;</button>
        </div>
        
        <div class="customization-option">
            <label class="option-label">Primary Color</label>
            <div class="color-picker">
                <div class="color-option active" style="background-color: #4361ee;" data-color="#4361ee"></div>
                <div class="color-option" style="background-color: #e63946;" data-color="#e63946"></div>
                <div class="color-option" style="background-color: #2a9d8f;" data-color="#2a9d8f"></div>
                <div class="color-option" style="background-color: #e9c46a;" data-color="#e9c46a"></div>
                <div class="color-option" style="background-color: #9b5de5;" data-color="#9b5de5"></div>
            </div>
        </div>
        
        <div class="customization-option">
            <label class="option-label">Theme</label>
            <select class="theme-select" id="themeSelect">
                <option value="light">Light Theme</option>
                <option value="dark">Dark Theme</option>
                <option value="auto">Auto (System Preference)</option>
            </select>
        </div>
        
        <div class="customization-option">
            <label class="option-label">Font Family</label>
            <select class="font-select" id="fontSelect">
                <option value="'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Default (Segoe UI)</option>
                <option value="Arial, Helvetica, sans-serif">Arial</option>
                <option value="'Georgia', serif">Georgia</option>
                <option value="'Courier New', Courier, monospace">Courier New</option>
                <option value="'Trebuchet MS', sans-serif">Trebuchet MS</option>
            </select>
        </div>
        
        <div class="customization-option">
            <label class="option-label">Font Size</label>
            <div class="slider-container">
                <input type="range" min="12" max="24" value="16" class="slider" id="fontSizeSlider">
                <span class="slider-value" id="fontSizeValue">16px</span>
            </div>
        </div>
        
        <div class="action-buttons">
            <button class="btn btn-secondary" id="resetSettings">Reset</button>
            <button class="btn btn-primary" id="applySettings">Apply</button>
        </div>
    </div>
</div>

<script>
    // DOM Elements
    const customizationToggle = document.getElementById('customizationToggle');
    const customizationContent = document.getElementById('customizationContent');
    const closeCustomization = document.getElementById('closeCustomization');
    const resetSettings = document.getElementById('resetSettings');
    const applySettings = document.getElementById('applySettings');
    const colorOptions = document.querySelectorAll('.color-option');
    const themeSelect = document.getElementById('themeSelect');
    const fontSelect = document.getElementById('fontSelect');
    const fontSizeSlider = document.getElementById('fontSizeSlider');
    const fontSizeValue = document.getElementById('fontSizeValue');

    // Toggle customization panel
    customizationToggle.addEventListener('click', () => {
        customizationContent.classList.toggle('active');
    });

    // Close customization panel
    closeCustomization.addEventListener('click', () => {
        customizationContent.classList.remove('active');
    });

    // Update font size value display
    fontSizeSlider.addEventListener('input', () => {
        fontSizeValue.textContent = `${fontSizeSlider.value}px`;
    });

    // Color selection
    colorOptions.forEach(option => {
        option.addEventListener('click', () => {
            // Remove active class from all options
            colorOptions.forEach(opt => opt.classList.remove('active'));
            // Add active class to clicked option
            option.classList.add('active');
        });
    });

    // Apply settings
    applySettings.addEventListener('click', () => {
        // Get selected color
        const selectedColor = document.querySelector('.color-option.active').getAttribute('data-color');
        
        // Apply settings to common elements
        applyStylesToWebsite(selectedColor, fontSelect.value, fontSizeSlider.value, themeSelect.value);
        
        // Save settings to localStorage
        saveSettings();
        
        // Close the panel
        customizationContent.classList.remove('active');
        
        // Show confirmation
        showNotification('Settings applied successfully!');
    });

    // Reset settings
    resetSettings.addEventListener('click', () => {
        // Reset to default values
        resetWebsiteStyles();
        
        // Reset UI elements
        colorOptions.forEach(opt => opt.classList.remove('active'));
        document.querySelector('.color-option[data-color="#4361ee"]').classList.add('active');
        themeSelect.value = 'light';
        fontSelect.value = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";
        fontSizeSlider.value = '16';
        fontSizeValue.textContent = '16px';
        
        // Clear saved settings
        localStorage.removeItem('websiteCustomization');
        
        // Show confirmation
        showNotification('Settings reset to default!');
    });

// More comprehensive styling function
function applyStylesToWebsite(color, fontFamily, fontSize, theme) {
    const styleId = 'customization-styles';
    let styleElement = document.getElementById(styleId);
    
    if (!styleElement) {
        styleElement = document.createElement('style');
        styleElement.id = styleId;
        document.head.appendChild(styleElement);
    }
    
    const isDark = theme === 'dark' || (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
    
    const backgroundColor = isDark ? '#1a1a1a' : '#ffffff';
    const textColor = isDark ? '#f0f0f0' : '#333333';
    const fontSizeRem = (fontSize / 16) + 'rem'; // Convert px to rem
    
    const css = `
        /* Base styles */
        body, p, div, span, li, td, th {
            font-family: ${fontFamily} !important;
            font-size: ${fontSize}px !important;
            color: ${textColor} !important;
        }
        
        body {
            background-color: ${backgroundColor} !important;
        }
        
        /* Headings */
        h1, h2, h3, h4, h5, h6 {
            color: ${color} !important;
            font-family: ${fontFamily} !important;
        }
        
        /* Links */
        a, .link, [class*="link"] {
            color: ${color} !important;
        }
        
        /* Buttons */
        button, .btn, input[type="button"], input[type="submit"], [class*="button"] {
            background-color: ${color} !important;
            border-color: ${color} !important;
            font-family: ${fontFamily} !important;
        }
        
        /* Color classes */
        .primary-color, .accent-color, .highlight, [class*="primary"], [class*="accent"] {
            color: ${color} !important;
        }
        
        .primary-bg, .accent-bg, .highlight-bg, [class*="primary-bg"], [class*="accent-bg"] {
            background-color: ${color} !important;
        }
        
        /* Specific classes from your website */
        .brief-overview, .text-content, .content, .description, .text, .copy {
            font-size: ${fontSize}px !important;
            font-family: ${fontFamily} !important;
            color: ${textColor} !important;
            line-height: 1.6 !important;
        }
        
        /* Any element with overview in class name */
        [class*="overview"] {
            font-size: ${fontSize}px !important;
            font-family: ${fontFamily} !important;
        }
        
        /* Any element with text in class name */
        [class*="text"] {
            font-size: ${fontSize}px !important;
        }
    `;
    
    styleElement.textContent = css;
}

    // Reset website styles
    function resetWebsiteStyles() {
        const styleElement = document.getElementById('customization-styles');
        if (styleElement) {
            styleElement.remove();
        }
    }

    // Save settings to localStorage
    function saveSettings() {
        const settings = {
            primaryColor: document.querySelector('.color-option.active').getAttribute('data-color'),
            theme: themeSelect.value,
            fontFamily: fontSelect.value,
            fontSize: fontSizeSlider.value
        };
        
        localStorage.setItem('websiteCustomization', JSON.stringify(settings));
    }

    // Load settings from localStorage
    function loadSettings() {
        const savedSettings = localStorage.getItem('websiteCustomization');
        
        if (savedSettings) {
            const settings = JSON.parse(savedSettings);
            
            // Apply saved settings
            applyStylesToWebsite(settings.primaryColor, settings.fontFamily, settings.fontSize, settings.theme);
            
            // Update UI elements
            colorOptions.forEach(opt => opt.classList.remove('active'));
            document.querySelector(`.color-option[data-color="${settings.primaryColor}"]`).classList.add('active');
            themeSelect.value = settings.theme;
            fontSelect.value = settings.fontFamily;
            fontSizeSlider.value = settings.fontSize;
            fontSizeValue.textContent = `${settings.fontSize}px`;
        }
    }

    // Show notification
    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            bottom: 100px;
            left: 20px;
            background: var(--primary-color);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 10001;
            font-weight: 500;
            transition: all 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(20px)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Initialize - load saved settings on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadSettings();
        
        // Listen for system theme changes if auto theme is selected
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            const savedSettings = localStorage.getItem('websiteCustomization');
            if (savedSettings) {
                const settings = JSON.parse(savedSettings);
                if (settings.theme === 'auto') {
                    applyStylesToWebsite(settings.primaryColor, settings.fontFamily, settings.fontSize, 'auto');
                }
            }
        });
    });
</script>

<!-- CUSTOMIZATION BUTTON IMPLEMENTATION ENDS HERE -->

<!-- <script>
window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    if (preloader) preloader.style.display = "none";
});
</script> -->

