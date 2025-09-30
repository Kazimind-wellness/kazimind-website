<?php
ob_start();
session_start();
$pageTitle = "Book Now";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/energencyCantact.css">
  <title>Emergency Contacts</title>
  <style>

  </style>
</head>
<body>

  <div class="container">
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
      <p><span class="emergency">Emergency:</span> <span id="emergency"></span></p>
      <p><span class="ambulance">Ambulance:</span> <span id="ambulance"></span></p>
      <p><span class="police">Police:</span> <span id="police"></span></p>
</div>
    <div class="responsibility">
      Updated on September 27, 2025 <br><br>
      Kazimind Wellness provides this list for informational purposes only and does not assume responsibility for the professional ability, reputation, or quality of services provided by the entities or individuals listed above. 
      Inclusion on this list does not constitute an endorsement by Kazimind Wellness. 
      The order does not imply ranking or evaluation. Kazimind Wellness cannot vouch for the accuracy of the contact information. 
      If you discover any inaccuracies in the contact information, please email us at 
      <a href="mailto:admin@kazimind.com">admin@kazimind.com</a> so we can update it.
    </div>
  </div>

  <script>
    const countryData = {
      kenya: { name: "Kenya", emergency: "999 / 112", ambulance: "999", police: "999" },
      uganda: { name: "Uganda", emergency: "999", ambulance: "999", police: "999" },
      tanzania: { name: "Tanzania", emergency: "112", ambulance: "114", police: "112" },
      rwanda: { name: "Rwanda", emergency: "112", ambulance: "912", police: "112" },
      ethiopia: { name: "Ethiopia", emergency: "991", ambulance: "907", police: "991" },
      somalia: { name: "Somalia", emergency: "888", ambulance: "888", police: "888" },
      sudan: { name: "Sudan", emergency: "999", ambulance: "777", police: "999" },
      southsudan: { name: "South Sudan", emergency: "777", ambulance: "777", police: "777" },
      nigeria: { name: "Nigeria", emergency: "112", ambulance: "112", police: "112" },
      ghana: { name: "Ghana", emergency: "999", ambulance: "193", police: "191" },
      southafrica: { name: "South Africa", emergency: "112", ambulance: "10177", police: "10111" },
      egypt: { name: "Egypt", emergency: "122", ambulance: "123", police: "122" },
      morocco: { name: "Morocco", emergency: "112", ambulance: "150", police: "19" },
      france: { name: "France", emergency: "112", ambulance: "15", police: "17" },
      germany: { name: "Germany", emergency: "112", ambulance: "112", police: "110" },
      italy: { name: "Italy", emergency: "112", ambulance: "118", police: "113" },
      spain: { name: "Spain", emergency: "112", ambulance: "061", police: "091" },
      uk: { name: "United Kingdom", emergency: "999 / 112", ambulance: "999", police: "999" },
      ireland: { name: "Ireland", emergency: "112 / 999", ambulance: "112", police: "112" },
      hungary: { name: "Hungary", emergency: "112", ambulance: "104", police: "107" },
      sweden: { name: "Sweden", emergency: "112", ambulance: "112", police: "112" },
      norway: { name: "Norway", emergency: "112", ambulance: "113", police: "112" },
      denmark: { name: "Denmark", emergency: "112", ambulance: "112", police: "114" }
    };

    const select = document.getElementById('countrySelect');
    const infoBox = document.getElementById('infoBox');
    const countryName = document.getElementById('countryName');
    const emergency = document.getElementById('emergency');
    const ambulance = document.getElementById('ambulance');
    const police = document.getElementById('police');

    function updateCountry(country) {
      if (country && countryData[country]) {
        const data = countryData[country];
        countryName.textContent = data.name;
        emergency.textContent = data.emergency;
        ambulance.textContent = data.ambulance;
        police.textContent = data.police;
        infoBox.style.display = 'block';
      } else {
        infoBox.style.display = 'none';
      }
    }

    // Update on selection change
    select.addEventListener('change', () => {
      updateCountry(select.value);
    });

    // Default to Kenya on load
    window.onload = () => {
      select.value = "kenya";
      updateCountry("kenya");
    };
  </script>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
