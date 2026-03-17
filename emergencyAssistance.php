<?php 
ob_start(); 
session_start(); 
$pageTitle = "Mental Health Emergency Contacts"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/energencyCantact.min.css">
    <title>Mental Health Emergency Contacts</title>
    <style>
 
        .info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 5px solid #006fd1;
        }
        
        .emergency {
            color: #dc3545;
            font-weight: bold;
        }
        
        .mental-health {
            color: #006fd1;
            font-weight: bold;
        }
        
        .ambulance {
            color: #28a745;
            font-weight: bold;
        }
        
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #006fd1;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        .responsibility {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin-top: 30px;
            font-size: 14px;
            color: #856404;
        }
        
        h2 {
            color: #006fd1;
            margin-bottom: 20px;
        }
        
        p {
            margin: 15px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mental Health Emergency Contacts</h1>
        <p><strong>Select your country to find mental health crisis support:</strong></p>
        
        <select id="countrySelect">
            <option value="kenya">Kenya</option>
            <option value="uganda">Uganda</option>
            <option value="tanzania">Tanzania</option>
            <option value="rwanda">Rwanda</option>
            <option value="ethiopia">Ethiopia</option>
            <option value="somalia">Somalia</option>
            <option value="sudan">Sudan</option>
            <option value="southsudan">South Sudan</option>
            <option value="nigeria">Nigeria</option>
            <option value="ghana">Ghana</option>
            <option value="southafrica">South Africa</option>
            <option value="egypt">Egypt</option>
            <option value="morocco">Morocco</option>
            <option value="france">France</option>
            <option value="germany">Germany</option>
            <option value="italy">Italy</option>
            <option value="spain">Spain</option>
            <option value="uk">United Kingdom</option>
            <option value="ireland">Ireland</option>
            <option value="hungary">Hungary</option>
            <option value="sweden">Sweden</option>
            <option value="norway">Norway</option>
            <option value="denmark">Denmark</option>
        </select>

        <div class="info-box" id="infoBox">
            <h2 id="countryName"></h2>
            <p><span class="emergency">Emergency Services:</span> <span id="emergency"></span></p>
            <p><span class="mental-health">Mental Health Crisis:</span> <span id="mentalHealth"></span></p>
            <p><span class="ambulance">Ambulance:</span> <span id="ambulance"></span></p>
        </div>

        <div class="responsibility">
            Updated on September 27, 2025 
            <br><br>
            KaziMind Wellness provides this list for informational purposes only and does not assume responsibility for the professional ability, reputation, or quality of services provided by the entities or individuals listed above. Inclusion on this list does not constitute an endorsement by KaziMind Wellness. The order does not imply ranking or evaluation. KaziMind Wellness cannot vouch for the accuracy of the contact information. If you discover any inaccuracies in the contact information, please email us at <a href="mailto:admin@kazimind.com">admin@kazimind.com</a> so we can update it.
        </div>
    </div>

    <script>
        const countryData = {
            kenya: {
                name: "Kenya",
                emergency: "999 / 112",
                mentalHealth: "1190 (Kenya Red Cross) / 116 (Childline)",
                ambulance: "999"
            },
            uganda: {
                name: "Uganda", 
                emergency: "999",
                mentalHealth: "0800 203 033 (Mental Health Uganda)",
                ambulance: "999"
            },
            tanzania: {
                name: "Tanzania",
                emergency: "112", 
                mentalHealth: "0800 750 075 (Crisis Helpline)",
                ambulance: "114"
            },
            rwanda: {
                name: "Rwanda",
                emergency: "112",
                mentalHealth: "3259 (Rwanda Biomedical Center)",
                ambulance: "912"
            },
            ethiopia: {
                name: "Ethiopia",
                emergency: "991",
                mentalHealth: "8010 (Ministry of Health)",
                ambulance: "907"
            },
            somalia: {
                name: "Somalia",
                emergency: "888",
                mentalHealth: "Contact local health facilities",
                ambulance: "888"
            },
            sudan: {
                name: "Sudan", 
                emergency: "999",
                mentalHealth: "Contact local hospitals",
                ambulance: "777"
            },
            southsudan: {
                name: "South Sudan",
                emergency: "777",
                mentalHealth: "Contact health organizations",
                ambulance: "777"
            },
            nigeria: {
                name: "Nigeria",
                emergency: "112", 
                mentalHealth: "0800 800 2000 (Mental Health Foundation)",
                ambulance: "112"
            },
            ghana: {
                name: "Ghana",
                emergency: "999",
                mentalHealth: "020 681 4666 (Mental Health Authority)",
                ambulance: "193"
            },
            southafrica: {
                name: "South Africa",
                emergency: "112",
                mentalHealth: "0800 567 567 (SADAG Mental Health Line)",
                ambulance: "10177"
            },
            egypt: {
                name: "Egypt",
                emergency: "122",
                mentalHealth: "762 1602 (Befrienders Cairo)",
                ambulance: "123"
            },
            morocco: {
                name: "Morocco",
                emergency: "112",
                mentalHealth: "Contact local mental health services",
                ambulance: "150"
            },
            france: {
                name: "France",
                emergency: "112",
                mentalHealth: "3114 (National Suicide Prevention)",
                ambulance: "15"
            },
            germany: {
                name: "Germany",
                emergency: "112", 
                mentalHealth: "0800 111 0111 (Telefonseelsorge)",
                ambulance: "112"
            },
            italy: {
                name: "Italy",
                emergency: "112",
                mentalHealth: "800 860 022 (Samaritans)",
                ambulance: "118"
            },
            spain: {
                name: "Spain",
                emergency: "112",
                mentalHealth: "024 (Suicide Prevention Hotline)",
                ambulance: "061"
            },
            uk: {
                name: "United Kingdom",
                emergency: "999 / 112", 
                mentalHealth: "116 123 (Samaritans)",
                ambulance: "999"
            },
            ireland: {
                name: "Ireland",
                emergency: "112 / 999",
                mentalHealth: "1800 247 247 (Mental Health Ireland)",
                ambulance: "112"
            },
            hungary: {
                name: "Hungary",
                emergency: "112",
                mentalHealth: "116 123 (Crisis Helpline)",
                ambulance: "104"
            },
            sweden: {
                name: "Sweden",
                emergency: "112",
                mentalHealth: "463 92 000 (Mind)",
                ambulance: "112"
            },
            norway: {
                name: "Norway",
                emergency: "112",
                mentalHealth: "116 123 (Mental Health Helpline)",
                ambulance: "113"
            },
            denmark: {
                name: "Denmark",
                emergency: "112",
                mentalHealth: "70 201 201 (Crisis Helpline)",
                ambulance: "112"
            }
        };

        const select = document.getElementById('countrySelect');
        const infoBox = document.getElementById('infoBox');
        const countryName = document.getElementById('countryName');
        const emergency = document.getElementById('emergency');
        const mentalHealth = document.getElementById('mentalHealth');
        const ambulance = document.getElementById('ambulance');

        function updateCountry(country) {
            if (country && countryData[country]) {
                const data = countryData[country];
                countryName.textContent = data.name;
                emergency.textContent = data.emergency;
                mentalHealth.textContent = data.mentalHealth;
                ambulance.textContent = data.ambulance;
                infoBox.style.display = 'block';
            } else {
                infoBox.style.display = 'none';
            }
        }

        select.addEventListener('change', () => {
            updateCountry(select.value);
        });

        window.onload = () => {
            select.value = "kenya";
            updateCountry("kenya");
        };
    </script>
</body>
</html>

<?php 
$content = ob_get_clean(); 
include 'includes/layout.php'; 
?>