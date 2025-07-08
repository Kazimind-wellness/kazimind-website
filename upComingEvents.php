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
    <script src="https://apis.google.com/js/api.js"></script>

    <title>Kazimind</title>
</head>

<style>
  
</style>

<div class="background2" id="background2"><span style="opacity: 100%;"></span></div>

<div class="body">
  <div class="calendar-container">


    <div class="calendar-header">
      <button id="prev" style="color: black;">&larr;</button>
      <h2 id="month-year"></h2>
      <button id="next" style="color: black;">&rarr;</button>
    </div>
    <div class="calendar-weekdays">
      <div>Sun</div>
      <div>Mon</div>
      <div>Tue</div>
      <div>Wed</div>
      <div>Thu</div>
      <div>Fri</div>
      <div>Sat</div>
    </div>
    <div class="calendar-grid" id="calendar">
    </div>
  </div>

  <div id="event-tooltip" class="event-tooltip"></div>


  <script src="assets/js/get_google_events.js" defer></script>

</div>
<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>



  
