<?php

include 'components/connect.php'; // Database connection

session_start(); // Start the session to track logged-in user

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];  // Get the logged-in user's ID
} else {
   $user_id = ''; // If not logged in, set user_id to an empty string
}

if (isset($_POST['send'])) {
   // Get and sanitize form inputs
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Use FILTER_SANITIZE_EMAIL for email sanitization
   $msg = filter_var($_POST['msg'], FILTER_SANITIZE_STRING); // Sanitize message content

   // Check if all fields are filled in
   if (empty($name) || empty($email) || empty($msg)) {
      $message[] = "All fields are required!";
   } else {
      // Check if the message already exists in the database (to prevent duplicate submissions)
      $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND message = ?");
      $select_message->execute([$name, $email, $msg]);

      if ($select_message->rowCount() > 0) {
         // If the message already exists
         $message[] = 'Message already sent!';
      } else {
         // Insert the new message into the database
         $insert_message = $conn->prepare("INSERT INTO `messages`( name, email, message) VALUES(?,?,?)");
         $insert_message->execute([$user_id, $name, $email, $msg]);

         // If the message was successfully inserted
         $message[] = 'Message sent successfully!';
      }
   }
}

?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="Contact.css" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
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
          <li><a href="#contact"class="active">Contact</a></li>
          <li><a href="Event.php">Event</a></li>
        </ul>
      </nav>
      <button class="login-btn"><a href="Login.php">Login</a></button>
    </header>

   <main class="container">
    <section class="contact-info">
      <h2>Contact Us</h2>
      <p>We'd love to hear from you!</p>
      <ul>
        <li>
          <i class="fas fa-envelope"></i>
          <span>Email: contact@designresearchhub.com</span>
        </li>
        <li>
          <i class="fas fa-phone-alt"></i>
          <span>Phone: +1 (555) 123-4567</span>
        </li>
        <li>
          <i class="fas fa-map-marker-alt"></i>
          <span>Location: 123 Design St, Creative City, Country</span>
        </li>
      </ul>
    </section>
    <section class="contact-form">
      <form action="" method="post">
        <label for="name">Your Name</label>
        <input type="text" id="name" placeholder="Enter your name" required>
        <label for="email">Your Email</label>
        <input type="email" id="email" placeholder="Enter your email" required>
        <label for="message">Message</label>
        <textarea id="message" placeholder="Placeholder Text" rows="5" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </section>
  </main>

       <!-- Footer -->
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
