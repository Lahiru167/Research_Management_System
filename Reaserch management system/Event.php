<?php
// Include your database connection file
include 'components/connect.php';

// Fetch event data from the database
$query = "SELECT * FROM `event`"; // Replace with your actual table name
$stmt = $conn->prepare($query);
$stmt->execute();
$eventsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="Event.css">
</head>
<body>

    <!-- Header -->
    <header class="main-header">
      <div class="logo">
        <img src="img/Logo.png" alt="University Logo" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="Department.php">Departments</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="#event" class="active">Event</a></li>
        </ul>
      </nav>
      <button class="login-btn"><a href="Login.php">Login</a></button>
    </header>

    <main>
    <section class="departments">
      <h2>Upcoming Events</h2>
      <div class="grid">
        <?php
          // Loop through the events data and display each event's details
          foreach ($eventsData as $event) {
            // Assuming event table contains 'id', 'name', 'date', and 'image' columns
           
            $eventName = htmlspecialchars($event['name']);
            $eventDate = htmlspecialchars($event['date']);
            ?>
            <div class="card">
             
              <h3><?php echo $eventName; ?></h3>
              <p>Date: <?php echo $eventDate; ?></p>
              <a href="https://www.rjt.ac.lk/">More Info</a>
            </div>
            <?php
          }
        ?>
      </div>
    </section>
  </main>

  <footer class="footer">
      <div class="footer-content">
        <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        <p>
          <a href="/about">About</a> |
          <a href="/privacy-policy">Privacy Policy</a> |
          <a href="/contact">Contact</a>
        </p>
      </div>
    </footer>
</body>
</html>

<?php
// Close the database connection

?>
