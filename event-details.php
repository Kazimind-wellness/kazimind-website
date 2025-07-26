<?php
ob_start();
session_start();
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pageTitle = "Events of the Day";

$date = $_GET['date'] ?? null;
if (!$date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
  die("Invalid or missing date.");
}


$calendarId = urlencode($_ENV['CALENDAR_ID']);
$apiKey = $_ENV['API_KEY'];


// Time range for the selected day (midnight to next midnight)
$startTime = $date . "T00:00:00Z";
$endTime = date('Y-m-d', strtotime($date . " +1 day")) . "T00:00:00Z";

$eventsUrl = "https://www.googleapis.com/calendar/v3/calendars/$calendarId/events?key=$apiKey&timeMin=$startTime&timeMax=$endTime&singleEvents=true&orderBy=startTime";

$response = file_get_contents($eventsUrl);
if (!$response) {
  die("Failed to fetch events.");
}
$data = json_decode($response, true);
$events = $data['items'] ?? [];
?>

<head>
  <meta charset="UTF-8">
  <title>Events on <?php echo htmlspecialchars($date); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/indexStyles.css">
  <link rel="stylesheet" href="assets/css/h-footer.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f3f3f3;
       overflow-x: hidden;
    }

    .event-list {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding-bottom: 20px;
    scroll-padding: 10px;
    }

    .event-list::-webkit-scrollbar {
    height: 10px;
    }

    .event-list::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 5px;
    }

    .event-card {
    flex: 0 0 300px;
    scroll-snap-align: start;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }


    .event-card {
      background: white;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .event-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }

    .event-card-content {
      padding: 20px;
    }

    .event-card h2 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .event-card .meta {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 10px;
    }

    .event-card p {
      white-space: pre-wrap;
      font-size: 1rem;
      color: #333;
    }

    @media (max-width: 768px) {
      .event-card img {
        height: 180px;
      }
    }
  </style>
</head>

<body>
  <h1 style="text-align: center; margin-bottom: 30px;">Events And Appointments on <?php echo htmlspecialchars($date); ?></h1>

  <div class="event-list">
    <?php if (empty($events)): ?>
      <p style="text-align: center;">No events found on this day.</p>
    <?php else: ?>
      <?php foreach ($events as $event): 
        $title = $event['summary'] ?? 'Untitled Event';
        $start = $event['start']['dateTime'] ?? $event['start']['date'];
        $end = $event['end']['dateTime'] ?? $event['end']['date'];
        $location = $event['location'] ?? 'No location specified';
        $description = $event['description'] ?? 'No description';
        // Extract image from description (case-insensitive, ignore spaces)
        $imageUrl = null;
        if (preg_match('/^\s*image\s*:\s*(https?:\/\/\S+)/im', $description, $matches)) {
        $imageUrl = trim($matches[1]);
        // Remove only the image line, regardless of spacing or case
        $description = preg_replace('/^\s*image\s*:\s*https?:\/\/\S+\s*/im', '', $description);
        }
        if (!$imageUrl) {
          $imageUrl = 'images/AP.jpg';
        }
      ?>
        <div class="event-card">
          <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Event Image">
          <div class="event-card-content">
            <h2><?php echo htmlspecialchars($title); ?></h2>
            <div class="meta">
              <strong>Starts:</strong> <?php echo date("D, M j, Y g:i A", strtotime($start)); ?><br>
              <strong>Ends:</strong> <?php echo date("D, M j, Y g:i A", strtotime($end)); ?><br>
              <strong>Location:</strong> <?php echo htmlspecialchars($location); ?>
            </div>
            <p><?php echo htmlspecialchars(trim($description)); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

</body>

<?php
$content = ob_get_clean();
include 'includes/layout.php';
?>
